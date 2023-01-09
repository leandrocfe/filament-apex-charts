@php
    $heading = $this->getHeading();
    $filters = $this->getFilters();
@endphp

<x-filament::widget class="filament-widgets-chart-widget">
    <x-filament::card>
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
                            'filament.dark_mode'
                        ),
                    ]) wire:loading.class="animate-pulse">
                        @foreach ($filters as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>

            <x-filament::hr />
        @endif

        <div {!! ($pollingInterval = $this->getPollingInterval())
            ? "wire:poll.{$pollingInterval}=\"updateChartOptions\""
            : '' !!}>

            @if (count($this->getOptions()) > 0)
                <div id="{{ $this->getChartId() }}" x-data="{
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
                
                        this.chart = new ApexCharts(document.querySelector('#{{ $this->getChartId() }}'), options)
                
                        return this.chart.render()
                    },
                }" wire:ignore>
                </div>
            @else
                <p>No chart data available.</p>
            @endif
        </div>
    </x-filament::card>
</x-filament::widget>
