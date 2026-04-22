@extends('layouts.app')

@section('content')
  <style>
    :root {
      --blue: #0018dc;
      --cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #475569;
      --line: #d9e6ff;
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
      /* padding: 54px 0 54px; */
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
      max-width: 920px;
      letter-spacing: -.03em
    }

    .subhead {
      margin: 0 0 20px;
      font-size: 23px;
      line-height: 1.2;
      color: #e5f1ff;
      max-width: 920px;
      font-weight: 600;
    }

    .hero-copy {
      max-width: 890px;
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
      border: 1px solid rgba(31, 30, 30, 0.25);
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
      color: #1a1818b8
    }

    .patent-note {
      margin: 16px 0 14px;
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
      background: linear-gradient(180deg, #f7fbff 0%, #edf4ff 100%);
      color: #284163;
      border-left: 4px solid var(--blue);
      box-shadow: 0 10px 24px rgba(13, 32, 84, .06);
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
    .spec-mobile-card,
    .comparison .box,
    .reality-item {
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
    .spec-mobile-card>*,
    .comparison .box>*,
    .reality-item>* {
      position: relative;
      z-index: 2;
    }

    .swipe-left:before,
    .swipe-left:before,
    .model-card:before,
    .spec-mobile-card:before,
    .comparison .box:before,
    .reality-item:before {
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
    .model-card:after,
    .spec-mobile-card:after,
    .comparison .box:after,
    .reality-item:after {
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
    .spec-mobile-card:after,
    .comparison .box:after,
    .reality-item:after,
    .swipe-left:after {
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

    .swipe-left:hover,
    .swipe-left:hover,
    .model-card:hover,
    .spec-mobile-card:hover,
    .blue-fill:hover,
    .comparison .box:hover,
    .reality-item:hover {
      transform: translateY(-3px);
      border-color: #0018dc !important;
      /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
      background: #ffffff;
    }

    /* .swipe-left:hover:before,
                                                                          .swipe-left:hover:before,
                                                                          .model-card:hover:before,
                                                                          .spec-mobile-card:hover:before,
                                                                          .comparison .box:hover:before,
                                                                          .reality-item:hover:before {
                                                                            opacity: 1;
                                                                          } */

    .swipe-left:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after,
    .comparison .box:hover:after,
    .reality-item:hover:after {
      transform: scaleX(1);
    }

    /* .swipe-left:hover:after {
                                                                        right: 155%;
                                                                      } */

    .hero-card:hover {
      box-shadow: 0 26px 56px rgba(0, 24, 220, .18);
      border-color: rgba(255, 255, 255, .3);
    }

    /* .swipe-left:hover,
                                                                    .swipe-left:hover,
                                                                    .model-card:hover,
                                                                    .spec-mobile-card:hover,
                                                                    .comparison .box:hover,
                                                                    .reality-item:hover {
                                                                      box-shadow: 0 24px 52px rgba(13, 32, 84, .12);
                                                                      border-color: #b9d0ff;
                                                                    } */

    .blue-fill:before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, #0018dc 0%, #1438ff 62%, #0b7fe0 100%);
      transform: translateY(100%);
      transition: transform .52s cubic-bezier(.22, .61, .36, 1);
      z-index: 0;
      pointer-events: none;
    }

    .blue-fill:after {
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

    .blue-fill:hover:after {
      opacity: 1;
    }

    .blue-fill:hover {
      box-shadow: 0 24px 58px rgba(0, 24, 220, .18);
      border-color: #0018dc;
    }

    .blue-fill:hover h3,
    .blue-fill:hover p,
    .blue-fill:hover li,
    .blue-fill:hover strong {
      color: #fff !important;
    }

    .blue-fill:hover .num {
      background: rgba(255, 255, 255, .14);
      color: #fff
    }

    /* 
                                                    .highlight-box:hover a {
                                                      color: #fff !important
                                                    } */

    .cta-panel:hover {
      /* box-shadow: 0 24px 52px rgba(0, 24, 220, .18); */
      border-color: rgba(255, 255, 255, .22)
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
      gap: 12px
    }

    .model-metrics div {
      padding-top: 12px;
      border-top: 1px solid #e7efff
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
      min-width: 1280px;
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
      min-width: 230px;
      font-weight: 700;
      color: #232325;
      background: linear-gradient(180deg, #ffffff, #fbfdff);
    }

    .cond-col {
      min-width: 150px;
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
      grid-template-columns: repeat(4, 1fr);
      gap: 16px
    }

    .hero-card {
      background: rgba(255, 255, 255, .11);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 8px;
      padding: 20px;
      min-height: 164px;
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

    .comparison {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 22px;
      margin-top: 24px
    }

    .comparison .box {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 26px
    }

    .comparison .box h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #232325
    }

    .bullet {
      margin: 0;
      padding-left: 20px;
      color: #243042
    }

    .bullet li {
      margin: 0 0 10px
    }

    .reality-box {
      margin-top: 24px;
      background: #f5f7fb;
      border: 1px solid #d8e8ff;
      border-radius: 7px;
      padding: 26px;
    }

    .reality-box h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #232325
    }

    .reality-box p {
      margin: 0 0 14px;
      color: #425066
    }

    .reality-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 18px;
      margin-top: 18px
    }

    .reality-item {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 18px
    }

    .reality-item strong {
      display: block;
      color: #232325;
      font-size: 16px;
      margin-bottom: 6px
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
      height: 100%;
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

    .split {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 26px;
      align-items: start
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

    .notes {
      margin-top: 18px;
      color: var(--muted);
      font-size: 15px
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

    .cta {
      /* background: linear-gradient(120deg, #061760, #0018dc 56%, #0c79cf); */
      /* color: #fff; */
      padding: 72px 0
    }

    .cta-box {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 24px;
      align-items: center
    }

    .cta h2 {
      /* color: #fff; */
      margin-bottom: 14px
    }

    .cta p {
      margin: 0;
      /* color: #e3ecff; */
      font-size: 18px;
      max-width: 780px
    }

    .cta-panel {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgb(67 64 64 / 14%);
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

    @media (max-width:1080px) {

      .hero-grid,
      .grid-3,
      .comparison,
      .split,
      .stat-grid,
      .cta-box,
      .reality-grid,
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
      .comparison,
      .split,
      .stat-grid,
      .cta-box,
      .reality-grid {
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
      <div class="eyebrow">CompressionCommander™ • Casing gas compression systems</div>
      <h1>Recover casing gas reliably in the wet, variable field conditions conventional packages struggle to handle.</h1>
      <div class="subhead">Capture low-pressure casing gas, reduce flaring, and support production optimization without
        forcing variable, liquid-prone service through gas-only compressor assumptions.</div>
      <p class="hero-copy">
        CompressionCommander™ systems are designed for real casing gas conditions: variable gas quality, liquid carryover,
        intermittent slugging, corrosive or H₂S-bearing service, remote operation, and the high-uptime, low-maintenance
        expectations operators actually face in the field. Instead of depending on scrubbers and separators as the only
        line of defense, CompressionCommander™ combines multiphase-ready design logic with autonomous control to create a
        more robust casing gas solution.
      </p>
      <div class="patent-note">
        Supported by patented operating methods for liquid-influenced compression behavior, including
        <a href="/patented-technology#us11098709b2">US11098709B2</a>.
      </div>
      <div class="btn-row mt-5">
        <a class="btn btn-primary" href="#specifications">View specifications</a>
        <a class="btn btn-secondary" href="#application-review">Request application review</a>
      </div>

      <div class="hero-grid">
        <div class="hero-card interactive-card">
          <h3>Built for multiphase reality</h3>
          <p>Designed for casing gas service where liquids, upsets, and variable flow are part of the operating envelope,
            not just abnormal events.</p>
        </div>
        <div class="hero-card interactive-card">
          <h3>Lower intervention</h3>
          <p>Autonomous controls help detect harmful operating conditions and respond automatically to reduce trips,
            downtime, and damage risk.</p>
        </div>
        <div class="hero-card interactive-card">
          <h3>Field-ready durability</h3>
          <p>Supports H₂S handling, cold-weather startup, remote control, and harder-duty service across the listed
            CompressionCommander™ configurations.</p>
        </div>
        <div class="hero-card interactive-card swipe-left">
          <h3>Lower-maintenance performance</h3>
          <p>Designed to reduce the recurring maintenance burden created when conventional gas-only casing gas packages
            are pushed into liquid-prone service.</p>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Why multiphase matters</div>
      <h2>Casing gas is inherently imperfect field service.</h2>
      <p class="lead">
        Casing gas is often specified and sold like a clean gas application, but field conditions rarely stay that clean.
        Condensate, produced water, intermittent liquid carryover, pressure swings, contaminants, slug events, and
        changing operating conditions are exactly what make conventional gas-only casing gas compressors unreliable and
        maintenance-heavy in real service.
      </p>

      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Scrubbers are not a guarantee</h3>
          <p>Scrubbers and separation equipment can reduce liquid carryover, but they do not guarantee perfectly dry gas
            under real field conditions.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Slug events still reach the compressor</h3>
          <p>Intermittent upset conditions still create the trips, stress, and component damage that turn casing gas
            recovery into a reliability problem.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Conventional systems become maintenance burdens</h3>
          <p>If the package is built around gas-only assumptions, operators often end up buying more intervention, more
            downtime, and more equipment to manage.</p>
        </div>
      </div>

      <div class="reality-box">
        <h3>What makes casing gas compression difficult in the field</h3>
        <p>
          The challenge is not simply moving gas from low pressure to higher pressure. The challenge is doing it reliably
          when the stream is inconsistent, liquids can break through, and operating conditions do not stay steady. That is
          where conventional gas-only packages often become maintenance-heavy and why CompressionCommander™ is positioned
          differently.
        </p>
        <div class="reality-grid">
          <div class="reality-item interactive-card swipe-left">
            <strong>What operators actually see</strong>
            Casing gas service can include liquid carryover, intermittent slugging, contaminants, changing pressure, and
            off-normal events that move the application away from ideal dry-gas operation.
          </div>
          <div class="reality-item interactive-card swipe-left">
            <strong>Why conventional systems struggle</strong>
            When those conditions reach a gas-only compressor, the result is often more dependence on separation
            equipment, more trips, more operator attention, and a higher recurring maintenance burden.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="section-kicker">Conventional vs. Fluidstream</div>
      <h2>Two very different approaches to casing gas compression.</h2>
      <p class="lead">
        CompressionCommander™ is positioned as a casing gas solution built around multiphase behavior and the commercial
        reality of keeping recovery systems online with less intervention.
      </p>

      <div class="comparison">
        <div class="box interactive-card swipe-left">
          <h3>Conventional casing gas approach</h3>
          <ul class="bullet">
            <li>Relies on scrubbers and separation equipment to protect a gas-only compressor.</li>
            <li>Still becomes vulnerable when liquids break through or slug conditions develop.</li>
            <li>Creates more equipment, more footprint, more operator attention, and more failure points.</li>
            <li>Often turns casing gas recovery into a constant reliability and maintenance problem.</li>
          </ul>
        </div>
        <div class="box interactive-card swipe-left">
          <h3>CompressionCommander™ approach</h3>
          <ul class="bullet">
            <li>Built around the reality that casing gas streams are imperfect and often effectively multiphase.</li>
            <li>Designed to keep operating through the upset conditions that shut down conventional systems.</li>
            <li>Reduces dependence on separation hardware as the only protection strategy.</li>
            <li>Gives operators a more robust, lower-intervention path to continuous casing gas recovery.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">The CompressionCommander™ difference</div>
      <h2>Designed for the flow you actually have.</h2>
      <p class="lead">
        CompressionCommander™ creates value because it is aligned with what casing gas service really looks like in the
        field: liquid carryover, changing operating conditions, corrosive exposure, remote operation, and the need for
        high uptime with low maintenance.
      </p>

      <div class="split">
        <div class="feature-stack">
          <div class="feature interactive-card swipe-left">
            <h3>Handles real operating envelopes</h3>
            <p>Designed for gas service in applications where liquids, slugs, and unstable conditions are part of the real
              field envelope rather than rare exceptions.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sealed architecture for corrosive service</h3>
            <p>Sealed design supports corrosive and H₂S-bearing service while minimizing exposure risk in harsher
              operating environments.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sand-conscious sealing philosophy</h3>
            <p>Sealing strategy is better aligned with harsher field environments where abrasive contaminants can
              accelerate wear in conventional systems.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Autonomous control for lower intervention</h3>
            <p>Autonomous controls are designed to support extended operation without constant operator attention,
              especially where remote service and uptime matter.</p>
          </div>
        </div>

        <div class="highlight-box interactive-card swipe-left">
          <h3>Control strategy operators can trust</h3>
          <p>CompressionCommander™ does not rely on unrealistic promises about perfect gas quality. It monitors operating
            behavior and responds to the conditions that suggest liquids, slugs, or other upset events are creating damage
            risk.</p>
          <ul class="bullet">
            <li><strong>What it monitors:</strong> pressure behavior, dynamic system response, load changes, and other
              operating patterns associated with harmful conditions.</li>
            <li><strong>What it does:</strong> automatically modifies operation to mitigate risk, reduce mechanical
              stress, and keep the system in a safer operating window.</li>
            <li><strong>Why it matters:</strong> the result is a casing gas package that is better suited to remote,
              variable, lower-touch operation.</li>
          </ul>
          <div class="patent-note light" style="margin-top:16px;">
            Patent reference:
            <a href="/patented-technology#us11098709b2">US11098709B2</a>
            supports the liquid-aware compression response behind this protection strategy.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="section-kicker">Intelligent protection</div>
      <h2>Detects risk conditions. Responds automatically. Protects continuously.</h2>
      <p class="lead">
        In casing gas service, the real value of the controls strategy is not claiming perfect knowledge of what is inside
        the machine every second. It is recognizing damaging operating behavior early enough to protect components,
        preserve stability, and reduce avoidable maintenance events.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <h3>Pressure and response awareness</h3>
          <p>System behavior is monitored for patterns associated with liquid carryover, slug events, abnormal loading,
            and other harmful conditions.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Automatic mitigation</h3>
          <p>Controls adjust operation to reduce stress and keep the package in a safer operating window without relying
            on constant human intervention.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Continuous protection value</h3>
          <p>This lowers the risk of trips, damage, and recurring operator callouts while supporting more dependable
            casing gas recovery.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="specifications">
    <div class="wrap py-12">
      <div class="section-kicker">Specifications</div>
      <h2>CompressionCommander™ model range for casing gas applications.</h2>
      <p class="lead">
        Compare the model range visually, then review flow performance by inlet pressure, pressure differential,
        horsepower, and standard package features.
      </p>

      <div class="model-card-grid">

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">1.0 [35]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>1.3 [46] mcf/d</strong></div>
            <div><span>Max ΔP<strong>15 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">3.0 [106]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>3.8 [134] mcf/d</strong></div>
            <div><span>Max ΔP<strong>50 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">1.8 [64]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>2.2 [78] mcf/d</strong></div>
            <div><span>Max ΔP<strong>50 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">3.1 [109]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>3.9 [138] mcf/d</strong></div>
            <div><span>Max ΔP<strong>100 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">5.7 [201]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>7.1 [251] mcf/d</strong></div>
            <div><span>Max ΔP<strong>100 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">5.7 [201]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>7.1 [251] mcf/d</strong></div>
            <div><span>Max ΔP<strong>100 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">10.1 [357]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>12.7 [449] mcf/d</strong></div>
            <div><span>Max ΔP<strong>150 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
          </div>
        </div>

        <div class="model-card interactive-card swipe-left">
          <div class="model-top">
            <div class="model-name">10.3 [364]</div>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="model-metrics">
            <div><span>Flow @ 5 psi<strong>13.0 [459] mcf/d</strong></div>
            <div><span>Max ΔP<strong>150 psig</strong></div>
            <div><span>Package features<strong>Autonomous + remote</strong></div>
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
                <th>1.0 [35]</th>
                <th>3.0 [106]</th>
                <th>1.8 [64]</th>
                <th>3.1 [109]</th>
                <th>5.7 [201]</th>
                <th>5.7 [201]</th>
                <th>10.1 [357]</th>
                <th>10.3 [364]</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class='spec-col'>Flow rate</td>
                <td class='cond-col'>5 psi</td>
                <td>1.3 [46]</td>
                <td>3.8 [134]</td>
                <td>2.2 [78]</td>
                <td>3.9 [138]</td>
                <td>7.1 [251]</td>
                <td>7.1 [251]</td>
                <td>12.7 [449]</td>
                <td>13.0 [459]</td>
              </tr>
              <tr>
                <td class='spec-col'>Flow rate</td>
                <td class='cond-col'>10 psi</td>
                <td>1.8 [64]</td>
                <td>5.3 [187]</td>
                <td>3.1 [109]</td>
                <td>5.5 [194]</td>
                <td>9.9 [350]</td>
                <td>9.9 [350]</td>
                <td>17.8 [629]</td>
                <td>18.2 [643]</td>
              </tr>
              <tr>
                <td class='spec-col'>Flow rate</td>
                <td class='cond-col'>20 psi</td>
                <td>2.3 [81]</td>
                <td>6.8 [240]</td>
                <td>4.0 [141]</td>
                <td>7.1 [251]</td>
                <td>12.8 [452]</td>
                <td>12.8 [452]</td>
                <td>22.9 [209]</td>
                <td>23.4 [826]</td>
              </tr>
              <tr>
                <td class='spec-col'>Flow rate</td>
                <td class='cond-col'>30 psi</td>
                <td>3.4 [120]</td>
                <td>9.9 [350]</td>
                <td>5.9 [208]</td>
                <td>10.3 [364]</td>
                <td>18.5 [653]</td>
                <td>18.5 [653]</td>
                <td>33.1 [1,169]</td>
                <td>33.9 [1,197]</td>
              </tr>
              <tr>
                <td class='spec-col'>Flow rate</td>
                <td class='cond-col'>50 psi</td>
                <td>1207 [175]</td>
                <td>1034 [150]</td>
                <td>1896 [275]</td>
                <td>1896 [275]</td>
                <td>1034 [150]</td>
                <td>1379 [200]</td>
                <td>1896 [275]</td>
                <td>1896 [275]</td>
              </tr>
              <tr>
                <td class='spec-col'>Max pressure differential</td>
                <td class='cond-col'>psig</td>
                <td>15</td>
                <td>50</td>
                <td>50</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>150</td>
                <td>150</td>
              </tr>
              <tr>
                <td class='spec-col'>Motor size</td>
                <td class='cond-col'>HP</td>
                <td>ü</td>
                <td>ü</td>
                <td>ü</td>
                <td>ü</td>
                <td>ü</td>
                <td>ü</td>
                <td>ü</td>
                <td>ü</td>
              </tr>
              <tr>
                <td class='spec-col'>H₂S handling</td>
                <td class='cond-col'>—</td>
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
                <td class='spec-col'>Cold weather startup</td>
                <td class='cond-col'>—</td>
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
                <td class='spec-col'>Autonomous controller</td>
                <td class='cond-col'>—</td>
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
                <td class='spec-col'>Remote / HMI</td>
                <td class='cond-col'>—</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
                <td>None</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="spec-mobile">

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>1.0 [35]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>1.3 [46] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1207 [175] mcf/d</strong></div>
            <div><span>Max ΔP<strong>15 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>3.0 [106]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>3.8 [134] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1034 [150] mcf/d</strong></div>
            <div><span>Max ΔP<strong>50 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>1.8 [64]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>2.2 [78] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1896 [275] mcf/d</strong></div>
            <div><span>Max ΔP<strong>50 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>3.1 [109]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>3.9 [138] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1896 [275] mcf/d</strong></div>
            <div><span>Max ΔP<strong>100 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>5.7 [201]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>7.1 [251] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1034 [150] mcf/d</strong></div>
            <div><span>Max ΔP<strong>100 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>5.7 [201]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>7.1 [251] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1379 [200] mcf/d</strong></div>
            <div><span>Max ΔP<strong>100 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>10.1 [357]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>12.7 [449] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1896 [275] mcf/d</strong></div>
            <div><span>Max ΔP<strong>150 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>

        <article class="spec-mobile-card interactive-card swipe-left">
          <div class="spec-mobile-head">
            <h3>10.3 [364]</h3>
            <div class="model-badge">ü HP</div>
          </div>
          <div class="spec-mobile-grid">
            <div><span>Flow @ 5 psi<strong>13.0 [459] mcf/d</strong></div>
            <div><span>Flow @ 50 psi<strong>1896 [275] mcf/d</strong></div>
            <div><span>Max ΔP<strong>150 psig</strong></div>
            <div><span>H₂S handling<strong>Included</strong></div>
            <div><span>Autonomous<strong>Included</strong></div>
            <div><span>Remote / HMI<strong>None</strong></div>
          </div>
        </article>
      </div>

      <div class="notes">
        <strong>Engineering notes</strong>
        <ul class="bullet">

        </ul>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="case-study">
        <div class="eyebrow2">Field proof</div>
        <h2>Proven in severe multiphase service that is harder than typical casing gas carryover.</h2>
        <p>The current Fluidstream case study remains powerful proof for casing gas buyers because continuous liquid-heavy
          multiphase service is a tougher duty than the intermittent liquid carryover most casing gas systems see. If the
          technology performs in severe multiphase conditions, it supports a strong argument for casing gas reliability.
        </p>

        <div class="stat-grid">
          <div class="stat">
            <div class="label">Operating Challenge</div>
            <div class="value">Severe</div>
            <div>Variable multiphase production with liquids present continuously rather than only during occasional upset
              conditions.</div>
          </div>
          <div class="stat">
            <div class="label">Surface Simplicity</div>
            <div class="value">No added separation</div>
            <div>Stable operation achieved without adding separation equipment or extra site infrastructure.</div>
          </div>
          <div class="stat">
            <div class="label">Casing Gas Relevance</div>
            <div class="value">High</div>
            <div>Demonstrates performance in conditions more severe than typical casing gas liquid carryover.</div>
          </div>
        </div>

        <blockquote>“Fluidstream’s multiphase compression didn’t just improve performance — it transformed non-producing
          wells into revenue-generating assets, delivering stable operation in severe multiphase conditions without adding
          separation equipment or infrastructure.”</blockquote>
        <div class="quote-src">Field performance proof relevant to the CompressionCommander™ reliability story in casing
          gas service.</div>

        <p>Read the full case study for the operating challenge, installation context, runtime importance, and why proven
          severe multiphase performance supports stronger casing gas reliability expectations.</p>
        <div class="btn-row" style="margin-bottom:0;">
          <a class="btn btn-primary" href="#">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <section id="application-review" class="cta-1">
    <div class="wrap py-12">
      <div class="cta-box">
        <div>
          <div class="section-kicker">Customized Technical CTA</div>
          <h2>Submit your casing gas conditions for a CompressionCommander™ application review.</h2>
          <p>
            If your current system is vulnerable to liquid carryover, scrubber breakthrough, slug-related trips, corrosive
            service, or too much operator intervention, Fluidstream can review your casing gas stream, pressure targets,
            maintenance pain points, and site constraints to identify a lower-maintenance CompressionCommander™
            configuration built for the duty you actually have.
          </p>
        </div>
        <div class="cta-panel interactive-card swipe-left">
          <h3>What to send for review</h3>
          <ul>
            <li>Casing gas rate and expected operating range</li>
            <li>Inlet pressure, discharge pressure, and flare or recovery target</li>
            <li>Expected liquids, slugging behavior, and scrubber limitations</li>
            <li>H₂S, cold-weather, sand, or corrosive-service requirements</li>
            <li>Remote-control needs, maintenance issues, and uptime priorities</li>
          </ul>
          <div class="btn-row" style="margin-bottom:0;">
            <a class="btn-1 btn-primary" href="#">Request CompressionCommander™ Review</a>
            <a class="btn-1 btn-secondary-1" href="#specifications">Review Specifications</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection