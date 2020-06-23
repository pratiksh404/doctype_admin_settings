<?php

namespace doctype_admin\Settings;



use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\DoctypeAdminSettingInstallerCommand::class
        ]);
    }

    public function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'setting');
        $this->registerRoutes();
    }

    public function registerPublishing()
    {
        /* Config file publish */
        $this->publishes([
            __DIR__ . '/../config/setting.php' => config_path('setting.php')
        ], 'setting-config');
        /* Views File Publish */
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/setting'),
        ], 'setting-views');
        /* Migration File Publish */
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'setting-migrations');
        /* Seed File Publish */
        $this->publishes([
            __DIR__ . '/../database/seeds' => database_path('seeds')
        ], 'setting-seeds');
    }



    public function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    public function routeConfiguration()
    {
        return [
            'prefix' => config('setting.prefix', 'admin'),
            'namespace' => 'doctype_admin\Settings\Http\Controllers',
            'middleware' => config('setting.middleware', ['web', 'activity', 'auth'])
        ];
    }
}
