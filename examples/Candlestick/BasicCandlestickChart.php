<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BasicCandlestickChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'basicCandlestickChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'BasicCandlestickChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'candlestick',
                'height' => 300,
            ],
            'series' => [
                [
                    'type' => 'candlestick',
                    'data' => [
                        ['x' => 'Jan', 'y' => [6629.81, 6650.5, 6623.04, 6633.33]],
                        ['x' => 'Fev', 'y' => [6632.01, 6643.59, 6620, 6630.11]],
                        ['x' => 'Mar', 'y' => [6630.71, 6648.95, 6623.34, 6635.65]],
                        ['x' => 'Apr', 'y' => [6635.65, 6651, 6629.67, 6638.24]],
                        ['x' => 'May', 'y' => [6638.24, 6640, 6620, 6624.47]],
                    ],
                ],
            ],
            'xaxis' => [
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
        ];
    }
}
