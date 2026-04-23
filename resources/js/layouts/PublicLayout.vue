<script setup lang="ts">
import PublicFooter from '@/components/PublicFooter.vue';
import PublicNav from '@/components/PublicNav.vue';
</script>

<template>
    <div class="font-body">
        <PublicNav />
        <main>
            <slot />
        </main>
        <PublicFooter />
    </div>
</template>
