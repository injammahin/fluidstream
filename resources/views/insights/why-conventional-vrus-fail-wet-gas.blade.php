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
                                                                                    "headline": "Why Conventional VRUs Fail in Wet Gas Applications",
                                                                                    "description": "A technical guide explaining why conventional vapor recovery units fail in wet gas applications and how Fluidstream VaporCommander improves wet-gas vapor recovery reliability.",
                                                                                    "author": { "@type": "Organization", "name": "Fluidstream" },
                                                                                    "publisher": { "@type": "Organization", "name": "Fluidstream" },
                                                                                    "mainEntityOfPage": "https://fluidstream.co/insights/why-conventional-vrus-fail-wet-gas"
                                                                                  }
                                                                                  </script>

    <section class="hero py-12">
        <div class="wrap hero-grid ">
            <div>
                <h1>Why Conventional VRUs Fail in Wet Gas Applications</h1>
                <p class="hero-lede">A technical guide to scrubber dependence, liquid carryover, freeze-ups, variable vapor
                    flow, maintenance burden, and why Fluidstream VaporCommander™ is built for wet vapor recovery in real
                    field conditions.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/vapor-recovery">Explore VaporCommander™</a>
                    <a class="btn btn-outline" href="#article">Read the Technical Guide</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Many VRUs do not fail because vapor recovery is a bad idea. They fail because the system assumes
                        dry gas when the field delivers wet, variable vapor.</strong>
                    <p>Tank vapors can carry condensate, water, slugs, and changing flow rates that expose the limits of
                        separator-dependent VRU designs.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Wet gas</b><span>Liquids and condensate reach real vapor streams</span></div>
                    <div class="hero-mini"><b>Freeze-ups</b><span>Scrubbers and drains create winter failure points</span>
                    </div>
                    <div class="hero-mini"><b>Low maintenance</b><span>Case studies prove low-touch reliability</span></div>
                    <div class="hero-mini"><b>Patented logic</b><span>Liquid-aware compression response</span></div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="section section-soft py-12" id="article">
            <div class="wrap article-shell">
                <aside class="toc" aria-label="Article contents">
                    <div class="toc-title">Article Contents</div>
                    <a href="#executive-summary">Executive summary</a>
                    <a href="#dry-gas-assumptions">Dry-gas assumptions</a>
                    <a href="#wet-gas-reality">Why wet gas breaks VRUs</a>
                    <a href="#failure-modes">Primary failure modes</a>
                    <a href="#hidden-cost">Hidden operating cost</a>
                    <a href="#vapor-recovery">How VaporCommander™ differs</a>
                    <a href="#patents">Patent-supported approach</a>
                    <a href="#case-studies">Case-study proof</a>
                    <a href="#reliability">Why reliability matters</a>
                    <a href="#final-thoughts">Final thoughts</a>
                </aside>

                <article>
                    <section class="article-section" id="executive-summary">
                        <div class="section-label">Executive summary</div>
                        <h2>Conventional VRUs often fail when the vapor stream is wet, unstable, and exposed to real field
                            conditions.</h2>
                        <p class="lead">Vapor recovery units are often specified based on gas volume, pressure, and nominal
                            throughput. Yet many installations underperform not because the idea of vapor recovery is wrong,
                            but because the selected system does not match the actual fluid stream.</p>
                        <p>In upstream oil and gas operations, tank vapors are frequently wet, unstable, and exposed to
                            harsh seasonal conditions. Conventional scrubber-dependent VRUs can struggle when liquids,
                            freezing, and variable vapor generation become part of normal operation.</p>
                        <p>This article explains why conventional VRUs often fail in wet gas applications and how
                            Fluidstream’s VaporCommander™ offers a more reliable alternative built for real field
                            conditions.</p>
                        <div class="callout"><span class="callout-title">Core point</span>
                            <p>VRU reliability depends less on nameplate capacity and more on whether the system can
                                tolerate wet vapor, liquid carryover, variable flow, and winter operating risk.</p>
                        </div>
                    </section>

                    <section class="article-section" id="dry-gas-assumptions">
                        <div class="section-label">Conventional design assumption</div>
                        <h2>Conventional VRUs are designed around dry-gas assumptions.</h2>
                        <p>Most conventional vapor recovery systems are fundamentally gas-only compressors protected by
                            upstream separation equipment. Their reliability often depends on scrubbers, knockout vessels,
                            filters, drains, and liquid level controls removing liquids before compression.</p>
                        <p>That design approach can perform well in ideal dry-gas conditions. The challenge is that many
                            real vapor recovery streams are not ideal.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Design assumption</h3>
                                <ul>
                                    <li>Gas arrives dry enough for compression</li>
                                    <li>Scrubbers remove liquids reliably</li>
                                    <li>Drain systems remain functional</li>
                                    <li>Flow stays within a stable operating range</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Field reality</h3>
                                <ul>
                                    <li>Tank vapors can contain condensate and water</li>
                                    <li>Liquid slugs can overwhelm protection equipment</li>
                                    <li>Winter conditions can freeze drains and scrubbers</li>
                                    <li>Vapor flow can change rapidly</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="wet-gas-reality">
                        <div class="section-label">Wet vapor reality</div>
                        <h2>Wet gas breaks conventional VRU assumptions.</h2>
                        <p>Tank vapor streams often contain entrained condensate, free water, changing vapor rates, and
                            intermittent liquid slugs. These conditions create reliability issues for conventional VRUs
                            because the compressor itself is not designed to directly manage liquid-influenced compression.
                        </p>
                        <p>Instead, the system relies on upstream equipment to prevent liquids from ever reaching the
                            compressor. That turns the scrubber, drain system, level control, and winterization package into
                            critical reliability components.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Condensate and water</h3>
                                <p>Wet vapor streams can carry liquids that undermine dry-gas compressor assumptions.</p>
                            </div>
                            <div class="line-card">
                                <h3>Intermittent slugs</h3>
                                <p>Short-duration liquid events can create disproportionate reliability problems.</p>
                            </div>
                            <div class="line-card">
                                <h3>Variable vapor rate</h3>
                                <p>Tank vapor generation can change with temperature, liquid level, and facility operation.
                                </p>
                            </div>
                            <div class="fs-card">
                                <h3>Winter exposure</h3>
                                <p>Cold weather can turn liquid handling equipment into a source of downtime.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="failure-modes">
                        <div class="section-label">Failure modes</div>
                        <h2>Primary failure modes of conventional wet-gas VRUs.</h2>
                        <h3>1. Scrubber overload and liquid carryover</h3>
                        <p>When vapor generation surges or liquid loading increases, upstream scrubbers can be overwhelmed.
                            Liquid carryover can then reach the compressor, contributing to shutdowns, mechanical stress,
                            lubricant contamination, and accelerated wear.</p>
                        <h3>2. Winter freeze-ups</h3>
                        <p>In cold climates, liquids can freeze inside scrubbers, drains, and level-control equipment. This
                            can block drainage, impair level control, and increase carryover risk.</p>
                        <h3>3. Variable flow instability</h3>
                        <p>Tank vapor generation is rarely constant. Flow swings can cause conventional systems to hunt,
                            recycle excessively, or operate inefficiently.</p>
                        <h3>4. Maintenance burden</h3>
                        <p>Every separator, drain, filter, and level-control device adds inspection, winterization, and
                            service requirements.</p>
                    </section>

                    <section class="article-section" id="hidden-cost">
                        <div class="section-label">Lifecycle cost</div>
                        <h2>Separator dependence creates hidden operating cost.</h2>
                        <p>Many operators focus on compressor purchase price while underestimating the lifecycle cost of
                            separator-dependent architecture. A conventional VRU package may require repeated scrubber
                            draining, freeze mitigation, filter changes, troubleshooting of level controls, and callouts
                            after liquid upset events.</p>
                        <p>These hidden maintenance costs can materially reduce project economics over time. A lower-cost
                            package can become expensive if it cannot remain online without frequent operator intervention.
                        </p>
                        <div class="callout"><span class="callout-title">Selection risk</span>
                            <p>A conventional VRU may look acceptable on a datasheet, but the economic result depends on
                                uptime, maintenance frequency, winter reliability, and how the system behaves when the vapor
                                stream is wet.</p>
                        </div>
                    </section>

                    <section class="article-section" id="vapor-recovery">
                        <div class="section-label">Fluidstream approach</div>
                        <h2>How Fluidstream VaporCommander™ differs.</h2>
                        <p>Fluidstream VaporCommander™ is designed to operate directly on wet and variable vapor streams
                            without relying on conventional upstream separation as the primary protection strategy.</p>
                        <p>Rather than assuming the gas must be made dry before compression, VaporCommander™ is engineered
                            around the expectation that liquids, condensate, and variable vapor conditions may be present
                            during normal operation.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Wet-vapor compatibility</h3>
                                <p>Built around real tank vapor conditions that can include liquids and variable flow.</p>
                            </div>
                            <div class="line-card">
                                <h3>Reduced scrubber dependency</h3>
                                <p>Lower dependence on freeze-prone separation equipment and drain systems.</p>
                            </div>
                            <div class="line-card">
                                <h3>Low-touch operation</h3>
                                <p>Designed to reduce maintenance burden and operator callouts in reliability-sensitive
                                    sites.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Application fit review</h3>
                                <p>Evaluated around field conditions, not only nominal flow and pressure.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="patents">
                        <div class="section-label">Patent-supported technology</div>
                        <h2>Patent-supported wet-gas compression approach.</h2>
                        <p>Fluidstream’s VaporCommander™ leverages Fluidstream’s patented multiphase compression
                            methodology, including technical positioning supported by US11098709B2 and related Fluidstream
                            patents.</p>
                        <p>This liquid-aware compression approach allows the system to dynamically respond to
                            liquid-influenced compression conditions rather than treating liquid ingress solely as a fault
                            condition.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>US11098709B2</h3>
                                <p>Primary patent anchor for liquid-aware compression response and chamber behavior when
                                    liquids influence compression.</p>
                            </div>
                            <div class="line-card">
                                <h3>US10221664B2</h3>
                                <p>Supports Fluidstream’s broader compression architecture and oil and gas compression
                                    relevance.</p>
                            </div>
                            <div class="line-card">
                                <h3>CA2843321C</h3>
                                <p>Canadian patent coverage supporting Fluidstream’s foundational technology and operating
                                    logic.</p>
                            </div>
                            <div class="fs-card">
                                <h3>CA2883283C</h3>
                                <p>Additional Canadian patent coverage supporting Fluidstream’s multiphase compression
                                    platform.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="case-studies">
                        <div class="section-label">Case-study proof</div>
                        <h2>Field-proven reliability in vapor recovery service.</h2>
                        <p>Fluidstream’s vapor recovery case studies demonstrate the practical maintenance and uptime
                            benefits of a wet-gas vapor recovery architecture designed around real field conditions.</p>
                        <div class="dark-card">
                            <div class="eyebrow">VaporCommander™ field proof</div>
                            <h2>Low-maintenance reliability proven across VRU applications.</h2>
                            <p>The case-study record supports the core argument: low-maintenance wet-gas vapor recovery is
                                achievable when the compression system is designed around real field conditions rather than
                                ideal dry-gas assumptions.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>100%</strong><span>uptime over 16+ months with no
                                        maintenance or service required as of the Allied Energy II case-study date.</span>
                                </div>
                                <div class="proof-item"><strong>4.5+ years</strong><span>operation with only one seal change
                                        to date and about 35 months to first seal replacement.</span></div>
                                <div class="proof-item"><strong>500,000 m³/year</strong><span>gas captured in a vapor
                                        combustor replacement application with no cold-weather stoppages or service
                                        issues.</span></div>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="reliability">
                        <div class="section-label">Reliability over nameplate</div>
                        <h2>Reliability matters more than nameplate capacity.</h2>
                        <p>A vapor recovery unit that looks acceptable on paper but cannot maintain uptime in real service
                            often becomes an operational burden rather than an economic asset.</p>
                        <p>For many operators, reliability, maintenance burden, and winter performance matter as much as or
                            more than nominal capacity. The practical question is not only whether a VRU can move enough
                            gas; it is whether it can continue operating when the gas is wet, variable, and exposed to field
                            conditions.</p>
                    </section>

                    <section class="article-section" id="final-thoughts">
                        <div class="section-label">Final thoughts</div>
                        <h2>Wet gas VRU reliability requires real-world design.</h2>
                        <p>Many conventional VRUs fail in wet gas applications because they were never designed for the true
                            operating environment they face. When wet gas, condensate, freezing, and variable vapor
                            generation are part of the application, separator-dependent gas-only compression systems can
                            struggle.</p>
                        <p>Fluidstream’s VaporCommander™ offers a different approach — one built specifically for wet gas
                            vapor recovery, low maintenance, and reliable field operation in difficult real-world
                            conditions.</p>
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
                                <a href="{{ url('/vapor-recovery') }}">
                                    VaporCommander™
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="fs-related-card">
                        <h3>Related Technical Insights</h3>

                        <ul class="fs-related-list">
                            <li>
                                <a href="{{ url('/insights/fluidstream-vapor-recovery-fluidstream-style') }}">
                                    Vapor Recovery Units for Oil & Gas
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/insights/fluidstream-vru-vs-flaring-complete') }}">
                                    VRU vs. Flaring: Complete Comparison
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/insights/fluidstream-methane-reduction-story-white-sections') }}">
                                    Methane Emissions Reduction Solutions for Oil & Gas
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/insights/how-to-select-right-compression-applications-final-fixed') }}">
                                    How to Select a Vapor Recovery Unit for Wet Gas
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="fs-related-card">
                        <h3>Related Field Deployments</h3>

                        <ul class="fs-related-list">
                            <li>
                                <a href="{{ url('/case-studies/allied-energy-vaporcommander-vru') }}">
                                    Allied Energy VaporCommander™ VRU Case Study
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/case-studies/whitecap-vaporcommander-vru') }}">
                                    Whitecap VaporCommander™ VRU Case Study
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="fs-related-card">
                        <h3>Related Technology</h3>

                        <ul class="fs-related-list">
                            <li>
                                <a href="{{ url('/technology') }}">
                                    Fluidstream Technology Overview
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
                    <h2>Evaluate whether VaporCommander™ can improve your wet-gas vapor recovery application.</h2>
                    <p>Built for engineers, production teams, and decision-makers evaluating vapor recovery in wet vapor,
                        liquid carryover, winter exposure, variable flow, and maintenance-sensitive field sites. Submit your
                        operating conditions and Fluidstream can assess the technical and economic fit.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/technical-review">Request Technical Review</a>
                        <a class="btn-1 btn-outline" href="/vapor-recovery">Review VaporCommander™</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Tank vapor source, rate, composition, and liquid carryover risk</li>
                        <li>Suction and discharge pressure requirements</li>
                        <li>Winter operation, freezing exposure, and remote access</li>
                        <li>Current maintenance history, uptime issues, and reliability objectives</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

@endsection