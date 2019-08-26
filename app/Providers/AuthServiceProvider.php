<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permission;
use App\user_permission;
use App\User;
use Illuminate\Support\Facades\Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('can-read-user-information', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'read-user-information')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
        Gate::define('can-delete-user', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'delete-user')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });

        Gate::define('can-update-user', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'update-user')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
        Gate::define('can-add-user', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'add-new-user')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
       
        Gate::define('can-add-permission', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', ' add-new-permission')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
        Gate::define('can-update-permission', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'update-permission')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
        Gate::define('can-delete-permission', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'delete-permission')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
        
        Gate::define('can-read-permission', function ($user) {
            $id=user_permission::select('user_id')->where('permissionslug', 'read-permission-information')->pluck('user_id')->toArray();
            $user_id=$user->id;
            if (in_array($user_id, $id)) {
                return true;
            }
            return false;
        });
    }
}
