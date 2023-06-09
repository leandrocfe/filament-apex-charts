@props(['heading', 'subheading', 'filters', 'indicatorsCount', 'darkMode', 'width'])
<div>
    @if ($heading || $subheading || $filters || $filterForm)
        <div x-data="{ dropdownOpen: false }" class="sm:flex justify-between gap-4 py-2 relative">

            <div>
                @if ($heading)
                    <x-filament::card.heading>
                        {!! $heading !!}
                    </x-filament::card.heading>
                @endif

                @if ($subheading)
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        {!! $subheading !!}
                    </div>
                @endif
            </div>

            <div>
                @if ($filters)
                    <select wire:model="filter" @class([
                        'apex-charts-single-filter w-full text-gray-900 border-gray-300 block h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500',
                        'dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:border-primary-500' => config(
                            'filament.dark_mode'),
                    ]) wire:loading.class="animate-pulse">
                        @foreach ($filters as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div>
                <x-filament-apex-charts::filter-form :$indicatorsCount :$darkMode :$width>
                    {{ $filterForm }}
                </x-filament-apex-charts::filter-form>
            </div>

        </div>
    @endif
</div>
