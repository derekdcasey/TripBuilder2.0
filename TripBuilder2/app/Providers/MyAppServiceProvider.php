<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
class MyAppServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('trip', function()
        {
            return new \App\Trip;
        });
        App::bind('flight', function()
        {
            return new \App\Flight;
        });
    }
}