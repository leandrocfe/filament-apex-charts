<?php

namespace Leandrocfe\FilamentApexCharts\Concerns;

use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Support\Enums\Width;

trait CanFilter
{
    use InteractsWithSchemas;

    protected static Width|string $filterFormWidth = Width::ExtraSmall;

    public ?string $filter = null;

    public bool $dropdownOpen = false;

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
     * Retrieves the value of the static property $filterFormWidth.
     *
     * @return Width | string The value of the $filterFormWidth property, which is either a MaxWidth instance or a string.
     */
    protected function getFilterFormWidth(): Width|string
    {
        return static::$filterFormWidth;
    }
}
