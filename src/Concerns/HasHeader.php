<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

trait HasHeader
{
    protected static ?string $heading = null;
    protected static ?string $subheading = null;

    protected function getHeading(): ?string
    {
        return static::$heading;
    }

    protected function getSubheading(): ?string
    {
        return static::$subheading;
    }
}
