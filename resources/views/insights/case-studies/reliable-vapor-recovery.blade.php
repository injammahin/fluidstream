@extends('layouts.app')

@section('content')

    <style>
      :root {
        --blue:#0018dc;
        --cyan:#15d1ff;
        --ink:#10213a;
        --muted:#5b6b84;
        --bg:#f5f9ff;
        --white:#ffffff;
        --line:rgba(16,33,58,.10);
      }
      * { box-sizing:border-box; }
      body {
        margin:0;
        font-family: Arial, Helvetica, sans-serif;
        color:var(--ink);
        background:linear-gradient(180deg, #eef6ff 0%, #ffffff 42%, #f7fbff 100%);
        line-height:1.65;
      }
      .hero {
        position:relative;
        overflow:hidden;
        background:
          radial-gradient(circle at top right, rgba(21,209,255,.25), transparent 28%),
          linear-gradient(135deg, rgba(0,24,220,.97), rgba(0,24,220,.88) 54%, rgba(21,209,255,.82));
        color:white;
        padding:78px 24px 84px;
      }
      .hero:after {
        content:"";
        position:absolute;
        right:-120px; top:-40px;
        width:360px; height:360px;
        border-radius:50%;
        background:rgba(255,255,255,.08);
        filter:blur(4px);
      }
      .wrap { max-width:1120px; margin:0 auto; }
      .kicker {
        display:inline-block;
        letter-spacing:.14em;
        font-size:12px;
        text-transform:uppercase;
        padding:8px 12px;
        border:1px solid rgba(255,255,255,.25);
        border-radius:999px;
        margin-bottom:22px;
        background:rgba(255,255,255,.08);
      }
      h1 {
        font-size:54px;
        line-height:1.05;
        max-width:900px;
        margin:0 0 18px 0;
      }
      .sub {
        max-width:820px;
        font-size:20px;
        color:rgba(255,255,255,.92);
        margin:0 0 30px 0;
      }
      .hero-grid {
        display:grid;
        grid-template-columns:1.3fr .85fr;
        gap:28px;
        align-items:end;
      }
      .fact-panel {
        background:rgba(255,255,255,.12);
        border:1px solid rgba(255,255,255,.18);
        backdrop-filter: blur(8px);
        border-radius:24px;
        padding:24px;
      }
      .fact-panel h3 {
        margin:0 0 14px 0;
        font-size:18px;
      }
      .metrics {
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:16px;
      }
      .metric {
        background:rgba(255,255,255,.08);
        border-radius:18px;
        padding:16px;
        min-height:120px;
      }
      .metric .num {
        font-size:34px;
        font-weight:700;
        margin-bottom:6px;
      }
      .cta-row {
        display:flex;
        gap:14px;
        flex-wrap:wrap;
        margin-top:22px;
      }
      .btn {
        text-decoration:none;
        display:inline-block;
        padding:14px 18px;
        border-radius:999px;
        font-weight:700;
      }
      .btn-primary {
        background:white;
        color:var(--blue);
      }
      .btn-secondary {
        border:1px solid rgba(255,255,255,.3);
        color:white;
        background:rgba(255,255,255,.07);
      }
      .summary-strip {
        margin-top:-34px;
        position:relative;
        z-index:2;
        padding:0 24px;
      }
      .summary-card {
        max-width:1120px;
        margin:0 auto;
        background:white;
        border:1px solid var(--line);
        border-radius:26px;
        box-shadow:0 24px 80px rgba(16,33,58,.10);
        padding:26px 28px;
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:20px;
      }
      .summary-item {
        padding:8px 10px;
        border-right:1px solid var(--line);
      }
      .summary-item:last-child { border-right:none; }
      .summary-label {
        font-size:12px;
        letter-spacing:.12em;
        text-transform:uppercase;
        color:var(--muted);
        margin-bottom:8px;
      }
      .summary-value {
        font-size:18px;
        font-weight:700;
        line-height:1.35;
      }
      .section {
        padding:38px 24px;
      }
      .section-inner {
        max-width:980px;
        margin:0 auto;
        background:rgba(255,255,255,.82);
        border:1px solid rgba(16,33,58,.07);
        border-radius:24px;
        padding:34px 38px;
        box-shadow:0 12px 40px rgba(16,33,58,.04);
      }
      .eyebrow {
        font-size:12px;
        letter-spacing:.15em;
        text-transform:uppercase;
        color:var(--cyan);
        font-weight:700;
        margin-bottom:12px;
      }
      h2 {
        font-size:34px;
        line-height:1.15;
        margin:0 0 16px 0;
        color:var(--blue);
      }
      p {
        margin:0;
        font-size:18px;
        color:var(--ink);
      }
      p + p { margin-top:16px; }
      .footer-cta {
        padding:24px;
      }
      .footer-box {
        max-width:1120px;
        margin:0 auto 60px auto;
        border-radius:26px;
        background:linear-gradient(135deg, #0a1e57, #0736bf 58%, #15d1ff);
        color:white;
        padding:34px 36px;
        box-shadow:0 20px 60px rgba(0,24,220,.22);
      }
      .footer-box h3 {
        font-size:34px;
        margin:0 0 10px 0;
      }
      .footer-box p {
        color:rgba(255,255,255,.92);
        font-size:18px;
        max-width:840px;
      }
      .mini {
        margin-top:18px;
        font-size:14px;
        color:rgba(255,255,255,.80);
      }
      @media (max-width:900px) {
        .hero-grid, .summary-card {
          grid-template-columns:1fr;
        }
        .summary-item {
          border-right:none;
          border-bottom:1px solid var(--line);
        }
        .summary-item:last-child {
          border-bottom:none;
        }
        h1 { font-size:40px; }
        .section-inner { padding:26px 22px; }
        p { font-size:17px; }
      }
    </style>

    <header class="hero">
      <div class="wrap hero-grid">
        <div>
          <div class="kicker">Fluidstream | Case Study</div>
          <h1>Multiphase Vapor Recovery Case Study</h1>
          <p class="sub">Low-cost, low-maintenance VaporCommander™ provides reliable gas capture while reducing emissions</p>
          <div class="cta-row">
            <a class="btn btn-primary" href="https://www.fluidstream.co">Visit Fluidstream</a>
            <a class="btn btn-secondary" href="mailto:sales@fluidstream.co">Contact Sales</a>
          </div>
        </div>
        <aside class="fact-panel">
          <h3>Performance highlights</h3>
          <div class="metrics">
            <div class="metric">
              <div class="num">4.5+</div>
              <div>Years of operation</div>
            </div>
            <div class="metric">
              <div class="num">35</div>
              <div>Months before first seal change</div>
            </div>
            <div class="metric">
              <div class="num">1</div>
              <div>Seal change over reported operating life</div>
            </div>
            <div class="metric">
              <div class="num">0</div>
              <div>Cold-weather operating issues reported</div>
            </div>
          </div>
        </aside>
      </div>
    </header>

    <section class="summary-strip">
      <div class="summary-card">
        <div class="summary-item">
          <div class="summary-label">Application</div>
          <div class="summary-value">Tank vapor recovery at an oil battery in southern Alberta</div>
        </div>
        <div class="summary-item">
          <div class="summary-label">Key Challenge</div>
          <div class="summary-value">Variable gas flow, liquids in the stream, and demanding field conditions</div>
        </div>
        <div class="summary-item">
          <div class="summary-label">Selected Solution</div>
          <div class="summary-value">Fluidstream VaporCommander™ multiphase vapor recovery unit</div>
        </div>
        <div class="summary-item">
          <div class="summary-label">Business Outcome</div>
          <div class="summary-value">Reliable gas capture with low maintenance and reduced emissions</div>
        </div>
      </div>
    </section>
  
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Executive Summary</h2>
        <p>An Alberta, Canada-based oil and gas producer needed a practical way to capture tank vapors, reduce methane emissions, and improve operating economics without introducing a complicated, maintenance-heavy compression package. The application demanded a system that could handle variable gas flow, fluctuating pressures, and the presence of liquids in the inlet stream. Traditional vapor recovery approaches often struggle under these conditions because they are designed primarily for dry gas service and tend to require upstream separation, additional equipment, and frequent attention from field personnel.</p><p>Fluidstream’s VaporCommander™ multiphase vapor recovery technology was selected because it offered a lower-cost and lower-maintenance alternative that could tolerate multiphase conditions directly. Installed in southern Alberta in July 2021, the unit demonstrated long-term reliability with minimal intervention. Over more than 4.5 years of operation, the system required only one seal change after 35 months, with no ongoing pattern of failures, no recurring service burden, and no operating issues tied to cold weather. The result is a strong example of how multiphase vapor recovery can help producers reduce emissions, improve uptime, and capture gas that would otherwise be lost.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Background</h2>
        <p>Oil and gas producers continue to face increasing pressure to reduce methane emissions from production sites, tank batteries, and associated handling infrastructure. In many applications, tanks that store oil from newly drilled wells also produce associated gas. If that gas is not captured and directed into a useful outlet, it may be vented or flared. That creates both a regulatory problem and an economic loss, since the producer is giving up a potentially recoverable hydrocarbon stream.</p><p>For operators, the ideal vapor recovery solution must do more than satisfy emissions requirements. It must also fit the economics of the site, tolerate real field conditions, and avoid becoming another source of downtime and service cost. This is especially important in Western Canada, where weather, remoteness, and widely varying production conditions can expose weaknesses in conventional equipment. A reliable system must therefore be capable of consistent operation across changing pressures, flow rates, and environmental conditions while keeping maintenance demands low enough to remain economically attractive.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>The Challenge</h2>
        <p>Vapor recovery applications are difficult because the gas stream is rarely perfectly clean, dry, or stable. In practice, gas from oil storage tanks can come with entrained liquids, intermittent flow, and operating swings that put conventional vapor recovery units under stress. Those conditions become even more difficult when discharge pressure is high, gas flow suddenly stops, or ambient temperatures move through large seasonal extremes.</p><p>Liquids are one of the most serious challenges in conventional VRU service. In many traditional compressor systems, liquids can cause hydraulic lock or liquid slugging because the equipment is intended to compress gas, not liquid. The result can be broken valves, bent rods, damaged bearings, and broader mechanical failure. Even when the damage is less dramatic, liquid carryover can contaminate lubricating oil, degrade system performance, and increase the frequency of service events. To reduce that risk, operators often add separators and supporting equipment upstream of the compressor. That can work, but it also adds capital cost, increases installation complexity, and creates more maintenance points in the system.</p><p>For the Alberta producer in this case, the need was clear: they required a vapor recovery solution that could handle real-world variability without depending on extensive inlet conditioning or becoming a constant maintenance concern in the field.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>The Fluidstream Solution</h2>
        <p>Fluidstream’s patented VaporCommander™ was selected because it addressed the core weaknesses of conventional VRU systems. Unlike gas-only compression technologies that depend on keeping liquids out of the machine, VaporCommander™ is designed for multiphase operation. That means it can tolerate the presence of liquids in the inlet stream rather than relying on the operator to remove them first through a more elaborate process arrangement.</p><p>The unit was installed at an oil battery in southern Alberta in July 2021. Its value proposition was straightforward and practical. First, it provided a cost-effective way to capture gas and reduce emissions. Second, its multiphase operating capability reduced the need for separate liquid removal equipment ahead of the unit. Third, its design and operating methodology enabled it to handle difficult process conditions that commonly challenge conventional VRU packages. This combination of lower system complexity and higher tolerance for field variability made it a strong fit for the producer’s application.</p><p>From an operations standpoint, this matters because simpler systems generally create fewer failure points. A vapor recovery package that does not depend on oil-flooded operation, extensive separation, or frequent mechanical intervention can deliver a lower total cost of ownership over time. In this case, that was one of the defining advantages of the deployment.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Operational Performance</h2>
        <p>The performance of the VaporCommander™ installation is the central result of this case study. Over the first 35 months of operation, the unit experienced no failures and no routine maintenance or service issues, aside from the replacement of a water-damaged electronic component caused by a loose bolt. That event was not a core process failure and did not represent a broader reliability issue with the machine itself.</p><p>Equally important, there were no stoppages, failures, or operating problems associated with cold weather during the life of the unit. That matters in Alberta, where winter conditions can expose operational weaknesses and drive service costs upward for equipment that is sensitive to low temperatures or variable inlet conditions.</p><p>The first seal change was performed after 35 months of use. Since that maintenance event, the unit has continued running and has now exceeded 4.5 years of operation with only that single seal change. To date, aside from that one planned wear-component replacement, the system has not experienced recurring failures or service issues. For a vapor recovery application handling variable tank vapors in the field, that level of runtime is a meaningful proof point.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Why the Maintenance Profile Matters</h2>
        <p>Maintenance is often where the economics of a vapor recovery system are won or lost. A unit may appear viable on paper, but if it requires frequent inspection, separator cleanout, oil management, repeated seal work, or repeated troubleshooting after process upsets, its real-world economics can deteriorate quickly. This is particularly true for remote operations or smaller sites where every callout adds disproportionate cost.</p><p>The VaporCommander™ maintenance profile stands out because it demonstrates sustained field performance without the recurring burden that often comes with conventional compressor-based VRU systems. By operating as a multiphase machine and avoiding dependence on oil-flooded operation or extensive inlet separation, it reduces the number of things that can go wrong when the gas stream contains liquids or when operating conditions shift suddenly. The result is not merely fewer service events, but a more predictable operating asset that requires less operator attention.</p><p>That low-maintenance profile also expands the range of sites where vapor recovery can make economic sense. When maintenance intensity drops and the system architecture is simplified, producers can justify gas capture on applications that might otherwise be ignored as too costly or too troublesome for traditional solutions.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Economic and Environmental Impact</h2>
        <p>The economic case for vapor recovery improves substantially when the equipment can capture gas without bringing a large maintenance penalty with it. In this application, the producer was able to recover gas that would otherwise be vented, turning an emissions problem into a revenue opportunity. Because the system was also selected on the basis of cost effectiveness, the project supported compliance and economics at the same time rather than forcing the operator to choose between them.</p><p>On the environmental side, reducing methane emissions remains one of the most important near-term actions available to upstream operators seeking to improve performance and comply with evolving regulatory expectations. Capturing vapor rather than venting it directly reduces emissions intensity at the site. When the solution can do so reliably for years with minimal intervention, the environmental result is more dependable because it does not rely on a fragile or maintenance-sensitive setup.</p><p>This is where lower-maintenance multiphase vapor recovery becomes particularly compelling. It enables operators to approach vapor capture as a durable field solution rather than an engineering compromise that is constantly at risk of upset or failure.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Conclusion</h2>
        <p>This case study shows that Fluidstream’s VaporCommander™ can provide a practical and durable alternative to conventional vapor recovery approaches in demanding oil and gas applications. By handling multiphase conditions directly, the system reduces reliance on added inlet separation and avoids many of the maintenance issues that can make traditional VRUs expensive to operate.</p><p>Installed in July 2021 at a southern Alberta oil battery, the unit has now operated for more than 4.5 years with only one seal change after 35 months and no broader pattern of failures or service disruptions. It delivered reliable gas capture, supported emissions reduction, and did so with a maintenance profile that strengthens the economic case for deployment.</p><p>For producers seeking a lower-cost, lower-maintenance way to recover vapor and reduce methane emissions, this deployment provides a clear real-world example of the value that multiphase vapor recovery technology can deliver.</p>
      </div>
    </section>
    
    <section class="section">
      <div class="section-inner">
        <div class="eyebrow">CASE STUDY SECTION</div>
        <h2>Contact</h2>
        <p>To learn more about VaporCommander™ and discuss a vapor recovery application, visit www.fluidstream.co or contact sales@fluidstream.co.</p>
      </div>
    </section>
    
    <section class="footer-cta">
      <div class="footer-box">
        <h3>Looking for a lower-maintenance vapor recovery approach?</h3>
        <p>Fluidstream’s multiphase operating philosophy is built for demanding field conditions where conventional gas-only equipment can become complex, failure-prone, or uneconomic. Discuss your application with the Fluidstream team.</p>
        <div class="cta-row">
          <a class="btn btn-primary" href="https://www.fluidstream.co">Explore Fluidstream</a>
          <a class="btn btn-secondary" href="mailto:sales@fluidstream.co">Request a discussion</a>
        </div>
        <div class="mini">Prepared from the supplied case study content and expanded into a website-ready format.</div>
      </div>
    </section>

@endsection