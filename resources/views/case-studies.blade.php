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
            --card: #ffffff;
            --shadow: 0 22px 60px rgba(0, 24, 220, .12);
            --radius: 24px;
            --max: 1180px;
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }


        a {
            color: inherit;
            text-decoration: none
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(0, 24, 220, .10)
        }

        .nav {
            max-width: var(--max);
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px
        }

        .brand {
            font-weight: 900;
            letter-spacing: -.04em;
            font-size: 25px;
            color: var(--blue)
        }

        .brand span {
            color: var(--ink)
        }

        .links {
            display: flex;
            gap: 26px;
            align-items: center;
            font-weight: 700;
            font-size: 14px;
            color: #263449
        }

        .nav-cta {
            padding: 12px 18px;
            border-radius: 999px;
            background: var(--blue);
            color: #fff;
            box-shadow: 0 12px 24px rgba(0, 24, 220, .22)
        }

        .hero {
            position: relative;
            overflow: hidden;
            background: radial-gradient(circle at 75% 18%, rgba(21, 209, 255, .22), transparent 28%), linear-gradient(135deg, #061126 0%, #071a52 42%, #0018dc 100%);
            color: #fff
        }

        .hero:after {
            content: "";
            position: absolute;
            inset: auto -10% -34% 45%;
            height: 500px;
            background: rgba(21, 209, 255, .12);
            filter: blur(20px);
            border-radius: 50%
        }

        .hero-inner {
            max-width: var(--max);
            margin: 0 auto;
            padding: 86px 22px 104px;
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.08fr .92fr;
            gap: 44px;
            align-items: center
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: .16em;
            font-weight: 900;
            color: var(--cyan);
            margin-bottom: 18px
        }

        .eyebrow:before {
            content: "";
            width: 34px;
            height: 2px;
            background: var(--cyan)
        }

        h1 {
            font-size: clamp(46px, 7vw, 82px);
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
            max-width: 920px
        }

        .hero h2 {
            font-size: clamp(21px, 2.6vw, 34px);
            line-height: 1.12;
            letter-spacing: -.04em;
            margin: 0 0 20px;
            color: #eaf7ff;
            font-weight: 800
        }

        .lead {
            font-size: 18px;
            color: rgba(255, 255, 255, .82);
            max-width: 760px;
            margin: 0 0 30px
        }

        .cta-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 28px
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 15px 22px;
            font-weight: 900;
            border: 1px solid transparent;
            transition: .22s ease
        }

        .btn.primary {
            background: #fff;
            color: var(--blue)
        }

        .btn.secondary {
            border-color: rgba(255, 255, 255, .38);
            color: #fff
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, .18)
        }

        .hero-card {
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 30px;
            padding: 28px;
            box-shadow: 0 26px 70px rgba(0, 0, 0, .22)
        }

        .quote {
            font-size: 22px;
            line-height: 1.32;
            letter-spacing: -.035em;
            font-weight: 800;
            margin: 0 0 20px;
            color: #fff
        }

        .quote-source {
            color: rgba(255, 255, 255, .7);
            font-size: 14px;
            font-weight: 800
        }

        .mini-metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 22px
        }

        .mini {
            border-radius: 18px;
            background: rgba(255, 255, 255, .12);
            padding: 16px;
            border: 1px solid rgba(255, 255, 255, .16)
        }

        .mini strong {
            display: block;
            font-size: 24px;
            letter-spacing: -.04em;
            color: #fff
        }

        .mini span {
            font-size: 12px;
            color: rgba(255, 255, 255, .72);
            font-weight: 800
        }



        .container {
            max-width: var(--max);
            margin: 0 auto
        }

        .section-head {
            display: grid;
            grid-template-columns: .72fr 1.28fr;
            gap: 42px;
            align-items: start;
            margin-bottom: 34px
        }

        .label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .18em;
            color: var(--blue);
            font-weight: 950;
            margin-bottom: 12px
        }

        h2 {
            font-size: clamp(34px, 4.6vw, 58px);
            line-height: 1;
            letter-spacing: -.065em;
            margin: 0;
            color: var(--ink)
        }

        .section-head p {
            font-size: 18px;
            color: var(--muted);
            margin: 6px 0 0;
            max-width: 740px
        }

        .metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px
        }

        .metric {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            box-shadow: var(--shadow);
            min-height: 175px;
            position: relative;
            overflow: hidden;
            transition: .24s ease
        }

        .metric:before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--blue), var(--blue-dark));
            opacity: 0;
            transition: .24s ease;
            z-index: 0
        }

        .metric>* {
            position: relative;
            z-index: 1
        }

        .metric:hover {
            transform: translateY(-5px);
            border-color: transparent;
            color: #fff
        }

        .metric:hover:before {
            opacity: 1
        }

        .metric:hover p,
        .metric:hover .tag {
            color: rgba(255, 255, 255, .78)
        }

        .big {
            font-size: 42px;
            line-height: .95;
            letter-spacing: -.07em;
            font-weight: 950;
            color: var(--blue);
            margin: 0 0 14px
        }

        .metric:hover .big {
            color: #fff
        }

        .metric h3,
        .card h3 {
            font-size: 22px;
            letter-spacing: -.035em;
            line-height: 1.08;
            margin: 0 0 12px
        }

        p {
            margin: 0 0 16px
        }

        .muted {
            color: var(--muted)
        }

        .tag {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 900;
            color: var(--blue);
            margin-bottom: 12px
        }

        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            align-items: stretch
        }

        .panel {
            border-radius: 30px;
            padding: 36px;
            background: var(--soft);
            border: 1px solid var(--line)
        }

        .panel.dark {
            background: linear-gradient(135deg, #061126, #0018dc);
            color: #fff;
            border: 0;
            box-shadow: 0 28px 80px rgba(0, 24, 220, .22)
        }

        .panel.dark p {
            color: rgba(255, 255, 255, .80)
        }

        .panel h3 {
            font-size: 32px;
            line-height: 1.02;
            letter-spacing: -.055em;
            margin: 0 0 18px
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px
        }

        .card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 24px;
            padding: 28px;
            min-height: 245px;
            transition: .24s ease;
            box-shadow: 0 16px 46px rgba(5, 18, 44, .06)
        }

        .card.swipe:after {
            content: "";
            position: absolute;
            left: -110%;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(105deg, transparent, rgba(21, 209, 255, .16), transparent);
            transition: .5s ease
        }

        .card.swipe:hover:after {
            left: 110%
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 24, 220, .3);
            box-shadow: 0 26px 60px rgba(0, 24, 220, .12)
        }

        .card.fill:hover {
            background: var(--blue);
            color: #fff;
            border-color: var(--blue)
        }

        .card.fill:hover p,
        .card.fill:hover .tag {
            color: rgba(255, 255, 255, .78)
        }

        .number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: rgba(0, 24, 220, .08);
            color: var(--blue);
            font-weight: 950;
            margin-bottom: 18px
        }

        .card.fill:hover .number {
            background: rgba(255, 255, 255, .14);
            color: #fff
        }

        .blue-section {
            background: var(--blue);
            color: #fff;
            position: relative;
            overflow: hidden
        }

        .blue-section h2 {
            color: #fff
        }

        .blue-section .label {
            color: var(--cyan)
        }

        .blue-section p {
            color: rgba(255, 255, 255, .80)
        }

        .blue-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 30px;
            align-items: center
        }

        .timeline {
            display: grid;
            gap: 14px
        }

        .step {
            display: grid;
            grid-template-columns: 70px 1fr;
            gap: 18px;
            align-items: start;
            background: rgba(255, 255, 255, .09);
            border: 1px solid rgba(255, 255, 255, .18);
            padding: 22px;
            border-radius: 22px
        }

        .step strong {
            font-size: 24px;
            color: var(--cyan)
        }

        .step h3 {
            margin: 0 0 8px;
            font-size: 21px;
            letter-spacing: -.03em
        }

        .step p {
            margin: 0
        }

        .result-band {
            background: #061126;
            color: #fff;
            border-radius: 34px;
            padding: 42px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 30px;
            align-items: center;
            box-shadow: 0 24px 70px rgba(0, 0, 0, .18)
        }

        .result-band h2 {
            color: #fff
        }

        .result-band p {
            color: rgba(255, 255, 255, .78)
        }

        .bullets {
            display: grid;
            gap: 12px;
            margin-top: 20px
        }

        .bullet {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: rgba(255, 255, 255, .83)
        }

        .bullet:before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--cyan);
            margin-top: 8px;
            flex: 0 0 auto
        }

        .seo-copy {
            font-size: 18px;
            color: #334056
        }

        .seo-copy p {
            margin-bottom: 20px
        }

        .comparison {
            overflow: hidden;
            border-radius: 28px;
            border: 1px solid var(--line);
            background: #fff;
            box-shadow: var(--shadow)
        }

        .row {
            display: grid;
            grid-template-columns: .34fr .66fr;
            border-bottom: 1px solid var(--line)
        }

        .row:last-child {
            border-bottom: 0
        }

        .row div {
            padding: 24px
        }

        .row .left {
            font-weight: 950;
            color: var(--blue);
            background: #f7faff
        }

        .cta {
            background: linear-gradient(135deg, #061126, #0018dc);
            color: #fff;
            border-radius: 36px;
            padding: 46px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 26px;
            align-items: center
        }

        .cta h2 {
            color: #fff
        }

        .cta p {
            color: rgba(255, 255, 255, .78)
        }

        footer {
            background: #071126;
            color: #fff;
            padding: 56px 22px 28px
        }

        .footer-grid {
            max-width: var(--max);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.55fr .75fr .75fr 1fr;
            gap: 34px
        }

        .footer-grid h3 {
            margin: 0 0 12px
        }

        .footer-grid p,
        .footer-grid a {
            display: block;
            color: rgba(255, 255, 255, .72);
            font-size: 14px;
            margin: 0 0 9px
        }

        .footer-bottom {
            max-width: var(--max);
            margin: 34px auto 0;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, .12);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            color: rgba(255, 255, 255, .58);
            font-size: 13px
        }

        @media (max-width:900px) {
            .links {
                display: none
            }

            .hero-inner,
            .section-head,
            .split,
            .blue-grid,
            .result-band,
            .cta {
                grid-template-columns: 1fr
            }

            .metrics {
                grid-template-columns: 1fr 1fr
            }

            .cards {
                grid-template-columns: 1fr
            }

            .mini-metrics {
                grid-template-columns: 1fr
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr
            }

            .row {
                grid-template-columns: 1fr
            }

            section {
                padding: 58px 18px
            }

            .hero-inner {
                padding-top: 62px
            }

            h1 {
                font-size: 48px
            }
        }

        @media (max-width:560px) {
            .metrics {
                grid-template-columns: 1fr
            }

            .footer-grid {
                grid-template-columns: 1fr
            }

            .footer-bottom {
                flex-direction: column
            }

            .hero-card,
            .panel,
            .cta,
            .result-band {
                border-radius: 22px;
                padding: 26px
            }

            .big {
                font-size: 36px
            }
        }


        .case-hero {
            position: relative;
            overflow: hidden;
            background: radial-gradient(circle at 75% 18%, rgba(21, 209, 255, .22), transparent 28%), linear-gradient(135deg, #061126 0%, #071a52 42%, #0018dc 100%);
            color: #fff;
        }

        .case-hero-inner {
            max-width: var(--max);
            margin: 0 auto;
            padding: 92px 22px 78px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 44px;
            align-items: center;
        }

        .case-hero h1 {
            font-size: clamp(46px, 7vw, 78px);
            line-height: .94;
            letter-spacing: -.075em;
            margin: 0 0 24px;
        }

        .case-hero h2 {
            font-size: clamp(21px, 2.4vw, 32px);
            line-height: 1.12;
            letter-spacing: -.04em;
            margin: 0 0 20px;
            color: #eaf7ff;
        }

        .hero-proof {
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 26px 70px rgba(0, 0, 0, .22);
        }

        .proof-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .proof {
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 18px;
            padding: 18px;
        }

        .proof strong {
            display: block;
            font-size: 32px;
            line-height: .96;
            letter-spacing: -.055em;
            color: #fff;
        }

        .proof span {
            display: block;
            margin-top: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, .75);
            font-weight: 800;
        }

        .case-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .case-card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 5px;
            /* box-shadow: var(--shadow); */
            padding: 30px;
            min-height: 410px;
            display: flex;
            flex-direction: column;
            transition: .24s ease;
        }

        .case-card:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #0018dc;
            transform: scaleX(0);
            /* Start with a scaleX of 0 (hidden) */
            transform-origin: left;
            /* Make the scale start from the left */
            transition: transform 0.3s ease;
            /* Smooth transition */
            z-index: 1;
        }

        .case-card:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
            background: #ffffff;
        }

        .case-card:hover:after {
            transform: scaleX(1);
        }

        .case-top {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: flex-start;
            margin-bottom: 18px;
        }

        .case-product {
            display: inline-flex;
            padding: 9px 1px;
            border-radius: 999px;
            /* background: rgba(0, 24, 220, .08); */
            color: var(--blue);
            font-size: 12px;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-weight: 950;
        }

        .case-location {
            font-size: 12px;
            color: var(--muted);
            font-weight: 850;
            text-align: right;
        }

        .case-card h3 {
            font-size: clamp(27px, 3.2vw, 35px);
            line-height: 1;
            letter-spacing: -.06em;
            margin: 0 0 16px;
            color: var(--ink);
        }

        .case-card p {
            color: var(--muted);
            font-size: 16px;
        }

        .case-metrics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin: 20px 0 22px;
        }

        .case-metric {
            border-radius: 8px;
            background: var(--soft);
            border: 1px solid var(--line);
            padding: 14px;
        }

        .case-metric strong {
            display: block;
            color: var(--blue);
            font-size: 21px;
            letter-spacing: -.04em;
            line-height: 1;
        }

        .case-metric span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.2;
            font-weight: 800;
            margin-top: 7px;
        }

        .case-hook {
            padding: 16px 18px;
            border-left: 4px solid var(--blue);
            background: #f7faff;
            border-radius: 0 18px 18px 0;
            color: #243044;
            font-weight: 750;
            margin-top: auto;
        }

        .case-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 22px;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 18px;
            border-radius: 999px;
            background: var(--blue);
            color: #fff;
            font-weight: 950;
            box-shadow: 0 12px 24px rgba(0, 24, 220, .18);
            transition: .22s ease;
        }

        .read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(0, 24, 220, .24);
        }

        .case-tagline {
            color: var(--muted);
            font-size: 13px;
            font-weight: 800;
        }

        .featured-band {
            background: linear-gradient(135deg, #061126, #0018dc);
            color: #fff;
            border-radius: 36px;
            padding: 42px;
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 28px;
            align-items: center;
        }

        .featured-band h2 {
            color: #fff
        }

        .featured-band p {
            color: rgba(255, 255, 255, .80)
        }

        .featured-points {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .featured-point {
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 20px;
            padding: 18px;
        }

        .featured-point strong {
            display: block;
            color: var(--cyan);
            font-size: 24px;
            letter-spacing: -.04em;
        }

        .featured-point span {
            font-size: 13px;
            color: rgba(255, 255, 255, .72);
            font-weight: 800;
        }

        @media (max-width:900px) {

            .case-hero-inner,
            .featured-band {
                grid-template-columns: 1fr
            }

            .case-grid {
                grid-template-columns: 1fr
            }

            .proof-grid,
            .featured-points {
                grid-template-columns: 1fr 1fr
            }
        }

        @media (max-width:560px) {
            .case-metrics {
                grid-template-columns: 1fr
            }

            .proof-grid,
            .featured-points {
                grid-template-columns: 1fr
            }

            .case-card {
                padding: 24px;
                border-radius: 22px
            }
        }

        /* ================================
                                                                                                                                                       CASE STUDY INTRO SECTION
                                                                                                                                                    ================================ */

        .case-study-intro {
            max-width: 1180px;
            margin: 0 auto 42px;
            padding: 0;
        }

        .case-study-intro-label {
            display: inline-block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #0018dc;
        }

        .case-study-intro-title {
            margin: 0;
            max-width: 25ch;

            color: #000000;
            font-size: clamp(25px, 3vw, 36px);
            line-height: 1.12;
            letter-spacing: -0.04em;
            font-weight: 500;
        }

        .case-study-intro-text {
            margin: 26px 0 0;
            max-width: 65ch;
            font-size: 17px;
            line-height: 1.8;
            color: #535353;
            letter-spacing: -0.025em;
            font-weight: 500;
        }

        @media (max-width: 760px) {
            .case-study-intro {
                margin-bottom: 32px;
            }

            .case-study-intro-label {
                font-size: 16px;
            }

            .case-study-intro-title {
                font-size: 28px;
            }

            .case-study-intro-text {
                font-size: 20px;
                line-height: 1.5;
            }
        }

        .case-actions-with-logo {
            display: grid;
            grid-template-columns: minmax(150px, 1fr) minmax(130px, auto) auto;
            align-items: center;
            gap: 20px;
        }

        .case-client-logo {
            width: 145px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .case-client-logo img {
            display: block;
            max-width: 100%;
            max-height: 70px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        @media (max-width: 640px) {
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
    </style>


    <section>
        <section>
            <div class="container pt-12">

                <div class="case-study-intro">
                    <div class="case-study-intro-label">Field-Proven Performance</div>

                    <h2 class="case-study-intro-title">
                        Documented Results from Real Operating Environments
                    </h2>

                    <p class="case-study-intro-text">
                        These case studies provide documented field performance and operating context to help engineers
                        evaluate application fit, validate expected outcomes, and understand how Fluidstream technology
                        performs under real operating conditions.
                    </p>
                </div>

                <div class="case-grid my-12">

                    <article class="case-card">
                        <div class="case-top">
                            <div class="case-product">MultiphaseCommander™</div>
                            <div class="case-location">Alberta, Canada</div>
                        </div>
                        <h3>Two liquid-loaded wells restored to C$1.5M+ per year in recovered production.</h3>
                        <p>A gas-driven MultiphaseCommander™ reduced backpressure, handled slugs and wide variable flow, and
                            restored
                            two nearly dead wells without adding separation-first infrastructure.</p>
                        <div class="case-metrics">
                            <div class="case-metric"><strong>~10e3</strong><span>m³/day gas restored</span></div>
                            <div class="case-metric"><strong>C$1.5M+ </strong><span>incremental annual revenue</span></div>
                            <div class="case-metric"><strong>~95e3</strong><span>m³/day peak gas flow</span></div>
                        </div>
                        <div class="case-hook">Best for readers evaluating liquid-loaded wells, plunger-lift limits,
                            variable
                            multiphase
                            flow, and production recovery without a larger facility build.</div>
                        <div class="case-actions case-actions-with-logo">
                            <span class="case-tagline">Production recovery</span>


                            <a class="read-more" href="/case-studies/multiphasecommander-production-recovery">
                                Read more
                            </a>
                        </div>
                    </article>

                    <article class="case-card">
                        <div class="case-top">
                            <div class="case-product">VaporCommander™</div>
                            <div class="case-location">Alberta, Canada</div>
                        </div>
                        <h3>More than 4.5 years of VRU operation with only one seal change to date.</h3>
                        <p>VaporCommander™ operated in wet gas service through harsh Alberta winters, reaching approximately
                            35
                            months
                            before the first seal change and continuing with negligible maintenance.</p>
                        <div class="case-metrics">
                            <div class="case-metric"><strong>4.5+</strong><span>years operation</span></div>
                            <div class="case-metric"><strong>35</strong><span>months to first seal change</span></div>
                            <div class="case-metric"><strong>1</strong><span>seal change to date</span></div>
                        </div>
                        <div class="case-hook">A strong reliability story for operators concerned about wet gas, seal life,
                            cold-weather
                            performance, and maintenance-heavy conventional VRUs.</div>
                        <div class="case-actions case-actions-with-logo">
                            <span class="case-tagline">Long-run reliability</span>
                            <div class="case-client-logo">
                                <img src="{{ asset('/img/Torxen logo.webp') }}" alt="Vermilion Energy logo">
                            </div>
                            <a class="read-more" href="/case-studies/vaporcommander-4-5-year-reliability">Read more</a>
                        </div>
                    </article>

                    <article class="case-card">
                        <div class="case-top">
                            <div class="case-product">VaporCommander™</div>
                            <div class="case-location">Southern Alberta, Canada</div>
                        </div>
                        <h3>Vapor combustor replaced with gas capture and revenue-generating vapor recovery.</h3>
                        <p>Instead of burning tank vapors, VaporCommander™ captured approximately 500,000 m³ of natural gas
                            over
                            12
                            months and created more than C$46,000/year in estimated gas value.</p>
                        <div class="case-metrics">
                            <div class="case-metric"><strong>500k</strong><span>m³/year gas captured</span></div>
                            <div class="case-metric"><strong>C$46k+</strong><span>estimated annual gas value</span></div>
                            <div class="case-metric"><strong>0</strong><span>cold-weather stoppages</span></div>
                        </div>
                        <div class="case-hook">Built for readers comparing VCUs, conventional VRUs, carbon exposure, active
                            pressure
                            control, and recovered gas economics.</div>
                        <div class="case-actions case-actions-with-logo">
                            <span class="case-tagline">VCU replacement</span>
                            <div class="case-client-logo case-actions-with-logo">
                                <img src="{{ asset('/img/Torxen logo.webp') }}" alt="Vermilion Energy logo">
                            </div>
                            <a class="read-more" href="/case-studies/vaporcommander-vcu-replacement">Read more</a>
                        </div>
                    </article>

                    <article class="case-card">
                        <div class="case-top">
                            <div class="case-product">VaporCommander™</div>
                            <div class="case-location">Alberta, Canada</div>
                        </div>
                        <h3>100% uptime vapor recovery with no maintenance or service required to date.</h3>
                        <p>Allied Energy II used VaporCommander™ to eliminate tank gas venting while operating through wet
                            gas,
                            variable
                            gas flow, and winter conditions without service intervention.</p>
                        <div class="case-metrics">
                            <div class="case-metric"><strong>100%</strong><span>uptime since install</span></div>
                            <div class="case-metric"><strong>16+</strong><span>months at report date</span></div>
                            <div class="case-metric"><strong>0</strong><span>maintenance or service</span></div>
                        </div>
                        <div class="case-hook">A concise proof point for operators needing emissions compliance, wet-gas
                            tolerance,
                            low-touch operation, and winter reliability.</div>
                        <div class="case-actions case-actions-with-logo">
                            <span class="case-tagline">Uptime and emissions</span>

                            <div class="case-client-logo">
                                <img src="{{ asset('img/Allied Energy.png') }}" alt="Allied Energy II logo">
                            </div>

                            <a class="read-more" href="/case-studies/allied-energy-vaporcommander-vru">
                                Read more
                            </a>
                        </div>
                    </article>
                    <article class="case-card">
                        <div class="case-top">
                            <div class="case-product">VaporCommander™</div>
                            <div class="case-location">Saskatchewan, Canada</div>
                        </div>
                        <h3>Whitecap VRU deployment delivers continuous winter-ready vapor recovery.</h3>
                        <p>Whitecap Resources deployed VaporCommander™ units for vapor recovery in Saskatchewan facilities
                            where
                            cold-weather reliability, entrained liquids, low suction pressure, and minimal operator
                            intervention
                            were key requirements.</p>
                        <div class="case-metrics">
                            <div class="case-metric"><strong>0%</strong><span>reported downtime</span></div>
                            <div class="case-metric"><strong>5 min</strong><span>routine filter change</span></div>
                            <div class="case-metric"><strong>2+</strong><span>units installed / planned</span></div>
                        </div>
                        <div class="case-hook">A strong fit for readers evaluating VRUs in cold climates, liquid-prone vapor
                            streams, remote facilities, and applications where conventional dry-gas VRUs create winter
                            maintenance risk.</div>
                        <div class="case-actions case-actions-with-logo">
                            <span class="case-tagline">Winter VRU reliability</span>

                            <div class="case-client-logo">
                                <img src="{{ asset('img/Whitecap.png') }}" alt="Whitecap Resources logo">
                            </div>

                            <a class="read-more" href="/case-studies/whitecap-vaporcommander-vru">
                                Read more
                            </a>
                        </div>
                    </article>

                </div>
            </div>
        </section>
        </div>
    </section>


@endsection