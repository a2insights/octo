<script setup>
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/Layouts/SiteLayout.vue';

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
    <SiteLayout >

        <Head :title="title" />

        <div class="p-4 py-4 sm:px-6 lg:px-8 pb-28">
            <div class="max-w-6xl mx-auto overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-400">
                    <div v-html="terms"/>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>
