<div class="flex items-center justify-center" style="{{ $contentHeight ? 'height: ' . $contentHeight . 'px;' : '' }}">
    @if ($readyToLoad)
        <div {!! $pollingInterval ? 'wire:poll.' . $pollingInterval . '="updateChartOptions"' : '' !!} class="w-full" id="{{ $chartId }}" x-data="{
            chart: null,
            mode: localStorage.getItem('theme'),
            init: function() {
                let chart = this.initChart()
        
                $wire.on('updateChartOptions', async ({ options }) => {
        
                    options.theme.mode = this.mode
                    this.chart.updateOptions(options)
        
                })
                $wire.on('filterChartData', async ({ options }) => {
                    this.chart.updateOptions(options)
                })
            },
            initChart: function(options = null) {
        
                options = options ?? @js($getCachedOptions)
        
                options.theme.mode = this.mode
        
                this.chart = new ApexCharts(document.querySelector('#{{ $chartId }}'), options)
        
                return this.chart.render()
            },
        }"
            x-on:dark-mode-toggled.window="mode = $event.detail" x-init="$watch('mode', () => {
                @this.updateChartOptions();
            })" wire:ignore>

        </div>
    @else
        <div class="m-auto">
            @if ($viewLoadingIndicator)
                {{ \Illuminate\Support\Facades\View::make($viewLoadingIndicator) }}
            @else
                <x-filament-support::loading-indicator x-cloak wire:loading.delay class="w-7 h-7" />
            @endif
        </div>
    @endif
</div>
