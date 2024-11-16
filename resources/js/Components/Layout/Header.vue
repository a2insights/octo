<script setup>
import { ref } from 'vue'
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
} from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon, PhoneIcon, DocumentMagnifyingGlassIcon } from '@heroicons/vue/20/solid'

const products = [
    {
        name: 'Filament Admin',
        description: 'SaaS Scalfolding for Filament',
        href: '#',
        svg: `<svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" width="55.52" height="54.67"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" preserveAspectRatio="xMidYMid meet" version="1.0" viewBox="1.11 1.3 55.52 54.67"><defs><g></g><clipPath id="SvgjsClipPath1003"><path d="M 1.105469 1.296875 L 56.625 1.296875 L 56.625 55.964844 L 1.105469 55.964844 Z M 1.105469 1.296875 " clip-rule="nonzero"></path></clipPath><clipPath id="SvgjsClipPath1002"><path d="M 7.3125 1.507812 L 50.527344 1.507812 C 53.835938 1.507812 56.519531 4.191406 56.519531 7.503906 L 56.519531 49.96875 C 56.519531 53.28125 53.835938 55.964844 50.527344 55.964844 L 7.3125 55.964844 C 4 55.964844 1.316406 53.28125 1.316406 49.96875 L 1.316406 7.503906 C 1.316406 4.191406 4 1.507812 7.3125 1.507812 Z M 7.3125 1.507812 " clip-rule="nonzero"></path></clipPath></defs><g clip-path="url(#50c243fd2b)"><g clip-path="url(#e54aee0c09)"><path fill="#ffb133" d="M 1.316406 1.507812 L 56.625 1.507812 L 56.625 55.964844 L 1.316406 55.964844 Z M 1.316406 1.507812 " fill-opacity="1" fill-rule="nonzero"></path></g></g><g fill="#ffffff" fill-opacity="1"><g transform="translate(11.168625, 39.105497)"><g><path d="M 2.15625 -19.234375 L 2.21875 -20.625 L 15.765625 -20.625 L 15.765625 -18.875 C 15.765625 -17.726562 15.734375 -17.085938 15.671875 -16.953125 C 15.648438 -16.867188 15.410156 -16.816406 14.953125 -16.796875 C 14.503906 -16.773438 13.410156 -16.765625 11.671875 -16.765625 L 6.6875 -16.765625 L 6.6875 -12.53125 C 7.320312 -12.550781 8.144531 -12.5625 9.15625 -12.5625 C 11.488281 -12.5625 13.039062 -12.53125 13.8125 -12.46875 L 14.875 -12.4375 L 14.875 -8.625 L 11.140625 -8.65625 L 6.6875 -8.65625 L 6.6875 0 L 2.21875 0 L 2.140625 -0.5 C 2.097656 -0.820312 2.078125 -3.800781 2.078125 -9.4375 C 2.078125 -15.070312 2.101562 -18.335938 2.15625 -19.234375 Z M 2.15625 -19.234375 "></path></g></g></g><g fill="#ffffff" fill-opacity="1"><g transform="translate(28.712178, 39.105497)"><g></g></g></g><g fill="#ffffff" fill-opacity="1"><g transform="translate(29.659574, 39.105497)"><g><path d="M 6.34375 -20.890625 C 6.738281 -20.941406 7.632812 -20.96875 9.03125 -20.96875 C 9.957031 -20.945312 10.582031 -20.914062 10.90625 -20.875 C 11.238281 -20.84375 11.625 -20.75 12.0625 -20.59375 C 13.4375 -20.175781 14.195312 -19.757812 14.34375 -19.34375 C 14.375 -19.207031 14.390625 -19.109375 14.390625 -19.046875 C 14.390625 -19.023438 14.390625 -19.003906 14.390625 -18.984375 C 14.359375 -18.929688 14.222656 -18.347656 13.984375 -17.234375 C 13.742188 -16.109375 13.601562 -15.519531 13.5625 -15.46875 C 13.5625 -15.445312 13.535156 -15.4375 13.484375 -15.4375 C 13.335938 -15.4375 12.976562 -15.570312 12.40625 -15.84375 C 11.757812 -16.164062 11.1875 -16.390625 10.6875 -16.515625 C 10.195312 -16.640625 9.6875 -16.703125 9.15625 -16.703125 C 8.03125 -16.703125 7.207031 -16.425781 6.6875 -15.875 C 6.4375 -15.582031 6.304688 -15.367188 6.296875 -15.234375 C 6.285156 -15.109375 6.28125 -15.046875 6.28125 -15.046875 C 6.28125 -14.796875 6.414062 -14.519531 6.6875 -14.21875 C 6.90625 -13.945312 7.210938 -13.71875 7.609375 -13.53125 C 8.003906 -13.351562 8.742188 -13.109375 9.828125 -12.796875 C 10.898438 -12.484375 11.570312 -12.25 11.84375 -12.09375 C 12.5625 -11.789062 13.25 -11.3125 13.90625 -10.65625 C 14.570312 -10.007812 15.003906 -9.410156 15.203125 -8.859375 C 15.359375 -8.441406 15.453125 -7.972656 15.484375 -7.453125 C 15.515625 -6.941406 15.53125 -6.570312 15.53125 -6.34375 C 15.53125 -5.882812 15.5 -5.488281 15.4375 -5.15625 C 15.195312 -3.96875 14.632812 -2.921875 13.75 -2.015625 C 12.875 -1.109375 11.828125 -0.476562 10.609375 -0.125 C 9.679688 0.132812 8.5625 0.265625 7.25 0.265625 C 5.945312 0.265625 4.75 0.160156 3.65625 -0.046875 C 2.5625 -0.253906 1.816406 -0.566406 1.421875 -0.984375 C 1.304688 -1.097656 1.242188 -1.304688 1.234375 -1.609375 C 1.222656 -1.921875 1.21875 -2.097656 1.21875 -2.140625 C 1.21875 -2.648438 1.265625 -3.238281 1.359375 -3.90625 C 1.441406 -4.625 1.519531 -4.984375 1.59375 -4.984375 C 1.613281 -4.984375 1.65625 -4.953125 1.71875 -4.890625 C 1.78125 -4.828125 1.878906 -4.796875 2.015625 -4.796875 C 2.054688 -4.796875 2.097656 -4.796875 2.140625 -4.796875 C 2.316406 -4.796875 2.789062 -4.738281 3.5625 -4.625 C 4.363281 -4.445312 5.367188 -4.359375 6.578125 -4.359375 C 7.460938 -4.359375 8.023438 -4.367188 8.265625 -4.390625 C 8.503906 -4.421875 8.769531 -4.519531 9.0625 -4.6875 C 9.414062 -4.863281 9.707031 -5.09375 9.9375 -5.375 C 10.164062 -5.664062 10.300781 -5.988281 10.34375 -6.34375 C 10.34375 -6.394531 10.34375 -6.453125 10.34375 -6.515625 C 10.34375 -6.617188 10.328125 -6.710938 10.296875 -6.796875 C 10.265625 -6.890625 10.171875 -7.035156 10.015625 -7.234375 C 9.753906 -7.546875 9.398438 -7.804688 8.953125 -8.015625 C 8.515625 -8.222656 7.703125 -8.492188 6.515625 -8.828125 C 5.171875 -9.265625 4.3125 -9.570312 3.9375 -9.75 C 3.5625 -9.945312 3.164062 -10.242188 2.75 -10.640625 C 2.34375 -11.035156 2.03125 -11.421875 1.8125 -11.796875 C 1.4375 -12.523438 1.226562 -13.164062 1.1875 -13.71875 C 1.144531 -14.269531 1.125 -14.644531 1.125 -14.84375 C 1.125 -15.570312 1.242188 -16.335938 1.484375 -17.140625 C 1.734375 -17.941406 2.128906 -18.640625 2.671875 -19.234375 C 2.984375 -19.566406 3.503906 -19.894531 4.234375 -20.21875 C 4.960938 -20.539062 5.664062 -20.765625 6.34375 -20.890625 Z M 6.34375 -20.890625 "></path></g></g></g></svg><style>@media (prefers-color-scheme: light) { :root { filter: none; } } @media (prefers-color-scheme: dark) { :root { filter: none; } }</style></svg>`,
        active: true
    },
]

