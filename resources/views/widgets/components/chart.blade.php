<div class="flex items-center justify-center" style="{{ $contentHeight ? 'height: ' . $contentHeight . 'px;' : '' }}">
    @if ($readyToLoad)
        <div {!! $pollingInterval ? 'wire:poll.' . $pollingInterval . '="updateChartOptions"' : '' !!} class="w-full" id="{{ $chartId }}" x-data="{
            chart: null,
            mode: localStorage.getItem('theme'),
            cachedOptions: @js($getCachedOptions),
            init: function(animations = true) {
                let chart = this.initChart(null, animations)
        
                $wire.on('updateChartOptions', async ({ options }) => {
        
                    this.chart.updateOptions(options)
        
                })
                $wire.on('filterChartData', async ({ options }) => {
                    this.chart.updateOptions(options)
                })
            },
            initChart: function(options = null, animations = true) {
        
                options = options ?? @js($getCachedOptions)
        
                options.theme.mode = this.mode
                options.chart.animations.enabled = animations
        
                this.chart = new ApexCharts(document.querySelector('#{{ $chartId }}'), options)
        
                return this.chart.render()
            },
            updateChart: function() {
                this.init(false)
            }
        }"
            x-on:dark-mode-toggled.window="mode = $event.detail" x-init="$watch('mode', (value) => {
                chart.destroy();
                updateChart();
            
            })" wire:ignore>

        </div>
    @else
        <div class="m-auto">
            <x-filament-support::loading-indicator x-cloak wire:loading.delay class="w-7 h-7" />
        </div>
    @endif
</div>
