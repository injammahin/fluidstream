@extends('layouts.app')

@section('content')
    <style>
        .container {
            max-width: 1200px !important;
        }
    </style>
    <section class="bg-[#f5f5f5] py-10 sm:py-12 lg:py-16">
        <div class=" container mx-auto w-full max-w-[1440px]">

            <!-- Tabs -->
            <div class="mb-8 border-t border-[#cfcfcf] sm:mb-10 lg:mb-12">
                <div
                    class="flex items-stretch overflow-x-auto whitespace-nowrap [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    <button type="button"
                        class="insights-tab active relative px-5 py-4 text-[20px] font-normal text-[#6f6f6f] transition-colors duration-200 sm:px-8 sm:py-5 sm:text-[22px]"
                        data-tab="case-studies" aria-selected="true">
                        <span
                            class="pointer-events-none absolute left-3 right-3 top-0 h-[5px] bg-[#0b1e8a] sm:left-4 sm:right-4 sm:h-[6px]"></span>
                        Case Studies
                    </button>

                    <button type="button"
                        class="insights-tab relative px-5 py-4 text-[20px] font-normal text-[#6f6f6f] transition-colors duration-200 sm:px-8 sm:py-5 sm:text-[22px]"
                        data-tab="perspectives" aria-selected="false">
                        <span
                            class="pointer-events-none absolute left-3 right-3 top-0 h-[5px] bg-transparent sm:left-4 sm:right-4 sm:h-[6px]"></span>
                        Perspectives
                    </button>
                </div>
            </div>

            <!-- Panels -->
            <div>
                <!-- Case Studies -->
                <div id="case-studies" class="insights-panel block">
                    <div class="mb-8 max-w-[760px] sm:mb-10">
                        <span
                            class="mb-3 inline-block text-[13px] font-semibold uppercase tracking-[0.12em] text-[#0b1e8a]">
                            Insights
                        </span>
                        <h1
                            class="text-[38px] font-medium leading-[0.98] tracking-[-0.04em] text-[#111111] sm:text-[56px] lg:text-[72px]">
                            Case Studies
                        </h1>
                        <p class="mt-4 text-[16px] leading-[1.7] text-[#535353] sm:mt-5 sm:text-[18px] lg:text-[20px]">
                            Explore practical implementation stories, project outcomes, and real-world use cases.
                        </p>
                    </div>

                    <div class="space-y-6 lg:space-y-8">

                        <!-- Card 1 -->
                        <article
                            class="overflow-hidden rounded-[24px] border border-[#dbe4f0] bg-white shadow-[0_14px_40px_rgba(0,0,0,0.06)]">
                            <div class="h-[6px] w-full bg-gradient-to-r from-[#0018dc] to-[#15d1ff]"></div>

                            <div class="p-5 sm:p-7 lg:p-8">
                                <div
                                    class="mb-4 inline-flex rounded-full bg-[#eaf0ff] px-3 py-2 text-[11px] font-bold uppercase tracking-[0.12em] text-[#0018dc] sm:text-[12px]">
                                    Case Study Snapshot
                                </div>

                                <h2
                                    class="mb-4 text-[28px] font-semibold leading-[1.15] tracking-[-0.02em] text-[#0f172a] sm:text-[30px] lg:text-[36px]">
                                    Allied Energy II | Multiphase Vapor Recovery
                                </h2>

                                <div class="mb-5 text-[15px] leading-[1.7] text-slate-700 sm:text-[16px]">
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

                                <blockquote
                                    class="mb-6 rounded-r-[16px] border-l-[5px] border-l-[#15d1ff] bg-[#f5fcff] px-5 py-5 text-[16px] leading-[1.7] text-[#0b1b45]">
                                    “...eliminated gas venting…
                                    <span class="font-bold">100% uptime and no maintenance</span>
                                    since installation.”
                                </blockquote>

                                <div
                                    class="flex flex-col gap-4 border-t border-[#dbe4f0] pt-5 lg:flex-row lg:items-center lg:justify-between">
                                    <div class="text-[14px] leading-[1.6] text-[#64748b]">
                                        <span class="font-semibold text-[#0018dc]">Lower maintenance</span>
                                        <span class="mx-1 text-slate-300">•</span>
                                        Continuous operation
                                        <span class="mx-1 text-slate-300">•</span>
                                        Reduced emissions
                                    </div>

                                    <a href="{{ url('/case-studies/allied-energy-ii-multiphase-vapor-recovery') }}"
                                        class="inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-[#0018dc] to-[#0d57ea] px-5 py-3 text-[15px] font-bold text-white shadow-[0_10px_22px_rgba(0,24,220,0.18)] transition duration-200 hover:-translate-y-[1px] hover:shadow-[0_14px_28px_rgba(0,24,220,0.24)] sm:w-auto">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Card 2 -->
                        <article
                            class="overflow-hidden rounded-[24px] border border-[#dbe4f0] bg-white shadow-[0_18px_45px_rgba(0,24,220,0.10)]">
                            <div class="h-[6px] w-full bg-gradient-to-r from-[#0018dc] to-[#15d1ff]"></div>

                            <div class="p-5 sm:p-7 lg:p-8">
                                <div
                                    class="mb-4 inline-flex rounded-full bg-[#eaf0ff] px-3 py-2 text-[11px] font-bold uppercase tracking-[0.12em] text-[#0018dc] sm:text-[12px]">
                                    Case Study Snapshot
                                </div>

                                <h2
                                    class="mb-3 text-[28px] font-semibold leading-[1.15] tracking-[-0.02em] text-[#0f172a] sm:text-[30px] lg:text-[36px]">
                                    4.5+ years of reliable vapor recovery
                                </h2>

                                <p class="mb-6 max-w-[900px] text-[15px] leading-[1.7] text-[#5f6f8a] sm:text-[16px]">
                                    A southern Alberta producer used Fluidstream’s VaporCommander™ to capture tank vapors,
                                    reduce emissions, and avoid the maintenance burden commonly associated with conventional
                                    VRU systems.
                                </p>

                                <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div
                                        class="rounded-[18px] border border-[rgba(19,35,63,0.10)] bg-[linear-gradient(180deg,#ffffff_0%,#f8fcff_100%)] p-4 sm:p-5">
                                        <div class="mb-2 text-[28px] font-extrabold leading-none text-[#0018dc]">
                                            35
                                        </div>
                                        <div class="text-[14px] leading-[1.45] text-[#5f6f8a]">
                                            months before first seal change
                                        </div>
                                    </div>

                                    <div
                                        class="rounded-[18px] border border-[rgba(19,35,63,0.10)] bg-[linear-gradient(180deg,#ffffff_0%,#f8fcff_100%)] p-4 sm:p-5">
                                        <div class="mb-2 text-[28px] font-extrabold leading-none text-[#0018dc]">
                                            1
                                        </div>
                                        <div class="text-[14px] leading-[1.45] text-[#5f6f8a]">
                                            seal change over reported operating life
                                        </div>
                                    </div>
                                </div>

                                <blockquote
                                    class="mb-6 rounded-r-[16px] border-l-[5px] border-l-[#15d1ff] bg-[#f5fcff] px-5 py-5">
                                    <p class="text-[16px] leading-[1.7] text-[#0b1b45]">
                                        “To date, with the exception of the seal change after 35 months, the unit has not
                                        had any failures or service issues in more than 4.5 years of operation.”
                                    </p>
                                    <div class="mt-3 text-[13px] font-bold uppercase tracking-[0.08em] text-[#0018dc]">
                                        Fluidstream Case Study
                                    </div>
                                </blockquote>

                                <div
                                    class="flex flex-col gap-4 border-t border-[#dbe4f0] pt-5 lg:flex-row lg:items-center lg:justify-between">
                                    <div class="text-[14px] leading-[1.5] text-[#5f6f8a] lg:max-w-[700px]">
                                        Website-ready HTML box for homepage, landing page, or insights section.
                                    </div>

                                    <a href="{{ url('/case-studies/4-5-years-of-reliable-vapor-recovery') }}"
                                        class="inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-[#0018dc] to-[#0d57ea] px-5 py-3 text-[15px] font-bold text-white shadow-[0_10px_22px_rgba(0,24,220,0.18)] transition duration-200 hover:-translate-y-[1px] hover:shadow-[0_14px_28px_rgba(0,24,220,0.24)] sm:w-auto">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Card 3 -->
                        <article
                            class="overflow-hidden rounded-[24px] border border-[#dbe4f0] bg-white shadow-[0_18px_45px_rgba(0,24,220,0.10)]">
                            <div class="h-[6px] w-full bg-gradient-to-r from-[#0018dc] to-[#15d1ff]"></div>

                            <div class="p-5 sm:p-7 lg:p-8">
                                <div
                                    class="mb-4 inline-flex rounded-full bg-[#eaf0ff] px-3 py-2 text-[11px] font-bold uppercase tracking-[0.12em] text-[#0018dc] sm:text-[12px]">
                                    Case Study Snapshot
                                </div>

                                <h2
                                    class="mb-3 text-[28px] font-semibold leading-[1.15] tracking-[-0.02em] text-[#0f172a] sm:text-[30px] lg:text-[36px]">
                                    From virtually no production to more than C$1.5 million/year in incremental revenue
                                </h2>

                                <p class="mb-6 max-w-[980px] text-[15px] leading-[1.7] text-[#475569] sm:text-[16px]">
                                    In Alberta, Canada, Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded
                                    wells that could no longer overcome rising pipeline pressure. The result was restored
                                    production, no added separation equipment, and dependable operation under highly
                                    variable multiphase conditions.
                                </p>

                                <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                                    <div
                                        class="rounded-[18px] border border-[#dbe5f0] bg-[linear-gradient(180deg,#ffffff_0%,#f8fcff_100%)] p-4 sm:p-5">
                                        <div class="mb-2 text-[12px] font-bold uppercase tracking-[0.10em] text-[#475569]">
                                            Gas Production
                                        </div>
                                        <div class="mb-2 text-[28px] font-extrabold leading-none text-[#0018dc]">
                                            10e3 m³/d
                                        </div>
                                        <div class="text-[14px] leading-[1.45] text-[#475569]">
                                            Combined gas production restored across both wells after installation.
                                        </div>
                                    </div>

                                    <div
                                        class="rounded-[18px] border border-[#dbe5f0] bg-[linear-gradient(180deg,#ffffff_0%,#f8fcff_100%)] p-4 sm:p-5">
                                        <div class="mb-2 text-[12px] font-bold uppercase tracking-[0.10em] text-[#475569]">
                                            Condensate
                                        </div>
                                        <div class="mb-2 text-[28px] font-extrabold leading-none text-[#0018dc]">
                                            5 m³/d
                                        </div>
                                        <div class="text-[14px] leading-[1.45] text-[#475569]">
                                            Daily condensate production recovered without added separation infrastructure.
                                        </div>
                                    </div>

                                    <div
                                        class="rounded-[18px] border border-[#dbe5f0] bg-[linear-gradient(180deg,#ffffff_0%,#f8fcff_100%)] p-4 sm:p-5">
                                        <div class="mb-2 text-[12px] font-bold uppercase tracking-[0.10em] text-[#475569]">
                                            Revenue Impact
                                        </div>
                                        <div class="mb-2 text-[28px] font-extrabold leading-none text-[#0018dc]">
                                            C$1.5M+
                                        </div>
                                        <div class="text-[14px] leading-[1.45] text-[#475569]">
                                            Estimated annual incremental revenue based on April 2026 commodity pricing.
                                        </div>
                                    </div>
                                </div>

                                <blockquote
                                    class="mb-6 rounded-r-[16px] border-l-[5px] border-l-[#15d1ff] bg-[#f5fcff] px-5 py-5">
                                    <p class="text-[16px] leading-[1.7] text-[#0b1b45]">
                                        “Fluidstream’s MultiphaseCommander didn’t just improve performance—it completely
                                        transformed two dead wells into revenue-generating assets. We went from zero
                                        production to over $1.5 million per year in incremental revenue, without adding any
                                        separation equipment or infrastructure.”
                                    </p>
                                    <div class="mt-3 text-[13px] font-bold uppercase tracking-[0.08em] text-[#475569]">
                                        Production Engineer, Western Canadian Oil &amp; Gas Producer
                                    </div>
                                </blockquote>

                                <div
                                    class="flex flex-col gap-4 border-t border-[#dbe4f0] pt-5 lg:flex-row lg:items-center lg:justify-between">
                                    <div class="text-[14px] leading-[1.5] text-[#475569] lg:max-w-[760px]">
                                        Read the full case study for the operating challenge, deployment details, runtime
                                        importance, variable-flow performance, and the broader pad-level opportunity
                                        identified by the producer.
                                    </div>

                                    <a href="{{ url('/case-studies/incremental-revenue-case-study') }}"
                                        class="inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-[#0018dc] to-[#0d57ea] px-5 py-3 text-[15px] font-bold text-white shadow-[0_10px_22px_rgba(0,24,220,0.18)] transition duration-200 hover:-translate-y-[1px] hover:shadow-[0_14px_28px_rgba(0,24,220,0.24)] sm:w-auto">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Perspectives -->
                <div id="perspectives" class="insights-panel hidden">
                    <div class="mb-8 max-w-[760px] sm:mb-10">
                        <span
                            class="mb-3 inline-block text-[13px] font-semibold uppercase tracking-[0.12em] text-[#0b1e8a]">
                            Insights
                        </span>
                        <h1
                            class="text-[38px] font-medium leading-[0.98] tracking-[-0.04em] text-[#111111] sm:text-[56px] lg:text-[72px]">
                            Perspectives
                        </h1>
                        <p class="mt-4 text-[16px] leading-[1.7] text-[#535353] sm:mt-5 sm:text-[18px] lg:text-[20px]">
                            Read strategic viewpoints, industry thinking, and technical perspectives shaping the future.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 lg:gap-6">
                        <article
                            class="rounded-[24px] border border-[#d8d8d8] bg-white p-6 transition duration-200 hover:-translate-y-[2px] hover:shadow-[0_14px_30px_rgba(15,23,42,0.06)] sm:p-7">
                            <span
                                class="mb-4 inline-flex text-[12px] font-semibold uppercase tracking-[0.12em] text-[#0b1e8a]">
                                Perspective
                            </span>
                            <h3 class="mb-4 text-[26px] font-medium leading-[1.05] tracking-[-0.035em] text-[#111111]">
                                Rethinking Production Systems
                            </h3>
                            <p class="text-[16px] leading-[1.8] text-[#4f4f4f]">
                                Why simplified flow-through production models are becoming more important in modern field
                                design.
                            </p>
                            <a href="#"
                                class="mt-6 inline-flex items-center gap-2 text-[16px] font-semibold text-[#1638ff]">
                                Read More <span class="text-[20px] leading-none">→</span>
                            </a>
                        </article>

                        <article
                            class="rounded-[24px] border border-[#d8d8d8] bg-white p-6 transition duration-200 hover:-translate-y-[2px] hover:shadow-[0_14px_30px_rgba(15,23,42,0.06)] sm:p-7">
                            <span
                                class="mb-4 inline-flex text-[12px] font-semibold uppercase tracking-[0.12em] text-[#0b1e8a]">
                                Perspective
                            </span>
                            <h3 class="mb-4 text-[26px] font-medium leading-[1.05] tracking-[-0.035em] text-[#111111]">
                                Lower Cost, Broader Deployment
                            </h3>
                            <p class="text-[16px] leading-[1.8] text-[#4f4f4f]">
                                A closer look at how lower complexity systems can unlock wider application opportunities.
                            </p>
                            <a href="#"
                                class="mt-6 inline-flex items-center gap-2 text-[16px] font-semibold text-[#1638ff]">
                                Read More <span class="text-[20px] leading-none">→</span>
                            </a>
                        </article>

                        <article
                            class="rounded-[24px] border border-[#d8d8d8] bg-white p-6 transition duration-200 hover:-translate-y-[2px] hover:shadow-[0_14px_30px_rgba(15,23,42,0.06)] sm:p-7">
                            <span
                                class="mb-4 inline-flex text-[12px] font-semibold uppercase tracking-[0.12em] text-[#0b1e8a]">
                                Perspective
                            </span>
                            <h3 class="mb-4 text-[26px] font-medium leading-[1.05] tracking-[-0.035em] text-[#111111]">
                                The Role of Emissions Reduction
                            </h3>
                            <p class="text-[16px] leading-[1.8] text-[#4f4f4f]">
                                Understanding how technology decisions can improve operational efficiency and reduce waste.
                            </p>
                            <a href="#"
                                class="mt-6 inline-flex items-center gap-2 text-[16px] font-semibold text-[#1638ff]">
                                Read More <span class="text-[20px] leading-none">→</span>
                            </a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.insights-tab');
            const panels = document.querySelectorAll('.insights-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-tab');

                    tabs.forEach(item => {
                        item.classList.remove('active', 'text-[#0b1e8a]');
                        item.classList.add('text-[#6f6f6f]');
                        item.setAttribute('aria-selected', 'false');

                        const indicator = item.querySelector('span');
                        if (indicator) {
                            indicator.classList.remove('bg-[#0b1e8a]');
                            indicator.classList.add('bg-transparent');
                        }
                    });

                    panels.forEach(panel => {
                        panel.classList.add('hidden');
                        panel.classList.remove('block');
                    });

                    this.classList.add('active', 'text-[#0b1e8a]');
                    this.classList.remove('text-[#6f6f6f]');
                    this.setAttribute('aria-selected', 'true');

                    const activeIndicator = this.querySelector('span');
                    if (activeIndicator) {
                        activeIndicator.classList.remove('bg-transparent');
                        activeIndicator.classList.add('bg-[#0b1e8a]');
                    }

                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.remove('hidden');
                        targetPanel.classList.add('block');
                    }
                });
            });
        });
    </script>
@endsection