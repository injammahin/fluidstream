@extends('layouts.app')

@section('content')

  <style>
    :root {
      --blue: #0018dc;
      --blue2: #0a35ff;
      --cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #4a5568;
      --line: #d9e6ff;
      --bg: #f7fbff;
      --card: #ffffff;
      --dark: #07124a;
    }

    a {
      color: inherit
    }

    .wrap {
      max-width: 1200px;
      margin: 0 auto;
      /* padding: 0 28px */
    }

    header.hero {
      background: radial-gradient(circle at 78% 22%, rgba(21, 209, 255, .18), transparent 20%), linear-gradient(125deg, rgba(0, 24, 220, .96), rgba(0, 24, 220, .88) 52%, rgb(15 39 223));
      color: #fff;
      /* padding: 72px 0 54px; */
    }

    .breadcrumbs {
      font-size: 13px;
      letter-spacing: .04em;
      text-transform: uppercase;
      opacity: .82;
      margin-bottom: 18px;
    }

    .eyebrow {
      display: inline-block;
      font-size: 13px;
      letter-spacing: .11em;
      text-transform: uppercase;
      font-weight: 700;
      color: #bfeeff;
      margin-bottom: 14px;
    }

    h1 {
      margin: 0 0 14px;
      font-size: 50px;
      line-height: 1.04;
      max-width: 900px;
      letter-spacing: -.03em;
    }

    .subhead {
      margin: 0 0 20px;
      font-size: 23px;
      line-height: 1.2;
      color: #e5f1ff;
      max-width: 920px;
      font-weight: 700;
    }

    .hero-copy {
      max-width: 860px;
      color: #edf5ff;
      font-size: 18px;
      margin: 0 0 26px;
    }

    .btn-row {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 36px;
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
      transition: .2s ease;
    }

    .btn-1 {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      border: 1px solid rgb(34, 34, 34);
      transition: .2s ease;
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
      color: #212121
    }

    .patent-note {
      margin: 16px 0 16px;
      padding: 14px 16px;
      border-left: 4px solid var(--cyan);
      background: linear-gradient(180deg, rgba(255, 255, 255, .14), rgba(255, 255, 255, .08));
      color: #eef6ff;
      border-radius: 0 8px 8px 0;
      font-size: 15px;
      line-height: 1.55;
      max-width: 860px;
    }

    .patent-note.light {
      background: #f5f7fb;
      color: #284163;
      border-left: 4px solid var(--blue);
      /* box-shadow: 0 10px 24px rgba(13, 32, 84, .06); */
    }

    .patent-note a {
      color: inherit;
      text-decoration: underline;
      text-underline-offset: 2px;
      font-weight: 700;
    }

    .interactive-card,
    .hero-card,
    .card,
    .feature,
    .highlight-box,
    .cta-panel,
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
    .cta-panel>*,
    .model-card>*,
    .spec-mobile-card>* {
      position: relative;
      z-index: 2;
    }

    .swipe-left:before,
    .swipe-left:before,
    .hero-card:before,
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
    .swipe-left:after,
    .hero-card:after,
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

    .swipe-left:hover:after,
    .hero-card:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after {
      transform: scaleX(1);
      /* Expand the line to full width */
    }

    /* .swipe-left:after {
                                                                                                    right: -135%;
                                                                                                    transform: skewX(24deg);
                                                                                                    background: linear-gradient(270deg, transparent 0%, rgba(21, 209, 255, .18) 50%, transparent 100%);
                                                                                                  } */

    .swipe-left:hover,
    .swipe-left:hover,
    .hero-card:hover,
    .model-card:hover,
    .spec-mobile-card:hover,
    .blue-fill:hover,
    .cta-panel:hover {
      transform: translateY(-3px);
      border-color: #0018dc !important;
      /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
      background: #ffffff;
    }

    /* 
                                                                                                            .swipe-left:hover:before,
                                                                                                            .swipe-left:hover:before,
                                                                                                            .hero-card:hover:before,
                                                                                                            .model-card:hover:before,
                                                                                                            .spec-mobile-card:hover:before {
                                                                                                              opacity: 1;
                                                                                                            } */

    .swipe-left:hover:after,
    .hero-card:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after {
      transform: scaleX(1);
    }

    .swipe-left:hover:after {
      right: 155%;
    }

    .hero-card:hover {
      box-shadow: 0 26px 56px rgba(0, 24, 220, .18);
      border-color: rgba(255, 255, 255, .3);
    }

    .swipe-left:hover,
    .swipe-left:hover,
    .model-card:hover,
    .spec-mobile-card:hover {
      /* box-shadow: 0 24px 52px rgba(13, 32, 84, .12); */
      border-color: #b9d0ff;
    }

    .blue-fill:after,
    .cta-panel:after,
    .highlight-box:after {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 82% 18%, rgba(21, 209, 255, .24), transparent 30%);
      opacity: 0;
      transition: opacity .32s ease;
      z-index: 1;
      pointer-events: none;
    }


    .blue-fill:hover,
    .highlight-box:hover {
      box-shadow: 0 24px 58px rgba(0, 24, 220, .18);
      border-color: #0018dc;
    }

    .blue-fill:hover h3,
    .blue-fill:hover p,
    .blue-fill:hover li,
    .blue-fill:hover strong,
    .highlight-box:hover h3,
    .highlight-box:hover p,
    .highlight-box:hover li,
    .highlight-box:hover strong {
      color: #fff !important;
    }

    .blue-fill:hover .num {
      background: rgba(255, 255, 255, .14);
      color: #fff;
    }

    .highlight-box:hover a {
      color: #fff !important;
    }

    .model-card-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
      margin: 0 0 22px;
    }

    .model-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 12px;
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
      min-width: 1200px;
      font-size: 14px;
    }

    .spec-table-enhanced thead th {
      position: sticky;
      top: 0;
      z-index: 2;
      background: #eef5ff;
      color: #0b1b6f;
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
      min-width: 170px;
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

    .spec-mobile-grid span,
    .gas-rate-title {
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

    .gas-rate-block {
      border-top: 1px solid #e7efff;
      padding-top: 16px;
    }

    .gas-rate-row {
      display: flex;
      justify-content: space-between;
      gap: 16px;
      align-items: flex-start;
      padding: 10px 0;
      border-bottom: 1px solid #edf3ff;
    }

    .gas-rate-row span {
      color: #4a5568
    }

    .gas-rate-row strong {
      color: #232325
    }

    .hero-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }

    .hero-card-1 {
      background: rgba(255, 255, 255, .11);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 12px;
      padding: 20px;
      min-height: 164px;
      backdrop-filter: blur(7px);
    }

    .hero-card-1 h3 {
      margin: 0 0 8px;
      font-size: 20px;
      line-height: 1.15;
      color: #fff;
    }

    .hero-card-1 p {
      margin: 0;
      color: #e8f4ff;
      font-size: 15px;
    }

    /* 
                                .kicker mb-2 {
                                  font-size: 12px;
                                  letter-spacing: .11em;
                                  text-transform: uppercase;
                                  color: var(--blue);
                                  font-weight: 700;
                                  margin-bottom: 10px;
                                } */

    h2 {
      margin: 0 0 16px;
      font-size: clamp(1.9rem, 3vw, 3rem);
      line-height: 1.05;
      letter-spacing: -.04em;
      max-width: 23ch;
      color: #1f1f21;
    }

    .lead {
      margin-bottom: 20px;
      max-width: 59ch;
      font-size: 16px;
      line-height: 1.75;
      color: #424f5d;
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }

    .grid-4 {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
    }

    .card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 24px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
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
      margin-bottom: 14px;
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 24px;
      line-height: 1.14;
      color: #232325;
    }

    .card p {
      margin: 0;
      color: var(--muted);
    }

    .split {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 26px;
      align-items: start;
    }

    .feature-stack {
      display: grid;
      gap: 18px;
    }

    .feature {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 22px;
    }

    .feature h3 {
      margin: 0 0 10px;
      color: #232325;
      font-size: 24px;
      line-height: 1.14;
    }

    .feature p {
      margin: 0;
      color: var(--muted);
    }

    .highlight-box-1 {
      background: #f6f7fb;
      border: 1px solid #d8e8ff;
      border-radius: 9px;
      padding: 26px;
      height: 100%;
    }

    .highlight-box-1 h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #0b1b6f;
      line-height: 1.12;
    }

    .highlight-box-1 p {
      margin: 0 0 14px;
      color: #425066;
    }

    .bullet {
      margin: 0;
      padding-left: 20px;
      color: #243042;
    }

    .bullet li {
      margin: 0 0 10px
    }

    .band {
      background: #f6f7fb;
      border-top: 1px solid #dfe9ff;
      border-bottom: 1px solid #dfe9ff;
    }

    .case-study {
      background: linear-gradient(130deg, #091553, #0018dc 58%, #0a7ad8);
      color: #fff;
      border-radius: 12px;
      padding: 34px;
      box-shadow: 0 24px 54px rgba(0, 24, 220, .24);
    }

    .case-study .eyebrow2 {
      color: #bdeeff;
      text-transform: uppercase;
      letter-spacing: .1em;
      font-weight: 700;
      font-size: 12px;
      margin-bottom: 10px;
    }

    .case-study h2 {
      color: #fff;
      font-size: 40px;
      margin-bottom: 16px;
    }

    .case-study p {
      max-width: 62ch;
      color: #ebf4ff;
      margin: 0 0 16px;
      font-size: 17px;
    }

    .stat-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin: 24px 0;
    }

    .stat {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 7px;
      padding: 22px 20px;
    }

    .stat .label {
      font-size: 12px;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: #bfeeff;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .stat .value {
      font-size: 34px;
      line-height: 1.02;
      font-weight: 800;
      margin-bottom: 8px;
    }

    blockquote {
      margin: 22px 0 8px;
      padding: 0 0 0 20px;
      border-left: 3px solid rgba(255, 255, 255, .28);
      color: #fff;
      font-size: 22px;
      line-height: 1.35;
    }

    .quote-src {
      color: #cfe7ff;
      font-weight: 700;
      margin-bottom: 18px;
    }

    .spec-wrap {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 22px;
      box-shadow: 0 16px 40px rgba(13, 32, 84, .05);
      background: #fff;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      min-width: 1020px;
      font-size: 14px;
    }

    th,
    td {
      padding: 14px 12px;
      border-bottom: 1px solid #e8efff;
      text-align: left;
      vertical-align: top;
    }

    thead th {
      background: #eef5ff;
      color: #0b1b6f;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    tbody tr:nth-child(even) {
      background: #fbfdff
    }

    .notes {
      margin-top: 18px;
      color: var(--muted);
      font-size: 15px;
    }

    .cta {
      background: #fff;
      color: #fff;
      /* padding: 72px 0; */
    }

    .cta-box {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 24px;
      align-items: center;
    }

    .cta h2 {
      /* color: #fff; */
      margin-bottom: 14px;
    }

    .cta p {
      margin: 0;
      color: #252525 !important;
      font-size: 18px;
      max-width: 780px;
    }

    .cta-panel {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgb(47 47 47 / 14%);
      border-radius: 7px;
      padding: 24px;
    }

    .cta-panel h3 {
      margin: 0 0 10px;
      color: #252525 !important;
      font-size: 24px;
    }

    .cta-panel ul {
      margin: 0 0 18px;
      padding-left: 20px;
      color: #252525 !important;
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
        padding: 58px 0 42px
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

      .case-study h2 {
        font-size: 31px
      }
    }
  </style>

  <header class="hero">
    <div class="wrap py-12">
      <div class="eyebrow">MultiphaseCommander™ • Multiphase booster and transfer pump</div>
      <h1>Lower pressure and move untreated multiphase flow.</h1>
      <div class="subhead">Improve production without forcing mixed-phase reality through gas-only equipment.</div>
      <p class="hero-copy">
        MultiphaseCommander™ is built for production systems where gas, oil, water, and condensate move together and need
        to be boosted as one stream. It helps operators reduce wellhead and gathering pressure, move untreated multiphase
        flow downstream, and avoid the complexity, maintenance burden, and operating mismatch created by gas-only
        boosters, separators, scrubbers, tanks, and flare-dependent handling strategies.
      </p>
      <div class="patent-note">
        Supported by patented operating methods for liquid-influenced compression behavior, including
        <a href="/patented-technology#us11098709b2">US11098709B2</a>. For the full patent overview, see the
        <a href="/patented-technology">Patented Technology page</a>.
      </div>
      <div class="btn-row mt-5">
        <a class="btn btn-primary" href="#specifications">View specifications</a>
        <a class="btn btn-secondary" href="#technology-benefits">See technology benefits</a>
      </div>

      <div class="hero-grid">
        <div class="hero-card-1 ">
          <h3>Lower backpressure</h3>
          <p>Reduce flowing wellhead and gathering pressure to support improved inflow, production continuity, and
            stronger upstream operating conditions.</p>
        </div>
        <div class="hero-card-1">
          <h3>Move untreated flow</h3>
          <p>Boost gas and liquids together in one system instead of forcing complete wellsite separation before useful
            work can be done.</p>
        </div>
        <div class="hero-card-1">
          <h3>Reduce surface complexity</h3>
          <p>Support leaner facility strategies with less dependence on site-level separators, scrubbers, tanks, flares,
            and added control layers in suitable applications.</p>
        </div>
        <div class="hero-card-1">
          <h3>Lower maintenance operation</h3>
          <p>Fluidstream technology pairs liquid handling, sealed gland protection, piston tracking, and autonomous
            control to reduce intervention and support longer-life field performance.</p>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="wrap py-12">

      <div class="kicker mb-2">Built for reality</div>
      <h2>Designed for mixed-phase, unstable field conditions.</h2>
      <p class="lead">
        MultiphaseCommander™ is built for gas streams with liquids present rather than dry-gas assumptions. It combines
        true multiphase duty, sealed gland protection, full piston tracking, autonomous upset-condition response, and
        lower-maintenance field performance into one production-focused package.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>True multiphase duty</h3>
          <p>Positioned for systems where liquids are part of normal operation, not merely an upset to be removed before
            the equipment can work reliably.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Technology-backed control</h3>
          <p>Strengthened by Fluidstream features such as liquid handling inside compression, gland sealing with wear
            awareness, piston tracking, and autonomous operating logic.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Field-ready durability</h3>
          <p>Better aligned with difficult duty where variable flow, slugs, solids, and changing conditions increase
            maintenance and instability in conventional systems.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">The challenge</div>
      <h2>Boosting production when gas and liquids move together.</h2>
      <p class="lead">
        In real production systems, gas rarely moves alone. Liquids, unstable flow, and rising backpressure create a
        surface-duty mismatch that conventional gas-only boosters were not designed to solve.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Backpressure limits production</h3>
          <p>As reservoir energy declines and gathering pressure rises, wells struggle to overcome downstream resistance
            and production performance falls away.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Mixed-phase flow complicates boosting</h3>
          <p>Gas, oil, water, and condensate move together, creating an operating duty that is difficult for conventional
            gas-only equipment to handle reliably.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Extra site equipment adds cost</h3>
          <p>Separators, scrubbers, tanks, flares, and added controls increase footprint, complexity, maintenance
            exposure, and total installed cost.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">

      <div class="kicker mb-2">How MultiphaseCommander™ solves it</div>
      <h2>Multiphase boosting that works on the stream you actually have.</h2>
      <p class="lead">
        MultiphaseCommander™ is a multiphase booster and transfer solution that boosts the untreated stream directly,
        lowers backpressure, and keeps gas and liquids moving together toward downstream handling or centralized
        processing.
      </p>
      <div class="patent-note light mb-5">
        This liquid-aware boosting approach is reinforced by
        <a href="/patented-technology#us11098709b2">US11098709B2</a>, which addresses compression response when liquid is
        detected in the chamber.
      </div>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Boost the full multiphase stream</h3>
          <p>Instead of forcing complete wellsite separation before useful work can be done, MultiphaseCommander™ is
            designed to work on the combined production stream.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Reduce wellhead and gathering pressure</h3>
          <p>Lower backpressure can improve inflow, help production stability, and support stronger upstream operating
            conditions in low-pressure and declining systems.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Support centralized processing strategies</h3>
          <p>By moving untreated multiphase flow downstream, MultiphaseCommander™ supports field architectures that
            consolidate separation and treatment at central sites.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">Production impact</div>
      <h2>Why this matters to production performance.</h2>
      <p class="lead">
        MultiphaseCommander™ is more than surface equipment. It is a production tool that improves the conditions the well
        and gathering system operate against.
      </p>
      <div class="grid-4">
        <div class="card interactive-card swipe-left">
          <h3>Improved inflow potential</h3>
          <p>Lowering flowing wellhead and gathering pressure can improve production continuity and help low-pressure
            systems perform in a more favorable operating window.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Better artificial-lift conditions</h3>
          <p>Where artificial lift is already in use, lower backpressure can help create better intake and operating
            conditions upstream.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>More stable surface behavior</h3>
          <p>Matching the equipment to the actual mixed-phase process reduces the operating mismatch that often drives
            instability and unnecessary support equipment.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Simpler field architecture</h3>
          <p>Moving more of the untreated stream downstream can support leaner pad layouts and reduce the amount of
            handling equipment installed at each site.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="technology-benefits">
    <div class="wrap py-12">

      <div class="kicker mb-2">Technology benefits</div>
      <h2>Built on Fluidstream multiphase technology.</h2>
      <p class="lead">
        MultiphaseCommander™ is built on Fluidstream’s core technology platform: direct liquid handling inside
        compression, stronger sealing and wear awareness, better control through upset conditions, and lower-maintenance
        operation in real field service.
      </p>

      <div class="split">
        <div class="feature-stack">
          <div class="feature interactive-card swipe-left">
            <h3>Liquid handling inside compression</h3>
            <p>Fluidstream technology is built to safely manage incompressible liquids within the compression chamber,
              which is fundamental to true multiphase service and directly supports applications where gas definitely has
              liquids present.</p>
            <div class="patent-note light" style="margin-top:14px;">
              Patent reference:
              <a href="/patented-technology#us11098709b2">US11098709B2</a>
              supports this liquid-aware compression methodology within MultiphaseCommander™.
            </div>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sealed gland protection with wear awareness</h3>
            <p>Advanced gland sealing and electronic seal wear detection support safer, more controlled multiphase
              operation while helping operators identify service needs earlier and reduce reactive maintenance.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Alignment and life extension</h3>
            <p>The platform is designed to maintain alignment in key stress and wear areas, supporting longer seal life,
              longer component life, and more dependable field performance.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Piston tracking and smarter control</h3>
            <p>Piston-location awareness helps the system respond to slugs, solids buildup, ice risk, and other changing
              operating conditions with better control confidence in unstable flow.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Autonomous upset-condition response</h3>
            <p>Autonomous control logic is designed to keep operating through multiphase and gas-only upset conditions
              with less operator intervention and a lower-touch maintenance profile.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Field-ready hard-service flexibility</h3>
            <p>The technology platform supports electric and gas-drive configurations, plus sealing approaches optimized
              for difficult services such as H₂S-bearing and sand-bearing applications.</p>
          </div>
        </div>

        <div class="highlight-box-1 interactive-card swipe-left">
          <h3>Conventional systems vs. MultiphaseCommander™</h3>
          <p>
            Conventional gas-only systems are usually strongest when the field delivers stable, dry gas and low
            variability. MultiphaseCommander™ is positioned for a different duty: mixed-phase streams, increasing
            backpressure, unstable flow, and the need to keep gas and liquids moving together.
          </p>

          <ul class="bullet space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>
                <strong>Conventional gas-only boosters:</strong> more sensitive to liquid carryover, often rely on extra
                site equipment, and can become maintenance-heavy when forced into mixed-phase service.
              </span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>
                <strong>MultiphaseCommander™:</strong> designed for gas streams with liquids present, supports multiphase
                boosting and transfer directly, and reduces dependence on added wellsite handling equipment in suitable
                applications.
              </span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>
                <strong>Conventional separation-heavy layouts:</strong> more footprint, more interfaces, more pressure
                drop, and more equipment to maintain.
              </span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>
                <strong>MultiphaseCommander™ approach:</strong> lower backpressure, move untreated flow, and support
                centralized processing or leaner site architecture where it makes operational and economic sense.
              </span>
            </li>
          </ul>

          <p style="margin-top:16px;">
            <a href="https://fluidstream.nexolioit.com/technology"
              style="color:var(--blue);font-weight:700;text-decoration:none;">View technology page →</a>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/patented-technology" style="color:var(--blue);font-weight:700;text-decoration:none;">View patented
              technology →</a>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">The Fluidstream advantage</div>
      <h2>Specific reasons to choose MultiphaseCommander™.</h2>
      <p class="lead">
        MultiphaseCommander™ combines true multiphase boosting, facility simplification potential, strong control
        confidence in unstable flow, and suitability for harder-service environments into one product-level value case.
      </p>
      <div class="grid-4">
        <div class="card interactive-card swipe-left">
          <h3>True multiphase boosting and transfer</h3>
          <p>Positioned for systems where liquids are part of the normal operating condition, not just something to remove
            before the equipment can work reliably.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Facility simplification potential</h3>
          <p>Supports strategies that can reduce dependence on site-level separators, tanks, flares, and other supporting
            equipment in suitable applications.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Control confidence in unstable flow</h3>
          <p>Piston tracking and autonomous control logic create a stronger fit for changing field conditions, slugging
            behavior, and upset scenarios.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Built for hard-service environments</h3>
          <p>The listed product family supports H₂S handling, cold-weather startup, autonomous control, and remote
            interface capability across the model range.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">

      <div class="kicker mb-2">Applications</div>
      <h2>Applications for MultiphaseCommander™.</h2>
      <p class="lead">
        MultiphaseCommander™ is suited to field problems where gas definitely has liquids present and where lower
        backpressure, untreated-flow transfer, and simpler surface architecture can improve operations.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <h3>Multiwell gathering systems</h3>
          <p>Boost and transfer the combined stream from multiple wells toward centralized separation and processing.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Liquid-loaded gas production</h3>
          <p>Support systems where gas production is accompanied by oil, water, or condensate and dry-gas assumptions do
            not hold.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Artificial-lift support</h3>
          <p>Useful where reducing backpressure can improve the operating conditions of upstream lift systems.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Low-pressure reservoirs</h3>
          <p>Applicable where declining reservoir pressure is no longer enough to overcome gathering-system resistance on
            its own.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Pad and cluster development</h3>
          <p>Support surface strategies focused on a reduced footprint and more centralized handling.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Unstable and slugging systems</h3>
          <p>Better aligned with pipelines and gathering lines that see intermittent or non-ideal multiphase behavior.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">

      <div class="case-study">
        <div class="eyebrow2">Case Study Snapshot</div>
        <h2>From shut-in wells to more than C$1.5 million/year in incremental revenue.</h2>
        <p>In Alberta, Canada, Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded wells that could no
          longer overcome rising pipeline pressure. The result was restored production, no added separation equipment, and
          dependable operation under highly variable multiphase conditions.</p>

        <div class="stat-grid">
          <div class="stat">
            <div class="label">Gas Production</div>
            <div class="value">10e3 m³/d</div>
            <div>Combined gas production restored across both wells after installation.</div>
          </div>
          <div class="stat">
            <div class="label">Condensate</div>
            <div class="value">5 m³/d</div>
            <div>Daily condensate production recovered without added separation infrastructure.</div>
          </div>
          <div class="stat">
            <div class="label">Revenue Impact</div>
            <div class="value">C$1.5M+</div>
            <div>Estimated annual incremental revenue based on April 2026 commodity pricing.</div>
          </div>
        </div>

        <blockquote>“Fluidstream’s MultiphaseCommander didn’t just improve performance—it transformed two shut-in wells
          into revenue-generating assets. We went from zero production to more than $1.5 million per year in incremental
          revenue, without adding separation equipment or extra surface infrastructure.”</blockquote>
        <div class="quote-src">Production Engineer, Western Canadian Oil &amp; Gas Producer</div>

        <p>Read the full case study for the operating challenge, deployment details, variable-flow performance, and the
          broader pad-level opportunity identified by the producer.</p>
        <div class="btn-row" style="margin-bottom:0;">
          <a class="btn btn-primary" href="#">Read More</a>
        </div>
      </div>
    </div>
  </section>


  <section id="specifications" class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">Technical specifications</div>
      <h2>Engineering validation for the MultiphaseCommander™ family.</h2>
      <p class="lead">
        Compare the model range visually, then review the detailed specifications for sizing, horsepower, gas-rate
        performance, and site requirements sourced from the latest model spreadsheet.
      </p>

      <div class="model-card-grid">

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">MC1235 (050035)</div>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>2,238 [14,077]</strong></div>
            <div><span>Max ΔP</span><strong>1034 [150]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>3.0 [106]</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">MC1245 (050035)</div>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>1,344 [8,454]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>1.8 [64]</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC1245 (100060)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>3160</strong></div>
            <div><span>Max ΔP</span><strong>450</strong></div>
            <div><span>Gas @ 5 psi</span><strong>—</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">CC1245 (100060)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>2,345 [14,750]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>3.1 [109]</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">MC1645 (100060)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>4,200 [26,417]</strong></div>
            <div><span>Max ΔP</span><strong>1034 [150]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>5.7 [201]</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">MC2270 (100128)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>8,000 [50,318]</strong></div>
            <div><span>Max ΔP</span><strong>689 [100]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>10.7 [378]</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">MC2270 (150128)</div>
            <div class="model-badge">150 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>7,500 [47,174]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>10.1 [357]</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">MC2270-127</div>
            <div class="model-badge">150 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Max liquids</span><strong>8,000 [50,300]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>Gas @ 5 psi</span><strong>10.3 [364]</strong></div>
          </div>
        </div>
      </div>


      <div class="spec-desktop">
        <div class="spec-wrap spec-wrap-enhanced">
          <table class="spec-table-enhanced">
            <thead>
              <tr>
                <th class="spec-col">Specification</th>
                <th class="cond-col">Units / Condition</th>
                <th>MC1235 (050035)</th>
                <th>MC1245 (050035)</th>
                <th>VC1245 (100060)</th>
                <th>CC1245 (100060)</th>
                <th>MC1645 (100060)</th>
                <th>MC2270 (100128)</th>
                <th>MC2270 (150128)</th>
                <th>MC2270-127</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="spec-col">Max Gas Rate @ Inlet Pressure (e3m³/day) [mcf/day]</td>
                <td class="cond-col">5 psi [34 kPa]</td>
                <td>3.0 [106]</td>
                <td>1.8 [64]</td>
                <td>—</td>
                <td>3.1 [109]</td>
                <td>5.7 [201]</td>
                <td>10.7 [378]</td>
                <td>10.1 [357]</td>
                <td>10.3 [364]</td>
              </tr>
              <tr>
                <td class="spec-col">Max Gas Rate @ Inlet Pressure (e3m³/day) [mcf/day]</td>
                <td class="cond-col">50 psi [345 kPa]</td>
                <td>9.9 [350]</td>
                <td>5.9 [208]</td>
                <td>—</td>
                <td>10.3 [364]</td>
                <td>18.5 [653]</td>
                <td>35.3 [1,247]</td>
                <td>33.1 [1,169]</td>
                <td>33.9 [1,197]</td>
              </tr>
              <tr>
                <td class="spec-col">Max Gas Rate @ Inlet Pressure (e3m³/day) [mcf/day]</td>
                <td class="cond-col">100 psi [690 kPa]</td>
                <td>17.5 [618]</td>
                <td>10.4 [367]</td>
                <td>—</td>
                <td>18.3 [646]</td>
                <td>32.9 [1,162]</td>
                <td>62.5 [2,207]</td>
                <td>58.8 [2,076]</td>
                <td>60.1 [2,122]</td>
              </tr>
              <tr>
                <td class="spec-col">Max Gas Rate @ Inlet Pressure (e3m³/day) [mcf/day]</td>
                <td class="cond-col">150 psi [1034 kPa]</td>
                <td>25.1 [886]</td>
                <td>14.9 [526]</td>
                <td>—</td>
                <td>26.3 [929]</td>
                <td>47.2 [1,667]</td>
                <td>89.7 [3,168]</td>
                <td>84.4[2981]</td>
                <td>86.3 [3048]</td>
              </tr>
              <tr>
                <td class="spec-col">Max Gas Rate @ Inlet Pressure (e3m³/day) [mcf/day]</td>
                <td class="cond-col">200 psi [1379 kPa]</td>
                <td>32.7 [1,155]</td>
                <td>19.4 [685]</td>
                <td>—</td>
                <td>34.3 [1,211]</td>
                <td>61.5 [2,172]</td>
                <td>117 [4,132]</td>
                <td>110.0 [3885]</td>
                <td>112.5 [3973]</td>
              </tr>
              <tr>
                <td class="spec-col">Max Liquids Rate (m³/d) [bbl/d]</td>
                <td class="cond-col">—</td>
                <td>2,238 [14,077]</td>
                <td>1,344 [8,454]</td>
                <td>3160</td>
                <td>2,345 [14,750]</td>
                <td>4,200 [26,417]</td>
                <td>8,000 [50,318]</td>
                <td>7,500 [47,174]</td>
                <td>8,000 [50,300]</td>
              </tr>
              <tr>
                <td class="spec-col">Max Pressure Differential (kPag) [psig]</td>
                <td class="cond-col">—</td>
                <td>1034 [150]</td>
                <td>1896 [275]</td>
                <td>450</td>
                <td>1896 [275]</td>
                <td>1034 [150]</td>
                <td>689 [100]</td>
                <td>1896 [275]</td>
                <td>1896 [275]</td>
              </tr>
              <tr>
                <td class="spec-col">Motor Size (HP)</td>
                <td class="cond-col">—</td>
                <td>50</td>
                <td>50</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>150</td>
                <td>150</td>
              </tr>
              <tr>
                <td class="spec-col">H₂S Handling</td>
                <td class="cond-col">—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
              <tr>
                <td class="spec-col">3-Stage Cold Weather Startup</td>
                <td class="cond-col">—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
              <tr>
                <td class="spec-col">Autonomous Controller</td>
                <td class="cond-col">—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
              <tr>
                <td class="spec-col">Color Touchscreen &amp; Remote Control</td>
                <td class="cond-col">—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="spec-mobile">
        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>MC1235 (050035)</h3>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>2,238 [14,077]</strong></div>
            <div><span>Max ΔP</span><strong>1034 [150]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>3.0 [106]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>9.9 [350]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>17.5 [618]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>25.1 [886]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>32.7 [1,155]</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>MC1245 (050035)</h3>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>1,344 [8,454]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>1.8 [64]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>5.9 [208]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>10.4 [367]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>14.9 [526]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>19.4 [685]</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>VC1245 (100060)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>3160</strong></div>
            <div><span>Max ΔP</span><strong>450</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>—</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>—</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>—</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>—</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>—</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>CC1245 (100060)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>2,345 [14,750]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>3.1 [109]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>10.3 [364]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>18.3 [646]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>26.3 [929]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>34.3 [1,211]</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>MC1645 (100060)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>4,200 [26,417]</strong></div>
            <div><span>Max ΔP</span><strong>1034 [150]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>5.7 [201]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>18.5 [653]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>32.9 [1,162]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>47.2 [1,667]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>61.5 [2,172]</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>MC2270 (100128)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>8,000 [50,318]</strong></div>
            <div><span>Max ΔP</span><strong>689 [100]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>10.7 [378]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>35.3 [1,247]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>62.5 [2,207]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>89.7 [3,168]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>117 [4,132]</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>MC2270 (150128)</h3>
            <div class="model-badge">150 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>7,500 [47,174]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>10.1 [357]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>33.1 [1,169]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>58.8 [2,076]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>84.4[2981]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>110.0 [3885]</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>MC2270-127</h3>
            <div class="model-badge">150 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Max liquids</span><strong>8,000 [50,300]</strong></div>
            <div><span>Max ΔP</span><strong>1896 [275]</strong></div>
            <div><span>H₂S handling</span><strong>Included</strong></div>
            <div><span>Cold-weather startup</span><strong>Included</strong></div>
            <div><span>Autonomous controller</span><strong>Included</strong></div>
            <div><span>Touchscreen + remote</span><strong>Included</strong></div>
          </div>
          <div class="gas-rate-block">
            <div class="gas-rate-title">Max gas rate @ inlet pressure</div>
            <div class="gas-rate-row"><span>5 psi [34 kPa]</span><strong>10.3 [364]</strong></div>
            <div class="gas-rate-row"><span>50 psi [345 kPa]</span><strong>33.9 [1,197]</strong></div>
            <div class="gas-rate-row"><span>100 psi [690 kPa]</span><strong>60.1 [2,122]</strong></div>
            <div class="gas-rate-row"><span>150 psi [1034 kPa]</span><strong>86.3 [3048]</strong></div>
            <div class="gas-rate-row"><span>200 psi [1379 kPa]</span><strong>112.5 [3973]</strong></div>
          </div>
        </article>
      </div>

      <div class="notes">
        <strong>Engineering notes</strong>
        <ul class="bullet">
          <li>1 Flow conditions calculated at 15℃ [59℉] inlet pressure and with various components operating at 100%
            efficiency. Flow rates may vary based on inlet pressures, gas content, and other factors. Max gas rates will
            be reduced by amount of liquids in total fluid. Ask Fluidstream for max gas flow rates based on specific
            liquid rates and other varying conditions. 2 Max gas rates and max pressure differentials can be increased by
            configuring additional unit(s) in parallel or in series. 3 Higher horsepower units will yield much higher
            fluid flow rates at various pressure differentials. Please request pump curves to see flow rates at various
            pressure differentials.</li>
        </ul>
        <p><strong>Use the table for comparison. Use Fluidstream for final sizing.</strong> Final configuration still
          depends on actual gas composition, liquid rate, inlet pressure, discharge requirements, and site-specific
          operating conditions.</p>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="wrap py-12">

      <div class="cta-box">
        <div>
          <div class="kicker mb-2" style="color:#0018dc;">Customized Technical CTA</div>
          <h2>Submit your fluid conditions for a MultiphaseCommander™ application review.</h2>
          <p>
            If your system is constrained by liquid-loaded gas flow, unstable operating conditions, rising system
            pressure, or too much surface equipment, Fluidstream can review your application against the actual gas,
            liquid, pressure, and site constraints to identify a production-focused, lower-maintenance
            MultiphaseCommander™ configuration.
          </p>
        </div>

        <div class="cta-panel interactive-card swipe-left">
          <h3>What to send for review</h3>

          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Gas rate, liquid rate, and fluid composition</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Inlet and discharge pressure targets</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Backpressure or gathering-system constraints</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Artificial-lift or pad-level operating context</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>H₂S, cold-weather, sand, or remote-control requirements</span>
            </li>
          </ul>

          <div class="btn-row" style="margin-bottom:0;">
            <a class="btn btn-1 btn-primary" href="#">Request MultiphaseCommander™ Review</a>
            <a class="btn btn-1 btn-secondary-1" href="#specifications">Review Specifications</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection