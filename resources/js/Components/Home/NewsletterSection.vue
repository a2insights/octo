<script setup>
import { CalendarDaysIcon, HandRaisedIcon } from '@heroicons/vue/24/outline'
import BrevoForm from '../BrevoForm.vue';

defineProps({
    brevoNewsletterUrl: {
        type: String,
        default: ''
    },
    newsletterTitle: {
        type: String,
        default: 'Subscribe to our newsletter'
    },
    newsletterDescription: {
        type: String,
        default: 'Subscribe to our newsletter to get the latest news and updates.'
    },
    benefitOneTitle: {
        type: String,
        default: 'Weekly news'
    },
    benefitOneDescription: {
        type: String,
        default: 'Get the latest news on new features, tips, and more.'
    },
    benefitTwoTitle: {
        type: String,
        default: 'No spam'
    },
    benefitTwoDescription: {
        type: String,
        default: 'We promise not to spam you.'
    }
})
</script>

<template>
     <div class="py-32 bg-yellow-500 isolate">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <!-- Main Content Grid with Responsive Layout -->
            <div class="grid grid-cols-1 mx-auto gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">

                <!-- Left Section: Newsletter Subscription -->
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-4xl font-semibold tracking-tight text-black">
                        {{ newsletterTitle }}
                    </h2>
                    <p class="mt-2 text-lg text-gray-600">
                        {{ newsletterDescription }}
                    </p>

                    <!-- Newsletter component -->
                    <BrevoForm :actionUrl="brevoNewsletterUrl"/>
                </div>

                <!-- Right Section: Benefits of Subscribing -->
                <div class="grid max-w-2xl grid-cols-1 mx-auto gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">

                    <!-- Weekly News -->
                    <div class="flex flex-col items-start">
                        <div class="p-2 rounded-md bg-black/5 ring-1 ring-white/10">
                            <CalendarDaysIcon class="w-6 h-6 text-black" aria-hidden="true" />
                        </div>
                        <dt class="mt-4 text-base font-semibold text-black">{{ benefitOneTitle }}</dt>
                        <dd class="mt-2 text-gray-600">{{ benefitOneDescription }}</dd>
                    </div>

                    <!-- No Spam -->
                    <div class="flex flex-col items-start">
                        <div class="p-2 rounded-md bg-black/5 ring-1 ring-white/10">
                            <HandRaisedIcon class="w-6 h-6 text-black" aria-hidden="true" />
                        </div>
                        <dt class="mt-4 text-base font-semibold text-black">{{ benefitTwoTitle }}</dt>
                        <dd class="mt-2 text-gray-600">{{ benefitTwoDescription }}</dd>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
