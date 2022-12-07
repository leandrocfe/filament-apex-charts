# Filament Apex Charts

[Apex Charts](https://apexcharts.com/) integration for [Filament](https://filamentphp.com/)

![dashboard demo](https://raw.githubusercontent.com/leandrocfe/filament-apex-charts/master/screenshots/dashboard-example-sm.gif)

## Installation

You can install the package via composer:

```bash
composer require leandrocfe/filament-apex-charts
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-apex-charts-views"
```

## Usage

Start by creating a widget with the command:

```bash
php artisan make:filament-apex-charts BlogPostsChart
```

### Available chart samples

You may choose:

-   Area
-   Bar
-   Boxplot
-   Bubble
-   Candlestick
-   Column
-   Donut
-   Heatmap
-   Line
-   Mixed-LineAndColumn
-   Pie
-   PolarArea
-   Radar
-   Radialbar
-   RangeArea
-   Scatter
-   TimelineRangeBars
-   Treemap

You may also create an **empty chart** by selecting the **Empty** option.

This command will create the **BlogPostsChart.php** file in _app\Filament\Widgets_. Ex:

```php
namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BlogPostsChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'blogPostsChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'BlogPostsChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'BlogPostsChart',
                    'data' => [7, 4, 6, 10, 14, 7, 5, 9, 10, 15, 13, 18],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
        ];
    }
}

```

Now, check out your new widget in the **dashboard**.

## Available options

The `getOptions()` method is used to return an array of options based on [Apex Charts Options](https://apexcharts.com/docs/options). This structure is identical with the **Apex Chart library**, which `Filament Apex Charts` uses to render charts. You may use the [Apex Chart documentation](https://apexcharts.com/docs/creating-first-javascript-chart/) to fully understand the possibilities to return from getOptions().

## Examples

[CHART DEMOS](examples/)

## Setting a widget title

You may set a widget title:

```php
protected static ?string $heading = 'Blog Posts Chart';
```

Optionally, you can use The `getHeading()` method.

## Setting a chart id

You may set a chart id:

```php
protected static string $chartId = 'blogPostsChart';
```

## Filtering chart data

You can set up chart filters to change the data shown on chart. Commonly, this is used to change the time period that chart data is rendered for.

To set a default filter value, set the `$filter` property:

```php
public ?string $filter = 'today';
```

Then, define the `getFilters()` method to return an array of values and labels for your filter:

```php
protected function getFilters(): ?array
{
    return [
        'today' => 'Today',
        'week' => 'Last week',
        'month' => 'Last month',
        'year' => 'This year',
    ];
}
```

You can use the active filter value within your `getOptions()` method:

```php
protected function getOptions(): array
{
    $activeFilter = $this->filter;

    // ...
}
```

## Live updating (polling)

By default, chart widgets refresh their data every 5 seconds.

To customize this, you may override the `$pollingInterval` property on the class to a new interval:

```php
protected static ?string $pollingInterval = '10s';
```

Alternatively, you may disable polling altogether:

```php
protected static ?string $pollingInterval = null;
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to <leandrocfe@gmail.com>.

## Credits

-   [Leandro Costa Ferreira](https://github.com/leandrocfe)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
