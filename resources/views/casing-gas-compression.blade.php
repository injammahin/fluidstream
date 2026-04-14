@extends('layouts.app')

@section('content')
  <style>
    :root {
      --navy: #031b8c;
      --blue: #0018dc;
      --cyan: #15d1ff;
      --ink: #0d1730;
      --muted: #5d6b8a;
      --line: #dbe6ff;
      --bg: #f6faff;
      --white: #ffffff;
      --shadow: 0 30px 70px rgba(4, 20, 84, .14);
      --radius: 24px;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: Inter, Arial, Helvetica, sans-serif;
      color: var(--ink);
      background:
        radial-gradient(circle at top left, rgba(21, 209, 255, .14), transparent 28%),
        linear-gradient(180deg, #f9fcff 0%, #ffffff 28%, #f8fbff 100%);
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    img {
      max-width: 100%;
      display: block;
    }

    .container {
      width: min(1240px, calc(100% - 48px));
      margin: 0 auto;
    }

    .section {
      padding: 96px 0;
    }

    h1,
    h2,
    h3,
    p {
      margin: 0;
    }

    h1 {
      font-size: clamp(44px, 7vw, 76px);
      line-height: .98;
      letter-spacing: -.045em;
    }

    h2 {
      font-size: clamp(32px, 4vw, 54px);
      line-height: 1.02;
      letter-spacing: -.04em;
    }

    h3 {
      font-size: 22px;
      line-height: 1.1;
      letter-spacing: -.02em;
    }

    p {
      font-size: 18px;
      line-height: 1.72;
      color: var(--muted);
    }

    header {
      position: sticky;
      top: 0;
      z-index: 40;
      backdrop-filter: blur(18px);
      background: rgba(255, 255, 255, .76);
      border-bottom: 1px solid rgba(3, 27, 140, .06);
    }

    .nav {
      height: 82px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 14px;
      font-weight: 900;
      font-size: 21px;
      letter-spacing: -.03em;
    }

    .brand-mark {
      width: 42px;
      height: 42px;
      border-radius: 14px;
      background: linear-gradient(145deg, var(--blue), var(--cyan));
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, .45), 0 18px 34px rgba(0, 24, 220, .24);
    }

    .nav-links {
      display: flex;
      gap: 28px;
      color: #30405f;
      font-weight: 600;
      font-size: 15px;
    }

    .nav-cta {
      padding: 14px 18px;
      border-radius: 999px;
      font-weight: 800;
      color: white;
      background: linear-gradient(135deg, var(--blue), #0946ff);
      box-shadow: 0 18px 30px rgba(0, 24, 220, .22);
    }

    .hero {
      padding: 58px 0 70px;
      overflow: hidden;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.08fr .92fr;
      gap: 44px;
      align-items: center;
    }

    .hero-copy p.lead {
      margin-top: 24px;
      max-width: 760px;
      font-size: 21px;
      color: #445271;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin-top: 34px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 16px 24px;
      border-radius: 999px;
      font-weight: 800;
      font-size: 15px;
      transition: .25s ease;
    }

    .btn-primary {
      color: white;
      background: linear-gradient(135deg, var(--blue), #0a47ff);
      box-shadow: 0 20px 35px rgba(0, 24, 220, .24);
    }

    .btn-secondary {
      color: var(--ink);
      background: white;
      border: 1px solid var(--line);
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .hero-points {
      margin-top: 28px;
      display: grid;
      gap: 12px;
    }

    .hero-point {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: 15px;
      color: #3b4863;
      font-weight: 650;
    }

    .hero-point i {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      flex: 0 0 20px;
      background: linear-gradient(180deg, rgba(21, 209, 255, .22), rgba(0, 24, 220, .06));
      border: 1px solid rgba(0, 24, 220, .08);
      position: relative;
      margin-top: 2px;
    }

    .hero-point i::after {
      content: "";
      position: absolute;
      inset: 5px;
      border-radius: 50%;
      background: var(--blue);
    }

    .hero-visual {
      position: relative;
      min-height: 590px;
    }

    .glow {
      position: absolute;
      inset: auto auto 6% -2%;
      width: 74%;
      aspect-ratio: 1/1;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(21, 209, 255, .42) 0%, rgba(21, 209, 255, .18) 28%, rgba(21, 209, 255, 0) 72%);
      filter: blur(12px);
    }

    .visual-card {
      position: absolute;
      inset: 34px 0 0 8%;
      background: linear-gradient(180deg, rgba(255, 255, 255, .95), rgba(244, 249, 255, .92));
      border: 1px solid rgba(3, 27, 140, .08);
      border-radius: 34px;
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .visual-card::before {
      content: "";
      position: absolute;
      inset: 0;
      pointer-events: none;
      background: linear-gradient(180deg, rgba(255, 255, 255, .12), rgba(255, 255, 255, 0) 36%);
    }

    .visual-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center center;
    }

    .stat-float {
      position: absolute;
      left: -18px;
      bottom: 24px;
      width: min(340px, 78%);
      padding: 22px 22px 20px;
      border-radius: 24px;
      background: rgba(255, 255, 255, .93);
      border: 1px solid rgba(3, 27, 140, .08);
      box-shadow: var(--shadow);
    }

    .stat-float strong {
      display: block;
      font-size: 26px;
      color: var(--blue);
      letter-spacing: -.05em;
    }

    .stat-float span {
      display: block;
      font-size: 14px;
      color: #53637f;
      line-height: 1.45;
      margin-top: 8px;
    }

    .badge-float {
      position: absolute;
      right: -12px;
      top: 14px;
      padding: 16px 18px;
      width: 240px;
      background: #0f26de;
      color: white;
      border-radius: 22px;
      box-shadow: 0 20px 35px rgba(3, 27, 140, .35);
    }

    .badge-float b {
      display: block;
      font-size: 13px;
      letter-spacing: .16em;
      opacity: .72;
      text-transform: uppercase;
    }

    .badge-float strong {
      display: block;
      margin-top: 10px;
      font-size: 22px;
      line-height: 1.15;
      letter-spacing: -.03em;
    }

    .band {
      margin-top: 26px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }

    .band-card {
      background: white;
      border: 1px solid var(--line);
      border-radius: 22px;
      padding: 18px 20px;
      box-shadow: 0 12px 24px rgba(17, 39, 100, .06);
    }

    .band-card .k {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .14em;
      color: #6f7f9a;
      font-weight: 800;
    }

    .band-card .v {
      display: block;
      margin-top: 8px;
      font-size: 28px;
      color: var(--blue);
      font-weight: 900;
      letter-spacing: -.04em;
    }

    .band-card .s {
      display: block;
      margin-top: 6px;
      font-size: 14px;
      color: #5d6b8a;
    }

    .panel {
      background: white;
      border: 1px solid rgba(3, 27, 140, .08);
      border-radius: 32px;
      box-shadow: var(--shadow);
    }

    .panel-pad {
      padding: 38px;
    }

    .two-col {
      display: grid;
      grid-template-columns: 1.02fr .98fr;
      gap: 30px;
      align-items: stretch;
    }

    .stack {
      display: grid;
      gap: 18px;
    }

    .tile {
      background: linear-gradient(180deg, #ffffff, #f9fbff);
      border: 1px solid rgba(3, 27, 140, .08);
      border-radius: 24px;
      padding: 26px;
      box-shadow: 0 14px 28px rgba(17, 39, 100, .05);
    }

    .tile p {
      margin-top: 10px;
      font-size: 16px;
    }

    .checklist {
      display: grid;
      gap: 14px;
      margin-top: 22px;
    }

    .check {
      display: grid;
      grid-template-columns: 24px 1fr;
      gap: 12px;
      align-items: start;
      color: #374764;
      font-weight: 650;
    }

    .check i {
      width: 24px;
      height: 24px;
      border-radius: 8px;
      background: linear-gradient(180deg, rgba(21, 209, 255, .22), rgba(0, 24, 220, .06));
      border: 1px solid rgba(0, 24, 220, .08);
      position: relative;
      display: block;
    }

    .check i::after {
      content: "";
      position: absolute;
      left: 7px;
      top: 4px;
      width: 7px;
      height: 11px;
      border-right: 2px solid var(--blue);
      border-bottom: 2px solid var(--blue);
      transform: rotate(40deg);
    }

    .dark-block {
      position: relative;
      background: radial-gradient(circle at 85% 20%, rgba(21, 209, 255, .18), transparent 24%), linear-gradient(135deg, #1029ea, #1029ea 58%, #1029ea 100%);
      color: white;
      border-radius: 36px;
      overflow: hidden;
      box-shadow: 0 34px 80px rgba(4, 20, 84, .25);
    }

    .dark-block .panel-pad {
      padding: 46px;
    }

    .dark-block p {
      color: rgba(255, 255, 255, .78);
    }

    .dark-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-top: 28px;
    }

    .dark-card {
      padding: 22px;
      border-radius: 24px;
      background: rgba(255, 255, 255, .08);
      border: 1px solid rgba(255, 255, 255, .14);
    }

    .dark-card h3 {
      font-size: 20px;
    }

    .dark-card p {
      font-size: 15px;
      margin-top: 8px;
    }

    .compare {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-top: 28px;
    }

    .compare-card {
      border-radius: 24px;
      padding: 26px;
      min-height: 100%;
    }

    .compare-card.left {
      background: linear-gradient(180deg, #fff8f8, #ffffff);
      border: 1px solid #ffd9dc;
    }

    .compare-card.right {
      background: linear-gradient(180deg, #f5fdff, #ffffff);
      border: 1px solid #cbecff;
    }

    .compare-card ul {
      margin: 18px 0 0;
      padding: 0;
      list-style: none;
      display: grid;
      gap: 12px;
    }

    .compare-card li {
      position: relative;
      padding-left: 28px;
      color: #465674;
      line-height: 1.55;
      font-weight: 600;
    }

    .compare-card li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 8px;
      width: 14px;
      height: 14px;
      border-radius: 50%;
    }

    .compare-card.left li::before {
      background: #ff5c6c;
      box-shadow: 0 0 0 5px rgba(255, 92, 108, .12);
    }

    .compare-card.right li::before {
      background: var(--cyan);
      box-shadow: 0 0 0 5px rgba(21, 209, 255, .12);
    }

    .flow {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 14px;
      margin-top: 28px;
    }

    .flow-step {
      background: white;
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 16px 18px;
      font-weight: 800;
      color: #29405b;
      box-shadow: 0 12px 24px rgba(17, 39, 100, .05);
    }

    .flow-arrow {
      font-size: 24px;
      color: var(--blue);
      font-weight: 900;
    }

    .spec-wrap {
      margin-top: 28px;
      overflow: auto;
      border: 1px solid rgba(3, 27, 140, .08);
      border-radius: 26px;
      box-shadow: 0 24px 50px rgba(17, 39, 100, .08);
      background: white;
    }

    table {
      width: 100%;
      min-width: 1150px;
      border-collapse: separate;
      border-spacing: 0;
    }

    thead th {
      position: sticky;
      top: 0;
      z-index: 2;
      background: linear-gradient(180deg, #14a7cd, #159ad6);
      color: white;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .12em;
      padding: 18px 14px;
      text-align: left;
    }

    tbody td {
      border-top: 1px solid #e6edff;
      padding: 16px 14px;
      vertical-align: top;
      font-size: 15px;
      color: #30405f;
    }

    tbody tr:nth-child(even) td {
      background: #fbfdff;
    }

    tbody tr:hover td {
      background: #f4f9ff;
    }

    td strong {
      display: block;
      color: var(--ink);
      font-size: 15px;
    }

    td .muted {
      display: block;
      color: #7988a4;
      font-size: 12px;
      margin-top: 4px;
    }

    .note {
      margin-top: 18px;
      font-size: 14px;
      color: #60708f;
      line-height: 1.7;
    }

    .quote {
      padding: 34px;
      border-radius: 30px;
      background: linear-gradient(180deg, #ffffff, #f8fbff);
      border: 1px solid rgba(3, 27, 140, .08);
      box-shadow: var(--shadow);
    }

    .quote-mark {
      font-size: 64px;
      line-height: .65;
      color: rgba(0, 24, 220, .16);
      font-weight: 900;
    }

    .quote p {
      margin-top: 10px;
      color: #374764;
      font-size: 20px;
      line-height: 1.7;
    }

    .quote small {
      display: block;
      margin-top: 18px;
      color: #6d7d98;
      font-weight: 700;
      letter-spacing: .04em;
      text-transform: uppercase;
    }

    .footer {
      padding: 34px 0 90px;
    }

    .footer-box {
      background:
        radial-gradient(circle at 15% 10%, rgba(21, 209, 255, .18), transparent 30%),
        linear-gradient(135deg, #05125c, #061970 54%, #0b2ab3 100%);
      border-radius: 36px;
      color: white;
      padding: 50px;
      box-shadow: 0 34px 80px rgba(4, 20, 84, .28);
    }

    .footer-box p {
      color: rgba(255, 255, 255, .78);
      max-width: 760px;
      margin-top: 14px;
    }

    .footer-actions {
      margin-top: 26px;
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
    }

    .footer .btn-secondary {
      background: rgba(255, 255, 255, .12);
      color: white;
      border-color: rgba(255, 255, 255, .18);
    }

    .spacer-18 {
      height: 18px;
    }

    .spacer-24 {
      height: 24px;
    }

    .spacer-30 {
      height: 30px;
    }

    @media (max-width: 1100px) {

      .hero-grid,
      .two-col,
      .dark-grid,
      .compare {
        grid-template-columns: 1fr;
      }

      .hero-visual {
        min-height: 480px;
        order: -1;
      }

      .visual-card {
        inset: 30px 0 0 0;
      }

      .stat-float {
        left: 18px;
        bottom: 16px;
      }

      .badge-float {
        right: 18px;
        top: 18px;
      }

      .band {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 720px) {
      .container {
        width: min(100% - 24px, 1240px);
      }

      .nav {
        height: 72px;
      }

      .nav-links {
        display: none;
      }

      .hero {
        padding-top: 26px;
      }

      .section {
        padding: 68px 0;
      }

      .panel-pad,
      .dark-block .panel-pad,
      .footer-box {
        padding: 26px;
      }

      .band {
        grid-template-columns: 1fr;
      }

      .hero-actions,
      .footer-actions {
        flex-direction: column;
        align-items: stretch;
      }

      .btn {
        width: 100%;
      }

      p,
      .hero-copy p.lead {
        font-size: 17px;
      }
    }
  </style>
  <main>
    <section class="hero">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="section-label">Casing gas compression</span>
          <div class="spacer-24"></div>
          <h1
            class="max-w-3xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-dark sm:text-5xl md:text-6xl lg:text-[54px]">
            Casing gas isn’t clean gas.<br>Stop compressing it like it is.</h1>
          <p class="lead">Fluidstream CompressionCommander systems are built for the real casing gas stream operators
            actually see in the field: variable gas quality, liquid carryover, slugs, H₂S exposure, and unstable operating
            conditions that conventional gas-only compressors were never designed to survive.</p>
          <div class="hero-actions">
            <a class="btn btn-primary" href="#cta">Request application review</a>
            <a class="btn btn-secondary" href="#specs">View specifications</a>
          </div>
          <div class="hero-points">
            <div class="hero-point"><i></i><span>Designed to operate without upstream scrubbers being the only line of
                defense.</span></div>
            <div class="hero-point"><i></i><span>Handles the upset conditions that cause trips, downtime, and compressor
                damage in conventional casing gas systems.</span></div>
            <div class="hero-point"><i></i><span>Autonomous controls mitigate risk when liquid slugs or other harmful
                operating conditions appear.</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="glow"></div>
          <div class="visual-card">
            <img class="visual-img" src="/img/casing-gas-image-01.jpg"
              alt="Fluidstream CompressionCommander casing gas compressor unit">
          </div>
          <div class="badge-float">
            <b>Core advantage</b>
            <strong>Built for multiphase reality, not ideal gas assumptions.</strong>
          </div>
          <div class="stat-float">
            <strong>Up to 1,197 MCFD</strong>
            <span>From the uploaded CompressionCommander specification sheet, the product family spans 15 to 150 HP and
              reaches up to 275 psig pressure differential depending on configuration.</span>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="band">
          <div class="band-card"><span class="k">Flow range</span><span class="v">35–1,197</span><span class="s">MCFD
              across the model family</span></div>
          <div class="band-card"><span class="k">Pressure differential</span><span class="v">Up to 275</span><span
              class="s">psig depending on package</span></div>
          <div class="band-card"><span class="k">Controls</span><span class="v">Autonomous</span><span class="s">Remote
              control + touchscreen standard</span></div>
          <div class="band-card"><span class="k">Field readiness</span><span class="v">H₂S + cold weather</span><span
              class="s">Across the listed configurations</span></div>
        </div>
      </div>
    </section>

    <section id="why" class="section">
      <div class="container">
        <span class="section-label">Why multiphase matters</span>
        <div class="spacer-24"></div>
        <div class="panel panel-pad">
          <div class="two-col">
            <div>
              <h2>Casing gas is inherently multiphase.</h2>
              <div class="spacer-24"></div>
              <p>That is the core truth your webpage needs to teach. Casing gas is often sold and specified as though it
                were a dry gas service, but field conditions are rarely that clean. Condensate, produced water,
                intermittent slugs, contaminants, and changing operating conditions are exactly what make conventional
                casing gas compressors unreliable.</p>
              <div class="checklist">
                <div class="check"><i></i><span>Scrubbers and separators reduce liquid carryover, but they do not
                    guarantee a perfectly dry gas stream in the real world.</span></div>
                <div class="check"><i></i><span>Slug events and unstable operating conditions still reach the compressor
                    and create the conditions that cause damage.</span></div>
                <div class="check"><i></i><span>If the machine is only designed for gas-only assumptions, the operator
                    ends up buying downtime, intervention, and maintenance risk.</span></div>
              </div>
            </div>
            <div class="stack">
              <div class="tile">
                <h3>What most systems assume</h3>
                <p>Clean gas. Stable flow. Perfect separation. No meaningful liquid carryover. Minimal upset conditions.
                </p>
              </div>
              <div class="tile">
                <h3>What casing gas actually looks like</h3>
                <p>Variable gas quality, intermittent liquids, pressure swings, slug events, corrosive service, remote
                  operation, and the need for high uptime with low intervention.</p>
              </div>
              <div class="tile">
                <h3>What that means commercially</h3>
                <p>Multiphase capability is not a nice-to-have. It is the reason a casing gas recovery system will either
                  keep running or become another maintenance burden.</p>
              </div>
            </div>
          </div>
          <div class="flow">
            <div class="flow-step">Casing gas stream</div>
            <div class="flow-arrow">→</div>
            <div class="flow-step">Liquids + slugs + variability</div>
            <div class="flow-arrow">→</div>
            <div class="flow-step">Conventional failures</div>
            <div class="flow-arrow">→</div>
            <div class="flow-step">Fluidstream multiphase handling</div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" style="padding-top:0">
      <div class="container">
        <span class="section-label">Conventional vs Fluidstream</span>
        <div class="spacer-24"></div>
        <div class="compare">
          <div class="compare-card left">
            <h3>Conventional casing gas approach</h3>
            <ul>
              <li>Relies on scrubbers and separation equipment to protect a gas-only compressor.</li>
              <li>Still remains vulnerable when liquids break through or slug conditions develop.</li>
              <li>Creates more equipment, more footprint, more operator attention, and more failure points.</li>
              <li>Turns casing gas recovery into a constant reliability problem instead of a simple recovery solution.
              </li>
            </ul>
          </div>
          <div class="compare-card right">
            <h3>Fluidstream multiphase approach</h3>
            <ul>
              <li>Built around the idea that casing gas streams are imperfect and often multiphase.</li>
              <li>Designed to keep operating through the upset conditions that shut down conventional systems.</li>
              <li>Reduces dependence on separation hardware as the only protection strategy.</li>
              <li>Gives operators a more robust, lower-intervention path to continuous recovery.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="difference" class="section">
      <div class="container">
        <span class="section-label">The Fluidstream difference</span>
        <div class="spacer-24"></div>
        <div class="panel panel-pad">
          <div class="two-col">
            <div>
              <h2>Designed for the flow you actually have.</h2>
              <div class="spacer-18"></div>
              <p>Fluidstream should not be positioned as just another casing gas compressor. It should be positioned as a
                casing gas solution built around multiphase behavior. That distinction matters because it explains why the
                system can create value where conventional designs struggle.</p>
              <div class="checklist">
                <div class="check"><i></i><span>Handles gas service in applications where liquids, slugs, and unstable
                    operating conditions are part of the real envelope.</span></div>
                <div class="check"><i></i><span>Sealed architecture supports corrosive and H₂S service while minimizing
                    exposure risk.</span></div>
                <div class="check"><i></i><span>Sand-conscious sealing philosophy improves survivability in harsher field
                    environments.</span></div>
                <div class="check"><i></i><span>Autonomous controls support extended operation without constant operator
                    intervention.</span></div>
              </div>
            </div>
            <div class="stack">
              <div class="tile">
                <h3>No piston tracking claim. Strong protection story.</h3>
                <p>Fluidstream does <strong>not</strong> need to claim piston tracking. The stronger and more defensible
                  message is that the system detects <em>harmful operating conditions</em> associated with liquids or
                  slugs and automatically mitigates risk before those conditions turn into equipment damage.</p>
              </div>
              <div class="tile">
                <h3>Control strategy operators will trust</h3>
                <p>Rather than claiming perfect knowledge of liquid presence inside the compressor, Fluidstream monitors
                  system behavior and responds to the conditions that indicate potential damage. That is credible,
                  field-aligned, and commercially strong.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="spacer-30"></div>

        <div class="dark-block">
          <div class="panel-pad">
            <span class="section-label"
              style="background:rgba(255,255,255,.10); color:white; border-color:rgba(255,255,255,.14)">Intelligent
              protection system</span>
            <div class="spacer-24"></div>
            <h2>Detects risk conditions. Responds automatically. Protects continuously.</h2>
            <div class="spacer-18"></div>
            <p>This is the right technical story for your casing gas page. Fluidstream systems do not need to promise
              direct liquid detection. Instead, they monitor operating behavior and identify the conditions that suggest
              liquids, slugs, or other upset events are creating damage risk. The controls then adjust operation to
              protect components and preserve stability.</p>
            <div class="dark-grid">
              <div class="dark-card">
                <h3>What it detects</h3>
                <p>Pressure behavior, dynamic system response, load changes, and other operating patterns that indicate
                  potential damage conditions associated with liquid carryover or slug events.</p>
              </div>
              <div class="dark-card">
                <h3>What it does</h3>
                <p>Automatically modifies operation to mitigate risk, reduce mechanical stress, and keep the system in a
                  safer operating window without relying on piston tracking.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="specs" class="section">
      <div class="container">
        <span class="section-label">Specifications</span>
        <div class="spacer-24"></div>
        <div class="panel panel-pad">
          <div class="two-col">
            <div>
              <h2>CompressionCommander model range for casing gas applications.</h2>
              <div class="spacer-18"></div>
              <p>The uploaded specification sheet gives you a strong technical credibility section. Use it to show that
                Fluidstream is not a one-size-fits-all product, but a family of casing gas solutions that can be matched
                to different inlet pressures, gas rates, and field constraints.</p>
            </div>
            <div class="stack">
              <div class="tile">
                <h3>Quick highlights</h3>
                <p>15 to 150 HP model range, up to 275 psig pressure differential, H₂S handling, 3-stage cold weather
                  startup, autonomous controller, and color touchscreen with remote control across the listed
                  configurations.</p>
              </div>
            </div>
          </div>

          <div class="spec-wrap">
            <table>
              <thead>
                <tr>
                  <th>Model</th>
                  <th>Flow @ 5 psi</th>
                  <th>Flow @ 10 psi</th>
                  <th>Flow @ 20 psi</th>
                  <th>Flow @ 30 psi</th>
                  <th>Flow @ 50 psi</th>
                  <th>Max ΔP</th>
                  <th>Motor HP</th>
                  <th>H₂S</th>
                  <th>Cold weather</th>
                  <th>Autonomous</th>
                  <th>Remote / HMI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>CC825</strong><span class='muted'>(015013)</span></td>
                  <td>35</td>
                  <td>46</td>
                  <td>64</td>
                  <td>81</td>
                  <td>120</td>
                  <td>175</td>
                  <td>15</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC1235</strong><span class='muted'>(050035)</span></td>
                  <td>106</td>
                  <td>134</td>
                  <td>187</td>
                  <td>240</td>
                  <td>350</td>
                  <td>150</td>
                  <td>50</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC1245</strong><span class='muted'>(050035)</span></td>
                  <td>64</td>
                  <td>78</td>
                  <td>109</td>
                  <td>141</td>
                  <td>208</td>
                  <td>275</td>
                  <td>50</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC1245</strong><span class='muted'>(100060)</span></td>
                  <td>109</td>
                  <td>138</td>
                  <td>194</td>
                  <td>251</td>
                  <td>364</td>
                  <td>275</td>
                  <td>100</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC1645</strong><span class='muted'>(100060)</span></td>
                  <td>201</td>
                  <td>251</td>
                  <td>350</td>
                  <td>452</td>
                  <td>653</td>
                  <td>150</td>
                  <td>100</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC2270</strong><span class='muted'>(100128)</span></td>
                  <td>201</td>
                  <td>251</td>
                  <td>350</td>
                  <td>452</td>
                  <td>653</td>
                  <td>200</td>
                  <td>100</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC2270</strong><span class='muted'>(150128)</span></td>
                  <td>357</td>
                  <td>449</td>
                  <td>629</td>
                  <td>809</td>
                  <td>1,169</td>
                  <td>275</td>
                  <td>150</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td><strong>CC2270</strong><span class='muted'>(150128)</span></td>
                  <td>364</td>
                  <td>459</td>
                  <td>643</td>
                  <td>826</td>
                  <td>1,197</td>
                  <td>275</td>
                  <td>150</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>Yes</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="note">Flow values shown above are MCFD from the uploaded CompressionCommander specification sheet. The
            sheet also notes that max gas rates vary with inlet pressure, gas content, and other factors, and that gas
            rates are reduced by the amount of liquids in the total fluid stream. Additional units in parallel or series
            can increase total gas rate or pressure differential. Package-specific sizing should be confirmed against
            actual field conditions.</p>
        </div>
      </div>
    </section>

    <section id="proof" class="section">
      <div class="container">
        <span class="section-label">Field proof</span>
        <div class="spacer-24"></div>
        <div class="panel panel-pad">
          <div class="two-col">
            <div>
              <h2>Use your strongest multiphase case study as proof.</h2>
              <div class="spacer-18"></div>
              <p>Because you do not have a casing gas-specific case study, the best move is to use your most severe
                liquid-heavy multiphase example and position it correctly: proven performance in conditions that are
                harsher than typical casing gas service.</p>
              <div class="checklist">
                <div class="check"><i></i><span>Continuous liquid flow is harder than intermittent casing gas liquid
                    carryover.</span></div>
                <div class="check"><i></i><span>If the system performs in severe multiphase service, it supports a strong
                    argument for casing gas reliability.</span></div>
                <div class="check"><i></i><span>This gives your page real proof without pretending the case study is
                    something it is not.</span></div>
              </div>
            </div>
            <div class="quote">
              <div class="quote-mark">“</div>
              <p>Fluidstream’s multiphase compression didn’t just improve performance — it transformed non-producing wells
                into revenue-generating assets, delivering stable operation in severe multiphase conditions without adding
                separation equipment or infrastructure.</p>
              <small>Use as “Proven in severe multiphase conditions” on the casing gas page</small>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection