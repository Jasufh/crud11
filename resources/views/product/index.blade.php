<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar productos') }}
        </h2>
    </x-slot>

    {{-- Search --}}
    <div>

        @livewire('filter-bar')

    </div>



</x-app-layout>