const callsToAction = [
    {
        name: 'Documentation',
        href: '/docs',
        icon: DocumentMagnifyingGlassIcon
    },
    {
        name: 'Contact us',
        href: 'https://api.whatsapp.com/send/?phone=5585992805881&text=Ol%C3%A1.+Hello.+I+have+a+question&type=phone_number&app_absent=0',
        icon: PhoneIcon
    },
]

const mobileMenuOpen = ref(false)
</script>

<template>
    <header class="sticky inset-x-0 top-0 z-50 bg-white/10 backdrop-blur-lg">
        <nav class="flex items-center justify-between p-3 mx-auto max-w-7xl lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a :href="$page.props.siteUrl" class="-m-1.5 p-1.5">
                    <span class="sr-only">Filament SaaS</span>
                    <img class="w-auto h-5" src="/img/logo.svg" alt="" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    @click="mobileMenuOpen = true">
                    <span class="sr-only">Open main menu</span>
                    <Bars3Icon class="w-6 h-6" aria-hidden="true" />
                </button>
            </div>
            <PopoverGroup class="hidden lg:flex lg:gap-x-12">
                <Popover class="relative">
                    <PopoverButton class="flex items-center font-semibold text-gray-900 gap-x-1 text-sm/6">
                        Products
                        <ChevronDownIcon class="flex-none w-5 h-5 text-gray-400" aria-hidden="true" />
                    </PopoverButton>

                    <transition enter-active-class="transition duration-200 ease-out"
                        enter-from-class="translate-y-1 opacity-0" enter-to-class="translate-y-0 opacity-100"
                        leave-active-class="transition duration-150 ease-in"
                        leave-from-class="translate-y-0 opacity-100" leave-to-class="translate-y-1 opacity-0">
                        <PopoverPanel
                            class="absolute z-10 w-screen max-w-md mt-3 overflow-hidden bg-white shadow-lg -left-8 top-full rounded-3xl ring-1 ring-gray-900/5">
                            <div class="p-4">
                                <div v-for="item in products" :key="item.name" :class="item.active ? 'bg-gray-50' : ''"
                                    class="relative flex items-center p-4 mb-1 rounded-lg group gap-x-6 text-sm/6 hover:bg-gray-50">
                                    <div
                                        class="flex items-center justify-center flex-none rounded-lg h-11 w-11 bg-gray-50 group-hover:bg-white">
                                        <component v-if="item?.icon" :is="item.icon"
                                            class="w-6 h-6 text-gray-600 group-hover:text-green-600"
                                            aria-hidden="true" />
                                        <div v-else-if="item?.svg">
                                            <div v-html="item.svg"></div>

                                        </div>
                                    </div>
                                    <div class="flex-auto">
                                        <a :href="item.href" class="block font-semibold text-gray-900">
                                            {{ item.name }}
                                            <span class="absolute inset-0" />
                                        </a>
                                        <p class="mt-1 text-gray-600">{{ item.description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                                <a v-for="item in callsToAction" :key="item.name" :href="item.href" target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                    <component :is="item.icon" class="flex-none w-5 h-5 text-gray-400"
                                        aria-hidden="true" />
                                    {{ item.name }}
                                </a>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>

                <a href="/#features" class="font-semibold text-gray-900 text-sm/6">Features</a>
                <a href="/#pricing" class="font-semibold text-gray-900 text-sm/6">Pricing</a>
                <a href="#" class="font-semibold text-gray-400 cursor-default pointer-events-none text-sm/6">Marketplace</a>
                <a :href="$page.props.blogUrl" class="font-semibold text-gray-900 text-sm/6">Blog</a>
                <a href="https://A2Insights.com.br" target="_blank" rel="noopener noreferrer"
                    class="font-semibold text-gray-900 text-sm/6">
                    A2Insights
                </a>
            </PopoverGroup>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a :href="$page.props.dashboardUrl" class="font-semibold text-gray-900 text-sm/6">
                    {{ $page.props.auth.user ? 'Dashboard' : 'Log in' }}
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </nav>
        <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
            <div class="fixed inset-0 z-10" />
            <DialogPanel
                class="fixed inset-y-0 right-0 z-10 w-full px-6 py-6 overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a :href="$page.props.siteUrl" class="-m-1.5 p-1.5">
                        <span class="sr-only">Filament SaaS</span>
                        <img class="w-auto h-4" src="/img/logo.svg" alt="" />
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                        <span class="sr-only">Close menu</span>
                        <XMarkIcon class="w-6 h-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="flow-root mt-6">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="py-6 space-y-2">
                            <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                                <DisclosureButton
                                    class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                                    Products
                                    <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'h-5 w-5 flex-none']"
                                        aria-hidden="true" />
                                </DisclosureButton>
                                <DisclosurePanel class="mt-2 space-y-2">
                                    <DisclosureButton v-for="item in [...products, ...callsToAction]" :key="item.name"
                                        as="a" :href="item.href"
                                        class="block py-2 pl-6 pr-3 font-semibold text-gray-900 rounded-lg text-sm/7 hover:bg-gray-50">
                                        {{ item.name }}
                                    </DisclosureButton>
                                </DisclosurePanel>
                            </Disclosure>
                            <a href="/#features" @click="mobileMenuOpen = false"
                                class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">
                                Funcionalidades
                            </a>
                            <a :href="$page.props.blogUrl" @click="mobileMenuOpen = false"
                                class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">
                                Blog
                            </a>
                            <a href="/#pricing" @click="mobileMenuOpen = false"
                                class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">
                                Preços
                            </a>
                            <a href="#"
                                class="block px-3 py-2 -mx-3 font-semibold text-gray-400 rounded-lg cursor-default pointer-events-none text-base/7 hover:bg-transparent">
                                Marketplace
                            </a>
                        </div>
                        <div class="py-6">
                            <a :href="$page.props.dashboardUrl"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                                {{ $page.props.auth.user ? 'Dashboard' : 'Log in' }}
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </DialogPanel>
        </Dialog>
    </header>
</template>
