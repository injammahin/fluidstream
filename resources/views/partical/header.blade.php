@php
    $solutionsActive =
        request()->is('multiphase-compression') ||
        request()->is('vapor-recovery') ||
        request()->is('casing-gas-compression');

    $resourcesActive =
        request()->is('case-studies') ||
        request()->is('insights');

    $multiphaseTechnologyActive = request()->is('why-multiphase');
    $technologyActive = request()->is('technology');
    $patentedTechnologyActive = request()->is('patented-technology');
    $aboutActive = request()->is('about-us') || request()->is('about');
    $contactActive = request()->is('contact');

    /*
        Static search index.
        Add your real page content, case study title, case study keywords, and article text here.
        Search will NOT show suggestions. It will redirect only after pressing Enter or Go.
    */
    $searchPages = [
        [
            'title' => 'Home',
            'url' => url('/'),
            'description' => 'Fluidstream main website page',
            'keywords' => 'home fluidstream multiphase compression methane reduction oil production emissions',
            'content' => 'Reduce methane emissions and increase oil production with Fluidstream technology. Field proven results for demanding applications.',
        ],
        [
            'title' => 'Why Multiphase',
            'url' => url('/why-multiphase'),
            'description' => 'Why multiphase compression technology matters',
            'keywords' => 'why multiphase multiphase compression multiphase pump oil gas emissions',
            'content' => 'Multiphase compression supports liquid and gas handling, production optimization, methane reduction and lower maintenance field operation.',
        ],
        [
            'title' => 'Technology',
            'url' => url('/technology'),
            'description' => 'Fluidstream technology overview',
            'keywords' => 'technology fluidstream compressor pump engineering autonomous field system',
            'content' => 'Fluidstream technology uses patented multiphase compression methods for autonomous field performance and reliable operation.',
        ],
        [
            'title' => 'Patented Technology',
            'url' => url('/patented-technology'),
            'description' => 'Patented Fluidstream technology',
            'keywords' => 'patented technology patent innovation compression pump system',
            'content' => 'Patented technology for multiphase compression, vapor recovery, casing gas compression and emissions reduction.',
        ],
        [
            'title' => 'About Us',
            'url' => url('/about-us'),
            'description' => 'Company information and background',
            'keywords' => 'about us company team fluidstream background mission',
            'content' => 'Fluidstream company profile, mission, technology background and industry focus.',
        ],
        [
            'title' => 'Contact',
            'url' => url('/contact'),
            'description' => 'Contact Fluidstream',
            'keywords' => 'contact quote inquiry email phone location support',
            'content' => 'Contact Fluidstream for project inquiries, applications, technical discussion and business communication.',
        ],
        [
            'title' => 'Multiphase Pump / Multiphase Compression',
            'url' => url('/multiphase-compression'),
            'description' => 'Multiphase pump and compression solution',
            'keywords' => 'multiphase pump multiphase compression methane production optimization oil gas',
            'content' => 'Reliable autonomous multiphase compression technology for methane reduction, production improvement and low maintenance field performance.',
        ],
        [
            'title' => 'Vapor Recovery',
            'url' => url('/vapor-recovery'),
            'description' => 'Vapor recovery application',
            'keywords' => 'vapor recovery venting emissions gas capture recovery tank vapor',
            'content' => 'Capture valuable gas, reduce venting and emissions and improve operational efficiency with compact field ready vapor recovery systems.',
        ],
        [
            'title' => 'Casing Gas Compression',
            'url' => url('/casing-gas-compression'),
            'description' => 'Casing gas compression application',
            'keywords' => 'casing gas compression casing gas flaring low pressure gas production',
            'content' => 'Compress low pressure casing gas to support production optimization, reduce flaring and unlock additional site value.',
        ],
        [
            'title' => 'Case Studies',
            'url' => url('/case-studies'),
            'description' => 'Real-world case studies',
            'keywords' => 'case studies results field performance proof points demanding applications production emissions',
            'content' => 'Case studies include real world field applications, measurable production gains, emissions reduction, reliability improvements and documented Fluidstream performance.',
        ],
        [
            'title' => 'Insights',
            'url' => url('/insights'),
            'description' => 'Technical insights and articles',
            'keywords' => 'insights articles technical knowledge resources engineering compression fundamentals',
            'content' => 'Technical content covering industry challenges, compression fundamentals, operating mechanics and engineering perspectives on Fluidstream performance.',
        ],
    ];
@endphp

