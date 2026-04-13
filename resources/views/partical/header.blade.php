@php
    $solutionsActive = request()->is('multiphase-compression') ||
                       request()->is('vapor-recovery') ||
                       request()->is('casing-gas-compression');
@endphp

<header
    x-data="{
        mobileMenuOpen: false,
        solutionsOpen: false,
        closeTimer: null,
        openSolutions() {
            clearTimeout(this.closeTimer);
            this.solutionsOpen = true;
        },
        closeSolutions() {
            this.closeTimer = setTimeout(() => {
                this.solutionsOpen = false;
            }, 100);
        }
    }"
    @keydown.escape.window="mobileMenuOpen = false; solutionsOpen = false"
    class="fixed top-0 left-0 right-0 z-50 border-b border-[#e8edf3] bg-white"
>
    <div class="mx-auto max-w-[1680px] px-5 sm:px-6 lg:px-10">
        <div class="grid h-[96px] grid-cols-[auto_1fr_auto] items-center gap-8">

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

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center justify-center">
                <nav class="flex items-center gap-12 xl:gap-16">

                    <a href="{{ url('/multiphase-compression-technology') }}"
                       class="nav-link {{ request()->is('multiphase-compression-technology') ? 'nav-link-active' : '' }}">
                        Multiphase Compression
                    </a>

                    <a href="{{ url('/technology') }}"
                       class="nav-link {{ request()->is('technology') ? 'nav-link-active' : '' }}">
                        Technology
                    </a>

                    <div class="relative"
                         @mouseenter="openSolutions()"
                         @mouseleave="closeSolutions()">
                        <button
                            type="button"
                            class="nav-link inline-flex items-center gap-2 {{ $solutionsActive ? 'nav-link-active' : '' }}"
                            :class="solutionsOpen ? 'nav-link-active' : ''"
                        >
                            <span>Solutions</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4 transition duration-200"
                                 :class="solutionsOpen ? 'rotate-180' : ''"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <a href="{{ url('/insights') }}"
                       class="nav-link {{ request()->is('insights') ? 'nav-link-active' : '' }}">
                        Insights
                    </a>
                </nav>
            </div>

            <!-- Contact Button -->
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
                class="ml-auto inline-flex h-11 w-11 items-center justify-center rounded-lg border border-gray-200 text-[#0018dc] lg:hidden"
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
    </div>

    <!-- Desktop Mega Menu -->
    <div
        x-show="solutionsOpen"
        x-transition:enter="transition ease-out duration-180"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-120"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
        class="absolute left-0 right-0 top-full hidden border-t border-[#eef2f6] border-b border-[#e8edf3] bg-white lg:block"
        @mouseenter="openSolutions()"
        @mouseleave="closeSolutions()"
    >
        <div class="mx-auto max-w-[1680px] px-5 sm:px-6 lg:px-10">
            <div class="solutions-tray">

                <!-- Left Side -->
                <div class="solutions-left">
                    <span class="solutions-left-accent"></span>
                    <h3 class="solutions-left-title">
                        Emissions Reduction and Production Optimization Solutions Utilizing Multiphase Compression
                    </h3>
                </div>

                <!-- Divider -->
                <div class="solutions-divider"></div>

                <!-- Right Side -->
                <div class="solutions-right">

                    <!-- Item 1 -->
                    <a href="{{ url('/multiphase-compression') }}"
                       class="solutions-item {{ request()->is('multiphase-compression') ? 'solutions-item-active' : '' }}">
                        <div class="solutions-head solutions-head-first">
                            <p class="solutions-kicker">Featured Highlights</p>
                            <h4 class="solutions-title">
                                Multiphase Pump<br>
                                Multiphase Compression
                            </h4>
                        </div>

                        <p class="solutions-copy">
                            Reliable autonomous multiphase compression technology for methane reduction, production improvement, and low-maintenance field performance.
                        </p>

                        <span class="solutions-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="solutions-view-icon h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                    <!-- Item 2 -->
                    <a href="{{ url('/vapor-recovery') }}"
                       class="solutions-item {{ request()->is('vapor-recovery') ? 'solutions-item-active' : '' }}">
                        <div class="solutions-head solutions-head-offset">
                            <h4 class="solutions-title">
                                Vapor Recovery
                            </h4>
                        </div>

                        <p class="solutions-copy">
                            Capture valuable gas, reduce venting and emissions, and improve operational efficiency with compact, field-ready recovery systems.
                        </p>

                        <span class="solutions-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="solutions-view-icon h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                    <!-- Item 3 -->
                    <a href="{{ url('/casing-gas-compression') }}"
                       class="solutions-item {{ request()->is('casing-gas-compression') ? 'solutions-item-active' : '' }}">
                        <div class="solutions-head solutions-head-offset">
                            <h4 class="solutions-title">
                                Casing Gas<br>
                                Compression
                            </h4>
                        </div>

                        <p class="solutions-copy">
                            Compress low-pressure casing gas to support production optimization, reduce flaring, and unlock additional site value.
                        </p>

                        <span class="solutions-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="solutions-view-icon h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
        class="border-t border-[#eef2f6] px-4 pb-4 lg:hidden"
    >
        <div class="mt-4 rounded-xl border border-gray-200 bg-white p-3">
            <nav class="flex flex-col gap-2">

                <a href="{{ url('/multiphase-compression-technology') }}"
                   class="mobile-link {{ request()->is('multiphase-compression-technology') ? 'mobile-link-active' : '' }}">
                    Multiphase Compression
                </a>

                <a href="{{ url('/technology') }}"
                   class="mobile-link {{ request()->is('technology') ? 'mobile-link-active' : '' }}">
                    Technology
                </a>

                <div x-data="{ mobileSolutionsOpen: {{ $solutionsActive ? 'true' : 'false' }} }"
                     class="rounded-xl border border-gray-200 p-2">
                    <button
                        @click="mobileSolutionsOpen = !mobileSolutionsOpen"
                        type="button"
                        class="mobile-toggle {{ $solutionsActive ? 'mobile-toggle-active' : '' }}"
                        :class="mobileSolutionsOpen ? 'mobile-toggle-active' : ''"
                    >
                        <span>Solutions</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 transition duration-200"
                             :class="mobileSolutionsOpen ? 'rotate-180' : ''"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="mobileSolutionsOpen" x-cloak class="mt-2 flex flex-col gap-1">
                        <a href="{{ url('/multiphase-compression') }}"
                           class="mobile-sub-link {{ request()->is('multiphase-compression') ? 'mobile-sub-link-active' : '' }}">
                            <span>Multiphase Pumping/Compression</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>

                        <a href="{{ url('/vapor-recovery') }}"
                           class="mobile-sub-link {{ request()->is('vapor-recovery') ? 'mobile-sub-link-active' : '' }}">
                            <span>Vapor Recovery</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>

                        <a href="{{ url('/casing-gas-compression') }}"
                           class="mobile-sub-link {{ request()->is('casing-gas-compression') ? 'mobile-sub-link-active' : '' }}">
                            <span>Casing Gas Compression</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>
                    </div>
                </div>

                <a href="{{ url('/insights') }}"
                   class="mobile-link {{ request()->is('insights') ? 'mobile-link-active' : '' }}">
                    Insights
                </a>

                <a href="{{ url('/contact') }}"
                   class="mobile-link {{ request()->is('contact') ? 'mobile-link-active' : '' }}">
                    Contact
                </a>
            </nav>
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
        font-size: 16px;
        font-weight: 600;
        color: #0018dc;
        transition: all 0.2s ease;
        white-space: nowrap;
        padding: 4px 0;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -12px;
        width: 0;
        height: 2px;
        background: #0018dc;
        transition: width 0.2s ease;
    }

    .nav-link:hover::after,
    .nav-link-active::after {
        width: 100%;
    }

    .contact-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 180px;
        height: 64px;
        padding: 0 32px;
        border-radius: 9999px;
        background: #1028ea;
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .contact-btn:hover {
        background: #0018dc;
    }

    .solutions-tray {
        display: grid;
        grid-template-columns: 285px 1px minmax(0, 1fr);
        min-height: 392px;
    }

    .solutions-left {
        padding: 46px 36px 42px 0;
    }

    .solutions-left-accent {
        display: inline-block;
        width: 44px;
        height: 3px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #0018dc 0%, #4f7cff 100%);
        margin-bottom: 18px;
    }

    .solutions-left-title {
        max-width: 240px;
        font-size: 26px;
        line-height: 1.24;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #0018dc;
    }

    .solutions-divider {
        width: 1px;
        background: #e7ebf2;
        margin: 44px 0;
    }

    .solutions-right {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        column-gap: 64px;
        padding: 0 8px 0 28px;
    }

    .solutions-item {
        display: flex;
        flex-direction: column;
        min-height: 392px;
        padding: 44px 0 38px;
        text-decoration: none;
    }

    .solutions-head {
        min-height: 148px;
    }

    .solutions-head-first {
        padding-top: 0;
    }

    .solutions-head-offset {
        padding-top: 36px;
    }

    .solutions-kicker {
        font-size: 13px;
        line-height: 1.2;
        font-weight: 700;
        color: #111827;
        margin-bottom: 14px;
    }

    .solutions-title {
        max-width: 280px;
        font-size: 27px;
        line-height: 1.18;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #0018dc;
    }

    .solutions-copy {
        max-width: 290px;
        margin-top: 18px;
        font-size: 15px;
        line-height: 1.65;
        font-weight: 400;
        color: #6b7280;
    }

    .solutions-view {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        margin-top: auto;
        padding-top: 38px;
        font-size: 16px;
        line-height: 1.2;
        font-weight: 600;
        color: #0018dc;
    }

    .solutions-view-icon {
        transition: transform 0.2s ease;
    }

    .solutions-item:hover .solutions-view-icon,
    .solutions-item-active .solutions-view-icon {
        transform: translateX(4px);
    }

    .mobile-link {
        display: block;
        padding: 12px 14px;
        border-radius: 8px;
        color: #0018dc;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .mobile-link:hover,
    .mobile-link-active {
        background: #0018dc;
        color: #ffffff;
    }

    .mobile-toggle {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 14px;
        border-radius: 8px;
        color: #0018dc;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .mobile-toggle:hover,
    .mobile-toggle-active {
        background: #0018dc;
        color: #ffffff;
    }

    .mobile-sub-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        width: 100%;
        padding: 12px 14px;
        border-radius: 8px;
        color: #0018dc;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        line-height: 1.4;
    }

    .mobile-sub-link:hover,
    .mobile-sub-link-active {
        background: #0018dc;
        color: #ffffff;
        font-weight: 600;
    }

    @media (max-width: 1440px) {
        .solutions-right {
            column-gap: 44px;
        }

        .solutions-title {
            font-size: 24px;
            max-width: 250px;
        }

        .solutions-copy {
            max-width: 250px;
        }

        .solutions-left-title {
            font-size: 24px;
            max-width: 220px;
        }
    }

    @media (max-width: 1279px) {
        .solutions-tray {
            grid-template-columns: 240px 1px minmax(0, 1fr);
        }

        .solutions-right {
            column-gap: 34px;
            padding-left: 22px;
        }

        .solutions-title {
            font-size: 22px;
            max-width: 220px;
        }

        .solutions-copy {
            max-width: 220px;
            font-size: 14px;
        }

        .solutions-left-title {
            font-size: 22px;
            max-width: 200px;
        }

        .solutions-head {
            min-height: 134px;
        }
    }
</style>