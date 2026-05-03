@extends('layouts.app')

@section('content')<style>
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
            /* padding: 56px 0 */
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
            align-items: stretch;
        }


        .proof-cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            align-items: stretch;
        }

        .proof-card {
            display: grid;
            grid-template-rows: auto auto 1fr auto auto;
            height: 100%;
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
            margin: 0 0 18px;
            color: var(--muted);
            transition: color .22s ease .18s;
        }

        .proof-metric {
            margin-top: 0;
            min-height: 56px;
            padding-top: 16px;
            border-top: 1px solid rgba(16, 42, 67, .10);
            font-size: 1.32rem;
            font-weight: 700;
            letter-spacing: -.02em;
            line-height: 1.2;
            color: var(--accent-dark);
            margin-bottom: 6px;
            transition: color .22s ease .18s, border-color .22s ease .18s;
        }

        .proof-detail {
            min-height: 72px;
            color: var(--muted);
            font-size: .95rem;
            font-weight: 500;
            line-height: 1.45;
            letter-spacing: 0;
            transition: color .22s ease .18s;
        }

        .proof-card:hover .proof-metric {
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


        /* .solutions,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .leadership,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .tech,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .caseband,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .cta {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                padding: 72px 0
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } */

        .section-head {
            /* display: flex;
                                                                                                                                                                                                                                                                                                                                    justify-content: space-between;
                                                                                                                                                                                                                                                                                                                                    align-items: flex-start;
                                                                                                                                                                                                                                                                                                                                    gap: 28px; */
            margin-bottom: 28px;
        }

        .section-head h2 {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1.05;
            letter-spacing: -.04em;
            max-width: 24ch;
            color: var(--text);
        }

        .section-head p {
            flex: 0 0 420px;
        }

        .section-head p {
            padding: 4px;
            text-align: justify;
            max-width: 59ch;
            margin: 6px 0 0;
            /* color: var(--muted); */
            /* font-size: 1.20rem; */
            line-height: 1.65;
            /* font-weight: 500; */
            opacity: 1;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            position: relative;
            min-height: 500px;
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
            right: 15px;
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

        .tech-grid-equal {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px 24px;
            align-items: stretch;
        }

        .tech-grid-equal .item {
            height: 100%;
            min-height: 175px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            border: 1px solid var(--line);
            background: #ffffff;
            padding: 18px 18px 16px;
            box-shadow: var(--shadow);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .tech-grid-equal .item h4 {
            margin: 0 0 8px;
            font-size: 1.05rem;
            letter-spacing: -.02em;
            color: var(--text);
            transition: color .25s ease;
        }

        .tech-grid-equal .item p {
            margin: 0;
            color: var(--muted);
            font-size: .95rem;
            line-height: 1.55;
            transition: color .25s ease;
        }

        .tech-grid-equal .item:hover {
            background: #ffffff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .tech-grid-equal .item::after {
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

        .tech-grid-equal .item:hover::after {
            transform: scaleX(1);
        }

        @media (max-width: 1120px) {
            .tech-grid-equal {
                grid-template-columns: 1fr;
            }

            .tech-grid-equal .item {
                min-height: auto;
            }
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
            max-width: 22ch;
            color: var(--text);
        }

        .case-panel p {
            margin: 0 0 16px;
            color: var(--muted);
            max-width: 59ch;
            text-align: justify;
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
        .proof-view-link,
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

        .hero-quote-slide {
            pointer-events: none;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .hero-quote-slide.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
            position: relative;
        }

        .hero-dot {
            width: 10px;
            height: 10px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.35);
            border: none;
            cursor: pointer;
            transition: all .3s ease;
            flex: 0 0 auto;
        }

        /* .kicker {
                                                                                                                                                                                                                                                                                                                                                                    display: block;
                                                                                                                                                                                                                                                                                                                                                                    margin: 0 0 14px;
                                                                                                                                                                                                                                                                                                                                                                    font-size: 13px !important;
                                                                                                                                                                                                                                                                                                                                                                    font-weight: 700 !important;
                                                                                                                                                                                                                                                                                                                                                                    letter-spacing: .16em;
                                                                                                                                                                                                                                                                                                                                                                    text-transform: uppercase;
                                                                                                                                                                                                                                                                                                                                                                    color: var(--accent-dark) !important;
                                                                                                                                                                                                                                                                                                                                                                } */

        .hero-dot.active {
            background: #38bdf8;
            transform: scale(1.15);
        }

        .hero-quote-card {
            width: 100%;
            max-width: 460px;
            min-height: 360px;
            padding: 24px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, .42);
            background: linear-gradient(180deg, rgba(255, 255, 255, .92) 0%, rgba(237, 243, 255, .88) 100%);
            box-shadow: 0 20px 48px rgba(15, 23, 42, .14);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hero-quote-stage {
            position: relative;
            min-height: 205px;
        }

        .hero-quote-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity .65s ease, transform .65s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hero-quote-slide.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .hero-quote-text {
            margin: 0;
            color: #102a43;
            font-size: clamp(1rem, 1.35vw, 1.35rem);
            line-height: 1.6;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .hero-quote-meta {
            margin-top: 20px;
            padding-top: 14px;
            border-top: 1px solid rgba(16, 42, 67, .10);
        }

        .hero-quote-author {
            margin: 0;
            color: #52667a;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 600;
        }

        .hero-quote-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-top: 16px;
        }

        .hero-quote-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 0 18px;
            border-radius: 12px;
            background: #0018dc;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #0018dc;
            transition: all .25s ease;
        }

        .hero-quote-btn:hover {
            background: #1433ff;
            border-color: #1433ff;
            color: #ffffff;
        }

        .hero-quote-dots {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hero-dot {
            width: 9px;
            height: 9px;
            border-radius: 9999px;
            border: none;
            padding: 0;
            background: rgba(0, 24, 220, .18);
            cursor: pointer;
            transition: all .25s ease;
            flex: 0 0 auto;
        }

        .hero-dot.active {
            background: #15d1ff;
            transform: scale(1.12);
            box-shadow: 0 0 0 3px rgba(21, 209, 255, .14);
        }

        @media (max-width: 1024px) {
            .hero-quote-card {
                max-width: 430px;
                min-height: 420px;
            }

            .hero-quote-stage {
                min-height: 270px;
            }
        }

        @media (max-width: 640px) {
            .hero-quote-card {
                max-width: 100%;
                min-height: auto;
                padding: 20px;
                border-radius: 16px;
            }

            .hero-quote-stage {
                min-height: 250px;
            }

            .hero-quote-text {
                font-size: 1rem;
                line-height: 1.58;
            }

            .hero-quote-footer {
                flex-wrap: wrap;
                align-items: flex-start;
            }
        }
    </style>


    <style>
        .fs-home-hero {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            isolation: isolate;
        }

        .fs-home-hero-video {
            position: absolute;
            inset: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: -3;
        }

        .fs-home-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background: rgba(2, 8, 23, .38);
        }

        .fs-home-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background-color: #02061759;
            /* background: radial-gradient(circle at 72% 22%, rgb(21 209 255 / 0%), transparent 26%), linear-gradient(90deg, rgb(2 6 23 / 11%) 0%, rgb(2 6 23 / 0%) 43%, rgb(0 24 220 / 0%) 100%); */
        }

        .fs-home-hero-inner {
            width: min(1320px, calc(100% - 48px));
            max-width: 1200px;
            margin: 0 auto;
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(420px, .95fr);
            align-items: center;
            gap: 54px;
            padding: 96px 0 72px;
        }

        .fs-home-hero-copy {
            max-width: 720px;
        }

        .fs-home-hero-title {
            margin: 0;
            max-width: 760px;
            color: #ffffff;
            font-size: clamp(28px, 4.5vw, 54px);
            line-height: .98;
            letter-spacing: -.065em;
            font-weight: 800;
        }

        .fs-home-hero-line {
            margin-top: 24px;
            height: 4px;
            width: 80px;
            border-radius: 999px;
            background: #38bdf8;
        }

        .fs-home-hero-lead {
            margin: 26px 0 0;
            max-width: 760px;
            color: rgba(255, 255, 255, .88);
            font-size: clamp(17px, 1.45vw, 23px);
            line-height: 1.55;
            font-weight: 700;
        }

        .fs-home-hero-support {
            margin: 14px 0 0;
            max-width: 690px;
            color: rgba(255, 255, 255, .82);
            font-size: clamp(16px, 1.15vw, 19px);
            line-height: 1.65;
            font-weight: 500;
        }

        .fs-home-hero-actions {
            margin-top: 34px;
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .fs-home-hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 0 22px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 800;
            transition: transform .25s ease, background .25s ease, border-color .25s ease, box-shadow .25s ease;
        }

        .fs-home-hero-btn-primary {
            background: #0ea5e9;
            color: #ffffff;
            border: 1px solid #0ea5e9;
        }

        .fs-home-hero-btn-primary:hover {
            background: #0284c7;
            border-color: #0284c7;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(14, 165, 233, .22);
        }

        .fs-home-hero-btn-secondary {
            background: rgba(255, 255, 255, .06);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, .22);
        }

        .fs-home-hero-btn-secondary:hover {
            background: rgba(255, 255, 255, .12);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .fs-home-metric-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 36px;
        }

        .fs-home-metric-card {
            min-height: 165px;
            padding: 22px;
            border-radius: 7px;
            border: 1px solid rgba(255, 255, 255, .20);
            background: rgba(255, 255, 255, .08);
            box-shadow: 0 18px 45px rgba(0, 0, 0, .16);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: transform .25s ease, border-color .25s ease, background .25s ease;
        }

        .fs-home-metric-card:hover {
            transform: translateY(-3px);
            /* border-color: rgba(21, 209, 255, .50); */
            background: rgba(255, 255, 255, .12);
        }

        .fs-home-metric-card strong {
            display: block;
            margin-bottom: 10px;
            color: #ffffff;
            font-size: clamp(20px, 1.6vw, 25px);
            line-height: 1.1;
            letter-spacing: -.04em;
            font-weight: 900;
        }

        .fs-home-metric-card span {
            display: block;
            color: rgba(226, 232, 240, .92);
            font-size: 15px;
            line-height: 1.65;
            font-weight: 600;
        }

        .fs-home-proof-card {
            width: 100%;
            max-width: 580px;
            justify-self: end;
            padding: 34px 34px 32px;
            border-radius: 7px;
            /* border: 1px solid rgba(255, 255, 255, .22); */
            /* background:
                                                                                                                                                                                                        radial-gradient(circle at 88% 18%, rgba(21, 209, 255, .12), transparent 28%),
                                                                                                                                                                                                        linear-gradient(145deg, rgba(255, 255, 255, .13), rgba(255, 255, 255, .07)); */
            /* box-shadow: 0 26px 70px rgba(0, 0, 0, .25); */
            /* backdrop-filter: blur(16px); */
            -webkit-backdrop-filter: blur(16px);
        }

        .fs-home-proof-card h2 {
            margin: 0 0 24px;
            color: #ffffff;
            font-size: clamp(21px, 1.9vw, 30px);
            line-height: 1.35;
            letter-spacing: -.04em;
            font-weight: 900;
        }

        .fs-home-proof-card blockquote {
            margin: 0;
            color: #ffffff;
            font-size: clamp(16px, 1.2vw, 22px);
            line-height: 1.35;
            letter-spacing: -.035em;
            font-weight: 750;
        }

        .fs-home-proof-card cite {
            display: block;
            margin-top: 22px;
            color: rgba(226, 232, 240, .88);
            font-style: normal;
            font-size: 15px;
            line-height: 1.5;
            font-weight: 850;
        }

        .fs-home-proof-list {
            display: grid;
            gap: 14px;
            margin-top: 30px;
        }

        .fs-home-proof-item {
            display: flex;
            align-items: center;
            min-height: 58px;
            padding: 16px 18px;
            border-radius: 7px;
            border: 1px solid rgba(255, 255, 255, .18);
            background: rgba(255, 255, 255, .08);
            color: #ffffff;
            font-size: 16px;
            line-height: 1.35;
            font-weight: 850;
        }

        @media (max-width: 1180px) {
            .fs-home-hero-inner {
                grid-template-columns: 1fr;
                gap: 38px;
            }

            .fs-home-hero-copy {
                max-width: 880px;
            }

            .fs-home-proof-card {
                justify-self: start;
                max-width: 760px;
            }
        }

        @media (max-width: 760px) {
            .fs-home-hero-inner {
                width: min(100%, calc(100% - 28px));
                padding: 72px 0 54px;
            }

            .fs-home-hero-title {
                font-size: clamp(40px, 13vw, 62px);
            }

            .fs-home-metric-grid {
                grid-template-columns: 1fr;
                margin-top: 28px;
            }

            .fs-home-metric-card {
                min-height: auto;
            }

            .fs-home-proof-card {
                padding: 26px 22px;
                border-radius: 22px;
            }

            .fs-home-proof-list {
                gap: 10px;
            }

            .fs-home-proof-item {
                min-height: auto;
                font-size: 15px;
            }
        }

        @media (max-width: 520px) {
            .fs-home-hero-actions {
                flex-direction: column;
            }

            .fs-home-hero-btn {
                width: 100%;
            }
        }
    </style>

    <section class="fs-home-hero" aria-labelledby="home-hero-title">
        <video autoplay muted loop playsinline class="fs-home-hero-video">
            <source src="{{ asset('/video/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="fs-home-hero-inner">
            <div class="fs-home-hero-copy">
                <h1 id="home-hero-title" class="fs-home-hero-title">
                    Reduce Methane Emissions and Increase Oil Production
                </h1>

                <div class="fs-home-hero-line"></div>

                <p class="fs-home-hero-lead">
                    Patented multiphase compression built for liquids, slugs, and real field conditions.
                </p>

                <p class="fs-home-hero-support">
                    Field-proven to restore shut-in wells and generate more than C$1.5M/year in incremental revenue.
                </p>

                <div class="fs-home-hero-actions">
                    <a href="{{ url('/multiphase-compression') }}" class="fs-home-hero-btn fs-home-hero-btn-primary">
                        Explore Multiphase Compression
                    </a>

                    <a href="{{ url('/contact') }}" class="fs-home-hero-btn fs-home-hero-btn-secondary">
                        Request Technical Review
                    </a>
                </div>

                <div class="fs-home-metric-grid">
                    <div class="fs-home-metric-card">
                        <strong>C$1.5M+</strong>
                        <span>estimated annual incremental revenue in one Alberta field case study</span>
                    </div>

                    <div class="fs-home-metric-card">
                        <strong>0–10e³ m³/d</strong>
                        <span>gas production restored across two liquid-loaded wells in one deployment</span>
                    </div>

                    <div class="fs-home-metric-card">
                        <strong>35 months</strong>
                        <span>to first reported seal change in one vapor recovery installation</span>
                    </div>
                </div>
            </div>

            <aside class="fs-home-proof-card fs-home-quote-card" aria-label="Cycling field proof quotes">
                <div class="fs-home-quote-card-glow"></div>

                <div class="fs-home-quote-stage">
                    <article class="fs-home-quote-slide active">
                        <span class="fs-home-quote-metric">Revenue Impact</span>

                        <p class="fs-home-quote-text">
                            “C$1.5M+ annual incremental revenue from restored production.”
                        </p>

                        <span class="fs-home-quote-source">
                            — Alberta Production Recovery Operator
                        </span>
                    </article>

                    <article class="fs-home-quote-slide">
                        <span class="fs-home-quote-metric">Reliability</span>

                        <p class="fs-home-quote-text">
                            “100% uptime with no maintenance since installation.”
                        </p>

                        <span class="fs-home-quote-source">
                            — Allied Energy II
                        </span>
                    </article>

                    <article class="fs-home-quote-slide">
                        <span class="fs-home-quote-metric">Mechanical Longevity</span>

                        <p class="fs-home-quote-text">
                            “35 months before first seal change.”
                        </p>

                        <span class="fs-home-quote-source">
                            — Long-Term Vapor Recovery Customer
                        </span>
                    </article>
                </div>

                <div class="fs-home-quote-nav" aria-label="Quote navigation">
                    <button type="button" class="fs-home-quote-dot active" data-index="0"
                        aria-label="Show quote 1"></button>
                    <button type="button" class="fs-home-quote-dot" data-index="1" aria-label="Show quote 2"></button>
                    <button type="button" class="fs-home-quote-dot" data-index="2" aria-label="Show quote 3"></button>
                </div>
            </aside>
            <style>
                .fs-home-quote-card {
                    position: relative;
                    width: 100%;
                    max-width: 580px;
                    min-height: 500px;
                    justify-self: end;
                    padding: 34px 34px 32px;
                    border-radius: 7px;
                    /* border: 1px solid rgba(255, 255, 255, .22); */
                    /* box-shadow: 0 26px 70px rgba(0, 0, 0, .25); */
                    /* backdrop-filter: blur(16px); */
                    -webkit-backdrop-filter: blur(16px);
                    overflow: hidden;
                    isolation: isolate;
                }

                .fs-home-quote-card::before {
                    content: "";
                    position: absolute;
                    inset: 0;
                    z-index: 0;
                    pointer-events: none;
                    background:
                        linear-gradient(rgba(255, 255, 255, .045) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(255, 255, 255, .04) 1px, transparent 1px);
                    background-size: 42px 42px;
                    mask-image: linear-gradient(180deg, rgba(0, 0, 0, .62), transparent 78%);
                }

                .fs-home-quote-card>* {
                    position: relative;
                    z-index: 1;
                }

                .fs-home-quote-header {
                    display: flex;
                    align-items: flex-start;
                    justify-content: space-between;
                    gap: 18px;
                    margin-bottom: 24px;
                }

                .fs-home-quote-kicker {
                    color: #38bdf8;
                    font-size: 13px;
                    font-weight: 900;
                    letter-spacing: .15em;
                    text-transform: uppercase;
                    margin-bottom: 10px;
                }

                .fs-home-quote-title {
                    margin: 0;
                    color: #ffffff;
                    font-size: clamp(24px, 2.2vw, 34px);
                    line-height: 1.12;
                    letter-spacing: -.045em;
                    font-weight: 900;
                    max-width: 360px;
                }

                .fs-home-quote-mark {
                    flex: 0 0 auto;
                    width: 64px;
                    height: 64px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 7px;
                    /* background: #0018dc; */
                    color: #ffffff;
                    font-size: 48px;
                    line-height: 1;
                    font-weight: 950;
                    /* box-shadow: 0 18px 34px rgba(0, 24, 220, .28); */
                }

                .fs-home-quote-stage {
                    position: relative;
                    min-height: 260px;
                    border-radius: 7px;
                    border: 1px solid rgba(255, 255, 255, .18);
                    background: rgba(255, 255, 255, .08);
                    overflow: hidden;
                }

                .fs-home-quote-slide {
                    position: absolute;
                    inset: 0;
                    display: grid;
                    align-content: center;
                    padding: 30px;
                    opacity: 0;
                    transform: translateX(22px);
                    animation: fsHomeQuoteCycle 15s infinite;
                }

                .fs-home-quote-slide:nth-child(1) {
                    animation-delay: 0s;
                }

                .fs-home-quote-slide:nth-child(2) {
                    animation-delay: 5s;
                }

                .fs-home-quote-slide:nth-child(3) {
                    animation-delay: 10s;
                }

                .fs-home-quote-metric {
                    display: block;
                    margin-bottom: 18px;
                    color: #ffffff;
                    font-size: clamp(22px, 2.2vw, 26px);
                    line-height: .95;
                    letter-spacing: -.06em;
                    font-weight: 950;
                }

                .fs-home-quote-text {
                    margin: 0;
                    color: #ffffff;
                    font-size: clamp(18px, 1.4vw, 26px);
                    line-height: 1.42;
                    letter-spacing: -.025em;
                    font-weight: 850;
                }

                .fs-home-quote-source {
                    display: block;
                    margin-top: 22px;
                    color: rgba(226, 232, 240, .88);
                    font-size: 15px;
                    line-height: 1.45;
                    font-weight: 850;
                }

                .fs-home-quote-nav {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 12px;
                    margin-top: 24px;
                }

                .fs-home-quote-dot {
                    height: 4px;
                    border-radius: 999px;
                    background: rgba(255, 255, 255, .22);
                    overflow: hidden;
                }

                .fs-home-quote-dot::before {
                    content: "";
                    display: block;
                    width: 100%;
                    height: 100%;
                    transform: translateX(-100%);
                    background: linear-gradient(90deg, #15d1ff, #ffffff);
                    animation: fsHomeDotCycle 15s infinite;
                }

                .fs-home-quote-dot:nth-child(1)::before {
                    animation-delay: 0s;
                }

                .fs-home-quote-dot:nth-child(2)::before {
                    animation-delay: 5s;
                }

                .fs-home-quote-dot:nth-child(3)::before {
                    animation-delay: 10s;
                }

                .fs-home-quote-note {
                    margin: 22px 0 0;
                    color: rgba(226, 232, 240, .88);
                    font-size: 16px;
                    line-height: 1.6;
                    font-weight: 750;
                }

                .fs-home-quote-note strong {
                    color: #ffffff;
                    font-weight: 950;
                }

                .fs-home-quote-card:hover .fs-home-quote-slide,
                .fs-home-quote-card:hover .fs-home-quote-dot::before {
                    animation-play-state: paused;
                }

                @keyframes fsHomeQuoteCycle {
                    0% {
                        opacity: 0;
                        transform: translateX(22px);
                    }

                    6% {
                        opacity: 1;
                        transform: translateX(0);
                    }

                    28% {
                        opacity: 1;
                        transform: translateX(0);
                    }

                    34% {
                        opacity: 0;
                        transform: translateX(-22px);
                    }

                    100% {
                        opacity: 0;
                        transform: translateX(-22px);
                    }
                }

                @keyframes fsHomeDotCycle {
                    0% {
                        transform: translateX(-100%);
                    }

                    6% {
                        transform: translateX(-100%);
                    }

                    28% {
                        transform: translateX(0);
                    }

                    34% {
                        transform: translateX(100%);
                    }

                    100% {
                        transform: translateX(100%);
                    }
                }

                @media (prefers-reduced-motion: reduce) {

                    .fs-home-quote-slide,
                    .fs-home-quote-dot::before {
                        animation: none;
                    }

                    .fs-home-quote-slide {
                        position: relative;
                        opacity: 1;
                        transform: none;
                    }

                    .fs-home-quote-slide+.fs-home-quote-slide {
                        display: none;
                    }
                }

                @media (max-width: 1180px) {
                    .fs-home-quote-card {
                        justify-self: start;
                        max-width: 760px;
                    }
                }

                @media (max-width: 760px) {
                    .fs-home-quote-card {
                        min-height: 450px;
                        padding: 26px 22px;
                    }

                    .fs-home-quote-header {
                        margin-bottom: 18px;
                    }

                    .fs-home-quote-mark {
                        width: 52px;
                        height: 52px;
                        font-size: 38px;
                    }

                    .fs-home-quote-stage {
                        min-height: 250px;
                    }

                    .fs-home-quote-slide {
                        padding: 24px;
                    }

                    .fs-home-quote-metric {
                        font-size: 42px;
                    }

                    .fs-home-quote-text {
                        font-size: 20px;
                    }
                }

                @media (max-width: 520px) {
                    .fs-home-quote-card {
                        min-height: 480px;
                    }

                    .fs-home-quote-header {
                        gap: 12px;
                    }

                    .fs-home-quote-title {
                        font-size: 24px;
                    }

                    .fs-home-quote-stage {
                        min-height: 280px;
                    }
                }

                /* Make quote navigation lines into close circle dots */
                .fs-home-quote-nav {
                    display: flex !important;
                    grid-template-columns: none !important;
                    align-items: center !important;
                    justify-content: center !important;
                    gap: 9px !important;
                    margin-top: 24px !important;
                }

                .fs-home-quote-dot {
                    width: 10px !important;
                    height: 10px !important;
                    min-width: 10px !important;
                    min-height: 10px !important;
                    padding: 0 !important;
                    border: 1px solid rgba(255, 255, 255, .55) !important;
                    border-radius: 999px !important;
                    background: rgba(255, 255, 255, .30) !important;
                    overflow: visible !important;
                    cursor: pointer !important;
                    transition: background .25s ease, border-color .25s ease, transform .25s ease, box-shadow .25s ease !important;
                }

                /* Remove old animated line fill */
                .fs-home-quote-dot::before {
                    display: none !important;
                    content: none !important;
                    animation: none !important;
                }

                /* Active dot */
                .fs-home-quote-dot.active {
                    background: #ffffff !important;
                    border-color: #ffffff !important;
                    transform: scale(1.25) !important;
                    box-shadow: 0 0 0 5px rgba(255, 255, 255, .12) !important;
                }
            </style>
            <style>
                /* JS controlled quote slider */
                .fs-home-quote-slide {
                    animation: none !important;
                    opacity: 0 !important;
                    visibility: hidden !important;
                    transform: translateX(18px) !important;
                    transition:
                        opacity .45s ease,
                        visibility .45s ease,
                        transform .45s ease !important;
                }

                .fs-home-quote-slide.active {
                    opacity: 1 !important;
                    visibility: visible !important;
                    transform: translateX(0) !important;
                }

                .fs-home-quote-nav {
                    display: flex !important;
                    grid-template-columns: none !important;
                    align-items: center !important;
                    justify-content: center !important;
                    gap: 9px !important;
                    margin-top: 24px !important;
                }

                .fs-home-quote-dot {
                    width: 10px !important;
                    height: 10px !important;
                    min-width: 10px !important;
                    min-height: 10px !important;
                    padding: 0 !important;
                    border: 1px solid rgba(255, 255, 255, .55) !important;
                    border-radius: 999px !important;
                    background: rgba(255, 255, 255, .30) !important;
                    overflow: visible !important;
                    cursor: pointer !important;
                    transition:
                        background .25s ease,
                        border-color .25s ease,
                        transform .25s ease,
                        box-shadow .25s ease !important;
                }

                .fs-home-quote-dot::before {
                    display: none !important;
                    content: none !important;
                    animation: none !important;
                }

                .fs-home-quote-dot.active {
                    background: #ffffff !important;
                    border-color: #ffffff !important;
                    transform: scale(1.25) !important;
                    box-shadow: 0 0 0 5px rgba(255, 255, 255, .12) !important;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const slides = document.querySelectorAll('.fs-home-quote-slide');
                    const dots = document.querySelectorAll('.fs-home-quote-dot');

                    if (!slides.length || !dots.length) {
                        return;
                    }

                    let currentIndex = 0;
                    let quoteTimer = null;

                    function showQuote(index) {
                        slides.forEach(function (slide, i) {
                            slide.classList.toggle('active', i === index);
                        });

                        dots.forEach(function (dot, i) {
                            dot.classList.toggle('active', i === index);
                        });

                        currentIndex = index;
                    }

                    function startQuoteAutoChange() {
                        if (quoteTimer) {
                            clearInterval(quoteTimer);
                        }

                        quoteTimer = setInterval(function () {
                            const nextIndex = (currentIndex + 1) % slides.length;
                            showQuote(nextIndex);
                        }, 5000);
                    }

                    dots.forEach(function (dot) {
                        dot.addEventListener('click', function () {
                            const index = Number(dot.dataset.index);

                            if (Number.isNaN(index)) {
                                return;
                            }

                            showQuote(index);
                            startQuoteAutoChange();
                        });
                    });

                    showQuote(0);
                    startQuoteAutoChange();
                });
            </script>
        </div>
    </section>





    <section class="section proof py-12">
        <style>
            .proof .proof-card {
                position: relative;
                padding-bottom: 82px;
            }

            .proof .proof-view-link {
                position: absolute;
                right: 18px;
                bottom: 18px;
                z-index: 5;

                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 12px;

                min-width: 136px;
                min-height: 48px;
                padding: 0 18px;

                /* background: #ffffff; */
                color: #0018dc !important;
                /* border: 1px solid #e3e9f4; */
                border-radius: 0;

                font-size: 18px;
                font-weight: 800;
                line-height: 1;
                text-decoration: none;

                /* box-shadow: 0 12px 28px rgba(16, 42, 67, .08); */
                transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
            }

            .proof .proof-view-link span,
            .proof .proof-view-link svg {
                position: relative;
                z-index: 2;
            }

            .proof .proof-view-link svg {
                width: 24px;
                height: 24px;
                stroke: currentColor;
                transition: transform .25s ease;
            }

            .proof .proof-view-link:hover {
                transform: translateY(-2px);
                /* border-color: #0018dc; */
                box-shadow: 0 18px 36px rgba(0, 24, 220, .16);
                /* background: #ffffff; */
                color: #ffffff !important;
            }

            .proof .proof-view-link:hover svg {
                transform: translateX(4px);
            }

            /* .proof .proof-card:hover .proof-view-link,
                                                                                                        .proof .proof-card:hover .proof-view-link *,
                                                                                                        .proof .proof-card:hover .proof-view-link span,
                                                                                                        .proof .proof-card:hover .proof-view-link svg {
                                                                                                            color: #0018dc !important;
                                                                                                            stroke: #0018dc !important;
                                                                                                        } */

            @media (max-width: 640px) {
                .proof .proof-card {
                    padding-bottom: 78px;
                }

                .proof .proof-view-link {
                    right: 16px;
                    bottom: 16px;
                    min-width: 120px;
                    min-height: 44px;
                    font-size: 16px;
                }
            }
        </style>

        <div class="inner container">
            <div class="section-head" style="margin-bottom:18px">
                <div>
                    <p class="kicker">Case-study proof</p>
                    <h2>Case-study proof from real field performance.</h2>
                </div>

                <p>
                    Fluidstream’s strongest credibility comes from measurable field outcomes: uptime, lower maintenance,
                    reduced emissions, and meaningful production or revenue improvement under real operating conditions.
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

                    <div class="proof-detail">
                        17+ months • 0 maintenance • continuous operation below -40°C • gas venting eliminated
                    </div>

                    <a class="proof-view-link " href="/case-studies/allied-energy-vaporcommander-vru"
                        aria-label="View Allied Energy II case study">
                        <span>View</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>
                    </a>
                </article>

                <article class="proof-card">
                    <div class="proof-tag">Vapor Recovery</div>

                    <h3>4.5+ years of reliable vapor recovery with one seal change.</h3>

                    <p>
                        A southern Alberta producer used VaporCommander™ to capture tank vapors, reduce emissions, and avoid
                        the ongoing maintenance burden associated with conventional VRU systems.
                    </p>

                    <div class="proof-metric">35 months to first seal change</div>

                    <div class="proof-detail">
                        1 seal change over reported operating life • reduced service intervention • extended seal life
                        performance
                    </div>

                    <a class="proof-view-link" href="/case-studies/vaporcommander-4-5-year-reliability"
                        aria-label="View Vapor Recovery case study">
                        <span>View</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>
                    </a>
                </article>

                <article class="proof-card">
                    <div class="proof-tag">Multiphase Production</div>

                    <h3>From virtually no production to more than C$1.5M/year in incremental revenue.</h3>

                    <p>
                        Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded wells in Alberta, restoring gas
                        and condensate production without requiring additional separation infrastructure.
                    </p>

                    <div class="proof-metric">C$1.5M+</div>

                    <div class="proof-detail">
                        10e3 m³/d gas restored • 5 m³/d condensate • no added separation equipment
                    </div>

                    <a class="proof-view-link" href="/case-studies/multiphasecommander-production-recovery"
                        aria-label="View Multiphase Production case study">
                        <span>View</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>
                    </a>
                </article>
            </div>
        </div>
    </section>


    <section class="section solutions py-12">
        <div class="inner container">
            <div class="section-head">
                <div>
                    <p class="kicker">Commercial applications</p>
                    <h2>One platform. Three commercial value cases.</h2>
                </div>
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
                    <h3>Recover vapors from the real field, not an idealized gas stream.</h3>
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
                    <a class="link" href="/vapor-recovery">Explore VaporCommander™ →</a>
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
                    <a class="link" href="/casing-gas-compression">Explore CompressionCommander™
                        →</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section leadership  py-12">
        <div class="inner container">
            <div class="section-head">
                <div>
                    <p class="kicker">Core strengths</p>
                    <h2>Designed for reliability, cost efficiency, autonomous control, and field flexibility.</h2>
                </div>
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

    {{-- <section class="section tech">
        <div class="inner container">
            <div class="tech-panel">
                <div class="section-head" style="margin-bottom:18px">
                    <div>
                        <p class="kicker">Technology advantage</p>
                        <h2>Patented technology that sells on outcomes, not just mechanism.</h2>
                    </div>
                    <p>
                        Fluidstream’s patented technology is built to improve control, efficiency, and reliability in field
                        applications where liquids, slugs, and unstable operating conditions limit conventional compression
                        systems.
                    </p>
                </div>

                <div class="tech-grid-equal">
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
                    <a class="btn btn-primary" href="/technology">Explore Technology</a>
                    <a class="btn btn-secondary" href="/multiphase-compression-technology">View
                        Key Features</a>
                </div>
            </div>
        </div>
    </section> --}}
    <style>
        .patent-section {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 12% 18%, rgba(21, 209, 255, 0.08), transparent 22%),
                radial-gradient(circle at 92% 10%, rgba(0, 24, 220, 0.06), transparent 18%),
                linear-gradient(180deg, #f7fafc 0%, #eef4f8 100%);
        }

        .patent-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(360px, 0.85fr);
            gap: 36px;
            align-items: start;
            margin-bottom: 34px;
        }

        /* .patent-copy .kicker {
                                                                                                                                                                                                                                                                                                            margin-bottom: 18px;
                                                                                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                                                                                        .patent-copy h2 {
                                                                                                                                                                                                                                                                                                            margin: 0;
                                                                                                                                                                                                                                                                                                            font-size: clamp(1.9rem, 3vw, 3rem);
                                                                                                                                                                                                                                                                                                            line-height: 1.05;
                                                                                                                                                                                                                                                                                                            letter-spacing: -.04em;
                                                                                                                                                                                                                                                                                                            max-width: 21ch;
                                                                                                                                                                                                                                                                                                            color: var(--text);
                                                                                                                                                                                                                                                                                                        } */
        /* 
                                                                                                                                                                                                                                                                .patent-copy p {
                                                                                                                                                                                                                                                                    margin: 0 0 18px;
                                                                                                                                                                                                                                                                    max-width: 760px;
                                                                                                                                                                                                                                                                    font-size: 1.18rem;
                                                                                                                                                                                                                                                                    line-height: 1.7;
                                                                                                                                                                                                                                                                    color: #5b6d86;
                                                                                                                                                                                                                                                                } */

        .patent-copy .patent-highlight {
            margin-top: 6px;
            /* font-size: 1.16rem; */
            line-height: 1.7;
            /* color: #5b6d86; */
        }

        .patent-copy .patent-highlight strong {
            color: #1338e2;
            font-weight: 800;
        }

        .patent-side-card {
            position: relative;
            min-height: 100%;
            padding: 34px 36px 34px;
            border-radius: 7px;
            border: 1px solid rgba(193, 205, 230, 0.85);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 20px 54px rgba(16, 42, 67, 0.08);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .patent-side-card,
        .patent-card-grid>article {
            position: relative;
            overflow: hidden;
            isolation: isolate;
        }

        .patent-side-card>*,
        .patent-card-grid>article>* {
            position: relative;
            z-index: 1;
        }

        /* remove this old wrong rule */
        .patent-card-grid::after {
            display: none;
        }

        /* top blue line for big right card and 4 small cards */
        .patent-side-card::after,
        .patent-card-grid>article::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: var(--accent-dark);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.28s cubic-bezier(.22, .61, .36, 1);
            z-index: 0;
        }

        /* hover effect for right big card */
        .patent-side-card:hover {
            transform: translateY(-4px);
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
        }

        .patent-side-card:hover::after {
            transform: scaleX(1);
        }

        /* hover effect for 4 small cards */
        .patent-card-grid>article:hover {
            transform: translateY(-4px);
            border-color: #0018dc !important;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
        }

        .patent-card-grid>article:hover::after {
            transform: scaleX(1);
        }

        /* optional text polish on hover */
        .patent-card-grid>article h3,
        .patent-side-card h3 {
            transition: color .25s ease;
        }

        .patent-card-grid>article:hover h3,
        .patent-side-card:hover h3 {
            color: var(--accent-dark);
        }

        .patent-side-bar {
            width: 84px;
            height: 5px;
            border-radius: 999px;
            margin-bottom: 22px;
            background: linear-gradient(90deg, #1239e6 0%, #1cb8ff 100%);
        }

        .patent-side-card h3 {
            margin: 0 0 18px;
            font-size: 1.48rem;
            line-height: 1.12;
            letter-spacing: -.03em;
            color: var(--text);
            transition: color .25s ease;
        }

        .patent-chip-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 22px;
        }

        .patent-chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            border: 1px solid #c9d4ff;
            /* background: #edf2ff; */
            color: #1738e4;
            font-size: .98rem;
            font-weight: 800;
            letter-spacing: 0;
        }

        .patent-side-card p {
            margin: 0;
            font-size: 1.08rem;
            line-height: 1.72;
            color: #61738b;
        }

        .patent-card-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
            margin-bottom: 26px;
        }

        .patent-card-grid::after {
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

        .patent-card {
            position: relative;
            min-height: 300px;
            padding: 34px 30px 28px;
            border-radius: 7px;
            border: 1px solid rgba(201, 211, 228, 0.9);
            background:
                radial-gradient(circle at 100% 0%, rgba(21, 209, 255, 0.07), transparent 34%),
                rgba(255, 255, 255, 0.9);
            box-shadow: 0 18px 40px rgba(16, 42, 67, 0.07);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
            overflow: hidden;
            isolation: isolate;
        }

        .patent-card>* {
            position: relative;
            z-index: 1;
        }

        .patent-card:hover {
            transform: translateY(-4px);
            border-color: #6d90ff;
            box-shadow: 0 26px 54px rgba(16, 42, 67, 0.12);
            background:
                radial-gradient(circle at 100% 0%, rgba(21, 209, 255, 0.10), transparent 36%),
                rgba(255, 255, 255, 0.98);
        }

        .patent-card-number {
            width: 56px;
            height: 56px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            border: 1px solid #c7cef2;
            background: #e9edf7;
            color: #1537e3;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            transition: background .25s ease, color .25s ease, border-color .25s ease;
        }

        .patent-card:hover .patent-card-number {
            background: #edf3ff;
            border-color: #b7c8ff;
            color: #0f34df;
        }

        .patent-card h4 {
            margin: 0 0 14px;
            font-size: 2rem;
            line-height: 1.04;
            letter-spacing: -0.045em;
            color: #091d48;
        }

        /* .patent-card p {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin: 0;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 1.04rem;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                line-height: 1.72;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                color: #61738b;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } */

        .patent-callout {
            position: relative;
            padding: 20px 18px 20px 36px;
            border-radius: 6px;
            border: 1px solid rgba(193, 212, 255, 0.9);
            background: #fff;
            box-shadow: 0 20px 48px rgba(16, 42, 67, 0.06);
            overflow: hidden;
        }

        .patent-callout::before {
            content: "";
            position: absolute;
            left: 0;
            top: -6px;
            bottom: -5px;
            width: 6px;
            border-radius: 0 999px 999px 0;
            background: linear-gradient(180deg, #1239e6 0%, #1029ea 100%);
        }

        .patent-callout p {
            margin: 0;
            font-size: 1.14rem;
            line-height: 1.75;
            color: #61738b;
        }

        .patent-callout strong {
            color: #0c1f4f;
            font-weight: 800;
        }

        @media (max-width: 1180px) {
            .patent-grid {
                grid-template-columns: 1fr;
            }

            .patent-side-card {
                max-width: 760px;
            }

            .patent-card-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .patent-copy h2 {
                max-width: none;
            }

            .patent-card-grid {
                grid-template-columns: 1fr;
            }

            .patent-side-card,
            .patent-card,
            .patent-callout {
                border-radius: 22px;
            }

            .patent-side-card {
                padding: 26px 24px;
            }

            .patent-card {
                min-height: auto;
                padding: 28px 24px 24px;
            }

            .patent-callout {
                padding: 28px 24px 28px 34px;
            }

            .patent-callout::before {
                top: 14px;
                bottom: 14px;
                width: 8px;
            }
        }
    </style>
    <section class="section patent-section py-12">
        <div class="inner container">
            <div class="patent-grid">
                <div class="patent-copy section-head">
                    <div class="kicker mb-3">Patented technology</div>
                    <h2>Patents that support real multiphase compression value</h2>

                    <p>
                        Fluidstream’s multiphase platform is supported by U.S. and Canadian patents
                        focused on how compression systems respond when liquids are present in the
                        chamber.
                    </p>

                    <p class="patent-highlight">
                        <strong>US11098709B2</strong> covers detecting liquid-related conditions and adjusting
                        compressor operation during the stroke, supporting stable operation where
                        conventional systems can experience pressure spikes, upset conditions, and
                        reliability limits.
                    </p>
                </div>
                <style>
                    .patent-side-card {
                        display: flex;
                        flex-direction: column;
                    }

                    .patent-explore-link {
                        align-self: flex-end;
                        display: inline-flex;
                        align-items: center;
                        justify-content: flex-end;
                        gap: 12px;

                        margin-top: auto;
                        padding-top: 34px;

                        color: #0018dc;
                        font-size: 17px;
                        font-weight: 900;
                        line-height: 1;
                        text-decoration: none;

                        transition: color .25s ease, transform .25s ease;
                    }

                    .patent-explore-link svg {
                        width: 24px;
                        height: 24px;
                        stroke: currentColor;
                        transition: transform .25s ease;
                    }

                    .patent-explore-link:hover {
                        color: #0018dc;
                        transform: translateX(3px);
                    }

                    .patent-explore-link:hover svg {
                        transform: translateX(4px);
                    }

                    @media (max-width: 768px) {
                        .patent-explore-link {
                            align-self: flex-start;
                            padding-top: 26px;
                            font-size: 16px;
                        }

                        .patent-explore-link svg {
                            width: 22px;
                            height: 22px;
                        }
                    }
                </style>
                <div class="patent-side-card">
                    <h3>Core patent coverage</h3>

                    <div class="patent-chip-row">
                        <span class="patent-chip">US11098709B2</span>
                        <span class="patent-chip">CA2843321C</span>
                    </div>

                    <p>
                        These patents support operating methods where liquid presence affects chamber volume,
                        pressure response, and compressor behaviour inside the compression process.
                    </p>

                    <a class="patent-explore-link" href="/patented-technology" aria-label="Explore patents">
                        <span>Explore Patents</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="patent-card-grid">
                <article
                    class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
                    <div
                        class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
                        01</div>
                    <h3
                        class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
                        Handles liquids inside compression</h3>
                    <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
                        Detects liquid influence and adjusts operation in real time.
                    </p>
                </article>

                <article
                    class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
                    <div
                        class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
                        02</div>
                    <h3
                        class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
                        Controls pressure behavior</h3>
                    <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
                        Reduces rapid pressure rise caused by incompressible fluids.
                    </p>
                </article>

                <article
                    class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
                    <div
                        class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
                        03</div>
                    <h3
                        class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
                        Built for wet gas reality</h3>
                    <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
                        Designed for liquids, slugs, and variable field conditions.
                    </p>
                </article>

                <article
                    class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
                    <div
                        class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
                        04</div>
                    <h3
                        class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
                        Protects operating logic</h3>
                    <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
                        Covers how the system responds, not just hardware design.
                    </p>
                </article>
            </div>

            <div class="patent-callout">
                <p>
                    <strong>Patented operating methods with practical field value.</strong>
                    Fluidstream’s systems are supported by patents including US11098709B2, helping
                    enable stable operation in vapor recovery, casing gas, and multiphase applications
                    where conventional systems often face limits.
                </p>
            </div>
        </div>
    </section>

    <section class="section caseband py-12">
        <div class="inner container">
            <div class="case-panel">
                <div>
                    <div class="kicker mb-2">Case study snapshot</div>
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

    <section class="section cta  py-12">
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
                    <a class="btn btn-primary" href="/contact">Request Technical Review</a>
                    <a class="btn btn-secondary" href="/multiphase-compression-technology">Understand Multiphase
                        Compression</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const heroSlides = document.querySelectorAll('.hero-quote-slide');
            const heroDots = document.querySelectorAll('.hero-dot');
            let heroCurrent = 0;
            let heroInterval = null;

            function showHeroSlide(index) {
                heroSlides.forEach((slide, i) => {
                    if (i === index) {
                        slide.classList.add('active');
                        slide.classList.remove('opacity-0', 'translate-y-3');
                    } else {
                        slide.classList.remove('active');
                        slide.classList.add('opacity-0', 'translate-y-3');
                    }
                });

                heroDots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });

                heroCurrent = index;
            }

            function startHeroSlider() {
                if (heroInterval) clearInterval(heroInterval);

                heroInterval = setInterval(() => {
                    const next = (heroCurrent + 1) % heroSlides.length;
                    showHeroSlide(next);
                }, 3000);
            }

            if (heroSlides.length && heroDots.length) {
                heroDots.forEach((dot) => {
                    dot.addEventListener('click', function () {
                        showHeroSlide(Number(this.dataset.index));
                        startHeroSlider();
                    });
                });

                showHeroSlide(0);
                startHeroSlider();
            }
        });
    </script>

@endsection