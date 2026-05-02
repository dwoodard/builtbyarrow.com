<script setup lang="ts">
import { Form, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const flash = computed(() => (usePage().props.flash as { success?: string })?.success);

const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as const;
const times = ['Morning', 'Afternoon', 'Evening'] as const;
</script>

<template>
    <div>
        <div v-if="flash" class="mb-6 border border-champagne/40 bg-champagne/10 px-5 py-4">
            <p class="text-sm text-graphite">{{ flash }}</p>
        </div>

        <Form action="/contact" method="post" reset-on-success #default="{ errors, processing }">
            <div class="grid gap-5">
                <div>
                    <label class="mb-2 block text-[0.6rem] font-bold uppercase tracking-[0.2em] text-urbane">Name</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Your name"
                        class="w-full border border-iron/20 bg-origami px-4 py-3 text-sm text-graphite placeholder:text-urbane/50 focus:border-champagne focus:outline-none"
                        :class="{ 'border-red-400': errors.name }"
                    />
                    <p v-if="errors.name" class="mt-1 text-xs text-red-400">{{ errors.name }}</p>
                </div>

                <div>
                    <label class="mb-2 block text-[0.6rem] font-bold uppercase tracking-[0.2em] text-urbane">Phone Number</label>
                    <input
                        type="tel"
                        name="phone"
                        placeholder="(555) 000-0000"
                        class="w-full border border-iron/20 bg-origami px-4 py-3 text-sm text-graphite placeholder:text-urbane/50 focus:border-champagne focus:outline-none"
                        :class="{ 'border-red-400': errors.phone }"
                    />
                    <p v-if="errors.phone" class="mt-1 text-xs text-red-400">{{ errors.phone }}</p>
                </div>

                <div>
                    <p class="mb-3 text-[0.6rem] font-bold uppercase tracking-[0.2em] text-urbane">Preferred Days</p>
                    <div class="flex flex-wrap gap-2">
                        <label v-for="day in days" :key="day" class="cursor-pointer">
                            <input type="checkbox" name="preferred_days[]" :value="day.toLowerCase()" class="peer sr-only" />
                            <span class="block border border-iron/20 px-3 py-2 text-[0.62rem] font-bold uppercase tracking-[0.18em] text-urbane transition peer-checked:border-graphite peer-checked:bg-graphite peer-checked:text-origami">
                                {{ day }}
                            </span>
                        </label>
                    </div>
                </div>

                <div>
                    <p class="mb-3 text-[0.6rem] font-bold uppercase tracking-[0.2em] text-urbane">Best Time of Day</p>
                    <div class="flex flex-wrap gap-2">
                        <label v-for="time in times" :key="time" class="cursor-pointer">
                            <input type="radio" name="best_time" :value="time.toLowerCase()" class="peer sr-only" />
                            <span class="block border border-iron/20 px-3 py-2 text-[0.62rem] font-bold uppercase tracking-[0.18em] text-urbane transition peer-checked:border-graphite peer-checked:bg-graphite peer-checked:text-origami">
                                {{ time }}
                            </span>
                        </label>
                    </div>
                </div>

                <button
                    type="submit"
                    :disabled="processing"
                    class="mt-1 w-full bg-graphite px-6 py-4 text-[0.72rem] font-black uppercase tracking-[0.22em] text-origami shadow-luxury transition hover:bg-urbane disabled:cursor-not-allowed disabled:opacity-60 sm:text-[0.75rem] sm:tracking-[0.24em]"
                >
                    {{ processing ? 'Sending...' : 'Schedule a Call' }}
                </button>
            </div>
        </Form>
    </div>
</template>
