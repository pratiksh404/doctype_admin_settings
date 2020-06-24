<?php

namespace doctype_admin\Settings;



use Illuminate\Support\Facades\Blade;
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
        $this->settingDirectives();
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

    public function settingDirectives()
    {
        /* ------------Settings Blade Directive-------------- */

        Blade::directive('setting', function ($key) {
            return $this->setting_value($key);
        });

        /* ------------------------------------------------- */
    }

    public function setting_value($key)
    {
        $key = str_replace(['"', '\''], ' ', $key);
        $setting = \doctype_admin\Settings\Models\Setting::where('setting_name', trim($key))->first();
        if ($setting->setting_type == "Text" || $setting->setting_type == "Image/File") {
            return $setting->string_value;
        }
        if ($setting->setting_type == "Rich Text Box") {
            return $setting->text_value;
        }
        if ($setting->setting_type == "Checkbox" || $setting->setting_type == "Select Dropdown") {
            return $setting->integer_value;
        }
    }
}
