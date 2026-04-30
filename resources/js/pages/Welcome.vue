<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { MasonryWall } from '@yeger/vue-masonry-wall';
import PublicNav from '@/components/PublicNav.vue';
import ContactForm from '@/components/ContactForm.vue';
import Lightbox from '@/components/Lightbox.vue';

interface FeaturedPhoto {
    id: number;
    url: string;
    category_name: string | null;
}

const props = defineProps<{
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
    <Head title="Built By Arrow Construction — " />

    <PublicNav />

    <main id="top" class="bg-bone text-ink">
        <!-- Hero -->
        <section class="relative min-h-screen overflow-hidden bg-cover bg-center" style="background-image: url('/imgs/hero-bg.jpg')">
            <div class="pointer-events-none absolute inset-0 bg-black/40" />

            <div class="relative z-10 flex min-h-screen flex-col items-center justify-center px-5 py-20 sm:px-8 lg:px-10">
                <div class="max-w-3xl text-center">
                    <p class="mb-8 text-xs font-semibold uppercase tracking-luxury text-clay">East Bench · Deer Valley · Heber </p>

                    <h1 class="font-serif text-5xl font-medium leading-[0.92] tracking-[-0.04em] text-bone sm:text-6xl lg:text-7xl">
                        A trusted path to your custom home
                    </h1>

                    <p class="mt-8 mx-auto max-w-2xl text-lg font-light leading-8 text-bone/80">
                        Arrow Construction creates refined residential spaces with disciplined budgets, trusted subcontractors, and a process designed for high-end homeowners who value clarity.
                    </p>

                    <div class="mt-10 flex flex-col gap-3 justify-center sm:flex-row">
                        <a href="tel:+14355550123" class="inline-flex items-center justify-center bg-bone px-7 py-4 text-sm font-semibold uppercase tracking-[0.2em] text-ink transition hover:bg-clay">
                            Schedule a Call
                        </a>
                        <a href="#work" class="inline-flex items-center justify-center border border-bone px-7 py-4 text-sm font-semibold uppercase tracking-[0.2em] text-bone transition hover:bg-bone hover:text-ink">
                            View Work
                        </a>
                    </div>
                </div>
            </div>
        </section>





        <!-- Work / Portfolio -->
        <section v-if="featuredPhotos.length > 0" id="work" class="px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto max-w-7xl">
                <div class="mb-16 flex items-end justify-between gap-8">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Our Work</p>
                        <h2 class="mt-2 font-serif text-5xl font-medium leading-tight text-ink">Portfolio</h2>
                    </div>
                </div>

                <MasonryWall
                    :items="featuredPhotos"
                    :min-columns="2"
                    :max-columns="3"
                    :column-width="[200, 300]"
                    :gap="6"
                >
                    <template #default="{ item: photo, index }">
                        <div
                            class="group relative cursor-pointer overflow-hidden bg-stone-soft"
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
                                class="absolute inset-x-0 bottom-0 bg-linear-to-t from-stone-950/70 to-transparent px-4 py-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                            >
                                <span class="text-xs uppercase tracking-widest text-clay">{{ photo.category_name }}</span>
                            </div>
                        </div>
                    </template>
                </MasonryWall>

                <div class="mt-12 flex flex-col items-center justify-center">
                    <a
                        href="/gallery"
                        class="border border-ink px-8 py-3 text-sm font-semibold uppercase tracking-[0.18em] text-ink transition hover:bg-ink hover:text-bone"
                    >
                        Browse All Projects
                    </a>
                </div>
            </div>
        </section>

        <!-- Philosophy / CTA -->
        <section class="bg-ink px-5 py-24 text-bone sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto max-w-5xl">
                <div class="grid gap-12 lg:grid-cols-[1fr_auto]">
                    <div>
                        <blockquote class="font-serif text-4xl font-light leading-tight lg:text-5xl">
                            "Quality craftsmanship, transparent communication, and disciplined project management — that's what sets Built By Arrow apart."
                        </blockquote>
                    </div>
                    <div class="flex flex-col items-start justify-end gap-6 lg:items-end">
                        <p class="max-w-xs text-sm font-light leading-relaxed text-bone/70">
                            Every project begins with a phone call. Let's talk about your vision.
                        </p>
                        <a href="#contact" class="border border-bone px-6 py-3 text-sm font-semibold uppercase tracking-[0.18em] transition hover:bg-bone hover:text-ink">
                            Start With a Phone Call
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process -->
        <section id="process" class="px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto max-w-7xl">
                <div class="mb-16">
                    <p class="text-xs font-semibold uppercase tracking-luxury text-clay">How We Work</p>
                    <h2 class="mt-2 font-serif text-5xl font-medium leading-tight text-ink">Our Process</h2>
                </div>

                <div class="space-y-8 border-l border-black/10">
                    <div class="pl-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">01 / Discovery</h3>
                        <p class="mt-2 text-base font-light leading-relaxed text-ink/70">Understanding your vision, timeline, and budget constraints.</p>
                    </div>
                    <div class="border-t border-black/10 pl-8 pt-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">02 / Design & Planning</h3>
                        <p class="mt-2 text-base font-light leading-relaxed text-ink/70">Detailed plans, clear expectations, and open communication every step.</p>
                    </div>
                    <div class="border-t border-black/10 pl-8 pt-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">03 / Construction</h3>
                        <p class="mt-2 text-base font-light leading-relaxed text-ink/70">Expert subcontractors, daily coordination, and quality assurance.</p>
                    </div>
                    <div class="border-t border-black/10 pl-8 pt-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">04 / Completion</h3>
                        <p class="mt-2 text-base font-light leading-relaxed text-ink/70">Final walkthrough, documentation, and our commitment to your satisfaction.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Operational Trust -->
        <section class="bg-stone-soft px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto max-w-7xl">
                <div class="mb-16">
                    <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Trust & Clarity</p>
                    <h2 class="mt-2 font-serif text-5xl font-medium leading-tight text-ink">Operational Transparency</h2>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    <div class="border border-black/10 p-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">Pre-Construction</h3>
                        <p class="mt-4 text-sm leading-relaxed text-ink/70">Detailed scope, timeline, and budget review with no surprises.</p>
                    </div>
                    <div class="border border-black/10 p-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">During the Build</h3>
                        <p class="mt-4 text-sm leading-relaxed text-ink/70">Weekly updates, transparent pricing, quality inspections at every phase.</p>
                    </div>
                    <div class="border border-black/10 p-8">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-ink">Communication</h3>
                        <p class="mt-4 text-sm leading-relaxed text-ink/70">Direct access to the project lead, responsive to questions and concerns.</p>
                    </div>
                </div>
            </div>
        </section>


         <!-- About -->
        <section class="px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto max-w-5xl">
                <div class="grid gap-16 md:gap-24 md:grid-cols-2 items-center">
                    <!-- Image -->
                    <div class="order-2 md:order-1">
                        <div class="aspect-4/3 overflow-hidden bg-stone-soft">
                            <img
                                src="/imgs/owner.jpg"
                                alt="Renny Cyr, Built By Arrow Construction"
                                loading="lazy"
                                class="h-full w-full object-cover"
                            />
                        </div>
                    </div>

                    <!-- Text -->
                    <div class="order-1 md:order-2">
                        <h2 class="font-serif text-5xl md:text-6xl font-light mb-8 text-ink">Renny Cyr</h2>

                        <div class="space-y-6 text-base md:text-lg leading-relaxed text-ink/70">
                            <p>
                                Arrow Construction specializes in high-end residential work throughout the Park City and Deer Valley area. We focus on delivering quality, transparency, and attention to detail on every project.
                            </p>
                            <p>
                                From initial consultation through final completion, we prioritize clear communication and professional craftsmanship. Our team handles everything with precision and care.
                            </p>
                        </div>

                        <div class="mt-12 space-y-4">
                            <div>
                                <div class="text-xs tracking-wide uppercase text-clay mb-1">Call</div>
                                <a href="tel:+14355550123" class="text-lg text-ink hover:text-clay transition-colors font-light">
                                    (435) 555-0123
                                </a>
                            </div>
                            <div>
                                <div class="text-xs tracking-wide uppercase text-clay mb-1">Email</div>
                                <a href="mailto:hello@builtbyarrow.com" class="text-lg text-ink hover:text-clay transition-colors font-light">
                                    hello@builtbyarrow.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contact -->
        <section id="contact" class="bg-charcoal px-5 py-24 text-bone sm:px-8 lg:px-10 lg:py-32">
            <div class="mx-auto grid max-w-7xl gap-14 lg:grid-cols-2">
                <div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Get In Touch</p>
                        <h2 class="mt-2 font-serif text-5xl font-medium leading-tight">Let's Build Something Remarkable</h2>
                    </div>

                    <div class="mt-12 space-y-8">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-bone/50">Phone</p>
                            <p class="mt-3 text-lg font-light">
                                <a href="tel:+14355550123" class="transition hover:text-clay">(435) 555-0123</a>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-bone/50">Email</p>
                            <p class="mt-3 text-lg font-light">
                                <a href="mailto:hello@builtbyarrow.com" class="transition hover:text-clay">hello@builtbyarrow.com</a>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-bone/50">Service Area</p>
                            <p class="mt-3 text-lg font-light leading-relaxed">Park City, Deer Valley, Heber, and surrounding areas.</p>
                        </div>
                    </div>
                </div>

                <ContactForm :project-types="projectTypes" :dark="true" />
            </div>
        </section>
    </main>



    <Lightbox v-model="lightboxOpen" :photos="featuredPhotos" :start-index="lightboxIndex" />
</template>
