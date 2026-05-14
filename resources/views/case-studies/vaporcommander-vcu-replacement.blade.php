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
            border: 1px solid rgba(105, 105, 105, 0.22);
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

        /* .kicker mb-2 {
                                                                        font-size: 12px;
                                                                        text-transform: uppercase;
                                                                        letter-spacing: .18em;
                                                                        color: var(--blue);
                                                                        font-weight: 950;
                                                                        margin-bottom: 12px
                                                                    } */

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

        /* .panel.dark p {
                                                                                                        color: rgba(255, 255, 255, .80)
                                                                                                    } */

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

        /* .card.fill:hover .number {
                                                                                                                                                                                                                                        background: rgba(255, 255, 255, .14);
                                                                                                                                                                                                                                        color: #fff
                                                                                                                                                                                                                                    } */

        .blue-section {
            background: #f4f6f8;
            color: #fff;
            position: relative;
            overflow: hidden
        }

        /* .blue-section h2 {
                                                                                                                                        color: #fff
                                                                                                                                    } */

        /* .blue-section .kicker mb-2 {
                                                                        color: var(--cyan)
                                                                    } */

        .blue-section p {
            color: #5c6677;
        }

        .blue-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 30px;
            align-items: center
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
            border: 1px solid #5d607438;
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
            padding: 42px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 30px;
            align-items: center;
        }

        .result-band h2 {
            color: #1a1a1a
        }

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
    </style>

    <main>
        <section class="hero ">
            <div class="hero-inner wrap py-12">
                <div>
                    <h1>Replace vapor combustion with revenue-generating vapor recovery.</h1>
                    <h2>Fluidstream VaporCommander™ captured tank vapors instead of burning them, delivering more than
                        C$46,000/year
                        in estimated natural gas value and reliable 12-month field operation.</h2>
                    <p class="lead">A producer with operations in Southern Alberta, Canada needed a cost-effective
                        alternative to
                        vapor combustor units that could handle variable gas flow, higher discharge pressure, sudden flow
                        interruptions, and harsh seasonal operation. VaporCommander™ provided active vapor recovery, reduced
                        emissions, and operated through Alberta winter conditions without cold-weather stoppages, failures,
                        or
                        maintenance issues.</p>
                    <div class="cta-row">
                        <a class="btn primary" href="/vapor-recovery">View VaporCommander™</a>
                        <a class="btn secondary" href="/technical-review">Request Technical Review</a>
                    </div>
                </div>
                <aside class="hero-card heroo">
                    <p class="quote">“Once you have it dialed in for various target setpoints and PID control, there is
                        little to no
                        intervention required.”</p>
                    <div class="quote-source-row">
                        <div class="quote-source">
                            Torxen, a producer with operations in Southern Alberta, Canada
                        </div>
                        <style>
                            .quote-source-row {
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                gap: 18px;
                                margin-bottom: 22px;
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
                        </style>
                        <div class="quote-logo-box">
                            <img src="{{ asset('/img/Torxen logo.webp') }}" alt="Allied Energy II Corp. logo">
                        </div>
                    </div>
                    <div class="mini-metrics">
                        <div class="mini"><strong>12</strong><span>months operating period</span></div>
                        <div class="mini"><strong>C$46k+</strong><span>annual gas value</span></div>
                        <div class="mini"><strong>0</strong><span>cold-weather stoppages</span></div>
                        <div class="mini"><strong>-40°C</strong><span>Alberta winter exposure</span></div>
                    </div>
                </aside>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Performance snapshot</div>
                        <h2>Combustion avoided. Gas captured. Reliability maintained.</h2>
                    </div>
                    <p>During the 12-month operating period, VaporCommander™ captured approximately 500,000 m³ of natural
                        gas that
                        would otherwise have been burned through a vapor combustor unit. Based on the project assumptions,
                        captured
                        gas created more than C$46,000/year in economic benefit, with additional potential carbon-related
                        value
                        subject to current regulatory eligibility and project-specific review.</p>
                </div>
                <div class="metrics">
                    <article class="metric">
                        <div class="tag">Captured gas</div>
                        <div class="big">500k</div>
                        <h3>m³/year</h3>
                        <p class="muted">Approximate natural gas capture during the 12-month period instead of combusting
                            the gas.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Economic value</div>
                        <div class="big">C$46k+</div>
                        <h3>per year</h3>
                        <p class="muted">Estimated annual gas value based on the assumptions used in the project case study.
                        </p>
                    </article>
                    <article class="metric">
                        <div class="tag">Reliability</div>
                        <div class="big">0</div>
                        <h3>cold-weather issues</h3>
                        <p class="muted">No stoppages, failures, or maintenance issues related to cold weather during the
                            operating
                            period.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Flow range</div>
                        <div class="big">1,800</div>
                        <h3>m³/day gas</h3>
                        <p class="muted">Gas flow ranged from almost no flow to approximately 1,800 m³/day.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="blue-section">
            <div class="container blue-grid wrap py-12">
                <div>
                    <div class="kicker">Background and challenge</div>
                    <h2>Vapor combustors control venting, but they also burn value.</h2>
                    <p>The operator had a growing number of oil storage tanks producing natural gas from stored oil. To
                        comply with
                        gas venting limits, the gas could not simply be vented. Historically, vapor combustor units provided
                        a
                        relatively simple way to destroy the gas stream, but combustion converts usable natural gas into
                        emissions and
                        removes the opportunity to capture revenue from the produced gas.</p>
                    <p>The operator needed more than a combustion device. The application required a system that could
                        handle widely
                        varying gas flow, high discharge pressure, sudden stops in gas flow, and both cold and hot weather
                        conditions.
                        The system also needed to capture gas for additional revenue instead of converting the stream into
                        CO₂ through
                        combustion.</p>
                    <p>Although conventional VRUs were considered, standard systems did not fully address the operating
                        envelope.
                        Conventional VRUs can be expensive, may require additional conditioning equipment, and can be
                        limited where
                        discharge pressures exceed typical compressor-suction assumptions.</p>
                </div>
                <div class="timeline">
                    <div class="step"><strong class="number">01</strong>
                        <div>
                            <h3>Venting limits</h3>
                            <p>Tank vapors had to be controlled to meet regulatory gas venting requirements.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">02</strong>
                        <div>
                            <h3>Combustion tradeoff</h3>
                            <p>VCUs can reduce venting, but they burn natural gas and create greenhouse gas emissions.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">03</strong>
                        <div>
                            <h3>Variable gas flow</h3>
                            <p>The gas stream ranged from almost no flow to approximately 1,800 m³/day.</p>
                        </div>
                    </div>
                    <div class="step"><strong class="number">04</strong>
                        <div>
                            <h3>Winter reliability</h3>
                            <p>The solution had to operate in Southern Alberta, Canada winters that can drop below -40°C.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-12">
                <div class="section-head wrap ">
                    <div>
                        <div class="kicker">Why VCUs are limited</div>
                        <h2>Combustors solve disposal, not recovery.</h2>
                    </div>
                    <p>Vapor combustor units can be cost-effective and simple, but their basic function is destruction
                        rather than
                        recovery. They do not actively draw down tank pressure, they do not create a gas revenue stream, and
                        they do
                        not eliminate the emissions profile associated with burning natural gas.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <div class="number">01</div>
                        <h3>Gas value is lost.</h3>
                        <p class="muted">A VCU burns gas that could otherwise be captured and monetized. In this case,
                            replacing
                            combustion with recovery created more than C$46,000/year in estimated gas value.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">02</div>
                        <h3>Emissions continue.</h3>
                        <p class="muted">Combustion reduces venting but releases CO₂. The project analysis estimated 1,196
                            tonnes
                            CO₂e/year of avoided emissions by capturing gas instead of burning it.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">03</div>
                        <h3>Passive operation limits control.</h3>
                        <p class="muted">The VCU was a passive system. VaporCommander™ actively draws down and maintains a
                            user-defined inlet pressure, giving operators more control over tank vapor management.</p>
                    </article>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container split wrap py-12">
                <div class="panel">
                    <div class="kicker">Fluidstream solution</div>
                    <h3>VaporCommander™ as a VCU replacement.</h3>
                    <p>Fluidstream’s patented VaporCommander™ was installed at an oil battery in Southern Alberta, Canada in
                        March
                        2020. It was selected because it could handle the producer’s variable operating parameters while
                        capturing gas
                        for reuse or sale instead of burning it through a combustor.</p>
                    <p>The unit’s multiphase capability allowed it to handle gas streams that may contain liquids without
                        relying on
                        a conventional dry-gas assumption. The system also offered autonomous operation, including manual,
                        remote, and
                        automatic restart based on user-defined time lag and motor-load ramp-up.</p>
                </div>
                <div class="panel">
                    <div class="kicker">What changed</div>
                    <h3>Gas capture replaced gas destruction.</h3>
                    <p>During the 12-month operating period, VaporCommander™ captured approximately 500,000 m³ of natural
                        gas. Based
                        on the pricing assumptions used in the project case study, that captured gas created an estimated
                        economic
                        benefit of more than C$46,000/year.</p>
                    <p>The case study also described potential carbon-tax savings if a carbon tax were applied to combustion
                        emissions. Carbon pricing, carbon-credit eligibility, and regulatory treatment should be reviewed
                        under
                        current rules for each project.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-head wrap py-12">
                    <div>
                        <div class="kicker">Autonomous operation</div>
                        <h2>Self-regulating pressure control across variable gas flow.</h2>
                    </div>
                    <p>The gas flow ranged from almost no flow to approximately 1,800 m³/day. VaporCommander™ used patented
                        software
                        controls and operating methodology to monitor sensors and operating parameters, adjust speed, and
                        maintain
                        target inlet pressure. The unit could slow to less than 0.01 strokes per minute, which eliminated
                        the need for
                        mechanical recirculatory devices in this application.</p>
                </div>
                <div class="cards">
                    <article class="card swipe">
                        <div class="number">01</div>
                        <h3>Wide flow turndown.</h3>
                        <p class="muted">The system managed gas flow from near-zero conditions to high vapor rates,
                            supporting stable
                            tank vapor control across changing production conditions.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">02</div>
                        <h3>Target inlet pressure.</h3>
                        <p class="muted">The unit adjusted speed to maintain the operator’s desired inlet and discharge
                            pressure
                            setpoints.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">03</div>
                        <h3>Low intervention.</h3>
                        <p class="muted">Manual, remote, and automatic restart logic helped maintain uptime even during
                            upset or
                            low-flow conditions.</p>
                    </article>
                </div>
                <div class="seo-copy" style="margin-top:34px;max-width:980px">
                    <p>According to the operator’s facilities engineer, the ability to adjust operating parameters and allow
                        the
                        unit to self-regulate was valuable because it reduced the need for ongoing intervention once the
                        desired
                        setpoints and controls were established. This is a key operational distinction from passive
                        combustion
                        equipment and many conventional vapor recovery configurations.</p>
                </div>
            </div>
        </section>

        <section class="blue-section">
            <div class="container wrap py-12">
                <div class="result-band">
                    <div>
                        <div class="kicker">Field results</div>
                        <h2>12 months with no failures or maintenance issues, except one minor external fix.</h2>
                        <p>During the 12-month operating period, VaporCommander™ operated without failures, maintenance
                            issues,
                            service issues, stoppages, or cold-weather-related problems, except for a minor fix related to
                            an
                            incorrectly sized hose and cylinder. The system also operated through winter conditions without
                            stoppages,
                            failures, or issues related to cold weather.</p>
                        <div class="bullets">
                            <div class="bullet">Approximately 500,000 m³ of natural gas captured over 12 months.</div>
                            <div class="bullet">More than C$46,000/year in estimated natural gas value based on 2021 project
                                assumptions.</div>
                            <div class="bullet">No stoppages, failures, or issues related to cold weather during the
                                operating period.
                            </div>
                            <div class="bullet">Potential carbon-tax or carbon-credit value should be reviewed under current
                                regulations
                                and project-specific eligibility.</div>
                        </div>
                    </div>
                    <div class="hero-card" style="box-shadow:none">
                        <p class="quote" style="color: #000000">“The ability to adjust various parameters and allow the unit
                            to self-regulate to
                            maintain our
                            desired inlet and discharge pressures is wonderful. Once you have it dialed in for various
                            target setpoints
                            and PID control, there is little to no intervention required.”</p>
                        <div class="quote-source">Torxen Facilities Engineer • Original field quote</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Winter reliability</div>
                        <h2>Cold-weather failure risk is often built into separator-based systems.</h2>
                    </div>
                    <p>Conventional compressors and VRU systems can experience winter problems when they depend on upstream
                        separators or scrubbers to remove liquids before compression. In cold Alberta conditions, water and
                        condensate
                        can freeze inside separators, scrubbers, drains, and level-control equipment.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <h3>Frozen liquids block drainage.</h3>
                        <p class="muted">When liquids freeze in separator drains or scrubber bottoms, the equipment may no
                            longer
                            remove liquids effectively, increasing liquid carryover risk.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Level control becomes unstable.</h3>
                        <p class="muted">Freezing can impair level instrumentation, control response, and dump operation,
                            creating
                            unstable upstream conditioning.</p>
                    </article>
                    <article class="card fill">
                        <h3>Carryover can damage compressors.</h3>
                        <p class="muted">If liquid reaches a conventional gas-only compressor, the result can include
                            hydraulic
                            loading, lubrication problems, shutdowns, or increased maintenance.</p>
                    </article>
                    <article class="card swipe">
                        <h3>More equipment needs winterization.</h3>
                        <p class="muted">Scrubbers, drain systems, piping, controls, and filters all become additional
                            cold-weather
                            maintenance points.</p>
                    </article>
                    <article class="card fill">
                        <h3>Fluidstream reduces separator dependency.</h3>
                        <p class="muted">VaporCommander™ is designed to handle wet gas within compression, reducing reliance
                            on
                            upstream separation as the primary reliability strategy.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Field result supports the logic.</h3>
                        <p class="muted">The operating period reported no stoppages, failures, or maintenance issues related
                            to cold
                            weather.</p>
                    </article>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Economic and emissions value</div>
                        <h2>Recovered gas can create value that combustion cannot.</h2>
                    </div>
                    <p>Replacing a vapor combustor with VaporCommander™ changed the economics of the vapor stream. Instead
                        of
                        burning gas with no payout, the operator captured gas that could generate value. The project
                        analysis
                        estimated approximately C$46,400/year of value from captured gas based on forward AECO 5A pricing of
                        C$2.50/GJ
                        and 947.82 ft³/GJ.</p>
                </div>
                <div class="comparison">
                    <div class="row">
                        <div class="left">Vapor combustor</div>
                        <div>Controls venting by burning the gas, but releases CO₂ and eliminates the revenue potential of
                            the
                            captured natural gas.</div>
                    </div>
                    <div class="row">
                        <div class="left">VaporCommander™</div>
                        <div>Captures gas instead of burning it, creating an estimated C$46,400/year in gas value under the
                            project
                            assumptions.</div>
                    </div>
                    <div class="row">
                        <div class="left">Carbon-tax context</div>
                        <div>The project analysis identified potential C$35,880/year carbon-tax savings if a C$30/tonne CO₂e
                            tax
                            applied. Current carbon-tax, credit, and offset treatment must be reviewed under today’s rules.
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">Operating advantage</div>
                        <div>Compared with combustion, VaporCommander™ provided active pressure control, autonomous
                            operation, and gas
                            recovery rather than gas destruction.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Patent-supported technology</div>
                        <h2>Patented multiphase vapor recovery.</h2>
                    </div>
                    <p>Fluidstream’s patent portfolio supports the operating logic behind VaporCommander™: handling wet,
                        variable
                        vapor streams directly rather than forcing the site into a conventional dry-gas compression model.
                        These
                        patents support Fluidstream’s technical position around wet-gas handling, variable-flow operation,
                        and
                        liquid-aware compression response.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <h3>US11098709B2.</h3>
                        <p class="muted">A primary anchor for liquid-aware compression response and chamber behavior when
                            liquids
                            influence the compression process.</p>
                    </article>
                    <article class="card swipe">
                        <h3>US10221664B2.</h3>
                        <p class="muted">Supports Fluidstream’s broader compression architecture and oil and gas compression
                            relevance.</p>
                    </article>
                    <article class="card fill">
                        <h3>CA2843321C and CA2883283C.</h3>
                        <p class="muted">Canadian patent coverage supporting Fluidstream’s foundational technology and
                            operating
                            methodology.</p>
                    </article>
                </div>
                <div class="seo-copy" style="margin-top:34px;max-width:980px">
                    <p>For operators evaluating alternatives to vapor combustors, conventional VRUs, or scrubber-dependent
                        vapor
                        recovery systems, VaporCommander™ directly addresses the operating window where wet gas, variable
                        gas flow,
                        winter reliability, and low-maintenance operation matter most.</p>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container wrap py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker">Technical fit summary</div>
                        <h2>Why VaporCommander™ replaced the combustor.</h2>
                    </div>
                    <p>The case demonstrates that vapor recovery can do more than eliminate venting. When the system can
                        handle real
                        oilfield conditions, vapor recovery can capture gas value, support emissions objectives, reduce
                        dependence on
                        combustion, and provide active pressure control.</p>
                </div>
                <div class="comparison">
                    <div class="row">
                        <div class="left">VCU limitation</div>
                        <div>Burns gas instead of recovering it, creates CO₂ emissions, and does not generate gas revenue.
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">Conventional VRU limitation</div>
                        <div>Can be costly, may require separation-first infrastructure, and may struggle with high
                            discharge
                            pressure, variable gas flow, and winter wet-gas operation.</div>
                    </div>
                    <div class="row">
                        <div class="left">Fluidstream fit</div>
                        <div>VaporCommander™ handled variable gas flow, operated without cold-weather issues during the
                            12-month
                            operating period, and captured gas for economic value.</div>
                    </div>
                    <div class="row">
                        <div class="left">Result</div>
                        <div>Approximately 500,000 m³ of gas captured, more than C$46,000/year in estimated gas value, and
                            reduced GHG
                            emissions relative to combustion.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container wrap py-12">
                <div>
                    <div class="kicker">Next step</div>
                    <h2>Evaluate VaporCommander™ as a vapor combustor replacement.</h2>
                    <p>Fluidstream can review tank vapor rate, discharge pressure, variable gas flow, wet gas composition,
                        condensate and water exposure, winter operating requirements, power availability, emissions
                        obligations, gas
                        value, and site economics to determine whether VaporCommander™ is a fit.</p>
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