<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="py-10">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <nav class="relative z-50 flex justify-between">
                            <div class="flex items-center md:gap-x-12"><a
                                    class="flex gap-2 italic items-center text-lg font-bold text-dark" aria-label="Home"
                                    href="/">
                                    <svg class="w-auto h-10" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z"
                                            fill="#6875F5"></path>
                                        <path
                                            d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z"
                                            fill="#6875F5"></path>
                                    </svg> CV Builder</a>
                            </div>
                            <div class="flex items-center gap-x-5 md:gap-x-8">

                                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                                        class="inline-flex items-center justify-center rounded-full py-2 px-5 text-sm font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-gray-600 text-white hover:text-slate-100 hover:bg-gray-500 active:bg-gray-800 active:text-gray-100 focus-visible:outline-gray-600">
                                    Dashboard
                                    </Link>

                                    <template v-else>
                                        <Link :href="route('login')"
                                            class="inline-flex mx-2 items-center justify-center rounded-full py-2 px-5 text-sm font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-white border border-gray-200 hover:bg-gray-100 hover:text-black-700 ">
                                        Log in
                                        </Link>

                                        <Link v-if="canRegister" :href="route('register')"
                                            class="inline-flex items-center justify-center rounded-full py-2 px-5 text-sm font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-gray-600 text-white hover:text-slate-100 hover:bg-gray-500 active:bg-gray-800 active:text-gray-100 focus-visible:outline-gray-600">
                                        Register
                                        </Link>
                                    </template>
                                </nav>

                            </div>
                        </nav>
                    </div>
                </header>

                <main>
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32">
                        <h1
                            class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
                            Create Your <!-- --> <span class="relative whitespace-nowrap text-blue-600"><svg
                                    aria-hidden="true" viewBox="0 0 418 42"
                                    class="absolute left-0 top-2/3 h-[0.58em] w-full fill-blue-300/70"
                                    preserveAspectRatio="none">
                                    <path
                                        d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z">
                                    </path>
                                </svg><span class="relative">CV in Minutes</span></span> <!-- --> Try it Now!
                        </h1>
                        <p class="mx-auto mt-6 max-w-2xl text-lg tracking-tight text-slate-700">
                            Create your professional CV in minutes with our intuitive builder. Input your info, choose a
                            template, and you're ready to go! Start crafting your dream career today!
                        </p>
                        <div class="mt-10 flex justify-center gap-x-6"><a
                                class="group inline-flex items-center justify-center rounded-full py-2 px-4 text-sm font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 active:bg-slate-800 active:text-slate-300 focus-visible:outline-slate-900"
                                variant="solid" color="slate" href="/register">Create your CV</a><a
                                class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-200 text-slate-700 hover:text-slate-900 hover:ring-slate-300 active:bg-slate-100 active:text-slate-600 focus-visible:outline-blue-600 focus-visible:ring-slate-300"
                                variant="outline" color="slate"
                                href="https://youtu.be/5uhmS8nzxM4?si=OAGinrZSTvJpH5GR"><svg aria-hidden="true"
                                    class="h-3 w-3 flex-none fill-blue-600 group-active:fill-current">
                                    <path
                                        d="m9.997 6.91-7.583 3.447A1 1 0 0 1 1 9.447V2.553a1 1 0 0 1 1.414-.91L9.997 5.09c.782.355.782 1.465 0 1.82Z">
                                    </path>
                                </svg><span class="ml-3">Watch video</span></a></div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</template>
