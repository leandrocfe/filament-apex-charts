<?php

use Leandrocfe\FilamentApexCharts\Enums\ApexChartTypeEnum;

/**
 * The make command resolves its stub from the enum *case name*
 * (stubs/{$case->name}.stub), so a case without a matching stub makes
 * `make:filament-apex-charts` fail once that type is picked.
 */
it('has a stub for every chart type', function () {
    $missing = collect(ApexChartTypeEnum::cases())
        ->map(fn (ApexChartTypeEnum $type): string => $type->name)
        ->reject(fn (string $name): bool => file_exists(__DIR__.'/../stubs/'.$name.'.stub'))
        ->values()
        ->all();

    expect($missing)->toBeEmpty();
});

/**
 * dist/apexcharts.js is a committed build artifact, so a dependency bump that
 * is not followed by `node bin/build.js` silently keeps shipping the old
 * library — which is how chart types added upstream stayed unavailable.
 */
it('ships a dist built from the declared apexcharts major', function () {
    $package = json_decode((string) file_get_contents(__DIR__.'/../package.json'), true);
    $declared = $package['dependencies']['apexcharts'];

    expect($declared)->toMatch('/^\^\d+\.\d+\.\d+$/');

    $declaredMajor = (int) ltrim(explode('.', $declared)[0], '^');

    $dist = (string) file_get_contents(__DIR__.'/../dist/apexcharts.js');

    expect($dist)->toMatch('/ApexCharts v\d+\.\d+\.\d+/');

    preg_match('/ApexCharts v(\d+)\.\d+\.\d+/', $dist, $matches);

    expect((int) $matches[1])->toBe($declaredMajor);
});
