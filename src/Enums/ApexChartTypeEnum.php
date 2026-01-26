<?php

namespace Leandrocfe\FilamentApexCharts\Enums;

enum ApexChartTypeEnum: string
{
    case Empty = '';
    case Area = 'area';
    case Bar = 'bar';
    case Boxplot = 'boxPlot';
    case Bubble = 'bubble';
    case Candlestick = 'candlestick';
    case Column = 'column';
    case Donut = 'donut';
    case Heatmap = 'heatmap';
    case Line = 'line';
    case Pie = 'pie';
    case PolarArea = 'polarArea';
    case Radar = 'radar';
    case Radialbar = 'radialBar';
    case RangeArea = 'rangeArea';
    case Scatter = 'scatter';
    case TimelineRangeBars = 'rangeBar';
    case Treemap = 'treemap';
    case Funnel = 'funnel';
}
