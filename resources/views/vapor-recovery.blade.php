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
            maintenance-heavy or unstable.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="kicker">Advantages of the Fluidstream vapor recovery package</div>
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

          <ul class="bullet space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>Handles entrained liquids:</strong> core design premise of the package rather than a narrow
                tolerance claim.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>Operates through slugs and upset conditions:</strong> autonomous logic and piston tracking
                support
                upset handling.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>Sealed hazardous-service gland design:</strong> fully sealed gland approach with wear
                detection.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>Sand-oriented sealing strategy:</strong> sealing configured to optimize life in sandy
                applications.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>System simplicity at the site level:</strong> supports a simpler, broader deployment
                strategy.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>Range of viable vapor recovery applications:</strong> stronger fit for difficult real-world
                streams.</span>
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


  <section class="fs-vc-spec-section" id="specifications">
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
        padding: 66px 0;
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
        padding-top: 14px;
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
        .fs-vc-spec-section {
          padding: 46px 0;
        }

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

          <div class="fs-vc-feature-list">
            <span>H₂S handling included</span>
            <span>3-stage cold-weather startup included</span>
            <span>Autonomous controller and remote control included</span>
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

          <div class="fs-vc-feature-list">
            <span>H₂S handling included</span>
            <span>3-stage cold-weather startup included</span>
            <span>Autonomous controller and remote control included</span>
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

          <div class="fs-vc-feature-list">
            <span>H₂S handling included</span>
            <span>3-stage cold-weather startup included</span>
            <span>Autonomous controller and remote control included</span>
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

          <div class="fs-vc-feature-list">
            <span>H₂S handling included</span>
            <span>3-stage cold-weather startup included</span>
            <span>Autonomous controller and remote control included</span>
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

          <div class="fs-vc-feature-list">
            <span>H₂S handling included</span>
            <span>3-stage cold-weather startup included</span>
            <span>Autonomous controller and remote control included</span>
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

          <div class="fs-vc-feature-list">
            <span>H₂S handling included</span>
            <span>3-stage cold-weather startup included</span>
            <span>Autonomous controller and remote control included</span>
          </div>
        </article>
      </div>

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
          <div class="kicker">Customized Technical CTA</div>
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