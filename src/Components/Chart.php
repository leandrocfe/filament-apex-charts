<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    public function __construct(
        public $chartId,
        public $chartOptions,
        public $contentHeight,
        public $pollingInterval,
        public $loadingIndicator,
        public $darkMode,
        public $deferLoading,
        public $readyToLoad,
        public $extraJsOptions
    ) {}

    /**
     * Renders a view for the chart component.
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament-apex-charts::widgets.components.chart');
    }
}
