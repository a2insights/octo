<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/SiteLayout.vue';

const props = defineProps({
    title: {
        type: [String, null],
        required: true,
    },
    terms: {
        type: [String, null],
        required: true,
    }
});

</script>

<template>
    <GuestLayout>

        <Head :title="title" />

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div v-html="terms"></div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
