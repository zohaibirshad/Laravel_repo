<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('user.register');
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
        $userData=new User();
        if ($request->has('add_user')) {
            $userData->add_user_privilage=1;
        }

        $userData->name=$request->name;
        $userData->email=$request->email;
        $userData->password=Hash::make($request->password);
        $userData->save();
        return redirect()->route('register_form')->with('success', 'user created successfully');
    }

public function show(){
    $userData=User::paginate(5);

return view('user.list_users',compact('userData'));
}


}
