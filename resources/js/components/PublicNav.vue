<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted, ref } from 'vue';
import BrandLogo from './BrandLogo.vue';

const isLoggedIn = computed(() => !!usePage().props.auth?.user);

const scrolled = ref(false);
const mobileOpen = ref(false);

function onScroll() {
    scrolled.value = window.scrollY > 60;
}

function closeMobile() {
    mobileOpen.value = false;
}

onMounted(() => window.addEventListener('scroll', onScroll, { passive: true }));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>

<template>
    <nav
        class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
        :class="scrolled ? 'bg-stone-950 shadow-[0_2px_24px_rgba(0,0,0,0.2)]' : 'bg-stone-950'"
    >
        <div class="mx-auto max-w-7xl px-6 lg:px-10">
            <div class="flex h-20 items-center justify-between">

                <!-- Logo -->
                <a href="/#" class="group flex items-center gap-1">
                    <BrandLogo size="sm" />
                </a>

                <!-- Desktop nav -->
                <div class="hidden items-center gap-8 md:flex">
                    <a v-if="isLoggedIn" href="/admin" class="gold-link text-sm tracking-wide text-gray-200 transition-colors hover:text-amber-gold">Admin</a>
                    <a href="#work" class="gold-link text-sm tracking-wide text-gray-200 transition-colors hover:text-amber-gold">Work</a>
                    <a href="#process" class="gold-link text-sm tracking-wide text-gray-200 transition-colors hover:text-amber-gold">Process</a>
                    <a href="#contact"
                        class="ml-2 border border-amber-gold px-5 py-2 text-sm tracking-widest uppercase text-amber-gold transition-all duration-300 hover:bg-amber-gold hover:text-white"
                    >
                        Call
                   </a>
                </div>

                <!-- Hamburger -->
                <button
                    class="p-2 text-white md:hidden"
                    aria-label="Toggle menu"
                    @click="mobileOpen = !mobileOpen"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path v-if="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div v-show="mobileOpen" class="border-t border-gray-700 bg-stone-950 py-4 md:hidden">
                <a href="#work" class="block px-4 py-2 text-sm text-gray-300 hover:text-amber-gold" @click="closeMobile">Work</a>
                <a href="#process" class="block px-4 py-2 text-sm text-gray-300 hover:text-amber-gold" @click="closeMobile">Process</a>
                <a
                    href="#contact"
                    class="mx-4 mt-3 block border border-amber-gold py-2 text-center text-sm tracking-widest uppercase text-amber-gold"
                    @click="closeMobile"
                >
                    Call
                </a>
            </div>
        </div>
    </nav>
</template>
