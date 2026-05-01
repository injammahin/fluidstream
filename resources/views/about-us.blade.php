@extends('layouts.app')

@section('title', 'About Fluidstream | GHG Reduction and Production Optimization Solutions')

@section('content')
    <style>
        :root {
            --fs-blue: #0018dc;
            --fs-blue-dark: #0012b9;
            --fs-light-blue: #15d1ff;
            --fs-ink: #07111f;
            --fs-muted: #5b6677;
            --fs-soft: #f5f7fb;
            --fs-soft-2: #eef3fb;
            --fs-line: #dce3ee;
            --fs-dark: #061226;
            --fs-dark-2: #0e1930;
            --fs-white: #ffffff;
        }



        a {
            color: inherit;
        }



        .fs-chevron {
            width: 7px;
            height: 7px;
            border-right: 2px solid currentColor;
            border-bottom: 2px solid currentColor;
            transform: rotate(45deg) translateY(-2px);
        }

        .fs-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .fs-search {
            width: 38px;
            height: 38px;
            position: relative;
            display: block;
        }

        .fs-search::before {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            border: 2px solid var(--fs-blue);
            border-radius: 50%;
            left: 8px;
            top: 7px;
        }

        .fs-search::after {
            content: "";
            position: absolute;
            width: 8px;
            height: 2px;
            background: var(--fs-blue);
            transform: rotate(45deg);
            right: 7px;
            bottom: 10px;
        }

        .fs-contact {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--fs-ink);
            font-size: .9rem;
            font-weight: 900;
        }

        .fs-contact::after {
            content: "→";
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--fs-blue);
            color: #fff;
            transition: transform .22s ease, background .22s ease;
        }

        .fs-contact:hover {
            color: var(--fs-blue);
        }

        .fs-contact:hover::after {
            transform: translateX(3px);
            background: var(--fs-blue-dark);
        }

        .fs-mobile-toggle {
            display: none;
            width: 44px;
            height: 44px;
            border: 1px solid rgba(220, 227, 238, .96);
            background: #fff;
            color: var(--fs-blue);
            cursor: pointer;
        }

        .fs-mobile-toggle span {
            width: 20px;
            height: 2px;
            display: block;
            margin: 5px auto;
            border-radius: 999px;
            background: currentColor;
        }

        .fs-hero {
            position: relative;
            overflow: hidden;
            background: #0018dc;
            color: #fff;
        }

        .fs-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .055) 1px, transparent 1px);
            background-size: 54px 54px;
            mask-image: linear-gradient(90deg, rgba(0, 0, 0, .75), transparent 86%);
            pointer-events: none;
        }

        .fs-hero::after {
            content: "";
            position: absolute;
            right: -160px;
            top: 50%;
            width: min(54vw, 660px);
            height: min(54vw, 660px);
            transform: translateY(-50%);
            border-radius: 999px;
            background:
                radial-gradient(circle, rgba(21, 209, 255, .22) 0 1px, transparent 2px),
                conic-gradient(from 210deg, rgba(21, 209, 255, .32), rgba(255, 255, 255, .05), rgba(0, 24, 220, .42), rgba(21, 209, 255, .32));
            background-size: 24px 24px, auto;
            opacity: .72;
            mask-image: radial-gradient(circle, rgba(0, 0, 0, .95), transparent 68%);
            pointer-events: none;
        }

        .fs-wrap {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }

        .fs-hero-grid {
            display: grid;
            grid-template-columns: minmax(0, .95fr) minmax(330px, .52fr);
            gap: clamp(32px, 5vw, 76px);
            align-items: center;
        }

        .fs-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: #ffff;
            font-size: .78rem;
            font-weight: 850;
            letter-spacing: .15em;
            text-transform: uppercase;
        }

        .fs-hero h1 {
            margin: 0;
            max-width: 820px;
            font-size: 54px;
            line-height: .92;
            letter-spacing: -.07em;
            font-weight: 880;
        }

        /* .fs-hero h1 span {
                                                                                                                                                                                                                                                                                            color: var(--fs-light-blue);
                                                                                                                                                                                                                                                                                        } */

        .fs-hero-copy {
            max-width: 720px;
            margin-top: 24px;
            color: rgba(255, 255, 255, 0.992);
            font-size: 19px;
            line-height: 1.62;
        }

        .fs-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 34px;
        }

        .fs-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 22px;
            text-decoration: none;
            font-size: .92rem;
            font-weight: 880;
            transition: transform .22s ease, box-shadow .22s ease, background .22s ease;
        }

        .fs-btn-primary {
            color: var(--fs-blue);
            background: #fff;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .22);
            border-radius: 35px;
        }

        .fs-btn-primary-1 {
            color: var(--fs-blue);
            background: #fff;
            border: 1px solid #000000;
            border-radius: 35px;
        }

        .fs-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 24px 54px rgba(0, 0, 0, .28);
        }

        .fs-btn-secondary {
            color: #fff;
            border: 1px solid rgba(255, 255, 255, .30);
            background: rgba(255, 255, 255, .07);
            backdrop-filter: blur(8px);
            border-radius: 35px;
        }

        .fs-btn-secondary-1 {
            color: rgb(2 6 23 / 0.7);
            border: 1px solid rgb(2 6 23 / 0.7);
            background: rgba(255, 255, 255, .07);
            backdrop-filter: blur(8px);
            border-radius: 35px;
        }

        .fs-btn-secondary:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, .12);
        }

        .fs-hero-card {
            position: relative;
            padding: 26px;
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .20);
            box-shadow: 0 28px 80px rgba(0, 0, 0, .24);
            backdrop-filter: blur(14px);
        }

        .fs-hero-card h2 {
            margin: 0;
            font-size: 1.25rem;
            line-height: 1.2;
            letter-spacing: -.025em;
        }

        .fs-hero-card p {
            margin: 12px 0 0;
            color: rgb(255, 255, 255);
            line-height: 1.55;
            font-size: .95rem;
        }

        .fs-meta-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-top: 22px;
        }

        .fs-meta-card {
            padding: 14px;
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .12);
        }

        .fs-meta-card strong {
            display: block;
            color: #fff;
            font-size: .98rem;
            margin-bottom: 4px;
        }

        .fs-meta-card span {
            color: rgb(255, 255, 255);
            font-size: .84rem;
            line-height: 1.4;
        }



        .fs-section.is-soft {
            background: #f4f6f8;
        }

        .fs-section.is-dark {
            background:
                radial-gradient(circle at 86% 12%, rgba(21, 209, 255, .18), transparent 30%),
                linear-gradient(135deg, var(--fs-dark), #091a44 70%, #0018dc 145%);
            color: #fff;
        }

        .fs-split {
            display: grid;
            grid-template-columns: minmax(0, .85fr) minmax(360px, .65fr);
            gap: clamp(34px, 5vw, 76px);
            align-items: start;
        }

        .fs-section-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            color: var(--fs-blue);
            font-size: .78rem;
            font-weight: 850;
            letter-spacing: .15em;
            text-transform: uppercase;
        }

        .fs-section.is-dark .fs-section-label {
            color: var(--fs-light-blue);
        }

        .fs-section-label::before {
            content: "";
            width: 34px;
            height: 2px;
            background: currentColor;
        }

        .fs-section h2 {
            margin: 0 0 16px;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 23ch;
            color: #1f1f21;
        }

        .fs-section h2 span {
            color: var(--fs-blue);
        }

        .fs-section.is-dark h2 span {
            color: var(--fs-light-blue);
        }

        .fs-section p {
            /* margin: 0 0 30px !important; */
            max-width: 59ch !important;
            font-size: 16px !important;
            color: var(--muted);
        }

        .fs-section.is-dark p {
            color: rgba(255, 255, 255, .74);
        }

        .fs-lead {
            margin-top: 22px;
            max-width: 780px;
            font-size: 1.08rem !important;
        }

        .fs-card-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .fs-card-grid.three {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .fs-card {
            padding: 26px;
            background: #fff;
            border: 1px solid rgba(220, 227, 238, .96);
            box-shadow: 0 18px 44px rgba(7, 17, 31, .06);
            min-height: 230px;
            transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease;
        }

        .fs-card:hover {
            transform: translateY(-4px);
            border-color: rgba(0, 24, 220, .28);
            box-shadow: 0 24px 56px rgba(7, 17, 31, .10);
        }

        .fs-card-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin-bottom: 18px;
            background: rgba(0, 24, 220, .08);
            color: var(--fs-blue);
            font-weight: 950;
        }

        .fs-card h3 {
            margin: 0 0 12px;
            font-size: 1.28rem;
            line-height: 1.14;
            letter-spacing: -.035em;
        }

        .fs-card p {
            margin: 0;
            font-size: .95rem;
            line-height: 1.58;
        }

        .fs-outcome-card {
            position: relative;
            overflow: hidden;
            /* min-height: 310px; */
            padding: 34px;
            background: #fff;
            border: 1px solid rgba(220, 227, 238, .96);
            box-shadow: 0 22px 60px rgba(7, 17, 31, .08);
        }

        .fs-tech::after,
        .fs-outcome-card::after {
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

        .fs-tech:hover::after,
        .fs-outcome-card:hover:after {
            transform: scaleX(1);

        }

        .fs-tech:hover,
        .fs-outcome-card:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;

        }

        .fs-outcome-card h3 {
            margin: 0 0 14px;
            font-size: clamp(1.55rem, 2.1vw, 2.15rem);
            line-height: 1.03;
            letter-spacing: -.055em;
        }

        .fs-proof-band {
            margin-top: 42px;
            padding: 28px;
            background: #0018dc;
            color: #fff;
            display: grid;
            grid-template-columns: minmax(0, .9fr) auto;
            gap: 28px;
            align-items: center;
        }

        .fs-proof-band strong {
            display: block;
            margin-bottom: 8px;
            font-size: 1.18rem;
            letter-spacing: -.025em;
        }

        .fs-proof-band p {
            margin: 0;
            color: rgba(255, 255, 255, .72);
            max-width: 780px;
        }

        .fs-proof-band a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0 20px;
            background: #fff;
            color: var(--fs-blue);
            text-decoration: none;
            font-weight: 900;
            white-space: nowrap;
        }

        .fs-tech-panel {
            padding: 34px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(19, 18, 18, 0.16);
        }

        .fs-tech-list {
            display: grid;
            gap: 14px;
            margin-top: 22px;
        }

        .fs-tech-item {
            display: grid;
            grid-template-columns: 11px 1fr;
            gap: 12px;
            align-items: start;
            padding: 16px;
            background: #ffffffc2;
            border: 1px solid rgba(30, 29, 29, 0.12);
            color: rgba(0, 0, 0, 0.76);
            line-height: 1.5;
            font-weight: 650;
        }

        .fs-tech-item::before {
            content: "";
            width: 8px;
            height: 8px;
            margin-top: 7px;
            border-radius: 999px;
            background: var(--fs-light-blue);
            box-shadow: 0 0 0 5px rgba(21, 209, 255, .15);
        }

        .fs-tech-item strong {
            color: #000000;
        }

        .fs-cta {
            position: relative;
            overflow: hidden;
            background: #f5f6f8;
            color: rgb(2 6 23 / 0.7);
            text-align: center;
        }

        .fs-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .045) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .045) 1px, transparent 1px);
            background-size: 52px 52px;
            pointer-events: none;
        }

        .fs-cta .fs-wrap {
            max-width: 900px;
        }

        .fs-cta h2 {
            margin: 0;
            font-size: clamp(1.5rem, 3.5vw, 3.65rem);
            line-height: .98;
            letter-spacing: -.06em;
        }

        .fs-cta p {
            margin: 22px auto 0;
            max-width: 740px;
            color: rgb(2 6 23 / 0.7);
            font-size: 1.05rem;
            line-height: 1.62;
        }

        .fs-cta-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 32px;
        }

        .fs-footer {
            background: #050b18;
            color: #fff;
            padding: 52px 24px 34px;
        }

        .fs-footer-grid {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(260px, .8fr) repeat(3, minmax(140px, .32fr));
            gap: 38px;
        }

        .fs-footer img {
            width: 230px;
            height: auto;
            display: block;
            filter: brightness(0) invert(1);
            opacity: .95;
        }

        .fs-footer p {
            max-width: 360px;
            color: rgba(255, 255, 255, .62);
            line-height: 1.58;
            margin-top: 18px;
            font-size: .95rem;
        }

        .fs-footer h3 {
            margin: 0 0 14px;
            font-size: .78rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--fs-light-blue);
        }

        .fs-footer a {
            display: block;
            color: rgba(255, 255, 255, .72);
            text-decoration: none;
            margin: 9px 0;
            font-size: .92rem;
            transition: color .2s ease;
        }

        .fs-footer a:hover {
            color: #fff;
        }

        .fs-footer-bottom {
            max-width: 1180px;
            margin: 38px auto 0;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, .12);
            color: rgba(255, 255, 255, .48);
            font-size: .85rem;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        @media (max-width: 1120px) {

            .fs-nav,
            .fs-search,
            .fs-contact {
                display: none;
            }

            .fs-main-inner {
                grid-template-columns: auto auto;
            }

            .fs-mobile-toggle {
                display: block;
            }

            .fs-top-inner {
                justify-content: center;
                gap: 18px;
            }
        }

        @media (max-width: 920px) {

            .fs-hero-grid,
            .fs-split {
                grid-template-columns: 1fr;
            }

            .fs-card-grid,
            .fs-card-grid.three {
                grid-template-columns: 1fr;
            }

            .fs-proof-band {
                grid-template-columns: 1fr;
            }

            .fs-footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .fs-top-inner {
                min-height: 42px;
                justify-content: flex-start;
                overflow-x: auto;
                padding: 0 16px;
            }

            .fs-main-inner {
                min-height: 70px;
                padding: 0 16px;
            }

            .fs-logo {
                min-width: 188px;
            }

            .fs-logo img {
                width: 188px;
            }

            .fs-hero {
                padding: 70px 18px 64px;
            }

            .fs-hero h1 {
                font-size: clamp(2.65rem, 14vw, 4.25rem);
            }

            .fs-footer-grid {
                grid-template-columns: 1fr;
            }

            .fs-footer-bottom {
                display: block;
            }
        }

        .wrap {
            position: static;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>


    <main>
        <section class="fs-hero py-12">
            <div class="fs-wrap fs-hero-grid">
                <div>
                    <div class="fs-eyebrow">About Fluidstream</div>
                    <h1>More production. <br>Fewer emissions.<br> From the same field.</h1>
                    <p class="fs-hero-copy">
                        Fluidstream helps upstream producers reduce emissions and improve production economics with field
                        solutions
                        built for wet gas, liquids, unstable flow, and remote operation.
                    </p>
                    <div class="fs-hero-actions">
                        <a class="fs-btn fs-btn-primary" href="/technical-review">Request Technical Review</a>
                        <a class="fs-btn fs-btn-secondary" href="/case-studies">Explore Case Studies</a>
                    </div>
                </div>

                <aside class="fs-hero-card">
                    <h2>Outcome-focused solutions enabled by patented multiphase compression.</h2>
                    <p>
                        Fluidstream is built to make emissions reduction and production optimization projects viable where
                        conventional compression is limited by liquids, infrastructure, or operating conditions.
                    </p>
                    <div class="fs-meta-grid">
                        <div class="fs-meta-card">
                            <strong>Calgary, Alberta, Canada</strong>
                            <span>Built for Western Canadian field conditions and broader upstream applications.</span>
                        </div>
                        <div class="fs-meta-card">
                            <strong>Founded 2010</strong>
                            <span>Focused on practical emissions reduction and production optimization solutions.</span>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <section class="fs-section py-12">
            <div class="fs-wrap fs-split">
                <div>
                    <div class="kicker mb-2">Why Fluidstream Exists</div>
                    <h2>Conventional compression was not built for <span>real field conditions.</span></h2>
                </div>
                <div>
                    <p>
                        Many upstream emissions reduction and production optimization opportunities remain undeveloped
                        because
                        conventional compression was not designed for the conditions producers actually face.
                    </p>
                    <p>
                        Wet gas, liquid slugs, unstable flow, extreme cold, remote unattended operation, and tight project
                        economics
                        can make conventional solutions difficult to justify or sustain.
                    </p>
                    <p>
                        Fluidstream exists to close that gap. By handling the full process fluid stream within the
                        compression chamber
                        itself, Fluidstream reduces or eliminates separation infrastructure that can prevent projects from
                        moving
                        forward.
                    </p>
                </div>
            </div>
        </section>

        <section class="fs-section is-soft py-12">
            <div class="fs-wrap">
                <div class="kicker mb-2">Producer Outcomes</div>
                <h2>What we help producers <span>achieve.</span></h2>
                <p class="fs-lead">
                    Fluidstream is focused on field solutions that connect environmental performance with economic value.
                </p>

                <div class="fs-card-grid" style="margin-top:34px;">
                    <article class="fs-outcome-card">
                        <h3>GHG Emissions Reduction</h3>
                        <p>
                            Enable economically viable vapor recovery and gas capture projects where conventional systems
                            struggle with
                            reliability, capital cost, or field conditions.
                        </p>
                    </article>

                    <article class="fs-outcome-card">
                        <h3>Production Optimization</h3>
                        <p>
                            Reduce backpressure, restore production, and improve asset performance in wells and facilities
                            constrained
                            by conventional compression limitations.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="fs-section py-12">
            <div class="fs-wrap">
                <div class="kicker mb-2">Engineering Philosophy</div>
                <h2>Designed around the field, not the <span>catalogue.</span></h2>
                <p class="fs-lead">
                    Fluidstream designs around the belief that real field conditions—not ideal process assumptions—should
                    govern
                    equipment design.
                </p>
                <ul class="fs-philosophy-list" style="margin-top:34px;padding:0;list-style:none;display:grid;gap:16px;">
                    <li style="padding:18px 24px;background:var(--fs-soft);border-left:4px solid var(--fs-blue);">
                        <strong style="display:block;font-size:1rem;margin-bottom:6px;color:var(--fs-ink);">GHG reduction
                            should be
                            economically viable.</strong>
                        <span style="font-size:.95rem;color:var(--fs-muted);line-height:1.6;">Emissions reduction projects
                            should make
                            sense at the field level, not only under ideal assumptions. The right technology can improve the
                            economic
                            threshold.</span>
                    </li>
                    <li style="padding:18px 24px;background:var(--fs-soft);border-left:4px solid var(--fs-blue);">
                        <strong style="display:block;font-size:1rem;margin-bottom:6px;color:var(--fs-ink);">Maintenance
                            burden
                            reflects design limitations, not operational reality.</strong>
                        <span style="font-size:.95rem;color:var(--fs-muted);line-height:1.6;">Recurring maintenance,
                            operator visits,
                            and unplanned shutdowns often indicate that a system was not designed for its operating
                            environment.</span>
                    </li>
                    <li style="padding:18px 24px;background:var(--fs-soft);border-left:4px solid var(--fs-blue);">
                        <strong style="display:block;font-size:1rem;margin-bottom:6px;color:var(--fs-ink);">Remote
                            installations
                            require autonomous operation.</strong>
                        <span style="font-size:.95rem;color:var(--fs-muted);line-height:1.6;">Remote and unattended
                            installations need
                            systems that can respond to changing inlet conditions and upset events without constant operator
                            intervention.</span>
                    </li>
                    <li style="padding:18px 24px;background:var(--fs-soft);border-left:4px solid var(--fs-blue);">
                        <strong style="display:block;font-size:1rem;margin-bottom:6px;color:var(--fs-ink);">The best
                            solution fits the
                            actual field.</strong>
                        <span style="font-size:.95rem;color:var(--fs-muted);line-height:1.6;">Inlet composition, flow
                            variability,
                            ambient temperature, access constraints, and economics should define the solution—not a product
                            catalogue.</span>
                    </li>
                </ul>
            </div>
        </section>

        <section class="fs-section is-soft py-12">
            <div class="wrap fs-split">
                <div>
                    <div class="kicker mb-2">How We Deliver</div>
                    <h2>Patented technology that changes the <span>economic threshold.</span></h2>
                    <p class="fs-lead">
                        Fluidstream’s solutions are enabled by a patented multiphase compression platform that handles gas,
                        liquids,
                        and mixed-phase flow within the compression chamber itself.
                    </p>
                </div>

                <aside class="fs-tech-panel">
                    <div class="fs-tech-list">
                        <div class="fs-tech-item fs-tech ">
                            <span><strong>Reduced separation dependence</strong> in wet gas and multiphase applications
                                where
                                conventional systems require upstream conditioning.</span>
                        </div>
                        <div class="fs-tech-item fs-tech">
                            <span><strong>Sealed gland design</strong> with integrated electronic seal-wear
                                detection.</span>
                        </div>
                        <div class="fs-tech-item fs-tech">
                            <span><strong>Autonomous upset response</strong> for changing inlet conditions, variable flow,
                                and
                                cold-weather operation.</span>
                        </div>
                        <div class="fs-tech-item fs-tech">
                            <span><strong>Core IP</strong> includes U.S. Patent US11098709B2 and Canadian Patent
                                CA2843321C.</span>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <section class="fs-section py-12">
            <div class="fs-wrap">
                <div class="kicker mb-2">Field-Proven Performance</div>
                <h2>Documented deployments across <span>real operating conditions.</span></h2>
                <p class="fs-lead">
                    Fluidstream has documented field deployments across Western Canadian vapor recovery, casing gas
                    compression, and
                    production optimization applications.
                </p>

                <div class="fs-proof-band">
                    <div>
                        <strong>Field-proven applications are documented.</strong>
                        <p>
                            Review case studies for practical examples of where Fluidstream has been applied in real
                            operating
                            conditions.
                        </p>
                    </div>
                    <a href="/case-studies">View Case Studies</a>
                </div>
            </div>
        </section>

        <section class="py-12 fs-cta is-soft">
            <div class="fs-wrap">
                <h2>Have an emissions reduction or production optimization opportunity?</h2>
                <p>
                    Submit your application for technical review to determine whether Fluidstream is a fit for your
                    operating
                    conditions, economics, and field objectives.
                </p>
                <div class="fs-cta-actions">
                    <a class="fs-btn fs-btn-primary-1" href="/technical-review">Request Technical Review</a>
                    <a class="fs-btn fs-btn-secondary-1" href="/contact">Contact Us</a>
                </div>
            </div>
        </section>
    </main>




@endsection