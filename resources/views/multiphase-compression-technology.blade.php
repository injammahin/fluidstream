@extends('layouts.app')

@section('content')
  <style>
    :root {
      --blue: #0018dc;
      --cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #475569;
      --line: #d9e6ff;
      --band: #f4f7fb;
      --dark: #07124a;
      --soft: #eef5ff;
      --white: #ffffff;
    }

    a {
      color: inherit;
      text-decoration: none
    }

    .wrap {
      max-width: 1200px;
      margin: 0 auto;
      /* padding: 0 28px */
    }

    header.hero {
      background: #1029ea;
      color: #fff;
      /* padding: 72px 0 64px; */
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
      margin: 0 0 16px;
      font-size: 50px;
      line-height: 1.01;
      max-width: 1040px;
      letter-spacing: -.04em;
    }

    .subhead {
      margin: 0 0 18px;
      font-size: 20px;
      line-height: 1.16;
      color: #e7f1ff;
      max-width: 951px;
      font-weight: 600;
    }

    .hero-copy {
      max-width: 930px;
      color: #edf5ff;
      font-size: 18px;
      margin: 0 0 24px
    }

    .btn-row {
      display: flex;
      gap: 14px;
      flex-wrap: wrap
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      font-weight: 700;
      border: 1px solid rgb(0 0 0 / 24%);
      transition: .25s ease
    }

    .btn-1 {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      font-weight: 700;
      border: 1px solid rgb(255 255 255 / 24%) !important;
      transition: .25s ease
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
      color: #ffffff
    }

    .btn-secondary-1 {
      background: transparent;
      color: #1f1f1f
    }

    .patent-note {
      margin: 16px 0 26px;
      padding: 14px 16px;
      border-left: 4px solid var(--cyan);
      background: linear-gradient(180deg, rgba(255, 255, 255, .14), rgba(255, 255, 255, .08));
      color: #eef6ff;
      border-radius: 0 7px 7px 0;
      font-size: 15px;
      line-height: 1.55;
      max-width: 900px
    }

    .patent-note.light {
      background: #f5f7fb;
      color: #284163;
      border-left: 4px solid var(--blue);
      box-shadow: 0 10px 24px rgba(13, 32, 84, .06)
    }

    .patent-note a {
      text-decoration: underline;
      text-underline-offset: 2px;
      font-weight: 700
    }

    .grid-3,
    .comparison,
    .split,
    .value-grid,
    .apps-grid,
    .footer-grid,
    .proof-grid,
    .fit-grid,
    .failure-grid,
    .proof-stats {
      display: grid;
      gap: 18px
    }

    .grid-3,
    .value-grid,
    .proof-grid,
    .proof-stats {
      grid-template-columns: repeat(3, 1fr)
    }

    .comparison,
    .split {
      grid-template-columns: repeat(2, 1fr)
    }

    .split {
      align-items: start
    }

    .apps-grid {
      grid-template-columns: repeat(2, 1fr)
    }

    .footer-grid {
      grid-template-columns: 1.3fr .9fr .9fr .95fr;
      gap: 28px
    }

    .fit-grid {
      grid-template-columns: repeat(2, 1fr)
    }

    .failure-grid {
      grid-template-columns: repeat(4, 1fr)
    }

    .interactive-card,
    .hero-card,
    .card,
    .feature,
    .highlight-box,
    .comparison .box,
    .app-card,
    .system-box,
    .value-card,
    .footer-card,
    .cta-panel,
    .proof-card,
    .failure-card,
    .fit-card,
    .proof-stat {
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
    .comparison .box>*,
    .app-card>*,
    .system-box>*,
    .value-card>*,
    .footer-card>*,
    .cta-panel>*,
    .proof-card>*,
    .failure-card>*,
    .fit-card>*,
    .proof-stat>* {
      position: relative;
      z-index: 2
    }

    /* Hover transformation for the after pseudo-element */
    #overview .stack .item:hover::after,
    #overview .flow .box:hover::after,
    #overview .value:hover::after {
      transform: scaleX(1);
      /* Apply scaleX transition to make the element expand */
      transform-origin: left;
      /* Ensure the scaling happens from the left */
      transition: transform 0.3s ease;
      /* Smooth transition for the effect */
    }

    /* Apply the same transformation to swipe-left, hero-card, app-card, and other elements */
    .swipe-left:after,
    .hero-card:after,
    .system-box:after,
    .app-card:after,
    .value-card:after,
    .comparison .box:after,
    .proof-card:after,
    .failure-card:after,
    .fit-card:after,
    .proof-stat:after,
    .swipe-right:after {
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

    /* Apply the hover effect for the same elements */
    .swipe-left:hover:after,
    .hero-card:hover:after,
    .system-box:hover:after,
    .app-card:hover:after,
    .value-card:hover:after,
    .comparison .box:hover:after,
    .proof-card:hover:after,
    .failure-card:hover:after,
    .fit-card:hover:after,
    .proof-stat:hover:after,
    .swipe-right:hover:after {
      transform: scaleX(1);
      /* On hover, expand the line from left to right */
    }

    .swipe-left:hover,
    .swipe-right:hover,
    .hero-card:hover,
    .system-box:hover,
    .app-card:hover,
    .value-card:hover,
    .comparison .box:hover,
    .blue-fill:hover,
    .cta-panel:hover,
    .proof-card:hover,
    .failure-card:hover,
    .fit-card:hover,
    .proof-stat:hover {
      transform: translateY(-3px);
      border-color: #0018dc !important;
      box-shadow: 0 18px 36px rgba(16, 42, 67, .08);
      background: #ffffff;
    }

    /* .swipe-left:hover:before,
                                                                  .swipe-right:hover:before,
                                                                  .hero-card:hover:before,
                                                                  .system-box:hover:before,
                                                                  .app-card:hover:before,
                                                                  .value-card:hover:before,
                                                                  .comparison .box:hover:before,
                                                                  .proof-card:hover:before,
                                                                  .failure-card:hover:before,
                                                                  .fit-card:hover:before,
                                                                  .proof-stat:hover:before {
                                                                    opacity: 1
                                                                  } */

    /* .swipe-left:hover:after,
                                                                  .hero-card:hover:after,
                                                                  .system-box:hover:after,
                                                                  .app-card:hover:after,
                                                                  .value-card:hover:after,
                                                                  .comparison .box:hover:after,
                                                                  .proof-card:hover:after,
                                                                  .failure-card:hover:after,
                                                                  .fit-card:hover:after,
                                                                  .proof-stat:hover:after {
                                                                    left: 155%
                                                                  } */

    /* .swipe-right:hover:after {
                                                                    right: 155%
                                                                  } */

    /* .swipe-left:hover,
                                                                  .swipe-right:hover,
                                                                  .system-box:hover,
                                                                  .app-card:hover,
                                                                  .value-card:hover,
                                                                  .comparison .box:hover,
                                                                  .proof-card:hover,
                                                                  .failure-card:hover,
                                                                  .fit-card:hover,
                                                                  .proof-stat:hover {
                                                                    box-shadow: 0 24px 52px rgba(13, 32, 84, .12);
                                                                    border-color: #b9d0ff
                                                                  } */

    .hero-card:hover {
      box-shadow: 0 26px 56px rgba(0, 24, 220, .18);
      border-color: rgba(255, 255, 255, .3)
    }

    /* .blue-fill:before,
                                              .highlight-box:before,
                                              .cta-panel:before,
                                              .footer-card:before {
                                                content: "";
                                                position: absolute;
                                                inset: 0;
                                                background: linear-gradient(135deg, #0018dc 0%, #1438ff 62%, #0b7fe0 100%);
                                                transform: translateY(100%);
                                                transition: transform .52s cubic-bezier(.22, .61, .36, 1);
                                                z-index: 0;
                                                pointer-events: none;
                                              } */

    /* .blue-fill:after,
                                              .highlight-box:after,
                                              .cta-panel:after,
                                              .footer-card:after {
                                                content: "";
                                                position: absolute;
                                                inset: 0;
                                                background: radial-gradient(circle at 82% 18%, rgba(21, 209, 255, .24), transparent 30%);
                                                opacity: 0;
                                                transition: opacity .32s ease;
                                                z-index: 1;
                                                pointer-events: none;
                                              } */

    .blue-fill:hover:before,
    .highlight-box:hover:before,
    .cta-panel:hover:before,
    .footer-card:hover:before {
      transform: translateY(0)
    }

    .blue-fill:hover:after,
    .highlight-box:hover:after,
    .cta-panel:hover:after,
    .footer-card:hover:after {
      opacity: 1
    }

    /* .blue-fill:hover,
                                                                    .highlight-box:hover,
                                                                    .footer-card:hover {
                                                                      transform: translateY(-3px);
                                                                      border-color: #0018dc;
                                                                      box-shadow: 0 18px 36px rgba(16, 42, 67, .08);
                                                                      background: #ffffff;
                                                                    } */

    /* .blue-fill:hover h3,
                                          .blue-fill:hover p,
                                          .blue-fill:hover li,
                                          .blue-fill:hover strong,
                                          .blue-fill:hover .big,
                                          .highlight-box:hover h3,
                                          .highlight-box:hover p,
                                          .highlight-box:hover li,
                                          .highlight-box:hover strong,
                                          .cta-panel:hover h3,
                                          .cta-panel:hover p,
                                          .cta-panel:hover li,
                                          .cta-panel:hover strong,
                                          .footer-card:hover h3,
                                          .footer-card:hover p,
                                          .footer-card:hover li,
                                          .footer-card:hover strong,
                                          .footer-card:hover a {
                                            color: #fff !important
                                          } */

    section.band {
      background: var(--band);
      border-top: 1px solid #e5edf8;
      border-bottom: 1px solid #e5edf8
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
      color: #1f1f21
    }

    .lead {
      margin: 0 0 30px;
      max-width: 1020px;
      font-size: 18px;
      color: var(--muted)
    }

    .hero-card {
      background: rgba(255, 255, 255, .11);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 20px;
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

    .card,
    .feature,
    .app-card,
    .value-card,
    .system-box,
    .comparison .box,
    .proof-card,
    .failure-card,
    .fit-card,
    .proof-stat {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 4px;
      padding: 24px;
      /* box-shadow: 0 18px 44px rgba(13, 32, 84, .06) */
    }

    .card .num,
    .value-card .num,
    .failure-card .num,
    .fit-card .num {
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

    .card h3,
    .feature h3,
    .app-card h3,
    .system-box h3,
    .value-card h3,
    .proof-card h3,
    .failure-card h3,
    .fit-card h3,
    .proof-stat h3 {
      margin: 0 0 10px;
      font-size: 24px;
      line-height: 1.14;
      color: #232325
    }

    .card p,
    .feature p,
    .app-card p,
    .system-box p,
    .value-card p,
    .proof-card p,
    .failure-card p,
    .fit-card p,
    .proof-stat p {
      margin: 0;
      color: var(--muted)
    }

    .highlight-box {
      background: linear-gradient(180deg, #ffffff, #ffffff);
      border: 1px solid #d6e6fc;
      border-radius: 7px;
      padding: 28px;
      height: 100%;
    }

    .highlight-box h3 {
      margin: 0 0 12px;
      font-size: 30px;
      color: #1f1f21;
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

    .proof-strip {
      margin-top: 34px
    }

    .proof-stat {
      background: rgba(255, 255, 255, .11);
      border: 1px solid rgba(255, 255, 255, .16);
      backdrop-filter: blur(7px);
      color: #fff;
      box-shadow: none
    }

    .proof-stat .big {
      display: block;
      font-size: 34px;
      line-height: 1.02;
      font-weight: 800;
      color: #fff;
      margin-bottom: 8px
    }

    .proof-stat p {
      color: #e5f1ff
    }

    .proof-stat h3 {
      color: #fff;
      font-size: 18px;
      margin-bottom: 8px
    }

    .failure-card h3 {
      font-size: 22px
    }

    .failure-card .result {
      display: block;
      margin-top: 12px;
      color: #1f1f21;
      font-weight: 700
    }

    .proof-card .tag,
    .app-card .app-tag {
      display: inline-block;
      margin-bottom: 8px;
      font-size: 12px;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: var(--blue);
      font-weight: 700
    }

    .proof-card .metric {
      display: block;
      margin-top: 16px;
      font-size: 30px;
      line-height: 1;
      font-weight: 800;
      color: #121212;
    }

    .proof-card .submetric {
      display: block;
      margin-top: 8px;
      font-size: 14px;
      color: #5a6c86;
      font-weight: 700
    }

    .proof-quote {
      margin-top: 20px;
      padding: 20px 22px;
      border-radius: 7px;
      background: #f5f7fb;
      border: 1px solid #dbe8ff;
      color: #0f2c5d;
      font-size: 20px;
      line-height: 1.45;
      font-weight: 700
    }

    .proof-quote small {
      display: block;
      margin-top: 10px;
      font-size: 14px;
      color: #5c6f8b;
      font-weight: 700
    }

    .flow-line {
      display: block;
      margin-top: 10px;
      padding: 16px 18px;
      border-radius: 18px;
      background: #f7fbff;
      border: 1px solid #dfeaff;
      color: #1f1f21;
      font-weight: 700;
      line-height: 1.5
    }

    .comparison .box small {
      display: block;
      margin-top: 10px;
      color: #64748b;
      font-size: 14px
    }

    .app-card ul {
      margin: 12px 0 0;
      padding-left: 20px;
      color: #243042
    }

    .app-card li {
      margin: 0 0 8px
    }

    .fit-card .fit-label {
      display: inline-block;
      margin-bottom: 8px;
      font-size: 12px;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: var(--blue);
      font-weight: 700
    }

    .cta {
      /* background: linear-gradient(120deg, #061760, #0018dc 56%, #0c79cf); */
      color: #0e0e0e;
      /* padding: 72px 0 */
    }

    .cta-box {
      display: grid;
      grid-template-columns: 1.08fr .92fr;
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
      border: 1px solid rgb(226 220 220);
      border-radius: 8px;
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

    .footer-brand h3 {
      margin: 0 0 12px;
      font-size: 30px;
      color: #1f1f21
    }

    .footer-brand p,
    .footer-col p,
    .footer-col li,
    .footer-col a {
      color: #425066
    }

    .footer-col h4 {
      margin: 0 0 12px;
      color: #232325;
      font-size: 20px
    }

    .footer-col ul {
      list-style: none;
      padding: 0;
      margin: 0
    }

    .footer-col li {
      margin: 0 0 10px
    }

    .footer-cta {
      margin-top: 24px;
      padding-top: 24px;
      border-top: 1px solid #e5edf8;
      display: flex;
      justify-content: space-between;
      gap: 18px;
      flex-wrap: wrap;
      color: #5b6b84;
      font-size: 14px
    }

    @media (max-width:1080px) {

      .grid-3,
      .comparison,
      .split,
      .value-grid,
      .apps-grid,
      .footer-grid,
      .proof-grid,
      .fit-grid,
      .failure-grid,
      .proof-stats,
      .cta-box {
        grid-template-columns: 1fr 1fr
      }

      .hero-proof-panel>div {
        grid-template-columns: 1fr !important;
      }
    }

    @media (max-width:760px) {
      .wrap {
        padding: 0 18px
      }

      header.hero {
        padding: 58px 0 44px
      }

      h1 {
        font-size: 39px
      }

      .subhead {
        font-size: 22px
      }

      h2 {
        font-size: 31px
      }

      .grid-3,
      .comparison,
      .split,
      .value-grid,
      .apps-grid,
      .footer-grid,
      .proof-grid,
      .fit-grid,
      .failure-grid,
      .proof-stats,
      .cta-box {
        grid-template-columns: 1fr
      }

      .hero-proof-panel>div {
        grid-template-columns: 1fr !important;
      }
    }
  </style>

  <header class="hero">
    <div class="wrap py-8 sm:py-10 lg:py-20">
      <div class="eyebrow">Fluidstream Technology</div>
      <h1>Move mixed production streams with fewer constraints, lower cost, and less separation-driven complexity.</h1>
      <div class="subhead">Fluidstream multiphase compression helps operators recover production, reduce methane exposure,
        and simplify facilities in liquid-heavy field conditions conventional gas-only systems struggle to handle.</div>
      <p class="hero-copy">
        Instead of forcing variable field streams through separation-first design, Fluidstream compresses gas, liquids,
        and solids together so production can move with fewer handoffs, fewer protective workarounds, and a stronger
        operating outcome.
      </p>
      <div class="patent-note">
        Based on patented operating methods for liquid-influenced compression behavior, including
        <a href="/patented-technology#us11098709b2">US11098709B2</a>.
      </div>
      <div class="btn-row">
        <a class="btn btn-primary" href="#proof">See field proof</a>
        <a class="btn btn-1 btn-secondary" href="#applications">View applications</a>
      </div>

      <div class="hero-proof-panel interactive-card"
        style="margin-top:30px;background:rgb(255, 255, 255);border:1px solid rgba(255,255,255,.16);border-radius:7px;padding:26px;backdrop-filter:blur(8px);box-shadow:0 18px 44px rgba(7,18,74,.18);">
        <div style="display:grid;grid-template-columns:1.15fr .85fr;gap:22px;align-items:start;">
          <div>
            <div
              style="font-size:12px;letter-spacing:.11em;text-transform:uppercase;font-weight:700;color:#1029ea;margin-bottom:10px;">
              Real-world proof</div>
            <div style="font-size:28px;line-height:1.22;font-weight:800;color:#262525;max-width:700px;">“We went from zero
              production to over $1.5 million per year in incremental revenue, without adding any separation equipment or
              infrastructure.”</div>
            <div style="margin-top:12px;color:#262525;font-weight:700;">Production Engineer, Western Canadian Oil &amp;
              Gas Producer</div>
          </div>
          <div style="display:grid;gap:12px;">
            <div
              style="padding:14px 16px;border-radius:7px;background:rgba(255,255,255,.08);border:1px solid rgba(25, 25, 25, 0.311);">
              <strong style="display:block;color:#262525;font-size:24px;line-height:1;">C$1.5M+</strong>
              <span style="display:block;margin-top:6px;color:#1e1e1f;font-size:14px;">Incremental annual revenue</span>
            </div>
            <div
              style="padding:14px 16px;border-radius:7px;background:rgba(255,255,255,.08);border:1px solid rgba(25, 25, 25, 0.311);">
              <strong style="display:block;color:#262525;font-size:24px;line-height:1;">10e3 m³/d</strong>
              <span style="display:block;margin-top:6px;color:#1e1e1f;font-size:14px;">Gas restored from two liquid-loaded
                wells</span>
            </div>
            <div
              style="padding:14px 16px;border-radius:7px;background:rgba(255,255,255,.08);border:1px solid rgba(25, 25, 25, 0.311);">
              <strong style="display:block;color:#262525;font-size:24px;line-height:1;">No added separation</strong>
              <span style="display:block;margin-top:6px;color:#1e1e1f;font-size:14px;">Production recovery without extra
                site infrastructure</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="proof ">
    <div class="wrap py-12">
      <div class="section-kicker">Early proof</div>
      <h2>Real field results that show what the technology can do.</h2>
      <p class="lead">
        Fluidstream’s strongest credibility comes from measurable field outcomes: uptime, lower maintenance, reduced
        emissions, and meaningful production or revenue improvement under real operating conditions.
      </p>
      <div class="proof-grid">
        <div class="proof-card interactive-card swipe-left">
          <div class="tag">Allied Energy II</div>
          <h3>17+ months of continuous operation with no maintenance.</h3>
          <p>Fluidstream highlights sustained operation, eliminated venting, and winter-duty reliability as proof that its
            platform is built for field reality rather than brochure-only assumptions.</p>
          <span class="metric">100% uptime</span>
          <span class="submetric">17+ months • 0 maintenance • gas venting eliminated</span>
        </div>
        <div class="proof-card interactive-card swipe-left">
          <div class="tag">Multiphase production</div>
          <h3>Production restored from near-zero to meaningful revenue generation.</h3>
          <p>The most commercially powerful multiphase proof point on the site is the Alberta case where Fluidstream
            helped revive two liquid-loaded wells without adding separation equipment or extra site infrastructure.</p>
          <span class="metric">C$1.5M+/year</span>
          <span class="submetric">10e3 m³/d gas restored • 5 m³/d condensate • no added separation</span>
        </div>
        <div class="proof-card interactive-card swipe-right">
          <div class="tag">Why this matters</div>
          <h3>Performance proven in severe multiphase duty.</h3>
          <p>Severe liquid-influenced multiphase operation is a more demanding proof point than clean-gas service. If the
            technology is stable there, the differentiation argument becomes much stronger anywhere liquids create
            reliability, restart, or maintenance problems.</p>
          <span class="metric">Higher credibility</span>
          <span class="submetric">Severe field-condition proof</span>
        </div>
      </div>
      <div class="proof-quote">
        “We went from zero production to over $1.5 million per year in incremental revenue, without adding any separation
        equipment or infrastructure.”
        <small>Production Engineer, Western Canadian Oil &amp; Gas Producer</small>
      </div>
    </div>
  </section>

  <section class="band" id="technology-overview">
    <div class="wrap py-12">
      <div class="section-kicker">Field conditions</div>
      <h2>Where conventional compression starts to lose its fit.</h2>
      <p class="lead">
        Conventional compression is usually selected on the assumption that gas can be kept clean enough for the machine.
        In real field service, that assumption is often the problem. Liquids do not always stay upstream. Slugs do not
        arrive on schedule. Restarts do not happen under ideal conditions. Once the stream violates dry-gas assumptions,
        conventional systems often become protection-driven instead of production-driven.
      </p>
      <div class="failure-grid">
        <div class="failure-card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Liquid carryover</h3>
          <p>Once liquids break through, the compressor is exposed to instability, damage risk, and a heavier maintenance
            burden.</p>
          <span class="result">Result: more trips, more intervention, less confidence.</span>
        </div>
        <div class="failure-card interactive-card swipe-right">
          <div class="num">02</div>
          <h3>Slugging and unstable flow</h3>
          <p>Conventional trains are easier to destabilize when inlet quality changes quickly or liquid fraction rises
            suddenly.</p>
          <span class="result">Result: shutdowns, throughput loss, and upset-driven downtime.</span>
        </div>
        <div class="failure-card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Shut-ins and restarts</h3>
          <p>Liquid fallback after shutdowns creates repeated unloading, cycling, and delayed return to stable operation.
          </p>
          <span class="result">Result: longer restarts and recurring lost production.</span>
        </div>
        <div class="failure-card interactive-card swipe-left">
          <div class="num">04</div>
          <h3>Separation-first dependence</h3>
          <p>Protecting a gas-only compressor often means adding more scrubbers, vessels, controls, and site complexity.
          </p>
          <span class="result">Result: more equipment, more failure points, and weaker economics.</span>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Multiphase compression technology</div>
      <h2>Multiphase compression technology built around the stream you actually have.</h2>
      <p class="lead">
        Multiphase compression allows gas and liquids to be compressed simultaneously without prior separation. In
        traditional systems, gas must be isolated and conditioned before entering a compressor because liquid carryover
        creates risk, inefficiency, and reliability problems. Fluidstream is designed to operate directly on mixed-phase
        flow, including gas, oil, water, high liquid content streams, slugging conditions, and solids entrainment.
      </p>

      <div class="split">
        <div class="feature interactive-card swipe-left">
          <h3>Why conventional compression fails here</h3>
          <p>Conventional compressors are built around gas-only assumptions. Once liquids, slugs, unstable suction
            conditions, or solids become part of the operating envelope, separation equipment becomes a defensive
            requirement, complexity rises, and reliability falls. In other words, the system is no longer solving the
            field problem directly. It is spending more of its time trying to protect the compressor from the field.</p>
        </div>
        <div class="highlight-box interactive-card swipe-left">
          <h3>Why Fluidstream is different</h3>
          <p>Fluidstream is built around the real compression behavior of mixed streams. That matters because the
            commercial value comes from moving production sooner, with fewer process steps, in operating conditions where
            conventional systems are either unstable or too expensive to justify.</p>
          <ul class="bullet">
            <li><strong>Engineering basis:</strong> designed around liquid-influenced compression behavior inside the
              compression process, not only around external separation.</li>
            <li><strong>Commercial effect:</strong> less infrastructure, lower lifecycle burden, and broader applicability
              across hard-duty field conditions.</li>
            <li><strong>Patent anchor:</strong> <a href="/patented-technology#us11098709b2">US11098709B2</a> supports this
              liquid-aware operating approach inside the compression chamber.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="section-kicker">Why operators choose Fluidstream</div>
      <h2>Why operators use multiphase compression.</h2>
      <p class="lead">
        Operators choose Fluidstream when too much equipment, too many failure points, and too much dependence on clean
        inlet assumptions are limiting production and weakening project economics.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Simplified production systems</h3>
          <p>Reduce dependence on separators, tanks, scrubbers, and flare-dependent process steps in suitable applications
            so the facility does less defensive work before production can move.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Flow-through production approach</h3>
          <p>Move mixed streams directly instead of forcing early processing before useful work can be done. This creates
            a cleaner path from wellstream to value.</p>
        </div>
        <div class="card interactive-card swipe-right">
          <div class="num">03</div>
          <h3>Broader commercial deployment</h3>
          <p>Support lower-cost, lower-maintenance applications beyond niche or premium multiphase projects by improving
            the commercial fit at ordinary sites.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Why conventional systems create drag</div>
      <h2>Separation-first design adds cost, footprint, and operating constraints.</h2>
      <p class="lead">
        Conventional oil and gas facilities are built around separation. Production is processed through multiple stages —
        separators, tanks, scrubbers, and compressors — before gas can be transported. That approach increases capital
        cost, expands footprint, adds interconnections, and creates operating constraints that are hard to justify when
        the stream itself is variable. The more unstable the stream, the more expensive this defensive architecture
        becomes.
      </p>
      <div class="value-grid">
        <div class="value-card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Eliminate equipment</h3>
          <p>Reduce or remove separators, tanks, scrubbers, and flare-dependent process steps where the operating envelope
            supports a flow-through design.</p>
        </div>
        <div class="value-card interactive-card swipe-right">
          <div class="num">02</div>
          <h3>Lower cost</h3>
          <p>Minimize capital investment, installation complexity, and lifecycle maintenance burden by simplifying the
            facility around fewer major pieces of equipment.</p>
        </div>
        <div class="value-card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Increase uptime</h3>
          <p>Maintain performance across changing flow conditions, liquid slugs, and unstable production profiles that
            create difficulty for separation-first systems.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="section-kicker">A simpler production path</div>
      <h2>Simplifying the production system.</h2>
      <p class="lead">
        Fluidstream supports a facility-design shift toward less separation-first infrastructure, fewer major equipment
        items, and a clearer flow-through production approach where the technology can create value earlier in the
        process. The comparison is not cosmetic. It changes how many pieces of equipment have to work correctly before
        production moves.
      </p>
      <div class="comparison">
        <div class="box interactive-card swipe-left">
          <h3>Conventional system</h3>
          <span class="flow-line">Wellstream → Separator → Tank → Scrubber → Compressor → Pipeline</span>
          <small>High equipment count, larger footprint, more interconnections, more potential failure points, and more
            dependence on keeping the inlet stream clean enough for the compressor.</small>
        </div>
        <div class="box interactive-card swipe-right">
          <h3>Fluidstream system</h3>
          <span class="flow-line">Wellstream → Fluidstream Multiphase Compressor → Pipeline</span>
          <small>Reduced infrastructure, simplified operation, lower cost structure, earlier production movement, and
            broader applicability across challenging field conditions.</small>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Technology advantage</div>
      <h2>Built for mixed-stream compression, not gas-only assumptions.</h2>
      <p class="lead">
        The core technical distinction is not just that Fluidstream can tolerate harder streams. It is that the
        compression approach itself is aligned with mixed-stream behavior, allowing useful work to happen earlier and with
        fewer handoffs between equipment packages. That is a stronger position than simply adding more protection around a
        gas-only compressor.
      </p>
      <div class="split">
        <div class="feature interactive-card swipe-left">
          <h3>Compression logic matched to mixed streams</h3>
          <p>Instead of relying on dry-gas conditioning as a prerequisite for compression, Fluidstream is built for
            streams where liquids materially influence what the machine must handle and how it must respond. This is where
            conventional designs become reactive and maintenance-heavy.</p>
        </div>
        <div class="highlight-box interactive-card swipe-left">
          <h3>Patented operating methods that support mixed-stream compression</h3>
          <p>Fluidstream’s operating approach is supported by patented methods tied to liquid-influenced compression
            behavior. This matters in field service because liquids can materially change what the machine must handle
            inside the compression process, while conventional compressors are typically designed around gas-only
            assumptions.</p>
          <div class="patent-note light" style="margin-top:16px;">
            Supported by patented operating methods for liquid-influenced compression behavior, including
            <a href="/patented-technology#us11098709b2">US11098709B2</a>.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="section-kicker">Commercial advantage</div>
      <h2>Lower cost. Broader deployment. Better fit for hard-duty service.</h2>
      <p class="lead">
        Conventional multiphase technologies are often limited to high-value applications because their capital cost and
        maintenance complexity restrict where they can be economically deployed. Fluidstream is positioned differently:
        lower cost and lower maintenance support use across more wells, pads, facilities, and brownfield opportunities
        where the value case is easier to justify.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <h3>Lower capital cost</h3>
          <p>Simplified system design reduces upfront investment compared with conventional multiphase solutions that
            depend on more equipment, more integration, and more field complexity.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Reduced maintenance</h3>
          <p>Fewer wear-sensitive elements and a simpler system architecture decrease service frequency and lifecycle
            costs, which strengthens economics long after installation.</p>
        </div>
        <div class="card interactive-card swipe-right">
          <h3>Expanded applications</h3>
          <p>Improved economics allow deployment beyond niche or premium projects and into standard wellsites, pads, and
            facilities where the technology otherwise would not clear the hurdle.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="section-kicker">Best-fit applications</div>
      <h2>Not every site needs multiphase compression. The right sites need it badly.</h2>
      <p class="lead">
        Multiphase compression creates the most value where liquids, slugging, restart issues, or unstable production are
        already limiting performance. In cleaner, more stable dry-gas service, conventional compression may remain an
        acceptable fit. Where field conditions are harder, Fluidstream offers a stronger operating and economic case.
      </p>
      <div class="fit-grid">
        <div class="fit-card interactive-card swipe-left">
          <div class="fit-label">Usually not required</div>
          <h3>Clean, dry, stable gas with little upset risk.</h3>
          <p>If the stream is consistently conditioned, liquids are truly controlled, and the application already fits
            conventional dry-gas compression, the need for multiphase capability is lower.</p>
        </div>
        <div class="fit-card interactive-card swipe-left">
          <div class="fit-label">High-value fit</div>
          <h3>Liquids, slugging, restart issues, or unstable production are already costing money.</h3>
          <p>This is where Fluidstream creates the strongest advantage: fewer workarounds, less dependence on protective
            separation, and a better chance of keeping production moving under field conditions that do not stay tidy.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="applications" class="band">
    <div class="wrap py-12">
      <div class="section-kicker">Applications</div>
      <h2>Where it creates value.</h2>
      <p class="lead">
        Fluidstream creates the most value where production is being limited by liquids, unstable flow, backpressure,
        restart problems, or unnecessary surface complexity.
      </p>
      <div class="patent-note light" style="margin-bottom:30px;max-width:720px;">
        Patent reference, where relevant to application fit: <a href="/patented-technology#us11098709b2">US11098709B2</a>
        supports the liquid-aware compression behavior behind Fluidstream’s broader multiphase operating approach.
      </div>

      <div class="apps-grid">
        <div class="app-card interactive-card swipe-left">
          <div class="app-tag">Production recovery</div>
          <h3>Liquid-loaded and declining wells</h3>
          <p>Restore flow, extend producing life, and improve the economics of marginal wells.</p>
          <p style="margin-top:12px;"><strong>Why conventional fails:</strong> Gas-only compression loses stability when
            liquid fallback and intermittent loading disrupt normal suction conditions and turn compression into a
            recurring intervention problem.</p>
          <ul>
            <li>Maintains production as liquid fraction increases</li>
            <li>Reduces compression limits created by liquid carryover</li>
            <li>Helps keep late-life wells onstream longer</li>
          </ul>
        </div>

        <div class="app-card interactive-card swipe-right">
          <div class="app-tag">Flow stability</div>
          <h3>Slugging and unstable multiphase streams</h3>
          <p>Protect throughput and reduce trips when flow conditions change rapidly.</p>
          <p style="margin-top:12px;"><strong>Why conventional fails:</strong> Conventional trains depend on steadier
            inlet quality and often require more upstream separation as slug frequency rises, which adds complexity
            without solving the root instability.</p>
          <ul>
            <li>Handles intermittent slugs without full phase conditioning</li>
            <li>Reduces upset-driven downtime</li>
            <li>Supports more continuous operation under unstable flow</li>
          </ul>
        </div>

        <div class="app-card interactive-card swipe-left">
          <div class="app-tag">System constraints</div>
          <h3>Constrained gathering and high backpressure systems</h3>
          <p>Increase deliverability without a full facility rebuild.</p>
          <p style="margin-top:12px;"><strong>Why conventional fails:</strong> Adding more surface equipment often
            increases complexity without materially lowering flowing pressure at the well or improving the stream fit to
            compression.</p>
          <ul>
            <li>Reduces wellhead flowing pressure</li>
            <li>Improves response under fixed line constraints</li>
            <li>Adds production without new separation capacity</li>
          </ul>
        </div>

        <div class="app-card interactive-card swipe-right">
          <div class="app-tag">Restartability</div>
          <h3>Shut-in and intermittent operations</h3>
          <p>Shorten restart time, improve uptime, and reduce repeat cycling after shutdowns.</p>
          <p style="margin-top:12px;"><strong>Why conventional fails:</strong> Liquid accumulation after shut-ins often
            requires unloading or repeated cycling before stable compression returns, extending downtime and frustrating
            operators.</p>
          <ul>
            <li>Tolerates liquid-rich restart conditions</li>
            <li>Reduces dependence on pre-unloading steps</li>
            <li>Supports a steadier return to production</li>
          </ul>
        </div>

        <div class="app-card interactive-card swipe-left">
          <div class="app-tag">Remote deployment</div>
          <h3>Infrastructure-limited and remote sites</h3>
          <p>Lower field burden where access, power, and maintenance resources are limited.</p>
          <p style="margin-top:12px;"><strong>Why conventional fails:</strong> Separation-heavy layouts add equipment,
            controls, and intervention requirements that are harder to support in remote service environments and cost
            more to keep alive.</p>
          <ul>
            <li>Minimizes equipment count and interdependencies</li>
            <li>Reduces maintenance exposure in low-access areas</li>
            <li>Supports compact deployment strategies</li>
          </ul>
        </div>

        <div class="app-card interactive-card swipe-right">
          <div class="app-tag">Commercial impact</div>
          <h3>Emissions reduction and production value capture</h3>
          <p>Capture more gas value with fewer process steps and less wasted production.</p>
          <p style="margin-top:12px;"><strong>Why conventional fails:</strong> Processing requirements can exceed the
            value of lower-rate or variable mixed streams when too many steps are needed before compression, leaving gas
            stranded or uneconomic to recover.</p>
          <ul>
            <li>Supports gas capture under variable liquid loading</li>
            <li>Reduces venting and flaring dependence</li>
            <li>Applies across vapor, casing gas, and mixed production streams</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="wrap py-12">
      <div class="cta-box">
        <div>
          <div class="section-kicker" style="color:#0018dc;">Request technical review</div>
          <h2>Find out whether your compression problem is actually a multiphase problem.</h2>
          <p>Use Fluidstream’s technical review when liquids, unstable flow, restart pain, scrubber breakthrough, or
            excessive maintenance suggest that the current compression approach is mismatched to the stream.</p>
        </div>
        <div class="cta-panel interactive-card swipe-left">
          <h3>Use this review when you need to assess</h3>
          <ul>
            <li>Whether liquids or unstable flow are driving the current bottleneck</li>
            <li>Whether separation-first design is adding avoidable cost and complexity</li>
            <li>Whether multiphase compression can improve uptime, gas capture, or restartability</li>
            <li>Whether the application fits Fluidstream’s technical and commercial envelope</li>
          </ul>
          <div class="btn-row">
            <a class="btn btn-primary" href="/contact">Request Technical Review</a>
            <a class="btn btn-secondary-1" href="/contact">Contact Engineering</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection