<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Services\LoginService;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LoginContract', 'App\Core\Services\LoginService');
    }
}
