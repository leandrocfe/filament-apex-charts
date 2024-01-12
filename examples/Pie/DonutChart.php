<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class DonutChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'donutChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'DonutChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'donut',
                'height' => 300,
            ],
            'series' => [2, 4, 6, 10, 14],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];
    }
}
