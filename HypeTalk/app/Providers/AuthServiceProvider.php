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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-panel', function($user){
            return $user->isAdmin();
        });
        Gate::define('edit-profile', function($user, $profile){
            return ($user->profile == $profile) || $user->isAdmin();
        });
        Gate::define('group-create', function($user){
            return $user->isUser();
        });
        Gate::define('group-edit', function($user, $group){
            return $user->isAdmin();
        });
        //
    }
}
