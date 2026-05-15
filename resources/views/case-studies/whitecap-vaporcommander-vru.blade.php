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
            border: 1px solid rgba(84, 84, 84, 0.22);
            border-radius: 7px;
            padding: 28px;
            box-shadow: 0 26px 70px rgba(0, 0, 0, .22)
        }

        h1 {
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
            max-width: 920px;
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


        .blue-section h2 {
            color: #fff
        }

        .blue-section .kicker mb-2 {
            color: var(--cyan)
        }

        .blue-section p {
            color: rgba(255, 255, 255, .80)
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
            border: 1px solid rgba(255, 255, 255, .18);
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

        .gray {
            background: #f4f6f8;

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

        .result-band {
            /* padding: 42px; */
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 30px;
            align-items: center;
        }

        /* .result-band h2 {
                                                                                                color: #fff
                                                                                            } */

        .result-band p {
            color: #1a2843;
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
            color: #1a2843;
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

        .label {
            display: inline-flex;
            align-items: center;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: aliceblue;
        }

        .quote-source-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin: 18px 0 22px;
        }

        .quote-source-row .quote-source {
            flex: 1;
            color: #061126;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.45;
        }

        .quote-logo-box {
            flex: 0 0 150px;
            width: 150px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quote-logo-box img {
            display: block;
            max-width: 100%;
            max-height: 54px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        @media (max-width: 760px) {
            .quote-source-row {
                flex-direction: column;
                align-items: flex-start;
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
        <section class="hero ">
            <div class="hero-inner  wrap py-12">
                <div>
                    <h1>Reliable vapor recovery through Saskatchewan winter conditions and real field vapors.</h1>
                    <h2>VaporCommander™ operated continuously with no reported downtime, no winter-related issues, and
                        minimal routine maintenance.</h2>
                    <p class="lead">Whitecap Resources deployed Fluidstream VaporCommander™ VRU units at Saskatchewan,
                        Canada production facilities where vapor capture reliability, winter operability, liquid tolerance,
                        and low operator intervention were key requirements.</p>
                    <div class="cta-row">
                        <a class="btn primary" href="/vapor-recovery">View VaporCommander™</a>
                        <a class="btn secondary" href="/technical-review">Request Technical Review</a>
                    </div>
                </div>
                <aside class="hero-card heroo">
                    <p class="quote">“The units have run continuously with no downtime, no winter-related issues, and no
                        need for intervention. Maintenance has been minimal, with only a quick filter change.”</p>
                    <div class="quote-source-row">
                        <div class="quote-source">
                            Facilities Team Lead, East & West SK, Whitecap Resources Inc.
                        </div>

                        <div class="quote-logo-box">
                            <img src="{{ asset('img/Whitecap.png') }}" alt="Whitecap Resources Inc. logo">
                        </div>
                    </div>
                    <div class="mini-metrics">
                        <div class="mini"><strong>0</strong><span>reported downtime</span></div>
                        <div class="mini"><strong>-40°C</strong><span>winter exposure</span></div>
                        <div class="mini"><strong>5 min</strong><span>routine filter change</span></div>
                        <div class="mini"><strong>2+</strong><span>units installed / planned</span></div>
                    </div>
                </aside>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Performance snapshot</div>
                        <h2>Observed field performance in cold-weather VRU service.</h2>
                    </div>
                    <p>Whitecap installed its first VaporCommander™ unit near Kindersley, Saskatchewan, Canada in June 2025.
                        After observing reliable operation, Whitecap installed another unit near Estevan in December 2025
                        and is planning additional VRU installations.</p>
                </div>
                <div class="metrics">
                    <article class="metric">
                        <div class="tag">Runtime</div>
                        <div class="big">Zero</div>
                        <h3>reported downtime</h3>
                        <p class="muted">The units continued to operate without reported downtime at the time of the case
                            study.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Temperature range</div>
                        <div class="big">-40°C</div>
                        <h3>to +40°C environment</h3>
                        <p class="muted">The Saskatchewan operating environment includes extreme winter cold and hot summer
                            temperatures.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Maintenance</div>
                        <div class="big">5</div>
                        <h3>minute filter change</h3>
                        <p class="muted">Routine filter maintenance was completed quickly and was not a corrective repair
                            event.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Expansion</div>
                        <div class="big">More</div>
                        <h3>VRUs planned</h3>
                        <p class="muted">Repeat installation and planned expansion indicate field confidence in the system.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container split wrap py-12">
                <div class="panel ">
                    <div class="kicker">Application context</div>
                    <h3>Vapor recovery in a real Saskatchewan operating window.</h3>
                    <p>Whitecap’s Saskatchewan facilities required vapor recovery equipment to capture low-pressure
                        hydrocarbon vapors from storage and process equipment. The system needed to support methane
                        emissions management while operating reliably in cold-weather production environments.</p>
                    <p>The application required tolerance for field vapors that may contain condensate, water, unstable
                        vapor generation, low suction pressure, and seasonal temperature extremes.</p>
                </div>
                <div class="panel">
                    <div class="kicker">Application requirements</div>
                    <h3>Low-touch operation mattered as much as compression capability.</h3>
                    <p>The equipment needed to reduce operator intervention, avoid winter reliability problems, and handle
                        vapor streams that are not clean, dry, or steady.</p>
                    <p>In this service, equipment that looks acceptable under controlled dry-gas assumptions can become
                        problematic when exposed to real vapors, liquid carryover, and freezing risks.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Why conventional VRUs struggle</div>
                        <h2>Conventional dry-gas assumptions do not always match field vapors.</h2>
                    </div>
                    <p>Many conventional VRU packages are built around compressors that prefer dry, stable inlet gas.
                        Production-facility vapors are often less predictable, especially where condensable hydrocarbons,
                        water vapor, intermittent liquid carryover, and winter operation are present.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <div class="number">01</div>
                        <h3>Liquids create mechanical and operating risk.</h3>
                        <p class="muted">Entrained liquids can cause trips, wear, lubricant contamination, sealing problems,
                            corrosion exposure, and controls instability in conventional compression systems.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">02</div>
                        <h3>Winter conditions intensify the problem.</h3>
                        <p class="muted">Liquids can freeze in scrubbers, drains, small lines, instrumentation, and
                            separation equipment, creating false trips and field callouts.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">03</div>
                        <h3>Upstream protection can become the maintenance burden.</h3>
                        <p class="muted">Heat tracing, insulation, liquid drains, separator maintenance, freeze protection,
                            and oil-condition monitoring can shift the reliability issue upstream.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Fluidstream technical differentiation</div>
                        <h2>Multiphase-tolerant vapor recovery for liquid-prone service.</h2>
                    </div>
                    <p>VaporCommander™ is designed around multiphase-tolerant compression. Instead of assuming the inlet
                        stream must be fully conditioned before compression, the system is intended to handle gas streams
                        with entrained liquids and changing flow conditions.</p>
                </div>
                <div class="cards">
                    <article class="card swipe">
                        <div class="number">01</div>
                        <h3>Reduced dependence on perfect separation.</h3>
                        <p class="muted">Liquid tolerance reduces reliance on scrubber perfection and can reduce
                            freeze-prone protection points in winter operation.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">02</div>
                        <h3>Autonomous control and field stability.</h3>
                        <p class="muted">VaporCommander™ is configured to run with minimal operator intervention while
                            adapting to variable vapor generation, low suction pressure, and changing tank conditions.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">03</div>
                        <h3>Mechanical alignment supports seal life.</h3>
                        <p class="muted">Fluidstream’s alignment architecture helps reduce side-loading and uneven seal
                            wear, supporting longer run life and reduced maintenance cycle frequency.</p>
                    </article>
                </div>
            </div>
        </section>

        <section>
            <div class="container split wrap py-12">
                <div class="panel">
                    <div class="kicker">Patent-supported engineering</div>
                    <h3>Liquid-aware compression response.</h3>
                    <p>Fluidstream’s multiphase compression platform is supported by core intellectual property, including
                        US11098709B2, CA2843321C, CA2883283C, and US10221664B2.</p>
                    <p>US11098709B2 is the primary technical anchor for liquid-influenced compression response. The
                        practical relevance is that Fluidstream’s technology is built around the reality that liquids and
                        variable conditions exist in oil and gas vapor recovery and compression applications.</p>
                </div>
                <div class="panel">
                    <div class="kicker">What the field result showed</div>
                    <h3>Reliability came from architecture, not babysitting.</h3>
                    <p>The Whitecap units operated without normal operating intervention, with no winter-related issues and
                        only a short routine filter change.</p>
                    <p>For facilities and operations teams, that matters because VRU uptime directly affects emissions
                        capture, operational confidence, and whether the package can be standardized across additional
                        locations.</p>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container wrap py-12">
                <div class="result-band">
                    <div>
                        <div class="kicker">Field results</div>
                        <h2>Continuous operation, minimal maintenance, and winter reliability.</h2>
                        <p>Across the Saskatchewan deployments, VaporCommander™ demonstrated the operating behavior
                            engineering and facilities teams look for in VRU service: stable runtime, low intervention, and
                            strong performance through harsh seasonal conditions.</p>
                        <div class="bullets">
                            <div class="bullet">No reported downtime at the time of the case study.</div>
                            <div class="bullet">No winter-related operating issues reported.</div>
                            <div class="bullet">Routine filter change only, completed in approximately five minutes.</div>
                            <div class="bullet">No normal operating intervention required.</div>
                            <div class="bullet">Second unit installed, with additional VRUs planned.</div>
                        </div>
                    </div>
                    <div class="hero-card" style="box-shadow:none">
                        <p class="quote" style="color: #000000">“Based on that performance, we’ve already installed another
                            unit, are planning
                            additional VRUs, and are now evaluating Fluidstream’s multiphase technology for casing gas
                            compression.”</p>
                        <div class="quote-source">Warren Klien, Facilities Team Lead - East & West SK, Whitecap Resources
                            Inc.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Operational benefits</div>
                        <h2>Built for facilities teams that need reliable VRU operation, not constant troubleshooting.</h2>
                    </div>
                    <p>The strongest fit is where vapor streams are liquid-prone, cold-weather exposure is material, and
                        field teams need reliable vapor capture without frequent resets, winter callouts, or
                        maintenance-heavy upstream conditioning.</p>
                </div>
                <div class="cards two">
                    <article class="card fill">
                        <h3>Reduced downtime risk.</h3>
                        <p class="muted">Continuous operation improves confidence that vapor recovery remains available when
                            emissions control is required.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Low maintenance burden.</h3>
                        <p class="muted">Routine filter maintenance takes approximately five minutes and avoids the heavier
                            service burden often associated with conventional VRUs.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Winter operability.</h3>
                        <p class="muted">The system reduces dependence on liquid-sensitive upstream separation equipment
                            where freezing can create trips and maintenance callouts.</p>
                    </article>
                    <article class="card fill">
                        <h3>Better fit for real field vapors.</h3>
                        <p class="muted">Multiphase tolerance improves reliability when vapor streams include entrained
                            liquids, condensate, water, or unstable flow.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Application fit summary</div>
                        <h2>Where VaporCommander™ fits best.</h2>
                    </div>
                    <p>This case is most relevant for operators evaluating VRU reliability in cold-weather or liquid-prone
                        facilities where conventional dry-gas VRU packages require too much conditioning, troubleshooting,
                        or operator attention.</p>
                </div>
                <div class="comparison">
                    <div class="row">
                        <div class="left">Conventional dry-gas VRU</div>
                        <div>Suitable where the vapor stream is consistently dry, stable, and well-conditioned. Performance
                            can degrade when exposed to entrained liquids, unstable vapor generation, or freeze-prone
                            conditions.</div>
                    </div>
                    <div class="row">
                        <div class="left">Separation-heavy VRU design</div>
                        <div>Can protect conventional compressors, but adds freeze-prone equipment, drains, heat tracing,
                            maintenance burden, and greater system complexity.</div>
                    </div>
                    <div class="row">
                        <div class="left">Reactive maintenance model</div>
                        <div>Can keep equipment operating in difficult applications, but often requires troubleshooting,
                            resets, and weather-related callouts.</div>
                    </div>
                    <div class="row">
                        <div class="left">Fluidstream VaporCommander™</div>
                        <div>Best suited for vapor recovery applications involving entrained liquids, unstable vapor rates,
                            freeze-prone climates, remote or unmanned locations, or where minimizing maintenance and
                            operator intervention is a priority.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div>
                    <div class="kicker">Next step</div>
                    <h2>Evaluate VaporCommander™ for your vapor recovery application.</h2>
                    <p>Fluidstream can review tank configuration, vapor rate, suction and discharge conditions, liquids
                        exposure, winter operating requirements, emissions objectives, power availability, H₂S exposure, and
                        maintenance expectations to determine whether VaporCommander™ is the right technical fit.</p>
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