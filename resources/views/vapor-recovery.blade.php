@extends('layouts.app')

@section('content')

  <style>
    :root {
      --blue: #0018dc;
      --cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #4a5568;
      --line: #d9e6ff;
      --bg: #f7fbff;
      --dark: #07124a;
    }

    * {
      box-sizing: border-box
    }

    a {
      color: inherit
    }

    .wrap {
      max-width: 1200px;
      margin: 0 auto;
    }

    header.hero {
      /* background: #1029ea; */
      color: #fff;
    }

    header.hero::before {
      content: "";
      position: absolute;
      inset: 0;
      /* background: rgba(2, 8, 23, .38) url(/img/hero/vapor-recovery-winter.jpg); */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      /* transform: scaleX(-1) scale(1.03); */
      z-index: -2;
    }

    header.hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background-color: #0206174a;
      z-index: -1;
      pointer-events: none;
    }

    .breadcrumbs {
      font-size: 13px;
      letter-spacing: .04em;
      text-transform: uppercase;
      opacity: .82;
      margin-bottom: 18px
    }

    .eyebrow {
      display: inline-block;
      font-size: 13px;
      letter-spacing: .11em;
      text-transform: uppercase;
      font-weight: 700;
      color: #bfeeff;
      margin-bottom: 14px
    }

    h1 {
      margin: 0 0 14px;
      font-size: 50px;
      line-height: 1.04;
      max-width: 900px;
      letter-spacing: -.03em
    }

    .subhead {
      margin: 0 0 20px;
      font-size: 22px;
      line-height: 1.2;
      color: #e5f1ff;
      max-width: 920px;
      font-weight: 700
    }

    .hero-copy {
      max-width: 880px;
      color: #edf5ff;
      font-size: 18px;
      margin: 0 0 26px
    }

    .btn-row {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 36px
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      border: 1px solid rgba(255, 255, 255, .25);
      transition: .2s ease
    }

    .btn-1 {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      border: 1px solid rgb(104 95 95 / 22%);
      transition: .2s ease
    }

    .btn:hover {
      transform: translateY(-1px)
    }

    .btn-primary {
      background: #fff;
      color: var(--blue)
    }

    .btn-secondary {
      background: transparent;
      color: #fff
    }

    .btn-secondary-1 {
      background: transparent;
      color: #282626c2
    }


    .interactive-card,
    .hero-card,
    .card,
    .feature,
    .highlight-box,
    .model-card,
    .spec-mobile-card {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease, background .28s ease;
    }

    .interactive-card>*,
    .hero-card>*,
    .card>*,
    .feature>*,
    .highlight-box>*,
    .model-card>*,
    .spec-mobile-card>* {
      position: relative;
      z-index: 2;
    }

    .swipe-left:before,
    .swipe-right:before,
    .model-card:before,
    .spec-mobile-card:before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(0, 24, 220, .06) 0%, rgba(21, 209, 255, .12) 48%, rgba(255, 255, 255, 0) 100%);
      opacity: 0;
      transition: opacity .28s ease;
      z-index: 0;
      pointer-events: none;
    }

    .swipe-left:after,
    .swipe-right:after,
    .model-card:after,
    .spec-mobile-card:after {
      content: "";
      position: absolute;
      top: 0;
      width: 76%;
      height: 100%;
      background: linear-gradient(90deg, transparent 0%, rgba(21, 209, 255, .18) 50%, transparent 100%);
      transform: skewX(-24deg);
      transition: all .78s ease;
      z-index: 1;
      pointer-events: none;
    }

    .swipe-left:after,
    .model-card:after,
    .spec-mobile-card:after {
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

    .swipe-right:after {
      right: -135%;
      transform: skewX(24deg);
      background: linear-gradient(270deg, transparent 0%, rgba(21, 209, 255, .18) 50%, transparent 100%);
    }

    .swipe-left:hover,
    .swipe-right:hover,
    .model-card:hover,
    .spec-mobile-card:hover,
    .blue-fill:hover {
      transform: translateY(-3px);
      border-color: #0018dc !important;
      /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
      background: #ffffff;
    }

    .swipe-left:hover:after,
    .hero-card:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after {
      transform: scaleX(1);
    }

    .hero-card:hover {
      box-shadow: 0 26px 56px rgba(0, 24, 220, .18);
      border-color: rgba(255, 255, 255, .3);
    }

    .swipe-left:hover,
    .swipe-right:hover,
    .model-card:hover,
    .spec-mobile-card:hover {
      /* box-shadow: 0 24px 52px rgba(13, 32, 84, .12); */
      border-color: #b9d0ff;
    }

    .blue-fill:hover {
      box-shadow: 0 24px 58px rgba(0, 24, 220, .18);
      border-color: #0018dc;
    }

    .blue-fill:hover .num {
      background: rgba(255, 255, 255, .14);
      color: #fff;
    }


    .cta-panel:hover {
      /* box-shadow: 0 24px 52px rgba(0, 24, 220, .18); */
      border-color: rgba(255, 255, 255, .22);
    }

    .model-card-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
      margin: 0 0 22px;
    }

    .model-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 22px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
    }

    .model-top {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      align-items: flex-start;
      margin-bottom: 16px;
    }

    .model-name {
      font-size: 20px;
      line-height: 1.15;
      color: #232325;
      font-weight: 800;
      letter-spacing: -.02em;
    }

    .model-badge {
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 34px;
      padding: 0 12px;
      border-radius: 999px;
      background: #eef5ff;
      color: var(--blue);
      font-weight: 800;
      font-size: 13px;
      border: 1px solid #d8e8ff;
    }

    .model-metrics {
      display: grid;
      gap: 12px;
    }

    .model-metrics div {
      padding-top: 12px;
      border-top: 1px solid #e7efff;
    }

    .model-metrics span {
      display: block;
      font-size: 12px;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #627390;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .model-metrics strong {
      display: block;
      color: #232325;
      font-size: 18px;
      line-height: 1.2;
    }

    .spec-wrap-enhanced {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 24px;
      box-shadow: 0 16px 40px rgba(13, 32, 84, .05);
      background: #fff;
      margin-top: 10px;
    }

    .spec-table-enhanced {
      border-collapse: separate;
      border-spacing: 0;
      width: 100%;
      min-width: 1100px;
      font-size: 14px;
    }

    .spec-table-enhanced thead th {
      position: sticky;
      top: 0;
      z-index: 2;
      background: #eef5ff;
      color: #232325;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .05em;
      border-bottom: 1px solid #dbe7ff;
    }

    .spec-table-enhanced th,
    .spec-table-enhanced td {
      padding: 14px 12px;
      border-bottom: 1px solid #e8efff;
      text-align: left;
      vertical-align: top;
    }

    .spec-table-enhanced tbody tr:nth-child(even) {
      background: #fbfdff
    }

    .spec-table-enhanced tbody tr:hover {
      background: #f5f9ff
    }

    .spec-col {
      min-width: 240px;
      font-weight: 700;
      color: #232325;
      background: linear-gradient(180deg, #ffffff, #fbfdff);
    }

    .cond-col {
      min-width: 160px;
      color: #425066;
      font-weight: 700;
    }

    .spec-desktop {
      display: block
    }

    .spec-mobile {
      display: none
    }

    .spec-mobile-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 24px;
      padding: 22px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      margin-bottom: 16px;
    }

    .spec-mobile-head {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      align-items: flex-start;
      margin-bottom: 14px;
    }

    .spec-mobile-head h3 {
      margin: 0;
      font-size: 24px;
      line-height: 1.14;
      color: #232325;
    }

    .spec-mobile-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
      margin-bottom: 16px;
    }

    .spec-mobile-grid div {
      background: #f7fbff;
      border: 1px solid #e1ecff;
      border-radius: 16px;
      padding: 14px;
    }

    .spec-mobile-grid span {
      display: block;
      font-size: 12px;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #627390;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .spec-mobile-grid strong {
      display: block;
      color: #232325;
      font-size: 16px;
      line-height: 1.25;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px
    }

    .hero-card {
      background: rgba(255, 255, 255, .11);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 7px;
      padding: 20px;
      min-height: 168px;
      backdrop-filter: blur(7px)
    }

    .hero-card h3 {
      margin: 0 0 8px;
      font-size: 20px;
      line-height: 1.15;
      color: #fff
    }

    .hero-card p {
      margin: 0;
      color: #e8f4ff;
      font-size: 15px
    }

    /* 
                                                                                                                                                                                                      .kicker {
                                                                                                                                                                                                        font-size: 12px;
                                                                                                                                                                                                        letter-spacing: .11em;
                                                                                                                                                                                                        text-transform: uppercase;
                                                                                                                                                                                                        color: var(--blue);
                                                                                                                                                                                                        font-weight: 700;
                                                                                                                                                                                                        margin-bottom: 10px
                                                                                                                                                                                                      } */

    h2 {
      margin: 0 0 16px;
      font-size: clamp(1.9rem, 3vw, 3rem);
      line-height: 1.05;
      letter-spacing: -.04em;
      max-width: 26ch;
      color: #1f1f21;
    }

    .lead {
      margin-bottom: 20px;
      max-width: 68ch;
      font-size: 16px;
      line-height: 1.75;
      color: #424f5d;
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px
    }

    .grid-4 {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px
    }

    .card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 24px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      display: grid;
      align-items: flex-start;
    }

    .card .num {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: #eef5ff;
      color: var(--blue);
      font-weight: 800;
      margin-bottom: 14px
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 20px;
      line-height: 1.14;
      color: #232325
    }

    .card p {
      margin: 0;
      color: var(--muted)
    }

    .band {
      background: #f5f7fb;
      border-top: 1px solid #dfe9ff;
      border-bottom: 1px solid #dfe9ff
    }

    .split {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 26px;
      align-items: start
    }

    .feature-stack {
      display: grid;
      gap: 18px
    }

    .feature {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 22px
    }

    .feature h3 {
      margin: 0 0 10px;
      color: #232325;
      font-size: 24px;
      line-height: 1.14
    }

    .feature p {
      margin: 0;
      color: var(--muted)
    }

    .highlight-box {
      background: #f5f7fb;
      border: 1px solid #d8e8ff;
      border-radius: 7px;
      padding: 26px;
      height: 100%
    }

    .highlight-box h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #232325;
      line-height: 1.12
    }

    .highlight-box p {
      margin: 0 0 14px;
      color: #425066
    }

    .bullet {
      margin: 0;
      padding-left: 20px;
      color: #243042
    }

    .bullet li {
      margin: 0 0 10px
    }

    .spec-wrap {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 12px;
      box-shadow: 0 16px 40px rgba(13, 32, 84, .05);
      background: #fff
    }

    table {
      border-collapse: collapse;
      width: 100%;
      min-width: 980px;
      font-size: 14px
    }

    th,
    td {
      padding: 14px 12px;
      border-bottom: 1px solid #e8efff;
      text-align: left;
      vertical-align: top
    }

    thead th {
      background: #eef5ff;
      color: #232325;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .05em
    }

    tbody tr:nth-child(even) {
      background: #fbfdff
    }

    .case-study {
      background: linear-gradient(130deg, #091553, #0018dc 58%, #0a7ad8);
      color: #fff;
      border-radius: 12px;
      padding: 34px;
      box-shadow: 0 24px 54px rgba(0, 24, 220, .24)
    }

    .case-study .eyebrow2 {
      color: #bdeeff;
      text-transform: uppercase;
      letter-spacing: .1em;
      font-weight: 700;
      font-size: 12px;
      margin-bottom: 10px
    }

    .case-study h2 {
      color: #fff;
      font-size: 40px;
      margin-bottom: 16px
    }

    .case-study p {
      color: #ebf4ff;
      margin: 0 0 16px;
      font-size: 17px
    }

    .stat-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin: 24px 0
    }

    .stat {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 7px;
      padding: 22px 20px
    }

    .stat .label {
      font-size: 12px;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: #bfeeff;
      font-weight: 700;
      margin-bottom: 10px
    }

    .stat .value {
      font-size: 34px;
      line-height: 1.02;
      font-weight: 800;
      margin-bottom: 8px
    }

    blockquote {
      margin: 22px 0 8px;
      padding: 0 0 0 20px;
      border-left: 3px solid rgba(255, 255, 255, .28);
      color: #fff;
      font-size: 22px;
      line-height: 1.35
    }

    .quote-src {
      color: #cfe7ff;
      font-weight: 700;
      margin-bottom: 18px
    }

    /* .cta {
                                                                                                                                                                                                                                background: linear-gradient(120deg, #061760, #0018dc 56%, #0c79cf);
                                                                                                                                                                                                                                color: #fff;
                                                                                                                                                                                                                                padding: 72px 0
                                                                                                                                                                                                                              } */

    .cta-box {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 24px;
      align-items: self-start;
    }

    /* .cta h2 {
                                                                                                                                                                                                                                  color: #fff;
                                                                                                                                                                                                                                  margin-bottom: 14px
                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                .cta p {
                                                                                                                                                                                                                                  margin: 0;
                                                                                                                                                                                                                                  color: #e3ecff;
                                                                                                                                                                                                                                  font-size: 18px;
                                                                                                                                                                                                                                  max-width: 780px
                                                                                                                                                                                                                                } */

    .cta-panel {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgb(87 87 87 / 14%);
      border-radius: 7px;
      padding: 24px;
    }

    .cta-panel h3 {
      margin: 0 0 10px;
      /* color: #fff; */
      font-size: 24px
    }

    .cta-panel ul {
      margin: 0 0 18px;
      padding-left: 20px;
      /* color: #ebf4ff */
    }

    .notes {
      margin-top: 18px;
      color: var(--muted);
      font-size: 15px
    }

    @media (max-width:1080px) {

      .hero-grid,
      .grid-3,
      .grid-4,
      .split,
      .stat-grid,
      .cta-box,
      .model-card-grid {
        grid-template-columns: 1fr 1fr
      }
    }

    @media (max-width:760px) {
      .spec-desktop {
        display: none
      }

      .spec-mobile {
        display: block
      }

      .model-card-grid {
        grid-template-columns: 1fr
      }

      .spec-mobile-grid {
        grid-template-columns: 1fr 1fr
      }

      .wrap {
        padding: 0 18px
      }

      header.hero {
        /* padding: 58px 0 42px */
      }

      h1 {
        font-size: 38px
      }

      .subhead {
        font-size: 22px
      }

      h2 {
        font-size: 31px
      }

      .hero-grid,
      .grid-3,
      .grid-4,
      .split,
      .stat-grid,
      .cta-box {
        grid-template-columns: 1fr
      }

      section {
        padding: 52px 0
      }

      .case-study h2 {
        font-size: 31px
      }
    }

    /* ================================
                                                                                       VAPOR HERO LEFT TEXT + RIGHT CARDS
                                                                                    ================================ */

    header.hero.fs-vapor-hero {
      position: relative !important;
      isolation: isolate;
      overflow: hidden;
      min-height: calc(100vh - 108px);
      display: flex;
      align-items: stretch;
      padding: 0 !important;
      background: #07111f !important;
      color: #ffffff;
    }

    /* Background image */
    header.hero.fs-vapor-hero::before {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -2;

      background-image: url("/img/vapor recovery winter.jpg");
      background-size: cover;
      background-position: center top;
      background-repeat: no-repeat;

      transform: none !important;
      transform-origin: center;
    }

    /* Softer right and bottom overlay so background remains visible */
    header.hero.fs-vapor-hero::after {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -1;
      pointer-events: none;

      /* background:
                                                                              linear-gradient(90deg,
                                                                                rgba(2, 6, 23, 0.92) 0%,
                                                                                rgba(2, 6, 23, 0.82) 34%,
                                                                                rgba(2, 6, 23, 0.42) 62%,
                                                                                rgba(2, 6, 23, 0.10) 100%),
                                                                              linear-gradient(180deg,
                                                                                rgba(2, 6, 23, 0.10) 0%,
                                                                                rgba(2, 6, 23, 0.16) 68%,
                                                                                rgba(2, 6, 23, 0.04) 100%); */
    }

    /* Main hero wrapper */
    header.hero.fs-vapor-hero>.fs-vapor-hero-wrap {
      position: relative;
      z-index: 2;

      width: min(calc(100% - 40px), 1200px);
      max-width: 1200px;
      min-height: calc(100vh - 108px);

      display: flex;
      align-items: center;

      padding-top: 72px !important;
      padding-bottom: clamp(115px, 15vh, 170px) !important;
    }

    /* Two-column layout */
    .fs-vapor-hero-layout {
      position: absolute;
      top: 34px;
      width: 100%;
      display: grid;
      grid-template-columns: minmax(0, 650px) minmax(300px, 380px);
      gap: clamp(48px, 7vw, 110px);
      align-items: start;
    }

    /* Left text must not cross into right card area */
    .fs-vapor-hero-copy {
      max-width: 650px;
    }

    header.hero.fs-vapor-hero .eyebrow {
      display: inline-block;
      margin-bottom: 14px;

      color: #bfeeff !important;
      font-size: 13px;
      font-weight: 800;
      line-height: 1.2;
      letter-spacing: 0.11em;
      text-transform: uppercase;
    }

    header.hero.fs-vapor-hero h1 {
      max-width: 640px;
      margin: 0 0 18px;

      color: #ffffff !important;
      font-size: clamp(46px, 4.4vw, 74px);
      line-height: .98;
      letter-spacing: -0.06em;
      font-weight: 800;
    }

    header.hero.fs-vapor-hero .subhead {
      max-width: 680px;
      margin: -11px 0 22px;
      color: #e5f1ff !important;
      font-size: clamp(19px, 1vw, 18px);
      line-height: 1.26;
      font-weight: 800;
    }

    header.hero.fs-vapor-hero .hero-copy {
      max-width: 670px;
      margin: 0 0 26px;

      color: rgba(237, 245, 255, 0.88) !important;
      font-size: 18px;
      line-height: 1.72;
    }

    header.hero.fs-vapor-hero .patent-note {
      max-width: 650px;
      margin: 16px 0 24px;
      padding: 15px 18px;
      border: 1px solid #d7d7d7;
      border-left: 4px solid #15d1ff;
      border-radius: 0 10px 10px 0;
      /* background: rgba(255, 255, 255, 0.12); */
      /* backdrop-filter: blur(10px); */
      -webkit-backdrop-filter: blur(10px);

      color: rgba(255, 255, 255, 0.88);
      font-size: 15px;
      line-height: 1.6;
    }

    header.hero.fs-vapor-hero .patent-note a {
      color: #ffffff;
      font-weight: 800;
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    header.hero.fs-vapor-hero .btn-row {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-top: 4px;
      margin-bottom: 0 !important;
    }

    /* Right side 3 cards */
    .fs-vapor-hero-cards {
      width: 100%;
      max-width: 370px;
      justify-self: end;

      display: grid;
      grid-template-columns: 1fr;
      gap: 18px;

      transform: translateY(38px);
    }

    header.hero.fs-vapor-hero .hero-card {
      position: relative;
      overflow: hidden;

      min-height: 150px;
      padding: 22px 24px;

      border: 1px solid rgba(255, 255, 255, 0.18);
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.10);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);

      color: #ffffff;
      box-shadow: 0 22px 54px rgba(0, 0, 0, 0.16);

      transition:
        transform 0.28s ease,
        border-color 0.28s ease,
        background 0.28s ease,
        box-shadow 0.28s ease;
    }

    header.hero.fs-vapor-hero .hero-card::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 4px;

      /* background: #15d1ff; */
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.28s ease;
    }

    header.hero.fs-vapor-hero .hero-card:hover {
      transform: translateY(-4px);
      /* border-color: rgba(21, 209, 255, 0.48); */
      background: rgba(255, 255, 255, 0.16);
      box-shadow: 0 30px 64px rgba(0, 24, 220, 0.20);
    }

    header.hero.fs-vapor-hero .hero-card:hover::after {
      transform: scaleX(1);
    }

    header.hero.fs-vapor-hero .hero-card h3 {
      margin: 0 0 10px;

      color: #ffffff !important;
      font-size: 22px;
      line-height: 1.14;
      letter-spacing: -0.035em;
      font-weight: 800;
    }

    header.hero.fs-vapor-hero .hero-card p {
      margin: 0;

      color: rgba(232, 244, 255, 0.90) !important;
      font-size: 15px;
      line-height: 1.58;
    }

    /* Tablet */
    @media (max-width: 1080px) {
      header.hero.fs-vapor-hero {
        min-height: auto;
      }

      header.hero.fs-vapor-hero>.fs-vapor-hero-wrap {
        min-height: auto;
        padding-top: 72px !important;
        padding-bottom: 72px !important;
      }

      .fs-vapor-hero-layout {
        grid-template-columns: 1fr;
        gap: 34px;
      }

      .fs-vapor-hero-copy {
        max-width: 760px;
      }

      .fs-vapor-hero-cards {
        max-width: 100%;
        justify-self: start;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        transform: none;
      }

      header.hero.fs-vapor-hero::after {
        /* background:
                                                                                linear-gradient(90deg,
                                                                                  rgba(2, 6, 23, 0.92) 0%,
                                                                                  rgba(2, 6, 23, 0.78) 58%,
                                                                                  rgba(2, 6, 23, 0.52) 100%); */
      }
    }

    /* Mobile */
    @media (max-width: 760px) {
      header.hero.fs-vapor-hero::before {
        background-position: center bottom;
      }

      header.hero.fs-vapor-hero::after {
        background:
          linear-gradient(180deg,
            rgba(2, 6, 23, 0.94) 0%,
            rgba(2, 6, 23, 0.84) 54%,
            rgba(2, 6, 23, 0.62) 100%);
      }

      header.hero.fs-vapor-hero>.fs-vapor-hero-wrap {
        width: min(calc(100% - 30px), 1200px);
        padding-top: 58px !important;
        padding-bottom: 52px !important;
      }

      header.hero.fs-vapor-hero h1 {
        font-size: 40px;
        line-height: 1.03;
      }

      header.hero.fs-vapor-hero .subhead {
        font-size: 21px;
      }

      header.hero.fs-vapor-hero .hero-copy {
        font-size: 16px;
      }

      .fs-vapor-hero-cards {
        grid-template-columns: 1fr;
      }

      header.hero.fs-vapor-hero .hero-card {
        min-height: auto;
      }

      header.hero.fs-vapor-hero .btn {
        width: 100%;
      }
    }
  </style>


  <header class="hero fs-vapor-hero fs-vapor-hero-updated">
    <style>
      /* ================================
                                     UPDATED VAPOR HERO
                                  ================================ */

      header.hero.fs-vapor-hero-updated {
        position: relative !important;
        isolation: isolate;
        overflow: hidden;
        min-height: calc(100vh - 108px);
        display: flex;
        align-items: stretch;
        padding: 0 !important;
        background: #07111f !important;
        color: #ffffff;
      }

      header.hero.fs-vapor-hero-updated::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -3;
        background-image: url("/img/vapor recovery winter.jpg");
        background-size: cover;
        background-position: center top;
        background-repeat: no-repeat;
        transform: none !important;
      }

      header.hero.fs-vapor-hero-updated::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -2;
        pointer-events: none;
        background:
          linear-gradient(90deg,
            rgba(0, 8, 30, .88) 0%,
            rgba(0, 12, 48, .76) 42%,
            rgba(0, 16, 60, .32) 72%,
            rgba(0, 16, 60, .10) 100%),
          radial-gradient(circle at 82% 16%, rgba(21, 209, 255, .20), transparent 28%);
      }

      header.hero.fs-vapor-hero-updated .fs-vapor-hero-wrap {
        position: relative;
        z-index: 2;
        width: min(calc(100% - 40px), 1200px);
        max-width: 1200px;
        min-height: calc(100vh - 108px);
        margin: 0 auto;
        display: grid;
        grid-template-columns: minmax(0, 760px) minmax(280px, 380px);
        gap: 52px;
        align-items: end;
        padding: 110px 0 82px !important;
      }

      .fs-vapor-hero-main-copy {
        max-width: 760px;
      }

      .fs-vapor-hero-eyebrow {
        margin: 0 0 16px;
        color: #15d1ff;
        font-size: 13px;
        line-height: 1.2;
        font-weight: 900;
        letter-spacing: .13em;
        text-transform: uppercase;
      }

      header.hero.fs-vapor-hero-updated .fs-vapor-hero-title {
        margin: 0 0 22px;
        max-width: 850px;
        color: #ffffff !important;
        font-size: clamp(42px, 5.1vw, 76px);
        line-height: .96;
        letter-spacing: -.06em;
        font-weight: 900;
      }

      header.hero.fs-vapor-hero-updated .fs-vapor-hero-lead {
        margin: 0 0 30px;
        max-width: 700px;
        color: rgba(255, 255, 255, .84) !important;
        font-size: clamp(18px, 1.55vw, 22px);
        line-height: 1.42;
        font-weight: 500;
      }

      .fs-vapor-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
      }

      .fs-vapor-hero-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 50px;
        padding: 0 22px;
        border-radius: 999px;
        text-decoration: none;
        font-size: 14px;
        line-height: 1;
        font-weight: 900;
        transition:
          transform .22s ease,
          box-shadow .22s ease,
          border-color .22s ease,
          background .22s ease,
          color .22s ease;
      }

      .fs-vapor-hero-btn:hover {
        transform: translateY(-2px);
      }

      .fs-vapor-hero-btn-primary {
        background: #ffffff;
        color: #0018dc;
        border: 1px solid #ffffff;
        box-shadow: 0 14px 34px rgba(0, 0, 0, .20);
      }

      .fs-vapor-hero-btn-primary:hover {
        background: #0018dc;
        border-color: #0018dc;
        color: #ffffff;
      }

      .fs-vapor-hero-btn-secondary {
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, .28);
        background: rgba(255, 255, 255, 0);
        /* backdrop-filter: blur(8px); */
        /* -webkit-backdrop-filter: blur(8px); */
      }

      .fs-vapor-hero-btn-secondary:hover {
        background: rgba(255, 255, 255, .14);
        border-color: rgba(255, 255, 255, .42);
        color: #ffffff;
      }

      .fs-vapor-hero-benefits {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
        max-width: 860px;
      }

      .fs-vapor-hero-benefit {
        position: relative;
        overflow: hidden;
        min-height: 98px;
        padding: 14px;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 7px;
        background: rgba(255, 255, 255, 0);
        /* backdrop-filter: blur(8px); */
        /* -webkit-backdrop-filter: blur(8px); */
        transition:
          transform .25s ease,
          border-color .25s ease,
          background .25s ease;
      }

      /* .fs-vapor-hero-benefit::after {
                                content: "";
                                position: absolute;
                                left: 0;
                                right: 0;
                                top: 0;
                                height: 4px;
                                background: #15d1ff;
                                transform: scaleX(0);
                                transform-origin: left;
                                transition: transform .25s ease;
                              } */

      /* .fs-vapor-hero-benefit:hover {
                                transform: translateY(-4px);
                                border-color: rgba(21, 209, 255, .45);
                                background: rgba(255, 255, 255, .12);
                              } */

      .fs-vapor-hero-benefit:hover::after {
        transform: scaleX(1);
      }

      .fs-vapor-hero-benefit strong {
        display: block;
        margin-bottom: 6px;
        color: #ffffff;
        font-size: 14px;
        line-height: 1.2;
        font-weight: 900;
      }

      .fs-vapor-hero-benefit span {
        display: block;
        color: rgba(255, 255, 255, .76);
        font-size: 12.5px;
        line-height: 1.35;
        font-weight: 600;
      }

      .fs-vapor-proof-card {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        padding: 26px;
        border-radius: 7px;
        background: rgba(255, 255, 255, 0);
        border: 1px solid rgba(255, 255, 255, .16);
        /* box-shadow: 0 24px 70px rgba(0, 0, 0, .22); */
        /* backdrop-filter: blur(12px); */
        -webkit-backdrop-filter: blur(12px);
        transition:
          transform .28s ease,
          box-shadow .28s ease,
          border-color .28s ease,
          background .28s ease;
      }

      /* .fs-vapor-proof-card::after {
                                content: "";
                                position: absolute;
                                left: 0;
                                right: 0;
                                top: 0;
                                height: 4px;
                                background: #15d1ff;
                                transform: scaleX(0);
                                transform-origin: left;
                                transition: transform .28s ease;
                                z-index: 2;
                              } */

      /* .fs-vapor-proof-card:hover {
                          transform: translateY(-4px);
                          border-color: rgba(21, 209, 255, .42);
                          background: rgba(255, 255, 255, .12);
                          box-shadow: 0 30px 78px rgba(0, 0, 0, .28);
                        } */

      .fs-vapor-proof-card:hover::after {
        transform: scaleX(1);
      }

      .fs-vapor-proof-card h2 {
        margin: 0 0 12px;
        color: #ffffff;
        font-size: 24px;
        line-height: 1.1;
        letter-spacing: -.035em;
        font-weight: 850;
      }

      .fs-vapor-proof-card p {
        margin: 0 0 20px;
        color: rgba(255, 255, 255, .76);
        font-size: 15px;
        line-height: 1.6;
        font-weight: 500;
      }

      .fs-vapor-proof-list {
        display: grid;
        gap: 12px;
      }

      .fs-vapor-proof-item {
        display: grid;
        grid-template-columns: 10px minmax(0, 1fr);
        gap: 10px;
        align-items: start;
        padding-top: 12px;
        border-top: 1px solid rgba(255, 255, 255, .10);
        color: rgba(255, 255, 255, .86);
        font-size: 14px;
        line-height: 1.48;
        font-weight: 750;
        text-decoration: none;
        transition: color .22s ease;
      }

      .fs-vapor-proof-item:first-child {
        padding-top: 0;
        border-top: 0;
      }

      .fs-vapor-proof-item:hover {
        color: #ffffff;
      }

      .fs-vapor-proof-dot {
        width: 7px;
        height: 7px;
        margin-top: 7px;
        border-radius: 999px;
        background: #ffffff;
        box-shadow: 0 0 0 7px rgba(147, 147, 147, 0.1);
      }

      @media (max-width: 1080px) {
        header.hero.fs-vapor-hero-updated {
          min-height: auto;
        }

        header.hero.fs-vapor-hero-updated .fs-vapor-hero-wrap {
          min-height: auto;
          grid-template-columns: 1fr;
          gap: 34px;
          align-items: start;
          padding: 86px 0 68px !important;
        }

        .fs-vapor-proof-card {
          max-width: 640px;
        }

        .fs-vapor-hero-benefits {
          grid-template-columns: repeat(2, minmax(0, 1fr));
        }
      }

      @media (max-width: 700px) {
        header.hero.fs-vapor-hero-updated::before {
          background-position: center bottom;
        }

        header.hero.fs-vapor-hero-updated::after {
          background:
            linear-gradient(180deg,
              rgba(2, 6, 23, 0.94) 0%,
              rgba(2, 6, 23, 0.84) 54%,
              rgba(2, 6, 23, 0.62) 100%);
        }

        header.hero.fs-vapor-hero-updated .fs-vapor-hero-wrap {
          width: min(calc(100% - 30px), 1200px);
          padding: 68px 0 56px !important;
        }

        header.hero.fs-vapor-hero-updated .fs-vapor-hero-title {
          font-size: 40px;
          line-height: 1.03;
        }

        header.hero.fs-vapor-hero-updated .fs-vapor-hero-lead {
          font-size: 17px;
          line-height: 1.45;
        }

        .fs-vapor-hero-actions {
          flex-direction: column;
        }

        .fs-vapor-hero-btn {
          width: 100%;
        }

        .fs-vapor-hero-benefits {
          grid-template-columns: 1fr;
        }

        .fs-vapor-hero-benefit {
          min-height: auto;
        }

        .fs-vapor-proof-card {
          padding: 22px;
        }
      }
    </style>

    <div class="fs-vapor-hero-wrap">
      <div class="fs-vapor-hero-main-copy">

        <h1 class="fs-vapor-hero-title">
          Built for vapor streams conventional VRUs were not designed to handle.
        </h1>

        <p class="fs-vapor-hero-lead">
          VaporCommander™ is engineered for wet, unstable, and liquid-influenced vapor streams where conventional
          gas-only VRUs struggle with reliability, maintenance, and uptime.
        </p>

        <div class="fs-vapor-hero-actions">
          <a class="fs-vapor-hero-btn fs-vapor-hero-btn-primary" href="#specifications">
            View Specifications
          </a>

          <a class="fs-vapor-hero-btn fs-vapor-hero-btn-secondary" href="#vapor-technology-benefits">
            See Technology Benefits
          </a>
        </div>

        <div class="fs-vapor-hero-benefits" aria-label="VaporCommander benefits">
          <div class="fs-vapor-hero-benefit">
            <strong>Wet vapor service</strong>
            <span>Built for liquids and unstable vapor flow.</span>
          </div>

          <div class="fs-vapor-hero-benefit">
            <strong>Reduced venting</strong>
            <span>Capture tank vapors and reduce emissions.</span>
          </div>

          <div class="fs-vapor-hero-benefit">
            <strong>Cold-weather fit</strong>
            <span>Reduce separator and scrubber freeze risks.</span>
          </div>

          <div class="fs-vapor-hero-benefit">
            <strong>Low-touch operation</strong>
            <span>Designed for reliability and reduced intervention.</span>
          </div>
        </div>
      </div>

      <aside class="fs-vapor-proof-card">
        <h2>Patent-backed liquid response.</h2>

        <p>
          Supported by patented operating methods for liquid-influenced compression behavior, including
          US11098709B2.
        </p>

        <div class="fs-vapor-proof-list">
          <a class="fs-vapor-proof-item" href="#vapor-technology-benefits">
            <span class="fs-vapor-proof-dot"></span>
            <span>Designed for wet and liquid-influenced vapor streams.</span>
          </a>

          <a class="fs-vapor-proof-item" href="#case-study">
            <span class="fs-vapor-proof-dot"></span>
            <span>Field-proven uptime in vapor recovery service.</span>
          </a>

          <a class="fs-vapor-proof-item" href="#specifications">
            <span class="fs-vapor-proof-dot"></span>
            <span>VRU models available for application review.</span>
          </a>
        </div>
      </aside>
    </div>
  </header>

  <section>
    <div class="wrap py-12">
      <div class="kicker">Why multiphase compression matters</div>
      <h2>Vapor recovery is not a gas-only problem.</h2>
      <p class="lead">
        In many field applications, vapor recovery streams contain more than gas. Entrained liquids, intermittent slugs,
        sand, and variable gas quality can force conventional gas-only VRUs into unstable operation, higher maintenance,
        or narrower operating windows. A vapor recovery solution designed around multiphase reality gives operators a more
        practical path to gas recovery, emissions reduction, and broader deployment.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Conventional VRUs prefer clean gas</h3>
          <p>Performance and reliability often deteriorate when liquids enter the system or when flow becomes unstable.
          </p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Support equipment adds burden</h3>
          <p>Separators, scrubbers, knockout drums, heaters, and related hardware can raise total cost, footprint, and
            maintenance exposure.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Difficult sites get left behind</h3>
          <p>Applications with liquids, slugs, or upset conditions often become harder to justify economically or
            operationally with gas-only architecture.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="kicker">Why VaporCommander™ changes the equation</div>
      <h2>Built to outperform gas-only vapor recovery approaches.</h2>
      <p class="lead">
        VaporCommander™ is a multiphase vapor recovery platform built to work with actual field conditions, rather than
        depending on idealized gas-only behavior.
      </p>
      <div class="grid-4">
        <div class="card interactive-card swipe-left">
          <h3>Broader deployment</h3>
          <p>Creates a stronger fit across difficult field conditions where liquids, unstable flow, and upset behavior
            limit conventional systems.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Greater liquid tolerance</h3>
          <p>Built around incompressible liquid handling inside compression rather than treating liquid presence as an
            off-design event.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Reduced surrounding equipment dependence</h3>
          <p>Supports simpler vapor recovery strategies with less dependence on added support equipment in suitable
            applications.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Better operating practicality</h3>
          <p>Improves the practicality of emissions reduction and gas monetization where conventional VRUs become
            maintenance-heavy.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="vapor-technology-benefits" class="vapor-benefits-section">
    <div class="wrap py-12">
      <div class="kicker">Advantages of the Fluidstream vapor recovery package</div>

      <h2>Built on Fluidstream multiphase technology.</h2>

      <p class="lead">
        VaporCommander™ combines multiphase handling, hazardous-service sealing, intelligent controls, and package
        flexibility to create a more resilient vapor recovery platform.
      </p>

      {{-- 6 equal cards: 2 columns x 3 rows --}}
      <div class="vapor-benefits-grid">
        <div class="vapor-benefit-card">
          <h3>Designed for incompressible liquid handling</h3>
          <p>
            Fluidstream’s multiphase platform is built around a patented methodology for safely, efficiently, and reliably
            handling incompressible liquids within the compression chamber, critical in real vapor recovery streams where
            liquids are often present.
          </p>
        </div>

        <div class="vapor-benefit-card">
          <h3>Sealed gland architecture for hazardous service</h3>
          <p>
            A patent-pending gland sealing configuration with electronic wear detection and a fully sealed gland
            arrangement helps contain toxic or corrosive multiphase fluids, including H₂S-bearing streams.
          </p>
        </div>

        <div class="vapor-benefit-card">
          <h3>Autonomous control through upset conditions</h3>
          <p>
            Full piston tracking supports optimized control, protects against ice and solids buildup, and helps the
            system operate safely through slugs and changing process conditions.
          </p>
        </div>

        <div class="vapor-benefit-card">
          <h3>Long-life alignment in wear-critical areas</h3>
          <p>
            The package is designed to maintain alignment in key stress and wear zones, helping extend component and
            seal life.
          </p>
        </div>

        <div class="vapor-benefit-card">
          <h3>Sand-capable sealing configuration</h3>
          <p>
            Multiphase piston sealing and gland sealing are configured to optimize life in applications where sand is
            present.
          </p>
        </div>

        <div class="vapor-benefit-card">
          <h3>Flexible drive options with integrated intelligence</h3>
          <p>
            In addition to electric drive, Fluidstream offers gas-drive integration with key operating data fed into
            autonomous controls to maintain performance when fuel gas quality is compromised.
          </p>
        </div>
      </div>

      {{-- Big comparison card at bottom --}}
      <div class="vapor-comparison-card" id="comparison">
        <div class="vapor-comparison-copy">
          <h3>Conventional VRUs vs. VaporCommander™</h3>

          <p>
            Buyers evaluating vapor recovery systems are often comparing gas-only VRUs against packages that offer
            varying levels of liquid tolerance. VaporCommander™ is differentiated by a multiphase-first design philosophy
            built around real operating conditions.
          </p>
        </div>

        <div class="vapor-comparison-list">
          <ul>
            <li>
              <strong>Handles entrained liquids:</strong>
              core design premise of the package rather than a narrow tolerance claim.
            </li>

            <li>
              <strong>Operates through slugs and upset conditions:</strong>
              autonomous logic and piston tracking support upset handling.
            </li>

            <li>
              <strong>Sealed hazardous-service gland design:</strong>
              fully sealed gland approach with wear detection.
            </li>

            <li>
              <strong>Sand-oriented sealing strategy:</strong>
              sealing configured to optimize life in sandy applications.
            </li>

            <li>
              <strong>System simplicity at the site level:</strong>
              supports a simpler, broader deployment strategy.
            </li>

            <li>
              <strong>Range of viable vapor recovery applications:</strong>
              stronger fit for difficult real-world streams.
            </li>
          </ul>

          <div class="vapor-comparison-links">
            <a href="{{ url('/technology') }}">View technology page →</a>
            <a href="{{ url('/patented-technology') }}">View patented technology →</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    /* ================================
                                                                                                                 VAPOR BENEFITS SECTION
                                                                                                                 2 COLUMNS x 3 ROWS + BIG CARD
                                                                                                              ================================ */

    .vapor-benefits-section {
      background: #ffffff;
    }

    .vapor-benefits-section .wrap {
      max-width: 1200px;
      margin: 0 auto;
    }

    .vapor-benefits-section .kicker {
      display: inline-flex;
      align-items: center;
      margin-bottom: 10px;
      color: #0018dc;
      font-size: 13px;
      font-weight: 800;
      line-height: 1;
      letter-spacing: .18em;
      text-transform: uppercase;
    }

    .vapor-benefits-section h2 {
      margin: 0 0 18px;
      max-width: 760px;
      color: #1f1f21;
      font-size: clamp(34px, 4vw, 56px);
      line-height: .98;
      letter-spacing: -.055em;
      font-weight: 500;
    }

    .vapor-benefits-section .lead {
      max-width: 790px;
      margin: 0;
      color: #52667a;
      font-size: 17px;
      line-height: 1.72;
    }

    /* 6 benefit cards, 2 columns x 3 rows */
    .vapor-benefits-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      grid-auto-rows: 1fr;
      gap: 18px;
      margin-top: 34px;
      align-items: stretch;
    }

    .vapor-benefit-card {
      position: relative;
      overflow: hidden;
      /* min-height: 255px; */
      height: 100%;
      display: flex;
      flex-direction: column;
      padding: 24px 24px 22px;
      border: 1px solid #d9e6ff;
      border-radius: 7px;
      background: #ffffff;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease,
        background .25s ease;
    }

    .vapor-benefit-card::before {
      content: "";
      position: absolute;
      inset: 0;
      /* background: linear-gradient(135deg,
                                                                                                                  rgba(0, 24, 220, .045) 0%,
                                                                                                                  rgba(21, 209, 255, .10) 48%,
                                                                                                                  rgba(255, 255, 255, 0) 100%); */
      opacity: 0;
      pointer-events: none;
      transition: opacity .25s ease;
    }

    .vapor-benefit-card::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 4px;
      background: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .25s cubic-bezier(.22, .61, .36, 1);
    }

    .vapor-benefit-card:hover {
      transform: translateY(-4px);
      border-color: #0018dc;
      /* box-shadow: 0 24px 54px rgba(0, 24, 220, .14); */
      background: #ffffff;
    }

    .vapor-benefit-card:hover::before {
      opacity: 1;
    }

    .vapor-benefit-card:hover::after {
      transform: scaleX(1);
    }

    .vapor-benefit-card h3 {
      position: relative;
      z-index: 2;
      margin: 0 0 12px;
      color: #232325;
      font-size: 24px;
      line-height: 1.12;
      letter-spacing: -.035em;
      font-weight: 500;
    }

    .vapor-benefit-card p {
      position: relative;
      z-index: 2;
      margin: 0;
      color: #4a5568;
      font-size: 16px;
      line-height: 1.64;
    }

    /* Big comparison card below the 6 cards */
    .vapor-comparison-card {
      display: grid;
      grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
      gap: 42px;
      align-items: start;
      margin-top: 26px;
      padding: 42px 46px;
      border: 1px solid #d9e6ff;
      border-radius: 7px;
      background: #f6f7fb;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
    }

    .vapor-comparison-card:hover {
      transform: translateY(-3px);
      border-color: #b9d0ff;
      /* box-shadow: 0 24px 54px rgba(0, 24, 220, .10); */
    }

    .vapor-comparison-copy h3 {
      margin: 0 0 18px;
      color: #0a1c4d;
      font-size: clamp(24px, 2.4vw, 45px);
      line-height: .98;
      letter-spacing: -.055em;
      font-weight: 500;
    }

    .vapor-comparison-copy p {
      margin: 0;
      color: #52667a;
      font-size: 17px;
      line-height: 1.62;
    }

    .vapor-comparison-list ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 16px;
    }

    .vapor-comparison-list li {
      position: relative;
      padding-left: 34px;
      color: #334155;
      font-size: 16px;
      line-height: 1.65;
    }

    .vapor-comparison-list li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 7px;
      width: 20px;
      height: 14px;
      background-repeat: no-repeat;
      background-size: 20px 14px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='14' viewBox='0 0 20 14' fill='none'%3E%3Cpath d='M1 7h15' stroke='%230018dc' stroke-width='2' stroke-linecap='round'/%3E%3Cpath d='M11 1.5L17 7l-6 5.5' stroke='%230018dc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    }

    .vapor-comparison-list strong {
      color: #0f172a;
      font-weight: 800;
    }

    .vapor-comparison-links {
      display: flex;
      flex-wrap: wrap;
      gap: 18px;
      margin-top: 24px;
      justify-content: end;
    }

    .vapor-comparison-links a {
      color: #0018dc;
      font-size: 16px;
      font-weight: 800;
      text-decoration: none;
    }

    .vapor-comparison-links a:hover {
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    /* Override old split layout if it still exists */
    #vapor-technology-benefits .split {
      display: block;
    }

    #vapor-technology-benefits .feature-stack {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      grid-auto-rows: 1fr;
      gap: 18px;
      align-items: stretch;
    }

    #vapor-technology-benefits .highlight-box {
      margin-top: 26px;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .vapor-benefits-grid {
        grid-template-columns: 1fr;
      }

      .vapor-comparison-card {
        grid-template-columns: 1fr;
        gap: 28px;
        padding: 34px;
      }

      #vapor-technology-benefits .feature-stack {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 700px) {
      .vapor-benefits-section .wrap {
        padding-left: 18px;
        padding-right: 18px;
      }

      .vapor-benefit-card {
        min-height: auto;
        padding: 22px 20px;
        border-radius: 12px;
      }

      .vapor-benefit-card h3 {
        font-size: 22px;
      }

      .vapor-comparison-card {
        padding: 26px 22px;
        border-radius: 12px;
      }

      .vapor-comparison-copy h3 {
        font-size: 34px;
      }

      .vapor-comparison-copy p {
        font-size: 17px;
      }

      .vapor-comparison-links {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>
  <section class="fs-vru-diff-section" id="vru-differentiation">
    <style>
      .fs-vru-diff-section {
        --vru-blue: #0018dc;
        --vru-cyan: #15d1ff;
        --vru-ink: #07111f;
        --vru-muted: #4a5568;
        --vru-soft: #f5f7fb;
        --vru-line: #d9e6ff;
        --vru-dark: #07124a;

        position: relative;
        overflow: hidden;
        background: #f5f7fb;
        border-top: 1px solid #dfe9ff;
        border-bottom: 1px solid #dfe9ff;
      }

      .fs-vru-diff-section,
      .fs-vru-diff-section * {
        box-sizing: border-box;
      }

      .fs-vru-diff-head {
        /* display: grid; */
        grid-template-columns: minmax(0, 1.05fr) minmax(300px, 0.78fr);
        gap: 34px;
        align-items: end;
        margin-bottom: 26px;
      }

      .fs-vru-diff-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        color: var(--vru-blue);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .11em;
        text-transform: uppercase;
      }

      /* .fs-vru-diff-head h2 {
                                                                                                                                                      margin: 0;
                                                                                                                                                      max-width: 760px;
                                                                                                                                                      font-size: clamp(1.9rem, 3vw, 3rem);
                                                                                                                                                      line-height: 1.05;
                                                                                                                                                      letter-spacing: -.04em;
                                                                                                                                                      color: #1f1f21;
                                                                                                                                                    } */

      .fs-vru-diff-head h2 span {
        color: var(--vru-blue);
      }

      /* .fs-vru-diff-head p {
                                                                                                                                                    margin: 0;
                                                                                                                                                    color: var(--vru-muted);
                                                                                                                                                    font-size: 16px;
                                                                                                                                                    line-height: 1.75;
                                                                                                                                                  } */

      .fs-vru-diff-summary {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 22px;
      }

      .fs-vru-diff-card {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        background: #ffffff;
        border: 1px solid var(--vru-line);
        border-radius: 7px;
        padding: 24px;
        box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
        transition: transform .28s ease, border-color .28s ease, background .28s ease;
      }

      .fs-vru-diff-card::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--vru-blue);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .3s ease;
        z-index: 1;
      }

      .fs-vru-diff-card:hover {
        transform: translateY(-3px);
        border-color: var(--vru-blue);
        background: #ffffff;
      }

      .fs-vru-diff-card:hover::after {
        transform: scaleX(1);
      }

      .fs-vru-diff-card strong {
        position: relative;
        z-index: 2;
        display: block;
        margin-bottom: 10px;
        color: #232325;
        font-size: 20px;
        line-height: 1.15;
        letter-spacing: -.02em;
        font-weight: 800;
      }

      .fs-vru-diff-card p {
        position: relative;
        z-index: 2;
        margin: 0;
        color: var(--vru-muted);
        font-size: 15px;
        line-height: 1.62;
      }

      .fs-vru-diff-table {
        overflow: hidden;
        border: 1px solid var(--vru-line);
        border-radius: 7px;
        background: #ffffff;
        box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      }

      .fs-vru-diff-table-head,
      .fs-vru-diff-row {
        display: grid;
        grid-template-columns: 0.9fr 1fr 1fr;
      }

      .fs-vru-diff-table-head {
        background: #0018dc;
        color: #ffffff;
      }

      .fs-vru-diff-table-head div {
        padding: 18px 20px;
        border-right: 1px solid rgba(255, 255, 255, .12);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      .fs-vru-diff-table-head div:last-child {
        border-right: none;
        background: var(--vru-blue);
      }

      .fs-vru-diff-row {
        border-top: 1px solid var(--vru-line);
        transition: background .22s ease;
      }

      .fs-vru-diff-row:hover {
        background: #f8fbff;
      }

      .fs-vru-diff-cell {
        min-height: 78px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        border-right: 1px solid var(--vru-line);
        color: var(--vru-muted);
        font-size: 15px;
        line-height: 1.45;
        font-weight: 650;
      }

      .fs-vru-diff-cell:last-child {
        border-right: none;
      }

      .fs-vru-diff-criteria {
        color: #232325;
        font-weight: 800;
        letter-spacing: -.015em;
      }

      .fs-vru-diff-fluidstream {
        position: relative;
        color: #232325;
        font-weight: 800;
        background: #f6f7fb;
      }

      .fs-vru-diff-fluidstream::before {
        content: "";
        width: 8px;
        height: 8px;
        margin-right: 11px;
        flex: 0 0 auto;
        border-radius: 999px;
        background: var(--vru-cyan);
        box-shadow: 0 0 0 5px rgba(21, 209, 255, .14);
      }

      .fs-vru-diff-bottom {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 22px;
        align-items: center;
        margin-top: 22px;
        padding: 26px;
        border-radius: 7px;
        background: #0018dc;
        color: #ffffff;
        overflow: hidden;
        position: relative;
      }

      /* .fs-vru-diff-bottom::after {
                                        content: "";
                                        position: absolute;
                                        width: 230px;
                                        height: 230px;
                                        right: -90px;
                                        top: -120px;
                                        border-radius: 999px;
                                        background: rgba(21, 209, 255, .18);
                                        pointer-events: none;
                                      } */

      .fs-vru-diff-bottom-content {
        position: relative;
        z-index: 1;
      }

      .fs-vru-diff-bottom strong {
        display: block;
        margin-bottom: 8px;
        color: #ffffff;
        font-size: 22px;
        line-height: 1.18;
        letter-spacing: -.02em;
        font-weight: 800;
      }

      .fs-vru-diff-bottom p {
        margin: 0;
        max-width: 760px;
        color: #e8f4ff;
        line-height: 1.65;
        font-size: 15px;
      }

      .fs-vru-diff-bottom .btn {
        position: relative;
        z-index: 1;
        white-space: nowrap;
        box-shadow: none;
      }

      @media (max-width: 1080px) {

        .fs-vru-diff-head,
        .fs-vru-diff-summary,
        .fs-vru-diff-bottom {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 900px) {
        .fs-vru-diff-table-head {
          display: none;
        }

        .fs-vru-diff-row {
          grid-template-columns: 1fr;
          border-top: 8px solid #f1f4f9;
        }

        .fs-vru-diff-row:first-child {
          border-top: 0;
        }

        .fs-vru-diff-cell {
          min-height: auto;
          display: block;
          border-right: none;
          border-bottom: 1px solid var(--vru-line);
          padding: 16px 18px;
        }

        .fs-vru-diff-cell:last-child {
          border-bottom: 0;
        }

        .fs-vru-diff-cell::before {
          display: block;
          margin-bottom: 7px;
          color: var(--vru-blue);
          font-size: 11px;
          font-weight: 850;
          letter-spacing: .11em;
          text-transform: uppercase;
        }

        .fs-vru-diff-criteria::before {
          content: "Criteria";
        }

        .fs-vru-diff-conventional::before {
          content: "Conventional VRU";
        }

        .fs-vru-diff-fluidstream::before {
          content: "VaporCommander™";
          width: auto;
          height: auto;
          margin: 0 0 7px 0;
          border-radius: 0;
          background: transparent;
          box-shadow: none;
        }

        .fs-vru-diff-fluidstream {
          display: block;
        }
      }

      @media (max-width: 760px) {
        .fs-vru-diff-bottom {
          padding: 22px;
        }
      }

      /* ================================
                                                                                                                       VAPOR RECOVERY HERO FULL IMAGE FIX
                                                                                                                    ================================ */

      header.hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        color: #ffffff;
        background: #07111f;

        min-height: calc(100vh - 108px);
        display: flex;
        align-items: stretch;

        padding: 0 !important;
      }

      /* Full-height background image */
      header.hero::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -2;

        background-image: url("/img/hero/vru facility-with-pump-jack-truck.png");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;

        /* transform: scaleX(-1) scale(1.04); */
        transform-origin: center;
      }

      /* Dark overlay */
      header.hero::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        pointer-events: none;

        /* background: linear-gradient(90deg, rgba(2, 6, 23, 0.88) 0%, rgb(2 6 23 / 59%) 46%, rgb(2 6 23 / 9%) 100%), radial-gradient(circle at 82% 18%, rgba(21, 209, 255, 0.16), transparent 30%); */
      }

      /* Hero content wrapper */
      header.hero>.wrap {
        position: relative;
        z-index: 2;

        width: min(calc(100% - 40px), 1200px);
        min-height: calc(100vh - 108px);

        display: flex;
        flex-direction: column;
        justify-content: center;

        padding-top: 72px !important;
        padding-bottom: 72px !important;
      }

      /* Eyebrow */
      header.hero .eyebrow {
        display: inline-block;
        margin-bottom: 14px;

        color: #bfeeff;
        font-size: 13px;
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: 0.11em;
        text-transform: uppercase;
      }

      /* Hero title */
      header.hero h1 {
        margin: 0 0 16px;
        max-width: 900px;

        color: #ffffff;
        font-size: clamp(28px, 3.8vw, 54px);
        line-height: 1.02;
        letter-spacing: -0.045em;
        font-weight: 700;
      }

      /* Subheading */
      header.hero .subhead {
        max-width: 920px;
        margin: 0 0 22px;

        color: #e5f1ff;
        font-size: clamp(20px, 2vw, 26px);
        line-height: 1.28;
        font-weight: 700;
      }

      /* Hero paragraph */
      header.hero .hero-copy {
        max-width: 890px;
        margin: 0 0 26px;

        color: #edf5ff;
        font-size: 18px;
        line-height: 1.72;
      }

      /* Patent note */
      header.hero .patent-note {
        max-width: 860px;
        margin: 16px 0 24px;
        padding: 15px 18px;

        border-left: 4px solid #15d1ff;
        border-radius: 0 10px 10px 0;
        /* background: rgba(255, 255, 255, 0.12); */
        /* backdrop-filter: blur(10px); */

        color: rgba(255, 255, 255, 0.88);
        font-size: 15px;
        line-height: 1.6;
      }

      header.hero .patent-note a {
        color: #ffffff;
        font-weight: 800;
        text-decoration: underline;
        text-underline-offset: 3px;
      }

      /* Hero buttons */
      header.hero .btn-row {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 4px;
        margin-bottom: 38px;
      }

      header.hero .btn {
        min-height: 52px;
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0 22px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.28);

        font-size: 15px;
        font-weight: 800;
        line-height: 1;
        text-decoration: none;

        transition:
          transform 0.22s ease,
          box-shadow 0.22s ease,
          background 0.22s ease,
          border-color 0.22s ease;
      }

      header.hero .btn:hover {
        transform: translateY(-3px);
      }

      header.hero .btn-primary {
        background: #ffffff;
        color: #0018dc;
        border-color: #ffffff;
        box-shadow: 0 20px 48px rgba(0, 0, 0, 0.20);
      }

      header.hero .btn-primary:hover {
        box-shadow: 0 26px 62px rgba(0, 0, 0, 0.28);
      }

      header.hero .btn-secondary {
        background: rgba(255, 255, 255, 0.10);
        color: #ffffff;
        backdrop-filter: blur(10px);
      }

      header.hero .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.16);
        border-color: rgba(255, 255, 255, 0.42);
      }

      /* Hero cards */
      header.hero .hero-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
      }

      header.hero .hero-card {
        position: relative;
        overflow: hidden;

        min-height: 168px;
        padding: 22px;

        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);

        color: #ffffff;
        transition:
          transform 0.28s ease,
          border-color 0.28s ease,
          background 0.28s ease,
          box-shadow 0.28s ease;
      }

      header.hero .hero-card::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 4px;

        /* background: #15d1ff; */
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.28s ease;
      }

      header.hero .hero-card:hover {
        transform: translateY(-4px);
        /* border-color: rgba(21, 209, 255, 0.44); */
        background: rgba(255, 255, 255, 0.17);
        box-shadow: 0 26px 56px rgba(0, 24, 220, 0.20);
      }

      header.hero .hero-card:hover::after {
        transform: scaleX(1);
      }

      header.hero .hero-card h3 {
        margin: 0 0 9px;

        color: #ffffff;
        font-size: 21px;
        line-height: 1.16;
        letter-spacing: -0.025em;
        font-weight: 700;
      }

      header.hero .hero-card p {
        margin: 0;

        color: rgba(232, 244, 255, 0.90);
        font-size: 15px;
        line-height: 1.58;
      }

      /* ================================
                                                                                                                       RESPONSIVE HERO
                                                                                                                    ================================ */

      @media (max-width: 1080px) {
        header.hero {
          min-height: auto;
        }

        header.hero>.wrap {
          min-height: auto;
          padding-top: 72px !important;
          padding-bottom: 62px !important;
        }

        header.hero .hero-grid {
          grid-template-columns: 1fr 1fr;
        }

        header.hero::after {
          background:
            linear-gradient(90deg,
              rgba(2, 6, 23, 0.92) 0%,
              rgba(2, 6, 23, 0.80) 56%,
              rgba(2, 6, 23, 0.62) 100%);
        }
      }

      @media (max-width: 760px) {
        header.hero {
          min-height: auto;
        }

        header.hero::before {
          background-size: cover;
          background-position: center center;
          /* transform: scaleX(-1) scale(1.06); */
        }

        header.hero::after {
          background:
            linear-gradient(180deg,
              rgba(2, 6, 23, 0.94) 0%,
              rgba(2, 6, 23, 0.84) 54%,
              rgba(2, 6, 23, 0.70) 100%);
        }

        header.hero>.wrap {
          width: min(calc(100% - 30px), 1200px);
          min-height: auto;
          padding-top: 58px !important;
          padding-bottom: 48px !important;
        }

        header.hero h1 {
          font-size: 38px;
          line-height: 1.05;
        }

        header.hero .subhead {
          font-size: 21px;
        }

        header.hero .hero-copy {
          font-size: 16px;
        }

        header.hero .hero-grid {
          grid-template-columns: 1fr;
        }

        header.hero .btn {
          width: 100%;
        }
      }
    </style>

    <div class="wrap py-12">
      <div class="kicker mb-2">VRU Differentiation</div>

      <div class="fs-vru-diff-head">
        <div>
          <h2>Built for the conditions that make conventional VRUs <span>unstable.</span></h2>
        </div>
        <p class="lead">
          VaporCommander™ is designed for vapor recovery applications where gas flow can change rapidly with tank
          conditions,
          production cycles, liquid carryover, cold-weather operation, and process upsets. Autonomous control helps
          maintain
          stable operation when conventional separator-dependent VRUs become unreliable or maintenance intensive.
        </p>
      </div>

      <div class="fs-vru-diff-summary">
        <article class="fs-vru-diff-card">
          <strong>Liquid-capable operation</strong>
          <p>Handles wet gas and liquid-influenced compression conditions without relying on perfect upstream separation.
          </p>
        </article>

        <article class="fs-vru-diff-card">
          <strong>Reduced freeze exposure</strong>
          <p>Less dependence on scrubbers and upstream separation equipment helps reduce common winter reliability
            problems.</p>
        </article>

        <article class="fs-vru-diff-card">
          <strong>Autonomous flow response</strong>
          <p>Automatically responds to variable vapor flow so the system can remain stable through changing tank pressure
            and upset conditions.</p>
        </article>
      </div>

      <div class="fs-vru-diff-table" role="table"
        aria-label="Conventional VRU versus Fluidstream VaporCommander comparison">
        <div class="fs-vru-diff-table-head" role="row">
          <div role="columnheader">Criteria</div>
          <div role="columnheader">Conventional VRU</div>
          <div role="columnheader">Fluidstream VaporCommander™</div>
        </div>

        <div class="fs-vru-diff-row" role="row">
          <div class="fs-vru-diff-cell fs-vru-diff-criteria" role="cell">Wet gas tolerance</div>
          <div class="fs-vru-diff-cell fs-vru-diff-conventional" role="cell">Sensitive to liquid carryover</div>
          <div class="fs-vru-diff-cell fs-vru-diff-fluidstream" role="cell">Built for wet, variable vapor</div>
        </div>

        <div class="fs-vru-diff-row" role="row">
          <div class="fs-vru-diff-cell fs-vru-diff-criteria" role="cell">Liquid slug handling</div>
          <div class="fs-vru-diff-cell fs-vru-diff-conventional" role="cell">Liquid carryover can trip or damage equipment
          </div>
          <div class="fs-vru-diff-cell fs-vru-diff-fluidstream" role="cell">Liquid-influenced compression response</div>
        </div>

        <div class="fs-vru-diff-row" role="row">
          <div class="fs-vru-diff-cell fs-vru-diff-criteria" role="cell">Freeze risk</div>
          <div class="fs-vru-diff-cell fs-vru-diff-conventional" role="cell">Liquids can freeze in scrubbers</div>
          <div class="fs-vru-diff-cell fs-vru-diff-fluidstream" role="cell">Less freeze-prone separation reliance</div>
        </div>

        <div class="fs-vru-diff-row" role="row">
          <div class="fs-vru-diff-cell fs-vru-diff-criteria" role="cell">Separator dependence</div>
          <div class="fs-vru-diff-cell fs-vru-diff-conventional" role="cell">Needs effective upstream liquid removal</div>
          <div class="fs-vru-diff-cell fs-vru-diff-fluidstream" role="cell">Less reliance on perfect separation</div>
        </div>

        <div class="fs-vru-diff-row" role="row">
          <div class="fs-vru-diff-cell fs-vru-diff-criteria" role="cell">Variable gas flow</div>
          <div class="fs-vru-diff-cell fs-vru-diff-conventional" role="cell">Flow swings can cause cycling or trips</div>
          <div class="fs-vru-diff-cell fs-vru-diff-fluidstream" role="cell">Autonomous response to changing vapor flow
          </div>
        </div>

        <div class="fs-vru-diff-row" role="row">
          <div class="fs-vru-diff-cell fs-vru-diff-criteria" role="cell">Maintenance burden</div>
          <div class="fs-vru-diff-cell fs-vru-diff-conventional" role="cell">Higher with liquids, freezing, and trips
          </div>
          <div class="fs-vru-diff-cell fs-vru-diff-fluidstream" role="cell">Lower-maintenance VRU operation</div>
        </div>
      </div>
      <div class="fs-vru-diff-bottom">
        <div class="fs-vru-diff-bottom-content">
          <strong>For vapor recovery sites where the problem is not just gas compression.</strong>
          <p>
            VaporCommander™ is best suited for facilities where emissions reduction, uptime, liquid-tolerant operation,
            and autonomous response to variable vapor flow matter more than nameplate compression alone.
          </p>
        </div>

        <a class="btn btn-primary" href="/technical-review">Request technical fit review</a>
      </div>
    </div>
    </div>
  </section>

  <section class="fs-vc-spec-section py-12" id="specifications">
    <style>
      .fs-vc-spec-section {
        --vc-blue: #0018dc;
        --vc-cyan: #15d1ff;
        --vc-ink: #071126;
        --vc-text: #19243a;
        --vc-muted: #647086;
        --vc-line: #dfe6f1;
        --vc-soft: #f5f7fb;
        --vc-white: #ffffff;
        background: var(--vc-soft);
        /* padding: 66px 0; */
        color: var(--vc-text);
      }

      .fs-vc-spec-section,
      .fs-vc-spec-section * {
        box-sizing: border-box;
      }

      .fs-vc-spec-wrap {
        width: min(1200px, calc(100% - 44px));
        margin: 0 auto;
      }

      .fs-vc-spec-head {
        /* display: grid; */
        grid-template-columns: 260px 1fr;
        gap: 44px;
        align-items: start;
        margin-bottom: 28px;
      }

      .fs-vc-spec-rail {
        /* border-top: 3px solid var(--vc-blue); */
        /* padding-top: 14px; */
        color: var(--vc-blue);
        font-size: 13px;
        font-weight: 950;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      /* .fs-vc-spec-head h2 {
                                                                                                                                                                        font-size: clamp(30px, 3.2vw, 46px);
                                                                                                                                                                        line-height: 1.02;
                                                                                                                                                                        margin: 0 0 14px;
                                                                                                                                                                        letter-spacing: -.035em;
                                                                                                                                                                        color: var(--vc-ink);
                                                                                                                                                                      } */

      .fs-vc-spec-lead {
        font-size: 17px;
        color: #56647a;
        max-width: 860px;
        margin: 0;
        line-height: 1.65;
      }

      .fs-vc-spec-note {
        margin: 14px 0 0;
        font-size: 14px;
        color: var(--vc-muted);
        font-weight: 700;
        line-height: 1.6;
      }

      .fs-vc-model-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
      }

      .fs-vc-model-card {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid var(--vc-line);
        border-radius: 7px;
        /* box-shadow: 0 14px 36px rgba(7, 17, 38, .065); */
        transition:
          transform .24s ease,
          border-color .24s ease,
          box-shadow .24s ease,
          background .24s ease;
      }

      .fs-vc-model-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 5;
        height: 4px;
        background: var(--vc-blue);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .3s ease;
      }

      .fs-vc-model-card:hover {
        transform: translateY(-3px);
        border-color: var(--vc-blue);
        /* box-shadow: 0 22px 46px rgba(16, 42, 67, .10); */
        background: #ffffff;
      }

      .fs-vc-model-card:hover::before {
        transform: scaleX(1);
      }

      .fs-vc-card-top {
        padding: 24px 22px 18px;
        border-bottom: 1px solid rgba(223, 230, 241, .9);
        background: linear-gradient(180deg, #ffffff, #f9fbff);
      }

      .fs-vc-family {
        display: inline-flex;
        color: var(--vc-blue);
        font-size: 10px;
        font-weight: 950;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      .fs-vc-model-line {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-top: 8px;
      }

      .fs-vc-model-line h3 {
        font-size: 24px;
        line-height: 1.08;
        margin: 0;
        color: var(--vc-ink);
        letter-spacing: -.02em;
        font-weight: 900;
      }

      .fs-vc-hp-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        padding: 7px 11px;
        border-radius: 999px;
        background: #f2f6ff;
        color: var(--vc-blue);
        border: 1px solid #dce6fb;
        font-weight: 900;
        font-size: 12px;
        letter-spacing: .04em;
      }

      .fs-vc-pressure-control {
        padding: 16px 18px 0;
      }

      .fs-vc-pressure-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 8px;
      }

      .fs-vc-pressure-control label,
      .fs-vc-reading-label,
      .fs-vc-card-specs b {
        display: block;
        color: #647086;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .075em;
        font-weight: 900;
      }

      .fs-vc-static-pressure-value {
        display: inline-flex;
        width: 100%;
        align-items: center;
        border: 1px solid #dce6fb;
        border-radius: 999px;
        background: #f7f9fd;
        color: var(--vc-ink);
        font-size: 14px;
        font-weight: 900;
        padding: 10px 15px;
      }

      .fs-vc-primary-reading {
        margin: 14px 18px 16px;
        background: #0018dc;
        color: #ffffff;
        border-radius: 7px;
        padding: 17px 18px;
        box-shadow: none;
      }

      .fs-vc-reading-label {
        color: #98edff !important;
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
        margin-bottom: 8px;
      }

      .fs-vc-reading-value {
        display: grid;
        gap: 4px;
        font-size: 20px;
        font-weight: 950;
      }

      .fs-vc-reading-value .metric,
      .fs-vc-reading-value .imperial {
        font-size: 20px;
        line-height: 1.2;
        font-weight: 950;
        color: #ffffff;
        white-space: nowrap;
      }

      .fs-vc-reading-value small {
        font-size: 12px;
        color: #dcecff;
        font-weight: 800;
      }

      .fs-vc-card-specs {
        padding: 0 18px 18px;
        display: grid;
        gap: 10px;
      }

      .fs-vc-card-specs>div {
        position: relative;
        background: #f7f9fd;
        border: 1px solid #e7edf6;
        border-radius: 7px;
        padding: 13px 14px 13px 42px;
        box-shadow: none;
      }

      .fs-vc-card-specs>div::before {
        content: "";
        position: absolute;
        left: 13px;
        top: 15px;
        width: 17px;
        height: 17px;
        border-radius: 5px;
        background: var(--vc-blue);
        opacity: .9;
      }

      .fs-vc-card-specs span {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: baseline;
        font-size: 16px;
        font-weight: 950;
        color: var(--vc-ink);
      }

      .fs-vc-card-specs small {
        font-size: 12px;
        color: #647086;
        font-weight: 850;
      }

      .fs-vc-feature-list {
        margin: 0 18px 18px;
        display: grid;
        gap: 8px;
        padding: 14px 16px;
        border: 1px solid #e7edf6;
        border-radius: 7px;
        background: #ffffff;
      }

      .fs-vc-feature-list span {
        position: relative;
        display: block;
        padding-left: 22px;
        color: #56647a;
        font-size: 13px;
        font-weight: 750;
        line-height: 1.45;
      }

      .fs-vc-feature-list span::before {
        content: "";
        position: absolute;
        left: 0;
        top: 5px;
        width: 14px;
        height: 10px;
        background-repeat: no-repeat;
        background-size: 14px 10px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.7' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.7' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
      }

      .fs-vc-sizing-notes {
        margin-top: 22px;
        background: #fbfcff;
        border: 1px solid var(--vc-line);
        border-radius: 7px;
        padding: 18px 20px;
        color: #647086;
        font-size: 13px;
        box-shadow: 0 10px 28px rgba(7, 17, 38, .045);
        line-height: 1.65;
      }

      .fs-vc-sizing-notes strong {
        display: block;
        color: var(--vc-ink);
        font-size: 14px;
        margin-bottom: 8px;
      }

      .fs-vc-sizing-notes ol {
        margin: 0;
        padding-left: 18px;
        display: grid;
        gap: 7px;
      }

      .fs-vc-sizing-notes li {
        padding-left: 4px;
      }

      @media(max-width:1120px) {
        .fs-vc-model-grid {
          grid-template-columns: repeat(2, 1fr);
        }

        .fs-vc-spec-head {
          grid-template-columns: 1fr;
          gap: 12px;
        }
      }

      @media(max-width:720px) {
        /* .fs-vc-spec-section {
                                                                                                                                            padding: 46px 0;
                                                                                                                                          } */

        .fs-vc-spec-wrap {
          width: min(100% - 30px, 1200px);
        }

        .fs-vc-model-grid {
          grid-template-columns: 1fr;
        }

        .fs-vc-model-line h3 {
          font-size: 22px;
        }
      }
    </style>

    <div class="fs-vc-spec-wrap">
      <div class="fs-vc-spec-head">
        <div class="fs-vc-spec-rail">Specifications</div>
        <div>
          <h2>Compare VaporCommander™ models.</h2>
          <p class="lead">
            Gas capacity is shown at the typical 0 psig inlet condition used for vapor recovery applications.
          </p>
          <p class="lead">
            Additional model sizes and configurations are available for applications outside the standard range shown.
          </p>
        </div>
      </div>

      <div class="fs-vc-model-grid">
        <article class="fs-vc-model-card">
          <div class="fs-vc-card-top">
            <span class="fs-vc-family">VaporCommander™</span>
            <div class="fs-vc-model-line">
              <h3>VC1235 (050035)</h3>
              <span class="fs-vc-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-vc-pressure-control">
            <div class="fs-vc-pressure-row">
              <label>Typical VRU inlet pressure</label>
            </div>
            <div class="fs-vc-static-pressure-value">0 psi | 0 kPa</div>
          </div>

          <div class="fs-vc-primary-reading">
            <span class="fs-vc-reading-label">Gas Capacity</span>
            <div class="fs-vc-reading-value">
              <span class="metric">2.2 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span>
              <span class="imperial">78 <small>MCF/day</small></span>
            </div>
          </div>

          <div class="fs-vc-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1034 <small>kPag</small></span>
                <span class="imperial">150 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-vc-model-card">
          <div class="fs-vc-card-top">
            <span class="fs-vc-family">VaporCommander™</span>
            <div class="fs-vc-model-line">
              <h3>VC1245 (050035)</h3>
              <span class="fs-vc-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-vc-pressure-control">
            <div class="fs-vc-pressure-row">
              <label>Typical VRU inlet pressure</label>
            </div>
            <div class="fs-vc-static-pressure-value">0 psi | 0 kPa</div>
          </div>

          <div class="fs-vc-primary-reading">
            <span class="fs-vc-reading-label">Gas Capacity</span>
            <div class="fs-vc-reading-value">
              <span class="metric">1.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span>
              <span class="imperial">46 <small>MCF/day</small></span>
            </div>
          </div>

          <div class="fs-vc-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1897 <small>kPag</small></span>
                <span class="imperial">275 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-vc-model-card">
          <div class="fs-vc-card-top">
            <span class="fs-vc-family">VaporCommander™</span>
            <div class="fs-vc-model-line">
              <h3>VC1245 (100060)</h3>
              <span class="fs-vc-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-vc-pressure-control">
            <div class="fs-vc-pressure-row">
              <label>Typical VRU inlet pressure</label>
            </div>
            <div class="fs-vc-static-pressure-value">0 psi | 0 kPa</div>
          </div>

          <div class="fs-vc-primary-reading">
            <span class="fs-vc-reading-label">Gas Capacity</span>
            <div class="fs-vc-reading-value">
              <span class="metric">2.4 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span>
              <span class="imperial">85 <small>MCF/day</small></span>
            </div>
          </div>

          <div class="fs-vc-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1138 <small>kPag</small></span>
                <span class="imperial">275 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-vc-model-card">
          <div class="fs-vc-card-top">
            <span class="fs-vc-family">VaporCommander™</span>
            <div class="fs-vc-model-line">
              <h3>VC1645 (100060)</h3>
              <span class="fs-vc-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-vc-pressure-control">
            <div class="fs-vc-pressure-row">
              <label>Typical VRU inlet pressure</label>
            </div>
            <div class="fs-vc-static-pressure-value">0 psi | 0 kPa</div>
          </div>

          <div class="fs-vc-primary-reading">
            <span class="fs-vc-reading-label">Gas Capacity</span>
            <div class="fs-vc-reading-value">
              <span class="metric">4.2 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span>
              <span class="imperial">148 <small>MCF/day</small></span>
            </div>
          </div>

          <div class="fs-vc-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1034 <small>kPag</small></span>
                <span class="imperial">150 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-vc-model-card">
          <div class="fs-vc-card-top">
            <span class="fs-vc-family">VaporCommander™</span>
            <div class="fs-vc-model-line">
              <h3>VC2270 (100128)</h3>
              <span class="fs-vc-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-vc-pressure-control">
            <div class="fs-vc-pressure-row">
              <label>Typical VRU inlet pressure</label>
            </div>
            <div class="fs-vc-static-pressure-value">0 psi | 0 kPa</div>
          </div>

          <div class="fs-vc-primary-reading">
            <span class="fs-vc-reading-label">Gas Capacity</span>
            <div class="fs-vc-reading-value">
              <span class="metric">6.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span>
              <span class="imperial">233 <small>MCF/day</small></span>
            </div>
          </div>

          <div class="fs-vc-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1551 <small>kPag</small></span>
                <span class="imperial">225 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-vc-model-card">
          <div class="fs-vc-card-top">
            <span class="fs-vc-family">VaporCommander™</span>
            <div class="fs-vc-model-line">
              <h3>VC2270 (150128)</h3>
              <span class="fs-vc-hp-badge">150 HP</span>
            </div>
          </div>

          <div class="fs-vc-pressure-control">
            <div class="fs-vc-pressure-row">
              <label>Typical VRU inlet pressure</label>
            </div>
            <div class="fs-vc-static-pressure-value">0 psi | 0 kPa</div>
          </div>

          <div class="fs-vc-primary-reading">
            <span class="fs-vc-reading-label">Gas Capacity</span>
            <div class="fs-vc-reading-value">
              <span class="metric">6.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span>
              <span class="imperial">233 <small>MCF/day</small></span>
            </div>
          </div>

          <div class="fs-vc-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1551 <small>kPag</small></span>
                <span class="imperial">225 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>
      </div>

      <style>
        .fs-vc-sizing-notes ol {
          list-style-type: decimal !important;
          padding-left: 24px;
        }

        .fs-vc-sizing-notes ol li::before {
          content: none !important;
        }
      </style>

      <div class="fs-vc-sizing-notes">
        <strong>Engineering notes</strong>
        <ol>
          <li>
            Flow conditions calculated at 15℃ [59℉] inlet pressure and with various components operating at
            100% efficiency. Flow rates may vary based on inlet pressures, gas content, and other factors.
            Max gas rates will be reduced by amount of liquids in total fluid. Contact Fluidstream for gas
            capacity review based on specific liquid rates and operating conditions.
          </li>
          <li>
            Max gas rates and max pressure differentials can be increased by configuring additional unit(s)
            in parallel or in series.
          </li>
          <li>
            Higher horsepower units will yield much higher fluid flow rates at various pressure differentials.
            Please request pump curves to see flow rates at various pressure differentials.
          </li>
        </ol>
      </div>
    </div>
  </section>


  <section>
    <div class="wrap py-12">
      <div class="case-study">
        <div class="eyebrow2">Case Study Result</div>
        <h2>4.5+ years of reliable vapor recovery with one reported seal change.</h2>
        <p>A southern Alberta producer used Fluidstream’s VaporCommander™ to capture tank vapors, reduce emissions, and
          avoid the maintenance burden commonly associated with conventional VRU systems.</p>

        <div class="stat-grid">
          <div class="stat">
            <div class="label">First Seal Change</div>
            <div class="value">35</div>
            <div>months before the first reported seal change.</div>
          </div>
          <div class="stat">
            <div class="label">Seal Changes</div>
            <div class="value">1</div>
            <div>seal change over the reported operating life.</div>
          </div>
          <div class="stat">
            <div class="label">Operating Outcome</div>
            <div class="value">4.5+ yrs</div>
            <div>reliable vapor recovery performance with reduced service burden.</div>
          </div>
        </div>

        <blockquote>“To date, with the exception of the seal change after 35 months, the unit has not had any failures or
          service issues in more than 4.5 years of operation.”</blockquote>
        <div class="quote-src">Fluidstream Case Study</div>

        <p>Lower maintenance. Continuous operation. Reduced emissions.</p>
        <div class="btn-row" style="margin-bottom:0;">
          <a class="btn btn-primary" href="#">Read full case study</a>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="wrap py-12">
      <div class="cta-box">
        <div>
          <h2>Submit your vapor stream conditions for a VaporCommander™ application review.</h2>
          <p>
            If your vapor recovery application includes liquids, slugs, unstable flow, H₂S service, remote operation
            requirements, or excessive maintenance exposure, Fluidstream can review your operating conditions and identify
            a VaporCommander™ configuration built for stronger uptime, lower intervention, and broader site applicability.
          </p>
        </div>
        <div class="cta-panel interactive-card swipe-left">
          <h3>What to send for review</h3>
          <ul>
            <li>Gas rate, liquid carryover, and composition</li>
            <li>Inlet and discharge pressure targets</li>
            <li>H₂S, sand, cold-weather, or remote-control requirements</li>
            <li>Current maintenance or uptime pain points</li>
            <li>Emissions reduction and gas monetization goals</li>
          </ul>
          <div class="btn-row" style="margin-bottom:0;">
            <a class="btn-1 btn-primary" href="#">Request VaporCommander™ Review</a>
            <a class="btn-1 btn-secondary-1" href="#specifications">Review Specifications</a>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection