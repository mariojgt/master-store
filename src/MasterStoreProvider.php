<?php

namespace Mariojgt\MasterStore;

use Illuminate\Support\ServiceProvider;
use Mariojgt\MasterStore\Commands\Install;
use Mariojgt\MasterStore\Commands\Republish;


class MasterStoreProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // Load some commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Republish::class,
                Install::class,
            ]);
        }

        // Load MasterStore views
        $this->loadViewsFrom(__DIR__ . '/views', 'MasterStore');

        // Load MasterStore routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publish();
    }

    public function publish()
    {
        // Publish the public folder
        $this->publishes([
            __DIR__ . '/../Publish/Config/' => config_path(''),
        ]);

        // Publish the resource
        $this->publishes([
            __DIR__ . '/../Publish/Resource' => resource_path('vendor/SkeletonAdmin/js/backend/Pages/BackEnd/Vendor/MasterStore'),
        ]);
    }
}
