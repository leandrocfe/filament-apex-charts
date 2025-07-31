import ApexCharts from 'apexcharts'
var merge = require('lodash.merge');

export default function apexcharts({
    options,
    chartId,
    theme,
    extraJsOptions
}) {
    return {
        chart: null,
        options,
        chartId,
        theme,
        extraJsOptions,
        init: function () {

            this.$wire.$on('updateOptions', ({ options }) => {

                options = merge(options, this.extraJsOptions)
                this.updateChart(options)
            })

            Alpine.effect(() => {

                const theme = Alpine.store('theme')

                this.$nextTick(() => {

                    if (this.chart === null) {
                        this.initChart()
                    } else {

                        this.updateChart({
                            theme: { mode: theme },
                            chart: {
                                background: this.options.chart.background || 'inherit'
                            }
                        })
                    }
                })
            })

            document.querySelectorAll('.fi-wi-chart-filter > .fi-dropdown-panel').forEach(el => {
                el.style.zIndex = '20';
            });
        },
        initChart: function () {

            this.options.theme = { mode: this.theme }
            this.options.chart.background = this.options.chart.background || 'inherit'

            this.options = merge(this.options, this.extraJsOptions)

            this.chart = new ApexCharts(document.querySelector(this.chartId), this.options)
            this.chart.render()
        },
        updateChart: function (options) {
            this.chart.updateOptions(options, false, true, true)
        },
    }
}
