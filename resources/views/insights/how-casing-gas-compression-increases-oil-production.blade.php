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
            scroll-padding-top: 135px;
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

    <section class="hero">
        <div class="wrap hero-grid py-12">
            <div>
                <div class="eyebrow">Technical Article / Casing Gas Production</div>
                <h1>How Casing Gas Compression Increases Oil Production</h1>
                <p class="hero-lede">A practical engineering guide to how reducing casing pressure can improve drawdown,
                    stabilize production, reduce liquid loading effects, and support higher oil and condensate recovery in
                    suitable wells.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/casing-gas-compression">Explore CompressionCommander™</a>
                    <a class="btn btn-outline" href="#case-study-proof">View Field Proof</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Casing gas compression can be a production optimization tool, not only a gas-handling
                        solution.</strong>
                    <p>When casing pressure restricts well performance, reliable compression can help restore drawdown,
                        improve fluid movement, and preserve production value.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Oil uplift</b><span>Lower casing pressure can improve production in suitable
                            wells.</span></div>
                    <div class="hero-mini"><b>5 m³/day</b><span>Condensate production increase referenced in the field case
                            study.</span></div>
                    <div class="hero-mini"><b>Patent-supported</b><span>Fluidstream patents support liquid-influenced
                            compression methodology.</span></div>
                    <div class="hero-mini"><b>Field proof</b><span>Case study: two wells restored to revenue-generating
                            production.</span></div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area">
        <div class="wrap article-shell py-12">
            <aside class="toc" aria-label="Article contents">
                <a href="#beyond-gas-capture" class="active"><span>Beyond gas capture</span></a>
                <a href="#casing-pressure"><span>Casing pressure impact</span></a>
                <a href="#lowering-pressure"><span>Lowering casing pressure</span></a>
                <a href="#greatest-impact"><span>Greatest production impact</span></a>
                <a href="#uplift-varies"><span>Why uplift varies</span></a>
                <a href="#reliability"><span>Reliability and gains</span></a>
                <a href="#conventional-limits"><span>Conventional limits</span></a>
                <a href="#compressioncommander-fit"><span>CompressionCommander™ fit</span></a>
                <a href="#patents"><span>Patent-supported foundation</span></a>
                <a href="#case-study-proof"><span>Case study proof</span></a>
                <a href="#faq"><span>FAQ</span></a>
            </aside>

            <article>
                <section class="content-section" id="beyond-gas-capture">
                    <div class="article-card">
                        <div class="section-label">Production optimization</div>
                        <h2>Operators use casing gas compression for more than gas capture.</h2>
                        <p class="lead">Casing gas compression is often discussed in the context of gas capture, emissions
                            reduction, or vapor handling.</p>
                        <p>However, one of its most important economic functions is improving oil production by reducing
                            casing pressure on producing wells.</p>
                        <p>In many oilfield applications, the value created by increased oil production can exceed the value
                            of captured gas. For this reason, casing gas compression is frequently justified not only as a
                            gas-handling solution, but as a production optimization tool.</p>
                        <div class="callout"><span class="callout-title">Core takeaway</span>
                            <p>The strongest casing gas compression opportunities often combine gas capture, production
                                uplift, improved well stability, and reliable operation in real field conditions.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="casing-pressure">
                    <div class="article-card">
                        <div class="section-label">Backpressure problem</div>
                        <h2>How casing pressure restricts well performance</h2>
                        <p>As casing pressure builds, it increases backpressure on the wellbore and can reduce the effective
                            pressure differential driving hydrocarbons toward surface facilities. Elevated casing pressure
                            can impair natural flow, reduce artificial lift effectiveness, and worsen liquid loading
                            behavior depending on the well configuration.</p>
                        <p>When casing pressure becomes sufficiently restrictive, production rates may decline materially
                            even if reservoir potential remains.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Reduced drawdown</h3>
                                <p>Higher casing pressure can reduce the pressure differential needed to move hydrocarbons
                                    toward the wellbore.</p>
                            </div>
                            <div class="line-card">
                                <h3>Artificial lift impact</h3>
                                <p>Elevated casing pressure can reduce the effectiveness of lift systems and destabilize
                                    production behavior.</p>
                            </div>
                            <div class="line-card">
                                <h3>Liquid loading</h3>
                                <p>Higher backpressure can worsen liquid accumulation and make unloading more difficult.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Production decline</h3>
                                <p>Restrictive casing pressure can suppress production even where recoverable hydrocarbons
                                    remain.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="lowering-pressure">
                    <div class="article-card">
                        <div class="section-label">Production mechanism</div>
                        <h2>How lowering casing pressure can increase oil production</h2>
                        <p>By compressing and removing casing gas, a casing gas compressor lowers casing pressure and
                            reduces backpressure on the well system. This can improve pressure drawdown across the producing
                            interval and enhance hydrocarbon movement toward the wellbore and surface facilities.</p>
                        <p>In practical terms, reducing casing pressure can improve well unload efficiency, reduce liquid
                            fallback, stabilize production, and increase overall fluid production depending on the well and
                            reservoir characteristics.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>High casing pressure can cause</h3>
                                <ul>
                                    <li>Reduced drawdown</li>
                                    <li>Liquid loading and fallback</li>
                                    <li>Intermittent production behavior</li>
                                    <li>Artificial lift limitations</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Lower casing pressure can support</h3>
                                <ul>
                                    <li>Improved well unloading</li>
                                    <li>More stable flow</li>
                                    <li>Greater production response</li>
                                    <li>Improved hydrocarbon recovery economics</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="greatest-impact">
                    <div class="article-card">
                        <div class="section-label">Best-fit wells</div>
                        <h2>When compression typically has the greatest production impact</h2>
                        <p>Casing gas compression often delivers the greatest production response in wells experiencing
                            elevated casing pressure, liquid loading, plunger lift limitations, unstable intermittent flow,
                            gathering pressure constraints, or declining reservoir pressure.</p>
                        <p>Wells that are near the margin of flowing naturally may show particularly strong response when
                            casing pressure is reduced.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Loaded wells</h3>
                                <p>Wells affected by liquid loading may benefit when lower casing pressure improves
                                    unloading behavior.</p>
                            </div>
                            <div class="line-card">
                                <h3>Plunger lift constraints</h3>
                                <p>Compression may support applications where pressure conditions limit plunger lift
                                    effectiveness.</p>
                            </div>
                            <div class="line-card">
                                <h3>Gathering constraints</h3>
                                <p>High downstream or gathering pressure can limit production without compression support.
                                </p>
                            </div>
                            <div class="fs-card">
                                <h3>Marginal flowing wells</h3>
                                <p>Wells near the edge of flowing may respond strongly when casing pressure restriction is
                                    reduced.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="uplift-varies">
                    <div class="article-card">
                        <div class="section-label">Application-specific response</div>
                        <h2>Production uplift varies by application.</h2>
                        <p>Not every well responds equally to casing gas compression. Actual uplift depends on reservoir
                            pressure, inflow performance, tubing design, artificial lift method, gathering pressure, fluid
                            composition, wellbore geometry, and the degree to which casing pressure is the limiting factor.
                        </p>
                        <p>For this reason, production uplift should be evaluated on an application-specific basis rather
                            than assumed universally.</p>
                        <div class="callout"><span class="callout-title">Evaluation principle</span>
                            <p>Casing gas compression should be evaluated using actual well behavior, pressure history,
                                liquid loading indicators, production response potential, and field reliability
                                requirements.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="reliability">
                    <div class="article-card">
                        <div class="section-label">Sustained gains</div>
                        <h2>Reliability is critical to sustaining oil production gains.</h2>
                        <p>The production benefit of casing gas compression only exists while the compression system is
                            operating. If the compressor experiences recurring downtime, shutdowns, or instability, the
                            casing pressure benefit may be lost and production uplift can decline accordingly.</p>
                        <p>Reliability therefore has a direct impact on sustained oil production gains and project
                            economics.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Uptime preserves drawdown</h3>
                                <p>Stable compressor operation helps maintain the reduced casing pressure required for
                                    production benefit.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Downtime erodes uplift</h3>
                                <p>Shutdowns can allow casing pressure to rebuild and reduce production response.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Maintenance affects ROI</h3>
                                <p>Frequent maintenance increases operating cost and reduces realized production value.</p>
                            </div>
                            <div class="line-card">
                                <h3>Field fit matters</h3>
                                <p>Wet gas and unstable production conditions should be considered before selecting a
                                    compression system.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="conventional-limits">
                    <div class="article-card">
                        <div class="section-label">Conventional limits</div>
                        <h2>Why conventional compression can limit realized uplift</h2>
                        <p>Conventional gas-only compression systems may struggle in applications involving wet gas,
                            unstable casing flow, liquid carryover, or separator-dependent operation. In these situations,
                            recurring downtime can materially reduce realized production uplift compared to projected
                            uplift.</p>
                        <p>This is why compressor reliability and operating fit are critical considerations when evaluating
                            expected production gains.</p>
                    </div>
                </section>

                <section class="content-section" id="compressioncommander-fit">
                    <div class="article-card">
                        <div class="section-label">Fluidstream approach</div>
                        <h2>Where CompressionCommander™ fits</h2>
                        <p>Fluidstream’s CompressionCommander™ is designed for casing gas compression applications where wet
                            gas, unstable production, liquid carryover, or separator-dependent reliability issues may
                            challenge conventional systems.</p>
                        <p>By supporting difficult field conditions that can materially affect uptime, CompressionCommander™
                            may help preserve the production gains associated with reduced casing pressure.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Wet gas production service</h3>
                                <p>Supports casing gas applications where liquid-influenced behavior may be part of normal
                                    operation.</p>
                            </div>
                            <div class="line-card">
                                <h3>Reduced separator dependence</h3>
                                <p>Helps reduce reliance on perfect upstream separation where field conditions are unstable.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Production uptime</h3>
                                <p>Targets reliable operation so reduced casing pressure can be sustained over time.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Application review</h3>
                                <p>Best fit depends on pressure conditions, liquid behavior, well response, and production
                                    economics.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="patents">
                    <div class="article-card">
                        <div class="section-label">Patented technology</div>
                        <h2>Patent-supported technical foundation</h2>
                        <p>Fluidstream’s approach to liquid-influenced and unstable gas compression applications is
                            supported by its patent portfolio, including US11098709B2, CA2843321C, CA2883283C, and
                            US10221664B2.</p>
                        <div class="callout"><span class="callout-title">Technical relevance</span>
                            <p>For production-sensitive casing gas applications, the practical value is reliable compression
                                in the same wet, unstable, liquid-influenced conditions that often determine whether
                                production uplift is sustained.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="case-study-proof">
                    <div class="article-card">
                        <div class="section-label">Case study proof</div>
                        <h2>Field example: production recovery through compression</h2>
                        <p>In one Fluidstream application, casing gas compression helped restore two previously
                            non-producing wells to approximately 10,000 m³/day of gas production equivalent while increasing
                            condensate production by approximately 5 m³/day, supporting over $1.5 million in annual
                            incremental revenue potential through restored hydrocarbon production.</p>
                        <p>While results vary by application, this demonstrates the economic importance of preserving
                            reliable compression in production-sensitive wells.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field case study</div>
                            <h2>Production uplift becomes more valuable when compression reliability preserves the response.
                            </h2>
                            <p>This case study demonstrates how casing gas compression can help restore production, increase
                                condensate output, and support material revenue recovery when field conditions are
                                technically suitable.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>~10,000 m³/day</strong><span>Gas production restored from
                                        two previously non-producing wells.</span></div>
                                <div class="proof-item"><strong>~5 m³/day</strong><span>Increase in condensate production
                                        associated with restored operation.</span></div>
                                <div class="proof-item"><strong>$1.5M+/year</strong><span>Approximate incremental annual
                                        revenue potential through restored hydrocarbon production.</span></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="faq">
                    <div class="article-card">
                        <div class="section-label">FAQ</div>
                        <h2>Casing gas compression and oil production FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>Does casing gas compression always increase oil production?</h3>
                                <p>No. Production uplift depends on whether casing pressure is materially restricting well
                                    performance.</p>
                            </div>
                            <div class="faq-item">
                                <h3>How much oil production increase can compression provide?</h3>
                                <p>Production response varies significantly by well and should be evaluated case by case.
                                </p>
                            </div>
                            <div class="faq-item">
                                <h3>Why does uptime matter so much?</h3>
                                <p>Production uplift is tied directly to maintaining reduced casing pressure over time.</p>
                            </div>
                            <div class="faq-item">
                                <h3>When should operators consider CompressionCommander™?</h3>
                                <p>CompressionCommander™ should be evaluated where elevated casing pressure, wet gas,
                                    unstable production, liquid carryover, or compressor reliability issues affect
                                    production performance.</p>
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
                    <h2>Evaluate whether CompressionCommander™ can support production optimization on your wells.</h2>
                    <p>If elevated casing pressure may be restricting production, Fluidstream can review your operating
                        conditions and help determine whether casing gas compression may improve production performance.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/contact">Request Production Optimization Review</a>
                        <a class="btn-1 btn-outline" href="/casing-gas-compression">Review CompressionCommander™</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Casing pressure, tubing pressure, and gathering pressure</li>
                        <li>Oil, gas, condensate, and liquid loading behavior</li>
                        <li>Artificial lift limitations and production instability</li>
                        <li>Potential production response, uptime needs, and project economics</li>
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