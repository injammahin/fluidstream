@extends('layouts.app')

@section('content')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
      --fs-blue: #0018dc;
      --fs-blue-dark: #0012a3;
      --fs-cyan: #15d1ff;
      --text: #0f172a;
      --muted: #475569;
      --line: #e5e7eb;
      --bg-soft: #f8fafc;
      --white: #ffffff;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: var(--text);
      background: #fff;
      line-height: 1.5;
    }

    a {
      text-decoration: none;
    }

    .container {
      max-width: 1200px;
      ;
      margin: 0 auto;
    }

    .hero {
      position: relative;
      overflow: hidden;
      color: white;
      background: var(--fs-blue);
      border-bottom: 1px solid var(--fs-blue-dark);
    }

    /* .hero::before {
                                                                                              content: "";
                                                                                              position: absolute;
                                                                                              inset: 0;
                                                                                              background-image:
                                                                                                linear-gradient(90deg, rgba(0, 24, 220, .88), rgba(0, 24, 220, .72)),
                                                                                                url('/img/hero/vapor-recovery.png');
                                                                                              background-size: cover;
                                                                                              background-position: center;
                                                                                            } */
    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: linear-gradient(90deg, rgb(0 24 220 / 30%), rgb(0 24 220 / 14%)), url(/img/hero/vapor-recovery.png);
      background-size: cover;
      background-position: center;
    }

    .hero-inner {
      position: relative;
      padding: 110px 0 96px;
      display: grid;
      grid-template-columns: minmax(0, 1fr) 560px;
      gap: 56px;
      align-items: start;
    }


    .eyebrow {
      display: inline-block;
      margin-bottom: 18px;
      padding: 8px 14px;
      border: 1px solid rgba(255, 255, 255, .22);
      border-radius: 999px;
      color: rgba(255, 255, 255, .9);
      font-size: 13px;
      letter-spacing: .08em;
      text-transform: uppercase;
      font-weight: 600;
    }

    h1 {
      margin: 0;
      font-size: clamp(48px, 6vw, 78px);
      line-height: .98;
      letter-spacing: -.04em;
      font-weight: 700;
      max-width: 760px;
    }

    .hero p.lead {
      margin: 22px 0 0;
      font-size: clamp(20px, 2.2vw, 24px);
      color: #dbeafe;
      max-width: 700px;
    }

    .hero p.sub {
      margin: 18px 0 0;
      font-size: 18px;
      color: rgba(255, 255, 255, .82);
      max-width: 760px;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-top: 34px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 22px;
      border-radius: 16px;
      font-size: 14px;
      font-weight: 600;
      transition: transform .18s ease, background .18s ease, border-color .18s ease;
      cursor: pointer;
    }

    .btn:hover {
      transform: translateY(-1px);
    }

    .btn-primary {
      background: white;
      color: var(--fs-blue);
    }

    .btn-secondary {
      color: white;
      border: 1px solid rgba(255, 255, 255, .28);
      background: rgba(255, 255, 255, .05);
      backdrop-filter: blur(6px);
    }

    .hero-panel {
      border: 1px solid rgba(255, 255, 255, .14);
      background: rgba(255, 255, 255, .08);
      backdrop-filter: blur(10px);
      border-radius: 30px;
      padding: 26px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, .18);
    }

    .panel-grid {
      display: grid;
      gap: 16px;
    }

    .mini-card {
      padding: 20px;
      border-radius: 24px;
      border: 1px solid rgba(255, 255, 255, .14);
      background: rgba(255, 255, 255, .06);
    }

    .mini-label {
      color: #7dd3fc;
      text-transform: uppercase;
      letter-spacing: .18em;
      font-size: 12px;
      font-weight: 700;
    }

    .mini-title {
      margin-top: 10px;
      font-size: 28px;
      line-height: 1.1;
      font-weight: 700;
    }

    .two-up {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .mini-desc {
      color: rgba(255, 255, 255, .75);
      font-size: 13px;
    }

    .mini-copy {
      margin-top: 8px;
      font-size: 18px;
      font-weight: 600;
    }

    .content-pad {
      padding: 78px 0;
    }

    .split {
      display: grid;
      grid-template-columns: .95fr 1.05fr;
      gap: 105px;
      align-items: start;
    }

    .section-label {
      margin: 0;
      color: var(--fs-blue);
      font-size: 13px;
      font-weight: 700;
      letter-spacing: .16em;
      text-transform: uppercase;
    }

    h2 {
      margin: 14px 0 0;
      font-size: clamp(34px, 3.5vw, 48px);
      line-height: 1.05;
      letter-spacing: -.03em;
      font-weight: 700;
    }

    .body-lg {
      font-size: 19px;
      line-height: 1.8;
      color: var(--muted);
    }

    .body-lg p {
      margin: 0 0 18px;
    }

    .soft {
      background: var(--bg-soft);
    }

    .cards-4 {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 22px;
    }

    .compare-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 28px;
      margin-top: 46px;
    }

    .compare-card {
      border-radius: 32px;
      padding: 34px;
      border: 1px solid var(--line);
      background: white;
      box-shadow: 0 8px 28px rgba(15, 23, 42, .04);
    }

    .compare-card.highlight {
      border-color: rgba(21, 209, 255, .65);
      background: linear-gradient(180deg, #f7fdff 0%, #eefbff 100%);
    }

    .compare-card .title {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .18em;
      font-weight: 700;
      color: #64748b;
    }

    .compare-card.highlight .title {
      color: var(--fs-blue);
    }

    .flow {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 12px;
      margin-top: 24px;
    }

    .pill {
      padding: 11px 16px;
      border-radius: 999px;
      border: 1px solid #cbd5e1;
      background: white;
      font-size: 14px;
      font-weight: 600;
      color: #334155;
    }

    .compare-card.highlight .pill {
      border-color: rgba(21, 209, 255, .85);
      color: var(--fs-blue);
    }

    .arrow {
      color: #94a3b8;
      font-size: 18px;
      font-weight: 700;
    }

    .compare-card.highlight .arrow {
      color: var(--fs-cyan);
    }

    .compare-card p {
      margin: 28px 0 0;
      color: var(--muted);
      font-size: 15px;
      line-height: 1.8;
    }

    /* .cta {
                                                                                                                                                                  background: var(--fs-blue);
                                                                                                                                                                  color: white;
                                                                                                                                                                } */

    .cta-wrap {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 28px;
      align-items: end;
      padding: 86px 0;
    }

    /* .cta p {
                                                                                                                                                                color: #dbeafe;
                                                                                                                                                                font-size: 18px;
                                                                                                                                                                max-width: 760px;
                                                                                                                                                              } */

    .cta-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      justify-content: flex-end;
    }

    .btn-accent {
      background: var(--fs-cyan);
      color: var(--fs-blue);
    }

    .btn-outline-light {
      color: #201e1e;
      border: 1px solid rgb(0 0 0 / 30%);
      background: transparent;
    }

    /* Hover reveal cards */
    .reveal-card {
      position: relative;
      overflow: hidden;
      min-height: 230px;
      border: 1px solid var(--line);
      border-radius: 5px;
      background: #fff;
      transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
    }

    .reveal-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 16px 34px rgba(21, 209, 255, .08);
      border-color: #d6dbe4;
    }

    .reveal-card__base,
    .reveal-card__panel {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 230px;
      padding: 28px;
    }

    .reveal-card__title {
      margin: 0;
      font-size: 32px;
      line-height: 1.15;
      letter-spacing: -.02em;
      font-weight: 400;
      color: #000000;
    }

    .reveal-card__text {
      margin: 14px 0 0;
      color: var(--muted);
      font-size: 15px;
      line-height: 1.8;
    }

    .reveal-card__panel {
      position: absolute;
      inset: 0;
      background: var(--fs-blue);
      color: #fff;
      transform: translateY(100%);
      transition: transform .9s cubic-bezier(0.22, 1, 0.36, 1);
      will-change: transform;
      z-index: 2;
    }

    .reveal-card:hover .reveal-card__panel {
      transform: translateY(0);
    }

    .reveal-card__panel-title {
      margin: 0;
      font-size: 22px;
      line-height: 1.15;
      letter-spacing: -.02em;
      font-weight: 500;
      color: #fff;
    }

    .reveal-card__panel-text {
      margin: 14px 0 0;
      color: rgba(255, 255, 255, .92);
      font-size: 15px;
      line-height: 1.8;
    }

    .reveal-card__explore,
    .reveal-card__panel-explore {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 15px;
      font-weight: 500;
    }

    .reveal-card__explore {
      color: var(--fs-blue);
    }

    .reveal-card__panel-explore {
      color: #fff;
    }

    .reveal-card__arrow {
      font-size: 26px;
      line-height: 1;
    }

    .apps-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 22px;
    }

    @media (max-width: 1024px) {

      .hero-inner,
      .split,
      .cta-wrap {
        grid-template-columns: 1fr;
      }

      .cards-4,
      .compare-grid {
        grid-template-columns: 1fr 1fr;
      }

      .cta-actions {
        justify-content: flex-start;
      }
    }

    @media (max-width: 720px) {
      .container {
        width: min(100% - 32px, 1180px);
      }

      .content-pad {
        padding: 62px 0;
      }

      .hero-inner {
        padding: 86px 0 74px;
      }

      .cards-4,
      .compare-grid,
      .two-up,
      .apps-grid {
        grid-template-columns: 1fr;
      }

      .btn {
        width: 100%;
      }

      .hero-actions,
      .cta-actions {
        flex-direction: column;
        align-items: stretch;
      }

      .reveal-card,
      .reveal-card__base,
      .reveal-card__panel {
        min-height: 250px;
      }

      .reveal-card__base,
      .reveal-card__panel {
        padding: 22px;
      }

      .reveal-card__title,
      .reveal-card__panel-title {
        font-size: 18px;
      }

      .reveal-card__text,
      .reveal-card__panel-text {
        font-size: 14px;
        line-height: 1.7;
      }
    }

    .hero-side {
      background: #ffffff;
      border: 1px solid var(--line);
      padding: 24px 34px 20px;
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
      min-height: auto;
      width: 100%;
      max-width: 560px;
      justify-self: end;
    }

    .hero-side h3 {
      margin: 0 0 6px;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: .16em;
      color: #0018dc !important;
      font-weight: 700;
    }


    .hero-side ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: grid;
      gap: 0;
    }

    .hero-side li {
      padding: 10px 0 10px;
      border-top: 1px solid var(--line);
      color: var(--text);
      font-size: 16px;
      line-height: 1.4;
    }

    .hero-side li strong {
      display: block;
      margin-bottom: 2px;
      font-size: 16px;
      line-height: 1.15;
      letter-spacing: -.02em;
      color: var(--text);
      font-weight: 700;
    }

    .hero-side li:first-child {
      border-top: 1px solid var(--line);
    }

    .hero-inner {
      position: relative;
      padding: 110px 0 96px;
      display: grid;
      grid-template-columns: minmax(0, 1fr) 560px;
      gap: 56px;
      align-items: start;
    }

    .hero-side {
      background: #ffffff;
      border: 1px solid var(--line);
      padding: 26px 34px 24px;
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
      min-height: auto;
      width: 100%;
      max-width: 560px;
      justify-self: end;
    }


    @media (max-width: 1024px) {
      .hero-inner {
        grid-template-columns: 1fr;
        gap: 34px;
      }

      .hero-side {
        max-width: 100%;
        justify-self: stretch;
        padding: 24px 26px 22px;
      }

      .hero-side li strong {
        font-size: 18px;
      }

      .hero-side li {
        font-size: 15px;
      }
    }

    .hero-side li strong {
      display: block;
      margin-bottom: 4px;
      font-size: 16px;
      line-height: 1.18;
      letter-spacing: -.02em;
      color: var(--text);
      font-weight: 700;
    }

    @media (max-width: 980px) {
      .hero-side {
        padding: 24px;
      }

      .hero-side li strong {
        font-size: 20px;
      }

      .hero-side li {
        font-size: 15px;
      }
    }
  </style>

  <section class="hero section">
    <div class="container hero-inner">
      <div>
        <span class="eyebrow">Fluidstream Technology</span>
        <h1>Multiphase Compression</h1>
        <p class="lead">Move unprocessed production streams with fewer constraints, lower cost, and reduced
          infrastructure.</p>
        <p class="sub">Fluidstream enables operators to compress gas, liquids, and solids together—reducing reliance on
          traditional separation-first facility design and expanding where multiphase technology can be economically
          deployed.</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="#technology">Explore Technology</a>
          <a class="btn btn-secondary" href="#applications">View Applications</a>
        </div>
      </div>

      <div class="hero-side">
        <h3>Technology outcomes</h3>
        <ul>
          <li>
            <strong>Simplified production systems</strong><br>
            Reduce dependence on separators, tanks, scrubbers, and flare-dependent process steps in suitable applications.
          </li>
          <li>
            <strong>Flow-through production approach</strong><br>
            Move mixed streams directly instead of forcing early processing before useful work can be done.
          </li>
          <li>
            <strong>Lower cost structure</strong><br>
            Support broader deployment by reducing capital intensity, installation complexity, and lifecycle burden.
          </li>
          <li>
            <strong>Operator-ready economics</strong><br>
            Make multiphase technology easier to justify beyond niche, premium, or one-off projects.
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container content-pad">
      <div class="split">
        <div>
          <p class="section-label">Rethinking surface facility design</p>
          <h2>A different approach to moving production</h2>
        </div>
        <div class="body-lg">
          <p>Conventional oil and gas facilities are built around separation. Production is processed through multiple
            stages—separators, tanks, scrubbers, and compressors—before gas can be transported. That approach increases
            capital cost, expands footprint, and introduces operational constraints.</p>
          <p>Fluidstream takes a different approach. Our multiphase compression technology enables operators to move mixed
            production streams directly—simplifying infrastructure while improving performance across a wide range of
            operating conditions.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section soft">
    <div class="container content-pad">
      <div class="cards-4">
        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Eliminate Equipment</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Eliminate Equipment</h3>
              <p class="reveal-card__panel-text">Reduce or remove separators, tanks, scrubbers, and flare-dependent
                process steps.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Lower Cost</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Lower Cost</h3>
              <p class="reveal-card__panel-text">Minimize capital investment, installation complexity, and lifecycle
                maintenance burden.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Increase Uptime</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Increase Uptime</h3>
              <p class="reveal-card__panel-text">Maintain performance across changing flow conditions, liquid slugs, and
                unstable production.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Reduce Emissions</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Reduce Emissions</h3>
              <p class="reveal-card__panel-text">Capture gas that would otherwise be flared or vented and convert it into
                useful production value.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section id="technology" class="section">
    <div class="container content-pad">
      <div class="split">
        <div>
          <p class="section-label">What it is</p>
          <h2>Multiphase compression technology</h2>
        </div>
        <div class="body-lg">
          <p>Multiphase compression allows gas and liquids to be compressed simultaneously without prior separation. In
            traditional systems, gas must be isolated and conditioned before entering a compressor. Liquid carryover
            creates risk, inefficiency, and reliability issues.</p>
          <p>Fluidstream systems are designed to operate directly on mixed-phase flow, handling gas, oil, and water
            combinations, high liquid content streams, slugging conditions, and solids entrainment. This enables a shift
            from separation-driven systems to simplified flow-through production systems.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="technology" class="border-b border-[rgba(16,42,67,0.06)] bg-white py-[72px]">
    <div class="container">

      <div class="mb-[30px] grid grid-cols-[minmax(0,1.05fr)_minmax(320px,0.95fr)] items-start max-[980px]:grid-cols-1">
        <div>
          <div class="mb-[10px] text-[13px] font-[850] uppercase tracking-[0.09em] text-[#0018dc]">
            Rethinking surface facility design
          </div>
          <h2
            class="m-0 max-w-[16ch] text-[clamp(32px,3.1vw,50px)] leading-[1.06] tracking-[-0.04em] text-[#102a43] max-[980px]:max-w-none">
            A different approach to moving production.
          </h2>
        </div>

        <p
          class="m-0 max-w-[48ch] justify-self-start text-[1.15rem] font-medium leading-[1.65] text-[#52667a] max-[980px]:max-w-none">
          Conventional oil and gas facilities are built around separation. Production is processed through multiple
          stages—separators, tanks, scrubbers, and compressors—before gas can be transported. That approach increases
          capital cost, expands footprint, and introduces operational constraints. Fluidstream takes a different approach
          by enabling operators to move mixed production streams directly while improving performance across changing
          field conditions.
        </p>
      </div>

      <div class="grid grid-cols-4 gap-[18px] max-[1120px]:grid-cols-2 max-[760px]:grid-cols-1">

        <div
          class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
          <span
            class="absolute left-0 right-0 top-0 h-[3px] origin-left scale-x-0 bg-[#0018dc] transition-transform duration-300 ease-[cubic-bezier(.22,.61,.36,1)] group-hover:scale-x-100"></span>
          <div
            class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
            01
          </div>
          <h3
            class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
            Eliminate equipment
          </h3>
          <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
            Reduce or remove separators, tanks, scrubbers, and flare-dependent process steps where the operating envelope
            supports a flow-through design.
          </p>
        </div>

        <div
          class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
          <span
            class="absolute left-0 right-0 top-0 h-[3px] origin-left scale-x-0 bg-[#0018dc] transition-transform duration-300 ease-[cubic-bezier(.22,.61,.36,1)] group-hover:scale-x-100"></span>
          <div
            class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
            02
          </div>
          <h3
            class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
            Lower cost
          </h3>
          <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
            Minimize capital investment, installation complexity, and lifecycle maintenance burden by simplifying the
            facility around fewer major pieces of equipment.
          </p>
        </div>

        <div
          class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
          <span
            class="absolute left-0 right-0 top-0 h-[3px] origin-left scale-x-0 bg-[#0018dc] transition-transform duration-300 ease-[cubic-bezier(.22,.61,.36,1)] group-hover:scale-x-100"></span>
          <div
            class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
            03
          </div>
          <h3
            class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
            Increase uptime
          </h3>
          <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
            Maintain performance across changing flow conditions, liquid slugs, and unstable production profiles that
            create difficulty for separation-first systems.
          </p>
        </div>

        <div
          class="group relative overflow-hidden border border-[#d9e2ec] bg-white p-7 shadow-[0_18px_45px_rgba(16,42,67,0.08)] transition-all duration-300 ease-[cubic-bezier(.22,.61,.36,1)] hover:-translate-y-[3px] hover:border-[#0018dc] hover:shadow-[0_22px_46px_rgba(16,42,67,0.10)]">
          <span
            class="absolute left-0 right-0 top-0 h-[3px] origin-left scale-x-0 bg-[#0018dc] transition-transform duration-300 ease-[cubic-bezier(.22,.61,.36,1)] group-hover:scale-x-100"></span>
          <div
            class="relative z-[1] mb-[18px] inline-flex h-12 w-12 items-center justify-center rounded-full bg-[rgba(0,24,220,0.08)] text-[15px] font-[850] text-[#0018dc]">
            04
          </div>
          <h3
            class="relative z-[1] mb-3 text-[24px] leading-[1.1] tracking-[-0.025em] text-[#102a43] transition-colors duration-300 group-hover:text-[#0018dc]">
            Reduce emissions
          </h3>
          <p class="relative z-[1] m-0 text-[16px] text-[#52667a]">
            Capture gas that would otherwise be flared or vented and convert it into useful production value rather than
            lost site energy and emissions exposure.
          </p>
        </div>

      </div>
    </div>
  </section>



  <section class="section soft">
    <div class="container content-pad">
      <p class="section-label">System comparison</p>
      <h2>Simplifying the production system</h2>

      <p class="mt-2 relative z-[1] m-0 max-w-[620px] text-[16px] leading-[1.65] text-[#52667a]">
        Fluidstream supports a facility-design shift toward less separation-first infrastructure, fewer major equipment
        items, and a clearer flow-through production approach where the technology can create value earlier in the
        process.
      </p>




      <div class="compare-grid">
        <div class="compare-card">
          <div class="title">Conventional system</div>
          <div class="flow">
            <span class="pill">Wellstream</span>
            <span class="arrow">→</span>
            <span class="pill">Separator</span>
            <span class="arrow">→</span>
            <span class="pill">Tank</span>
            <span class="arrow">→</span>
            <span class="pill">Scrubber</span>
            <span class="arrow">→</span>
            <span class="pill">Compressor</span>
            <span class="arrow">→</span>
            <span class="pill">Pipeline</span>
          </div>
          <p>High equipment count, larger footprint, more interconnections, and more potential failure points across the
            facility.</p>
        </div>

        <div class="compare-card highlight">
          <div class="title">Fluidstream system</div>
          <div class="flow">
            <span class="pill">Wellstream</span>
            <span class="arrow">→</span>
            <span class="pill">Fluidstream Multiphase Compressor</span>
            <span class="arrow">→</span>
            <span class="pill">Pipeline</span>
          </div>
          <p>Reduced infrastructure, simplified operation, lower cost structure, and broader applicability across
            challenging field conditions.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container content-pad">
      <div class="economic-block">
        <div class="economic-head">
          <p class="section-label">Economic advantage</p>
          <h2>Lower cost. Broader deployment.</h2>
          <p class="economic-copy pt-4">
            Conventional multiphase technologies are often limited to high-value applications because their capital cost
            and maintenance complexity restrict where they can be economically deployed. Fluidstream is positioned
            differently: lower cost and lower maintenance support use across more wells, pads, facilities, and brownfield
            opportunities where the value case is easier to justify.
          </p>
        </div>

        <div class="economic-cards">
          <div class="economic-card">
            <h3>Lower capital cost</h3>
            <p>
              Simplified system design reduces upfront investment compared with conventional multiphase solutions that
              depend on more equipment, more integration, and more field complexity.
            </p>
          </div>

          <div class="economic-card">
            <h3>Reduced maintenance</h3>
            <p>
              Fewer wear-sensitive elements and a simpler system architecture decrease service frequency and lifecycle
              costs, which strengthens economics long after installation.
            </p>
          </div>

          <div class="economic-card">
            <h3>Expanded applications</h3>
            <p>
              Improved economics allow deployment beyond niche or premium projects and into standard wellsites, pads, and
              facilities where the technology otherwise would not clear the hurdle.
            </p>
          </div>

          <div class="economic-card">
            <h3>Higher ROI</h3>
            <p>
              Lower capital and operating costs support stronger returns across the asset lifecycle while also improving
              the case for emissions reduction and infrastructure simplification.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    .economic-block {
      display: block;
    }

    .economic-head {
      max-width: 1180px;
      margin-bottom: 34px;
    }

    .economic-head .section-label {
      margin-bottom: 16px;
    }



    .economic-copy {
      margin: 0;
      max-width: 1000px;
      font-size: 18px;
      line-height: 1.7;
      color: var(--muted);
    }

    .economic-cards {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 22px;
    }

    .economic-card {
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      min-height: 320px;
      padding: 34px 34px 42px;
      background: #ffffff;
      border: 1px solid #d9e2ec;
      box-shadow: none;
      transition: background .25s ease, transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .economic-card>* {
      position: relative;
      z-index: 1;
    }

    .economic-card::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 3px;
      background: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.25s cubic-bezier(.22, .61, .36, 1);
    }

    .economic-card h3 {
      margin: 0 0 18px;
      font-size: 28px;
      line-height: 1.08;
      letter-spacing: -.03em;
      color: var(--text);
      transition: color .25s ease;
    }

    .economic-card p {
      margin: 0;
      font-size: 16px;
      line-height: 1.75;
      color: var(--muted);
      transition: color .25s ease;
    }

    .economic-card:hover {
      background: #ffffff;
      border-color: #0018dc;
      box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
      transform: translateY(-3px);
    }

    .economic-card:hover::after {
      transform: scaleX(1);
    }

    .economic-card:hover h3 {
      color: #0018dc;
    }

    .economic-card:hover p {
      color: var(--muted);
    }

    @media (max-width: 768px) {
      .economic-card {
        min-height: auto;
        padding: 26px 24px 30px;
      }

      .economic-card h3 {
        font-size: 24px;
      }
    }
  </style>

  <section class="section" id="applications">
    <div class="container">
      <div class="section-head">
        <div>
          <p class="section-label">Applications</p>
        </div>
        <div>
          <h2>Where it creates value</h2>
          <p class="width-600">Fluidstream creates the most value where production is being limited by liquids, unstable
            flow,
            backpressure, restart problems, or unnecessary surface complexity.</p>
        </div>
      </div>

      <div class="app-grid">
        <article class="app-card">
          <div class="tag">Production recovery</div>
          <h3>Liquid-loaded and declining wells</h3>
          <div class="value-line">Restore flow, extend producing life, and improve the economics of marginal wells.
          </div>
          <div class="fail-line"><strong>Why conventional fails:</strong> Gas-only compression loses stability when
            liquid fallback and intermittent loading disrupt normal suction conditions.</div>
          <ul>
            <li>Maintains production as liquid fraction increases</li>
            <li>Reduces compression limits created by liquid carryover</li>
            <li>Helps keep late-life wells onstream longer</li>
          </ul>
        </article>

        <article class="app-card">
          <div class="tag">Flow stability</div>
          <h3>Slugging and unstable multiphase streams</h3>
          <div class="value-line">Protect throughput and reduce trips when flow conditions change rapidly.</div>
          <div class="fail-line"><strong>Why conventional fails:</strong> Conventional trains depend on steadier inlet
            quality and often require more upstream separation as slug frequency rises.</div>
          <ul>
            <li>Handles intermittent slugs without full phase conditioning</li>
            <li>Reduces upset-driven downtime</li>
            <li>Supports more continuous operation under unstable flow</li>
          </ul>
        </article>

        <article class="app-card">
          <div class="tag">System constraints</div>
          <h3>Constrained gathering and high backpressure systems</h3>
          <div class="value-line">Increase deliverability without a full facility rebuild.</div>
          <div class="fail-line"><strong>Why conventional fails:</strong> Adding more surface equipment often increases
            complexity without materially lowering flowing pressure at the well.</div>
          <ul>
            <li>Reduces wellhead flowing pressure</li>
            <li>Improves response under fixed line constraints</li>
            <li>Adds production without new separation capacity</li>
          </ul>
        </article>

        <article class="app-card">
          <div class="tag">Restartability</div>
          <h3>Shut-in and intermittent operations</h3>
          <div class="value-line">Shorten restart time, improve uptime, and reduce repeat cycling after shutdowns.</div>
          <div class="fail-line"><strong>Why conventional fails:</strong> Liquid accumulation after shut-ins often
            requires unloading or repeated cycling before stable compression returns.</div>
          <ul>
            <li>Tolerates liquid-rich restart conditions</li>
            <li>Reduces dependence on pre-unloading steps</li>
            <li>Supports a steadier return to production</li>
          </ul>
        </article>

        <article class="app-card">
          <div class="tag">Remote deployment</div>
          <h3>Infrastructure-limited and remote sites</h3>
          <div class="value-line">Lower field burden where access, power, and maintenance resources are limited.</div>
          <div class="fail-line"><strong>Why conventional fails:</strong> Separation-heavy layouts add equipment,
            controls, and intervention requirements that are harder to support in remote service environments.</div>
          <ul>
            <li>Minimizes equipment count and interdependencies</li>
            <li>Reduces maintenance exposure in low-access areas</li>
            <li>Supports compact deployment strategies</li>
          </ul>
        </article>

        <article class="app-card">
          <div class="tag">Commercial impact</div>
          <h3>Emissions reduction and production value capture</h3>
          <div class="value-line">Capture more gas value with fewer process steps and less wasted production.</div>
          <div class="fail-line"><strong>Why conventional fails:</strong> Processing requirements can exceed the value
            of lower-rate or variable mixed streams when too many steps are needed before compression.</div>
          <ul>
            <li>Supports gas capture under variable liquid loading</li>
            <li>Reduces venting and flaring dependence</li>
            <li>Applies across vapor, casing gas, and mixed production streams</li>
          </ul>
        </article>
      </div>
    </div>
  </section>
  <style>
    :root {
      --bg: #ffffff;
      --bg-alt: #f4f6f8;
      --line: #d9e2ec;
      --text: #102a43;
      --muted: #52667a;
      --accent: #15d1ff;
      --accent-dark: #0018dc;
      --shadow: 0 18px 45px rgba(16, 42, 67, .08);
      --shadow-hover: 0 24px 60px rgba(0, 24, 220, .12);
      --max: 1240px;
    }



    .inner {
      width: min(var(--max), calc(100% - 40px));
      margin: 0 auto;
    }

    .section-head {
      /* display: grid; */
      grid-template-columns: minmax(200px, .32fr) minmax(0, 1fr);
      gap: 34px;
      align-items: start;
      margin-bottom: 34px;
    }

    .width-600 {
      max-width: 600px;

    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
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

    .section-head h2 {
      font-size: clamp(2.2rem, 4vw, 4rem);
      line-height: 1.02;
      letter-spacing: -.04em;
      color: var(--text);
      margin-bottom: 14px;
      max-width: 12ch;
    }


    .app-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 20px;
    }

    .app-card {
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      min-height: 330px;
      padding: 24px 24px 22px;
      border: 1px solid var(--line);
      background: #ffffff;
      box-shadow: var(--shadow);
      transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease;
    }

    .app-card::before {
      content: "";
      position: absolute;
      inset: auto -14% -36% auto;
      width: 220px;
      height: 220px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(21, 209, 255, .10), transparent 66%);
      pointer-events: none;
    }

    .app-card>* {
      position: relative;
      z-index: 1;
    }

    .app-card:hover {
      transform: translateY(-3px);
      border-color: #9bb6ff;
      box-shadow: var(--shadow-hover);
    }

    .tag {
      display: inline-flex;
      width: fit-content;
      padding: 8px 10px;
      margin-bottom: 16px;
      border-radius: 999px;
      background: #edf3ff;
      color: var(--accent-dark);
      border: 1px solid #d3e1ff;
      font-size: .76rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .app-card h3 {
      font-size: 1.34rem;
      line-height: 1.14;
      letter-spacing: -.03em;
      color: var(--text);
      margin-bottom: 12px;
      max-width: 18ch;
    }

    .value-line {
      color: var(--text);
      font-weight: 700;
      font-size: 1rem;
      line-height: 1.52;
      margin-bottom: 12px;
    }

    .fail-line {
      margin-bottom: 16px;
      padding: 12px 14px;
      background: #f4f8ff;
      border-left: 3px solid var(--accent-dark);
      color: var(--text);
      font-size: .93rem;
      line-height: 1.52;
    }

    .fail-line strong {
      color: var(--accent-dark);
    }

    .app-card ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 9px;
    }

    .app-card li {
      position: relative;
      padding-left: 24px;
      color: var(--text);
      font-size: .95rem;
      line-height: 1.5;
    }

    .app-card li:before {
      content: "";
      position: absolute;
      left: 0;
      top: .22rem;
      width: 16px;
      height: 12px;
      background-repeat: no-repeat;
      background-size: 16px 12px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12' fill='none'%3E%3Cpath d='M1 6h11' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round'/%3E%3Cpath d='M8.5 1.75L13 6l-4.5 4.25' stroke='%230018dc' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    }

    @media (max-width: 1080px) {
      .app-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 900px) {
      .section-head {
        grid-template-columns: 1fr;
        gap: 18px;
      }

      .section-head h2 {
        max-width: none;
      }
    }

    @media (max-width: 680px) {
      .inner {
        width: min(var(--max), calc(100% - 28px));
      }

      .section {
        padding: 58px 0 62px;
      }

      .app-grid {
        grid-template-columns: 1fr;
      }

      .app-card {
        min-height: auto;
      }

      .section-head h2 {
        font-size: 2.35rem;
      }
    }

    .section-head-2 {
      display: grid !important;
      grid-template-columns: minmax(0, 1.05fr) minmax(320px, .95fr) !important;
      gap: 34px !important;
      align-items: start !important;
      margin-bottom: 30px !important;
      max-width: none !important;
    }

    .section-head>div:first-child {
      max-width: none !important;
      display: block !important;
    }

    .section-head>div:first-child {
      max-width: 640px;
    }

    .section-head .kicker {
      display: block !important;
      margin-bottom: 10px !important;
    }

    .kicker {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .09em;
      color: var(--accent-dark);
      font-weight: 850;
      margin-bottom: 10px;
    }

    .section-head h2 Specificity: (0, 1, 1) {
      max-width: 16ch !important;
      margin: 0 !important;
    }

    /* .section-head p {
                      flex: none !important;
                      max-width: 48ch !important;
                      margin: 0 !important;
                      justify-self: start !important;
                    }

                    .section-head p {
                      flex: 0 0 420px;
                      max-width: 48ch;
                      margin: 6px 0 0;
                      color: var(--muted);
                      font-size: 1.15rem;
                      line-height: 1.65;
                      font-weight: 500;
                    } */
    /* 
                  .section-head p {
                    max-width: 48ch;
                    margin: 6px 0 0;
                    color: var(--muted);
                    font-size: 1.15rem;
                    line-height: 1.65;
                    font-weight: 500;
                    opacity: 1;
                  } */

    .cta-band {
      display: grid !important;
      grid-template-columns: minmax(0, 1fr) auto !important;
      gap: 28px !important;
      align-items: end !important;
      padding-top: 6px !important;
    }

    .roi-band,
    .cta-band {
      background: transparent;
      color: var(--text);
      border: none;
      box-shadow: none;
      padding: 0;
    }

    .cta-band .btn-row Specificity: (0, 2, 0) {
      margin-top: 0 !important;
      justify-content: flex-end;
      align-items: flex-end;
    }

    .btn-secondary {
      background: #ffffff;
      color: var(--accent-dark);
      border: 1px solid #c8d6ea !important;
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

    .btn-primary {
      background: linear-gradient(135deg, var(--accent-dark), #2544ff);
      color: #ffffff;
      box-shadow: 0 12px 28px rgba(0, 24, 220, .14);
    }
  </style>
  <section class="pt-5 pb-5" style="border-bottom:none; padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
      <div class="section-head-2">
        <div class="kicker">Next step</div>
        <h2>Simplify your production system.</h2>
        <p>Evaluate how Fluidstream multiphase compression can reduce cost, eliminate equipment, and improve production
          performance across your operations.</p>
      </div>

      <div class="cta-band">
        <div>
          <h2>Evaluate whether Fluidstream can simplify your production system.</h2>
          <p>Built for engineers and decision-makers evaluating a technically credible, commercially stronger alternative
            to separation-first design.</p>
        </div>
        <div class="btn-row" style="margin-top:0">
          <a class="btn btn-secondary" href="/contact">Request Technical Review</a>
          <a class="btn btn-primary" href="/contact">Contact Engineering</a>
        </div>
      </div>
    </div>
  </section>
@endsection