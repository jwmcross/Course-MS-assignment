<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        //This determines if a user has the admin role. And can be handled to block access to routes
        Gate::define('manage-users', function($user){
            return $user->hasRole('administrator');
        });

        Gate::define('manage-students',function($user){
            return $user->hasAnyRoles(['administrator','office administrator']);
        });

        Gate::define('manage-staff',function($user){
            return $user->hasAnyRoles(['administrator','office administrator']);
        });

        Gate::define('manage-modules',function($user){
            return $user->hasAnyRoles(['administrator','office administrator']);
        });

        Gate::define('manage-courses   ',function($user){
            return $user->hasAnyRoles(['administrator','office administrator']);
        });

        Gate::define('manage-modules',function($user){
            return $user->hasAnyRoles(['administrator','office administrator']);
        });

        //
    }
}
