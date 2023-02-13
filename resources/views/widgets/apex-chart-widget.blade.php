@php
    $chartId = $this->getChartId();
    $heading = $this->getHeading();
    $pollingInterval = $this->getPollingInterval();
    $contentHeight = $this->getContentHeight();
    $filters = $this->getFilters();
    $indicatorsCount = $this->indicatorsCount();
    $filterForm = $this->form;
    $readyToLoad = $this->readyToLoad;
    $getCachedOptions = $this->getCachedOptions();
    $filterFormAccessible = $this->getFilterFormAccessible();
    $loadingIndicator = $this->getLoadingIndicator();
    $footer = $this->getFooter();
    $deferLoading = $this->getDeferLoading();
    $darkModeEnabled = $this->getDarkMode();
@endphp

<x-filament::widget class="filament-widgets-chart-widget">
    <x-filament::card>

        <x-widget-content :chartId="$chartId" :pollingInterval="$pollingInterval" :deferLoading="$deferLoading">

            @if ($heading || $filters || $filterForm)
                <x-header :heading="$heading" :filters="$filters"
                    filterForm="{{ $filterFormAccessible ? $filterForm : null }}" :indicatorsCount="$indicatorsCount" />
            @endif

            <x-chart :chartId="$chartId" :contentHeight="$contentHeight" :pollingInterval="$pollingInterval" :readyToLoad="$readyToLoad" :getCachedOptions="$getCachedOptions"
                :loadingIndicator="$loadingIndicator" :darkModeEnabled="$darkModeEnabled" />

            @if ($footer)
                <div class="relative">
                    {!! $footer !!}
                </div>
            @endif
        </x-widget-content>

    </x-filament::card>
</x-filament::widget>
