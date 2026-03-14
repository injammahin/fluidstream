<footer class="bottom-0 left-0 right-0 z-40 border-t border-slate-200 bg-slate-900 text-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="grid gap-8 py-10 md:grid-cols-2 xl:grid-cols-3 xl:gap-12">
            <!-- Column 1 -->
            <div>
                <h3 class="text-base font-semibold uppercase tracking-[0.14em] text-white/95">
                    Multiphase Compression
                </h3>

                <p class="mt-4 max-w-md text-sm leading-7 text-slate-300">
                    Fluidstream’s patented multiphase pump is a robust, fully autonomous technology for multiphase
                    pumping,
                    vapor recovery, and casing gas compression applications.
                </p>
            </div>

            <!-- Column 2 -->
            <div>
                <h3 class="text-base font-semibold uppercase tracking-[0.14em] text-white/95">
                    Quick Links
                </h3>

                <nav class="mt-4 grid gap-3">
                    <a href="{{ url('/multiphase-compression') }}" class="footer-link">
                        Multiphase Compression
                    </a>

                    <a href="{{ url('/vapor-recovery') }}" class="footer-link">
                        Vapor Recovery
                    </a>

                    <a href="{{ url('/casing-gas-compression') }}" class="footer-link">
                        Casing Gas Compression
                    </a>

                    <a href="{{ url('/contact') }}" class="footer-link">
                        Contact
                    </a>
                </nav>
            </div>

            <!-- Column 3 -->
            <div>
                <h3 class="text-base font-semibold uppercase tracking-[0.14em] text-white/95">
                    Fluidstream Inc.
                </h3>

                <div class="mt-4 space-y-1 text-sm leading-7 text-slate-300">
                    <p>4416 5 St NE, Unit 1A</p>
                    <p>Calgary, AB T2E 7C3, Canada</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-3 border-t border-white/10 py-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-slate-400">
                Copyright © 2024 Fluidstream Inc.
            </p>

            <button type="button" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-200 transition duration-300 hover:-translate-y-0.5 hover:bg-white/10 hover:text-white"
                aria-label="Scroll to top">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                </svg>
            </button>
        </div>
    </div>
</footer>

<style>
    .footer-link {
        position: relative;
        display: inline-flex;
        width: fit-content;
        font-size: 0.95rem;
        font-weight: 500;
        color: rgb(203 213 225);
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .footer-link:hover {
        color: #ffffff;
        transform: translateX(3px);
    }
</style>