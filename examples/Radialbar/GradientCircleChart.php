<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class GradientCircleChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'gradientCircleChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'GradientCircleChart';

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
                'type' => 'radialBar',
                'height' => 300,
                'toolbar' => [
                    'show' => true,
                ],
            ],
            'series' => [rand(0, 100)],
            'plotOptions' => [
                'radialBar' => [
                    'startAngle' => -135,
                    'endAngle' => 225,
                    'hollow' => [
                        'margin' => 0,
                        'size' => '70%',
                        'background' => '#fff',
                        'image' => null,
                        'imageOffsetX' => 0,
                        'imageOffsetY' => 0,
                        'position' => 'front',
                        'dropShadow' => [
                            'enabled' => true,
                            'top' => 3,
                            'left' => 0,
                            'blur' => 4,
                            'opacity' => 0.24,
                        ],
                    ],
                    'track' => [
                        'background' => '#fff',
                        'strokeWidth' => '67%',
                        'margin' => 0,
                        'dropShadow' => [
                            'enabled' => true,
                            'top' => -3,
                            'left' => 0,
                            'blur' => 4,
                            'opacity' => 0.35,
                        ],
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'offsetY' => -10,
                            'show' => true,
                            'color' => '#888',
                        ],
                        'value' => [
                            'color' => '#111',
                            'show' => true,
                        ],
                    ],

                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'horizontal',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#f43f5e'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'stroke' => [
                'lineCap' => 'round',
            ],
            'labels' => ['Percent'],
            'colors' => ['#6366f1'],

        ];
    }
}
