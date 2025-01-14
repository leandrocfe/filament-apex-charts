<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

trait HasFooter
{
    protected static ?string $footer = null;

    protected function getFooter(): null|string|Htmlable|View
    {
        return static::$footer;
    }
}
