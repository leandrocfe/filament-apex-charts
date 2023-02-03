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
@endphp

<x-filament::widget class="filament-widgets-chart-widget">
    <x-filament::card>

        <x-widget-content :chartId="$chartId" :heading="$heading" :pollingInterval="$pollingInterval" :contentHeight="$contentHeight" :filters="$filters"
            :indicatorsCount="$indicatorsCount" :filterForm="$filterForm" :readyToLoad="$readyToLoad" :getCachedOptions="$getCachedOptions" :filterFormAccessible="$filterFormAccessible" />

    </x-filament::card>
</x-filament::widget>
