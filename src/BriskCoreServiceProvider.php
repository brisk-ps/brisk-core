<?php

namespace BriskPs\BriskCore;

use Illuminate\Support\ServiceProvider;

class BriskCoreServiceProvider extends ServiceProvider{

    public function boot(){
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('brisk-core.php'),
            ], 'config');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/brisk'),
            ], 'assets');*/
        }
    }

    public function register(){
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'brisk-core');

        // Register the main class to use with the facade
        $this->app->singleton('brisk-core', function () {
            return new BriskCore;
        });
    }
}