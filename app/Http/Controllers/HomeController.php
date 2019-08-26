<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permission;
use App\user_permission;
use App\activitylog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        $permissions=Permission::all();
        $toal_visitors=activitylog::select('userid')->distinct('userid')->get()->count();
        // dd($user_permissions);
        return view('welcome',compact('users','permissions','toal_visitors'));
    }
}
