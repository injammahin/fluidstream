<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $siteName = 'Fluidstream';
        $currentPath = request()->path();
        $currentPath = $currentPath === '/' ? '/' : trim($currentPath, '/');

        /*
        |--------------------------------------------------------------------------
        | Automatic Page SEO Map
        |--------------------------------------------------------------------------
        | Add or edit page SEO data here only.
        | No need to add @section('title') or meta sections inside every page.
        */

        $seoPages = [
            '/' => [
                'title' => 'Multiphase Compression Systems for Production Optimization',
                'description' => 'Fluidstream provides multiphase compression systems for vapor recovery, casing gas compression, methane emissions reduction, production recovery, and simplified field infrastructure.',
                'keywords' => 'Fluidstream, multiphase compression, vapor recovery, casing gas compression, methane emissions reduction, production optimization',
                'type' => 'website',
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

            'multiphase-compression-technology' => [
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

            'insights/fluidstream-vapor-recovery-fluidstream-style' => [
                'title' => 'Vapor Recovery, Fluidstream Style',
                'description' => 'A technical perspective on how Fluidstream approaches vapor recovery using a field-ready, multiphase-aware operating philosophy.',
                'keywords' => 'vapor recovery, Fluidstream vapor recovery, wet gas VRU, VaporCommander',
                'type' => 'article',
            ],

            'insights/fluidstream-casing-gas-compression-long-form' => [
                'title' => 'Casing Gas Compression Long Form',
                'description' => 'Why casing gas recovery often needs a more tolerant compression approach when streams are unstable, wet, or difficult for gas-only compressors.',
                'keywords' => 'casing gas compression, casing gas recovery, wet casing gas, CompressionCommander',
                'type' => 'article',
            ],

            'insights/fluidstream-multiphase-vs-conventional-long-form' => [
                'title' => 'Multiphase Compression vs. Conventional Compression',
                'description' => 'A comparison of separation-first conventional compression and multiphase compression designed around real mixed production streams.',
                'keywords' => 'multiphase compression vs conventional compression, separation first compression, mixed stream compression',
                'type' => 'article',
            ],

            'insights/why-conventional-vrus-fail-wet-gas' => [
                'title' => 'Why Conventional VRUs Fail Wet Gas',
                'description' => 'Learn why conventional vapor recovery units struggle with wet gas, liquid carryover, unstable flow, and real field vapor conditions.',
                'keywords' => 'why conventional VRUs fail, wet gas VRU, liquid carryover, vapor recovery unit failure',
                'type' => 'article',
            ],

            'insights/production-optimization-multiphase-compression' => [
                'title' => 'Production Optimization with Multiphase Compression',
                'description' => 'How operators can use multiphase compression to improve production recovery, reduce backpressure, and lower site complexity.',
                'keywords' => 'production optimization, multiphase compression, production recovery, backpressure reduction',
                'type' => 'article',
            ],

            'insights/multiphase-compression-liquid-loaded-gas-wells' => [
                'title' => 'Multiphase Compression for Liquid-Loaded Gas Wells',
                'description' => 'A field-focused discussion on liquid-loaded gas wells and why multiphase compression can help restore production without added separation complexity.',
                'keywords' => 'liquid loaded gas wells, multiphase compression, gas well recovery, production restoration',
                'type' => 'article',
            ],

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
        | Fallback Auto Generator
        |--------------------------------------------------------------------------
        | If a page is not listed above, this will create a usable SEO title,
        | description, and keywords from the URL automatically.
        */

        $fallbackTitle = $currentPath === '/'
            ? 'Multiphase Compression Technology'
            : collect(explode('/', $currentPath))
                ->map(fn ($part) => ucwords(str_replace(['-', '_'], ' ', $part)))
                ->implode(' - ');

        $defaultSeo = [
            'title' => $fallbackTitle,
            'description' => 'Fluidstream provides multiphase compression, vapor recovery, and casing gas compression systems for production optimization, emissions reduction, and reliable field operation.',
            'keywords' => 'Fluidstream, multiphase compression, vapor recovery, casing gas compression, methane emissions reduction, production optimization',
            'type' => str_starts_with($currentPath, 'insights/') || str_starts_with($currentPath, 'case-studies/') ? 'article' : 'webpage',
            'robots' => 'index, follow',
        ];

        $seo = array_merge($defaultSeo, $seoPages[$currentPath] ?? []);

        $pageTitle = $seo['title'];
        $metaTitle = str_contains($pageTitle, $siteName) ? $pageTitle : $pageTitle . ' | ' . $siteName;
        $metaDescription = $seo['description'];
        $metaKeywords = $seo['keywords'];
        $robotsMeta = $seo['robots'] ?? 'index, follow';

        $canonicalUrl = $currentPath === '/'
            ? url('/')
            : url('/' . $currentPath);

        $ogType = $seo['type'] === 'article' ? 'article' : 'website';

        $ogImage = $seo['og_image'] ?? asset('img/og/fluidstream-og.jpg');

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
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Basic SEO --}}
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="{{ $robotsMeta }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- Open Graph --}}
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
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Global Schema --}}
    <script type="application/ld+json">
        {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Auto Page Schema --}}
    <script type="application/ld+json">
        {!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Optional extra schema if you still want to add page-specific schema later --}}
    @yield('schema')

    {{-- Extra page-specific head code --}}
    @stack('head')

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
    </style>
</head>

<body class="bg-white text-slate-900 antialiased">
    @include('partical.header')

    <div class="pt-[96px]">
        <x-breadcrumb />

        <main>
            @yield('content')
        </main>
    </div>

    @include('partical.footer')
</body>

</html>