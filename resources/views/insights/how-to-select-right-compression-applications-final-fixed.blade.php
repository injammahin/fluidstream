@extends('layouts.app')
@section('schema')
    @php
        $articleUrl = url('/insights/how-to-select-vapor-recovery-unit-wet-gas');

        $techArticleSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'TechArticle',
            'headline' => 'How to Select the Right Vapor Recovery Unit for Wet Gas Applications',
            'alternativeHeadline' => 'Engineering Guide for Selecting Vapor Recovery Equipment in Wet Gas Service',
            'description' => 'A practical engineering guide for selecting vapor recovery units in wet gas applications, including liquid tolerance, freeze risk, pressure instability, lifecycle reliability, VaporCommander fit, patents, and field proof.',
            'url' => $articleUrl,
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $articleUrl,
            ],
            'datePublished' => '2026-05-15',
            'dateModified' => now()->toDateString(),
            'inLanguage' => 'en',
            'author' => [
                '@type' => 'Organization',
                'name' => 'Fluidstream',
                'url' => config('app.url'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Fluidstream',
                'url' => config('app.url'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('img/logo.png'),
                ],
            ],
            'image' => asset('img/logo.png'),
            'articleSection' => 'Vapor Recovery',
            'keywords' => [
                'vapor recovery unit selection',
                'wet gas vapor recovery',
                'VRU selection',
                'VaporCommander',
                'liquid carryover',
                'freeze risk',
                'vapor recovery reliability',
                'wet gas VRU',
                'low-pressure gas capture',
            ],
            'about' => [
                [
                    '@type' => 'Thing',
                    'name' => 'Vapor recovery unit selection',
                ],
                [
                    '@type' => 'Thing',
                    'name' => 'Wet gas vapor recovery',
                ],
                [
                    '@type' => 'Thing',
                    'name' => 'Liquid carryover',
                ],
                [
                    '@type' => 'Thing',
                    'name' => 'VaporCommander',
                ],
            ],
        ];

        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Why do vapor recovery units fail in wet gas applications?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Many conventional VRUs assume dry-gas service and can struggle when exposed to condensate, slugging liquids, pressure swings, or freeze-prone separator systems.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What is the most important factor when selecting a VRU?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'The most important factor is whether the system can reliably operate in the actual field conditions of the application, including wet gas, liquid carryover, variable vapor rates, and seasonal operating conditions.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'When is VaporCommander™ a strong fit?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'VaporCommander™ is strongest in vapor recovery applications where wet gas, unstable vapor conditions, or separator-dependent reliability issues make conventional systems difficult to operate.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What should operators review before selecting a VRU?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Operators should review vapor rate, liquid behavior, suction and discharge pressure, vapor composition, winter exposure, maintenance history, gas-use options, and total installed system complexity.',
                    ],
                ],
            ],
        ];

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Insights',
                    'item' => url('/insights'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'How to Select the Right Vapor Recovery Unit for Wet Gas Applications',
                    'item' => $articleUrl,
                ],
            ],
        ];
    @endphp

    <script type="application/ld+json">
            {!! json_encode($techArticleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>

    <script type="application/ld+json">
            {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>

    <script type="application/ld+json">
            {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
@endsection
@section('content')
    <style>
        :root {
            --blue: #0018dc;
            --cyan: #15d1ff;
            --ink: #061126;
            --ink-2: #07123a;
            --text: #202838;
            --muted: #637086;
            --line: #dce3ee;
            --soft: #f5f7fb;
            --soft-2: #eef3f8;
            --white: #ffffff;
            --max: 1180px;
            --article: 850px;
            --radius: 26px;
            --shadow: 0 22px 55px rgba(6, 17, 38, .10);
            --shadow-strong: 0 30px 90px rgba(6, 17, 38, .22);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: var(--white);
            line-height: 1.68;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        p {
            margin: 0 0 1.18rem;
        }

        ul {
            margin: 0 0 1.35rem 1.25rem;
            padding: 0;
        }

        li {
            margin: .38rem 0;
        }

        strong {
            color: var(--ink);
        }

        .wrap {
            width: min(var(--max), calc(100% - 40px));
            margin: 0 auto;
        }

        .eyebrow {
            color: var(--blue);
            font-size: .78rem;
            letter-spacing: .17em;
            text-transform: uppercase;
            font-weight: 900;
            margin-bottom: .9rem;
        }

        .dark .eyebrow,
        .hero .eyebrow,
        .cta-band .eyebrow {
            color: var(--cyan);
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: .65rem;
            color: var(--blue);
            font-size: .76rem;
            letter-spacing: .16em;
            text-transform: uppercase;
            font-weight: 900;
            /* margin-bottom: 1rem; */
        }

        /* 
                                                                                                                                                                                                                                                                                                                                                            .section-label:before {
                                                                                                                                                                                                                                                                                                                                                                content: "";
                                                                                                                                                                                                                                                                                                                                                                width: 38px;
                                                                                                                                                                                                                                                                                                                                                                height: 2px;
                                                                                                                                                                                                                                                                                                                                                                background: var(--cyan);
                                                                                                                                                                                                                                                                                                                                                                display: inline-block;
                                                                                                                                                                                                                                                                                                                                                            } */

        /* Header matches the clean Fluidstream homepage feel */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(220, 227, 238, .9);
        }

        .nav {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .brand {
            font-weight: 900;
            font-size: 1.56rem;
            letter-spacing: -.055em;
            color: var(--blue);
            line-height: 1;
        }

        .brand span {
            color: var(--cyan);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.55rem;
            font-size: .95rem;
            color: #48556b;
        }

        .nav-links a:hover {
            color: var(--blue);
        }

        .nav-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: .82rem 1.15rem;
            background: var(--blue);
            color: #fff !important;
            font-weight: 800;
            box-shadow: 0 15px 32px rgba(0, 24, 220, .20);
        }

        /* Hero */
        .hero {
            /* color: #fff; */
            /* background: #0018dc; */
            /* padding: 96px 0 90px; */
            overflow: hidden;
            position: relative;
        }

        .hero:before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, .055) 1px, transparent 1px),
                linear-gradient(0deg, rgba(255, 255, 255, .045) 1px, transparent 1px);
            background-size: 74px 74px;
            mask-image: linear-gradient(to bottom, rgba(0, 0, 0, .8), transparent 85%);
            pointer-events: none;
        }

        .hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.18fr .82fr;
            gap: 58px;
            align-items: center;
        }

        h1 {
            font-size: clamp(26px, 5vw, 50px);
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
            max-width: 920px;
        }


        .hero-lede {
            font-size: clamp(14px, 16px, 18px);
            color: #303b50;
            max-width: 760px;
        }

        .hero-actions,
        .cta-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: .95rem 1.28rem;
            font-weight: 900;
            border: 1px solid transparent;
            transition: transform .22s ease, box-shadow .22s ease, background .22s ease, color .22s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #fff;
            color: var(--blue);
            box-shadow: 0 4px 9px rgb(0 0 0 / 15%) !important;
        }

        .btn-outline {
            /* color: #fff; */
            border-color: #060f2096;
            background: rgba(255, 255, 255, .08);
        }

        .btn-blue {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 18px 38px rgba(0, 24, 220, .20);
        }

        .btn-outline-dark {
            color: var(--blue);
            border-color: rgba(0, 24, 220, .25);
            background: #fff;
        }

        .hero-card-stack {
            display: grid;
            gap: 18px;
        }

        .quote-card {
            border: 1px solid rgb(37 37 37 / 20%);
            background: #fff;
            backdrop-filter: blur(16px);
            border-radius: 7px;
            padding: 26px;
            /* box-shadow: 0 24px 70px rgba(0, 0, 0, .22); */
            position: relative;
            overflow: hidden;
        }


        /* .quote-card:before {
                                                                                                                                                                                                                                                                                                                                                                                                content: "";
                                                                                                                                                                                                                                                                                                                                                                                                position: absolute;
                                                                                                                                                                                                                                                                                                                                                                                                top: 0;
                                                                                                                                                                                                                                                                                                                                                                                                left: 0;
                                                                                                                                                                                                                                                                                                                                                                                                right: 0;
                                                                                                                                                                                                                                                                                                                                                                                                height: 4px;
                                                                                                                                                                                                                                                                                                                                                                                                background: linear-gradient(90deg, var(--cyan), rgba(255, 255, 255, 0));
                                                                                                                                                                                                                                                                                                                                                                                            } */

        .quote-card strong {
            color: #000000;
            display: block;
            font-size: 1.18rem;
            line-height: 1.25;
            margin-bottom: .7rem;
        }

        .quote-card p {
            color: rgba(0, 0, 0, 0.78);
            margin-bottom: 0;
        }

        .hero-mini-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .hero-mini {
            border: 1px solid rgb(45 45 45 / 20%);
            background: #fff;
            backdrop-filter: blur(16px);
            border-radius: 7px;
            padding: 26px;
            /* box-shadow: 0 24px 70px rgba(0, 0, 0, .22); */
            position: relative;
            overflow: hidden;
        }

        .hero-mini b {
            color: #0018dc;
            display: block;
            font-size: 1.1rem;
        }

        .hero-mini span {
            color: rgba(0, 0, 0, 0.76);
            font-size: .9rem;
        }

        /* Page sections */
        /* .section {
                                                                                                                                                                                                                                                                            padding: 78px 0;
                                                                                                                                                                                                                                                                        } */

        .section-soft {
            background: var(--soft);
        }

        .section-white {
            background: #fff;
        }

        .article-shell {
            display: grid;
            grid-template-columns: 278px minmax(0, var(--article));
            gap: 70px;
            align-items: start;
        }

        .toc {
            position: sticky;
            top: 104px;
            border: 1px solid var(--line);
            border-radius: 7px;
            padding: 22px;
            background: #fff;
            box-shadow: 0 18px 46px rgba(6, 17, 38, .07);
        }

        .toc-title {
            font-weight: 900;
            color: var(--ink);
            margin-bottom: .8rem;
            letter-spacing: -.02em;
        }

        .toc a {
            display: block;
            padding: .52rem 0;
            color: #5e6a7e;
            font-size: .93rem;
            border-bottom: 1px solid rgba(220, 227, 238, .78);
        }

        .toc a:last-child {
            border-bottom: 0;
        }

        .toc a:hover {
            color: var(--blue);
        }

        article {
            background: #fff;
            border: 1px solid rgba(220, 227, 238, .76);
            border-radius: 7px;
            padding: clamp(26px, 4vw, 54px);
            box-shadow: 0 20px 60px rgba(6, 17, 38, .06);
        }

        h2 {
            color: var(--ink);
            font-size: clamp(1.72rem, 3vw, 2.32rem);
            line-height: 1.08;
            letter-spacing: -.052em;
            margin: 0 0 1.05rem;
            padding-top: .3rem;
        }

        h3 {
            color: var(--ink);
            font-size: 1.28rem;
            line-height: 1.26;
            letter-spacing: -.028em;
            margin: 1.95rem 0 .62rem;
        }

        .lead {
            font-size: 1.16rem;
            color: #303b50;
            /* border-left: 4px solid #0018dc;
                                        padding-left: 1.22rem; */
            margin: 1.15rem 0 2rem;
        }

        .article-section {
            /* padding: 0 0 58px; */
            border-bottom: 1px solid var(--line);
            margin-bottom: 30px;
        }

        .article-section:last-child {
            border-bottom: 0;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        /* Fluidstream homepage-inspired cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin: 1.75rem 0 2.1rem;
        }

        .fs-card,
        .line-card,
        .stat-card {
            position: relative;
            overflow: hidden;
            border-radius: 7px;
            padding: 24px;
            border: 1px solid var(--line);
            background: #fff;
            box-shadow: 0 15px 40px rgba(6, 17, 38, .055);
            transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease, background .24s ease, color .24s ease;
            min-height: 160px;
        }

        .fs-card h3,
        .line-card h3,
        .stat-card h3 {
            margin-top: 0;
            font-size: 1.16rem;
            position: relative;
            z-index: 2;
        }

        .fs-card p,
        .line-card p,
        .stat-card p {
            color: var(--muted);
            margin-bottom: 0;
            position: relative;
            z-index: 2;
        }

        .fs-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            border-color: var(--blue);
        }

        .fs-card:hover:before {
            transform: translateY(0);
        }

        /* .fs-card:hover h3,
                                                                                                                                                                                                                                                                                                                .fs-card:hover p {
                                                                                                                                                                                                                                                                                                                    color: #fff;
                                                                                                                                                                                                                                                                                                                } */

        .line-card:before {
            content: "";
            position: absolute;
            width: 160%;
            height: 2px;
            left: -160%;
            top: 0;
            background: linear-gradient(90deg, transparent, var(--cyan), var(--blue), transparent);
            transition: left .45s ease;
        }

        .line-card:after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(21, 209, 255, .10), transparent 45%);
            opacity: 0;
            transition: opacity .24s ease;
        }

        .line-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            border-color: rgba(0, 24, 220, .28);
        }

        .line-card:hover:before {
            left: 0;
        }

        .line-card:hover:after {
            opacity: 1;
        }

        .callout {
            margin: 2rem 0;
            padding: 28px 30px;
            border-radius: 7px;
            border: 1px solid #0000004a;
            background: linear-gradient(135deg, #eef7ff00 0%, #fff 100%);
            box-shadow: 0 16px 42px rgba(6, 17, 38, .06);
        }

        /* .fs-card,
                                                                                                                                                                                                                                                                                                                        .line-card,
                                                                                                                                                                                                                                                                                                                        .stat-card,
                                                                                                                                                                                                                                                                                                                        .callout {
                                                                                                                                                                                                                                                                                                                            position: relative;
                                                                                                                                                                                                                                                                                                                            overflow: hidden;
                                                                                                                                                                                                                                                                                                                            transition: transform 0.3s ease, border-color 0.3s ease, background 0.3s ease;
                                                                                                                                                                                                                                                                                                                        } */
        .cta-panel::after,
        .hero-mini::after,
        .quote-card::after,
        .fs-card::after,
        .line-card::after,
        .stat-card::after,
        .callout::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #0018dc;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 1;
        }

        .fs-card:hover,
        .cta-panel:hover,
        .hero-mini:hover,
        .quote-card:hover,
        .line-card:hover,
        .stat-card:hover,
        .callout:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff;
        }

        .fs-card:hover::after,
        .cta-panel:hover::after,
        .hero-mini:hover::after,
        .quote-card:hover::after,
        .line-card:hover::after,
        .stat-card:hover::after,
        .callout:hover::after {
            transform: scaleX(1);
        }

        .callout-title {
            display: block;
            font-size: 1.08rem;
            font-weight: 900;
            color: var(--blue);
            margin-bottom: .55rem;
        }

        .callout p:last-child {
            margin-bottom: 0;
        }

        .dark-card {
            background: #0018dc;
            color: #fff;
            border-radius: 7px;
            padding: 40px;
            margin: 2.4rem 0;
            overflow: hidden;
            box-shadow: var(--shadow-strong);
        }

        .dark-card h2,
        .dark-card h3,
        .dark-card strong {
            color: #fff;
        }

        .dark-card p {
            color: rgba(255, 255, 255, .82);
        }

        .proof-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 1.4rem;
        }

        .proof-item {
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 7px;
            padding: 18px;
            background: #fff;
            min-height: 145px;
        }

        .proof-item strong {
            color: #0018dc;
            font-size: 18px;
            display: block;
            line-height: 1.1;
            margin-bottom: .6rem;
        }

        .proof-item span {
            color: #000;
            font-size: .94rem;
        }

        .compare-strip {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin: 2rem 0;
        }

        .compare-box {
            border: 1px solid var(--line);
            border-radius: 7px;
            padding: 24px;
            background: var(--soft);
        }

        .compare-box.blue {
            background: var(--blue);
            border-color: var(--blue);
            color: #fff;
        }

        .compare-box.blue h3,
        .compare-box.blue strong {
            color: #fff;
        }

        .compare-box.blue li {
            color: rgba(255, 255, 255, .84);
        }

        .compare-box h3 {
            margin-top: 0;
        }

        .faq-item {
            border-bottom: 1px solid var(--line);
            padding: 1.25rem 0;
        }

        .faq-item:last-child {
            border-bottom: 0;
        }

        .faq-item h3 {
            margin: 0 0 .45rem;
            font-size: 1.08rem;
        }

        .faq-item p {
            margin-bottom: 0;
            color: var(--muted);
        }

        /* Homepage-like CTA */
        .cta-band {
            color: #fff;
            background:
                radial-gradient(circle at 18% 20%, rgba(21, 209, 255, .22), transparent 28%),
                linear-gradient(135deg, var(--blue), #071126);
            padding: 84px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-band:before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, .052) 1px, transparent 1px),
                linear-gradient(0deg, rgba(255, 255, 255, .044) 1px, transparent 1px);
            background-size: 76px 76px;
            opacity: .65;
        }

        .cta-inner {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr .75fr;
            gap: 44px;
            align-items: center;
        }

        .cta-band h2 {
            color: #fff;
            padding-top: 0;
            font-size: clamp(2rem, 4vw, 3.5rem);
            margin-bottom: 1rem;
        }

        .cta-band p {
            color: rgba(255, 255, 255, .82);
            font-size: 1.1rem;
        }

        .cta-panel {
            border: 1px solid #0000003d;
            background: #fff;
            border-radius: 7px;
            padding: 28px;
            /* box-shadow: 0 24px 70px rgba(0, 0, 0, .18); */
        }

        .cta-panel h3 {
            margin-top: 0;
            color: #000000;
        }

        .cta-panel ul {
            margin-bottom: 0;
            color: rgba(0, 0, 0, 0.82);
        }

        /* Footer from current Fluidstream homepage */
        footer {
            background: #050b18;
            color: #fff;
            padding: 60px 0 34px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.35fr repeat(4, 1fr);
            gap: 34px;
        }

        .footer-logo {
            color: var(--cyan);
            font-size: 1.46rem;
            font-weight: 900;
            letter-spacing: -.05em;
            margin-bottom: 1rem;
        }

        footer p,
        footer a,
        footer li {
            color: rgba(255, 255, 255, .70);
            font-size: .96rem;
        }

        footer h3 {
            color: #fff;
            font-size: 1rem;
            margin: 0 0 .9rem;
            letter-spacing: 0;
        }

        .footer-links a {
            display: block;
            margin: .44rem 0;
        }

        .footer-cta {
            border: 1px solid rgba(255, 255, 255, .15);
            background: rgba(255, 255, 255, .055);
            border-radius: 22px;
            padding: 18px;
        }

        .footer-cta .btn {
            margin-top: .7rem;
            padding: .75rem 1rem;
            font-size: .9rem;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, .12);
            margin-top: 36px;
            padding-top: 22px;
            color: rgba(255, 255, 255, .55);
            font-size: .9rem;
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        @media (max-width: 1020px) {

            .hero-grid,
            .article-shell,
            .cta-inner,
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .toc {
                position: static;
            }

            .nav-links {
                display: none;
            }

            .proof-grid,
            .card-grid,
            .compare-strip {
                grid-template-columns: 1fr;
            }

            /* .section {
                                                                                                                                                                                                                                                                                padding: 58px 0;
                                                                                                                                                                                                                                                                            } */

            /* .hero {
                                                                                                                                                                                                                                                                            padding: 74px 0;
                                                                                                                                                                                                                                                                        } */

            article {
                padding: 28px;
            }
        }

        @media (max-width: 620px) {
            .wrap {
                width: min(var(--max), calc(100% - 28px));
            }

            .hero-mini-grid {
                grid-template-columns: 1fr;
            }

            .dark-card,
            .cta-panel {
                padding: 24px;
            }

            h1 {
                font-size: 2.65rem;
            }
        }

        .btn-1 {
            color: #0018dc !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: .95rem 1.28rem;
            font-weight: 900;
            border: 1px solid #00000073;
            /* transition: transform .22s ease, box-shadow .22s ease, background .22s ease, color .22s ease; */
        }

        .cta-panel ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .cta-panel ul li {
            position: relative;
            padding-left: 32px;
            margin-bottom: 14px;
            line-height: 1.6;
        }

        .cta-panel ul li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20px 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='m13 6 6 6-6 6'/%3E%3C/svg%3E");
        }

        .cta-panel ul li:last-child {
            margin-bottom: 0;
        }

        .compare-box ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .compare-box ul li {
            position: relative;
            padding-left: 32px;
            margin-bottom: 14px;
            line-height: 1.6;
        }

        .compare-box ul li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20px 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='m13 6 6 6-6 6'/%3E%3C/svg%3E");
        }

        .compare-box.blue ul li::before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23ffffff' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='m13 6 6 6-6 6'/%3E%3C/svg%3E");
        }

        .compare-box ul li:last-child {
            margin-bottom: 0;
        }
    </style>
    <style>
        /* Sidebar / Article Contents - line style */
        .toc {
            position: sticky;
            top: 104px;

            background: transparent !important;
            border: 0 !important;
            border-radius: 0 !important;
            box-shadow: none !important;

            padding: 0 !important;
            margin-top: 12px !important;

            overflow: visible;
        }

        .toc-title {
            display: none !important;
        }

        .toc::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            background: #cfd7e4;
        }

        .toc a {
            position: relative;
            display: block;

            padding: 9px 12px 9px 20px !important;
            margin: 0 !important;

            color: #5d6a80 !important;
            font-size: 15px !important;
            font-weight: 400 !important;
            line-height: 1.25;

            border-bottom: 0 !important;
            text-decoration: none !important;

            transition: color 0.22s ease, text-shadow 0.22s ease;
        }

        .cta-panel {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.22);
            border-radius: 7px;
            background: #ffffff;
            box-shadow: none !important;
            transition:
                transform 0.24s ease,
                border-color 0.24s ease,
                background 0.24s ease;
        }

        .toc a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 2px;
            bottom: 2px;

            width: 4px;
            background: transparent;

            transition: background 0.22s ease;
        }

        .toc a:hover,
        .toc a.active {
            color: #061126 !important;
            font-weight: 400 !important;
            text-shadow: 0.35px 0 0 #061126;
        }

        .toc a:hover::before,
        .toc a.active::before {
            background: #0018dc !important;
        }

        /* Fix anchor scroll hiding under sticky header */
        html {
            /* scroll-padding-top: 135px; */
        }

        .article-section {
            scroll-margin-top: 135px;
        }

        @media (max-width: 1020px) {
            .toc {
                position: static;
                margin-top: 25px !important;
                margin-bottom: 25px !important;
            }

            html {
                scroll-padding-top: 90px;
            }

            .article-section {
                scroll-margin-top: 90px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tocLinks = Array.from(document.querySelectorAll('.toc a[href^="#"]'));

            const sections = tocLinks
                .map(function (link) {
                    return document.querySelector(link.getAttribute('href'));
                })
                .filter(Boolean);

            if (!tocLinks.length || !sections.length) return;

            const headerOffset = 135;

            function setActive(id) {
                tocLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                });
            }

            function updateActiveOnScroll() {
                let currentId = sections[0].id;

                sections.forEach(function (section) {
                    const sectionTop = section.getBoundingClientRect().top;

                    if (sectionTop <= headerOffset + 20) {
                        currentId = section.id;
                    }
                });

                setActive(currentId);
            }

            tocLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();

                    const targetId = link.getAttribute('href');
                    const targetSection = document.querySelector(targetId);

                    if (!targetSection) return;

                    const targetPosition =
                        targetSection.getBoundingClientRect().top +
                        window.pageYOffset -
                        headerOffset;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    setActive(targetId.replace('#', ''));
                });
            });

            updateActiveOnScroll();

            window.addEventListener('scroll', updateActiveOnScroll, {
                passive: true
            });
        });
    </script>
    <script
        type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"How to Select the Right Vapor Recovery Unit for Wet Gas Applications","description":"A Fluidstream technical guide for selecting vapor recovery units in wet gas applications, including liquid tolerance, freeze risk, pressure instability, lifecycle reliability, VaporCommander fit, patents, and field proof.","author":{"@type":"Organization","name":"Fluidstream"},"publisher":{"@type":"Organization","name":"Fluidstream"},"mainEntityOfPage":"https://fluidstream.co/insights/how-to-select-vapor-recovery-unit-wet-gas"}</script>


    <section class="hero">
        <div class="wrap hero-grid py-12">
            <div>
                <h1>How to Select the Right Vapor Recovery Unit for Wet Gas Applications</h1>
                <p class="hero-lede">A practical engineering guide for selecting vapor recovery equipment when wet gas,
                    condensate carryover, pressure swings, freeze exposure, and field reliability matter more than nameplate
                    ratings alone.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/vapor-recovery">Explore VaporCommander™</a>
                    <a class="btn btn-outline" href="#case-study-proof">View Field Proof</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>The right VRU is not simply the package that matches flow and pressure on paper.</strong>
                    <p>Wet vapor streams, liquid carryover, unstable rates, and winter operating conditions can determine
                        whether vapor recovery succeeds in the field.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Wet gas fit</b><span>Evaluate liquid tolerance before relying on dry-gas
                            assumptions.</span></div>
                    <div class="hero-mini"><b>Uptime focus</b><span>Reliability drives recovered gas value and emissions
                            reduction.</span></div>
                    <div class="hero-mini"><b>Patent-supported</b><span>Fluidstream patents support liquid-aware compression
                            methodology.</span></div>
                    <div class="hero-mini"><b>Field proof</b><span>Case study: about 500,000 m³/year of gas captured.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area gray">
        <div class="wrap article-shell py-12">
            <aside class="toc" aria-label="Article contents">
                <a href="#selection-starts" class="active"><span>Real operating conditions</span></a>
                <a href="#why-selection-fails"><span>Why selection fails</span></a>
                <a href="#engineering-criteria"><span>Engineering criteria</span></a>
                <a href="#wet-gas-reliability"><span>Wet gas and freeze risk</span></a>
                <a href="#beyond-nameplate"><span>Beyond nameplate specs</span></a>
                <a href="#vaporcommander-fit"><span>VaporCommander™ fit</span></a>
                <a href="#patents"><span>Patent-supported foundation</span></a>
                <a href="#case-study-proof"><span>Case study proof</span></a>
                <a href="#faq"><span>FAQ</span></a>
            </aside>

            <article>
                <section class="content-section" id="selection-starts">
                    <div class="article-card">
                        <div class="section-label">Selection principle</div>
                        <h2>Selecting the right vapor recovery unit starts with real operating conditions.</h2>
                        <p class="lead">Choosing a vapor recovery unit for wet gas service requires more than matching flow
                            rate, suction pressure, discharge pressure, and horsepower.</p>
                        <p>Many vapor recovery systems are selected based on idealized dry-gas assumptions, only to
                            underperform once exposed to real field conditions.</p>
                        <p>Wet gas, condensate carryover, unstable vapor rates, seasonal temperature swings, freeze-prone
                            equipment, and separator upset conditions can all materially affect vapor recovery reliability.
                            The right vapor recovery unit is the one that can operate consistently in the actual conditions
                            present at the site—not merely the one that meets theoretical nameplate requirements.</p>
                        <div class="callout"><span class="callout-title">Core takeaway</span>
                            <p>VRU selection should begin with the vapor stream, field environment, liquid behavior,
                                maintenance exposure, and uptime requirement—not only the compressor rating.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="why-selection-fails">
                    <div class="article-card">
                        <div class="section-label">Failure logic</div>
                        <h2>Why conventional vapor recovery unit selection often fails</h2>
                        <p>Many VRU selection decisions focus heavily on compressor sizing and capital cost while
                            underestimating the importance of real-world operating conditions. A system may appear properly
                            sized on paper yet still experience chronic downtime, maintenance issues, and poor gas capture
                            performance if it cannot tolerate the realities of the vapor stream.</p>
                        <p>This is especially common in oil and gas applications where vapor streams contain entrained
                            liquids, pressure fluctuations, condensable hydrocarbons, and intermittent upset conditions.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Common selection mistake</h3>
                                <ul>
                                    <li>Selecting around peak flow and discharge pressure only</li>
                                    <li>Assuming dry, stable gas reaches the compressor</li>
                                    <li>Underestimating separator, scrubber, and drain maintenance</li>
                                    <li>Ignoring winter operation and condensate behavior</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Better selection approach</h3>
                                <ul>
                                    <li>Evaluate wet gas and liquid carryover risk</li>
                                    <li>Review variable vapor rates and pressure instability</li>
                                    <li>Assess total installed system complexity</li>
                                    <li>Prioritize uptime and lifecycle reliability</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="engineering-criteria">
                    <div class="article-card">
                        <div class="section-label">Engineering criteria</div>
                        <h2>Key engineering criteria when selecting a VRU</h2>
                        <p>Operators should evaluate more than basic compressor sizing when selecting a vapor recovery unit.
                            Critical selection criteria include liquid tolerance, operating turndown, vapor composition,
                            pressure stability, seasonal operating conditions, maintenance burden, and the complexity of
                            required support equipment.</p>
                        <p>The ability of the system to remain stable across varying vapor rates and changing field
                            conditions is often more important than its peak theoretical capacity.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Liquid tolerance</h3>
                                <p>Review how the system handles intermittent condensate carryover, liquid slugs, and
                                    imperfect upstream separation.</p>
                            </div>
                            <div class="line-card">
                                <h3>Turndown and stability</h3>
                                <p>Evaluate whether the unit can operate across variable vapor rates without excessive
                                    cycling or shutdowns.</p>
                            </div>
                            <div class="line-card">
                                <h3>Maintenance burden</h3>
                                <p>Consider the full support system, including scrubbers, drains, controls, heat tracing,
                                    and operator intervention.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Lifecycle economics</h3>
                                <p>Compare recovered gas value and emissions benefit against uptime, maintenance, and total
                                    installed cost.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="wet-gas-reliability">
                    <div class="article-card">
                        <div class="section-label">Wet gas reliability</div>
                        <h2>Wet gas, liquids, freeze risk, and operating instability must be part of the selection process.
                        </h2>
                        <p>Many vapor recovery applications assumed to be dry gas service contain entrained condensate,
                            hydrocarbon mist, water droplets, slugging liquid carryover, or condensed vapors during colder
                            ambient conditions.</p>
                        <p>These conditions can create reliability issues for conventional gas-only vapor recovery systems,
                            particularly when the compressor depends on perfect upstream separation. In cold-weather
                            environments, scrubbers, drains, and level controls can also become freeze-prone maintenance
                            points that reduce uptime.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Condensate carryover</h3>
                                <p>Liquid carryover can increase shutdowns and maintenance when a VRU is designed around
                                    dry-gas assumptions.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Pressure swings</h3>
                                <p>Changing tank or facility pressures can push conventional packages outside stable
                                    operating windows.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Freeze-prone equipment</h3>
                                <p>Scrubbers, drains, and level controls can create cold-weather reliability issues that
                                    reduce gas capture.</p>
                            </div>
                            <div class="line-card">
                                <h3>Separator dependence</h3>
                                <p>Systems that require perfect upstream separation can become vulnerable during normal
                                    field upsets.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="beyond-nameplate">
                    <div class="article-card">
                        <div class="section-label">Nameplate vs field operation</div>
                        <h2>Real operating conditions matter more than nameplate specifications.</h2>
                        <p>Two vapor recovery units may have identical flow and pressure ratings but perform very
                            differently in the field. Nameplate specifications alone do not indicate how a system responds
                            to wet gas, liquid carryover, pressure instability, or changing vapor rates.</p>
                        <p>Lifecycle performance is driven by reliability, uptime, maintenance burden, and the ability to
                            handle real process conditions—not simply by published compressor ratings.</p>
                        <div class="callout"><span class="callout-title">Selection test</span>
                            <p>If the vapor stream includes wet gas, condensate carryover, unstable pressure, or winter
                                exposure, the selection review should focus on actual operating reliability, not only the
                                compressor data sheet.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="vaporcommander-fit">
                    <div class="article-card">
                        <div class="section-label">Fluidstream approach</div>
                        <h2>Where VaporCommander™ fits</h2>
                        <p>Fluidstream’s VaporCommander™ is designed for vapor recovery applications where conventional
                            gas-only systems may struggle due to wet gas, condensate carryover, unstable vapor rates,
                            pressure fluctuations, or freeze-prone separator-heavy system designs.</p>
                        <p>By supporting applications where liquid presence and operating instability are part of normal
                            field conditions, VaporCommander™ can provide a stronger fit for difficult vapor recovery and
                            low-pressure gas capture projects.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Wet vapor streams</h3>
                                <p>Designed for applications where condensate and changing gas/liquid behavior may be part
                                    of normal service.</p>
                            </div>
                            <div class="line-card">
                                <h3>Lower separator dependence</h3>
                                <p>Reduces reliance on perfect upstream separation and the maintenance burden that can come
                                    with it.</p>
                            </div>
                            <div class="line-card">
                                <h3>Low-pressure gas capture</h3>
                                <p>Supports vapor streams that need compression before they can be routed for sale, fuel, or
                                    other beneficial use.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Field reliability focus</h3>
                                <p>Prioritizes practical uptime where gas capture value depends on steady operation in real
                                    conditions.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="patents">
                    <div class="article-card">
                        <div class="section-label">Patented technology</div>
                        <h2>Patent-supported technical foundation</h2>
                        <p>Fluidstream’s liquid-aware compression methodology is supported by its patent portfolio,
                            including US11098709B2, CA2843321C, CA2883283C, and US10221664B2. These patents support the
                            engineering principles underlying Fluidstream’s approach to managing liquid-influenced
                            compression behavior and difficult wet gas service.</p>
                        <div class="callout"><span class="callout-title">Technical relevance</span>
                            <p>For wet gas vapor recovery applications, the practical value is the ability to support
                                compression where liquids, instability, and changing operating conditions are expected
                                rather than treated as rare exceptions.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="case-study-proof">
                    <div class="article-card">
                        <div class="section-label">Case study proof</div>
                        <h2>Field proof: approximately 500,000 m³/year of gas captured in a vapor recovery application.</h2>
                        <p>In one vapor recovery application, approximately 500,000 m³/year of gas was captured that would
                            otherwise have been combusted. The project created estimated annual gas value while also
                            reducing associated emissions exposure.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field case study</div>
                            <h2>Reliable vapor recovery depends on consistent field operation.</h2>
                            <p>This case study demonstrates the value of applying vapor recovery where gas has commercial
                                value and emissions exposure can be reduced through dependable field compression.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>500,000 m³/year</strong><span>Approximate captured gas
                                        volume in the vapor recovery application.</span></div>
                                <div class="proof-item"><strong>Reduced combustion</strong><span>Gas captured that would
                                        otherwise have been combusted.</span></div>
                                <div class="proof-item"><strong>Recovered value</strong><span>Estimated annual gas value
                                        created while reducing emissions exposure.</span></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="faq">
                    <div class="article-card">
                        <div class="section-label">FAQ</div>
                        <h2>Vapor recovery unit selection FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>Why do vapor recovery units fail in wet gas applications?</h3>
                                <p>Many conventional VRUs assume dry-gas service and can struggle when exposed to
                                    condensate, slugging liquids, pressure swings, or freeze-prone separator systems.</p>
                            </div>
                            <div class="faq-item">
                                <h3>What is the most important factor when selecting a VRU?</h3>
                                <p>The most important factor is whether the system can reliably operate in the actual field
                                    conditions of the application, including wet gas, liquid carryover, variable vapor
                                    rates, and seasonal operating conditions.</p>
                            </div>
                            <div class="faq-item">
                                <h3>When is VaporCommander™ a strong fit?</h3>
                                <p>VaporCommander™ is strongest in vapor recovery applications where wet gas, unstable vapor
                                    conditions, or separator-dependent reliability issues make conventional systems
                                    difficult to operate.</p>
                            </div>
                            <div class="faq-item">
                                <h3>What should operators review before selecting a VRU?</h3>
                                <p>Operators should review vapor rate, liquid behavior, suction and discharge pressure,
                                    vapor composition, winter exposure, maintenance history, gas-use options, and total
                                    installed system complexity.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </main>
    <style>
        .fs-related-section {
            padding: 52px 0;
            border-top: 1px solid #dce3ee;
            border-bottom: 1px solid #dce3ee;
        }

        .fs-related-wrap {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        .lead {
            max-width: 620px;
        }

        .fs-related-head {

            gap: 34px;
            align-items: start;
            margin-bottom: 26px;
        }

        .fs-related-kicker {
            display: inline-flex;
            margin-bottom: 8px;
            color: #0018dc;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        /* 
                                                                                                                                                                                                        .fs-related-head h2 {
                                                                                                                                                                                                            margin: 0;
                                                                                                                                                                                                            color: #061126;
                                                                                                                                                                                                            font-size: clamp(30px, 3vw, 44px);
                                                                                                                                                                                                            font-weight: 900;
                                                                                                                                                                                                            line-height: 1.04;
                                                                                                                                                                                                            letter-spacing: -0.055em;
                                                                                                                                                                                                        } */
        /* 
                                                                                                                                                                                                    .fs-related-head p {
                                                                                                                                                                                                        margin: 0;
                                                                                                                                                                                                        color: #637086;
                                                                                                                                                                                                        font-size: 16px;
                                                                                                                                                                                                        line-height: 1.62;
                                                                                                                                                                                                        max-width: 720px;
                                                                                                                                                                                                    } */

        .fs-related-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            align-items: stretch;
        }

        .fs-related-card {
            position: relative;
            overflow: hidden;
            height: 100%;
            min-height: 245px;
            padding: 22px;
            border: 1px solid #dce3ee;
            border-radius: 7px;
            background: #ffffff;
            box-shadow: 0 14px 34px rgba(6, 17, 38, .055);
            display: flex;
            flex-direction: column;
            transition:
                transform .24s ease,
                box-shadow .24s ease,
                border-color .24s ease,
                background .24s ease;
        }

        .fs-related-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #0018dc;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s ease;
            z-index: 1;
        }

        .fs-related-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 55px rgba(6, 17, 38, .10);
            border-color: rgba(0, 24, 220, .35);
            background: #ffffff;
        }

        .fs-related-card:hover::before {
            transform: scaleX(1);
        }

        .fs-related-card h3 {
            margin: 0 0 16px;
            color: #061126;
            font-size: 13px;
            font-weight: 900;
            line-height: 1.35;
            letter-spacing: .13em;
            text-transform: uppercase;
        }

        .fs-related-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .fs-related-list li {
            margin: 0;
            border-top: 1px solid #edf1f7;
        }

        .fs-related-list li:first-child {
            border-top: 0;
        }

        .fs-related-list a {
            position: relative;
            display: block;
            padding: 10px 20px 10px 0;
            color: #0018dc;
            font-size: 14px;
            font-weight: 900;
            line-height: 1.38;
            text-decoration: none;
            transition:
                color .22s ease,
                padding-left .22s ease;
        }

        .fs-related-list a::after {
            content: "→";
            position: absolute;
            right: 0;
            top: 10px;
            color: #0018dc;
            opacity: 0;
            transform: translateX(-5px);
            transition:
                opacity .22s ease,
                transform .22s ease;
        }

        .fs-related-list a:hover {
            color: #0012aa;
            padding-left: 4px;
            text-decoration: none;
        }

        .fs-related-list a:hover::after {
            opacity: 1;
            transform: translateX(0);
        }

        .fs-related-note {
            margin-top: auto;
            padding-top: 14px;
            color: #637086;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.45;
        }

        @media (max-width: 1100px) {
            .fs-related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .fs-related-head {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }

        .gray {
            background: #edeef4;
        }

        @media (max-width: 640px) {
            .fs-related-section {
                padding: 44px 0;
            }

            .fs-related-wrap {
                width: min(1180px, calc(100% - 28px));
            }

            .fs-related-grid {
                grid-template-columns: 1fr;
            }

            .fs-related-card {
                min-height: auto;
                padding: 20px;
            }

            .fs-related-head p {
                font-size: 15px;
            }
        }
    </style>
    <section class="fs-related-section">
        <div class="fs-related-wrap">
            <div class="lead">
                <div>
                    <h2>Related Resources</h2>
                </div>

                <p class="fs-related-copy">
                    Continue from this article into the most relevant product, technical insight,
                    field deployment, and technology pages.
                </p>
            </div>

            <div class="fs-related-grid">
                <div class="fs-related-card">
                    <h3>Related Products</h3>

                    <ul class="fs-related-list">
                        <li>
                            <a href="{{ url('/multiphase-compression') }}">
                                MultiphaseCommander™
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="fs-related-card">
                    <h3>Related Technical Insights</h3>

                    <ul class="fs-related-list">
                        <li>
                            <a href="{{ url('/insights/fluidstream-multiphase-vs-conventional-long-form') }}">
                                Multiphase Compression vs Conventional Compression
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/insights/production-optimization-multiphase-compression') }}">
                                Production Optimization with Multiphase Compression
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/insights/why-conventional-compression-fails-wet-unstable-wells') }}">
                                Why Conventional Casing Gas Compressors Fail in Wet Wells
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/insights/how-multiphase-compression-supports-production-recovery') }}">
                                How Multiphase Compression Supports Production Recovery
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="fs-related-card">
                    <h3>Related Field Deployments</h3>

                    <ul class="fs-related-list">
                        <li>
                            <a href="{{ url('/case-studies/multiphasecommander-production-recovery') }}">
                                MultiphaseCommander™ Production Recovery Case Study
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="fs-related-card">
                    <h3>Related Technology</h3>

                    <ul class="fs-related-list">
                        <li>
                            <a href="{{ url('/multiphase-compression-technology') }}">
                                Multiphase Compression Technology
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/patented-technology') }}">
                                Patented Technology
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 gray" id="application-review">
        <div class="wrap cta-inner">
            <div>
                <div class="eyebrow">Talk to Fluidstream</div>
                <h2>Evaluate whether VaporCommander™ fits your wet gas vapor recovery application.</h2>
                <p>Selecting the wrong vapor recovery unit can create avoidable downtime, maintenance cost, and lost gas
                    capture. If your vapor stream includes wet gas, condensate carryover, unstable pressure, or
                    freeze-prone operating conditions, Fluidstream can review your application and help determine
                    whether VaporCommander™ is the right fit.</p>
                <div class="cta-actions">
                    <a class="btn-1 btn-primary" href="/technical-review">Request Technical Fit Review</a>
                    <a class="btn-1 btn-outline" href="/vapor-recovery">Review VaporCommander™</a>
                </div>
            </div>
            <div class="cta-panel">
                <h3>Related resources</h3>
                <ul>
                    <li>VaporCommander™ Product Page</li>
                    <li>Why Conventional VRUs Fail in Wet Gas Applications</li>
                    <li>Methane Emissions Reduction Solutions for Oil & Gas</li>
                    <li>Fluidstream Case Studies</li>
                </ul>
            </div>
        </div>
    </section>



    <script>
        (function () {
            const links = [...document.querySelectorAll('.toc a[href^="#"]')];
            const sections = links.map(link => document.querySelector(link.getAttribute('href'))).filter(Boolean);
            if (!links.length || !sections.length) return;
            const setActive = () => {
                let current = sections[0].id;
                const offset = window.innerHeight * 0.28;
                sections.forEach(section => { if (section.getBoundingClientRect().top <= offset) { current = section.id; } });
                links.forEach(link => link.classList.toggle('active', link.getAttribute('href') === '#' + current));
            };
            setActive();
            window.addEventListener('scroll', setActive, { passive: true });
        })();
    </script>



@endsection