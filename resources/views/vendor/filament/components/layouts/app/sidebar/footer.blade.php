<footer class="border-t px-6 py-3 flex shrink-0 items-center gap-3 filament-sidebar-footer">
    @php
        $user = \Filament\Facades\Filament::auth()->user();
    @endphp

    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div class="flex-shrink-0 mr-3">
            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                alt="{{ Auth::user()->name }}" />
        </div>
    @else
        <div class="w-11 h-11 rounded-full bg-gray-200 bg-cover bg-center"
            style="background-image: url('{{ \Filament\Facades\Filament::getUserAvatarUrl($user) }}')"></div>
    @endif

    <div>
        <a href="{{ route('profile.show') }}">
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
