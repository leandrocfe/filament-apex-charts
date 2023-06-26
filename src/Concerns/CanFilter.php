<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Arr;

trait CanFilter
{
    use InteractsWithForms;

    public ?string $filter = null;

    public array $filterFormData;

    public bool $dropdownOpen = false;

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
        $this->emitSelf('updateOptions', [
            'options' => $this->getOptions()
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('filter')
        ];
    }

    public function submitFiltersForm(): void
    {
        $this->form->validate();

        $this->emitSelf('updateOptions', [
            'options' => $this->getOptions()
        ]);

        $this->dispatchBrowserEvent('apexhcharts-dropdown', ['open' => false]);
    }

    public function resetFiltersForm(): void
    {
        $this->form->fill();
        $this->form->validate();
        $this->emitSelf('updateOptions', [
            'options' => $this->getOptions()
        ]);

        $this->dispatchBrowserEvent('apexhcharts-dropdown', ['open' => false]);
    }

    public function getIndicatorsCount(): int
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
