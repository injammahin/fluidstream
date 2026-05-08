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
            background: #1029ea;
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

        h1 {
            font-size: clamp(30px, 5vw, 50px);
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
            font-weight: 500;
            max-width: 920px;
        }

        .container {
            max-width: 1200px;
        }

        .hero h2 {
            font-size: clamp(21px, 2.6vw, 22px);
            line-height: 1.12;
            letter-spacing: -.04em;
            margin: 0 0 20px;
            color: #fff;
            font-weight: 500;
        }

        .hero .lead {
            font-size: 16px;
            color: rgba(255, 255, 255, .82);
            max-width: 760px;
            margin: 0 0 30px
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
            color: #0018dc;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 15px 22px;
            font-weight: 900;
            border: 1px solid #0000003b;
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
            font-size: 18px;
            line-height: 1.32;
            letter-spacing: -.035em;
            font-weight: 500;
            margin: 0 0 20px;
            color: #0d0c0c;
        }

        .quote-source {
            color: rgba(0, 0, 0, 0.7);
            font-size: 14px;
            font-weight: 600;
        }

        .mini-metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 22px
        }

        .mini {
            border-radius: 7px;
            background: #fff;
            padding: 16px;
            border: 1px solid rgb(0 0 0 / 16%);
        }

        .mini strong {
            display: block;
            font-size: 24px;
            letter-spacing: -.04em;
            color: #090909
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
            max-width: var(--max);
            margin: 0 auto
        }

        .section-head {
            /* display: grid;
                                                                                                                                                                                                grid-template-columns: .72fr 1.28fr;
                                                                                                                                                                                                gap: 42px; */
            align-items: start;
            margin-bottom: 34px
        }


        h2 {
            margin: 0 0 16px;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 26ch;
            color: #1f1f21;
        }

        .section-head p {
            margin-bottom: 20px;
            max-width: 68ch;
            font-size: 16px;
            line-height: 1.75;
            color: #424f5d;
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
            min-height: 175px;
            position: relative;
            overflow: hidden;
            transition: .24s ease
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
            border: 1px solid var(--line)
        }

        .panel.dark {
            background: #0018dc;
            color: #fff;
            border: 0;
            box-shadow: 0 28px 80px rgba(0, 24, 220, .22);
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
            min-height: 245px;
            transition: .24s ease;
            box-shadow: 0 16px 46px rgba(5, 18, 44, .06)
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
                                                                                                                    } */

        /* .card.swipe:hover:after {
                                                                                                                        left: 110%
                                                                                                                    } */

        /* .card:hover {
                                                                                                                        transform: translateY(-5px);
                                                                                                                        border-color: rgba(0, 24, 220, .3);
                                                                                                                        box-shadow: 0 26px 60px rgba(0, 24, 220, .12)
                                                                                                                    }

                                                                                                                    .card.fill:hover {
                                                                                                                        background: var(--blue);
                                                                                                                        color: #fff;
                                                                                                                        border-color: var(--blue)
                                                                                                                    } */
        /* 
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
            background: var(--blue);
            color: #fff;
            position: relative;
            overflow: hidden
        }

        .blue-section h2 {
            color: #fff
        }


        .blue-section p {
            color: rgba(255, 255, 255, .80)
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
            background: #fff;
            border: 1px solid rgba(255, 255, 255, .18);
            padding: 22px;
            border-radius: 7px;
        }

        .step strong {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: rgba(0, 24, 220, .08);
            color: var(--blue);
            font-weight: 950;
            margin-bottom: 18px;
        }

        .step h3 {
            color: #010101;
            margin: 0 0 8px;
            font-size: 21px;
            letter-spacing: -.03em;
        }

        .step p {
            margin: 0
        }

        .result-band {
            background: #061126;
            color: #fff;
            border-radius: 34px;
            padding: 42px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 30px;
            align-items: center;
            box-shadow: 0 24px 70px rgba(0, 0, 0, .18)
        }

        .result-band h2 {
            color: #fff
        }

        .result-band p {
            color: rgba(255, 255, 255, .78)
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
            color: rgba(255, 255, 255, .83)
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

        /* .seo-copy p {
                                                                    margin-bottom: 20px
                                                                } */

        .comparison {
            overflow: hidden;
            border-radius: 7px;
            border: 1px solid var(--line);
            background: #fff;
            /* box-shadow: var(--shadow) */
        }

        .btn.secondary-1 {
            border-color: #6e6e6e4a;
            color: #0018dcad;
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
            background: linear-gradient(135deg, #061126, #0018dc);
            color: #fff;
            border-radius: 36px;
            padding: 46px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 26px;
            align-items: center
        }

        .cta h2 {
            color: #fff
        }

        .cta p {
            color: rgba(255, 255, 255, .78)
        }

        .pp {
            color: #010101 !important;
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

            /* section {
                                                                                                                                                                                                                                                                                                            padding: 58px 18px
                                                                                                                                                                                                                                                                                                        } */

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
                font-size: 22px
            }
        }
    </style>

    <main>
        <section class="hero ">
            <div class="hero-inner py-12">
                <div>
                    <h1>From liquid-loaded wells to C$1.5M+ per year in recovered production.</h1>
                    <h2>Fluidstream restored two mature Alberta, Canada wells without adding separation infrastructure.</h2>
                    <p class="lead">An international oil and gas producer used a 200 HP gas-driven Fluidstream MC2270
                        MultiphaseCommander™ to reduce backpressure, manage real multiphase flow, and return two nearly dead
                        wells to
                        stable gas and condensate production.</p>
                    <div class="cta-row">
                        <a class="btn primary" href="/contact">Discuss a Similar Application</a>
                        <a class="btn secondary" href="/technology">View Technology Advantage</a>
                    </div>
                </div>
                <aside class="hero-card">
                    <p class="quote">“Fluidstream’s MultiphaseCommander didn’t just improve performance—it completely
                        transformed
                        two dead wells into revenue-generating assets. We went from zero production to over $1.5 million per
                        year in
                        incremental revenue, without adding any separation equipment or infrastructure. It handles
                        real-world
                        multiphase conditions—liquid slugs, highly variable flow, and extreme winter
                        environments—effortlessly. Most
                        importantly, it just runs: zero seal leakage, no maintenance, and no operational headaches to date.
                        This is
                        the first solution we’ve seen that delivers both simplicity and reliable performance.”</p>
                    <div class="quote-source">Production Engineer, international oil and gas producer • Alberta, Canada
                        application
                    </div>
                    <div class="mini-metrics">
                        <div class="mini"><strong>10e3</strong><span>m³/day gas restored</span></div>
                        <div class="mini"><strong>5</strong><span>m³/day condensate</span></div>
                        <div class="mini"><strong>95e3</strong><span>m³/day peak gas flow</span></div>
                        <div class="mini"><strong>0</strong><span>seal leakage reported</span></div>
                    </div>
                </aside>
            </div>
        </section>

        <section>
            <div class="container py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Performance snapshot</div>
                        <h2>Production recovery, reliability, and simpler field operation.</h2>
                    </div>
                    <p>This was a real field deployment, not a controlled test environment. It was a field deployment at an
                        unmanned
                        Alberta, Canada location with no electrical power, severe liquid loading, rising pipeline pressure,
                        plunger-lift cycling, winter operation, and highly variable gas-liquid flow. The average production
                        recovery
                        was important, but the more difficult engineering requirement was the transient operating envelope:
                        the system
                        had to handle peak instantaneous gas flow near 95e3 m³/day during plunger-lift events and then
                        continue
                        operating as flow tapered toward low-flow or no-flow conditions.</p>
                </div>
                <div class="metrics">
                    <article class="metric">
                        <div class="tag">Gas production</div>
                        <div class="big">~10e3</div>
                        <h3>m³/day restored</h3>
                        <p class="muted">Combined stabilized gas production across two wells after installation.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Variable flow</div>
                        <div class="big">~95e3</div>
                        <h3>m³/day peak gas flow</h3>
                        <p class="muted">Peak instantaneous gas flow during plunger-lift events, showing the technology can
                            handle
                            wide variable-flow operating conditions.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Revenue uplift</div>
                        <div class="big">C$1.5M+</div>
                        <h3>per year</h3>
                        <p class="muted">Estimated incremental annual revenue based on field economics and commodity pricing
                            assumptions available at the time of analysis.</p>
                    </article>
                    <article class="metric">
                        <div class="tag">Reliability</div>
                        <div class="big">0</div>
                        <h3>seal leakage</h3>
                        <p class="muted">No gland-seal leakage reported and no maintenance reported on the Fluidstream
                            compression
                            system to date.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="blue-section py-12">
            <div class="container blue-grid">
                <div>
                    <div class="kicker mb-2">Root cause engineering</div>
                    <h2>The wells did not run out of hydrocarbons. The flow system could no longer clear liquids.</h2>
                    <p>As reservoir pressure declined, gas velocity fell below the critical transport velocity required to
                        continuously lift water and condensate to surface. Liquids accumulated in the tubing, added
                        hydrostatic head,
                        increased flowing bottomhole pressure, and reduced effective drawdown against the reservoir. The
                        lower gas
                        rate then made liquid fallback worse, creating a self-reinforcing liquid-loading cycle. The wells
                        did not
                        become uneconomic because hydrocarbons disappeared; they became uneconomic because the flow system
                        could no
                        longer unload liquids against the available pressure differential.</p>
                    <p>Pipeline pressure could rise to about 1200 kPa while the operator wanted the wells exposed to
                        approximately
                        250 kPa to produce effectively. Plunger lift remained useful, but the wells had moved beyond the
                        operating
                        window where cyclic unloading could maintain sustained production. The operating profile created
                        repeated flow
                        transients: pressure buildup, high-rate unloading, liquid and gas surge, tapering flow, and then
                        fallback.
                        Fluidstream’s advantage was the ability to reduce surface pressure while tolerating that unstable
                        multiphase
                        duty.</p>
                </div>
                <div class="timeline">
                    <div class="step"><strong>01</strong>
                        <div>
                            <h3>Declining reservoir energy</h3>
                            <p class="pp">Lower reservoir pressure reduced gas velocity below the rate needed for continuous
                                water and
                                condensate
                                transport.</p>
                        </div>
                    </div>
                    <div class="step"><strong>02</strong>
                        <div>
                            <h3>Liquid fallback and loading</h3>
                            <p class="pp">Produced water and condensate accumulated in the tubing, increasing hydrostatic
                                head and
                                flowing
                                bottomhole pressure.</p>
                        </div>
                    </div>
                    <div class="step"><strong>03</strong>
                        <div>
                            <h3>Rising line pressure</h3>
                            <p class="pp">Pipeline pressure reduced available drawdown, narrowing the pressure window needed
                                for
                                sustained
                                unloading.</p>
                        </div>
                    </div>
                    <div class="step"><strong>04</strong>
                        <div>
                            <h3>Production collapse</h3>
                            <p class="pp">The wells needed continuous pressure reduction, transient-flow tolerance, and
                                multiphase
                                handling, not
                                another gas-only assumption.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Why conventional systems struggled</div>
                        <h2>Gas-only equipment pushes cost and complexity upstream.</h2>
                    </div>
                    <p>Traditional compression can reduce pressure, but it usually depends on a conditioned inlet stream. In
                        this
                        operating window, liquid slugs, water, condensate, variable gas rates, high instantaneous flow,
                        low-flow tail
                        conditions, and no-flow periods were normal operating conditions, not exceptions. That is why a
                        conventional
                        gas-only design basis would have pushed more equipment upstream before compression.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <div class="number">01</div>
                        <h3>Liquids create mechanical risk.</h3>
                        <p class="muted">Conventional reciprocating and screw compressors are vulnerable when liquids enter
                            the
                            machine. Free liquids are effectively incompressible; repeated slugging or hydraulic lock can
                            damage valves,
                            rods, bearings, lubrication systems, seals, and wear components. Even before catastrophic
                            failure, wet gas
                            can destabilize operation and increase maintenance exposure.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">02</div>
                        <h3>Separation adds facility burden.</h3>
                        <p class="muted">The typical workaround is to install scrubbers, separators, tanks, pumps, heaters,
                            controls,
                            drains, and trucking logistics before compression. That shifts the complexity upstream and can
                            turn a
                            targeted production optimization project into a larger facility build with more footprint,
                            maintenance,
                            permitting, and operating burden.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">03</div>
                        <h3>Interventions destroy uptime economics.</h3>
                        <p class="muted">If the system stopped long enough for the wells to load again, the operator
                            expected a
                            swabbing rig could be required at about C$15,000 per event. Reliability was therefore central to
                            project
                            viability.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="py-12" style="background:var(--soft)">
            <div class="container split">
                <div class="panel dark">
                    <div class="kicker mb-2" style="color: #f7faff">Fluidstream deployment</div>
                    <h3>MC2270 • 200 HP gas drive • Alberta, Canada</h3>
                    <p>The location had no electrical power, the wells were deeper than 2400 m, and the producer wanted to
                        avoid new
                        separation equipment. Fluidstream installed a gas-driven MultiphaseCommander™ package that used
                        produced gas
                        as fuel and operated directly on the mixed gas-liquid stream. The package was selected for practical
                        field
                        operation: compact surface installation, no separation-first infrastructure, and autonomous
                        operation in a
                        wet, variable-flow environment.</p>
                    <p>The wells required more than simple steady-state compression. Peak instantaneous gas flow could reach
                        roughly
                        95e3 m³/day during plunger-lift events and then taper toward very low flow. Fluidstream technology
                        can handle
                        variable flow rates because the system is designed around changing chamber conditions,
                        liquid-influenced
                        compression behavior, and autonomous response rather than a narrow steady-state gas-only operating
                        point. The
                        equipment had to tolerate peak flow, low-flow tail conditions, slugs, liquid variability, no-flow
                        periods, and
                        winter operation.</p>
                </div>
                <div class="panel">
                    <div class="kicker mb-2">Field outcome</div>
                    <h3>Lower backpressure without separation-first infrastructure.</h3>
                    <p>Fluidstream’s multiphase approach addressed the actual field bottleneck: reducing wellhead pressure
                        while
                        allowing gas, condensate, water, and transient slugs to move through the system together.</p>
                    <p>Instead of designing the site around the limitations of a conventional gas-only compressor, the
                        producer used
                        a purpose-built multiphase compression system that supported a simpler pad configuration and lower
                        intervention exposure.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container pt-12 pb-1">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Technology advantage</div>
                        <h2>Patented multiphase compression built for real field instability.</h2>
                    </div>
                    <p>Fluidstream technology is positioned around direct liquid handling, sealed containment,
                        piston-location
                        awareness, and autonomous upset response. In this case, those features mattered because the machine
                        was
                        exposed to liquid slugs, rapid flow-rate changes, pressure variation, and harsh winter conditions.
                        The result
                        is supported by a system architecture designed for wet, unstable, liquid-influenced field operation.
                    </p>
                </div>
                <div class="cards">
                    <article class="card swipe">
                        <div class="number">01</div>
                        <h3>Liquid handling inside compression.</h3>
                        <p class="muted">Fluidstream’s patented liquid-aware compression logic is designed to manage
                            incompressible
                            liquids and changing chamber conditions in the compression process rather than treating liquid
                            presence as a
                            failure condition that must always be removed upstream.</p>
                    </article>
                    <article class="card fill">
                        <div class="number">02</div>
                        <h3>Sealed gland protection and wear visibility.</h3>
                        <p class="muted">The gland-seal arrangement separates power fluid from the produced multiphase
                            stream and is
                            paired with electronic wear detection. This supports containment, reliability, maintenance
                            planning, and
                            reduced field burden where leakage or disposal issues would undermine operator confidence.</p>
                    </article>
                    <article class="card swipe">
                        <div class="number">03</div>
                        <h3>Autonomous upset-condition response.</h3>
                        <p class="muted">Piston-location awareness and autonomous controls help the system respond to slugs,
                            solids
                            buildup, ice risk, no-flow periods, temperature changes, changing gas-drive conditions, and
                            rapid swings in
                            production rate with less operator intervention.</p>
                    </article>
                </div>
                <div class="seo-copy section-head" style="margin-top:34px;max-width:980px">
                    <p class="mb-0">Fluidstream’s patent portfolio, including CA2843321C, CA2883283C, US10221664B2, and
                        US11098709B2,
                        supports
                        the engineering behind multiphase compression, liquid-influenced compression response, and
                        field-ready control
                        logic. US11098709B2 is especially relevant to liquid-aware compression response. In this
                        application, the
                        practical value was clear: the patented operating approach helped restore production without a
                        conventional
                        separation-first facility while tolerating the variable-rate behavior created by plunger-lift
                        cycling.</p>
                </div>
            </div>
        </section>

        {{-- <section class="blue-section py-12">
            <div class="container">
                <div class="result-band">
                    <div>
                        <div class="kicker mb-2">Field results</div>
                        <h2>Two wells returned to material production with no added separation equipment.</h2>
                        <p>One well recovered to approximately 7e3 m³/day of gas and 3 m³/day of condensate. The second
                            recovered to
                            approximately 3e3 m³/day of gas and 2 m³/day of condensate. Combined, the two wells returned to
                            roughly 10e3
                            m³/day of gas and 5 m³/day of condensate.</p>
                        <div class="bullets">
                            <div class="bullet">More than C$1.5 million per year of incremental revenue.</div>
                            <div class="bullet">No reported gland seal leakage to date.</div>
                            <div class="bullet">No maintenance reported on the Fluidstream compression system to date.</div>
                            <div class="bullet">Operated through variable flow, including peak instantaneous gas flow near
                                95e3 m³/day,
                                slugging, low-flow periods, and Alberta, Canada winter conditions.</div>
                        </div>
                    </div>
                    <div class="hero-card" style="box-shadow:none">
                        <p class="quote">“Fluidstream’s MultiphaseCommander didn’t just improve performance—it completely
                            transformed
                            two dead wells into revenue-generating assets. We went from zero production to over $1.5 million
                            per year in
                            incremental revenue, without adding any separation equipment or infrastructure. It handles
                            real-world
                            multiphase conditions—liquid slugs, highly variable flow, and extreme winter
                            environments—effortlessly. Most
                            importantly, it just runs: zero seal leakage, no maintenance, and no operational headaches to
                            date. This is
                            the first solution we’ve seen that delivers both simplicity and reliable performance.”</p>
                        <div class="quote-source">Production Engineer, international oil and gas producer</div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section>
            <div class="container py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Customer benefits</div>
                        <h2>A production solution, not just another compressor package.</h2>
                    </div>
                    <p>The value came from multiple field benefits working together: recovered production, avoided
                        infrastructure,
                        lower intervention exposure, gas-drive compatibility, autonomous operation, cold-weather
                        suitability, and
                        containment performance.</p>
                </div>
                <div class="cards">
                    <article class="card fill">
                        <h3>Reduced dependence on intervention.</h3>
                        <p class="muted">The wells moved away from a reactive mode where production recovery depended on
                            intermittent
                            unloading and toward a more stable continuous-production strategy.</p>
                    </article>
                    <article class="card swipe">
                        <h3>No separation-heavy buildout.</h3>
                        <p class="muted">The operator avoided adding the full suite of extra wellsite equipment normally
                            required to
                            protect conventional gas-only compression from wet, unstable flow.</p>
                    </article>
                    <article class="card fill">
                        <h3>Gas-drive deployment fit.</h3>
                        <p class="muted">Because there was no electrical power on site, the ability to run on fuel gas was a
                            deployment enabler, not just an option.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Variable plunger-lift flow tolerance.</h3>
                        <p class="muted">The package tolerated broad swings in gas and liquid rates, including peak
                            instantaneous gas
                            flow near 95e3 m³/day followed by low-flow and no-flow periods.</p>
                    </article>
                    <article class="card fill">
                        <h3>Winter field viability.</h3>
                        <p class="muted">The system operated through harsh Alberta, Canada winter conditions without
                            requiring
                            insulation or heat tracing on the compressor.</p>
                    </article>
                    <article class="card swipe">
                        <h3>Containment and HSE advantage.</h3>
                        <p class="muted">The fully contained gland arrangement avoided ongoing leakage and disposal burden,
                            improving
                            field cleanliness and operational confidence.</p>
                    </article>
                </div>
            </div>
        </section>

        <section style="background:var(--soft)">
            <div class="container py-12">
                <div class="section-head">
                    <div>
                        <div class="kicker mb-2">Technical fit summary</div>
                        <h2>Why MultiphaseCommander™ fit this operating window.</h2>
                    </div>
                    <p>Liquid-loaded wells, rising pipeline pressure, plunger-lift instability, and limited power
                        availability
                        create a difficult operating window. Fluidstream is best suited for applications where the produced
                        stream is
                        mixed, variable, and difficult to condition economically.</p>
                </div>
                <div class="comparison">
                    <div class="row">
                        <div class="left">Plunger lift</div>
                        <div>Useful in the right window, but intermittent and pressure-dependent. In this case, liquid
                            fallback and
                            line pressure prevented sustained production recovery.</div>
                    </div>
                    <div class="row">
                        <div class="left">Swabbing</div>
                        <div>Can unload wells, but it is reactive, costly, and incompatible with a low-touch operating model
                            when
                            repeated events are required.</div>
                    </div>
                    <div class="row">
                        <div class="left">Conventional compression</div>
                        <div>Can reduce pressure, but generally requires a dry, conditioned inlet stream and supporting
                            equipment that
                            adds cost, footprint, and maintenance exposure.</div>
                    </div>
                    <div class="row">
                        <div class="left">Fluidstream</div>
                        <div>Provides continuous, autonomous, multiphase-tolerant pressure reduction with no
                            separation-first
                            requirement, strong reliability, and scalable field economics.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container  py-12">
                <div>
                    <div class="kicker mb-2">Next step</div>
                    <h2>Evaluate whether MultiphaseCommander™ can restore value in your field.</h2>
                    <p>Fluidstream can review line pressure, wellhead conditions, stabilized and peak gas rates, liquid
                        rates,
                        plunger-lift behavior, slug frequency, expected low-flow/no-flow periods, power availability, H₂S
                        exposure,
                        sand risk, winterization requirements, and uptime requirements to determine whether
                        MultiphaseCommander™ fits
                        the application.</p>
                </div>
                <div class="cta-row" style="justify-content:flex-start;margin:0">
                    <a class="btn-1 primary" href="/contact">Request Technical Fit Analysis</a>
                    <a class="btn-1 sbtn.secondary-1" href="/multiphase-compression">Review MultiphaseCommander™</a>
                </div>
            </div>
        </section>
    </main>

@endsection