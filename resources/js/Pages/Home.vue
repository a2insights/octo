<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/SiteLayout.vue';
import HeroSection from '@/Components/Home/HeroSection.vue';
import FeaturesSection from '@/Components/Home/FeaturesSection.vue';
import PricingSection from '@/Components/Home/PricingSection.vue';
import TecnologiesSection from '@/Components/Home/TecnologiesSection.vue';
import NewsletterSection from '@/Components/Home/NewsletterSection.vue';
import TestimonialSection from '@/Components/Home/TestimonialSection.vue';

defineProps({
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    brevoNewsletterUrl: {
        type: [String, null],
        required: false,
    },
    dashboardUrl: {
        type: [String, null],
        required: false,
    }
});

const plans = [
    {
        name: 'Free',
        id: 'free',
        href: '/company/register',
        priceMonthly: '$0',
        description: "Ideal for beginners who are just starting to enter entrepreneurship.",
        features: ['2 Companies', 'Up to 5 monthly NFS-e at $0.75/unit', 'Up to 200 GPT-3.5-turbo at $0.07/unit'],
        featured: false,
    },
    {
        name: 'Starter',
        id: 'starter',
        href: '/company/register',
        priceMonthly: '$10',
        description: "Ideal for entrepreneurs who are already offering services.",
        features: ['4 Companies', 'Up to 10 monthly NFS-e at $0.40/unit', 'Up to 400 GPT-3.5-turbo at $0.05/unit', 'Support tickets'],
        featured: false,
    },
    {
        name: 'Advanced',
        id: 'advanced',
        href: '/company/register',
        priceMonthly: '$30',
        description: "Ideal for entrepreneurs who need specialized support.",
        features: ['Consulting', '10 Companies', 'Up to 5 monthly NFS-e at $0.75/unit', 'Up to 800 GPT-3.5 at $0.04/unit', 'Support tickets', 'WhatsApp support'],
        featured: true,
    },
];
</script>

<template>
    <GuestLayout>

        <Head title="Home" />

        <HeroSection />
        <FeaturesSection />
        <PricingSection :plans="plans" />
        <TecnologiesSection />
        <TestimonialSection />
        <NewsletterSection v-if="brevoNewsletterUrl" :brevoNewsletterUrl="brevoNewsletterUrl" />
    </GuestLayout>
</template>
