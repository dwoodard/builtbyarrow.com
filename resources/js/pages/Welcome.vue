<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Built By Arrow Construction</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            ink: '#141414',
            bone: '#F6F1EA',
            stoneSoft: '#E6DDD2',
            clay: '#9B7A5E',
            charcoal: '#242424'
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            serif: ['Cormorant Garamond', 'Georgia', 'serif']
          },
          letterSpacing: {
            luxury: '.22em'
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-bone text-ink antialiased selection:bg-ink selection:text-bone">
  <!-- Header -->
  <header class="fixed inset-x-0 top-0 z-50 border-b border-black/10 bg-bone/85 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8 lg:px-10">
      <a href="#top" class="group flex items-center gap-3" aria-label="Built By Arrow home">

        <!-- LOGO -->
        <div>
          <p class="text-sm font-semibold uppercase tracking-[0.2em]">Built By Arrow</p>
          <p class="hidden text-xs uppercase tracking-[0.18em] text-ink/50 sm:block">Construction</p>
        </div>
      </a>

      <nav class="hidden items-center gap-8 text-xs font-medium uppercase tracking-luxury text-ink/70 md:flex">
        <a href="#work" class="transition hover:text-ink">Work</a>
        <a href="#process" class="transition hover:text-ink">Process</a>
        <a href="#contact" class="transition hover:text-ink">Contact</a>
      </nav>

      <a href="tel:+14355550123" class="border border-ink px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] transition hover:bg-ink hover:text-bone">
        Call
      </a>
    </div>
  </header>

  <main id="top">
    <!-- Hero -->
    <section class="relative min-h-screen overflow-hidden pt-24">
      <div class="absolute inset-y-0 right-0 hidden w-1/2 bg-charcoal lg:block"></div>

      <div class="mx-auto grid min-h-[calc(100vh-6rem)] max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 lg:grid-cols-2 lg:px-10 lg:py-24">
        <div class="relative z-10 max-w-2xl">
          <p class="mb-8 text-xs font-semibold uppercase tracking-luxury text-clay">Park City · Deer Valley · Heber · Hideout</p>

          <h1 class="font-serif text-6xl font-medium leading-[0.92] tracking-[-0.04em] text-ink sm:text-7xl lg:text-8xl">
            A trusted path to your custom home
          </h1>

          <p class="mt-8 max-w-xl text-lg font-light leading-8 text-ink/70">
            Built By Arrow creates refined residential spaces with disciplined budgets, trusted subcontractors, and a process designed for high-end homeowners who value clarity.
          </p>

          <div class="mt-10 flex flex-col gap-3 sm:flex-row">
            <a href="tel:+14355550123" class="inline-flex items-center justify-center bg-ink px-7 py-4 text-sm font-semibold uppercase tracking-[0.2em] text-bone transition hover:bg-clay">
              Schedule a Call
            </a>
            <a href="#work" class="inline-flex items-center justify-center border border-ink/20 px-7 py-4 text-sm font-semibold uppercase tracking-[0.2em] text-ink transition hover:border-ink">
              View Work
            </a>
          </div>
        </div>

        <div class="relative z-10 lg:pl-8">
          <div class="aspect-[4/5] w-full overflow-hidden bg-stoneSoft shadow-2xl shadow-black/20">
            <!-- Replace with a real project image -->
            <img
              src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1400&auto=format&fit=crop"
              alt="Luxury mountain home interior by Built By Arrow Construction"
              class="h-full w-full object-cover grayscale-[15%]"
            />
          </div>
          <div class="mt-5 flex items-center justify-between text-xs uppercase tracking-[0.18em] text-bone/70 lg:text-bone/70">
            <span class="hidden lg:inline">Residential Remodels</span>
            <span class="text-ink/50 lg:text-bone/50">Built with restraint</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Social Proof Strip -->
    <section class="border-y border-black/10 bg-bone">
      <div class="mx-auto grid max-w-7xl gap-8 px-5 py-12 sm:px-8 md:grid-cols-3 lg:px-10">
        <div>
          <p class="text-xs uppercase tracking-luxury text-ink/45">Primary Work</p>
          <p class="mt-3 text-2xl font-light">High-end residential construction</p>
        </div>
        <div>
          <p class="text-xs uppercase tracking-luxury text-ink/45">Trusted By</p>
          <p class="mt-3 text-2xl font-light">Designers, cabinet partners, and referral networks</p>
        </div>
        <div>
          <p class="text-xs uppercase tracking-luxury text-ink/45">Approach</p>
          <p class="mt-3 text-2xl font-light">Transparent budgets before momentum</p>
        </div>
      </div>
    </section>

    <!-- Work -->
    <section id="work" class="px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
      <div class="mx-auto max-w-7xl">
        <div class="mb-14 flex flex-col justify-between gap-6 md:flex-row md:items-end">
          <div>
            <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Selected Work</p>
            <h2 class="mt-4 max-w-2xl font-serif text-5xl font-medium tracking-[-0.03em] sm:text-6xl">A few projects. No noise.</h2>
          </div>
          <a href="https://instagram.com/" target="_blank" rel="noreferrer" class="text-sm font-semibold uppercase tracking-[0.2em] underline decoration-ink/25 underline-offset-8 transition hover:decoration-ink">
            View Instagram
          </a>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
          <article class="group">
            <div class="aspect-[4/5] overflow-hidden bg-stoneSoft">
              <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=1000&auto=format&fit=crop" alt="Custom kitchen remodel" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
            </div>
            <div class="mt-5 flex items-start justify-between gap-4">
              <div>
                <h3 class="text-lg font-medium">Deer Valley Kitchen</h3>
                <p class="mt-2 text-sm leading-6 text-ink/60">Custom finish coordination, cabinetry integration, and clean execution.</p>
              </div>
              <span class="text-xs uppercase tracking-[0.2em] text-ink/40">01</span>
            </div>
          </article>

          <article class="group md:mt-16">
            <div class="aspect-[4/5] overflow-hidden bg-stoneSoft">
              <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1000&auto=format&fit=crop" alt="Mountain living room remodel" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
            </div>
            <div class="mt-5 flex items-start justify-between gap-4">
              <div>
                <h3 class="text-lg font-medium">Park City Living</h3>
                <p class="mt-2 text-sm leading-6 text-ink/60">Detailed subcontractor alignment for a polished mountain-home finish.</p>
              </div>
              <span class="text-xs uppercase tracking-[0.2em] text-ink/40">02</span>
            </div>
          </article>

          <article class="group">
            <div class="aspect-[4/5] overflow-hidden bg-stoneSoft">
              <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=1000&auto=format&fit=crop" alt="Luxury bathroom remodel" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
            </div>
            <div class="mt-5 flex items-start justify-between gap-4">
              <div>
                <h3 class="text-lg font-medium">Heber Bath Suite</h3>
                <p class="mt-2 text-sm leading-6 text-ink/60">Refined material sequencing and finish-level project management.</p>
              </div>
              <span class="text-xs uppercase tracking-[0.2em] text-ink/40">03</span>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Philosophy / CTA -->
    <section class="bg-ink px-5 py-24 text-bone sm:px-8 lg:px-10 lg:py-32">
      <div class="mx-auto grid max-w-7xl gap-14 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
        <div>
          <p class="text-xs font-semibold uppercase tracking-luxury text-bone/45">Why Arrow</p>
          <h2 class="mt-4 font-serif text-5xl font-medium tracking-[-0.03em] sm:text-6xl">The best projects start with fit.</h2>
        </div>

        <div class="max-w-3xl">
          <p class="text-2xl font-light leading-10 text-bone/75">
            Before drawings become dollars and schedules become commitments, we make sure the homeowner, scope, budget, and trade team are aligned. That discipline protects the final result.
          </p>
          <a href="tel:+14355550123" class="mt-10 inline-flex border border-bone px-7 py-4 text-sm font-semibold uppercase tracking-[0.2em] transition hover:bg-bone hover:text-ink">
            Start with a Phone Call
          </a>
        </div>
      </div>
    </section>

    <!-- Process -->
    <section id="process" class="px-5 py-24 sm:px-8 lg:px-10 lg:py-32">
      <div class="mx-auto max-w-7xl">
        <div class="mb-16 max-w-2xl">
          <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Our Process</p>
          <h2 class="mt-4 font-serif text-5xl font-medium tracking-[-0.03em] sm:text-6xl">Clarity before construction.</h2>
          <p class="mt-6 text-lg font-light leading-8 text-ink/65">
            A simple pre-construction rhythm helps identify fit, budget, and project expectations before time is wasted.
          </p>
        </div>

        <div class="divide-y divide-black/10 border-y border-black/10">
          <div class="grid gap-6 py-8 md:grid-cols-[0.25fr_0.75fr] md:items-start">
            <p class="text-xs font-semibold uppercase tracking-luxury text-ink/40">01 · Initial Meeting</p>
            <div>
              <h3 class="text-2xl font-light">A direct homeowner interview.</h3>
              <p class="mt-3 max-w-3xl leading-7 text-ink/60">We listen for goals, expectations, communication style, and red flags. The right relationship matters as much as the right scope.</p>
            </div>
          </div>

          <div class="grid gap-6 py-8 md:grid-cols-[0.25fr_0.75fr] md:items-start">
            <p class="text-xs font-semibold uppercase tracking-luxury text-ink/40">02 · Budget Fit</p>
            <div>
              <h3 class="text-2xl font-light">Money is discussed early.</h3>
              <p class="mt-3 max-w-3xl leading-7 text-ink/60">Before significant planning begins, we align around realistic investment ranges and whether the project is a good match.</p>
            </div>
          </div>

          <div class="grid gap-6 py-8 md:grid-cols-[0.25fr_0.75fr] md:items-start">
            <p class="text-xs font-semibold uppercase tracking-luxury text-ink/40">03 · Trade Walkthrough</p>
            <div>
              <h3 class="text-2xl font-light">The right people see the site early.</h3>
              <p class="mt-3 max-w-3xl leading-7 text-ink/60">Plumbers, electricians, and other subcontractors walk the project together so pricing is grounded in real conditions.</p>
            </div>
          </div>

          <div class="grid gap-6 py-8 md:grid-cols-[0.25fr_0.75fr] md:items-start">
            <p class="text-xs font-semibold uppercase tracking-luxury text-ink/40">04 · Budget Delivery</p>
            <div>
              <h3 class="text-2xl font-light">A transparent budget within the first month.</h3>
              <p class="mt-3 max-w-3xl leading-7 text-ink/60">We compile bids, clarify assumptions, and present a practical construction budget before the project moves forward.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Operational Trust -->
    <section class="px-5 pb-24 sm:px-8 lg:px-10 lg:pb-32">
      <div class="mx-auto grid max-w-7xl gap-6 md:grid-cols-3">
        <div class="border border-black/10 p-8">
          <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Pre-Construction</p>
          <h3 class="mt-5 text-2xl font-light">Clear planning</h3>
          <p class="mt-4 leading-7 text-ink/60">We talk through scope, priorities, budget, and expectations before work begins.</p>
        </div>
        <div class="border border-black/10 p-8">
          <p class="text-xs font-semibold uppercase tracking-luxury text-clay">During the Build
</p>
          <h3 class="mt-5 text-2xl font-light">Clear coordination</h3>
          <p class="mt-4 leading-7 text-ink/60">Selections, approvals, subcontractors, and schedules stay organized as the project moves forward.</p>
        </div>
        <div class="border border-black/10 p-8">
          <p class="text-xs font-semibold uppercase tracking-luxury text-clay">Communication</p>
          <h3 class="mt-5 text-2xl font-light">Steady updates</h3>
          <p class="mt-4 leading-7 text-ink/60">Clients know what is happening, what is needed, and what comes next.</p>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="bg-charcoal px-5 py-24 text-bone sm:px-8 lg:px-10 lg:py-32">
      <div class="mx-auto grid max-w-7xl gap-14 lg:grid-cols-2">
        <div>
          <p class="text-xs font-semibold uppercase tracking-luxury text-bone/45">Contact</p>
          <h2 class="mt-4 font-serif text-5xl font-medium tracking-[-0.03em] sm:text-6xl">Start with a conversation.</h2>
          <p class="mt-6 max-w-xl text-lg font-light leading-8 text-bone/65">
            Share the basics. For the right project, we will schedule a direct phone call to discuss fit, budget, and next steps.
          </p>

          <div class="mt-10 space-y-4 text-sm text-bone/70">
            <p><span class="uppercase tracking-[0.2em] text-bone/40">Phone</span><br><a href="tel:+14355550123" class="text-bone underline decoration-bone/25 underline-offset-8 hover:decoration-bone">(435) 555-0123</a></p>
            <p><span class="uppercase tracking-[0.2em] text-bone/40">Email</span><br><a href="mailto:hello@builtbyarrow.com" class="text-bone underline decoration-bone/25 underline-offset-8 hover:decoration-bone">hello@builtbyarrow.com</a></p>
          </div>
        </div>

        <form action="mailto:hello@builtbyarrow.com" method="post" enctype="text/plain" class="space-y-5">
          <div>
            <label for="name" class="mb-2 block text-xs font-semibold uppercase tracking-[0.2em] text-bone/50">Name</label>
            <input id="name" name="name" type="text" required class="w-full border border-bone/15 bg-transparent px-4 py-4 text-bone outline-none transition placeholder:text-bone/25 focus:border-bone" placeholder="Your name" />
          </div>

          <div>
            <label for="email" class="mb-2 block text-xs font-semibold uppercase tracking-[0.2em] text-bone/50">Email</label>
            <input id="email" name="email" type="email" required class="w-full border border-bone/15 bg-transparent px-4 py-4 text-bone outline-none transition placeholder:text-bone/25 focus:border-bone" placeholder="you@example.com" />
          </div>

          <div>
            <label for="phone" class="mb-2 block text-xs font-semibold uppercase tracking-[0.2em] text-bone/50">Phone</label>
            <input id="phone" name="phone" type="tel" class="w-full border border-bone/15 bg-transparent px-4 py-4 text-bone outline-none transition placeholder:text-bone/25 focus:border-bone" placeholder="(435) 000-0000" />
          </div>

          <div>
            <label for="message" class="mb-2 block text-xs font-semibold uppercase tracking-[0.2em] text-bone/50">Project Notes</label>
            <textarea id="message" name="message" rows="5" class="w-full resize-none border border-bone/15 bg-transparent px-4 py-4 text-bone outline-none transition placeholder:text-bone/25 focus:border-bone" placeholder="Location, project type, timeline, and rough budget range"></textarea>
          </div>

          <button type="submit" class="w-full bg-bone px-7 py-4 text-sm font-semibold uppercase tracking-[0.2em] text-ink transition hover:bg-clay hover:text-bone">
            Request a Phone Call
          </button>

          <p class="text-xs leading-6 text-bone/40">
            Replace the mailto form with your backend route, Formspree, Netlify Forms, or a Laravel endpoint before production.
          </p>
        </form>
      </div>
    </section>
  </main>

  <footer class="bg-charcoal px-5 pb-10 text-bone sm:px-8 lg:px-10">
    <div class="mx-auto flex max-w-7xl flex-col justify-between gap-4 border-t border-bone/10 pt-8 text-xs uppercase tracking-[0.18em] text-bone/35 md:flex-row">
      <p>© 2026 Built By Arrow Construction</p>
      <p>Park City · Deer Valley · Heber · Hideout</p>
    </div>
  </footer>
</body>
</html>
