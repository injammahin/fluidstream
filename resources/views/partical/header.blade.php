@php
    $solutionsActive =
        request()->is('multiphase-compression') ||
        request()->is('vapor-recovery') ||
        request()->is('casing-gas-compression');

    $resourcesActive =
        request()->is('case-studies') ||
        request()->is('insights');

    $multiphaseTechnologyActive = request()->is('multiphase-compression-technology');
    $technologyActive = request()->is('technology');
    $patentedTechnologyActive = request()->is('patented-technology');
    $aboutActive = request()->is('about-us') || request()->is('about');
    $contactActive = request()->is('contact');
@endphp

<header x-data="{
        mobileMenuOpen: false,
        activeDesktopMenu: null,
        closeTimer: null,
        lastScrollY: 0,
        headerHidden: false,

        setupScroll() {
            this.lastScrollY = window.pageYOffset || document.documentElement.scrollTop;

            window.addEventListener('scroll', () => {
                const currentY = window.pageYOffset || document.documentElement.scrollTop;
                const diff = currentY - this.lastScrollY;

                if (this.mobileMenuOpen || this.activeDesktopMenu) {
                    this.headerHidden = false;
                    this.lastScrollY = currentY;
                    return;
                }

                if (currentY < 40) {
                    this.headerHidden = false;
                } else if (diff > 8 && currentY > 120) {
                    this.headerHidden = true;
                    this.activeDesktopMenu = null;
                } else if (diff < -8) {
                    this.headerHidden = false;
                }

                this.lastScrollY = Math.max(currentY, 0);
            }, { passive: true });
        },

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
            this.activeDesktopMenu = this.activeDesktopMenu === menu ? null : menu;
        },

        closeAllMenus() {
            this.activeDesktopMenu = null;
            this.mobileMenuOpen = false;
        }
    }" x-init="setupScroll()" :class="headerHidden ? 'fs-header-hidden' : 'fs-header-visible'"
    @keydown.escape.window="closeAllMenus()" class="fs-header">
    <div class="fs-header-inner">
        <div class="fs-header-grid">

            {{-- Logo --}}
            <div class="fs-logo-panel">
                <a href="{{ url('/') }}" class="fs-logo-link">
                    <img src="{{ asset('img/logo.png') }}" alt="Fluidstream Logo">
                </a>
            </div>

            {{-- Topbar --}}
            <div class="fs-topbar-panel">
                <nav class="fs-topbar-grid" aria-label="Top navigation">
                    <a href="{{ url('/patented-technology') }}"
                        class="fs-topbar-link fs-topbar-patent {{ $patentedTechnologyActive ? 'fs-topbar-link-active' : '' }}">
                        Patented Technology
                    </a>

                    <a href="{{ url('/about-us') }}"
                        class="fs-topbar-link fs-topbar-about {{ $aboutActive ? 'fs-topbar-link-active' : '' }}">
                        About Us
                    </a>

                    <div class="fs-topbar-contact-cell">
                        <a href="{{ url('/contact') }}"
                            class="fs-topbar-contact {{ $contactActive ? 'fs-topbar-contact-active' : '' }}">
                            Contact
                        </a>
                    </div>
                </nav>
            </div>

            {{-- Main Navigation --}}
            <div class="fs-mainnav-panel">
                <nav class="fs-desktop-nav-grid" aria-label="Main navigation">
                    <a href="{{ url('/multiphase-compression-technology') }}"
                        class="fs-nav-link fs-nav-1 {{ $multiphaseTechnologyActive ? 'fs-nav-link-active' : '' }}">
                        Why Multiphase
                    </a>

                    <a href="{{ url('/technology') }}"
                        class="fs-nav-link fs-nav-2 {{ $technologyActive ? 'fs-nav-link-active' : '' }}">
                        Technology
                    </a>

                    <div class="fs-nav-dropdown fs-nav-3" @mouseenter="openMenu('solutions')"
                        @mouseleave="closeMenu('solutions')">
                        <button type="button" @click.prevent="toggleMenu('solutions')"
                            class="fs-nav-link fs-nav-button {{ $solutionsActive ? 'fs-nav-link-active' : '' }}"
                            :class="activeDesktopMenu === 'solutions' ? 'fs-nav-link-active' : ''">
                            <span>Applications</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fs-nav-chevron"
                                :class="activeDesktopMenu === 'solutions' ? 'rotate-180' : ''" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <div class="fs-nav-dropdown fs-nav-4" @mouseenter="openMenu('resources')"
                        @mouseleave="closeMenu('resources')">
                        <button type="button" @click.prevent="toggleMenu('resources')"
                            class="fs-nav-link fs-nav-button {{ $resourcesActive ? 'fs-nav-link-active' : '' }}"
                            :class="activeDesktopMenu === 'resources' ? 'fs-nav-link-active' : ''">
                            <span>Resources</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fs-nav-chevron"
                                :class="activeDesktopMenu === 'resources' ? 'rotate-180' : ''" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </nav>

                {{-- Mobile Hamburger --}}
                <button type="button" class="fs-mobile-button" @click="mobileMenuOpen = !mobileMenuOpen"
                    aria-label="Toggle menu">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="fs-mobile-icon" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>

                    <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="fs-mobile-icon"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Applications Mega Menu --}}
    <div x-show="activeDesktopMenu === 'solutions'" x-transition:enter="transition ease-out duration-180"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-120" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak class="fs-mega-menu" @mouseenter="openMenu('solutions')"
        @mouseleave="closeMenu('solutions')">
        <div class="fs-header-inner">
            <div class="fs-mega-tray">
                <div class="fs-mega-left">
                    <span class="fs-mega-left-accent"></span>
                    <h3 class="fs-mega-left-title">
                        Emissions Reduction and Production Optimization Solutions Utilizing Multiphase Compression
                    </h3>
                </div>

                <div class="fs-mega-content">
                    <div class="fs-mega-right fs-mega-right-3">
                        <a href="{{ url('/multiphase-compression') }}"
                            class="fs-mega-item {{ request()->is('multiphase-compression') ? 'fs-mega-item-active' : '' }}">
                            <h4 class="fs-mega-title">
                                Multiphase Pump<br>
                                Multiphase Compression
                            </h4>

                            <p class="fs-mega-copy">
                                Reliable autonomous multiphase compression technology for methane reduction, production
                                improvement, and low-maintenance field performance.
                            </p>

                            <span class="fs-mega-view">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" class="fs-mega-view-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </span>
                        </a>

                        <a href="{{ url('/vapor-recovery') }}"
                            class="fs-mega-item {{ request()->is('vapor-recovery') ? 'fs-mega-item-active' : '' }}">
                            <h4 class="fs-mega-title">Vapor Recovery</h4>

                            <p class="fs-mega-copy">
                                Capture valuable gas, reduce venting and emissions, and improve operational efficiency
                                with
                                compact, field-ready recovery systems.
                            </p>

                            <span class="fs-mega-view">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" class="fs-mega-view-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </span>
                        </a>

                        <a href="{{ url('/casing-gas-compression') }}"
                            class="fs-mega-item {{ request()->is('casing-gas-compression') ? 'fs-mega-item-active' : '' }}">
                            <h4 class="fs-mega-title">
                                Casing Gas<br>
                                Compression
                            </h4>

                            <p class="fs-mega-copy">
                                Compress low-pressure casing gas to support production optimization, reduce flaring, and
                                unlock additional site value.
                            </p>

                            <span class="fs-mega-view">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" class="fs-mega-view-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Resources Mega Menu --}}
    <div x-show="activeDesktopMenu === 'resources'" x-transition:enter="transition ease-out duration-180"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-120" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak class="fs-mega-menu" @mouseenter="openMenu('resources')"
        @mouseleave="closeMenu('resources')">
        <div class="fs-header-inner">
            <div class="fs-mega-tray">
                <div class="fs-mega-left">
                    <span class="fs-mega-left-accent"></span>
                    <h3 class="fs-mega-left-title">
                        Industry knowledge and real-world case studies demonstrating performance
                    </h3>
                </div>

                <div class="fs-mega-content">
                    <div class="fs-mega-right fs-mega-right-2">
                        <a href="{{ url('/case-studies') }}"
                            class="fs-mega-item {{ request()->is('case-studies') ? 'fs-mega-item-active' : '' }}">
                            <h4 class="fs-mega-title">Case Studies</h4>

                            <p class="fs-mega-copy">
                                Real-world field applications highlighting measurable production gains, emissions
                                reduction, reliability improvements, and documented Fluidstream performance across
                                demanding operating environments.
                            </p>

                            <span class="fs-mega-view">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" class="fs-mega-view-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </span>
                        </a>

                        <a href="{{ url('/insights') }}"
                            class="fs-mega-item {{ request()->is('insights') ? 'fs-mega-item-active' : '' }}">
                            <h4 class="fs-mega-title">Insights</h4>

                            <p class="fs-mega-copy">
                                Technical content covering industry challenges, compression fundamentals, operating
                                mechanics, and engineering perspectives on Fluidstream performance in real-world
                                applications.
                            </p>

                            <span class="fs-mega-view">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" class="fs-mega-view-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-180"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-120" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" x-cloak class="fs-mobile-menu-panel">
        <div class="fs-mobile-menu-inner">
            <nav class="fs-mobile-nav">
                <a href="{{ url('/multiphase-compression-technology') }}"
                    class="fs-mobile-link {{ $multiphaseTechnologyActive ? 'fs-mobile-link-active' : '' }}">
                    Why Multiphase
                </a>

                <a href="{{ url('/technology') }}"
                    class="fs-mobile-link {{ $technologyActive ? 'fs-mobile-link-active' : '' }}">
                    Technology
                </a>

                <div x-data="{ open: {{ $solutionsActive ? 'true' : 'false' }} }" class="fs-mobile-group">
                    <button type="button"
                        class="fs-mobile-toggle {{ $solutionsActive ? 'fs-mobile-toggle-active' : '' }}"
                        :class="open ? 'fs-mobile-toggle-active' : ''" @click="open = !open">
                        <span>Applications</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fs-mobile-arrow"
                            :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-cloak class="fs-mobile-submenu">
                        <a href="{{ url('/multiphase-compression') }}"
                            class="fs-mobile-sub-link {{ request()->is('multiphase-compression') ? 'fs-mobile-sub-link-active' : '' }}">
                            Multiphase Pump / Compression
                        </a>

                        <a href="{{ url('/vapor-recovery') }}"
                            class="fs-mobile-sub-link {{ request()->is('vapor-recovery') ? 'fs-mobile-sub-link-active' : '' }}">
                            Vapor Recovery
                        </a>

                        <a href="{{ url('/casing-gas-compression') }}"
                            class="fs-mobile-sub-link {{ request()->is('casing-gas-compression') ? 'fs-mobile-sub-link-active' : '' }}">
                            Casing Gas Compression
                        </a>
                    </div>
                </div>

                <div x-data="{ open: {{ $resourcesActive ? 'true' : 'false' }} }" class="fs-mobile-group">
                    <button type="button"
                        class="fs-mobile-toggle {{ $resourcesActive ? 'fs-mobile-toggle-active' : '' }}"
                        :class="open ? 'fs-mobile-toggle-active' : ''" @click="open = !open">
                        <span>Resources</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fs-mobile-arrow"
                            :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-cloak class="fs-mobile-submenu">
                        <a href="{{ url('/case-studies') }}"
                            class="fs-mobile-sub-link {{ request()->is('case-studies') ? 'fs-mobile-sub-link-active' : '' }}">
                            Case Studies
                        </a>

                        <a href="{{ url('/insights') }}"
                            class="fs-mobile-sub-link {{ request()->is('insights') ? 'fs-mobile-sub-link-active' : '' }}">
                            Insights
                        </a>
                    </div>
                </div>

                <a href="{{ url('/patented-technology') }}"
                    class="fs-mobile-link {{ $patentedTechnologyActive ? 'fs-mobile-link-active' : '' }}">
                    Patented Technology
                </a>

                <a href="{{ url('/about-us') }}"
                    class="fs-mobile-link {{ $aboutActive ? 'fs-mobile-link-active' : '' }}">
                    About Us
                </a>

                <a href="{{ url('/contact') }}"
                    class="fs-mobile-link fs-mobile-contact {{ $contactActive ? 'fs-mobile-link-active' : '' }}">
                    Contact
                </a>
            </nav>
        </div>
    </div>
