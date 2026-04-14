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

        .fip-page {
            background: var(--fip-bg);
        }

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

        .fip-breadcrumb {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-bottom: 26px;
            font-size: 13px;
            color: var(--fip-text-muted);
        }

        .fip-breadcrumb a {
            color: var(--fip-text-muted);
            text-decoration: none;
        }

        .fip-breadcrumb a:hover {
            color: var(--fip-blue);
        }

        .fip-breadcrumb-current {
            color: var(--fip-dark);
            font-weight: 600;
        }

        .fip-section-head {
            margin-bottom: 28px;
            max-width: 760px;
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
            border: 1px solid var(--fip-border);
            border-radius: 24px;
            background: var(--fip-white);
            padding: 24px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .fip-card:hover {
            transform: translateY(-2px);
            border-color: var(--fip-border-soft);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
        }

        .fip-card-label {
            display: inline-flex;
            margin-bottom: 16px;
            font-size: 12px;
            font-weight: 700;
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
            margin-top: 22px;
            font-size: 16px;
            font-weight: 700;
            color: var(--fip-blue);
            text-decoration: none;
        }

        .fip-card-link:hover {
            color: var(--fip-blue-dark);
            text-decoration: none;
        }

        .fip-card-arrow {
            font-size: 20px;
            line-height: 1;
        }

        @media (min-width: 640px) {

            .fip-hero-inner,
            .fip-body {
                padding-left: 24px;
                padding-right: 24px;
            }

            .fip-hero-title {
                font-size: 56px;
            }

            .fip-card {
                padding: 28px;
            }
        }

        @media (min-width: 1024px) {

            .fip-hero-inner,
            .fip-body {
                padding-left: 32px;
                padding-right: 32px;
            }

            .fip-hero-title {
                font-size: 72px;
            }

            .fip-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 24px;
            }
        }
    </style>

    <div class="fip-page">
        <section class="fip-hero">
            <div class="fip-hero-inner">
                <span class="fip-hero-label">Insights</span>
                <h1 class="fip-hero-title">Insights</h1>
                <p class="fip-hero-text">
                    Read strategic viewpoints, industry thinking, and technical perspectives shaping
                    the future of production systems, emissions performance, and field deployment.
                </p>
            </div>
        </section>

        <section class="fip-body">

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
                    <span class="fip-card-label">Perspective</span>
                    <h3 class="fip-card-title">Rethinking Production Systems</h3>
                    <p class="fip-card-text">
                        Why simplified flow-through production models are becoming more important in
                        modern field design and operating strategies.
                    </p>
                    <a href="{{ url('/insights/rethinking-production-systems') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Perspective</span>
                    <h3 class="fip-card-title">Lower Cost, Broader Deployment</h3>
                    <p class="fip-card-text">
                        A closer look at how lower complexity systems can unlock wider application
                        opportunities across more operating environments.
                    </p>
                    <a href="{{ url('/insights/lower-cost-broader-deployment') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>

                <article class="fip-card">
                    <span class="fip-card-label">Perspective</span>
                    <h3 class="fip-card-title">The Role of Emissions Reduction</h3>
                    <p class="fip-card-text">
                        Understanding how technology decisions can improve operational efficiency,
                        reduce waste, and support lower-emission production models.
                    </p>
                    <a href="{{ url('/insights/emissions-reduction') }}" class="fip-card-link">
                        Read More <span class="fip-card-arrow">→</span>
                    </a>
                </article>
            </div>
        </section>
    </div>
@endsection