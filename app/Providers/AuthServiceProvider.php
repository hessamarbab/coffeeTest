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
         'App\Product' => 'App\Policies\ProductPolicy',
         'App\Option' => 'App\Policies\OptionPolicy',
         'App\Choice' => 'App\Policies\ChoicePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-destroy-order', function ($user, $order) {
            return ($user->id === $order->user_id)&&($order->status=="waiting");
        });
    }
}
