<script setup lang="ts">
import PublicFooter from '@/components/PublicFooter.vue';
import PublicNav from '@/components/PublicNav.vue';
</script>

<template>
    <div class="min-h-screen bg-origami font-sans text-iron antialiased">
        <PublicNav />
        <main>
            <slot />
        </main>
        <PublicFooter />
    </div>
</template>
