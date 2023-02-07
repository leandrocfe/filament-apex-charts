<div>
    <div class="flex items-center justify-between gap-8 py-2">

        <x-filament::card.heading>
            {!! $heading !!}
        </x-filament::card.heading>

        <div class="relative my-32 h-10">

            <div class="flex items-center justify-between gap-4">
                @if ($filters)
                    <select wire:model="filter" @class([
                        'text-gray-900 border-gray-300 block h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500',
                        'dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:border-primary-500' => config(
                            'filament.dark_mode'),
                    ]) wire:loading.class="animate-pulse">
                        @foreach ($filters as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                @endif

                @if ($filterForm)
                    <x-filter-form width="xs" darkMode="{{ config('filament.dark_mode') }}" :indicatorsCount="$indicatorsCount">
                        {!! $filterForm !!}
                    </x-filter-form>
                @endif
            </div>
        </div>

    </div>

    <x-filament::hr class="py-2" />
</div>
