<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    public $chartId;

    public $contentHeight;

    public $pollingInterval;

    public $readyToLoad;

    public $getCachedOptions;

    public $loadingIndicator;

    public function __construct($chartId, $contentHeight, $pollingInterval, $readyToLoad, $getCachedOptions, $loadingIndicator)
    {
        $this->chartId = $chartId;
        $this->contentHeight = $contentHeight;
        $this->pollingInterval = $pollingInterval;
        $this->readyToLoad = $readyToLoad;
        $this->getCachedOptions = $getCachedOptions;
        $this->loadingIndicator = $loadingIndicator;
    }

    public function render()
    {
        return view('filament-apex-charts::widgets.components.chart');
    }
}
