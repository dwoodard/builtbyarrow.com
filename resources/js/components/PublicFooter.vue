<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import BrandLogo from '@/components/BrandLogo.vue';
</script>

<template>
    <footer class="bg-stone-950 px-6 py-7 text-gray-400">
        <div class="section-divider mb-8"></div>
        <div class="mx-auto max-w-7xl mb-5 flex justify-between items-baseline gap-4">
            <!-- Brand -->
                <div>
                    <Link
                     href="/#top" class="flex items-center gap-1">
                        <BrandLogo size="sm" />
                    </Link>

                </div>

        </div>
        <div class="flex flex-col items-center justify-between gap-4 text-xs text-gray-600 sm:flex-row">
            <span>&copy; {{ new Date().getFullYear() }} Built By Arrow. All rights reserved.</span>
            <span>Licensed &middot; Insured &middot; SLC Contractor</span>
        </div>
    </footer>
</template>
