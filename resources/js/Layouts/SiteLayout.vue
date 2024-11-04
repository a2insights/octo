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
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'

const products = [
    {
        name: 'Filament Admin',
        description: 'SaaS Scalfolding for Filament',
        href: '#',
        svg: `<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" width="60.72" height="60.72"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" zoomAndPan="magnify" preserveAspectRatio="xMidYMid meet" version="1.0" viewBox="16.7 16 60.72 60.72"><defs><g></g><clipPath id="SvgjsClipPath1003"><path d="M 16.703125 16 L 77.425781 16 L 77.425781 76.722656 L 16.703125 76.722656 Z M 16.703125 16 " clip-rule="nonzero"></path></clipPath><clipPath id="SvgjsClipPath1002"><path d="M 22.726562 16 L 71.402344 16 C 74.730469 16 77.425781 18.695312 77.425781 22.023438 L 77.425781 70.699219 C 77.425781 74.023438 74.730469 76.722656 71.402344 76.722656 L 22.726562 76.722656 C 19.402344 76.722656 16.703125 74.023438 16.703125 70.699219 L 16.703125 22.023438 C 16.703125 18.695312 19.402344 16 22.726562 16 Z M 22.726562 16 " clip-rule="nonzero"></path></clipPath></defs><g clip-path="url(#f679f03389)"><g clip-path="url(#004691511e)"><path fill="#ffb133" d="M 16.703125 16 L 77.425781 16 L 77.425781 76.722656 L 16.703125 76.722656 Z M 16.703125 16 " fill-opacity="1" fill-rule="nonzero"></path></g></g><g fill="#ffffff" fill-opacity="1"><g transform="translate(18.20665, 64.845324)"><g><path d="M 3.625 -32.203125 L 3.71875 -34.53125 L 26.390625 -34.53125 L 26.390625 -31.59375 C 26.390625 -29.675781 26.34375 -28.601562 26.25 -28.375 C 26.207031 -28.238281 25.804688 -28.15625 25.046875 -28.125 C 24.285156 -28.09375 22.453125 -28.078125 19.546875 -28.078125 L 11.21875 -28.078125 L 11.21875 -20.984375 C 12.269531 -21.015625 13.640625 -21.03125 15.328125 -21.03125 C 19.234375 -21.03125 21.832031 -20.984375 23.125 -20.890625 L 24.90625 -20.84375 L 24.90625 -14.4375 L 18.65625 -14.484375 L 11.21875 -14.484375 L 11.21875 0 L 3.71875 0 L 3.578125 -0.84375 C 3.503906 -1.375 3.46875 -6.359375 3.46875 -15.796875 C 3.46875 -25.242188 3.519531 -30.710938 3.625 -32.203125 Z M 3.625 -32.203125 "></path></g></g></g><g fill="#ffffff" fill-opacity="1"><g transform="translate(47.576949, 64.845324)"><g></g></g></g><g fill="#ffffff" fill-opacity="1"><g transform="translate(47.561707, 64.845324)"><g><path d="M 10.609375 -34.96875 C 11.273438 -35.070312 12.78125 -35.125 15.125 -35.125 C 16.6875 -35.09375 17.738281 -35.039062 18.28125 -34.96875 C 18.820312 -34.90625 19.457031 -34.742188 20.1875 -34.484375 C 22.5 -33.785156 23.773438 -33.085938 24.015625 -32.390625 C 24.078125 -32.160156 24.109375 -32 24.109375 -31.90625 C 24.109375 -31.863281 24.109375 -31.828125 24.109375 -31.796875 C 24.046875 -31.703125 23.816406 -30.726562 23.421875 -28.875 C 23.023438 -26.988281 22.789062 -25.992188 22.71875 -25.890625 C 22.71875 -25.859375 22.671875 -25.84375 22.578125 -25.84375 C 22.335938 -25.84375 21.738281 -26.078125 20.78125 -26.546875 C 19.695312 -27.066406 18.738281 -27.4375 17.90625 -27.65625 C 17.082031 -27.875 16.222656 -27.984375 15.328125 -27.984375 C 13.441406 -27.984375 12.070312 -27.519531 11.21875 -26.59375 C 10.78125 -26.09375 10.550781 -25.734375 10.53125 -25.515625 C 10.519531 -25.304688 10.515625 -25.203125 10.515625 -25.203125 C 10.515625 -24.773438 10.75 -24.3125 11.21875 -23.8125 C 11.570312 -23.351562 12.078125 -22.972656 12.734375 -22.671875 C 13.398438 -22.367188 14.644531 -21.957031 16.46875 -21.4375 C 18.257812 -20.90625 19.382812 -20.503906 19.84375 -20.234375 C 21.03125 -19.742188 22.175781 -18.953125 23.28125 -17.859375 C 24.394531 -16.765625 25.117188 -15.753906 25.453125 -14.828125 C 25.710938 -14.140625 25.867188 -13.363281 25.921875 -12.5 C 25.972656 -11.644531 26 -11.015625 26 -10.609375 C 26 -9.847656 25.945312 -9.1875 25.84375 -8.625 C 25.445312 -6.644531 24.515625 -4.894531 23.046875 -3.375 C 21.578125 -1.851562 19.816406 -0.796875 17.765625 -0.203125 C 16.203125 0.234375 14.328125 0.453125 12.140625 0.453125 C 9.960938 0.453125 7.957031 0.28125 6.125 -0.0625 C 4.289062 -0.414062 3.039062 -0.941406 2.375 -1.640625 C 2.175781 -1.835938 2.066406 -2.191406 2.046875 -2.703125 C 2.035156 -3.210938 2.03125 -3.503906 2.03125 -3.578125 C 2.03125 -4.429688 2.113281 -5.421875 2.28125 -6.546875 C 2.414062 -7.734375 2.546875 -8.328125 2.671875 -8.328125 C 2.710938 -8.328125 2.78125 -8.28125 2.875 -8.1875 C 2.976562 -8.082031 3.144531 -8.03125 3.375 -8.03125 C 3.4375 -8.03125 3.503906 -8.03125 3.578125 -8.03125 C 3.867188 -8.03125 4.660156 -7.929688 5.953125 -7.734375 C 7.304688 -7.441406 8.992188 -7.296875 11.015625 -7.296875 C 12.503906 -7.296875 13.445312 -7.316406 13.84375 -7.359375 C 14.238281 -7.410156 14.6875 -7.570312 15.1875 -7.84375 C 15.78125 -8.132812 16.265625 -8.519531 16.640625 -9 C 17.023438 -9.476562 17.25 -10.015625 17.3125 -10.609375 C 17.3125 -10.710938 17.3125 -10.816406 17.3125 -10.921875 C 17.3125 -11.078125 17.285156 -11.226562 17.234375 -11.375 C 17.191406 -11.53125 17.035156 -11.773438 16.765625 -12.109375 C 16.335938 -12.640625 15.75 -13.078125 15 -13.421875 C 14.257812 -13.765625 12.898438 -14.21875 10.921875 -14.78125 C 8.671875 -15.507812 7.226562 -16.023438 6.59375 -16.328125 C 5.96875 -16.648438 5.304688 -17.140625 4.609375 -17.796875 C 3.921875 -18.460938 3.394531 -19.113281 3.03125 -19.75 C 2.394531 -20.96875 2.046875 -22.039062 1.984375 -22.96875 C 1.921875 -23.894531 1.890625 -24.523438 1.890625 -24.859375 C 1.890625 -26.078125 2.09375 -27.351562 2.5 -28.6875 C 2.914062 -30.03125 3.570312 -31.203125 4.46875 -32.203125 C 5 -32.765625 5.875 -33.316406 7.09375 -33.859375 C 8.320312 -34.398438 9.492188 -34.769531 10.609375 -34.96875 Z M 10.609375 -34.96875 "></path></g></g></g></svg><style>@media (prefers-color-scheme: light) { :root { filter: none; } } @media (prefers-color-scheme: dark) { :root { filter: none; } }</style></svg>`,
        active: true
    },
]

