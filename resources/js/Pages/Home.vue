<script setup>
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/Layouts/SiteLayout.vue';
import HeroSection from '@/Components/Home/HeroSection.vue';
import FeaturesSection from '@/Components/Home/FeaturesSection.vue';
import PricingSection from '@/Components/Home/PricingSection.vue';
import TecnologiesSection from '@/Components/Home/TecnologiesSection.vue';
import NewsletterSection from '@/Components/Home/NewsletterSection.vue';
import TestimonialSection from '@/Components/Home/TestimonialSection.vue';
import { computed } from 'vue';

const props = defineProps({
    appName: {
        type: String,
        required: true,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    tenantPath: {
        type: [String, null],
        required: false,
    },
    sysadminPath: {
        type: [String, null],
        required: false,
    },
    brevoNewsletterUrl: {
        type: [String, null],
        required: false,
    },
    blogUrl: {
        type: [String, null],
        required: false,
    },
    dashboardUrl: {
        type: [String, null],
        required: false,
    },
    siteUrl: {
        type: [String, null],
        required: false,
    },
    privacyPolicyUrl: {
        type: [String, null],
        required: false,
    },
    termsOfServiceUrl: {
        type: [String, null],
        required: false,
    },
    settings: {
        type: Object,
        required: false,
    },
    features: {
        type: Object,
        required: true,
    },
    whatsappChatSettings: {
        type: Object,
        required: false,
    }
});

const plans = computed(() => [
    {
        name: 'Free',
        id: 'free',
        href: props.tenantPath,
        priceMonthly: '$0',
        description: "Ideal for beginners who are just starting to enter entrepreneurship.",
        features: ['2 Companies', 'Up to 5 monthly NFS-e at $0.75/unit', 'Up to 200 GPT-3.5-turbo at $0.07/unit'],
        featured: false,
        ctaText: 'Get Started',
    },
    {
        name: 'Starter',
        id: 'starter',
        href: props.tenantPath,
        priceMonthly: '$10',
        description: "Ideal for entrepreneurs who are already offering services.",
        features: ['4 Companies', 'Up to 10 monthly NFS-e at $0.40/unit', 'Up to 400 GPT-3.5-turbo at $0.05/unit', 'Support tickets'],
        featured: false,
        ctaText: 'Get Started',
    },
    {
        name: 'Advanced',
        id: 'advanced',
        href: props.tenantPath,
        priceMonthly: '$30',
        description: "Ideal for entrepreneurs who need specialized support.",
        features: ['Consulting', '10 Companies', 'Up to 5 monthly NFS-e at $0.75/unit', 'Up to 800 GPT-3.5 at $0.04/unit', 'Support tickets', 'WhatsApp support'],
        featured: true,
        ctaText: 'Get Started',
    },
]);
</script>

<template>
    <SiteLayout>

        <Head title="Home" />

        <HeroSection />
        <FeaturesSection />
        <PricingSection :plans="plans" />
        <TecnologiesSection :technologies="[
            { name: 'Laravel', image: '/images/tecnologies/laravel.svg', width: 158, height: 48 },
            { name: 'Livewire', image: '/images/tecnologies/livewire.svg', width: 158, height: 48 },
            { name: 'Filament', image: '/images/tecnologies/filament.svg', width: 158, height: 48 },
            { name: 'Inertia', image: '/images/tecnologies/inertia.svg', width: 158, height: 48 },
            { name: 'Vue.js', image: '/images/tecnologies/vuejs.svg', width: 158, height: 48 }
        ]" />
        <TestimonialSection logo="/img/logo.svg" :testimonial="{
            text: 'At A2Insights, we have been able to significantly reduce development costs without compromising the quality of our products. This has allowed us to deliver a high-quality solution focused on ease of use and performance. I am proud of what we\'ve achieved and excited about the future we\'re building together.',
            author: 'Átila Silva',
            position: 'CEO/CTO at A2Insights',
            image: 'https://gravatar.com/userimage/119243084/fe4cf032204c01f57b4885f1eb06ed19.jpeg?size=80'
        }" />
        <NewsletterSection v-if="brevoNewsletterUrl" :brevoNewsletterUrl="brevoNewsletterUrl" />
    </SiteLayout>
</template>
