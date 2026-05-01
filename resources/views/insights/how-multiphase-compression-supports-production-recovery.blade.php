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
                <div class="eyebrow">Technical Article / Loaded Gas Wells</div>
                <h1>How Multiphase Compression Supports Loaded Gas Wells and Production Recovery</h1>
                <p class="hero-lede">Loaded gas well recovery is not only a critical-velocity problem. It is a system-level
                    multiphase flow challenge involving liquid holdup, unstable flow regimes, surface backpressure,
                    separator reliability, and real-world uptime.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/multiphase-compression">Explore MultiphaseCommander™</a>
                    <a class="btn btn-outline" href="#case-study-proof">View Field Proof</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Loaded wells need compression that can stay online when gas is wet, unstable, and
                        liquid-influenced.</strong>
                    <p>Fluidstream multiphase compression supports pressure reduction and production recovery while reducing
                        dependence on perfect upstream separation.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Wet flow</b><span>Designed for gas streams influenced by liquids, slugs, and
                            changing liquid fractions.</span></div>
                    <div class="hero-mini"><b>Uptime</b><span>Reliability protects production recovery and field
                            economics.</span></div>
                    <div class="hero-mini"><b>Patent-supported</b><span>Core Fluidstream IP supports liquid-aware
                            compression behavior.</span></div>
                    <div class="hero-mini"><b>Field proof</b><span>Alberta case study restored two non-producing loaded gas
                            wells.</span></div>
                </div>
            </div>
        </div>
    </section>

    <main id="article" class="article-area">
        <div class="wrap article-shell py-12">
            <aside class="toc" aria-label="Article contents">
                <a href="#loaded-wells" class="active"><span>Loaded gas wells</span></a>
                <a href="#why-load"><span>Why wells become loaded</span></a>
                <a href="#production-impact"><span>Production impact</span></a>
                <a href="#diagnosis"><span>Diagnosis complexity</span></a>
                <a href="#conventional-limits"><span>Conventional limits</span></a>
                <a href="#multiphase-helps"><span>How multiphase helps</span></a>
                <a href="#economics"><span>Reliability and economics</span></a>
                <a href="#fluidstream-fit"><span>Where Fluidstream fits</span></a>
                <a href="#advanced-flow"><span>Flow regime considerations</span></a>
                <a href="#system-design"><span>System design</span></a>
                <a href="#patents"><span>Patent-supported foundation</span></a>
                <a href="#case-study-proof"><span>Case study proof</span></a>
                <a href="#faq"><span>FAQ</span></a>
            </aside>

            <article>
                <section class="content-section" id="loaded-wells">
                    <div class="article-card">
                        <div class="section-label">Loaded well recovery</div>
                        <h2>Loaded gas wells are a system-level multiphase flow problem.</h2>
                        <p class="lead">Loaded gas wells represent one of the most technically misunderstood production
                            optimization opportunities in upstream oil and gas operations.</p>
                        <p>While many discussions reduce liquid loading to a simple critical-velocity issue, the real
                            engineering mechanics are substantially more complex. Liquid loading is a dynamic, system-level
                            multiphase flow instability involving reservoir depletion, gas velocity degradation, hydrostatic
                            liquid holdup, changing flow regimes, tubing geometry, condensate dropout, water production,
                            wellbore inclination, and surface backpressure interaction.</p>
                        <p>Effective loaded-gas-well recovery therefore requires more than simply adding horsepower or
                            reducing pressure. It requires a compression strategy capable of operating within unstable wet
                            multiphase service while maintaining real-world uptime.</p>
                        <div class="callout"><span class="callout-title">Fluidstream approach</span>
                            <p>Fluidstream’s multiphase compression technology is purpose-built for loaded gas well
                                applications where conventional separator-dependent gas compression can lose reliability or
                                economic viability.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="why-load">
                    <div class="article-card">
                        <div class="section-label">Root cause</div>
                        <h2>Why gas wells become liquid loaded</h2>
                        <p>Gas wells become liquid loaded when upward gas velocity in the wellbore falls below the velocity
                            required to continuously transport produced liquids to surface. Once gas velocity drops below
                            this transport threshold, liquids begin to accumulate in the tubing and lower wellbore.</p>
                        <p>The resulting hydrostatic liquid column increases flowing bottomhole pressure, reduces reservoir
                            drawdown, lowers gas rate, and further weakens the well’s ability to lift liquids. This creates
                            a self-reinforcing feedback loop that can progressively damage production.</p>
                        <p>Reservoir pressure decline is the most common cause, but liquid loading is not exclusively a
                            low-rate problem. High-rate wells can also load if tubing is oversized, condensate dropout is
                            severe, water production increases, inclination creates film fallback, or surface backpressure
                            suppresses effective transport velocity.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Reservoir decline</h3>
                                <p>As depletion progresses, gas deliverability and upward gas velocity fall.</p>
                            </div>
                            <div class="line-card">
                                <h3>Liquid sources</h3>
                                <p>Formation water, aquifer encroachment, water coning, condensed water, condensate, or
                                    crossflow may contribute.</p>
                            </div>
                            <div class="line-card">
                                <h3>Flow transitions</h3>
                                <p>Wells may move from annular or mist flow into churn, slug, intermittent, or bubble flow
                                    over time.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Surface pressure</h3>
                                <p>Backpressure can suppress effective transport velocity and make unloading harder.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="production-impact">
                    <div class="article-card">
                        <div class="section-label">Production decline</div>
                        <h2>Why liquid loading reduces production</h2>
                        <p>Liquid loading reduces production primarily by increasing hydrostatic backpressure in the
                            wellbore. As liquid accumulates, the pressure required to push hydrocarbons to surface rises.
                            This increases bottomhole flowing pressure and reduces pressure drawdown across the producing
                            interval.</p>
                        <p>As drawdown decreases, reservoir inflow falls. Lower inflow reduces gas velocity further,
                            worsening liquid accumulation. Loaded wells often enter unstable cyclical behavior, where
                            liquids accumulate until pressure builds sufficiently behind the column to partially unload the
                            well. The well then surges, produces briefly at elevated rates, and repeats the cycle.</p>
                        <div class="numbered-steps">
                            <div class="step"><strong>Gas velocity declines</strong><span>The well loses the transport
                                    energy needed to continuously carry liquids to surface.</span></div>
                            <div class="step"><strong>Liquid begins to accumulate</strong><span>Water and condensate holdup
                                    increase hydrostatic pressure in the tubing.</span></div>
                            <div class="step"><strong>Drawdown falls</strong><span>Higher bottomhole pressure reduces inflow
                                    from the producing interval.</span></div>
                            <div class="step"><strong>Production collapses further</strong><span>Lower gas rate worsens
                                    liquid loading and can eventually kill the well.</span></div>
                        </div>
                        <div class="callout"><span class="callout-title">Asset impact</span>
                            <p>In severe cases, hydrostatic loading can fully kill the well even though economically
                                recoverable hydrocarbons may remain in the reservoir.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="diagnosis">
                    <div class="article-card">
                        <div class="section-label">Engineering assessment</div>
                        <h2>Diagnosing loaded wells requires more than a single critical-rate check.</h2>
                        <p>Diagnosing liquid loading requires more than comparing gas rate to a Turner critical rate
                            estimate. Critical-rate models are useful screening tools, but they can materially misrepresent
                            actual loading risk if used in isolation.</p>
                        <p>A technically sound loading assessment should integrate production history, decline trends,
                            tubing and casing pressure behavior, pressure surveys, wellbore geometry, surface backpressure
                            constraints, reservoir inflow performance, nodal modeling, and actual field unloading
                            observations.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Useful screening models</h3>
                                <ul>
                                    <li>Turner / Coleman droplet entrainment</li>
                                    <li>Li flat-droplet critical velocity</li>
                                    <li>Liquid-film reversal methods</li>
                                    <li>Belfroid inclined-well loading</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Required field context</h3>
                                <ul>
                                    <li>Well geometry and tubing ID</li>
                                    <li>Pressure and temperature profile</li>
                                    <li>Surface tension and liquid density</li>
                                    <li>Field-calibrated unloading behavior</li>
                                </ul>
                            </div>
                        </div>
                        <p>Loaded-well recovery projects often fail when operators treat the issue as a basic
                            compression-sizing exercise rather than a full system-production problem.</p>
                    </div>
                </section>

                <section class="content-section" id="conventional-limits">
                    <div class="article-card">
                        <div class="section-label">Conventional limitations</div>
                        <h2>Why conventional compression struggles with wet and loaded wells</h2>
                        <p>Compression is often used to deliquify gas wells because reducing wellhead pressure lowers
                            backpressure and improves gas velocity. However, loaded-well applications frequently expose the
                            limitations of conventional gas-only compression systems.</p>
                        <p>Conventional reciprocating and oil-flooded rotary screw compressors generally assume relatively
                            dry, conditioned gas. In loaded-well applications, compressor inlet conditions can include
                            entrained free liquids, intermittent slugging, condensate surges, water slugs, pressure cycling,
                            variable gas-liquid ratios, and foam or emulsion carryover.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Slugging</h3>
                                <p>Slugs can force protective shutdowns, cause mechanical stress, or damage conventional gas
                                    compressors.</p>
                            </div>
                            <div class="line-card">
                                <h3>Lubricant contamination</h3>
                                <p>Oil-flooded systems can experience dilution, emulsions, viscosity loss, carryover, and
                                    downstream fouling.</p>
                            </div>
                            <div class="line-card">
                                <h3>Separator dependence</h3>
                                <p>Scrubbers, knockout vessels, dump valves, level controls, tanks, and heat tracing become
                                    reliability-critical.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Freeze exposure</h3>
                                <p>Winter conditions can create instability in scrubbers and upstream separation equipment,
                                    increasing maintenance burden.</p>
                            </div>
                        </div>
                        <div class="callout"><span class="callout-title">Reliability bottleneck</span>
                            <p>In loaded-gas-well compression, separator dependence is often the true reliability
                                bottleneck—not only the compressor itself.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="multiphase-helps">
                    <div class="article-card">
                        <div class="section-label">Multiphase architecture</div>
                        <h2>How multiphase compression helps move gas and liquids together</h2>
                        <p>Multiphase compression changes the system architecture by allowing gas and entrained liquids to
                            move through compression together rather than requiring full pre-separation before compression.
                        </p>
                        <p>This creates practical engineering advantages in loaded-gas-well service, especially when well
                            behavior is unstable and inlet conditions change throughout the day or season.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Direct wet-flow compression</h3>
                                <p>Fluidstream systems can accept unstable gas streams containing entrained liquids,
                                    slugging, and variable liquid fractions.</p>
                            </div>
                            <div class="line-card">
                                <h3>Pressure reduction during instability</h3>
                                <p>Compression can continue reducing suction pressure even as the well transitions through
                                    unstable wet-flow conditions.</p>
                            </div>
                            <div class="line-card">
                                <h3>Reduced separator dependence</h3>
                                <p>Liquid-influenced compression reduces reliance on perfect upstream gas conditioning.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Broader operating envelope</h3>
                                <p>The system better matches transient loaded-well behavior than gas-only systems designed
                                    around narrow dry-gas assumptions.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="economics">
                    <div class="article-card">
                        <div class="section-label">Reliability economics</div>
                        <h2>In loaded gas wells, uptime can matter more than peak compressor efficiency.</h2>
                        <p>A compressor that theoretically performs well but trips frequently due to wet-gas upsets, freeze
                            events, separator overload, or slugging can destroy project economics.</p>
                        <p>Reliability impacts loaded-well economics through lost gas production, lost condensate and
                            liquids production, liquid fallback during downtime, reloading of the wellbore, increased
                            restart difficulty, higher field labor, maintenance cost, and reduced scalability across
                            marginal-well portfolios.</p>
                        <div class="callout"><span class="callout-title">Economic principle</span>
                            <p>In many loaded-gas-well applications, the economically superior system is not the one with
                                the highest theoretical thermodynamic efficiency. It is the one that remains online most
                                consistently in real field conditions.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="fluidstream-fit">
                    <div class="article-card">
                        <div class="section-label">Fluidstream fit</div>
                        <h2>Where Fluidstream fits in loaded-gas-well recovery</h2>
                        <p>Fluidstream is positioned for loaded-gas-well applications where operators require pressure
                            reduction but conventional gas-only compression struggles due to wet, unstable, or
                            liquid-influenced service.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Liquid-loaded gas wells</h3>
                                <p>Applications with unstable slugging, liquid fallback, or declining gas velocity.</p>
                            </div>
                            <div class="line-card">
                                <h3>Shut-in restart support</h3>
                                <p>Wells requiring pressure reduction and liquid-tolerant operation to restart production.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Condensate-rich wells</h3>
                                <p>Wet inlet conditions where conventional dry-gas assumptions create reliability risk.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Remote or unmanned sites</h3>
                                <p>Applications where low intervention and fewer auxiliary failure points are critical.</p>
                            </div>
                        </div>
                        <p>Typical fit-for-purpose applications include liquid-loaded gas wells, condensate-rich gas wells,
                            wells with frequent separator upset issues, winter-sensitive sites, marginal wells where
                            separator-heavy compression is uneconomic, and remote locations that require low-intervention
                            operation.</p>
                    </div>
                </section>

                <section class="content-section" id="advanced-flow">
                    <div class="article-card">
                        <div class="section-label">Flow regime behavior</div>
                        <h2>Advanced flow-regime and critical velocity considerations</h2>
                        <p>A major engineering mistake in many loaded-well evaluations is assuming a single critical
                            velocity threshold governs unloading across the entire wellbore. In reality, critical transport
                            velocity varies continuously along the well path as pressure, temperature, gas density, liquid
                            density, surface tension, and tubing inclination change.</p>
                        <p>A well may simultaneously experience different flow regimes at different depths. Annular mist
                            flow may exist in one interval while slug or film-dominated flow occurs in another. This is why
                            surface observations alone cannot fully characterize downhole loading mechanics.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>What changes along the wellbore</h3>
                                <ul>
                                    <li>Pressure and temperature</li>
                                    <li>Gas and liquid density</li>
                                    <li>Surface tension</li>
                                    <li>Liquid fraction and condensate dropout</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>What advanced assessments consider</h3>
                                <ul>
                                    <li>Inclination-driven film accumulation</li>
                                    <li>Slug initiation and collapse</li>
                                    <li>Film reversal versus droplet entrainment</li>
                                    <li>Distributed pressure and temperature profiles</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="system-design">
                    <div class="article-card">
                        <div class="section-label">System design</div>
                        <h2>Compression design should be integrated into nodal analysis.</h2>
                        <p>Compression selection for loaded gas wells should be integrated into a nodal analysis framework
                            rather than performed as a standalone package-sizing exercise. The interaction between reservoir
                            inflow, tubing outflow, wellhead pressure, gathering pressure, and compressor suction capability
                            determines whether the well will operate on the stable or unstable side of the production curve.
                        </p>
                        <p>Reducing suction pressure by a modest amount can sometimes materially improve unloading if the
                            well is near a tipping point. In other cases, significant pressure reduction may yield limited
                            benefit if reservoir inflow or tubing geometry remain controlling constraints.</p>
                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Design sensitivity</h3>
                                <p>Evaluate pressure reduction versus production response, decline profile, and future
                                    liquid-rate escalation.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Operating envelope</h3>
                                <p>Review turndown, startup behavior, upset handling, and seasonal pressure variability.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Implementation details</h3>
                                <p>Suction piping, slug buffering, downstream liquids handling, controls, and winterization
                                    affect success.</p>
                            </div>
                            <div class="line-card">
                                <h3>Post-startup optimization</h3>
                                <p>Liquid rate, gas rate, condensate production, slug frequency, and operating pressure can
                                    change after compression begins.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="patents">
                    <div class="article-card">
                        <div class="section-label">Patented technology</div>
                        <h2>Patent-supported technical foundation</h2>
                        <p>Fluidstream’s loaded-well compression platform is supported by core intellectual property
                            including US11098709B2, US10221664B2, CA2843321C, and CA2883283C.</p>
                        <p>US11098709B2 is especially relevant as a primary patent anchor for Fluidstream’s liquid-aware
                            compression response and adaptive liquid-influenced compression methodology. US10221664B2
                            supports multiphase compression architecture and control logic relevant to unstable gas-liquid
                            compression applications. CA2843321C and CA2883283C support broader Fluidstream compression
                            system and process innovations.</p>
                        <div class="callout"><span class="callout-title">Technical relevance</span>
                            <p>These patents reinforce that Fluidstream is not relying on larger scrubbers or modified
                                conventional gas packages. The platform is purpose-built for liquid-capable compression in
                                real field service.</p>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="case-study-proof">
                    <div class="article-card">
                        <div class="section-label">Case study proof</div>
                        <h2>Alberta, Canada field proof: restored production from two loaded gas wells.</h2>
                        <p>Fluidstream demonstrated loaded-gas-well production recovery in Alberta, Canada through
                            deployment on two previously non-producing loaded gas wells. The wells had effectively ceased
                            meaningful production due to liquid loading, pipeline pressure constraints limited unloading
                            capability, prior deliquification methods had failed to restore stable production, and the site
                            lacked electrical power.</p>
                        <div class="dark-card">
                            <div class="eyebrow">Field case study</div>
                            <h2>Reliable multiphase compression helped turn loaded wells back into revenue-generating
                                assets.</h2>
                            <p>Fluidstream deployed a gas-driven multiphase compression system that handled variable
                                gas/liquid flow and unstable slugging conditions without requiring a large conventional
                                separator package upstream.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>~10,000 m³/day</strong><span>Combined gas production
                                        restored from two previously non-producing wells.</span></div>
                                <div class="proof-item"><strong>~5 m³/day</strong><span>Condensate production increase
                                        associated with restored production.</span></div>
                                <div class="proof-item"><strong>$1.5M+/year</strong><span>Estimated annual incremental
                                        revenue from production recovery.</span></div>
                            </div>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>Winter operation</strong><span>Reliable operation through
                                        Alberta winter field conditions.</span></div>
                                <div class="proof-item"><strong>Low maintenance</strong><span>Minimal maintenance and
                                        negligible seal leakage reported.</span></div>
                                <div class="proof-item"><strong>Reserve potential</strong><span>Restored operation created
                                        the potential for additional recoverable reserves.</span></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content-section" id="faq">
                    <div class="article-card">
                        <div class="section-label">FAQ</div>
                        <h2>Loaded gas wells and multiphase compression FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>How is multiphase compression different from standard gas compression?</h3>
                                <p>Standard gas compression typically requires relatively dry, conditioned gas and relies
                                    heavily on upstream liquid removal. Multiphase compression is designed to tolerate and
                                    compress gas with entrained liquids and unstable wet flow.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Can multiphase compression eliminate liquid loading entirely?</h3>
                                <p>No deliquification method is universal. Multiphase compression can materially improve
                                    unloading capability and production where backpressure reduction and wet-flow tolerance
                                    are limiting factors.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Does multiphase compression replace all separators?</h3>
                                <p>Not necessarily. Final configuration depends on the application. However, multiphase
                                    compression can materially reduce separator dependence.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Is multiphase compression only for dead wells?</h3>
                                <p>No. It can be used proactively to stabilize declining wells before complete load-up and
                                    preserve long-term production.</p>
                            </div>
                            <div class="faq-item">
                                <h3>How does it compare with plunger lift or foaming?</h3>
                                <p>Those methods can be effective in some wells, but multiphase compression is often
                                    considered when mechanical or chemical deliquification methods are insufficient or
                                    operationally burdensome.</p>
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
                    <h2>Evaluate whether MultiphaseCommander™ fits your loaded gas well application.</h2>
                    <p>Loaded gas wells should be evaluated as full multiphase production systems, not simple
                        compressor-sizing exercises. Fluidstream can review your loading severity, pressure constraints,
                        liquid behavior, production response, infrastructure requirements, and economics versus conventional
                        alternatives.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/contact">Submit Your Application for Review</a>
                        <a class="btn-1 btn-outline" href="/multiphase-compression">Review MultiphaseCommander™</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Loading severity and root-cause constraints</li>
                        <li>Compression feasibility and expected drawdown improvement</li>
                        <li>Liquids, slugging, separator dependence, and winter reliability</li>
                        <li>Infrastructure requirements and economics versus conventional alternatives</li>
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