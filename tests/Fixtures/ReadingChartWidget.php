<?php

namespace Leandrocfe\FilamentApexCharts\Tests\Fixtures;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ReadingChartWidget extends ApexChartWidget
{
    protected static ?string $chartId = 'reading';

    public int $reading = 1;

    protected function getOptions(): array
    {
        return ['series' => [['name' => 'reading', 'data' => [$this->reading]]]];
    }
}
