<template>
    <div id="pricing" class="relative px-6 py-20 bg-white isolate sm:py-20 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-semibold text-yellow-600 text-base/7">Pricing</h2>
            <p class="mt-2 text-5xl font-semibold tracking-tight text-gray-900 text-balance sm:text-6xl">
                 Our Plans
            </p>
        </div>
        <p class="max-w-2xl mx-auto mt-6 text-lg font-medium text-center text-gray-600 text-pretty sm:text-xl/8">
            🗓️✨ Choose the plan that's right for you 💼🌟
        </p>
        <div
            class="grid items-center max-w-lg grid-cols-1 mx-auto mt-10 gap-y-6 sm:mt-10 sm:gap-y-0 lg:max-w-6xl lg:grid-cols-3">
            <div v-for="(plan, tierIdx) in plans" :key="plan.id"
                :class="[plan.featured ? 'relative bg-gray-900 shadow-2xl' : 'bg-white/60 sm:mx-8 lg:mx-0', plan.featured ? '' : tierIdx === 0 ? 'rounded-t-3xl sm:rounded-b-none lg:rounded-bl-3xl lg:rounded-tr-none' : 'sm:rounded-t-none lg:rounded-bl-nonesss', 'p-8 ring-1 ring-gray-900/10 sm:p-10']">
                <h3 :id="plan.id"
                    :class="[plan.featured ? 'text-yellow-500' : 'text-yellow-600', 'text-base/7 font-semibold']">
                    {{ plan.name }}
                </h3>
                <p class="flex items-baseline mt-4 gap-x-2">
                    <span
                        :class="[plan.featured ? 'text-white' : 'text-gray-900', 'text-5xl font-semibold tracking-tight']">
                        {{ plan.priceMonthly }}
                    </span>
                    <span :class="[plan.featured ? 'text-gray-400' : 'text-gray-500', 'text-base']">/mês</span>
                </p>
                <p :class="[plan.featured ? 'text-gray-300' : 'text-gray-600', 'mt-6 text-base/7']">
                    {{ plan.description }}
                </p>
                <ul role="list"
                    :class="[plan.featured ? 'text-gray-300' : 'text-gray-600', 'mt-8 space-y-3 text-sm/6 sm:mt-10']">
                    <li v-for="feature in plan.features" :key="feature" class="flex gap-x-3">
                        <CheckIcon :class="[plan.featured ? 'text-yellow-400' : 'text-yellow-600', 'h-6 w-5 flex-none']"
                            aria-hidden="true" />
                        {{ feature }}
                    </li>
                </ul>
                <a :href="plan.href" :aria-describedby="plan.id"
                    :class="[plan.featured ? 'bg-yellow-800 text-white shadow-sm hover:bg-yellow-700 focus-visible:outline-yellow-800' : 'text-yellow-600 ring-1 ring-inset ring-yellow-400 hover:ring-yellow-600 focus-visible:outline-yellow-800', 'mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 sm:mt-10']">
                    Escolher plano
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { CheckIcon } from '@heroicons/vue/20/solid'

defineProps({
    plans: {
        type: Array,
        required: true,
    },
});
</script>
