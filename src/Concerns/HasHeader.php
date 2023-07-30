<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

trait HasHeader
{
    protected static ?string $heading = null;

    protected static ?string $subheading = null;

    /**
     * Retrieves the heading used in the class.
     *
     * @return ?string
     */
    protected function getHeading(): ?string
    {
        return static::$heading;
    }

    /**
     * Retrieves the subheading used in the class.
     *
     * @return ?string
     */
    protected function getSubheading(): ?string
    {
        return static::$subheading;
    }
}
