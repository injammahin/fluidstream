{{-- resources/views/terms.blade.php --}}
@extends('layouts.app')

@section('title', 'Terms of Use | Fluidstream')

@section('content')
    <style>
        :root {
            --fs-blue: #0018dc;
            --fs-blue-dark: #061126;
            --fs-cyan: #15d1ff;
            --fs-ink: #061126;
            --fs-text: #344154;
            --fs-muted: #637086;
            --fs-line: #dce3ee;
            --fs-soft: #f5f7fb;
            --fs-white: #ffffff;
            --fs-max: 1180px;
            --fs-article: 850px;
            --fs-shadow: 0 22px 55px rgba(6, 17, 38, .10);
            --fs-shadow-soft: 0 20px 60px rgba(6, 17, 38, .06);
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 12px;
        }

        .terms-page {
            color: var(--fs-text);
            background: var(--fs-white);
            line-height: 1.68;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        .terms-page * {
            box-sizing: border-box;
        }

        .terms-page a {
            color: inherit;
            text-decoration: none;
        }

        .terms-page p {
            margin: 0 0 1.18rem;
        }

        .terms-wrap {
            width: min(var(--fs-max), calc(100% - 40px));
            margin: 0 auto;
        }

        .terms-hero {
            position: relative;
            overflow: hidden;
            background: #0018dc;
            color: #ffffff;
        }

        .terms-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, .055) 1px, transparent 1px),
                linear-gradient(0deg, rgba(255, 255, 255, .045) 1px, transparent 1px);
            background-size: 74px 74px;
            mask-image: linear-gradient(to bottom, rgba(0, 0, 0, .85), transparent 90%);
            pointer-events: none;
        }

        .terms-hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.16fr .84fr;
            gap: 58px;
            align-items: center;
            padding: 82px 0 76px;
        }

        .terms-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--fs-cyan);
            font-size: .78rem;
            letter-spacing: .17em;
            text-transform: uppercase;
            font-weight: 900;
            margin-bottom: 1rem;
        }

        .terms-eyebrow::before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: var(--fs-cyan);
            box-shadow: 0 0 0 6px rgba(21, 209, 255, .14);
        }

        .terms-hero h1 {
            margin: 0 0 24px;
            max-width: 900px;
            color: #ffffff;
            font-size: clamp(34px, 5vw, 62px);
            line-height: .98;
            letter-spacing: -.07em;
            font-weight: 900;
        }

        .terms-hero h1 span {
            color: #9cecff;
        }

        .terms-hero-text {
            max-width: 780px;
            color: rgba(255, 255, 255, .84);
            font-size: clamp(15px, 1.4vw, 18px);
            line-height: 1.72;
        }

        .terms-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 28px;
        }

        .terms-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 900;
            border: 1px solid transparent;
            transition: transform .22s ease, box-shadow .22s ease, background .22s ease, color .22s ease;
        }

        .terms-btn:hover {
            transform: translateY(-2px);
        }

        .terms-btn-primary {
            background: #ffffff;
            color: var(--fs-blue) !important;
            box-shadow: 0 18px 38px rgba(0, 0, 0, .18);
        }

        .terms-btn-outline {
            color: #ffffff !important;
            border-color: rgba(255, 255, 255, .34);
            background: rgba(255, 255, 255, .08);
        }

        .terms-summary-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .20);
            background: rgba(255, 255, 255, .10);
            backdrop-filter: blur(16px);
            border-radius: 7px;
            padding: 28px;
        }

        .terms-summary-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(21, 209, 255, .22), transparent 34%);
            pointer-events: none;
        }

        .terms-summary-card h2 {
            position: relative;
            z-index: 1;
            margin: 0 0 16px;
            color: #ffffff;
            font-size: 22px;
            line-height: 1.2;
            letter-spacing: -.03em;
            font-weight: 900;
        }

        .terms-summary-list {
            position: relative;
            z-index: 1;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .terms-summary-list li {
            position: relative;
            padding: 14px 0 14px 28px;
            border-top: 1px solid rgba(255, 255, 255, .14);
            color: rgba(255, 255, 255, .84);
            font-size: 14px;
            line-height: 1.55;
        }

        .terms-summary-list li:first-child {
            border-top: 0;
        }

        .terms-summary-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 22px;
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: white;
        }

        .terms-main {
            background: var(--fs-soft);
            padding: 64px 0;
        }

        .terms-shell {
            display: grid;
            grid-template-columns: 278px minmax(0, var(--fs-article));
            gap: 70px;
            align-items: start;
        }

        .terms-toc {
            position: sticky;
            top: 104px;
            background: transparent;
            border: 0;
            border-radius: 0;
            box-shadow: none;
            padding: 0;
            margin-top: 12px;
            overflow: visible;
        }

        .terms-toc::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            background: #cfd7e4;
        }

        .terms-toc-title {
            display: none;
        }

        .terms-toc a {
            position: relative;
            display: block;
            padding: 10px 12px 10px 28px;
            color: #5d6a80;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.28;
            border-bottom: 0;
            transition: color .22s ease, text-shadow .22s ease;
        }

        .terms-toc a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 3px;
            bottom: 3px;
            width: 4px;
            background: transparent;
            transition: background .22s ease;
        }

        .terms-toc a:hover,
        .terms-toc a.active {
            color: var(--fs-ink);
            text-shadow: .35px 0 0 var(--fs-ink);
        }

        .terms-toc a:hover::before,
        .terms-toc a.active::before {
            background: var(--fs-blue);
        }

        .terms-card {
            overflow: hidden;
            border: 1px solid rgba(220, 227, 238, .86);
            border-radius: 14px;
            background: #ffffff;
            box-shadow: var(--fs-shadow-soft);
        }

        .terms-meta-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--fs-line);
            border-bottom: 1px solid var(--fs-line);
        }

        .terms-meta-item {
            background: #f8fafc;
            padding: 20px 22px;
        }

        .terms-meta-item strong {
            display: block;
            margin-bottom: 6px;
            color: #64748b;
            font-size: 12px;
            letter-spacing: .11em;
            text-transform: uppercase;
            font-weight: 900;
        }

        .terms-meta-item span {
            color: #0f172a;
            font-weight: 900;
        }

        .terms-section {
            border-bottom: 1px solid var(--fs-line);
            padding: 38px 44px;
            scroll-margin-top: 12px;
        }

        .terms-section:last-child {
            border-bottom: 0;
        }

        .terms-section-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            color: var(--fs-blue);
            font-size: 12px;
            letter-spacing: .15em;
            text-transform: uppercase;
            font-weight: 900;
        }

        .terms-section-label::after {
            content: "";
            width: 42px;
            height: 1px;
            background: var(--fs-blue);
            opacity: .35;
        }

        .terms-section h2 {
            margin: 0 0 16px;
            color: var(--fs-ink);
            font-size: clamp(1.8rem, 3vw, 2.32rem);
            line-height: 1.08;
            letter-spacing: -.052em;
            font-weight: 900;
        }

        .terms-lead {
            margin: 1.1rem 0 2rem;
            padding-left: 1.22rem;
            border-left: 4px solid var(--fs-blue);
            color: #303b50;
            font-size: 1.1rem;
            line-height: 1.75;
        }

        .terms-text {
            color: #465366;
        }

        .terms-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin: 1.75rem 0 2.1rem;
        }

        .terms-mini-card,
        .terms-callout {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--fs-line);
            border-radius: 7px;
            background: #ffffff;
            box-shadow: 0 15px 40px rgba(6, 17, 38, .055);
            transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease;
        }

        .terms-mini-card {
            min-height: 154px;
            padding: 24px;
        }

        .terms-mini-card::after,
        .terms-callout::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--fs-blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s ease;
        }

        .terms-mini-card:hover,
        .terms-callout:hover {
            transform: translateY(-3px);
            border-color: var(--fs-blue);
            box-shadow: var(--fs-shadow);
        }

        .terms-mini-card:hover::after,
        .terms-callout:hover::after {
            transform: scaleX(1);
        }

        .terms-mini-card h3 {
            margin: 0 0 8px;
            color: var(--fs-ink);
            font-size: 1.14rem;
            letter-spacing: -.02em;
            font-weight: 900;
        }

        .terms-mini-card p {
            margin: 0;
            color: var(--fs-muted);
            font-size: 14px;
            line-height: 1.65;
        }

        .terms-callout {
            margin: 2rem 0;
            padding: 28px 30px;
            background: linear-gradient(135deg, #eef7ff00 0%, #ffffff 100%);
            color: #465366;
        }

        .terms-callout-title {
            display: block;
            margin-bottom: .55rem;
            color: var(--fs-blue);
            font-size: 1.08rem;
            font-weight: 900;
        }

        .terms-callout p:last-child {
            margin-bottom: 0;
        }

        .terms-callout.dark {
            background: var(--fs-blue);
            border-color: var(--fs-blue);
            color: rgba(255, 255, 255, .84);
            box-shadow: 0 30px 90px rgba(0, 24, 220, .22);
        }

        .terms-callout.dark .terms-callout-title,
        .terms-callout.dark strong {
            color: #ffffff;
        }

        .terms-list {
            margin: 16px 0 0;
            padding: 0;
            list-style: none;
        }

        .terms-list li {
            position: relative;
            margin: 0;
            padding: 12px 0 12px 32px;
            border-top: 1px solid #edf1f7;
            color: #465366;
        }

        .terms-list li:first-child {
            border-top: 0;
        }

        .terms-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 17px;
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20px 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='m13 6 6 6-6 6'/%3E%3C/svg%3E");
        }

        .terms-link {
            color: var(--fs-blue) !important;
            font-weight: 800;
        }

        .terms-cta {
            background: #ffffff;
            padding: 64px 0;
        }

        .terms-cta-inner {
            display: grid;
            grid-template-columns: 1fr .75fr;
            gap: 44px;
            align-items: center;
        }

        .terms-cta h2 {
            margin: 0 0 1rem;
            color: var(--fs-ink);
            font-size: clamp(2rem, 4vw, 3.3rem);
            line-height: 1.05;
            letter-spacing: -.06em;
            font-weight: 900;
        }

        .terms-cta p {
            color: var(--fs-muted);
            font-size: 1.05rem;
        }

        .terms-cta-panel {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--fs-line);
            border-radius: 14px;
            padding: 28px;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(6, 17, 38, .07);
        }

        .terms-cta-panel::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--fs-blue);
        }

        .terms-cta-panel h3 {
            margin: 0 0 14px;
            color: var(--fs-ink);
            font-size: 1.3rem;
            letter-spacing: -.03em;
            font-weight: 900;
        }

        .terms-cta-panel ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .terms-cta-panel li {
            position: relative;
            margin: 0 0 14px;
            padding-left: 32px;
            color: #465366;
            line-height: 1.6;
        }

        .terms-cta-panel li:last-child {
            margin-bottom: 0;
        }

        .terms-cta-panel li::before {
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

        @media (max-width: 1020px) {

            .terms-hero-grid,
            .terms-shell,
            .terms-cta-inner {
                grid-template-columns: 1fr;
            }

            .terms-toc {
                position: static;
                margin: 0 0 28px;
            }

            .terms-grid-2,
            .terms-meta-strip {
                grid-template-columns: 1fr;
            }

            .terms-section {
                padding: 32px 26px;
                scroll-margin-top: 12px;
            }

            html {
                scroll-padding-top: 12px;
            }
        }

        @media (max-width: 620px) {
            .terms-wrap {
                width: min(var(--fs-max), calc(100% - 28px));
            }

            .terms-hero-grid {
                padding: 62px 0 54px;
            }

            .terms-hero h1 {
                font-size: 2.55rem;
            }

            .terms-summary-card,
            .terms-callout,
            .terms-cta-panel {
                padding: 22px;
            }

            .terms-toc a {
                font-size: 15px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tocLinks = Array.from(document.querySelectorAll('.terms-toc a[href^="#"]'));

            const sections = tocLinks
                .map(function (link) {
                    return document.querySelector(link.getAttribute('href'));
                })
                .filter(Boolean);

            if (!tocLinks.length || !sections.length) return;

            function getStickyHeaderOffset() {
                const header =
                    document.querySelector('.site-header') ||
                    document.querySelector('.header') ||
                    document.querySelector('header');

                if (!header) return 10;

                const style = window.getComputedStyle(header);
                const position = style.position;

                if (position === 'fixed' || position === 'sticky') {
                    return header.offsetHeight + 10;
                }

                return 10;
            }

            function setActive(id) {
                tocLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                });
            }

            function getSectionAnchor(section) {
                return (
                    section.querySelector('.terms-section-label') ||
                    section.querySelector('h2') ||
                    section
                );
            }

            function updateActiveOnScroll() {
                const offset = getStickyHeaderOffset();
                let currentId = sections[0].id;

                sections.forEach(function (section) {
                    const anchor = getSectionAnchor(section);
                    const anchorTop = anchor.getBoundingClientRect().top;

                    if (anchorTop <= offset + 70) {
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

                    const offset = getStickyHeaderOffset();
                    const anchor = getSectionAnchor(targetSection);

                    const targetPosition =
                        anchor.getBoundingClientRect().top +
                        window.pageYOffset -
                        offset;

                    window.scrollTo({
                        top: Math.max(targetPosition, 0),
                        behavior: 'smooth'
                    });

                    setActive(targetId.replace('#', ''));
                });
            });

            updateActiveOnScroll();

            window.addEventListener('scroll', updateActiveOnScroll, {
                passive: true
            });

            window.addEventListener('resize', updateActiveOnScroll);
        });
    </script>

    <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "WebPage",
                        "name": "Terms of Use",
                        "headline": "Terms of Use",
                        "description": "Terms governing use of the Fluidstream website, content, technical information, and related materials.",
                        "url": "https://fluidstream.nexolioit.com/terms",
                        "publisher": {
                            "@type": "Organization",
                            "name": "Fluidstream"
                        }
                    }
                </script>

    <div class="terms-page">
        <section class="terms-hero">
            <div class="terms-wrap terms-hero-grid">
                <div>

                    <h1> Terms of Use </h1>

                    <p class="terms-hero-text">
                        These Terms govern access to the Fluidstream website, use of Fluidstream content, protection
                        of
                        technical information and intellectual property, and limitations that apply to website-based
                        information, analysis, and recommendations.
                    </p>

                    <div class="terms-hero-actions">
                        <a class="terms-btn terms-btn-primary" href="/contact">Request Technical Review</a>
                        <a class="terms-btn terms-btn-outline" href="/privacy-policy">Privacy Policy</a>
                    </div>
                </div>

                <aside class="terms-summary-card" aria-label="Terms summary">
                    <h2>Applies To</h2>

                    <ul class="terms-summary-list">
                        <li>Website access and use.</li>
                        <li>Fluidstream content and intellectual property.</li>
                        <li>Client Technical Data and website-based analysis.</li>
                        <li>Liability limits, disclaimers, and Alberta governing law.</li>
                    </ul>
                </aside>
            </div>
        </section>

        <main class="terms-main">
            <div class="terms-wrap terms-shell">
                <aside class="terms-toc" aria-label="Terms sections">
                    <div class="terms-toc-title">On This Page</div>
                    <a href="#acceptance">Acceptance</a>
                    <a href="#ip">Intellectual Property</a>
                    <a href="#technical">Technical Information</a>
                    <a href="#no-certification">Engineering Clarification</a>
                    <a href="#warranties">No Warranties</a>
                    <a href="#liability">Liability</a>
                    <a href="#indemnity">Indemnification</a>
                    <a href="#prohibited">Prohibited Uses</a>
                    <a href="#links">Third-Party Links</a>
                    <a href="#international">International Users</a>
                    <a href="#law">Governing Law</a>
                    <a href="#privacy">Privacy</a>
                    <a href="#updates">Changes</a>
                    <a href="#contact">Contact</a>
                </aside>

                <article class="terms-card">
                    <div class="terms-meta-strip">
                        <div class="terms-meta-item">
                            <strong>Effective Date</strong>
                            <span>January 1, 2026</span>
                        </div>

                        <div class="terms-meta-item">
                            <strong>Jurisdiction</strong>
                            <span>Calgary, Alberta, Canada</span>
                        </div>

                        <div class="terms-meta-item">
                            <strong>Website</strong>
                            <span>www.fluidstream.co</span>
                        </div>
                    </div>

                    <section class="terms-section" id="acceptance">
                        <div class="terms-section-label">Section 01</div>
                        <h2>Acceptance of Terms</h2>

                        <p class="terms-text">
                            <strong>Fluidstream Inc.</strong> (“Fluidstream,” “we,” “us,” or “our”) operates this website
                            located at <strong>www.fluidstream.co</strong> for informational, commercial, technical, and
                            client-service purposes.
                        </p>

                        <p class="terms-text">
                            By accessing or using this website, you agree to be bound by these Terms of Use and by any
                            policies incorporated by reference. If you do not agree with these Terms, you should not access
                            or use this website.
                        </p>

                        <div class="terms-callout">
                            <span class="terms-callout-title">Scope of these Terms</span>
                            <p>
                                These Terms apply to website content, technical information, product information, case
                                studies, application materials, analysis outputs, and other materials made available through
                                this website.
                            </p>
                        </div>
                    </section>

                    <section class="terms-section" id="ip">
                        <div class="terms-section-label">Section 02</div>
                        <h2>Intellectual property, trademarks, and content protection</h2>

                        <p class="terms-lead">
                            Fluidstream’s website content, technical materials, product descriptions, case studies, visual
                            design, graphics, data, software, and overall presentation are protected intellectual property.
                        </p>

                        <p class="terms-text">
                            All content on this website, including text, technical descriptions, product information,
                            graphics, images, logos, software, design, layouts, and the compilation of materials, is owned
                            by or licensed to Fluidstream Inc. and is protected under Canadian and international
                            intellectual
                            property laws.
                        </p>

                        <p class="terms-text">
                            The Fluidstream name, logo, MultiphaseCommander™, VaporCommander™, CompressionCommander™,
                            product names, marks, and associated trade dress are trademarks or identifiers of Fluidstream
                            Inc. Nothing on this website grants any licence or right to use any Fluidstream trademark,
                            brand element, product name, or trade dress without Fluidstream’s prior written consent.
                        </p>

                        <div class="terms-callout dark">
                            <span class="terms-callout-title">Unauthorized use is prohibited</span>
                            <p>
                                Unauthorized copying, reproduction, scraping, extraction, reverse engineering,
                                republication, redistribution, derivative use, or commercial use of Fluidstream content,
                                technical data, product information, methodology, or website design is prohibited without
                                prior written authorization from Fluidstream.
                            </p>
                        </div>

                        <ul class="terms-list">
                            <li>Using bots, crawlers, scrapers, or automated tools to extract content or data from this
                                website.</li>
                            <li>Reverse engineering, decompiling, disassembling, or attempting to derive underlying
                                technology, methodologies, systems, or source code from any part of this website.</li>
                            <li>Copying or replicating Fluidstream’s website design, layouts, technical content, product
                                descriptions, case studies, or specification language for competitive or unauthorized
                                commercial purposes.</li>
                            <li>Circumventing technical protection measures deployed on this website.</li>
                            <li>Using Fluidstream content, technical papers, product specifications, case studies, analysis
                                outputs, or website materials to train artificial intelligence or machine learning models
                                without Fluidstream’s express written consent.</li>
                            <li>Reproducing, republishing, redistributing, or commercially exploiting Fluidstream technical
                                data, methodology, product information, or website content without express written
                                authorization.</li>
                        </ul>

                        <p class="terms-text">
                            Fluidstream grants you a limited, revocable, non-exclusive, non-transferable licence to access
                            and view this website solely for legitimate business, professional, engineering, commercial, or
                            internal informational purposes. Any unauthorized use terminates this licence immediately.
                        </p>
                    </section>

                    <section class="terms-section" id="technical">
                        <div class="terms-section-label">Section 03</div>
                        <h2>Client Technical Data and website-based analysis</h2>

                        <p class="terms-text">
                            Clients and prospective clients may voluntarily submit technical, operational, process,
                            production, facility, emissions, equipment, or application-related information to Fluidstream
                            through this website or through channels linked to it for the purpose of receiving analysis,
                            evaluation, application review, technical feedback, or solution development.
                        </p>

                        <div class="terms-grid-2">
                            <div class="terms-mini-card">
                                <h3>Client responsibility</h3>
                                <p>
                                    Any information submitted to Fluidstream must be accurate, complete, current, and
                                    appropriate for the requested review.
                                </p>
                            </div>

                            <div class="terms-mini-card">
                                <h3>Technical reliance</h3>
                                <p>
                                    Fluidstream is not responsible for results, recommendations, or decisions based on
                                    incomplete, inaccurate, outdated, or erroneous client-supplied information.
                                </p>
                            </div>
                        </div>

                        <div class="terms-callout">
                            <span class="terms-callout-title">No guaranteed outcome</span>
                            <p>
                                Fluidstream does not guarantee any specific outcome, production result, emissions result,
                                economic result, operational result, equipment performance, or commercial result from any
                                website-based content, analysis, recommendation, case study, or technical discussion.
                            </p>
                        </div>
                    </section>

                    <section class="terms-section" id="no-certification">
                        <div class="terms-section-label">Section 04</div>
                        <h2>No engineering certification, field validation, or binding offer</h2>

                        <p class="terms-lead">
                            Fluidstream website content and website-based analysis are intended to support informed
                            technical and commercial discussion, not to replace project-specific engineering, field
                            validation, contractual specifications, or regulatory review.
                        </p>

                        <p class="terms-text">
                            Information, analysis, and recommendations provided through this website are intended for
                            general informational and preliminary evaluation purposes only and do not constitute
                            professional
                            engineering certification, field validation, site-specific design approval, operational
                            instruction, safety instruction, or regulatory compliance advice.
                        </p>

                        <p class="terms-text">
                            Website content, product descriptions, case studies, specifications, performance discussions,
                            application examples, and technical materials do not constitute a binding commercial offer,
                            guaranteed specification, guaranteed availability commitment, guaranteed field result, or
                            warranty of suitability for any particular application.
                        </p>

                        <p class="terms-text">
                            Any project-specific scope, performance expectation, engineering responsibility, warranty,
                            commercial commitment, or deliverable must be set out in a written proposal, quotation,
                            purchase order, contract, technical agreement, or other written agreement executed or accepted
                            by Fluidstream.
                        </p>
                    </section>

                    <section class="terms-section" id="warranties">
                        <div class="terms-section-label">Section 05</div>
                        <h2>Disclaimer of warranties</h2>

                        <p class="terms-text">
                            This website and all content are provided on an <strong>“as is”</strong> and
                            <strong>“as available”</strong> basis. To the maximum extent permitted by applicable law,
                            Fluidstream disclaims all warranties, representations, and conditions of any kind, whether
                            express, implied, statutory, or otherwise, including warranties of accuracy, completeness,
                            reliability, non-infringement, merchantability, fitness for a particular purpose, uninterrupted
                            availability, or error-free operation.
                        </p>

                        <p class="terms-text">
                            Fluidstream does not warrant that this website, content, server environment, or any linked
                            functionality will be continuously available, free from interruption, free from harmful
                            components, or free from errors, omissions, inaccuracies, or security incidents.
                        </p>
                    </section>

                    <section class="terms-section" id="liability">
                        <div class="terms-section-label">Section 06</div>
                        <h2>Limitation of liability</h2>

                        <p class="terms-text">
                            To the maximum extent permitted by applicable law, Fluidstream Inc. and its directors, officers,
                            employees, contractors, and agents shall not be liable for any direct, indirect, incidental,
                            consequential, special, punitive, exemplary, operational, financial, regulatory,
                            production-related, emissions-related, or business damages arising out of or relating to the use
                            of this website, its content, or any analysis, recommendation, or information provided through
                            it.
                        </p>

                        <ul class="terms-list">
                            <li>Access to or use of this website, content, technical information, or website materials.</li>
                            <li>Any decision made in reliance on content, analysis, recommendation, case study,
                                specification, or product information found on this website.</li>
                            <li>Any analysis, recommendation, or technical output produced from Client Technical Data
                                submitted through this website or related channels.</li>
                            <li>Any errors, omissions, inaccuracies, incompleteness, or unavailability affecting website
                                content or analysis output.</li>
                            <li>Any interruption, unavailability, security breach, data transmission issue, or website
                                performance issue.</li>
                        </ul>

                        <div class="terms-callout dark">
                            <span class="terms-callout-title">Liability cap</span>
                            <p>
                                Where liability cannot be fully excluded under applicable law, Fluidstream’s total aggregate
                                liability arising out of or relating to this website, its content, or any associated
                                analysis
                                or recommendation shall not exceed <strong>CAD $100</strong>.
                            </p>
                        </div>
                    </section>

                    <section class="terms-section" id="indemnity">
                        <div class="terms-section-label">Section 07</div>
                        <h2>Indemnification</h2>

                        <p class="terms-text">
                            You agree to indemnify, defend, and hold harmless Fluidstream Inc. and its directors, officers,
                            employees, contractors, and agents from and against any claims, liabilities, damages, losses,
                            costs, and expenses, including reasonable legal fees, arising out of or related to your use of
                            this website, any decision made based on content or analysis found on or provided through this
                            website, your submitted information, your violation of these Terms, or your violation of any
                            applicable law or third-party right.
                        </p>
                    </section>

                    <section class="terms-section" id="prohibited">
                        <div class="terms-section-label">Section 08</div>
                        <h2>Prohibited uses</h2>

                        <p class="terms-text">
                            You agree not to use this website for any unlawful, harmful, abusive, fraudulent, unauthorized,
                            competitive, or disruptive purpose.
                        </p>

                        <ul class="terms-list">
                            <li>Transmitting malicious code, harmful files, or disruptive content.</li>
                            <li>Attempting unauthorized access to any Fluidstream system, server, database, account, or
                                network.</li>
                            <li>Collecting personal information of other users.</li>
                            <li>Impersonating Fluidstream, its personnel, representatives, clients, or partners.</li>
                            <li>Using content for unauthorized commercial copying, competitive intelligence, reverse
                                engineering, benchmarking, scraping, or artificial intelligence training.</li>
                            <li>Interfering with website security, performance, availability, or technical protection
                                measures.</li>
                        </ul>
                    </section>

                    <section class="terms-section" id="links">
                        <div class="terms-section-label">Section 09</div>
                        <h2>Third-party links</h2>

                        <p class="terms-text">
                            This website may contain links to third-party websites, tools, platforms, or resources for
                            convenience or reference. Fluidstream does not control third-party websites and is not
                            responsible for their content, security, availability, accuracy, privacy practices, or terms.
                            Inclusion of a third-party link does not constitute endorsement by Fluidstream.
                        </p>
                    </section>

                    <section class="terms-section" id="international">
                        <div class="terms-section-label">Section 10</div>
                        <h2>International users</h2>

                        <p class="terms-text">
                            This website is operated from Calgary, Alberta, Canada. If you access this website from outside
                            Canada, you are responsible for compliance with any local laws that may apply to your access or
                            use.
                        </p>

                        <p class="terms-text">
                            By using this website, you acknowledge that these Terms are governed by the laws of Alberta and
                            the federal laws of Canada applicable therein, and that disputes relating to this website are
                            subject to the jurisdiction provisions set out in these Terms.
                        </p>

                        <p class="terms-text">
                            Any claim arising from or relating to this website, its content, or website-based analysis must
                            be brought within <strong>one (1) year</strong> of the event giving rise to the claim, unless a
                            shorter or longer period is required by applicable law.
                        </p>
                    </section>

                    <section class="terms-section" id="law">
                        <div class="terms-section-label">Section 11</div>
                        <h2>Governing law and jurisdiction</h2>

                        <p class="terms-text">
                            These Terms are governed exclusively by the laws of the Province of <strong>Alberta</strong> and
                            the federal laws of <strong>Canada</strong> applicable therein, without regard to
                            conflict-of-law principles.
                        </p>

                        <p class="terms-text">
                            Subject to any mandatory legal requirements that cannot be excluded, any dispute arising out of
                            or relating to this website, its content, or these Terms shall be resolved exclusively in the
                            courts of Alberta, Canada.
                        </p>
                    </section>

                    <section class="terms-section" id="privacy">
                        <div class="terms-section-label">Section 12</div>
                        <h2>Privacy and submitted information</h2>

                        <p class="terms-text">
                            Fluidstream’s handling of personal information and Client Technical Data submitted through this
                            website is described in the <a class="terms-link" href="/privacy-policy">Privacy Policy</a>. By
                            using this website or submitting information through it, you acknowledge that information may be
                            collected, used, disclosed, retained, and protected as described in that policy.
                        </p>
                    </section>

                    <section class="terms-section" id="updates">
                        <div class="terms-section-label">Section 13</div>
                        <h2>Changes to these Terms</h2>

                        <p class="terms-text">
                            Fluidstream may update these Terms at any time by posting a revised version on this website.
                            Updates are effective immediately upon posting unless otherwise stated. Continued use of this
                            website after updates are posted constitutes acceptance of the revised Terms.
                        </p>
                    </section>

                    <section class="terms-section" id="contact">
                        <div class="terms-section-label">Section 14</div>
                        <h2>Contact</h2>

                        <p class="terms-text">
                            Questions about these Terms may be submitted through the <a class="terms-link"
                                href="/contact">Contact Us</a> page.
                        </p>

                        <p class="terms-text">
                            For privacy-related questions or access requests, please refer to the
                            <a class="terms-link" href="/privacy-policy">Fluidstream Privacy Policy</a>.
                        </p>
                    </section>
                </article>
            </div>
        </main>

        {{-- <section class="terms-cta">
            <div class="terms-wrap terms-cta-inner">
                <div>
                    <div class="terms-eyebrow" style="color: var(--fs-blue);">Need clarification?</div>

                    <h2>Contact Fluidstream before relying on website-based technical information.</h2>

                    <p>
                        Website information supports initial technical and commercial discussion. Project-specific
                        responsibility, performance expectations, warranty, and deliverables must be confirmed through a
                        written proposal, quotation, purchase order, contract, or technical agreement accepted by
                        Fluidstream.
                    </p>

                    <div class="terms-hero-actions">
                        <a class="terms-btn terms-btn-primary" style="background: var(--fs-blue); color: #fff !important;"
                            href="/contact">Contact Fluidstream</a>
                        <a class="terms-btn"
                            style="border-color: rgba(0, 24, 220, .25); color: var(--fs-blue) !important; background: #fff;"
                            href="/privacy-policy">Privacy Policy</a>
                    </div>
                </div>

                <div class="terms-cta-panel">
                    <h3>Before submitting technical data</h3>

                    <ul>
                        <li>Confirm whether a non-disclosure agreement is required.</li>
                        <li>Submit only information necessary for the technical review.</li>
                        <li>Do not rely on website content as final engineering certification.</li>
                        <li>Confirm project-specific scope, warranties, and deliverables in writing.</li>
                    </ul>
                </div>
            </div>
        </section> --}}
    </div>
@endsection