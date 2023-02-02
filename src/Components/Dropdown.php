<?php

namespace Leandrocfe\FilamentApexCharts\Components;

use Illuminate\View\Component;

class Dropdown extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('filament-apex-charts::widgets.components.dropdown');
    }
}
