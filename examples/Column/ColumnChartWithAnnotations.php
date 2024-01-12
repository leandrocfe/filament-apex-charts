<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ColumnChartWithAnnotations extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'columnChartWithAnnotations';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'ColumnChartWithAnnotations';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'ColumnChartWithAnnotations',
                    'data' => [7, 4, 6, 10, 14, 7, 5, 9, 10, 15, 13, 18],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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
            'colors' => ['#6366f1'],
            'annotations' => [
                'yaxis' => [
                    [
                        'y' => 15,
                        'borderColor' => '#fcd34d',
                        'borderWidth' => '5',
                        'label' => [
                            'offsetX' => -5,
                            'offsetY' => -13,
                            'borderColor' => '#f59e0b',
                            'style' => [
                                'color' => '#fffbeb',
                                'background' => '#f59e0b',
                            ],
                            'text' => 'Label Example',
                        ],
                    ],
                ],
            ],
        ];
    }
}
