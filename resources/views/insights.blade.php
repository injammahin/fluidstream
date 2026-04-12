@extends('layouts.app')

@section('content')
    <section class="insights-page">
        <div class="insights-container">
            <div class="insights-tabs" role="tablist" aria-label="Insights Tabs">
                <button type="button" class="insights-tab active" data-tab="case-studies" role="tab"
                    aria-selected="true">
                    Case Studies
                </button>

                <button type="button" class="insights-tab" data-tab="perspectives" role="tab"
                    aria-selected="false">
                    Perspectives
                </button>
            </div>

            <div class="insights-content">
                <!-- Case Studies Tab -->
                <div class="insights-panel active" id="case-studies" role="tabpanel">
                    <div class="insights-heading-wrap">
                        <span class="insights-label">Insights</span>
                        <h1 class="insights-title">Case Studies</h1>
                        <p class="insights-subtitle">
                            Explore practical implementation stories, project outcomes, and real-world use cases.
                        </p>
                    </div>

                    <div class="insights-grid">
                        <article class="insight-card">
                            <span class="insight-card__tag">Case Study</span>
                            <h3 class="insight-card__title">Multiphase Compression Deployment</h3>
                            <p class="insight-card__text">
                                See how simplified infrastructure reduced operating complexity and improved production
                                performance.
                            </p>
                            <a href="#" class="insight-card__link">Read More</a>
                        </article>

                        <article class="insight-card">
                            <span class="insight-card__tag">Case Study</span>
                            <h3 class="insight-card__title">Vapor Recovery Optimization</h3>
                            <p class="insight-card__text">
                                A field implementation focused on recovering value from variable vapor streams with lower
                                maintenance needs.
                            </p>
                            <a href="#" class="insight-card__link">Read More</a>
                        </article>

                        <article class="insight-card">
                            <span class="insight-card__tag">Case Study</span>
                            <h3 class="insight-card__title">Casing Gas Compression Results</h3>
                            <p class="insight-card__text">
                                Review the technical and economic impact of handling low-pressure gas streams more
                                efficiently.
                            </p>
                            <a href="#" class="insight-card__link">Read More</a>
                        </article>
                    </div>
                </div>

                <!-- Perspectives Tab -->
                <div class="insights-panel" id="perspectives" role="tabpanel">
                    <div class="insights-heading-wrap">
                        <span class="insights-label">Insights</span>
                        <h1 class="insights-title">Perspectives</h1>
                        <p class="insights-subtitle">
                            Read strategic viewpoints, industry thinking, and technical perspectives shaping the future.
                        </p>
                    </div>

                    <div class="insights-grid">
                        <article class="insight-card">
                            <span class="insight-card__tag">Perspective</span>
                            <h3 class="insight-card__title">Rethinking Production Systems</h3>
                            <p class="insight-card__text">
                                Why simplified flow-through production models are becoming more important in modern field
                                design.
                            </p>
                            <a href="#" class="insight-card__link">Read More</a>
                        </article>

                        <article class="insight-card">
                            <span class="insight-card__tag">Perspective</span>
                            <h3 class="insight-card__title">Lower Cost, Broader Deployment</h3>
                            <p class="insight-card__text">
                                A closer look at how lower complexity systems can unlock wider application opportunities.
                            </p>
                            <a href="#" class="insight-card__link">Read More</a>
                        </article>

                        <article class="insight-card">
                            <span class="insight-card__tag">Perspective</span>
                            <h3 class="insight-card__title">The Role of Emissions Reduction</h3>
                            <p class="insight-card__text">
                                Understanding how technology decisions can improve operational efficiency and reduce waste.
                            </p>
                            <a href="#" class="insight-card__link">Read More</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .insights-page {
            background: #f5f5f5;
            padding: 48px 0 80px;
        }

        .insights-container {
            width: min(1440px, calc(100% - 48px));
            margin: 0 auto;
        }

        .insights-tabs {
            display: flex;
            align-items: stretch;
            gap: 0;
            border-top: 1px solid #cfcfcf;
            margin-bottom: 48px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .insights-tabs::-webkit-scrollbar {
            display: none;
        }

        .insights-tab {
            position: relative;
            appearance: none;
            border: 0;
            background: transparent;
            color: #6f6f6f;
            font-size: 22px;
            font-weight: 400;
            line-height: 1.15;
            padding: 24px 42px 18px;
            cursor: pointer;
            white-space: nowrap;
            transition: color .25s ease;
        }

        .insights-tab::before {
            content: "";
            position: absolute;
            top: 0;
            left: 18px;
            right: 18px;
            height: 6px;
            background: transparent;
            transition: background .25s ease;
        }

        .insights-tab.active {
            color: #0b1e8a;
        }

        .insights-tab.active::before {
            background: #0b1e8a;
        }

        .insights-content {
            position: relative;
        }

        .insights-panel {
            display: none;
            animation: insightsFade .28s ease;
        }

        .insights-panel.active {
            display: block;
        }

        @keyframes insightsFade {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .insights-heading-wrap {
            max-width: 760px;
            margin-bottom: 34px;
        }

        .insights-label {
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #0b1e8a;
            margin-bottom: 10px;
        }

        .insights-title {
            margin: 0;
            font-size: clamp(40px, 6vw, 72px);
            line-height: .98;
            letter-spacing: -.04em;
            color: #111111;
            font-weight: 500;
        }

        .insights-subtitle {
            margin: 18px 0 0;
            font-size: 20px;
            line-height: 1.7;
            color: #535353;
        }

        .insights-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .insight-card {
            background: #ffffff;
            border: 1px solid #d8d8d8;
            border-radius: 24px;
            padding: 28px;
            min-height: 260px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .insight-card:hover {
            transform: translateY(-2px);
            border-color: #c7c7c7;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
        }

        .insight-card__tag {
            display: inline-flex;
            width: fit-content;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #0b1e8a;
            margin-bottom: 18px;
        }

        .insight-card__title {
            margin: 0 0 16px;
            font-size: 32px;
            line-height: 1.02;
            letter-spacing: -.035em;
            font-weight: 500;
            color: #111111;
        }

        .insight-card__text {
            margin: 0;
            font-size: 18px;
            line-height: 1.8;
            color: #4f4f4f;
            flex-grow: 1;
        }

        .insight-card__link {
            margin-top: 26px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: 600;
            color: #1638ff;
            text-decoration: none;
        }

        .insight-card__link::after {
            content: "→";
            font-size: 22px;
            line-height: 1;
        }

        @media (max-width: 1199px) {
            .insights-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .insights-tab {
                font-size: 24px;
                padding: 22px 28px 16px;
            }
        }

        @media (max-width: 767px) {
            .insights-page {
                padding: 34px 0 56px;
            }

            .insights-container {
                width: min(100% - 28px, 1440px);
            }

            .insights-tabs {
                margin-bottom: 30px;
            }

            .insights-tab {
                font-size: 20px;
                padding: 18px 20px 14px;
            }

            .insights-tab::before {
                left: 10px;
                right: 10px;
                height: 5px;
            }

            .insights-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .insight-card {
                min-height: auto;
                padding: 22px;
                border-radius: 20px;
            }

            .insight-card__title {
                font-size: 26px;
            }

            .insight-card__text,
            .insights-subtitle {
                font-size: 16px;
                line-height: 1.7;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.insights-tab');
            const panels = document.querySelectorAll('.insights-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-tab');

                    tabs.forEach(item => {
                        item.classList.remove('active');
                        item.setAttribute('aria-selected', 'false');
                    });

                    panels.forEach(panel => {
                        panel.classList.remove('active');
                    });

                    this.classList.add('active');
                    this.setAttribute('aria-selected', 'true');

                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection