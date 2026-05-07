<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { MasonryWall } from '@yeger/vue-masonry-wall';
import ContactForm from '@/components/ContactForm.vue';
import Lightbox from '@/components/Lightbox.vue';
import { ref } from 'vue';

interface FeaturedPhoto {
    id: number;
    url: string;
    category_name: string | null;
}

defineProps<{
    projectTypes: string[];
    featuredPhotos: FeaturedPhoto[];
}>();

const lightboxOpen = ref(false);
const lightboxIndex = ref(0);

function openLightbox(index: number) {
    lightboxIndex.value = index;
    lightboxOpen.value = true;
}
</script>

<template>
    <Head title="Built By Arrow Construction — Luxury Homes, Park City & Deer Valley" />

    <div id="top"></div>

    <!-- ══════════════════════════════════════════════
        HERO — Image-First, Minimal Text
    ══════════════════════════════════════════════ -->
    <section
        class="relative h-screen w-full flex items-center justify-center overflow-hidden"
        style="background-image: linear-gradient(to bottom, rgba(52, 68, 76, 0.4) 0%, rgba(52, 68, 76, 0.5) 100%), url('/imgs/hero-bg.jpg'); background-size: cover; background-position: center;"
    >
        <div class="relative z-10 max-w-2xl px-6 text-center text-white">
            <div class="mb-4 bg-primary/20 inline-block px-4 py-4 rounded">
                <p class="mb-6 text-sm tracking-[0.2em] uppercase text-secondary font-light">Park City · Deer Valley · Heber</p>
            </div>
            <h1 class="font-display text-6xl md:text-7xl font-light leading-tight mb-8">
                Luxury<br />Construction
            </h1>
            <p class="text-lg md:text-xl font-light text-gray-200 mb-12 leading-relaxed">
                Remodels, additions, and new custom builds for homeowners across Utah's mountain communities.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a
                    href="#contact"
                    class="px-10 py-3 bg-secondary text-white text-sm tracking-widest uppercase font-light transition-all hover:opacity-90"
                >
                    Start a Conversation
                </a>
                <a
                    href="#portfolio"
                    class="px-10 py-3 border border-white text-white text-sm tracking-widest uppercase font-light transition-all hover:border-secondary hover:text-secondary"
                >
                    View Our Work
                </a>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-400">
            <span class="text-xs tracking-widest uppercase">Scroll</span>
            <div class="h-8 w-px bg-linear-to-b from-secondary to-transparent"></div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        ABOUT — Owner Story
    ══════════════════════════════════════════════ -->
    <section class="bg-white px-6 py-24 md:py-32">
        <div class="mx-auto max-w-5xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 md:gap-24 items-center">

                <!-- Image -->
                <div class="order-2 md:order-1">
                    <div class="aspect-4/3 bg-stone-200 overflow-hidden">
                        <!-- TODO: Replace owner headshot -->
                        <img
                            src="/imgs/owner.jpg"
                            alt="Built By Arrow"
                            loading="lazy"
                            class="w-full h-full object-cover"
                        />
                    </div>
                </div>

                <!-- Text -->
                <div class="order-1 md:order-2">
                    <!-- TODO: Confirm owner name -->
                    <h2 class="font-display text-5xl md:text-6xl font-light mb-8 text-gray-900">Renny Cyr</h2>

                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-gray-700">
                        <p>
                            After spending time in the trades, I started Built By Arrow Construction with one principle: do work that's worth doing. That background means I understand every level of quality craftsmanship.
                        </p>
                        <p>
                            My clients are mostly on their second or third homes in Park City, Deer Valley, and Heber. They expect efficiency, quality, and honesty. That's exactly what I deliver.
                        </p>
                        <p>
                            Nearly every project comes from a referral or a designer I've built a relationship with. When someone hires me, they're getting the network and the standards that reputation is built on.
                        </p>
                    </div>

                    <div class="mt-12 space-y-4">
                        <div>
                            <div class="text-xs tracking-wide uppercase text-gray-400 mb-1">Call</div>
                            <!-- TODO: Confirm phone number -->
                            <a href="tel:" class="text-lg text-primary hover:text-secondary transition-colors font-light">
                                [PHONE PLACEHOLDER]
                            </a>
                        </div>
                        <div>
                            <div class="text-xs tracking-wide uppercase text-gray-400 mb-1">Email</div>
                            <!-- TODO: Confirm professional email address -->
                            <a href="mailto:" class="text-lg text-primary hover:text-secondary transition-colors font-light">
                                [EMAIL PLACEHOLDER]
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        WHAT WE DO — Clean Grid
    ══════════════════════════════════════════════ -->
    <section class="bg-stone-50 px-6 py-24 md:py-32">
        <div class="mx-auto max-w-5xl">
            <h2 class="font-display text-5xl md:text-6xl font-light mb-20 text-primary">What We Do</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="font-display text-2xl md:text-3xl font-light mb-4 text-primary">Remodels</h3>
                    <p class="text-base leading-relaxed text-gray-700">Full home and room remodels, precision-managed from demo through finish. We handle every detail with care.</p>
                </div>
                <div>
                    <h3 class="font-display text-2xl md:text-3xl font-light mb-4 text-primary">Additions</h3>
                    <p class="text-base leading-relaxed text-gray-700">Expand your home's footprint with additions that blend seamlessly into the original structure and landscape.</p>
                </div>
                <div>
                    <h3 class="font-display text-2xl md:text-3xl font-light mb-4 text-primary">New Builds</h3>
                    <p class="text-base leading-relaxed text-gray-700">Ground-up custom homes designed around how you actually live. Your vision, our expertise, transparent pricing.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        HOW WE WORK — Process & Philosophy
    ══════════════════════════════════════════════ -->
    <section class="bg-white px-6 py-24 md:py-32">
        <div class="mx-auto max-w-5xl">
            <h2 class="font-display text-5xl md:text-6xl font-light mb-8 text-primary">How We Work</h2>
            <p class="text-xl text-gray-600 mb-20 max-w-3xl">We've built a process that removes surprises. Every step is transparent. Every number is explained.</p>

            <div class="space-y-12">
                <div class="border-l-2 border-secondary pl-8">
                    <h3 class="font-display text-2xl font-light text-primary mb-3">Initial Meeting</h3>
                    <p class="text-base leading-relaxed text-gray-700">We sit down to understand your project and determine if we're a good fit.</p>
                </div>

                <div class="border-l-2 border-secondary pl-8">
                    <h3 class="font-display text-2xl font-light text-primary mb-3">Contractor Walkthrough</h3>
                    <p class="text-base leading-relaxed text-gray-700">Within 1–2 weeks, we bring all our subs on-site to walk through the plans together. Your framer, plumber, and electrician coordinate in real time.</p>
                </div>

                <div class="border-l-2 border-secondary pl-8">
                    <h3 class="font-display text-2xl font-light text-primary mb-3">Transparent Budget</h3>
                    <p class="text-base leading-relaxed text-gray-700">Within ~2 weeks, you receive a fully itemized, open-book budget</p>
                </div>

                <div class="border-l-2 border-secondary pl-8">
                    <h3 class="font-display text-2xl font-light text-primary mb-3">In-Person Review</h3>
                    <p class="text-base leading-relaxed text-gray-700">We walk through the numbers together. Questions get answered on the spot. No surprises by email later.</p>
                </div>
            </div>

            <div class="mt-16 p-8 border-l-4 border-secondary bg-stone-50">
                <p class="text-lg text-primary font-light leading-relaxed">
                    <em>We work off a management fee—not markup. You see every bid, every number, every line. That's how we've built trust with some of the most demanding clients in the Mountain West.</em>
                </p>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        PORTFOLIO — Full-Width Gallery
    ══════════════════════════════════════════════ -->
    <section id="portfolio" class="bg-stone-50 px-6 py-24 md:py-32">
        <div class="mx-auto max-w-7xl">
            <h2 class="font-display text-5xl md:text-6xl font-light mb-4 text-primary">Selected Projects</h2>
            <p class="text-xl text-gray-600 mb-20">A few favorites from across the mountain communities.</p>

            <MasonryWall :items="featuredPhotos"
            :min-columns="2"
            :max-columns="3"
            :column-width="[200,300]" :gap="6">
                <template #default="{ item: photo, index }">
                    <div
                        class="group relative cursor-pointer overflow-hidden bg-stone-200"
                        @click="openLightbox(index)"
                    >
                        <img
                            :src="photo.url"
                            :alt="photo.category_name ?? 'Project photo'"
                            loading="lazy"
                            class="h-auto w-full transition-transform duration-500 group-hover:scale-105"
                        />
                        <div
                            v-if="photo.category_name"
                            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-stone-950/70 to-transparent px-4 py-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            <span class="text-xs tracking-widest uppercase text-secondary">{{ photo.category_name }}</span>
                        </div>
                    </div>
                </template>
            </MasonryWall>

            <div class="mt-12 flex flex-col sm:flex-row gap-6 items-center justify-between">
                <div>
                    <p class="text-gray-600 text-base">For the complete portfolio and more recent work,</p>
                    <!-- TODO: replace with actual Instagram handle/URL -->
                    <a
                        href="#"
                        target="_blank"
                        class="text-secondary hover:text-amber-light transition-colors font-light tracking-wide"
                    >
                        follow us on Instagram →
                    </a>
                </div>
                <a
                    href="/gallery"
                    class="px-8 py-3 border border-primary text-primary text-sm tracking-widest uppercase font-light transition-all hover:bg-stone-900 hover:text-white"
                >
                    Browse All Projects
                </a>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        CTA — Simple & Direct
    ══════════════════════════════════════════════ -->
    <section class="bg-primary px-6 py-20 md:py-28 text-center">
        <div class="mx-auto max-w-3xl">
            <h2 class="font-display text-5xl md:text-6xl font-light text-white mb-6">Ready to Begin?</h2>
            <p class="text-lg text-gray-300 mb-12 leading-relaxed">Let's talk about your project. No pressure, no pitch—just an honest conversation about what's possible.</p>
            <a
                href="#contact"
                class="inline-block px-10 py-3 bg-secondary text-white text-sm tracking-widest uppercase font-light transition-all hover:opacity-90"
            >
                Get In Touch
            </a>
        </div>
    </section>





    <!-- ══════════════════════════════════════════════
        LIGHTBOX
    ══════════════════════════════════════════════ -->
    <Lightbox v-model="lightboxOpen" :photos="featuredPhotos" :start-index="lightboxIndex" />


    <!-- ══════════════════════════════════════════════
        CONTACT FORM
    ══════════════════════════════════════════════ -->
    <section id="contact" class="bg-stone-50 px-6 py-24 md:py-32">
        <div class="mx-auto max-w-5xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-16">
                <!-- Info -->
                <div>
                    <h2 class="font-display text-4xl md:text-5xl font-light text-primary mb-8">Get In Touch</h2>
                    <p class="text-base text-gray-700 mb-12 leading-relaxed">
                        Fill out the form and I'll be in touch within one business day to set up a conversation about your project.
                    </p>
                    <div class="space-y-8">
                        <div>
                            <div class="text-xs tracking-widest uppercase text-gray-500 mb-2">Service Area</div>
                            <p class="text-base text-primary">Park City, Deer Valley, Heber & surrounding areas</p>
                        </div>

                    </div>
                </div>

                <!-- Form (spans 2 cols) -->
                <div class="md:col-span-2">
                    <ContactForm :project-types="projectTypes" />
                </div>
            </div>
        </div>
    </section>
</template>
