<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use App\User;
use Closure;

class permissioncheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $permission = Null)
    {

        // dd($permission);
        // dd($request->user->haspermission($permission));
        if($permission != null && $request->user()->haspermission($permission)) {
            // dd("am in handle"); 
            return $next($request);
        }
        return redirect('/welcome')->with('failed','You have no Permission for this action');
    }

}
