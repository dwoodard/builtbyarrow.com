<script setup lang="ts">
</script>

<template>
    <footer class="bg-charcoal px-6 py-7 text-bone/35">
        <div class="section-divider mb-8"></div>
        <div class="mx-auto max-w-7xl mb-5 flex justify-between items-baseline gap-4">
            <!-- Brand -->
            <div>
                <a href="/#top" class="flex items-center gap-1">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-bone">Built By Arrow</p>
                        <p class="text-xs uppercase tracking-[0.18em] opacity-50 text-bone">Construction</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-col items-center justify-between gap-4 text-xs sm:flex-row">
            <span>&copy; {{ new Date().getFullYear() }} Built By Arrow. All rights reserved.</span>
            <span>Licensed &middot; Insured &middot; SLC Contractor</span>
        </div>
    </footer>
</template>
