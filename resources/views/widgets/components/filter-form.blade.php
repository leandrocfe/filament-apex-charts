@props(['indicatorsCount', 'width'])
<div class="filament-apex-charts-filter-form">
    <x-tables::filters.trigger @click="dropdownOpen = !dropdownOpen" :indicators-count="$indicatorsCount" />

    <div x-show="dropdownOpen" x-cloak @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

    <div x-show="dropdownOpen" x-cloak @class([
        'absolute right-0 mt-2 divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-black/5 transition z-10',
        'dark:divide-gray-700 dark:bg-gray-800 dark:ring-white/10' => config(
            'filament.dark_mode'),
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
        } }}">
        <div class="py-4 px-6">

            {{ $slot }}

            <div class="mt-4 text-end flex gap-6 justify-end">
                <x-tables::button wire:click="submitFiltersForm" color="primary" tag="button" size="sm">
                    {{ __('filament-support::actions/modal.actions.submit.label') }}
                </x-tables::button>
                <x-tables::link @click="$wire.resetFiltersForm;dropdownOpen = false" color="danger" tag="button"
                    size="sm">
                    {{ __('tables::table.filters.buttons.reset.label') }}
                </x-tables::link>
            </div>
        </div>

    </div>
</div>
