<?php

namespace Satheez\LaravelSettings\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Satheez\LaravelSettings\LaravelSettingsServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        \Illuminate\Support\Facades\Artisan::call('migrate:fresh');

        // Factory::guessFactoryNamesUsing(
        //     fn (string $modelName) => 'Satheez\\LaravelSettings\\Database\\Factories\\'.class_basename($modelName).'Factory'
        // );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSettingsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-settings_table.php.stub';
        $migration->up();
        */
    }
}
