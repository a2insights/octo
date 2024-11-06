<script setup>
import {
    CloudArrowUpIcon,
    LockClosedIcon,
    ServerIcon,
} from '@heroicons/vue/20/solid';

const props = defineProps({
    heading: {
        type: String,
        default: 'Filament SaaS: Your Complete Platform for Building and Scaling SaaS Applications 🚀',
    },
    description: {
        type: String,
        default:
            'Filament SaaS is the ultimate tool for developers who want to create and manage SaaS applications with ease and scalability. Our platform offers a robust and customizable infrastructure, so you can focus on building your product while we handle the complexities of SaaS operations.',
    },
    features: {
        type: Array,
        default: () => [
            {
                icon: CloudArrowUpIcon,
                title: 'Stripe Integration',
                description:
                    'Easily handle subscriptions and payments with Stripe integration, enabling recurring billing and usage-based pricing.',
            },
            {
                icon: LockClosedIcon,
                title: 'Flexible Pricing and Plan Management',
                description:
                    'Design and manage multiple subscription plans to suit a range of customer needs, with flexible pricing and automatic adjustments.',
            },
            {
                icon: ServerIcon,
                title: 'Integrate with many filament plugins',
                description: 'Seamlessly integrate with popular filament plugins, such as FilamentShield.',
            },
        ],
    },
    imageSrc: {
        type: String,
        default: '/images/screenshots/sysadmin-features.png',
    },
});
</script>

<template>
    <div id="features"
        class="relative px-6 py-20 overflow-hidden bg-white isolate sm:py-20 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 overflow-hidden -z-10">
            <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1"
                        patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path
                        d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div
            class="grid max-w-2xl grid-cols-1 mx-auto gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="font-semibold text-yellow-600 text-base/7">Features</p>
                        <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-5xl">
                            {{ props.heading }}
                        </h1>
                        <p class="mt-6 text-gray-700 text-xl/8">{{ props.description }}</p>
                    </div>
                </div>
            </div>
            <div
                class="p-12 -mt-12 -ml-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                <img class="w-[48rem] max-w-none rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem]"
                    :src="props.imageSrc" alt="App Dashboard" />
            </div>
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="max-w-xl text-gray-700 text-base/7 lg:max-w-lg">
                        <p>Key Features for Developers ⚙️💻</p>
                        <ul role="list" class="mt-8 space-y-8 text-gray-600">
                            <li v-for="(feature, index) in props.features" :key="index" class="flex gap-x-3">
                                <component :is="feature.icon" class="flex-none w-5 h-5 mt-1 text-yellow-600"
                                    aria-hidden="true" />
                                <span>
                                    <strong class="font-semibold text-gray-900">{{ feature.title }}</strong>
                                    {{ feature.description }}
                                </span>
                            </li>
                        </ul>
                        <p class="mt-8">
                            Development Time Savings: Focus on what matters for your business while Filament SaaS takes
                            care of the essential SaaS features.
                        </p>
                        <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">Advantages for
                            <b>Developers</b> ⏱️🔧</h2>
                        <p class="mt-6">
                            With Filament SaaS, developers have the infrastructure they need to launch and scale SaaS
                            applications with confidence, efficiency, and control. Get started today! 🚀🌐
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
