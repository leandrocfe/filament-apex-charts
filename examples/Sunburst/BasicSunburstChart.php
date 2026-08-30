<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BasicSunburstChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'basicSunburstChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'BasicSunburstChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'sunburst',
                'height' => 480,
            ],
            'series' => [
                [
                    'data' => [
                        [
                            'x' => 'Mobile',
                            'y' => 55,
                            'children' => [
                                [
                                    'x' => 'iOS',
                                    'y' => 30,
                                    'children' => [
                                        ['x' => 'iOS 17', 'y' => 18],
                                        ['x' => 'iOS 16', 'y' => 9],
                                        ['x' => 'iOS 15', 'y' => 3],
                                    ],
                                ],
                                ['x' => 'Android', 'y' => 23],
                                ['x' => 'Other', 'y' => 2],
                            ],
                        ],
                        [
                            'x' => 'Desktop',
                            'y' => 33,
                            'children' => [
                                ['x' => 'Windows', 'y' => 20],
                                ['x' => 'macOS', 'y' => 10],
                                ['x' => 'Linux', 'y' => 3],
                            ],
                        ],
                        [
                            'x' => 'Tablet',
                            'y' => 12,
                            'children' => [
                                ['x' => 'iPadOS', 'y' => 8],
                                ['x' => 'Android', 'y' => 4],
                            ],
                        ],
                    ],
                ],
            ],
            'colors' => ['#0ea5e9', '#14b8a6', '#f59e0b'],
            'plotOptions' => [
                'sunburst' => [
                    'innerSize' => '25%',
                    'borderRadius' => 5,
                    'spacing' => 1,
                ],
            ],
            'stroke' => [
                'width' => 1,
                'colors' => ['#fff'],
            ],
            'title' => [
                'text' => 'Website traffic by device and OS',
                'align' => 'left',
            ],
            'legend' => [
                'position' => 'bottom',
            ],
        ];
    }
}
