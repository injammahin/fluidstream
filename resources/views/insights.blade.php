@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fip-blue: #1028ea;
            --fip-blue-dark: #0b1fb8;
            --fip-dark: #101322;
            --fip-muted: #5b6472;
            --fip-line: #dfe5ef;
            --fip-line-soft: #edf1f7;
            --fip-filter-bg: #f2f2f4;
            --fip-white: #ffffff;
            --fip-shadow-soft: 0 10px 28px rgba(8, 22, 54, 0.07);
        }

        .fip-insights-page,
        .fip-insights-page * {
            box-sizing: border-box;
        }

        .fip-insights-page {
            background: #ffffff;
            color: var(--fip-dark);
            font-family: Inter, Arial, Helvetica, sans-serif;
        }

        .fip-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 16px;
            padding-right: 16px;
        }

        .fip-page-head {
            padding: 86px 0 42px;
            border-bottom: 1px solid var(--fip-line);
        }

        .fip-eyebrow {
            display: inline-flex;
            margin-bottom: 12px;
            color: var(--fip-blue);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .fip-title {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 24ch;
            color: var(--text, #101322);
        }

        .fip-subtitle {
            padding: 4px;
            text-align: justify;
            max-width: 59ch;
            margin: 6px 0 0;
            line-height: 1.65;
            color: var(--fip-muted);
        }

        .fip-main-section {
            padding: 52px 0 76px;
            background: #ffffff;
        }

        .fip-layout {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            gap: 34px;
            align-items: start;
        }

        .fip-filter-column {
            position: sticky;
            top: 105px;
            align-self: start;
        }

        .fip-filter-panel {
            width: 100%;
            background: var(--fip-filter-bg);
            padding: 28px 24px;
            border-radius: 0;
            max-height: calc(100vh - 135px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #b9c4d3 transparent;
        }

        .fip-filter-panel::-webkit-scrollbar {
            width: 6px;
        }

        .fip-filter-panel::-webkit-scrollbar-track {
            background: transparent;
        }

        .fip-filter-panel::-webkit-scrollbar-thumb {
            background: #b9c4d3;
            border-radius: 999px;
        }

        .fip-filter-title {
            margin: 0 0 22px;
            color: #161b27;
            font-size: 21px;
            font-weight: 850;
            line-height: 1.15;
        }

        .fip-filter-subtitle {
            display: block;
            margin-bottom: 16px;
            color: var(--fip-muted);
            font-size: 11px;
            font-weight: 850;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .fip-topic-list {
            border-top: 1px solid #d2d2d6;
            border-bottom: 1px solid #d2d2d6;
        }

        .fip-checkbox-row {
            position: relative;
            display: grid;
            grid-template-columns: 20px minmax(0, 1fr);
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 8px 0;
            border-bottom: 1px solid #d2d2d6;
            cursor: pointer;
            user-select: none;
            transition:
                background 0.22s ease,
                padding-left 0.22s ease;
        }

        .fip-checkbox-row:last-child {
            border-bottom: 0;
        }

        .fip-topic-checkbox {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .fip-check-box {
            width: 18px;
            height: 18px;
            border: 2px solid #8a99ad;
            background: transparent;
            border-radius: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .fip-check-box::after {
            content: "";
            width: 8px;
            height: 5px;
            border-left: 2px solid #ffffff;
            border-bottom: 2px solid #ffffff;
            transform: rotate(-45deg) scale(0);
            transition: transform 0.18s ease;
            margin-top: -2px;
        }

        .fip-checkbox-text {
            color: #1b202b;
            font-size: 13.5px;
            font-weight: 800;
            line-height: 1.35;
            transition: color 0.2s ease;
        }

        .fip-checkbox-row:hover {
            padding-left: 4px;
            background: rgba(16, 40, 234, 0.04);
        }

        .fip-checkbox-row:hover .fip-checkbox-text {
            color: var(--fip-blue);
        }

        .fip-checkbox-row:hover .fip-check-box {
            border-color: var(--fip-blue);
        }

        .fip-topic-checkbox:checked+.fip-check-box {
            background: var(--fip-blue);
            border-color: var(--fip-blue);
            box-shadow: 0 0 0 4px rgba(16, 40, 234, 0.09);
        }

        .fip-topic-checkbox:checked+.fip-check-box::after {
            transform: rotate(-45deg) scale(1);
        }

        .fip-checkbox-row.is-active .fip-checkbox-text {
            color: var(--fip-blue);
        }

        .fip-filter-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 28px;
        }

        .fip-clear-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            background: var(--fip-blue);
            color: #ffffff;
            padding: 11px 16px;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            border-radius: 0;
            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .fip-clear-icon {
            font-size: 21px;
            line-height: 1;
            font-weight: 300;
        }

        .fip-clear-btn:hover {
            background: var(--fip-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(16, 40, 234, 0.16);
        }

        .fip-list-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
            scroll-margin-top: 145px;
        }

        .fip-list-title {
            margin: 0;
            color: var(--fip-dark);
            font-size: clamp(34px, 3vw, 48px);
            font-weight: 800;
            line-height: 1.06;
            letter-spacing: -0.055em;
        }

        .fip-result-count {
            color: var(--fip-muted);
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
        }

        .fip-insight-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .fip-article-card {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 350px;
            padding: 28px;
            background: #ffffff;
            border: 1px solid var(--fip-line);
            border-radius: 7px;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 10px 28px rgba(8, 22, 54, 0.04);
            scroll-margin-top: 145px;
            transition:
                transform 0.22s ease,
                box-shadow 0.22s ease,
                border-color 0.22s ease,
                background 0.22s ease,
                opacity 0.22s ease;
        }

        .fip-article-card.is-hidden {
            display: none;
        }

        .fip-article-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 4px;
            background: var(--fip-blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.28s ease;
            z-index: 1;
        }

        .fip-article-card:hover,
        .fip-article-card.is-focused {
            transform: translateY(-4px);
            box-shadow: var(--fip-shadow-soft);
            border-color: rgba(0, 24, 220, 0.28);
            background: #ffffff;
            text-decoration: none;
        }

        .fip-article-card:hover::before,
        .fip-article-card.is-focused::before {
            transform: scaleX(1);
        }

        .fip-article-card>* {
            position: relative;
            z-index: 2;
        }

        .fip-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 20px;
        }

        .fip-tag {
            display: inline-flex;
            align-self: flex-start;
            padding: 9px 15px;
            border: 1px solid rgba(16, 40, 234, 0.20);
            border-radius: 999px;
            background: rgba(16, 40, 234, 0.08);
            color: var(--fip-blue);
            font-size: 12px;
            font-weight: 850;
            line-height: 1;
            letter-spacing: 0.10em;
            text-transform: uppercase;
        }

        .fip-card-number {
            flex: 0 0 auto;
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 999px;
            background: rgba(16, 40, 234, 0.08);
            color: var(--fip-blue);
            font-size: 13px;
            font-weight: 900;
            border: 1px solid rgba(16, 40, 234, 0.16);
        }

        .fip-card-title {
            margin: 0 0 18px;
            color: var(--fip-dark);
            font-size: 20px;
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -0.04em;
        }

        .fip-card-desc {
            margin: 0;
            color: var(--fip-muted);
            font-size: 16px;
            line-height: 1.65;
        }

        .fip-card-bottom {
            margin-top: auto;
            padding-top: 24px;
        }

        .fip-card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            padding-top: 18px;
            border-top: 1px solid var(--fip-line-soft);
        }

        .fip-meta-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            background: #f4f7fc;
            color: #4b5667;
            padding: 8px 11px;
            font-size: 12px;
            font-weight: 750;
            line-height: 1;
        }

        .fip-read {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            color: var(--fip-blue);
            font-size: 17px;
            font-weight: 850;
            text-decoration: none;
        }

        .fip-read span {
            transition: transform 0.2s ease;
        }

        .fip-article-card:hover .fip-read span {
            transform: translateX(4px);
        }

        .fip-no-result {
            display: none;
            margin-top: 24px;
            padding: 24px;
            border: 1px dashed #cbd5e1;
            border-radius: 7px;
            background: #f8fafc;
            color: var(--fip-muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .fip-no-result.is-visible {
            display: block;
        }

        .fip-application-section {
            padding: 86px 0 92px;
            background: #ffffff;
        }

        .fip-application-head {
            margin-bottom: 48px;
        }

        .fip-application-title {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 24ch;
            color: var(--text, #101322);
        }

        .fip-application-text {
            padding: 4px;
            text-align: justify;
            max-width: 59ch;
            margin: 6px 0 0;
            line-height: 1.65;
            color: var(--fip-muted);
        }

        .fip-product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
        }

        .fip-product-card {
            position: relative;
            overflow: hidden;
            min-height: 250px;
            padding: 16px;
            border: 1px solid var(--fip-line);
            border-radius: 7px;
            background: #ffffff;
            box-shadow: 0 10px 28px rgba(8, 22, 54, 0.04);
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            transition:
                transform 0.22s ease,
                box-shadow 0.22s ease,
                border-color 0.22s ease;
        }

        .fip-product-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 4px;
            background: var(--fip-blue);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.28s ease;
        }

        .fip-product-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--fip-shadow-soft);
            border-color: rgba(0, 24, 220, 0.28);
            text-decoration: none;
        }

        .fip-product-card:hover::before {
            transform: scaleX(1);
        }

        .fip-product-card h3 {
            margin: 0 0 18px;
            color: var(--fip-dark);
            font-size: 17px;
            font-weight: 800;
            line-height: 1.16;
            letter-spacing: -0.04em;
        }

        .fip-product-card p {
            margin: 0;
            color: var(--fip-muted);
            font-size: 17px;
            line-height: 1.62;
        }

        .fip-product-link {
            margin-top: auto;
            padding-top: 24px;
            color: var(--fip-blue);
            font-size: 17px;
            font-weight: 850;
        }

        .fip-product-link span {
            display: inline-block;
            transition: transform 0.2s ease;
        }

        .fip-product-card:hover .fip-product-link span {
            transform: translateX(4px);
        }

        @media (max-width: 1100px) {
            .fip-layout {
                grid-template-columns: 1fr;
            }

            .fip-filter-column {
                position: relative;
                top: auto;
            }

            .fip-filter-panel {
                max-width: 100%;
                max-height: none;
            }

            .fip-insight-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .fip-product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .fip-page-head {
                padding-top: 76px;
            }

            .fip-main-section {
                padding: 42px 0 62px;
            }

            .fip-list-top {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .fip-insight-grid,
            .fip-product-grid {
                grid-template-columns: 1fr;
            }

            .fip-filter-panel {
                padding: 30px 24px;
            }

            .fip-article-card {
                min-height: auto;
                padding: 24px;
            }

            .fip-application-section {
                padding: 62px 0;
            }

            .fip-application-text {
                font-size: 18px;
            }
        }
    </style>

    @php
        $insights = [
            [
                'id' => 'vapor-recovery',
                'filter_label' => 'Vapor Recovery',
                'label' => 'Vapor Recovery',
                'title' => 'Fluidstream Vapor Recovery',
                'description' => 'Technical overview of vapor recovery applications where wet gas, variable flow, cold weather, and maintenance burden affect VRU reliability.',
                'url' => url('/insights/fluidstream-vapor-recovery-fluidstream-style'),
                'tags' => ['VaporCommander™', 'Methane Reduction'],
            ],
            [
                'id' => 'casing-gas',
                'filter_label' => 'Casing Gas Compression',
                'label' => 'Casing Gas',
                'title' => 'Fluidstream Casing Gas Compression',
                'description' => 'Long-form technical guidance on casing gas compression, casing pressure reduction, drawdown support, and oil production optimization.',
                'url' => url('/insights/fluidstream-casing-gas-compression-long-form'),
                'tags' => ['CompressionCommander™', 'Production'],
            ],
            [
                'id' => 'multiphase',
                'filter_label' => 'Multiphase vs Conventional',
                'label' => 'Multiphase',
                'title' => 'Multiphase vs Conventional Compression',
                'description' => 'Comparison of conventional gas-only compression and multiphase compression under wet, liquid-influenced, and unstable field conditions.',
                'url' => url('/insights/fluidstream-multiphase-vs-conventional-long-form'),
                'tags' => ['MultiphaseCommander™', 'Technology'],
            ],
            [
                'id' => 'wet-gas',
                'filter_label' => 'Wet Gas VRU Failure',
                'label' => 'Wet Gas',
                'title' => 'Why Conventional VRUs Fail in Wet Gas',
                'description' => 'Why scrubber-dependent vapor recovery systems can become unstable when tank vapors contain liquids, condensate, water, or freeze-prone flow conditions.',
                'url' => url('/insights/why-conventional-vrus-fail-wet-gas'),
                'tags' => ['VaporCommander™', 'US11098709B2'],
            ],
            [
                'id' => 'production',
                'filter_label' => 'Production Optimization',
                'label' => 'Production Optimization',
                'title' => 'Production Optimization with Multiphase Compression',
                'description' => 'How multiphase compression can support production recovery where pressure constraints, liquids, and unstable wells limit flow performance.',
                'url' => url('/insights/production-optimization-multiphase-compression'),
                'tags' => ['MultiphaseCommander™', 'Recovery'],
            ],
            [
                'id' => 'methane',
                'filter_label' => 'Methane Reduction',
                'label' => 'Methane Reduction',
                'title' => 'Fluidstream Methane Reduction Story',
                'description' => 'How production equipment choices, vapor recovery, and compression reliability influence methane reduction strategies in oil and gas operations.',
                'url' => url('/insights/fluidstream-methane-reduction-story-white-sections'),
                'tags' => ['Vapor Recovery', 'Technology'],
            ],
            [
                'id' => 'selection',
                'filter_label' => 'Technology Selection',
                'label' => 'Technology Selection',
                'title' => 'How to Select the Right Compression Application',
                'description' => 'A technical selection guide for vapor recovery, casing gas compression, wet gas applications, multiphase streams, and unstable wells.',
                'url' => url('/insights/how-to-select-right-compression-applications-final-fixed'),
                'tags' => ['Product Fit', 'Application Review'],
            ],
            [
                'id' => 'liquid-loaded-wells',
                'filter_label' => 'Liquid-Loaded Wells',
                'label' => 'Liquid-Loaded Wells',
                'title' => 'Multiphase Compression for Liquid-Loaded Gas Wells',
                'description' => 'Engineering discussion of liquid loading mechanics, critical velocity uncertainty, backpressure effects, and multiphase compression fit.',
                'url' => url('/insights/multiphase-compression-liquid-loaded-gas-wells'),
                'tags' => ['MultiphaseCommander™', 'Wet Wells'],
            ],
            [
                'id' => 'vru-flaring',
                'filter_label' => 'VRU vs Flaring',
                'label' => 'Flaring & Emissions',
                'title' => 'VRU vs Flaring',
                'description' => 'Comparison of vapor recovery and flaring from the perspective of methane emissions reduction, gas conservation, and operational economics.',
                'url' => url('/insights/fluidstream-vru-vs-flaring-complete'),
                'tags' => ['VaporCommander™', 'Emissions'],
            ],
            [
                'id' => 'compressioncommander-needed',
                'filter_label' => 'CompressionCommander Needed',
                'label' => 'Casing Gas',
                'title' => 'When Is CompressionCommander™ Needed?',
                'description' => 'Application-focused guide to identifying casing gas compression opportunities where backpressure, gas interference, and production losses affect wells.',
                'url' => url('/insights/when-is-casing-gas-compressioncommander'),
                'tags' => ['CompressionCommander™', 'Casing Pressure'],
            ],
            [
                'id' => 'wet-unstable-wells',
                'filter_label' => 'Wet & Unstable Wells',
                'label' => 'Wet & Unstable Wells',
                'title' => 'Why Conventional Compression Fails in Wet, Unstable Wells',
                'description' => 'Why liquids, slugs, sand, freeze-prone separation, and variable operating conditions can challenge conventional compression systems.',
                'url' => url('/insights/why-conventional-compression-fails-wet-unstable-wells'),
                'tags' => ['MultiphaseCommander™', 'Field Conditions'],
            ],
            [
                'id' => 'oil-production',
                'filter_label' => 'Oil Production',
                'label' => 'Oil Production',
                'title' => 'How Casing Gas Compression Increases Oil Production',
                'description' => 'How casing gas compression can reduce casing pressure, improve drawdown, reduce gas interference, and support improved oil production.',
                'url' => url('/insights/how-casing-gas-compression-increases-oil-production'),
                'tags' => ['CompressionCommander™', 'Production'],
            ],
            [
                'id' => 'production-recovery',
                'filter_label' => 'Production Recovery',
                'label' => 'Production Recovery',
                'title' => 'How Multiphase Compression Supports Production Recovery',
                'description' => 'How multiphase compression can support production recovery where conventional systems struggle with liquid loading, high backpressure, and variable flow.',
                'url' => url('/insights/how-multiphase-compression-supports-production-recovery'),
                'tags' => ['MultiphaseCommander™', 'Case Study Fit'],
            ],
        ];

        $products = [
            [
                'title' => 'VaporCommander™',
                'description' => 'Vapor recovery for wet gas, tank vapors, methane reduction, and emissions-focused oilfield applications.',
                'link_text' => 'View product',
                'url' => url('/vapor-recovery'),
            ],
            [
                'title' => 'CompressionCommander™',
                'description' => 'Casing gas compression for casing pressure reduction, gas interference, and production optimization applications.',
                'link_text' => 'View product',
                'url' => url('/casing-gas-compression'),
            ],
            [
                'title' => 'MultiphaseCommander™',
                'description' => 'Multiphase compression for liquid-influenced wells, production recovery, and unstable flow conditions.',
                'link_text' => 'View product',
                'url' => url('/multiphase-compression'),
            ],
            [
                'title' => 'Technology & Patents',
                'description' => 'Learn how Fluidstream’s compression architecture supports liquid-aware operation and field reliability.',
                'link_text' => 'View patents',
                'url' => url('/patented-technology'),
            ],
        ];
    @endphp

    <div class="fip-insights-page">
        <section class="fip-page-head">
            <div class="fip-container">
                <span class="fip-eyebrow">Fluidstream Insights</span>

                <h2 class="fip-title">
                    Technical insights for real-world oilfield compression challenges.
                </h2>

                <p class="fip-subtitle">
                    Explore engineering-focused articles on multiphase compression, vapor recovery,
                    casing gas compression, liquid-loaded wells, wet gas reliability, methane reduction,
                    and production optimization.
                </p>
            </div>
        </section>

        <section class="fip-main-section">
            <div class="fip-container">
                <div class="fip-layout">
                    <aside class="fip-filter-column">
                        <div class="fip-filter-panel" aria-label="Insight filters">
                            <h3 class="fip-filter-title">Filters</h3>
                            <div class="fip-topic-list">
                                @foreach ($insights as $insight)
                                    <label class="fip-checkbox-row">
                                        <input type="checkbox" class="fip-topic-checkbox" value="{{ $insight['id'] }}">

                                        <span class="fip-check-box" aria-hidden="true"></span>

                                        <span class="fip-checkbox-text">
                                            {{ $insight['filter_label'] }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                            <div class="fip-filter-actions">
                                <button type="button" class="fip-clear-btn" id="fipClearFilters">
                                    <span class="fip-clear-icon">×</span>
                                    Clear
                                </button>
                            </div>
                        </div>
                    </aside>

                    <main>
                        <div class="fip-list-top" id="fipArticlesSection">
                            <h2 class="fip-list-title">Browse all insights</h2>

                            <div class="fip-result-count">
                                <span id="fipVisibleCount">{{ count($insights) }}</span> insights shown
                            </div>
                        </div>

                        <div class="fip-insight-grid" id="fipInsightGrid">
                            @foreach ($insights as $insight)
                                @php
                                    $articleNumber = count($insights) - $loop->index;
                                @endphp

                                <a id="{{ $insight['id'] }}" href="{{ $insight['url'] }}" class="fip-article-card"
                                    data-topic="{{ $insight['id'] }}">
                                    <div class="fip-card-top">
                                        <span class="fip-tag">{{ $insight['label'] }}</span>

                                        <span class="fip-card-number">
                                            {{ str_pad($articleNumber, 2, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </div>

                                    <h3 class="fip-card-title">{{ $insight['title'] }}</h3>

                                    <p class="fip-card-desc">{{ $insight['description'] }}</p>

                                    <div class="fip-card-bottom">
                                        <div class="fip-card-meta">
                                            @foreach ($insight['tags'] as $tag)
                                                <span class="fip-meta-pill">{{ $tag }}</span>
                                            @endforeach
                                        </div>

                                        <span class="fip-read">
                                            Read insight <span>→</span>
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="fip-no-result" id="fipNoResult">
                            No insights matched the selected filters. Clear the filters and try again.
                        </div>
                    </main>
                </div>
            </div>
        </section>

        <section class="fip-application-section">
            <div class="fip-container">
                <div class="fip-application-head">
                    <h2 class="fip-application-title">
                        Connect insights to field applications
                    </h2>

                    <p class="fip-application-text">
                        Fluidstream’s technical content is designed to help teams move from problem
                        identification to equipment selection. Use the links below to connect operating
                        challenges with product lines, field deployments, and patented technology.
                    </p>
                </div>

                <div class="fip-product-grid">
                    @foreach ($products as $product)
                        <a href="{{ $product['url'] }}" class="fip-product-card">
                            <h3>{{ $product['title'] }}</h3>

                            <p>{{ $product['description'] }}</p>

                            <div class="fip-product-link">
                                {{ $product['link_text'] }} <span>→</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = Array.from(document.querySelectorAll('.fip-topic-checkbox'));
            const cards = Array.from(document.querySelectorAll('.fip-article-card'));
            const clearButton = document.getElementById('fipClearFilters');
            const visibleCount = document.getElementById('fipVisibleCount');
            const noResult = document.getElementById('fipNoResult');
            const articlesSection = document.getElementById('fipArticlesSection');

            function getSelectedTopics() {
                return checkboxes
                    .filter(function (checkbox) {
                        return checkbox.checked;
                    })
                    .map(function (checkbox) {
                        return checkbox.value;
                    });
            }

            function clearFocusedCards() {
                cards.forEach(function (card) {
                    card.classList.remove('is-focused');
                });
            }

            function updateRowsState() {
                checkboxes.forEach(function (checkbox) {
                    const row = checkbox.closest('.fip-checkbox-row');

                    if (row) {
                        row.classList.toggle('is-active', checkbox.checked);
                    }
                });
            }

            function scrollToArticles() {
                if (!articlesSection) {
                    return;
                }

                const headerOffset = 135;
                const sectionPosition = articlesSection.getBoundingClientRect().top + window.pageYOffset;
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
                const selectedTopics = getSelectedTopics();
                let shownCount = 0;

                cards.forEach(function (card) {
                    const topic = card.dataset.topic;
                    const shouldShow = selectedTopics.length === 0 || selectedTopics.includes(topic);

                    card.classList.toggle('is-hidden', !shouldShow);

                    if (shouldShow) {
                        shownCount++;
                    }
                });

                visibleCount.textContent = shownCount;
                noResult.classList.toggle('is-visible', shownCount === 0);

                updateRowsState();

                if (shouldScroll) {
                    scrollToArticles();

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