<script>
    window.fsHeaderNavigation = function () {
        return {
            mobileMenuOpen: false,
            activeDesktopMenu: null,
            closeTimer: null,
            lastScrollY: 0,
            headerHidden: false,

            searchOpen: false,
            searchQuery: '',
            searchMessage: '',
            searchSubmitted: false,
            searchPages: @json($searchPages),

            setupScroll() {
                const getScrollY = () => window.pageYOffset || document.documentElement.scrollTop || 0;

                const hideHeaderForAnchor = () => {
                    const currentY = getScrollY();

                    if (window.location.hash && currentY > 80) {
                        this.headerHidden = true;
                        this.activeDesktopMenu = null;
                        this.searchOpen = false;
                        this.lastScrollY = currentY;
                    }
                };

                this.lastScrollY = getScrollY();

                /*
                  If page opens directly like:
                  /technology#drives-section
                  hide the header after browser completes the anchor jump.
                */
                hideHeaderForAnchor();

                setTimeout(() => {
                    hideHeaderForAnchor();
                }, 80);

                setTimeout(() => {
                    hideHeaderForAnchor();
                }, 350);

                /*
                  If user clicks an anchor link on the same page,
                  hide the header immediately. Header will return only when user scrolls up.
                */
                document.addEventListener('click', (event) => {
                    const link = event.target.closest('a[href*="#"]');

                    if (!link) return;

                    const url = new URL(link.href, window.location.href);

                    if (url.pathname !== window.location.pathname) return;
                    if (!url.hash) return;

                    const target = document.querySelector(url.hash);

                    if (!target) return;

                    this.headerHidden = true;
                    this.activeDesktopMenu = null;
                    this.searchOpen = false;

                    setTimeout(() => {
                        this.headerHidden = true;
                        this.lastScrollY = getScrollY();
                    }, 350);
                });

                window.addEventListener('hashchange', () => {
                    setTimeout(() => {
                        hideHeaderForAnchor();
                    }, 100);
                });

                window.addEventListener('scroll', () => {
                    const currentY = getScrollY();
                    const diff = currentY - this.lastScrollY;

                    if (this.mobileMenuOpen || this.activeDesktopMenu || this.searchOpen) {
                        this.headerHidden = false;
                        this.lastScrollY = currentY;
                        return;
                    }

                    if (currentY < 40) {
                        this.headerHidden = false;
                    } else if (diff > 8 && currentY > 120) {
                        /*
                          Scrolling down = hide header
                        */
                        this.headerHidden = true;
                        this.activeDesktopMenu = null;
                        this.searchOpen = false;
                    } else if (diff < -8) {
                        /*
                          Scrolling up = show header
                        */
                        this.headerHidden = false;
                    }

                    this.lastScrollY = Math.max(currentY, 0);
                }, { passive: true });
            },
            normalizeText(value) {
                return (value || '')
                    .toString()
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/gi, ' ')
                    .replace(/\s+/g, ' ')
                    .trim();
            },

            getSearchScore(page, query) {
                const q = this.normalizeText(query);

                if (!q) {
                    return 0;
                }

                const title = this.normalizeText(page.title);
                const description = this.normalizeText(page.description);
                const keywords = this.normalizeText(page.keywords);
                const content = this.normalizeText(page.content);
                const fullText = `${title} ${description} ${keywords} ${content}`;
                const words = q.split(' ').filter(Boolean);

                let score = 0;

                if (title === q) score += 120;
                if (title.startsWith(q)) score += 90;
                if (title.includes(q)) score += 70;
                if (keywords.includes(q)) score += 60;
                if (description.includes(q)) score += 50;
                if (content.includes(q)) score += 45;
                if (fullText.includes(q)) score += 35;

                words.forEach((word) => {
                    if (title.includes(word)) score += 22;
                    if (keywords.includes(word)) score += 18;
                    if (description.includes(word)) score += 14;
                    if (content.includes(word)) score += 10;
                });

                return score;
            },

            submitSearch() {
                const q = this.searchQuery.trim();

                this.searchSubmitted = true;
                this.searchMessage = '';

                if (!q) {
                    this.searchMessage = 'Please type something to search.';
                    return;
                }

                window.location.href = `{{ route('search') }}?q=${encodeURIComponent(q)}`;
            },
            resetSearchMessage() {
                this.searchSubmitted = false;
                this.searchMessage = '';
            },

            openMenu(menu) {
                clearTimeout(this.closeTimer);
                this.searchOpen = false;
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
                this.searchOpen = false;
                this.activeDesktopMenu = this.activeDesktopMenu === menu ? null : menu;
            },

            openSearch() {
                this.activeDesktopMenu = null;
                this.mobileMenuOpen = false;
                this.searchOpen = true;

                this.$nextTick(() => {
                    const input = this.$refs.desktopSearchInput;

                    if (input) {
                        input.focus();
                    }
                });
            },

            toggleSearch() {
                if (this.searchOpen) {
                    this.closeSearch();
                } else {
                    this.openSearch();
                }
            },

            closeSearch() {
                this.searchOpen = false;
                this.searchMessage = '';
                this.searchSubmitted = false;
            },

            closeAllMenus() {
                this.activeDesktopMenu = null;
                this.mobileMenuOpen = false;
                this.searchOpen = false;
                this.searchMessage = '';
                this.searchSubmitted = false;
            }
        };
    };
