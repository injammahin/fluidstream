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
                <div class="eyebrow">Technical Article / Methane Emissions Reduction</div>
                <h1>Methane Emissions Reduction Solutions for Oil & Gas</h1>
                <p class="hero-lede">Practical vapor recovery and low-pressure gas capture for operators facing tighter
                    methane regulation, wet gas reliability issues, and the need to turn wasted hydrocarbons into
                    recoverable value.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/vapor-recovery">Explore VaporCommander™</a>
                    <a class="btn btn-outline" href="#case-study-proof">View Field Proof</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Methane reduction succeeds when the field equipment keeps running in real vapor recovery
                        conditions.</strong>
                    <p>Wet gas, condensate carryover, pressure swings, variable vapor rates, and freeze-prone equipment can
                        determine whether emissions reduction targets are achieved in practice.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Gas capture</b><span>Recover vapors that may otherwise be vented, flared, or
                            combusted.</span></div>
                    <div class="hero-mini"><b>Wet gas fit</b><span>Designed for vapor streams where liquids and instability
                            are present.</span></div>
                    <div class="hero-mini"><b>Regulatory pressure</b><span>Supports operators facing tightening methane and
                            flaring rules.</span></div>
                    <div class="hero-mini"><b>Field proof</b><span>Case study: about 500,000 m³/year of gas captured.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area py-12">
        <div class="wrap article-shell">
            <aside class="toc" aria-label="Article contents">
                <a href="#executive-summary" class="active"><span>Executive summary</span></a>
                <a href="#why-methane-reduction-matters"><span>Why methane reduction matters</span></a>
                <a href="#regulatory-landscape"><span>Regulatory markets</span></a>
                <a href="#vapor-recovery-value"><span>Vapor recovery value</span></a>
                <a href="#why-projects-underperform"><span>Why projects underperform</span></a>
                <a href="#fluidstream-approach"><span>Fluidstream approach</span></a>
                <a href="#case-study-proof"><span>Case study proof</span></a>
                <a href="#application-fit"><span>Application fit</span></a>
                <a href="#faq"><span>FAQ</span></a>
            </aside>

            <article>
                <section class="content-section white py-12" id="executive-summary">
                    <div class="article-card">
                        <div class="section-label">Executive summary</div>
                        <h2>Methane reduction is now an operational, regulatory, and commercial priority.</h2>
                        <p class="lead">Oil and gas operators are under increasing pressure to reduce venting, minimize
                            combustion losses, improve emissions performance, and capture hydrocarbons that would otherwise
                            be wasted.</p>
                        <p>Methane emissions reduction is not only a compliance issue. It is also a production, facility
                            reliability, and gas monetization issue. Every molecule vented, combusted inefficiently, or lost
                            through poor process control can represent emissions exposure and lost economic opportunity.</p>
                        <p>Fluidstream supports methane reduction projects with VaporCommander™ and multiphase compression
                            technology for applications where conventional gas-only vapor recovery systems may struggle with
                            wet, unstable, or liquid-laden gas streams.</p>
                        <div class="callout">
                            <span class="callout-title">Core takeaway</span>
                            <p>Reliable gas capture depends on equipment that can operate in real field conditions, not only
                                under clean, dry, steady-state design assumptions.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="why-methane-reduction-matters">
                    <div class="article-card">
                        <div class="section-label">Why it matters</div>
                        <h2>Methane is both a regulated greenhouse gas and a valuable hydrocarbon product.</h2>
                        <p>For upstream producers, methane reduction increasingly sits at the intersection of compliance,
                            economics, facility uptime, and public accountability. Gas that is vented, flared, or combusted
                            inefficiently may create regulatory exposure while also reducing the commercial value available
                            from the production system.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Reduce emissions exposure</h3>
                                <p>Gas capture and vapor recovery can reduce reliance on routine venting or inefficient
                                    combustion strategies.</p>
                            </div>
                            <div class="line-card">
                                <h3>Recover hydrocarbon value</h3>
                                <p>Captured gas may be routed for sale, fuel, reinjection, or other beneficial use depending
                                    on the site.</p>
                            </div>
                            <div class="line-card">
                                <h3>Improve operating control</h3>
                                <p>Better vapor management can reduce pressure instability and improve facility performance.
                                </p>
                            </div>
                            <div class="fs-card">
                                <h3>Support ESG and compliance</h3>
                                <p>Reliable field equipment helps operators convert methane objectives into measurable
                                    operating results.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="regulatory-landscape">
                    <div class="article-card">
                        <div class="section-label">Regulatory landscape</div>
                        <h2>Major producing regions are tightening expectations for methane, flaring, and venting.</h2>
                        <p>Methane regulation is tightening across many of Fluidstream’s target markets, including Western
                            Canada, the United States, South America, the North Sea, the Middle East, Africa, and
                            Asia-Pacific. While detailed requirements vary by jurisdiction, the regulatory direction is
                            consistent.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Common regulatory direction</h3>
                                <ul>
                                    <li>Reduced tolerance for routine venting and flaring</li>
                                    <li>Greater scrutiny of methane-emitting equipment and facilities</li>
                                    <li>Expanded measurement, monitoring, and reporting expectations</li>
                                    <li>More pressure to commercialize low-pressure gas streams where practical</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Commercial implication</h3>
                                <ul>
                                    <li>More value placed on practical gas capture</li>
                                    <li>Higher importance of vapor recovery uptime</li>
                                    <li>Greater need for wet gas reliability</li>
                                    <li>Stronger case for low-pressure compression where economics fit</li>
                                </ul>
                            </div>
                        </div>
                        <h3>Examples of active regulatory markets</h3>
                        <p>Important producing jurisdictions include Canada, with federal methane requirements and
                            provincial activity in Alberta, British Columbia, and Saskatchewan; the United States, with
                            federal methane rules and producing-state regulation in North Dakota, Texas, New Mexico,
                            Colorado, Wyoming, California, Pennsylvania, Ohio, Oklahoma, Louisiana, and Utah; and
                            international markets including Colombia, Argentina, Brazil, Ecuador, Mexico, Guyana, Norway,
                            the United Kingdom, the Netherlands, Denmark, Saudi Arabia, the United Arab Emirates, Qatar,
                            Oman, Nigeria, Angola, Algeria, Egypt, Australia, Indonesia, and Malaysia.</p>
                        <div class="callout">
                            <span class="callout-title">Market signal</span>
                            <p>Across these jurisdictions, operators increasingly need practical and reliable field
                                solutions that reduce methane emissions while supporting production economics.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="vapor-recovery-value">
                    <div class="article-card">
                        <div class="section-label">Vapor recovery value</div>
                        <h2>Vapor recovery is often a high-value methane reduction strategy.</h2>
                        <p>In many production facilities, vapor recovery can reduce methane emissions while monetizing gas
                            that would otherwise be vented, flared, or combusted. Rather than treating tank vapors as a
                            waste stream, operators can recover and route gas for sale, fuel, reinjection, or other
                            practical use.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Tank vapor recovery</h3>
                                <p>Capture low-pressure vapors instead of relying on routine venting or combustion.</p>
                            </div>
                            <div class="line-card">
                                <h3>Low-pressure gas capture</h3>
                                <p>Apply compression where pressure is too low for reliable routing without mechanical
                                    assistance.</p>
                            </div>
                            <div class="line-card">
                                <h3>Wet vapor service</h3>
                                <p>Support applications where condensate carryover and unstable vapor rates create
                                    reliability challenges.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Economic alignment</h3>
                                <p>Improve the project case by combining emissions reduction with recovered gas value.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="why-projects-underperform">
                    <div class="article-card">
                        <div class="section-label">Failure logic</div>
                        <h2>Many methane reduction projects underperform because equipment is selected for ideal conditions.
                        </h2>
                        <p>Methane reduction projects can fail to achieve expected results when the selected equipment
                            cannot tolerate the real operating conditions of the application. Vapor recovery systems often
                            see wet gas, condensate carryover, pressure swings, variable vapor rates, and freeze-prone field
                            conditions.</p>
                        <p>When conventional gas-only equipment depends on dry, stable inlet conditions, uptime can fall and
                            maintenance requirements can rise. Lost uptime directly reduces emissions reduction, gas capture
                            value, and operator confidence in the project.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Wet gas and condensate</h3>
                                <p>Liquid carryover can create shutdowns, instability, and maintenance problems in
                                    conventional vapor recovery packages.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Pressure swings</h3>
                                <p>Changing vapor rates and facility pressures can push equipment away from its efficient
                                    operating window.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Freeze-prone equipment</h3>
                                <p>Scrubbers, drains, level controls, and upstream separation components can become
                                    reliability risks in winter operation.</p>
                            </div>
                            <div class="line-card">
                                <h3>Maintenance erosion</h3>
                                <p>Unexpected maintenance can erode the emissions and economic value expected from the
                                    project.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="fluidstream-approach">
                    <div class="article-card">
                        <div class="section-label">Fluidstream approach</div>
                        <h2>VaporCommander™ is designed for difficult vapor recovery and low-pressure gas capture
                            applications.</h2>
                        <p>Fluidstream’s VaporCommander™ and multiphase compression technology are designed for applications
                            where conventional gas-only systems may struggle with wet, unstable, or liquid-laden vapor
                            streams. The objective is practical uptime: capture gas reliably enough for the emissions
                            reduction strategy to work in the field.</p>
                        <p>Fluidstream’s patent portfolio supports the engineering foundation behind its liquid-aware
                            compression approach. As one conservative reference point, US11098709B2 is relevant to
                            Fluidstream’s adaptive response to liquid-influenced compression behavior.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Handles wet vapor streams</h3>
                                <p>Designed for applications where condensate and changing gas/liquid behavior may be part
                                    of normal operation.</p>
                            </div>
                            <div class="line-card">
                                <h3>Reduces separator dependence</h3>
                                <p>Less reliance on perfect upstream separation can reduce maintenance exposure and winter
                                    reliability issues.</p>
                            </div>
                            <div class="line-card">
                                <h3>Supports low-pressure capture</h3>
                                <p>Applicable where gas needs compression before it can be routed for sale, fuel,
                                    reinjection, or beneficial use.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Patent-supported logic</h3>
                                <p>Patent references are used as engineering credibility anchors, not as a substitute for
                                    application-specific review.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="case-study-proof">
                    <div class="article-card">
                        <div class="section-label">Case study proof</div>
                        <h2>A vapor recovery application captured approximately 500,000 m³/year of gas.</h2>
                        <p>In one vapor recovery application, approximately 500,000 m³/year of gas was captured that would
                            otherwise have been combusted. The project created estimated annual gas value while also
                            reducing associated emissions exposure.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field case study</div>
                            <h2>Practical methane reduction requires reliable capture, not just a theoretical emissions
                                plan.</h2>
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
                        <div class="card-grid">
                            <a class="fs-card" href="/case-studies">
                                <h3>Read the case study</h3>
                                <p>Review the vapor recovery proof point and see how gas capture can support emissions and
                                    economic objectives.</p>
                            </a>
                            <a class="line-card" href="/vapor-recovery">
                                <h3>Review VaporCommander™</h3>
                                <p>See how Fluidstream approaches wet vapor recovery and low-pressure gas capture
                                    applications.</p>
                            </a>
                        </div>
                    </div>
                </section>

                <section class="content-section grey" id="application-fit">
                    <div class="article-card">
                        <div class="section-label">Application fit</div>
                        <h2>Where Fluidstream can support methane reduction projects</h2>
                        <p>Fluidstream is strongest where methane reduction depends on reliable low-pressure gas capture
                            under wet, unstable, or maintenance-sensitive field conditions. Application fit should be
                            reviewed using actual gas rates, liquid behavior, pressure conditions, winter exposure, facility
                            constraints, and gas-use options.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Tank vapor recovery</h3>
                                <p>Low-pressure vapors where recovered gas can be routed for value or emissions reduction.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Wet gas VRU applications</h3>
                                <p>Sites where condensate, pressure instability, or freeze exposure challenge conventional
                                    systems.</p>
                            </div>
                            <div class="line-card">
                                <h3>Remote production facilities</h3>
                                <p>Locations where maintenance burden, uptime, and operator intervention strongly affect
                                    economics.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Compliance-driven projects</h3>
                                <p>Applications where emissions reduction must also make operational and commercial sense.
                                </p>
                            </div>
                        </div>
                        <div class="callout">
                            <span class="callout-title">Fit assessment principle</span>
                            <p>The strongest methane reduction projects combine regulatory need, recoverable gas value,
                                suitable site conditions, and equipment reliability in the actual operating environment.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section white" id="faq">
                    <div class="article-card">
                        <div class="section-label">FAQ</div>
                        <h2>Methane emissions reduction and vapor recovery FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>Why is vapor recovery important for methane reduction?</h3>
                                <p>Vapor recovery can capture low-pressure gas that may otherwise be vented, flared, or
                                    combusted, reducing emissions exposure while preserving hydrocarbon value.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why do some methane reduction projects underperform?</h3>
                                <p>Projects often underperform when equipment is selected for ideal dry-gas conditions but
                                    the field application includes wet gas, condensate carryover, variable vapor rates,
                                    pressure swings, or freeze-prone equipment.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Where does VaporCommander™ fit?</h3>
                                <p>VaporCommander™ fits vapor recovery and low-pressure gas capture applications where wet,
                                    unstable, or liquid-laden streams make conventional gas-only systems difficult to
                                    operate reliably.</p>
                            </div>
                            <div class="faq-item">
                                <h3>How should operators evaluate fit?</h3>
                                <p>Operators should review gas volume, liquid behavior, suction and discharge pressure,
                                    winter exposure, maintenance history, gas-use options, and the economics of recovered
                                    gas value versus installed and lifecycle cost.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why mention Fluidstream patents?</h3>
                                <p>Patent references provide conservative engineering credibility for Fluidstream’s
                                    liquid-aware compression approach. They should be viewed as technical support, not as
                                    broad legal or competitive claims.</p>
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
                    <h2>Evaluate whether VaporCommander™ fits your methane reduction application.</h2>
                    <p>Submit your vapor recovery or low-pressure gas capture conditions and Fluidstream can review the
                        technical and economic fit for wet gas reliability, emissions reduction, recovered gas value, and
                        field uptime.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/contact">Request Technical Fit Review</a>
                        <a class="btn-1 btn-outline" href="/vapor-recovery">Review VaporCommander™</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Vapor rate, gas composition, and recovered gas use</li>
                        <li>Liquids, condensate carryover, and pressure instability</li>
                        <li>Winter exposure, separator dependence, and maintenance history</li>
                        <li>Regulatory driver, emissions target, and project economics</li>
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
                sections.forEach(section => {
                    if (section.getBoundingClientRect().top <= offset) { current = section.id; }
                });
                links.forEach(link => link.classList.toggle('active', link.getAttribute('href') === '#' + current));
            };
            setActive();
            window.addEventListener('scroll', setActive, { passive: true });
        })();
    </script>



@endsection