</header>

<div class="fs-header-spacer" aria-hidden="true"></div>

<style>
    [x-cloak] {
        display: none !important;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }

    .fs-header {
        --fs-logo-col: clamp(330px, 23vw, 430px);
        --fs-top-row: 40px;
        --fs-main-row: 68px;
        --fs-header-height: 108px;

        position: fixed;
        inset: 0 0 auto 0;
        z-index: 9999;
        background: #ffffff;
        box-shadow: 0 10px 28px rgba(15, 23, 42, 0.035);
        transform: translateY(0);
        transition: transform .34s ease, box-shadow .25s ease;
        will-change: transform;
    }

    .fs-header-hidden {
        transform: translateY(-100%);
        box-shadow: none;
    }

    .fs-header-visible {
        transform: translateY(0);
    }

    .fs-header-inner {
        width: min(calc(100% - 56px), 1680px);
        margin: 0 auto;
    }

    .fs-header-grid {
        display: grid;
        grid-template-columns: var(--fs-logo-col) minmax(0, 1fr);
        grid-template-rows: var(--fs-top-row) var(--fs-main-row);
        background: #ffffff;
    }

    .fs-logo-panel {
        grid-column: 1;
        grid-row: 1 / 3;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding-right: 34px;
        border-right: 1px solid #e7edf6;
    }

    .fs-logo-link {
        display: inline-flex;
        align-items: center;
    }

    .fs-logo-link img {
        height: 58px;
        width: auto;
        display: block;
    }

    .fs-topbar-panel {
        grid-column: 2;
        grid-row: 1;
        border-bottom: 1px solid #e7edf6;
    }

    .fs-topbar-grid,
    .fs-desktop-nav-grid {
        display: grid;
        grid-template-columns:
            minmax(260px, 1fr) minmax(145px, 200px) minmax(180px, 220px) minmax(145px, 200px) minmax(165px, 1fr);
        align-items: center;
        height: 100%;
    }

    .fs-topbar-patent {
        grid-column: 3;
    }

    .fs-topbar-about {
        grid-column: 4;
    }

    .fs-topbar-contact-cell {
        grid-column: 5;
        height: var(--fs-top-row);
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-left: 22px;
        border-left: 1px solid #e7edf6;
    }

    .fs-topbar-link {
        height: var(--fs-top-row);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 22px;
        border-left: 1px solid #e7edf6;
        color: #334155;
        font-size: 14px;
        line-height: 1;
        font-weight: 600;
        white-space: nowrap;
        text-align: center;
        transition: color .2s ease, background .2s ease;
    }

    .fs-topbar-link:hover,
    .fs-topbar-link-active {
        color: #0018dc;
        background: #f8fbff;
    }

    .fs-topbar-contact {
        height: 31px;
        min-width: 126px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #9aa8ff;
        border-radius: 999px;
        color: #0018dc;
        font-size: 14px;
        font-weight: 700;
        line-height: 1;
        transition: all .2s ease;
    }

    .fs-topbar-contact:hover,
    .fs-topbar-contact-active {
        background: #1028ea;
        border-color: #1028ea;
        color: #ffffff;
    }

    .fs-mainnav-panel {
        grid-column: 2;
        grid-row: 2;
        position: relative;
        border-bottom: 1px solid #e7edf6;
    }

    .fs-nav-1 {
        grid-column: 1;
        justify-self: center;
    }

    .fs-nav-2 {
        grid-column: 2;
        justify-self: center;
    }

    .fs-nav-3 {
        grid-column: 3;
        justify-self: center;
    }

    .fs-nav-4 {
        grid-column: 4;
        justify-self: center;
    }

    .fs-nav-dropdown {
        position: relative;
    }

    .fs-nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 40px;
        padding: 0;
        border: 0;
        background: transparent;
        color: #0018dc;
        font-size: 16px;
        font-weight: 600;
        line-height: 1;
        white-space: nowrap;
        appearance: none;
        -webkit-appearance: none;
        cursor: pointer;
        text-align: left;
        transition: color .2s ease;
    }

    .fs-nav-button:focus {
        outline: none;
        box-shadow: none;
    }

    .fs-nav-button:focus-visible {
        outline: 2px solid rgba(0, 24, 220, 0.22);
        outline-offset: 5px;
        border-radius: 4px;
    }

    .fs-nav-chevron {
        width: 16px;
        height: 16px;
        transition: transform .2s ease;
    }

    .fs-nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -14px;
        width: 0;
        height: 3px;
        border-radius: 999px;
        background: #0018dc;
        transition: width .2s ease;
    }

    .fs-nav-link:hover::after,
    .fs-nav-link-active::after {
        width: 100%;
    }

    .fs-mega-menu {
        position: absolute;
        left: 0;
        right: 0;
        top: var(--fs-header-height);
        background: #ffffff;
        border-top: 1px solid #eef2f6;
        border-bottom: 1px solid #e8edf3;
        box-shadow: 0 28px 60px rgba(15, 23, 42, 0.06);
    }

    .fs-mega-tray {
        display: grid;
        grid-template-columns: var(--fs-logo-col) minmax(0, 1fr);
        min-height: 270px;
        text-align: left;
    }

    .fs-mega-left {
        display: block;
        padding: 28px 32px 28px 0;
        border-right: 1px solid #e7edf6;
        text-align: left;
    }

    .fs-mega-left-accent {
        display: inline-block;
        width: 48px;
        height: 3px;
        border-radius: 999px;
        background: linear-gradient(90deg, #0018dc 0%, #4f7cff 100%);
        margin-bottom: 18px;
    }

    .fs-mega-left-title {
        max-width: 310px;
        margin: 0;
        font-size: 20px;
        line-height: 1.22;
        font-weight: 700;
        letter-spacing: -0.025em;
        color: #0018dc;
        text-align: left;
    }

    .fs-mega-content {
        padding: 28px 0 28px 38px;
        text-align: left;
    }

    .fs-mega-right {
        display: grid;
        align-items: stretch;
        justify-items: start;
        text-align: left;
    }

    .fs-mega-right-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        column-gap: 38px;
    }

    .fs-mega-right-2 {
        grid-template-columns: repeat(2, minmax(260px, 340px));
        column-gap: 80px;
        max-width: 820px;
    }

    .fs-mega-item {
        min-height: 214px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        text-decoration: none;
        text-align: left;
    }

    .fs-mega-title {
        max-width: 300px;
        min-height: 54px;
        margin: 0;
        color: #0018dc;
        font-size: 21px;
        line-height: 1.16;
        font-weight: 500;
        letter-spacing: -0.025em;
        text-align: left;
    }

    .fs-mega-copy {
        max-width: 310px;
        margin: 18px 0 0;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
        font-weight: 400;
        text-align: left;
    }

    .fs-mega-view {
        display: inline-flex;
        align-items: center;
        justify-content: flex-start;
        gap: 14px;
        margin-top: auto;
        color: #0018dc;
        font-size: 15px;
        line-height: 1.2;
        font-weight: 700;
        text-align: left;
    }

    .fs-mega-view-icon {
        width: 18px;
        height: 18px;
        transition: transform .2s ease;
    }

    .fs-mega-item:hover .fs-mega-view-icon,
    .fs-mega-item-active .fs-mega-view-icon {
        transform: translateX(4px);
    }

    .fs-mobile-button {
        display: none;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        border: 2px solid #0018dc;
        border-radius: 12px;
        color: #0018dc;
        background: #ffffff;
    }

    .fs-mobile-icon {
        width: 24px;
        height: 24px;
    }

    .fs-mobile-menu-panel {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        border-top: 1px solid #e7edf6;
        box-shadow: 0 18px 38px rgba(15, 23, 42, 0.08);
    }

    .fs-mobile-menu-inner {
        width: min(calc(100% - 32px), 100%);
        margin: 0 auto;
        padding: 14px 0 18px;
    }

    .fs-mobile-nav {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 10px;
        border: 1px solid #e5edf7;
        border-radius: 16px;
        background: #ffffff;
    }

    .fs-mobile-link,
    .fs-mobile-toggle {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 14px;
        border-radius: 10px;
        color: #0018dc;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.3;
        text-align: left;
        background: transparent;
        transition: all .2s ease;
    }

    .fs-mobile-link:hover,
    .fs-mobile-link-active,
    .fs-mobile-toggle:hover,
    .fs-mobile-toggle-active {
        background: #0018dc;
        color: #ffffff;
    }

    .fs-mobile-group {
        padding: 6px;
        border: 1px solid #e5edf7;
        border-radius: 14px;
    }

    .fs-mobile-submenu {
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-top: 6px;
    }

    .fs-mobile-sub-link {
        display: block;
        padding: 12px 14px;
        border-radius: 10px;
        color: #0018dc;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.4;
        text-align: left;
        transition: all .2s ease;
    }

    .fs-mobile-sub-link:hover,
    .fs-mobile-sub-link-active {
        background: #eef4ff;
        color: #0018dc;
    }

    .fs-mobile-contact {
        justify-content: center;
        background: #1028ea;
        color: #ffffff;
    }

    .fs-mobile-arrow {
        width: 20px;
        height: 20px;
        transition: transform .2s ease;
    }

    .fs-header-spacer {
        height: 108px;
    }

    @media (max-width: 1500px) {
        .fs-header {
            --fs-logo-col: clamp(300px, 22vw, 390px);
        }

        .fs-header-inner {
            width: min(calc(100% - 48px), 1440px);
        }

        .fs-topbar-grid,
        .fs-desktop-nav-grid {
            grid-template-columns:
                minmax(240px, 1fr) minmax(130px, 180px) minmax(165px, 205px) minmax(130px, 180px) minmax(150px, 1fr);
        }

        .fs-mega-right-3 {
            column-gap: 32px;
        }

        .fs-mega-right-2 {
            column-gap: 60px;
        }
    }

    @media (max-width: 1280px) {
        .fs-header {
            --fs-logo-col: 285px;
        }

        .fs-logo-link img {
            height: 52px;
        }

        .fs-topbar-grid,
        .fs-desktop-nav-grid {
            grid-template-columns:
                minmax(210px, 1fr) minmax(120px, 160px) minmax(150px, 185px) minmax(120px, 160px) minmax(135px, 1fr);
        }

        .fs-nav-link {
            font-size: 15px;
        }

        .fs-topbar-link {
            padding: 0 16px;
            font-size: 14px;
        }

        .fs-topbar-contact {
            min-width: 112px;
            height: 30px;
            font-size: 14px;
        }

        .fs-topbar-contact-cell {
            padding-left: 14px;
        }

        .fs-mega-left-title {
            max-width: 245px;
            font-size: 19px;
        }

        .fs-mega-content {
            padding-left: 28px;
        }

        .fs-mega-right-3 {
            column-gap: 24px;
        }

        .fs-mega-title {
            font-size: 19px;
        }

        .fs-mega-copy {
            max-width: 245px;
            font-size: 13.5px;
        }
    }

    @media (max-width: 1100px) {
        .fs-header-inner {
            width: min(calc(100% - 32px), 100%);
        }

        .fs-header-grid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 74px;
        }

        .fs-logo-panel {
            border-right: 0;
            padding-right: 0;
        }

        .fs-logo-link img {
            height: 40px;
        }

        .fs-topbar-panel,
        .fs-desktop-nav-grid,
        .fs-mega-menu {
            display: none !important;
        }

        .fs-mainnav-panel {
            border-bottom: 0;
            justify-content: flex-end;
        }

        .fs-mobile-button {
            display: inline-flex;
        }

        .fs-mobile-menu-panel {
            display: block;
        }

        .fs-header-spacer {
            height: 74px;
        }
    }

    @media (max-width: 640px) {
        .fs-header-inner {
            width: min(calc(100% - 24px), 100%);
        }

        .fs-header-grid {
            min-height: 68px;
        }

        .fs-logo-link img {
            height: 34px;
        }

        .fs-mobile-button {
            width: 42px;
            height: 42px;
            border-radius: 12px;
        }

        .fs-mobile-icon {
            width: 24px;
            height: 24px;
        }

        .fs-header-spacer {
            height: 68px;
        }
    }
</style>