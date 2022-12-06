<?php

namespace Leandrocfe\FilamentApexCharts\Widgets;

use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;

class ApexChartWidget extends Widget
{
    use CanPoll;

    protected static string $chartId = 'apexChart';

    protected static string $view = 'filament-apex-charts::widgets.apex-chart-widget';

    protected ?array $cachedOptions = null;

    public string $optionsChecksum;

    public ?string $filter = null;

    protected static ?string $heading = null;

    protected function getChartId(): ?string
    {
        return static::$chartId;
    }

    protected function getHeading(): ?string
    {
        return static::$heading;
    }

    public function mount()
    {
        $this->optionsChecksum = $this->generateOptionsChecksum();
    }

    protected function generateOptionsChecksum(): string
    {
        return md5(json_encode($this->getCachedOptions()));
    }

    protected function getCachedOptions(): array
    {
        return $this->cachedOptions ??= $this->getOptions();
    }

    protected function getOptions(): array
    {
        return [];
    }

    protected function getFilters(): ?array
    {
        return null;
    }

    public function updateChartOptions()
    {
        $newOptionsChecksum = $this->generateOptionsChecksum();

        if ($newOptionsChecksum !== $this->optionsChecksum) {
            $this->optionsChecksum = $newOptionsChecksum;

            $this->emitSelf('updateChartOptions', [
                'options' => $this->getCachedOptions(),
            ]);
        }
    }

    public function updatedFilter(): void
    {
        $newOptionsChecksum = $this->generateOptionsChecksum();

        if ($newOptionsChecksum !== $this->optionsChecksum) {
            $this->optionsChecksum = $newOptionsChecksum;

            $this->emitSelf('filterChartData', [
                'options' => $this->getCachedOptions(),
            ]);
        }
    }
}
