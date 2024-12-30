<?php

namespace Leandrocfe\FilamentApexCharts;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentApexChartsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-apex-charts';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @phpstan-ignore-next-line */
        return filament(app(static::class)->getId());
    }

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}
}
