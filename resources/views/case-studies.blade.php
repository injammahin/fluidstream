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
            --shadow: 0 22px 60px rgba(0, 24, 220, .12);
            --max: 1180px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .case-page {
            background: #ffffff;
            color: var(--ink);
        }

        .case-container {
            width: min(var(--max), calc(100% - 44px));
            margin: 0 auto;
        }

        .fs-case-study-hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 620px;
            color: #ffffff;
            background:
                linear-gradient(100deg, rgb(11 19 85 / 38%) 0%, rgb(6 11 53 / 32%) 38%, rgb(0 24 220 / 0%) 68%, rgb(0 24 220 / 0%) 100%),
                url("{{ asset('/img/insights/facility.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-bottom: 1px solid #dfe9ff;
        }

        .fs-case-study-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background:
                radial-gradient(circle at 78% 18%, rgba(21, 209, 255, .28), transparent 30%),
                linear-gradient(90deg, rgba(255, 255, 255, .055) 1px, transparent 1px),
                linear-gradient(0deg, rgba(255, 255, 255, .04) 1px, transparent 1px);
            background-size: auto, 76px 76px, 76px 76px;
            pointer-events: none;
        }

        .fs-case-study-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: linear-gradient(180deg, rgba(2, 8, 35, .08) 0%, rgba(2, 8, 35, .42) 100%);
            pointer-events: none;
        }

        .fs-case-study-hero-wrap {
            width: min(1180px, calc(100% - 44px));
            min-height: 620px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 1.04fr) minmax(360px, .82fr);
            gap: 44px;
            align-items: flex-start;
            padding: 92px 0;
        }

        .fs-case-study-hero h1 {
            max-width: 820px;
            margin: 0 0 24px;
            color: #ffffff;
            font-size: clamp(46px, 6.7vw, 78px);
            line-height: .94;
            letter-spacing: -.075em;
            font-weight: 500;
        }

        .fs-case-study-hero-lead {
            max-width: 760px;
            margin: 0;
            color: rgba(255, 255, 255, .82);
            font-size: 18px;
            line-height: 1.65;
            font-weight: 500;
        }

        .fs-case-study-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 30px;
        }

        .fs-case-study-hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0 22px;
            border-radius: 999px;
            font-size: 15px;
            line-height: 1;
            font-weight: 950;
            transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease, background .24s ease, color .24s ease;
        }

        .fs-case-study-hero-btn-primary {
            background: var(--blue);
            color: #ffffff;
            border: 1px solid var(--blue);
        }

        .fs-case-study-hero-btn-secondary {
            background: rgba(255, 255, 255, .08);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, .36);
        }

        .fs-case-study-hero-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, .18);
        }

        .fs-case-study-proof {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 7px;
            background: rgb(2 6 23 / 6%);
            box-shadow: 0 26px 70px rgba(0, 0, 0, .22);
            padding: 26px;
            backdrop-filter: blur(2px);
            transition: transform .24s ease, border-color .24s ease, box-shadow .24s ease;
        }

        .fs-case-study-proof:hover {
            transform: translateY(-4px);
        }

        .fs-case-study-proof-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 18px;
            color: rgba(255, 255, 255, .92);
            font-size: 12px;
            line-height: 1;
            font-weight: 950;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .fs-case-study-proof-grid {
            display: grid;
            gap: 12px;
        }

        .fs-case-study-proof-metric {
            position: relative;
            overflow: hidden;
            padding: 18px 18px 18px 22px;
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 7px;
            background: rgba(255, 255, 255, .09);
        }

        .fs-case-study-proof-metric strong {
            display: block;
            margin-bottom: 8px;
            color: #ffffff;
            font-size: 23px;
            line-height: 1;
            letter-spacing: -.045em;
            font-weight: 950;
        }

        .fs-case-study-proof-metric span {
            display: block;
            color: rgba(255, 255, 255, .74);
            font-size: 13px;
            line-height: 1.42;
            font-weight: 650;
        }

        .fs-case-study-proof-note {
            margin: 16px 0 0;
            color: rgba(255, 255, 255, .58);
            font-size: 12px;
            line-height: 1.5;
            font-weight: 600;
        }

        .case-main-section {
            padding: 52px 0 76px;
            background: #ffffff;
        }

        .case-layout {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            gap: 34px;
            align-items: start;
        }

        .case-filter-column {
            position: sticky;
            top: 105px;
            align-self: start;
        }

        .case-filter-panel {
            width: 100%;
            background: #f2f2f4;
            padding: 28px 24px;
            border-radius: 0;
            max-height: calc(100vh - 135px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #b9c4d3 transparent;
        }

        .case-filter-panel::-webkit-scrollbar {
            width: 6px;
        }

        .case-filter-panel::-webkit-scrollbar-track {
            background: transparent;
        }

        .case-filter-panel::-webkit-scrollbar-thumb {
            background: #b9c4d3;
            border-radius: 999px;
        }

        .case-filter-title {
            margin: 0 0 22px;
            color: #161b27;
            font-size: 21px;
            font-weight: 850;
            line-height: 1.15;
        }

        .case-topic-list {
            border-top: 1px solid #d2d2d6;
            border-bottom: 1px solid #d2d2d6;
        }

        .case-checkbox-row {
            position: relative;
            display: grid;
            grid-template-columns: 20px minmax(0, 1fr);
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 9px 0;
            border-bottom: 1px solid #d2d2d6;
            cursor: pointer;
            user-select: none;
            transition: background .22s ease, padding-left .22s ease;
        }

        .case-checkbox-row:last-child {
            border-bottom: 0;
        }

        .case-topic-checkbox {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .case-check-box {
            width: 18px;
            height: 18px;
            border: 2px solid #8a99ad;
            background: transparent;
            border-radius: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background .2s ease, border-color .2s ease, box-shadow .2s ease;
        }

        .case-check-box::after {
            content: "";
            width: 8px;
            height: 5px;
            border-left: 2px solid #ffffff;
            border-bottom: 2px solid #ffffff;
            transform: rotate(-45deg) scale(0);
            transition: transform .18s ease;
            margin-top: -2px;
        }

        .case-checkbox-text {
            color: #1b202b;
            font-size: 13.5px;
            font-weight: 800;
            line-height: 1.35;
            transition: color .2s ease;
        }

        .case-checkbox-row:hover {
            padding-left: 4px;
            background: rgba(0, 24, 220, .04);
        }

        .case-checkbox-row:hover .case-checkbox-text {
            color: var(--blue);
        }

        .case-checkbox-row:hover .case-check-box {
            border-color: var(--blue);
        }

        .case-topic-checkbox:checked+.case-check-box {
            background: var(--blue);
            border-color: var(--blue);
            box-shadow: 0 0 0 4px rgba(0, 24, 220, .09);
        }

        .case-topic-checkbox:checked+.case-check-box::after {
            transform: rotate(-45deg) scale(1);
        }

        .case-checkbox-row.is-active .case-checkbox-text {
            color: var(--blue);
        }

        .case-filter-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 28px;
        }

        .case-clear-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            background: var(--blue);
            color: #ffffff;
            padding: 11px 16px;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            border-radius: 0;
            transition: background .2s ease, transform .2s ease, box-shadow .2s ease;
        }

        .case-clear-btn:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 24, 220, .16);
        }

        .case-clear-icon {
            font-size: 21px;
            line-height: 1;
            font-weight: 300;
        }

        .case-list-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
            scroll-margin-top: 135px;
        }

        .case-list-title {
            margin: 0;
            color: var(--ink);
            font-size: clamp(34px, 3vw, 48px);
            font-weight: 800;
            line-height: 1.06;
            letter-spacing: -0.055em;
        }

        .case-result-count {
            color: var(--muted);
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
        }

        .case-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .case-card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 5px;
            padding: 22px;
            min-height: 350px;
            display: flex;
            flex-direction: column;
            transition: .24s ease;
        }

        .case-card.is-hidden {
            display: none;
        }

        .case-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: var(--blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s ease;
            z-index: 1;
        }

        .case-card:hover,
        .case-card.is-focused {
            transform: translateY(-3px);
            border-color: var(--blue) !important;
            background: #ffffff;
        }

        .case-card:hover::after,
        .case-card.is-focused::after {
            transform: scaleX(1);
        }

        .case-top {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            align-items: flex-start;
            margin-bottom: 14px;
        }

        .case-product {
            display: inline-flex;
            padding: 6px 0;
            border-radius: 999px;
            color: var(--blue);
            font-size: 11px;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-weight: 950;
        }

        .case-location {
            font-size: 11px;
            color: var(--muted);
            font-weight: 850;
            text-align: right;
        }

        .case-card h3 {
            font-size: clamp(22px, 2.5vw, 29px);
            line-height: 1.02;
            letter-spacing: -.055em;
            margin: 0 0 12px;
            color: var(--ink);
        }

        .case-card p {
            color: var(--muted);
            font-size: 14.5px;
            line-height: 1.55;
            margin: 0 0 14px;
        }

        .case-metrics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin: 14px 0 16px;
        }

        .case-metric {
            border-radius: 8px;
            background: var(--soft);
            border: 1px solid var(--line);
            padding: 11px;
        }

        .case-metric strong {
            display: block;
            color: var(--blue);
            font-size: 18px;
            letter-spacing: -.04em;
            line-height: 1;
        }

        .case-metric span {
            display: block;
            color: var(--muted);
            font-size: 10.5px;
            line-height: 1.25;
            font-weight: 800;
            margin-top: 6px;
        }

        .case-hook {
            padding: 13px 15px;
            border-left: 4px solid var(--blue);
            background: #f7faff;
            border-radius: 0 14px 14px 0;
            color: #243044;
            font-size: 13.5px;
            line-height: 1.5;
            font-weight: 750;
            margin-top: auto;
        }

        .case-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-top: 18px;
        }

        .case-actions-with-logo {
            display: grid;
            grid-template-columns: minmax(120px, 1fr) minmax(110px, auto) auto;
            align-items: center;
            gap: 14px;
        }

        .case-tagline {
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
        }

        .case-client-logo {
            width: 120px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .case-client-logo img {
            display: block;
            max-width: 100%;
            max-height: 52px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 15px;
            border-radius: 999px;
            background: var(--blue);
            color: #fff;
            font-size: 13px;
            font-weight: 950;
            box-shadow: 0 12px 24px rgba(0, 24, 220, .18);
            transition: .22s ease;
            white-space: nowrap;
        }

        .read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(0, 24, 220, .24);
        }

        .case-no-result {
            display: none;
            margin-top: 24px;
            padding: 24px;
            border: 1px dashed #cbd5e1;
            border-radius: 7px;
            background: #f8fafc;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .case-no-result.is-visible {
            display: block;
        }

        @media (max-width: 1100px) {
            .case-layout {
                grid-template-columns: 1fr;
            }

            .case-filter-column {
                position: relative;
                top: auto;
            }

            .case-filter-panel {
                max-width: 100%;
                max-height: none;
            }
        }

        @media (max-width: 980px) {

            .fs-case-study-hero,
            .fs-case-study-hero-wrap {
                min-height: auto;
            }

            .fs-case-study-hero-wrap {
                grid-template-columns: 1fr;
                gap: 34px;
                padding: 76px 0 64px;
            }

            .fs-case-study-proof {
                max-width: 620px;
            }
        }

        @media (max-width: 760px) {
            .case-container {
                width: min(100% - 32px, var(--max));
            }

            .case-main-section {
                padding: 42px 0 62px;
            }

            .case-list-top {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .case-grid {
                grid-template-columns: 1fr;
            }

            .case-filter-panel {
                padding: 30px 24px;
            }

            .case-card {
                min-height: auto;
                padding: 22px;
            }
        }

        @media (max-width: 640px) {
            .fs-case-study-hero-wrap {
                width: min(100% - 32px, 1180px);
                padding: 64px 0 52px;
            }

            .fs-case-study-hero h1 {
                font-size: 42px;
            }

            .fs-case-study-hero-lead {
                font-size: 17px;
            }

            .fs-case-study-hero-actions {
                flex-direction: column;
            }

            .fs-case-study-hero-btn {
                width: 100%;
            }

            .fs-case-study-proof {
                padding: 18px;
            }

            .case-metrics {
                grid-template-columns: 1fr;
            }

            .case-actions-with-logo {
                grid-template-columns: 1fr;
                align-items: flex-start;
                gap: 14px;
            }

            .case-client-logo {
                justify-content: flex-start;
                width: 140px;
                height: auto;
            }

            .case-client-logo img {
                max-height: 44px;
            }
        }

        #case-studies {
            scroll-margin-top: 0px;
        }
    </style>

    @php
        $caseFilters = [
            [
                'id' => 'vapor-recovery',
                'label' => 'Vapor Recovery',
            ],
            [
                'id' => 'multiphase-production',
                'label' => 'Multiphase Production',
            ],
            [
                'id' => 'casing-gas-compression',
                'label' => 'Casing Gas Compression',
            ],
            [
                'id' => 'production-gain',
                'label' => 'Production Gain',
            ],
            [
                'id' => 'emissions-reduction',
                'label' => 'Emissions Reduction',
            ],
            [
                'id' => 'equipment-reliability',
                'label' => 'Equipment Reliability',
            ],
            [
                'id' => 'cold-winter-conditions',
                'label' => 'Cold / Winter Conditions',
            ],
        ];

        $caseStudies = [
            [
                'id' => 'case-multiphasecommander-production-optimization',
                'product' => 'MultiphaseCommander™',
                'location' => 'Alberta, Canada',
                'title' => 'MultiphaseCommander™ Production Optimization',
                'description' => 'A gas-driven MultiphaseCommander™ reduced backpressure, handled slugs and wide variable flow, and restored two nearly dead wells without adding separation-first infrastructure.',
                'url' => url('/case-studies/multiphasecommander-production-recovery'),
                'filters' => ['multiphase-production', 'production-gain', 'equipment-reliability'],
                'metrics' => [
                    ['value' => '~10e3', 'label' => 'm³/day gas restored'],
                    ['value' => 'C$1.5M+', 'label' => 'incremental annual revenue'],
                    ['value' => '~95e3', 'label' => 'm³/day peak gas flow'],
                ],
                'hook' => 'Best for readers evaluating liquid-loaded wells, plunger-lift limits, variable multiphase flow, and production recovery without a larger facility build.',
                'tagline' => 'Production recovery',
                'logo' => null,
                'logo_alt' => '',
            ],
            [
                'id' => 'case-vaporcommander-reliability',
                'product' => 'VaporCommander™',
                'location' => 'Alberta, Canada',
                'title' => 'VaporCommander™ 4.5+ Year Reliability',
                'description' => 'VaporCommander™ operated in wet gas service through harsh Alberta winters, reaching approximately 35 months before the first seal change and continuing with negligible maintenance.',
                'url' => url('/case-studies/vaporcommander-4-5-year-reliability'),
                'filters' => ['vapor-recovery', 'equipment-reliability', 'cold-winter-conditions'],
                'metrics' => [
                    ['value' => '4.5+', 'label' => 'years operation'],
                    ['value' => '35', 'label' => 'months to first seal change'],
                    ['value' => '1', 'label' => 'seal change to date'],
                ],
                'hook' => 'A strong reliability story for operators concerned about wet gas, seal life, cold-weather performance, and maintenance-heavy conventional VRUs.',
                'tagline' => 'Long-run reliability',
                'logo' => asset('/img/Torxen logo.webp'),
                'logo_alt' => 'Torxen logo',
            ],
            [
                'id' => 'case-vcu-replacement',
                'product' => 'VaporCommander™',
                'location' => 'Southern Alberta, Canada',
                'title' => 'VaporCommander™ Vapor Combustor Replacement',
                'description' => 'Instead of burning tank vapors, VaporCommander™ captured approximately 500,000 m³ of natural gas over 12 months and created more than C$46,000/year in estimated gas value.',
                'url' => url('/case-studies/vaporcommander-vcu-replacement'),
                'filters' => ['vapor-recovery', 'emissions-reduction'],
                'metrics' => [
                    ['value' => '500k', 'label' => 'm³/year gas captured'],
                    ['value' => 'C$46k+', 'label' => 'estimated annual gas value'],
                    ['value' => '0', 'label' => 'cold-weather stoppages'],
                ],
                'hook' => 'Built for readers comparing VCUs, conventional VRUs, carbon exposure, active pressure control, and recovered gas economics.',
                'tagline' => 'VCU replacement',
                'logo' => asset('/img/Torxen logo.webp'),
                'logo_alt' => 'Torxen logo',
            ],
            [
                'id' => 'case-allied-energy-vaporcommander',
                'product' => 'VaporCommander™',
                'location' => 'Alberta, Canada',
                'title' => 'Allied Energy II — VaporCommander™',
                'description' => 'Allied Energy II used VaporCommander™ to eliminate tank gas venting while operating through wet gas, variable gas flow, and winter conditions without service intervention.',
                'url' => url('/case-studies/allied-energy-vaporcommander-vru'),
                'filters' => ['vapor-recovery', 'equipment-reliability', 'emissions-reduction'],
                'metrics' => [
                    ['value' => '100%', 'label' => 'uptime since install'],
                    ['value' => '16+', 'label' => 'months at report date'],
                    ['value' => '0', 'label' => 'maintenance or service'],
                ],
                'hook' => 'A concise proof point for operators needing emissions compliance, wet-gas tolerance, low-touch operation, and winter reliability.',
                'tagline' => 'Uptime and emissions',
                'logo' => asset('img/Allied Energy.png'),
                'logo_alt' => 'Allied Energy II logo',
            ],
            [
                'id' => 'case-whitecap-vaporcommander',
                'product' => 'VaporCommander™',
                'location' => 'Saskatchewan, Canada',
                'title' => 'Whitecap Resources — VaporCommander™',
                'description' => 'Whitecap Resources deployed VaporCommander™ units for vapor recovery in Saskatchewan facilities where cold-weather reliability, entrained liquids, low suction pressure, and minimal operator intervention were key requirements.',
                'url' => url('/case-studies/whitecap-vaporcommander-vru'),
                'filters' => ['vapor-recovery', 'equipment-reliability', 'cold-winter-conditions'],
                'metrics' => [
                    ['value' => '0%', 'label' => 'reported downtime'],
                    ['value' => '5 min', 'label' => 'routine filter change'],
                    ['value' => '2+', 'label' => 'units installed / planned'],
                ],
                'hook' => 'A strong fit for readers evaluating VRUs in cold climates, liquid-prone vapor streams, remote facilities, and applications where conventional dry-gas VRUs create winter maintenance risk.',
                'tagline' => 'Winter VRU reliability',
                'logo' => asset('img/Whitecap.png'),
                'logo_alt' => 'Whitecap Resources logo',
            ],
        ];
    @endphp

    <div class="case-page">
        <section class="fs-case-study-hero">
            <div class="fs-case-study-hero-wrap">
                <div class="fs-case-study-hero-copy">
                    <h1>Documented results from real operating environments.</h1>

                    <p class="fs-case-study-hero-lead">
                        Case studies showing how Fluidstream technology performs in demanding oilfield service,
                        restoring production, reducing venting, improving uptime, and lowering maintenance in wet,
                        unstable, and freeze-prone applications.
                    </p>

                    <div class="fs-case-study-hero-actions">
                        <a class="fs-case-study-hero-btn fs-case-study-hero-btn-primary" href="#case-studies">
                            Explore Case Studies →
                        </a>

                        <a class="fs-case-study-hero-btn fs-case-study-hero-btn-secondary"
                            href="{{ url('/technical-review') }}">
                            Request Technical Review
                        </a>
                    </div>
                </div>

                <aside class="fs-case-study-proof" aria-label="Case study proof metrics">
                    <div class="fs-case-study-proof-title">
                        <span>Proof points</span>
                    </div>

                    <div class="fs-case-study-proof-grid">
                        <div class="fs-case-study-proof-metric">
                            <strong>C$1.5M+</strong>
                            <span>estimated annual incremental revenue in one Alberta production recovery case.</span>
                        </div>

                        <div class="fs-case-study-proof-metric">
                            <strong>100%</strong>
                            <span>uptime reported in active VaporCommander™ service with no maintenance at report
                                date.</span>
                        </div>

                        <div class="fs-case-study-proof-metric">
                            <strong>35 months</strong>
                            <span>before first reported seal change in long-running vapor recovery service.</span>
                        </div>
                    </div>

                    <p class="fs-case-study-proof-note">
                        Results vary by application, site conditions, operating targets, and system configuration.
                    </p>
                </aside>
            </div>
        </section>

        <section class="case-main-section">
            <div class="case-container">
                <div class="case-layout">
                    <aside class="case-filter-column">
                        <div class="case-filter-panel" aria-label="Case study filters">
                            <h3 class="case-filter-title">Filters</h3>

                            <div class="case-topic-list">
                                @foreach ($caseFilters as $filter)
                                    <label class="case-checkbox-row">
                                        <input type="checkbox" class="case-topic-checkbox" value="{{ $filter['id'] }}">

                                        <span class="case-check-box" aria-hidden="true"></span>

                                        <span class="case-checkbox-text">
                                            {{ $filter['label'] }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                            <div class="case-filter-actions">
                                <button type="button" class="case-clear-btn" id="caseClearFilters">
                                    <span class="case-clear-icon">×</span>
                                    Clear
                                </button>
                            </div>
                        </div>
                    </aside>

                    <main>
                        <div class="case-list-top" id="case-studies">
                            <h2 class="case-list-title">Browse Case Studies</h2>

                            <div class="case-result-count">
                                <span id="caseVisibleCount">{{ count($caseStudies) }}</span> case studies shown
                            </div>
                        </div>

                        <div class="case-grid" id="caseStudyGrid">
                            @foreach ($caseStudies as $caseStudy)
                                <article id="{{ $caseStudy['id'] }}" class="case-card"
                                    data-filters="{{ implode(' ', $caseStudy['filters']) }}">
                                    <div class="case-top">
                                        <div class="case-product">{{ $caseStudy['product'] }}</div>
                                        <div class="case-location">{{ $caseStudy['location'] }}</div>
                                    </div>

                                    <h3>{{ $caseStudy['title'] }}</h3>

                                    <p>{{ $caseStudy['description'] }}</p>

                                    <div class="case-metrics">
                                        @foreach ($caseStudy['metrics'] as $metric)
                                            <div class="case-metric">
                                                <strong>{{ $metric['value'] }}</strong>
                                                <span>{{ $metric['label'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="case-hook">
                                        {{ $caseStudy['hook'] }}
                                    </div>

                                    <div class="case-actions case-actions-with-logo">
                                        <span class="case-tagline">{{ $caseStudy['tagline'] }}</span>

                                        @if (!empty($caseStudy['logo']))
                                            <div class="case-client-logo">
                                                <img src="{{ $caseStudy['logo'] }}" alt="{{ $caseStudy['logo_alt'] }}">
                                            </div>
                                        @else
                                            <span></span>
                                        @endif

                                        <a class="read-more" href="{{ $caseStudy['url'] }}">
                                            Read more
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="case-no-result" id="caseNoResult">
                            No case studies matched the selected filters. Clear the filters and try again.
                        </div>
                    </main>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = Array.from(document.querySelectorAll('.case-topic-checkbox'));
            const cards = Array.from(document.querySelectorAll('.case-card'));
            const clearButton = document.getElementById('caseClearFilters');
            const visibleCount = document.getElementById('caseVisibleCount');
            const noResult = document.getElementById('caseNoResult');
            const caseSection = document.getElementById('case-studies');

            function getSelectedFilters() {
                return checkboxes
                    .filter(function (checkbox) {
                        return checkbox.checked;
                    })
                    .map(function (checkbox) {
                        return checkbox.value;
                    });
            }

            function updateRowsState() {
                checkboxes.forEach(function (checkbox) {
                    const row = checkbox.closest('.case-checkbox-row');

                    if (row) {
                        row.classList.toggle('is-active', checkbox.checked);
                    }
                });
            }

            function clearFocusedCards() {
                cards.forEach(function (card) {
                    card.classList.remove('is-focused');
                });
            }

            function scrollToCaseStudies() {
                if (!caseSection) {
                    return;
                }

                const headerOffset = 135;
                const sectionPosition = caseSection.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = sectionPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }

            function focusFirstVisibleCard() {
                const firstVisibleCard = cards.find(function (card) {
                    return !card.classList.contains('is-hidden');
                });

                clearFocusedCards();

                if (!firstVisibleCard) {
                    return;
                }

                firstVisibleCard.classList.add('is-focused');

                setTimeout(function () {
                    firstVisibleCard.classList.remove('is-focused');
                }, 1800);
            }

            function applyFilters(shouldScroll) {
                const selectedFilters = getSelectedFilters();
                let shownCount = 0;

                cards.forEach(function (card) {
                    const cardFilters = String(card.dataset.filters || '').split(' ').filter(Boolean);
                    const shouldShow = selectedFilters.length === 0 || selectedFilters.some(function (filter) {
                        return cardFilters.includes(filter);
                    });

                    card.classList.toggle('is-hidden', !shouldShow);

                    if (shouldShow) {
                        shownCount++;
                    }
                });

                if (visibleCount) {
                    visibleCount.textContent = shownCount;
                }

                if (noResult) {
                    noResult.classList.toggle('is-visible', shownCount === 0);
                }

                updateRowsState();

                if (shouldScroll) {
                    scrollToCaseStudies();

                    setTimeout(function () {
                        focusFirstVisibleCard();
                    }, 350);
                }
            }

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    applyFilters(true);
                });
            });

            if (clearButton) {
                clearButton.addEventListener('click', function () {
                    checkboxes.forEach(function (checkbox) {
                        checkbox.checked = false;
                    });

                    applyFilters(true);
                });
            }

            applyFilters(false);
        });
    </script>
@endsection