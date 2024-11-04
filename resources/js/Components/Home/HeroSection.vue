<template>
    <div class="relative px-6 isolate pt-7 lg:px-8">
        <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-4rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ffb133] to-[#ffd56d] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="max-w-2xl mx-auto sm:py-8 lg:py-5">
            <div class="mb-5 sm:mb-4 sm:flex sm:justify-center">
                <div
                    class="relative px-3 py-1 text-gray-600 rounded-full text-sm/6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    📕 Learn how to config
                    <a href="https://www.youtube.com/@FilamentSaaS" target="_blank"
                        class="font-semibold text-[#487634]">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        🎓 Youtube
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <h1
                    class="flex items-center justify-center text-4xl font-semibold tracking-tight text-gray-900 text-balance sm:text-5xl min-h-[6rem]">
                    <AutoTyperVue componentTag="h1" :waitBeforeDeleteDelay="1000" :removeAfterRepeat="false"
                        :betweenWordDelay="90" :typingDelay="70" :deletingDelay="40" :text="text" />
                </h1>

                <p class="mt-5 text-lg font-medium text-gray-500 text-pretty sm:text-xl/8">
                    Filament SaaS: Your Complete Platform for Building and Scaling SaaS Applications 🚀
                </p>
                <div class="flex items-center justify-center mt-10 gap-x-6">
                    <a href="/company/register"
                        class="rounded-md bg-[#ffb133] px-3.5 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-[#ffd56d] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#487634]">
                         Get started
                    </a>
                    <a href="#" class="font-semibold text-gray-900 text-sm/6">
                         More
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { AutoTyperVue } from "auto-typer-vue3";

let text = [
     'Easy to use',
     'Customizable',
     'Scalable',
     'Comprehensive',
     'Filament SaaS',
     'Your Complete Platform for Building SaaS Applications 🚀',
];
</script>
