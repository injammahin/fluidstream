@extends('layouts.app')

@section('content')

  <style>
    :root {
      --fs-blue: #0018dc;
      --fs-cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #475569;
      --line: #dbe4f0;
      --bg: #f7fbff;
      --card: #ffffff;
      --dark: #061a40;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      color: var(--ink);
      background: #ffffff;
      line-height: 1.6;
    }

    .container {
      width: min(1180px, calc(100% - 48px));
      margin: 0 auto;
    }

    .eyebrow {
      letter-spacing: 0.14em;
      text-transform: uppercase;
      font-size: 12px;
      font-weight: 700;
      color: var(--fs-blue);
      margin-bottom: 16px;
    }

    h1,
    h2,
    h3,
    p {
      margin-top: 0;
    }

    h1 {
      font-size: clamp(25px, 5vw, 58px);
      line-height: 0.98;
      letter-spacing: -0.04em;
      margin-bottom: 24px;
      max-width: 920px;
    }

    h2 {
      font-size: clamp(30px, 4vw, 52px);
      line-height: 1.04;
      letter-spacing: -0.03em;
      margin-bottom: 24px;
    }

    h3 {
      font-size: 24px;
      line-height: 1.15;
      margin-bottom: 16px;
    }

    p {
      font-size: 18px;
      color: var(--muted);
      margin-bottom: 18px;
    }

    .section {
      padding: 96px 0;
    }

    .hero {
      position: relative;
      overflow: hidden;

      border-bottom: 1px solid var(--line);
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 42px;
      align-items: center;
      min-height: 92vh;
      padding: 56px 0 64px;
    }

    .lead {
      font-size: clamp(18px, 2vw, 22px);
      max-width: 760px;
      color: #243b53;
      margin-bottom: 28px;
    }

    .hero-meta {
      display: grid;
      grid-template-columns: repeat(2, minmax(180px, 1fr));
      gap: 16px;
      margin-top: 34px;
      max-width: 700px;
    }

    .meta-card {
      background: rgba(255, 255, 255, 0.85);
      border: 1px solid rgba(0, 24, 220, 0.10);
      border-radius: 12px;
      padding: 18px 18px 16px;
      backdrop-filter: blur(8px);
    }

    .meta-label {
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: var(--fs-blue);
      font-weight: 700;
      margin-bottom: 6px;
    }

    .meta-value {
      font-size: 18px;
      color: var(--ink);
      font-weight: 700;
      line-height: 1.3;
    }

    .hero-panel {
      background: linear-gradient(180deg, #ffffff 0%, #f4fbff 100%);
      border: 1px solid rgba(0, 24, 220, 0.10);
      border-radius: 12px;
      box-shadow: 0 22px 70px rgba(9, 30, 66, 0.12);
      overflow: hidden;
    }

    .hero-image-wrap {
      position: relative;
    }

    .hero-image-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .hero-panel-copy {
      padding: 28px 28px 30px;
    }

    .hero-panel-copy p {
      font-size: 16px;
      margin-bottom: 0;
    }

    .stats-strip {
      background: #1029ea;
      color: #ffffff;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0;
    }

    .stat {
      padding: 34px 18px;
      border-right: 1px solid rgba(255, 255, 255, 0.08);
    }

    .stat:last-child {
      border-right: 0;
    }

    .stat-number {
      display: block;
      font-size: clamp(34px, 4vw, 54px);
      line-height: 1;
      letter-spacing: -0.04em;
      font-weight: 800;
      margin-bottom: 12px;
      color: #ffffff;
    }

    .stat-label {
      font-size: 14px;
      color: rgba(255, 255, 255, 0.78);
      text-transform: uppercase;
      letter-spacing: 0.12em;
      font-weight: 700;
    }

    .two-col {
      display: grid;
      grid-template-columns: 0.95fr 1.05fr;
      gap: 54px;
      align-items: start;
    }

    .sticky-note {
      position: sticky;
      top: 24px;
      /* background: linear-gradient(180deg, #f7fbff 0%, #edf8ff 100%); */
      border: 1px solid rgba(0, 24, 220, 0.10);
      border-radius: 12px;
      padding: 30px;
    }

    .sticky-note .small {
      font-size: 14px;
      color: var(--muted);
    }

    .impact-card-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 18px;
      margin-top: 30px;
    }

    .impact-card {
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: 12px;
      padding: 24px;
      box-shadow: 0 10px 32px rgba(9, 30, 66, 0.05);
    }

    .impact-card h3 {
      margin-bottom: 12px;
      font-size: 22px;
    }

    .impact-card p {
      font-size: 16px;
      margin-bottom: 0;
    }

    .process {
      background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
      border-top: 1px solid var(--line);
      border-bottom: 1px solid var(--line);
    }

    .process-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 22px;
      margin-top: 34px;
    }

    .step {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 12px;
      padding: 26px;
      box-shadow: 0 10px 32px rgba(9, 30, 66, 0.04);
    }

    .step-num {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      display: inline-grid;
      place-items: center;
      background: linear-gradient(135deg, var(--fs-blue), var(--fs-cyan));
      color: #fff;
      font-weight: 800;
      margin-bottom: 18px;
    }

    .quote {
      background: radial-gradient(circle at top right, rgba(21, 209, 255, 0.22), transparent 22%), linear-gradient(180deg, #1029ea 0%, #1029ea 100%);
      color: #fff;
    }

    .quote-wrap {
      max-width: 900px;
    }

    .quote blockquote {
      margin: 0 0 22px;
      font-size: clamp(26px, 3.2vw, 42px);
      line-height: 1.18;
      letter-spacing: -0.03em;
      color: #fff;
    }

    .quote cite {
      font-style: normal;
      color: rgba(255, 255, 255, 0.78);
      font-size: 16px;
    }

    .cta {
      text-align: center;
      background: linear-gradient(180deg, #ffffff 0%, #eef9ff 100%);
    }

    .cta-box {
      background: #fff;
      border: 1px solid rgba(0, 24, 220, 0.10);
      border-radius: 12px;
      padding: 42px;
      margin: 0 auto;
    }

    .button {
      display: inline-block;
      margin-top: 14px;
      padding: 16px 24px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      color: #fff;
      background: linear-gradient(135deg, var(--fs-blue), #2442ff 60%, var(--fs-cyan));
      box-shadow: 0 14px 34px rgba(0, 24, 220, 0.24);
    }

    .divider {
      width: 72px;
      height: 4px;
      border-radius: 999px;
      background: linear-gradient(90deg, var(--fs-blue), var(--fs-cyan));
      margin: 0 0 24px;
    }

    .footer {
      padding: 24px 0 44px;
      color: #64748b;
      font-size: 14px;
      text-align: center;
    }

    @media (max-width: 980px) {

      .hero-grid,
      .two-col,
      .process-grid {
        grid-template-columns: 1fr;
      }

      .stats {
        grid-template-columns: repeat(2, 1fr);
      }

      .stat:nth-child(2) {
        border-right: 0;
      }

      .impact-card-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 640px) {
      .container {
        width: min(100% - 28px, 1180px);
      }

      .section {
        padding: 72px 0;
      }

      .hero-grid {
        min-height: auto;
        padding-top: 34px;
      }

      .stats {
        grid-template-columns: 1fr;
      }

      .stat {
        border-right: 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      }

      .stat:last-child {
        border-bottom: 0;
      }

      .hero-meta {
        grid-template-columns: 1fr;
      }

      .cta-box {
        padding: 30px 22px;
      }
    }
  </style>

  <section class="hero">
    <div class="container">
      <div class="hero-grid">
        <div>
          <div class="eyebrow">Fluidstream Case Study</div>
          <h1>Allied Energy II eliminated gas venting with a lower-maintenance multiphase vapor recovery system.</h1>
          <p class="lead">
            After acquiring a facility with an unreliable conventional VRU, Allied Energy II needed a field-proven
            solution that could operate through variable gas flows, liquid carryover, and extreme winter conditions.
            Fluidstream's VaporCommander™ delivered stable operation, eliminated venting, and did so without the
            maintenance burden commonly associated with conventional vapor recovery equipment.
          </p>

          <div class="hero-meta">
            <div class="meta-card">
              <div class="meta-label">Operator</div>
              <div class="meta-value">Allied Energy II Corp.</div>
            </div>
            <div class="meta-card">
              <div class="meta-label">Application</div>
              <div class="meta-value">Oil storage tank vapor recovery</div>
            </div>
            <div class="meta-card">
              <div class="meta-label">Technology</div>
              <div class="meta-value">VaporCommander™ multiphase VRU</div>
            </div>
            <div class="meta-card">
              <div class="meta-label">Business outcome</div>
              <div class="meta-value">Higher reliability with lower maintenance complexity</div>
            </div>
          </div>
        </div>

        <div class="hero-panel">
          <div class="hero-image-wrap">
            <img src="/img/2270 Rear View.JPG" alt='Fluidstream VaporCommander unit at Allied Energy II site' />
          </div>
          <div class="hero-panel-copy">
            <div class="eyebrow" style="margin-bottom:10px;">Field deployment</div>
            <p>
              Fluidstream replaced a conventional vapor recovery approach with a multiphase system engineered to tolerate
              variable flow composition directly, reducing dependence on auxiliary equipment and minimizing the conditions
              that typically drive downtime and maintenance.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="stats-strip">
    <div class="container">
      <div class="stats">
        <div class="stat">
          <span class="stat-number">100%</span>
          <div class="stat-label">Reported uptime</div>
        </div>
        <div class="stat">
          <span class="stat-number">0</span>
          <div class="stat-label">Maintenance events reported</div>
        </div>
        <div class="stat">
          <span class="stat-number">15+</span>
          <div class="stat-label">Months in service</div>
        </div>
        <div class="stat">
          <span class="stat-number">-40°C</span>
          <div class="stat-label">Operation through extreme winter conditions</div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="two-col">
        <div class="sticky-note">
          <div class="eyebrow">The challenge</div>
          <h3>Conventional VRU performance was limiting reliability, gas capture, and operating efficiency.</h3>
          <p class="small">
            The acquired facility was equipped with a vapor recovery setup that could not consistently operate under real
            field conditions. Flow variability and liquid carryover created repeated operational instability, which meant
            the unit could not reliably capture gas from the tank battery. The result was continued venting, increased
            operator attention, and a system that added complexity without solving the problem it was installed to
            address.
          </p>
        </div>

        <div>
          <div class="divider"></div>
          <h2>A conventional design was being asked to operate outside the narrow conditions it was built for.</h2>
          <p>
            Allied Energy II inherited a site where the existing vapor recovery approach had become a practical
            operational issue. The conventional VRU was expected to run on a relatively clean and stable gas stream, but
            the actual field environment presented variable gas rates, intermittent liquid entrainment, and normal
            operating swings that made that expectation difficult to maintain. Under those conditions, the system was
            unable to sustain dependable operation.
          </p>
          <p>
            That mattered for more than just equipment reliability. When a vapor recovery system cannot remain online, gas
            is not consistently captured, which means both economic value and emissions performance suffer. Instead of
            creating a stable recovery pathway, the previous arrangement introduced operational uncertainty and demanded
            ongoing attention from the operator. The site needed a solution that was not just technically capable on
            paper, but one that could perform in the realities of day-to-day production.
          </p>
          <p>
            The deeper issue was architectural. Conventional systems often depend on multiple support components to
            protect compression equipment from liquids and off-spec flow conditions. Every additional separator, control
            loop, vessel, and intervention point increases complexity and creates more places for the system to falter. At
            this site, complexity was not translating into reliability.
          </p>
        </div>
      </div>

      <div class="impact-card-grid">
        <div class="impact-card">
          <h3>Operational instability</h3>
          <p>
            Variable gas volumes and liquid carryover reduced the ability of the previous VRU to remain online
            consistently, making performance dependent on conditions the site could not reliably control.
          </p>
        </div>
        <div class="impact-card">
          <h3>Gas venting risk</h3>
          <p>
            Unreliable recovery meant gas capture was inconsistent, directly affecting emissions performance and the
            ability to recover product that would otherwise be lost.
          </p>
        </div>
        <div class="impact-card">
          <h3>Maintenance burden</h3>
          <p>
            More equipment and more failure points translated into more troubleshooting, more intervention, and a higher
            total operating burden for the facility.
          </p>
        </div>
        <div class="impact-card">
          <h3>Acquisition integration issue</h3>
          <p>
            The operator needed a practical fix that could improve performance without introducing another complicated
            system that would be costly to own and difficult to support.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section process">
    <div class="container">
      <div class="divider"></div>
      <h2>Why multiphase compression changed the maintenance profile.</h2>
      <p style="max-width: 940px;">
        Fluidstream's VaporCommander™ uses a different operating philosophy from conventional vapor recovery systems.
        Instead of trying to protect the compression process from liquids by adding more equipment around it, the system
        is designed to tolerate mixed flow directly. That matters because the maintenance burden in conventional vapor
        recovery often comes from the gap between what the equipment wants to see and what the field actually delivers.
      </p>
      <div class="process-grid">
        <div class="step">
          <div class="step-num">1</div>
          <h3>It reduces dependence on upstream separation.</h3>
          <p>
            Conventional vapor recovery systems frequently need scrubbers, separators, and related controls to remove
            liquids before gas can be compressed safely. When those pieces are reduced or eliminated, there are simply
            fewer components that can foul, plug, trip, or require service.
          </p>
        </div>
        <div class="step">
          <div class="step-num">2</div>
          <h3>It tolerates variable field conditions better.</h3>
          <p>
            Multiphase compression is better suited to real-world changes in gas rate and flow composition. By handling
            the stream more directly, the system is less exposed to the shutdown cycles and upset conditions that often
            accelerate wear in conventional setups.
          </p>
        </div>
        <div class="step">
          <div class="step-num">3</div>
          <h3>It simplifies the overall operating system.</h3>
          <p>
            Lower maintenance is not only about one machine performing better. It is also about the fact that the site no
            longer depends on a large chain of supporting equipment to keep recovery online. Simpler architecture
            typically means fewer interventions, fewer recurring service tasks, and lower long-term operating effort.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="two-col">
        <div>
          <div class="divider"></div>
          <h2>Fluidstream replaced a fragile recovery approach with a more robust field solution.</h2>
          <p>
            Allied Energy II selected Fluidstream's patented VaporCommander™ because it offered a cost-effective path to
            reliable gas capture without requiring the operator to maintain the same level of system complexity. The core
            value of the technology at this site was not only that it could recover vapor, but that it could continue
            doing so under the actual operating conditions that had defeated the previous system.
          </p>
          <p>
            By using multiphase compression, Fluidstream was able to remove a large part of the mismatch between equipment
            limitations and field reality. The system was built to deal with changing conditions rather than forcing the
            site to condition the stream perfectly before recovery could take place. That directly contributed to more
            stable operation and a lower-maintenance outcome.
          </p>
          <p>
            The deployment also proved durable through harsh Canadian winters. Extreme temperature performance is often
            where reliability claims are tested most severely, especially when a site is already dealing with variable
            process conditions. In this case, the unit continued to operate through temperatures below -40°C, reinforcing
            the benefit of a simpler and more tolerant recovery architecture.
          </p>
        </div>

        <div class="sticky-note">
          <div class="eyebrow">The solution</div>
          <h3>Fluidstream VaporCommander™</h3>
          <p class="small">
            A patented multiphase vapor recovery system designed to handle challenging operating conditions more directly
            than conventional VRUs. At Allied Energy II, the technology delivered gas capture without the recurring
            intervention and maintenance burden that had been associated with the previous setup.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section quote">
    <div class="container">
      <div class="quote-wrap">
        <div class="eyebrow" style="color:#ffffff;">Customer feedback</div>
        <blockquote>
          “Fluidstream's VaporCommander™ unit has operated consistently and eliminated gas venting from our oil storage
          tanks. Importantly, since installation 15 months ago, the unit has provided 100% uptime and has not required any
          maintenance.”
        </blockquote>
        <cite>Richard Grenville, VP Production, Allied Energy II Corp.</cite>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="divider"></div>
      <h2>The result was a recovery system that stayed online and stayed out of the maintenance queue.</h2>
      <p>
        Since installation, the VaporCommander™ has delivered the kind of outcome operators care about most: dependable
        field performance without recurring operational drag. The unit reportedly achieved 100% uptime over more than
        fifteen months of service while requiring no maintenance during that period. That combination is especially
        meaningful in vapor recovery, where reliability issues often appear quickly when a system is poorly matched to the
        stream.
      </p>
      <p>
        Just as importantly, the system eliminated gas venting from the oil storage tanks. That changed the facility's
        performance both economically and operationally. Instead of accepting emissions and lost product as an unavoidable
        consequence of an unreliable VRU, Allied Energy II was able to move to a recovery approach that remained
        functional across normal field variability.
      </p>
      <p>
        The maintenance outcome deserves emphasis. Low maintenance here was not the result of luck or unusually gentle
        operating conditions. It was the result of using a multiphase compression architecture that reduced dependence on
        separators, tolerated liquids more effectively, and removed many of the recurring failure mechanisms that
        conventional systems face in the field. For operators, that translates into fewer service events, less operator
        intervention, and a lower total cost of ownership over time.
      </p>
    </div>
  </section>

  <section class="section cta">
    <div class="container">
      <div class="cta-box">
        <div class="eyebrow">What this demonstrates</div>
        <h2 style="max-width: 760px; margin-left:auto; margin-right:auto;">
          Fluidstream can turn difficult vapor recovery conditions into a simpler, lower-maintenance operating model.
        </h2>
        <p style="max-width: 780px; margin-left:auto; margin-right:auto;">
          For operators dealing with venting, variable gas streams, liquid carryover, and the maintenance burden of
          conventional vapor recovery systems, this case shows how a multiphase approach can improve reliability while
          reducing system complexity.
        </p>
        <a class="button" href="#">Talk to Fluidstream</a>
      </div>
    </div>
  </section>



@endsection