<?php

namespace Leandrocfe\FilamentApexCharts\Tests;

use Leandrocfe\FilamentApexCharts\FilamentApexChartsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentApexChartsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app) {}
}
