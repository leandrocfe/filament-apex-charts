<?php

namespace Leandrocfe\FilamentApexCharts\Commands;

use Illuminate\Console\Command;

class FilamentApexChartsCommand extends Command
{
    public $signature = 'filament-apex-charts';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
