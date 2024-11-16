<script setup>
</script>

<template>
    <footer class="bg-white">
        <div class="w-full max-w-screen-xl p-4 pt-20 pb-8 mx-auto lg:pt-16">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a :href="$page.props.siteUrl" class="flex items-center">
                        <img src="/img/logo.svg" class="h-8 me-3" alt="Filament SaaS Logo" />
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                            Company
                        </h2>
                        <ul class="font-medium text-gray-500">
                            <li class="mb-4">
                                <a href="https://github.com/A2Insights/filament-saas" class="hover:underline">
                                    Filament SaaS
                                </a>
                            </li>
                            <li>
                                <a href="https://A2Insights.com.br" class="hover:underline">A2Insights</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                            Social
                        </h2>
                        <ul class="font-medium text-gray-500">
                            <li class="mb-4">
                                <a href="https://www.instagram.com/A2Insights" class="hover:underline">
                                    Instagram
                                </a>
                            </li>
                        </ul>
                        <ul class="font-medium text-gray-500">
                            <li class="mb-4">
                                <a href="https://github.com/A2Insights/filament-saas" target="_blank" rel="noopener noreferrer"
                                    class="hover:underline">
                                    Github
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Legal</h2>
                        <ul class="font-medium text-gray-500">
                            <li class="mb-4">
                                <a :href="$page.props.privacyPolicyUrl" class="hover:underline">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a :href="$page.props.termsOfServiceUrl" class="hover:underline">
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
                    <a :href="$page.props.siteUrl" class="hover:underline">
                        {{ $page.props.appName }}™
                    </a>
                    . All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-3 sm:justify-center md:mt-0 rtl:space-x-reverse">
                    <a href="https://github.com/A2Insights" class="text-gray-500 hover:text-gray-900">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub</span>
                    </a>
                    <a href="https://www.instagram.com/A2Insights" target="_blank" rel="noopener noreferrer"
                        class="text-gray-500 hover:text-gray-900">
                        <svg class="w-[22px] h-[22px] relative -top-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>
