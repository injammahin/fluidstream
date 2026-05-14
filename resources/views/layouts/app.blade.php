<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $siteName = 'Fluidstream';

        $rawPath = request()->path();
        $currentPath = $rawPath === '/' ? '/' : trim($rawPath, '/');

        /*
        |--------------------------------------------------------------------------
        | Automatic Page SEO Map
        |--------------------------------------------------------------------------
        | Add or update page SEO here.
        | Every listed page automatically gets:
        | title, description, keywords, canonical, Open Graph, Twitter Card,
        | WebPage or Article schema, and breadcrumb schema.
        */

        $seoPages = [
            '/' => [
                'title' => 'Multiphase Compression Systems for Production Optimization',
                'description' => 'Fluidstream provides multiphase compression systems for vapor recovery, casing gas compression, methane emissions reduction, production recovery, and simplified field infrastructure.',
                'keywords' => 'Fluidstream, multiphase compression, vapor recovery, casing gas compression, methane emissions reduction, production optimization',
                'type' => 'website',
            ],

            'about-us' => [
                'title' => 'About Fluidstream',
                'description' => 'Learn how Fluidstream helps upstream producers reduce emissions, improve production economics, and simplify field infrastructure with multiphase compression technology.',
                'keywords' => 'about Fluidstream, Fluidstream Calgary, multiphase compression company, emissions reduction, production optimization',
                'type' => 'webpage',
            ],

            'about' => [
                'title' => 'About Fluidstream',
                'description' => 'Learn how Fluidstream helps upstream producers reduce emissions, improve production economics, and simplify field infrastructure with multiphase compression technology.',
                'keywords' => 'about Fluidstream, Fluidstream Calgary, multiphase compression company, emissions reduction, production optimization',
                'type' => 'webpage',
            ],

            'multiphase-compression' => [
                'title' => 'Multiphase Compression for Mixed Gas and Liquid Streams',
                'description' => 'Fluidstream MultiphaseCommander systems help move gas, liquids, and solids together to improve production, reduce backpressure, and simplify surface infrastructure.',
                'keywords' => 'multiphase compression, MultiphaseCommander, mixed phase compression, production recovery, liquid loaded wells',
                'type' => 'product',
            ],

            'vapor-recovery' => [
                'title' => 'Vapor Recovery Systems for Wet and Variable Gas Streams',
                'description' => 'Fluidstream VaporCommander systems support vapor recovery in wet, unstable, and liquid-prone field conditions while reducing downtime and maintenance exposure.',
                'keywords' => 'vapor recovery, VaporCommander, VRU, vapor recovery unit, wet gas, methane emissions reduction',
                'type' => 'product',
            ],

            'casing-gas-compression' => [
                'title' => 'Casing Gas Compression for Liquid-Prone Field Conditions',
                'description' => 'Fluidstream CompressionCommander systems support casing gas recovery where streams may be wet, unstable, slugging, or difficult for conventional gas-only compressors.',
                'keywords' => 'casing gas compression, CompressionCommander, casing gas recovery, wet gas compression, gas recovery',
                'type' => 'product',
            ],

            'why-multiphase' => [
                'title' => 'Multiphase Compression Technology',
                'description' => 'Explore Fluidstream multiphase compression technology designed for mixed gas, liquids, solids, upset conditions, autonomous control, and field reliability.',
                'keywords' => 'multiphase compression technology, liquid handling compression, autonomous compression control, field compression technology',
                'type' => 'webpage',
            ],

            'technology' => [
                'title' => 'Fluidstream Technology Overview',
                'description' => 'Learn how Fluidstream technology handles gas, liquids, slugs, sand, changing flow, and harsh field conditions through multiphase-aware compression design.',
                'keywords' => 'Fluidstream technology, multiphase technology, vapor recovery technology, casing gas compression technology',
                'type' => 'webpage',
            ],

            'patented-technology' => [
                'title' => 'Patented Multiphase Compression Technology',
                'description' => 'Review Fluidstream patented technology supporting liquid-aware compression behavior, multiphase operation, vapor recovery, and casing gas applications.',
                'keywords' => 'patented compression technology, Fluidstream patents, US11098709B2, multiphase compression patent',
                'type' => 'webpage',
            ],

            'case-studies' => [
                'title' => 'Fluidstream Case Studies',
                'description' => 'Explore Fluidstream case studies showing vapor recovery, multiphase compression, casing gas recovery, uptime, emissions reduction, and field performance results.',
                'keywords' => 'Fluidstream case studies, vapor recovery case study, multiphase compression case study, casing gas case study',
                'type' => 'webpage',
            ],

            'case-studies/multiphasecommander-production-recovery' => [
                'title' => 'MultiphaseCommander Production Recovery Case Study',
                'description' => 'A Fluidstream case study showing how MultiphaseCommander helped restore production from liquid-loaded wells without added separation infrastructure.',
                'keywords' => 'MultiphaseCommander case study, production recovery, liquid loaded wells, multiphase compression field result',
                'type' => 'article',
            ],

            'case-studies/vaporcommander-4-5-year-reliability' => [
                'title' => 'VaporCommander 4.5-Year Reliability Case Study',
                'description' => 'A Fluidstream case study demonstrating VaporCommander reliability, vapor recovery performance, and long-term field operation.',
                'keywords' => 'VaporCommander reliability, vapor recovery reliability, VRU case study, Fluidstream case study',
                'type' => 'article',
            ],

            'case-studies/vaporcommander-vcu-replacement' => [
                'title' => 'VaporCommander VCU Replacement Case Study',
                'description' => 'A Fluidstream case study showing how VaporCommander can replace or reduce dependence on vapor combustion and improve vapor recovery outcomes.',
                'keywords' => 'VaporCommander VCU replacement, vapor recovery, emissions reduction, VRU case study',
                'type' => 'article',
            ],

            'case-studies/allied-energy-vaporcommander-vru' => [
                'title' => 'Allied Energy VaporCommander VRU Case Study',
                'description' => 'A case study showing VaporCommander VRU performance for Allied Energy with uptime, emissions reduction, and field reliability.',
                'keywords' => 'Allied Energy VaporCommander, VRU case study, vapor recovery, methane emissions reduction',
                'type' => 'article',
            ],

            'case-studies/whitecap-vaporcommander-vru' => [
                'title' => 'Whitecap VaporCommander VRU Case Study',
                'description' => 'A case study showing VaporCommander vapor recovery performance in Saskatchewan winter conditions with minimal maintenance and no reported downtime.',
                'keywords' => 'Whitecap VaporCommander, VRU Saskatchewan, cold weather vapor recovery, VaporCommander case study',
                'type' => 'article',
            ],

            'insights' => [
                'title' => 'Fluidstream Insights',
                'description' => 'Read Fluidstream insights on multiphase compression, vapor recovery, casing gas compression, emissions reduction, and production optimization.',
                'keywords' => 'Fluidstream insights, multiphase compression insights, vapor recovery insights, production optimization',
                'type' => 'webpage',
            ],

            /*
            |--------------------------------------------------------------------------
            | Insights Articles, Current URLs
            |--------------------------------------------------------------------------
            */

            'insights/fluidstream-vapor-recovery-fluidstream-style' => [
                'title' => 'Vapor Recovery Units for Oil & Gas',
                'description' => 'Learn how Fluidstream vapor recovery units improve wet-gas reliability, reduce emissions, and support field-ready VRU performance.',
                'keywords' => 'vapor recovery unit, VRU oil gas, wet gas vapor recovery, VaporCommander',
                'type' => 'article',
            ],

            'insights/fluidstream-casing-gas-compression-long-form' => [
                'title' => 'Casing Gas Compression for Well Optimization',
                'description' => 'See how casing gas compression reduces backpressure, supports oil uplift, and improves well performance in wet or unstable field conditions.',
                'keywords' => 'casing gas compression, casing gas compressor, casing gas recovery, well optimization',
                'type' => 'article',
            ],

            'insights/fluidstream-multiphase-vs-conventional-long-form' => [
                'title' => 'Multiphase Compression vs Conventional Compression',
                'description' => 'Compare multiphase compression with conventional compression and learn why mixed-stream handling matters in real oil and gas field conditions.',
                'keywords' => 'multiphase compression vs conventional compression, mixed stream compression, separation first compression',
                'type' => 'article',
            ],

            'insights/why-conventional-vrus-fail-wet-gas' => [
                'title' => 'Why Conventional VRUs Fail in Wet Gas Applications',
                'description' => 'Learn why conventional VRUs struggle with wet gas, liquid carryover, unstable flow, and real vapor recovery field conditions.',
                'keywords' => 'conventional VRU failure wet gas, wet gas vapor recovery, VRU failure, vapor recovery unit failure',
                'type' => 'article',
            ],

            'insights/production-optimization-multiphase-compression' => [
                'title' => 'Production Optimization with Multiphase Compression',
                'description' => 'Learn how multiphase compression can reduce backpressure, restore production, and simplify field infrastructure for production optimization.',
                'keywords' => 'production optimization, multiphase compression, production recovery, backpressure reduction',
                'type' => 'article',
            ],

            'insights/multiphase-compression-liquid-loaded-gas-wells' => [
                'title' => 'Multiphase Compression for Liquid-Loaded Gas Wells',
                'description' => 'See how multiphase compression supports liquid-loaded gas wells, production recovery, and field performance without added separation complexity.',
                'keywords' => 'multiphase compression liquid loaded gas wells, liquid loaded gas well recovery, gas well recovery',
                'type' => 'article',
            ],

            'insights/fluidstream-vru-vs-flaring-complete' => [
                'title' => 'Vapor Recovery Unit vs Flaring',
                'description' => 'Compare vapor recovery units and flaring to understand emissions reduction, gas capture value, and VRU economics in oil and gas operations.',
                'keywords' => 'vapor recovery unit vs flaring, VRU vs flare, vapor recovery economics, gas capture',
                'type' => 'article',
            ],

            'insights/fluidstream-methane-reduction-story-white-sections' => [
                'title' => 'Methane Emissions Reduction Solutions for Oil & Gas',
                'description' => 'Explore methane emissions reduction solutions for oil and gas using vapor recovery, gas capture, and field-ready compression technology.',
                'keywords' => 'methane emissions reduction oil gas, methane reduction vapor recovery, gas capture, emissions reduction',
                'type' => 'article',
            ],

            'insights/how-to-select-right-compression-applications-final-fixed' => [
                'title' => 'How to Select a Vapor Recovery Unit for Wet Gas',
                'description' => 'Learn how to select a vapor recovery unit for wet gas applications by evaluating liquids, turndown, reliability, and lifecycle economics.',
                'keywords' => 'how to select vapor recovery unit, VRU selection wet gas, wet gas VRU, vapor recovery selection',
                'type' => 'article',
            ],

            'insights/when-is-casing-gas-compressioncommander' => [
                'title' => 'When Is Casing Gas Compression Economically Viable?',
                'description' => 'Review casing gas compression economics, ROI drivers, screening criteria, and when compression can improve oil production value.',
                'keywords' => 'casing gas compression economics, casing gas compression ROI, casing gas compressor economics',
                'type' => 'article',
            ],

            'insights/why-conventional-compression-fails-wet-unstable-wells' => [
                'title' => 'Why Conventional Casing Gas Compressors Fail in Wet Wells',
                'description' => 'Learn why conventional casing gas compressors fail in wet or unstable wells and how liquid-prone conditions affect reliability.',
                'keywords' => 'casing gas compressor failure wet gas, conventional compression wet wells, unstable wells compression',
                'type' => 'article',
            ],

            'insights/how-casing-gas-compression-increases-oil-production' => [
                'title' => 'How Casing Gas Compression Increases Oil Production',
                'description' => 'See how casing gas compression can lower casing pressure, improve drawdown, support oil uplift, and improve well performance.',
                'keywords' => 'casing gas compression oil production, casing pressure oil uplift, casing gas compression increase oil production',
                'type' => 'article',
            ],

            'insights/how-multiphase-compression-supports-production-recovery' => [
                'title' => 'How Multiphase Compression Supports Production Recovery',
                'description' => 'Learn how multiphase compression supports loaded gas wells, production recovery, flow stability, and mixed-stream field performance.',
                'keywords' => 'multiphase compression loaded gas wells, liquid loaded gas well recovery, production recovery compression',
                'type' => 'article',
            ],

            /*
            |--------------------------------------------------------------------------
            | Recommended Clean Future Slugs
            |--------------------------------------------------------------------------
            | Keep these here so SEO is already correct if you create these cleaner URLs.
            */

            'insights/vapor-recovery-units-oil-gas' => [
                'title' => 'Vapor Recovery Units for Oil & Gas',
                'description' => 'Learn how Fluidstream vapor recovery units improve wet-gas reliability, reduce emissions, and support field-ready VRU performance.',
                'keywords' => 'vapor recovery unit, VRU oil gas, wet gas vapor recovery, VaporCommander',
                'type' => 'article',
            ],

            'insights/casing-gas-compression-well-optimization' => [
                'title' => 'Casing Gas Compression for Well Optimization',
                'description' => 'See how casing gas compression reduces backpressure, supports oil uplift, and improves well performance in wet or unstable field conditions.',
                'keywords' => 'casing gas compression, casing gas compressor, casing gas recovery, well optimization',
                'type' => 'article',
            ],

            'insights/multiphase-vs-conventional-compression' => [
                'title' => 'Multiphase Compression vs Conventional Compression',
                'description' => 'Compare multiphase compression with conventional compression and learn why mixed-stream handling matters in real oil and gas field conditions.',
                'keywords' => 'multiphase compression vs conventional compression, mixed stream compression, separation first compression',
                'type' => 'article',
            ],

            'insights/vapor-recovery-vs-flaring' => [
                'title' => 'Vapor Recovery Unit vs Flaring',
                'description' => 'Compare vapor recovery units and flaring to understand emissions reduction, gas capture value, and VRU economics in oil and gas operations.',
                'keywords' => 'vapor recovery unit vs flaring, VRU vs flare, vapor recovery economics, gas capture',
                'type' => 'article',
            ],

            'insights/methane-emissions-reduction-oil-gas' => [
                'title' => 'Methane Emissions Reduction Solutions for Oil & Gas',
                'description' => 'Explore methane emissions reduction solutions for oil and gas using vapor recovery, gas capture, and field-ready compression technology.',
                'keywords' => 'methane emissions reduction oil gas, methane reduction vapor recovery, gas capture, emissions reduction',
                'type' => 'article',
            ],

            'insights/how-to-select-vapor-recovery-unit-wet-gas' => [
                'title' => 'How to Select a Vapor Recovery Unit for Wet Gas',
                'description' => 'Learn how to select a vapor recovery unit for wet gas applications by evaluating liquids, turndown, reliability, and lifecycle economics.',
                'keywords' => 'how to select vapor recovery unit, VRU selection wet gas, wet gas VRU, vapor recovery selection',
                'type' => 'article',
            ],

            'insights/casing-gas-compression-economics' => [
                'title' => 'When Is Casing Gas Compression Economically Viable?',
                'description' => 'Review casing gas compression economics, ROI drivers, screening criteria, and when compression can improve oil production value.',
                'keywords' => 'casing gas compression economics, casing gas compression ROI, casing gas compressor economics',
                'type' => 'article',
            ],

            /*
            |--------------------------------------------------------------------------
            | Extra Insight Stub Pages
            |--------------------------------------------------------------------------
            */

            // 'insights/rethinking-production-systems' => [
            //     'title' => 'Rethinking Production Systems',
            //     'description' => 'Explore how simplified production systems can reduce complexity, improve recovery, and support emissions reduction in oil and gas operations.',
            //     'keywords' => 'production systems, simplified infrastructure, oil and gas production optimization, emissions reduction',
            //     'type' => 'article',
            // ],

            // 'insights/lower-cost-broader-deployment' => [
            //     'title' => 'Lower-Cost Broader Deployment',
            //     'description' => 'Learn how lower-complexity compression infrastructure can improve the commercial fit of emissions reduction and production recovery projects.',
            //     'keywords' => 'lower cost compression deployment, production recovery economics, emissions reduction economics',
            //     'type' => 'article',
            // ],

            // 'insights/emissions-reduction' => [
            //     'title' => 'Emissions Reduction with Multiphase Compression',
            //     'description' => 'Learn how multiphase compression can support methane emissions reduction, vapor recovery, and better field gas capture outcomes.',
            //     'keywords' => 'emissions reduction, methane emissions reduction, vapor recovery, multiphase compression',
            //     'type' => 'article',
            // ],

            'perspectives' => [
                'title' => 'Fluidstream Perspectives',
                'description' => 'Explore Fluidstream perspectives on field compression, vapor recovery, emissions reduction, production optimization, and lower-complexity infrastructure.',
                'keywords' => 'Fluidstream perspectives, compression perspective, vapor recovery perspective, emissions reduction',
                'type' => 'webpage',
            ],

            'contact' => [
                'title' => 'Contact Fluidstream',
                'description' => 'Contact Fluidstream to discuss multiphase compression, vapor recovery, casing gas compression, application review, and technical fit analysis.',
                'keywords' => 'contact Fluidstream, request technical review, multiphase compression review, vapor recovery review',
                'type' => 'webpage',
            ],

            'privacy-policy' => [
                'title' => 'Privacy Policy',
                'description' => 'Read the Fluidstream privacy policy and learn how information is handled on the Fluidstream website.',
                'keywords' => 'Fluidstream privacy policy',
                'type' => 'webpage',
                'robots' => 'index, follow',
            ],

            'terms' => [
                'title' => 'Terms of Use',
                'description' => 'Read the Fluidstream website terms of use.',
                'keywords' => 'Fluidstream terms of use',
                'type' => 'webpage',
                'robots' => 'index, follow',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Fallback SEO Generator
        |--------------------------------------------------------------------------
        | If a page is not listed above, it still gets usable SEO.
        */

        $fallbackTitle = $currentPath === '/'
            ? 'Multiphase Compression Technology'
            : collect(explode('/', $currentPath))
                ->filter()
                ->map(fn($part) => ucwords(str_replace(['-', '_'], ' ', $part)))
                ->implode(' - ');

        $defaultSeo = [
            'title' => $fallbackTitle,
            'description' => 'Fluidstream provides multiphase compression, vapor recovery, and casing gas compression systems for production optimization, emissions reduction, and reliable field operation.',
            'keywords' => 'Fluidstream, multiphase compression, vapor recovery, casing gas compression, methane emissions reduction, production optimization',
            'type' => str_starts_with($currentPath, 'insights/') || str_starts_with($currentPath, 'case-studies/') ? 'article' : 'webpage',
            'robots' => 'index, follow',
        ];

        $seo = array_merge($defaultSeo, $seoPages[$currentPath] ?? []);

        /*
        |--------------------------------------------------------------------------
        | Optional Per-Page Overrides
        |--------------------------------------------------------------------------
        | If a controller passes $seoTitle, $seoDescription, $seoKeywords, or $seoImage,
        | those values override this map.
        */

        if (isset($seoTitle) && $seoTitle) {
            $seo['title'] = $seoTitle;
        }

        if (isset($seoDescription) && $seoDescription) {
            $seo['description'] = $seoDescription;
        }

        if (isset($seoKeywords) && $seoKeywords) {
            $seo['keywords'] = $seoKeywords;
        }

        if (isset($seoType) && $seoType) {
            $seo['type'] = $seoType;
        }

        if (isset($seoRobots) && $seoRobots) {
            $seo['robots'] = $seoRobots;
        }

        if (isset($seoImage) && $seoImage) {
            $seo['og_image'] = $seoImage;
        }

        $pageTitle = trim($seo['title']);
        $metaTitle = str_contains($pageTitle, $siteName) ? $pageTitle : $pageTitle . ' | ' . $siteName;
        $metaDescription = trim($seo['description']);
        $metaKeywords = trim($seo['keywords']);
        $robotsMeta = $seo['robots'] ?? 'index, follow';

        $canonicalUrl = $currentPath === '/'
            ? url('/')
            : url('/' . $currentPath);

        $ogType = ($seo['type'] ?? 'webpage') === 'article' ? 'article' : 'website';
        $ogImage = $seo['og_image'] ?? asset('img/og/fluidstream-og.jpg');

        /*
        |--------------------------------------------------------------------------
        | Breadcrumb Schema
        |--------------------------------------------------------------------------
        */

        $breadcrumbItems = [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => url('/'),
            ],
        ];

        if ($currentPath !== '/') {
            $pathParts = collect(explode('/', $currentPath))->filter()->values();
            $runningPath = '';

            foreach ($pathParts as $index => $part) {
                $runningPath .= '/' . $part;
                $isLast = $index === $pathParts->count() - 1;

                $breadcrumbItems[] = [
                    '@type' => 'ListItem',
                    'position' => $index + 2,
                    'name' => $isLast
                        ? $pageTitle
                        : ucwords(str_replace(['-', '_'], ' ', $part)),
                    'item' => url($runningPath),
                ];
            }
        }

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbItems,
        ];

        /*
        |--------------------------------------------------------------------------
        | Global Schema
        |--------------------------------------------------------------------------
        */

        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Fluidstream',
            'url' => url('/'),
            'logo' => asset('img/logo.png'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '4416 5 St NE, Unit 1A',
                'addressLocality' => 'Calgary',
                'addressRegion' => 'AB',
                'postalCode' => 'T2E 7C3',
                'addressCountry' => 'CA',
            ],
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Fluidstream',
            'url' => url('/'),
        ];

        /*
        |--------------------------------------------------------------------------
        | Auto Page Schema
        |--------------------------------------------------------------------------
        */

        $pageSchema = [
            '@context' => 'https://schema.org',
            '@type' => $ogType === 'article' ? 'Article' : 'WebPage',
            'name' => $pageTitle,
            'headline' => $pageTitle,
            'description' => $metaDescription,
            'url' => $canonicalUrl,
            'image' => $ogImage,
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Fluidstream',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('img/logo.png'),
                ],
            ],
        ];

        if ($ogType === 'article') {
            $pageSchema['author'] = [
                '@type' => 'Organization',
                'name' => 'Fluidstream',
            ];

            $pageSchema['mainEntityOfPage'] = [
                '@type' => 'WebPage',
                '@id' => $canonicalUrl,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Optional FAQ Schema
        |--------------------------------------------------------------------------
        | To use this from a page, pass $seoFaqs from controller or define it before rendering.
        | Format:
        | $seoFaqs = [
        |   ['question' => 'Question?', 'answer' => 'Answer text.'],
        | ];
        */

        $faqSchema = null;

        if (isset($seoFaqs) && is_array($seoFaqs) && count($seoFaqs)) {
            $faqSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => collect($seoFaqs)->map(function ($faq) {
                    return [
                        '@type' => 'Question',
                        'name' => $faq['question'] ?? '',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer'] ?? '',
                        ],
                    ];
                })->values()->toArray(),
            ];
        }
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Basic SEO --}}
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="{{ $robotsMeta }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}?v=5">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}?v=5">{{-- Open Graph --}}
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    {{-- Favicon --}}
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Organization Schema --}}
    <script type="application/ld+json">
        {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Website Schema --}}
    <script type="application/ld+json">
        {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Breadcrumb Schema --}}
    <script type="application/ld+json">
        {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Auto Page or Article Schema --}}
    <script type="application/ld+json">
        {!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Optional FAQ Schema --}}
    @if ($faqSchema)
        <script type="application/ld+json">
                                                                                                    {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                                                                                                </script>
    @endif

    {{-- Extra page-specific schema if needed --}}
    @yield('schema')

    {{-- Extra page-specific head code --}}
    @stack('head')

    {{-- Important: page-specific styles from @push('style') --}}
    @stack('style')

    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #0018dc;
        }

        h1 {
            font-weight: 700 !important;
            font-size: 54px !important;
        }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased">
    @include('partical.header')

    <div>
        <x-breadcrumb />

        <main>
            @yield('content')
        </main>
    </div>

    @include('partical.footer')
    @stack('script')

</body>

</html>