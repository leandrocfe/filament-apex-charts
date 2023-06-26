<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    /**
     * Renders a view for the chart component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament-apex-charts::widgets.components.chart');
    }
}
