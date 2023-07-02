<?php

namespace Leandrocfe\FilamentApexCharts;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Blade;
use Leandrocfe\FilamentApexCharts\Commands\FilamentApexChartsCommand;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentApexChartsServiceProvider extends PackageServiceProvider
{
    protected array $widgets = [
        ApexChartWidget::class,
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

    public function packageRegistered(): void
    {
        FilamentAsset::register([
            Js::make('apexcharts', __DIR__.'/../dist/apexcharts.js'),
        ], package: 'leandrocfe/filament-apex-charts');
    }
}
