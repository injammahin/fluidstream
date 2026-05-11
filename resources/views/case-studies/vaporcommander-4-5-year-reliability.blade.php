@extends('layouts.app')

@section('content')

    <style>
        :root {
            --blue: #0018dc;
            --blue-dark: #00108f;
            --cyan: #15d1ff;
            --ink: #08111f;
            --muted: #5c6677;
            --line: #dce4ef;
            --soft: #f4f6f8;
            --white: #ffffff;
            --card: #ffffff;
            --shadow: 0 22px 60px rgba(0, 24, 220, .12);
            --radius: 24px;
            --max: 1180px;
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            margin: 0;
            font-family: Inter, Arial, Helvetica, sans-serif;
            color: var(--ink);
            background: #fff;
            line-height: 1.55
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(0, 24, 220, .10)
        }

        .nav {
            max-width: var(--max);
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px
        }

        .brand {
            font-weight: 900;
            letter-spacing: -.04em;
            font-size: 25px;
            color: var(--blue)
        }

        .brand span {
            color: var(--ink)
        }

        .links {
            display: flex;
            gap: 26px;
            align-items: center;
            font-weight: 700;
            font-size: 14px;
            color: #263449
        }

        .nav-cta {
            padding: 12px 18px;
            border-radius: 999px;
            background: var(--blue);
            color: #fff;
            box-shadow: 0 12px 24px rgba(0, 24, 220, .22)
        }

        .hero {
            position: relative;
            overflow: hidden;
            background: #0018dc;
            color: #fff;
        }

        .hero:after {
            content: "";
            position: absolute;
            inset: auto -10% -34% 45%;
            height: 500px;
            background: rgba(21, 209, 255, .12);
            filter: blur(20px);
            border-radius: 50%
        }

        .wrap {
            max-width: 1200px;
        }

        .hero-inner {
            /* max-width: var(--max); */
            margin: 0 auto;
            /* padding: 86px 22px 104px; */
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.08fr .92fr;
            gap: 44px;
            align-items: center
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: .16em;
            font-weight: 900;
            color: var(--cyan);
            margin-bottom: 18px
        }

        /* 
                                                                                                                                                                                                                                                                                                                                                            .eyebrow:before {
                                                                                                                                                                                                                                                                                                                                                                content: "";
                                                                                                                                                                                                                                                                                                                                                                width: 34px;
                                                                                                                                                                                                                                                                                                                                                                height: 2px;
                                                                                                                                                                                                                                                                                                                                                                background: var(--cyan)
                                                                                                                                                                                                                                                                                                                                                            } */
        h1 {
            font-size: clamp(26px, 5vw, 50px);
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
            max-width: 920px;
        }

        .hero h2 {
            font-size: clamp(17px, 2vw, 22px);
            line-height: 1.12;
            letter-spacing: -.04em;
            margin: 0 0 20px;
            color: #eaf7ff;
            font-weight: 600;
            max-width: 43ch;
        }


        .lead {
            font-size: 16px;
            color: rgba(255, 255, 255, .82);
            max-width: 56ch;
            margin: 0 0 30px;
        }



        .cta-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 28px
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 15px 22px;
            font-weight: 900;
            border: 1px solid transparent;
            transition: .22s ease
        }

        .btn-1 {
            color: #00108f;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 15px 22px;
            font-weight: 900;
            border: 1px solid #00000080;
            transition: .22s ease;
        }

        .btn.primary {
            background: #fff;
            color: var(--blue)
        }

        .btn.secondary {
            border-color: rgba(255, 255, 255, .38);
            color: #fff
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, .18)
        }

        .hero-card {
            background: rgb(255, 255, 255);
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 7px;
            padding: 28px;
            box-shadow: 0 26px 70px rgba(0, 0, 0, .22)
        }

        .quote {
            font-size: 20px;
            line-height: 1.32;
            letter-spacing: -.035em;
            font-weight: 500;
            margin: 0 0 20px;
            color: #061126
        }

        .quote-source {
            color: #061126;
            font-size: 14px;
            font-weight: 700
        }

        .mini-metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 22px
        }

        .mini {
            border-radius: 7px;
            background: rgb(255, 255, 255);
            padding: 16px;
            border: 1px solid rgba(0, 0, 0, 0.16)
        }

        .mini strong {
            display: block;
            font-size: 24px;
            letter-spacing: -.04em;
            color: #000000
        }

        .mini span {
            font-size: 12px;
            color: rgba(0, 0, 0, 0.72);
            font-weight: 800
        }

        /* section {
                                                                                                                                                                                                                                                                                                                                                                                                                                                            padding: 78px 22px
                                                                                                                                                                                                                                                                                                                                                                                                                                                        } */

        .container {
            /* max-width: var(--max); */
            margin: 0 auto
        }

        .section-head {
            /* display: grid;
                                                                                                                                                                                                                                                                                                                                                                                grid-template-columns: .72fr 1.28fr;
                                                                                                                                                                                                                                                                                                                                                                                gap: 42px; */
            max-width: 66ch;
            align-items: start;
            margin-bottom: 34px
        }

        .kicker mb-2 {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .18em;
            color: var(--blue);
            font-weight: 950;
            margin-bottom: 12px
        }

        .hero-card:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #0018dc;
            transform: scaleX(0);
            /* Start with a scaleX of 0 (hidden) */
            transform-origin: left;
            /* Make the scale start from the left */
            transition: transform 0.3s ease;
            /* Smooth transition */
            z-index: 1;
        }

        .hero-card:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;
        }

        .hero-card:hover::after {
            transform: scaleX(1);
        }

        h2 {
            margin: 0 0 16px;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 25ch;
            color: #1f1f21;
        }

        .section-head p {
            font-size: 16px;
            color: #1a2843;
            margin: 6px 0 0;
            max-width: 740px;
        }

        .metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px
        }

        .metric {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 7px;
            padding: 26px;
            /* box-shadow: var(--shadow); */
            min-height: 175px;
            position: relative;
            overflow: hidden;
            transition: .24s ease;
        }

        .metric:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #0018dc;
            transform: scaleX(0);
            /* Start with a scaleX of 0 (hidden) */
            transform-origin: left;
            /* Make the scale start from the left */
            transition: transform 0.3s ease;
            /* Smooth transition */
            z-index: 1;
        }

        .metric:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;
        }

        .metric:hover::after {
            transform: scaleX(1);
        }

        .mini:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #0018dc;
            transform: scaleX(0);
            /* Start with a scaleX of 0 (hidden) */
            transform-origin: left;
            /* Make the scale start from the left */
            transition: transform 0.3s ease;
            /* Smooth transition */
            z-index: 1;
        }

        .mini:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;
        }

        .mini:hover::after {
            transform: scaleX(1);
        }

        .card:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #0018dc;
            transform: scaleX(0);
            /* Start with a scaleX of 0 (hidden) */
            transform-origin: left;
            /* Make the scale start from the left */
            transition: transform 0.3s ease;
            /* Smooth transition */
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;
        }

        .card:hover::after {
            transform: scaleX(1);
        }

        .big {
            font-size: 30px;
            line-height: .95;
            letter-spacing: -.07em;
            font-weight: 950;
            color: var(--blue);
            margin: 0 0 14px
        }

        /* .metric:hover .big {
                                                                                                                                                                                                                                                                                                                        color: #fff
                                                                                                                                                                                                                                                                                                                    } */

        .metric h3,
        .card h3 {
            font-size: 22px;
            letter-spacing: -.035em;
            line-height: 1.08;
            margin: 0 0 12px
        }

        p {
            margin: 0 0 16px
        }

        .muted {
            color: var(--muted)
        }

        .tag {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 900;
            color: var(--blue);
            margin-bottom: 12px
        }

        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            align-items: stretch
        }

        .panel {
            border-radius: 7px;
            padding: 36px;
            background: var(--soft);
            border: 1px solid #a5a7ab9f !important;
        }

        .panel.dark {
            /* background: #0018dc;
                                                                                                                        color: #fff; */
            border: 0;
            /* box-shadow: 0 28px 80px rgba(0, 24, 220, .22) */
        }

        .panel.dark p {
            /* color: rgba(255, 255, 255, .80) */
        }

        .panel h3 {
            font-size: 32px;
            line-height: 1.02;
            letter-spacing: -.055em;
            margin: 0 0 18px
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px
        }

        .card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 7px;
            padding: 28px;
            min-height: 180px;
            transition: .24s ease;
            /* box-shadow: 0 16px 46px rgba(5, 18, 44, .06) */
        }

        /* .card.swipe:after {
                                                                                                                                                                                                                                        content: "";
                                                                                                                                                                                                                                        position: absolute;
                                                                                                                                                                                                                                        left: -110%;
                                                                                                                                                                                                                                        top: 0;
                                                                                                                                                                                                                                        width: 100%;
                                                                                                                                                                                                                                        height: 100%;
                                                                                                                                                                                                                                        background: linear-gradient(105deg, transparent, rgba(21, 209, 255, .16), transparent);
                                                                                                                                                                                                                                        transition: .5s ease
                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                    .card.swipe:hover:after {
                                                                                                                                                                                                                                        left: 110%
                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                    .card:hover {
                                                                                                                                                                                                                                        transform: translateY(-5px);
                                                                                                                                                                                                                                        border-color: rgba(0, 24, 220, .3);
                                                                                                                                                                                                                                        box-shadow: 0 26px 60px rgba(0, 24, 220, .12)
                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                    .card.fill:hover {
                                                                                                                                                                                                                                        background: var(--blue);
                                                                                                                                                                                                                                        color: #fff;
                                                                                                                                                                                                                                        border-color: var(--blue)
                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                    .card.fill:hover p,
                                                                                                                                                                                                                                    .card.fill:hover .tag {
                                                                                                                                                                                                                                        color: rgba(255, 255, 255, .78)
                                                                                                                                                                                                                                    } */

        .number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: rgba(0, 24, 220, .08);
            color: var(--blue);
            font-weight: 950;
            margin-bottom: 18px
        }

        /* .card.fill:hover .number {
                                                                                                                                                                                                                                    background: rgba(255, 255, 255, .14);
                                                                                                                                                                                                                                    color: #fff
                                                                                                                                                                                                                                } */

        .blue-section {
            background: #f3f7fd;
            position: relative;
            overflow: hidden
        }

        /* .blue-section h2 {
                                                                                                                                            color: #fff
                                                                                                                                        } */

        .blue-section .kicker mb-2 {
            color: var(--cyan)
        }

        /* .blue-section p {
                                                                                                                                            color: rgba(255, 255, 255, .80)
                                                                                                                                        } */

        .blue-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 30px;
            align-items: start;
        }

        .timeline {
            display: grid;
            gap: 14px
        }

        .step {
            display: grid;
            grid-template-columns: 70px 1fr;
            gap: 18px;
            align-items: start;
            background: rgb(255, 255, 255);
            border: 1px solid #959de0;
            padding: 22px;
            border-radius: 7px
        }

        .step {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 70px 1fr;
            gap: 18px;
            align-items: start;
            background: #fff;
            border: 1px solid #cbd1ff;
            padding: 22px;
            border-radius: 7px;
            transition: transform 0.24s ease, border-color 0.24s ease, background 0.24s ease;
        }

        .step::after {
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

        .color {
            color: #424f5d;
        }

        .step:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff;
        }

        .step:hover::after {
            transform: scaleX(1);
        }

        /* .step strong {
                                                                                                                                                                                                                                                                    font-size: 24px;
                                                                                                                                                                                                                                                                    color: black
                                                                                                                                                                                                                                                                } */

        .step h3 {
            margin: 0 0 8px;
            color: #000000;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -.03em
        }

        .step p {
            color: #000000;

            margin: 0
        }

        .result-band {
            /* background: #0018dc;
                                                                                        color: #fff; */
            padding: 42px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 30px;
            align-items: center;
        }


        .result-band-1 p {
            color: rgba(0, 0, 0, 0.78)
        }

        .bullets {
            display: grid;
            gap: 12px;
            margin-top: 20px
        }

        .bullet {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            /* color: rgba(255, 255, 255, .83) */
        }

        .bullet:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.2rem;
            width: 16px;
            height: 12px;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            background-image: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E);
            transition: transform .24s ease;
        }

        .seo-copy {
            font-size: 18px;
            color: #334056
        }

        .seo-copy p {
            margin-bottom: 20px
        }

        .comparison {
            overflow: hidden;
            border-radius: 7px;
            border: 1px solid var(--line);
            background: #fff;
            /* box-shadow: var(--shadow) */
        }

        .row {
            display: grid;
            grid-template-columns: .34fr .66fr;
            border-bottom: 1px solid var(--line)
        }

        .row:last-child {
            border-bottom: 0
        }

        .row div {
            padding: 24px
        }

        .row .left {
            font-weight: 950;
            color: var(--blue);
            background: #f7faff
        }

        .cta {
            /* background: linear-gradient(135deg, #061126, #0018dc); */
            color: #000000;
            /* border-radius: 36px; */
            padding: 46px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 26px;
            align-items: center
        }

        .cta h2 {
            color: #000000
        }

        .cta p {
            color: rgba(0, 0, 0, 0.78)
        }

        footer {
            background: #071126;
            color: #fff;
            padding: 56px 22px 28px
        }

        .footer-grid {
            max-width: var(--max);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.55fr .75fr .75fr 1fr;
            gap: 34px
        }

        .footer-grid h3 {
            margin: 0 0 12px
        }

        .footer-grid p,
        .footer-grid a {
            display: block;
            color: rgba(255, 255, 255, .72);
            font-size: 14px;
            margin: 0 0 9px
        }

        .footer-bottom {
            max-width: var(--max);
            margin: 34px auto 0;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, .12);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            color: rgba(255, 255, 255, .58);
            font-size: 13px
        }

        @media (max-width:900px) {
            .links {
                display: none
            }

            .hero-inner,
            .section-head,
            .split,
            .blue-grid,
            .result-band,
            .cta {
                grid-template-columns: 1fr
            }

            .metrics {
                grid-template-columns: 1fr 1fr
            }

            .cards {
                grid-template-columns: 1fr
            }

            .mini-metrics {
                grid-template-columns: 1fr
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr
            }

            .row {
                grid-template-columns: 1fr
            }

            section {
                padding: 58px 18px
            }

            .hero-inner {
                padding-top: 62px
            }

            h1 {
                font-size: 48px
            }
        }

        @media (max-width:560px) {
            .metrics {
                grid-template-columns: 1fr
            }

            .footer-grid {
                grid-template-columns: 1fr
            }

            .footer-bottom {
                flex-direction: column
            }

            .hero-card,
            .panel,
            .cta,
            .result-band {
                border-radius: 22px;
                padding: 26px
            }

            .big {
                font-size: 36px
            }
        }

        /* 
                                                            .bullet li:before {
                                                                content: "";
                                                                position: absolute;
                                                                left: 0;
                                                                top: 0.2rem;
                                                                width: 16px;
                                                                height: 12px;
                                                                background-repeat: no-repeat;
                                                                background-size: 16px 12px;
                                                                background-image: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E);
                                                                transition: transform .24s ease;
                                                            } */

        .pp {
            color: #5c6677 !important;
            max-width: 62ch;
        }

        .label {
            display: inline-flex;
            align-items: center;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
            /* color: aliceblue; */
        }
    </style>

    <main>
        <section class="hero">
            <div class="hero-inner wrap py-12">
                <div>
                    <h1>More than 4.5 years of vapor recovery with only one seal change to date.</h1>
                    <h2>Fluidstream VaporCommander™ delivered 35 months to the first seal change, negligible maintenance,
                        and reliable operation through Alberta, Canada winters below -40°C.</h2>
                    <p class="lead">An oil and gas producer operating in Alberta, Canada needed a vapor recovery solution
                        that could handle wet gas, variable gas flow, and extreme seasonal conditions without the
                        maintenance burden commonly associated with conventional scrubber-based VRU systems. Fluidstream’s
                        patented VaporCommander™ provided a simpler, multiphase-ready approach built for real fluid streams,
                        not ideal dry-gas assumptions.</p>
                    <div class="cta-row">
                        <a class="btn primary" href="/vapor-recovery">View VaporCommander™</a>
                        <a class="btn secondary" href="/technical-review">Request Technical Review</a>
                    </div>
                </div>
                <aside class="hero-card">
                    <p class="quote">More than 4.5 years of field operation demonstrated the practical value of
                        Fluidstream’s multiphase vapor recovery approach: 35 months to the first seal change, only one seal
                        change to date, negligible maintenance, and reliable winter operation in cold Alberta, Canada
                        conditions.</p>
                    <div class="quote-source">VaporCommander™ reliability case study • Alberta, Canada</div>
                    <div class="mini-metrics">
                        <div class="mini"><strong>4.5+</strong><span>years operation</span></div>
                        <div class="mini"><strong>35</strong><span>months to first seal change</span></div>
                        <div class="mini"><strong>1</strong><span>seal change to date</span></div>
                        <div class="mini"><strong>-40°C</strong><span>winter exposure</span></div>
                    </div>
                </aside>
            </div>
        </section>

        <section class="">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Performance snapshot</div>
                        <h2>Long-run VRU reliability in wet gas service.</h2>
                    </div>
                    <p>The VaporCommander™ system was installed in July 2021 at an oil battery in southern Alberta, Canada.
                        Over more than 4.5 years of operation, the system demonstrated sustained reliability with only one
                        significant maintenance event: a seal replacement after approximately 35 months. Since that first
                        seal change, the unit continued operating with otherwise negligible maintenance requirements.</p>
                </div>
                <div class="metrics">
                    <article class="metric">
                        <div class="tag">Runtime</div>
                        <div class="big">4.5+</div>
                        <h3>years of operation</h3>
                        <p class="muted">Extended field runtime in Alberta, Canada vapor recovery service with wet gas and
                            variable operating conditions.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Seal life</div>
                        <div class="big">35</div>
                        <h3>months to first change</h3>
                        <p class="muted">The first seal replacement occurred after approximately 35 months of operation.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Maintenance</div>
                        <div class="big">1</div>
                        <h3>seal change to date</h3>
                        <p class="muted">Only one seal replacement over the full operating period, with otherwise negligible
                            maintenance.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Winter operation</div>
                        <div class="big">-40°C</div>
                        <h3>cold-weather exposure</h3>
                        <p class="muted">The system operated through cold Alberta, Canada winters where conventional
                            separator-based systems can struggle.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="blue-section " style="background:var(--soft)">
            <div class="container blue-grid wrap py-12">
                <div>
                    <div class="kicker mb-2">The challenge</div>
                    <h2>Vapor recovery is difficult when the gas is wet, variable, and exposed to winter.</h2>
                    <p class="pp">Tank vapor recovery in upstream oil and gas is rarely a clean, steady dry-gas application.
                        Vapor
                        streams can include condensate, water, changing flow rates, pressure variation, and seasonal
                        temperature swings. Conventional VRU systems often require upstream separation to protect the
                        compressor, which adds scrubbers, drains, level controls, filters, and additional maintenance
                        points.</p>
                    <p class="pp">In Alberta, Canada winter operation, those added liquid-handling components can become
                        reliability
                        risks. When liquids accumulate inside separators, scrubbers, drains, or upstream piping, freezing
                        can block drainage paths, impair level control, and increase the chance of liquid carryover into the
                        compressor. This can create shutdowns, unstable operation, and repeated maintenance in the exact
                        season when field access is most difficult.</p>
                </div>
                <div class="timeline">
                    <div class="step"><strong class="number">01</strong>
                        <div>
                            <h3>Wet gas exposure</h3>
                            <p>Tank vapor streams can carry water and condensate that conventional gas-only compressors are
                                not designed to ingest.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">02</strong>
                        <div>
                            <h3>Variable gas flow</h3>
                            <p>Vapor generation changes with tank conditions, production behavior, pressure, and
                                temperature.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">03</strong>
                        <div>
                            <h3>Winter freeze risk</h3>
                            <p>Liquids in scrubbers and separators can freeze, block drains, and disrupt level control.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">04</strong>
                        <div>
                            <h3>Maintenance exposure</h3>
                            <p>More conditioning equipment creates more components that require service, inspection, and
                                winterization.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Why conventional VRUs struggle</div>
                        <h2>Separator-based protection adds failure points.</h2>
                    </div>
                    <p>Conventional vapor recovery systems are generally designed around dry gas compression. When the
                        stream is wet, the usual response is to add upstream separation. That approach may protect the
                        compressor under controlled conditions, but it also adds equipment that can fail, freeze, foul,
                        require draining, or allow carryover when upset conditions occur.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <div class="number">01</div>
                        <h3>Liquid carryover risk.</h3>
                        <p class="muted">If a separator or scrubber is overwhelmed, liquid can reach the compressor. In
                            gas-only machines, liquids can contribute to hydraulic loading, mechanical stress, lubrication
                            problems, and accelerated wear.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">02</div>
                        <h3>Winter freezing risk.</h3>
                        <p class="muted">Water and condensate can freeze inside scrubbers, drains, level-control points, and
                            upstream separation equipment. Frozen liquids can block drainage and cause unstable operation.
                        </p>
                    </article>
                    <article class="card fill">
                        <div class="number">03</div>
                        <h3>Maintenance dependency.</h3>
                        <p class="muted">Scrubber-based systems require additional inspection, draining, filter management,
                            winterization, and operator attention, increasing total operating burden.</p>
                    </article>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container split wrap py-12">
                <div class="panel dark">
                    <div class="kicker mb-2">Fluidstream solution</div>
                    <h3>VaporCommander™ operates directly on wet vapor streams.</h3>
                    <p>Fluidstream’s VaporCommander™ is a patented multiphase vapor recovery system designed to process gas
                        streams that contain liquids without requiring conventional upstream separation as the primary
                        protection strategy. Its architecture supports operation on real fluid streams that include gas,
                        condensate, water, and variable flow behavior.</p>
                    <p>By reducing dependence on scrubbers and separation equipment, VaporCommander™ also reduces exposure
                        to common winter failure points. The system is designed to handle wet gas within the compression
                        process rather than forcing the site to make the gas dry before compression.</p>
                </div>
                <div class="panel">
                    <div class="kicker mb-2">Field-proven result</div>
                    <h3>35 months to first seal change.</h3>
                    <p>The system operated for approximately 35 months before its first seal replacement. That seal change
                        remains the only significant maintenance event to date across more than 4.5 years of operation.</p>
                    <p>This performance is commercially meaningful because seal changes, service calls, downtime,
                        freeze-related winter issues, and repeated maintenance interventions are all part of the operating
                        cost that can undermine conventional VRU economics.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Seal longevity</div>
                        <h2>Seal life starts with alignment.</h2>
                    </div>
                    <p>The long seal life observed in this application is primarily tied to Fluidstream’s mechanical
                        alignment philosophy. The system is designed to maintain consistent alignment between moving
                        components during operation, reducing uneven loading, vibration, and localized wear on sealing
                        surfaces.</p>
                </div>
                <div class="cards">
                    <article class="card swipe">
                        <div class="number">01</div>
                        <h3>Strong mechanical alignment.</h3>
                        <p class="muted">Better alignment reduces side loading and uneven contact conditions that commonly
                            accelerate seal wear in conventional mechanical systems.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">02</div>
                        <h3>Lower localized wear.</h3>
                        <p class="muted">Uniform contact conditions help reduce hot spots, abrasion, and mechanical fatigue
                            on sealing surfaces over long operating periods.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">03</div>
                        <h3>Wet-gas operating stability.</h3>
                        <p class="muted">The ability to manage liquid-influenced compression behavior further reduces
                            instability that can damage seals and other wear components.</p>
                    </article>
                </div>
                <div class="seo-copy" style="margin-top:34px;max-width:980px">
                    <p>In many conventional systems, misalignment can develop from installation tolerances, thermal
                        expansion, vibration, or dynamic loading. Once alignment degrades, seals can experience uneven
                        contact pressure, higher friction, and accelerated leakage paths. Fluidstream’s alignment-focused
                        architecture helps explain why the VaporCommander™ system reached approximately 35 months before its
                        first seal change and then continued to operate beyond 4.5 years with only one seal change to date.
                    </p>
                </div>
            </div>
        </section>

        <section class="" style="background:var(--soft)">
            <div class="container wrap py-12">
                <div class="result-band">
                    <div>
                        <div class="kicker mb-2">Field results</div>
                        <h2>More than 4.5 years with one seal change to date.</h2>
                        <p>After installation in July 2021, the VaporCommander™ system provided long-term vapor recovery
                            performance with minimal intervention. The first seal change occurred after approximately 35
                            months. Across more than 4.5 years of total operation, that remains the only significant
                            maintenance event to date, with negligible maintenance otherwise reported.</p>
                        <div class="bullets">
                            <div class="bullet">Approximately 35 months of operation before the first seal change.</div>
                            <div class="bullet">More than 4.5 years of total operation with only one seal change to date.
                            </div>
                            <div class="bullet">Negligible maintenance over the operating period.</div>
                            <div class="bullet">Stable operation through cold Alberta, Canada winters that can fall below
                                -40°C [-40°F].</div>
                        </div>
                    </div>
                    <div class="hero-card" style="box-shadow:none">
                        <p class="quote" style="color: #000000">VaporCommander™ is a field-proven vapor recovery system that
                            reduces maintenance
                            burden, supports methane emissions control, and improves uptime confidence in wet gas and
                            cold-weather operation.</p>
                        <div class="quote-source">Fluidstream VaporCommander™ field result</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Patent-supported technology</div>
                        <h2>Patented liquid-aware compression.</h2>
                    </div>
                    <p>Fluidstream’s patent portfolio supports the technical foundation behind VaporCommander™.
                        Fluidstream’s patents support a practical engineering outcome: stable compression of wet and
                        variable fluid streams without relying on a conventional gas-only compressor protected by more
                        separation equipment.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <h3>US11098709B2.</h3>
                        <p class="muted">A primary reference for liquid-aware compression behavior and response to
                            liquid-influenced chamber dynamics.</p>
                    </article>
                    <article class="card swipe">
                        <h3>US10221664B2.</h3>
                        <p class="muted">Supports Fluidstream’s broader compression architecture and oil and gas relevance.
                        </p>
                    </article>
                    <article class="card fill">
                        <h3>CA2843321C and CA2883283C.</h3>
                        <p class="muted">Canadian patent coverage supporting Fluidstream’s foundational compression
                            technology and operating logic.</p>
                    </article>
                </div>
                <div class="seo-copy" style="margin-top:34px;max-width:980px">
                    <p>Instead of requiring liquids to be removed upstream before compression, Fluidstream technology is
                        designed around the reality that oilfield vapor recovery streams can be wet, variable, and difficult
                        to condition economically. These patents support the operating logic behind direct wet-gas handling,
                        simplified surface configuration, and reduced maintenance exposure.</p>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Technical fit summary</div>
                        <h2>Why VaporCommander™ fit this VRU application.</h2>
                    </div>
                    <p>This case demonstrates that vapor recovery reliability is not only about horsepower or nominal
                        capacity. It is about whether the system can tolerate wet gas, variable gas flow, cold-weather
                        exposure, seal wear mechanisms, and the maintenance realities of remote oilfield operation.</p>
                </div>
                <div class="comparison">
                    <div class="row">
                        <div class="left">Conventional VRU</div>
                        <div>Often depends on scrubbers and upstream separation to protect a gas-only compressor, adding
                            freeze risks and maintenance points.</div>
                    </div>
                    <div class="row">
                        <div class="left">Winter limitation</div>
                        <div>Liquids can freeze in separators, scrubbers, drains, and level-control equipment, leading to
                            instability, carryover, shutdowns, and increased service requirements.</div>
                    </div>
                    <div class="row">
                        <div class="left">Seal reliability</div>
                        <div>Seal life can be shortened by poor alignment, uneven loading, vibration, liquid upset
                            conditions, and repeated maintenance events.</div>
                    </div>
                    <div class="row">
                        <div class="left">Fluidstream</div>
                        <div>VaporCommander™ handles wet gas within compression, reduces separator dependency, maintains
                            strong mechanical alignment, and delivered more than 4.5 years with only one seal change to
                            date.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container cta wrap py-12">
                <div>
                    <div class="kicker mb-2">Next step</div>
                    <h2>Evaluate whether VaporCommander™ fits your vapor recovery application.</h2>
                    <p>Fluidstream can review tank configuration, vapor rate, wet gas composition, condensate and water
                        exposure, variable gas flow, winter operation, regulatory requirements, power availability, H₂S
                        exposure, seal-life expectations, and maintenance history to determine whether VaporCommander™ is a
                        fit.</p>
                </div>
                <div class="cta-row" style="justify-content:flex-start;margin:0">
                    <a class="btn-1 primary" href="/vapor-recovery">Review VaporCommander™</a>
                    <a class="btn-1 secondary" href="/technical-review">Request Technical Fit Analysis</a>
                </div>
            </div>
        </section>
    </main>

@endsection