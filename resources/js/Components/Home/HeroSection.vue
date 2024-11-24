<script setup>
import { AutoTyperVue } from "auto-typer-vue3";
import BadgeLink from "../BadgeLink.vue";

const props = defineProps({
    text: {
        type: Array,
        default: () => [
            'Easy to use',
            'Customizable',
            'Scalable',
            'Comprehensive',
            'Filament SaaS',
            'Your Complete Platform for Building SaaS Applications'
        ]
    },
    cta: {
        type: Object,
        default: () => ({
            primaryLink: '/admin/register',
            primaryText: 'Get started',
            secondaryLink: '/about',
            secondaryText: 'More'
        })
    },
    heroSubtitle: {
        type: String,
        default: 'Filament SaaS: Your Complete Platform for Building and Scaling SaaS Applications'
    }
});
</script>

<template>
    <div class="relative px-6 isolate pt-7 lg:px-8">
        <!-- Background Gradient -->
        <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-4rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ffb133] to-[#ffd56d] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-3xl mx-auto sm:py-8 lg:py-5">
            <div class="mb-5 sm:mb-4 sm:flex sm:justify-center">
                <BadgeLink />
            </div>

            <div class="text-center">
                <h1
                    class="py-12 sm:py-28 lg:py-26 flex items-center justify-center text-5xl font-semibold tracking-tight text-black sm:text-5xl min-h-[20rem]">
                    <AutoTyperVue componentTag="h1" :waitBeforeDeleteDelay="1000" :removeAfterRepeat="false"
                        :betweenWordDelay="90" :typingDelay="70" :deletingDelay="40" :text="text" />
                </h1>

                <!-- Hero Subtitle -->
                <p class="mt-5 mb-20 text-lg font-medium text-gray-500 sm:text-xl/8" v-html="heroSubtitle" />

                <!-- Call to Action Buttons -->
                <div class="flex items-center justify-center mt-10 gap-x-6">
                    <a :href="cta.primaryLink"
                        class="rounded-md bg-[#ffb133] px-3.5 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-[#ffd56d] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#487634]">
                        {{ cta.primaryText }}
                    </a>
                    <a :href="cta.secondaryLink" class="text-sm font-semibold text-gray-900">
                        {{ cta.secondaryText }}
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
