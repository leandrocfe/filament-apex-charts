<div class="flex items-center justify-center" style="{{ $contentHeight ? 'height: ' . $contentHeight . 'px;' : '' }}">
    @if ($readyToLoad)
        <div {!! $pollingInterval ? 'wire:poll.' . $pollingInterval . '="updateChartOptions"' : '' !!} class="w-full" id="{{ $chartId }}" x-data="{
            chart: null,
            darkModeEnabled: {{ $darkModeEnabled ? 'true' : 'false' }},
            mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
            init: function() {
        
                let chart = this.initChart()
        
                $wire.on('updateChartOptions', async ({ options }) => {
        
                    if (this.darkModeEnabled) {
                        options.theme.mode = document.documentElement.classList.contains('dark') ? 'dark' : 'light'
                    }
        
                    this.chart.updateOptions(options)
        
                })
                $wire.on('filterChartData', async ({ options }) => {
                    this.chart.updateOptions(options)
                })
            },
            initChart: function(options = null) {
        
                options = options ?? @js($getCachedOptions)
        
                if (this.darkModeEnabled) {
                    options.theme.mode = this.mode
                }
        
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
            @if ($loadingIndicator)
                {!! $loadingIndicator !!}
            @else
                <x-filament::loading-indicator class="h-7 w-7 text-gray-500 dark:text-gray-400"
                    wire:loading.delay="" />
            @endif
        </div>
    @endif
</div>
