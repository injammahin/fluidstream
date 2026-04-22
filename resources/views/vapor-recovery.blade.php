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

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      color: var(--ink);
      background: #fff;
      line-height: 1.62
    }

    a {
      color: inherit
    }

    .wrap {
      max-width: 1200px;
      margin: 0 auto;
    }

    header.hero {
      background: #1029ea;
      color: #fff;
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
    .blue-fill:hover,
    .cta-panel:hover {
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

    .blue-fill:before,
    .cta-panel:before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, #0018dc 0%, #1438ff 62%, #0b7fe0 100%);
      transform: translateY(100%);
      transition: transform .52s cubic-bezier(.22, .61, .36, 1);
      z-index: 0;
      pointer-events: none;
    }

    .blue-fill:after,
    .cta-panel:after {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 82% 18%, rgba(21, 209, 255, .24), transparent 30%);
      opacity: 0;
      transition: opacity .32s ease;
      z-index: 1;
      pointer-events: none;
    }

    .blue-fill:hover:before,
    .cta-panel:hover:before {
      transform: translateY(0);
    }

    .blue-fill:hover:after,
    .cta-panel:hover:after {
      opacity: 1;
    }

    .blue-fill:hover {
      box-shadow: 0 24px 58px rgba(0, 24, 220, .18);
      border-color: #0018dc;
    }

    .blue-fill:hover h3,
    .blue-fill:hover p,
    .blue-fill:hover li,
    .blue-fill:hover strong,
    .cta-panel:hover h3,
    .cta-panel:hover p,
    .cta-panel:hover li {
      color: #fff !important;
    }

    .blue-fill:hover .num {
      background: rgba(255, 255, 255, .14);
      color: #fff;
    }

    .highlight-box:hover a {
      color: #fff !important;
    }

    .cta-panel:hover {
      box-shadow: 0 24px 52px rgba(0, 24, 220, .18);
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

    .section-kicker {
      font-size: 12px;
      letter-spacing: .11em;
      text-transform: uppercase;
      color: var(--blue);
      font-weight: 700;
      margin-bottom: 10px
    }

    h2 {
      margin: 0 0 16px;
      font-size: 40px;
      line-height: 1.08;
      letter-spacing: -.02em;
      color: #232325
    }

    .lead {
      margin: 0 0 30px;
      max-width: 960px;
      font-size: 18px;
      color: var(--muted)
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
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06)
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
      font-size: 24px;
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
      border-radius: 22px;
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
      align-items: center
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
      border-radius: 24px;
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
  </style>


  <header class="hero">
    <div class="wrap py-12">
      <div class="eyebrow">VaporCommander™ • Multiphase vapor recovery</div>
      <h1>Recover valuable vapor where conventional VRUs lose fit.</h1>
      <div class="subhead">Capture vapor in wet, unstable, hard-service conditions without forcing the stream through
        gas-only assumptions.</div>
      <p class="hero-copy">
        VaporCommander™ is built for field vapor streams that do not stay clean, dry, and predictable. It combines
        multiphase compression, sealed hazardous-service design, and autonomous controls to recover gas where liquids,
        slugs, upset conditions, and changing gas quality make conventional VRUs difficult to justify, maintain, or keep
        online.
      </p>
      <div class="patent-note">
        Supported by patented operating methods for liquid-influenced compression behavior, including
        <a href="/patented-technology#us11098709b2">US11098709B2</a>.
      </div>
      <div class="btn-row mt-5">
        <a class="btn btn-primary" href="#specifications">View specifications</a>
        <a class="btn btn-secondary" href="#comparison">See the difference</a>
      </div>

      <div class="hero-grid">
        <div class="hero-card interactive-card ">
          <h3>Broader site applicability</h3>
          <p>Recover vapor in field conditions that are too wet, unstable, or maintenance-intensive for conventional
            gas-only vapor recovery approaches.</p>
        </div>
        <div class="hero-card interactive-card ">
          <h3>Lower maintenance operation</h3>
          <p>Autonomous controls, wear-aware sealing, and multiphase handling reduce intervention and support longer-life
            field performance.</p>
        </div>
        <div class="hero-card interactive-card ">
          <h3>Emissions and gas monetization</h3>
          <p>Capture valuable vapor, reduce venting, and turn harder vapor recovery sites into practical operating
            opportunities.</p>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Why multiphase compression matters</div>
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
      <div class="section-kicker">Why VaporCommander™ changes the equation</div>
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
            maintenance-heavy or unstable.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Advantages of the Fluidstream vapor recovery package</div>
      <h2>Built on Fluidstream multiphase technology.</h2>
      <p class="lead">
        VaporCommander™ combines multiphase handling, hazardous-service sealing, intelligent controls, and package
        flexibility to create a more resilient vapor recovery platform.
      </p>

      <div class="split">
        <div class="feature-stack">
          <div class="feature interactive-card swipe-left">
            <h3>Designed for incompressible liquid handling</h3>
            <p>Fluidstream is built around a patented methodology for safely, efficiently, and reliably handling
              incompressible liquids within the compression chamber—critical in real vapor recovery streams where liquids
              are often present.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sealed gland architecture for hazardous service</h3>
            <p>A patent-pending gland sealing configuration with electronic wear detection and a fully sealed gland
              arrangement helps contain toxic or corrosive multiphase fluids, including H₂S-bearing streams.</p>
          </div>
          <div class="feature interactive-card swipe-right">
            <h3>Autonomous control through upset conditions</h3>
            <p>Full piston tracking supports optimized control, protects against ice and solids buildup, and helps the
              system operate safely through slugs and changing process conditions.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Long-life alignment in wear-critical areas</h3>
            <p>The package is designed to maintain alignment in key stress and wear zones, helping extend component and
              seal life.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sand-capable sealing configuration</h3>
            <p>Multiphase piston sealing and gland sealing are configured to optimize life in applications where sand is
              present.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Flexible drive options with integrated intelligence</h3>
            <p>In addition to electric drive, Fluidstream offers gas-drive integration with key operating data fed into
              autonomous controls to maintain performance when fuel gas quality is compromised.</p>
          </div>
        </div>

        <div class="highlight-box interactive-card swipe-left" id="comparison">
          <h3>Conventional VRUs vs. VaporCommander™</h3>
          <p>Buyers evaluating vapor recovery systems are often comparing gas-only VRUs against packages that offer
            varying levels of liquid tolerance. VaporCommander™ is differentiated by a multiphase-first design philosophy
            built around real operating conditions.</p>
          <ul class="bullet">
            <li><strong>Handles entrained liquids:</strong> core design premise of the package rather than a narrow
              tolerance claim.</li>
            <li><strong>Operates through slugs and upset conditions:</strong> autonomous logic and piston tracking support
              upset handling.</li>
            <li><strong>Sealed hazardous-service gland design:</strong> fully sealed gland approach with wear detection.
            </li>
            <li><strong>Sand-oriented sealing strategy:</strong> sealing configured to optimize life in sandy
              applications.</li>
            <li><strong>System simplicity at the site level:</strong> supports a simpler, broader deployment strategy.
            </li>
            <li><strong>Range of viable vapor recovery applications:</strong> stronger fit for difficult real-world
              streams.</li>
          </ul>
          <p style="margin-top:16px;"><a href="https://fluidstream.nexolioit.com/technology"
              style="color:var(--blue);font-weight:700;text-decoration:none;">View technology page →</a>
            &nbsp;&nbsp;|&nbsp;&nbsp; <a href="/patented-technology"
              style="color:var(--blue);font-weight:700;text-decoration:none;">View patented technology →</a></p>
        </div>
      </div>
    </div>
  </section>


  <section class="band" id="specifications">
    <div class="wrap py-12">
      <div class="section-kicker">Specifications</div>
      <h2>VaporCommander™ model range for vapor recovery deployment.</h2>
      <p class="lead">
        Compare the lineup visually, then review the detailed package data for gas rate, differential pressure,
        horsepower, and standard features.
      </p>

      <div class="model-card-grid">

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC1235 (050035)</div>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Gas @ 0 psi<strong>2.2 [78]</strong></div>
            <div><span>Max ΔP<strong>1034 [150]</strong></div>
            <div><span>Standard controls<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC1245 (050035)</div>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Gas @ 0 psi<strong>1.3 [46]</strong></div>
            <div><span>Max ΔP<strong>1897 [275]</strong></div>
            <div><span>Standard controls<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC1245 (100060)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Gas @ 0 psi<strong>2.4 [85]</strong></div>
            <div><span>Max ΔP<strong>1138 [275]</strong></div>
            <div><span>Standard controls<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC1645 (100060)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Gas @ 0 psi<strong>4.2 [148]</strong></div>
            <div><span>Max ΔP<strong>1034 [150]</strong></div>
            <div><span>Standard controls<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC2270 (100128)</div>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Gas @ 0 psi<strong>6.6 [233]</strong></div>
            <div><span>Max ΔP<strong>1551 [225]</strong></div>
            <div><span>Standard controls<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">VC2270 (150128)</div>
            <div class="model-badge">150 HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Gas @ 0 psi<strong>6.6 [233]</strong></div>
            <div><span>Max ΔP<strong>1551 [225]</strong></div>
            <div><span>Standard controls<strong>Autonomous + remote</strong></div>
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
                <th>VC1235 (050035)</th>
                <th>VC1245 (050035)</th>
                <th>VC1245 (100060)</th>
                <th>VC1645 (100060)</th>
                <th>VC2270 (100128)</th>
                <th>VC2270 (150128)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class='spec-col'>Max Gas Rate (e3m³/day) [mcf/day]</td>
                <td class='cond-col'>0 psi [0 kPa]</td>
                <td>2.2 [78]</td>
                <td>1.3 [46]</td>
                <td>2.4 [85]</td>
                <td>4.2 [148]</td>
                <td>6.6 [233]</td>
                <td>6.6 [233]</td>
              </tr>
              <tr>
                <td class='spec-col'>Max Pressure Differential (kPag) [psig]</td>
                <td class='cond-col'>—</td>
                <td>1034 [150]</td>
                <td>1897 [275]</td>
                <td>1138 [275]</td>
                <td>1034 [150]</td>
                <td>1551 [225]</td>
                <td>1551 [225]</td>
              </tr>
              <tr>
                <td class='spec-col'>Motor Size (HP)</td>
                <td class='cond-col'>—</td>
                <td>50</td>
                <td>50</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>150</td>
              </tr>
              <tr>
                <td class='spec-col'>H₂S Handling</td>
                <td class='cond-col'>—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
              <tr>
                <td class='spec-col'>3-Stage Cold Weather Startup</td>
                <td class='cond-col'>—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
              <tr>
                <td class='spec-col'>Autonomous Controller</td>
                <td class='cond-col'>—</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
                <td>Included</td>
              </tr>
              <tr>
                <td class='spec-col'>Color Touchscreen &amp; Remote Control</td>
                <td class='cond-col'>—</td>
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
            <h3>VC1235 (050035)</h3>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Gas @ 0 psi<strong>2.2 [78]</strong></div>
            <div><span>Max ΔP<strong>1034 [150]</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Cold-weather startup<strong>Included</strong></div>
            <div><span>Autonomous controller<strong>Included</strong></div>
            <div><span>Touchscreen + remote<strong>Included</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>VC1245 (050035)</h3>
            <div class="model-badge">50 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Gas @ 0 psi<strong>1.3 [46]</strong></div>
            <div><span>Max ΔP<strong>1897 [275]</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Cold-weather startup<strong>Included</strong></div>
            <div><span>Autonomous controller<strong>Included</strong></div>
            <div><span>Touchscreen + remote<strong>Included</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>VC1245 (100060)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Gas @ 0 psi<strong>2.4 [85]</strong></div>
            <div><span>Max ΔP<strong>1138 [275]</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Cold-weather startup<strong>Included</strong></div>
            <div><span>Autonomous controller<strong>Included</strong></div>
            <div><span>Touchscreen + remote<strong>Included</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>VC1645 (100060)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Gas @ 0 psi<strong>4.2 [148]</strong></div>
            <div><span>Max ΔP<strong>1034 [150]</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Cold-weather startup<strong>Included</strong></div>
            <div><span>Autonomous controller<strong>Included</strong></div>
            <div><span>Touchscreen + remote<strong>Included</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>VC2270 (100128)</h3>
            <div class="model-badge">100 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Gas @ 0 psi<strong>6.6 [233]</strong></div>
            <div><span>Max ΔP<strong>1551 [225]</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Cold-weather startup<strong>Included</strong></div>
            <div><span>Autonomous controller<strong>Included</strong></div>
            <div><span>Touchscreen + remote<strong>Included</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>VC2270 (150128)</h3>
            <div class="model-badge">150 HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Gas @ 0 psi<strong>6.6 [233]</strong></div>
            <div><span>Max ΔP<strong>1551 [225]</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Cold-weather startup<strong>Included</strong></div>
            <div><span>Autonomous controller<strong>Included</strong></div>
            <div><span>Touchscreen + remote<strong>Included</strong></div>
          </div>
        </article>
      </div>

      <div class="notes">
        <p><strong>Engineering notes</strong></p>
        <ul class="bullet">
          <li>1 Flow conditions calculated at 15℃ [59℉] inlet pressure and with various components operating at 100%
            efficiency. Flow rates may vary based on inlet pressures, gas content, and other factors. Max gas rates will
            be reduced by amount of liquids in total fluid. Ask Fluidstream for max gas flow rates based on specific
            liquid rates and other varying conditions.</li>
          <li>2 Max gas rates and max pressure differentials can be increased by configuring additional unit(s) in
            parallel or in series.</li>
          <li>3 Higher horsepower units will yield much higher fluid flow rates at various pressure differentials. Please
            request pump curves to see flow rates at various pressure differentials.</li>
        </ul>
        <p><strong>Use the table for comparison. Use Fluidstream for final sizing.</strong> Final configuration still
          depends on actual gas composition, liquid carryover, inlet pressure, discharge requirements, and site-specific
          operating conditions.</p>
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
          <div class="section-kicker">Customized Technical CTA</div>
          <h2>Submit your vapor stream conditions for a VaporCommander™ application review.</h2>
          <p>
            If your vapor recovery application includes liquids, slugs, unstable flow, H₂S service, remote operation
            requirements, or excessive maintenance exposure, Fluidstream can review your operating conditions and identify
            a VaporCommander™ configuration built for stronger uptime, lower intervention, and broader site applicability.
          </p>
        </div>
        <div class="cta-panel interactive-card wipe-left">
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