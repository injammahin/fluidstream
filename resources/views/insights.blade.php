@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fip-blue: #1028ea;
            --fip-blue-dark: #0b1fb8;
            --fip-dark: #111111;
            --fip-dark-soft: #0f172a;
            --fip-text: #535353;
            --fip-text-soft: #4f4f4f;
            --fip-text-muted: #64748b;
            --fip-border: #d8d8d8;
            --fip-border-soft: #dbe4f0;
            --fip-bg: #f5f5f5;
            --fip-white: #ffffff;
            --fip-soft-blue: #eaf0ff;
        }

        .fip-page,
        .fip-page * {
            box-sizing: border-box;
        }

        /* .fip-page {
                    background: var(--fip-bg);
                } */

        .fip-hero {
            background: var(--fip-blue);
            padding: 72px 0 64px;
        }

        .fip-hero-inner,
        .fip-body {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 16px;
        }

        .fip-hero-label {
            display: inline-block;
            margin-bottom: 14px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: rgba(255, 255, 255, 0.86);
        }

        .fip-hero-title {
            margin: 0;
            max-width: 900px;
            font-size: 42px;
            font-weight: 500;
            line-height: 0.98;
            letter-spacing: -0.04em;
            color: var(--fip-white);
        }

        .fip-hero-text {
            margin: 18px 0 0;
            max-width: 760px;
            font-size: 18px;
            line-height: 1.75;
            color: rgba(255, 255, 255, 0.88);
        }

        .fip-body {
            padding-top: 40px;
            padding-bottom: 64px;
        }

        .fip-section-head {
            margin-bottom: 28px;
            max-width: 60ch;
        }

        .fip-section-label {
            display: inline-block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--fip-blue);
        }

        .fip-section-title {
            margin: 0;
            font-size: 36px;
            font-weight: 500;
            line-height: 1.02;
            letter-spacing: -0.035em;
            color: var(--fip-dark);
        }

        .fip-section-text {
            margin: 16px 0 0;
            font-size: 17px;
            line-height: 1.8;
            color: var(--fip-text);
        }

        .fip-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .fip-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            min-height: 330px;
            border: 1px solid var(--fip-border-soft);
            border-radius: 7px;
            background: #ffffff;
            padding: 28px;
            transition:
                transform 0.24s ease,
                box-shadow 0.24s ease,
                border-color 0.24s ease,
                background 0.24s ease;
        }

        .fip-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--fip-blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 1;
        }

        .fip-card:hover {
            transform: translateY(-3px);
            border-color: var(--fip-blue);
            background: #ffffff;
            box-shadow: 0 18px 36px rgba(16, 42, 67, 0.08);
        }

        .fip-card:hover::after {
            transform: scaleX(1);
        }

        .fip-card>* {
            position: relative;
            z-index: 2;
        }

        .fip-card-label {
            display: inline-flex;
            margin-bottom: 16px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--fip-blue);
        }

        .fip-card-title {
            margin: 0 0 16px;
            font-size: 26px;
            font-weight: 500;
            line-height: 1.08;
            letter-spacing: -0.035em;
            color: var(--fip-dark);
        }

        .fip-card-text {
            margin: 0;
            font-size: 16px;
            line-height: 1.8;
            color: var(--fip-text-soft);
        }

        .fip-card-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
            padding-top: 22px;
            font-size: 16px;
            font-weight: 700;
            color: var(--fip-blue);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .fip-card-link:hover {
            color: var(--fip-blue-dark);
            text-decoration: none;
        }

        .fip-card-arrow {
            font-size: 20px;
            line-height: 1;
            transition: transform 0.2s ease;
        }

        .fip-card:hover .fip-card-arrow {
            transform: translateX(4px);
        }

        @media (min-width: 640px) {
            .fip-hero-title {
                font-size: 56px;
            }

            .fip-card {
                padding: 28px;
            }
        }

        @media (min-width: 1024px) {
            .fip-hero-title {
                font-size: 72px;
            }

            .container {
                max-width: 1200px !important;
            }

            .fip-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 24px;
            }
        }
    </style>

    <div class="fip-page">
        {{-- <section class="fip-hero">
            <div class="fip-hero-inner container">
                <span class="fip-hero-label">Insights</span>
                <h1 class="fip-hero-title">Insights</h1>
                <p class="fip-hero-text">
                    Read strategic viewpoints, industry thinking, and technical perspectives shaping
                    the future of production systems, emissions performance, and field deployment.
                </p>
            </div>
        </section> --}}

        <section class="fip-body container">
            <div class="fip-section-head">
                <span class="fip-section-label">Latest Perspectives</span>
                <h2 class="fip-section-title">Technical thinking and strategic viewpoints</h2>
                <p class="fip-section-text">
                    Explore commentary on production optimization, simplified infrastructure,
                    lower operating complexity, and technology decisions that affect long-term field performance.
                </p>
            </div>

            <div class="fip-grid">
                <article class="fip-card">
                    <span class="fip-card-label">Article 13</span>
                    <h3 class="fip-card-title">How Multiphase Compression Supports Production Recovery</h3>
                    <p class="fip-card-text">
                        A production recovery perspective on how multiphase compression can help restore flow,
                        lower backpressure, and simplify site infrastructure.
                    </p>
                    <a href="{{ url('/insights/how-multiphase-compression-supports-production-recovery') }}"
                        class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 12</span>
                    <h3 class="fip-card-title">How Casing Gas Compression Increases Oil Production</h3>
                    <p class="fip-card-text">
                        How improved casing gas handling can reduce constraints, improve production behavior,
                        and support better oil recovery outcomes.
                    </p>
                    <a href="{{ url('/insights/how-casing-gas-compression-increases-oil-production') }}"
                        class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 11</span>
                    <h3 class="fip-card-title">Why Conventional Compression Fails Wet, Unstable Wells</h3>
                    <p class="fip-card-text">
                        Why wet gas, liquid carryover, slugging, and unstable production conditions can expose the limits
                        of conventional gas-only compression.
                    </p>
                    <a href="{{ url('/insights/why-conventional-compression-fails-wet-unstable-wells') }}"
                        class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 10</span>
                    <h3 class="fip-card-title">When Is Casing Gas CompressionCommander™ Needed?</h3>
                    <p class="fip-card-text">
                        A field-focused explanation of when casing gas recovery conditions may require a more tolerant
                        CompressionCommander™ approach.
                    </p>
                    <a href="{{ url('/insights/when-is-casing-gas-compressioncommander') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 9</span>
                    <h3 class="fip-card-title">How to Select the Right Compression Application</h3>
                    <p class="fip-card-text">
                        A selection guide for matching compression technology to vapor recovery, casing gas,
                        liquid-loaded wells, and mixed-phase field conditions.
                    </p>
                    <a href="{{ url('/insights/how-to-select-right-compression-applications-final-fixed') }}"
                        class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 8</span>
                    <h3 class="fip-card-title">Fluidstream Methane Reduction Story</h3>
                    <p class="fip-card-text">
                        How Fluidstream’s technology story connects methane reduction, vapor recovery, field reliability,
                        and production-focused emissions performance.
                    </p>
                    <a href="{{ url('/insights/fluidstream-methane-reduction-story-white-sections') }}"
                        class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 7</span>
                    <h3 class="fip-card-title">VRU vs. Flaring: Complete Comparison</h3>
                    <p class="fip-card-text">
                        A practical comparison of vapor recovery and flaring decisions, with focus on emissions, economics,
                        reliability, and field operating value.
                    </p>
                    <a href="{{ url('/insights/fluidstream-vru-vs-flaring-complete') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 6</span>
                    <h3 class="fip-card-title">Multiphase Compression for Liquid-Loaded Gas Wells</h3>
                    <p class="fip-card-text">
                        A field-focused discussion on liquid-loaded gas wells and why multiphase compression can help
                        restore production without adding unnecessary separation complexity.
                    </p>
                    <a href="{{ url('/insights/multiphase-compression-liquid-loaded-gas-wells') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 5</span>
                    <h3 class="fip-card-title">Production Optimization with Multiphase Compression</h3>
                    <p class="fip-card-text">
                        How operators can think about production recovery, backpressure reduction, and lower site
                        complexity through a multiphase compression strategy.
                    </p>
                    <a href="{{ url('/insights/production-optimization-multiphase-compression') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 4</span>
                    <h3 class="fip-card-title">Why Conventional VRUs Fail Wet Gas</h3>
                    <p class="fip-card-text">
                        Wet gas, entrained liquids, and real operating variation can expose the weakness of conventional
                        vapor recovery units built around clean-gas expectations.
                    </p>
                    <a href="{{ url('/insights/why-conventional-vrus-fail-wet-gas') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 3</span>
                    <h3 class="fip-card-title">Multiphase Compression vs. Conventional Compression</h3>
                    <p class="fip-card-text">
                        A comparison of separation-first conventional systems and multiphase compression models designed
                        around the actual behavior of mixed production streams.
                    </p>
                    <a href="{{ url('/insights/fluidstream-multiphase-vs-conventional-long-form') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 2</span>
                    <h3 class="fip-card-title">Casing Gas Compression Long Form</h3>
                    <p class="fip-card-text">
                        Why casing gas recovery often needs a more tolerant compression approach when streams are unstable,
                        wet, or difficult to keep within gas-only assumptions.
                    </p>
                    <a href="{{ url('/insights/fluidstream-casing-gas-compression-long-form') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Article 1</span>
                    <h3 class="fip-card-title">Vapor Recovery, Fluidstream Style</h3>
                    <p class="fip-card-text">
                        A technical perspective on how Fluidstream approaches vapor recovery using a more field-ready,
                        multiphase-aware operating philosophy.
                    </p>
                    <a href="{{ url('/insights/fluidstream-vapor-recovery-fluidstream-style') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>
            </div>
        </section>
    </div>
@endsection