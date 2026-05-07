<script setup lang="ts">
import { onMounted, onUnmounted, ref, watch } from 'vue';

interface Photo {
    id: number;
    url: string;
    category_name: string | null;
    title?: string;
    description?: string | null;
}

const props = defineProps<{
    photos: Photo[];
    modelValue: boolean;
    startIndex?: number;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: boolean];
}>();

const currentIndex = ref(props.startIndex ?? 0);
const lightboxEl = ref<HTMLDivElement | null>(null);
const isFullscreen = ref(false);
const isMounted = ref(false);

const currentPhoto = () => props.photos[currentIndex.value] ?? null;

watch(
    () => props.startIndex,
    (val) => {
        if (val !== undefined) {
            currentIndex.value = val;
        }
    },
);

watch(
    () => props.modelValue,
    (open) => {
        document.body.style.overflow = open ? 'hidden' : '';
    },
);

function close() {
    if (isFullscreen.value) {
        document.exitFullscreen().catch(() => {});
    }

    emit('update:modelValue', false);
}

function prev() {
    const total = props.photos.length;
    currentIndex.value = (currentIndex.value - 1 + total) % total;
}

function next() {
    const total = props.photos.length;
    currentIndex.value = (currentIndex.value + 1) % total;
}

async function toggleFullscreen() {
    if (!lightboxEl.value) {
        return;
    }

    if (!document.fullscreenElement) {
        await lightboxEl.value.requestFullscreen();
    } else {
        await document.exitFullscreen();
    }
}

function onFullscreenChange() {
    isFullscreen.value = !!document.fullscreenElement;
}

function onKeyDown(e: KeyboardEvent) {
    if (!props.modelValue) {
        return;
    }

    if (e.key === 'ArrowLeft') {
        prev();
    } else if (e.key === 'ArrowRight') {
        next();
    } else if (e.key === 'Escape') {
        close();
    } else if (e.key === 'f' || e.key === 'F') {
        toggleFullscreen();
    }
}

let touchStartX = 0;

function onTouchStart(e: TouchEvent) {
    touchStartX = e.touches[0].clientX;
}

function onTouchEnd(e: TouchEvent) {
    const delta = e.changedTouches[0].clientX - touchStartX;

    if (Math.abs(delta) > 50) {
        if (delta < 0) {
            next();
        } else {
            prev();
        }
    }
}

onMounted(() => {
    isMounted.value = true;
    window.addEventListener('keydown', onKeyDown);
    document.addEventListener('fullscreenchange', onFullscreenChange);
});

onUnmounted(() => {
    window.removeEventListener('keydown', onKeyDown);
    document.removeEventListener('fullscreenchange', onFullscreenChange);
    document.body.style.overflow = '';
});
</script>

<template>
    <Teleport to="body" :disabled="!isMounted">
        <div
            v-if="modelValue && currentPhoto()"
            ref="lightboxEl"
            class="fixed inset-0 z-50 flex flex-col bg-black"
            @touchstart="onTouchStart"
            @touchend="onTouchEnd"
        >
            <!-- Top bar -->
            <div class="flex shrink-0 items-center justify-between px-4 py-3">
                <span class="text-xs tracking-widest text-gray-400">
                    {{ currentIndex + 1 }} / {{ photos.length }}
                </span>

                <div class="flex items-center gap-2">
                    <!-- Fullscreen button -->
                    <button
                        class="flex h-9 w-9 items-center justify-center text-gray-400 transition-colors hover:text-white"
                        :title="isFullscreen ? 'Exit fullscreen (F)' : 'Fullscreen (F)'"
                        @click="toggleFullscreen"
                    >
                        <svg v-if="!isFullscreen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25" />
                        </svg>
                    </button>

                    <!-- Close button -->
                    <button
                        class="flex h-9 w-9 items-center justify-center text-gray-400 transition-colors hover:text-white"
                        title="Close (Esc)"
                        @click="close"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Image area -->
            <div class="relative flex min-h-0 flex-1 items-center justify-center px-14">
                <!-- Prev arrow -->
                <button
                    class="absolute left-2 flex h-10 w-10 items-center justify-center text-gray-400 transition-colors hover:text-white md:left-4 md:h-12 md:w-12"
                    :disabled="photos.length <= 1"
                    aria-label="Previous photo"
                    @click="prev"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Photo -->
                <img
                    :key="currentPhoto()!.id"
                    :src="currentPhoto()!.url"
                    :alt="currentPhoto()!.title ?? currentPhoto()!.category_name ?? 'Photo'"
                    class="max-h-full max-w-full object-contain"
                    style="max-height: calc(100vh - 9rem)"
                />

                <!-- Next arrow -->
                <button
                    class="absolute right-2 flex h-10 w-10 items-center justify-center text-gray-400 transition-colors hover:text-white md:right-4 md:h-12 md:w-12"
                    :disabled="photos.length <= 1"
                    aria-label="Next photo"
                    @click="next"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Info bar -->
            <div class="shrink-0 border-t border-white/10 px-6 py-4 text-center">
                <span v-if="currentPhoto()!.category_name" class="mb-1 block text-xs tracking-widest uppercase text-amber-gold">
                    {{ currentPhoto()!.category_name }}
                </span>
                <h2 v-if="currentPhoto()!.title" class="font-display text-lg font-semibold text-white">{{ currentPhoto()!.title }}</h2>
                <p v-if="currentPhoto()!.description" class="mt-1 text-xs text-gray-400">{{ currentPhoto()!.description }}</p>
                <p class="mt-3 hidden text-xs text-gray-600 md:block">← → arrow keys to navigate &nbsp;·&nbsp; F for fullscreen &nbsp;·&nbsp; Esc to close</p>
            </div>
        </div>
    </Teleport>
</template>
