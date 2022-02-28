<x-guest-layout>
    @foreach (Octo\Octo::site()->sections as $section)
        @if ($section['theme'] === 'Hero')
            <section class="py-8 overflow-auto {{ @$section['theme_color'] }}">
                <div class="justify-center py-8">
                    <div class="container py-8 max-w-5xl mx-auto px-4 text-center">
                        <h1 class="text-5xl font-bold {{ @$section['title_color'] }}">
                            {{ @$section['title'] }}
                        </h1>
                        <div class="my-5">
                            <h3 class="{{ @$section['description_color'] }}">
                                {{ @$section['description'] }}
                            </h3>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (@$section['theme'] === 'Light')
            <section class="mx-auto max-w-5xl px-6 pb-5 md:py-2 {{ @$section['theme_color'] }}">
                <div class="flex items-center py-10 justify-center">
                    @if (@$section['image_align'] !== 'right')
                        <div class="w-full lg:w-1/2 lg:pr-10">
                            <img width="500px" src="{{ @$section['image_url'] }}" alt="{{ @$section['title'] }}"
                                class="mx-auto mb-6 lg:mb-0 hidden md:block">
                        </div>
                    @endif
                    <div class="mt-5">
                        <h2 class="text-6xl mb-3 font-bold {{ @$section['title_color'] }}">
                            {{ @$section['title'] }}
                        </h2>
                        <h3 class="text-2xl {{ @$section['description_color'] }}">
                            {{ @$section['description'] }}
                        </h3>
                    </div>
                    @if (@$section['image_align'] === 'right')
                        <div class="w-full lg:w-1/2 lg:pr-10">
                            <img width="500px" src="{{ @$section['image_url'] }}" alt="{{ @$section['title'] }}"
                                class="mx-auto mb-6 lg:mb-0 hidden md:block">
                        </div>
                    @endif
                </div>
            </section>
        @endif
        @if ($section['theme'] === 'Clean')
            <section class="mx-auto px-6 pb-5 md:py-2 {{ $section['theme_color'] }} ">
                <div class="flex items-center py-8 justify-center">
                    <div class="py-8 text-center px-5 sm:px-0">
                        <h2
                            class="text-3xl sm:text-4xl font-extrabold tracking-tight {{ @$section['title_color'] }}">
                            <span class="block">{{ $section['title'] }}</span>
                        </h2>
                        <h2 class="mt-5 tracking-wide text-sm sm:text-base {{ @$section['description_color'] }}">
                            <span class="block">{{ $section['description'] }}</span>
                        </h2>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
</x-guest-layout>