const callsToAction = [
    {
        name: 'Tutorials',
        href: 'https://www.youtube.com/@MeiCash',
        icon: PlayCircleIcon
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
    <div class="bg-white">
        <header class="sticky inset-x-0 top-0 z-50 bg-white/10 backdrop-blur-lg">
            <nav class="flex items-center justify-between p-3 mx-auto max-w-7xl lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
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
                                    <div v-for="item in products" :key="item.name"
                                        :class="item.active ? 'bg-gray-50' : ''"
                                        class="relative flex items-center p-4 rounded-lg group gap-x-6 text-sm/6 hover:bg-gray-50">
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
                                        class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                        <component :is="item.icon" class="flex-none w-5 h-5 text-gray-400"
                                            aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </div>
                            </PopoverPanel>
                        </transition>
                    </Popover>

                    <a href="#features" class="font-semibold text-gray-900 text-sm/6">Features</a>
                    <a href="#pricing" class="font-semibold text-gray-900 text-sm/6">Pricing</a>
                    <a href="#" class="font-semibold text-gray-900 text-sm/6">Marketplace</a>
                    <a href="https://a2insights.com.br" target="_blank" rel="noopener noreferrer"
                        class="font-semibold text-gray-900 text-sm/6">A2insights</a>
                </PopoverGroup>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="/admin" class="font-semibold text-gray-900 text-sm/6">
                        Log in
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </nav>
            <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                <div class="fixed inset-0 z-10" />
                <DialogPanel
                    class="fixed inset-y-0 right-0 z-10 w-full px-6 py-6 overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="w-auto h-4" src="/img/logo.svg" alt="" />
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700"
                            @click="mobileMenuOpen = false">
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
                                        <DisclosureButton v-for="item in [...products, ...callsToAction]"
                                            :key="item.name" as="a" :href="item.href"
                                            class="block py-2 pl-6 pr-3 font-semibold text-gray-900 rounded-lg text-sm/7 hover:bg-gray-50">
                                            {{ item.name }}
                                        </DisclosureButton>
                                    </DisclosurePanel>
                                </Disclosure>
                                <a href="#features" @click="mobileMenuOpen = false"
                                    class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">
                                    Funcionalidades
                                </a>
                                <a href="#pricing" @click="mobileMenuOpen = false"
                                    class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">
                                    Preços
                                </a>
                                <a href="#" @click="mobileMenuOpen = false"
                                    class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">
                                    Marketplace
                                </a>
                            </div>
                            <div class="py-6">
                                <a href="/admin"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </DialogPanel>
            </Dialog>
        </header>

        <slot />

        <footer class="bg-white">
            <div class="w-full max-w-screen-xl p-4 pt-20 pb-8 mx-auto lg:pt-16">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://github.com/a2insights/filament-saas" class="flex items-center">
                            <img src="/img/logo.svg" class="h-8 me-3" alt="MeiCash Logo" />
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                                Company
                            </h2>
                            <ul class="font-medium text-gray-500">
                                <li class="mb-4">
                                    <a href="https://github.com/a2insights/filament-saas"
                                        class="hover:underline">Filament SaaS</a>
                                </li>
                                <li>
                                    <a href="https://a2insights.com.br" class="hover:underline">A2insights</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                                Social
                            </h2>
                            <ul class="font-medium text-gray-500">
                                <li class="mb-4">
                                    <a href="https://www.youtube.com/@FilamentSaaS" target="_blank"
                                        class="hover:underline">Youtube</a>
                                </li>
                            </ul>
                            <ul class="font-medium text-gray-500">
                                <li class="mb-4">
                                    <a href="https://github.com/a2insights/filament-saas" target="_blank"
                                        class="hover:underline">Github</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Legal</h2>
                            <ul class="font-medium text-gray-500">
                                <li class="mb-4">
                                    <a href="/privacy-policy" target="_blank" class="hover:underline">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="/terms-of-service" target="_blank" class="hover:underline">
                                        Terms of Service
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                        © 2024
                        <a href="https://github.com/a2insights/filament-saas/" class="hover:underline">
                            Filament SaaS™
                        </a>
                        . All Rights Reserved.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="https://github.com/meicash" target="_blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">GitHub</span>
                        </a>
                        <a href="https://www.youtube.com/@FilamentSaaS" target="_blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-[24px] h-[24px] relative -top-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Youtube</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
