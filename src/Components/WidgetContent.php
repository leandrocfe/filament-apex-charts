<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class WidgetContent extends Component
{
    public $chartId;

    public $heading;

    public $pollingInterval;

    public $contentHeight;

    public $filters;

    public $indicatorsCount;

    public $filterForm;

    public $readyToLoad;

    public $getCachedOptions;

    public $filterFormAccessible;

    public $viewLoadingIndicator;

    public $footer;

    public function __construct(
        $chartId,
        $heading,
        $pollingInterval,
        $contentHeight,
        $filters,
        $indicatorsCount,
        $filterForm,
        $readyToLoad,
        $getCachedOptions,
        $filterFormAccessible,
        $viewLoadingIndicator,
        $footer
    ) {
        $this->chartId = $chartId;
        $this->heading = $heading;
        $this->pollingInterval = $pollingInterval;
        $this->contentHeight = $contentHeight;
        $this->filters = $filters;
        $this->indicatorsCount = $indicatorsCount;
        $this->filterForm = $filterForm;
        $this->readyToLoad = $readyToLoad;
        $this->getCachedOptions = $getCachedOptions;
        $this->filterFormAccessible = $filterFormAccessible;
        $this->viewLoadingIndicator = $viewLoadingIndicator;
        $this->footer = $footer;
    }

    public function render()
    {
        return view('filament-apex-charts::widgets.components.widget-content');
    }
}
