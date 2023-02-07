<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class WidgetContent extends Component
{
    public $chartId;

    public $pollingInterval;

    public function __construct($chartId, $pollingInterval)
    {
        $this->chartId = $chartId;
        $this->pollingInterval = $pollingInterval;
    }

    public function render()
    {
        return view('filament-apex-charts::widgets.components.widget-content');
    }
}
