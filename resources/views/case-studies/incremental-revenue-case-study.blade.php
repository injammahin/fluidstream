@extends('layouts.app')

@section('content')
    <style>
        :root {
            --navy: #062b5b;
            --blue: #005eb8;
            --light: #15d1ff;
            --ink: #122033;
            --muted: #5a6b7d;
            --bg: #f5f9fc;
            --card: #ffffff;
            --line: #d7e4ef;
        }

        * {
            box-sizing: border-box;
        }

        .hero {
            background: #1029ea;
            color: #fff;
            padding: 72px 24px 62px;
        }

        .wrap {
            max-width: 1200px;
            margin: 0 auto;
        }

        .kicker {
            letter-spacing: .12em;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            opacity: .9;
            margin-bottom: 14px;
        }

        h1 {
            font-size: clamp(28px, 5vw, 42px);
            line-height: 1.04;
            margin: 0 0 14px;
            max-width: 1200px;
        }

        .hero p.lead {
            max-width: 880px;
            font-size: 18px;
            color: rgba(255, 255, 255, .92);
            margin: 0 0 28px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.45fr .95fr;
            gap: 28px;
            align-items: start;
        }

        .hero-card,
        .stat,
        .section-card,
        .quote-card,
        .cta {
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 12px;
            backdrop-filter: blur(6px);
        }

        .hero-card {
            padding: 22px 24px;
        }

        .hero-card h3 {
            margin: 0 0 10px;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .hero-card p {
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 15px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .stat {
            padding: 18px 16px;
        }

        .stat .num {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.05;
            margin-bottom: 6px;
        }

        .stat .lbl {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .08em;
            opacity: .9;
        }

        .main {
            padding: 34px 24px 70px;
        }

        .grid-m {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 28px;
        }

        .section-card {
            background: var(--card);
            border: 1px solid var(--line);
            box-shadow: 0 14px 36px rgba(13, 38, 76, .06);
            padding: 26px 28px;
        }

        .section-card h2 {
            color: var(--navy);
            margin: 0 0 8px;
            font-size: 28px;
            line-height: 1.15;
        }

        .section-card h3 {
            margin: 18px 0 6px;
            color: var(--blue);
            font-size: 18px;
        }

        .section-card p {
            margin: 0 0 14px;
            color: #203247;
        }

        .section-card ul {
            margin: 0;
            padding-left: 20px;
        }

        .section-card li {
            margin: 0 0 12px;
            color: #203247;
        }

        .quote-card {
            background: linear-gradient(180deg, #1029ea 0%, #1029ea 100%);
            color: #fff;
            padding: 26px 26px 22px;
        }

        .quote-card .quote {
            font-size: 23px;
            line-height: 1.42;
            font-weight: 700;
            margin: 0 0 14px;
        }

        .quote-card .attr {
            color: rgba(255, 255, 255, .82);
            font-size: 18px;
        }

        .side-stack {
            display: grid;
            gap: 20px;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 18px;
        }

        .table th,
        .table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--line);
            vertical-align: top;
        }

        .table th {
            background: #edf6fc;
            color: var(--navy);
            text-align: left;
            font-size: 14px;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: #ffffff;
            color: #1029ea;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .cta {
            margin-top: 26px;
            padding: 26px 28px;
            background: linear-gradient(135deg, #062b5b 0%, #0c4c87 100%);
            color: #fff;
        }

        .cta h2 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .cta p {
            margin: 0 0 16px;
            color: rgba(255, 255, 255, .9);
            max-width: 860px;
        }

        .btns {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 13px 18px;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn.primary {
            background: #15d1ff;
            color: #032c4a;
        }

        .btn.secondary {
            border: 1px solid rgba(255, 255, 255, .35);
            color: #fff;
        }

        footer {
            padding: 24px;
            text-align: center;
            color: #6b7c8d;
            font-size: 13px;
        }

        @media (max-width: 900px) {

            .hero-grid,
            .grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 560px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .section-card,
            .quote-card,
            .hero-card,
            .cta {
                padding: 22px 18px;
            }
        }
    </style>

    <section class="hero">
        <div class="wrap">
            <div class="hero-grid">
                <div>
                    <div class="kicker">Case Study | Alberta, Canada</div>
                    <h1>Fluidstream turned two liquid-loaded wells from near-zero output into revenue-generating assets.
                    </h1>
                    <p class="lead">An international oil and gas producer used Fluidstream’s MultiphaseCommander™ on an
                        Alberta pad
                        where rising line pressure, severe liquid loading, and unstable plunger-lift flow had effectively
                        shut in two
                        mature wells. The result was restored production, strong reliability, and more than C$1.5 million
                        per year in
                        incremental revenue - without adding separation infrastructure.</p>
                    <div class="hero-card">
                        <h3>Why this matters</h3>
                        <p>Fluidstream addressed the actual field bottleneck: the wells needed meaningful drawdown under
                            real
                            multiphase conditions, not another intervention-heavy workaround. The package ran on fuel gas,
                            handled
                            slugging and broad flow swings, and validated the technology for harsh Alberta winter service.
                        </p>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="num">10e3 m3/day</div>
                        <div class="lbl">Combined gas restored</div>
                    </div>
                    <div class="stat">
                        <div class="num">5 m3/day</div>
                        <div class="lbl">Combined condensate</div>
                    </div>
                    <div class="stat">
                        <div class="num">&gt; C$1.5M</div>
                        <div class="lbl">Annual incremental revenue</div>
                    </div>
                    <div class="stat">
                        <div class="num">Zero</div>
                        <div class="lbl">Seal leakage to date</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="main">
        <div class="wrap">
            <div class="grid grid-m">
                <section class="section-card">
                    <span class="badge">Executive summary</span>
                    <h2>Field problem, solved at the real bottleneck</h2>
                    <p>This case study documents how Fluidstream’s MultiphaseCommander™ restored production on two mature
                        wells in
                        Alberta, Canada that had become effectively uneconomic because rising pipeline backpressure and
                        severe liquid
                        loading had choked off flow. The producer operates internationally, but this specific installation
                        and
                        performance history occurred in Alberta. The operator needed a field-ready solution that could
                        reduce wellhead
                        pressure, tolerate real multiphase flow, avoid costly separation infrastructure, and run at an
                        unmanned
                        location with no electrical power. Fluidstream installed a 200 HP gas-driven MC2270 unit and
                        converted two
                        nearly dead wells into stable, revenue-producing assets. Combined production was restored to
                        approximately
                        10e3 m3/day of gas and 5 m3/day of condensate, creating more than C$1.5 million per year of
                        incremental
                        revenue while also reducing intervention risk, avoiding repeated swabbing events, and demonstrating
                        a scalable
                        pathway for broader pad and field deployment.</p>

                    <h2>Root cause engineering</h2>
                    <h3>The wells were not “empty” - they were liquid loaded.</h3>
                    <p>The production problem was not simply 'older wells underperforming.' It was a textbook liquid-loading
                        failure
                        amplified by surface constraints. As mature gas wells decline, reservoir pressure falls and gas
                        velocity drops
                        below the threshold required to continuously carry produced water and condensate to surface. Once
                        that
                        critical transport velocity is lost, liquids begin to accumulate in the tubing. This adds
                        hydrostatic head,
                        which increases the effective backpressure on the formation and further suppresses gas flow. The
                        lower the gas
                        rate becomes, the more difficult it is to lift liquids. The result is a self-reinforcing cycle:
                        lower rate
                        leads to more liquid fallback, which creates more pressure burden, which leads to still lower rate.
                        Eventually
                        the well does not die because hydrocarbons are gone; it dies because the flow system can no longer
                        clear
                        liquids.</p>
                    <h3>Plunger lift helped, but not enough in this operating window.</h3>
                    <p>The operator was already using plunger lift on the two wells. Plunger lift can be a useful
                        deliquification
                        method because it uses well energy to periodically lift a liquid slug, but it is inherently cyclic
                        rather than
                        continuous. In this Alberta application, the problem had moved beyond the range where a cyclic
                        unloading
                        method could reliably maintain production. Pipeline pressure could rise to about 1200 kPa, while the
                        operator
                        wanted the wells seeing something closer to 250 kPa to produce effectively. Under those conditions,
                        the
                        available pressure differential was not sufficient to consistently unload the wells. The wells would
                        build
                        pressure, produce intermittently, unload partially, then fall back again. That meant high
                        instantaneous
                        swings, unstable operating conditions, liquid fallback between cycles, and insufficient average
                        drawdown to
                        keep the wells alive on a sustained basis.</p>
                    <h3>Surface constraints narrowed the solution set.</h3>
                    <p>Several practical issues made the problem harder. The wells were deeper than 2400 m, which made a
                        downhole
                        pumping approach less attractive. The operator did not want to add extra surface liquid separation
                        because the
                        additional facilities, tanks, handling systems, and associated field logistics would have raised
                        project cost
                        and complexity. There was also no electricity available on location. The solution therefore had to
                        be compact,
                        autonomous, able to run on fuel gas, and capable of operating directly in the presence of multiphase
                        flow
                        rather than depending on a perfectly conditioned inlet stream.</p>

                    <h2>Why conventional systems fail here</h2>
                    <h3>Liquid ingestion destroys conventional compressor economics.</h3>
                    <p>Traditional gas compressors are designed for gas service, not for the repeated ingestion of
                        multiphase slugs.
                        When liquids enter a conventional reciprocating or screw machine, they can cause liquid slugging or
                        hydraulic
                        lock because liquids are not compressible. That creates a direct path to broken valves, bent rods,
                        bearing
                        damage, lubrication breakdown, corrosion, and rapid wear. Even before a major mechanical event,
                        liquid
                        carryover can reduce efficiency, destabilize the machine, and increase maintenance burden.</p>
                    <h3>Conventional compression usually requires extra facility buildout.</h3>
                    <p>Because traditional compressors do not tolerate wet, unstable inlet conditions, the normal workaround
                        is to
                        install separation ahead of compression. That may mean scrubbers, separators, tanks, heaters, pumps,
                        controls,
                        drains, trucking logistics, and a larger facility footprint. For the operator in this case, that was
                        exactly
                        what it wanted to avoid. The wells were worth saving, but not if the only path forward required
                        turning a
                        simple optimization project into a facility buildout.</p>
                    <h3>Swabbing works - but it is not a stable operating model.</h3>
                    <p>If the compression system were to stop long enough for the wells to fully load up again, the operator
                        indicated that a swabbing rig would be required to unload the wells, at an estimated cost of about
                        $15,000 per
                        event. Swabbing can restore flow by removing enough liquid column to reduce hydrostatic pressure,
                        but it is an
                        intervention, not a continuous operating strategy. It introduces downtime, mobilization cost, and
                        uncertainty.
                        From an economics perspective, poor reliability would quickly destroy value. That is why uptime and
                        autonomous
                        performance were not secondary issues in this case; they were central to project viability.</p>

                    <h2>Fluidstream technical differentiation</h2>
                    <h3>Direct multiphase compression</h3>
                    <p>Fluidstream’s core differentiator is that it is purpose-built to compress real production streams
                        containing
                        gas, liquids, and solids, instead of requiring the stream to be cleaned up before compression. That
                        changes
                        the design philosophy completely. Rather than avoiding liquids, Fluidstream uses a liquid-handling
                        methodology
                        designed to safely and efficiently manage incompressible fluids inside the machine. This allows the
                        operator
                        to eliminate separation-first infrastructure and address the actual field problem at the wellsite.
                    </p>
                    <h3>Contained gland-seal architecture</h3>
                    <p>A major operational concern in multiphase service is how to keep the power-fluid side and the
                        produced
                        multiphase stream properly isolated without creating a disposal or leakage problem. Fluidstream’s
                        fully
                        contained gland-seal arrangement separates the power fluid from the multiphase process fluid and is
                        paired
                        with electronic seal wear detection. The result is a design that improves reliability while also
                        giving
                        operators visibility into seal condition. In this Alberta application, no gland seal leakage was
                        reported to
                        date, and the operator did not face an ongoing disposal burden from seal leakage. That is a
                        significant
                        credibility point because sealing and containment are often where complex multiphase systems lose
                        trust in the
                        field.</p>
                    <h3>Autonomous control under unstable flow</h3>
                    <p>Multiphase service is not just about surviving liquids; it is about surviving instability. These
                        wells
                        remained on plunger lift cycles, which meant the compression system had to tolerate very broad flow
                        swings.
                        Peak gas flow could reach roughly 95e3 m3/day at certain moments and then taper down to nearly no
                        flow. Liquid
                        rates also fluctuated. Fluidstream’s autonomous control system and mechanical design were able to
                        accommodate
                        variable flow, no-flow periods, transient surges, and liquid slugs without requiring continuous
                        operator
                        involvement. That operating range is part of what made the system valuable here. It did not just
                        compress a
                        steady-state stream; it managed a highly dynamic field reality.</p>
                    <h3>Fit for abrasive and winter service</h3>
                    <p>Fluidstream’s configuration is also designed for abrasive service and adverse field conditions. Its
                        piston
                        and gland-seal systems are configured to support performance in sand-bearing applications, and the
                        controls
                        help protect the system in upset conditions involving solids, temperature swings, and other
                        disturbances. In
                        this case, the MC2270 did not require insulation or heat tracing to operate effectively through
                        extreme winter
                        conditions, despite the presence of water in the produced fluid. That is commercially important
                        because it
                        reduces installation complexity and helps validate the technology for harsh Canadian operating
                        environments.
                    </p>

                    <h2>Alberta deployment reality</h2>
                    <p>The operator in this case is an oil and gas producer with international assets, but the specific
                        project
                        described here was deployed in Alberta, Canada. Newer wells tied into the system had increased line
                        pressure,
                        and the legacy wells on this pad no longer had enough reservoir energy to overcome that
                        backpressure. The two
                        target wells had previously produced gas, condensate, and water, but over time had become
                        effectively
                        non-producing. The operator wanted to avoid a separation-heavy surface solution, did not want to
                        rely on
                        downhole pumping in wells deeper than 2400 m, and had no electrical power on site. Fluidstream
                        installed a
                        gas-driven MC2270 multiphase compressor package using produced gas as fuel. The selected model was
                        well suited
                        because the wells were not characterized by simple steady average flow; they exhibited periodic,
                        high
                        instantaneous gas and liquid rates associated with plunger-lift cycling, followed by sharp tapering.
                        That
                        meant equipment selection had to account for both the peak rates and the low-flow tail, not just the
                        daily
                        average.</p>

                    <h2>Results</h2>
                    <p>The production outcome was material. One well recovered to about 7e3 m3/day of gas and 3 m3/day of
                        condensate. The second recovered to about 3e3 m3/day of gas and 2 m3/day of condensate. Combined,
                        the two
                        wells returned to roughly 10e3 m3/day of gas and 5 m3/day of condensate.</p>
                    <p>At April 2026 commodity pricing referenced in the source materials, the resulting increase in revenue
                        exceeded C$1.5 million per year. The significance of that number is not merely the size of the
                        uplift. The
                        more important point is that the wells moved from generating virtually no meaningful revenue to
                        producing a
                        solid annual cash contribution without requiring a major new facility build.</p>
                    <p>Reliability was equally important to the operator. Aside from maintenance, service, and optimization
                        work
                        associated with the gas drive itself, there was no maintenance reported on the Fluidstream
                        compression system.
                        There was no gland seal leakage to date, and the autonomous control system handled slugging,
                        variable flow,
                        and upset conditions without creating operational headaches. For a producer concerned that 24-plus
                        hours of
                        downtime could force a $15,000 swabbing intervention, that runtime performance had direct economic
                        value.</p>
                </section>

                <aside class="side-stack">
                    <div class="quote-card">
                        <p class="quote">“Fluidstream’s MultiphaseCommander didn’t just improve performance—it completely
                            transformed
                            two dead wells into revenue-generating assets. We went from zero production to over $1.5 million
                            per year in
                            incremental revenue, without adding any separation equipment or infrastructure. It handles
                            real-world
                            multiphase conditions—liquid slugs, highly variable flow, and extreme winter
                            environments—effortlessly. Most
                            importantly, it just runs: zero seal leakage, no maintenance, and no operational headaches to
                            date. This is
                            the first solution we’ve seen that delivers both simplicity and reliable performance.”</p>
                        <div class="attr">Production Engineer, international oil and gas producer - Alberta, Canada
                            application</div>
                    </div>

                    <div class="section-card">
                        <span class="badge">Operational benefits</span>
                        <h2>Why operators care</h2>
                        <ul>
                            <li>Reduced dependence on intervention. The project shifted the wells away from a reactive
                                operating mode,
                                where production recovery depends on intermittent unloading activity, and toward a more
                                stable
                                continuous-production mode.</li>
                            <li>No additional liquid-separation buildout. By compressing the multiphase stream directly, the
                                operator
                                avoided adding the full suite of extra wellsite facilities that conventional compression
                                often demands.
                            </li>
                            <li>Gas-drive compatibility. Because the site had no electrical power, the ability to run on
                                fuel gas was
                                not a convenience feature - it was a deployment enabler.</li>
                            <li>Operational fit for variable plunger-lift flow. The system tolerated broad swings in gas and
                                liquid
                                rates without damage or constant operator attention.</li>
                            <li>Winter field viability. The package operated without insulation or heat tracing on the
                                compressor,
                                supporting deployment practicality in Alberta winter conditions.</li>
                            <li>Containment and HSE advantage. The fully sealed gland arrangement avoided ongoing leakage
                                and disposal
                                issues, improving field cleanliness and reducing operational burden.</li>
                        </ul>
                    </div>

                    <div class="section-card">
                        <span class="badge">Positioning</span>
                        <h2>Fluidstream versus legacy approaches</h2>
                        <table class="table">
                            <tr>
                                <th>Approach</th>
                                <th>Typical field reality</th>
                            </tr>
                            <tr>
                                <td><strong>Plunger lift</strong></td>
                                <td>Intermittent unloading. Pressure dependent. Useful in the right window, but vulnerable
                                    when line
                                    pressure rises and liquid fallback continues.</td>
                            </tr>
                            <tr>
                                <td><strong>Swabbing</strong></td>
                                <td>Restores flow, but as an intervention. It adds cost, downtime, and risk when repeated
                                    events become
                                    part of the operating model.</td>
                            </tr>
                            <tr>
                                <td><strong>Conventional compression</strong></td>
                                <td>Can deliver drawdown, but often requires dry-gas conditioning and supporting facilities
                                    that add
                                    complexity and cost.</td>
                            </tr>
                            <tr>
                                <td><strong>Fluidstream</strong></td>
                                <td>Continuous, autonomous, multiphase-tolerant pressure reduction without separation-first
                                    infrastructure.</td>
                            </tr>
                        </table>
                    </div>

                    <div class="section-card">
                        <span class="badge">Strategic upside</span>
                        <h2>Repeatable value across the asset base</h2>
                        <p>The operator believes much of the well pad could use a multiphase compressor to increase
                            production. That
                            matters because the case study is not just a single success story; it is a template for
                            repeatability. Where
                            line pressure, liquid loading, intermittent production, and infrastructure constraints coexist,
                            the same
                            value proposition can be redeployed.</p>
                        <p>The ROI case is strengthened by multiple layers of savings and uplift working together: recovered
                            gas and
                            condensate revenue, avoided separation infrastructure, lower intervention frequency, avoidance
                            of swabbing
                            cost, and reduced risk of production collapse due to liquid loading.</p>
                        <p>From a portfolio perspective, the application also demonstrates why Fluidstream has strategic
                            relevance
                            beyond a niche well. An international producer can use Alberta as a proof point for other assets
                            where
                            mature wells, wet gas, unmanned sites, or constrained facilities create similar bottlenecks.</p>
                    </div>
                </aside>
            </div>
        </div>
    </main>
@endsection