<footer class="border-t px-6 py-3 flex shrink-0 items-center gap-3 filament-sidebar-footer">
    @php
        $user = \Filament\Facades\Filament::auth()->user();
    @endphp


    <div>
        <a href="#">
            <p class="text-sm font-bold">
                {{ \Filament\Facades\Filament::getUserName($user) }}
            </p>
        </a>

        <form action="{{ route('filament.auth.logout') }}" method="post" class="text-sm">
            @csrf

            <button
                type="submit"
                @class([
                    'text-gray-600 hover:text-primary-500 focus:outline-none focus:underline',
                    'dark:text-gray-300 dark:hover:text-primary-500' => config('filament.dark_mode'),
                ])
            >
                {{ __('filament::widgets/account-widget.buttons.logout.label') }}
            </button>
        </form>
    </div>
</footer>
