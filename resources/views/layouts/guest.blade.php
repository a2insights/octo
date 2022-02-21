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
    <div class="min-h-screen bg-gray-100">
        @livewire('octo-subscribe')

        <x-jet-banner />

        @livewire('navigation-menu')

        @livewire('switch-dashboard')

        <main class="font-sans antialiased">
            {{ $slot }}
        </main>

        <x-footer />
    </div>

    {{-- Jetstream --}}
    @stack('modals')

    @livewire('livewire-ui-modal')
    @livewireScripts
</body>

</html>
