@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fsc-blue: #1028ea;
            --fsc-blue-dark: #0b1fb8;
            --fsc-dark: #111111;
            --fsc-dark-soft: #0f172a;
            --fsc-text: #535353;
            --fsc-text-soft: #5f6f8a;
            --fsc-text-muted: #64748b;
            --fsc-border: #dbe4f0;
            --fsc-border-soft: #d8d8d8;
            --fsc-bg: #f5f5f5;
            --fsc-bg-soft: #f8fbff;
            --fsc-blue-soft: #eaf0ff;
            --fsc-blue-soft-2: #f5f9ff;
            --fsc-white: #ffffff;
        }

        .fsc-page,
        .fsc-page * {
            box-sizing: border-box;
        }

        .fsc-page {
            background: var(--fsc-bg);
        }

        .fsc-hero {
            background: var(--fsc-blue);
            padding: 72px 0 64px;
        }

        .fsc-hero-inner {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 16px;
        }

        .fsc-hero-label {
            display: inline-block;
            margin-bottom: 14px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: rgba(255, 255, 255, 0.85);
        }

        .fsc-hero-title {
            margin: 0;
            max-width: 900px;
            font-size: 42px;
            font-weight: 500;
            line-height: 0.98;
            letter-spacing: -0.04em;
            color: var(--fsc-white);
        }

        .fsc-hero-text {
            margin: 18px 0 0;
            max-width: 760px;
            font-size: 18px;
            line-height: 1.75;
            color: rgba(255, 255, 255, 0.88);
        }

        .fsc-body {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 40px 16px 64px;
        }

        .fsc-breadcrumb {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-bottom: 26px;
            font-size: 13px;
            color: var(--fsc-text-muted);
        }

        .fsc-breadcrumb a {
            color: var(--fsc-text-muted);
            text-decoration: none;
        }

        .fsc-breadcrumb a:hover {
            color: var(--fsc-blue);
        }

        .fsc-breadcrumb-current {
            color: var(--fsc-dark);
            font-weight: 600;
        }

        .fsc-section-head {
            margin-bottom: 28px;
            max-width: 760px;
        }

        .fsc-section-label {
            display: inline-block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--fsc-blue);
        }

        .fsc-section-title {
            margin: 0;
            font-size: 36px;
            font-weight: 500;
            line-height: 1.02;
            letter-spacing: -0.035em;
            color: var(--fsc-dark);
        }

        .fsc-section-text {
            margin: 16px 0 0;
            font-size: 17px;
            line-height: 1.8;
            color: var(--fsc-text);
        }

        .fsc-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .fsc-card {
            overflow: hidden;
            border: 1px solid var(--fsc-border);
            border-radius: 24px;
            background: var(--fsc-white);
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.06);
        }

        .fsc-card-topline {
            height: 6px;
            width: 100%;
            background: var(--fsc-blue);
        }

        .fsc-card-body {
            padding: 20px;
        }

        .fsc-badge {
            display: inline-flex;
            margin-bottom: 16px;
            border-radius: 999px;
            background: var(--fsc-blue-soft);
            padding: 8px 14px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--fsc-blue);
        }

        .fsc-card-title {
            margin: 0 0 16px;
            font-size: 28px;
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: -0.02em;
            color: var(--fsc-dark-soft);
        }

        .fsc-metrics-inline {
            margin-bottom: 18px;
            font-size: 15px;
            line-height: 1.75;
            color: #334155;
        }

        .fsc-metrics-inline strong {
            color: var(--fsc-blue);
        }

        .fsc-dot {
            margin: 0 6px;
            color: #94a3b8;
        }

        .fsc-card-text {
            margin: 0 0 22px;
            max-width: 980px;
            font-size: 16px;
            line-height: 1.8;
            color: var(--fsc-text-soft);
        }

        .fsc-quote {
            margin-bottom: 22px;
            border-left: 5px solid var(--fsc-blue);
            border-radius: 0 16px 16px 0;
            background: var(--fsc-bg-soft);
            padding: 20px;
        }

        .fsc-quote p {
            margin: 0;
            font-size: 16px;
            line-height: 1.75;
            color: #0b1b45;
        }

        .fsc-quote-meta {
            margin-top: 12px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--fsc-blue);
        }

        .fsc-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            margin-bottom: 22px;
        }

        .fsc-stat {
            border: 1px solid rgba(19, 35, 63, 0.10);
            border-radius: 18px;
            background: var(--fsc-blue-soft-2);
            padding: 18px;
        }

        .fsc-stat-label {
            margin-bottom: 10px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.10em;
            color: var(--fsc-text-soft);
        }

        .fsc-stat-value {
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            color: var(--fsc-blue);
        }

        .fsc-stat-text {
            font-size: 14px;
            line-height: 1.55;
            color: var(--fsc-text-soft);
        }

        .fsc-card-footer {
            display: flex;
            flex-direction: column;
            gap: 16px;
            border-top: 1px solid var(--fsc-border);
            padding-top: 20px;
        }

        .fsc-card-footer-text {
            font-size: 14px;
            line-height: 1.7;
            color: var(--fsc-text-muted);
        }

        .fsc-btn {
            display: inline-flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: var(--fsc-blue);
            padding: 14px 22px;
            font-size: 15px;
            font-weight: 700;
            color: var(--fsc-white);
            text-decoration: none;
            transition: 0.2s ease;
        }

        .fsc-btn:hover {
            background: var(--fsc-blue-dark);
            color: var(--fsc-white);
            text-decoration: none;
            transform: translateY(-1px);
        }

        @media (min-width: 640px) {

            .fsc-hero-inner,
            .fsc-body {
                padding-left: 24px;
                padding-right: 24px;
            }

            .fsc-hero-title {
                font-size: 56px;
            }

            .fsc-card-body {
                padding: 28px;
            }

            .fsc-grid.fsc-grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .fsc-btn {
                width: auto;
            }
        }

        @media (min-width: 1024px) {

            .fsc-hero-inner,
            .fsc-body {
                padding-left: 32px;
                padding-right: 32px;
            }

            .fsc-hero-title {
                font-size: 72px;
            }

            .fsc-card-body {
                padding: 32px;
            }

            .fsc-card-footer {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .fsc-card-footer-text {
                max-width: 760px;
            }

            .fsc-grid.fsc-grid-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }
    </style>

    <div class="fsc-page">
        <section class="fsc-hero">
            <div class="fsc-hero-inner">
                <h1 class="fsc-hero-title">Case Studies</h1>
                <p class="fsc-hero-text">
                    Explore practical implementation stories, measured outcomes, and real-world
                    production use cases across Fluidstream deployments.
                </p>
            </div>
        </section>

        <section class="fsc-body">
            <div class="fsc-section-head">
                <span class="fsc-section-label">Featured Case Studies</span>
                <h2 class="fsc-section-title">Operational performance and field-proven outcomes</h2>
                <p class="fsc-section-text">
                    Review case studies focused on uptime, maintenance reduction, emissions control,
                    restored production, and measurable commercial impact.
                </p>
            </div>

            <div class="fsc-list">

                <!-- Card 1 -->
                <article class="fsc-card">
                    <div class="fsc-card-topline"></div>

                    <div class="fsc-card-body">
                        <div class="fsc-badge">Case Study Snapshot</div>

                        <h2 class="fsc-card-title">
                            Allied Energy II | Multiphase Vapor Recovery
                        </h2>

                        <div class="fsc-metrics-inline">
                            <strong>100% uptime</strong> over 15+ months
                            <span class="fsc-dot">•</span>
                            <strong>0 maintenance</strong>
                            <span class="fsc-dot">•</span>
                            Operated below <strong>-40°C</strong>
                            <span class="fsc-dot">•</span>
                            Gas venting eliminated
                        </div>

                        <blockquote class="fsc-quote">
                            <p>
                                “...eliminated gas venting…
                                <strong>100% uptime and no maintenance</strong>
                                since installation.”
                            </p>
                        </blockquote>

                        <div class="fsc-card-footer">
                            <div class="fsc-card-footer-text">
                                <strong style="color:#1028ea;">Lower maintenance</strong>
                                <span class="fsc-dot">•</span>
                                Continuous operation
                                <span class="fsc-dot">•</span>
                                Reduced emissions
                            </div>

                            <a href="{{ url('/case-studies/allied-energy-ii-multiphase-vapor-recovery') }}" class="fsc-btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="fsc-card">
                    <div class="fsc-card-topline"></div>

                    <div class="fsc-card-body">
                        <div class="fsc-badge">Case Study Snapshot</div>

                        <h2 class="fsc-card-title">
                            4.5+ years of reliable vapor recovery
                        </h2>

                        <p class="fsc-card-text">
                            A southern Alberta producer used Fluidstream’s VaporCommander™ to capture tank vapors,
                            reduce emissions, and avoid the maintenance burden commonly associated with conventional
                            VRU systems.
                        </p>

                        <div class="fsc-grid fsc-grid-2">
                            <div class="fsc-stat">
                                <div class="fsc-stat-value">35</div>
                                <div class="fsc-stat-text">
                                    months before first seal change
                                </div>
                            </div>

                            <div class="fsc-stat">
                                <div class="fsc-stat-value">1</div>
                                <div class="fsc-stat-text">
                                    seal change over reported operating life
                                </div>
                            </div>
                        </div>

                        <blockquote class="fsc-quote">
                            <p>
                                “To date, with the exception of the seal change after 35 months, the unit has not had any
                                failures or service issues in more than 4.5 years of operation.”
                            </p>
                            <div class="fsc-quote-meta">Fluidstream Case Study</div>
                        </blockquote>

                        <div class="fsc-card-footer">
                            <div class="fsc-card-footer-text">
                                Website-ready HTML box for homepage, landing page, or insights section.
                            </div>

                            <a href="{{ url('/case-studies/4-5-years-of-reliable-vapor-recovery') }}"
                                class="fsc-btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="fsc-card">
                    <div class="fsc-card-topline"></div>

                    <div class="fsc-card-body">
                        <div class="fsc-badge">Case Study Snapshot</div>

                        <h2 class="fsc-card-title">
                            From virtually no production to more than C$1.5 million/year in incremental revenue
                        </h2>

                        <p class="fsc-card-text">
                            In Alberta, Canada, Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded wells
                            that could no longer overcome rising pipeline pressure. The result was restored production,
                            no added separation equipment, and dependable operation under highly variable multiphase
                            conditions.
                        </p>

                        <div class="fsc-grid fsc-grid-3">
                            <div class="fsc-stat">
                                <div class="fsc-stat-label">Gas Production</div>
                                <div class="fsc-stat-value">10e3 m³/d</div>
                                <div class="fsc-stat-text">
                                    Combined gas production restored across both wells after installation.
                                </div>
                            </div>

                            <div class="fsc-stat">
                                <div class="fsc-stat-label">Condensate</div>
                                <div class="fsc-stat-value">5 m³/d</div>
                                <div class="fsc-stat-text">
                                    Daily condensate production recovered without added separation infrastructure.
                                </div>
                            </div>

                            <div class="fsc-stat">
                                <div class="fsc-stat-label">Revenue Impact</div>
                                <div class="fsc-stat-value">C$1.5M+</div>
                                <div class="fsc-stat-text">
                                    Estimated annual incremental revenue based on April 2026 commodity pricing.
                                </div>
                            </div>
                        </div>

                        <blockquote class="fsc-quote">
                            <p>
                                “Fluidstream’s MultiphaseCommander didn’t just improve performance. It completely
                                transformed two dead wells into revenue-generating assets. We went from zero production to
                                over $1.5 million per year in incremental revenue, without adding any separation equipment
                                or infrastructure.”
                            </p>
                            <div class="fsc-quote-meta">
                                Production Engineer, Western Canadian Oil &amp; Gas Producer
                            </div>
                        </blockquote>

                        <div class="fsc-card-footer">
                            <div class="fsc-card-footer-text">
                                Read the full case study for the operating challenge, deployment details,
                                runtime importance, variable-flow performance, and the broader pad-level
                                opportunity identified by the producer.
                            </div>

                            <a href="{{ url('/case-studies/incremental-revenue-case-study') }}" class="fsc-btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </article>

            </div>
        </section>
    </div>
@endsection