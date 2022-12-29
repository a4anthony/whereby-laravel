<?php

namespace A4Anthony\WherebyLaravel\Providers;

use A4Anthony\WherebyLaravel\WherebyLaravel;
use Illuminate\Support\ServiceProvider;

class WhereLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        // Register a class in the service container
        $this->app->bind('whereby-laravel', function ($app) {
            return new WherebyLaravel();
        });
    }
}
