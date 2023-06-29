<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

trait HasLoadingIndicator
{
    protected static ?string $loadingIndicator = null;

    /**
     * Retrieves the loading indicator used in the class.
     */
    protected function getLoadingIndicator(): null|string|\Illuminate\Contracts\View\View
    {
        return static::$loadingIndicator;
    }
}
