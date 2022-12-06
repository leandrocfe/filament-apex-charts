<?php

namespace Leandrocfe\FilamentApexCharts\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Leandrocfe\\FilamentApexCharts\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentApexChartsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-apex-charts_table.php.stub';
        $migration->up();
        */
    }
}
