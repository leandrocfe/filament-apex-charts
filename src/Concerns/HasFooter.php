<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

trait HasFooter
{
    protected static ?string $footer = null;

    /**
     * Retrieves the footer string or view object.
     *
     * @return null|string|\Illuminate\Contracts\View\View The footer value.
     */
    protected function getFooter(): null|string|\Illuminate\Contracts\View\View
    {
        return static::$footer;
    }
}
