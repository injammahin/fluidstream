<header
    x-data="{ mobileMenuOpen: false, solutionsOpen: false, scrolled: false }"
    x-init="
        scrolled = window.scrollY > 10;
        window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 });
    "
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-out"
    :class="scrolled ? 'py-3' : 'py-0'"
>
    <div
        class="mx-auto transition-all duration-500 ease-out px-4 sm:px-6 lg:px-8"
        :class="scrolled ? 'max-w-7xl' : 'max-w-[1440px]'"
    >
        <div
            class="header-shell transition-all duration-500 ease-out"
            :class="scrolled ? 'header-shell-scrolled' : 'header-shell-top'"
        >
            <div class="relative flex h-[88px] items-center justify-between px-4 sm:px-6 lg:px-8">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img
                            src="{{ asset('img/logo.png') }}"
                            alt="Fluidstream Logo"
                            class="h-10 w-auto object-contain"
                        >
                    </a>
                </div>

                <!-- Center Desktop Menu -->
                <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 items-center">
                    <nav class="flex items-center gap-10 xl:gap-12">
                        <a href="{{ url('/multiphase-compression-technology') }}"
                           class="nav-link {{ request()->is('multiphase-compression-technology') ? 'nav-link-active' : '' }}">
                            Multiphase Compression Technology
                        </a>

                        <div
                            class="relative"
                            @mouseenter="solutionsOpen = true"
                            @mouseleave="solutionsOpen = false"
                        >
                            <button
                                type="button"
                                class="nav-link inline-flex items-center gap-2"
                                :class="solutionsOpen ? 'nav-link-active' : ''"
                            >
                                <span>Solutions</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 transition duration-300"
                                     :class="solutionsOpen ? 'rotate-180' : ''"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Desktop Mega Menu -->
                            <div
                                x-show="solutionsOpen"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-2"
                                x-cloak
                                class="absolute left-1/2 top-full z-50 mt-5 w-[760px] -translate-x-1/2"
                            >
                                <div class="mega-menu">
                                    <a href="{{ url('/multiphase-compression') }}"
                                       class="mega-link {{ request()->is('multiphase-compression') ? 'mega-link-active' : '' }}">
                                        Multiphase Pumping/Compression
                                    </a>

                                    <a href="{{ url('/vapor-recovery') }}"
                                       class="mega-link {{ request()->is('vapor-recovery') ? 'mega-link-active' : '' }}">
                                        Vapor Recovery
                                    </a>

                                    <a href="{{ url('/casing-gas-compression') }}"
                                       class="mega-link {{ request()->is('casing-gas-compression') ? 'mega-link-active' : '' }}">
                                        Casing Gas Compression
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <!-- Right Contact Button -->
                <div class="hidden lg:flex shrink-0">
                    <a href="{{ url('/contact') }}"
                       class="contact-btn {{ request()->is('contact') ? 'contact-btn-active' : '' }}">
                        Contact
                    </a>
                </div>

                <!-- Mobile Toggle -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    type="button"
                    class="inline-flex lg:hidden items-center justify-center rounded-xl bg-slate-100 text-slate-900 transition hover:bg-slate-200 h-11 w-11"
                    aria-label="Toggle menu"
                >
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
            <div
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                x-cloak
                class="lg:hidden px-4 pb-4 sm:px-6"
            >
                <div class="mobile-menu-shell">
                    <nav class="flex flex-col gap-2">
                        <a href="{{ url('/multiphase-compression-technology') }}"
                           class="mobile-link {{ request()->is('multiphase-compression-technology') ? 'mobile-link-active' : '' }}">
                            Multiphase Compression Technology
                        </a>

                        <div x-data="{ mobileSolutionsOpen: false }" class="mobile-group">
                            <button
                                @click="mobileSolutionsOpen = !mobileSolutionsOpen"
                                type="button"
                                class="mobile-toggle"
                            >
                                <span>Solutions</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 transition duration-300"
                                     :class="mobileSolutionsOpen ? 'rotate-180' : ''"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>

                            <div
                                x-show="mobileSolutionsOpen"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2"
                                class="mt-2 flex flex-col gap-2"
                            >
                                <a href="{{ url('/multiphase-compression') }}"
                                   class="mobile-sub-link {{ request()->is('multiphase-compression') ? 'mobile-sub-link-active' : '' }}">
                                    Multiphase Pumping/Compression
                                </a>

                                <a href="{{ url('/vapor-recovery') }}"
                                   class="mobile-sub-link {{ request()->is('vapor-recovery') ? 'mobile-sub-link-active' : '' }}">
                                    Vapor Recovery
                                </a>

                                <a href="{{ url('/casing-gas-compression') }}"
                                   class="mobile-sub-link {{ request()->is('casing-gas-compression') ? 'mobile-sub-link-active' : '' }}">
                                    Casing Gas Compression
                                </a>
                            </div>
                        </div>

                        <a href="{{ url('/contact') }}"
                           class="mobile-link {{ request()->is('contact') ? 'mobile-link-active' : '' }}">
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

    .header-shell {
        background: #ffffff;
        transition: all 0.5s ease;
    }

    .header-shell-top {
        border-radius: 0;
        box-shadow: 0 1px 0 rgba(15, 23, 42, 0.06);
    }

    .header-shell-scrolled {
        border-radius: 22px;
        box-shadow:
            0 18px 40px rgba(15, 23, 42, 0.10),
            0 1px 0 rgba(15, 23, 42, 0.04);
    }

    .nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        font-size: 1rem;
        font-weight: 700;
        color: #163a72;
        transition: color 0.28s ease;
        white-space: nowrap;
    }

    .nav-link:hover {
        color: #0f2f5c;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -0.6rem;
        width: 0;
        height: 2.5px;
        border-radius: 9999px;
        background: #163a72;
        transition: width 0.28s ease;
    }

    .nav-link:hover::after,
    .nav-link-active::after {
        width: 100%;
    }

    .nav-link-active {
        color: #0f2f5c;
    }

    .mega-menu {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.9rem;
        padding: 1rem;
        border-radius: 20px;
        background: #ffffff;
        border: 1px solid #e9eef5;
        box-shadow: 0 22px 55px rgba(15, 23, 42, 0.12);
    }

    .mega-link {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 84px;
        padding: 1rem;
        border-radius: 16px;
        background: #f8fbff;
        border: 1px solid #e8eef6;
        color: #163a72;
        font-size: 0.98rem;
        line-height: 1.35;
        font-weight: 700;
        transition: all 0.28s ease;
    }

    .mega-link:hover {
        background: #eef5fd;
        border-color: #d6e4f5;
        transform: translateY(-2px);
    }

    .mega-link-active {
        background: #eaf3fd;
        border-color: #cfe0f5;
        color: #0f2f5c;
    }

    .contact-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 48px;
        padding: 0 1.4rem;
        border-radius: 9999px;
        background: #0018dc;
        color: #ffffff;
        font-size: 0.96rem;
        font-weight: 700;
        transition: all 0.28s ease;
        box-shadow: 0 10px 24px rgba(22, 58, 114, 0.18);
    }

    .contact-btn:hover {
        background: #0f2f5c;
        transform: translateY(-1px);
    }

    .contact-btn-active {
        background: #0f2f5c;
    }

    .mobile-menu-shell {
        border-radius: 20px;
        background: #ffffff;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.10);
        border: 1px solid #edf2f7;
        padding: 1rem;
    }

    .mobile-link {
        display: block;
        padding: 0.95rem 1rem;
        border-radius: 14px;
        background: #f8fbff;
        color: #17355f;
        font-size: 0.98rem;
        font-weight: 700;
        transition: all 0.28s ease;
    }

    .mobile-link:hover {
        background: #f1f6fd;
    }

    .mobile-link-active {
        background: #eef5fd;
        color: #0f2f5c !important;
    }

    .mobile-group {
        border-radius: 16px;
        background: #f8fbff;
        padding: 0.35rem;
    }

    .mobile-toggle {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.9rem 0.8rem;
        border-radius: 12px;
        color: #17355f;
        font-size: 0.98rem;
        font-weight: 700;
        transition: background 0.28s ease;
    }

    .mobile-toggle:hover {
        background: #eef5fd;
    }

    .mobile-sub-link {
        display: block;
        padding: 0.85rem 0.9rem;
        border-radius: 12px;
        background: #ffffff;
        color: #3a4d66;
        font-size: 0.93rem;
        font-weight: 600;
        transition: all 0.28s ease;
    }

    .mobile-sub-link:hover {
        background: #eef5fd;
        color: #163a72;
    }

    .mobile-sub-link-active {
        background: #e9f2fc;
        color: #163a72 !important;
    }

    @media (max-width: 1279px) {
        .mega-menu {
            width: 100%;
            grid-template-columns: 1fr;
        }
    }
</style>