<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $heading;

    public $filters;

    public $filterForm;

    public $indicatorsCount;

    public function __construct($heading, $filters, $filterForm, $indicatorsCount)
    {
        $this->heading = $heading;
        $this->filters = $filters;
        $this->filterForm = $filterForm;
        $this->indicatorsCount = $indicatorsCount;
    }

    public function render()
    {
        return view('filament-apex-charts::widgets.components.header');
    }
}
