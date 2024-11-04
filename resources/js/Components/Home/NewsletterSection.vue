<template>
    <div class="overflow-hidden bg-yellow-500 isolate sm:pt-16 lg:pt-16">
        <div class="px-6 mx-auto max-w-7xl lg:px-8 ">
            <div class="grid max-w-2xl grid-cols-1 mx-auto gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2"
                style="height: 300px">
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-4xl font-semibold tracking-tight text-black">
                        Subscribe to our newsletter
                    </h2>
                    <p class="mt-4 text-lg text-gray-600">
                        Subscribe to our newsletter to get the latest news and updates.
                    </p>
                    <div class="flex max-w-md gap-x-4">
                        <iframe width="100%" height="280" :src="brevoNewsletterUrl" frameborder="0" scrolling="auto"
                            allowfullscreen
                            style="position:relative;left:-43px;top:-75px;margin-left:auto;margin-right:auto;max-width:100%;">
                        </iframe>
                    </div>
                </div>
                <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                    <div class="flex flex-col items-start">
                        <div class="p-2 rounded-md bg-black/5 ring-1 ring-white/10">
                            <CalendarDaysIcon class="w-6 h-6 text-black" aria-hidden="true" />
                        </div>
                        <dt class="mt-4 text-base font-semibold text-black">Weekly news</dt>
                        <dd class="mt-2 text-gray-600 text-base/7">
                            Get the latest news on new features, tips, and more.
                        </dd>
                    </div>
                    <div class="flex flex-col items-start">
                        <div class="p-2 rounded-md bg-black/5 ring-1 ring-white/10">
                            <HandRaisedIcon class="w-6 h-6 text-black" aria-hidden="true" />
                        </div>
                        <dt class="mt-4 text-base font-semibold text-black">No spam</dt>
                        <dd class="mt-2 text-gray-600 text-base/7">
                            We promise not to spam you.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>

<script setup>
import { CalendarDaysIcon, HandRaisedIcon } from '@heroicons/vue/24/outline'

defineProps({
    brevoNewsletterUrl: {
        type: [String],
        default: null
    }
})
</script>
