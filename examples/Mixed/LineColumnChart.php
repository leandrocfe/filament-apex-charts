<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class LineColumnChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'lineColumnChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'LineColumnChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'series' => [
                [
                    'name' => 'Column',
                    'data' => [20, 40, 60, 100, 140, 70, 20, 90, 100, 150, 130, 180],
                    'type' => 'column',
                ],
                [
                    'name' => 'Line',
                    'data' => [10, 20, 30, 50, 40, 70, 30, 10, 60, 80, 20, 18],
                    'type' => 'line',
                ],
            ],
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'stroke' => [
                'width' => [0, 4],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
