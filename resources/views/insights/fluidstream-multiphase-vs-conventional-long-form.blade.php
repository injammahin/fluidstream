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

    <script type="application/ld+json">
                              {
                                "@context": "https://schema.org",
                                "@type": "Article",
                                "headline": "Multiphase Compression vs Conventional Compression Systems: Why Real Field Conditions Demand a Different Compression Approach",
                                "description": "A technical guide comparing multiphase compression and conventional compression systems for wet gas, liquids, slugging, separator dependence, winter reliability, and real field conditions.",
                                "author": { "@type": "Organization", "name": "Fluidstream" },
                                "publisher": { "@type": "Organization", "name": "Fluidstream" },
                                "mainEntityOfPage": "https://fluidstream.co/insights/multiphase-compression-vs-conventional-compression"
                              }
                              </script>

    <section class="hero">
        <div class="wrap hero-grid py-12">
            <div>
                <div class="eyebrow">Technical Article / Multiphase Compression</div>
                <h1>Multiphase Compression vs Conventional Compression Systems</h1>
                <p class="hero-lede">A technical comparison of conventional gas compression, multiphase compression,
                    separator dependence, liquid handling, slug tolerance, autonomous controls, and why real field
                    conditions demand a different compression approach.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/technology">Explore Fluidstream Technology</a>
                    <a class="btn btn-outline" href="#article">Read the Technical Guide</a>
                </div>
            </div>

            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Field gas is rarely the dry, stable stream conventional systems are designed around.</strong>
                    <p>Wet gas, liquids, slugging, solids, freezing, and variable pressures create hidden reliability risk
                        when compression depends on perfect upstream separation.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Liquid-aware</b><span>Designed around real mixed-phase compression</span>
                    </div>
                    <div class="hero-mini"><b>Autonomous</b><span>Controls respond to changing operating conditions</span>
                    </div>
                    <div class="hero-mini"><b>Patent-backed</b><span>US11098709B2 supports liquid-aware methodology</span>
                    </div>
                    <div class="hero-mini"><b>Lower complexity</b><span>Reduce reliance on separator-heavy systems</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area">
        <div class="wrap article-shell py-12">
            <aside class="toc" aria-label="Article contents">
                <div class="toc-title">Article Contents</div>
                <a href="#executive-summary">Executive summary</a>
                <a href="#conventional-compression">What is conventional compression?</a>
                <a href="#multiphase-compression">What is multiphase compression?</a>
                <a href="#failure-modes">Why conventional systems struggle</a>
                <a href="#fluidstream-difference">How Fluidstream differs</a>
                <a href="#controls">Autonomous controls and piston tracking</a>
                <a href="#gland-seal">Patent-pending gland seal</a>
                <a href="#twin-screw">Twin-screw comparison</a>
                <a href="#applications">Where multiphase makes sense</a>
                <a href="#conventional-fit">Where conventional still fits</a>
                <a href="#economics">Economic comparison</a>
                <a href="#faq">FAQ</a>
            </aside>

            <article>
                <section class="content-section white" id="executive-summary">
                    <div class="article-card">
                        <div class="section-label">Executive summary</div>
                        <h2>Conventional compression assumes dry gas. Real field compression often does not behave that way.
                        </h2>
                        <p class="lead">Conventional gas compression systems are typically designed around a simple
                            assumption: the compressor will receive relatively dry, stable gas. In many upstream oil and gas
                            applications, that assumption does not reflect field reality.</p>
                        <p>Wet gas, entrained liquids, slug flow, unstable production, freezing conditions, solids, and
                            variable operating pressures routinely challenge conventional compression packages in upstream
                            service. When a compressor depends on perfect upstream separation, the entire system can become
                            vulnerable when real field conditions deviate from the design case.</p>
                        <p>Multiphase compression was developed to address these realities by designing the compression
                            system around the expectation that liquids and upset conditions will occur. This article
                            compares conventional compression and multiphase compression, explains where each approach fits,
                            and outlines why Fluidstream’s multiphase compression technology can provide a more reliable and
                            economical solution in wet, unstable, and liquid-laden applications.</p>
                        <div class="callout">
                            <span class="callout-title">Core point</span>
                            <p>Compression reliability depends less on idealized gas assumptions and more on whether the
                                system can keep operating when liquids, slugs, solids, freezing, and process upsets are part
                                of normal field operation.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="conventional-compression">
                    <div class="article-card">
                        <div class="section-label">Conventional compression</div>
                        <h2>What is conventional compression?</h2>
                        <p>Conventional compression generally refers to gas-only compression systems designed on the
                            assumption that free liquids are removed upstream before the gas enters the compressor. Common
                            examples include reciprocating compressors, rotary screw compressors, and other gas-focused
                            compression packages used throughout oil and gas operations.</p>
                        <p>These systems can perform very well when operating conditions remain close to their design
                            assumptions. In dry, stable gas applications with reliable upstream separation and predictable
                            process conditions, conventional compression remains an effective solution.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Designed for dry gas</h3>
                                <p>Conventional systems usually depend on scrubbers, knockout vessels, and separators to
                                    prevent free liquids from reaching the compressor.</p>
                            </div>
                            <div class="line-card">
                                <h3>Strong in stable service</h3>
                                <p>Clean, predictable gas streams can be a good fit for conventional compression when liquid
                                    carryover risk is low.</p>
                            </div>
                            <div class="line-card">
                                <h3>Separator-dependent</h3>
                                <p>Reliability can depend heavily on upstream separation equipment remaining effective under
                                    all operating conditions.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Vulnerable to upsets</h3>
                                <p>Wet gas, slugging, freezing, or unstable suction pressure can create shutdowns,
                                    maintenance issues, or mechanical risk.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="multiphase-compression">
                    <div class="article-card">
                        <div class="section-label">Multiphase compression</div>
                        <h2>What is multiphase compression?</h2>
                        <p>Multiphase compression refers to compression technology designed to process mixed-phase flow
                            containing gas, liquids, and in some cases solids without requiring perfect upstream separation.
                            Rather than assuming the inlet stream will remain dry, multiphase systems are engineered around
                            the reality that liquid carryover, slugging, and unstable flow conditions can occur during
                            normal operation.</p>
                        <p>For operators, the value of multiphase compression is not only liquid tolerance. The larger value
                            is facility simplification, reduced dependence on separator-heavy infrastructure, improved
                            uptime in difficult field conditions, and the ability to apply compression in locations where
                            conventional systems may become maintenance-intensive or uneconomic.</p>
                        <div class="callout">
                            <span class="callout-title">Customer-facing takeaway</span>
                            <p>Multiphase compression is not simply a compressor that “handles wet gas.” It is a different
                                design philosophy built around the operating reality that field gas is often wet, unstable,
                                and difficult to separate perfectly.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="failure-modes">
                    <div class="article-card">
                        <div class="section-label">Real field failure logic</div>
                        <h2>Why conventional compression struggles in real field conditions</h2>
                        <p>Conventional compression packages often struggle when field conditions deviate from ideal dry-gas
                            assumptions. The most important issues are not always the compressor nameplate capacity. They
                            are the hidden operating risks around separator dependence, maintenance burden, liquid slugging,
                            and freeze-ups.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Conventional assumption</h3>
                                <ul>
                                    <li>Upstream separation keeps the gas dry</li>
                                    <li>Scrubbers and drains remain reliable</li>
                                    <li>Flow and suction pressure stay predictable</li>
                                    <li>Liquids and solids are abnormal events</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Real field condition</h3>
                                <ul>
                                    <li>Wet gas and liquid carryover occur in service</li>
                                    <li>Support equipment adds maintenance and failure points</li>
                                    <li>Slugging and unstable production can be routine</li>
                                    <li>Winter freeze-ups can disable protective equipment</li>
                                </ul>
                            </div>
                        </div>
                        <h3>Separator dependence</h3>
                        <p>Most conventional systems rely heavily on upstream scrubbers, knockout vessels, and separation
                            equipment to prevent liquid ingress. If that equipment underperforms, the compressor becomes
                            vulnerable.</p>
                        <h3>Maintenance burden</h3>
                        <p>The additional separation, drains, controls, heat tracing, and support equipment required to
                            protect conventional compressors increases maintenance requirements and introduces more field
                            failure points.</p>
                        <h3>Liquid slugging and freeze-ups</h3>
                        <p>Unexpected liquid slugs can cause shutdowns, mechanical damage, lubricant contamination, or
                            reliability issues in gas-only compression systems. In cold-weather environments, scrubbers,
                            drains, level controls, and instrumentation can freeze and materially reduce uptime.</p>
                    </div>
                </section>

                <section class="content-section white" id="fluidstream-difference">
                    <div class="article-card">
                        <div class="section-label">Fluidstream difference</div>
                        <h2>How Fluidstream’s multiphase compression differs</h2>
                        <p>Fluidstream’s multiphase compression technology is designed around the reality that liquids are
                            often present within real field compression applications. The system does not depend on a simple
                            “dry gas only” assumption before compression can occur.</p>
                        <p>Rather than merely tolerating wet gas, Fluidstream actively manages liquid presence within the
                            compression process through patented liquid-aware compression methodology. Supported by
                            US11098709B2, the system dynamically adjusts compression behavior when incompressible liquid
                            conditions are detected to help prevent damaging compression events.</p>
                        <p>Fluidstream’s autonomous control platform continuously monitors system behavior and responds to
                            changing operating conditions in real time. This allows the system to optimize compression
                            efficiency while also protecting the machine during upset conditions such as liquid slugs,
                            unstable gas/liquid ratios, and certain solids-related events.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Liquid-aware compression</h3>
                                <p>Compression response is managed around the reality that liquids are incompressible and
                                    may be present in the chamber.</p>
                            </div>
                            <div class="line-card">
                                <h3>Patent-backed methodology</h3>
                                <p>US11098709B2 supports Fluidstream’s engineering logic around adaptive response to
                                    liquid-influenced compression behavior.</p>
                            </div>
                            <div class="line-card">
                                <h3>Upset condition response</h3>
                                <p>Autonomous controls respond to changing machine behavior instead of waiting for repeated
                                    operator intervention.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Facility simplification</h3>
                                <p>Reduced separator dependence can lower installed complexity, winter exposure, and
                                    maintenance burden.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="controls">
                    <div class="article-card">
                        <div class="section-label">Autonomous operation</div>
                        <h2>Autonomous controls and piston tracking</h2>
                        <p>Fluidstream’s piston tracking and autonomous controls support both protection and optimization.
                            The system is designed to achieve user-defined suction pressure targets while monitoring key
                            indicators such as discharge pressure, discharge temperature, motor load, and other operating
                            parameters related to system health.</p>
                        <p>From a customer perspective, the important point is that Fluidstream is designed to manage the
                            compression process, not simply react after failure. The autonomous controller helps optimize
                            performance while protecting the unit during abnormal compression conditions, including solids
                            or ice that may be present in the compression chamber.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Protection functions</h3>
                                <p>Machine-state monitoring helps detect abnormal compression conditions, including solids
                                    or ice, and supports protective response.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Performance optimization</h3>
                                <p>The system targets suction pressure while balancing discharge pressure, temperature,
                                    motor load, and system health.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Reduced operator intervention</h3>
                                <p>Autonomous response is designed to reduce nuisance shutdowns and after-hours callouts in
                                    remote or harsh locations.</p>
                            </div>
                            <div class="line-card">
                                <h3>Safer upset handling</h3>
                                <p>Control logic is designed to manage many upset conditions before they become damaging
                                    mechanical events.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="gland-seal">
                    <div class="article-card">
                        <div class="section-label">Seal life and reliability</div>
                        <h2>Patent-pending gland seal and seal life optimization</h2>
                        <p>Fluidstream’s multiphase compression platform also incorporates a patent-pending gland seal
                            design intended to improve seal life and reduce maintenance burden in long-stroke multiphase
                            service.</p>
                        <p>Because Fluidstream’s reciprocating-style multiphase pump can operate at millions of strokes per
                            year, seal longevity is a critical reliability consideration. The system’s long-stroke
                            architecture provides operating advantages, but it also makes mechanical alignment and seal
                            management especially important.</p>
                        <p>Fluidstream’s engineered alignment methodology, gland seal design, and electronic gland seal wear
                            detection system work together to help extend seal life, improve maintenance planning, and
                            reduce the risk of unexpected leakage or premature seal replacement.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field reliability proof</div>
                            <h2>Seal life matters because uptime matters.</h2>
                            <p>Fluidstream has demonstrated extended seal life performance in field service, including an
                                application where first seal replacement occurred after more than 35 months of operation.
                            </p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>35+ months</strong><span>First seal replacement reported
                                        after extended field operation in one application.</span></div>
                                <div class="proof-item"><strong>3M+ strokes/year</strong><span>Long-stroke service makes
                                        alignment and seal management central to reliability.</span></div>
                                <div class="proof-item"><strong>Wear detection</strong><span>Electronic gland seal wear
                                        detection supports maintenance planning and operational confidence.</span></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="twin-screw">
                    <div class="article-card">
                        <div class="section-label">Multiphase technology comparison</div>
                        <h2>Comparison against twin-screw multiphase pumps</h2>
                        <p>Traditional twin-screw multiphase pumps remain proven in many applications, but they also carry
                            limitations that can affect economics and performance. At extremely high gas volume fractions,
                            some twin-screw systems can lose liquid seal, experience efficiency loss, generate internal
                            heat, or require liquid recirculation to avoid damage.</p>
                        <p>Fluidstream is positioned differently. It is designed for applications where high gas volume
                            fraction, low-viscosity fluids, slug flow, and economic accessibility matter. Fluidstream can
                            operate at 100% gas volume fraction and can support applications where traditional twin-screw
                            multiphase solutions may be too expensive or maintenance-intensive.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>100% GVF capability</h3>
                                <p>Fluidstream can operate at 100% gas volume fraction, supporting applications where liquid
                                    seal dependence can become limiting.</p>
                            </div>
                            <div class="line-card">
                                <h3>Low-viscosity fluids</h3>
                                <p>The technology is suited to low-viscosity fluid streams where some multiphase pump types
                                    can lose volumetric efficiency.</p>
                            </div>
                            <div class="line-card">
                                <h3>Slug flow tolerance</h3>
                                <p>Autonomous control and liquid-aware response support operation through unstable and
                                    slugging conditions.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Broader economics</h3>
                                <p>Lower capital and maintenance cost can open applications where traditional multiphase
                                    pumps were previously uneconomic.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="applications">
                    <div class="article-card">
                        <div class="section-label">Where it fits</div>
                        <h2>Where multiphase compression makes sense</h2>
                        <p>Multiphase compression provides the greatest value where field conditions are difficult, wet,
                            unstable, or separator-dependent. It is especially valuable where operators want to simplify
                            facilities, reduce maintenance, capture emissions value, improve production, or apply
                            compression where conventional equipment creates too much complexity.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Multiphase transfer / boosting</h3>
                                <p>Supports mixed-phase flow movement where gas and liquid handling are both part of the
                                    operating requirement.</p>
                            </div>
                            <div class="line-card">
                                <h3>Vapor recovery</h3>
                                <p>Improves reliability where tank vapor streams are wet, unstable, and exposed to winter
                                    separator issues.</p>
                            </div>
                            <div class="line-card">
                                <h3>Casing gas compression</h3>
                                <p>Supports casing pressure reduction where annulus gas may be wet, low pressure, and
                                    affected by liquid loading.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Loaded wells and harsh sites</h3>
                                <p>Fits loaded gas wells, remote locations, harsh winter operations, and intermittent or
                                    unstable production.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="conventional-fit">
                    <div class="article-card">
                        <div class="section-label">Credible fit assessment</div>
                        <h2>Where conventional compression still makes sense</h2>
                        <p>Conventional compression remains appropriate in many applications. Fluidstream is not the best
                            fit for every compression duty, and selecting the right technology should always depend on
                            application fit rather than blanket technology preference.</p>
                        <p>Conventional systems may remain appropriate for very high gas flow rate applications beyond the
                            practical throughput envelope of reciprocating-style multiphase compression, dry and stable gas
                            streams with reliable upstream separation, large central facility compression systems, and
                            applications where liquid carryover risk is minimal and process conditions are highly
                            predictable.</p>
                        <div class="callout">
                            <span class="callout-title">Application-fit principle</span>
                            <p>Fluidstream is strongest where liquids, slugs, unstable production, winter operation,
                                maintenance burden, or separator dependence create operating risk. Very high dry-gas flow
                                applications may still favor conventional compression.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="economics">
                    <div class="article-card">
                        <div class="section-label">Economic comparison</div>
                        <h2>Installed and lifecycle economics matter more than compressor price alone</h2>
                        <p>The economic comparison between conventional and multiphase compression extends beyond compressor
                            purchase price. In many applications, Fluidstream’s multiphase compression can reduce total
                            installed and lifecycle cost by reducing separation equipment, lowering maintenance
                            requirements, reducing operator intervention, and improving uptime in difficult field
                            conditions.</p>
                        <p>Fluidstream’s lower capital cost relative to many traditional multiphase pump technologies can
                            also open applications that were previously uneconomic for multiphase compression. This is
                            especially important in vapor recovery, casing gas, loaded wells, and smaller multiphase
                            transfer or boosting applications where the economics may not support large, expensive
                            multiphase systems.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Hidden cost in conventional systems</h3>
                                <ul>
                                    <li>Upstream separation equipment</li>
                                    <li>Heat tracing and winterization</li>
                                    <li>Drain and scrubber maintenance</li>
                                    <li>Operator callouts and downtime</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Fluidstream economic objective</h3>
                                <ul>
                                    <li>Reduce separator dependence</li>
                                    <li>Lower maintenance burden</li>
                                    <li>Improve uptime in real conditions</li>
                                    <li>Expand where multiphase compression is economic</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="final-thoughts">
                    <div class="article-card">
                        <div class="section-label">Final thoughts</div>
                        <h2>Multiphase compression is a different approach to real field operation.</h2>
                        <p>Multiphase compression is not simply another compressor type. It is a fundamentally different
                            approach to compression design. Where conventional systems assume ideal gas conditions and
                            depend on separation infrastructure, Fluidstream’s multiphase compression is engineered around
                            the expectation that liquids, slugs, solids, and upset conditions are part of real field
                            operation.</p>
                        <p>For operators facing wet gas, unstable production, harsh winter conditions, separator maintenance
                            burden, or applications where traditional multiphase pumps have been cost-prohibitive,
                            Fluidstream offers a differentiated compression approach designed around real-world operating
                            conditions.</p>
                        <p>The core message for engineers is simple: multiphase matters because field gas is rarely dry, and
                            separator-dependent systems create hidden operational risk when liquid handling is treated as an
                            upstream problem only.</p>
                    </div>
                </section>

                <section class="content-section white" id="faq">
                    <div class="article-card">
                        <div class="section-label">Technical FAQ</div>
                        <h2>Multiphase compression vs conventional compression FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>What is the main difference between multiphase and conventional compression?</h3>
                                <p>Conventional compression generally assumes dry gas reaches the compressor. Multiphase
                                    compression is designed around mixed gas and liquid flow where liquid carryover,
                                    slugging, and unstable production may occur.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why do conventional compressors struggle with liquids?</h3>
                                <p>Liquids are incompressible and can cause mechanical damage, shutdowns, lubricant
                                    contamination, or control instability when a gas-only compressor receives liquid
                                    carryover or slugs.</p>
                            </div>
                            <div class="faq-item">
                                <h3>How does Fluidstream manage liquid-influenced compression?</h3>
                                <p>Fluidstream uses liquid-aware compression methodology, autonomous controls, and
                                    machine-state feedback to adjust compression behavior when conditions indicate potential
                                    damage from incompressible liquids.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Where is Fluidstream not the best fit?</h3>
                                <p>Very high dry-gas flow applications may be better suited to conventional compression,
                                    especially where gas is stable, clean, and separation is already reliable.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why is the patent reference important?</h3>
                                <p>US11098709B2 provides a credibility anchor for Fluidstream’s liquid-aware compression
                                    response. It should be viewed as support for the engineering logic, not as a substitute
                                    for application-specific review.</p>
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
                    <h2>Evaluate whether multiphase compression fits your field conditions.</h2>
                    <p>Built for engineers, production teams, and decision-makers evaluating wet gas, vapor recovery, casing
                        gas, loaded wells, multiphase transfer, harsh-weather operation, and maintenance-sensitive field
                        sites. Submit your operating conditions and Fluidstream can assess the technical and economic fit.
                    </p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/contact">Request Technical Review</a>
                        <a class="btn-1 btn-outline" href="/technology">Review Fluidstream Technology</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Gas volume, liquid fraction, slugging, and GVF behavior</li>
                        <li>Suction and discharge pressure requirements</li>
                        <li>Separator dependence, freeze exposure, and maintenance history</li>
                        <li>Economic fit versus conventional and twin-screw alternatives</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

@endsection