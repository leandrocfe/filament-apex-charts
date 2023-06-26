@php
    $heading = $this->getHeading();
    $subheading = $this->getSubheading();
    $filters = $this->getFilters();
    $indicatorsCount = $this->getIndicatorsCount();
    $darkMode = $this->getDarkMode();
    $width = 'xs';
    $pollingInterval = $this->getPollingInterval();
    $chartId = $this->getChartId();
    $filterFormAccessible = $this->getFilterFormAccessible();
    $loadingIndicator = $this->getLoadingIndicator();
    $contentHeight = $this->getContentHeight();
    $deferLoading = $this->getDeferLoading();
    $footer = $this->getFooter();
@endphp
<x-filament::widget class="filament-widgets-chart-widget filament-apex-charts-widget">
    <x-filament::card class="filament-apex-charts-card" x-data="{ dropdownOpen: false }"
        @apexhcharts-dropdown.window="dropdownOpen = event.detail.open">
        <div {!! $deferLoading ? ' wire:init="loadWidget" ' : '' !!}>

            <x-filament-apex-charts::header :$heading :$subheading :$filters :$indicatorsCount :$width
                :$filterFormAccessible>
                <x-slot:filterForm>
                    {{ $this->form }}
                </x-slot:filterForm>
            </x-filament-apex-charts::header>

            <x-filament-apex-charts::chart :$chartId :$options :$contentHeight :$pollingInterval :$loadingIndicator
                :$darkMode :$readyToLoad />

            @if ($footer)
                <div class="relative">
                    {!! $footer !!}
                </div>
            @endif

        </div>
    </x-filament::card>

</x-filament::widget>
