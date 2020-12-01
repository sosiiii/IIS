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
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Profile' => 'App\Policies\ProfilePolicy',
        'App\Models\Group' => 'App\Policies\GroupPolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\Membership' => 'App\Policies\MemberPolicy',
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
    }
}
