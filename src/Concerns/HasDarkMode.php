<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

trait HasDarkMode
{
    protected static bool $darkMode = true;

    /**
     * Retrieves the value of the static property $darkMode.
     *
     * @return ?bool The value of the $darkMode property, which is either a boolean or null.
     */
    protected function getDarkMode(): ?bool
    {
        return static::$darkMode;
    }
}
