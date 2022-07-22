<?php

namespace Satheez\LaravelSettings\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as Orchestra;
use Satheez\LaravelSettings\LaravelSettingsServiceProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    protected function getPackageProviders($app)
    {
        return [LaravelSettingsServiceProvider::class];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        $migration = include __DIR__.'/../database/migrations/create_settings_table.php.stub';
        $migration->up();
    }
}
