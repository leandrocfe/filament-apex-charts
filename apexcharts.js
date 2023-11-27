import ApexCharts from 'apexcharts'

export default function apexcharts({
    options,
    chartId,
    theme
}) {
    return {
        chart: null,
        options,
        chartId,
        theme,
        init: function () {

            this.$wire.$on('updateOptions', ({ options }) => {
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
                                background: 'inherit'
                            }
                        })
                    }
                })
            })
        },
        initChart: function () {

            this.options.theme = { mode: this.theme }
            this.options.chart.background = 'inherit'

            this.chart = new ApexCharts(document.querySelector(this.chartId), this.options)
            this.chart.render()
        },
        updateChart: function (options) {
            this.chart.updateOptions(options, false, true, true)
        }
    }
}