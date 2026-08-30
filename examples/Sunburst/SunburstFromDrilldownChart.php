<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

/**
 * A sunburst reads the same `series` + `drilldown.series` config a drilldown
 * donut uses, so an existing drilldown widget becomes a sunburst by flipping
 * `chart.type` — every level is drawn at once instead of one click at a time.
 */
class SunburstFromDrilldownChart extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'sunburstFromDrilldownChart';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'SunburstFromDrilldownChart';

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
                    'name' => 'Devices',
                    'data' => [
                        ['x' => 'Mobile', 'y' => 55, 'drilldown' => 'mobile'],
                        ['x' => 'Desktop', 'y' => 33, 'drilldown' => 'desktop'],
                        ['x' => 'Tablet', 'y' => 12, 'drilldown' => 'tablet'],
                    ],
                ],
            ],
            'drilldown' => [
                'series' => [
                    [
                        'id' => 'mobile',
                        'name' => 'Mobile by OS',
                        'colors' => ['#0d47a1', '#1976d2', '#64b5f6'],
                        'data' => [
                            ['x' => 'iOS', 'y' => 30, 'drilldown' => 'mobile-ios'],
                            ['x' => 'Android', 'y' => 23],
                            ['x' => 'Other', 'y' => 2],
                        ],
                    ],
                    [
                        'id' => 'mobile-ios',
                        'name' => 'iOS Versions',
                        'colors' => ['#1565c0', '#42a5f5', '#90caf9'],
                        'data' => [
                            ['x' => 'iOS 17', 'y' => 18],
                            ['x' => 'iOS 16', 'y' => 9],
                            ['x' => 'iOS 15', 'y' => 3],
                        ],
                    ],
                    [
                        'id' => 'desktop',
                        'name' => 'Desktop by OS',
                        'colors' => ['#1b5e20', '#388e3c', '#66bb6a'],
                        'data' => [
                            ['x' => 'Windows', 'y' => 20],
                            ['x' => 'macOS', 'y' => 10],
                            ['x' => 'Linux', 'y' => 3],
                        ],
                    ],
                    [
                        'id' => 'tablet',
                        'name' => 'Tablet by OS',
                        'colors' => ['#e65100', '#fb8c00'],
                        'data' => [
                            ['x' => 'iPadOS', 'y' => 8],
                            ['x' => 'Android', 'y' => 4],
                        ],
                    ],
                ],
            ],
            'colors' => ['#1565c0', '#2e7d32', '#ef6c00'],
            'plotOptions' => [
                'sunburst' => [
                    'innerSize' => '20%',
                ],
            ],
            'stroke' => [
                'width' => 1,
                'colors' => ['#fff'],
            ],
            'title' => [
                'text' => 'Website traffic by device',
                'align' => 'left',
            ],
            'legend' => [
                'position' => 'bottom',
            ],
        ];
    }
}
