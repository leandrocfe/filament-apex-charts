@php
    $plugin = (function_exists('filament') && filament()->isServing()) ? \Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin::get() : null;
    $heading = $this->getHeading();
    $subheading = $this->getSubheading();
    $filters = $this->getFilters();
    $indicatorsCount = $this->getIndicatorsCount();
    $darkMode = $this->getDarkMode();
    $width = $this->getFilterFormWidth();
    $pollingInterval = $this->getPollingInterval();
    $chartId = $this->getChartId();
    $chartOptions = $this->getOptions();
    $filterFormAccessible = $this->getFilterFormAccessible();
    $loadingIndicator = $this->getLoadingIndicator();
    $contentHeight = $this->getContentHeight();
    $deferLoading = $this->getDeferLoading();
    $footer = $this->getFooter();
    $readyToLoad = $this->readyToLoad;
    $extraJsOptions = $this->extraJsOptions();
@endphp
<x-filament-widgets::widget class="filament-widgets-chart-widget filament-apex-charts-widget">
    <x-filament::card class="filament-apex-charts-card">
        <div x-data="{ dropdownOpen: false }" @apexhcharts-dropdown.window="dropdownOpen = $event.detail.open">

            <x-filament-apex-charts::header :heading=$heading :subheading=$subheading :filters=$filters :indicatorsCount=$indicatorsCount :width=$width
                :filterFormAccessible=$filterFormAccessible >
                <x-slot:filterForm>
                    {{ $this->form }}
                </x-slot:filterForm>
            </x-filament-apex-charts::header>

            <x-filament-apex-charts::chart :chartId=$chartId
                                           :chartOptions=$chartOptions
                                           :contentHeight=$contentHeight
                                           :pollingInterval=$pollingInterval
                                           :loadingIndicator=$loadingIndicator
                                           :darkMode=$darkMode
                                           :deferLoading=$deferLoading
                                           :readyToLoad=$readyToLoad
                                           :extraJsOptions=$extraJsOptions />

            @if ($footer)
                <div class="relative">
                    {!! $footer !!}
                </div>
            @endif
        </div>
    </x-filament::card>
</x-filament-widgets::widget>
