<div wire:init="loadWidget" @apex-charts-dropdown-close.window="dropdownOpen = false" x-data="{ dropdownOpen: false, pollingInterval: '{{ $pollingInterval }}' }"
    x-init="$watch('dropdownOpen', function(value) {
    
        let chartElement = document.getElementById('{{ $chartId }}')
    
        if (pollingInterval) {
    
            if (value) {
                chartElement.removeAttribute('wire:poll.' + pollingInterval)
            } else {
                chartElement.setAttribute('wire:poll.' + pollingInterval, 'updateChartOptions')
            }
        }
    
    })">

    @if ($heading || $filters || $filterForm)
        <x-header :heading="$heading" :filters="$filters" filterForm="{{ $filterFormAccessible ? $filterForm : null }}"
            :indicatorsCount="$indicatorsCount" />
    @endif

    <x-chart :chartId="$chartId" :contentHeight="$contentHeight" :pollingInterval="$pollingInterval" :readyToLoad="$readyToLoad" :getCachedOptions="$getCachedOptions"
        :viewLoadingIndicator="$viewLoadingIndicator" />

    @if ($footer)
        <div class="relative">
            {!! $footer !!}
        </div>
    @endif

</div>
