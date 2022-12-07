<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BasicPieChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'basicPieChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'BasicPieChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'pie',
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
