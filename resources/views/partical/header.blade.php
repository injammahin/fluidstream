<header x-data="{ mobileMenuOpen: false, scrolled: false }"
    x-init="scrolled = window.scrollY > 20; window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-out" :class="scrolled ? 'pt-3' : 'pt-0'">

    <div class="mx-auto px-4 sm:px-6 lg:px-8 transition-all duration-500 ease-out"
        :class="scrolled ? 'max-w-6xl' : 'max-w-7xl'">

        <div class="transition-all duration-500 ease-out" :class="scrolled
                ? 'bg-white/90 backdrop-blur-xl shadow-[0_10px_35px_rgba(15,23,42,0.10)] border border-slate-200/80 rounded-2xl'
                : 'bg-white border-b border-slate-200/70 rounded-none'">

            <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 transition-all duration-500 ease-out"
                :class="scrolled ? 'h-16' : 'h-20'">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="group flex items-center gap-3 shrink-0">
                    <div
                        class="flex items-center justify-center overflow-hidden transition duration-300 group-hover:scale-105">
                        <img src="{{ asset('img/logo.png') }}" alt="Multiphase Logo"
                            class="w-auto object-contain transition-all duration-500 ease-out"
                            :class="scrolled ? 'h-10' : 'h-12'">
                    </div>
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-8 xl:gap-10">
                    <a href="{{ url('/multiphase-compression') }}"
                        class="nav-link {{ request()->is('multiphase-compression') ? 'active-nav' : '' }}">
                        Multiphase Compression
                    </a>

                    <a href="{{ url('/vapor-recovery') }}"
                        class="nav-link {{ request()->is('vapor-recovery') ? 'active-nav' : '' }}">
                        Vapor Recovery
                    </a>

                    <a href="{{ url('/casing-gas-compression') }}"
                        class="nav-link {{ request()->is('casing-gas-compression') ? 'active-nav' : '' }}">
                        Casing Gas Compression
                    </a>

                    <a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact') ? 'active-nav' : '' }}">
                        Contact
                    </a>
                </nav>

                <!-- Mobile Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-900 transition hover:bg-slate-50 lg:hidden"
                    :class="scrolled ? 'h-10 w-10' : 'h-11 w-11'" aria-label="Toggle menu">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>

                    <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-400"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
                x-cloak class="px-4 pb-5 lg:hidden sm:px-6">
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/60">
                    <nav class="flex flex-col">
                        <a href="{{ url('/multiphase-compression') }}"
                            class="mobile-nav-link {{ request()->is('multiphase-compression') ? 'mobile-active-nav' : '' }}">
                            Multiphase Compression
                        </a>

                        <a href="{{ url('/vapor-recovery') }}"
                            class="mobile-nav-link {{ request()->is('vapor-recovery') ? 'mobile-active-nav' : '' }}">
                            Vapor Recovery
                        </a>

                        <a href="{{ url('/casing-gas-compression') }}"
                            class="mobile-nav-link {{ request()->is('casing-gas-compression') ? 'mobile-active-nav' : '' }}">
                            Casing Gas Compression
                        </a>

                        <a href="{{ url('/contact') }}"
                            class="mobile-nav-link {{ request()->is('contact') ? 'mobile-active-nav' : '' }}">
                            Contact
                        </a>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</header>

<style>
    [x-cloak] {
        display: none !important;
    }

    .nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: #334155;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        transition: color 0.35s ease;
        white-space: nowrap;
    }

    .nav-link:hover {
        color: #0f172a;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -0.18rem;
        width: 0;
        height: 2.5px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #12203f, #1e346a, #122040);
        transition: width 0.45s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .active-nav {
        color: #103444 !important;
    }

    .active-nav::after {
        width: 100%;
        background: linear-gradient(90deg, #12203f, #1e346a, #122040);
    }

    .mobile-nav-link {
        position: relative;
        display: block;
        padding: 0.95rem 0.25rem;
        font-size: 0.98rem;
        font-weight: 600;
        color: #334155;
        border-bottom: 1px solid rgba(148, 163, 184, 0.20);
        transition: all 0.3s ease;
    }

    .mobile-nav-link:last-child {
        border-bottom: none;
    }

    .mobile-nav-link:hover {
        color: #0f172a;
        padding-left: 0.65rem;
    }

    .mobile-active-nav {
        color: #38bdf8 !important;
    }
</style>