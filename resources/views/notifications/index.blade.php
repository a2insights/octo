<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-500 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="mt-1 flex flex-col">
        @livewire('octo-list-notifications')
    </div>
</x-app-layout>
