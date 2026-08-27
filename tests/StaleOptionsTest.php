<?php

use Leandrocfe\FilamentApexCharts\Tests\Fixtures\ReadingChartWidget;

it('refreshes its options before each render, not only on mount', function () {
    $widget = new ReadingChartWidget;
    $widget->mount();

    expect($widget->options['series'][0]['data'])->toBe([1]);

    // Whatever the options are derived from has changed since mount — a reactive
    // property fed by a page filter, a Livewire property, the clock.
    $widget->reading = 2;
    $widget->rendering();

    expect($widget->options['series'][0]['data'])->toBe([2]);
});
