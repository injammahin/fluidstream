@extends('layouts.app')

@section('content')

  <style>
    :root {
      --navy: #0018dc;
      --cyan: #15d1ff;
      --ink: #0f1a2b;
      --muted: #5b6b82;
      --bg: #f4f8fc;
      --line: #dce7f3;
      --card: #ffffff;
      --soft: #eaf6ff;
      --dark: #08152f;
      --success: #0f8f64;
      --shadow: 0 20px 60px rgba(11, 29, 66, .10);
      --max: 1220px;
    }

    * {
      box-sizing: border-box;
    }

    a {
      color: inherit;
    }

    .wrap {
      width: min(var(--max), calc(100% - 48px));
      margin: 0 auto;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 800;
      letter-spacing: .02em;
    }

    .brand-mark {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--navy), var(--cyan));
      box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .25);
    }

    .brand span {
      font-size: 1.05rem;
    }

    .nav-links {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      color: #29415f;
      font-size: .95rem;
    }

    .nav-cta {
      display: inline-block;
      text-decoration: none;
      font-weight: 700;
      background: var(--navy);
      color: #fff;
      padding: 12px 18px;
      border-radius: 999px;
      box-shadow: var(--shadow);
    }

    .hero {
      position: relative;
      overflow: hidden;
      background:
        radial-gradient(circle at 78% 20%, rgba(21, 209, 255, .16), transparent 26%),
        radial-gradient(circle at 10% 0%, rgba(0, 24, 220, .10), transparent 26%),
        linear-gradient(180deg, #f7fbff 0%, #f2f7ff 42%, #ffffff 100%);
      border-bottom: 1px solid var(--line);
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      gap: 44px;
      align-items: center;
      padding: 76px 0 64px;
    }

    .eyebrow {
      display: inline-block;
      margin-bottom: 18px;
      font-size: .78rem;
      font-weight: 800;
      letter-spacing: .16em;
      text-transform: uppercase;
      color: var(--navy);
      background: rgba(0, 24, 220, .06);
      border: 1px solid rgba(0, 24, 220, .08);
      padding: 8px 12px;
      border-radius: 999px;
    }

    h1 {
      margin: 0 0 18px;
      font-size: clamp(2.6rem, 5vw, 4.8rem);
      line-height: 1.02;
      letter-spacing: -.03em;
      max-width: 780px;
    }

    .hero p {
      color: var(--muted);
      max-width: 760px;
      font-size: 1.1rem;
      margin: 0 0 26px;
    }

    .cta-row {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin: 30px 0 28px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 50px;
      padding: 0 20px;
      border-radius: 999px;
      font-weight: 700;
      text-decoration: none;
      transition: .2s ease;
    }

    .btn-primary {
      background: var(--navy);
      color: #fff;
      box-shadow: var(--shadow);
    }

    .btn-secondary {
      background: #fff;
      color: var(--navy);
      border: 1px solid var(--line);
    }

    .hero-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      max-width: 760px;
    }

    .stat {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 16px 18px;
      box-shadow: 0 10px 30px rgba(15, 26, 43, .05);
    }

    .stat strong {
      display: block;
      font-size: 1.25rem;
      color: var(--navy);
      line-height: 1.1;
      margin-bottom: 6px;
    }

    .product-card {
      background: linear-gradient(180deg, #ffffff 0%, #f6fbff 100%);
      border: 1px solid var(--line);
      border-radius: 28px;
      padding: 24px;
      box-shadow: var(--shadow);
    }

    .product-card img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 18px;
      background: #fff;
    }

    .caption {
      margin-top: 14px;
      color: var(--muted);
      font-size: .95rem;
    }

    .section-vapor-recovery {
      padding: 78px 0;
      border-bottom: 1px solid var(--line);
    }

    h2 {
      margin: 0 0 14px;
      font-size: clamp(2rem, 3vw, 3.2rem);
      line-height: 1.05;
      letter-spacing: -.02em;
    }

    .lead {
      margin: 0 0 34px;
      max-width: 860px;
      color: var(--muted);
      font-size: 1.05rem;
    }

    .section-kicker {
      color: var(--navy);
      text-transform: uppercase;
      letter-spacing: .16em;
      font-size: .77rem;
      font-weight: 800;
      margin-bottom: 10px;
    }

    .grid-2 {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 24px;
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 24px;
    }

    .card {
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: 24px;
      padding: 26px;
      box-shadow: 0 12px 34px rgba(11, 29, 66, .05);
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 1.2rem;
      line-height: 1.2;
    }

    .card p,
    .card li {
      color: var(--muted);
    }

    .card ul {
      margin: 0;
      padding-left: 18px;
    }

    .problem-strip {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 24px;
    }

    .bullets {
      display: grid;
      gap: 14px;
      margin-top: 18px;
    }

    .bullet {
      display: flex;
      gap: 12px;
      align-items: flex-start;
      padding: 14px 0;
      border-top: 1px solid var(--line);
    }

    .bullet:first-child {
      border-top: none;
      padding-top: 0;
    }

    .icon {
      flex: 0 0 34px;
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(0, 24, 220, .10), rgba(21, 209, 255, .20));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--navy);
      font-weight: 800;
    }

    .comparison {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 24px;
      box-shadow: var(--shadow);
      background: #fff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 820px;
    }

    th,
    td {
      padding: 18px 16px;
      text-align: left;
      border-bottom: 1px solid var(--line);
      vertical-align: top;
    }

    th {
      background: #f8fbff;
      color: #14325d;
      font-size: .93rem;
    }

    td {
      color: #3c4f69;
      font-size: .98rem;
    }

    tr:last-child td {
      border-bottom: none;
    }

    .best {
      background: linear-gradient(180deg, rgba(21, 209, 255, .08), rgba(0, 24, 220, .03));
    }

    .spec-note {
      margin-top: 16px;
      color: var(--muted);
      font-size: .92rem;
    }

    .check {
      color: var(--success);
      font-weight: 800;
    }

    .warn {
      color: #bf6a00;
      font-weight: 700;
    }

    .x {
      color: #cc3344;
      font-weight: 800;
    }

    .spec-cards {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 18px;
      margin-top: 24px;
    }

    .spec-mini {
      background: #f8fbff;
      border: 1px solid var(--line);
      border-radius: 20px;
      padding: 20px;
    }

    .spec-mini strong {
      display: block;
      font-size: 1.35rem;
      color: var(--navy);
      margin-bottom: 4px;
    }

    .case-layout {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 24px;
    }

    .outcome {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin-top: 24px;
    }

    .outcome .card strong {
      display: block;
      font-size: 1.45rem;
      color: var(--navy);
      margin-bottom: 4px;
    }

    .cta-section {
      background:
        radial-gradient(circle at 15% 20%, rgba(0, 24, 220, .10), transparent 22%),
        radial-gradient(circle at 80% 40%, rgba(21, 209, 255, .16), transparent 26%),
        linear-gradient(180deg, #0a1530 0%, #081027 100%);
      color: #fff;
      border-bottom: none;
    }

    .cta-section .lead {
      color: rgba(255, 255, 255, .78);
    }

    .cta-panel {
      background: rgba(255, 255, 255, .06);
      border: 1px solid rgba(255, 255, 255, .10);
      border-radius: 28px;
      padding: 34px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, .22);
    }

    .cta-panel .btn-secondary {
      background: transparent;
      color: #fff;
      border-color: rgba(255, 255, 255, .18);
    }

    footer {
      background: #081027;
      color: rgba(255, 255, 255, .65);
      padding: 22px 0 34px;
      font-size: .92rem;
    }

    @media (max-width: 1080px) {

      .hero-grid,
      .problem-strip,
      .case-layout {
        grid-template-columns: 1fr;
      }

      .grid-3 {
        grid-template-columns: 1fr 1fr;
      }

      .spec-cards {
        grid-template-columns: 1fr 1fr;
      }

      .hero-stats {
        grid-template-columns: 1fr;
        max-width: 420px;
      }
    }

    @media (max-width: 760px) {
      .nav {
        flex-wrap: wrap;
        padding: 14px 0;
      }

      .nav-links {
        display: none;
      }

      .grid-2,
      .grid-3,
      .spec-cards,
      .outcome {
        grid-template-columns: 1fr;
      }

      .hero-grid {
        padding: 52px 0 48px;
      }

      section {
        padding: 58px 0;
      }

      .wrap {
        width: min(var(--max), calc(100% - 30px));
      }
    }
  </style>

  <header class="">
    <div class="wrap hero-grid">
      <div>
        <div class="eyebrow">Vapor Recovery Technology</div>
        <h1>Vapor recovery built for real-world multiphase conditions.</h1>
        <p>
          Conventional vapor recovery units are designed for gas-only conditions. Real field vapor streams
          are not. Fluidstream combines multiphase compression, sealed hazardous-service design, and autonomous
          controls to recover vapor where liquids, slugs, sand, and unstable flow can limit conventional systems.
        </p>
        <div class="cta-row">
          <a class="btn btn-primary" href="#cta">Evaluate Your Application</a>
          <a class="btn btn-secondary" href="#comparison">See the Difference</a>
        </div>
        <div class="hero-stats">
          <div class="stat">
            <strong>233 mcf/day</strong>
            Max gas rate in the largest listed VaporCommander configuration
          </div>
          <div class="stat">
            <strong>275 psig</strong>
            Maximum listed pressure differential in selected configurations
          </div>
          <div class="stat">
            <strong>Autonomous</strong>
            Control architecture built for upset conditions and reduced intervention
          </div>
        </div>
      </div>
      <div class="product-card">
        <img src="/img/2270 Rear View.JPG" alt="img">
        <div class="caption">
          Fluidstream VaporCommander package platform for vapor recovery applications.
        </div>
      </div>
    </div>
  </header>

  <section id="why" class="section-vapor-recovery">
    <div class="wrap">
      <div class="section-kicker">1. Why multiphase compression matters</div>
      <h2>Vapor recovery is not a gas-only problem.</h2>
      <p class="lead">
        In many field applications, vapor recovery streams contain more than gas. Entrained liquids, intermittent slugs,
        sand, and variable gas quality can force conventional gas-only VRUs into unstable operation, higher maintenance,
        or narrower operating windows. A vapor recovery solution designed around multiphase reality gives operators a
        more practical way to recover gas, reduce emissions, and extend deployment into more difficult applications.
      </p>
      <div class="problem-strip">
        <div class="card">
          <h3>Why conventional VRUs become limiting</h3>
          <div class="bullets">
            <div class="bullet">
              <div class="icon">1</div>
              <div>
                <strong>They prefer clean, gas-dominant flow.</strong>
                <div style="color:var(--muted)">Performance and reliability often deteriorate when liquids enter the
                  system or when flow becomes unstable.</div>
              </div>
            </div>
            <div class="bullet">
              <div class="icon">2</div>
              <div>
                <strong>They add complexity around the compressor.</strong>
                <div style="color:var(--muted)">Separators, scrubbers, knockout drums, heaters, and other support
                  equipment can raise total cost and maintenance burden.</div>
              </div>
            </div>
            <div class="bullet">
              <div class="icon">3</div>
              <div>
                <strong>They reduce the number of viable vapor recovery sites.</strong>
                <div style="color:var(--muted)">Applications with liquids, slugs, or upset conditions often become more
                  difficult to justify economically or operationally.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <h3>Why multiphase compression changes the equation</h3>
          <p>
            Fluidstream is designed to work with the actual fluid conditions seen in the field, rather than depending on
            idealized
            gas-only behavior. That changes vapor recovery from a narrow technology fit into a broader operating tool.
          </p>
          <ul>
            <li>Broader deployment across difficult field conditions</li>
            <li>Greater tolerance to liquids and upset behavior</li>
            <li>Reduced dependence on surrounding support equipment</li>
            <li>Improved practicality for emissions reduction and gas monetization</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="advantages" class="section-vapor-recovery">
    <div class="wrap">
      <div class="section-kicker">2. Advantages of the Fluidstream multiphase vapor recovery package</div>
      <h2>Built to outperform gas-only vapor recovery approaches.</h2>
      <p class="lead">
        Fluidstream's advantage is not a single feature. It is a system architecture that combines multiphase handling,
        hazardous-service sealing, intelligent controls, and package flexibility to create a more resilient vapor recovery
        platform.
      </p>
      <div class="grid-3">
        <div class="card">
          <h3>Designed for incompressible liquid handling</h3>
          <p>
            Fluidstream is built around a patented methodology for safely, efficiently, and reliably handling
            incompressible
            liquids within the compression chamber—critical in real vapor recovery streams where liquids are often
            present.
          </p>
        </div>
        <div class="card">
          <h3>Sealed gland architecture for hazardous service</h3>
          <p>
            A patent-pending gland sealing configuration with electronic wear detection and a fully sealed gland
            arrangement
            helps contain toxic or corrosive multiphase fluids, including H2S-bearing streams.
          </p>
        </div>
        <div class="card">
          <h3>Autonomous control through upset conditions</h3>
          <p>
            Full piston tracking supports optimized control, protects against ice and solid buildup, and helps the system
            operate safely through slugs and changing process conditions.
          </p>
        </div>
        <div class="card">
          <h3>Long-life alignment in wear-critical areas</h3>
          <p>
            The package is designed to maintain alignment in key stress and wear zones, helping extend component and seal
            life.
          </p>
        </div>
        <div class="card">
          <h3>Sand-capable sealing configuration</h3>
          <p>
            Multiphase piston sealing and gland sealing are configured to optimize life in applications where sand is
            present.
          </p>
        </div>
        <div class="card">
          <h3>Flexible drive options with integrated intelligence</h3>
          <p>
            In addition to electric drive, Fluidstream offers gas drive integration with key operating data fed into
            autonomous controls
            to maintain performance when fuel gas quality is compromised.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="comparison" class="section-vapor-recovery">
    <div class="wrap">
      <div class="section-kicker">3. Why Fluidstream is the stronger choice</div>
      <h2>A direct comparison against conventional VRUs and alternative multiphase packages.</h2>
      <p class="lead">
        Buyers evaluating vapor recovery systems are often comparing gas-only VRUs against competitor packages that offer
        varying
        levels of liquid tolerance. The table below presents the strategic distinction: Fluidstream is designed around
        real multiphase
        operating conditions, not limited gas-only assumptions.
      </p>
      <div class="comparison">
        <table>
          <thead>
            <tr>
              <th>Capability</th>
              <th>Conventional Gas-Only VRU</th>
              <th>Typical Alternative Multiphase Package</th>
              <th class="best">Fluidstream</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Handles entrained liquids</td>
              <td><span class="x">✕</span> Limited by gas-only design assumptions</td>
              <td><span class="warn">△</span> Often positioned as tolerant, but varies by design</td>
              <td class="best"><span class="check">✓</span> Core design premise of the package</td>
            </tr>
            <tr>
              <td>Operates through slugs and upset conditions</td>
              <td><span class="x">✕</span> Upsets can drive trips, damage, or shutdowns</td>
              <td><span class="warn">△</span> Application dependent</td>
              <td class="best"><span class="check">✓</span> Autonomous logic and piston tracking support upset handling
              </td>
            </tr>
            <tr>
              <td>Sealed hazardous-service gland design</td>
              <td><span class="warn">△</span> Varies by package</td>
              <td><span class="warn">△</span> Varies by package</td>
              <td class="best"><span class="check">✓</span> Fully sealed gland approach with wear detection</td>
            </tr>
            <tr>
              <td>Sand-oriented sealing strategy</td>
              <td><span class="x">✕</span> Not typically a design strength</td>
              <td><span class="warn">△</span> Depends on configuration</td>
              <td class="best"><span class="check">✓</span> Sealing configured to optimize life in sandy applications</td>
            </tr>
            <tr>
              <td>System simplicity at the site level</td>
              <td><span class="x">✕</span> Often requires more surrounding equipment</td>
              <td><span class="warn">△</span> Moderate</td>
              <td class="best"><span class="check">✓</span> Supports a simpler, broader deployment strategy</td>
            </tr>
            <tr>
              <td>Range of viable vapor recovery applications</td>
              <td><span class="x">✕</span> Narrower fit to cleaner gas conditions</td>
              <td><span class="warn">△</span> Moderate</td>
              <td class="best"><span class="check">✓</span> Stronger fit for difficult real-world streams</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="spec-note">
        This comparison is framed around technology design philosophy and application fit for vapor recovery. It is
        intended to show
        why a multiphase-first platform can create a stronger solution set than gas-only VRU architecture.
      </div>
    </div>
  </section>

  <section id="specs" class="section-vapor-recovery">
    <div class="wrap">
      <div class="section-kicker">4. Specifications</div>
      <h2>VaporCommander model range for vapor recovery deployment.</h2>
      <p class="lead">
        The VaporCommander platform gives operators multiple package configurations to match flow, pressure differential,
        and power requirements while retaining autonomous controls and hazardous-service-ready features across the lineup.
      </p>

      <div class="comparison">
        <table>
          <thead>
            <tr>
              <th>Model</th>
              <th>Max Gas Rate @ 0 psi (e3m3/day) [mcf/day]</th>
              <th>Max Pressure Differential (kPag) [psig]</th>
              <th>Motor Size (HP)</th>
              <th>Standard Package Features</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>VC1235 (050035)</td>
              <td>2.2 [78]</td>
              <td>1034 [150]</td>
              <td>50</td>
              <td>H2S handling, 3-stage cold weather startup, autonomous controller, color touchscreen & remote control
              </td>
            </tr>
            <tr>
              <td>VC1245 (050035)</td>
              <td>1.3 [46]</td>
              <td>1897 [275]</td>
              <td>50</td>
              <td>H2S handling, 3-stage cold weather startup, autonomous controller, color touchscreen & remote control
              </td>
            </tr>
            <tr>
              <td>VC1245 (100060)</td>
              <td>2.4 [85]</td>
              <td>1138 [275]</td>
              <td>100</td>
              <td>H2S handling, 3-stage cold weather startup, autonomous controller, color touchscreen & remote control
              </td>
            </tr>
            <tr>
              <td>VC1645 (100060)</td>
              <td>4.2 [148]</td>
              <td>1034 [150]</td>
              <td>100</td>
              <td>H2S handling, 3-stage cold weather startup, autonomous controller, color touchscreen & remote control
              </td>
            </tr>
            <tr>
              <td>VC2270 (100128)</td>
              <td>6.6 [233]</td>
              <td>1551 [225]</td>
              <td>100</td>
              <td>H2S handling, 3-stage cold weather startup, autonomous controller, color touchscreen & remote control
              </td>
            </tr>
            <tr>
              <td>VC2270 (150128)</td>
              <td>6.6 [233]</td>
              <td>1551 [225]</td>
              <td>150</td>
              <td>H2S handling, 3-stage cold weather startup, autonomous controller, color touchscreen & remote control
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="spec-cards">
        <div class="spec-mini">
          <strong>Up to 6.6</strong>
          e3m3/day maximum listed gas rate
        </div>
        <div class="spec-mini">
          <strong>Up to 233</strong>
          mcf/day maximum listed gas rate
        </div>
        <div class="spec-mini">
          <strong>Up to 1897</strong>
          kPag maximum listed pressure differential
        </div>
        <div class="spec-mini">
          <strong>50–150 HP</strong>
          listed motor size range
        </div>
      </div>

      <div class="spec-note">
        Flow conditions are presented from the spreadsheet provided for this page. Actual rates vary with inlet pressure,
        gas content,
        liquid rate, and other operating conditions. Parallel or series configurations can expand performance further.
      </div>
    </div>
  </section>

  <section id="case-study" class="section-vapor-recovery">
    <div class="wrap">
      <div class="section-kicker">5. Case study framework</div>
      <h2>Example vapor recovery outcome in a difficult field application.</h2>
      <p class="lead">
        Use this section to present a real customer story once approved for publication. The structure below is built to
        persuade
        operators and executives by showing the operational problem, the Fluidstream solution, and the measurable value
        created.
      </p>
      <div class="case-layout">
        <div class="card">
          <h3>Challenge</h3>
          <p>
            The operator needed to recover vapor from a site where liquid carryover, unstable flow, and changing gas
            quality made
            conventional vapor recovery packages difficult to keep online consistently.
          </p>
          <h3>Fluidstream solution</h3>
          <p>
            Fluidstream deployed a multiphase vapor recovery package with liquid-handling capability inside compression,
            sealed gland
            protection, and autonomous control logic designed to operate through upset conditions.
          </p>
          <h3>Result</h3>
          <p>
            The site gained a more resilient vapor recovery platform with lower operator burden and a broader ability to
            maintain
            recovery under real field conditions that challenge gas-only systems.
          </p>
        </div>
        <div>
          <div class="card">
            <h3>What to include in your published case study</h3>
            <ul>
              <li>Site type and fluid conditions</li>
              <li>Why conventional VRU architecture was limiting</li>
              <li>Installed Fluidstream package model</li>
              <li>Before/after maintenance or uptime difference</li>
              <li>Gas capture or emissions reduction impact</li>
              <li>Economic result or broader deployability result</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="outcome">
        <div class="card">
          <strong>More resilient</strong>
          Better fit for wet, unstable vapor recovery streams
        </div>
        <div class="card">
          <strong>Less intervention</strong>
          Autonomous logic supports safer extended operation
        </div>
        <div class="card">
          <strong>Broader deployment</strong>
          More sites become practical vapor recovery candidates
        </div>
      </div>
    </div>
  </section>
  <section class="py-10 sm:py-12 lg:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid gap-12">

        <!-- Card 1 -->
        <div
          class="h-full wrap mb-6 overflow-hidden rounded-[24px] border border-slate-200 bg-white shadow-[0_14px_40px_rgba(0,0,0,0.06)]">
          <div class="h-[5px] w-full bg-gradient-to-r from-[#0018dc] to-[#15d1ff]"></div>

          <div class="flex h-full flex-col p-5 sm:p-6 lg:p-8">
            <h2 class="mb-4 text-xl font-semibold leading-tight text-slate-900 sm:text-[24px] lg:text-[26px]">
              Allied Energy II | Multiphase Vapor Recovery
            </h2>

            <div class="mb-4 text-sm leading-7 text-slate-700 sm:text-[15px] lg:text-base">
              <span class="font-bold text-[#0018dc]">100% uptime</span>
              over 15+ months
              <span class="mx-1 text-slate-400">•</span>
              <span class="font-bold text-[#0018dc]">0 maintenance</span>
              <span class="mx-1 text-slate-400">•</span>
              Operated below
              <span class="font-bold text-[#0018dc]">-40°C</span>
              <span class="mx-1 text-slate-400">•</span>
              Gas venting eliminated
            </div>

            <div
              class="mb-5 rounded-r-[10px] border-l-4 border-l-[#15d1ff] bg-gradient-to-r from-[rgba(0,24,220,0.05)] to-[rgba(21,209,255,0.10)] px-4 py-4 text-sm leading-7 text-slate-700 sm:text-[15px]">
              “...eliminated gas venting…
              <span class="font-bold text-slate-900">100% uptime and no maintenance</span>
              since installation.”
            </div>

            <div
              class="mt-auto flex flex-col gap-3 border-t border-slate-100 pt-4 sm:flex-row sm:items-center sm:justify-between">
              <div class="text-sm leading-6 text-slate-500">
                <span class="font-semibold text-[#0018dc]">Lower maintenance</span>
                <span class="mx-1 text-slate-300">•</span>
                Continuous operation
                <span class="mx-1 text-slate-300">•</span>
                Reduced emissions
              </div>

              <a href="{{ route('case-studies.allied-energy') }}"
                class="group inline-flex shrink-0 items-center font-bold text-[#0018dc] transition duration-300 hover:text-[#15d1ff]">
                Read full case study
                <span class="ml-1 transition-transform duration-300 group-hover:translate-x-1">→</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div
          class="h-full wrap mt-3 overflow-hidden rounded-[22px] border border-[rgba(19,35,63,0.10)] bg-white shadow-[0_18px_50px_rgba(0,24,220,0.10)]">
          <div class="h-[6px] w-full bg-gradient-to-r from-[#0018dc] to-[#15d1ff]"></div>

          <div class="flex h-full flex-col p-5 sm:px-[22px] sm:pt-6 sm:pb-[22px]">
            <div
              class="mb-3 inline-flex w-fit rounded-full bg-[rgba(21,209,255,0.10)] px-[10px] py-[6px] text-[11px] font-bold uppercase tracking-[0.12em] text-[#0018dc]">
              Case Study Result
            </div>

            <h2 class="mb-3 text-[22px] font-semibold leading-[1.1] text-[#0018dc] sm:text-[24px] lg:text-[28px]">
              4.5+ years of reliable vapor recovery
            </h2>

            <p class="mb-[18px] text-sm leading-[1.6] text-[#5f6f8a] sm:text-[15px]">
              A southern Alberta producer used Fluidstream’s VaporCommander™ to capture tank vapors,
              reduce emissions, and avoid the maintenance burden commonly associated with conventional
              VRU systems.
            </p>

            <div class="mb-[18px] grid grid-cols-1 gap-3 sm:grid-cols-2">
              <div class="rounded-2xl border border-[rgba(19,35,63,0.10)] bg-[#fbfdff] px-[14px] pt-[14px] pb-3">
                <div class="mb-1.5 text-[28px] font-bold leading-none text-[#0018dc]">
                  35
                </div>
                <div class="text-xs leading-[1.4] text-[#5f6f8a]">
                  months before first seal change
                </div>
              </div>

              <div class="rounded-2xl border border-[rgba(19,35,63,0.10)] bg-[#fbfdff] px-[14px] pt-[14px] pb-3">
                <div class="mb-1.5 text-[28px] font-bold leading-none text-[#0018dc]">
                  1
                </div>
                <div class="text-xs leading-[1.4] text-[#5f6f8a]">
                  seal change over reported operating life
                </div>
              </div>
            </div>

            <blockquote
              class="rounded-2xl border-l-4 border-l-[#15d1ff] bg-gradient-to-b from-[rgba(21,209,255,0.08)] to-[rgba(0,24,220,0.03)] px-[18px] py-[18px] pl-5 text-sm leading-[1.65] text-[#13233f] sm:text-[15px]">
              “To date, with the exception of the seal change after 35 months, the unit has not had any failures or
              service issues in more than 4.5 years of operation.”
              <strong class="mt-[10px] block text-[13px] font-bold uppercase tracking-[0.04em] text-[#0018dc]">
                Fluidstream Case Study
              </strong>
            </blockquote>

            <div
              class="mt-auto flex flex-col gap-4 border-t border-[rgba(19,35,63,0.10)] pt-4 sm:mt-[18px] sm:flex-row sm:items-center sm:justify-between">
              <div class="text-xs leading-[1.45] text-[#5f6f8a] sm:max-w-[220px]">
                Website-ready HTML box for homepage, landing page, or insights section.
              </div>

              <a href="{{ route('case-studies.reliable-vapor-recovery') }}"
                class="group inline-flex shrink-0 items-center font-bold text-[#0018dc] transition duration-300 hover:text-[#15d1ff]">
                Read full case study
                <span class="ml-1 transition-transform duration-300 group-hover:translate-x-1">→</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <section class="cta-section" id="cta" class="section-vapor-recovery">
    <div class="wrap py-12">
      <div class="cta-panel">
        <div class="section-kicker" style="color:#9edbff;">6. Call to action</div>
        <h2>See whether Fluidstream can unlock vapor recovery on your site.</h2>
        <p class="lead">
          If your application includes liquids, unstable flow, slugs, H2S, sand, or variable gas quality, a gas-only VRU
          may not be the
          strongest answer. Talk with Fluidstream about a vapor recovery approach designed for real multiphase conditions.
        </p>
        <div class="cta-row">
          <a class="btn btn-primary"
            href="mailto:info@fluidstream.com?subject=Fluidstream%20Vapor%20Recovery%20Inquiry">Request an Evaluation</a>
          <a class="btn btn-secondary" href="#specs">Review Specifications</a>
        </div>
      </div>
    </div>
  </section>

@endsection