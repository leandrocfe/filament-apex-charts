@php
    $heading = $this->getHeading();
    $filters = $this->getFilters();
    $indicatorsCount = $this->indicatorsCount();
    $contentHeight = $this->getContentHeight();
    $filterForm = $this->form;
    $chartId = $this->getChartId();
    $pollingInterval = $this->getPollingInterval();
@endphp

<x-filament::widget class="filament-widgets-chart-widget">

    <x-filament::card>
        <div wire:init="loadWidget" x-data="{ dropdownOpen: false, pollingInterval: '{{ $pollingInterval }}' }" x-init="$watch('dropdownOpen', function(value) {
        
            let chartElement = document.getElementById('{{ $chartId }}')
        
            if (pollingInterval) {
        
                if (value) {
        
                    chartElement.removeAttribute('wire:poll.' + pollingInterval)
        
                } else {
        
                    chartElement.setAttribute('wire:poll.' + pollingInterval, 'updateChartOptions')
                }
            }
        
        })"
            @apex-charts-dropdown-close.window="dropdownOpen = false">

            @if ($heading || $filters)
                <div class="flex items-center justify-between gap-8">
                    @if ($heading)
                        <x-filament::card.heading>
                            {{ $heading }}
                        </x-filament::card.heading>
                    @endif

                    @if ($filters)
                        <select wire:model="filter" @class([
                            'text-gray-900 border-gray-300 block h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500',
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

                    <x-dropdown width="xs" darkMode="{{ config('filament.dark_mode') }}" :indicatorsCount="$indicatorsCount">
                        {{ $filterForm }}
                    </x-dropdown>

                </div>

                <x-filament::hr />
            @endif

            <div class="flex items-center justify-center"
                style="{{ $contentHeight ? 'height: ' . $contentHeight . 'px;' : '' }}">
                @if (count($this->getOptions()) > 0)
                    <div {!! $pollingInterval ? 'wire:poll.' . $pollingInterval . '="updateChartOptions"' : '' !!} class="w-full" id="{{ $chartId }}" x-data="{
                        chart: null,
                        init: function() {
                            let chart = this.initChart()
                    
                            $wire.on('updateChartOptions', async ({ options }) => {
                    
                                this.chart.updateOptions(options)
                    
                            })
                            $wire.on('filterChartData', async ({ options }) => {
                                this.chart.updateOptions(options)
                            })
                        },
                        initChart: function(options = null) {
                    
                            options = options ?? @js($this->getCachedOptions())
                    
                            this.chart = new ApexCharts(document.querySelector('#{{ $chartId }}'), options)
                    
                            return this.chart.render()
                        },
                    }"
                        wire:ignore>
                    </div>
                @else
                    <div class="m-auto">
                        <x-filament-support::loading-indicator x-cloak wire:loading.delay class="w-7 h-7" />
                    </div>
                @endif

            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
