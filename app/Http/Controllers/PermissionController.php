<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use PharIo\Manifest\ElementCollection;
use App\Permission;
use App\User;
use App\user_permission;
use Gate;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=permission::paginate(5);
     return view('permission.permission_list',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $maxid=permission::max('id');
    //    dd($request->all());
        $validatedData = $request->validate([
            'name'=>'required|unique:permissions'
    ]);
    
        
        $new_permission=new Permission();
        $new_permission->user_email=$request->user_email;
        $new_permission->name=$request->name;
        $slug=str_slug($new_permission->name);
        $new_permission->permissionslug=$slug;
        $new_permission->save();
       
        return redirect('admin/permission/list')->with('success','Permission Added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions=permission::select('id','name','user_email')->where('permissionslug',$id)->get();
        return view('permission.permission_view',compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
        $permissions=$permissions=permission::select('*')->where('permissionslug',$id)->get();
        return view('permission.permission_update',compact('permissions'));
        
        // return back()->with('failed','You have no permission to edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dd($slug);
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
            
        ]);
        // dd('after slug');
        $permissions=Permission::select('*')->where('permissionslug',$slug)->get();
        // dd($permissions);
        $permissions[0]->name=$request->name;
        // dd($permissions[0]->name);
        $slug=str_slug($permissions[0]->name);
        $permissions[0]->permissionslug=$slug;
        // dd($permissions[0]);
        $permissions[0]->update();
        
        return redirect('admin/permission/list')->with('success','Data updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // dd($slug);
            // $permissions=permission::find($id);
            $permissions=Permission::select('*')->where('permissionslug',$slug)->get();
            // dd($permissions);
            $permission_in_use=user_permission::select('permission_id')->distinct()->pluck('permission_id')->toArray();
            if(!in_array($permissions[0]->id,$permission_in_use)){
                $permissions[0]->delete();
                return redirect('/permission_list')->with('success','Data Deleted Successfully');
            }
            else{
                return redirect()->back()->with('failed','The Permission is in use and cannot delete.');
            }

    }
}