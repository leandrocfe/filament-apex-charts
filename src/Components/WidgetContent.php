<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class WidgetContent extends Component
{
    public $chartId;

    public $pollingInterval;

    public $deferLoading;

    public function __construct($chartId, $pollingInterval, $deferLoading)
    {
        $this->chartId = $chartId;
        $this->pollingInterval = $pollingInterval;
        $this->deferLoading = $deferLoading;
    }

    public function render()
    {
        return view('filament-apex-charts::widgets.components.widget-content');
    }
}
