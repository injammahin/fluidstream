@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fip-blue: #1028ea;
            --fip-blue-dark: #0b1fb8;
            --fip-cyan: #15d1ff;
            --fip-dark: #101322;
            --fip-muted: #5b6472;
            --fip-soft: #f4f6fb;
            --fip-line: #dfe5ef;
            --fip-line-soft: #edf1f7;
            --fip-white: #ffffff;
            --fip-filter-bg: #f2f2f4;
            --fip-shadow: 0 18px 45px rgba(8, 22, 54, 0.10);
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
            padding: 58px 0 34px;
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
            max-width: 920px;
            color: var(--fip-dark);
            font-size: clamp(42px, 5vw, 72px);
            font-weight: 600;
            line-height: 0.98;
            letter-spacing: -0.055em;
        }

        .fip-subtitle {
            margin: 18px 0 0;
            max-width: 820px;
            color: var(--fip-muted);
            font-size: 18px;
            line-height: 1.75;
        }

        .fip-content-wrap {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 36px;
            align-items: start;
            padding-top: 46px;
            padding-bottom: 72px;
        }

        .fip-list-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 18px;
        }

        .fip-list-title {
            margin: 0;
            color: var(--fip-dark);
            font-size: 26px;
            font-weight: 600;
            line-height: 1.12;
            letter-spacing: -0.035em;
        }

        .fip-result-count {
            color: var(--fip-muted);
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .fip-insight-list {
            display: flex;
            flex-direction: column;
            gap: 0;
            border-top: 1px solid var(--fip-line);
        }

        .fip-insight-row {
            position: relative;
            display: grid;
            grid-template-columns: 255px minmax(0, 1fr) 42px;
            gap: 22px;
            align-items: center;
            padding: 24px 0;
            border-bottom: 1px solid var(--fip-line);
            text-decoration: none;
            color: inherit;
            overflow: hidden;
            transition:
                transform 0.24s ease,
                box-shadow 0.24s ease,
                border-color 0.24s ease,
                background 0.24s ease,
                padding 0.24s ease;
        }

        .fip-insight-row::before {
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

        .fip-insight-row:hover {
            transform: translateY(-3px);
            background: #ffffff;
            box-shadow: 0 18px 36px rgba(16, 42, 67, 0.08);
            padding-left: 18px;
            padding-right: 18px;
            border-color: rgba(16, 40, 234, 0.25);
        }

        .fip-insight-row:hover::before {
            transform: scaleX(1);
        }

        .fip-insight-visual {
            position: relative;
            min-height: 132px;
            overflow: hidden;
            border-radius: 4px;
            background:
                radial-gradient(circle at 80% 18%, rgba(21, 209, 255, .45), transparent 30%),
                linear-gradient(135deg, #0018dc 0%, #00105f 58%, #07142e 100%);
            transition: transform 0.25s ease;
        }

        .fip-insight-visual::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, transparent 0 55%, rgba(255, 255, 255, .16) 55% 56%, transparent 56% 100%),
                linear-gradient(25deg, transparent 0 38%, rgba(255, 255, 255, .10) 38% 39%, transparent 39% 100%);
        }

        .fip-insight-row:hover .fip-insight-visual {
            transform: scale(1.015);
        }

        .fip-insight-body {
            min-width: 0;
        }

        .fip-card-label {
            display: inline-flex;
            margin-bottom: 9px;
            color: var(--fip-blue);
            font-size: 11px;
            font-weight: 850;
            letter-spacing: 0.11em;
            text-transform: uppercase;
        }

        .fip-insight-title {
            margin: 0;
            color: var(--fip-dark);
            font-size: 22px;
            font-weight: 600;
            line-height: 1.18;
            letter-spacing: -0.035em;
        }

        .fip-insight-text {
            margin: 12px 0 0;
            color: var(--fip-muted);
            font-size: 15.5px;
            line-height: 1.65;
        }

        .fip-meta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .fip-meta-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            background: #f4f7fc;
            color: #4b5667;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: 750;
        }

        .fip-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 999px;
            color: var(--fip-blue);
            font-size: 25px;
            font-weight: 400;
            transition:
                transform 0.22s ease,
                background 0.22s ease,
                color 0.22s ease;
        }

        .fip-insight-row:hover .fip-arrow {
            transform: translateX(5px);
            background: var(--fip-blue);
            color: #ffffff;
        }

        .fip-filter-panel {
            position: sticky;
            top: 100px;
            background: var(--fip-filter-bg);
            padding: 28px 24px 28px;
            min-height: 270px;
        }

        .fip-filter-title {
            margin: 0 0 18px;
            color: #161b27;
            font-size: 14px;
            font-weight: 850;
        }

        .fip-filter-group {
            border-top: 1px solid #d7d7dc;
        }

        .fip-filter-group:last-of-type {
            border-bottom: 1px solid #d7d7dc;
        }

        .fip-filter-summary {
            list-style: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 15px 0;
            color: #202638;
            font-size: 14px;
            font-weight: 750;
        }

        .fip-filter-summary::-webkit-details-marker {
            display: none;
        }

        .fip-filter-summary::after {
            content: "⌄";
            color: var(--fip-blue);
            font-size: 18px;
            line-height: 1;
            transition: transform 0.2s ease;
        }

        .fip-filter-group[open] .fip-filter-summary::after {
            transform: rotate(180deg);
        }

        .fip-filter-options {
            padding: 0 0 14px;
            display: grid;
            gap: 9px;
        }

        .fip-check {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #495061;
            font-size: 13px;
            font-weight: 650;
            cursor: pointer;
        }

        .fip-check input {
            width: 15px;
            height: 15px;
            accent-color: var(--fip-blue);
            cursor: pointer;
        }

        .fip-clear-wrap {
            display: flex;
            justify-content: flex-end;
            margin-top: 26px;
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
            font-weight: 750;
            cursor: pointer;
            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .fip-clear-btn:hover {
            background: var(--fip-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(16, 40, 234, 0.16);
        }

        .fip-no-result {
            display: none;
            margin-top: 24px;
            padding: 26px;
            border: 1px dashed #cbd5e1;
            background: #f8fafc;
            color: #475569;
            font-size: 15px;
            line-height: 1.65;
        }

        .fip-no-result.is-visible {
            display: block;
        }

        .fip-bottom-cta {
            background:
                linear-gradient(90deg, rgba(0, 16, 95, .95), rgba(0, 24, 220, .94)),
                radial-gradient(circle at 80% 10%, rgba(21, 209, 255, .45), transparent 32%);
            color: #ffffff;
            padding: 64px 0;
        }

        .fip-bottom-cta-inner {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 34px;
            align-items: center;
        }

        .fip-bottom-cta h2 {
            margin: 0;
            color: #ffffff;
            font-size: clamp(30px, 3.2vw, 48px);
            line-height: 1.06;
            letter-spacing: -0.04em;
        }

        .fip-bottom-cta p {
            margin: 16px 0 0;
            max-width: 760px;
            color: rgba(255, 255, 255, .86);
            font-size: 17px;
            line-height: 1.7;
        }

        .fip-cta-links {
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 18px;
            padding: 24px;
        }

        .fip-cta-links a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            font-weight: 850;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255, 255, 255, .18);
        }

        .fip-cta-links a:last-child {
            border-bottom: 0;
        }

        @media (max-width: 1024px) {
            .fip-content-wrap {
                grid-template-columns: 1fr;
            }

            .fip-filter-panel {
                position: relative;
                top: auto;
                order: -1;
            }

            .fip-bottom-cta-inner {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .fip-page-head {
                padding-top: 42px;
            }

            .fip-list-top {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .fip-insight-row {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 22px 0;
            }

            .fip-insight-row:hover {
                padding-left: 0;
                padding-right: 0;
            }

            .fip-insight-visual {
                min-height: 178px;
            }

            .fip-arrow {
                justify-self: start;
            }
        }
    </style>

    @php
        $insights = [
            [
                'label' => 'Article 13',
                'title' => 'How Multiphase Compression Supports Production Recovery',
                'description' => 'A production recovery perspective on how multiphase compression can help restore flow, lower backpressure, and simplify site infrastructure.',
                'url' => url('/insights/how-multiphase-compression-supports-production-recovery'),
                'industry' => 'oil-gas',
                'equipment' => 'multiphase',
                'topic' => 'production',
                'tags' => ['MultiphaseCommander™', 'Production Recovery'],
            ],
            [
                'label' => 'Article 12',
                'title' => 'How Casing Gas Compression Increases Oil Production',
                'description' => 'How improved casing gas handling can reduce constraints, improve production behavior, and support better oil recovery outcomes.',
                'url' => url('/insights/how-casing-gas-compression-increases-oil-production'),
                'industry' => 'oil-gas',
                'equipment' => 'casing-gas',
                'topic' => 'production',
                'tags' => ['CompressionCommander™', 'Oil Production'],
            ],
            [
                'label' => 'Article 11',
                'title' => 'Why Conventional Compression Fails Wet, Unstable Wells',
                'description' => 'Why wet gas, liquid carryover, slugging, and unstable production conditions can expose the limits of conventional gas-only compression.',
                'url' => url('/insights/why-conventional-compression-fails-wet-unstable-wells'),
                'industry' => 'oil-gas',
                'equipment' => 'multiphase',
                'topic' => 'wet-gas',
                'tags' => ['Wet Gas', 'Unstable Wells'],
            ],
            [
                'label' => 'Article 10',
                'title' => 'When Is Casing Gas CompressionCommander™ Needed?',
                'description' => 'A field-focused explanation of when casing gas recovery conditions may require a more tolerant CompressionCommander™ approach.',
                'url' => url('/insights/when-is-casing-gas-compressioncommander'),
                'industry' => 'oil-gas',
                'equipment' => 'casing-gas',
                'topic' => 'selection',
                'tags' => ['CompressionCommander™', 'Application Fit'],
            ],
            [
                'label' => 'Article 9',
                'title' => 'How to Select the Right Compression Application',
                'description' => 'A selection guide for matching compression technology to vapor recovery, casing gas, liquid-loaded wells, and mixed-phase field conditions.',
                'url' => url('/insights/how-to-select-right-compression-applications-final-fixed'),
                'industry' => 'oil-gas',
                'equipment' => 'technology',
                'topic' => 'selection',
                'tags' => ['Technology Selection', 'Application Review'],
            ],
            [
                'label' => 'Article 8',
                'title' => 'Fluidstream Methane Reduction Story',
                'description' => 'How Fluidstream’s technology story connects methane reduction, vapor recovery, field reliability, and production-focused emissions performance.',
                'url' => url('/insights/fluidstream-methane-reduction-story-white-sections'),
                'industry' => 'oil-gas',
                'equipment' => 'vapor-recovery',
                'topic' => 'methane',
                'tags' => ['Methane Reduction', 'Vapor Recovery'],
            ],
            [
                'label' => 'Article 7',
                'title' => 'VRU vs. Flaring: Complete Comparison',
                'description' => 'A practical comparison of vapor recovery and flaring decisions, with focus on emissions, economics, reliability, and field operating value.',
                'url' => url('/insights/fluidstream-vru-vs-flaring-complete'),
                'industry' => 'oil-gas',
                'equipment' => 'vapor-recovery',
                'topic' => 'methane',
                'tags' => ['VRU', 'Flaring'],
            ],
            [
                'label' => 'Article 6',
                'title' => 'Multiphase Compression for Liquid-Loaded Gas Wells',
                'description' => 'A field-focused discussion on liquid-loaded gas wells and why multiphase compression can help restore production without adding unnecessary separation complexity.',
                'url' => url('/insights/multiphase-compression-liquid-loaded-gas-wells'),
                'industry' => 'oil-gas',
                'equipment' => 'multiphase',
                'topic' => 'liquid-loaded',
                'tags' => ['Liquid-Loaded Wells', 'Multiphase'],
            ],
            [
                'label' => 'Article 5',
                'title' => 'Production Optimization with Multiphase Compression',
                'description' => 'How operators can think about production recovery, backpressure reduction, and lower site complexity through a multiphase compression strategy.',
                'url' => url('/insights/production-optimization-multiphase-compression'),
                'industry' => 'oil-gas',
                'equipment' => 'multiphase',
                'topic' => 'production',
                'tags' => ['Production Optimization', 'Recovery'],
            ],
            [
                'label' => 'Article 4',
                'title' => 'Why Conventional VRUs Fail Wet Gas',
                'description' => 'Wet gas, entrained liquids, and real operating variation can expose the weakness of conventional vapor recovery units built around clean-gas expectations.',
                'url' => url('/insights/why-conventional-vrus-fail-wet-gas'),
                'industry' => 'oil-gas',
                'equipment' => 'vapor-recovery',
                'topic' => 'wet-gas',
                'tags' => ['VaporCommander™', 'Wet Gas'],
            ],
            [
                'label' => 'Article 3',
                'title' => 'Multiphase Compression vs. Conventional Compression',
                'description' => 'A comparison of separation-first conventional systems and multiphase compression models designed around the actual behavior of mixed production streams.',
                'url' => url('/insights/fluidstream-multiphase-vs-conventional-long-form'),
                'industry' => 'oil-gas',
                'equipment' => 'multiphase',
                'topic' => 'technology',
                'tags' => ['Technology', 'Comparison'],
            ],
            [
                'label' => 'Article 2',
                'title' => 'Casing Gas Compression Long Form',
                'description' => 'Why casing gas recovery often needs a more tolerant compression approach when streams are unstable, wet, or difficult to keep within gas-only assumptions.',
                'url' => url('/insights/fluidstream-casing-gas-compression-long-form'),
                'industry' => 'oil-gas',
                'equipment' => 'casing-gas',
                'topic' => 'production',
                'tags' => ['Casing Gas', 'Compression'],
            ],
            [
                'label' => 'Article 1',
                'title' => 'Vapor Recovery, Fluidstream Style',
                'description' => 'A technical perspective on how Fluidstream approaches vapor recovery using a more field-ready, multiphase-aware operating philosophy.',
                'url' => url('/insights/fluidstream-vapor-recovery-fluidstream-style'),
                'industry' => 'oil-gas',
                'equipment' => 'vapor-recovery',
                'topic' => 'methane',
                'tags' => ['Vapor Recovery', 'Field Ready'],
            ],
        ];
    @endphp

    <div class="fip-insights-page">
        <section class="fip-page-head">
            <div class="fip-container">
                <span class="fip-eyebrow">Fluidstream Insights</span>
                <h1 class="fip-title">
                    Technical insights for real-world oilfield compression challenges.
                </h1>
                <p class="fip-subtitle">
                    Explore engineering-focused articles on multiphase compression, vapor recovery,
                    casing gas compression, liquid-loaded wells, wet gas reliability, methane reduction,
                    and production optimization.
                </p>
            </div>
        </section>

        <section class="fip-container">
            <div class="fip-content-wrap">
                <main>
                    <div class="fip-list-top">
                        <h2 class="fip-list-title">Browse insights</h2>
                        <div class="fip-result-count">
                            <span id="fipVisibleCount">{{ count($insights) }}</span> insights shown
                        </div>
                    </div>

                    <div class="fip-insight-list" id="fipInsightList">
                        @foreach ($insights as $insight)
                            <a href="{{ $insight['url'] }}" class="fip-insight-row" data-industry="{{ $insight['industry'] }}"
                                data-equipment="{{ $insight['equipment'] }}" data-topic="{{ $insight['topic'] }}">
                                <div class="fip-insight-visual" aria-hidden="true"></div>

                                <div class="fip-insight-body">
                                    <span class="fip-card-label">{{ $insight['label'] }}</span>
                                    <h3 class="fip-insight-title">{{ $insight['title'] }}</h3>
                                    <p class="fip-insight-text">{{ $insight['description'] }}</p>

                                    <div class="fip-meta-row">
                                        @foreach ($insight['tags'] as $tag)
                                            <span class="fip-meta-pill">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <span class="fip-arrow" aria-hidden="true">→</span>
                            </a>
                        @endforeach
                    </div>

                    <div class="fip-no-result" id="fipNoResult">
                        No insights matched the selected filters. Clear the filters and try again.
                    </div>
                </main>

                <aside class="fip-filter-panel" aria-label="Insight filters">
                    <h3 class="fip-filter-title">Filters</h3>

                    <details class="fip-filter-group">
                        <summary class="fip-filter-summary">Industry</summary>
                        <div class="fip-filter-options">
                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="industry" value="oil-gas">
                                Oil & Gas
                            </label>
                        </div>
                    </details>

                    <details class="fip-filter-group">
                        <summary class="fip-filter-summary">Equipment type</summary>
                        <div class="fip-filter-options">
                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="equipment"
                                    value="vapor-recovery">
                                Vapor Recovery
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="equipment"
                                    value="casing-gas">
                                Casing Gas Compression
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="equipment"
                                    value="multiphase">
                                Multiphase Compression
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="equipment"
                                    value="technology">
                                Technology
                            </label>
                        </div>
                    </details>

                    <details class="fip-filter-group">
                        <summary class="fip-filter-summary">Topic</summary>
                        <div class="fip-filter-options">
                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="topic" value="production">
                                Production Optimization
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="topic" value="wet-gas">
                                Wet Gas & Liquids
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="topic"
                                    value="liquid-loaded">
                                Liquid-Loaded Wells
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="topic" value="methane">
                                Methane Reduction
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="topic" value="selection">
                                Technology Selection
                            </label>

                            <label class="fip-check">
                                <input type="checkbox" class="fip-filter-checkbox" data-filter="topic" value="technology">
                                Technology Comparison
                            </label>
                        </div>
                    </details>

                    <div class="fip-clear-wrap">
                        <button type="button" class="fip-clear-btn" id="fipClearFilters">
                            × Clear all
                        </button>
                    </div>
                </aside>
            </div>
        </section>

        <section class="fip-bottom-cta">
            <div class="fip-container">
                <div class="fip-bottom-cta-inner">
                    <div>
                        <h2>Evaluate compression technology against real field conditions.</h2>
                        <p>
                            If your application involves wet gas, liquid loading, casing pressure,
                            tank vapor recovery, methane reduction, or unstable multiphase flow,
                            Fluidstream can help review the operating conditions and identify the right product pathway.
                        </p>
                    </div>

                    <div class="fip-cta-links">
                        <a href="{{ url('/contact') }}">Request technical application review →</a>
                        <a href="{{ url('/case-studies') }}">Review case studies →</a>
                        <a href="{{ url('/multiphase-compression-technology') }}">Explore technology →</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = Array.from(document.querySelectorAll('.fip-filter-checkbox'));
            const cards = Array.from(document.querySelectorAll('.fip-insight-row'));
            const clearButton = document.getElementById('fipClearFilters');
            const visibleCount = document.getElementById('fipVisibleCount');
            const noResult = document.getElementById('fipNoResult');

            function getSelectedValues(filterName) {
                return checkboxes
                    .filter(function (checkbox) {
                        return checkbox.dataset.filter === filterName && checkbox.checked;
                    })
                    .map(function (checkbox) {
                        return checkbox.value;
                    });
            }

            function matchesGroup(card, filterName, selectedValues) {
                if (selectedValues.length === 0) {
                    return true;
                }

                const cardValue = card.dataset[filterName] || '';
                return selectedValues.includes(cardValue);
            }

            function applyFilters() {
                const selectedIndustry = getSelectedValues('industry');
                const selectedEquipment = getSelectedValues('equipment');
                const selectedTopic = getSelectedValues('topic');

                let count = 0;

                cards.forEach(function (card) {
                    const isVisible =
                        matchesGroup(card, 'industry', selectedIndustry) &&
                        matchesGroup(card, 'equipment', selectedEquipment) &&
                        matchesGroup(card, 'topic', selectedTopic);

                    card.style.display = isVisible ? 'grid' : 'none';

                    if (isVisible) {
                        count++;
                    }
                });

                visibleCount.textContent = count;
                noResult.classList.toggle('is-visible', count === 0);
            }

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', applyFilters);
            });

            clearButton.addEventListener('click', function () {
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });

                applyFilters();
            });
        });
    </script>
@endpush