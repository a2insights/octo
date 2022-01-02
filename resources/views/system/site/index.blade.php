<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Site') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('octo-system-site-info')

            <x-jet-section-border />

            @livewire('octo-system-site-sections')
        </div>
    </div>

</x-app-layout>