</script>

<header x-data="fsHeaderNavigation()" x-init="setupScroll()"
    :class="headerHidden ? 'fs-header-hidden' : 'fs-header-visible'" @keydown.escape.window="closeAllMenus()"
    @fs-hide-header.window="
        headerHidden = true;
        activeDesktopMenu = null;
        searchOpen = false;
        lastScrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
    " class="fs-header">
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
                    <span class="fs-topbar-bottom-line" aria-hidden="true"></span>

                    <a href="{{ url('/patented-technology') }}"
                        class="fs-topbar-link fs-topbar-patent {{ $patentedTechnologyActive ? 'fs-topbar-link-active' : '' }}">
                        Patents
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

                    <div class="fs-topbar-search-cell" @click.outside="if (searchOpen) closeSearch()">
                        <button type="button" class="fs-topbar-search-button"
                            :class="searchOpen ? 'fs-topbar-search-button-active' : ''" @click.prevent="toggleSearch()"
                            :aria-expanded="searchOpen.toString()" aria-label="Search">
                            <svg x-show="!searchOpen" xmlns="http://www.w3.org/2000/svg" class="fs-search-icon"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />
                            </svg>

                            <svg x-show="searchOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="fs-search-icon"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div x-show="searchOpen" x-transition:enter="transition ease-out duration-160"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-120"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2" x-cloak class="fs-search-popover">
                            <form class="fs-search-form" @submit.prevent="submitSearch()">
                                <input x-ref="desktopSearchInput" x-model="searchQuery" @input="resetSearchMessage()"
                                    type="search" class="fs-search-input" placeholder="Search pages..."
                                    autocomplete="off">

                                <button type="submit" class="fs-search-submit">
                                    Go
                                </button>
                            </form>

                            <p x-show="searchSubmitted && searchMessage" x-text="searchMessage"
                                class="fs-search-message"></p>
                        </div>
                    </div>
                </nav>
            </div>

            {{-- Main Navigation --}}
            <div class="fs-mainnav-panel">
                <nav class="fs-desktop-nav-grid" aria-label="Main navigation">
                    <a href="{{ url('/why-multiphase') }}"
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
                                with compact, field-ready recovery systems.
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

                <div class="fs-mobile-search-box">
                    <form class="fs-mobile-search-form" @submit.prevent="submitSearch()">
                        <input x-model="searchQuery" @input="resetSearchMessage()" type="search"
                            class="fs-mobile-search-input" placeholder="Search pages..." autocomplete="off">

                        <button type="submit" class="fs-mobile-search-submit" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fs-mobile-search-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />
                            </svg>
                        </button>
                    </form>

                    <p x-show="searchSubmitted && searchMessage" x-text="searchMessage"
                        class="fs-mobile-search-message"></p>
                </div>

                <a href="{{ url('/why-multiphase') }}"
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
        --fs-top-row: 44px;
        --fs-main-row: 70px;
        --fs-header-height: 114px;

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
        height: var(--fs-top-row);
        position: relative;
        z-index: 30;
    }

    .fs-topbar-grid {
        position: relative;
        display: grid;
        grid-template-columns:
            minmax(240px, 1fr) minmax(170px, 220px) minmax(145px, 200px) minmax(150px, 220px) 72px;
        align-items: stretch;
        height: var(--fs-top-row);
    }

    .fs-topbar-bottom-line {
        position: relative;
        grid-column: 1 / 4;
        grid-row: 1;
        align-self: end;
        height: 1px;
        width: 100%;
        background: #e7edf6;
        pointer-events: none;
        z-index: 1;
    }

    .fs-topbar-patent {
        grid-column: 2;
        grid-row: 1;
    }

    .fs-topbar-about {
        grid-column: 3;
        grid-row: 1;
        border-right: 1px solid #e7edf6;
    }

    .fs-topbar-contact-cell {
        grid-column: 4;
        grid-row: 1;
        position: relative;
        z-index: 3;
        height: var(--fs-top-row);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 18px;
        border-left: 0;
    }

    .fs-topbar-search-cell {
        grid-column: 5;
        grid-row: 1;
        position: relative;
        z-index: 4;
        height: var(--fs-top-row);
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .fs-topbar-link {
        position: relative;
        z-index: 2;
        height: var(--fs-top-row) !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
        border-left: 1px solid #e7edf6;
        color: #334155;
        font-size: 14px !important;
        line-height: 1;
        font-weight: 600 !important;
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
        height: 32px;
        min-width: 126px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #9aa8ff;
        border-radius: 999px;
        color: #0018dc;
        background: #ffffff;
        font-size: 14px;
        font-weight: 700;
        line-height: 1;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .fs-topbar-contact:hover,
    .fs-topbar-contact-active {
        background: #1028ea;
        border-color: #1028ea;
        color: #ffffff;
    }

    .fs-topbar-search-button {
        width: 46px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #9aa8ff;
        border-radius: 999px;
        background: #ffffff;
        color: #0018dc;
        cursor: pointer;
        transition: all .2s ease;
    }

    .fs-topbar-search-button:hover,
    .fs-topbar-search-button-active {
        background: #1028ea;
        border-color: #1028ea;
        color: #ffffff;
    }

    .fs-search-icon {
        width: 17px;
        height: 17px;
    }

    .fs-search-popover {
        position: absolute;
        top: calc(100% + 14px);
        right: 0;
        width: min(480px, calc(100vw - 36px));
        padding: 20px;
        border: 1px solid #e5edf7;
        border-radius: 7px;
        background: #ffffff;
        box-shadow: 0 24px 54px rgba(15, 23, 42, 0.14);
        text-align: left;
    }

    .fs-search-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .fs-search-input {
        width: 100%;
        height: 50px;
        padding: 0 18px;
        border: 1px solid #9aa8ff;
        border-radius: 999px;
        color: #0f172a;
        background: #ffffff;
        font-size: 16px;
        font-weight: 500;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .fs-search-input:focus {
        border-color: #1028ea;
        box-shadow: 0 0 0 4px rgba(16, 40, 234, 0.10);
    }

    .fs-search-submit {
        height: 50px;
        min-width: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 999px;
        background: #1028ea;
        color: #ffffff;
        font-size: 15px;
        font-weight: 800;
        cursor: pointer;
    }

    .fs-search-message {
        margin: 12px 4px 0;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        line-height: 1.4;
    }

    .fs-mainnav-panel {
        grid-column: 2;
        grid-row: 2;
        position: relative;
        border-bottom: 1px solid #e7edf6;
    }

    .fs-desktop-nav-grid {
        display: grid;
        grid-template-columns:
            minmax(240px, 1fr) minmax(145px, 200px) minmax(170px, 220px) minmax(145px, 200px) minmax(220px, 1fr);
        align-items: center;
        height: var(--fs-main-row);
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

    .fs-mobile-search-box {
        padding: 6px;
        border: 1px solid #e5edf7;
        border-radius: 14px;
        background: #f8fbff;
    }

    .fs-mobile-search-form {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .fs-mobile-search-input {
        width: 100%;
        height: 42px;
        padding: 0 13px;
        border: 1px solid #dbe5f2;
        border-radius: 12px;
        color: #0f172a;
        background: #ffffff;
        font-size: 14px;
        font-weight: 600;
        outline: none;
    }

    .fs-mobile-search-submit {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 12px;
        background: #1028ea;
        color: #ffffff;
    }

    .fs-mobile-search-icon {
        width: 19px;
        height: 19px;
    }

    .fs-mobile-search-message {
        margin: 8px 4px 2px;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
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
        height: 114px;
    }

    @media (max-width: 1500px) {
        .fs-header {
            --fs-logo-col: clamp(300px, 22vw, 390px);
        }

        .fs-header-inner {
            width: min(calc(100% - 48px), 1440px);
        }

        .fs-topbar-grid {
            grid-template-columns:
                minmax(220px, 1fr) minmax(160px, 205px) minmax(130px, 180px) minmax(145px, 205px) 68px;
        }

        .fs-desktop-nav-grid {
            grid-template-columns:
                minmax(220px, 1fr) minmax(130px, 180px) minmax(160px, 205px) minmax(130px, 180px) minmax(200px, 1fr);
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

        .fs-topbar-grid {
            grid-template-columns:
                minmax(190px, 1fr) minmax(150px, 185px) minmax(120px, 160px) minmax(130px, 185px) 62px;
        }

        .fs-desktop-nav-grid {
            grid-template-columns:
                minmax(190px, 1fr) minmax(120px, 160px) minmax(150px, 185px) minmax(120px, 160px) minmax(160px, 1fr);
        }

        .fs-nav-link {
            font-size: 15px;
        }

        .fs-topbar-link {
            padding: 0 14px;
            font-size: 14px;
        }

        .fs-topbar-contact {
            min-width: 112px;
            height: 30px;
            font-size: 14px;
        }

        .fs-topbar-contact-cell {
            padding: 0 12px;
        }

        .fs-topbar-search-button {
            width: 44px;
            height: 30px;
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
        .fs-header {
            --fs-header-height: 74px;
        }

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