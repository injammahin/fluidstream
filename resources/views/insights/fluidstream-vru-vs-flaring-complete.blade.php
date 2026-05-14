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


    <section class="hero">
        <div class="wrap hero-grid py-12">
            <div>
                <h1>Vapor Recovery Unit vs Flaring</h1>
                <p class="hero-lede">A practical engineering and economic guide to choosing vapor recovery over flaring or
                    combustion when tank vapors can be captured, compressed, and converted into value instead of destroyed.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/vapor-recovery">Explore VaporCommander™</a>
                    <a class="btn btn-outline" href="#article">Read the Technical Guide</a>
                </div>
            </div>

            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Flaring controls a vapor stream. Vapor recovery can turn it into value.</strong>
                    <p>When the gas can be captured reliably, operators may reduce emissions exposure, recover saleable gas,
                        and improve facility control instead of burning or venting hydrocarbons.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Gas value</b><span>Capture hydrocarbons instead of destroying them</span>
                    </div>
                    <div class="hero-mini"><b>Emissions</b><span>Reduce venting and combustion exposure</span></div>
                    <div class="hero-mini"><b>Wet vapor</b><span>Designed around real tank vapor conditions</span></div>
                    <div class="hero-mini"><b>Reliability</b><span>Application fit matters more than nameplate
                            capacity</span></div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="section section-soft py-12 gray" id="article">
            <div class="wrap article-shell">
                <aside class="toc" aria-label="Article contents">
                    <div class="toc-title">Article Contents</div>
                    <a href="#executive-summary">Executive summary</a>
                    <a href="#why-flare">Why operators flare</a>
                    <a href="#vru-value">When vapor recovery creates value</a>
                    <a href="#hidden-economics">Hidden VRU economics</a>
                    <a href="#reliability">Why reliability matters</a>
                    <a href="#wet-gas">Why wet gas changes the equation</a>
                    <a href="#comparison">VRU vs flaring</a>
                    <a href="#fluidstream">VaporCommander™</a>
                    <a href="#case-study">Case-study proof</a>
                    <a href="#final-thoughts">Final thoughts</a>
                </aside>

                <article>
                    <section class="article-section" id="executive-summary">
                        <div class="section-label">Executive summary</div>
                        <h2>Vapor handling is an economic, emissions, and reliability decision.</h2>
                        <p class="lead">Operators evaluating vapor handling strategies often compare vapor recovery units
                            against flaring or vapor combustion. While flaring may appear simpler at first glance, the
                            decision is not merely about disposal versus recovery.</p>
                        <p>It is an economic, operational, and reliability decision that depends heavily on vapor stream
                            quality, gas value, operating conditions, emissions objectives, and whether the selected
                            recovery system can perform reliably in real field service.</p>
                        <p>A vapor recovery system can convert waste gas into long-term value, but only if the system
                            remains online through wet gas, variable flow, winter conditions, and maintenance-sensitive
                            operation.</p>
                        <div class="callout"><span class="callout-title">Core point</span>
                            <p>The vapor recovery versus flaring decision should be based on real uptime, real vapor
                                conditions, and full lifecycle economics — not only theoretical gas value.</p>
                        </div>
                    </section>

                    <section class="article-section" id="why-flare">
                        <div class="section-label">Flaring decision</div>
                        <h2>Why operators flare tank vapors.</h2>
                        <p>Flaring or vapor combustion remains common because it can provide a straightforward method of
                            controlling tank vapors when gas volumes are low, economics are marginal, infrastructure is
                            limited, or recovery equipment cannot be justified.</p>
                        <p>Operators may choose flaring when vapor volumes are too small to justify recovery, gas gathering
                            infrastructure is unavailable, regulatory approvals permit controlled combustion, simplicity is
                            prioritized over gas monetization, or historical vapor recovery attempts have failed.</p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Simple disposal</h3>
                                <p>Flaring can be a practical method for controlling vapors when recovery cannot be
                                    justified.</p>
                            </div>
                            <div class="line-card">
                                <h3>Limited infrastructure</h3>
                                <p>Sites without gathering, sales, fuel, or reuse options may not have an immediate outlet
                                    for recovered gas.</p>
                            </div>
                            <div class="line-card">
                                <h3>Marginal volumes</h3>
                                <p>Low or intermittent vapor rates can make recovery economics difficult without the right
                                    equipment fit.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Past VRU failures</h3>
                                <p>Some operators default to combustion after conventional recovery equipment proves
                                    unreliable in wet gas service.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="vru-value">
                        <div class="section-label">Recovery value</div>
                        <h2>When vapor recovery often creates more value.</h2>
                        <p>Vapor recovery can become economically superior when vapor volumes are sufficiently large, gas
                            has meaningful market value, the operator seeks emissions reduction, combustor fuel and
                            maintenance costs are material, and recovery equipment can operate reliably.</p>
                        <p>When these conditions are met, vapor recovery can convert previously wasted hydrocarbons into
                            saleable product or reusable fuel gas.</p>
                        <div class="callout"><span class="callout-title">Commercial logic</span>
                            <p>Flaring controls the problem. Vapor recovery can control the problem while also preserving
                                the value of the gas stream.</p>
                        </div>
                    </section>

                    <section class="article-section" id="hidden-economics">
                        <div class="section-label">Economic risk</div>
                        <h2>The hidden problem with many VRU economics.</h2>
                        <p>Many vapor recovery economic models assume the vapor recovery unit will operate consistently at
                            its projected uptime. In reality, many conventional VRUs underperform because they are selected
                            based on idealized dry-gas assumptions rather than actual field vapor conditions.</p>
                        <p>When uptime falls due to shutdowns, freeze-ups, liquid carryover, or maintenance burden, expected
                            payout periods can deteriorate rapidly.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Spreadsheet assumption</h3>
                                <ul>
                                    <li>Stable uptime</li>
                                    <li>Predictable vapor flow</li>
                                    <li>Limited liquid carryover</li>
                                    <li>Low maintenance cost</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Field reality</h3>
                                <ul>
                                    <li>Wet, unstable vapor streams</li>
                                    <li>Freeze-prone drains and scrubbers</li>
                                    <li>Separator overload and carryover</li>
                                    <li>Repeated service calls</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="reliability">
                        <div class="section-label">Reliability</div>
                        <h2>Why reliability determines real VRU economics.</h2>
                        <p>A vapor recovery project is only as strong as the uptime of the compression system. If the VRU
                            cannot reliably handle the vapor stream presented to it, operators may experience frequent
                            nuisance shutdowns, freeze-ups in scrubbers and drains, separator overload and liquid carryover,
                            elevated service requirements, reduced gas capture, and longer-than-expected payout periods.</p>
                        <p>For operators comparing flaring to recovery, reliability is not a secondary concern. It
                            determines whether the recovery project actually delivers the expected value.</p>
                    </section>

                    <section class="article-section" id="wet-gas">
                        <div class="section-label">Wet gas conditions</div>
                        <h2>Why wet gas changes the equation.</h2>
                        <p>Many tank vapor streams are not dry, stable gas streams. They may contain entrained condensate,
                            water, pressure swings, changing vapor rates, and intermittent liquid slugs.</p>
                        <p>These conditions often undermine conventional separator-dependent gas-only VRUs and materially
                            change the economic viability of the project if not accounted for during equipment selection.
                        </p>
                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Liquid carryover</h3>
                                <p>Liquids can bypass upstream protection equipment and create shutdown or damage risk in
                                    gas-only compressors.</p>
                            </div>
                            <div class="line-card">
                                <h3>Winter freezing</h3>
                                <p>Scrubbers, drains, and level controls can freeze, turning protection equipment into a
                                    downtime source.</p>
                            </div>
                            <div class="line-card">
                                <h3>Variable vapor rate</h3>
                                <p>Tank vapor generation changes with pressure, temperature, tank activity, and production
                                    conditions.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Maintenance burden</h3>
                                <p>Separator-dependent packages can require more inspection, draining, troubleshooting, and
                                    service intervention.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="comparison">
                        <div class="section-label">Comparison</div>
                        <h2>Comparing vapor recovery vs flaring.</h2>
                        <p>Flaring may remain the right choice where gas volumes are very low, vapor quality is poor,
                            gathering infrastructure is absent, or recovery economics are weak.</p>
                        <p>However, vapor recovery often becomes the better long-term choice when vapor volumes are
                            sustained, gas can be sold or reused, emissions reduction is a priority, flaring costs and
                            oversight are rising, and reliable wet-gas vapor recovery is achievable.</p>
                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Flaring / combustion</h3>
                                <ul>
                                    <li>Simple control method</li>
                                    <li>Destroys gas value</li>
                                    <li>Creates combustion emissions</li>
                                    <li>No recovered gas revenue</li>
                                </ul>
                            </div>
                            <div class="compare-box blue">
                                <h3>Vapor recovery</h3>
                                <ul>
                                    <li>Captures gas for use or sale</li>
                                    <li>Can reduce emissions exposure</li>
                                    <li>Requires reliable compression</li>
                                    <li>Economics depend on uptime</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="fluidstream">
                        <div class="section-label">Fluidstream application</div>
                        <h2>How Fluidstream VaporCommander™ changes vapor recovery economics.</h2>
                        <p>Fluidstream’s VaporCommander™ applies patented multiphase compression methodology to wet-gas
                            vapor recovery applications where conventional systems often struggle.</p>
                        <p>Supported by Fluidstream’s patent portfolio, including US11098709B2, VaporCommander™ is designed
                            around real vapor conditions where liquids and upset events may occur during normal operation.
                        </p>
                        <p>By improving reliability in wet-gas applications, the system can help preserve uptime and support
                            the economics required for vapor recovery to outperform flaring.</p>
                    </section>

                    <section class="article-section" id="case-study">
                        <div class="section-label">Case-study proof</div>
                        <h2>Proof from vapor combustor replacement.</h2>
                        <p>Fluidstream field deployments have demonstrated that reliable vapor recovery can materially
                            outperform combustion-only strategies when wet-gas reliability is achieved.</p>
                        <div class="dark-card">
                            <div class="eyebrow">VaporCommander™ field example</div>
                            <h2>Gas captured instead of combusted.</h2>
                            <p>In one vapor combustor replacement application, Fluidstream captured gas that would otherwise
                                have been combusted while creating annual gas value based on referenced commodity pricing
                                assumptions.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>~500,000 m³/year</strong><span>Natural gas captured instead
                                        of burned through a vapor combustor.</span></div>
                                <div class="proof-item"><strong>C$46,000+/year</strong><span>Estimated annual gas value
                                        under the referenced project assumptions.</span></div>
                                <div class="proof-item"><strong>Wet-gas fit</strong><span>VaporCommander™ is positioned for
                                        real vapor streams where conventional VRUs often struggle.</span></div>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="final-thoughts">
                        <div class="section-label">Final thoughts</div>
                        <h2>Vapor recovery only beats flaring when the system stays reliable.</h2>
                        <p>The vapor recovery versus flaring decision should not be made solely on theoretical gas value
                            calculations. It must also consider vapor quality, equipment reliability, maintenance burden,
                            and real-world uptime expectations.</p>
                        <p>In many oil and gas applications, the question is not whether vapor recovery works in theory — it
                            is whether the selected recovery system can operate reliably enough in real field conditions for
                            the economics to hold.</p>
                        <p>Where wet gas, liquids, and unstable vapor streams are present, compression reliability often
                            determines whether vapor recovery truly outperforms flaring.</p>
                    </section>
                </article>
            </div>
        </section>
    </main>
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
                            <a href="{{ url('/insights/why-conventional-vrus-fail-wet-gas') }}">
                                Why Conventional VRUs Fail in Wet Gas
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
                            <a href="{{ url('/case-studies/vaporcommander-vcu-replacement') }}">
                                VaporCommander™ VCU Replacement Case Study
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/case-studies/allied-energy-vaporcommander-vru') }}">
                                Allied Energy VaporCommander™ VRU Case Study
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
                <h2>Evaluate whether VaporCommander™ can replace flaring or combustion at your site.</h2>
                <p>Built for engineers, production teams, and decision-makers evaluating vapor recovery for wet tank
                    vapors, low-pressure gas, variable vapor flow, emissions reduction, gas monetization, and
                    maintenance-sensitive field sites.</p>
                <div class="cta-actions">
                    <a class="btn-1 btn-primary" href="/technical-review">Request Technical Review</a>
                    <a class="btn-1 btn-outline" href="/vapor-recovery">Review VaporCommander™</a>
                </div>
            </div>
            <div class="cta-panel">
                <h3>Application review focus</h3>
                <ul>
                    <li>Vapor source, composition, and gas value</li>
                    <li>Wet gas, condensate, water, and liquid carryover risk</li>
                    <li>Flaring, combustor, or venting baseline</li>
                    <li>Uptime, winter operation, and maintenance objectives</li>
                </ul>
            </div>
        </div>
    </section>





@endsection