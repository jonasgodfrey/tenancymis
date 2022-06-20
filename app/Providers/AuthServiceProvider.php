<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //full access rules
        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });

        //full access rules
        Gate::define('manager', function ($user) {
            return $user->hasRole('manager');
        });

        //Cbo role
        Gate::define('tenant', function ($user) {
            return $user->hasRole('tenant');
        });

        //admin spo access
        Gate::define('admin_manager', function ($user) {
            return $user->hasAnyRoles([
                'admin',
                'manager'
            ]);
        });

        //admin spo access
        Gate::define('is_subscribed', function ($user) {
            return $user->subscriptionStatus('active');
        });
    }
}
