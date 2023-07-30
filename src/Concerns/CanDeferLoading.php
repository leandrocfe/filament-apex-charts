<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

trait CanDeferLoading
{
    protected static bool $deferLoading = false;

    public bool $readyToLoad = false;

    /**
     * Retrieves the value of the static property $deferLoading.
     *
     * @return ?bool The value of the static property $deferLoading, or null if it is not set.
     */
    protected function getDeferLoading(): ?bool
    {
        return static::$deferLoading;
    }

    /**
     * Loads the widget.
     */
    public function loadWidget(): void
    {
        $this->readyToLoad = true;
    }
}
