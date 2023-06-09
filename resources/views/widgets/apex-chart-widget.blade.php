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

        <x-filament-apex-charts::header :$heading :$subheading :$filters :$indicatorsCount :$darkMode :$width>
            <x-slot:filterForm>
                {{ $this->form }}
            </x-slot:filterForm>
        </x-filament-apex-charts::header>

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
