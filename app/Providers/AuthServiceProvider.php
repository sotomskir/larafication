<?php

namespace Larafication\Providers;

use Auth;
use Larafication\Services\Authentication\Sentinel;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Larafication\Model' => 'Larafication\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerSentinel();
    }

    public function registerSentinel()
    {
        Auth::extend('sentinel', function ($app, $name, array $config) {
            return app('Larafication\Services\Authentication\SentinelGuard');
        });
        Auth::provider('sentinel-provider', function ($app, array $config) {
            return app('Larafication\Services\User\SentinelProvider');
        });
    }
}
