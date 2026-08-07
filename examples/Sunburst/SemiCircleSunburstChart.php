<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

/**
 * `startAngle` / `endAngle` crop the rings to a half disc, which keeps the
 * widget half as tall as a full sunburst for the same number of levels.
 */
class SemiCircleSunburstChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'semiCircleSunburstChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'SemiCircleSunburstChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'sunburst',
                'height' => 360,
            ],
            'series' => [
                [
                    'data' => [
                        [
                            'x' => 'Engineering',
                            'y' => 46,
                            'children' => [
                                ['x' => 'Platform', 'y' => 24],
                                ['x' => 'Product', 'y' => 14],
                                ['x' => 'QA', 'y' => 8],
                            ],
                        ],
                        [
                            'x' => 'Sales',
                            'y' => 28,
                            'children' => [
                                ['x' => 'Field', 'y' => 18],
                                ['x' => 'Inside', 'y' => 10],
                            ],
                        ],
                        [
                            'x' => 'Marketing',
                            'y' => 16,
                            'children' => [
                                ['x' => 'Brand', 'y' => 9],
                                ['x' => 'Growth', 'y' => 7],
                            ],
                        ],
                        [
                            'x' => 'Operations',
                            'y' => 10,
                            'children' => [
                                ['x' => 'People', 'y' => 6],
                                ['x' => 'Finance', 'y' => 4],
                            ],
                        ],
                    ],
                ],
            ],
            'colors' => ['#6366f1', '#0ea5e9', '#22c55e', '#f97316'],
            'plotOptions' => [
                'sunburst' => [
                    'startAngle' => -90,
                    'endAngle' => 90,
                    'innerSize' => '30%',
                    'borderRadius' => 4,
                    'spacing' => 2,
                ],
            ],
            'stroke' => [
                'width' => 1,
                'colors' => ['#fff'],
            ],
            'title' => [
                'text' => 'Annual budget allocation',
                'align' => 'left',
            ],
            'legend' => [
                'position' => 'bottom',
            ],
        ];
    }
}
