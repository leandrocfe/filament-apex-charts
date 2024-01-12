<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BasicHeatmapChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'basicHeatmapChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'BasicHeatmapChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'heatmap',
                'height' => 300,
            ],
            'series' => [
                ['name' => 'Jan', 'data' => [[55, 70], [33, 42], [68, 40], [40, 48], [63, 19], [38, 23]]],
                ['name' => 'Feb', 'data' => [[44, 38], [37, 47], [16, 52], [30, 27], [46, 55], [37, 13]]],
                ['name' => 'Mar', 'data' => [[10, 42], [30, 16], [54, 34], [31, 47], [30, 31], [58, 60]]],
                ['name' => 'Apr', 'data' => [[14, 60], [50, 30], [64, 13], [34, 32], [41, 23], [15, 70]]],
                ['name' => 'May', 'data' => [[66, 69], [42, 20], [47, 34], [12, 37], [59, 29], [25, 60]]],
            ],
            'xaxis' => [
                'type' => 'category',
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'colors' => ['#6366f1'],
        ];
    }
}
