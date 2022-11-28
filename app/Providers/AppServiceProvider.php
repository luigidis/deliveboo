<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'xwp6gv6rjzyd6b39',
                    'publicKey' => 'vdgx9s2zr52qxcck',
                    'privateKey' => '6c2cc0f2f2f992950215b13cf9be001c',
                ]
            );
        });
    }
}
