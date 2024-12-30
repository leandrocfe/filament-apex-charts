<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Arr;

trait CanFilter
{
    use InteractsWithForms;

    protected static MaxWidth|string $filterFormWidth = MaxWidth::ExtraSmall;

    public ?string $filter = null;

    public ?array $filterFormData = [];

    public bool $dropdownOpen = false;

    /**
     * Retrieve the path for the form state.
     *
     * @return string The path for the form state.
     */
    protected function getFormStatePath(): string
    {
        return 'filterFormData';
    }

    /**
     * Retrieves the simple filter options.
     *
     * @return array|null The simple filter options.
     */
    protected function getFilters(): ?array
    {
        return null;
    }

    /**
     * Update the filter and emit an event with the updated options.
     */
    public function updatedFilter(): void
    {
        $this->dispatch('updateOptions', options: $this->getOptions())
            ->self();
    }

    /**
     * Retrieves the form schema.
     *
     * @return array The form schema.
     */
    protected function getFormSchema(): array
    {
        return [];
    }

    /**
     * Submit the filters form.
     */
    public function submitFiltersForm(): void
    {
        $this->form->validate();

        $this->dispatch('updateOptions', options: $this->getOptions())
            ->self();

        $this->dispatch('apexhcharts-dropdown', open: false);
    }

    /**
     * Reset the filters form.
     */
    public function resetFiltersForm(): void
    {
        $this->form->fill();
        $this->form->validate();

        $this->dispatch('updateOptions', options: $this->getOptions())
            ->self();

        $this->dispatch('apexhcharts-dropdown', open: false);
    }

    /**
     * Retrieves the count of indicators.
     *
     * @return int The count of indicators.
     */
    public function getIndicatorsCount(): int
    {
        if ($this->getFilterFormAccessible()) {
            return count(
                Arr::where($this->filterFormData, function ($value) {
                    return $value !== null;
                })
            );
        }

        return 0;
    }

    /**
     * Retrieves the accessibility of the filter form data.
     *
     * @return bool The accessibility of the filter form data.
     */
    public function getFilterFormAccessible(): bool
    {
        return Arr::accessible($this->filterFormData) && count($this->filterFormData) > 0;
    }

    /**
     * Retrieves the value of the static property $filterFormWidth.
     *
     * @return MaxWidth | string The value of the $filterFormWidth property, which is either a MaxWidth instance or a string.
     */
    protected function getFilterFormWidth(): MaxWidth|string
    {
        return static::$filterFormWidth;
    }
}
