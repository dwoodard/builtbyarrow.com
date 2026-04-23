<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

import Lightbox from '@/components/Lightbox.vue';

interface Category {
    id: number;
    name: string;
    slug: string;
}

interface Photo {
    id: number;
    title: string;
    description: string | null;
    url: string;
    category_id: number | null;
    category_name: string | null;
    is_featured: boolean;
}

const props = defineProps<{
    categories: Category[];
    photos: Photo[];
}>();

// ── Category filter ────────────────────────────────────────────────────────
const activeCategory = ref<number | null>(null);

const filteredPhotos = computed(() =>
    activeCategory.value === null
        ? props.photos
        : props.photos.filter((p) => p.category_id === activeCategory.value),
);

// ── Lightbox state ─────────────────────────────────────────────────────────
const lightboxOpen = ref(false);
const lightboxIndex = ref(0);

function openLightbox(index: number) {
    lightboxIndex.value = index;
    lightboxOpen.value = true;
}
</script>

<template>
    <Head title="Gallery — Built By Arrow" />

    <!-- ══════════════════════════════════════════════
        PAGE HEADER
    ══════════════════════════════════════════════ -->
    <div class="bg-stone-950 px-6 py-24 text-center">
        <p class="mb-4 text-xs tracking-[0.3em] uppercase text-amber-gold">Our Portfolio</p>
        <h1 class="font-display text-4xl font-semibold text-white md:text-5xl">Project Gallery</h1>
        <div class="mx-auto mt-6 h-px w-24 bg-linear-to-r from-transparent via-amber-gold to-transparent"></div>
        <p class="mx-auto mt-6 max-w-lg text-sm leading-relaxed text-gray-400">
            Browse our completed renovations across the Treasure Valley — kitchens, bathrooms, basements, and more.
        </p>
    </div>

    <!-- ══════════════════════════════════════════════
        CATEGORY FILTER
    ══════════════════════════════════════════════ -->
    <div class="sticky top-16 z-20 border-b border-stone-200 bg-white px-6 shadow-sm">
        <div class="mx-auto flex max-w-7xl gap-1 overflow-x-auto py-3 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <button
                class="shrink-0 px-5 py-2 text-xs tracking-widest uppercase transition-all duration-200"
                :class="activeCategory === null ? 'bg-stone-950 text-white' : 'text-stone-600 hover:text-stone-900'"
                @click="activeCategory = null"
            >
                All
            </button>
            <button
                v-for="cat in categories"
                :key="cat.id"
                class="shrink-0 px-5 py-2 text-xs tracking-widest uppercase transition-all duration-200"
                :class="activeCategory === cat.id ? 'bg-stone-950 text-white' : 'text-stone-600 hover:text-stone-900'"
                @click="activeCategory = cat.id"
            >
                {{ cat.name }}
            </button>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════
        PHOTO GRID
    ══════════════════════════════════════════════ -->
    <section class="min-h-[50vh] bg-stone-50 px-6 py-12">
        <div class="mx-auto max-w-7xl">

            <!-- Empty state -->
            <div v-if="filteredPhotos.length === 0" class="flex flex-col items-center justify-center py-32 text-center">
                <div class="mb-6 flex h-16 w-16 items-center justify-center border border-stone-300 text-stone-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-sm tracking-widest uppercase text-stone-400">No photos yet</p>
                <p class="mt-2 text-xs text-stone-400">Check back soon — more projects are being added.</p>
            </div>

            <!-- Grid -->
            <div
                v-else
                class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
            >
                <div
                    v-for="(photo, index) in filteredPhotos"
                    :key="photo.id"
                    class="group relative cursor-pointer overflow-hidden bg-stone-200 aspect-4/3"
                    @click="openLightbox(index)"
                >
                    <img
                        :src="photo.url"
                        :alt="photo.title"
                        loading="lazy"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    <!-- Hover overlay -->
                    <div class="absolute inset-0 flex flex-col justify-end bg-linear-to-t from-stone-950/80 to-transparent p-5 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        <span v-if="photo.category_name" class="mb-1 text-xs tracking-widest uppercase text-amber-gold">{{ photo.category_name }}</span>
                        <h3 class="font-display text-base font-semibold text-white">{{ photo.title }}</h3>
                        <p v-if="photo.description" class="mt-1 text-xs text-gray-300">{{ photo.description }}</p>
                    </div>
                    <!-- Expand icon -->
                    <div class="absolute top-3 right-3 flex h-8 w-8 items-center justify-center bg-black/40 opacity-0 backdrop-blur-sm transition-opacity duration-300 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ══════════════════════════════════════════════
        LIGHTBOX
    ══════════════════════════════════════════════ -->
    <Lightbox v-model="lightboxOpen" :photos="filteredPhotos" :start-index="lightboxIndex" />
</template>
