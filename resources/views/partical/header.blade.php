@php
    $solutionsActive = request()->is('multiphase-compression') ||
        request()->is('vapor-recovery') ||
        request()->is('casing-gas-compression');

    $resourcesActive = request()->is('case-studies') ||
        request()->is('insights');
@endphp

<header x-data="{
        mobileMenuOpen: false,
        activeDesktopMenu: null,
        closeTimer: null,

        openMenu(menu) {
            clearTimeout(this.closeTimer);
            this.activeDesktopMenu = menu;
        },

        closeMenu(menu) {
            this.closeTimer = setTimeout(() => {
                if (this.activeDesktopMenu === menu) {
                    this.activeDesktopMenu = null;
                }
            }, 120);
        },

        toggleMenu(menu) {
            if (this.activeDesktopMenu === menu) {
                this.activeDesktopMenu = null;
            } else {
                this.activeDesktopMenu = menu;
            }
        },

        closeAllMenus() {
            this.activeDesktopMenu = null;
            this.mobileMenuOpen = false;
        }
    }" @keydown.escape.window="closeAllMenus()"
    class="fixed top-0 left-0 right-0 z-50 border-b border-[#e8edf3] bg-white">
    <div class="mx-auto max-w-[1680px] px-5 sm:px-6 lg:px-10">
        <div class="grid h-[96px] grid-cols-[auto_1fr_auto] items-center gap-8">

            <!-- Logo -->
            <div class="shrink-0">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Fluidstream Logo" class="h-10 w-auto object-contain">
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

                    <!-- Solutions -->
                    <div class="relative" @mouseenter="openMenu('solutions')" @mouseleave="closeMenu('solutions')">
                        <button type="button" @click.prevent="toggleMenu('solutions')"
                            class="nav-link inline-flex items-center gap-2 {{ $solutionsActive ? 'nav-link-active' : '' }}"
                            :class="activeDesktopMenu === 'solutions' ? 'nav-link-active' : ''">
                            <span>Solutions</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200"
                                :class="activeDesktopMenu === 'solutions' ? 'rotate-180' : ''" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Resources -->
                    <div class="relative" @mouseenter="openMenu('resources')" @mouseleave="closeMenu('resources')">
                        <button type="button" @click.prevent="toggleMenu('resources')"
                            class="nav-link inline-flex items-center gap-2 {{ $resourcesActive ? 'nav-link-active' : '' }}"
                            :class="activeDesktopMenu === 'resources' ? 'nav-link-active' : ''">
                            <span>Resources</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200"
                                :class="activeDesktopMenu === 'resources' ? 'rotate-180' : ''" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
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
            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                class="ml-auto inline-flex h-11 w-11 items-center justify-center rounded-lg border border-gray-200 text-[#0018dc] lg:hidden"
                aria-label="Toggle menu">
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

    <!-- Desktop Solutions Mega Menu -->
    <div x-show="activeDesktopMenu === 'solutions'" x-transition:enter="transition ease-out duration-180"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-120" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak
        class="absolute left-0 right-0 top-full hidden border-t border-[#eef2f6] border-b border-[#e8edf3] bg-white lg:block"
        @mouseenter="openMenu('solutions')" @mouseleave="closeMenu('solutions')">
        <div class="mx-auto max-w-[1680px] px-5 sm:px-6 lg:px-10">
            <div class="mega-tray">

                <!-- Left Side -->
                <div class="mega-left">
                    <span class="mega-left-accent"></span>
                    <h3 class="mega-left-title">
                        Emissions Reduction and Production Optimization Solutions Utilizing Multiphase Compression
                    </h3>
                </div>

                <!-- Divider -->
                <div class="mega-divider"></div>

                <!-- Right Side -->
                <div class="solutions-right">

                    <a href="{{ url('/multiphase-compression') }}"
                        class="mega-item {{ request()->is('multiphase-compression') ? 'mega-item-active' : '' }}">
                        <div class="mega-head">
                            <div class="mega-kicker-slot">
                                <p class="mega-kicker">Featured Highlights</p>
                            </div>
                            <h4 class="mega-title">
                                Multiphase Pump<br>
                                Multiphase Compression
                            </h4>
                        </div>

                        <p class="mega-copy">
                            Reliable autonomous multiphase compression technology for methane reduction, production
                            improvement, and low-maintenance field performance.
                        </p>

                        <span class="mega-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="mega-view-icon h-[18px] w-[18px]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                    <a href="{{ url('/vapor-recovery') }}"
                        class="mega-item {{ request()->is('vapor-recovery') ? 'mega-item-active' : '' }}">
                        <div class="mega-head">
                            <div class="mega-kicker-slot" aria-hidden="true"></div>
                            <h4 class="mega-title">
                                Vapor Recovery
                            </h4>
                        </div>

                        <p class="mega-copy">
                            Capture valuable gas, reduce venting and emissions, and improve operational efficiency with
                            compact, field-ready recovery systems.
                        </p>

                        <span class="mega-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="mega-view-icon h-[18px] w-[18px]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                    <a href="{{ url('/casing-gas-compression') }}"
                        class="mega-item {{ request()->is('casing-gas-compression') ? 'mega-item-active' : '' }}">
                        <div class="mega-head">
                            <div class="mega-kicker-slot" aria-hidden="true"></div>
                            <h4 class="mega-title">
                                Casing Gas<br>
                                Compression
                            </h4>
                        </div>

                        <p class="mega-copy">
                            Compress low-pressure casing gas to support production optimization, reduce flaring, and
                            unlock additional site value.
                        </p>

                        <span class="mega-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="mega-view-icon h-[18px] w-[18px]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Resources Mega Menu -->
    <div x-show="activeDesktopMenu === 'resources'" x-transition:enter="transition ease-out duration-180"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-120" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak
        class="absolute left-0 right-0 top-full hidden border-t border-[#eef2f6] border-b border-[#e8edf3] bg-white lg:block"
        @mouseenter="openMenu('resources')" @mouseleave="closeMenu('resources')">
        <div class="mx-auto max-w-[1680px] px-5 sm:px-6 lg:px-10">
            <div class="mega-tray mega-tray-resources">

                <!-- Left Side -->
                <div class="mega-left">
                    <span class="mega-left-accent"></span>
                    <h3 class="mega-left-title">
                        Industry knowledge and real-world case studies demonstrating performance
                    </h3>
                </div>

                <!-- Divider -->
                <div class="mega-divider"></div>

                <!-- Right Side -->
                <div class="resources-right">

                    <a href="{{ url('/case-studies') }}"
                        class="mega-item resource-item {{ request()->is('case-studies') ? 'mega-item-active' : '' }}">
                        <div class="mega-head resource-head">
                            <h4 class="mega-title">
                                Case Studies
                            </h4>
                        </div>

                        <p class="mega-copy resource-copy">
                            Highlighting real-world performance and measurable results
                        </p>

                        <span class="mega-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="mega-view-icon h-[18px] w-[18px]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                    <a href="{{ url('/insights') }}"
                        class="mega-item resource-item {{ request()->is('insights') ? 'mega-item-active' : '' }}">
                        <div class="mega-head resource-head">
                            <h4 class="mega-title">
                                Insights
                            </h4>
                        </div>

                        <p class="mega-copy resource-copy">
                            Technical content on industry concepts and Fluidstream performance
                        </p>

                        <span class="mega-view">
                            View
                            <svg xmlns="http://www.w3.org/2000/svg" class="mega-view-icon h-[18px] w-[18px]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" x-cloak class="border-t border-[#eef2f6] px-4 pb-4 lg:hidden">
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

                <!-- Mobile Solutions -->
                <div x-data="{ mobileSolutionsOpen: {{ $solutionsActive ? 'true' : 'false' }} }"
                    class="rounded-xl border border-gray-200 p-2">
                    <button @click="mobileSolutionsOpen = !mobileSolutionsOpen" type="button"
                        class="mobile-toggle {{ $solutionsActive ? 'mobile-toggle-active' : '' }}"
                        :class="mobileSolutionsOpen ? 'mobile-toggle-active' : ''">
                        <span>Solutions</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition duration-200"
                            :class="mobileSolutionsOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="mobileSolutionsOpen" x-cloak class="mt-2 flex flex-col gap-1">
                        <a href="{{ url('/multiphase-compression') }}"
                            class="mobile-sub-link {{ request()->is('multiphase-compression') ? 'mobile-sub-link-active' : '' }}">
                            <span>Multiphase Pumping/Compression</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>

                        <a href="{{ url('/vapor-recovery') }}"
                            class="mobile-sub-link {{ request()->is('vapor-recovery') ? 'mobile-sub-link-active' : '' }}">
                            <span>Vapor Recovery</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>

                        <a href="{{ url('/casing-gas-compression') }}"
                            class="mobile-sub-link {{ request()->is('casing-gas-compression') ? 'mobile-sub-link-active' : '' }}">
                            <span>Casing Gas Compression</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Mobile Resources -->
                <div x-data="{ mobileResourcesOpen: {{ $resourcesActive ? 'true' : 'false' }} }"
                    class="rounded-xl border border-gray-200 p-2">
                    <button @click="mobileResourcesOpen = !mobileResourcesOpen" type="button"
                        class="mobile-toggle {{ $resourcesActive ? 'mobile-toggle-active' : '' }}"
                        :class="mobileResourcesOpen ? 'mobile-toggle-active' : ''">
                        <span>Resources</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition duration-200"
                            :class="mobileResourcesOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="mobileResourcesOpen" x-cloak class="mt-2 flex flex-col gap-1">
                        <a href="{{ url('/case-studies') }}"
                            class="mobile-sub-link {{ request()->is('case-studies') ? 'mobile-sub-link-active' : '' }}">
                            <span>Case Studies</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
                        </a>

                        <a href="{{ url('/insights') }}"
                            class="mobile-sub-link {{ request()->is('insights') ? 'mobile-sub-link-active' : '' }}">
                            <span>Insights</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                            </svg>
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

    .mega-tray {
        display: grid;
        grid-template-columns: 285px 1px minmax(0, 1fr);
        min-height: 392px;
    }

    .mega-tray-resources {
        min-height: 392px;
    }

    .mega-left {
        padding: 46px 36px 42px 0;
    }

    .mega-left-accent {
        display: inline-block;
        width: 44px;
        height: 3px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #0018dc 0%, #4f7cff 100%);
        margin-bottom: 18px;
    }

    .mega-left-title {
        max-width: 240px;
        font-size: 22px;
        line-height: 1.24;
        font-weight: 600;
        letter-spacing: -0.02em;
        color: #0018dc;
    }

    .mega-divider {
        width: 1px;
        background: #e7ebf2;
        margin: 44px 0;
    }

    .solutions-right {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        column-gap: 64px;
        padding: 0 8px 0 28px;
        align-items: stretch;
    }

    .resources-right {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        column-gap: 72px;
        padding: 0 8px 0 32px;
        align-items: stretch;
    }

    .mega-item {
        display: flex;
        flex-direction: column;
        min-height: 392px;
        padding: 44px 0 38px;
        text-decoration: none;
    }

    .mega-head {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        min-height: 148px;
    }

    .resource-head {
        min-height: 148px;
        justify-content: flex-start;
    }

    .mega-kicker-slot {
        min-height: 30px;
        margin-bottom: 14px;
    }

    .mega-kicker {
        font-size: 13px;
        line-height: 1.2;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .mega-title {
        max-width: 280px;
        font-size: 22px;
        line-height: 1.18;
        font-weight: 500;
        letter-spacing: -0.02em;
        color: #0018dc;
        margin: 0;
    }

    .mega-copy {
        max-width: 290px;
        margin-top: 18px;
        font-size: 15px;
        line-height: 1.65;
        font-weight: 400;
        color: #6b7280;
    }

    .resource-copy {
        max-width: 340px;
        color: #111827;
        font-size: 17px;
        line-height: 1.45;
        font-weight: 600;
    }

    .mega-view {
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

    .mega-view-icon {
        transition: transform 0.2s ease;
    }

    .mega-item:hover .mega-view-icon,
    .mega-item-active .mega-view-icon {
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

        .resources-right {
            column-gap: 48px;
        }

        .mega-title {
            font-size: 24px;
            max-width: 250px;
        }

        .mega-copy {
            max-width: 250px;
        }

        .resource-copy {
            max-width: 300px;
            font-size: 16px;
        }

        .mega-left-title {
            font-size: 22px;
            max-width: 220px;
        }
    }

    @media (max-width: 1279px) {
        .mega-tray {
            grid-template-columns: 240px 1px minmax(0, 1fr);
        }

        .solutions-right {
            column-gap: 34px;
            padding-left: 22px;
        }

        .resources-right {
            column-gap: 30px;
            padding-left: 22px;
        }

        .mega-title {
            font-size: 22px;
            max-width: 220px;
        }

        .mega-copy {
            max-width: 220px;
            font-size: 14px;
        }

        .resource-copy {
            max-width: 240px;
            font-size: 15px;
        }

        .mega-left-title {
            font-size: 22px;
            max-width: 200px;
        }

        .mega-head,
        .resource-head {
            min-height: 134px;
        }

        .mega-kicker-slot {
            min-height: 26px;
            margin-bottom: 12px;
        }
    }
</style>