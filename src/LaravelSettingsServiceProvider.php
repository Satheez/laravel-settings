<?php

namespace Satheez\LaravelSettings;

use Satheez\LaravelSettings\Commands\LaravelSettingsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
