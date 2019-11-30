<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('supervisor', function($user){
            return ($user->role == 'SUPERVISOR');
        });

        Gate::define('admin', function($user){
            return ($user->role == 'ADMIN');
        });
        
        Gate::define('dokter', function($user){
            return ($user->role == 'DOKTER');
        });
    }
}
