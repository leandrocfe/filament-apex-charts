<?php

namespace Leandrocfe\FilamentApexCharts;

use Filament\Support\Assets\AlpineComponent;
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

    /**
     * Configures the given package with the name 'filament-apex-charts'
     * as a Package Service Provider.
     *
     * @param  Package  $package the package to be configured
     *
     * @throws void
     */
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

    /**
     * Boots the package and registers the Filament Apex Charts component namespace with Blade.
     *
     * @throws \Exception If the component namespace is not valid.
     */
    public function bootingPackage()
    {
        Blade::componentNamespace('Leandrocfe\\FilamentApexCharts\\Components', 'filament-apex-charts');
    }

    public function packageRegistered(): void
    {
        FilamentAsset::register([
            AlpineComponent::make('apexcharts', __DIR__.'/../dist/apexcharts.js'),
        ]);
    }
}
