@extends('layouts.app')

@section('content')

  <style>
    :root {
      --navy: #07183f;
      --blue: #0018dc;
      --cyan: #15d1ff;
      --text: #132544;
      --muted: #5c6b85;
      --line: #dbe5f3;
      --soft: #f4f8ff;
      --white: #ffffff;
      --shadow: 0 24px 64px rgba(7, 24, 63, .08);
      --radius: 30px;
      --max: 1340px;
    }

    * {
      box-sizing: border-box
    }

    a {
      color: inherit
    }

    .container {
      width: min(var(--max), calc(100% - 40px));
      margin: 0 auto;
    }


    .hero {
      padding: 54px 0 34px
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.02fr .98fr;
      gap: 34px;
      align-items: center;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 9px 13px;
      border-radius: 999px;
      background: #eef5ff;
      color: var(--blue);
      border: 1px solid #d8e6ff;
      font-size: .78rem;
      font-weight: 800;
      letter-spacing: .09em;
      text-transform: uppercase;
    }

    h1 {
      margin: 18px 0 14px;
      font-size: clamp(2.8rem, 5vw, 5.2rem);
      line-height: .95;
      letter-spacing: -.055em;
      color: var(--navy);
      max-width: 860px;
    }

    .hero h2 {
      margin: 0 0 14px;
      font-size: clamp(1.25rem, 2vw, 1.7rem);
      color: var(--navy);
      font-weight: 700;
    }

    .hero p {
      margin: 0 0 14px;
      color: #334155;
      font-size: 1.07rem;
      max-width: 760px;
    }

    .actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      margin-top: 22px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 18px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 800;
      transition: .2s ease;
    }

    .btn.primary {
      background: linear-gradient(135deg, var(--blue), #1933ff);
      color: #fff;
      box-shadow: 0 16px 36px rgba(0, 24, 220, .22)
    }

    .btn.secondary {
      background: #fff;
      color: var(--navy);
      border: 1px solid var(--line)
    }

    .btn:hover {
      transform: translateY(-1px)
    }

    .hero-metrics {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 14px;
      margin-top: 26px;
    }

    .metric {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 22px;
      padding: 18px;
      box-shadow: 0 10px 28px rgba(7, 24, 63, .05);
    }

    .metric .value {
      font-size: 1.28rem;
      font-weight: 800;
      color: var(--blue);
      margin-bottom: 4px
    }

    .metric .label {
      font-size: .93rem;
      color: #52617a
    }

    .hero-visual {
      min-height: 520px;
      position: relative;
      overflow: hidden;
      border-radius: 34px;
      border: 1px solid var(--line);
      box-shadow: var(--shadow);
      background: radial-gradient(circle at top right, rgb(255 255 255), transparent 34%), linear-gradient(155deg, #ffffff 0%, #ffffff 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 28px;
    }

    .hero-image {
      max-width: 100%;
      max-height: 470px;
      object-fit: contain;
      border-radius: 22px;
      z-index: 2;
      position: relative
    }

    .float {
      position: absolute;
      width: 220px;
      background: rgba(255, 255, 255, .95);
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 14px 16px;
      box-shadow: 0 16px 36px rgba(7, 24, 63, .10);
      z-index: 3;
    }

    .float h4 {
      margin: 0 0 6px;
      color: var(--navy);
      font-size: .96rem
    }

    .float p {
      margin: 0;
      font-size: .84rem;
      color: #56657d;
      line-height: 1.45
    }

    .float.one {
      top: 24px;
      right: 24px
    }

    .float.two {
      bottom: 24px;
      left: 24px
    }

    .section {
      padding: 22px 0
    }

    .card {
      background: var(--white);
      border: 1px solid var(--line);
      border-radius: 32px;
      box-shadow: var(--shadow);
      padding: 34px;
    }

    .head {
      display: flex;
      justify-content: space-between;
      align-items: end;
      gap: 18px;
      margin-bottom: 22px
    }

    .head h2 {
      margin: 0;
      font-size: clamp(1.7rem, 2.6vw, 2.55rem);
      line-height: 1.03;
      letter-spacing: -.035em;
      color: var(--navy);
    }

    .head p {
      margin: 10px 0 0;
      color: var(--muted);
      max-width: 900px
    }

    .grid-2 {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 18px
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 18px
    }

    .tile {
      background: linear-gradient(180deg, #fff 0%, #f9fcff 100%);
      border: 1px solid var(--line);
      border-radius: 24px;
      padding: 22px;
    }

    .num {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 34px;
      height: 34px;
      padding: 0 10px;
      border-radius: 999px;
      background: #edf4ff;
      color: var(--blue);
      font-weight: 800;
      margin-bottom: 12px;
    }

    .tile h3 {
      margin: 0 0 10px;
      font-size: 1.08rem;
      color: var(--navy)
    }

    .tile p {
      margin: 0;
      color: #4d5d77
    }

    .band {
      display: grid;
      grid-template-columns: .95fr 1.05fr;
      gap: 20px;
      align-items: stretch
    }

    .panel-dark {
      border-radius: 28px;
      padding: 28px;
      color: #fff;
      position: relative;
      overflow: hidden;
      background: linear-gradient(180deg, #1029ea 0%, #1029ea 100%);
    }

    .panel-dark:after {
      content: "";
      position: absolute;
      right: -58px;
      bottom: -72px;
      width: 240px;
      height: 240px;
      border-radius: 50%;
      background: rgba(21, 209, 255, .14);
    }

    .panel-dark h3 {
      margin: 0 0 12px;
      font-size: 1.35rem
    }

    .panel-dark p {
      margin: 0 0 14px;
      color: rgba(255, 255, 255, .88)
    }

    .link-pill {
      display: inline-block;
      text-decoration: none;
      color: #fff;
      font-weight: 800;
      padding: 10px 14px;
      border-radius: 999px;
      border: 1px solid rgba(255, 255, 255, .22);
      background: rgba(255, 255, 255, .08);
    }

    .spec-wrap {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 24px;
      background: #fff;
      margin-top: 20px
    }

    table {
      width: 100%;
      min-width: 1240px;
      border-collapse: separate;
      border-spacing: 0;
      font-size: .94rem
    }

    th,
    td {
      padding: 14px 14px;
      text-align: center;
      vertical-align: middle;
      border-bottom: 1px solid #e8eef8;
      border-right: 1px solid #edf2fa
    }

    th {
      background: linear-gradient(180deg, #14a7cd, #159ad6);
      color: #fff;
      font-weight: 700;
      position: sticky;
      top: 0;
      z-index: 1
    }

    td.left {
      text-align: left
    }

    td.spec-col {
      min-width: 280px;
      font-weight: 700;
      color: var(--navy);
      background: #fbfdff
    }

    td.unit-col {
      min-width: 190px;
      color: #566783;
      background: #fbfdff
    }

    td.check {
      color: #0d9449;
      font-weight: 800;
      font-size: 1.12rem
    }

    .notes {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 18px;
      margin-top: 18px
    }

    .note-box,
    .cta-box {
      border: 1px solid var(--line);
      border-radius: 24px;
      padding: 22px;
      background: linear-gradient(180deg, #fff 0%, #f9fbff 100%);
    }

    .note-box h3,
    .cta-box h3 {
      margin: 0 0 10px;
      color: var(--navy)
    }

    .note-box ul {
      margin: 0;
      padding-left: 20px
    }

    .note-box li {
      margin-bottom: 10px;
      color: #4f5e78
    }

    .cta-box {
      background: linear-gradient(135deg, rgba(0, 24, 220, .98), rgba(21, 209, 255, .95));
      color: #fff;
      border: none
    }

    .cta-box p {
      margin: 0 0 16px;
      color: rgba(255, 255, 255, .90)
    }

    .cta-box .btn.primary {
      background: #fff;
      color: var(--blue);
      box-shadow: none
    }

    .footer {
      padding: 12px 0 48px;
      text-align: center;
      color: #72829b;
      font-size: .9rem
    }

    @media (max-width:1100px) {

      .hero-grid,
      .band,
      .notes {
        grid-template-columns: 1fr
      }

      .grid-3,
      .grid-2,
      .hero-metrics {
        grid-template-columns: repeat(2, minmax(0, 1fr))
      }

      .hero-visual {
        min-height: 390px
      }
    }

    @media (max-width:760px) {
      .container {
        width: min(var(--max), calc(100% - 22px))
      }

      .nav {
        display: none
      }

      .card {
        padding: 22px;
        border-radius: 24px
      }

      .grid-3,
      .grid-2,
      .hero-metrics {
        grid-template-columns: 1fr
      }

      .hero {
        padding-top: 28px
      }

      .hero-visual {
        min-height: 260px;
        border-radius: 24px
      }

      .float {
        position: static;
        width: auto;
        margin-top: 12px
      }

      h1 {
        font-size: 2.4rem
      }
    }
  </style>
  <style>
    :root {
      --fs-dark: #0018dc;
      --fs-light: #15d1ff;
      --ink: #0f172a;
      --muted: #475569;
      --line: #dbe5f0;
      --white: #ffffff;
    }

    * {
      box-sizing: border-box
    }

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(180deg, #f8fbff 0%, #edf7ff 100%);
      color: var(--ink);
    }

    .wrap {
      max-width: 760px;
      margin: 0 auto;
    }

    .case-box {
      background: var(--white);
      border: 1px solid var(--line);
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 18px 45px rgba(0, 24, 220, .10);
    }

    .topbar {
      height: 8px;
      background: linear-gradient(90deg, var(--fs-dark), var(--fs-light));
    }

    .content {
      padding: 28px;
    }

    .eyebrow {
      display: inline-block;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--fs-dark);
      background: #eaf0ff;
      border-radius: 999px;
      padding: 8px 12px;
      margin-bottom: 14px;
    }

    h1 {
      margin: 0 0 10px 0;
      font-size: 30px;
      line-height: 1.15;
      letter-spacing: -0.02em;
    }

    .sub {
      margin: 0 0 22px 0;
      color: var(--muted);
      font-size: 16px;
      line-height: 1.6;
      max-width: 640px;
    }

    .results {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      margin: 0 0 22px 0;
    }

    .result {
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 18px 16px;
      background: linear-gradient(180deg, #ffffff 0%, #f8fcff 100%);
    }

    .result .label {
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: .10em;
      color: var(--muted);
      margin-bottom: 8px;
      font-weight: 700;
    }

    .result .value {
      font-size: 28px;
      line-height: 1;
      font-weight: 800;
      color: var(--fs-dark);
      margin-bottom: 6px;
    }

    .result .desc {
      font-size: 14px;
      color: var(--muted);
      line-height: 1.45;
    }

    .quote {
      border-left: 5px solid var(--fs-light);
      background: #f5fcff;
      padding: 18px 18px 18px 20px;
      border-radius: 0 16px 16px 0;
      margin: 0 0 22px 0;
    }

    .quote p {
      margin: 0 0 10px 0;
      font-size: 18px;
      line-height: 1.65;
      color: #0b1b45;
    }

    .quote .attrib {
      font-size: 13px;
      color: var(--muted);
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .08em;
    }

    .footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
      padding-top: 4px;
    }

    .footer-note {
      color: var(--muted);
      font-size: 14px;
      line-height: 1.5;
      max-width: 480px;
    }

    .btn {
      display: inline-block;
      text-decoration: none;
      background: linear-gradient(90deg, var(--fs-dark), #0d57ea);
      color: #fff;
      padding: 14px 20px;
      border-radius: 999px;
      font-weight: 700;
      font-size: 15px;
      box-shadow: 0 10px 22px rgba(0, 24, 220, .18);
      white-space: nowrap;
    }

    .btn:hover {
      filter: brightness(1.03);
    }

    @media (max-width:700px) {
      .content {
        padding: 22px
      }

      h1 {
        font-size: 24px
      }

      .results {
        grid-template-columns: 1fr
      }

      .result .value {
        font-size: 24px
      }

      .quote p {
        font-size: 16px
      }
    }
  </style>
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <div class="eyebrow">BoosterCommander™ • Multiphase booster and transfer pump</div>
        <h1>Multiphase boosting for gas streams with liquids present.</h1>
        <h2>Lower backpressure. Move untreated multiphase flow. Stabilize production systems.</h2>
        <p>BoosterCommander is designed for systems where gas, oil, water, and condensate are produced together and need
          to be boosted and transferred as one multiphase stream.</p>
        <p>It is positioned for the real gathering and transfer challenge: reducing backpressure, helping production keep
          moving, and avoiding the cost and complexity created when conventional gas-only equipment is forced into
          mixed-phase service.</p>

        <div class="actions">
          <a href="#specs" class="btn primary">View specifications</a>
          <a href="#technology" class="btn secondary">See technology benefits</a>
        </div>

        <div class="hero-metrics">
          <div class="metric">
            <div class="value">Lower backpressure</div>
            <div class="label">Support improved inflow and system performance</div>
          </div>
          <div class="metric">
            <div class="value">Move untreated flow</div>
            <div class="label">Boost gas and liquids together in one system</div>
          </div>
          <div class="metric">
            <div class="value">Reduce complexity</div>
            <div class="label">Support leaner surface facility strategies</div>
          </div>
          <div class="metric">
            <div class="value">Built for reality</div>
            <div class="label">Designed for mixed-phase, unstable field conditions</div>
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <img src="/img/2270 Rear View.JPG" alt="img">
        <div class="float one">
          <h4>True multiphase duty</h4>
          <p>Built for gas streams with liquids present rather than dry-gas assumptions.</p>
        </div>
        <div class="float two">
          <h4>Technology-backed</h4>
          <p>Supported by Fluidstream features like sealed gland protection, piston tracking, and autonomous control.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="challenge">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>The challenge: boosting production when gas and liquids move together.</h2>
            <p>In real production systems, gas rarely moves alone. Liquids, unstable flow, and growing backpressure create
              a surface-duty mismatch that conventional gas-only boosters were not designed to solve.</p>
          </div>
        </div>
        <div class="grid-3">
          <div class="tile">
            <div class="num">01</div>
            <h3>Backpressure limits production</h3>
            <p>As reservoir energy declines and gathering pressure rises, wells struggle to overcome downstream resistance
              and production performance falls away.</p>
          </div>
          <div class="tile">
            <div class="num">02</div>
            <h3>Mixed-phase flow complicates boosting</h3>
            <p>Gas, oil, water, and condensate move together, creating an operating duty that is difficult for
              conventional gas-only equipment to handle reliably.</p>
          </div>
          <div class="tile">
            <div class="num">03</div>
            <h3>Extra site equipment adds cost</h3>
            <p>Separators, scrubbers, tanks, flares, and added controls increase footprint, complexity, maintenance
              exposure, and total installed cost.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="solution">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>How BoosterCommander solves the multiphase gathering challenge.</h2>
            <p>BoosterCommander is framed as a multiphase booster and transfer solution: it boosts the untreated stream
              directly, lowers backpressure, and keeps gas and liquids moving together toward downstream handling or
              centralized processing.</p>
          </div>
        </div>
        <div class="grid-3">
          <div class="tile">
            <div class="num">01</div>
            <h3>Boost the full multiphase stream</h3>
            <p>Instead of forcing complete wellsite separation before useful work can be done, BoosterCommander is
              designed to work on the combined production stream.</p>
          </div>
          <div class="tile">
            <div class="num">02</div>
            <h3>Reduce wellhead and gathering pressure</h3>
            <p>Lower backpressure can improve inflow, help production stability, and support stronger upstream operating
              conditions.</p>
          </div>
          <div class="tile">
            <div class="num">03</div>
            <h3>Support centralized processing strategies</h3>
            <p>By moving untreated multiphase flow downstream, BoosterCommander supports field architectures that
              consolidate separation and treatment at central sites.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>Why this matters to production performance.</h2>
            <p>BoosterCommander should not be presented as only a piece of surface equipment. It should be shown as a
              production tool that helps improve the conditions the well and gathering system operate against.</p>
          </div>
        </div>
        <div class="grid-2">
          <div class="tile">
            <h3>Improved inflow potential</h3>
            <p>Lowering flowing wellhead and gathering pressure can improve production continuity and help low-pressure
              systems perform in a more favorable operating window.</p>
          </div>
          <div class="tile">
            <h3>Better artificial-lift conditions</h3>
            <p>Where artificial lift is already in use, lower backpressure can help create better intake and operating
              conditions upstream.</p>
          </div>
          <div class="tile">
            <h3>More stable surface behavior</h3>
            <p>Matching the equipment to the actual mixed-phase process reduces the operating mismatch that often drives
              instability and unnecessary support equipment.</p>
          </div>
          <div class="tile">
            <h3>Simpler field architecture</h3>
            <p>Moving more of the untreated stream downstream can support leaner pad layouts and reduce the amount of
              handling equipment installed at each site.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="technology">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>High-level Fluidstream technology benefits.</h2>
            <p>BoosterCommander is strengthened by the broader advantages of Fluidstream’s multiphase technology platform.
              This section keeps those benefits visible at a product level, while the dedicated Technology page can carry
              the deeper technical explanation.</p>
          </div>
        </div>

        <div class="band">
          <div class="panel-dark">
            <h3>Built on Fluidstream multiphase technology</h3>
            <p>Fluidstream’s platform is built around true multiphase performance: handling liquids inside the compression
              process, protecting the sealing system, and maintaining control through unstable and upset conditions.</p>
            <p>BoosterCommander benefits from those same design strengths, but the full feature-by-feature explanation
              should live on the Technology page.</p>
            <a href="#" class="link-pill">View technology page</a>
          </div>

          <div class="grid-2">
            <div class="tile">
              <h3>Liquid handling inside compression</h3>
              <p>Fluidstream technology is built to safely manage incompressible liquids within the compression chamber,
                which is fundamental to true multiphase service.</p>
            </div>
            <div class="tile">
              <h3>Sealed gland protection</h3>
              <p>High-level BoosterCommander messaging should reference the sealed gland architecture and electronic seal
                wear detection that support safer, more controlled multiphase operation.</p>
            </div>
            <div class="tile">
              <h3>Alignment and life extension</h3>
              <p>The platform is designed to maintain alignment in key stress and wear areas, supporting longer seal life
                and longer component life.</p>
            </div>
            <div class="tile">
              <h3>Piston tracking and smarter control</h3>
              <p>Fluidstream uses piston-location awareness as part of the control strategy, helping the system respond to
                slugs, solids buildup, ice risk, and other changing operating conditions.</p>
            </div>
            <div class="tile">
              <h3>Autonomous upset-condition response</h3>
              <p>High-level product messaging should capture that Fluidstream technology includes autonomous control logic
                designed to keep operating through multiphase and gas-only upset conditions with less operator
                intervention.</p>
            </div>
            <div class="tile">
              <h3>Field-ready flexibility</h3>
              <p>The technology platform also supports electric and gas-drive configurations, plus sealing approaches
                optimized for difficult services such as sour or sand-bearing applications.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>The Fluidstream advantage.</h2>
            <p>This is where the generic multiphase value case becomes a specific reason to choose BoosterCommander.</p>
          </div>
        </div>
        <div class="grid-2">
          <div class="tile">
            <h3>True multiphase boosting and transfer</h3>
            <p>BoosterCommander is positioned specifically for systems where liquids are part of the normal operating
              condition, not just something to remove before the equipment can work reliably.</p>
          </div>
          <div class="tile">
            <h3>Facility simplification potential</h3>
            <p>It supports system strategies that can reduce dependence on site-level separators, tanks, flares, and other
              supporting equipment in suitable applications.</p>
          </div>
          <div class="tile">
            <h3>Control confidence in unstable flow</h3>
            <p>Because the broader Fluidstream platform includes piston tracking and autonomous control logic,
              BoosterCommander can be positioned as a stronger fit for changing field conditions.</p>
          </div>
          <div class="tile">
            <h3>Built for hard-service environments</h3>
            <p>The listed product family supports features like H₂S handling, cold-weather startup, autonomous control,
              and remote interface capability across the model range.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="applications">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>Applications for BoosterCommander.</h2>
            <p>The applications section should map directly to the field problems this product is meant to solve,
              especially where gas definitely has liquids present.</p>
          </div>
        </div>
        <div class="grid-2">
          <div class="tile">
            <h3>Multiwell gathering systems</h3>
            <p>Boost and transfer the combined stream from multiple wells toward centralized separation and processing.
            </p>
          </div>
          <div class="tile">
            <h3>Liquid-loaded gas production</h3>
            <p>Support systems where gas production is accompanied by oil, water, or condensate and dry-gas assumptions do
              not hold.</p>
          </div>
          <div class="tile">
            <h3>Artificial-lift support</h3>
            <p>Useful where reducing backpressure can improve the operating conditions of upstream lift systems.</p>
          </div>
          <div class="tile">
            <h3>Low-pressure reservoirs</h3>
            <p>Applicable where declining reservoir pressure is no longer enough to overcome gathering-system resistance
              on its own.</p>
          </div>
          <div class="tile">
            <h3>Pad and cluster development</h3>
            <p>Support surface strategies focused on a reduced footprint and more centralized handling.</p>
          </div>
          <div class="tile">
            <h3>Unstable and slugging systems</h3>
            <p>Better aligned with pipelines and gathering lines that see intermittent or non-ideal multiphase behavior.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="case-box  container">
    <div class="topbar"></div>
    <div class="content">
      <div class="eyebrow">Case Study Snapshot</div>
      <h1>From virtually no production to more than C$1.5 million/year in incremental revenue</h1>
      <p class="sub">
        In Alberta, Canada, Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded wells that could no longer
        overcome rising pipeline pressure. The result was restored production, no added separation equipment, and
        dependable operation under highly variable multiphase conditions.
      </p>

      <div class="results">
        <div class="result">
          <div class="label">Gas Production</div>
          <div class="value">10e3 m³/d</div>
          <div class="desc">Combined gas production restored across both wells after installation.</div>
        </div>
        <div class="result">
          <div class="label">Condensate</div>
          <div class="value">5 m³/d</div>
          <div class="desc">Daily condensate production recovered without added separation infrastructure.</div>
        </div>
        <div class="result">
          <div class="label">Revenue Impact</div>
          <div class="value">C$1.5M+</div>
          <div class="desc">Estimated annual incremental revenue based on April 2026 commodity pricing.</div>
        </div>
      </div>

      <div class="quote">
        <p>“Fluidstream’s MultiphaseCommander didn’t just improve performance—it completely transformed two dead wells
          into revenue-generating assets. We went from zero production to over $1.5 million per year in incremental
          revenue, without adding any separation equipment or infrastructure.”</p>
        <div class="attrib">Production Engineer, Western Canadian Oil &amp; Gas Producer</div>
      </div>

      <div class="footer">
        <div class="footer-note">
          Read the full case study for the operating challenge, deployment details, runtime importance, variable-flow
          performance, and the broader pad-level opportunity identified by the producer.
        </div>
        <a class="btn" href="Fluidstream_Case_Study_Long_Form.docx">Read More</a>
      </div>
    </div>
  </section>

  <section class="section" id="specs">
    <div class="container">
      <div class="card">
        <div class="head">
          <div>
            <h2>Technical specifications.</h2>
            <p>Once the value case is clear, the detailed comparison table provides the engineering validation layer for
              the BoosterCommander family.</p>
          </div>
        </div>

        <div class="spec-wrap">
          <table>
            <thead>
              <tr>
                <th>Specification</th>
                <th>Units / Condition</th>
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
                <td class='left spec-col'>Max Gas Rate1,2 @ Inlet Pressure (e3m3/day) [mcf/day]</td>
                <td class='left unit-col'>5 psi [34 kPa]</td>
                <td class=''>3.0 [106]</td>
                <td class=''>1.8 [64]</td>
                <td class=''>—</td>
                <td class=''>3.1 [109]</td>
                <td class=''>5.7 [201]</td>
                <td class=''>10.7 [378]</td>
                <td class=''>10.1 [357]</td>
                <td class=''>10.3 [364]</td>
              </tr>
              <tr>
                <td class='left spec-col'>Max Liquids Rate (m3/d) [bbl/d]</td>
                <td class='left unit-col'></td>
                <td class=''>2,238 [14,077]</td>
                <td class=''>1,344 [8,454]</td>
                <td class=''>3160</td>
                <td class=''>2,345 [14,750]</td>
                <td class=''>4,200 [26,417]</td>
                <td class=''>8,000 [50,318]</td>
                <td class=''>7,500 [47,174]</td>
                <td class=''>8,000 [50,300]</td>
              </tr>
              <tr>
                <td class='left spec-col'>Max Pressure Differential2 (kPag) [psig]</td>
                <td class='left unit-col'></td>
                <td class=''>1034 [150]</td>
                <td class=''>1896 [275]</td>
                <td class=''>450</td>
                <td class=''>1896 [275]</td>
                <td class=''>1034 [150]</td>
                <td class=''>689 [100]</td>
                <td class=''>1896 [275]</td>
                <td class=''>1896 [275]</td>
              </tr>
              <tr>
                <td class='left spec-col'>Motor Size (HP)3</td>
                <td class='left unit-col'></td>
                <td class=''>50</td>
                <td class=''>50</td>
                <td class=''>100</td>
                <td class=''>100</td>
                <td class=''>100</td>
                <td class=''>100</td>
                <td class=''>150</td>
                <td class=''>150</td>
              </tr>
              <tr>
                <td class='left spec-col'>H2S Handling</td>
                <td class='left unit-col'></td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
              </tr>
              <tr>
                <td class='left spec-col'>3-Stage Cold Weather Startup</td>
                <td class='left unit-col'></td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
              </tr>
              <tr>
                <td class='left spec-col'>Autonomous Controller</td>
                <td class='left unit-col'></td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
              </tr>
              <tr>
                <td class='left spec-col'>Color Touchscreen &amp; Remote Control</td>
                <td class='left unit-col'></td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
                <td class='check'>✓</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="notes">
          <div class="note-box">
            <h3>Engineering notes</h3>
            <ul>
              <li>1 Flow conditions calculated at 15℃ [59℉] inlet pressure and with various components operating at 100%
                efficiency. Flow rates may vary based on inlet pressures, gas content, and other factors. Max gas rates
                will be reduced by amount of liquids in total fluid. Ask Fluidstream for max gas flow rates based on
                specific liquid rates and other varying conditions.</li>
              <li>2 Max gas rates and max pressure differentials can be increased by configuring additional unit(s) in
                parallel or in series.</li>
              <li>3 Higher horsepower units will yield much higher fluid flow rates at various pressure differentials.
                Please request pump curves to see flow rates at various pressure differentials.</li>
            </ul>
          </div>
          <div class="cta-box">
            <h3>Use the table for comparison. Use Fluidstream for final sizing.</h3>
            <p>Final configuration still depends on actual gas composition, liquid rate, inlet pressure, discharge
              requirements, and site-specific operating conditions.</p>
            <div class="actions">
              <a href="#" class="btn primary">Request technical evaluation</a>
              <a href="#" class="btn secondary"
                style="background:rgba(255,255,255,.12); color:#fff; border:1px solid rgba(255,255,255,.28);">Submit
                operating conditions</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection