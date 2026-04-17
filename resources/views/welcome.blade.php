@extends('layouts.app')

@section('content')
    <style>
        :root {
            --bg: #ffffff;
            --bg-alt: #f4f6f8;
            --bg-soft: #eef2f6;
            --panel: #ffffff;
            --panel-alt: #f7f9fc;
            --line: #d9e2ec;
            --line-strong: #c6d2df;
            --text: #102a43;
            --muted: #52667a;
            --accent: #15d1ff;
            --accent-2: #0018dc;
            --accent-dark: #0018dc;
            --white: #ffffff;
            --shadow: 0 18px 45px rgba(16, 42, 67, .08);
            --shadow-hover: 0 24px 60px rgba(0, 24, 220, .18);
            --max: 1240px;
        }


        a {
            color: inherit;
            text-decoration: none
        }

        img {
            max-width: 100%
        }

        .topbar {
            background: var(--bg-soft);
            border-bottom: 1px solid var(--line);
            color: var(--muted);
            font-size: .9rem;
        }

        .topbar .inner,
        .nav .inner,
        .section .inner,
        .footer .inner {
            width: min(var(--max), calc(100% - 40px));
            margin: 0 auto;
        }

        .topbar .inner {
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
        }

        .nav {
            position: sticky;
            top: 0;
            z-index: 10;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid var(--line);
            box-shadow: 0 4px 18px rgba(16, 42, 67, .04);
            backdrop-filter: blur(10px);
        }

        .nav .inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #15d1ff, #0018dc);
            box-shadow: 0 12px 24px rgba(0, 24, 220, .16);
            position: relative;
            overflow: hidden;
        }

        .brand-mark:before,
        .brand-mark:after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, .94);
        }

        .brand-mark:before {
            width: 22px;
            height: 5px;
            left: 10px;
            top: 13px;
            transform: rotate(-38deg);
        }

        .brand-mark:after {
            width: 20px;
            height: 5px;
            left: 15px;
            top: 24px;
            transform: rotate(-38deg);
        }

        .brand-copy strong {
            display: block;
            letter-spacing: .02em;
            font-size: 1.06rem;
            color: var(--text);
        }

        .brand-copy span {
            display: block;
            font-size: .8rem;
            color: var(--muted);
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 26px;
            color: var(--text);
            font-size: .96rem;
        }

        .menu a {
            opacity: .92
        }

        .menu a:hover {
            opacity: 1;
            color: var(--accent-dark)
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--accent-dark), #2544ff);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(0, 24, 220, .14);
            white-space: nowrap;
        }

        .section {
            position: relative;
            padding: 56px 0
        }

        .section:nth-of-type(even) {
            background: var(--bg-alt)
        }

        .section:nth-of-type(odd) {
            background: var(--bg);
        }

        .section+.section {
            border-top: 1px solid rgba(16, 42, 67, .06);
        }

        .hero {
            min-height: auto;
            display: flex;
            align-items: center;
            background:
                radial-gradient(circle at 90% 10%, rgba(21, 209, 255, .12), transparent 18%),
                linear-gradient(180deg, #ffffff 0%, #f4f6f8 100%);
            color: var(--text);
            overflow: hidden;
            position: relative;
            padding: 72px 0 56px;
            border-bottom: 1px solid var(--line);
        }

        .hero::after {
            content: "";
            position: absolute;
            right: -120px;
            top: -80px;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(21, 209, 255, .12), transparent 65%);
            pointer-events: none;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 28px;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--accent-dark);
            background: #edf3ff;
            border: 1px solid #d3e1ff;
            border-radius: 999px;
        }

        .eyebrow .dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--accent);
            box-shadow: 0 0 12px rgba(21, 209, 255, .55);
        }

        .hero h1,
        h1 {
            margin: 0 0 18px;
            max-width: 900px;
            font-size: 64px;
            line-height: 1.02;
            letter-spacing: -.04em;
            color: var(--text);
        }

        .subheadline {
            margin: 0 0 16px;
            max-width: 860px;
            font-size: 28px;
            line-height: 1.22;
            font-weight: 700;
            color: var(--accent-dark);
        }

        .support,
        .hero-lead {
            margin: 0;
            max-width: 820px;
            font-size: 19px;
            line-height: 1.6;
            color: var(--muted);
        }

        .hero-actions,
        .cta-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 20px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: .2s ease;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-1px)
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-dark), #2544ff);
            color: #ffffff;
            box-shadow: 0 12px 28px rgba(0, 24, 220, .14);
        }

        .btn-secondary {
            background: #ffffff;
            color: var(--accent-dark);
            border: 1px solid #c8d6ea;
        }

        .hero-metrics {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 20px;
        }

        .metric {
            padding: 16px 16px 14px;
            border-radius: 0;
            background: #ffffff;
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            transition: background .25s ease, color .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .metric strong {
            display: block;
            font-size: 1.3rem;
            letter-spacing: -.03em;
            margin-bottom: 6px;
            color: var(--text);
            transition: color .25s ease;
        }

        .metric span {
            display: block;
            color: var(--muted);
            font-size: .92rem;
            line-height: 1.45;
            transition: color .25s ease;
        }

        .hero-visual {
            position: relative;
            min-height: 560px;
            border-radius: 0;
            border: 1px solid var(--line);
            background:
                radial-gradient(circle at 75% 18%, rgba(21, 209, 255, .12), transparent 22%),
                radial-gradient(circle at 22% 18%, rgba(0, 24, 220, .08), transparent 24%),
                linear-gradient(180deg, #ffffff, #f7f9fc);
            box-shadow: var(--shadow);
            overflow: hidden;
            padding: 24px;
        }

        .hero-visual:before {
            content: "";
            position: absolute;
            inset: auto -18% -34% auto;
            width: 62%;
            height: 62%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(21, 209, 255, .12), transparent 65%);
            filter: blur(12px);
        }

        .visual-card {
            position: absolute;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 0;
            padding: 16px 18px;
            box-shadow: var(--shadow);
            transition: background .25s ease, color .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .visual-card.small {
            width: 220px
        }

        .visual-card h4 {
            margin: 0 0 8px;
            font-size: .9rem;
            letter-spacing: .02em;
            color: var(--accent-dark);
            text-transform: uppercase;
            transition: color .25s ease;
        }

        .visual-card p {
            margin: 0;
            color: var(--muted);
            font-size: .96rem;
            line-height: 1.5;
            transition: color .25s ease;
        }

        .visual-card.main {
            left: 24px;
            right: 24px;
            bottom: 24px;
            padding: 22px;
        }

        .main-title {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: flex-end;
            margin-bottom: 14px;
        }

        .main-title h3 {
            margin: 0;
            font-size: 1.35rem;
            line-height: 1.15;
            letter-spacing: -.03em;
            color: var(--text);
            transition: color .25s ease;
        }

        .main-title span {
            color: var(--accent-dark);
            font-weight: 700;
            white-space: nowrap;
            transition: color .25s ease;
        }

        .pulse-lines {
            display: none
        }

        .proof {
            padding: 34px 0 34px;
            background: var(--bg);
        }

        .proof-panel,
        .quote-panel {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            gap: 24px;
            padding: 0;
            align-items: center;
            transition: transform .25s ease;
        }

        blockquote {
            margin: 0;
            font-size: clamp(1.14rem, 2vw, 1.5rem);
            line-height: 1.45;
            letter-spacing: -.02em;
            color: var(--text);
        }

        .quote-source,
        .proof-label,
        .quote-slide .source {
            margin-top: 16px;
            color: var(--muted);
            font-size: .95rem;
            font-weight: 700;
        }

        .proof-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: var(--accent-dark);
            margin-top: 0;
            margin-bottom: 18px;
        }

        .quote-wrap {
            position: relative;
            min-height: 190px;
        }

        .quote-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .quote-slide.active {
            opacity: 1;
            transform: translateY(0);
        }

        .quote-slide blockquote {
            margin: 0 0 14px;
            font-size: 26px;
            line-height: 1.36;
            color: var(--text);
            font-weight: 700;
        }

        .quote-stats,
        .proof-stats {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(2, 1fr);
        }

        .stat {
            border-radius: 0;
            padding: 16px;
            background: var(--panel-alt);
            border: 1px solid var(--line);
            color: var(--text);
            box-shadow: var(--shadow);
        }

        .stat strong,
        .stat .value {
            display: block;
            font-size: 1.35rem;
            margin-bottom: 3px;
            letter-spacing: -.03em;
            color: var(--accent-dark);
            transition: color .25s ease;
        }

        .stat span,
        .stat .label {
            color: var(--muted);
            font-size: .92rem;
            transition: color .25s ease;
        }

        .dots {
            display: flex;
            gap: 8px;
            margin-top: 16px
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #c7d4e3;
            transition: background .3s ease, transform .3s ease;
        }

        .dot.active {
            background: var(--accent);
            transform: scale(1.1)
        }

        .proof-cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .proof-card {
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            border-radius: 0;
            border: 1px solid var(--line);
            background: #ffffff;
            padding: 24px;
            box-shadow: var(--shadow);
            transition: transform .32s ease, box-shadow .32s ease, border-color .32s ease;
            isolation: isolate;
        }

        .proof-tag {
            display: inline-flex;
            padding: 8px 10px;
            border-radius: 999px;
            background: #edf3ff;
            color: var(--accent-dark);
            border: 1px solid #d3e1ff;
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 18px;
            transition: background .25s ease, color .22s ease .18s, border-color .25s ease;
        }

        .proof-card h3 {
            margin: 0 0 12px;
            font-size: 1.42rem;
            line-height: 1.14;
            letter-spacing: -.03em;
            color: var(--text);
            transition: color .22s ease .18s;
        }

        .proof-card p {
            flex-grow: 1;
            margin: 0 0 16px;
            color: var(--muted);
            transition: color .22s ease .18s;
        }

        .proof-metric {
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid rgba(16, 42, 67, .10);
        }

        .proof-card:hover .proof-metric {
            margin-top: auto;
            border-top-color: rgba(255, 255, 255, .18);
        }

        .proof-metric {
            margin-top: auto;
            font-size: 1.32rem;
            font-weight: 700;
            letter-spacing: -.02em;
            line-height: 1.2;
            color: var(--accent-dark);
            margin-bottom: 6px;
            transition: color .22s ease .18s;
        }

        .proof-detail {
            color: var(--muted);
            font-size: .95rem;
            font-weight: 500;
            line-height: 1.45;
            letter-spacing: 0;
            transition: color .22s ease .18s;
        }


        .solutions,
        .leadership,
        .tech,
        .caseband,
        .cta {
            padding: 72px 0
        }

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 28px;
            margin-bottom: 28px;
        }

        .section-head h2 {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 14ch;
            color: var(--text);
        }

        .section-head p {
            flex: 0 0 420px;
        }

        .section-head p {
            padding: 4px;
            text-align: justify;
            max-width: 31ch;
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 1.20rem;
            line-height: 1.65;
            font-weight: 500;
            opacity: 1;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            position: relative;
            min-height: 360px;
            border-radius: 0;
            border: 1px solid var(--line);
            background: #ffffff;
            padding: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .card:before {
            display: none
        }

        .card .label {
            display: inline-flex;
            padding: 8px 10px;
            border-radius: 999px;
            background: #edf3ff;
            color: var(--accent-dark);
            border: 1px solid #d3e1ff;
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 18px;
            transition: background .25s ease, color .25s ease, border-color .25s ease;
        }

        .card h3 {
            margin: 0 0 12px;
            font-size: 1.48rem;
            line-height: 1.12;
            letter-spacing: -.03em;
            color: var(--text);
            transition: color .25s ease;
        }

        .card p {
            margin: 0 0 16px;
            color: var(--muted);
            transition: color .25s ease;
        }

        .card ul {
            list-style: none;
            padding: 0;
            margin: 0 0 20px;
            display: grid;
            gap: 10px;
        }

        .card li {
            position: relative;
            padding-left: 24px;
            color: var(--text);
            font-size: .95rem;
            transition: color .25s ease;
        }

        .card li:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.2rem;
            width: 16px;
            height: 12px;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            transition: transform .24s ease;
        }

        .card .link {
            position: absolute;
            left: 24px;
            bottom: 22px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--accent-dark);
            font-weight: 700;
            transition: color .25s ease;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 18px;
        }

        .feature {
            border-radius: 0;
            padding: 22px;
            border: 1px solid var(--line);
            background: #ffffff;
            box-shadow: var(--shadow);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .feature .kicker {
            color: var(--accent-dark);
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 10px;
            display: block;
            transition: color .25s ease;
        }

        .feature h3 {
            margin: 0 0 10px;
            font-size: 1.18rem;
            line-height: 1.15;
            letter-spacing: -.03em;
            color: var(--text);
            transition: color .25s ease;
        }

        .feature p {
            margin: 0;
            color: var(--muted);
            font-size: .95rem;
            transition: color .25s ease;
        }

        .tech-panel {
            padding: 0;
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .tech-grid {
            display: grid;
            grid-template-columns: minmax(0, .95fr) minmax(0, 1.05fr);
            gap: 24px;
            align-items: start;
        }

        .stack {
            display: grid;
            gap: 14px;
        }

        .stack .item {
            border-radius: 0;
            border: 1px solid var(--line);
            background: #ffffff;
            padding: 18px 18px 16px;
            box-shadow: var(--shadow);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .stack .item h4 {
            margin: 0 0 8px;
            font-size: 1.05rem;
            letter-spacing: -.02em;
            color: var(--text);
            transition: color .25s ease;
        }

        .stack .item p {
            margin: 0;
            color: var(--muted);
            font-size: .95rem;
            transition: color .25s ease;
        }

        .case-panel {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 440px;
            gap: 28px;
            padding: 0;
            border: none;
            background: transparent;
            box-shadow: none;
        }

        .case-panel h2 {
            margin: 0 0 10px;
            font-size: clamp(1.8rem, 3vw, 2.8rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 14ch;
            color: var(--text);
        }

        .case-panel p {
            margin: 0 0 16px;
            color: var(--muted);
            max-width: 70ch;
        }

        .impact-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin: 18px 0 22px;
        }

        .impact {
            padding: 16px;
            border-radius: 0;
            border: 1px solid var(--line);
            background: var(--panel-alt);
            box-shadow: var(--shadow);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .impact strong {
            display: block;
            font-size: 1.28rem;
            letter-spacing: -.03em;
            margin-bottom: 4px;
            color: var(--accent-dark);
            transition: color .25s ease;
        }

        .impact span {
            color: var(--muted);
            font-size: .91rem;
            display: block;
            transition: color .25s ease;
        }

        .compare {
            display: grid;
            gap: 12px;
            align-self: stretch;
        }

        .compare-box {
            border: 1px solid var(--line);
            background: #ffffff;
            border-radius: 0;
            padding: 18px;
            box-shadow: var(--shadow);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .compare-box h4 {
            margin: 0 0 12px;
            font-size: 1.02rem;
            color: var(--accent-dark);
            text-transform: uppercase;
            letter-spacing: .04em;
            transition: color .25s ease;
        }

        .compare-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 9px;
        }

        .compare-box li {
            padding-left: 24px;
            position: relative;
            color: var(--text);
            font-size: .94rem;
            transition: color .25s ease;
        }

        .compare-box li:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.18rem;
            width: 16px;
            height: 12px;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            transition: transform .24s ease;
        }

        .cta-panel {
            padding: 0;
            background: transparent;
            border: none;
            box-shadow: none;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cta-panel h2 {
            margin: 0 0 8px;
            font-size: clamp(1.8rem, 3vw, 2.7rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            color: var(--text);
        }

        .cta-panel p {
            margin: 0;
            color: var(--muted);
            max-width: 62ch;
        }

        /* Premium interaction hierarchy */
        .card,
        .feature,
        .stack .item,
        .impact,
        .compare-box,
        .metric,
        .proof-panel,
        .quote-panel,
        .stat,
        .proof-card {
            display: flex;
            flex-direction: column;
            position: relative;
            isolation: isolate;
            overflow: hidden;
        }

        .card>*,
        .feature>*,
        .stack .item>*,
        .impact>*,
        .compare-box>*,
        .metric>*,
        .proof-panel>*,
        .quote-panel>*,
        .stat>*,
        .proof-card>* {
            position: relative;
            z-index: 1;
        }

        /* Tier 1: proof cards only keep the premium wipe */
        .proof-card:hover {
            border-color: #0018dc;
            box-shadow: var(--shadow-hover);
            transform: translateY(-4px);
        }

        .proof-card::before {
            content: "";
            position: absolute;
            inset: -20%;
            background: linear-gradient(180deg, #0018dc, #1433ff);
            transform: translateY(100%);
            transition: transform .56s cubic-bezier(.22, .61, .36, 1);
            z-index: 0;
            border-radius: inherit;
            pointer-events: none;
        }

        .proof-card:hover::before {
            transform: translateY(0);
        }

        .proof-card:hover h3,
        .proof-card:hover p,
        .proof-card:hover .proof-tag,
        .proof-card:hover .proof-metric,
        .proof-card:hover .proof-detail,
        .proof-card:hover * {
            color: #ffffff !important;
        }

        .proof-card:hover .proof-tag {
            background: rgba(255, 255, 255, .14);
            border-color: rgba(255, 255, 255, .28);
            color: #ffffff !important;
        }

        /* Tier 2: solution cards get lift + shadow + sharper border only */
        .card:hover {
            border-color: #6d90ff;
            box-shadow: 0 26px 54px rgba(16, 42, 67, .12);
            transform: translateY(-4px);
            background: #ffffff;
        }

        .card:hover h3,
        .card:hover .link {
            color: var(--accent-dark) !important;
        }

        .card:hover .label {
            background: #edf3ff;
            border-color: #bcd0ff;
            color: var(--accent-dark) !important;
        }

        /* Tier 3: feature cards and technology items */
        .feature:hover,
        .stack .item:hover {
            background: #ffffff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .feature::after,
        .stack .item::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: var(--accent-dark);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s cubic-bezier(.22, .61, .36, 1);
        }

        .feature:hover::after,
        .stack .item:hover::after {
            transform: scaleX(1);
        }

        .feature:hover .kicker,
        .feature:hover h3,
        .stack .item:hover h4 {
            color: var(--accent-dark) !important;
        }

        /* Data-point interactions */
        .impact:hover,
        .metric:hover,
        .stat:hover {
            background: #f4f8ff;
            border-color: #9bb6ff;
            box-shadow: 0 18px 38px rgba(16, 42, 67, .09);
            transform: translateY(-2px);
        }

        .impact:hover strong,
        .metric:hover strong,
        .stat:hover .value,
        .stat:hover strong {
            color: var(--accent-dark) !important;
        }

        .impact:hover span,
        .metric:hover span,
        .stat:hover .label,
        .stat:hover span {
            color: var(--muted) !important;
        }

        /* Analytical compare boxes */
        .compare-box:hover {
            background: #ffffff;
            border-color: #9bb6ff;
            box-shadow: 0 22px 44px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .compare-box:hover::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--accent-dark);
        }

        .compare-box:hover h4 {
            color: var(--accent-dark) !important;
        }

        .card:hover li:before,
        .compare-box:hover li:before {
            transform: translateX(2px);
        }

        /* Large panels stay stable and premium */
        .visual-card:hover {
            background: #ffffff;
            border-color: #9bb6ff;
            box-shadow: 0 24px 50px rgba(16, 42, 67, .10);
            transform: translateY(-2px);
        }

        .footer {
            border-top: none;
            background: #0018dc;
            color: #ffffff;
        }

        .footer h4,
        .footer strong {
            color: #ffffff;
        }

        .footer p,
        .footer li,
        .footer a {
            color: #ffffff;
        }

        .footer a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .footer .inner {
            padding: 34px 0 28px;
            display: grid;
            grid-template-columns: 1.2fr .8fr .8fr .8fr;
            gap: 24px;
        }

        .footer h4 {
            margin: 0 0 12px;
            font-size: 1rem;
            letter-spacing: -.02em;
            color: #ffffff;
        }

        .footer p,
        .footer li,
        .footer a {
            color: #ffffff;
            font-size: .95rem;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 8px;
        }

        .footer-bottom {
            width: min(var(--max), calc(100% - 40px));
            margin: 0 auto;
            border-top: 1px solid var(--line);
            padding: 16px 0 28px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            color: var(--muted);
            font-size: .88rem;
        }

        @media (max-width: 1120px) {

            .hero-grid,
            .tech-grid,
            .case-panel,
            .quote-panel {
                grid-template-columns: 1fr;
            }

            .feature-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .proof-cards {
                grid-template-columns: 1fr;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }

            .footer .inner {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 980px) {
            .hero-grid {
                grid-template-columns: 1fr
            }

            h1 {
                font-size: 50px
            }

            .subheadline {
                font-size: 24px
            }

            .support {
                font-size: 17px
            }

            .proof-panel {
                min-height: auto
            }

            .quote-wrap {
                min-height: 210px
            }
        }

        @media (max-width: 840px) {
            .menu {
                display: none
            }

            .hero {
                padding-top: 52px
            }

            .hero-metrics,
            .impact-grid,
            .feature-grid,
            .proof-stats {
                grid-template-columns: 1fr;
            }

            .proof-cards {
                grid-template-columns: 1fr;
            }

            .section-head {
                align-items: start;
                flex-direction: column;
            }

            .footer .inner {
                grid-template-columns: 1fr;
            }

            .topbar .inner {
                padding: 10px 0 11px
            }
        }

        @media (max-width: 640px) {
            .hero h1 {
                max-width: none
            }

            .case-panel,
            .tech-panel,
            .quote-panel,
            .cta-panel,
            .proof-panel {
                padding: 22px
            }

            .topbar .inner,
            .nav .inner,
            .section .inner,
            .footer .inner,
            .footer-bottom {
                width: min(var(--max), calc(100% - 28px))
            }
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 38px
            }

            .subheadline {
                font-size: 21px
            }

            .support {
                font-size: 16px
            }

            .quote-slide blockquote {
                font-size: 22px
            }

            .proof-stats {
                grid-template-columns: 1fr
            }
        }

        .container {
            max-width: 1200px !important;
        }
    </style>


    <section class="relative min-h-screen overflow-hidden">
        <!-- Background Video -->
        <video autoplay muted loop playsinline class="absolute inset-0 h-full w-full object-cover">
            <source src="{{ asset('/video/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-slate-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/70 via-slate-950/35 to-slate-950/20"></div>

        <!-- Hero Content -->
        <div class="relative z-10 flex min-h-screen items-center ">
            <div class="mx-auto w-full max-w-7xl  container">
                <div
                    class="grid min-h-screen items-center gap-10 py-28 lg:grid-cols-[minmax(0,1.2fr)_minmax(340px,0.8fr)] lg:gap-14">

                    <!-- Left Content -->
                    <div class="max-w-3xl">
                        <h1
                            class="max-w-3xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-white sm:text-5xl md:text-6xl lg:text-[54px]">
                            Reduce Methane Emissions and Increase Oil Production
                        </h1>

                        <div class="mt-5 h-1 w-20 rounded-full bg-sky-400"></div>

                        <p class="mt-7 max-w-2xl text-base font-medium leading-7 text-slate-200 sm:text-lg sm:leading-8">
                            Fluidstream provides reliable, low-maintenance, fully autonomous multiphase compression
                            technology to lower methane emissions and improve production efficiency.
                        </p>

                        <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                            <a href="{{ url('/multiphase-compression') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-sky-500 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-sky-600">
                                Explore Multiphase Compression
                            </a>

                            <a href="{{ url('/contact') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-white/10">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    <!-- Right Quote Card -->
                    <div class="lg:justify-self-end">
                        <div
                            class="max-w-md rounded-[28px] border border-white/15 bg-white/10 p-6 shadow-[0_20px_60px_rgba(15,23,42,0.25)] backdrop-blur-xl sm:p-8">
                            {{-- <span
                                class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200">
                                Customer Quote
                            </span> --}}

                            <blockquote
                                class="mt-5 text-lg font-semibold leading-8 text-white sm:text-[1.35rem] sm:leading-9">
                                “Fluidstream’s unit has operated consistently and eliminated gas venting. Since installation
                                17 months ago, the unit has provided 100% uptime and has not required any maintenance.”
                            </blockquote>

                            <div class="mt-6">
                                <p class="text-sm font-semibold text-white">
                                    VP Production, Allied Energy II Corp.
                                </p>
                            </div>

                            <div class="mt-7">
                                <a href="{{ url('/case-study') }}"
                                    class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition duration-300 hover:bg-slate-100">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="section proof py-5">
        <div class="inner container">
            <div class="section-head" style="margin-bottom:18px">
                <h2>Case-study proof from real field performance.</h2>
                <p>
                    Fluidstream’s strongest credibility comes from measurable field outcomes: uptime, lower maintenance,
                    reduced
                    emissions, and meaningful production or revenue improvement under real operating conditions.
                </p>
            </div>

            <div class="proof-cards">
                <article class="proof-card">
                    <div class="proof-tag">Allied Energy II</div>
                    <h3>100% uptime over 17+ months with no maintenance.</h3>
                    <p>
                        Fluidstream’s unit operated consistently, eliminated gas venting, and delivered continuous, reliable
                        performance in extreme cold-weather field conditions.
                    </p>
                    <div class="proof-metric">100% uptime</div>
                    <div class="proof-detail">17+ months • 0 maintenance • continuous operation below -40°C • gas venting
                        eliminated</div>
                </article>

                <article class="proof-card">
                    <div class="proof-tag">Vapor Recovery</div>
                    <h3>4.5+ years of reliable vapor recovery with one seal change.</h3>
                    <p>
                        A southern Alberta producer used VaporCommander™ to capture tank vapors, reduce emissions, and avoid
                        the
                        ongoing maintenance burden associated with conventional VRU systems.
                    </p>
                    <div class="proof-metric">35 months before first seal change</div>
                    <div class="proof-detail">1 seal change over reported operating life • reduced service intervention •
                        extended
                        seal life performance</div>
                </article>

                <article class="proof-card">
                    <div class="proof-tag">Multiphase Production</div>
                    <h3>From virtually no production to more than C$1.5M/year in incremental revenue.</h3>
                    <p>
                        Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded wells in Alberta, restoring gas
                        and
                        condensate production without requiring additional separation infrastructure.
                    </p>
                    <div class="proof-metric">C$1.5M+</div>
                    <div class="proof-detail">10e3 m³/d gas restored • 5 m³/d condensate • no added separation equipment
                    </div>
                </article>
            </div>
        </div>
    </section>


    <section class="section solutions">
        <div class="inner container">
            <div class="section-head">
                <h2>One platform. Three commercial value cases.</h2>
                <p>
                    Fluidstream’s technology platform supports three core application areas where operators need lower
                    emissions,
                    stronger uptime, and better performance under real field conditions.
                </p>
            </div>

            <div class="card-grid">
                <article class="card">
                    <div class="label">MultiphaseCommander™</div>
                    <h3>Move untreated multiphase flow and lower backpressure.</h3>
                    <p>
                        MultiphaseCommander™ is built for the real gathering challenge: gas, oil, water, and condensate
                        moving
                        together while rising backpressure holds production back.
                    </p>
                    <ul>
                        <li>Boost the full stream instead of forcing early separation</li>
                        <li>Support centralized processing and leaner pad layouts</li>
                        <li>Improve operating conditions for low-pressure and liquid-loaded systems</li>
                    </ul>
                    <a class="link" href="/multiphase-compression">Explore
                        MultiphaseCommander™
                        →</a>
                </article>

                <article class="card">
                    <div class="label">VaporCommander™</div>
                    <h3>Recover vapors in the real field stream, not an idealized gas-only stream.</h3>
                    <p>
                        VaporCommander™ is designed for what many sites already know: entrained liquids, slugs, and unstable
                        flow
                        are normal, and they punish conventional gas-only VRUs.
                    </p>
                    <ul>
                        <li>Recover value while reducing venting and emissions exposure</li>
                        <li>Reduce dependence on support equipment around the compressor</li>
                        <li>Extend vapor recovery into harder, mixed-phase applications</li>
                    </ul>
                    <a class="link" href="/vapor-recovery">Explore Vapor Recovery →</a>
                </article>

                <article class="card">
                    <div class="label">CompressionCommander™</div>
                    <h3>Stop compressing casing gas like it is clean gas.</h3>
                    <p>
                        CompressionCommander™ is built for casing gas service where variable gas quality, liquid carryover,
                        slugs,
                        H₂S exposure, and unstable operating conditions demand a different approach.
                    </p>
                    <ul>
                        <li>Built for upset conditions that trip conventional packages</li>
                        <li>Autonomous controls help mitigate liquid-slug and damage risk</li>
                        <li>Support cleaner, more productive site operation</li>
                    </ul>
                    <a class="link" href="/casing-gas-compression">Explore Casing Gas
                        Compression
                        →</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section leadership">
        <div class="inner container">
            <div class="section-head">
                <h2>Designed for reliability, cost efficiency, autonomous control, and field flexibility.</h2>
                <p>
                    Fluidstream is engineered to deliver dependable field performance, lower maintenance, broader operating
                    flexibility, and stronger economics than conventional gas-only systems in difficult service.
                </p>
            </div>

            <div class="feature-grid">
                <div class="feature">
                    <span class="kicker">Economic value</span>
                    <h3>More value recovered from a harder stream.</h3>
                    <p>Replace wasted gas, avoid excess support equipment, and open applications that become unattractive
                        when
                        conventional packages need ideal inlet conditions.</p>
                </div>

                <div class="feature">
                    <span class="kicker">True multiphase performance</span>
                    <h3>Built to handle gas and liquids together.</h3>
                    <p>Fluidstream’s platform is designed to manage liquids inside the compression process instead of
                        treating
                        liquid presence as a failure mode that must be engineered around.</p>
                </div>

                <div class="feature">
                    <span class="kicker">Autonomous operation</span>
                    <h3>Control logic that responds to upset conditions.</h3>
                    <p>Piston tracking and control architecture are positioned to help the system respond to slugs, solids
                        buildup, ice risk, and changing flow behavior without constant intervention.</p>
                </div>

                <div class="feature">
                    <span class="kicker">Operating range</span>
                    <h3>Broad deployment across challenging field conditions.</h3>
                    <p>The broader product messaging highlights electric and gas-drive options, H₂S capability, cold-weather
                        startup, remote control, and tougher-service readiness.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section tech">
        <div class="inner container">
            <div class="tech-panel">
                <div class="section-head" style="margin-bottom:18px">
                    <h2>Patented technology that sells on outcomes, not just mechanism.</h2>
                    <p>
                        Fluidstream’s patented technology is built to improve control, efficiency, and reliability in field
                        applications where liquids, slugs, and unstable operating conditions limit conventional compression
                        systems.
                    </p>
                </div>

                <div class="tech-grid">
                    <div class="stack">
                        <div class="item">
                            <h4>Liquid handling inside compression</h4>
                            <p>Fluidstream’s technology is designed to safely and efficiently manage incompressible liquids
                                within the
                                compression chamber, reducing dependence on upstream separation and expanding the range of
                                viable field
                                applications.</p>
                        </div>
                        <div class="item">
                            <h4>Sealed gland protection with wear awareness</h4>
                            <p>Advanced gland sealing and electronic seal wear detection support safer, more controlled
                                operation in
                                hazardous, mixed-phase duty while helping reduce reactive maintenance exposure.</p>
                        </div>
                        <div class="item">
                            <h4>Piston tracking and smarter system response</h4>
                            <p>Piston-location awareness supports response against slugs, solids buildup, and changing
                                conditions,
                                strengthening system protection and reliability in unstable field service.</p>
                        </div>
                    </div>

                    <div class="stack">
                        <div class="item">
                            <h4>Power efficiency through cycle control</h4>
                            <p>A patented cycle-control approach slows the final stage of compression and redistributes
                                speed earlier
                                in the stroke where power demand is lower, helping improve operating efficiency.</p>
                        </div>
                        <div class="item">
                            <h4>Autonomous protection in upset conditions</h4>
                            <p>Autonomous logic is designed to keep operating through multiphase and gas-only upset
                                conditions with
                                reduced operator intervention and stronger protection against avoidable downtime.</p>
                        </div>
                        <div class="item">
                            <h4>Field-ready configurations</h4>
                            <p>Electric and gas-drive options, H₂S handling, cold-weather startup, and remote control
                                broaden
                                deployment flexibility for operators evaluating real-world field fit.</p>
                        </div>
                    </div>
                </div>

                <div style="margin-top:22px;display:flex;gap:12px;flex-wrap:wrap">
                    <a class="btn btn-primary" href="https://fluidstream.nexolioit.com/technology">Explore Technology</a>
                    <a class="btn btn-secondary"
                        href="https://fluidstream.nexolioit.com/multiphase-compression-technology">View
                        Key Features</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section caseband">
        <div class="inner container">
            <div class="case-panel">
                <div>
                    <div class="eyebrow" style="margin-bottom:16px"><span class="dot"></span> Case study snapshot</div>
                    <h2>From virtually no production to more than C$1.5 million per year in incremental revenue.</h2>
                    <p>
                        In Alberta, Canada, Fluidstream’s multiphase technology helped revive two liquid-loaded wells that
                        could no
                        longer overcome rising pipeline pressure. The result was restored production, recovered condensate,
                        dependable operation in highly variable multiphase conditions, and no added separation equipment.
                    </p>

                    <div class="impact-grid">
                        <div class="impact">
                            <strong>10e3 m³/d</strong>
                            <span>Combined gas production restored across both wells after installation.</span>
                        </div>
                        <div class="impact">
                            <strong>5 m³/d</strong>
                            <span>Daily condensate production recovered without added separation infrastructure.</span>
                        </div>
                        <div class="impact">
                            <strong>C$1.5M+ per year</strong>
                            <span>Estimated annual incremental revenue based on April 2026 commodity pricing.</span>
                        </div>
                    </div>

                    <blockquote style="font-size:1.08rem;max-width:68ch">
                        “Fluidstream’s MultiphaseCommander didn’t just improve performance—it completely transformed two
                        dead wells
                        into revenue-generating assets.”
                    </blockquote>

                    <div style="margin-top:18px">
                        <a class="btn btn-primary" href="/case-studies">Read Case
                            Studies</a>
                    </div>
                </div>

                <div class="compare">
                    <div class="compare-box">
                        <h4>Conventional field setup</h4>
                        <ul>
                            <li>Gas-only assumptions at the package inlet</li>
                            <li>Extra separators, scrubbers, and support equipment</li>
                            <li>Higher maintenance exposure when liquids and slugs appear</li>
                            <li>More site complexity and more points of failure</li>
                        </ul>
                    </div>
                    <div class="compare-box">
                        <h4>Fluidstream direction</h4>
                        <ul>
                            <li>Work on the real stream where gas and liquids move together</li>
                            <li>Support simplified facility architecture in suitable applications</li>
                            <li>Use autonomous controls and piston awareness to mitigate upset risk</li>
                            <li>Position the package as a production and emissions solution, not just a compressor</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section cta">
        <div class="inner container">
            <div class="cta-panel">
                <div>
                    <h2>Evaluate whether Fluidstream can simplify your production system.</h2>
                    <p>
                        Built for engineers, production teams, and decision-makers evaluating multiphase compression for
                        VaporCommander™, CompressionCommander™, and mixed-phase gathering applications. Submit the operating
                        conditions and Fluidstream can assess the technical and economic fit.
                    </p>
                </div>
                <div style="display:flex;gap:12px;flex-wrap:wrap">
                    <a class="btn btn-primary" href="https://fluidstream.nexolioit.com/contact">Request Technical Review</a>
                    <a class="btn btn-secondary" href="https://fluidstream.nexolioit.com/multiphase-compression">Review
                        MultiphaseCommander™ Specifications</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        const slides = document.querySelectorAll('.quote-slide');
        const dots = document.querySelectorAll('.dot');
        let current = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }

        if (slides.length && dots.length) {
            setInterval(() => {
                current = (current + 1) % slides.length;
                showSlide(current);
            }, 4500);
        }
    </script>

@endsection