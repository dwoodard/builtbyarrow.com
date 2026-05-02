<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import * as THREE from 'three';
import ContactForm from '@/components/ContactForm.vue';

interface FeaturedPhoto {
    id: number;
    url: string;
    category_name: string | null;
}

const props = defineProps<{
    projectTypes: string[];
    featuredPhotos: FeaturedPhoto[];
}>();

const heroCanvas = ref<HTMLCanvasElement | null>(null);
const heroHeader = ref<HTMLElement | null>(null);

onMounted(() => {
    const canvas = heroCanvas.value;
    const header = heroHeader.value;

    if (!canvas || !header) return;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!reducedMotion) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 100);
        camera.position.z = 7;

        const renderer = new THREE.WebGLRenderer({
            canvas,
            alpha: true,
            antialias: true,
            powerPreference: 'low-power',
        });

        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.75));

        const isMobile = () => window.innerWidth < 768;
        const particleCount = isMobile() ? 52 : 90;
        const positions = new Float32Array(particleCount * 3);
        const basePositions = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount; i++) {
            const i3 = i * 3;
            const x = (Math.random() - 0.5) * 9;
            const y = (Math.random() - 0.5) * 7;
            const z = (Math.random() - 0.5) * 2;

            positions[i3] = basePositions[i3] = x;
            positions[i3 + 1] = basePositions[i3 + 1] = y;
            positions[i3 + 2] = basePositions[i3 + 2] = z;
        }

        const geometry = new THREE.BufferGeometry();
        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

        const material = new THREE.PointsMaterial({
            color: '#E6E3DC',
            size: 3,
            transparent: true,
            opacity: 1,
            depthWrite: false,
        });

        const particles = new THREE.Points(geometry, material);
        scene.add(particles);

        const lineGeometry = new THREE.BufferGeometry();
        const lineMaterial = new THREE.LineBasicMaterial({
            color: '#D8C9A8',
            transparent: true,
            opacity: 0.5,
            depthWrite: false,
        });

        const randomLine = () => [
            (Math.random() - 0.5) * 9,
            (Math.random() - 0.5) * 7,
            (Math.random() - 0.5) * 2,
        ];

        const linePositions = new Float32Array([
            ...randomLine(),
            ...randomLine(),
            ...randomLine(),
        ]);
        lineGeometry.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
        const lines = new THREE.LineSegments(lineGeometry, lineMaterial);
        scene.add(lines);

        let width = 0;
        let height = 0;
        let pointerX = 0;
        let pointerY = 0;
        let targetX = 0;
        let targetY = 0;

        const resize = () => {
            const rect = header.getBoundingClientRect();
            width = rect.width;
            height = rect.height;
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
            renderer.setSize(width, height, false);
            material.size = isMobile() ? 0.025 : 0.032;
        };

        const onPointerMove = (event: PointerEvent) => {
            const rect = header.getBoundingClientRect();
            targetX = ((event.clientX - rect.left) / rect.width - 0.5) * 0.35;
            targetY = ((event.clientY - rect.top) / rect.height - 0.5) * 0.35;
        };

        window.addEventListener('resize', resize, { passive: true });
        window.addEventListener('pointermove', onPointerMove, { passive: true });
        resize();

        const clock = new THREE.Clock();

        const animate = () => {
            const elapsed = clock.getElapsedTime();

            pointerX += (targetX - pointerX) * 0.035;
            pointerY += (targetY - pointerY) * 0.035;

            for (let i = 0; i < particleCount; i++) {
                const i3 = i * 3;
                positions[i3] = basePositions[i3] + Math.sin(elapsed * 0.18 + i * 0.55) * 0.035;
                positions[i3 + 1] = basePositions[i3 + 1] + Math.cos(elapsed * 0.16 + i * 0.4) * 0.035;
            }

            geometry.attributes.position.needsUpdate = true;
            particles.rotation.y = elapsed * 0.018 + pointerX;
            particles.rotation.x = pointerY * 0.5;
            lines.rotation.y = elapsed * 0.012 + pointerX * 0.5;
            lines.rotation.x = pointerY * 0.25;

            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        };

        animate();

        onUnmounted(() => {
            window.removeEventListener('resize', resize);
            window.removeEventListener('pointermove', onPointerMove);
        });
    } else if (canvas) {
        canvas.remove();
    }
});
</script>

