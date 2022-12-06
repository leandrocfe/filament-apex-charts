# Filament Apex Charts

[Apex Charts](https://apexcharts.com/) integration for [Filament](https://filamentphp.com/)

![screenshot](https://raw.githubusercontent.com/leandrocfe/filament-apex-charts/develop/screenshots/banner.jpg)

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

This command will create the BlogPostsChart.php file in app\Filament\Widgets:

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
            ],
            'series' => [
                [
                    'name' => 'Sales',
                    'data' => [90, 80, 70, 60, 50, 40, 40, 50, 60, 70, 80, 90],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            ],
        ];
    }
}
```

Now, check out your widget in the **dashboard**.

## Available options

The `getOptions()` method is used to return an array of options based on [Apex Charts Options](https://apexcharts.com/docs/options). This structure is identical with the **Apex Chart library**, which `Filament Apex Charts` uses to render charts. You may use the [Apex Chart documentation](https://apexcharts.com/docs/creating-first-javascript-chart/) to fully understand the possibilities to return from getOptions().

## Examples

soon

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
