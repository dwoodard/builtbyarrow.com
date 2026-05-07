<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({
  layout: PublicLayout,
});

const currentDate = new Date().toLocaleDateString('en-US', {
  year: 'numeric',
  month: 'long',
  day: 'numeric'
})
</script>

<template>
  <Head title="Privacy Policy" />
  <div class="bg-origami py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <h1 class="text-4xl font-bold text-graphite mb-8">Privacy Policy</h1>

      <div class="prose prose-lg max-w-none text-graphite space-y-6">
        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">Introduction</h2>
          <p>
            At Built by Arrow, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">Information We Collect</h2>
          <p>
            We may collect information about you in a variety of ways. The information we may collect on the site includes:
          </p>
          <ul class="list-disc pl-6 space-y-2">
            <li>Personal identification information (name, email address, phone number, etc.)</li>
            <li>Device information (IP address, browser type, operating system)</li>
            <li>Usage information (pages visited, time spent, links clicked)</li>
            <li>Information you provide voluntarily through forms and submissions</li>
          </ul>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">Use of Your Information</h2>
          <p>Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you via the site to:</p>
          <ul class="list-disc pl-6 space-y-2">
            <li>Process your transactions and send related information</li>
            <li>Email you regarding your account or order</li>
            <li>Fulfill and manage purchases, orders, payments, and other transactions related to our website</li>
            <li>Generate a personal profile about you so that future visits to our site will be personalized</li>
            <li>Improve our website in order to better serve you</li>
            <li>Respond to your inquiries, questions, and requests</li>
          </ul>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">Disclosure of Your Information</h2>
          <p>
            We may share or disclose your information in the following situations:
          </p>
          <ul class="list-disc pl-6 space-y-2">
            <li>By Law or to Protect Rights</li>
            <li>Third-Party Service Providers</li>
            <li>Business Transfers</li>
          </ul>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">Security of Your Information</h2>
          <p>
            We use administrative, technical, and physical security measures to protect your personal information. However, no method of transmission over the internet or method of electronic storage is 100% secure.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">Contact Us</h2>
          <p>
            If you have questions or comments about this Privacy Policy, please contact us at:
          </p>
          <div class="bg-graphite/20 p-4 rounded mt-4">
            <p class="font-semibold">Built by Arrow</p>
            <p>Email: privacy@builtbyarrow.com</p>
          </div>
        </section>

        <section class="mt-12 pt-8 border-t border-origami/20">
          <p class="text-sm text-origami/60">
            Last updated: {{ currentDate }}
          </p>
        </section>
      </div>
    </div>
  </div>
</template>
