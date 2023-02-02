<?php

namespace Leandrocfe\FilamentApexCharts\Widgets;

use Filament\Forms;
use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;
use Illuminate\Support\Arr;

class ApexChartWidget extends Widget implements Forms\Contracts\HasForms
{
    use CanPoll;
    use Forms\Concerns\InteractsWithForms;

    protected static string $chartId = 'apexChart';

    protected static string $view = 'filament-apex-charts::widgets.apex-chart-widget';

    protected ?array $cachedOptions = null;

    public string $optionsChecksum;

    public ?string $filter = null;

    protected static ?string $heading = null;

    public $filterFormData;

    protected static ?int $contentHeight = null;

    public bool $readyToLoad = false;

    protected function getChartId(): ?string
    {
        return static::$chartId;
    }

    protected function getHeading(): ?string
    {
        return static::$heading;
    }

    protected function getContentHeight(): ?int
    {
        return static::$contentHeight;
    }

    public function loadWidget(): bool
    {
        return $this->readyToLoad = true;
    }

    protected function getFormStatePath(): string
    {
        return 'filterFormData';
    }

    public function mount()
    {
        $this->form->fill();
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

    public function updateChartOptions(): void
    {
        $this->form->validate();

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

    protected function getFormSchema(): array
    {
        return [];
    }

    public function submitFiltersForm(): void
    {
        $this->form->validate();
        $this->emitSelf('updateChartOptions', [
            'options' => $this->getCachedOptions(),
        ]);

        $this->dispatchBrowserEvent('apex-charts-dropdown-close');
    }

    public function resetFiltersForm(): void
    {
        $this->form->fill();
        $this->form->validate();
        $this->emitSelf('updateChartOptions', [
            'options' => $this->getCachedOptions(),
        ]);

        $this->dispatchBrowserEvent('apex-charts-dropdown-close');
    }

    public function indicatorsCount(): int
    {
        return count(
            Arr::where($this->filterFormData, function ($value) {
                return null !== $value;
            })
        );
    }
}