<template>
    <Head title="Built By Arrow Construction" />

    <main id="top" class="bg-origami text-iron">
        <!-- Hero -->
        <header ref="heroHeader" class="relative overflow-hidden -mt-[82px] min-h-[100svh] bg-graphite px-4 py-4 text-origami sm:px-5 md:px-8 md:py-7">
            <picture>
                <source media="(min-width: 768px)" srcset="/imgs/hero-bg.jpg" />
                <img src="/imgs/hero-bg.jpg" alt="Arrow Construction project work" class="absolute inset-0 h-full w-full scale-105 object-cover motion-safe:animate-[heroDrift_18s_ease-in-out_infinite_alternate]" />
            </picture>

            <div class="absolute inset-0 bg-gradient-to-b from-graphite/85 via-graphite/60 to-graphite/90 md:bg-gradient-to-r md:from-graphite md:via-graphite/78 md:to-graphite/25" />
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_18%,rgba(216,201,168,0.18),transparent_34%)] md:bg-[radial-gradient(circle_at_72%_28%,rgba(216,201,168,0.18),transparent_32%)]" />
            <div class="pointer-events-none absolute inset-x-4 top-13.5 bottom-4 border border-champagne/40 sm:inset-x-5 sm:bottom-5 md:inset-x-7 md:top-7 md:bottom-7" />
            <canvas ref="heroCanvas" class="pointer-events-none absolute inset-0 z-[1] h-full w-full opacity-45 mix-blend-screen" />

            <div class="p-10 relative z-10 mx-auto flex min-h-[calc(100svh-80px)] max-w-7xl items-end pb-9 pt-16 sm:min-h-[calc(100svh-88px)] sm:pb-12 md:min-h-[calc(100svh-104px)] md:py-24">
                <div class="w-full">
                    <div class="max-w-5xl">
                        <p class="mb-4 inline-flex max-w-[18rem] border border-champagne/30 bg-origami/10 px-3 py-2 text-[0.6rem] font-black uppercase leading-5 tracking-[0.22em] text-champagne backdrop-blur-xl sm:max-w-none sm:px-5 sm:text-[0.7rem] sm:tracking-[0.32em]">
                            FINE HOMES & RENOVATIONS
                        </p>

                        <h1 class="font-display text-[3.15rem] font-semibold leading-[0.86] tracking-[-0.055em] text-origami min-[390px]:text-[3.65rem] sm:text-7xl md:text-8xl lg:text-[8.5rem]">
                            Let's build something meaningful.
                        </h1>

                        <div class="mt-6 h-px max-w-xs bg-gradient-to-r from-champagne via-champagne/40 to-transparent sm:max-w-xl md:mt-8" />

                        <p class="mt-6 max-w-xl text-base leading-7 text-origami/78 sm:text-lg sm:leading-8 md:mt-8 md:text-xl">
                            From the initial walk through to the final detail, we deliver meticulous craftsmanship and steady expertise
                        </p>

                        <div class="mt-8 grid gap-3 sm:mt-10 sm:flex sm:flex-row md:mt-11">
                            <a href="#contact" class="bg-champagne px-5 py-4 text-center text-[0.68rem] font-black uppercase tracking-[0.2em] text-graphite shadow-luxury transition hover:bg-origami sm:px-8 sm:text-[0.75rem] sm:tracking-[0.24em]">
                                Schedule Consultation
                            </a>
                            <a href="#projects" class="border border-origami/30 bg-origami/10 px-5 py-4 text-center text-[0.68rem] font-black uppercase tracking-[0.2em] text-origami backdrop-blur-xl transition hover:border-champagne hover:text-champagne sm:px-8 sm:text-[0.75rem] sm:tracking-[0.24em]">
                                View Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Services -->
        <section id="services" class="bg-origami px-4 py-16 sm:px-5 sm:py-20 md:px-8 md:py-32">
            <!-- Philosophy -->
            <div class="mx-auto max-w-7xl">
                <p class="text-[0.65rem] font-black uppercase tracking-[0.28em] text-urbane sm:text-[0.72rem] sm:tracking-[0.32em]">
                    Our Philosophy
                </p>

                <p class="mt-6 max-w-3xl text-base leading-8 text-urbane sm:text-lg sm:leading-8 md:mt-8 md:text-xl">
                    At Arrow, we do more than construct houses. We coordinate every design detail, craftsperson, and material so your home's transformation is seamless. Whether you're starting from the ground up or renovating, the Arrow team provides attentive, personal service throughout the process. Our goal is to be more than the team that built your home. We strive to be a trusted partner you can count on long after the project is complete.
                </p>
            </div>

            <!-- How We Work -->
            <div class="mx-auto mt-20 max-w-7xl md:mt-32">
                <div class="grid gap-7 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
                    <div>
                        <p class="text-[0.65rem] font-black uppercase tracking-[0.28em] text-urbane sm:text-[0.72rem] sm:tracking-[0.32em]">
                            Our Process
                        </p>
                        <h2 class="mt-4 font-display text-4xl font-semibold leading-[0.95] tracking-[-0.045em] text-graphite min-[390px]:text-5xl md:mt-5 md:text-7xl">
                            How We Work
                        </h2>
                    </div>
                </div>

                <div class="mt-10 grid gap-px overflow-hidden border border-iron/10 bg-iron/10 shadow-soft md:mt-16 md:grid-cols-4">
                    <article class="bg-origami p-6 sm:p-8 md:p-10">
                        <span class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-urbane sm:text-[0.68rem] sm:tracking-[0.28em]">01 / Discovery</span>
                        <h3 class="mt-10 font-display text-3xl font-semibold tracking-[-0.04em] text-graphite sm:text-4xl md:mt-12">
                            Understanding
                        </h3>
                        <p class="mt-4 leading-7 text-urbane md:mt-5">Understanding your vision, timeline, and budget constraints.</p>
                    </article>

                    <article class="bg-jogging p-6 sm:p-8 md:p-10">
                        <span class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-urbane sm:text-[0.68rem] sm:tracking-[0.28em]">02 / Design & Planning</span>
                        <h3 class="mt-10 font-display text-3xl font-semibold tracking-[-0.04em] text-graphite sm:text-4xl md:mt-12">
                            Planning
                        </h3>
                        <p class="mt-4 leading-7 text-urbane md:mt-5">Detailed plans, clear expectations, and open communication every step.</p>
                    </article>

                    <article class="bg-iron p-6 text-origami sm:p-8 md:p-10">
                        <span class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-champagne sm:text-[0.68rem] sm:tracking-[0.28em]">03 / Construction</span>
                        <h3 class="mt-10 font-display text-3xl font-semibold tracking-[-0.04em] sm:text-4xl md:mt-12">
                            Building
                        </h3>
                        <p class="mt-4 leading-7 text-origami/68 md:mt-5">Expert subcontractors, daily coordination, and quality assurance.</p>
                    </article>

                    <article class="bg-graphite p-6 text-origami sm:p-8 md:p-10">
                        <span class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-champagne sm:text-[0.68rem] sm:tracking-[0.28em]">04 / Completion</span>
                        <h3 class="mt-10 font-display text-3xl font-semibold tracking-[-0.04em] sm:text-4xl md:mt-12">
                            Delivery
                        </h3>
                        <p class="mt-4 leading-7 text-origami/68 md:mt-5">Final walkthrough, documentation, and our commitment to your satisfaction.</p>
                    </article>
                </div>
            </div>

            <!-- Services -->
            <div class="mx-auto mt-20 max-w-7xl md:mt-32">
                <p class="text-[0.65rem] font-black uppercase tracking-[0.28em] text-urbane sm:text-[0.72rem] sm:tracking-[0.32em]">
                    Our Services
                </p>

                <div class="mt-16 grid gap-4 overflow-hidden border border-iron/10 bg-iron/10 p-4 shadow-soft md:mt-20 md:grid-cols-3">
                    <div class="bg-origami/50 p-6 sm:p-8 md:p-10">
                        <h4 class="font-display text-2xl font-semibold tracking-[-0.04em] text-graphite">Custom Home Construction</h4>
                        <p class="mt-3 text-sm leading-6 text-urbane">From foundation to final detail, we build homes designed for your life.</p>
                    </div>

                    <div class="bg-origami p-6 sm:p-8 md:p-10">
                        <h4 class="font-display text-2xl font-semibold tracking-[-0.04em] text-graphite">Residential Renovations</h4>
                        <p class="mt-3 text-sm leading-6 text-urbane">Kitchen, bath, and whole-home remodels with meticulous attention to detail.</p>
                    </div>

                    <div class="bg-origami p-6 sm:p-8 md:p-10">
                        <h4 class="font-display text-2xl font-semibold tracking-[-0.04em] text-graphite">Design Consultation</h4>
                        <p class="mt-3 text-sm leading-6 text-urbane">Expert guidance on layouts, materials, finishes, and project planning.</p>
                    </div>

                    <div class="bg-origami p-6 sm:p-8 md:p-10">
                        <h4 class="font-display text-2xl font-semibold tracking-[-0.04em] text-graphite">Luxury Home Additions</h4>
                        <p class="mt-3 text-sm leading-6 text-urbane">Expansions and additions designed to enhance your home's value and lifestyle—from primary suites to guest houses.</p>
                    </div>

                    <div class="bg-origami p-6 sm:p-8 md:p-10">
                        <h4 class="font-display text-2xl font-semibold tracking-[-0.04em] text-graphite">Project Management</h4>
                        <p class="mt-3 text-sm leading-6 text-urbane">Full oversight of timelines, budgets, trades, and quality from start to finish.</p>
                    </div>

                    <div class="bg-origami p-6 sm:p-8 md:p-10">
                        <h4 class="font-display text-2xl font-semibold tracking-[-0.04em] text-graphite">General Contracting</h4>
                        <p class="mt-3 text-sm leading-6 text-urbane">Coordinated subcontractors, clear communication, and premium client experience.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section id="projects" class="bg-graphite px-4 py-16 text-origami sm:px-5 sm:py-20 md:px-8 md:py-32">
            <div class="mx-auto max-w-7xl">
                <div class="mb-9 grid gap-6 md:mb-12 md:grid-cols-[1fr_auto] md:items-end">
                    <div>
                        <p class="text-[0.65rem] font-black uppercase tracking-[0.28em] text-champagne sm:text-[0.72rem] sm:tracking-[0.32em]">
                            Portfolio
                        </p>
                        <h2 class="mt-4 font-display text-4xl font-semibold leading-[0.95] tracking-[-0.045em] min-[390px]:text-5xl md:mt-5 md:text-7xl">
                            Work that feels permanent.
                        </h2>
                    </div>
                    <a href="#contact" class="w-fit border border-champagne/40 px-5 py-3 text-[0.68rem] font-black uppercase tracking-[0.2em] text-champagne transition hover:bg-champagne hover:text-graphite sm:px-6 sm:text-[0.72rem] sm:tracking-[0.24em]">
                        Discuss a Project
                    </a>
                </div>

                <div class="grid gap-5 md:gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                    <article class="group relative min-h-[430px] overflow-hidden bg-iron shadow-luxury sm:min-h-[520px] lg:min-h-[560px]">
                        <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=1600&q=85" alt="Luxury construction interior" class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-graphite via-graphite/50 to-transparent" />
                        <div class="absolute inset-x-4 bottom-4 border border-champagne/25 bg-graphite/60 p-5 backdrop-blur-xl sm:inset-x-6 sm:bottom-6 sm:p-7">
                            <p class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-champagne sm:text-[0.68rem] sm:tracking-[0.28em]">
                                Featured Projects
                            </p>
                            <h3 class="mt-3 font-display text-4xl font-semibold leading-none tracking-[-0.045em] sm:mt-4 sm:text-5xl">
                                Crafting Timeless Spaces with Unmatched Quality
                            </h3>
                        </div>
                    </article>

                    <div class="grid gap-5 md:gap-6">
                        <article class="border border-champagne/20 bg-urbane p-6 shadow-luxury sm:p-8 md:p-10">
                            <p class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-champagne sm:text-[0.68rem] sm:tracking-[0.28em]">
                                Residential
                            </p>
                            <h3 class="mt-12 font-display text-3xl font-semibold tracking-[-0.04em] sm:text-4xl md:mt-16">
                                Turn Your Space Into A Sanctuary
                            </h3>
                            <p class="mt-4 leading-7 text-origami/70 md:mt-5">
                                From kitchens to bathrooms, we transform everyday spaces into personalized retreats with meticulous craftsmanship and attention to detail.
                            </p>
                        </article>

                        <article class="border border-iron/10 bg-origami p-6 text-graphite shadow-luxury sm:p-8 md:p-10">
                            <p class="text-[0.62rem] font-black uppercase tracking-[0.24em] text-urbane sm:text-[0.68rem] sm:tracking-[0.28em]">
                                Custom Scope
                            </p>
                            <h3 class="mt-12 font-display text-3xl font-semibold tracking-[-0.04em] sm:text-4xl md:mt-16">
                                Explore our curated portfolio of distinguished projects.
                            </h3>
                            <p class="mt-4 leading-7 text-urbane md:mt-5">
                                From bespoke home builds to transformative renovations, our portfolio showcases a commitment to craftsmanship, design excellence, and client satisfaction. Each project reflects our dedication to creating spaces that are not only beautiful but also enduring.
                            </p>
                        </article>
                    </div>
                </div>

                <!-- Portfolio images -->
                <div v-if="featuredPhotos.length > 0" class="mt-10 grid gap-5 md:gap-6 lg:grid-cols-3">
                    <img
                        v-for="photo in featuredPhotos.slice(0, 6)"
                        :key="photo.id"
                        :src="photo.url"
                        :alt="`${photo.category_name || 'Project'} photo`"
                        class="h-[350px] w-full object-cover shadow-luxury sm:h-[420px] md:h-[500px]"
                    />
                </div>
                <div v-else class="mt-10 grid gap-5 md:gap-6 lg:grid-cols-3">
                    <div class="h-[350px] bg-iron sm:h-[420px] md:h-[500px]" />
                    <div class="h-[350px] bg-iron sm:h-[420px] md:h-[500px]" />
                    <div class="h-[350px] bg-iron sm:h-[420px] md:h-[500px]" />
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="bg-origami px-4 py-16 sm:px-5 sm:py-20 md:px-8 md:py-32">
            <div class="mx-auto max-w-7xl border border-iron/10 bg-jogging/45 p-6 shadow-soft sm:p-8 md:p-12 lg:p-16">
                <div class="grid gap-8 lg:grid-cols-[1fr_0.8fr] lg:items-start">
                    <div>
                        <p class="text-[0.65rem] font-black uppercase tracking-[0.28em] text-urbane sm:text-[0.72rem] sm:tracking-[0.32em]">
                            Arrow Construction
                        </p>
                        <h2 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[0.95] tracking-[-0.045em] text-graphite min-[390px]:text-5xl md:mt-5 md:text-7xl">
                            Let's discuss your next project. Schedule a call and we'll be in touch.
                        </h2>
                    </div>
                    <div>
                        <p class="mb-5 text-[0.65rem] font-black uppercase tracking-[0.28em] text-urbane sm:text-[0.72rem] sm:tracking-[0.32em]">
                            Plan a Call
                        </p>
                        <ContactForm />
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
