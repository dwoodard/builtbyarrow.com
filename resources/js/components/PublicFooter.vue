<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

type FooterLink = {
    label: string;
    href: string;
};

const exploreLinks: FooterLink[] = [
    { label: 'Services', href: '/#services' },
    { label: 'Portfolio', href: '/#projects' },
    { label: 'Contact', href: '/#contact' },
];

const legalLinks: FooterLink[] = [
    { label: 'Privacy Policy', href: '/privacy-policy' },
    { label: 'Terms of Service', href: '/terms-of-service' },
];

const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="border-t border-champagne/10 bg-graphite px-4 py-16 text-origami sm:px-5 sm:py-20 md:px-8 md:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
                <!-- Brand Block (spans 2 cols on lg) -->
                <div class="col-span-1 lg:col-span-2">
                    <a href="#" class="flex items-center gap-3">
                        <span class="grid h-8 w-8 shrink-0 place-items-center border border-champagne/50 bg-origami/95 text-xs font-black tracking-[-0.04em] text-graphite shadow-soft">AC</span>
                        <span class="leading-tight">
                            <span class="block font-display text-lg font-bold tracking-[0.04em] text-origami">Arrow</span>
                            <span class="block text-[0.5rem] font-bold uppercase tracking-luxury text-champagne">Construction</span>
                        </span>
                    </a>
                    <p class="mt-6 max-w-xs text-sm leading-6 text-origami/60">Dedicated to the art of meticulous construction and the creation of enduring homes. Where vision meets craftsmanship.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <p class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-champagne">Explore</p>
                    <ul class="mt-6 space-y-3">
                        <li v-for="link in exploreLinks" :key="link.href">
                            <Link :href="link.href" class="text-sm text-origami/60 transition hover:text-champagne">{{ link.label }}</Link>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <p class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-champagne">Inquiries</p>
                    <ul class="mt-6 space-y-3">
                        <li class="text-sm text-origami/60">hello@builtbyarrow.com</li>
                        <li class="text-sm text-origami/60">Utah, East Bench — Deer Valley, Park City, Salt Lake City, and surrounding areas</li>
                    </ul>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="mt-16 flex flex-col items-center justify-between gap-6 border-t border-champagne/10 pt-8 md:flex-row">
                <p class="text-[0.62rem] font-medium text-origami/40">&copy; {{ currentYear }} Arrow Construction. All rights reserved.</p>
                <div class="flex gap-6">
                    <Link
                        v-for="link in legalLinks"
                        :key="link.label"
                        :href="link.href"
                        class="text-[0.62rem] font-bold uppercase tracking-[0.18em] text-origami/40 transition hover:text-champagne"
                    >
                        {{ link.label }}
                    </Link>
                </div>
            </div>
        </div>
    </footer>
</template>
