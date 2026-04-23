<script setup lang="ts">
import { Form, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps<{ projectTypes: string[] }>();

const flash = computed(() => (usePage().props.flash as { success?: string })?.success);
</script>

<template>
    <div>
        <!-- Success state -->
        <div v-if="flash" class="mb-8 border border-amber-gold/40 bg-amber-gold/10 px-6 py-5">
            <div class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0 text-amber-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p class="text-sm text-stone-800">{{ flash }}</p>
            </div>
        </div>

        <Form
            action="/contact"
            method="post"
            reset-on-success
            #default="{ errors, processing }"
        >
            <div class="bg-white p-10 shadow-sm">
                <div class="space-y-6">

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs tracking-widest uppercase text-gray-500">First Name</label>
                            <input type="text" name="first_name" required placeholder="Jane" class="form-input" :class="{ 'border-red-400': errors.first_name }" />
                            <p v-if="errors.first_name" class="mt-1 text-xs text-red-500">{{ errors.first_name }}</p>
                        </div>
                        <div>
                            <label class="mb-2 block text-xs tracking-widest uppercase text-gray-500">Last Name</label>
                            <input type="text" name="last_name" required placeholder="Smith" class="form-input" :class="{ 'border-red-400': errors.last_name }" />
                            <p v-if="errors.last_name" class="mt-1 text-xs text-red-500">{{ errors.last_name }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-xs tracking-widest uppercase text-gray-500">Phone</label>
                            <input type="tel" name="phone" required placeholder="208 555 1234" class="form-input" :class="{ 'border-red-400': errors.phone }" />
                            <p v-if="errors.phone" class="mt-1 text-xs text-red-500">{{ errors.phone }}</p>
                        </div>
                        <div>
                            <label class="mb-2 block text-xs tracking-widest uppercase text-gray-500">Email</label>
                            <input type="email" name="email" required placeholder="me@example.com" class="form-input" :class="{ 'border-red-400': errors.email }" />
                            <p v-if="errors.email" class="mt-1 text-xs text-red-500">{{ errors.email }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-xs tracking-widest uppercase text-gray-500">Type of Project</label>
                        <select name="project_type" required class="form-input" :class="{ 'border-red-400': errors.project_type }">
                            <option value="">Select a service...</option>
                            <option v-for="type in projectTypes" :key="type" :value="type">{{ type }}</option>
                        </select>
                        <p v-if="errors.project_type" class="mt-1 text-xs text-red-500">{{ errors.project_type }}</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-xs tracking-widest uppercase text-gray-500">Tell Us About Your Project</label>
                        <textarea
                            name="description"
                            rows="5"
                            placeholder="Describe what you're looking to renovate, your timeline, and any other details..."
                            class="form-input resize-none"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        :disabled="processing"
                        class="w-full bg-stone-950 py-4 text-sm tracking-widest uppercase text-white transition-all duration-300 hover:bg-amber-gold disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        {{ processing ? 'Sending...' : 'Send Message to Renny →' }}
                    </button>

                    <p class="text-center text-xs text-gray-400">We respect your privacy. Your information is never shared.</p>

                </div>
            </div>
        </Form>
    </div>
</template>
