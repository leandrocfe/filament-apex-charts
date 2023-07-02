@props(['indicatorsCount', 'width'])
<div class="filament-apex-charts-filter-form relative">
    <div class="filament-dropdown-trigger cursor-pointer flex items-center justify-center" aria-expanded="false">
        <button type="button" @click="dropdownOpen = !dropdownOpen"
            class="filament-icon-button relative flex items-center justify-center outline-none transition disabled:pointer-events-none disabled:opacity-70 rounded-full hover:bg-gray-500/5 dark:hover:bg-gray-300/5 text-gray-500 focus:bg-gray-500/10 w-10 h-10 filament-actions-icon-button-action"
            title="Filter">

            <span class="sr-only">
                Filter
            </span>

            <x-filament::icon name="heroicon-s-funnel" size="h-6 w-6" />

            @if ($indicatorsCount > 0)
                <span
                    class="filament-icon-button-indicator absolute -top-0.5 -end-0.5 inline-flex items-center justify-center h-4 w-4 rounded-full text-[0.5rem] font-medium text-white bg-primary-600">
                    {{ $indicatorsCount }}
                </span>
            @endif

        </button>
    </div>

    <div x-show="dropdownOpen" x-cloak @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

    <div x-show="dropdownOpen" x-cloak @class([
        'absolute mt-2 z-10 w-screen divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-gray-950/5 transition dark:divide-gray-700 dark:bg-gray-800 dark:ring-white/20',
    ])
        style="{{ match ($width) {
            'xs' => 'width: 20rem;',
            'sm' => 'width: 24rem;',
            'md' => 'width: 28rem;',
            'lg' => 'width: 32rem;',
            'xl' => 'width: 36rem;',
            '2xl' => 'width: 42rem;',
            '3xl' => 'width: 48rem;',
            '4xl' => 'width: 56rem;',
            '5xl' => 'width: 64rem;',
            '6xl' => 'width: 72rem;',
            '7xl' => 'width: 80rem;',
            default => 'width: 20rem;',
        } }}; right:0">
        <div class="py-4 px-6">

            {{ $slot }}

            <div class="mt-4 text-end flex gap-6 justify-end">
                <x-filament::link wire:click="submitFiltersForm" color="primary" tag="button" size="sm">
                    {{ __('filament-actions::modal.actions.submit.label') }}
                </x-filament::link>

                <x-filament::link wire:click="resetFiltersForm" color="danger" tag="button" size="sm">
                    {{ __('filament-tables::table.filters.buttons.reset.label') }}
                </x-filament::link>
            </div>
        </div>

    </div>
</div>
