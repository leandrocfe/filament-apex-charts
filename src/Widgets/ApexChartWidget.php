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

    protected static bool $deferLoading = false;

    public bool $readyToLoad = false;

    protected static ?int $contentHeight = null;

    protected static ?string $loadingIndicator = null;

    protected static ?string $footer = null;

    protected static bool $darkMode = true;

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

    protected function getLoadingIndicator(): null|string|\Illuminate\Contracts\View\View
    {
        return static::$loadingIndicator;
    }

    protected function getFooter(): null|string|\Illuminate\Contracts\View\View
    {
        return static::$footer;
    }

    protected function getFormStatePath(): string
    {
        return 'filterFormData';
    }

    protected function getDeferLoading(): ?bool
    {
        return static::$deferLoading;
    }

    protected function getDarkMode(): ?bool
    {
        return static::$darkMode;
    }

    public function loadWidget(): void
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        if (! $this->getDeferLoading()) {
            $this->readyToLoad = true;
        }

        $this->form->fill();
        $this->optionsChecksum = $this->generateOptionsChecksum();
    }

    protected function generateOptionsChecksum(): string
    {
        return md5(json_encode($this->getCachedOptions()).rand(1, 1000));
    }

    protected function getCachedOptions(): array
    {
        if ($this->cachedOptions) {
            return $this->cachedOptions;
        }

        $options = $this->getOptions();

        if (! Arr::has($options, 'theme')) {
            $options = Arr::add($options, 'theme', ['mode' => static::$darkMode ? 'dark' : 'light']);
        }

        if (! Arr::has($options, 'chart.background')) {
            $options = Arr::add($options, 'chart.background', 'inherit');
        }

        if (! Arr::has($options, 'chart.animations.enabled')) {
            $options = Arr::add($options, 'chart.animations.enabled', true);
        }

        return $this->cachedOptions ??= $options;
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
        if ($this->getFilterFormAccessible()) {
            return count(
                Arr::where($this->filterFormData, function ($value) {
                    return null !== $value;
                })
            );
        }

        return 0;
    }

    public function getFilterFormAccessible(): bool
    {
        return Arr::accessible($this->filterFormData);
    }
}
