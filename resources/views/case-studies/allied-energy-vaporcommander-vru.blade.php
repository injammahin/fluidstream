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
            --soft: #f3f7fb;
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
            color: #fff
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
            max-width: var(--max);
            margin: 0 auto;
            /* padding: 86px 22px 64px; */
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




        */ h1 {
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

        .quote {
            font-size: 18px;
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
            font-size: 22px;
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

        h1 {
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
            max-width: 920px;
        }

        .step:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff;
        }

        .step:hover::after {
            transform: scaleX(1);
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

        .step:after {
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

        .step:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;
        }

        .step:hover::after {
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
            background: #0018dc;
            color: #fff;
            border: 0;
            /* box-shadow: 0 28px 80px rgba(0, 24, 220, .22) */
        }

        .panel.dark p {
            color: rgba(255, 255, 255, .80)
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
            background: #f5f6f8;
            color: #fff;
            position: relative;
            overflow: hidden
        }

        /* 
                                                                .blue-section h2 {
                                                                    color: #fff
                                                                } */

        .blue-section .kicker mb-2 {
            color: var(--cyan)
        }

        .blue-section p {
            color: #5c6677;
        }

        .blue-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 30px;
            align-items: start
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
            border: 1px solid #d9d9d9;
            padding: 22px;
            border-radius: 7px
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
            /* padding: 42px; */
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 30px;
            align-items: center;
        }

        .result-band h2 {
            color: #2e2e2e
        }

        .result-band p {
            color: #1a2843
        }

        .result-band-1 p {
            color: #1a2843
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
            color: #1a2843
        }

        .bullet:before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--cyan);
            margin-top: 8px;
            flex: 0 0 auto
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

        .pp {
            max-width: 62ch;
        }

        /* .kicker {
                                                                        display: inline-flex;
                                                                        align-items: center;
                                                                        font-size: 13px;
                                                                        font-weight: 800;
                                                                        letter-spacing: .18em;
                                                                        text-transform: uppercase;
                                                                        color: aliceblue;
                                                                    } */

        .quote-source-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 22px;
        }

        .quote-source-row .quote-source {
            flex: 1;
            margin: 0;
            color: #061126;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.45;
        }

        .quote-logo-box {
            flex: 0 0 150px;
            width: 150px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quote-logo-box img {
            display: block;
            max-width: 100%;
            max-height: 80px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        @media (max-width: 760px) {
            .quote-source-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .quote-logo-box {
                width: 150px;
                height: auto;
                flex-basis: auto;
            }

            .quote-logo-box img {
                max-height: 48px;
            }
        }
    </style>


    <main>
        <section class="hero">
            <div class="hero-inner wrap py-12">
                <div>
                    <h1>100% uptime vapor recovery through wet gas, winter conditions, and variable gas flow.</h1>
                    <h2>Fluidstream VaporCommander™ eliminated gas venting from oil storage tanks without relying on a
                        conventional scrubber-based VRU design.</h2>
                    <p class="lead">Allied Energy II inherited an Alberta, Canada facility with a problematic conventional
                        vapor recovery unit that could not operate consistently under real field conditions. Fluidstream’s
                        patented VaporCommander™ was installed to provide reliable vapor recovery, emissions control, and
                        low-touch operation in wet gas service, variable gas flow, and harsh seasonal conditions in Alberta,
                        Canada.</p>
                    <div class="cta-row">
                        <a class="btn primary" href="/vapor-recovery">View VaporCommander™</a>
                        <a class="btn secondary" href="/technical-review">Request Technical Review</a>
                    </div>
                </div>
                <aside class="hero-card heroo">

                    <p class="quote">“Since installation, Fluidstream’s VaporCommander™ has maintained 100% uptime for over
                        17 months while eliminating gas venting from our tanks, without requiring maintenance or service
                        intervention. From an operations perspective, it has proven to be a highly reliable and low-touch
                        solution under real field conditions.”</p>
                    <div class="quote-source-row">
                        <div class="quote-source">
                            VP Production, Allied Energy II Corp.
                        </div>

                        <div class="quote-logo-box">
                            <img src="{{ asset('img/Allied Energy.png') }}" alt="Allied Energy II Corp. logo">
                        </div>
                    </div>
                    <div class="mini-metrics">
                        <div class="mini"><strong>100%</strong><span>uptime since installation</span></div>
                        <div class="mini"><strong>17+</strong><span>months operating at case-study date</span></div>
                        <div class="mini"><strong>0</strong><span>maintenance or service required</span></div>
                        <div class="mini"><strong>-40°C</strong><span>winter exposure survived</span></div>
                    </div>
                </aside>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head ">
                    <div>
                        <div class="kicker">Performance snapshot</div>
                        <h2>Reliable recovery where the previous VRU struggled.</h2>
                    </div>
                    <p>As of the case-study date, VaporCommander™ had operated for over 17 months with 100% uptime, zero
                        maintenance, no service requirements, and no filter changes. The unit eliminated gas venting from
                        the oil storage tanks while operating through wet gas exposure, variable gas flow, hot summers, and
                        two winters where temperatures dropped below -40°C.</p>
                </div>
                <div class="metrics">
                    <article class="metric">
                        <div class="tag">Uptime</div>
                        <div class="big">100%</div>
                        <h3>since installation</h3>
                        <p class="muted">Observed uptime as of the case-study date, with ongoing performance dependent on
                            field conditions and operation.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Operating period</div>
                        <div class="big">17+</div>
                        <h3>months in service</h3>
                        <p class="muted">The unit had operated for more than 17 months at the time of this case study and
                            continued operation depends on field conditions and operating requirements.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Maintenance</div>
                        <div class="big">0</div>
                        <h3>service events</h3>
                        <p class="muted">No maintenance, service, or filter changes had been required to date.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Emissions control</div>
                        <div class="big">Gas</div>
                        <h3>venting eliminated</h3>
                        <p class="muted">The unit captured tank vapors that would otherwise have created venting or flaring
                            exposure.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="blue-section">
            <div class="container blue-grid wrap py-12">
                <div>
                    <div class="kicker">Background and challenge</div>
                    <h2>The previous VRU did not match the reality of the fluid stream.</h2>
                    <p>Allied Energy II acquired assets that included an existing facility with a conventional vapor
                        recovery unit that could not operate consistently. The root issue was not simply that the prior
                        equipment was unreliable. It was that the operating assumptions behind a conventional VRU did not
                        fit the facility’s actual conditions.</p>
                    <p>The Alberta, Canada facility exposed the system to wet gas containing condensate and water, variable
                        gas flow, and extreme seasonal temperatures. Conventional VRUs are typically protected by upstream
                        scrubbers or separation equipment, but in real operation those components become failure points when
                        liquid loading, flow variation, and winter conditions are present.</p>
                    <p>In cold-weather operation in Alberta, Canada, the mismatch becomes more severe. Liquids present in
                        the gas stream can accumulate and freeze within scrubbers and upstream separation equipment. That
                        can block drains, disrupt level control, increase liquid carryover risk, and lead to instability and
                        higher maintenance requirements.</p>
                </div>
                <div class="timeline">
                    <div class="step"><strong class="number">01</strong>
                        <div>
                            <h3>Acquired reliability problem</h3>
                            <p>The facility came with a conventional VRU that could not consistently operate under field
                                conditions.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">02</strong>
                        <div>
                            <h3>Wet gas and variable gas flow</h3>
                            <p>Tank vapor streams were not dry, steady, or ideal; the system had to tolerate condensate,
                                water, and changing flow.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">03</strong>
                        <div>
                            <h3>Winter freezing exposure</h3>
                            <p>Liquids in scrubbers and upstream separation equipment can freeze, impairing drainage and
                                level control.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">04</strong>
                        <div>
                            <h3>Regulatory and ESG need</h3>
                            <p>Allied required a reliable, cost-effective way to eliminate venting and support emissions
                                compliance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Why conventional VRUs struggle</div>
                        <h2>Scrubber-dependent VRUs add maintenance risk.</h2>
                    </div>
                    <p>Conventional VRUs usually rely on upstream scrubbers to remove liquids before compression. That
                        approach can work when inlet conditions are controlled, but it adds equipment, drains, level
                        controls, filters, and liquid handling points that require attention. In cold and wet operation,
                        those components can become the source of instability.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <div class="number">01</div>
                        <h3>Wet gas creates compressor risk.</h3>
                        <p class="muted">When liquid bypasses or overwhelms upstream separation, carryover can enter the
                            compressor. That can lead to mechanical stress, lubrication problems, fouling, and increased
                            service frequency.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">02</div>
                        <h3>Scrubbers add cold-weather failure points.</h3>
                        <p class="muted">In winter, liquids can freeze inside scrubbers, drains, and upstream separation
                            equipment. Frozen liquid accumulation can impair level control, block drainage, and increase the
                            chance of shutdowns or carryover events.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">03</div>
                        <h3>Variable flow reduces stability.</h3>
                        <p class="muted">Tank vapor generation is not always steady. Flow can rise and fall with facility
                            operation, temperature, liquid levels, and production behavior. A VRU must tolerate these swings
                            without constant operator intervention.</p>
                    </article>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container split wrap py-12">
                <div class="panel ">
                    <div class="kicker">Fluidstream deployment</div>
                    <h3>VaporCommander™ installed December 2024</h3>
                    <p>Allied Energy II selected Fluidstream’s VaporCommander™ because it offered a different operating
                        methodology from a conventional scrubber-protected VRU. VaporCommander™ is designed to operate
                        directly on wet and variable vapor streams and to compress wet gas within the compression chamber
                        rather than depending on upstream conditioning as the first line of reliability.</p>
                    <p>The result was a simpler vapor recovery approach: fewer separation-related failure points, less
                        dependence on scrubber draining and filtration, and a system better aligned with real tank vapor
                        conditions.</p>
                </div>
                <div class="panel">
                    <div class="kicker">What changed</div>
                    <h3>Venting eliminated with no maintenance required to date.</h3>
                    <p>Since installation, the unit has captured tank vapors that would otherwise have been vented. As of
                        the case-study date, Allied had not required maintenance, service, or filter changes, and the system
                        had maintained 100% uptime for more than 17 months.</p>
                    <p>This outcome is especially relevant because the operating period included harsh Alberta, Canada
                        winter conditions below -40°C, where conventional scrubber-based VRU systems can experience
                        freezing-related instability.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Technology differentiation</div>
                        <h2>Patented wet-gas compression logic.</h2>
                    </div>
                    <p>VaporCommander™ is supported by Fluidstream’s patented multiphase compression approach. The system
                        architecture is designed around liquid-influenced compression behavior, wet gas service, and
                        changing operating conditions.</p>
                </div>
                <div class="cards">
                    <article class="card swipe">
                        <div class="number">01</div>
                        <h3>Wet gas handled within compression.</h3>
                        <p class="muted">Instead of requiring a scrubber to make the stream acceptable to a gas-only
                            compressor, VaporCommander™ is designed to manage wet gas directly within the compression
                            process.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">02</div>
                        <h3>No scrubber dependency.</h3>
                        <p class="muted">Eliminating upstream scrubber dependency removes a class of maintenance-intensive
                            components and avoids common winter failure points caused by liquid accumulation and freezing.
                        </p>
                    </article>
                    <article class="card swipe">
                        <div class="number">03</div>
                        <h3>Variable-flow operation.</h3>
                        <p class="muted">The system is suited to tank vapor conditions where flow can vary with production,
                            temperature, liquid level, and facility operation, rather than assuming a narrow steady-state
                            operating point.</p>
                    </article>
                </div>
                <div class="seo-copy" style="margin-top:34px;max-width:980px">
                    <p>Fluidstream’s patent portfolio, including US11098709B2, CA2843321C, CA2883283C, and US10221664B2,
                        supports its technical positioning around multiphase compression and liquid-aware compression
                        response. US11098709B2 is especially relevant when discussing how Fluidstream technology accounts
                        for liquid-influenced chamber behavior. The practical impact is clear: VaporCommander™ eliminated
                        gas venting without relying on a conventional separation-first VRU configuration.</p>
                </div>
            </div>
        </section>

        <section class="blue-section">
            <div class="container wrap py-12">
                <div class="result-band">
                    <div>
                        <div class="kicker">Field results</div>
                        <h2>Over 17 months of 100% uptime at the time of reporting.</h2>
                        <p>As of the case-study date, VaporCommander™ had operated for over 17 months with 100% uptime, zero
                            maintenance, no service events, and no filter changes. This observed performance reflects
                            continuous operation to date; future performance will depend on ongoing field conditions and
                            operation.</p>
                        <div class="bullets">
                            <div class="bullet">Gas venting from oil storage tanks eliminated.</div>
                            <div class="bullet">100% uptime observed since installation as of the case-study date.</div>
                            <div class="bullet">No maintenance, service, or filter changes required to date.</div>
                            <div class="bullet">Reliable operation through two winters, including temperatures below -40°C
                                in Alberta, Canada.</div>
                        </div>
                    </div>
                    <div class="hero-card" style="box-shadow:none">
                        <p class="quote" style="color: #000000">“From an operations perspective, it’s been a reliable and
                            low-touch solution, and
                            we’ve been very satisfied with its performance in the field.”</p>
                        <div class="quote-source">Richard Grenville, VP Production, Allied Energy II Corp.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Why no maintenance was required</div>
                        <h2>The reliability result is tied to system architecture.</h2>
                    </div>
                    <p>The absence of maintenance over more than 17 months reflects a system architecture that avoids
                        several major failure mechanisms common to conventional VRU systems in wet and cold service.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <h3>No scrubber maintenance burden.</h3>
                        <p class="muted">Because the system does not depend on upstream scrubbers to protect the compressor,
                            it avoids routine scrubber draining, filter changes, level-control problems, and freeze-related
                            scrubber instability.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Wet gas compatibility.</h3>
                        <p class="muted">Liquids are managed within compression rather than treated solely as upstream
                            contaminants. This reduces exposure to conventional wet-gas failure modes such as carryover,
                            fouling, and lubrication-related instability.</p>
                    </article>
                    <article class="card fill">
                        <h3>Reduced mechanical stress from liquids.</h3>
                        <p class="muted">Fluidstream’s liquid-aware approach is intended to reduce sensitivity to entrained
                            liquids and transient flow conditions that can destabilize gas-only compression systems.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Simpler surface configuration.</h3>
                        <p class="muted">Fewer external conditioning components mean fewer components that require
                            inspection, draining, winterization, service, or replacement.</p>
                    </article>
                    <article class="card fill">
                        <h3>Cold-weather operating advantage.</h3>
                        <p class="muted">By eliminating upstream separation dependency, VaporCommander™ avoids common winter
                            failure points where water and condensate can freeze in scrubbers, drains, and separation
                            equipment.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Low-touch operation.</h3>
                        <p class="muted">The unit has operated as a reliable field system rather than a
                            maintenance-intensive emissions control device requiring frequent intervention.</p>
                    </article>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Technical fit summary</div>
                        <h2>Why VaporCommander™ fit this VRU application.</h2>
                    </div>
                    <p>This case demonstrates that vapor recovery reliability is not only about compressor horsepower. It is
                        about whether the system can handle the real fluid stream, including wet gas, variable gas flow,
                        seasonal temperature swings, and emissions-control uptime requirements.</p>
                </div>
                <div class="comparison">
                    <div class="row">
                        <div class="left">Conventional VRU</div>
                        <div>Often depends on scrubbers and upstream separation to protect the compressor, creating
                            additional maintenance points and winter freeze risks.</div>
                    </div>
                    <div class="row">
                        <div class="left">Scrubber-based protection</div>
                        <div>Can reduce liquid carryover under controlled conditions, but liquids can accumulate, freeze,
                            block drains, disrupt level control, and increase maintenance exposure in cold service.</div>
                    </div>
                    <div class="row">
                        <div class="left">Operational requirement</div>
                        <div>Allied Energy II needed reliable emissions control, wet-gas tolerance, variable-flow
                            performance, and minimal field service burden.</div>
                    </div>
                    <div class="row">
                        <div class="left">Fluidstream</div>
                        <div>VaporCommander™ compresses wet gas directly, eliminates scrubber dependency, and delivered 100%
                            uptime with no maintenance or service required to date as of the case-study date.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div>
                    <div class="kicker">Next step</div>
                    <h2>Evaluate whether VaporCommander™ fits your tank vapor recovery application.</h2>
                    <p>Fluidstream can review tank configuration, vapor rate, wet gas composition, condensate and water
                        exposure, winter operation, regulatory requirements, power availability, H₂S exposure, and
                        maintenance expectations to determine whether VaporCommander™ is a fit.</p>
                </div>
                <div class="cta-row" style="justify-content:flex-start;margin:0">
                    <a class="btn-1 primary" href="/vapor-recovery">Review VaporCommander™</a>
                    <a class="btn-1 secondary" href="/technical-review">Request Technical Fit Analysis</a>
                </div>
            </div>
        </section>
    </main>
    <style>
        .hero {
            position: relative;
            overflow: hidden;
            background: #f4f6f8 !important;
            color: rgb(46 46 46) !important;
        }

        .hero:after {
            background: rgba(21, 208, 255, 0) !important;
        }

        .hero-card {
            border: 1px solid rgba(0, 0, 0, 0.22);
            box-shadow: 0 26px 70px rgba(0, 0, 0, 0) !important;
        }

        .hero h2 {
            color: rgb(2 6 23 / 0.7) !important;
        }

        .hero .lead {
            color: rgb(2 6 23 / 0.7) !important;
        }

        .btn.secondary {
            border-color: rgb(2 6 23 / 0.7) !important;
            color: rgb(2 6 23 / 0.7) !important;
        }

        .panel,
        .hero-card.heroo {
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

        .panel::after,
        .hero-card.heroo::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #0018dc;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 1;
            pointer-events: none;
        }

        .panel:hover,
        .hero-card.heroo:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff;
        }

        .panel:hover::after,
        .hero-card.heroo:hover::after {
            transform: scaleX(1);
        }

        .btn {
            border: 1px solid #000000a1 !important;
        }

        .panel {
            border-radius: 7px;
            padding: 36px;
            background: #ffffff !important;
            border: 1px solid #a5a7ab9f !important;
        }
    </style>

@endsection