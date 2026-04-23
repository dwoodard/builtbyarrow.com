<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
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
    <Head title="Expert Home Renovation — Treasure Valley, Idaho" />

    <!-- top of page anchor -->
    <div id="top"></div>

    <!-- ══════════════════════════════════════════════
        HERO
    ══════════════════════════════════════════════ -->
    <section
        class="hero-bg relative flex min-h-screen flex-col items-center justify-center px-6 text-center"
        style="background-image: linear-gradient(to bottom, rgba(26, 23, 20, 0.55) 0%, rgba(26, 23, 20, 0.3) 40%, rgba(26, 23, 20, 0.75) 100%), url('/imgs/main-bg.webp')"
    >
        <div class="mx-auto max-w-3xl backdrop-blur-[6px] p-10 bg-[#000000]/20 rounded-2xl">
            <p class="fade-up mb-6 font-body text-xs tracking-[0.35em] uppercase text-amber-gold">
                Idaho's Premier Renovation Specialists
            </p>
            <h1 class="fade-up delay-1 mb-6 font-display text-5xl font-semibold leading-tight text-white md:text-7xl">
                Luxury Renovations<br />
                <em class="not-italic text-amber-gold">&amp; Custom Remodeling</em>
            </h1>
            <p class="fade-up delay-2 mx-auto mb-10 max-w-xl text-lg font-light leading-relaxed text-gray-300 md:text-xl">
                Expert renovations crafted with care — from kitchens and bathrooms to full home transformations across the Treasure Valley.
            </p>
            <div class="fade-up delay-2 flex flex-col justify-center gap-4 sm:flex-row">
                <a
                    href="#contact"
                    class="bg-amber-gold px-8 py-4 font-body text-sm tracking-widest uppercase text-white transition-all duration-300 hover:bg-amber-light"
                >
                    Get a Free Estimate
                </a>
                <Link
                    href="/gallery"
                    class="border border-white px-8 py-4 font-body text-sm tracking-widest uppercase text-white transition-all duration-300 hover:border-amber-gold hover:text-amber-gold"
                >
                    View Our Work
            </Link>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="fade-up delay-3 absolute bottom-10 left-1/2 -translate-x-1/2">
            <div class="flex flex-col items-center gap-2 text-gray-400">
                <span class="text-xs tracking-widest uppercase">Scroll</span>
                <div class="h-10 w-px bg-linear-to-b from-amber-gold to-transparent"></div>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        STATS BAR
    ══════════════════════════════════════════════ -->
    <div class="bg-stone-950 px-6 py-10">
        <div class="mx-auto grid max-w-5xl grid-cols-2 gap-8 text-center md:grid-cols-4">
            <div>
                <div class="font-display text-4xl font-semibold text-amber-gold">25+</div>
                <div class="mt-1 text-sm tracking-wide text-gray-400">Years Experience</div>
            </div>
            <div>
                <div class="font-display text-4xl font-semibold text-amber-gold">400+</div>
                <div class="mt-1 text-sm tracking-wide text-gray-400">Projects Completed</div>
            </div>
        </div>
    </div>


    <!-- ══════════════════════════════════════════════
        SERVICES
    ══════════════════════════════════════════════ -->
    <section id="services" class="bg-white px-6 py-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <p class="mb-4 text-xs tracking-[0.3em] uppercase text-amber-gold">What We Do</p>
                <h2 class="font-display text-4xl font-semibold text-stone-900 md:text-5xl">Our Renovation Specialties</h2>
                <div class="section-divider mx-auto mt-6 w-24"></div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Kitchen -->
                <div class="group cursor-pointer border border-stone-200 bg-stone-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)]">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center border border-amber-gold/30 bg-amber-gold/10 transition-colors group-hover:bg-amber-gold/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="mb-3 font-display text-xl font-semibold text-stone-900">Kitchen Remodels</h3>
                    <p class="text-sm leading-relaxed text-gray-500">Custom cabinetry, countertops, islands, and full layout transformations that make your kitchen the heart of your home.</p>
                </div>

                <!-- Bathroom -->
                <div class="group cursor-pointer border border-stone-200 bg-stone-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)]">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center border border-amber-gold/30 bg-amber-gold/10 transition-colors group-hover:bg-amber-gold/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 font-display text-xl font-semibold text-stone-900">Bathroom Renovations</h3>
                    <p class="text-sm leading-relaxed text-gray-500">Spa-inspired retreats or efficient updates — tile work, vanities, walk-in showers, soaking tubs, and more.</p>
                </div>

                <!-- Basement -->
                <div class="group cursor-pointer border border-stone-200 bg-stone-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)]">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center border border-amber-gold/30 bg-amber-gold/10 transition-colors group-hover:bg-amber-gold/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="mb-3 font-display text-xl font-semibold text-stone-900">Basement Finishing</h3>
                    <p class="text-sm leading-relaxed text-gray-500">Unlock your home's hidden potential. Entertainment rooms, home offices, guest suites, and full basement buildouts.</p>
                </div>

                <!-- Additions -->
                <div class="group cursor-pointer border border-stone-200 bg-stone-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)]">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center border border-amber-gold/30 bg-amber-gold/10 transition-colors group-hover:bg-amber-gold/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 font-display text-xl font-semibold text-stone-900">Additions &amp; Room Expansions</h3>
                    <p class="text-sm leading-relaxed text-gray-500">Need more space? We design and build additions that blend seamlessly with your existing home's style and structure.</p>
                </div>

                <!-- Painting -->
                <div class="group cursor-pointer border border-stone-200 bg-stone-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)]">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center border border-amber-gold/30 bg-amber-gold/10 transition-colors group-hover:bg-amber-gold/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="mb-3 font-display text-xl font-semibold text-stone-900">Interior Painting &amp; Trim</h3>
                    <p class="text-sm leading-relaxed text-gray-500">Precision painting, custom millwork, crown molding, and finish carpentry that add character and polish to every room.</p>
                </div>

                <!-- Flooring -->
                <div class="group cursor-pointer border border-stone-200 bg-stone-50 p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)]">
                    <div class="mb-6 flex h-12 w-12 items-center justify-center border border-amber-gold/30 bg-amber-gold/10 transition-colors group-hover:bg-amber-gold/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </div>
                    <h3 class="mb-3 font-display text-xl font-semibold text-stone-900">Flooring &amp; Tile</h3>
                    <p class="text-sm leading-relaxed text-gray-500">Hardwood, LVP, tile, and stone installation — expertly matched to your home's design for lasting beauty underfoot.</p>
                </div>

            </div>

            <div class="mt-12 text-center">
                <a
                    href="#contact"
                    class="inline-block border border-stone-900 px-8 py-4 text-sm tracking-widest uppercase text-stone-900 transition-all duration-300 hover:bg-stone-900 hover:text-white"
                >
                    Discuss Your Project →
                </a>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        PORTFOLIO / FEATURED GALLERY
    ══════════════════════════════════════════════ -->
    <section id="portfolio" class="bg-stone-50 px-6 py-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <p class="mb-4 text-xs tracking-[0.3em] uppercase text-amber-gold">Our Work</p>
                <h2 class="font-display text-4xl font-semibold text-stone-900 md:text-5xl">Featured Projects</h2>
                <div class="section-divider mx-auto mt-6 mb-5 w-24"></div>
                <p class="mx-auto max-w-md text-sm text-gray-500">A glimpse of what's possible. Browse our full gallery for the complete portfolio.</p>
            </div>

            <MasonryWall :items="featuredPhotos"
            :min-columns="2"
            :max-columns="3"
            :column-width="[200,300]" :gap="5">
                <template #default="{ item: photo, index }">
                    <div
                        class="group relative cursor-pointer overflow-hidden bg-stone-200"
                        @click="openLightbox(index)"
                    >
                        <img
                            :src="photo.url"
                            :alt="photo.category_name ?? 'Renovation photo'"
                            loading="lazy"
                            class="h-auto w-full transition-transform duration-500 group-hover:scale-105"
                        />
                        <div
                            v-if="photo.category_name"
                            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-stone-950/80 to-transparent px-3 py-3 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            <span class="text-xs tracking-widest uppercase text-amber-gold">{{ photo.category_name }}</span>
                        </div>
                    </div>
                </template>
            </MasonryWall>

            <div class="mt-10 text-center">
                <a
                    href="/gallery"
                    class="inline-block border border-stone-900 px-8 py-4 text-sm tracking-widest uppercase text-stone-900 transition-all duration-300 hover:bg-stone-900 hover:text-white"
                >
                    Browse All Projects →
                </a>
            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        ABOUT
    ══════════════════════════════════════════════ -->
    <section id="about" class="bg-white px-6 py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 items-center gap-16 sm:grid-cols-2">

                <!-- Image -->
                <div class="relative ">
                    <div class="aspect-4/5 overflow-hidden bg-stone-200">
                        <img
                            src="/UPDATE.webp"
                            alt="Built By Arrow"
                            loading="lazy"
                            class="h-full w-full object-cover"
                        />
                    </div>
                    <div class="absolute -right-6 -bottom-6 hidden h-36 w-36 border-2 border-amber-gold lg:block"></div>
                    <div class="absolute -top-4 -left-4 hidden bg-stone-950 p-4 text-white lg:block">
                        <div class="font-display text-3xl font-semibold text-amber-gold">20+</div>
                        <div class="text-xs tracking-wide text-gray-300">Yrs in Idaho</div>
                    </div>
                </div>

                <!-- Text -->
                <div>
                    <p class="mb-4 text-xs tracking-[0.3em] uppercase text-amber-gold">About Us</p>
                    <h2 class="mb-6 font-display text-4xl font-semibold leading-tight text-stone-900 md:text-5xl">
                        Meet Renny Cyr
                    </h2>
                    <div class="section-divider mb-8 w-16"></div>
                    <p class="mb-5 leading-relaxed text-gray-600">
                        Hello, my name is Renny Cyr with Built By Arrow. I've spent my entire life in the construction industry, gaining hands-on experience early on as a subcontractor across multiple trades.
                    </p>
                    <p class="mb-5 leading-relaxed text-gray-600">
                        That background gives me a unique advantage when managing renovation projects. I understand what quality craftsmanship looks like at every level, and I work closely with skilled subcontractors to ensure every detail of your home renovation meets a high standard.
                    </p>
                    <p class="mb-8 leading-relaxed text-gray-600">
                        My goal is to build strong, personal relationships with each client and guide you through every stage of your renovation — from initial ideas and design, through planning and budgeting, to the final transformation of your home.
                    </p>

                    <div class="flex flex-col gap-6 sm:flex-row">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center border border-amber-gold/30 bg-amber-gold/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs tracking-wide uppercase text-gray-400">Call Renny</div>
                                <a href="tel:+12088608898" class="text-sm font-semibold text-stone-900 transition-colors hover:text-amber-gold">
                                    (208) 860-8898
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center border border-amber-gold/30 bg-amber-gold/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs tracking-wide uppercase text-gray-400">Email</div>
                                <a href="mailto:renny@builtbyarrow.com" class="text-sm font-semibold text-stone-900 transition-colors hover:text-amber-gold">
                                    renny@builtbyarrow.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════
        CTA BANNER
    ══════════════════════════════════════════════ -->
    <div class="relative overflow-hidden bg-stone-950 px-6 py-20 ">
        <div
            class="pointer-events-none absolute inset-0 opacity-10"
            style="background-image: repeating-linear-gradient(45deg, var(--color-amber-gold) 0, var(--color-amber-gold) 1px, transparent 0, transparent 50%); background-size: 20px 20px;"
        >
    </div>
        <div class="relative z-10 mx-auto max-w-3xl text-center ">
            <p class="mb-5 text-xs tracking-[0.3em] uppercase text-amber-gold">Ready to Get Started?</p>
            <h2 class="mb-6 font-display text-4xl font-semibold text-white md:text-5xl">Let's Renovate Your Home</h2>
            <p class="mb-10 leading-relaxed text-gray-400">Free estimates. No pressure. Just a conversation about what's possible for your home.</p>
            <a
                href="#contact"
                class="inline-block bg-amber-gold px-10 py-4 text-sm tracking-widest uppercase text-white transition-all duration-300 hover:bg-amber-light"
            >
                Get Your Free Estimate
            </a>
        </div>
    </div>


    <!-- ══════════════════════════════════════════════
        LIGHTBOX
    ══════════════════════════════════════════════ -->
    <Lightbox v-model="lightboxOpen" :photos="featuredPhotos" :start-index="lightboxIndex" />


    <!-- ══════════════════════════════════════════════
        CONTACT FORM
    ══════════════════════════════════════════════ -->
    <section id="contact" class="bg-stone-50 px-6 py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-16 lg:grid-cols-5">

                <!-- Left info -->
                <div class="lg:col-span-2">
                    <p class="mb-4 text-xs tracking-[0.3em] uppercase text-amber-gold">Get In Touch</p>
                    <h2 class="mb-6 font-display text-4xl font-semibold text-stone-900">Start Your Project</h2>
                    <div class="section-divider mb-8 w-16"></div>
                    <p class="mb-8 text-sm leading-relaxed text-gray-500">
                        Fill out the form and we'll get back to you.
                    </p>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center border border-amber-gold/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="mb-1 text-xs tracking-widest uppercase text-gray-400">Service Area</div>
                                <div class="text-sm text-stone-800">Treasure Valley & Surrounding areas.</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center border border-amber-gold/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="mb-1 text-xs tracking-widest uppercase text-gray-400">Response Time</div>
                                <div class="text-sm text-stone-800">We respond to all inquiries within 1 business day</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div  class="lg:col-span-3">
                    <ContactForm :project-types="projectTypes" />
                </div>

            </div>
        </div>
    </section>
</template>
