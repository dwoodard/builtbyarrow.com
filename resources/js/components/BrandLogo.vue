<script setup lang="ts">
// props size: 'sm' | 'md' | 'lg' = 'md'

defineProps<{
    size?: 'sm' | 'md' | 'lg';
}>();
</script>

<template>
    <div class="flex items-center gap-1">
        <img
            :class="[
                size === 'sm' ? 'h-4 w-4' : '',
                size === 'md' ? 'h-8 w-8' : '',
                size === 'lg' ? 'h-12 w-12' : '',
            ]
            "
        src="/imgs/logo/UPDATE.png" alt="Built By Arrow Logo" class="h-5 w-5 object-contain">
        <span
        :class="[
            size === 'sm' ? 'text-sm' : '',
            size === 'md' ? 'text-base' : '',
            size === 'lg' ? 'text-lg' : '',
        ]"
        class="font-display text-base font-semibold text-white">Built By Arrow</span>
    </div>
</template>
