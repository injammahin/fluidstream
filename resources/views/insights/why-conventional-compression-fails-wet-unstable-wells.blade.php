@extends('layouts.app')

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
            color: #fff;
            background: #0018dc;
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
            color: rgba(255, 255, 255, .84);
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
            /* box-shadow: 0 18px 38px rgba(0, 0, 0, .22); */
        }

        .btn-blue {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 18px 38px rgba(0, 24, 220, .20);
        }

        .btn-outline {
            color: #fff;
            border-color: rgba(255, 255, 255, .34);
            background: rgba(255, 255, 255, .08);
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
            border: 1px solid rgba(255, 255, 255, .20);
            background: #fff;
            backdrop-filter: blur(16px);
            border-radius: 7px;
            padding: 26px;
            box-shadow: 0 24px 70px rgba(0, 0, 0, .22);
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
            border: 1px solid rgba(255, 255, 255, .18);
            background: #fff;
            border-radius: 7px;
            padding: 18px;
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
            border-left: 4px solid #0018dc;
            padding-left: 1.22rem;
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
        .line-card:hover,
        .stat-card:hover,
        .callout:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff;
        }

        .fs-card:hover::after,
        .cta-panel:hover::after,
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



    <section class="hero">
        <div class="wrap hero-grid py-12">
            <div>
                <div class="eyebrow">Technical Article / Casing Gas Reliability</div>
                <h1>Why Conventional Casing Gas Compressors Fail in Wet / Unstable Wells</h1>
                <p class="hero-lede">A field-focused guide to why dry-gas compressor assumptions break down in casing gas
                    service, and how wet gas, unstable production, liquid carryover, separator dependence, winter
                    conditions, and downtime affect real project economics.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/compressioncommander">Explore CompressionCommander™</a>
                    <a class="btn btn-outline" href="#case-study-proof">View Field Proof</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Casing gas compression is often selected as dry-gas service, but operated as wet, unstable field
                        service.</strong>
                    <p>That mismatch is why many conventional compressor packages struggle with uptime, maintenance, liquid
                        carryover, and project economics.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Wet gas reality</b><span>Liquids and unstable flow are common in casing gas
                            service.</span></div>
                    <div class="hero-mini"><b>Separator risk</b><span>Reliability depends on more than the compressor
                            alone.</span></div>
                    <div class="hero-mini"><b>Patent-supported</b><span>Fluidstream patents support liquid-influenced
                            compression response.</span></div>
                    <div class="hero-mini"><b>Field proof</b><span>Case study: two wells restored to revenue-generating
                            production.</span></div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area">
        <div class="wrap article-shell py-12">
            <aside class="toc" aria-label="Article contents">
                <a href="#not-dry-gas" class="active"><span>Not dry gas service</span></a>
                <a href="#wet-unstable-wells"><span>Wet and unstable wells</span></a>
                <a href="#entrained-liquids"><span>Entrained liquids</span></a>
                <a href="#separator-dependence"><span>Separator dependence</span></a>
                <a href="#winter-reliability"><span>Winter reliability</span></a>
                <a href="#downtime-economics"><span>Downtime economics</span></a>
                <a href="#lower-cost-risk"><span>Lower-cost package risk</span></a>
                <a href="#compressioncommander-fit"><span>CompressionCommander™ fit</span></a>
                <a href="#patents"><span>Patent-supported foundation</span></a>
                <a href="#case-study-proof"><span>Case study proof</span></a>
                <a href="#faq"><span>FAQ</span></a>
            </aside>

            <article>
                <section class="content-section" id="not-dry-gas">
                    <div class="article-card">
                        <div class="section-label">Field reality</div>
                        <h2>Casing gas compression is rarely dry, stable gas service.</h2>
                        <p class="lead">Many casing gas compression projects are engineered and selected as though the
                            compressor will operate in relatively dry, stable gas service.</p>
                        <p>In practice, casing gas applications often involve unstable production rates, entrained liquids,
                            pressure fluctuations, intermittent slugging, and changing gas-to-liquid ratios throughout the
                            life of the well.</p>
                        <p>This disconnect between assumed operating conditions and actual field conditions is one of the
                            primary reasons many conventional casing gas compression systems underperform in the field.</p>
                        <div class="callout"><span class="callout-title">Core takeaway</span>
                            <p>Conventional casing gas compressor failures often start with a design assumption problem: the
                                equipment is selected for dry gas, while the field delivers wet, unstable, liquid-influenced
                                service.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="wet-unstable-wells">
                    <div class="article-card">
                        <div class="section-label">Operating instability</div>
                        <h2>Why wet and unstable wells create compression challenges</h2>
                        <p>Wells experiencing liquid loading, intermittent production, changing reservoir pressure, or
                            unstable artificial lift behavior can produce casing gas streams that vary materially over time.
                            Gas rates may surge or decline rapidly, casing pressure may fluctuate, and liquid carryover may
                            occur intermittently or continuously depending on separator performance and field conditions.
                        </p>
                        <p>These operating realities can push conventional gas-only compression systems outside their
                            intended operating envelope.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Variable gas rates</h3>
                                <p>Unstable production can create operating swings that are difficult for fixed-envelope
                                    packages to manage.</p>
                            </div>
                            <div class="line-card">
                                <h3>Pressure fluctuations</h3>
                                <p>Changing casing and discharge pressures can reduce stability and increase shutdown
                                    frequency.</p>
                            </div>
                            <div class="line-card">
                                <h3>Liquid loading</h3>
                                <p>Loaded wells can introduce intermittent liquids and gas/liquid variability into the
                                    compression system.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Artificial lift interaction</h3>
                                <p>Well cycling and lift behavior can change gas flow, liquid fallback, and casing pressure
                                    response.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="entrained-liquids">
                    <div class="article-card">
                        <div class="section-label">Liquid carryover</div>
                        <h2>How entrained liquids cause conventional compressor problems</h2>
                        <p>Conventional gas compressors generally assume free liquids are removed upstream. When entrained
                            liquids reach the compressor, they can create valve damage, lubrication issues, mechanical
                            stress, increased shutdown frequency, and accelerated wear.</p>
                        <p>Even small quantities of intermittent liquid carryover can materially reduce reliability over
                            time.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Conventional assumption</h3>
                                <ul>
                                    <li>Free liquids are removed upstream</li>
                                    <li>Gas reaches the compressor dry and stable</li>
                                    <li>Slugging events are rare or abnormal</li>
                                    <li>Protective separation remains effective</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Field condition</h3>
                                <ul>
                                    <li>Liquid carryover can occur intermittently</li>
                                    <li>Wet gas conditions change over time</li>
                                    <li>Slugging may occur during instability</li>
                                    <li>Separator performance can vary in service</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="separator-dependence">
                    <div class="article-card">
                        <div class="section-label">System vulnerability</div>
                        <h2>Separator dependence creates operational vulnerability.</h2>
                        <p>Because many conventional systems cannot tolerate liquids, they rely heavily on upstream
                            separators, scrubbers, drains, and level controls to protect the compressor.</p>
                        <p>This creates a separator-dependent architecture where compressor reliability is directly tied to
                            the performance of multiple support systems.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>More failure points</h3>
                                <p>Scrubbers, drains, controls, and separation equipment add more components that must work
                                    consistently.</p>
                            </div>
                            <div class="line-card">
                                <h3>More maintenance</h3>
                                <p>Separator-heavy systems can require more field attention, servicing, and troubleshooting.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Protection dependency</h3>
                                <p>If upstream liquid management fails, the compressor can become exposed to damaging
                                    conditions.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Uptime exposure</h3>
                                <p>Reliability depends on the full system, not just the compressor package.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="winter-reliability">
                    <div class="article-card">
                        <div class="section-label">Winter operation</div>
                        <h2>Winter conditions exacerbate reliability problems.</h2>
                        <p>In cold-weather operating environments, scrubbers, drains, and level controls can become
                            freeze-prone failure points. Hydrocarbon and water condensation may increase as temperatures
                            drop, further increasing liquid management demands.</p>
                        <p>Winter operating conditions can therefore materially increase downtime in separator-heavy casing
                            gas compression systems.</p>
                        <div class="callout"><span class="callout-title">Cold-weather risk</span>
                            <p>In winter service, the equipment intended to protect a conventional compressor can become
                                part of the reliability problem when drains, controls, and liquid-handling components freeze
                                or require frequent intervention.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="downtime-economics">
                    <div class="article-card">
                        <div class="section-label">Economic impact</div>
                        <h2>Downtime directly erodes compression economics.</h2>
                        <p>Every hour of compressor downtime reduces gas capture, oil uplift, or both. In casing gas
                            applications where compression economics are marginal or where oil production uplift is a major
                            component of project value, recurring downtime can quickly undermine project economics.</p>
                        <p>This is why reliability is not simply an operational concern—it is a direct economic driver.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Lost gas capture</h3>
                                <p>Shutdowns reduce the volume of gas captured, routed, sold, or used beneficially.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Lost oil uplift</h3>
                                <p>Where lower casing pressure supports production, downtime can reduce uplift value.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Longer payout</h3>
                                <p>Recurring downtime can extend payout periods and weaken investment returns.</p>
                            </div>
                            <div class="line-card">
                                <h3>More operating cost</h3>
                                <p>Service calls, troubleshooting, and restarts can increase lifecycle cost.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="lower-cost-risk">
                    <div class="article-card">
                        <div class="section-label">Lifecycle economics</div>
                        <h2>Lower-cost conventional packages can become more expensive.</h2>
                        <p>A lower-capex conventional compressor package may appear attractive during procurement. However,
                            if that package requires extensive separation equipment, frequent maintenance, winterization
                            support, and repeated operator intervention, its lifecycle cost can materially exceed that of a
                            more robust compression solution.</p>
                        <p>True economic comparison requires evaluating realized lifecycle cost, not only initial package
                            price.</p>
                    </div>
                </section>

                <section class="content-section" id="compressioncommander-fit">
                    <div class="article-card">
                        <div class="section-label">Fluidstream approach</div>
                        <h2>Where CompressionCommander™ fits</h2>
                        <p>Fluidstream’s CompressionCommander™ is designed for casing gas applications where wet gas,
                            unstable production, liquid carryover, and separator-dependent reliability issues challenge
                            conventional gas-only systems.</p>
                        <p>By supporting difficult operating conditions that can materially affect conventional compressor
                            uptime, CompressionCommander™ may provide a stronger fit in demanding casing gas applications.
                        </p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Wet gas capability</h3>
                                <p>Supports applications where liquids and changing gas/liquid behavior can be part of
                                    normal service.</p>
                            </div>
                            <div class="line-card">
                                <h3>Reduced separator dependence</h3>
                                <p>Reduces reliance on perfect upstream separation to preserve compressor reliability.</p>
                            </div>
                            <div class="line-card">
                                <h3>Unstable well fit</h3>
                                <p>Designed for casing gas applications where production behavior and pressure conditions
                                    vary over time.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Reliability economics</h3>
                                <p>Protects project value by targeting uptime in difficult field conditions.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="patents">
                    <div class="article-card">
                        <div class="section-label">Patented technology</div>
                        <h2>Patent-supported technical foundation</h2>
                        <p>Fluidstream’s approach to liquid-influenced and unstable gas compression is supported by its
                            patent portfolio, including US11098709B2, CA2843321C, CA2883283C, and US10221664B2.</p>
                        <div class="callout"><span class="callout-title">Technical relevance</span>
                            <p>For wet and unstable casing gas applications, the practical value is the ability to support
                                compression where liquids, variable operating conditions, and field reliability are expected
                                to influence performance.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="case-study-proof">
                    <div class="article-card">
                        <div class="section-label">Case study proof</div>
                        <h2>Field proof: restoring production in difficult casing gas conditions.</h2>
                        <p>In a Fluidstream field application, compression helped restore two non-producing wells to
                            revenue-generating production while supporting reliable operation in challenging field
                            conditions.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field case study</div>
                            <h2>Reliability matters because production value depends on uptime.</h2>
                            <p>The case study demonstrates how casing gas compression can support production recovery, gas
                                handling, and economic value where field conditions make conventional assumptions difficult
                                to maintain.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>~10,000 m³/day</strong><span>Gas production restored from
                                        two previously non-producing wells.</span></div>
                                <div class="proof-item"><strong>$1.5M+/year</strong><span>Approximate incremental annual
                                        revenue associated with restored production.</span></div>
                                <div class="proof-item"><strong>Low intervention</strong><span>Reliable field operation
                                        helped preserve the economic value of the project.</span></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="faq">
                    <div class="article-card">
                        <div class="section-label">FAQ</div>
                        <h2>Conventional casing gas compressor failure FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>Why do casing gas compressors fail in wet wells?</h3>
                                <p>Many are selected assuming dry-gas service even though actual casing gas streams may
                                    contain liquids and unstable flow conditions.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why does separator dependence matter?</h3>
                                <p>Separator-heavy systems create more maintenance points, more freeze risk, and more ways
                                    for compressor reliability to degrade.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why is reliability so important in casing gas compression?</h3>
                                <p>Downtime directly reduces project economics through lost gas capture and reduced oil
                                    production uplift.</p>
                            </div>
                            <div class="faq-item">
                                <h3>When should operators consider CompressionCommander™?</h3>
                                <p>CompressionCommander™ should be evaluated where wet gas, unstable production, separator
                                    dependence, liquid carryover, or repeated compressor reliability issues affect project
                                    performance.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>

        <section class="py-12" id="application-review">
            <div class="wrap cta-inner">
                <div>
                    <div class="eyebrow">Talk to Fluidstream</div>
                    <h2>Evaluate whether CompressionCommander™ fits your wet or unstable casing gas application.</h2>
                    <p>If your casing gas application involves wet gas, unstable production, separator dependence, or
                        repeated compressor reliability issues, Fluidstream can review your operating conditions and help
                        determine whether CompressionCommander™ is the right fit.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/contact">Request Technical Review</a>
                        <a class="btn-1 btn-outline" href="/compressioncommander">Review CompressionCommander™</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Gas volume, suction pressure, and discharge pressure</li>
                        <li>Wet gas, liquid carryover, and slugging behavior</li>
                        <li>Separator dependence, winter exposure, and field access</li>
                        <li>Downtime history, maintenance burden, and production economics</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>


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