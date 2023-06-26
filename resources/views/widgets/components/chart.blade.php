@props(['chartId', 'options', 'contentHeight', 'pollingInterval', 'loadingIndicator', 'readyToLoad'])
<div class="filament-apex-charts-chart flex items-center justify-center"
    style="{{ $contentHeight ? 'height: ' . $contentHeight . 'px;' : '' }}">
    @if ($readyToLoad)
        <div wire:ignore {!! $pollingInterval ? 'wire:poll.' . $pollingInterval . '="updateOptions"' : '' !!} class="filament-apex-charts-chart-element w-full" x-data="{
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
            @dark-mode-toggled.window="chart.updateOptions( { theme: { mode: $event.detail } } )" x-init="$watch('dropdownOpen', value => $wire.dropdownOpen = value)">
            <div class="filament-apex-charts-chart-object" x-ref="{{ $chartId }}" id="{{ $chartId }}"></div>
        </div>
    @else
        <div class="filament-apex-charts-chart-loading-indicator m-auto">
            @if ($loadingIndicator)
                {!! $loadingIndicator !!}
            @else
                <x-filament-support::loading-indicator x-cloak wire:loading.delay class="w-7 h-7" />
            @endif
        </div>
    @endif
</div>
