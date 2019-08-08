<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
public function __construct()
{

    // $this->middleware('guest', ['except' => 'logout']);


}


    public function index()
    {
        
    }
    public function create()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }
        return view('user.login');
    }

    public function login(Request $request)
    {
        $remember=$request->has("remember") ? true : false;
       $email=$request->email;
       $password=$request->password;
        // dd($remember_me);

        if (auth()->attempt(['email' => $email, 'password' => $password], $remember))
    {
        return redirect()->route('dashboard');

        }
        return back()->withErrors(
            ['message'=>"email or password is invalid"]
        );

    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login_form');
    }
}
