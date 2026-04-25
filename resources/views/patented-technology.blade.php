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

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
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
            max-width: 1200px;
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
            color: #fff;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(0, 24, 220, .14);
            white-space: nowrap;
        }

        .section {
            padding-top: 3rem;
            padding-bottom: 3rem;
            position: relative;
            /* padding: 64px 0 */
        }

        .section:nth-of-type(even) {
            background: var(--bg-alt)
        }

        .section:nth-of-type(odd) {
            background: var(--bg)
        }


        .hero {
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
            /* padding: 78px 0 60px; */
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 28px;
            align-items: center;
        }

        .container {
            max-width: 1200px;
        }

        .eyebrow {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .09em;
            color: #1029ea;
            font-weight: 850;
            margin-bottom: 10px;
        }


        h1 {
            margin: 0 0 18px;
            max-width: 900px;
            font-size: 54px;
            font-weight: 600;
            line-height: 1.02;
            letter-spacing: -.04em;
            color: var(--text);

        }

        .subheadline {
            margin: 0 0 16px;
            max-width: 860px;
            font-size: 24px;
            line-height: 1.22;
            font-weight: 700;
            color: var(--accent-dark);
        }

        .support {
            margin: 0;
            max-width: 820px;
            font-size: 19px;
            line-height: 1.62;
            color: var(--muted);
        }

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
            color: #fff;
            box-shadow: 0 12px 28px rgba(0, 24, 220, .14);
        }

        .btn-secondary {
            background: #fff;
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
            background: #fff;
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            transition: all .25s ease;
        }

        .metric strong {
            display: block;
            font-size: 1.25rem;
            letter-spacing: -.03em;
            margin-bottom: 6px;
            color: var(--text);
        }

        .metric span {
            display: block;
            color: var(--muted);
            font-size: .92rem;
            line-height: 1.45;
        }

        .metric:hover {
            background: #ffffff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .metric:hover::after,
        .stack .item:hover::after {
            transform: scaleX(1);
        }

        .metric::after {
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

        .visual-card:hover {
            background: #ffffff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .visual-card:hover::after,
        .stack .item:hover::after {
            transform: scaleX(1);
        }

        .visual-card::after {
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

        .impact:hover {
            background: #ffffff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .impact:hover::after,
        .stack .item:hover::after {
            transform: scaleX(1);
        }

        .impact::after {
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

        .hero-visual {
            position: relative;
            min-height: 560px;
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            overflow: hidden;
            padding: 24px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            grid-template-areas:
                "problem response"
                "relevance response"
                "main main";
            gap: 16px;
            align-content: start;
        }

        .visual-card {
            position: relative;
            background: #fff;
            border: 1px solid var(--line);
            padding: 16px 18px;
            box-shadow: var(--shadow);
            transition: all .25s ease;
            min-height: 132px;
            z-index: 1;
        }

        .visual-card.problem {
            grid-area: problem;
        }

        .visual-card.response {
            grid-area: response;
        }

        .visual-card.relevance {
            grid-area: relevance;
        }

        .visual-card.main {
            grid-area: main;
            padding: 22px;
            min-height: auto;
        }

        .visual-card h4 {
            margin: 0 0 8px;
            font-size: .9rem;
            letter-spacing: .02em;
            color: var(--accent-dark);
            text-transform: uppercase;
        }

        .visual-card p {
            margin: 0;
            color: var(--muted);
            font-size: .96rem;
            line-height: 1.5;
        }

        /* .visual-card:hover {
                                                                                                    background: #fff;
                                                                                                    border-color: #9bb6ff;
                                                                                                    box-shadow: 0 24px 50px rgba(16, 42, 67, .10);
                                                                                                    transform: translateY(-2px);
                                                                                                } */

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
        }

        .main-title span {
            color: var(--accent-dark);
            font-weight: 700;
            white-space: nowrap;
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
            max-width: 21ch;
            color: var(--text);
        }

        .section-head p {
            flex: 0 0 420px;
            max-width: 48ch;
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 1.15rem;
            line-height: 1.65;
            font-weight: 500;
        }

        .proof-cards,
        .card-grid,
        .feature-grid {
            align-items: stretch;
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
            border: 1px solid var(--line);
            background: #fff;
            padding: 24px;
            box-shadow: var(--shadow);
            transition: transform .32s ease, box-shadow .32s ease, border-color .32s ease;
            isolation: isolate;
            min-height: 100%;
        }

        .proof-card>* {
            position: relative;
            z-index: 1
        }

        .proof-card::before {
            content: "";
            position: absolute;
            inset: -20%;
            background: linear-gradient(180deg, #0018dc, #1433ff);
            transform: translateY(100%);
            transition: transform .56s cubic-bezier(.22, .61, .36, 1);
            z-index: 0;
            pointer-events: none;
        }

        .proof-card:hover {
            border-color: #0018dc;
            box-shadow: var(--shadow-hover);
            transform: translateY(-4px);
        }

        .proof-card:hover::before {
            transform: translateY(0)
        }

        .proof-card:hover * {
            color: #fff !important
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
            transition: all .25s ease;
        }

        .proof-card:hover .proof-tag {
            background: rgba(255, 255, 255, .14);
            border-color: rgba(255, 255, 255, .28);
        }

        .proof-card h3 {
            margin: 0 0 12px;
            font-size: 1.42rem;
            line-height: 1.14;
            letter-spacing: -.03em;
            color: var(--text);
        }

        .proof-card p {
            flex-grow: 1;
            margin: 0 0 16px;
            color: var(--muted);
        }

        .proof-metric {
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid rgba(16, 42, 67, .10);
            font-size: 1.32rem;
            font-weight: 700;
            letter-spacing: -.02em;
            line-height: 1.2;
            color: var(--accent-dark);
            margin-bottom: 6px;
        }

        .proof-detail {
            color: var(--muted);
            font-size: .95rem;
            font-weight: 500;
            line-height: 1.45;
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
            border: 1px solid var(--line);
            background: #fff;
            padding: 18px 18px 16px;
            box-shadow: var(--shadow);
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
        }

        .stack .item:hover {
            background: #fff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

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
            transition: transform .25s cubic-bezier(.22, .61, .36, 1);
        }

        .stack .item:hover::after {
            transform: scaleX(1)
        }

        .stack .item h4 {
            margin: 0 0 8px;
            font-size: 1.05rem;
            letter-spacing: -.02em;
            color: var(--text);
        }

        .stack .item p {
            margin: 0;
            color: var(--muted);
            font-size: .95rem;
        }

        .two-up-cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            align-items: stretch;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            position: relative;
            min-height: 0;
            border: 1px solid var(--line);
            background: #fff;
            padding: 24px 24px 30px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all .25s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .card:hover {
            border-color: #6d90ff;
            box-shadow: 0 26px 54px rgba(16, 42, 67, .12);
            transform: translateY(-4px);
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
        }

        .card h3 {
            margin: 0 0 12px;
            font-size: 1.48rem;
            line-height: 1.12;
            letter-spacing: -.03em;
            color: var(--text);
        }

        .card p {
            margin: 0 0 16px;
            color: var(--muted);
        }

        .card ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
        }

        .card li {
            position: relative;
            padding-left: 24px;
            color: var(--text);
            font-size: .95rem;
        }

        .card li:before {
            content: "";
            position: absolute;
            left: 0;
            top: .2rem;
            width: 16px;
            height: 12px;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            transition: transform .24s ease;
        }

        .card:hover li:before {
            transform: translateX(2px)
        }

        .impact-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin: 18px 0 0;
        }

        .impact {
            padding: 16px;
            border: 1px solid var(--line);
            background: #fff;
            box-shadow: var(--shadow);
            transition: all .25s ease;
        }

        /* .impact:hover {
                                                                                            background: #f4f8ff;
                                                                                            border-color: #9bb6ff;
                                                                                            box-shadow: 0 18px 38px rgba(16, 42, 67, .09);
                                                                                            transform: translateY(-2px);
                                                                                        } */

        .impact strong {
            display: block;
            font-size: 1.28rem;
            letter-spacing: -.03em;
            margin-bottom: 4px;
            color: var(--accent-dark);
        }

        .impact span {
            color: var(--muted);
            font-size: .91rem;
            display: block;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 18px;
        }

        .feature {
            border: 1px solid var(--line);
            background: #fff;
            padding: 22px;
            box-shadow: var(--shadow);
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
            min-height: 100%;
        }

        .feature:hover {
            background: #fff;
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
            transform: translateY(-3px);
        }

        .feature::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 3px;
            background: var(--accent-dark);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s cubic-bezier(.22, .61, .36, 1);
        }

        .feature:hover::after {
            transform: scaleX(1)
        }

        .feature .kicker {
            color: var(--accent-dark);
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 10px;
            display: block;
        }

        .feature h3 {
            margin: 0 0 10px;
            font-size: 1.18rem;
            line-height: 1.15;
            letter-spacing: -.03em;
            color: var(--text);
        }

        .feature p {
            margin: 0;
            color: var(--muted);
            font-size: .95rem;
        }

        .compare {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            align-self: stretch;
        }

        .compare-box {
            border: 1px solid var(--line);
            background: #fff;
            padding: 18px;
            box-shadow: var(--shadow);
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
        }

        .compare-box:hover {
            background: #f4f8ff;
            border-color: #9bb6ff;
            box-shadow: 0 18px 38px rgba(16, 42, 67, .09);
            transform: translateY(-2px);
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

        .compare-box h4 {
            margin: 0 0 12px;
            font-size: 1.02rem;
            color: var(--accent-dark);
            text-transform: uppercase;
            letter-spacing: .04em;
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
        }

        .compare-box li:before {
            content: "";
            position: absolute;
            left: 0;
            top: .18rem;
            width: 16px;
            height: 12px;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        }

        .cta-panel {
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

        .footer {
            background: #0018dc;
            color: #fff;
        }

        .footer h4,
        .footer strong,
        .footer p,
        .footer li,
        .footer a {
            color: #fff;
        }

        .footer .inner {
            padding: 34px 0 28px;
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr 1fr;
            gap: 28px;
        }

        .footer h4 {
            margin: 0 0 12px;
            font-size: 1rem;
            letter-spacing: -.02em;
        }

        .footer p,
        .footer li,
        .footer a {
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
            border-top: 1px solid rgba(255, 255, 255, .2);
            padding: 16px 0 28px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            color: #fff;
            font-size: .88rem;
        }

        .proof-card p,
        .card p,
        .feature p,
        .stack .item p,
        .compare-box li {
            overflow-wrap: anywhere;
        }

        @media (max-width: 1120px) {

            .hero-grid,
            .tech-grid {
                grid-template-columns: 1fr
            }

            .feature-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .proof-cards,
            .card-grid,
            .compare {
                grid-template-columns: 1fr;
            }

            .footer .inner {
                grid-template-columns: 1fr 1fr;
            }

            .hero-visual {
                min-height: auto;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-template-areas:
                    "problem response"
                    "relevance response"
                    "main main";
                gap: 16px;
                align-items: stretch;
            }

            .two-up-cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 980px) {
            h1 {
                font-size: 50px
            }

            .subheadline {
                font-size: 24px
            }

            .support {
                font-size: 17px
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
            .feature-grid {
                grid-template-columns: 1fr
            }

            .section-head {
                align-items: start;
                flex-direction: column;
            }

            .section-head p {
                flex: 1 1 auto;
                max-width: none;
            }

            .footer .inner {
                grid-template-columns: 1fr;
            }
        }

        #why-patents-matter,
        #us11098709b2,
        #field-value,
        #supporting-patents,
        #products {
            scroll-margin-top: 120px;
        }

        @media (max-width: 640px) {
            h1 {
                font-size: 38px
            }

            .subheadline {
                font-size: 21px
            }

            .topbar .inner,
            .nav .inner,
            .section .inner,
            .footer .inner,
            .footer-bottom {
                width: min(var(--max), calc(100% - 28px))
            }

            .hero-metrics {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                grid-template-columns: 1fr;
                grid-template-areas:
                    "problem"
                    "response"
                    "relevance"
                    "main";
                padding: 18px;
            }

            .two-up-cards {
                grid-template-columns: 1fr;
            }

            .card,
            .proof-card,
            .feature,
            .stack .item,
            .compare-box,
            .impact,
            .metric {
                min-height: auto
            }

            .main-title {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    <section class="hero section">
        <div class="inner">
            <div class="hero-grid">
                <div>
                    <div class="eyebrow"><span class="dot"></span> Patented Technology</div>
                    <h1>Patent-backed operating methods for real oil and gas compression duty.</h1>
                    <p class="subheadline">Practical patent coverage tied to liquid handling, compression response, and
                        production optimization in real field conditions.</p>
                    <p class="support">Fluidstream’s patent position is strongest where it connects directly to field
                        problems: liquids inside compression, pressure behavior, and control under non-ideal operating
                        conditions. The core U.S. patent, US11098709B2, describes changing compressor operation when liquid
                        is detected in the chamber.</p>
                    <div class="cta-row">
                        <a href="#us11098709b2" class="btn btn-primary">Review the Core Patent</a>
                        <a href="#supporting-patents" class="btn btn-secondary">See Supporting Patents</a>
                    </div>
                    <div class="hero-metrics">
                        <div class="metric">
                            <strong>U.S. + Canada</strong>
                            <span>Coverage across core multiphase compression and production optimization patent
                                families.</span>
                        </div>
                        <div class="metric">
                            <strong>Active U.S. Patent</strong>
                            <span>US11098709B2 anchors the core multiphase operating-method story.</span>
                        </div>
                        <div class="metric">
                            <strong>Field-Relevant Claims</strong>
                            <span>Focused on liquid detection, stroke behavior, and pressure response under mixed-phase
                                conditions.</span>
                        </div>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="visual-card problem">
                        <h4>Problem</h4>
                        <p>Incompressible liquids reduce effective chamber volume and can drive rapid pressure rise late in
                            the stroke.</p>
                    </div>
                    <div class="visual-card response">
                        <h4>Patented Response</h4>
                        <p>Detect the liquid condition and change compressor operation during the stroke rather than
                            treating liquid only as a shutdown event.</p>
                    </div>
                    <div class="visual-card relevance">
                        <h4>Commercial Relevance</h4>
                        <p>Useful where wet gas, slugs, and unstable flow limit conventional gas-only systems in vapor
                            recovery, casing gas, and multiphase service.</p>
                    </div>
                    <div class="visual-card main">
                        <div class="main-title">
                            <h3>US11098709B2 | Method and apparatus for pumping fluid</h3>
                            <span>Granted Aug. 24, 2021</span>
                        </div>
                        <p>The core U.S. patent ties the Fluidstream platform to mode changes between higher-volume and
                            lower-volume operation during the compression stroke, giving the patent story clear technical
                            relevance in mixed-phase service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="why-patents-matter">
        <div class="inner">
            <div class="section-head">
                <h2>Why the patents matter.</h2>
                <p>Patents that address compression behavior under liquid-influenced conditions provide a stronger technical
                    basis for real oil and gas applications.</p>
            </div>
            <div class="proof-cards">
                <article class="proof-card">
                    <div class="proof-tag">Compression Physics</div>
                    <h3>Addresses the late-stroke pressure problem created by liquid in the chamber.</h3>
                    <p>US11098709B2 centers on a real engineering issue: incompressible liquid changes chamber volume and
                        can drive pressure higher near the end of the stroke.</p>
                    <div class="proof-metric">Liquid-influenced chamber behavior</div>
                    <div class="proof-detail">Tied to a practical compression problem.</div>
                </article>
                <article class="proof-card">
                    <div class="proof-tag">Control Logic</div>
                    <h3>Protects an operating response, not only a hardware configuration.</h3>
                    <p>The core patent story is about detecting liquid-related conditions and changing compressor behavior
                        during the cycle.</p>
                    <div class="proof-metric">Sensor-driven mode change</div>
                    <div class="proof-detail">More meaningful than a generic patent claim.</div>
                </article>
                <article class="proof-card">
                    <div class="proof-tag">Field Relevance</div>
                    <h3>Connects directly to mixed-phase operating reality.</h3>
                    <p>The patent position matters most where wet gas, casing gas, and multiphase service create conditions
                        conventional systems struggle to handle.</p>
                    <div class="proof-metric">IP linked to application value</div>
                    <div class="proof-detail">Supports stability and controllability claims.</div>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="us11098709b2">
        <div class="inner">
            <div class="section-head">
                <h2>US11098709B2: the core patent anchor.</h2>
                <p>US11098709B2 addresses liquid detection and compression-cycle response within the chamber, making it the
                    clearest anchor for Fluidstream’s patent position.</p>
            </div>
            <div class="tech-grid">
                <div class="stack">
                    <div class="item">
                        <h4>Active U.S. patent</h4>
                        <p>US11098709B2 anchors Fluidstream’s main U.S. multiphase operating-method story.</p>
                    </div>
                    <div class="item">
                        <h4>Mode change during the stroke</h4>
                        <p>The patent describes high-volume operation for a first portion of the stroke and lower-volume
                            behavior for the remainder as chamber conditions change.</p>
                    </div>
                    <div class="item">
                        <h4>Liquid detection tied to chamber behavior</h4>
                        <p>The operating logic is built around detecting liquid-related conditions and adjusting compressor
                            behavior accordingly.</p>
                    </div>
                    <div class="item">
                        <h4>Pressure-management relevance</h4>
                        <p>The described response helps manage the part of the cycle where rapid pressure rise becomes more
                            severe.</p>
                    </div>
                </div>
                <div>
                    <div class="two-up-cards">
                        <article class="card">
                            <div class="label">What it protects</div>
                            <h3>Compression response under liquid influence.</h3>
                            <p>The patent is most valuable where it protects operating methods for responding to mixed-phase
                                chamber behavior rather than simply defining package layout.</p>
                            <ul>
                                <li>Liquid-aware operation</li>
                                <li>Stroke-based mode change</li>
                                <li>Pressure-behavior management</li>
                            </ul>
                        </article>
                        <article class="card">
                            <div class="label">Why it matters</div>
                            <h3>Rooted in a real engineering problem.</h3>
                            <p>This patent is useful because it addresses a specific physical challenge inside compression
                                rather than relying on a generic efficiency claim.</p>
                            <ul>
                                <li>Relevant to wet service</li>
                                <li>Relevant to compressor protection</li>
                                <li>Relevant to controllability</li>
                            </ul>
                        </article>
                    </div>
                    <div class="impact-grid">
                        <div class="impact"><strong>2014</strong><span>Priority date for the core patent family.</span>
                        </div>
                        <div class="impact"><strong>2021</strong><span>Granted U.S. patent publication date.</span></div>
                        <div class="impact"><strong>2034</strong><span>Expected expiration window for the core patent
                                family.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="field-value">
        <div class="inner">
            <div class="section-head">
                <h2>What the patents mean in the field.</h2>
                <p>These patents are most relevant where operating conditions include wet gas, variable flow, and
                    mixed-phase service.</p>
            </div>
            <div class="feature-grid">
                <div class="feature">
                    <span class="kicker">Vapor Recovery</span>
                    <h3>Supports operation beyond dry-gas assumptions.</h3>
                    <p>Relevant where entrained liquids and unstable flow challenge conventional vapor recovery systems.</p>
                </div>
                <div class="feature">
                    <span class="kicker">Casing Gas</span>
                    <h3>Aligned with wet casing-gas service.</h3>
                    <p>Most meaningful where casing gas compression must account for liquid carryover and changing
                        conditions.</p>
                </div>
                <div class="feature">
                    <span class="kicker">Multiphase Production</span>
                    <h3>Matches the platform’s core use case.</h3>
                    <p>Strongest where gas-and-liquid flow is handled together rather than forced into a gas-only model.</p>
                </div>
                <div class="feature">
                    <span class="kicker">Reliability Narrative</span>
                    <h3>Improves how performance claims are backed up.</h3>
                    <p>Patents tied to liquid handling and operating logic better support claims around stability,
                        controllability, and field applicability.</p>
                </div>
            </div>

            <div class="compare" style="margin-top:22px;">
                <div class="compare-box">
                    <h4>Conventional narrative</h4>
                    <ul>
                        <li>Gas-only compression assumptions</li>
                        <li>Reliability depends on ideal inlet conditions</li>
                        <li>Liquid events treated mainly as trip or shutdown drivers</li>
                        <li>Harder to tie patent claims to field value</li>
                    </ul>
                </div>
                <div class="compare-box">
                    <h4>Fluidstream patent narrative</h4>
                    <ul>
                        <li>Mixed-phase conditions addressed inside compression</li>
                        <li>Core patent explains response to liquid-influenced chamber behavior</li>
                        <li>Stronger support for uptime and controllability claims</li>
                        <li>Better fit for vapor recovery, casing gas, and multiphase applications</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="supporting-patents">
        <div class="inner">
            <div class="section-head">
                <h2>Supporting patent families.</h2>
                <p>Fluidstream’s patent coverage spans both multiphase compression behavior and production optimization /
                    control.</p>
            </div>
            <div class="card-grid">
                <article class="card">
                    <div class="label">Canada</div>
                    <h3>CA2843321C</h3>
                    <p>The Canadian counterpart to the multiphase compression family supports the same technical story as
                        US11098709B2.</p>
                    <ul>
                        <li>Method and apparatus for pumping fluid</li>
                        <li>Mode change within the stroke path</li>
                        <li>Canadian coverage for the core multiphase family</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="label">United States</div>
                    <h3>US10221664B2</h3>
                    <p>This granted U.S. patent broadens the IP story beyond compressor mechanics into system-level control
                        and production response.</p>
                    <ul>
                        <li>Method and system for optimizing well production</li>
                        <li>Granted U.S. patent protection</li>
                        <li>Supports the control and optimization narrative</li>
                    </ul>
                </article>
                <article class="card">
                    <div class="label">Canada</div>
                    <h3>CA2883283C</h3>
                    <p>The Canadian well-production optimization family complements the multiphase compression family and
                        expands the patent story beyond mechanics alone.</p>
                    <ul>
                        <li>Canadian granted patent family</li>
                        <li>Corresponds to the U.S. optimization family</li>
                        <li>Reinforces the production-optimization story</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="products">
        <div class="inner">
            <div class="section-head">
                <h2>How the patents connect back to products.</h2>
                <p>Fluidstream’s patent coverage connects directly to its commercial products and field applications.</p>
            </div>
            <div class="proof-cards">
                <article class="proof-card">
                    <div class="proof-tag">MultiphaseCommander™</div>
                    <h3>Primary commercial expression of the core multiphase patent family.</h3>
                    <p>The multiphase platform is built around handling gas and liquids together and changing compression
                        behavior when chamber conditions demand it.</p>
                    <div class="proof-metric">Best fit for US11098709B2</div>
                    <div class="proof-detail">Connects directly to mixed-phase transport and system simplification.</div>
                </article>
                <article class="proof-card">
                    <div class="proof-tag">VaporCommander™</div>
                    <h3>Extends the patent story into vapor recovery where wet service matters.</h3>
                    <p>For vapor recovery, the patent story helps explain why Fluidstream positions the technology beyond
                        idealized clean, dry gas conditions.</p>
                    <div class="proof-metric">Supports wet-service relevance</div>
                    <div class="proof-detail">Useful when backing claims about lower maintenance and broader operating
                        range.</div>
                </article>
                <article class="proof-card">
                    <div class="proof-tag">CompressionCommander™</div>
                    <h3>Strengthens the case for casing gas applications with liquid risk.</h3>
                    <p>Casing gas compression often suffers when liquid carryover or unstable conditions hit conventional
                        packages. The patent page supports the operating logic behind Fluidstream’s approach.</p>
                    <div class="proof-metric">Supports technical confidence</div>
                    <div class="proof-detail">Pairs naturally with application pages and case studies.</div>
                </article>
            </div>

            <div class="cta-panel" style="margin-top:28px;">
                <div>
                    <h2>See how the patent position supports Fluidstream applications.</h2>
                    <p>Explore the technology, products, and field applications where Fluidstream’s patented operating
                        methods support stable operation, reliability, and broader deployment in mixed-phase service.</p>
                </div>
                <div style="display:flex;gap:12px;flex-wrap:wrap">
                    <a class="btn btn-primary" href="https://fluidstream.nexolioit.com/contact">Request Technical Review</a>
                    <a class="btn btn-secondary" href="https://fluidstream.nexolioit.com/technology">Explore Technology</a>
                </div>
            </div>
        </div>
    </section>

@endsection