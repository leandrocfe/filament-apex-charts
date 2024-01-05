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

            this.chart = new ApexCharts(document.querySelector(this.chartId), this.parseOptions(this.options))
            this.chart.render()
        },
        updateChart: function (options) {
            this.chart.updateOptions(this.parseOptions(options), false, true, true)
        },
        parseOptions: function (options) {
            if (options === undefined) {
                return options;
            }

            function evalFormatters(obj)
            {
                for (const [key, value] of Object.entries(obj))
                {
                    if (typeof obj[key] == "object" && obj[key] !== null) {
                        evalFormatters(obj[key]);
                    }

                    if (key === "formatter") {
                        eval("obj[key] =" + value);
                    }
                }
            }

            evalFormatters(options);

            return options;
        }
    }
}
