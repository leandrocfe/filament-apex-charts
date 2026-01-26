<?php

namespace Leandrocfe\FilamentApexCharts\Widgets;

use Filament\Schemas\Contracts\HasSchemas;
use Filament\Support\RawJs;
use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Leandrocfe\FilamentApexCharts\Concerns\CanDeferLoading;
use Leandrocfe\FilamentApexCharts\Concerns\CanFilter;
use Leandrocfe\FilamentApexCharts\Concerns\HasContentHeight;
use Leandrocfe\FilamentApexCharts\Concerns\HasDarkMode;
use Leandrocfe\FilamentApexCharts\Concerns\HasFooter;
use Leandrocfe\FilamentApexCharts\Concerns\HasHeader;
use Leandrocfe\FilamentApexCharts\Concerns\HasLoadingIndicator;

class ApexChartWidget extends Widget implements HasSchemas
{
    use CanDeferLoading;
    use CanFilter;
    use CanPoll;
    use HasContentHeight;
    use HasDarkMode;
    use HasFooter;
    use HasHeader;
    use HasLoadingIndicator;

    protected static ?string $chartId = null;

    protected string $view = 'filament-apex-charts::widgets.apex-chart-widget';

    public ?array $options = null;

    /**
     * Initializes the options for the object.
     */
    public function mount(): void
    {
        if (method_exists($this, 'getFiltersSchema')) {
            $this->getFiltersSchema()->fill();
        }

        $this->options = $this->processOptions($this->getOptions());

        if (! $this->getDeferLoading()) {
            $this->readyToLoad = true;
        }
    }

    public function on(): void {}

    public function render(): View
    {
        return view($this->view, []);
    }

    /**
     * Retrieves the chart id.
     *
     * @return string|null The chart id.
     */
    protected function getChartId(): ?string
    {
        return static::$chartId ?? 'apexChart_'.Str::random(10);
    }

    /**
     * Returns an array of chart options for displaying a line chart of customer data.
     *
     * @return array Array of chart options
     */
    protected function getOptions(): array
    {
        return [];
    }

    /**
     * Updates the options of the class and emits an event if the options have changed.
     */
    public function updateOptions(): void
    {
        $processedOptions = $this->processOptions($this->getOptions());

        if ($this->options !== $processedOptions) {

            $this->options = $processedOptions;

            if (! $this->dropdownOpen) {
                $this
                    ->dispatch('updateOptions', options: $this->options)
                    ->self();
            }
        }
    }

    /**
     * Returns extra JavaScript options.
     */
    protected function extraJsOptions(): ?RawJs
    {
        return null;
    }

    /**
     * Process options array and convert backed enums to their values.
     */
    protected function processOptions(array $options): array
    {
        return array_map(function ($value) {
            if ($value instanceof \BackedEnum) {
                return $value->value;
            }

            if (is_array($value)) {
                return $this->processOptions($value);
            }

            return $value;
        }, $options);
    }
}
