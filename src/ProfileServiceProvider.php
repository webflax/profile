<?php

namespace WebFlax\Profile;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {


        Schema::defaultStringLength(191);
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');


        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'webflax');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'webflax');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/profile.php', 'profile');

        // Register the service the package provides.
        $this->app->singleton('profile', function ($app) {
            return new Profile;
        });
    }

    public function registerPublishable()
    {
        $basePath = dirname(__DIR__);
        $arrPublishable = [
            'migrations' => [
                "$basePath/publishable/database/migrations" => database_path('migrations'),
            ],
            'config' => [
                "$basePath/publishable/config/Category.php" => config_path('Category.php'),
            ]
        ];

        foreach ($arrPublishable as $group => $paths){
            $this->publishable($paths,$group);
        }
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['profile'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {

        $this->publishes([
            __DIR__.'/../database/' => config_path('profile.php'),
        ], 'profile.config');
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/profile.php' => config_path('profile.php'),
        ], 'profile.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/webflax'),
        ], 'profile.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/webflax'),
        ], 'profile.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/webflax'),
        ], 'profile.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
