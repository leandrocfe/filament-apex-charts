<?php

namespace Leandrocfe\FilamentApexCharts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Leandrocfe\FilamentApexCharts\FilamentApexCharts
 */
class FilamentApexCharts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Leandrocfe\FilamentApexCharts\FilamentApexCharts::class;
    }
}
