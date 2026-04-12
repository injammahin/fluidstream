@php
    $solutionsActive = request()->is('multiphase-compression') ||
                       request()->is('vapor-recovery') ||
                       request()->is('casing-gas-compression');

    $insightsActive = request()->is('case-studies') ||
                      request()->is('perspectives');
@endphp

<header
    x-data="{
        mobileMenuOpen: false,
        solutionsOpen: false,
        insightsOpen: false
    }"
    class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200"
>
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-[88px] items-center justify-between">

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

            <!-- Desktop Menu -->
            <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 items-center">
                <nav class="flex items-center gap-10 xl:gap-12">

                    <a href="{{ url('/multiphase-compression-technology') }}"
                       class="nav-link {{ request()->is('multiphase-compression-technology') ? 'nav-link-active' : '' }}">
                        Multiphase Compression
                    </a>

                    <a href="{{ url('/technology') }}"
                       class="nav-link {{ request()->is('technology') ? 'nav-link-active' : '' }}">
                        Technology
                    </a>

                    <!-- Solutions -->
                    <div class="relative"
                         @mouseenter="solutionsOpen = true"
                         @mouseleave="solutionsOpen = false">
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

                        <div
                            x-show="solutionsOpen"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            x-cloak
                            class="absolute left-0 top-full mt-3 w-[320px] rounded-lg border border-gray-200 bg-white p-2"
                        >
                            <div class="flex flex-col gap-1">
                                <a href="{{ url('/multiphase-compression') }}"
                                   class="dropdown-link {{ request()->is('multiphase-compression') ? 'dropdown-link-active' : '' }}">
                                    <span>Multiphase Pumping/Compression</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                    </svg>
                                </a>

                                <a href="{{ url('/vapor-recovery') }}"
                                   class="dropdown-link {{ request()->is('vapor-recovery') ? 'dropdown-link-active' : '' }}">
                                    <span>Vapor Recovery</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                    </svg>
                                </a>

                                <a href="{{ url('/casing-gas-compression') }}"
                                   class="dropdown-link {{ request()->is('casing-gas-compression') ? 'dropdown-link-active' : '' }}">
                                    <span>Casing Gas Compression</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                     <a href="{{ url('/insights') }}"
                       class="nav-link {{ request()->is('insights') ? 'nav-link-active' : '' }}">
                        Insights
                    </a>

                    <!-- Insights -->
                    {{-- <div class="relative"
                         @mouseenter="insightsOpen = true"
                         @mouseleave="insightsOpen = false">
                        <button
                            type="button"
                            class="nav-link inline-flex items-center gap-2 {{ $insightsActive ? 'nav-link-active' : '' }}"
                            :class="insightsOpen ? 'nav-link-active' : ''"
                        >
                            <span>Insights</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4 transition duration-200"
                                 :class="insightsOpen ? 'rotate-180' : ''"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <div
                            x-show="insightsOpen"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            x-cloak
                            class="absolute left-0 top-full mt-3 w-[260px] rounded-lg border border-gray-200 bg-white p-2"
                        >
                            <div class="flex flex-col gap-1">
                                <a href="{{ url('/case-studies') }}"
                                   class="dropdown-link {{ request()->is('case-studies') ? 'dropdown-link-active' : '' }}">
                                    <span>Case Studies</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                    </svg>
                                </a>

                                <a href="{{ url('/perspectives') }}"
                                   class="dropdown-link {{ request()->is('perspectives') ? 'dropdown-link-active' : '' }}">
                                    <span>Perspectives</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div> --}}
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
                class="inline-flex lg:hidden items-center justify-center rounded-lg border border-gray-200 text-[#0018dc] h-11 w-11"
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
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            x-cloak
            class="lg:hidden pb-4"
        >
            <div class="rounded-lg border border-gray-200 bg-white p-3">
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
                    <div x-data="{ mobileSolutionsOpen: {{ $solutionsActive ? 'true' : 'false' }} }" class="border border-gray-200 rounded-lg p-2">
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


                    <!-- Mobile Insights -->
                    {{-- <div x-data="{ mobileInsightsOpen: {{ $insightsActive ? 'true' : 'false' }} }" class="border border-gray-200 rounded-lg p-2">
                        <button
                            @click="mobileInsightsOpen = !mobileInsightsOpen"
                            type="button"
                            class="mobile-toggle {{ $insightsActive ? 'mobile-toggle-active' : '' }}"
                            :class="mobileInsightsOpen ? 'mobile-toggle-active' : ''"
                        >
                            <span>Insights</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 transition duration-200"
                                 :class="mobileInsightsOpen ? 'rotate-180' : ''"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="mobileInsightsOpen" x-cloak class="mt-2 flex flex-col gap-1">
                            <a href="{{ url('/case-studies') }}"
                               class="mobile-sub-link {{ request()->is('case-studies') ? 'mobile-sub-link-active' : '' }}">
                                <span>Case Studies</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </a>

                            <a href="{{ url('/perspectives') }}"
                               class="mobile-sub-link {{ request()->is('perspectives') ? 'mobile-sub-link-active' : '' }}">
                                <span>Perspectives</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </a>
                        </div>
                    </div> --}}

                    <a href="{{ url('/contact') }}"
                       class="mobile-link {{ request()->is('contact') ? 'mobile-link-active' : '' }}">
                        Contact
                    </a>
                </nav>
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
        font-size: 16px;
        font-weight: 600;
        color: #0018dc;
        transition: all 0.2s ease;
        white-space: nowrap;
        padding: 4px 0;
    }

    .nav-link:hover {
        color: #0018dc;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 0;
        height: 2px;
        background: #0018dc;
        transition: width 0.2s ease;
    }

    .nav-link:hover::after,
    .nav-link-active::after {
        width: 100%;
    }

    .nav-link-active {
        color: #0018dc;
    }

    .dropdown-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        width: 100%;
        padding: 12px 14px;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 500;
        color: #0018dc;
        transition: all 0.2s ease;
        line-height: 1.4;
    }

    .dropdown-link:hover {
        background: #0018dc;
        color: #ffffff;
    }

    .dropdown-link-active {
        background: #0018dc;
        color: #ffffff;
        font-weight: 600;
    }

    .contact-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 48px;
        padding: 0 24px;
        border-radius: 9999px;
        background: #0018dc;
        color: #ffffff;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .contact-btn:hover {
        background: #0015c8;
    }

    .contact-btn-active {
        background: #0018dc;
    }

    .mobile-link {
        display: block;
        padding: 12px 14px;
        border-radius: 6px;
        color: #0018dc;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .mobile-link:hover {
        background: #0018dc;
        color: #ffffff;
    }

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
        border-radius: 6px;
        color: #0018dc;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .mobile-toggle:hover {
        background: #0018dc;
        color: #ffffff;
    }

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
        border-radius: 4px;
        color: #0018dc;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        line-height: 1.4;
    }

    .mobile-sub-link:hover {
        background: #0018dc;
        color: #ffffff;
    }

    .mobile-sub-link-active {
        background: #0018dc;
        color: #ffffff;
        font-weight: 600;
    }
</style>