<?php

namespace Leandrocfe\FilamentApexCharts;

use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
use Leandrocfe\FilamentApexCharts\Commands\FilamentApexChartsCommand;
use Spatie\LaravelPackageTools\Package;

class FilamentApexChartsServiceProvider extends PluginServiceProvider
{
    protected array $beforeCoreScripts = [
        'filament-apex-charts-scripts' => __DIR__.'/../dist/apexcharts.js',
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-apex-charts')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(FilamentApexChartsCommand::class);
    }

    public function bootingPackage()
    {
        Blade::componentNamespace('Leandrocfe\\FilamentApexCharts\\Components', 'filament-apex-charts');
    }
}
