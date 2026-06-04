<!DOCTYPE html>
<html lang="en-CA">

<head>
    @php
        $siteName = 'Fluidstream';

        $rawPath = request()->path();
        $currentPath = $rawPath === '/' ? '/' : trim($rawPath, '/');

        $companyEmail = config('services.company.email', 'info@fluidstream.co');
        $companyPhone = config('services.company.phone');
        $companyAddress = config('services.company.address', '4416 5 St NE, Unit 1A, Calgary, AB T2E 7C3, Canada');

        $seoPages = [
            '/' => [
                'title' => 'Multiphase Compression Systems for Production Optimization',
                'description' => 'Fluidstream provides multiphase compression systems for vapor recovery, casing gas compression, emissions reduction, and production recovery.',
                'keywords' => 'Fluidstream, multiphase compression, vapor recovery, casing gas compression, methane emissions reduction, production optimization',
                'type' => 'website',
            ],
            'about-us' => [
                'title' => 'About Fluidstream | Multiphase Compression Specialists Since 2010',
                'description' => 'Learn about Fluidstream, a Calgary-based multiphase compression company supporting vapor recovery, casing gas, and production recovery.',
                'keywords' => 'about Fluidstream, Fluidstream Calgary, multiphase compression company, vapor recovery, casing gas compression, Alberta oilfield technology',
                'type' => 'webpage',
            ],

            'about' => [
                'title' => 'About Fluidstream | Multiphase Compression Specialists Since 2010',
                'description' => 'Learn about Fluidstream, a Calgary-based multiphase compression company supporting vapor recovery, casing gas, and production recovery.',
                'keywords' => 'about Fluidstream, Fluidstream Calgary, multiphase compression company, vapor recovery, casing gas compression, Alberta oilfield technology',
                'type' => 'webpage',
            ],
            'multiphase-compression' => [
                'title' => 'Multiphase Compression for Mixed Gas and Liquid Streams',
                'description' => 'Move gas, liquids, and solids together with MultiphaseCommander systems for lower backpressure and simplified field infrastructure.',
                'keywords' => 'multiphase compression, MultiphaseCommander, mixed phase compression, production recovery, liquid loaded wells',
                'type' => 'product',
                'product_name' => 'MultiphaseCommander™',
                'product_category' => 'Multiphase compression system',
            ],
            'vapor-recovery' => [
                'title' => 'Vapor Recovery Systems for Wet and Variable Gas Streams',
                'description' => 'Fluidstream VaporCommander systems support vapor recovery in wet, unstable, and liquid-prone field conditions while reducing downtime and maintenance exposure.',
                'keywords' => 'vapor recovery, VaporCommander, VRU, vapor recovery unit, wet gas, methane emissions reduction',
                'type' => 'product',
                'product_name' => 'VaporCommander™',
                'product_category' => 'Vapor recovery system',
            ],
            'casing-gas-compression' => [
                'title' => 'Casing Gas Compression for Liquid-Prone Field Conditions',
                'description' => 'CompressionCommander systems support casing gas recovery in wet, unstable, slugging, and liquid-prone field conditions.',
                'keywords' => 'casing gas compression, CompressionCommander, casing gas recovery, wet gas compression, gas recovery',
                'type' => 'product',
                'product_name' => 'CompressionCommander™',
                'product_category' => 'Casing gas compression system',
            ],
            'why-multiphase' => [
                'title' => 'Multiphase Compression Technology',
                'description' => 'Explore Fluidstream multiphase compression technology designed for mixed gas, liquids, solids, upset conditions, autonomous control, and field reliability.',
                'keywords' => 'multiphase compression technology, liquid handling compression, autonomous compression control, field compression technology',
                'type' => 'webpage',
            ],
            'technology' => [
                'title' => 'Fluidstream Multiphase Compression Technology | Liquid-Aware Engineering',
                'description' => 'Learn how Fluidstream technology handles gas, liquids, slugs, sand, changing flow, and harsh oilfield operating conditions.',
                'keywords' => 'Fluidstream technology, multiphase compression technology, liquid-aware compression, vapor recovery technology, casing gas compression technology',
                'type' => 'webpage',
            ],
            'patented-technology' => [
                'title' => 'Patented Multiphase Compression Technology',
                'description' => 'Review Fluidstream patented technology supporting liquid-aware compression behavior, multiphase operation, vapor recovery, and casing gas applications.',
                'keywords' => 'patented compression technology, Fluidstream patents, US11098709B2, multiphase compression patent',
                'type' => 'webpage',
            ],
            'case-studies' => [
                'title' => 'Multiphase Compression Case Studies | Real Field Results',
                'description' => 'Explore Fluidstream case studies showing vapor recovery, casing gas compression, uptime, emissions reduction, and field performance results.',
                'keywords' => 'Fluidstream case studies, multiphase compression case studies, vapor recovery case study, casing gas compression case study, field results',
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
                'title' => 'Compression & Vapor Recovery Insights | Technical Articles',
                'description' => 'Read technical articles on multiphase compression, vapor recovery, casing gas compression, emissions reduction, and production optimization.',
                'keywords' => 'compression insights, vapor recovery insights, multiphase compression articles, casing gas compression articles, oilfield technical articles',
                'type' => 'webpage',
            ],
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
            'insights/how-to-select-right-compression-applications' => [
                'title' => 'How to Select the Right Compression Applications',
                'description' => 'Learn how to select the right compression application for vapor recovery, casing gas compression, wet gas, liquid-loaded wells, and multiphase production.',
                'keywords' => 'compression application selection, vapor recovery selection, casing gas compression selection, multiphase compression application',
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
            'technical-review' => [
                'title' => 'Technical Review Request',
                'description' => 'Request a Fluidstream technical review for multiphase compression, vapor recovery, casing gas compression, and production optimization applications.',
                'keywords' => 'technical review, Fluidstream application review, multiphase compression review, vapor recovery review',
                'type' => 'webpage',
            ],
            'contact/submitted' => [
                'title' => 'Contact Request Received',
                'description' => 'Fluidstream has received your contact request.',
                'keywords' => 'Fluidstream contact confirmation',
                'type' => 'webpage',
                'robots' => 'noindex, follow',
            ],
            'technical-review/submitted' => [
                'title' => 'Technical Review Request Received',
                'description' => 'Fluidstream has received your technical review request.',
                'keywords' => 'Fluidstream technical review confirmation',
                'type' => 'webpage',
                'robots' => 'noindex, follow',
            ],
        ];

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

        if (!empty($seoTitle ?? null)) {
            $seo['title'] = $seoTitle;
        }

        if (!empty($seoDescription ?? null)) {
            $seo['description'] = $seoDescription;
        }

        if (!empty($seoKeywords ?? null)) {
            $seo['keywords'] = $seoKeywords;
        }

        if (!empty($seoType ?? null)) {
            $seo['type'] = $seoType;
        }

        if (!empty($seoRobots ?? null)) {
            $seo['robots'] = $seoRobots;
        }

        if (!empty($seoImage ?? null)) {
            $seo['og_image'] = $seoImage;
        }

        $pageTitle = trim($seo['title']);
        $metaTitle = str_contains($pageTitle, $siteName) ? $pageTitle : $pageTitle . ' | ' . $siteName;
        $metaDescription = trim($seo['description']);
        $metaKeywords = trim($seo['keywords']);
        $robotsMeta = $seo['robots'] ?? 'index, follow';

        $canonicalUrl = $currentPath === '/' ? url('/') : url('/' . $currentPath);
        $seoType = $seo['type'] ?? 'webpage';
        $ogType = $seoType === 'article' ? 'article' : 'website';
        $ogImage = $seo['og_image'] ?? asset('img/og/fluidstream-og.jpg');

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
                    'name' => $isLast ? $pageTitle : ucwords(str_replace(['-', '_'], ' ', $part)),
                    'item' => url($runningPath),
                ];
            }
        }

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbItems,
        ];

        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => url('/') . '#organization',
            'name' => 'Fluidstream',
            'url' => url('/'),
            'logo' => asset('img/logo.png'),
            'foundingDate' => '2010',
            'description' => 'Fluidstream develops multiphase compression technology for oil and gas production, vapor recovery, casing gas compression, and emissions reduction applications.',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '4416 5 St NE, Unit 1A',
                'addressLocality' => 'Calgary',
                'addressRegion' => 'AB',
                'postalCode' => 'T2E 7C3',
                'addressCountry' => 'CA',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'email' => $companyEmail,
                'url' => url('/contact'),
            ],
            'sameAs' => [
                'https://www.linkedin.com/company/fluidstream/',
            ],
        ];

        if (!empty($companyPhone)) {
            $organizationSchema['contactPoint']['telephone'] = $companyPhone;
        }

        $localBusinessSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            '@id' => url('/') . '#localbusiness',
            'name' => 'Fluidstream',
            'url' => url('/'),
            'image' => asset('img/og/fluidstream-og.jpg'),
            'logo' => asset('img/logo.png'),
            'description' => 'Fluidstream is a Calgary-based compression technology company supporting multiphase compression, vapor recovery, casing gas compression, and oilfield production optimization applications.',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '4416 5 St NE, Unit 1A',
                'addressLocality' => 'Calgary',
                'addressRegion' => 'AB',
                'postalCode' => 'T2E 7C3',
                'addressCountry' => 'CA',
            ],
            'areaServed' => [
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Alberta',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Saskatchewan',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'British Columbia',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Canada',
                ],
            ],
            'sameAs' => [
                'https://www.linkedin.com/company/fluidstream/',
            ],
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => url('/') . '#website',
            'name' => 'Fluidstream',
            'url' => url('/'),
            'publisher' => [
                '@id' => url('/') . '#organization',
            ],
        ];

        if ($seoType === 'product') {
            $pageSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                '@id' => $canonicalUrl . '#product',
                'name' => $seo['product_name'] ?? $pageTitle,
                'description' => $metaDescription,
                'url' => $canonicalUrl,
                'image' => $ogImage,
                'category' => $seo['product_category'] ?? 'Industrial compression system',
                'brand' => [
                    '@type' => 'Brand',
                    'name' => 'Fluidstream',
                ],
                'manufacturer' => [
                    '@id' => url('/') . '#organization',
                ],
            ];
        } else {
            $pageSchema = [
                '@context' => 'https://schema.org',
                '@type' => $seoType === 'article' ? 'Article' : 'WebPage',
                '@id' => $canonicalUrl . '#webpage',
                'name' => $pageTitle,
                'headline' => $pageTitle,
                'description' => $metaDescription,
                'url' => $canonicalUrl,
                'image' => $ogImage,
                'publisher' => [
                    '@id' => url('/') . '#organization',
                ],
            ];

            if ($seoType === 'article') {
                $pageSchema['author'] = [
                    '@type' => 'Organization',
                    'name' => 'Fluidstream',
                    '@id' => url('/') . '#organization',
                ];

                $pageSchema['mainEntityOfPage'] = [
                    '@type' => 'WebPage',
                    '@id' => $canonicalUrl,
                ];

                $pageSchema['dateModified'] = now()->toDateString();
            }
        }

        $faqSchema = null;

        if (!empty($seoFaqs ?? null) && is_array($seoFaqs)) {
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

    <script>
        (function () {
            window.dataLayer = window.dataLayer || [];

            window.gtag = window.gtag || function () {
                window.dataLayer.push(arguments);
            };

            var savedConsent = null;

            try {
                savedConsent = localStorage.getItem('fs_cookie_consent');
            } catch (error) {
                savedConsent = null;
            }

            var consentGranted = savedConsent === 'accepted';

            window.gtag('consent', 'default', {
                ad_storage: consentGranted ? 'granted' : 'denied',
                ad_user_data: consentGranted ? 'granted' : 'denied',
                ad_personalization: consentGranted ? 'granted' : 'denied',
                analytics_storage: consentGranted ? 'granted' : 'denied',
                functionality_storage: 'granted',
                security_storage: 'granted',
                wait_for_update: 500
            });
        })();
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5V5VBEPKEW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        window.gtag = window.gtag || function () {
            window.dataLayer.push(arguments);
        };

        window.gtag('js', new Date());
        window.gtag('config', 'G-5V5VBEPKEW');
    </script>
    @if(config('services.gtm.id'))
        <!-- Google Tag Manager -->
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });

                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';

                j.async = true;
                j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '{{ config('services.gtm.id') }}');
        </script>
        <!-- End Google Tag Manager -->
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="{{ $robotsMeta }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.jpeg') }}?v=6">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.jpeg') }}?v=6">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}?v=6">

    @stack('preload')
    @stack('head')

    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css2?family=Manrope:wght@400;500;600;700;800&display=swap&subset=latin"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
    {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    <script type="application/ld+json">
    {!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @if ($faqSchema)
        <script type="application/ld+json">
                             {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                            </script>
    @endif

    @yield('schema')
    @stack('schema')
    @stack('style')

    <style>
        html {
            scroll-behavior: smooth;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            margin: 0;
            font-family: 'Manrope', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #ffffff;
            color: #0f172a;
        }

        img,
        svg,
        video,
        canvas {
            max-width: 100%;
        }

        img {
            height: auto;
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

        @media (max-width: 760px) {
            h1 {
                font-weight: 700 !important;
                font-size: 32px !important;

            }

            .article-shell {
                gap: 0px !important;
            }
        }

        img,
        video,
        canvas,
        svg,
        picture,
        .fs-protected-media,
        .fs-protected-bg {
            max-width: 100%;
            -webkit-user-drag: none !important;
            user-drag: none !important;
            -webkit-user-select: none !important;
            user-select: none !important;
            -webkit-touch-callout: none !important;
        }

        img,
        video {
            pointer-events: auto;
        }

        video::-webkit-media-controls-download-button {
            display: none !important;
        }

        video::-internal-media-controls-download-button {
            display: none !important;
        }

        .fs-cookie-banner {
            position: fixed;
            left: 20px;
            right: 20px;
            bottom: 20px;
            z-index: 99999;
            display: none;
        }

        .fs-cookie-card {
            width: min(760px, 100%);
            margin-left: auto;
            border: 1px solid rgba(217, 230, 255, 0.9);
            border-radius: 3px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.22);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            padding: 22px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 22px;
            align-items: center;
        }

        .fs-cookie-kicker {
            margin: 0 0 8px;
            color: #0018dc;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .fs-cookie-content h3 {
            margin: 0 0 8px;
            color: #102a43;
            font-size: 20px;
            line-height: 1.2;
            font-weight: 900;
        }

        .fs-cookie-content p {
            margin: 0;
            color: #52667a;
            font-size: 14px;
            line-height: 1.65;
        }

        .fs-cookie-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .fs-cookie-btn {
            border: 0;
            border-radius: 999px;
            padding: 12px 18px;
            font-size: 14px;
            font-weight: 900;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .fs-cookie-btn:hover {
            transform: translateY(-1px);
        }

        .fs-cookie-accept {
            background: #0018dc;
            color: #ffffff;
            box-shadow: 0 12px 26px rgba(0, 24, 220, .18);
        }

        .fs-cookie-decline {
            background: #edf3ff;
            color: #0018dc;
        }

        @media (max-width: 720px) {
            .fs-cookie-card {
                grid-template-columns: 1fr;
            }

            .fs-cookie-actions {
                justify-content: flex-start;
            }

            .fs-cookie-btn {
                flex: 1;
            }
        }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased">
    @if(config('services.gtm.id'))
        <!-- Google Tag Manager noscript -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.gtm.id') }}" height="0" width="0"
                style="display:none;visibility:hidden">
            </iframe>
        </noscript>
        <!-- End Google Tag Manager noscript -->
    @endif

    @include('partical.header')

    <div>
        <x-breadcrumb />

        <main>
            @yield('content')
        </main>
    </div>

    @include('partical.footer')

    <div id="fsCookieBanner" class="fs-cookie-banner" aria-live="polite">
        <div class="fs-cookie-card">
            <div class="fs-cookie-content">
                <p class="fs-cookie-kicker">Cookie Preferences</p>

                <h3>We use cookies to improve your experience.</h3>

                <p>
                    Fluidstream uses essential cookies for website functionality and may use analytics or marketing
                    cookies
                    to understand website performance and improve communication. You can accept or decline non-essential
                    cookies.
                </p>
            </div>

            <div class="fs-cookie-actions">
                <button type="button" id="fsAcceptCookies" class="fs-cookie-btn fs-cookie-accept">
                    Accept
                </button>

                <button type="button" id="fsDeclineCookies" class="fs-cookie-btn fs-cookie-decline">
                    Decline
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('img').forEach(function (img) {
                if (!img.hasAttribute('decoding')) {
                    img.setAttribute('decoding', 'async');
                }

                if (!img.hasAttribute('loading')) {
                    const rect = img.getBoundingClientRect();
                    const isAboveFold = rect.top < window.innerHeight + 200;

                    if (!isAboveFold) {
                        img.setAttribute('loading', 'lazy');
                    }
                }
            });

            document.querySelectorAll('iframe').forEach(function (iframe) {
                if (!iframe.hasAttribute('loading')) {
                    iframe.setAttribute('loading', 'lazy');
                }
            });

            document.querySelectorAll('video').forEach(function (video) {
                if (!video.hasAttribute('preload')) {
                    video.setAttribute('preload', 'metadata');
                }

                video.setAttribute('playsinline', '');
            });
        });
    </script>

    <script>
        (function () {
            function shouldSkipMediaProtection(media) {
                if (!media) {
                    return false;
                }

                return Boolean(
                    media.closest('.fs-home-hero') ||
                    media.closest('.fs-no-protect') ||
                    media.closest('[data-no-protect="true"]')
                );
            }

            function protectMediaElements() {
                document.querySelectorAll('img, video, picture, canvas, svg').forEach(function (media) {
                    if (shouldSkipMediaProtection(media)) {
                        media.classList.remove('fs-protected-media');
                        return;
                    }

                    media.setAttribute('draggable', 'false');
                    media.setAttribute('oncontextmenu', 'return false;');
                    media.classList.add('fs-protected-media');
                });

                document.querySelectorAll('video').forEach(function (video) {
                    if (shouldSkipMediaProtection(video)) {
                        return;
                    }

                    video.setAttribute('controlsList', 'nodownload noplaybackrate noremoteplayback');
                    video.setAttribute('disablePictureInPicture', '');
                    video.setAttribute('disableRemotePlayback', '');
                    video.setAttribute('playsinline', '');

                    if (!video.hasAttribute('preload')) {
                        video.setAttribute('preload', 'metadata');
                    }

                    video.oncontextmenu = function () {
                        return false;
                    };
                });
            }

            function autoMarkHeroBackgrounds() {
                document.querySelectorAll('section, div, header, main').forEach(function (element) {
                    const className = String(element.className || '');

                    if (
                        element.closest('.fs-home-hero') ||
                        element.classList.contains('fs-home-hero') ||
                        element.classList.contains('fs-no-protect') ||
                        element.getAttribute('data-no-protect') === 'true'
                    ) {
                        element.classList.remove('fs-protected-bg');
                        return;
                    }

                    const hasHeroClass = className.toLowerCase().includes('hero');

                    if (!hasHeroClass) {
                        return;
                    }

                    const backgroundImage = window.getComputedStyle(element).backgroundImage;

                    if (backgroundImage && backgroundImage !== 'none') {
                        element.classList.add('fs-protected-bg');
                    }
                });
            }

            function isDirectMediaTarget(target) {
                if (!target || shouldSkipMediaProtection(target)) {
                    return false;
                }

                return Boolean(
                    target.closest('img') ||
                    target.closest('video') ||
                    target.closest('picture') ||
                    target.closest('canvas') ||
                    target.closest('svg') ||
                    target.closest('.fs-protected-media')
                );
            }

            function isTextOrInteractiveTarget(target) {
                if (!target) {
                    return false;
                }

                return Boolean(
                    target.closest('a') ||
                    target.closest('button') ||
                    target.closest('input') ||
                    target.closest('textarea') ||
                    target.closest('select') ||
                    target.closest('label') ||
                    target.closest('h1') ||
                    target.closest('h2') ||
                    target.closest('h3') ||
                    target.closest('h4') ||
                    target.closest('h5') ||
                    target.closest('h6') ||
                    target.closest('p') ||
                    target.closest('span') ||
                    target.closest('strong') ||
                    target.closest('small') ||
                    target.closest('li')
                );
            }

            function isProtectedBackgroundTarget(target) {
                if (!target || shouldSkipMediaProtection(target)) {
                    return false;
                }

                const protectedBackground = target.closest('.fs-protected-bg');

                if (!protectedBackground) {
                    return false;
                }

                if (isTextOrInteractiveTarget(target)) {
                    return false;
                }

                return true;
            }

            function isProtectedTarget(target) {
                return isDirectMediaTarget(target) || isProtectedBackgroundTarget(target);
            }

            document.addEventListener('DOMContentLoaded', function () {
                protectMediaElements();
                autoMarkHeroBackgrounds();

                document.addEventListener('contextmenu', function (event) {
                    if (isProtectedTarget(event.target)) {
                        event.preventDefault();
                        return false;
                    }
                }, true);

                document.addEventListener('dragstart', function (event) {
                    if (isProtectedTarget(event.target)) {
                        event.preventDefault();
                        return false;
                    }
                }, true);

                document.addEventListener('selectstart', function (event) {
                    if (isDirectMediaTarget(event.target) || isProtectedBackgroundTarget(event.target)) {
                        event.preventDefault();
                        return false;
                    }
                }, true);

                document.addEventListener('copy', function (event) {
                    if (isDirectMediaTarget(event.target)) {
                        event.preventDefault();
                        return false;
                    }
                }, true);

                document.addEventListener('keydown', function (event) {
                    const key = event.key.toLowerCase();

                    const blocked =
                        event.key === 'F12' ||
                        (event.ctrlKey && event.shiftKey && ['i', 'j', 'c'].includes(key)) ||
                        (event.metaKey && event.altKey && ['i', 'j', 'c'].includes(key)) ||
                        (event.ctrlKey && ['u', 's'].includes(key)) ||
                        (event.metaKey && ['u', 's'].includes(key));

                    if (blocked) {
                        event.preventDefault();
                        return false;
                    }
                }, true);

                const observer = new MutationObserver(function () {
                    protectMediaElements();
                    autoMarkHeroBackgrounds();
                });

                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            });
        })();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-track-cta]').forEach(function (element) {
                element.addEventListener('click', function () {
                    window.dataLayer = window.dataLayer || [];

                    window.dataLayer.push({
                        event: 'cta_click',
                        cta_name: this.getAttribute('data-track-cta'),
                        cta_text: this.innerText.trim(),
                        cta_url: this.href || null,
                        page_path: window.location.pathname
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const banner = document.getElementById('fsCookieBanner');
            const acceptBtn = document.getElementById('fsAcceptCookies');
            const declineBtn = document.getElementById('fsDeclineCookies');

            if (!banner || !acceptBtn || !declineBtn) {
                return;
            }

            let savedConsent = null;

            try {
                savedConsent = localStorage.getItem('fs_cookie_consent');
            } catch (error) {
                savedConsent = null;
            }

            if (!savedConsent) {
                banner.style.display = 'block';
            }

            function updateGoogleConsent(status) {
                const granted = status === 'accepted';

                if (typeof window.gtag === 'function') {
                    window.gtag('consent', 'update', {
                        ad_storage: granted ? 'granted' : 'denied',
                        ad_user_data: granted ? 'granted' : 'denied',
                        ad_personalization: granted ? 'granted' : 'denied',
                        analytics_storage: granted ? 'granted' : 'denied',
                        functionality_storage: 'granted',
                        security_storage: 'granted'
                    });
                }

                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    event: 'cookie_consent_update',
                    consent_status: status
                });
            }

            function saveConsent(status) {
                try {
                    localStorage.setItem('fs_cookie_consent', status);
                } catch (error) {
                    // localStorage may be disabled. Consent update still runs for current page.
                }

                updateGoogleConsent(status);
                banner.style.display = 'none';
            }

            acceptBtn.addEventListener('click', function () {
                saveConsent('accepted');
            });

            declineBtn.addEventListener('click', function () {
                saveConsent('declined');
            });

            window.fsResetCookieConsent = function () {
                try {
                    localStorage.removeItem('fs_cookie_consent');
                } catch (error) {
                    // localStorage may be disabled.
                }

                window.location.reload();
            };
        });
    </script>

    @stack('script')
</body>

</html>