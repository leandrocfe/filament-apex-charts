@php
    $heading = $this->getHeading();
    $subheading = $this->getSubheading();
    $filters = $this->getFilters();
    $indicatorsCount = 3;
    $darkMode = true;
    $width = 'xs';
    $pollingInterval = $this->getPollingInterval();
    $chartId = $this->getChartId();
@endphp
<x-filament::widget class="filament-widgets-chart-widget">
    <x-filament::card>

        @if ($heading)
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
                    <x-tables::filters.trigger @click="dropdownOpen = !dropdownOpen" :indicators-count="$indicatorsCount" />

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>

                    <div x-show="dropdownOpen" @class([
                        'absolute right-0 mt-2 divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-black/5 transition z-10',
                        'dark:divide-gray-700 dark:bg-gray-800 dark:ring-white/10' => $darkMode,
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

                            <div class="mt-4 text-end flex gap-6 justify-end">
                                <x-tables::button wire:click="submitFiltersForm" color="primary" tag="button"
                                    size="sm">
                                    {{ __('filament-support::actions/modal.actions.submit.label') }}
                                </x-tables::button>
                                <x-tables::link wire:click="resetFiltersForm" color="danger" tag="button"
                                    size="sm">
                                    {{ __('tables::table.filters.buttons.reset.label') }}
                                </x-tables::link>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endif

        <div wire:ignore {!! $pollingInterval ? 'wire:poll.' . $pollingInterval . '="updateOptions"' : '' !!} class="w-full" x-data="{
            chart: null,
            options: @js($options),
            theme: document.querySelector('html').matches('.dark') ? 'dark' : 'light',
            init() {
                $wire.on('updateOptions', async ({ options }) => {
                    this.chart.updateOptions(options, false, true, true);
                });
        
                this.options.theme = { mode: this.theme };
                this.options.chart.background = 'inherit';
        
                this.chart = new ApexCharts($refs.{{ $chartId }}, this.options);
                this.chart.render();
            }
        }"
            x-on:dark-mode-toggled.window="chart.updateOptions( { theme: { mode: $event.detail } } )">
            <div x-ref="{{ $chartId }}" id="{{ $chartId }}"></div>
        </div>
    </x-filament::card>

</x-filament::widget>
