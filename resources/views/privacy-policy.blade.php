{{-- resources/views/privacy-policy.blade.php --}}
@extends('layouts.app')

@section('title', 'Privacy Policy | Fluidstream')

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

        .privacy-page {
            color: var(--fs-text);
            background: var(--fs-white);
            line-height: 1.68;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        .privacy-page * {
            box-sizing: border-box;
        }

        .privacy-page a {
            color: inherit;
            text-decoration: none;
        }

        .privacy-page p {
            margin: 0 0 1.18rem;
        }

        .privacy-wrap {
            width: min(var(--fs-max), calc(100% - 40px));
            margin: 0 auto;
        }

        .privacy-hero {
            position: relative;
            overflow: hidden;
            background: #0018dc;
            color: #ffffff;
        }

        .privacy-hero::before {
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

        .privacy-hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.16fr .84fr;
            gap: 58px;
            align-items: center;
            padding: 82px 0 76px;
        }

        .privacy-eyebrow {
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

        .privacy-eyebrow::before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: var(--fs-cyan);
            box-shadow: 0 0 0 6px rgba(21, 209, 255, .14);
        }

        .privacy-hero h1 {
            margin: 0 0 24px;
            max-width: 900px;
            color: #ffffff;
            font-size: clamp(34px, 5vw, 62px);
            line-height: .98;
            letter-spacing: -.07em;
            font-weight: 900;
        }



        .privacy-hero-text {
            max-width: 780px;
            color: rgba(255, 255, 255, .84);
            font-size: clamp(15px, 1.4vw, 18px);
            line-height: 1.72;
        }

        .privacy-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 28px;
        }

        .privacy-btn {
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

        .privacy-btn:hover {
            transform: translateY(-2px);
        }

        .privacy-btn-primary {
            background: #ffffff;
            color: var(--fs-blue) !important;
            box-shadow: 0 18px 38px rgba(0, 0, 0, .18);
        }

        .privacy-btn-outline {
            color: #ffffff !important;
            border-color: rgba(255, 255, 255, .34);
            background: rgba(255, 255, 255, .08);
        }

        .privacy-summary-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .20);
            background: rgba(255, 255, 255, .10);
            backdrop-filter: blur(16px);
            border-radius: 7px;
            padding: 28px;
            /* box-shadow: 0 24px 70px rgba(0, 0, 0, .22); */
        }

        .privacy-summary-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(21, 209, 255, .22), transparent 34%);
            pointer-events: none;
        }

        .privacy-summary-card h2 {
            position: relative;
            z-index: 1;
            margin: 0 0 16px;
            color: #ffffff;
            font-size: 22px;
            line-height: 1.2;
            letter-spacing: -.03em;
            font-weight: 900;
        }

        .privacy-summary-list {
            position: relative;
            z-index: 1;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .privacy-summary-list li {
            position: relative;
            padding: 14px 0 14px 28px;
            border-top: 1px solid rgba(255, 255, 255, .14);
            color: rgba(255, 255, 255, .84);
            font-size: 14px;
            line-height: 1.55;
        }

        .privacy-summary-list li:first-child {
            border-top: 0;
        }

        .privacy-summary-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 22px;
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: white;
        }

        .privacy-main {
            background: var(--fs-soft);
            padding: 64px 0;
        }

        .privacy-shell {
            display: grid;
            grid-template-columns: 278px minmax(0, var(--fs-article));
            gap: 70px;
            align-items: start;
        }

        .privacy-toc {
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

        .privacy-toc::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            background: #cfd7e4;
        }

        .privacy-toc-title {
            display: none;
        }

        .privacy-toc a {
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

        .privacy-toc a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 3px;
            bottom: 3px;
            width: 4px;
            background: transparent;
            transition: background .22s ease;
        }

        .privacy-toc a:hover,
        .privacy-toc a.active {
            color: var(--fs-ink);
            text-shadow: .35px 0 0 var(--fs-ink);
        }

        .privacy-toc a:hover::before,
        .privacy-toc a.active::before {
            background: var(--fs-blue);
        }

        .privacy-card {
            overflow: hidden;
            border: 1px solid rgba(220, 227, 238, .86);
            border-radius: 14px;
            background: #ffffff;
            box-shadow: var(--fs-shadow-soft);
        }

        .privacy-meta-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--fs-line);
            border-bottom: 1px solid var(--fs-line);
        }

        .privacy-meta-item {
            background: #f8fafc;
            padding: 20px 22px;
        }

        .privacy-meta-item strong {
            display: block;
            margin-bottom: 6px;
            color: #64748b;
            font-size: 12px;
            letter-spacing: .11em;
            text-transform: uppercase;
            font-weight: 900;
        }

        .privacy-meta-item span {
            color: #0f172a;
            font-weight: 900;
        }

        .privacy-section {
            border-bottom: 1px solid var(--fs-line);
            padding: 38px 44px;
            scroll-margin-top: 12px;
        }

        .privacy-section:last-child {
            border-bottom: 0;
        }

        .privacy-section-label {
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

        .privacy-section-label::after {
            content: "";
            width: 42px;
            height: 1px;
            background: var(--fs-blue);
            opacity: .35;
        }

        .privacy-section h2 {
            margin: 0 0 16px;
            color: var(--fs-ink);
            font-size: clamp(1.8rem, 3vw, 2.32rem);
            line-height: 1.08;
            letter-spacing: -.052em;
            font-weight: 900;
        }

        .privacy-lead {
            margin: 1.1rem 0 2rem;
            padding-left: 1.22rem;
            border-left: 4px solid var(--fs-blue);
            color: #303b50;
            font-size: 1.1rem;
            line-height: 1.75;
        }

        .privacy-text {
            color: #465366;
        }

        .privacy-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin: 1.75rem 0 2.1rem;
        }

        .privacy-mini-card,
        .privacy-callout {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--fs-line);
            border-radius: 7px;
            background: #ffffff;
            box-shadow: 0 15px 40px rgba(6, 17, 38, .055);
            transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease;
        }

        .privacy-mini-card {
            min-height: 154px;
            padding: 24px;
        }

        .privacy-mini-card::after,
        .privacy-callout::after {
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

        .privacy-mini-card:hover,
        .privacy-callout:hover {
            transform: translateY(-3px);
            border-color: var(--fs-blue);
            box-shadow: var(--fs-shadow);
        }

        .privacy-mini-card:hover::after,
        .privacy-callout:hover::after {
            transform: scaleX(1);
        }

        .privacy-mini-card h3 {
            margin: 0 0 8px;
            color: var(--fs-ink);
            font-size: 1.14rem;
            letter-spacing: -.02em;
            font-weight: 900;
        }

        .privacy-mini-card p {
            margin: 0;
            color: var(--fs-muted);
            font-size: 14px;
            line-height: 1.65;
        }

        .privacy-callout {
            margin: 2rem 0;
            padding: 28px 30px;
            background: linear-gradient(135deg, #eef7ff00 0%, #ffffff 100%);
            color: #465366;
        }

        .privacy-callout-title {
            display: block;
            margin-bottom: .55rem;
            color: var(--fs-blue);
            font-size: 1.08rem;
            font-weight: 900;
        }

        .privacy-callout p:last-child {
            margin-bottom: 0;
        }

        .privacy-callout.dark {
            background: var(--fs-blue);
            border-color: var(--fs-blue);
            color: rgba(255, 255, 255, .84);
            box-shadow: 0 30px 90px rgba(0, 24, 220, .22);
        }

        .privacy-callout.dark .privacy-callout-title,
        .privacy-callout.dark strong {
            color: #ffffff;
        }

        .privacy-list {
            margin: 16px 0 0;
            padding: 0;
            list-style: none;
        }

        .privacy-list li {
            position: relative;
            margin: 0;
            padding: 12px 0 12px 32px;
            border-top: 1px solid #edf1f7;
            color: #465366;
        }

        .privacy-list li:first-child {
            border-top: 0;
        }

        .privacy-list li::before {
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

        .privacy-table-wrap {
            overflow-x: auto;
            margin: 22px 0;
            border: 1px solid var(--fs-line);
            border-radius: 14px;
            background: #ffffff;
        }

        .privacy-table {
            width: 100%;
            min-width: 640px;
            border-collapse: collapse;
        }

        .privacy-table th,
        .privacy-table td {
            padding: 16px 18px;
            border-bottom: 1px solid #edf1f7;
            text-align: left;
            vertical-align: top;
        }

        .privacy-table th {
            background: #f7f9fd;
            color: #1f2d43;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 900;
        }

        .privacy-table td {
            color: #465366;
        }

        .privacy-table tr:last-child td {
            border-bottom: 0;
        }

        .privacy-cta {
            background: #ffffff;
            padding: 64px 0;
        }

        .privacy-cta-inner {
            display: grid;
            grid-template-columns: 1fr .75fr;
            gap: 44px;
            align-items: center;
        }

        .privacy-cta h2 {
            margin: 0 0 1rem;
            color: var(--fs-ink);
            font-size: clamp(2rem, 4vw, 3.3rem);
            line-height: 1.05;
            letter-spacing: -.06em;
            font-weight: 900;
        }

        .privacy-cta p {
            color: var(--fs-muted);
            font-size: 1.05rem;
        }

        .privacy-cta-panel {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--fs-line);
            border-radius: 14px;
            padding: 28px;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(6, 17, 38, .07);
        }

        .privacy-cta-panel::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--fs-blue);
        }

        .privacy-cta-panel h3 {
            margin: 0 0 14px;
            color: var(--fs-ink);
            font-size: 1.3rem;
            letter-spacing: -.03em;
            font-weight: 900;
        }

        .privacy-cta-panel ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .privacy-cta-panel li {
            position: relative;
            margin: 0 0 14px;
            padding-left: 32px;
            color: #465366;
            line-height: 1.6;
        }

        .privacy-cta-panel li:last-child {
            margin-bottom: 0;
        }

        .privacy-cta-panel li::before {
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

            .privacy-hero-grid,
            .privacy-shell,
            .privacy-cta-inner {
                grid-template-columns: 1fr;
            }

            .privacy-toc {
                position: static;
                margin: 0 0 28px;
            }

            .privacy-grid-2,
            .privacy-meta-strip {
                grid-template-columns: 1fr;
            }

            .privacy-section {
                padding: 32px 26px;
                scroll-margin-top: 76px;
            }

            html {
                scroll-padding-top: 90px;
            }
        }

        @media (max-width: 620px) {
            .privacy-wrap {
                width: min(var(--fs-max), calc(100% - 28px));
            }

            .privacy-hero-grid {
                padding: 62px 0 54px;
            }

            .privacy-hero h1 {
                font-size: 2.55rem;
            }

            .privacy-summary-card,
            .privacy-callout,
            .privacy-cta-panel {
                padding: 22px;
            }

            .privacy-toc a {
                font-size: 15px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tocLinks = Array.from(document.querySelectorAll('.privacy-toc a[href^="#"]'));

            const sections = tocLinks
                .map(function (link) {
                    return document.querySelector(link.getAttribute('href'));
                })
                .filter(Boolean);

            if (!tocLinks.length || !sections.length) return;

            function getHeaderOffset() {
                const header =
                    document.querySelector('.site-header') ||
                    document.querySelector('.header') ||
                    document.querySelector('header');

                const headerHeight = header ? header.offsetHeight : 0;

                /*
                    14px gives a small clean breathing space.
                    If your header is not sticky, this will stay small.
                */
                return headerHeight > 0 ? headerHeight + 14 : 24;
            }

            function setActive(id) {
                tocLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                });
            }

            function updateActiveOnScroll() {
                const offset = getHeaderOffset();
                let currentId = sections[0].id;

                sections.forEach(function (section) {
                    const sectionTop = section.getBoundingClientRect().top;

                    if (sectionTop <= offset + 40) {
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

                    const offset = getHeaderOffset();

                    const targetPosition =
                        targetSection.getBoundingClientRect().top +
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
                                                                "name": "Privacy Policy",
                                                                "headline": "Privacy Policy",
                                                                "description": "How Fluidstream handles personal information and client technical data submitted through its website.",
                                                                "url": "https://fluidstream.nexolioit.com/privacy-policy",
                                                                "publisher": {
                                                                    "@type": "Organization",
                                                                    "name": "Fluidstream"
                                                                }
                                                            }
                                                            </script>

    <div class="privacy-page">
        <section class="privacy-hero">
            <div class="privacy-wrap privacy-hero-grid">
                <div>

                    <h1>
                        How Fluidstream protects
                        <span>personal information and technical data.</span>
                    </h1>

                    <p class="privacy-hero-text">
                        Fluidstream is a business-to-business industrial technology company. This Policy explains how
                        information submitted through the Fluidstream website is collected, used, protected, disclosed, and
                        retained, including client technical information provided for application review or engineering
                        evaluation.
                    </p>

                    <div class="privacy-hero-actions">
                        <a class="privacy-btn privacy-btn-primary" href="/contact">Contact Fluidstream</a>
                        <a class="privacy-btn privacy-btn-outline" href="/terms">Terms of Use</a>
                    </div>
                </div>

                <aside class="privacy-summary-card" aria-label="Privacy policy summary">
                    <h2>Policy Overview</h2>

                    <ul class="privacy-summary-list">
                        <li>Privacy practices aligned with applicable Canadian privacy laws, including PIPEDA and Alberta
                            PIPA.</li>
                        <li>Client Technical Data submitted for application review is handled as confidential business
                            information.</li>
                        <li>Clear information on confidentiality, retention, security, disclosure, and privacy rights.</li>
                    </ul>
                </aside>
            </div>
        </section>

        <main class="privacy-main">
            <div class="privacy-wrap privacy-shell">
                <aside class="privacy-toc" aria-label="Privacy policy sections">
                    <div class="privacy-toc-title">On This Page</div>
                    <a href="#introduction">Introduction</a>
                    <a href="#collection">Information We Collect</a>
                    <a href="#cookies">Cookies & Analytics</a>
                    <a href="#use">How We Use Information</a>
                    <a href="#disclosure">Disclosure</a>
                    <a href="#confidentiality">Client Technical Data</a>
                    <a href="#security">Security</a>
                    <a href="#retention">Retention</a>
                    <a href="#rights">Privacy Rights</a>
                    <a href="#international">International Users</a>
                    <a href="#minors">Minors</a>
                    <a href="#changes">Changes</a>
                    <a href="#contact">Contact</a>
                </aside>

                <article class="privacy-card">
                    <div class="privacy-meta-strip">
                        <div class="privacy-meta-item">
                            <strong>Company</strong>
                            <span>Fluidstream Inc.</span>
                        </div>

                        <div class="privacy-meta-item">
                            <strong>Jurisdiction</strong>
                            <span>Calgary, Alberta, Canada</span>
                        </div>

                        <div class="privacy-meta-item">
                            <strong>Effective</strong>
                            <span>May 7, 2026</span>
                        </div>
                    </div>

                    <section class="privacy-section" id="introduction">
                        <div class="privacy-section-label">Section 01</div>
                        <h2>Introduction</h2>

                        <p class="privacy-lead">
                            Fluidstream Inc. (“Fluidstream,” “we,” “us,” or “our”) is incorporated under the laws of
                            Alberta, Canada. This Privacy Policy explains how we collect, use, disclose, protect, and retain
                            personal information and client technical information in connection with the Fluidstream
                            website.
                        </p>

                        <p class="privacy-text">
                            Fluidstream is committed to handling information responsibly and in accordance with applicable
                            Canadian privacy laws, including the Personal Information Protection and Electronic Documents
                            Act (PIPEDA) and Alberta’s Personal Information Protection Act (PIPA), where applicable.
                        </p>

                        <div class="privacy-callout">
                            <span class="privacy-callout-title">User acknowledgement</span>
                            <p>
                                By using this website or submitting information through it, you acknowledge the collection,
                                use, disclosure, and retention of information as described in this Policy. If you do not
                                agree with this Policy, please discontinue use of the website.
                            </p>
                        </div>
                    </section>

                    <section class="privacy-section" id="collection">
                        <div class="privacy-section-label">Section 02</div>
                        <h2>Information we collect</h2>

                        <div class="privacy-grid-2">
                            <div class="privacy-mini-card">
                                <h3>Personal information</h3>
                                <p>
                                    Information voluntarily submitted through contact, inquiry, or technical review forms,
                                    including name, business email address, phone number, company name, job title, general
                                    location, and correspondence.
                                </p>
                            </div>

                            <div class="privacy-mini-card">
                                <h3>Website information</h3>
                                <p>
                                    Technical information collected through normal website operation, such as IP address,
                                    browser type, device information, referring pages, session activity, cookies, and
                                    analytics data.
                                </p>
                            </div>
                        </div>

                        <div class="privacy-callout dark">
                            <span class="privacy-callout-title">Client Technical Data</span>
                            <p>
                                Clients and prospective clients may submit operational, production, facility, emissions,
                                process, equipment, or application-specific information for technical review, evaluation, or
                                solution development. Fluidstream treats this information as confidential business
                                information.
                            </p>
                        </div>

                        <p class="privacy-text">
                            Client Technical Data may include operating pressures, flow conditions, facility constraints,
                            process data, production information, equipment configuration, performance metrics, application
                            requirements, or other technical information submitted to Fluidstream for analysis or engagement
                            purposes.
                        </p>
                    </section>

                    <section class="privacy-section" id="cookies">
                        <div class="privacy-section-label">Section 03</div>
                        <h2>Cookies, analytics, and tracking technologies</h2>

                        <p class="privacy-text">
                            This website may use cookies, analytics tools, and similar technologies to operate properly,
                            improve performance, understand visitor activity, and support business-to-business engagement.
                            Cookies are small files stored by your browser when you visit a website.
                        </p>

                        <div class="privacy-table-wrap">
                            <table class="privacy-table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Purpose</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Strictly necessary</td>
                                        <td>Required for basic website functionality, security, page loading, and
                                            navigation.</td>
                                        <td>Generally cannot be disabled without affecting site function.</td>
                                    </tr>
                                    <tr>
                                        <td>Analytics</td>
                                        <td>Used to understand aggregate visitor behaviour and improve website content,
                                            structure, and performance.</td>
                                        <td>Can typically be restricted through browser settings or analytics opt-out tools.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Functional</td>
                                        <td>Used to remember preferences or improve user experience where applicable.</td>
                                        <td>Can typically be disabled through browser settings.</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing or remarketing</td>
                                        <td>May be used if Fluidstream deploys advertising, LinkedIn, or similar
                                            business-development tracking tools.</td>
                                        <td>Can typically be managed through browser, platform, or advertising preference
                                            settings.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="privacy-text">
                            Fluidstream may use third-party analytics or business tools, such as Google Analytics, LinkedIn
                            tools, hosting analytics, security tools, or similar services. These providers may process
                            information according to their own privacy policies and contractual obligations.
                        </p>
                    </section>

                    <section class="privacy-section" id="use">
                        <div class="privacy-section-label">Section 04</div>
                        <h2>How we use information</h2>

                        <p class="privacy-text">
                            Fluidstream uses personal information and Client Technical Data only for reasonable business,
                            technical, operational, and legal purposes related to Fluidstream’s website, products, services,
                            and client engagement.
                        </p>

                        <ul class="privacy-list">
                            <li>Responding to inquiries, technical review requests, and contact form submissions.</li>
                            <li>Evaluating applications, operating conditions, facility constraints, and fit for Fluidstream
                                solutions.</li>
                            <li>Providing technical feedback, recommendations, proposals, support, or follow-up
                                communication.</li>
                            <li>Operating, maintaining, securing, and improving the website.</li>
                            <li>Understanding website performance and visitor engagement using aggregated or anonymized
                                analytics where practical.</li>
                            <li>Sending business communications where permitted by consent and applicable law, including
                                Canada’s Anti-Spam Legislation (CASL).</li>
                            <li>Complying with applicable legal, regulatory, contractual, and recordkeeping obligations.
                            </li>
                        </ul>

                        <div class="privacy-callout">
                            <span class="privacy-callout-title">Technical recommendation note</span>
                            <p>
                                Any technical recommendation or discussion provided by Fluidstream based on submitted
                                information is subject to the applicable proposal, contract, technical agreement, or Terms
                                of Use.
                            </p>
                        </div>
                    </section>

                    <section class="privacy-section" id="disclosure">
                        <div class="privacy-section-label">Section 05</div>
                        <h2>Disclosure of information</h2>

                        <p class="privacy-text">
                            Fluidstream does not sell, rent, or trade personal information or Client Technical Data.
                            Information is disclosed only where necessary for legitimate business, technical, legal, or
                            operational purposes.
                        </p>

                        <ul class="privacy-list">
                            <li><strong>Service providers:</strong> trusted providers supporting website hosting, IT,
                                analytics, communications, security, or business operations.</li>
                            <li><strong>Legal requirements:</strong> where required by law, court order, regulator, lawful
                                request, or legal process.</li>
                            <li><strong>Business transactions:</strong> where reasonably necessary in connection with a
                                sale, merger, financing, restructuring, or transfer of all or part of Fluidstream’s
                                business, subject to confidentiality protections.</li>
                            <li><strong>Protection of rights:</strong> where necessary to protect Fluidstream, its clients,
                                personnel, intellectual property, systems, or website operations.</li>
                        </ul>
                    </section>

                    <section class="privacy-section" id="confidentiality">
                        <div class="privacy-section-label">Section 06</div>
                        <h2>Confidentiality of Client Technical Data</h2>

                        <p class="privacy-lead">
                            Fluidstream recognizes that technical information submitted for application review may include
                            commercially sensitive operational, production, facility, emissions, or engineering information.
                        </p>

                        <p class="privacy-text">
                            Client Technical Data is treated as confidential business information and used only for the
                            purpose for which it was submitted, including technical review, application assessment, solution
                            development, proposal preparation, support, or client engagement.
                        </p>

                        <div class="privacy-grid-2">
                            <div class="privacy-mini-card">
                                <h3>Restricted use</h3>
                                <p>Client Technical Data is not sold, rented, or used for unrelated commercial purposes.</p>
                            </div>

                            <div class="privacy-mini-card">
                                <h3>Controlled access</h3>
                                <p>Access is limited to personnel, contractors, or service providers with a legitimate need
                                    to support the engagement.</p>
                            </div>
                        </div>

                        <div class="privacy-callout">
                            <span class="privacy-callout-title">NDA recommendation</span>
                            <p>
                                Clients with heightened confidentiality requirements are encouraged to execute a formal
                                non-disclosure agreement with Fluidstream before submitting sensitive technical or
                                commercial information.
                            </p>
                        </div>
                    </section>

                    <section class="privacy-section" id="security">
                        <div class="privacy-section-label">Section 07</div>
                        <h2>Data security and protection</h2>

                        <p class="privacy-text">
                            Fluidstream uses commercially reasonable administrative, technical, and organizational
                            safeguards designed to protect personal information and Client Technical Data against
                            unauthorized access, loss, disclosure, alteration, or misuse.
                        </p>

                        <ul class="privacy-list">
                            <li>Encryption in transit where supported by the website and service environment.</li>
                            <li>Restricted access controls for systems and information used in business operations.</li>
                            <li>Security monitoring, hosting controls, and periodic review of website and
                                information-handling practices.</li>
                            <li>Contractual or operational safeguards for service providers that process information on
                                Fluidstream’s behalf.</li>
                        </ul>

                        <div class="privacy-callout dark">
                            <span class="privacy-callout-title">Security limitation</span>
                            <p>
                                No internet transmission or electronic storage method can be guaranteed completely secure.
                                Fluidstream applies commercially reasonable safeguards, but users should avoid submitting
                                highly sensitive information unless appropriate confidentiality and transmission
                                arrangements are in place.
                            </p>
                        </div>

                        <p class="privacy-text">
                            If a privacy breach creates a real risk of significant harm, Fluidstream will take steps
                            required under applicable Canadian privacy law, including notification to affected individuals
                            and reporting to the Office of the Privacy Commissioner of Canada where required.
                        </p>
                    </section>

                    <section class="privacy-section" id="retention">
                        <div class="privacy-section-label">Section 08</div>
                        <h2>Data retention</h2>

                        <p class="privacy-text">
                            Fluidstream retains personal information and Client Technical Data only as long as reasonably
                            necessary for the purposes for which it was collected, for legitimate business or technical
                            engagement purposes, or as required by applicable law.
                        </p>

                        <p class="privacy-text">
                            When information is no longer required, Fluidstream takes reasonable steps to securely destroy,
                            delete, or anonymize it. Client Technical Data submitted for a specific project or application
                            review will not be retained beyond the completion of that engagement unless retention is
                            required by law, reasonably necessary for business records, or otherwise agreed in writing.
                        </p>
                    </section>

                    <section class="privacy-section" id="rights">
                        <div class="privacy-section-label">Section 09</div>
                        <h2>Your privacy rights</h2>

                        <p class="privacy-text">
                            Subject to applicable legal exceptions, you may request access to personal information
                            Fluidstream holds about you, request correction of inaccurate or incomplete information,
                            withdraw consent to certain uses, and opt out of marketing communications.
                        </p>

                        <p class="privacy-text">
                            To exercise privacy rights, please contact Fluidstream through the <a href="/contact">Contact
                                Us</a> page. Fluidstream will respond within a reasonable period and within timeframes
                            required by applicable Canadian privacy law.
                        </p>
                    </section>

                    <section class="privacy-section" id="international">
                        <div class="privacy-section-label">Section 10</div>
                        <h2>International users</h2>

                        <p class="privacy-text">
                            This website is operated from Calgary, Alberta, Canada. Information submitted through the
                            website may be stored or processed in Canada and may be subject to Canadian privacy law.
                        </p>

                        <p class="privacy-text">
                            Some service providers may process information outside Canada. Where this occurs, Fluidstream
                            takes reasonable steps to ensure appropriate safeguards are in place consistent with applicable
                            Canadian privacy requirements. Information processed outside Canada may also be subject to the
                            laws of the jurisdiction where it is processed.
                        </p>
                    </section>

                    <section class="privacy-section" id="minors">
                        <div class="privacy-section-label">Section 11</div>
                        <h2>Minors</h2>

                        <p class="privacy-text">
                            This website is intended for business and professional use by individuals 18 years of age or
                            older. Fluidstream does not knowingly collect personal information from minors. If you believe a
                            minor has submitted information to Fluidstream, please contact us through the <a
                                href="/contact">Contact Us</a> page and we will take reasonable steps to delete it.
                        </p>
                    </section>

                    <section class="privacy-section" id="changes">
                        <div class="privacy-section-label">Section 12</div>
                        <h2>Changes to this Policy</h2>

                        <p class="privacy-text">
                            Fluidstream may update this Privacy Policy from time to time. Updates are effective when posted
                            on this page, unless otherwise stated. The effective date above indicates when this Policy was
                            last materially updated.
                        </p>
                    </section>

                    <section class="privacy-section" id="contact">
                        <div class="privacy-section-label">Section 13</div>
                        <h2>Contact</h2>

                        <p class="privacy-text">
                            For privacy questions, access requests, correction requests, consent withdrawals, or related
                            concerns, please contact Fluidstream through the <a href="/contact">Contact Us</a> page.
                        </p>

                        <p class="privacy-text">
                            For legal terms governing use of the website, please refer to Fluidstream’s <a
                                href="/terms">Terms of Use</a>.
                        </p>
                    </section>
                </article>
            </div>
        </main>
    </div>
@endsection