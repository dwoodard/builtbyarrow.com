<script setup lang="ts">

defineProps<{
    size?: 'sm' | 'md' | 'lg';
}>();
</script>

<template>
    <div class="flex items-center gap-1">
        <img
            class="h-20 w-60 object-contain"
            :class="[
                size === 'sm' ? 'h-4 w-4' : '',
                size === 'md' ? 'h-8 w-8' : '',
                size === 'lg' ? 'h-12 w-12' : '',
            ]"
            alt="Arrow Construction Logo"
        src="/imgs/logo/arrow_white-1.png">

    </div>
</template>
