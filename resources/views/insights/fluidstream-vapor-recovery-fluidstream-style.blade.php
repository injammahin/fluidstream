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



        .btn-blue {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 18px 38px rgba(0, 24, 220, .20);
        }

        .hero {
            /* color: #fff; */
            /* background: #0018dc; */
            /* padding: 96px 0 90px; */
            overflow: hidden;
            position: relative;
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

        .hero-lede {
            font-size: clamp(14px, 16px, 18px);
            color: #303b50;
            max-width: 760px;
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
        .hero-mini:hover,
        .quote-card:hover,
        .cta-panel:hover,
        .line-card:hover,
        .stat-card:hover,
        .callout:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff;
        }

        .fs-card:hover::after,
        .hero-mini:hover::after,
        .quote-card:hover::after,
        .cta-panel:hover::after,
        .line-card:hover::after,
        .stat-card:hover::after,
        .callout:hover::after {
            transform: scaleX(1);
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
            font-size: 16px;
            line-height: 1.26;
            letter-spacing: -.028em;
            margin: 1.95rem 0 .62rem;
        }

        .lead {
            font-size: 1.16rem;
            color: #303b50;
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

        /* 
                                                                                                                                                                                            .compare-box ul li {
                                                                                                                                                                                                position: relative;
                                                                                                                                                                                                padding-left: 32px;
                                                                                                                                                                                                margin-bottom: 14px;
                                                                                                                                                                                                line-height: 1.6;
                                                                                                                                                                                            } */

        /* .compare-box ul li::before {
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
                                                                                                                                                                                                    } */

        /* .compare-box.blue ul li::before {
                                                                                                                                                                                                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23ffffff' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='m13 6 6 6-6 6'/%3E%3C/svg%3E");
                                                                                                                                                                                                }

                                                                                                                                                                                                .compare-box ul li:last-child {
                                                                                                                                                                                                    margin-bottom: 0;
                                                                                                                                                                                                } */
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

    <script type="application/ld+json">
                                                                                                                                                                                                                                                                                                                                                                                          {
                                                                                                                                                                                                                                                                                                                                                                                            "@context": "https://schema.org",
                                                                                                                                                                                                                                                                                                                                                                                            "@type": "Article",
                                                                                                                                                                                                                                                                                                                                                                                            "headline": "Vapor Recovery Units for Oil & Gas: Engineering Guide to VRU Systems, Failure Modes, and Modern Vapor Recovery Design",
                                                                                                                                                                                                                                                                                                                                                                                            "description": "A technical guide to vapor recovery units for oil and gas operations, including VRU operation, failure modes, wet vapor reliability, winter issues, economics, and Fluidstream VaporCommander applications.",
                                                                                                                                                                                                                                                                                                                                                                                            "author": { "@type": "Organization", "name": "Fluidstream" },
                                                                                                                                                                                                                                                                                                                                                                                            "publisher": { "@type": "Organization", "name": "Fluidstream" },
                                                                                                                                                                                                                                                                                                                                                                                            "mainEntityOfPage": "https://fluidstream.co/insights/vapor-recovery-units-oil-gas"
                                                                                                                                                                                                                                                                                                                                                                                          }
                                                                                                                                                                                                                                                                                                                                                                                          </script>


    <section class="hero">
        <div class="wrap hero-grid py-12">
            <div>
                {{-- <div class="eyebrow">Technical Article / Vapor Recovery</div> --}}
                <h1>Vapor Recovery Units for Oil & Gas</h1>
                <p class="hero-lede">An engineering guide to VRU systems, failure modes, wet vapor reliability, winter
                    operation, and how multiphase-capable compression can improve vapor recovery performance in real field
                    conditions.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/vapor-recovery">Explore VaporCommander™</a>
                    <a class="btn btn-outline" href="#article">Read the Technical Guide</a>
                </div>
            </div>

            <div class="hero-card-stack">
                <div class="quote-card">
                    <strong>Recover vapors in the real field stream, not an idealized gas-only stream.</strong>
                    <p>Tank vapor streams can carry condensate, water, foam, slugs, and rapid pressure changes that expose
                        the
                        limits of conventional VRU designs.</p>
                </div>
                <div class="hero-mini-grid">
                    <div class="hero-mini"><b>Wet vapor</b><span>Designed around liquid carryover risk</span></div>
                    <div class="hero-mini"><b>Winter uptime</b><span>Less dependence on freeze-prone separation</span></div>
                    <div class="hero-mini"><b>Emissions value</b><span>Capture gas that may otherwise be vented or
                            flared</span>
                    </div>
                    <div class="hero-mini"><b>Technical fit</b><span>Application review before package selection</span>
                    </div>
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
                    <a href="#what-is-vru">What is a VRU?</a>
                    <a href="#why-it-matters">Why vapor recovery matters</a>
                    <a href="#how-vrus-work">How VRUs work</a>
                    <a href="#failure-modes">Why conventional VRUs fail</a>
                    <a href="#design-assumptions">Design assumptions that break down</a>
                    <a href="#multiphase-reliability">Multiphase compression advantage</a>
                    <a href="#selection">Design considerations</a>
                    <a href="#economics">Economics</a>
                    <a href="#fluidstream">VaporCommander™</a>
                    <a href="#faq">FAQ</a>
                </aside>

                <article>
                    <section class="article-section" id="executive-summary">
                        <div class="section-label">Executive summary</div>
                        <h2>Vapor recovery is no longer just emissions equipment. It is production infrastructure.</h2>
                        <p class="lead">In upstream oil and gas operations, valuable hydrocarbons are routinely lost from
                            storage
                            tanks, separators, treaters, and low-pressure vessels as flash gas and vapors. A properly
                            designed vapor
                            recovery unit can convert that waste stream into usable gas while reducing methane emissions and
                            improving
                            facility pressure control.</p>
                        <p>Historically, many operators vented or flared these streams because the flow rates were
                            intermittent, the
                            pressures were low, and the gas was often wet or unstable. Today, rising methane reduction
                            expectations,
                            stronger facility economics, and increased pressure to monetize every molecule have made vapor
                            recovery a
                            core part of modern production facility design.</p>
                        <p>The challenge is that many vapor recovery projects underperform because the equipment is selected
                            around
                            ideal gas conditions rather than real field conditions. Tank vapor streams are frequently wet,
                            variable,
                            low pressure, and exposed to winter operating challenges.</p>
                        <div class="callout">
                            <span class="callout-title">Core point</span>
                            <p>The most reliable vapor recovery systems are engineered around how the facility truly
                                operates, not how
                                the vapor stream appears in a steady-state process model.</p>
                        </div>
                    </section>

                    <section class="article-section" id="what-is-vru">
                        <div class="section-label">Vapor recovery fundamentals</div>
                        <h2>What is a vapor recovery unit?</h2>
                        <p>A vapor recovery unit is a compression system used to capture low-pressure hydrocarbon vapors
                            from
                            production and storage equipment and compress them for beneficial use rather than venting or
                            flaring. In
                            upstream oil and gas service, vapor recovery usually begins at low-pressure tanks, treaters,
                            separators,
                            produced water equipment, or other vessels where hydrocarbons flash out of liquid as pressure
                            and
                            temperature conditions change.</p>
                        <p>Typical recovered vapor sources include oil storage tanks, produced water tanks, heater treaters,
                            free-water knockouts, separators, LACT units, and other low-pressure vessels containing flashing
                            hydrocarbons. Once recovered, the gas may be routed to a sales gas pipeline, fuel gas system,
                            gas lift
                            system, reinjection system, onsite power generation equipment, or another facility use.</p>
                        <p>At a basic level, the purpose of a VRU is simple: capture low-pressure hydrocarbon vapor and
                            convert it
                            into usable gas while reducing emissions.</p>
                    </section>

                    <section class="article-section" id="why-it-matters">
                        <div class="section-label">Commercial and operational value</div>
                        <h2>Why vapor recovery matters</h2>
                        <p>Vapor recovery is often discussed through an environmental lens, but for operators it is also a
                            direct
                            economic and operational optimization tool. Hydrocarbon vapors from tanks and separators can
                            contain
                            saleable gas volumes that would otherwise be lost. Capturing that gas can create revenue, reduce
                            fuel
                            purchases, or provide gas for onsite use.</p>
                        <p>Vapor recovery also supports methane emissions reduction. Methane is a high-impact greenhouse
                            gas, so
                            reducing vented hydrocarbon gas is an important part of facility emissions management. In many
                            jurisdictions, operators are also under increasing pressure to reduce routine venting and
                            flaring, improve
                            measurement, and demonstrate better control of low-pressure hydrocarbon streams.</p>
                        <p>From an operations standpoint, VRUs can support tank pressure management. Better pressure control
                            may
                            reduce nuisance venting, improve facility stability, and help maintain more consistent operating
                            conditions across the battery.</p>

                        <div class="card-grid">
                            <div class="fs-card">
                                <h3>Revenue capture</h3>
                                <p>Recovered vapors can be sold, used as fuel, routed to gas lift, or applied elsewhere in
                                    the facility.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Emissions reduction</h3>
                                <p>Capturing tank vapors reduces vented methane and supports operator emissions reduction
                                    objectives.
                                </p>
                            </div>
                            <div class="line-card">
                                <h3>Facility control</h3>
                                <p>VRUs can help manage tank pressure and reduce uncontrolled vapor release events.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Regulatory support</h3>
                                <p>Vapor recovery can support compliance where venting and flaring requirements are
                                    tightening.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="how-vrus-work">
                        <div class="section-label">System overview</div>
                        <h2>How vapor recovery units work</h2>
                        <p>A conventional vapor recovery system typically starts with a vapor collection header. The header
                            connects
                            vapor spaces from tanks or vessels and routes the gas toward the VRU package. Because these
                            vapors may
                            contain mist, condensate, or water, the system commonly includes a scrubber or knockout vessel
                            upstream of
                            the compressor.</p>
                        <p>The scrubber attempts to remove entrained liquids before the gas enters the compressor. The
                            compressor
                            then raises the vapor pressure to meet downstream requirements. Depending on the facility, the
                            recovered
                            gas may be discharged into a pipeline, fuel system, reinjection system, gas lift system, or
                            onsite
                            process.</p>
                        <p>Under ideal conditions, vapor enters the compressor as relatively dry gas and is compressed
                            without
                            issue. However, many real-world systems do not operate under ideal conditions. Tank vapors are
                            often wet,
                            intermittent, and influenced by temperature swings, separator dumps, truck loading, production
                            changes,
                            and field upsets.</p>
                    </section>

                    <section class="article-section" id="failure-modes">
                        <div class="section-label">Real field failure logic</div>
                        <h2>Why conventional vapor recovery units often fail in real field conditions</h2>
                        <p>Many conventional vapor recovery systems are designed around steady, dry gas assumptions. Actual
                            field
                            vapor streams are rarely steady or dry. This mismatch is one of the primary reasons VRUs
                            experience
                            nuisance shutdowns, excessive maintenance, poor winter uptime, and short equipment life.</p>

                        <h3>1. Liquid carryover into the compressor</h3>
                        <p>Tank vapors frequently contain condensed hydrocarbons, water, foam, slugs from level upsets, and
                            mist
                            from vessel turbulence. Conventional gas compressors generally require effective upstream liquid
                            separation. When liquids bypass the scrubber, reciprocating compressors can risk valve damage
                            and liquid
                            slugging, while oil-flooded screw compressors can suffer lubricant contamination, reduced
                            lubrication
                            performance, and increased maintenance.</p>
                        <p>In these cases, the problem is not simply the compressor. It is the assumption that upstream
                            separation
                            will always deliver dry gas. When liquid carryover reaches the machine, the entire VRU package
                            may become
                            unreliable.</p>

                        <h3>2. Scrubber and separator freezing in winter</h3>
                        <p>Cold-weather operations create a separate reliability problem. In regions such as Alberta,
                            Canada, water
                            and condensate can freeze in scrubbers, instrument lines, drains, and liquid level controls. A
                            VRU that
                            depends heavily on upstream separation becomes vulnerable when the equipment used to protect the
                            compressor becomes the source of downtime.</p>
                        <p>For many operators, winter separator and scrubber freezing is not a minor maintenance issue. It
                            can
                            become a recurring cause of instability, service calls, nuisance shutdowns, and lost vapor
                            recovery.</p>

                        <h3>3. Highly variable vapor flow rates</h3>
                        <p>Tank vapor generation is rarely steady. Flow can change due to truck loading or unloading,
                            separator
                            dumps, tank flashing events, temperature swings, well instability, or process upsets. A
                            conventional
                            compressor may be sized around an average flow rate but forced to operate across a much wider
                            range in the
                            field.</p>
                        <p>When turndown and suction stability are not properly managed, the system may hunt, recycle
                            excessively,
                            operate inefficiently, or shut down repeatedly.</p>

                        <h3>4. Low and unstable suction pressure</h3>
                        <p>Many vapor sources operate at very low pressure. Even small process changes can create unstable
                            suction
                            conditions. This can make compressor loading control difficult, reduce volumetric efficiency,
                            increase
                            recycle, and create frequent shutdowns.</p>
                        <p>Low-pressure vapor recovery is not only about compression ratio. It is about maintaining stable
                            operation
                            when the inlet conditions are constantly moving.</p>

                        <h3>5. Oil and lubrication contamination</h3>
                        <p>For lubricated compressors, wet hydrocarbon streams can dilute compressor oil, reduce lubrication
                            film
                            strength, create emulsions, increase oil carryover, and accelerate wear. This becomes especially
                            important
                            when the vapor stream contains condensable hydrocarbons or water that are not fully removed
                            before
                            compression.</p>

                        <div class="callout">
                            <span class="callout-title">Why this matters for selection</span>
                            <p>In vapor recovery, nameplate flow capacity is only one part of the decision. Reliability
                                depends on how
                                the package handles liquid carryover, pressure instability, winter operation, and field
                                upsets.</p>
                        </div>
                    </section>

                    <section class="article-section" id="design-assumptions">
                        <div class="section-label">Engineering mismatch</div>
                        <h2>Why conventional VRU design assumptions often break down</h2>
                        <p>A major issue in vapor recovery projects is that system design is often based on idealized
                            process
                            assumptions: dry vapor, steady-state flow, minimal condensate carryover, stable temperatures,
                            and
                            consistent pressure. Real facilities frequently operate outside those assumptions.</p>
                        <p>That difference between modelled conditions and field conditions is where VRU economics can break
                            down. A
                            lower-cost package can become expensive if it requires oversized ancillary equipment, frequent
                            service,
                            repeated operator intervention, or downtime during the conditions when vapor recovery is most
                            valuable.
                        </p>

                        <div class="compare-strip">
                            <div class="compare-box">
                                <h3>Conventional assumption</h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 shrink-0 text-[#0018dc] mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Dry gas reaches the compressor</span>
                                    </li>

                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 shrink-0 text-[#0018dc] mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Scrubbers remove liquid reliably</span>
                                    </li>

                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 shrink-0 text-[#0018dc] mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Flow is predictable enough for stable control</span>
                                    </li>

                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 shrink-0 text-[#0018dc] mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Cold-weather drains and instruments stay functional</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="compare-box blue">
                                <h3>Real field condition</h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-white mt-[3px]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Vapor streams can be wet and unstable</span>
                                    </li>

                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-white mt-[3px]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Liquids and slugs can bypass protection equipment</span>
                                    </li>

                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-white mt-[3px]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Flow and suction pressure can change rapidly</span>
                                    </li>

                                    <li class="flex items-start gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-white mt-[3px]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
                                        </svg>
                                        <span>Winter freezing can disable support equipment</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p>Many VRUs work well in theory but become maintenance-intensive in actual field service because
                            the
                            compressor is protected by equipment that cannot reliably remove every liquid event, prevent
                            every freeze
                            condition, or smooth every process upset.</p>
                    </section>

                    <section class="article-section" id="multiphase-reliability">
                        <div class="section-label">Modern vapor recovery design</div>
                        <h2>Why multiphase compression can improve vapor recovery reliability</h2>
                        <p>Multiphase-capable vapor recovery systems are designed to tolerate vapor streams containing
                            entrained
                            liquids and unstable operating conditions more effectively than conventional gas-only
                            compression
                            approaches. The objective is not to ignore separation entirely. The objective is to reduce the
                            operating
                            penalty created when field conditions are wetter, more variable, or more difficult than the
                            ideal design
                            case.</p>
                        <p>For vapor recovery applications, this can reduce dependence on perfect upstream separation,
                            improve
                            tolerance for transient liquid events, and simplify the facility around the VRU. In winter
                            service,
                            reducing reliance on freeze-prone separation and drain systems may also improve uptime.</p>
                        <p>A multiphase-capable approach can be especially valuable where tank vapors include entrained
                            liquids,
                            where ambient conditions increase freezing risk, where operator access is limited, or where
                            repeated
                            shutdowns have made conventional vapor recovery uneconomic.</p>
                    </section>

                    <section class="article-section" id="selection">
                        <div class="section-label">Application fit</div>
                        <h2>Key design considerations when selecting a vapor recovery unit</h2>
                        <p>Selecting the right VRU requires more than sizing for average gas flow. Engineers should evaluate
                            the
                            full operating envelope, including vapor composition, liquid content, flow variability, suction
                            pressure,
                            discharge pressure, ambient conditions, and maintenance access.</p>

                        <div class="card-grid">
                            <div class="line-card">
                                <h3>Vapor composition</h3>
                                <p>Determine hydrocarbon makeup, water content, contaminants, corrosives, and the likelihood
                                    of
                                    condensation through the operating range.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Liquid content</h3>
                                <p>Quantify expected carryover, upset conditions, and the system’s ability to operate when
                                    separation is
                                    imperfect.</p>
                            </div>
                            <div class="fs-card">
                                <h3>Flow variability</h3>
                                <p>Review turndown requirements, flashing events, separator dumps, loading activity, and
                                    transient
                                    scenarios.</p>
                            </div>
                            <div class="line-card">
                                <h3>Suction pressure</h3>
                                <p>Very low suction pressure applications require careful review because small pressure
                                    changes can
                                    affect stability.</p>
                            </div>
                            <div class="line-card">
                                <h3>Discharge pressure</h3>
                                <p>Pipeline, fuel gas, gas lift, and reinjection systems may require different compression
                                    strategies.
                                </p>
                            </div>
                            <div class="fs-card">
                                <h3>Ambient conditions</h3>
                                <p>Cold climate operation can materially affect reliability, especially around scrubbers,
                                    drains, and
                                    instrumentation.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="economics">
                        <div class="section-label">Economic evaluation</div>
                        <h2>Economics of vapor recovery</h2>
                        <p>The economics of vapor recovery often extend beyond simply capturing gas value. A strong VRU
                            project can
                            provide direct gas revenue, reduce flaring or venting exposure, improve facility reliability,
                            and lower
                            maintenance costs when the system is correctly designed for actual field conditions.</p>
                        <p>When comparing VRU technologies, nameplate gas flow is only part of the equation. Operators
                            should also
                            assess liquid tolerance, reliability under upset conditions, winter operability, maintenance
                            frequency,
                            separator dependency, turndown capability, and installed system complexity.</p>
                        <p>A lower-cost VRU package can become significantly more expensive if it requires excessive
                            maintenance or
                            frequent downtime. Conversely, a properly matched vapor recovery system can improve both
                            emissions
                            performance and facility economics.</p>
                    </section>

                    <section class="article-section" id="fluidstream">
                        <div class="section-label">Fluidstream application</div>
                        <h2>Fluidstream VaporCommander™ for vapor recovery applications</h2>
                        <p>VaporCommander™ is Fluidstream’s vapor recovery platform engineered for applications where
                            conventional
                            systems struggle with wet vapor streams, entrained liquids, variable flow rates, harsh operating
                            environments, and reliability-sensitive remote operations.</p>
                        <p>Built around Fluidstream’s patented multiphase compression technology, VaporCommander™ is
                            designed to
                            reduce the operational penalties associated with gas-only vapor recovery approaches while
                            improving uptime
                            in difficult field conditions. Fluidstream’s patent-backed engineering approach, including
                            liquid-aware
                            compression concepts associated with US11098709B2, supports the company’s focus on real-world
                            vapor
                            recovery conditions rather than idealized dry-gas assumptions.</p>
                        <p>For operators evaluating vapor recovery, the key question is not only whether the system can
                            compress the
                            expected gas volume. The key question is whether it can continue operating when the vapor stream
                            becomes
                            wet, variable, cold, unstable, or maintenance-sensitive.</p>

                        <div class="dark-card">
                            <div class="eyebrow">Case-study proof</div>
                            <h2>Proof from real field conditions.</h2>
                            <p>Fluidstream’s broader multiphase compression field experience includes applications where
                                production
                                was restored under harsh conditions, variable gas and liquid flows were managed, and
                                low-maintenance
                                operation was central to the project value.</p>
                            <div class="proof-grid">
                                <div class="proof-item"><strong>~10,000 m³/day</strong><span>Gas production restored in a
                                        field
                                        application after wells were effectively non-producing.</span></div>
                                <div class="proof-item"><strong>&gt;C$1.5M/year</strong><span>Incremental revenue potential
                                        highlighted
                                        in the Alberta, Canada case study.</span></div>
                                <div class="proof-item"><strong>Zero seal leakage</strong><span>Reported field performance
                                        from the
                                        compression unit in the case study narrative.</span></div>
                            </div>
                        </div>
                    </section>

                    <section class="article-section" id="final-thoughts">
                        <div class="section-label">Final thoughts</div>
                        <h2>Vapor recovery requires real-world design</h2>
                        <p>Vapor recovery can deliver meaningful economic and emissions benefits, but only when the system
                            is
                            designed for actual operating conditions. Too many VRU projects fail because equipment is
                            selected based
                            on idealized gas assumptions instead of field reality.</p>
                        <p>When evaluating vapor recovery systems, operators should ask how much liquid actually reaches the
                            compressor, what happens during slugging or process upsets, how the system will perform in
                            winter, what
                            maintenance burden the design creates, and whether the compressor is suited for real vapor
                            conditions or
                            only ideal gas.</p>
                        <p>The most successful vapor recovery projects are those engineered around how the facility truly
                            operates,
                            not how it appears on paper.</p>
                    </section>

                    <section class="article-section" id="faq">
                        <div class="section-label">Technical FAQ</div>
                        <h2>Vapor recovery unit FAQ</h2>
                        <div class="faq">
                            <div class="faq-item">
                                <h3>What does a vapor recovery unit do?</h3>
                                <p>A VRU captures low-pressure hydrocarbon vapors from tanks or process vessels and
                                    compresses them for
                                    sales, fuel, gas lift, reinjection, or another beneficial use.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why do conventional VRUs fail in wet gas service?</h3>
                                <p>Many conventional VRUs depend on dry, steady gas. Wet vapor streams can carry condensate,
                                    water,
                                    foam, or slugs into the compressor, creating shutdowns, contamination, or mechanical
                                    damage.</p>
                            </div>
                            <div class="faq-item">
                                <h3>Why is winter operation difficult for VRUs?</h3>
                                <p>Water and condensate can freeze in scrubbers, drains, instrument lines, and level
                                    controls. This can
                                    make separator-dependent VRU systems unstable during cold-weather operation.</p>
                            </div>
                            <div class="faq-item">
                                <h3>How is multiphase-capable vapor recovery different?</h3>
                                <p>A multiphase-capable approach is designed to better tolerate entrained liquids and
                                    unstable vapor
                                    conditions, reducing dependence on perfect upstream separation.</p>
                            </div>
                            <div class="faq-item">
                                <h3>What should operators review before selecting a VRU?</h3>
                                <p>Operators should review vapor composition, liquid content, flow variability, suction
                                    pressure,
                                    discharge pressure, winter conditions, maintenance access, and upset scenarios.</p>
                            </div>
                        </div>
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
                                <a href="{{ url('/insights/why-conventional-vrus-fail-wet-gas') }}">
                                    Why Conventional VRUs Fail in Wet Gas
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
                                <a href="{{ url('/case-studies/vaporcommander-4-5-year-reliability') }}">
                                    VaporCommander™ 4.5-Year Reliability Case Study
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
                    <h2>Evaluate whether Fluidstream can improve your vapor recovery system.</h2>
                    <p>Built for engineers, production teams, and decision-makers evaluating VaporCommander™ for wet vapor,
                        low-pressure tank gas, harsh-weather operation, and maintenance-sensitive field sites. Submit your
                        operating
                        conditions and Fluidstream can assess the technical and economic fit.</p>
                    <div class="cta-actions">
                        <a class="btn-1 btn-primary" href="/technical-review">Request Technical Review</a>
                        <a class="btn-1 btn-outline" href="/vapor-recovery">Review VaporCommander™ Specifications</a>
                    </div>
                </div>
                <div class="cta-panel">
                    <h3>Application review focus</h3>
                    <ul>
                        <li>Vapor source, composition, and liquid carryover risk</li>
                        <li>Suction and discharge pressure requirements</li>
                        <li>Winter operation, freezing exposure, and remote access</li>
                        <li>Maintenance history and reliability objectives</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection