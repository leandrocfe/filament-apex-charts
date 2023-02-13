<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class FilterForm extends Component
{
    public $width = 'sm';

    public $darkMode = false;

    public $indicatorsCount = 0;

    public function __construct($width, $darkMode, $indicatorsCount)
    {
        $this->width = $width;
        $this->darkMode = $darkMode;
        $this->indicatorsCount = $indicatorsCount;
    }

    public function render()
    {
        return view('filament-apex-charts::widgets.components.filter-form');
    }
}
