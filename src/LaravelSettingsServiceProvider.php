<?php

namespace Satheez\LaravelSettings;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;


class LaravelSettingsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('settings')
            ->hasMigration('create_settings_table')
            ->hasConfigFile();
        // ->hasViews()
        // ->hasCommand(LaravelSettingsCommand::class);
    }


    public function packageRegistered()
    {
        $this->app->bind(LaravelSettings::class);
    }

    //    public function boot()
    //    {
    //        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
    //            $this->publishes([
    //                __DIR__ . '/../resources/config/laravel-fcm.php' => config_path('laravel-fcm.php'),
    //            ]);
    //        } elseif ($this->app instanceof LumenApplication) {
    //            $this->app->configure('laravel-fcm');
    //        }
    //    }
    //
    public function boot()
    {
        app()->bind('settings', function ($app) {
            return new LaravelSettings();
        });
    }
}
