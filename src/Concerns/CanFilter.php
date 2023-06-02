<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Arr;

trait CanFilter
{
    use InteractsWithForms;

    public ?string $filter = null;

    public $filterFormData;

    protected function getFormStatePath(): string
    {
        return 'filterFormData';
    }

    protected function getFilters(): ?array
    {
        return null;
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
