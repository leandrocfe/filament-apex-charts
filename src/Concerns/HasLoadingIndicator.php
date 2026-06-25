<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Illuminate\Contracts\View\View;

trait HasLoadingIndicator
{
    protected static ?string $loadingIndicator = null;

    /**
     * Retrieves the loading indicator used in the class.
     */
    protected function getLoadingIndicator(): null|string|View
    {
        return static::$loadingIndicator;
    }
}
