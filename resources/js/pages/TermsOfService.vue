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
  <Head title="Terms of Service" />
  <div class="bg-origami py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <h1 class="text-4xl font-bold text-graphite mb-8">Terms of Service</h1>

      <div class="prose prose-lg max-w-none text-graphite space-y-6">
        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">1. Agreement to Terms</h2>
          <p>
            By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">2. Use License</h2>
          <p>
            Permission is granted to temporarily download one copy of the materials (information or software) on Built by Arrow's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
          </p>
          <ul class="list-disc pl-6 space-y-2">
            <li>Modify or copy the materials</li>
            <li>Use the materials for any commercial purpose or for any public display</li>
            <li>Attempt to decompile or reverse engineer any software contained on the website</li>
            <li>Remove any copyright or other proprietary notations from the materials</li>
            <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
          </ul>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">3. Disclaimer</h2>
          <p>
            The materials on Built by Arrow's website are provided on an 'as is' basis. Built by Arrow makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">4. Limitations</h2>
          <p>
            In no event shall Built by Arrow or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Built by Arrow's website, even if Built by Arrow or an authorized representative has been notified orally or in writing of the possibility of such damage.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">5. Accuracy of Materials</h2>
          <p>
            The materials appearing on Built by Arrow's website could include technical, typographical, or photographic errors. Built by Arrow does not warrant that any of the materials on its website are accurate, complete, or current. Built by Arrow may make changes to the materials contained on its website at any time without notice.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">6. Links</h2>
          <p>
            Built by Arrow has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Built by Arrow of the site. Use of any such linked website is at the user's own risk.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">7. Modifications</h2>
          <p>
            Built by Arrow may revise these terms of service for its website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of service.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">8. Governing Law</h2>
          <p>
            These terms and conditions are governed by and construed in accordance with the laws of the United States, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.
          </p>
        </section>

        <section>
          <h2 class="text-2xl font-bold text-champagne mt-8 mb-4">9. Contact Information</h2>
          <p>
            If you have any questions about these Terms of Service, please contact us at:
          </p>
          <div class="bg-graphite/20 p-4 rounded mt-4">
            <p class="font-semibold">Built by Arrow</p>
            <p>Email: legal@builtbyarrow.com</p>
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
