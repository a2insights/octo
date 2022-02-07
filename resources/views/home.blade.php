<x-guest-layout>
    @foreach (Octo\Site::getSections() as $section)
        @if ($section['theme'] === 'Hero')
            <section>
                <div class="bg-gradient-to-br pb-5 from-indigo-900 to-green-900 overflow-auto">
                    <div class="container max-w-5xl mx-auto px-4">
                        <h1 class="mt-10 text-white text-5xl font-bold" :class="$section['title_color']">
                            {{ $section['title'] }}
                        </h1>
                        <div class="my-5">
                            <h3 class="text-gray-300" :class="$section['description_color']">
                                {{ $section['description'] }}
                            </h3>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if ($section['theme'] === 'Light')
            <section class="container mt-5 max-w-6xl mx-auto px-6 pb-5 md:py-2">
                <div class="flex items-center flex-col-reverse mb-5 lg:flex-row lg:mb-24">
                    @if ($section['image_align'] !== 'right')
                        <div class="w-full lg:w-1/2 lg:pr-10">
                            <img width="500px" src="{{ $section['image_url'] }}" alt="Octo Docs large logo"
                                class="mx-auto mb-6 lg:mb-0 hidden md:block">
                        </div>
                    @endif
                    <div class="mt-5">
                        <h2 class="text-6xl mb-3 font-bold">
                            {{ $section['title'] }}
                        </h2>
                        <h3 class="text-2xl">
                            {{ $section['description'] }}
                        </h3>
                    </div>
                    @if ($section['image_align'] === 'right')
                        <div class="w-full lg:w-1/2 lg:pr-10">
                            <img width="500px" src="{{ $section['image_url'] }}" alt="Octo Docs large logo"
                                class="mx-auto mb-6 lg:mb-0 hidden md:block">
                        </div>
                    @endif
                </div>
            </section>
        @endif
        @if ($section['theme'] === 'Clean')
            <section class="bg-indigo-600 mx-auto px-6 pb-5 md:py-2">
                <div class="flex items-center py-10 justify-center">
                    <div class="py-14 text-center px-5 sm:px-0">
                        <h2 class="text-3xl sm:text-4xl text-white font-extrabold tracking-tight">
                            <span class="block">{{ $section['title'] }}</span>
                        </h2>
                        <h2 class="text-white mt-5 tracking-wide text-sm sm:text-base">
                            <span class="block">{{ $section['description'] }}</span>
                        </h2>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
</x-guest-layout>
