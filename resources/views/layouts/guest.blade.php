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
        <x-jet-banner />

        @livewire('guest-navigation-menu')

        <main style="background: #f7f7f7" class="font-sans antialiased">
            {{ $slot }}
        </main>

        <footer class="bg-gray-800 bottom-0 shadow-2xl">
            <div class="max-w-7xl sha mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="grid grid-cols-2 gap-8 xl:col-span-full">
                        <div class="md:grid md:grid-cols-3 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Partners
                                </h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="https://a2insights.com.br" target="_blank" rel="noopener" class="text-base text-gray-300 hover:text-white">
                                            A2insights
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://github.com/moka-soft" target="_blank" rel="noopener" class="text-base text-gray-300 hover:text-white">
                                            MokaSoft
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Legal
                                </h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="privacy-policy" class="text-base text-gray-300 hover:text-white">
                                            Privacy
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/terms-of-service" class="text-base text-gray-300 hover:text-white">
                                            Terms of Service
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-300 pt-8 md:flex md:items-center md:justify-between">
                    <div class="flex space-x-6 md:order-2">
                        <a target="_blank" href="https://github.com/moka-soft/speedest" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                        © {{ date('Y') }} {{ config('app.name', 'Octo') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    @stack('modals')
    @livewire('livewire-ui-modal')
    @livewireUIScripts
    @livewireScripts
</body>
</html>
