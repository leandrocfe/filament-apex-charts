<div {!! $deferLoading ? ' wire:init="loadWidget" ' : '' !!} @apex-charts-dropdown-close.window="dropdownOpen = false" x-data="{ dropdownOpen: false, pollingInterval: '{{ $pollingInterval }}' }"
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

    {{ $slot }}

</div>
