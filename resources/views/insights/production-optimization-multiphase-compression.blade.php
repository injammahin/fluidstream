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

    <script type="application/ld+json">
                                                  {
                                                    "@context": "https://schema.org",
                                                    "@type": "Article",
                                                    "headline": "How Casing Gas Compression Increases Oil Production",
                                                    "description": "A technical guide explaining how casing gas compression increases oil production by lowering casing pressure, improving drawdown, reducing liquid loading, and supporting artificial lift performance.",
                                                    "author": { "@type": "Organization", "name": "Fluidstream" },
                                                    "publisher": { "@type": "Organization", "name": "Fluidstream" },
                                                    "mainEntityOfPage": "https://fluidstream.co/insights/how-casing-gas-compression-increases-oil-production"
                                                  }
                                                  </script>


    <section class="hero py-12">
        <div class="wrap hero-grid">
            <div>
                <h1>How Casing Gas Compression Increases Oil Production</h1>
                <p class="hero-lede">An engineering-focused guide to annulus pressure reduction, reservoir drawdown, fluid
                    loading
                    relief, artificial lift support, and why reliable multiphase-capable compression matters in real casing
                    gas
                    applications.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/casing-gas-compression">Explore CompressionCommander™</a>
                    <a class="btn btn-outline" href="#article">Read the Technical Guide</a>
                </div>
            </div>

            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Lower casing pressure can improve production — but only when the compressor can operate reliably
                        in the
                        well’s real conditions.</strong>
                    <p>Casing gas streams can be wet, unstable, low-pressure, and tied to liquid loading, artificial lift
                        behavior,
                        and winter field conditions.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Drawdown</b><span>Reduce backpressure and improve inflow</span></div>
                    <div class="hero-mini"><b>Fluid loading</b><span>Support better wellbore unloading</span></div>
                    <div class="hero-mini"><b>Artificial lift</b><span>Improve operating conditions for lift systems</span>
                    </div>
                    <div class="hero-mini"><b>Proof</b><span>Gas and condensate restored in field service</span></div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="section article-zone py-12 gray" id="article">
            <div class="wrap article-shell">
                <aside class="toc" aria-label="Article contents">
                    <div class="toc-title">Article Contents</div>
                    <a href="#executive-summary">Executive summary</a>
                    <a href="#pressure-matters">Why casing pressure matters</a>
                    <a href="#drawdown">How lower casing pressure improves drawdown</a>
                    <a href="#fluid-loading">Fluid loading relief</a>
                    <a href="#artificial-lift">Artificial lift performance</a>
                    <a href="#well-response">Why some wells respond more</a>
                    <a href="#conventional-limits">Why conventional systems underperform</a>
                    <a href="#fluidstream">Fluidstream reliability advantage</a>
                    <a href="#case-study">Alberta case-study proof</a>
                    <a href="#final-thoughts">Final thoughts</a>
                </aside>

                <article>
                    <section class="article-section white" id="executive-summary">
                        <div class="section-label">Executive summary</div>
                        <h2>Casing gas compression increases production by changing wellbore pressure conditions.</h2>
                        <p class="lead">Many casing gas compression articles stop at a simple statement: lowering casing
                            pressure can
                            increase oil production. While true, that explanation rarely addresses the engineering
                            mechanisms that
                            determine why some wells respond dramatically while others see limited benefit.</p>
                        <p>Casing gas compression improves well performance by reducing annulus backpressure, improving
                            reservoir
                            drawdown, lowering bottomhole flowing pressure, reducing fluid loading effects, and supporting
                            artificial
                            lift performance.</p>
                        <p>The production opportunity is only valuable when the compression system can operate reliably in
                            real casing
                            gas conditions. Many casing gas streams are wet, unstable, low-pressure, and
                            maintenance-sensitive, which is
                            why compression reliability becomes central to project economics.</p>
                        <div class="callout">
                            <span class="callout-title">Core point</span>
                            <p>Casing gas compression is not just gas handling. It is a production optimization tool that
                                must be
                                matched to both reservoir physics and field-operating realities.</p>
                        </div>
                    </section>

                    <section class="article-section grey" id="pressure-matters">
                        <div class="section-label">Production physics</div>
                        <h2>Why casing pressure matters</h2>
                        <p>As oil flows from the reservoir into the wellbore, associated gas breaks out of solution and
                            accumulates in
                            the casing annulus. If that gas is not effectively removed, casing pressure rises and creates
                            additional
                            backpressure against the well.</p>
                        <p>That elevated casing pressure can suppress production by increasing bottomhole flowing pressure,
                            reducing
                            reservoir drawdown, and making it harder for the formation to deliver fluids into the wellbore.
                        </p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Higher backpressure</h3>
                                <p>Elevated annulus pressure increases the pressure the reservoir must overcome to move
                                    fluids into the
                                    wellbore.</p>
                            </div>
                            <div class="line-card">
                                <h3>Lower drawdown</h3>
                                <p>Reduced pressure differential between reservoir and wellbore can limit inflow from
                                    productive zones.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Fluid accumulation</h3>
                                <p>Backpressure can contribute to liquid loading and make unloading more difficult in
                                    marginal wells.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Production suppression</h3>
                                <p>In mature wells, small pressure changes can have meaningful impact on production and
                                    economic life.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section white" id="drawdown">
                        <div class="section-label">Drawdown mechanism</div>
                        <h2>How lowering casing pressure improves drawdown</h2>
                        <p>Reservoir inflow is driven by pressure differential between the reservoir and the wellbore.
                            Reducing casing
                            pressure can lower bottomhole flowing pressure and increase drawdown across the reservoir.</p>
                        <p>Greater drawdown can increase instantaneous production rate, restore production from marginal
                            wells,
                            improve long-term recovery potential, and delay premature economic abandonment where the well is
                            still
                            capable of producing.</p>
                        <div class="callout">
                            <span class="callout-title">Important distinction</span>
                            <p>Casing gas compression does not create reservoir energy. It helps remove backpressure and
                                operating
                                constraints that may prevent the well from producing to its practical potential.</p>
                        </div>
                    </section>

                    <section class="article-section grey" id="fluid-loading">
                        <div class="section-label">Fluid level management</div>
                        <h2>Fluid level reduction and liquid loading relief</h2>
                        <p>Lower annulus pressure can also reduce fluid loading and improve fluid level management in the
                            wellbore. In
                            many mature or marginal wells, excess backpressure contributes to fluid buildup that suppresses
                            inflow and
                            burdens artificial lift systems.</p>
                        <p>Lowering casing pressure can help reduce fluid head and improve unloading behavior, particularly
                            in wells
                            experiencing intermittent loading or unstable production.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>When casing pressure remains high</h3>
                                <ul>
                                    <li>Higher bottomhole flowing pressure</li>
                                    <li>Reduced reservoir drawdown</li>
                                    <li>Greater risk of fluid accumulation</li>
                                    <li>More difficult artificial lift conditions</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>When casing pressure is reduced</h3>
                                <ul>
                                    <li>Lower annulus backpressure</li>
                                    <li>Improved pressure differential</li>
                                    <li>Better unloading opportunity</li>
                                    <li>Improved operating window for lift systems</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="article-section white" id="artificial-lift">
                        <div class="section-label">Artificial lift support</div>
                        <h2>Artificial lift performance benefits</h2>
                        <p>Casing gas compression can improve the performance of multiple artificial lift methods when the
                            well is
                            constrained by backpressure, fluid level, or casing gas accumulation.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Rod-pumped wells</h3>
                                <p>Lower casing pressure can improve pump fillage and reduce fluid fallback under the right
                                    conditions.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Plunger-lift wells</h3>
                                <p>Reduced annulus pressure can improve unloading efficiency and support more effective
                                    cycle performance.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Marginal flowing wells</h3>
                                <p>Reducing backpressure may restore natural flow or delay the need for additional lift
                                    methods.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Loaded wells</h3>
                                <p>Casing gas compression can support wells where accumulated liquids and pressure
                                    constraints limit
                                    production.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section grey" id="well-response">
                        <div class="section-label">Candidate screening</div>
                        <h2>Why some wells respond more than others</h2>
                        <p>Not every well responds equally to casing gas compression. The magnitude of response depends on
                            reservoir
                            pressure, inflow performance, artificial lift configuration, gas breakout behavior, fluid
                            loading severity,
                            completion design, and pump placement.</p>
                        <p>Testing and engineering review remain critical before assuming economic benefit. A well with
                            meaningful
                            backpressure and fluid loading constraints may respond strongly. A well limited primarily by
                            reservoir
                            depletion, mechanical damage, or unrelated artificial lift problems may respond less.</p>
                        <div class="callout">
                            <span class="callout-title">Application-fit mindset</span>
                            <p>The strongest casing gas compression candidates usually combine production upside with a
                                compression
                                stream that requires reliable operation through wet, variable, or low-pressure conditions.
                            </p>
                        </div>
                    </section>

                    <section class="article-section white" id="conventional-limits">
                        <div class="section-label">Real field failure logic</div>
                        <h2>Why conventional casing gas compressors sometimes underperform</h2>
                        <p>Many casing gas streams are wet, unstable, and highly variable. Conventional gas-only compressors
                            often
                            depend on upstream separation and idealized dry-gas assumptions.</p>
                        <p>In real field service, those assumptions can break down due to entrained liquids, condensate
                            carryover,
                            slugging from unstable wells, freeze-prone separators and drains, flow variability, unstable
                            suction
                            conditions, and high maintenance burden in remote applications.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Entrained liquids</h3>
                                <p>Liquid carryover can create shutdowns, damage risk, and maintenance exposure for gas-only
                                    machines.</p>
                            </div>
                            <div class="line-card">
                                <h3>Unstable suction</h3>
                                <p>Low-pressure casing gas can fluctuate rapidly with well behavior and artificial lift
                                    cycles.</p>
                            </div>
                            <div class="line-card">
                                <h3>Winter support risks</h3>
                                <p>Separators, drains, and instruments can freeze, creating downtime in cold operating
                                    environments.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Remote maintenance</h3>
                                <p>Repeated service calls can erase project economics where wells are remote or marginal.
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section grey" id="fluidstream">
                        <div class="section-label">Fluidstream application</div>
                        <h2>How Fluidstream improves reliability in difficult casing gas applications</h2>
                        <p>Fluidstream’s CompressionCommander™ applies patented multiphase compression technology to casing
                            gas
                            applications where wet gas, unstable production, and liquid carryover challenge conventional
                            systems.</p>
                        <p>Rather than assuming perfect upstream separation, Fluidstream technology is engineered around
                            real field
                            conditions where liquids and upset events may occur during normal operation.</p>
                        <p>Supported by Fluidstream’s core patent portfolio, including US11098709B2, CompressionCommander™
                            uses
                            liquid-aware operating methodology and autonomous control logic to help manage liquid-influenced
                            compression
                            events. The patent reference is used as a credibility anchor for Fluidstream’s engineering
                            approach and does
                            not replace application-specific technical review.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Liquid-aware compression</h3>
                                <p>Designed around wet and variable casing gas streams rather than ideal dry-gas
                                    assumptions.</p>
                            </div>
                            <div class="line-card">
                                <h3>Autonomous response</h3>
                                <p>Controls are intended to support stable operation around user-defined pressure targets
                                    and system
                                    health.</p>
                            </div>
                            <div class="line-card">
                                <h3>Reduced separation dependence</h3>
                                <p>Less reliance on perfect upstream separation can reduce maintenance and freeze-related
                                    exposure.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Field-fit review</h3>
                                <p>Each application should be reviewed around pressure, flow, liquids, winter operation, and
                                    economics.
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section white" id="case-study">
                        <div class="section-label">Case-study proof</div>
                        <h2>Alberta production restoration shows the value of reliable compression.</h2>
                        <p>Fluidstream’s Alberta, Canada field case study demonstrates the impact casing gas compression can
                            have when
                            properly applied in difficult field conditions.</p>
                        <p>The project restored production from wells that were previously non-producing and showed that
                            compression
                            reliability, liquid tolerance, winter operation, and field-fit execution are central to
                            achieving production
                            and economic results.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Alberta, Canada field example</div>
                            <h2>Gas and condensate production restored in real field conditions.</h2>
                            <p>The referenced field case demonstrates why casing gas compression should be evaluated through
                                both
                                production physics and operating reliability.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>~10,000 m³/day</strong><span>Gas production restored in the
                                        referenced
                                        field case study.</span></div>
                                <div class="proof-item"><strong>~5 m³/day</strong><span>Condensate production achieved in
                                        the referenced
                                        field case study.</span></div>
                                <div class="proof-item"><strong>&gt;C$1.5M/year</strong><span>Incremental revenue potential
                                        highlighted in
                                        the case study.</span></div>
                                <div class="proof-item"><strong>Winter operation</strong><span>Reliable operation in harsh
                                        winter and
                                        variable liquid-flow conditions.</span></div>
                            </div>
                        </div>
                    </section>

                    <section class="article-section grey" id="final-thoughts">
                        <div class="section-label">Final thoughts</div>
                        <h2>The best casing gas compression projects combine well physics with field reliability.</h2>
                        <p>Casing gas compression improves oil production by reducing annulus backpressure, increasing
                            drawdown,
                            lowering bottomhole flowing pressure, and improving wellbore fluid management.</p>
                        <p>But successful projects require more than theoretical pressure reduction. They require
                            compression
                            technology capable of operating reliably under the wet, unstable, and maintenance-sensitive
                            realities of
                            actual casing gas service.</p>
                        <p>The best casing gas compression projects are built around both reservoir physics and
                            field-operating
                            realities.</p>
                    </section>
                </article>
            </div>
        </section>
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
                <div class="fs-related-head">
                    <div>
                        <h2>Related Resources</h2>
                    </div>

                    <p class="lead">
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

                            <li>
                                <a href="{{ url('/casing-gas-compression') }}">
                                    CompressionCommander™
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="fs-related-card">
                        <h3>Related Technical Insights</h3>

                        <ul class="fs-related-list">
                            <li>
                                <a href="{{ url('/insights/multiphase-compression-liquid-loaded-gas-wells') }}">
                                    Multiphase Compression for Liquid-Loaded Gas Wells
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/insights/why-conventional-compression-fails-wet-unstable-wells') }}">
                                    Why Conventional Casing Gas Compressors Fail in Wet Wells
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/insights/how-casing-gas-compression-increases-oil-production') }}">
                                    How Casing Gas Compression Increases Oil Production
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
                    <h2>Evaluate whether CompressionCommander™ can improve your well performance.</h2>
                    <p>Built for engineers, production teams, and decision-makers evaluating casing pressure reduction,
                        liquid-loaded wells, low-pressure annulus gas, harsh-weather operation, and maintenance-sensitive
                        field sites.
                        Submit your operating conditions and Fluidstream can assess the technical and economic fit.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/technical-review">Request Technical Review</a>
                        <a class="btn-1 btn-outline" href="/casing-gas-compression">Review CompressionCommander™
                            Specifications</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Current casing pressure and target pressure reduction</li>
                        <li>Reservoir response, fluid loading, and artificial lift interaction</li>
                        <li>Wet-gas risk, liquid carryover, and winter operation</li>
                        <li>Production uplift potential, condensate recovery, and project economics</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

@endsection