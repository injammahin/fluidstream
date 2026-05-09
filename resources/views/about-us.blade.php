@extends('layouts.app')

@section('content')
    <style>
        :root {
            --blue: #0018dc;
            --cyan: #15d1ff;
            --ink: #07111f;
            --muted: #52667a;
            --line: #d9e6ff;
            --soft: #f5f7fb;
            --white: #ffffff;
            --shadow: 0 18px 44px rgba(13, 32, 84, .06);
            --shadow-hover: 0 24px 54px rgba(0, 24, 220, .12);
            --max: 1200px;
        }

        .fs-about-page,
        .fs-about-page * {
            box-sizing: border-box;
        }

        .fs-about-page {
            color: var(--ink);
            background: #ffffff;
            overflow: hidden;
        }

        .fs-about-wrap {
            width: min(var(--max), calc(100% - 40px));
            margin: 0 auto;
        }

        .gray {
            background: #f4f6f8 !important;
        }

        .fs-about-kicker {
            display: block;
            margin: 0 0 10px;
            color: var(--blue);
            font-size: 13px;
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .fs-about-page h2 {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 24ch;
            color: var(--text);
        }

        .fs-about-page .lead {
            padding: 4px;
            text-align: justify;
            max-width: 59ch;
            margin: 6px 0 0;
            /* color: var(--muted); */
            /* font-size: 1.20rem; */
            line-height: 1.65;
            /* font-weight: 500; */
            opacity: 1;
        }

        .fs-about-section-head {
            width: min(50%, 660px);
            margin-bottom: 34px;
        }

        .fs-about-section-head .lead {
            max-width: 100%;
        }

        .fs-about-btn-row {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 30px;
        }

        .fs-about-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 0 23px;
            border-radius: 999px;
            font-size: 15px;
            line-height: 1;
            font-weight: 900;
            text-decoration: none;
            transition:
                transform .22s ease,
                box-shadow .22s ease,
                background .22s ease,
                color .22s ease,
                border-color .22s ease;
        }

        .fs-about-btn-primary {
            color: var(--blue);
            background: #ffffff;
            border: 1px solid #ffffff;
            box-shadow: 0 18px 38px rgba(0, 0, 0, .20);
        }

        .fs-about-btn-primary:hover {
            color: #ffffff;
            background: var(--blue);
            border-color: var(--blue);
            transform: translateY(-2px);
        }

        .fs-about-btn-secondary {
            color: #282828;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(42, 42, 42, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .fs-about-btn-secondary-1 {
            color: #ffffff;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(217, 217, 217, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .fs-about-btn-secondary-1 {
            color: #f6f6f6;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(188, 188, 188, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .fs-about-btn-secondary:hover {
            color: #282828;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(42, 42, 42, 0.3);
            transform: translateY(-2px);
        }

        .fs-about-btn-blue {
            color: #ffffff;
            background: var(--blue);
            border: 1px solid var(--blue);
            box-shadow: 0 16px 32px rgba(0, 24, 220, .18);
        }

        .fs-about-btn-blue:hover {
            color: #ffffff;
            background: #00108f;
            border-color: #00108f;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(0, 24, 220, .24);
        }

        .fs-about-btn-outline {
            color: var(--blue);
            background: #ffffff;
            border: 1px solid rgba(0, 24, 220, .24);
        }

        .fs-about-btn-outline:hover {
            color: var(--blue);
            border-color: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 16px 34px rgba(16, 42, 67, .10);
        }

        /* ================================
                                                                                                                                       COMMON CARD HOVER STYLE
                                                                                                                                    ================================ */

        .fs-about-hover-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            border: 1px solid var(--line);
            background: #ffffff;
            border-radius: 7px;
            box-shadow: var(--shadow);
            transition:
                transform .28s ease,
                border-color .28s ease,
                box-shadow .28s ease,
                background .28s ease;
        }

        .fs-about-hover-card::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 4px;
            background: var(--blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .28s ease;
            z-index: 2;
        }

        .fs-about-hover-card:hover {
            transform: translateY(-4px);
            border-color: var(--blue);
            background: #ffffff;
            box-shadow: var(--shadow-hover);
        }

        .fs-about-hover-card:hover::after {
            transform: scaleX(1);
        }

        .fs-about-hover-card>* {
            position: relative;
            z-index: 1;
        }

        .fs-about-card {
            padding: 28px;
        }

        .fs-about-card h3,
        .fs-about-solution-card h3,
        .fs-about-quote h3 {
            margin: 0 0 14px;
            color: #232325;
            font-size: 25px;
            line-height: 1.12;
            letter-spacing: -.035em;
            font-weight: 600;
        }

        .fs-about-card p,
        .fs-about-solution-card p {
            margin: 0;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.72;
        }

        .fs-about-card ul {
            margin: 20px 0 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 12px;
        }

        .fs-about-card li {
            position: relative;
            padding-left: 24px;
            color: #334155;
            font-size: 15.5px;
            line-height: 1.58;
            font-weight: 600;
        }

        .fs-about-card li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 9px;
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--blue);
            box-shadow: 0 0 0 5px rgba(0, 24, 220, .08);
        }

        /* ================================
                                                                                                                                       HERO
                                                                                                                                    ================================ */

        .fs-about-hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 680px;
            display: flex;
            align-items: center;
            color: #ffffff;
            background: #07111f;
        }

        .fs-about-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -3;
            background:
                linear-gradient(90deg,
                    rgba(0, 8, 30, .92) 0%,
                    rgba(0, 12, 48, .78) 43%,
                    rgba(0, 16, 60, .38) 76%,
                    rgba(0, 16, 60, .14) 100%),
                radial-gradient(circle at 82% 16%, rgba(21, 209, 255, .20), transparent 28%),
                linear-gradient(135deg, #061226 0%, #0018dc 100%);
        }

        .fs-about-hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 160px;
            z-index: -2;
            pointer-events: none;
            background: linear-gradient(180deg, transparent 0%, rgba(6, 18, 38, .78) 100%);
        }

        .fs-about-hero-grid {
            width: min(var(--max), calc(100% - 40px));
            margin: 0 auto;
            padding: 108px 0 86px;
            display: grid;
            grid-template-columns: minmax(0, 760px) minmax(300px, 390px);
            gap: 54px;
            align-items: end;
            position: relative;
            z-index: 1;
        }

        .fs-about-hero-kicker {
            margin: 0 0 16px;
            color: var(--cyan);
            font-size: 13px;
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: .13em;
            text-transform: uppercase;
        }

        .fs-about-hero-title {
            margin: 0;
            max-width: 840px;
            color: #ffffff;
            font-size: clamp(46px, 5.4vw, 82px);
            line-height: .94;
            letter-spacing: -.075em;
            font-weight: 850;
        }

        .fs-about-hero-lead {
            margin: 24px 0 0;
            max-width: 760px;
            color: rgba(255, 255, 255, .84);
            font-size: clamp(18px, 1.65vw, 23px);
            line-height: 1.48;
            font-weight: 450;
        }

        .fs-about-hero-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            padding: 26px;
            border-radius: 7px;
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .18);
            box-shadow: 0 26px 70px rgba(0, 0, 0, .24);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            transition:
                transform .28s ease,
                border-color .28s ease,
                box-shadow .28s ease,
                background .28s ease;
        }


        .fs-about-hero-card:hover {
            transform: translateY(-4px);
            border-color: rgba(21, 209, 255, .42);
            background: rgba(255, 255, 255, .13);
            box-shadow: 0 30px 78px rgba(0, 0, 0, .30);
        }

        .fs-about-hero-card:hover::after {
            transform: scaleX(1);
        }

        .fs-about-hero-card h3 {
            margin: 0 0 18px;
            color: #ffffff;
            font-size: 25px;
            line-height: 1.08;
            letter-spacing: -.035em;
            font-weight: 850;
        }

        .fs-about-proof-grid {
            display: grid;
            gap: 12px;
        }

        .fs-about-proof-item {
            padding: 15px;
            border-radius: 7px;
            border: 1px solid rgba(255, 255, 255, .14);
            background: rgba(255, 255, 255, .10);
        }

        .fs-about-proof-item strong {
            display: block;
            margin-bottom: 5px;
            color: #ffffff;
            font-size: 18px;
            line-height: 1.15;
            letter-spacing: -.02em;
            font-weight: 900;
        }

        .fs-about-proof-item span {
            display: block;
            color: rgba(255, 255, 255, .76);
            font-size: 13px;
            line-height: 1.45;
            font-weight: 650;
        }

        /* ================================
                                                                                                                                       LAYOUTS
                                                                                                                                    ================================ */

        .fs-about-two-col {
            display: grid;
            grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
            gap: 34px;
            align-items: start;
        }

        .fs-about-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            align-items: stretch;
        }

        .fs-about-solution-card {
            min-height: 270px;
            display: flex;
            flex-direction: column;
            padding: 26px;
            text-decoration: none;
        }

        .fs-about-tag {
            display: inline-flex;
            align-items: center;
            align-self: flex-start;
            min-height: 34px;
            padding: 0 13px;
            margin-bottom: 20px;
            border-radius: 999px;
            border: 1px solid rgba(0, 24, 220, .14);
            background: #edf3ff;
            color: var(--blue);
            font-size: 12px;
            line-height: 1;
            font-weight: 900;
            letter-spacing: .09em;
            text-transform: uppercase;
        }

        .fs-about-card-link {
            margin-top: auto;
            padding-top: 22px;
            color: var(--blue);
            font-size: 15px;
            line-height: 1;
            font-weight: 900;
            text-decoration: none;
        }

        /* ================================
                                                                                                                                       TECHNOLOGY PLATFORM
                                                                                                                                    ================================ */

        .fs-about-platform {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            display: grid;
            grid-template-columns: minmax(0, .95fr) minmax(0, 1.05fr);
            gap: 34px;
            align-items: center;
            padding: 44px;
            border-radius: 7px;
            background: linear-gradient(135deg, #061126 0%, #0018dc 100%);
            color: #ffffff;
            box-shadow: 0 28px 80px rgba(0, 24, 220, .20);
        }

        /* .fs-about-platform::after {
                                                                                                        content: "";
                                                                                                        position: absolute;
                                                                                                        right: -120px;
                                                                                                        top: -150px;
                                                                                                        width: 320px;
                                                                                                        height: 320px;
                                                                                                        border-radius: 999px;
                                                                                                        background: rgba(21, 209, 255, .16);
                                                                                                        pointer-events: none;
                                                                                                    } */

        .fs-about-platform h2 {
            color: #ffffff;
        }

        .fs-about-platform .lead {
            color: rgba(255, 255, 255, .80);
        }

        .fs-about-platform-links {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 14px;
        }

        .fs-about-platform-link {
            position: relative;
            overflow: hidden;
            display: block;
            padding: 19px;
            border-radius: 7px;
            border: 1px solid rgba(255, 255, 255, .16);
            background: rgba(255, 255, 255, .08);
            text-decoration: none;
            transition:
                transform .25s ease,
                border-color .25s ease,
                background .25s ease;
        }

        /* 
                                                                                                        .fs-about-platform-link::after {
                                                                                                            content: "";
                                                                                                            position: absolute;
                                                                                                            left: 0;
                                                                                                            right: 0;
                                                                                                            top: 0;
                                                                                                            height: 4px;
                                                                                                            background: var(--cyan);
                                                                                                            transform: scaleX(0);
                                                                                                            transform-origin: left;
                                                                                                            transition: transform .25s ease;
                                                                                                        } */

        .fs-about-platform-link:hover {
            transform: translateY(-3px);
            border-color: rgba(21, 209, 255, .46);
            background: rgba(255, 255, 255, .13);
        }

        .fs-about-platform-link:hover::after {
            transform: scaleX(1);
        }

        .fs-about-platform-link strong {
            display: block;
            margin-bottom: 5px;
            color: #ffffff;
            font-size: 17px;
            line-height: 1.25;
            font-weight: 900;
        }

        .fs-about-platform-link span {
            display: block;
            color: rgba(255, 255, 255, .75);
            font-size: 14px;
            line-height: 1.5;
            font-weight: 600;
        }

        /* ================================
                                                                                                                                       PROOF STRIP
                                                                                                                                    ================================ */

        .fs-about-proof-strip {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            align-items: stretch;
        }

        .fs-about-quote {
            min-height: 230px;
            padding: 26px;
        }

        .fs-about-quote p {
            margin: 0 0 18px;
            color: #1b263a;
            font-size: 18px;
            line-height: 1.48;
            letter-spacing: -.02em;
            font-weight: 500;
        }

        .fs-about-quote small {
            display: block;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.4;
            font-weight: 900;
        }

        /* ================================
                                                                                                                                       CTA
                                                                                                                                    ================================ */

        .fs-about-cta {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) auto;
            gap: 26px;
            align-items: center;
            padding: 0px 0px;
            border-radius: 7px;
            background: white;
            color: #ffffff;
        }

        /* .fs-about-cta::after {
                                                                                                    content: "";
                                                                                                    position: absolute;
                                                                                                    right: -90px;
                                                                                                    top: -110px;
                                                                                                    width: 260px;
                                                                                                    height: 260px;
                                                                                                    border-radius: 999px;
                                                                                                    background: rgba(21, 209, 255, .16);
                                                                                                    pointer-events: none;
                                                                                                } */

        .fs-about-cta h2 {
            max-width: 600px !important;
            color: #0f0f0f;
        }

        .fs-about-cta .lead {
            max-width: 500px !important;
            color: rgba(12, 12, 12, 0.78);
            max-width: 760px;
        }

        .fs-about-cta .fs-about-btn-row {
            position: relative;
            z-index: 1;
            justify-content: flex-end;
            margin-top: 0;
        }

        @media (max-width: 1080px) {
            .fs-about-section-head {
                width: 100%;
            }

            .fs-about-hero-grid,
            .fs-about-two-col,
            .fs-about-platform,
            .fs-about-cta {
                grid-template-columns: 1fr;
            }

            .fs-about-hero {
                min-height: auto;
            }

            .fs-about-hero-grid {
                padding: 86px 0 68px;
            }

            .fs-about-hero-card {
                max-width: 650px;
            }

            .fs-about-grid-3,
            .fs-about-proof-strip {
                grid-template-columns: 1fr;
            }

            .fs-about-cta .fs-about-btn-row {
                justify-content: flex-start;
                margin-top: 22px;
            }
        }

        @media (max-width: 700px) {

            .fs-about-wrap,
            .fs-about-hero-grid {
                width: min(100%, calc(100% - 28px));
            }

            .fs-about-section {
                padding: 58px 0;
            }

            .fs-about-hero-grid {
                padding: 70px 0 56px;
            }

            .fs-about-hero-title {
                font-size: 42px;
                line-height: .98;
            }

            .fs-about-hero-lead,
            .fs-about-page .lead {
                font-size: 16px;
            }

            .fs-about-page h2 {
                font-size: 38px;
            }

            .fs-about-platform,
            .fs-about-cta {
                padding: 28px 22px;
            }

            .fs-about-btn-row,
            .fs-about-cta .fs-about-btn-row {
                flex-direction: column;
            }

            .fs-about-btn {
                width: 100%;
            }
        }
    </style>

    <main class="fs-about-page">

        {{-- HERO --}}
        <section class="fs-about-hero">
            <div class="fs-about-hero-grid">
                <div>

                    <h1 class="fs-about-hero-title">
                        Engineering compression systems for real-world oilfield conditions.
                    </h1>

                    <p class="fs-about-hero-lead">
                        Fluidstream helps upstream producers reduce methane emissions, improve production performance,
                        and recover valuable gas with patented multiphase compression systems built for wet gas, liquids,
                        unstable flow, remote sites, and harsh field environments.
                    </p>

                    <div class="fs-about-btn-row">
                        <a class="fs-about-btn fs-about-btn-primary" href="{{ url('/case-studies') }}">
                            Explore Field Results
                        </a>

                        <a class="fs-about-btn fs-about-btn-secondary-1" href="{{ url('/technical-review') }}">
                            Request Technical Review
                        </a>
                    </div>
                </div>

                <aside class="fs-about-hero-card">
                    <h3>Built around operating outcomes</h3>

                    <div class="fs-about-proof-grid">
                        <div class="fs-about-proof-item">
                            <strong>Vapor recovery</strong>
                            <span>Capture tank vapors and reduce routine venting.</span>
                        </div>

                        <div class="fs-about-proof-item">
                            <strong>Casing gas compression</strong>
                            <span>Reduce backpressure and support oil production.</span>
                        </div>

                        <div class="fs-about-proof-item">
                            <strong>Multiphase production</strong>
                            <span>Handle gas and liquids together without separator dependency.</span>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        {{-- WHY FLUIDSTREAM EXISTS --}}
        <section class="fs-about-section py-12">
            <div class="fs-about-wrap fs-about-two-col">
                <div>
                    <p class="fs-about-kicker">Why Fluidstream Exists</p>

                    <h2>
                        Conventional gas-only compression is often limited by the conditions producers actually face.
                    </h2>

                    <p class="lead">
                        Many emissions reduction and production optimization projects are constrained by wet gas,
                        liquid slugs, unstable inlet flow, freezing separation equipment, remote unattended sites,
                        and tight field economics.
                    </p>
                </div>

                <article class="fs-about-card fs-about-hover-card">
                    <h3>A different approach to compression</h3>

                    <p>
                        Fluidstream is focused on compression systems that tolerate real process-fluid behavior instead
                        of relying on ideal gas-only assumptions. By handling gas, liquids, and mixed-phase flow within
                        the compression process, Fluidstream reduces separator dependency and helps make more field
                        projects technically and economically practical.
                    </p>

                    <ul>
                        <li>Designed for liquid-influenced and unstable operating conditions.</li>
                        <li>Built for remote sites where reliability and autonomous operation matter.</li>
                        <li>Applied across emissions reduction and production improvement projects.</li>
                    </ul>
                </article>
            </div>
        </section>

        {{-- PRODUCER OUTCOMES --}}
        <section class="fs-about-section fs-about-section-soft py-12 gray">
            <div class="fs-about-wrap">
                <div class="fs-about-section-head">
                    <p class="fs-about-kicker">Producer Outcomes</p>

                    <h2>
                        Field solutions where environmental performance and production economics work together.
                    </h2>

                    <p class="lead">
                        Fluidstream technology is applied where operators need more than conventional compression:
                        lower emissions, lower backpressure, improved uptime, and practical operation in wet or
                        variable conditions.
                    </p>
                </div>

                <div class="fs-about-grid-3">
                    <a class="fs-about-solution-card fs-about-hover-card" href="{{ url('/vapor-recovery') }}">
                        <span class="fs-about-tag">Vapor Recovery</span>
                        <h3>Capture valuable gas instead of venting it.</h3>
                        <p>
                            VaporCommander™ supports tank vapor recovery and emissions reduction where wet gas and
                            cold-weather reliability can limit conventional VRUs.
                        </p>
                        <span class="fs-about-card-link">View VaporCommander™ →</span>
                    </a>

                    <a class="fs-about-solution-card fs-about-hover-card" href="{{ url('/casing-gas-compression') }}">
                        <span class="fs-about-tag">Casing Gas</span>
                        <h3>Reduce casing pressure and support production.</h3>
                        <p>
                            CompressionCommander™ is designed to recover low-pressure casing gas and help reduce
                            backpressure on wells where compression economics matter.
                        </p>
                        <span class="fs-about-card-link">View CompressionCommander™ →</span>
                    </a>

                    <a class="fs-about-solution-card fs-about-hover-card" href="{{ url('/multiphase-compression') }}">
                        <span class="fs-about-tag">Multiphase</span>
                        <h3>Move gas and liquids together.</h3>
                        <p>
                            MultiphaseCommander™ supports production recovery and flow assurance in liquid-loaded,
                            mixed-phase, and unstable well or facility applications.
                        </p>
                        <span class="fs-about-card-link">View MultiphaseCommander™ →</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- TECHNOLOGY PLATFORM --}}
        <section class="fs-about-section py-12">
            <div class="fs-about-wrap">
                <div class="fs-about-platform">
                    <div style="position: relative; z-index: 1;">
                        <p class="fs-about-kicker" style="color: #15d1ff;">Technology Platform</p>

                        <h2>
                            One multiphase compression platform. Multiple upstream applications.
                        </h2>

                        <p class="lead">
                            Fluidstream’s product family is built around a patented compression approach that handles
                            the full process stream rather than depending on perfect upstream separation. That platform
                            logic gives operators a practical path across vapor recovery, casing gas compression,
                            and multiphase production applications.
                        </p>

                        <div class="fs-about-btn-row">
                            <a class="fs-about-btn fs-about-btn-primary" href="{{ url('/technology') }}">
                                View Technology
                            </a>

                            <a class="fs-about-btn fs-about-btn-secondary-1 text-white"
                                href="{{ url('/patented-technology') }}">
                                Review Patents
                            </a>
                        </div>
                    </div>

                    <div class="fs-about-platform-links">
                        <a class="fs-about-platform-link" href="{{ url('/patented-technology#us11098709b2') }}">
                            <strong>Liquid-aware compression response</strong>
                            <span>Supported by patented operating methods, including US11098709B2.</span>
                        </a>

                        <a class="fs-about-platform-link" href="{{ url('/technology') }}">
                            <strong>Autonomous field operation</strong>
                            <span>Designed to respond to changing inlet conditions, upset events, and variable production
                                behavior.</span>
                        </a>

                        <a class="fs-about-platform-link" href="{{ url('/case-studies') }}">
                            <strong>Documented field applications</strong>
                            <span>Case studies show practical outcomes in vapor recovery and production-focused
                                deployments.</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ENGINEERING PHILOSOPHY --}}
        <section class="fs-about-section fs-about-section-soft py-12 gray">
            <div class="fs-about-wrap">
                <div class="fs-about-section-head">
                    <p class="fs-about-kicker">Engineering Philosophy</p>

                    <h2>
                        Designed around the field, not the catalogue.
                    </h2>

                    <p class="lead">
                        Fluidstream is built on the belief that equipment should be selected around actual inlet behavior,
                        site constraints, operating risk, and project economics.
                    </p>
                </div>

                <div class="fs-about-two-col">
                    <article class="fs-about-card fs-about-hover-card">
                        <h3>Reliability has economic value</h3>
                        <p>
                            Repeated shutdowns, winter failures, operator visits, and maintenance-heavy operation can
                            erase the value of otherwise attractive emissions or production projects. Fluidstream
                            focuses on low-maintenance operation where uptime matters.
                        </p>
                    </article>

                    <article class="fs-about-card fs-about-hover-card">
                        <h3>Compression should fit the site</h3>
                        <p>
                            Remote locations, wet gas, liquids, solids, variable flow, and limited infrastructure are
                            normal field realities. Fluidstream systems are configured around the application instead
                            of forcing the application to fit a gas-only compressor.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        {{-- FIELD-PROVEN PERFORMANCE --}}
        <section class="fs-about-section py-12">
            <div class="fs-about-wrap">
                <div class="fs-about-section-head">
                    <p class="fs-about-kicker">Field-Proven Performance</p>

                    <h2>
                        Proof that matters to operators, engineers, and project decision-makers.
                    </h2>

                    <p class="lead">
                        Fluidstream’s value is measured in practical field outcomes: recovered gas, reduced venting,
                        production improvement, uptime, and reduced maintenance burden.
                    </p>
                </div>

                <div class="fs-about-proof-strip">
                    <article class="fs-about-quote fs-about-hover-card">
                        <p>
                            100% uptime and no maintenance since installation in documented vapor recovery service.
                        </p>
                        <small>VaporCommander™ field application</small>
                    </article>

                    <article class="fs-about-quote fs-about-hover-card">
                        <p>
                            Production recovery from wells constrained by liquid loading, backpressure, and remote
                            operating conditions.
                        </p>
                        <small>MultiphaseCommander™ field application</small>
                    </article>

                    <article class="fs-about-quote fs-about-hover-card">
                        <p>
                            Designed for severe cold, wet gas, unstable flow, and remote unmanned operating environments.
                        </p>
                        <small>Fluidstream technology platform</small>
                    </article>
                </div>
            </div>
        </section>

        {{-- STRATEGIC RELEVANCE --}}
        <section class="fs-about-section fs-about-section-soft py-12 gray">
            <div class="fs-about-wrap fs-about-two-col">
                <div>
                    <p class="fs-about-kicker">Strategic Relevance</p>

                    <h2>
                        A focused technology platform for established oil and gas problems.
                    </h2>

                    <p class="lead">
                        Fluidstream serves common upstream markets where conventional solutions can struggle under real
                        conditions: vapor recovery, casing gas compression, and multiphase production optimization.
                    </p>
                </div>

                <article class="fs-about-card fs-about-hover-card">
                    <h3>Built for market pull, not technology for its own sake</h3>

                    <p>
                        Operators need practical ways to reduce methane emissions, recover gas, improve production,
                        lower maintenance burden, and avoid unnecessary infrastructure. Fluidstream’s platform is
                        designed to address those needs through compact, field-ready systems with application-specific
                        configurations.
                    </p>

                    <ul>
                        <li>Established markets with direct operational and economic drivers.</li>
                        <li>Patent-backed differentiation in liquid-influenced compression.</li>
                        <li>Scalable product family across emissions and production applications.</li>
                    </ul>
                </article>
            </div>
        </section>

        {{-- CTA --}}
        <section class="fs-about-section py-12">
            <div class="fs-about-wrap">
                <div class="fs-about-cta">
                    <div style="position: relative; z-index: 1;">
                        <h2>
                            Have a wet gas, casing gas, vapor recovery, or multiphase production challenge?
                        </h2>

                        <p class="lead">
                            Submit your application for technical review. Fluidstream will help determine whether the
                            operating conditions, economics, and field objectives are a fit for its compression platform.
                        </p>
                    </div>

                    <div class="fs-about-btn-row">
                        <a class="fs-about-btn fs-about-btn-primary" href="{{ url('/technical-review') }}">
                            Request Technical Review
                        </a>

                        <a class="fs-about-btn fs-about-btn-secondary" href="{{ url('/case-studies') }}">
                            Explore Case Studies
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection