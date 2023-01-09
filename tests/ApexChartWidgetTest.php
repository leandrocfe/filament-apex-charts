<?php

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

beforeEach(function () {
    $this->className = ApexChartWidget::class;
});

it('can set a chart id', function () {
    expect(property_exists($this->className, 'chartId'))->toBeTrue();
    expect(method_exists($this->className, 'getChartId'))->toBeTrue();
});

it('can set heading', function () {
    expect(property_exists($this->className, 'heading'))->toBeTrue();
    expect(method_exists($this->className, 'getHeading'))->toBeTrue();
});

it('can set chart options', function () {
    expect(property_exists($this->className, 'cachedOptions'))->toBeTrue();
    expect(property_exists($this->className, 'optionsChecksum'))->toBeTrue();
    expect(method_exists($this->className, 'generateOptionsChecksum'))->toBeTrue();
    expect(method_exists($this->className, 'getCachedOptions'))->toBeTrue();
    expect(method_exists($this->className, 'getOptions'))->toBeTrue();
});

it('can update chart options', function () {
    expect(method_exists($this->className, 'updateChartOptions'))->toBeTrue();
});

it('can set chart filters', function () {
    expect(property_exists($this->className, 'filter'))->toBeTrue();
    expect(method_exists($this->className, 'getFilters'))->toBeTrue();
});

it('can update chart filters', function () {
    expect(method_exists($this->className, 'updatedFilter'))->toBeTrue();
});
