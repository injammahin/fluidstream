@extends('layouts.app')

@section('content')
  <style>
    :root {
      --bg: #ffffff;
      --bg-soft: #f5f7fb;
      --bg-accent: #eef4ff;
      --text: #0a1c4d;
      --muted: #1029ea;
      --line: #dce6ff;
      --primary: #0018dc;
      --accent: #15d1ff;
      --shadow: 0 18px 50px rgba(5, 35, 95, .10);
      --max: 1360px;
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
      background: #ffffff;
      color: var(--text);
      line-height: 1.55;
    }

    img {
      display: block;
      max-width: 100%;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .container {
      width: min(calc(100% - 40px), var(--max));
      margin: 0 auto;
    }

    .section {
      padding: 84px 0;
    }

    .section-surface-white {
      background: #ffffff;
    }

    .section-surface-soft {
      position: relative;
      /* background: linear-gradient(180deg, #fafcff 0%, #f2f5f9 100%); */
      /* border-top: 1px solid #edf2fb; */
      /* border-bottom: 1px solid #edf2fb; */
    }

    .section-label {
      display: inline-flex;
      align-items: center;
      font-size: 13px;
      font-weight: 800;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: var(--primary);
    }

    .hero-tech {
      position: relative;
      overflow: hidden;
      background: #0018dc;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      isolation: isolate;
    }

    .hero-tech::before {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(90deg, rgba(0, 24, 220, 0.90) 0%, rgba(0, 24, 220, 0.78) 45%, rgba(0, 24, 220, 0.68) 100%),
        url('{{ asset("/img/hero/hero.avif") }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      transform: scale(1.02);
      z-index: -2;
    }

    .hero-tech::after {
      content: "";
      position: absolute;
      inset: 0;
      background:
        radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.14), transparent 28%),
        radial-gradient(circle at 80% 30%, rgba(21, 209, 255, 0.10), transparent 24%);
      z-index: -1;
    }

    .hero-tech .hero-copy {
      max-width: 1120px;
      padding-top: 18px;
      padding-bottom: 18px;
    }

    .hero-tech .hero-line {
      width: 132px;
      height: 3px;
      background: linear-gradient(90deg, #15d1ff, rgba(255, 255, 255, 0));
      border-radius: 999px;
      margin: 24px 0 0;
    }

    .hero-tech .hero-actions {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-top: 28px;
    }

    .hero-tech .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 56px;
      padding: 0 24px;
      border-radius: 16px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.25s ease;
      text-decoration: none;
    }

    .hero-tech .btn.primary {
      background: #ffffff;
      color: #0018dc;
      border: 1px solid #ffffff;
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.16);
    }

    .hero-tech .btn.primary:hover {
      transform: translateY(-2px);
    }

    .hero-tech .btn.secondary {
      background: rgba(255, 255, 255, 0.10);
      color: #ffffff;
      border: 1px solid rgba(255, 255, 255, 0.22);
      backdrop-filter: blur(8px);
    }

    .hero-tech .btn.secondary:hover {
      background: rgba(255, 255, 255, 0.16);
      transform: translateY(-2px);
    }

    .hero-tech .hero-highlights {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 16px;
      max-width: 1120px;
      margin-top: 34px;
    }

    .hero-tech .hero-highlight {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.08));
      border: 1px solid rgba(255, 255, 255, 0.14);
      border-radius: 22px;
      padding: 20px 20px 18px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.14);
      backdrop-filter: blur(10px);
      min-height: 170px;
    }

    .hero-tech .hero-highlight .label {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #8fe8ff;
    }

    .hero-tech .hero-highlight .label i {
      width: 8px;
      height: 8px;
      border-radius: 999px;
      background: #15d1ff;
      box-shadow: 0 0 0 6px rgba(21, 209, 255, 0.12);
    }

    .hero-tech .hero-highlight strong {
      display: block;
      margin-bottom: 8px;
      font-size: 20px;
      line-height: 1.2;
      letter-spacing: -0.02em;
      color: #ffffff;
    }

    .hero-tech .hero-highlight p {
      margin: 0;
      font-size: 15px;
      line-height: 1.6;
      color: rgba(255, 255, 255, 0.82);
    }

    .visual-shell {
      position: sticky;
      top: 92px;
    }

    .overview-stage-wrap {
      background: #ffffff;
    }

    .image-stage {
      position: relative;
      /* background: #f0f4f8; */
      border-radius: 22px;
      overflow: hidden;
    }

    .image-stage img {
      width: 100%;
      height: auto;
    }

    .hotspot {
      position: absolute;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--accent);
      border: 3px solid #fff;
      box-shadow: 0 0 0 10px rgba(21, 209, 255, .16), 0 0 22px rgba(21, 209, 255, .35);
      cursor: pointer;
      transition: .18s ease;
      z-index: 5;
    }

    .hotspot:hover,
    .hotspot.active {
      transform: scale(1.08);
      box-shadow: 0 0 0 14px rgba(21, 209, 255, .18), 0 0 28px rgba(21, 209, 255, .45);
    }

    .hotspot-label {
      position: absolute;
      top: -6px;
      left: 28px;
      white-space: nowrap;
      background: rgba(255, 255, 255, .95);
      color: var(--text);
      border: 1px solid var(--line);
      padding: 9px 12px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .06em;
      text-transform: uppercase;
      box-shadow: var(--shadow);
    }

    .hotspot.left .hotspot-label {
      left: auto;
      right: 28px;
    }

    .hotspot-panel {
      margin: 0 auto;
      padding: 42px 0 42px;
    }

    .color {
      background: #f0f0f0;

    }

    .hotspot-panel .mini {
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .16em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 10px;
    }

    .hotspot-panel h3 {
      font-size: 30px;
      line-height: 1.05;
      letter-spacing: -.03em;
      margin: 0 0 10px;
    }

    .hotspot-panel p {
      margin: 0 0 18px;
      color: #393939;
      max-width: 1480px;
    }

    .hotspot-panel ul,
    .copy ul {
      list-style: none;
      margin: 0 0 18px;
      padding-left: 0;
    }

    .hotspot-panel li,
    .copy li {
      position: relative;
      margin: 12px 0;
      padding-left: 42px;
      color: var(--text);
    }

    .hotspot-panel li::before,
    .copy li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 2px;
      width: 24px;
      height: 24px;
      border-radius: 8px;
      /* border: 1px solid #dbe5ff;
                                                                  background-color: #ffffff; */
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='2.8' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='M13 5l7 7-7 7'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 14px 14px;
      /* box-shadow: 0 10px 22px rgba(16, 40, 234, 0.08); */
    }

    .section-title {
      font-size: clamp(32px, 4vw, 56px);
      line-height: 1;
      letter-spacing: -.04em;
      margin: 0 0 14px;
    }

    .overview-head {
      margin-bottom: 30px;
    }

    .section-intro {
      font-size: 18px;
      color: #000000;
      max-width: 760px;
      margin: 0;
    }

    .features {
      display: grid;
      gap: 24px;
      margin-top: 38px;
    }

    .feature {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 34px;
      align-items: center;
      padding: 32px 0px 32px 0px;
      border-radius: 28px;
      /* background: rgba(255, 255, 255, 0.88); */
      scroll-margin-top: 90px;
      /* border: 1px solid #e7eefc; */
    }

    .feature.reverse .copy {
      order: 2;
    }

    .feature.reverse .visual {
      order: 1;
    }

    .visual-box {
      /* border: 1px solid var(--line); */
      border-radius: 22px;
      min-height: 340px;
      padding: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
      /* background: #ffffff; */
    }

    .feature-indicator {
      position: absolute;
      display: flex;
      align-items: center;
      gap: 10px;
      z-index: 4;
    }

    .feature-indicator .dot {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--accent);
      border: 3px solid #fff;
      box-shadow: 0 0 0 8px rgba(21, 209, 255, .15), 0 0 20px rgba(21, 209, 255, .25);
    }

    .feature-indicator .tag {
      background: rgba(255, 255, 255, .96);
      border: 1px solid var(--line);
      border-radius: 999px;
      padding: 9px 12px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .05em;
      text-transform: uppercase;
      color: var(--text);
      box-shadow: var(--shadow);
      white-space: nowrap;
    }

    .feature-indicator.left {
      flex-direction: row-reverse;
    }

    .feature-indicator.top .tag {
      transform: translateY(-2px);
    }

    .visual-note {
      position: absolute;
      left: 18px;
      right: 18px;
      bottom: 18px;
      padding: 12px 14px;
      background: rgba(255, 255, 255, .92);
      border: 1px solid var(--line);
      border-radius: 14px;
      font-size: 13px;
      line-height: 1.45;
      color: var(--text);
      z-index: 3;
    }

    .visual-note strong {
      color: var(--primary);
    }

    .visual-box img {
      width: 100%;
      height: auto;
      display: block;
      position: relative;
      z-index: 1;
    }

    .copy h2 {
      font-size: clamp(28px, 3vw, 44px);
      line-height: 1.04;
      letter-spacing: -.04em;
      margin: 0 0 16px;
    }

    .copy p {
      font-size: 18px;
      color: #020202;
      margin: 0 0 16px;
    }

    .adv {
      background: #ffff;
      border: 1px solid var(--line);
      border-left: 4px solid var(--accent);
      border-radius: 5px;
      padding: 16px 18px;
    }

    .adv strong {
      display: block;
      margin-bottom: 8px;
      font-size: 13px;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--primary);
    }

    .diff-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      margin-top: 36px;
    }

    .diff-card {
      padding: 26px;
      border-radius: 3px;
      background: #fff;
      border: 1px solid #0018dc26;
    }

    .diff-card h3 {
      font-size: 29px;
      line-height: 1.08;
      letter-spacing: -.03em;
      margin: 0 0 14px;
    }

    .diff-card .line {
      width: 92px;
      height: 3px;
      background: linear-gradient(90deg, var(--accent), transparent);
      border-radius: 999px;
      margin-bottom: 14px;
    }

    .diff-card p {
      margin: 0;
      color: #252526;
      font-size: 18px;
    }

    .quote {
      padding: 52px 26px;
      border-radius: 5px;
      background: linear-gradient(180deg, #ffffff, #ffffff);
      border: 1px solid #0018dc1c;
      box-shadow: var(--shadow);
      text-align: center;
    }

    .quote p {
      font-size: clamp(28px, 3.2vw, 46px);
      line-height: 1.2;
      letter-spacing: -.04em;
      margin: 0;
    }

    .quote em {
      font-style: normal;
      color: var(--primary);
    }

    .footer-note {
      margin-top: 14px;
      text-align: center;
      color: var(--muted);
      font-size: 14px;
    }

    @media (max-width: 1180px) {
      .hero-tech .hero-highlights {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width:1180px) {
      .visual-shell {
        position: relative;
        top: 0;
      }
    }

    @media (max-width:1050px) {
      .feature {
        grid-template-columns: 1fr;
      }

      .feature.reverse .copy,
      .feature.reverse .visual {
        order: initial;
      }
    }

    @media (max-width:760px) {
      .hero-tech {
        min-height: auto;
      }

      .hero-tech .hero-copy {
        padding-top: 8px;
        padding-bottom: 8px;
      }

      .hero-tech .btn {
        width: 100%;
      }

      .container {
        width: min(calc(100% - 28px), var(--max));
      }

      .section {
        padding: 68px 0;
      }

      .diff-grid {
        grid-template-columns: 1fr;
      }

      .hotspot-label {
        display: none;
      }

      .hotspot-panel h3 {
        font-size: 26px;
      }

      .hotspot-panel li,
      .copy li {
        padding-left: 38px;
      }

      .hotspot-panel li::before,
      .copy li::before {
        width: 22px;
        height: 22px;
      }
    }

    .container {
      max-width: 1200px !important;
    }
  </style>

  <section class="hero-tech ">
    <div class="container max-w-7xl py-16 sm:py-20 lg:py-24">
      <div class="hero-copy">
        <h2 class="mt-6 text-4xl font-semibold leading-[1.02] tracking-[-0.045em] text-white sm:text-5xl lg:text-[58px]">
          Engineered for True Multiphase Performance
        </h2>

        <div class="hero-line"></div>

        <p class="mt-8 max-w-2xl text-lg leading-8 text-white/85 sm:text-[22px] sm:leading-9">
          Fluidstream technology is built from the ground up to reliably handle gas, liquids, and solids without the
          complexity, maintenance burden, or limitations of conventional systems.
        </p>

        <div class="hero-actions mt-4">
          <a class="btn primary" href="#overview">Explore Technology</a>
          <a class="btn secondary" href="#features">View Key Features</a>
        </div>

        <div class="hero-highlights">
          <div class="hero-highlight">
            <div class="label"><i></i>Liquid Handling</div>
            <strong>Handles Liquids Inside Compression</strong>
            <p>Designed to safely and efficiently manage incompressible liquids directly within the compression chamber,
              reducing the need for upstream separation equipment.</p>
          </div>

          <div class="hero-highlight">
            <div class="label"><i></i>Autonomous Control</div>
            <strong>Autonomous Protection in Upset Conditions</strong>
            <p>Advanced controls and piston tracking help the system respond to slugs, solids buildup, and changing flow
              conditions without constant operator intervention.</p>
          </div>

          <div class="hero-highlight">
            <div class="label"><i></i>Drive Flexibility</div>
            <strong>Flexible Power for Field Deployment</strong>
            <p>Available in both electric and gas-drive configurations, with integrated control logic that maintains
              performance even when fuel gas quality is inconsistent.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-surface-white overview-stage-wrap">
    <div class="visual-shell">
      <div class="image-stage" id="overview-stage">
        <img src="/img/2270 Rear View.JPG" alt="Fluidstream technology unit" />
        <button class="hotspot active" data-feature="liquid" style="left:46%;top:58%">
          <span class="hotspot-label">Liquid Methodology</span>
        </button>
        <button class="hotspot" data-feature="gland" style="left:60%;top:40%">
          <span class="hotspot-label">Gland Sealing</span>
        </button>
        <button class="hotspot left" data-feature="alignment" style="left:39%;top:48%">
          <span class="hotspot-label">Alignment</span>
        </button>
        <button class="hotspot" data-feature="tracking" style="left:46%;top:45%">
          <span class="hotspot-label">Piston Tracking</span>
        </button>
        <button class="hotspot left" data-feature="drives" style="left:18%;top:37%">
          <span class="hotspot-label">Drive + Controls</span>
        </button>
        <button class="hotspot" data-feature="sand" style="left:60%;top:52%">
          <span class="hotspot-label">Sand Optimization</span>
        </button>
      </div>
      <section class="color">
        <div class="container ">
          <div class="hotspot-panel" id="hotspotPanel">
            <div class="section-label py-4">Interactive System Overview</div>
            <h3 id="panelTitle">Patent-Focused Methodology for Handling Incompressible Liquids</h3>
            <p id="panelText">Fluidstream incorporates a patented methodology positioned as the only safe, efficient,
              reliable, and optimal approach for handling incompressible liquids within a compression chamber.</p>
            <ul id="panelList">
              <li>Built specifically for liquid presence inside the compression chamber</li>
              <li>Focused on safe, efficient, and reliable multiphase operation</li>
              <li>Supports practical operation where conventional systems avoid liquid loading</li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </section>

  <section class="section section-surface-soft py-16 sm:py-20 lg:py-24" id="features">
    <div class="">
      <div class="overview-head container" id="overview">
        <div class="section-label py-4">Core Technology Features</div>
        <h2 class="section-title">Explore Fluidstream Technology</h2>
        <p class="section-intro">This version restores the interactive image in the hero while keeping the lighter visual
          system. The feature language reflects your uploaded technology points around liquid handling, gland sealing,
          hazardous-fluid containment, autonomous control, gas-drive integration, and sand-optimized sealing.</p>
      </div>
      <section class="color">
        <div class="features">
          <article class="feature container" id="liquid-method">
            <div class="copy">
              <div class="section-label py-4">Liquid Handling Methodology</div>
              <h2>Patent-Focused Methodology for Handling Incompressible Liquids</h2>
              <p>Fluidstream incorporates a <strong>patented methodology</strong> for handling incompressible liquids
                within
                a compression chamber.</p>
              <ul>
                <li>Built specifically for liquid presence inside the compression chamber</li>
                <li>Focused on safe, efficient, and reliable multiphase operation</li>
                <li>Supports practical operation where conventional systems avoid liquid loading</li>
              </ul>
              <div class="adv"><strong>Key Advantage</strong>Rather than treating liquids as a problem to be removed
                upstream, Fluidstream is designed to manage them directly inside the compression process.</div>
            </div>
            <div class="visual">
              <div class="visual-box">
                <img src="/img/2270 Rear View.JPG" alt="Fluidstream liquid handling technology" />
                <div class="feature-indicator" style="left:50%;top:60%">
                  <span class="dot"></span>
                  <span class="tag">Liquid handling zone</span>
                </div>
              </div>
            </div>
          </article>

          <article class="feature reverse container" id="gland-section">
            <div class="copy">
              <div class="section-label py-4">Advanced Sealing System</div>
              <h2>Patent Pending Gland Sealing with Electronic Wear Detection</h2>
              <p>Fluidstream uses a <strong>patent pending gland sealing configuration and methodology</strong> with
                electronic seal wear detection to protect the system under demanding multiphase conditions.</p>
              <ul>
                <li>Electronic detection provides visibility into seal condition</li>
                <li>Supports earlier maintenance planning before failure occurs</li>
                <li>Improves reliability in harsh multiphase duty</li>
              </ul>
              <div class="adv"><strong>Key Advantage</strong>Advanced sealing and wear awareness help eliminate one of the
                biggest reliability risks in multiphase compression.</div>
            </div>
            <div class="visual">
              <div class="visual-box">
                <img src="/img/2270 Rear View.JPG" alt="Fluidstream gland sealing system" />
                <div class="feature-indicator" style="left:50%;top:44%">
                  <span class="dot"></span>
                  <span class="tag">Gland sealing area</span>
                </div>
              </div>
            </div>
          </article>

          <article class="feature container" id="alignment-section">
            <div class="copy">
              <div class="section-label py-4">Containment and Mechanical Integrity</div>
              <h2>Sealed Hazardous-Fluid Containment and Alignment in Critical Wear Areas</h2>
              <p>Fluidstream features a <strong>completely sealed gland</strong> for hazardous fluids, while the system is
                designed to keep alignment in key stress and wear areas to extend life of seals and components.</p>
              <ul>
                <li>No exposure to toxic or corrosive multiphase fluid, including H2S</li>
                <li>Controls wear in mechanically critical zones</li>
                <li>Extends life of sealing and wear components</li>
              </ul>
              <div class="adv"><strong>Key Advantage</strong>The design strengthens both safety and durability by
                combining
                sealed containment with engineered mechanical stability.</div>
            </div>
            <div class="visual">
              <div class="visual-box">
                <img src="/img/2270 Rear View.JPG" alt="Fluidstream sealed gland and alignment" />
                <div class="feature-indicator left" style="left:37%;top:35%">
                  <span class="dot"></span>
                  <span class="tag">Alignment + sealed gland</span>
                </div>
              </div>
            </div>
          </article>

          <article class="feature reverse container" id="tracking-section">
            <div class="copy">
              <div class="section-label py-4">Piston Tracking & Adaptive Operation</div>
              <h2>Full Piston Tracking for Optimized Control and Upset Protection</h2>
              <p>Full tracking of the piston allows optimized control, helps prevent damage from ice and solid buildup,
                ensures power fluid temperature is optimized, and adjusts the system to safely operate during upset
                conditions such as slugs.</p>
              <ul>
                <li>Helps prevent damage from ice and solids buildup</li>
                <li>Optimizes power fluid temperature during complex operation</li>
                <li>Adjusts for upset conditions including large liquid surges</li>
              </ul>
              <div class="adv"><strong>Key Advantage</strong>Fluidstream is built to remain controlled under real-world
                variability, not just steady-state conditions.</div>
            </div>
            <div class="visual">
              <div class="visual-box">
                <img src="/img/2270 Rear View.JPG" alt="Fluidstream piston tracking" />
                <div class="feature-indicator" style="left:45%;top:31%">
                  <span class="dot"></span>
                  <span class="tag">Piston tracking path</span>
                </div>
              </div>
            </div>
          </article>

          <article class="feature container" id="drives-section">
            <div class="copy">
              <div class="section-label py-4">Drive Systems & Autonomous Controls</div>
              <h2>Electric Standard, Gas Drive Optional, Fully Integrated Into Autonomous Controls</h2>
              <p>Beyond the standard electric engine solution, Fluidstream also offers a gas drive option. Critical
                information such as oil temperature, rpm, and motor load from the gas drive is integrated into autonomous
                controls.</p>
              <ul>
                <li>Electric and gas drive configurations available</li>
                <li>Gas-drive operating data integrated into controls logic</li>
                <li>Maintains performance under variable fuel gas quality</li>
              </ul>
              <div class="adv"><strong>Key Advantage</strong>Drive flexibility is matched by control intelligence,
                allowing
                the unit to operate effectively across a wider range of field conditions.</div>
            </div>
            <div class="visual">
              <div class="visual-box">
                <img src="/img/2270 Rear View.JPG" alt="Fluidstream drive and controls" />
                <div class="feature-indicator left" style="left:20%;top:38%">
                  <span class="dot"></span>
                  <span class="tag">Drive + controls</span>
                </div>
              </div>
            </div>
          </article>

          <article class="feature reverse container" id="sand-section">
            <div class="copy">
              <div class="section-label py-4">Sand-Ready Sealing</div>
              <h2>Multiphase Piston and Gland Sealing Configured to Optimize Life in Sand Service</h2>
              <p>The multiphase piston sealing and gland sealing system is configured to optimize life in applications
                with
                sand, helping preserve equipment life where abrasive solids can rapidly degrade conventional designs.</p>
              <ul>
                <li>Designed with abrasive service in mind</li>
                <li>Optimizes seal life in sand-bearing applications</li>
                <li>Strengthens suitability for difficult field conditions</li>
              </ul>
              <div class="adv"><strong>Key Advantage</strong>Fluidstream is engineered for tougher multiphase realities,
                including abrasive service, rather than assuming clean flow.</div>
            </div>
            <div class="visual">
              <div class="visual-box">
                <img src="/img/2270 Rear View.JPG" alt="Fluidstream sand optimized sealing" />
                <div class="feature-indicator" style="left:34%;top:24%">
                  <span class="dot"></span>
                  <span class="tag">Sand-optimized sealing</span>
                </div>
              </div>
          </article>
        </div>
      </section>
    </div>
  </section>

  <section class="section section-surface-white py-16 sm:py-20 lg:py-24" id="differentiation">
    <div class="container">
      <div class="section-label py-4">Technology Differentiation</div>
      <h2 class="section-title">Designed to feel proprietary, precise, and operator-ready</h2>
      <p class="section-intro">The page keeps the earlier differentiation structure while sharpening the message around
        direct liquid handling, fully sealed containment, autonomous control, and hard-duty multiphase operation.</p>

      <div class="diff-grid">
        <div class="diff-card">
          <h3>Designed for Multiphase Not Adapted to It</h3>
          <div class="line"></div>
          <p>Fluidstream is engineered specifically for multiphase flow, not repurposed from conventional compression
            architectures.</p>
        </div>

        <div class="diff-card">
          <h3>Sealed. Controlled. Predictable.</h3>
          <div class="line"></div>
          <p>Advanced gland sealing, wear detection, and autonomous control remove major operational risks found in
            competing systems.</p>
        </div>

        <div class="diff-card">
          <h3>Handles Variability Without Compromise</h3>
          <div class="line"></div>
          <p>From incompressible liquids and slugs to solids, sand, and unstable gas-drive conditions, the system is built
            for real field variation.</p>
        </div>

        <div class="diff-card">
          <h3>Lower Maintenance by Design</h3>
          <div class="line"></div>
          <p>Alignment control, wear-focused sealing, and autonomous operation all work together to reduce service burden
            and extend component life.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-surface-soft py-16 sm:py-20 lg:py-24">
    <div class="container">
      <div class="quote">
        <p>Fluidstream technology is engineered not just to handle multiphase flow but to make it <em>practical, reliable,
            and economically viable</em> across a broader range of applications.</p>
      </div>
    </div>
  </section>

  <script>
    const features = {
      liquid: {
        title: "Patent-Focused Methodology for Handling Incompressible Liquids",
        text: "Fluidstream incorporates a patented methodology positioned around safe, efficient, reliable handling of incompressible liquids within a compression chamber.",
        bullets: [
          "Built specifically for liquid presence inside the compression chamber",
          "Focused on safe, efficient, and reliable multiphase operation",
          "Supports practical operation where conventional systems avoid liquid loading"
        ],
        target: "liquid-method"
      },
      gland: {
        title: "Patent Pending Gland Sealing with Electronic Wear Detection",
        text: "Fluidstream uses a patent pending gland sealing configuration and methodology with electronic seal wear detection to protect the system under demanding multiphase conditions.",
        bullets: [
          "Electronic detection provides visibility into seal condition",
          "Supports earlier maintenance planning before failure occurs",
          "Improves reliability in harsh multiphase duty"
        ],
        target: "gland-section"
      },
      alignment: {
        title: "Sealed Hazardous-Fluid Containment and Alignment",
        text: "Fluidstream combines fully sealed hazardous-fluid containment with alignment control in key stress and wear areas to improve safety and component life.",
        bullets: [
          "No exposure to toxic or corrosive multiphase fluid, including H2S",
          "Controls wear in mechanically critical zones",
          "Extends life of sealing and wear components"
        ],
        target: "alignment-section"
      },
      tracking: {
        title: "Full Piston Tracking for Optimized Control",
        text: "Full tracking of the piston allows optimized control and safer operation during upset conditions such as slugs, ice formation, and solids buildup.",
        bullets: [
          "Helps prevent damage from ice and solids buildup",
          "Optimizes power fluid temperature during complex operation",
          "Adjusts for upset conditions including large liquid surges"
        ],
        target: "tracking-section"
      },
      drives: {
        title: "Electric and Gas Drive Options Integrated Into Autonomous Controls",
        text: "Beyond the standard electric engine solution, Fluidstream also offers a gas drive option integrated into autonomous controls for broader field flexibility.",
        bullets: [
          "Electric and gas drive configurations available",
          "Gas-drive operating data integrated into controls logic",
          "Maintains performance under variable fuel gas quality"
        ],
        target: "drives-section"
      },
      sand: {
        title: "Sand-Optimized Piston and Gland Sealing",
        text: "The multiphase piston sealing and gland sealing system is configured to optimize life in applications with sand and abrasive solids.",
        bullets: [
          "Designed with abrasive service in mind",
          "Optimizes seal life in sand-bearing applications",
          "Strengthens suitability for difficult field conditions"
        ],
        target: "sand-section"
      }
    };

    const buttons = document.querySelectorAll('.hotspot');
    const titleEl = document.getElementById('panelTitle');
    const textEl = document.getElementById('panelText');
    const listEl = document.getElementById('panelList');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        const key = btn.dataset.feature;
        const item = features[key];

        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        titleEl.textContent = item.title;
        textEl.textContent = item.text;
        listEl.innerHTML = item.bullets.map(x => `<li>${x}</li>`).join('');

        const target = document.getElementById(item.target);
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>
@endsection