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
                <div class="eyebrow">Technical Article / Casing Gas Economics</div>
                <h1>When Is Casing Gas Compression Economically Viable?</h1>
                <p class="hero-lede">A practical guide for evaluating casing gas compression economics, including gas value,
                    oil uplift potential, uptime, wet gas reliability, lifecycle cost, and real field operating conditions.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/compressioncommander">Explore CompressionCommander™</a>
                    <a class="btn btn-outline" href="#case-study-proof">View Field Proof</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Compression economics are not determined by gas volume alone.</strong>
                    <p>Oil uplift, gathering pressure, uptime, maintenance burden, wet gas reliability, and installed system
                        complexity can determine whether a casing gas project pays out in the field.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Oil uplift</b><span>Incremental oil value can materially affect project
                            economics.</span></div>
                    <div class="hero-mini"><b>Uptime matters</b><span>Downtime directly reduces captured value and payout
                            certainty.</span></div>
                    <div class="hero-mini"><b>Patent-supported</b><span>Fluidstream patents support difficult gas
                            compression methodology.</span></div>
                    <div class="hero-mini"><b>Field proof</b><span>Case study: two wells restored to revenue-generating
                            production.</span></div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area ">
        <div class="wrap article-shell py-12">
            <aside class="toc" aria-label="Article contents">
                <a href="#economics-more-than-volume" class="active"><span>More than gas volume</span></a>
                <a href="#economic-drivers"><span>Economic drivers</span></a>
                <a href="#screening-thresholds"><span>Screening thresholds</span></a>
                <a href="#economic-scenario"><span>Economic scenario</span></a>
                <a href="#overestimated-returns"><span>Overestimated returns</span></a>
                <a href="#reliability-roi"><span>Reliability and ROI</span></a>
                <a href="#conventional-costs"><span>Conventional cost erosion</span></a>
                <a href="#field-constraints"><span>Field constraints</span></a>
                <a href="#compressioncommander-fit"><span>CompressionCommander™ fit</span></a>
                <a href="#patents"><span>Patent-supported foundation</span></a>
                <a href="#case-study-proof"><span>Case study proof</span></a>
                <a href="#faq"><span>FAQ</span></a>
            </aside>

            <article>
                <section class="content-section" id="economics-more-than-volume">
                    <div class="article-card">
                        <div class="section-label">Economic principle</div>
                        <h2>Casing gas compression economics depend on more than gas volume.</h2>
                        <p class="lead">Determining whether casing gas compression is economically viable requires more than
                            reviewing available gas volume.</p>
                        <p>While gas production rate is important, project economics are ultimately driven by the
                            interaction of gas value, oil uplift potential, compression reliability, installed system cost,
                            operating expense, expected uptime, and decline profile.</p>
                        <p>A project that appears economic on paper can underperform materially if reliability issues,
                            maintenance burden, or unstable operating conditions reduce actual run time and gas capture.</p>
                        <div class="callout"><span class="callout-title">Core takeaway</span>
                            <p>Casing gas compression should be evaluated as a production and reliability investment, not
                                only as a gas-handling equipment decision.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="economic-drivers">
                    <div class="article-card">
                        <div class="section-label">Economic drivers</div>
                        <h2>What determines casing gas compression economics?</h2>
                        <p>The primary variables affecting compression viability include available gas volume, gas
                            composition, suction and discharge pressure requirements, gathering system pressure, oil
                            production uplift potential, compression package cost, installation cost, operating expense,
                            maintenance expectations, and expected equipment uptime.</p>
                        <p>Where compression is used to lower casing pressure and improve production, the value of
                            incremental oil can materially exceed the value of captured gas and should be included in the
                            economic model.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Gas value</h3>
                                <p>Captured gas may support sales, fuel use, emissions reduction, or gathering system
                                    optimization depending on the site.</p>
                            </div>
                            <div class="line-card">
                                <h3>Oil uplift</h3>
                                <p>Lower casing pressure can improve production response in applications where casing
                                    pressure is restricting well performance.</p>
                            </div>
                            <div class="line-card">
                                <h3>System cost</h3>
                                <p>Installed economics should include package cost, installation, controls, winterization,
                                    and supporting equipment.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Uptime</h3>
                                <p>Reliability directly affects recovered value because downtime reduces gas capture and
                                    production uplift.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="screening-thresholds">
                    <div class="article-card">
                        <div class="section-label">Screening thresholds</div>
                        <h2>Typical economic screening thresholds</h2>
                        <p>Many operators evaluate casing gas compression opportunities using payout period, NPV, or IRR
                            thresholds. Depending on operator strategy and project risk, acceptable payout targets often
                            range from approximately 6 to 18 months, with shorter payout expectations generally applied to
                            higher-risk or operationally intensive projects.</p>
                        <p>Projects with longer projected payouts may still proceed if they deliver strategic value,
                            emissions reduction, reserve recovery, or infrastructure optimization benefits.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Common screening inputs</h3>
                                <ul>
                                    <li>Available gas volume and gas value</li>
                                    <li>Incremental oil potential</li>
                                    <li>Compression package and installation cost</li>
                                    <li>Operating and maintenance cost</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Often underestimated inputs</h3>
                                <ul>
                                    <li>Actual uptime and shutdown frequency</li>
                                    <li>Wet gas and liquid carryover reliability</li>
                                    <li>Winter operation and freeze exposure</li>
                                    <li>Operator intervention and field access</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="economic-scenario">
                    <div class="article-card">
                        <div class="section-label">Economic scenario</div>
                        <h2>Illustrative economic scenario</h2>
                        <p>Consider a casing gas compression project where gas capture value alone suggests a 20-month
                            payout. If compression also enables meaningful oil production uplift by reducing casing
                            pressure, the payout period may shorten materially.</p>
                        <p>Conversely, if the compression package experiences chronic downtime or requires frequent
                            maintenance, actual payout may extend well beyond the original projection. Economic viability is
                            therefore highly sensitive to both production response and real operating reliability.</p>
                        <div class="callout"><span class="callout-title">Economic sensitivity</span>
                            <p>Small changes in uptime, oil response, maintenance frequency, or discharge pressure can
                                materially change payout. This is why casing gas compression should be reviewed using real
                                field assumptions rather than optimistic steady-state assumptions.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="overestimated-returns">
                    <div class="article-card">
                        <div class="section-label">Modeling risk</div>
                        <h2>Why economic models often overestimate returns</h2>
                        <p>Compression economic models frequently assume near-continuous uptime, ideal gas conditions, and
                            minimal maintenance. In practice, wet gas, unstable wells, liquid carryover, freeze-prone
                            systems, and compressor downtime can materially reduce realized returns.</p>
                        <p>Ignoring these realities can cause projects to appear viable in spreadsheets while
                            underperforming in the field.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Idealized uptime</h3>
                                <p>Models often assume run time that may not reflect field maintenance, shutdowns, or
                                    operator response time.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Wet gas effects</h3>
                                <p>Liquid carryover and unstable flow can increase downtime in conventional gas-only
                                    systems.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Winter exposure</h3>
                                <p>Freeze-prone support equipment can create seasonal reliability issues that affect annual
                                    economics.</p>
                            </div>
                            <div class="line-card">
                                <h3>Lifecycle cost</h3>
                                <p>Maintenance, service calls, and supporting equipment can materially change project
                                    economics.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="reliability-roi">
                    <div class="article-card">
                        <div class="section-label">Reliability and ROI</div>
                        <h2>Reliability has a direct impact on ROI.</h2>
                        <p>Compression reliability directly affects economics because every hour of downtime reduces gas
                            capture, oil uplift, or both. In marginal projects, even moderate downtime can materially alter
                            payout periods and investment returns.</p>
                        <p>Reliability is especially important in casing gas applications where unstable flow conditions and
                            wet gas can challenge conventional gas-only systems.</p>
                        <div class="callout"><span class="callout-title">ROI principle</span>
                            <p>The most economic compressor is not always the lowest-capex package. The more important
                                question is which system produces the strongest realized return after uptime, maintenance,
                                and field conditions are included.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="conventional-costs">
                    <div class="article-card">
                        <div class="section-label">Lifecycle cost</div>
                        <h2>How conventional compression can erode project economics</h2>
                        <p>Projects that require extensive upstream separation, recurring maintenance, frequent operator
                            intervention, winterization support, or repeated shutdown recovery can experience materially
                            higher lifecycle costs than originally forecast.</p>
                        <p>Where these burdens become significant, a lower-capex compression package may ultimately prove
                            less economic over the life of the project than a more robust system.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Separator dependence</h3>
                                <p>Additional scrubbers, drains, and protective equipment can increase cost and maintenance
                                    exposure.</p>
                            </div>
                            <div class="line-card">
                                <h3>Operator intervention</h3>
                                <p>Frequent trips, restarts, and manual troubleshooting can reduce field-level economics.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Shutdown recovery</h3>
                                <p>Repeated downtime can reduce production response and extend payout periods.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Winterization burden</h3>
                                <p>Freeze-prone equipment can add both capital cost and recurring reliability risk.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="field-constraints">
                    <div class="article-card">
                        <div class="section-label">Field constraints</div>
                        <h2>Field constraints that affect economic viability</h2>
                        <p>Economic assessments should also account for gathering pressure limitations, fluctuating casing
                            pressure, variable production profiles, well decline curves, infrastructure limitations, and
                            field accessibility.</p>
                        <p>Ignoring these constraints can materially distort economic projections and equipment selection
                            decisions.</p>
                    </div>
                </section>

                <section class="content-section" id="compressioncommander-fit">
                    <div class="article-card">
                        <div class="section-label">Fluidstream approach</div>
                        <h2>Where CompressionCommander™ fits</h2>
                        <p>Fluidstream’s CompressionCommander™ is designed for casing gas compression applications where wet
                            gas, unstable operating conditions, or separator-dependent reliability issues may challenge
                            conventional systems.</p>
                        <p>By improving reliability in difficult operating environments, CompressionCommander™ can help
                            preserve gas capture and production uplift economics where uptime materially affects project
                            returns.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Wet gas fit</h3>
                                <p>Designed for applications where gas streams may include liquids, instability, or changing
                                    operating conditions.</p>
                            </div>
                            <div class="line-card">
                                <h3>Production economics</h3>
                                <p>Supports applications where lowering casing pressure may improve well performance and
                                    economic return.</p>
                            </div>
                            <div class="line-card">
                                <h3>Lower reliability risk</h3>
                                <p>Reduces exposure to separator-dependent operating assumptions that can affect
                                    conventional systems.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Application review</h3>
                                <p>Best fit is determined by gas volume, pressure, liquids, field constraints, and expected
                                    production response.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="patents">
                    <div class="article-card">
                        <div class="section-label">Patented technology</div>
                        <h2>Patent-supported technical foundation</h2>
                        <p>Fluidstream’s approach to difficult gas and liquid-influenced compression applications is
                            supported by its patent portfolio, including US11098709B2, CA2843321C, CA2883283C, and
                            US10221664B2.</p>
                        <div class="callout"><span class="callout-title">Technical relevance</span>
                            <p>For casing gas applications, the practical value is the ability to support compression
                                economics where wet gas, unstable production, liquid-influenced behavior, and reliability
                                are central to project success.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="case-study-proof">
                    <div class="article-card">
                        <div class="section-label">Case study proof</div>
                        <h2>Field proof: restoring production where casing pressure and field constraints limited well
                            performance.</h2>
                        <p>In a Fluidstream field application, compression helped restore two non-producing wells to
                            revenue-generating production while supporting strong reliability in difficult operating
                            conditions.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field case study</div>
                            <h2>Compression economics become stronger when reliability protects production response.</h2>
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
                        <h2>Casing gas compression economics FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>How much gas is needed for casing gas compression to be economic?</h3>
                                <p>There is no universal threshold. Economic viability depends on gas value, pressure
                                    differential, oil uplift potential, equipment cost, reliability, and operating
                                    conditions.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Does oil uplift matter in compression economics?</h3>
                                <p>Yes. In many casing gas applications, incremental oil production can be a major
                                    contributor to project economics.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why does reliability matter so much?</h3>
                                <p>Downtime directly reduces captured value and can materially extend payout periods.</p>
                            </div>
                            <div class="faq-item">
                                <h3>When should operators request an application review?</h3>
                                <p>Operators should request a review when gas value, casing pressure, liquid behavior, well
                                    response, or reliability risk materially affects the expected project payout.</p>
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
                    <h2>Evaluate whether CompressionCommander™ fits your casing gas economics.</h2>
                    <p>Every casing gas application has unique economics. Fluidstream can review your gas volumes,
                        pressures, production uplift opportunity, liquids, field constraints, and operating conditions to
                        help determine whether compression is economically viable for your site.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/contact">Request Economic and Technical Review</a>
                        <a class="btn-1 btn-outline" href="/compressioncommander">Review CompressionCommander™</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Gas volume, pressure differential, and gathering pressure</li>
                        <li>Oil uplift potential and production response</li>
                        <li>Liquids, wet gas behavior, and reliability risk</li>
                        <li>Installed cost, maintenance burden, and payout sensitivity</li>
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