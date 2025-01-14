<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

trait HasHeader
{
    protected static ?string $heading = null;

    protected static ?string $subheading = null;

    /**
     * Retrieves the heading used in the class.
     */
    protected function getHeading(): null|string|Htmlable|View
    {
        return static::$heading;
    }

    /**
     * Retrieves the subheading used in the class.
     */
    protected function getSubheading(): null|string|Htmlable|View
    {
        return static::$subheading;
    }
}
