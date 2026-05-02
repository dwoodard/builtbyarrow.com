<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

type NavLink = {
    label: string;
    href: string;
};

const navLinks: NavLink[] = [
    { label: 'Services', href: '/#services' },
    { label: 'Portfolio', href: '/#projects' },
    { label: 'Contact', href: '/#contact' },
];

const ctaHref = '/#contact';
const homeHref = '/#';
</script>

<template>
    <nav class="sticky top-0 z-50 mx-auto flex max-w-7xl items-center justify-between border border-champagne/20 bg-graphite/45 px-3 py-3 shadow-luxury backdrop-blur-md sm:px-4 md:px-7 md:py-4">
        <Link :href="homeHref" class="flex min-w-0 items-center gap-3 sm:gap-4">
            <span class="grid h-10 w-10 shrink-0 place-items-center border border-champagne/50 bg-origami/95 text-sm font-black tracking-[-0.04em] text-graphite shadow-soft sm:h-12 sm:w-12 sm:text-lg">AC</span>
            <span class="min-w-0 leading-tight">
                <span class="block font-display text-xl font-bold tracking-[0.04em] text-origami sm:text-2xl">Arrow</span>
                <span class="block text-[0.55rem] font-bold uppercase tracking-luxury text-champagne sm:text-[0.65rem] sm:tracking-[0.34em]">Construction</span>
            </span>
        </Link>

        <div class="hidden items-center gap-9 text-[0.72rem] font-bold uppercase tracking-[0.24em] text-origami/75 lg:flex">
            <Link
                v-for="link in navLinks"
                :key="link.href"
                :href="link.href"
                class="transition hover:text-champagne"
            >
                {{ link.label }}
            </Link>
        </div>

        <a
            :href="ctaHref"
            class="hidden border border-champagne/55 bg-champagne px-5 py-3 text-[0.72rem] font-black uppercase tracking-[0.2em] text-graphite transition hover:bg-origami sm:inline-flex"
        >
            Consultation
        </a>
        <a
            :href="ctaHref"
            class="inline-flex border border-champagne/55 bg-champagne px-3 py-2 text-[0.62rem] font-black uppercase tracking-[0.16em] text-graphite transition hover:bg-origami sm:hidden"
        >
            Call
        </a>
    </nav>
</template>
