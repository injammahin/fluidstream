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

  * { box-sizing: border-box; }

  html { scroll-behavior: smooth; }

  body {
    margin: 0;
    font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    color: var(--text);
    background: #fff;
    line-height: 1.5;
  }

  a { text-decoration: none; }

  .container {
    width: min(1180px, calc(100% - 48px));
    margin: 0 auto;
  }

  .section { border-bottom: 1px solid var(--line); }

  .hero {
    position: relative;
    overflow: hidden;
    color: white;
    background: var(--fs-blue);
    border-bottom: 1px solid var(--fs-blue-dark);
  }

  .hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(90deg, rgba(0,24,220,.88), rgba(0,24,220,.72)),
      url('https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?auto=format&fit=crop&w=1800&q=80');
    background-size: cover;
    background-position: center;
  }

  .hero-inner {
    position: relative;
    padding: 110px 0 96px;
    display: grid;
    grid-template-columns: 1.2fr .8fr;
    gap: 48px;
    align-items: end;
  }

  .eyebrow {
    display: inline-block;
    margin-bottom: 18px;
    padding: 8px 14px;
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 999px;
    color: rgba(255,255,255,.9);
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
    color: rgba(255,255,255,.82);
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

  .btn:hover { transform: translateY(-1px); }

  .btn-primary {
    background: white;
    color: var(--fs-blue);
  }

  .btn-secondary {
    color: white;
    border: 1px solid rgba(255,255,255,.28);
    background: rgba(255,255,255,.05);
    backdrop-filter: blur(6px);
  }

  .hero-panel {
    border: 1px solid rgba(255,255,255,.14);
    background: rgba(255,255,255,.08);
    backdrop-filter: blur(10px);
    border-radius: 30px;
    padding: 26px;
    box-shadow: 0 10px 40px rgba(0,0,0,.18);
  }

  .panel-grid { display: grid; gap: 16px; }

  .mini-card {
    padding: 20px;
    border-radius: 24px;
    border: 1px solid rgba(255,255,255,.14);
    background: rgba(255,255,255,.06);
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
    color: rgba(255,255,255,.75);
    font-size: 13px;
  }

  .mini-copy {
    margin-top: 8px;
    font-size: 18px;
    font-weight: 600;
  }

  .content-pad { padding: 78px 0; }

  .split {
    display: grid;
    grid-template-columns: .95fr 1.05fr;
    gap: 56px;
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

  .body-lg p { margin: 0 0 18px; }

  .soft { background: var(--bg-soft); }

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
    box-shadow: 0 8px 28px rgba(15,23,42,.04);
  }

  .compare-card.highlight {
    border-color: rgba(21,209,255,.65);
    background: linear-gradient(180deg, #f7fdff 0%, #eefbff 100%);
  }

  .compare-card .title {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .18em;
    font-weight: 700;
    color: #64748b;
  }

  .compare-card.highlight .title { color: var(--fs-blue); }

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
    border-color: rgba(21,209,255,.85);
    color: var(--fs-blue);
  }

  .arrow {
    color: #94a3b8;
    font-size: 18px;
    font-weight: 700;
  }

  .compare-card.highlight .arrow { color: var(--fs-cyan); }

  .compare-card p {
    margin: 28px 0 0;
    color: var(--muted);
    font-size: 15px;
    line-height: 1.8;
  }

  .cta {
    background: var(--fs-blue);
    color: white;
  }

  .cta-wrap {
    display: grid;
    grid-template-columns: 1.1fr .9fr;
    gap: 28px;
    align-items: end;
    padding: 86px 0;
  }

  .cta p {
    color: #dbeafe;
    font-size: 18px;
    max-width: 760px;
  }

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
    color: white;
    border: 1px solid rgba(255,255,255,.3);
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
    box-shadow: 0 16px 34px rgba(21,209,255,.08);
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
    color:#000000 ;
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
    color: rgba(255,255,255,.92);
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
</style>

<section class="hero section">
  <div class="container hero-inner">
    <div>
      <span class="eyebrow">Fluidstream Technology</span>
      <h1>Multiphase Compression</h1>
      <p class="lead">Move unprocessed production streams with fewer constraints, lower cost, and reduced infrastructure.</p>
      <p class="sub">Fluidstream enables operators to compress gas, liquids, and solids together—reducing reliance on traditional separation-first facility design and expanding where multiphase technology can be economically deployed.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="#technology">Explore Technology</a>
        <a class="btn btn-secondary" href="#applications">View Applications</a>
      </div>
    </div>

    <div class="hero-panel">
      <div class="panel-grid">
        <div class="mini-card">
          <div class="mini-label">Core Outcome</div>
          <div class="mini-title">Simplified production systems</div>
        </div>
        <div class="two-up">
          <div class="mini-card">
            <div class="mini-desc">Traditional</div>
            <div class="mini-copy">Separator-first infrastructure</div>
          </div>
          <div class="mini-card">
            <div class="mini-desc">Fluidstream</div>
            <div class="mini-copy">Flow-through production approach</div>
          </div>
        </div>
      </div>
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
        <p>Conventional oil and gas facilities are built around separation. Production is processed through multiple stages—separators, tanks, scrubbers, and compressors—before gas can be transported. That approach increases capital cost, expands footprint, and introduces operational constraints.</p>
        <p>Fluidstream takes a different approach. Our multiphase compression technology enables operators to move mixed production streams directly—simplifying infrastructure while improving performance across a wide range of operating conditions.</p>
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
            <p class="reveal-card__panel-text">Reduce or remove separators, tanks, scrubbers, and flare-dependent process steps.</p>
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
            <p class="reveal-card__panel-text">Minimize capital investment, installation complexity, and lifecycle maintenance burden.</p>
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
            <p class="reveal-card__panel-text">Maintain performance across changing flow conditions, liquid slugs, and unstable production.</p>
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
            <p class="reveal-card__panel-text">Capture gas that would otherwise be flared or vented and convert it into useful production value.</p>
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
        <p>Multiphase compression allows gas and liquids to be compressed simultaneously without prior separation. In traditional systems, gas must be isolated and conditioned before entering a compressor. Liquid carryover creates risk, inefficiency, and reliability issues.</p>
        <p>Fluidstream systems are designed to operate directly on mixed-phase flow, handling gas, oil, and water combinations, high liquid content streams, slugging conditions, and solids entrainment. This enables a shift from separation-driven systems to simplified flow-through production systems.</p>
      </div>
    </div>
  </div>
</section>

<section class="section soft">
  <div class="container content-pad">
    <p class="section-label">System comparison</p>
    <h2>Simplifying the production system</h2>

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
        <p>High equipment count, larger footprint, more interconnections, and more potential failure points across the facility.</p>
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
        <p>Reduced infrastructure, simplified operation, lower cost structure, and broader applicability across challenging field conditions.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container content-pad">
    <div class="split">
      <div>
        <p class="section-label">Economic advantage</p>
        <h2>Lower cost. Broader deployment.</h2>
        <div class="body-lg" style="margin-top:22px;">
          <p>Conventional multiphase technologies are often limited to high-value applications because their capital cost and maintenance complexity restrict where they can be economically deployed.</p>
          <p>Fluidstream delivers a lower-cost, lower-maintenance system, enabling operators to apply multiphase technology across more wells, pads, and facilities where the economics are stronger and the value case is easier to justify.</p>
        </div>
      </div>

      <div class="cards-4" style="grid-template-columns:1fr 1fr; gap:22px;">
        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Lower capital cost</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Lower capital cost</h3>
              <p class="reveal-card__panel-text">Simplified system design reduces upfront investment compared with conventional multiphase solutions.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Reduced maintenance</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Reduced maintenance</h3>
              <p class="reveal-card__panel-text">Fewer wear-sensitive elements and a simpler system architecture decrease service frequency and lifecycle costs.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Expanded applications</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Expanded applications</h3>
              <p class="reveal-card__panel-text">Improved economics allow deployment beyond niche or premium projects and into standard wellsites, pads, and facilities.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Higher ROI</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Higher ROI</h3>
              <p class="reveal-card__panel-text">Lower capital and operating costs support stronger returns across the asset lifecycle.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="applications" class="section soft">
  <div class="container content-pad">
    <div class="split">
      <div>
        <p class="section-label">Applications</p>
        <h2>Where it creates value</h2>
        <div class="body-lg" style="margin-top:22px;">
          <p>Fluidstream multiphase compression can be deployed across upstream and midstream operations where conventional systems introduce cost, complexity, or performance limitations.</p>
        </div>
      </div>

      <div class="apps-grid">
        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Casing gas compression</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Casing gas compression</h3>
              <p class="reveal-card__panel-text">Handle low-pressure gas streams with entrained liquids without full separation.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Vapor recovery</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Vapor recovery</h3>
              <p class="reveal-card__panel-text">Recover tank vapors with variable composition and liquid carryover.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Multiphase gathering</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Multiphase gathering</h3>
              <p class="reveal-card__panel-text">Transport combined production streams from wells to centralized facilities.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Early production systems</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Early production systems</h3>
              <p class="reveal-card__panel-text">Enable rapid deployment with minimal infrastructure requirements.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Flare gas reduction</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Flare gas reduction</h3>
              <p class="reveal-card__panel-text">Capture and monetize gas that would otherwise be wasted.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Remote operations</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Remote operations</h3>
              <p class="reveal-card__panel-text">Reduce maintenance and infrastructure in hard-to-access locations.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Brownfield optimization</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Brownfield optimization</h3>
              <p class="reveal-card__panel-text">Increase throughput without expanding existing facility footprint.</p>
            </div>
          </div>
        </a>

        <a href="#" class="reveal-card">
          <div class="reveal-card__base">
            <h3 class="reveal-card__title">Mature and high water cut wells</h3>
          </div>
          <div class="reveal-card__panel">
            <div>
              <h3 class="reveal-card__panel-title">Mature and high water cut wells</h3>
              <p class="reveal-card__panel-text">Maintain performance in challenging late-life production conditions.</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="cta">
  <div class="container cta-wrap">
    <div>
      <p class="section-label" style="color:#7dd3fc;">Next step</p>
      <h2 style="color:white;">Simplify your production system</h2>
      <p>Evaluate how Fluidstream multiphase compression can reduce cost, eliminate equipment, and improve production performance across your operations.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-accent" href="#">Request Technical Review</a>
      <a class="btn btn-outline-light" href="#">Contact Engineering</a>
    </div>
  </div>
</section>
@endsection