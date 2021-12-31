<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-12 px-4 mt-4 sm:px-6 lg:px-8">
        @livewire('octo-system-list-users')
    </div>

</x-app-layout>
