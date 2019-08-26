<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Permission;
use App\User;
use App\user_permission;
use Gate;
// Permission
class UserController extends Controller
{

    public function index(){
        $userData=User::paginate(5);
        return view('user.list_users', compact('userData'));
    }

    public function create()
    {
        $permissionsData=Permission::all();
        return view('user.add_user', compact('permissionsData'));
            # code...
        
    }



    public function show($id)
    {
        $users=User::find($id);
        return view('user.user_view',compact('users'));
    
    }

    public function store(Request $request)
    {
        $request->validate(
            [
    'name'=>'required',
    'email'=>'email|required|unique:users',
    'password'=>'confirmed|required'
    ]
);
        $userData=new User();//This is a function
        
        $userData->name=$request->name;
        // if($userData->name==Null or $userData->name=' ')
        // {

        // }
        $userData->email=$request->email;
        $userData->password=Hash::make($request->password);
        $permission_list=$request->permission;
        $userData->save();
        $id=$userData->id;
        $users=User::find($id);
        $users->permissions()->attach($permission_list);
        return redirect('admin/users/list')->with('success', 'user created successfully');
    }

    public function edit($id)
    {
        $userData=User::select('id', 'name', 'email')->with('permissions')->where('id', $id)->get();
     $permissionsData=Permission::all();
     $permissions_user=user_permission::select('permission_id')->where('user_id',$id)->pluck('permission_id')->toArray();
    //  dd($permissions_user);
        return view('user.user_edit', compact('userData','permissionsData','permissions_user'));
    }
    public function update(Request $request)
    {
        $id=$request->id;
        $userData=User::find($id);
        $request->validate(
            [
    'name'=>'required',
    'email'=>'email|required',
            ]
            );

        $userData->name=$request->name;
        $userData->email=$request->email;

        $permissions=$request->permission;

        $userData->save();


        $userData->permissions()->detach();
        $userData->permissions()->attach($permissions);



        return redirect('/admin/users/list')->with('success', 'updated successfuully');
    }
    public function destroy($id)
    {
        $user_to_delete=User::find($id);
        $user_to_delete->permissions()->detach();
        $user_to_delete->delete();
        return redirect('/admin/users/list')->with('success','User has deleted');
    }
}
