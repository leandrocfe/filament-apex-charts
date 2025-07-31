<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class FilterForm extends Component
{
    public function __construct(
        public $indicatorsCount,
        public $width
    ) {}

    /**
     * Renders the view for the filter-form component.
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament-apex-charts::widgets.components.filter-form');
    }
}
