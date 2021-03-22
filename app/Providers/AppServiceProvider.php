<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Braintree\Configuration::environment(env('BTREE_ENVIRONMENT'));
        \Braintree\Configuration::merchantId(env('BTREE_MERCHANT_ID'));
        \Braintree\Configuration::publicKey(env('BTREE_PUBLIC_KEY'));
        \Braintree\Configuration::privateKey(env('BTREE_PRIVATE_KEY'));
    }
}
