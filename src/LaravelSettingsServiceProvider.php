<?php

namespace Satheez\LaravelSettings;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Satheez\LaravelSettings\Commands\LaravelSettingsCommand;

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
            ->hasMigration('create_settings_table');
            // ->hasConfigFile()
            // ->hasViews()
            // ->hasCommand(LaravelSettingsCommand::class);
    }
}
