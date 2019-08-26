<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\Route;
use App\activitylog;
use Identify;
class activity_log
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::check())
        {
            $activity=new activitylog;
            $ip=$request->getClientIp();
            $name=Auth::user()->name;
            $email=Auth::user()->email;
            $userid=Auth::user()->id;
            $activity->ip=$ip;
            $activity->url=url::current();
            $activity->email=$email;
            $browser_version=Identify::browser()->getVersion();
            $browser=Identify::browser()->getname().' version: '.$browser_version;
            $activity->username=$name;
            $activity->browser=$browser;
            $activity->userid=$userid;
            $activity->os=Identify::os()->getName();
            $activity->device=Identify::device()->getName();
            $activity->action=$request->Route()->getActionMethod();
            $activity->method=$request->getMethod();
            // dd($activity->method);
$activity->save();
return $next($request);



        }

        return $next($request);
    }
}
