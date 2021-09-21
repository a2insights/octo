<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Octo') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <div class="min-h-screen flex-col h-screen bg-gray-100 pb-20">
        @livewire('octo-subscribe')

        <x-jet-banner />

        @livewire('navigation-menu')

        <main class="font-sans antialiased">
            {{ $slot }}
        </main>

        <x-footer>
            <div class="flex flex-col md:flex-row md:justify-between">
                @livewire('octo-subscribe', ['closable' => false, 'bg' => ''])
            </div>
            <x-slot name="navigation">
                <p>{{ config('app.name') }}</p>
                <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">About</a>
                <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">Services</a>
                <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">Why us</a>
                <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase">Contact</a>
            </x-slot>
        </x-footer>
    </div>

    @stack('modals')
    @livewire('livewire-ui-modal')
    @livewireUIScripts
    @livewireScripts
</body>
</html>
