<?php

namespace BriskPs\BriskCore;

use Illuminate\Support\ServiceProvider;

class BriskCoreServiceProvider extends ServiceProvider{

    public function boot(){
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('brisk-core.php'),
        ], 'config');
        
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/brisk-core'),
        ], 'public');
    }

    public function register(){
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'brisk-core');

        // Register the main class to use with the facade
        $this->app->singleton('brisk-core', function () {
            return new BriskCore;
        });
    }
}