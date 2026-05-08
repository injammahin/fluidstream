@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fs-blue: #0018dc;
            --fs-blue-2: #2544ff;
            --fs-cyan: #15d1ff;
            --fs-ink: #102a43;
            --fs-muted: #52667a;
            --fs-line: #d9e2ec;
            --fs-soft: #f4f6f8;
            --fs-white: #ffffff;
            --fs-shadow: 0 18px 45px rgba(16, 42, 67, .08);
            --fs-shadow-hover: 0 24px 60px rgba(0, 24, 220, .18);
            --fs-max: 1200px;
        }

        .patent-page,
        .patent-page * {
            box-sizing: border-box;
        }

        .patent-page {
            background: #ffffff;
            color: var(--fs-ink);
            line-height: 1.6;
            overflow: hidden;
        }

        .patent-page a {
            color: inherit;
            text-decoration: none;
        }

        .patent-page img {
            max-width: 100%;
            display: block;
        }

        .patent-page .inner {
            width: min(var(--fs-max), calc(100% - 40px));
            margin: 0 auto;
        }

        .patent-page .section {
            position: relative;
            padding: 72px 0;
        }

        .patent-page .section:nth-of-type(even) {
            background: var(--fs-soft);
        }

        .patent-page .section:nth-of-type(odd) {
            background: #ffffff;
        }

        /* ================================
                                                                       HERO WITH BACKGROUND IMAGE
                                                                    ================================ */

        .patent-page .hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: calc(100vh - 108px);
            display: flex;
            align-items: center;
            padding: 0;
            background: #07111f;
            color: #ffffff;
        }

        .patent-page .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background-image: url("/img/hero/patented-technology-hero-pic.png");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            transform: scaleX(-1) scale(1.04);
            transform-origin: center;
        }

        .patent-page .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            background: #0018dc00 !important;

        }

        .patent-page .hero .inner {
            position: relative;
            z-index: 2;
            min-height: calc(100vh - 108px);
            display: flex;
            align-items: center;
            padding-top: 76px;
            padding-bottom: 76px;
        }

        .patent-page .hero-grid {
            width: 100%;
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(420px, .95fr);
            gap: 32px;
            align-items: center;
        }

        .patent-page .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
            color: #bfeeff;
            font-size: 13px;
            font-weight: 850;
            line-height: 1.2;
            letter-spacing: .11em;
            text-transform: uppercase;
        }

        .patent-page .eyebrow .dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: var(--fs-cyan);
            box-shadow: 0 0 0 7px rgba(21, 209, 255, .16);
        }

        .patent-page h1 {
            margin: 0 0 18px;
            max-width: 900px;
            color: #ffffff;
            font-size: clamp(42px, 4.8vw, 68px);
            font-weight: 650;
            line-height: 1.02;
            letter-spacing: -.055em;
        }

        .patent-page .subheadline {
            margin: 0 0 18px;
            max-width: 860px;
            color: #e5f1ff;
            font-size: clamp(20px, 2vw, 26px);
            line-height: 1.28;
            font-weight: 750;
        }

        .patent-page .support {
            margin: 0;
            max-width: 820px;
            color: rgba(237, 245, 255, .88);
            font-size: 18px;
            line-height: 1.72;
        }

        .patent-page .cta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 32px;
        }

        .patent-page .btn {
            min-height: 52px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 22px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 800;
            line-height: 1;
            border: 1px solid transparent;
            cursor: pointer;
            transition:
                transform .22s ease,
                box-shadow .22s ease,
                background .22s ease,
                border-color .22s ease,
                color .22s ease;
        }

        .patent-page .btn:hover {
            transform: translateY(-3px);
        }

        .patent-page .btn-primary {
            background: #ffffff;
            color: var(--fs-blue);
            border-color: #ffffff;
            box-shadow: 0 20px 48px rgba(0, 0, 0, .20);
        }

        .patent-page .btn-primary:hover {
            box-shadow: 0 26px 62px rgba(0, 0, 0, .28);
        }

        .patent-page .btn-secondary {
            /* background: rgba(255, 255, 255, .10); */
            color: #ffffff;
            border-color: rgba(255, 255, 255, .28);
            /* backdrop-filter: blur(10px); */
        }

        .patent-page .btn-secondary:hover {
            background: rgba(255, 255, 255, .16);
            border-color: rgba(255, 255, 255, .44);
        }

        /* Transparent hero metric cards */

        .patent-page .hero-metrics {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 26px;
        }

        .patent-page .metric {
            position: relative;
            overflow: hidden;
            padding: 18px 16px;
            border: 1px solid rgba(255, 255, 255, .16);
            /* background: rgba(255, 255, 255, .12); */
            /* backdrop-filter: blur(12px); */
            color: #ffffff;
            box-shadow: 0 20px 48px rgba(0, 0, 0, .14);
            transition: transform .25s ease, border-color .25s ease, background .25s ease, box-shadow .25s ease;
        }

        .patent-page .metric::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: var(--fs-cyan);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s cubic-bezier(.22, .61, .36, 1);
        }

        .patent-page .metric:hover {
            transform: translateY(-4px);
            border-color: rgba(21, 209, 255, .44);
            background: rgba(255, 255, 255, .17);
            box-shadow: 0 26px 56px rgba(0, 24, 220, .20);
        }

        .patent-page .metric:hover::after {
            transform: scaleX(1);
        }

        .patent-page .metric strong {
            display: block;
            margin-bottom: 7px;
            color: #ffffff;
            font-size: 1.24rem;
            line-height: 1.16;
            letter-spacing: -.03em;
        }

        .patent-page .metric span {
            display: block;
            color: rgba(232, 244, 255, .88);
            font-size: .93rem;
            line-height: 1.48;
        }

        /* Transparent hero visual cards */

        .patent-page .hero-visual {
            position: relative;
            overflow: hidden;
            min-height: 560px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            grid-template-areas:
                "problem response"
                "relevance response"
                "main main";
            gap: 16px;
            align-content: start;
            padding: 24px;
            /* border: 1px solid rgba(255, 255, 255, .16); */
            /* background: rgba(255, 255, 255, .10); */
            /* backdrop-filter: blur(16px); */
            box-shadow: 0 28px 70px rgba(0, 0, 0, .22);
        }

        .patent-page .visual-card {
            position: relative;
            z-index: 1;
            overflow: hidden;
            min-height: 132px;
            padding: 18px;
            border: 1px solid rgba(255, 255, 255, .15);
            /* background: rgba(255, 255, 255, .12); */
            /* backdrop-filter: blur(10px); */
            color: #ffffff;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .10);
            transition: transform .25s ease, border-color .25s ease, background .25s ease, box-shadow .25s ease;
        }

        .patent-page .visual-card::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: #f1f8fa;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s cubic-bezier(.22, .61, .36, 1);
        }

        .patent-page .visual-card:hover {
            transform: translateY(-4px);
            border-color: rgba(177, 177, 177, 0.44);
            background: rgba(255, 255, 255, .17);
            box-shadow: 0 26px 56px rgba(0, 24, 220, .20);
        }

        .patent-page .visual-card:hover::after {
            transform: scaleX(1);
        }

        .patent-page .visual-card.problem {
            grid-area: problem;
        }

        .patent-page .visual-card.response {
            grid-area: response;
        }

        .patent-page .visual-card.relevance {
            grid-area: relevance;
        }

        .patent-page .visual-card.main {
            grid-area: main;
            min-height: auto;
            padding: 24px;
        }

        .patent-page .visual-card h4 {
            margin: 0 0 9px;
            color: white;
            font-size: .82rem;
            font-weight: 850;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .patent-page .visual-card p {
            margin: 0;
            color: rgba(232, 244, 255, .88);
            font-size: .96rem;
            line-height: 1.55;
        }

        .patent-page .main-title {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 14px;
        }

        .patent-page .main-title h3 {
            margin: 0;
            color: #ffffff;
            font-size: 1.35rem;
            line-height: 1.15;
            letter-spacing: -.03em;
        }

        .patent-page .main-title span {
            color: var(--fs-cyan);
            font-weight: 800;
            white-space: nowrap;
        }

        /* ================================
                                                                       COMMON SECTION STYLES
                                                                    ================================ */

        .patent-page .section-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 28px;
            margin-bottom: 28px;
        }

        .patent-page .section-head h2 {
            margin: 0;
            max-width: 21ch;
            color: var(--fs-ink);
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
        }

        .patent-page .section-head p {
            flex: 0 0 420px;
            max-width: 48ch;
            margin: 6px 0 0;
            color: var(--fs-muted);
            font-size: 1.12rem;
            line-height: 1.65;
            font-weight: 500;
        }

        .patent-page .proof-cards,
        .patent-page .card-grid,
        .patent-page .feature-grid {
            align-items: stretch;
        }

        .patent-page .proof-cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .patent-page .proof-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            padding: 24px;
            border: 1px solid var(--fs-line);
            background: #ffffff;
            box-shadow: var(--fs-shadow);
            transition: transform .32s ease, box-shadow .32s ease, border-color .32s ease;
        }

        .patent-page .proof-card>* {
            position: relative;
            z-index: 1;
        }

        .patent-page .proof-card::before {
            content: "";
            position: absolute;
            inset: -20%;
            z-index: 0;
            pointer-events: none;
            background: linear-gradient(180deg, var(--fs-blue), #1433ff);
            transform: translateY(100%);
            transition: transform .56s cubic-bezier(.22, .61, .36, 1);
        }

        .patent-page .proof-card:hover {
            transform: translateY(-4px);
            border-color: var(--fs-blue);
            box-shadow: var(--fs-shadow-hover);
        }

        .patent-page .proof-card:hover::before {
            transform: translateY(0);
        }

        .patent-page .proof-card:hover * {
            color: #ffffff !important;
        }

        .patent-page .proof-tag,
        .patent-page .card .label {
            display: inline-flex;
            margin-bottom: 18px;
            padding: 8px 10px;
            border-radius: 999px;
            background: #edf3ff;
            color: var(--fs-blue);
            border: 1px solid #d3e1ff;
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            font-weight: 800;
        }

        .patent-page .proof-card:hover .proof-tag {
            background: rgba(255, 255, 255, .14);
            border-color: rgba(255, 255, 255, .28);
        }

        .patent-page .proof-card h3 {
            margin: 0 0 12px;
            color: var(--fs-ink);
            font-size: 1.42rem;
            line-height: 1.14;
            letter-spacing: -.03em;
        }

        .patent-page .proof-card p {
            flex-grow: 1;
            margin: 0 0 16px;
            color: var(--fs-muted);
        }

        .patent-page .proof-metric {
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid rgba(16, 42, 67, .10);
            color: var(--fs-blue);
            font-size: 1.32rem;
            font-weight: 750;
            line-height: 1.2;
            letter-spacing: -.02em;
            margin-bottom: 6px;
        }

        .patent-page .proof-detail {
            color: var(--fs-muted);
            font-size: .95rem;
            font-weight: 500;
            line-height: 1.45;
        }

        .patent-page .tech-grid {
            display: grid;
            grid-template-columns: minmax(0, .95fr) minmax(0, 1.05fr);
            gap: 24px;
            align-items: start;
        }

        .patent-page .stack {
            display: grid;
            gap: 14px;
        }

        .patent-page .stack .item,
        .patent-page .impact,
        .patent-page .feature,
        .patent-page .compare-box,
        .patent-page .card {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--fs-line);
            background: #ffffff;
            box-shadow: var(--fs-shadow);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
        }

        .patent-page .stack .item::after,
        .patent-page .impact::after,
        .patent-page .feature::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: var(--fs-blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s cubic-bezier(.22, .61, .36, 1);
        }

        .patent-page .stack .item:hover,
        .patent-page .impact:hover,
        .patent-page .feature:hover,
        .patent-page .compare-box:hover,
        .patent-page .card:hover {
            transform: translateY(-4px);
            border-color: var(--fs-blue);
            background: #ffffff;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
        }

        .patent-page .stack .item:hover::after,
        .patent-page .impact:hover::after,
        .patent-page .feature:hover::after {
            transform: scaleX(1);
        }

        .patent-page .stack .item {
            padding: 18px 18px 16px;
        }

        .patent-page .stack .item h4 {
            margin: 0 0 8px;
            color: var(--fs-ink);
            font-size: 1.05rem;
            letter-spacing: -.02em;
        }

        .patent-page .stack .item p {
            margin: 0;
            color: var(--fs-muted);
            font-size: .95rem;
        }

        .patent-page .two-up-cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            align-items: stretch;
        }

        .patent-page .card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .patent-page .card {
            min-height: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 24px 24px 30px;
        }

        .patent-page .card h3 {
            margin: 0 0 12px;
            color: var(--fs-ink);
            font-size: 1.48rem;
            line-height: 1.12;
            letter-spacing: -.03em;
        }

        .patent-page .card p {
            margin: 0 0 16px;
            color: var(--fs-muted);
        }

        .patent-page .card ul,
        .patent-page .compare-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
        }

        .patent-page .card li,
        .patent-page .compare-box li {
            position: relative;
            padding-left: 24px;
            color: var(--fs-ink);
            font-size: .95rem;
        }

        .patent-page .card li::before,
        .patent-page .compare-box li::before {
            content: "";
            position: absolute;
            left: 0;
            top: .2rem;
            width: 16px;
            height: 12px;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            transition: transform .24s ease;
        }

        .patent-page .card:hover li::before {
            transform: translateX(2px);
        }

        .patent-page .impact-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin: 18px 0 0;
        }

        .patent-page .impact {
            padding: 16px;
        }

        .patent-page .impact strong {
            display: block;
            margin-bottom: 4px;
            color: var(--fs-blue);
            font-size: 1.28rem;
            letter-spacing: -.03em;
        }

        .patent-page .impact span {
            display: block;
            color: var(--fs-muted);
            font-size: .91rem;
        }

        .patent-page .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 18px;
        }

        .patent-page .feature {
            min-height: 100%;
            padding: 22px;
        }

        .patent-page .feature .kicker {
            display: block;
            margin-bottom: 10px;
            color: var(--fs-blue);
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            font-weight: 800;
        }

        .patent-page .feature h3 {
            margin: 0 0 10px;
            color: var(--fs-ink);
            font-size: 1.18rem;
            line-height: 1.15;
            letter-spacing: -.03em;
        }

        .patent-page .feature p {
            margin: 0;
            color: var(--fs-muted);
            font-size: .95rem;
        }

        .patent-page .compare {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            align-self: stretch;
        }

        .patent-page .compare-box {
            padding: 18px;
        }

        .patent-page .compare-box h4 {
            margin: 0 0 12px;
            color: var(--fs-blue);
            font-size: 1.02rem;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .patent-page .cta-panel {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 28px;
            padding: 28px;
            border: 1px solid var(--fs-line);
            background: #ffffff;
            box-shadow: var(--fs-shadow);
        }

        .patent-page .cta-panel h2 {
            margin: 0 0 8px;
            color: var(--fs-ink);
            font-size: clamp(1.8rem, 3vw, 2.7rem);
            line-height: 1.05;
            letter-spacing: -.04em;
        }

        .patent-page .cta-panel p {
            margin: 0;
            max-width: 62ch;
            color: var(--fs-muted);
        }

        .patent-page .proof-card p,
        .patent-page .card p,
        .patent-page .feature p,
        .patent-page .stack .item p,
        .patent-page .compare-box li {
            overflow-wrap: anywhere;
        }

        #why-patents-matter,
        #us11098709b2,
        #field-value,
        #supporting-patents,
        #products {
            scroll-margin-top: 120px;
        }

        /* ================================
                                                                       RESPONSIVE
                                                                    ================================ */

        @media (max-width: 1120px) {
            .patent-page .hero {
                min-height: auto;
            }

            .patent-page .hero .inner {
                min-height: auto;
                padding-top: 72px;
                padding-bottom: 64px;
            }

            .patent-page .hero-grid,
            .patent-page .tech-grid {
                grid-template-columns: 1fr;
            }

            .patent-page .feature-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .patent-page .proof-cards,
            .patent-page .card-grid,
            .patent-page .compare {
                grid-template-columns: 1fr;
            }

            .patent-page .hero-visual {
                min-height: auto;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-template-areas:
                    "problem response"
                    "relevance response"
                    "main main";
            }

            .patent-page .two-up-cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 840px) {
            .patent-page .hero::after {
                background:
                    linear-gradient(180deg,
                        rgba(2, 6, 23, .94) 0%,
                        rgba(2, 6, 23, .84) 54%,
                        rgba(0, 24, 220, .68) 100%);
            }

            .patent-page .hero-metrics,
            .patent-page .impact-grid,
            .patent-page .feature-grid {
                grid-template-columns: 1fr;
            }

            .patent-page .section-head {
                flex-direction: column;
                align-items: start;
            }

            .patent-page .section-head p {
                flex: 1 1 auto;
                max-width: none;
            }

            .patent-page .hero-visual {
                grid-template-columns: 1fr;
                grid-template-areas:
                    "problem"
                    "response"
                    "relevance"
                    "main";
            }
        }

        @media (max-width: 640px) {
            .patent-page .inner {
                width: min(var(--fs-max), calc(100% - 28px));
            }

            .patent-page .section {
                padding: 54px 0;
            }

            .patent-page .hero .inner {
                padding-top: 58px;
                padding-bottom: 48px;
            }

            .patent-page h1 {
                font-size: 38px;
            }

            .patent-page .subheadline {
                font-size: 21px;
            }

            .patent-page .support {
                font-size: 16px;
            }

            .patent-page .btn {
                width: 100%;
            }

            .patent-page .hero-visual {
                padding: 18px;
            }

            .patent-page .two-up-cards {
                grid-template-columns: 1fr;
            }

            .patent-page .main-title {
                flex-direction: column;
                align-items: flex-start;
            }

            .patent-page .metric,
            .patent-page .visual-card,
            .patent-page .card,
            .patent-page .proof-card,
            .patent-page .feature,
            .patent-page .stack .item,
            .patent-page .compare-box,
            .patent-page .impact {
                min-height: auto;
            }
        }
    </style>

    <main class="patent-page">

        <section class="hero section">
            <div class="inner">
                <div class="hero-grid">
                    <div>


                        <h1>Patent-backed operating methods for real oil and gas compression duty.</h1>

                        <p class="subheadline">
                            Practical patent coverage tied to liquid handling, compression response, and production
                            optimization in real field conditions.
                        </p>

                        <p class="support">
                            Fluidstream’s patent position is strongest where it connects directly to field problems:
                            liquids inside compression, pressure behavior, and control under non-ideal operating
                            conditions. The core U.S. patent, US11098709B2, describes changing compressor operation when
                            liquid is detected in the chamber.
                        </p>

                        <div class="cta-row">
                            <a href="#us11098709b2" class="btn btn-primary">Review the Core Patent</a>
                            <a href="#supporting-patents" class="btn btn-secondary">See Supporting Patents</a>
                        </div>

                        <div class="hero-metrics">
                            <div class="metric">
                                <strong>U.S. + Canada</strong>
                                <span>Coverage across core multiphase compression and production optimization patent
                                    families.</span>
                            </div>

                            <div class="metric">
                                <strong>Active U.S. Patent</strong>
                                <span>US11098709B2 anchors the core multiphase operating-method story.</span>
                            </div>

                            <div class="metric">
                                <strong>Field-Relevant Claims</strong>
                                <span>Focused on liquid detection, stroke behavior, and pressure response under mixed-phase
                                    conditions.</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <div class="visual-card problem">
                            <h4>Problem</h4>
                            <p>
                                Incompressible liquids reduce effective chamber volume and can drive rapid pressure rise
                                late
                                in the stroke.
                            </p>
                        </div>

                        <div class="visual-card response">
                            <h4>Patented Response</h4>
                            <p>
                                Detect the liquid condition and change compressor operation during the stroke rather than
                                treating liquid only as a shutdown event.
                            </p>
                        </div>

                        <div class="visual-card relevance">
                            <h4>Commercial Relevance</h4>
                            <p>
                                Useful where wet gas, slugs, and unstable flow limit conventional gas-only systems in vapor
                                recovery, casing gas, and multiphase service.
                            </p>
                        </div>

                        <div class="visual-card main">
                            <div class="main-title">
                                <h3>US11098709B2 | Method and apparatus for pumping fluid</h3>
                                <span>Granted Aug. 24, 2021</span>
                            </div>

                            <p>
                                The core U.S. patent ties the Fluidstream platform to mode changes between higher-volume and
                                lower-volume operation during the compression stroke, giving the patent story clear
                                technical relevance in mixed-phase service.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="why-patents-matter">
            <div class="inner">
                <div class="section-head">
                    <h2>Why the patents matter.</h2>
                    <p>
                        Patents that address compression behavior under liquid-influenced conditions provide a stronger
                        technical basis for real oil and gas applications.
                    </p>
                </div>

                <div class="proof-cards">
                    <article class="proof-card">
                        <div class="proof-tag">Compression Physics</div>
                        <h3>Addresses the late-stroke pressure problem created by liquid in the chamber.</h3>
                        <p>
                            US11098709B2 centers on a real engineering issue: incompressible liquid changes chamber volume
                            and can drive pressure higher near the end of the stroke.
                        </p>
                        <div class="proof-metric">Liquid-influenced chamber behavior</div>
                        <div class="proof-detail">Tied to a practical compression problem.</div>
                    </article>

                    <article class="proof-card">
                        <div class="proof-tag">Control Logic</div>
                        <h3>Protects an operating response, not only a hardware configuration.</h3>
                        <p>
                            The core patent story is about detecting liquid-related conditions and changing compressor
                            behavior during the cycle.
                        </p>
                        <div class="proof-metric">Sensor-driven mode change</div>
                        <div class="proof-detail">More meaningful than a generic patent claim.</div>
                    </article>

                    <article class="proof-card">
                        <div class="proof-tag">Field Relevance</div>
                        <h3>Connects directly to mixed-phase operating reality.</h3>
                        <p>
                            The patent position matters most where wet gas, casing gas, and multiphase service create
                            conditions conventional systems struggle to handle.
                        </p>
                        <div class="proof-metric">IP linked to application value</div>
                        <div class="proof-detail">Supports stability and controllability claims.</div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="us11098709b2">
            <div class="inner">
                <div class="section-head">
                    <h2>US11098709B2: the core patent anchor.</h2>
                    <p>
                        US11098709B2 addresses liquid detection and compression-cycle response within the chamber, making it
                        the clearest anchor for Fluidstream’s patent position.
                    </p>
                </div>

                <div class="tech-grid">
                    <div class="stack">
                        <div class="item">
                            <h4>Active U.S. patent</h4>
                            <p>US11098709B2 anchors Fluidstream’s main U.S. multiphase operating-method story.</p>
                        </div>

                        <div class="item">
                            <h4>Mode change during the stroke</h4>
                            <p>
                                The patent describes high-volume operation for a first portion of the stroke and
                                lower-volume
                                behavior for the remainder as chamber conditions change.
                            </p>
                        </div>

                        <div class="item">
                            <h4>Liquid detection tied to chamber behavior</h4>
                            <p>
                                The operating logic is built around detecting liquid-related conditions and adjusting
                                compressor behavior accordingly.
                            </p>
                        </div>

                        <div class="item">
                            <h4>Pressure-management relevance</h4>
                            <p>
                                The described response helps manage the part of the cycle where rapid pressure rise becomes
                                more severe.
                            </p>
                        </div>
                    </div>

                    <div>
                        <div class="two-up-cards">
                            <article class="card">
                                <div class="label">What it protects</div>
                                <h3>Compression response under liquid influence.</h3>
                                <p>
                                    The patent is most valuable where it protects operating methods for responding to
                                    mixed-phase chamber behavior rather than simply defining package layout.
                                </p>
                                <ul>
                                    <li>Liquid-aware operation</li>
                                    <li>Stroke-based mode change</li>
                                    <li>Pressure-behavior management</li>
                                </ul>
                            </article>

                            <article class="card">
                                <div class="label">Why it matters</div>
                                <h3>Rooted in a real engineering problem.</h3>
                                <p>
                                    This patent is useful because it addresses a specific physical challenge inside
                                    compression rather than relying on a generic efficiency claim.
                                </p>
                                <ul>
                                    <li>Relevant to wet service</li>
                                    <li>Relevant to compressor protection</li>
                                    <li>Relevant to controllability</li>
                                </ul>
                            </article>
                        </div>

                        <div class="impact-grid">
                            <div class="impact">
                                <strong>2014</strong>
                                <span>Priority date for the core patent family.</span>
                            </div>

                            <div class="impact">
                                <strong>2021</strong>
                                <span>Granted U.S. patent publication date.</span>
                            </div>

                            <div class="impact">
                                <strong>2034</strong>
                                <span>Expected expiration window for the core patent family.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="field-value">
            <div class="inner">
                <div class="section-head">
                    <h2>What the patents mean in the field.</h2>
                    <p>
                        These patents are most relevant where operating conditions include wet gas, variable flow, and
                        mixed-phase service.
                    </p>
                </div>

                <div class="feature-grid">
                    <div class="feature">
                        <span class="kicker">Vapor Recovery</span>
                        <h3>Supports operation beyond dry-gas assumptions.</h3>
                        <p>Relevant where entrained liquids and unstable flow challenge conventional vapor recovery systems.
                        </p>
                    </div>

                    <div class="feature">
                        <span class="kicker">Casing Gas</span>
                        <h3>Aligned with wet casing-gas service.</h3>
                        <p>
                            Most meaningful where casing gas compression must account for liquid carryover and changing
                            conditions.
                        </p>
                    </div>

                    <div class="feature">
                        <span class="kicker">Multiphase Production</span>
                        <h3>Matches the platform’s core use case.</h3>
                        <p>
                            Strongest where gas-and-liquid flow is handled together rather than forced into a gas-only
                            model.
                        </p>
                    </div>

                    <div class="feature">
                        <span class="kicker">Reliability Narrative</span>
                        <h3>Improves how performance claims are backed up.</h3>
                        <p>
                            Patents tied to liquid handling and operating logic better support claims around stability,
                            controllability, and field applicability.
                        </p>
                    </div>
                </div>

                <div class="compare" style="margin-top:22px;">
                    <div class="compare-box">
                        <h4>Conventional narrative</h4>
                        <ul>
                            <li>Gas-only compression assumptions</li>
                            <li>Reliability depends on ideal inlet conditions</li>
                            <li>Liquid events treated mainly as trip or shutdown drivers</li>
                            <li>Harder to tie patent claims to field value</li>
                        </ul>
                    </div>

                    <div class="compare-box">
                        <h4>Fluidstream patent narrative</h4>
                        <ul>
                            <li>Mixed-phase conditions addressed inside compression</li>
                            <li>Core patent explains response to liquid-influenced chamber behavior</li>
                            <li>Stronger support for uptime and controllability claims</li>
                            <li>Better fit for vapor recovery, casing gas, and multiphase applications</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="supporting-patents">
            <div class="inner">
                <div class="section-head">
                    <h2>Supporting patent families.</h2>
                    <p>
                        Fluidstream’s patent coverage spans both multiphase compression behavior and production optimization
                        /
                        control.
                    </p>
                </div>

                <div class="card-grid">
                    <article class="card">
                        <div class="label">Canada</div>
                        <h3>CA2843321C</h3>
                        <p>
                            The Canadian counterpart to the multiphase compression family supports the same technical story
                            as US11098709B2.
                        </p>
                        <ul>
                            <li>Method and apparatus for pumping fluid</li>
                            <li>Mode change within the stroke path</li>
                            <li>Canadian coverage for the core multiphase family</li>
                        </ul>
                    </article>

                    <article class="card">
                        <div class="label">United States</div>
                        <h3>US10221664B2</h3>
                        <p>
                            This granted U.S. patent broadens the IP story beyond compressor mechanics into system-level
                            control and production response.
                        </p>
                        <ul>
                            <li>Method and system for optimizing well production</li>
                            <li>Granted U.S. patent protection</li>
                            <li>Supports the control and optimization narrative</li>
                        </ul>
                    </article>

                    <article class="card">
                        <div class="label">Canada</div>
                        <h3>CA2883283C</h3>
                        <p>
                            The Canadian well-production optimization family complements the multiphase compression family
                            and
                            expands the patent story beyond mechanics alone.
                        </p>
                        <ul>
                            <li>Canadian granted patent family</li>
                            <li>Corresponds to the U.S. optimization family</li>
                            <li>Reinforces the production-optimization story</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="products">
            <div class="inner">
                <div class="section-head">
                    <h2>How the patents connect back to products.</h2>
                    <p>
                        Fluidstream’s patent coverage connects directly to its commercial products and field applications.
                    </p>
                </div>

                <div class="proof-cards">
                    <article class="proof-card">
                        <div class="proof-tag">MultiphaseCommander™</div>
                        <h3>Primary commercial expression of the core multiphase patent family.</h3>
                        <p>
                            The multiphase platform is built around handling gas and liquids together and changing
                            compression behavior when chamber conditions demand it.
                        </p>
                        <div class="proof-metric">Best fit for US11098709B2</div>
                        <div class="proof-detail">Connects directly to mixed-phase transport and system simplification.
                        </div>
                    </article>

                    <article class="proof-card">
                        <div class="proof-tag">VaporCommander™</div>
                        <h3>Extends the patent story into vapor recovery where wet service matters.</h3>
                        <p>
                            For vapor recovery, the patent story helps explain why Fluidstream positions the technology
                            beyond idealized clean, dry gas conditions.
                        </p>
                        <div class="proof-metric">Supports wet-service relevance</div>
                        <div class="proof-detail">Useful when backing claims about lower maintenance and broader operating
                            range.</div>
                    </article>

                    <article class="proof-card">
                        <div class="proof-tag">CompressionCommander™</div>
                        <h3>Strengthens the case for casing gas applications with liquid risk.</h3>
                        <p>
                            Casing gas compression often suffers when liquid carryover or unstable conditions hit
                            conventional
                            packages. The patent page supports the operating logic behind Fluidstream’s approach.
                        </p>
                        <div class="proof-metric">Supports technical confidence</div>
                        <div class="proof-detail">Pairs naturally with application pages and case studies.</div>
                    </article>
                </div>

                <div class="cta-panel">
                    <div>
                        <h2>See how the patent position supports Fluidstream applications.</h2>
                        <p>
                            Explore the technology, products, and field applications where Fluidstream’s patented operating
                            methods support stable operation, reliability, and broader deployment in mixed-phase service.
                        </p>
                    </div>

                    <div style="display:flex;gap:12px;flex-wrap:wrap">
                        <a class="btn btn-primary" href="{{ url('/technical-review') }}">Request Technical Review</a>
                        <a class="btn btn-secondary" href="{{ url('/technology') }}">Explore Technology</a>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection