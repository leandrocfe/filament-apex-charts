<?php

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

beforeEach(function () {
    $this->className = ApexChartWidget::class;
});

it('can set a chart id', function () {
    expect(property_exists($this->className, 'chartId'))->toBeTrue();
    expect(method_exists($this->className, 'getChartId'))->toBeTrue();
});

it('can set chart options', function () {
    expect(property_exists($this->className, 'cachedOptions'))->toBeTrue();
    expect(property_exists($this->className, 'optionsChecksum'))->toBeTrue();
    expect(property_exists($this->className, 'deferLoading'))->toBeTrue();
    expect(property_exists($this->className, 'readyToLoad'))->toBeTrue();
    expect(method_exists($this->className, 'generateOptionsChecksum'))->toBeTrue();
    expect(method_exists($this->className, 'getCachedOptions'))->toBeTrue();
    expect(method_exists($this->className, 'getOptions'))->toBeTrue();
    expect(method_exists($this->className, 'getDeferLoading'))->toBeTrue();
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

it('can set widget content options', function () {
    expect(property_exists($this->className, 'heading'))->toBeTrue();
    expect(property_exists($this->className, 'contentHeight'))->toBeTrue();
    expect(property_exists($this->className, 'footer'))->toBeTrue();
    expect(property_exists($this->className, 'loadingIndicator'))->toBeTrue();
    expect(method_exists($this->className, 'getHeading'))->toBeTrue();
    expect(method_exists($this->className, 'getContentHeight'))->toBeTrue();
    expect(method_exists($this->className, 'getFooter'))->toBeTrue();
    expect(method_exists($this->className, 'getLoadingIndicator'))->toBeTrue();
});

it('can set filter form', function () {
    expect(property_exists($this->className, 'filterFormData'))->toBeTrue();
    expect(method_exists($this->className, 'getFormStatePath'))->toBeTrue();
    expect(method_exists($this->className, 'getFormSchema'))->toBeTrue();
    expect(method_exists($this->className, 'submitFiltersForm'))->toBeTrue();
    expect(method_exists($this->className, 'resetFiltersForm'))->toBeTrue();
    expect(method_exists($this->className, 'indicatorsCount'))->toBeTrue();
    expect(method_exists($this->className, 'getFilterFormAccessible'))->toBeTrue();
});
