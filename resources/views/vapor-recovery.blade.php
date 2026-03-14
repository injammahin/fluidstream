@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="relative h-screen overflow-hidden bg-slate-950">
        <div class="absolute inset-0 h-screen">
            <img src="/img/page-2.jpg" alt="page-2.jpg" class="h-full w-full object-cover object-center">
        </div>
        <div class="relative z-10 flex min-h-screen items-center">
            <div class="mx-auto w-full max-w-7xl px-5 sm:px-6 lg:px-8">
                <div class="max-w-4xl pt-24 sm:pt-28 lg:pt-20">
                    <span
                        class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200 backdrop-blur-sm">
                        Vapor Recovery
                    </span>

                    <h1
                        class="mt-6 max-w-4xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-white sm:text-5xl md:text-6xl lg:text-[50px]">
                        VaporCommander<span class="align-super text-xl sm:text-2xl">™</span>
                    </h1>

                    <p
                        class="mt-7 max-w-3xl text-base font-medium leading-7 text-slate-200 sm:text-lg sm:leading-8 lg:text-[22px] lg:leading-9">
                        Cost-Effective, low maintenance, multiphase vapor recovery technology
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#overview"
                            class="inline-flex items-center justify-center rounded-xl bg-sky-500 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-sky-600">
                            Explore Technology
                        </a>

                        <a href="{{ url('/contact') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition duration-300 hover:bg-white/15">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Overview -->
    <section id="overview" class="relative overflow-hidden bg-white py-12 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="overview-reveal grid items-center gap-12 lg:grid-cols-[1.05fr_1fr] lg:gap-20">
                <div>
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Vapor Recovery Technology
                    </span>

                    <h2
                        class="mt-6 text-4xl font-semibold leading-tight tracking-[-0.04em] text-slate-900 sm:text-5xl lg:text-3xl">
                        Low-Cost, Multiphase, Fully Autonomous Vapor Recovery Technology
                    </h2>

                    <div class="mt-6 h-px w-24 bg-slate-300"></div>
                </div>

                <div
                    class="rounded-[32px] border border-slate-200 bg-slate-50/70 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.04)] sm:p-10">
                    <div class="space-y-6 text-lg leading-9 text-slate-600">
                        <p>
                            We offer the most advanced vapor recovery technology at a more economical price than
                            conventional technologies.
                        </p>

                        <p>
                            Built with sturdy high-quality components and advanced proprietary programming to optimize
                            operation and functionality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Economics -->
    <section class="relative  w overflow-hidden bg-white py-12 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div
                class="economics-reveal rounded-[36px] border border-slate-200 bg-white px-8 py-12 shadow-[0_20px_60px_rgba(15,23,42,0.05)] sm:px-10 sm:py-14 lg:px-14 lg:py-16">
                <div class="mx-auto max-w-4xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Project Economics
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Designed to maximize project economics
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>
                </div>

                <div class="mt-14 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-sky-500 bg-white text-sky-600 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0-5 5m5-5 5 5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Return on Investment
                        </h3>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-sky-500 bg-white text-sky-600 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Total Cost of Ownership
                        </h3>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-sky-500 bg-white text-sky-600 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Initial Purchase Cost
                        </h3>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-sky-500 bg-white text-sky-600 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Operating Costs
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="relative overflow-hidden bg-slate-50 py-12 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 bottom-0 h-48 w-48 rounded-full bg-white/70 blur-3xl"></div>
            <div class="absolute right-0 top-0 h-52 w-52 rounded-full bg-white/60 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="benefits-reveal">
                <div class="mx-auto max-w-3xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Key Advantages
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Unmatched benefits and value
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>
                </div>

                <div class="mt-16 grid gap-6 lg:grid-cols-2">
                    <div class="space-y-6">
                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Low Cost and Quicker Payout
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                VaporCommander<span class="align-super text-xs">™</span> low cost provides a maximum rate of
                                return and reduces the total ownership cost. Similar price as combustors in low-flow
                                applications, with the additional ability of keeping gas instead of burning it.
                            </p>
                        </div>

                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Broad Operating Range
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                100% turndown offers a significantly greater flow operating range without the need for any
                                mechanical recirculation configurations. VaporCommander<span
                                    class="align-super text-xs">™</span> handles a large range of line pressure.
                            </p>
                        </div>

                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Multiphase Operation
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                Patented multiphase operation can handle up to 100% liquids or any combination of liquids
                                and gas without a scrubber. Gas volume fractions (GVF) between 0 and 100%.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Fully Autonomous with Comprehensive Controls
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                Works autonomously to achieve operator-defined operational targets. Features comprehensive
                                controls to configure for any complex or upset condition. Very well suited for vapor
                                recovery applications with varying flow, line pressure, and liquid content.
                            </p>
                        </div>

                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Low Maintenance
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                The simple and robust design and comprehensive controls ensure significantly reduced
                                maintenance cycles.
                            </p>
                        </div>

                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Portability
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                Does not require rigid support for operation. Trailer-mounted units are available.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Model Table -->
    <section class="relative overflow-hidden bg-white py-12 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="table-reveal">
                <div class="mx-auto max-w-4xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Model Selection
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Select Your VaporCommander<span class="align-super text-lg">™</span> Model
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>
                </div>

                <div class="mt-14 rounded-[28px] border border-slate-200 bg-white shadow-[0_20px_60px_rgba(15,23,42,0.05)]">
                    <div class="border-b border-slate-200 px-5 py-4 sm:px-6">
                        <p class="text-sm font-medium text-slate-500">
                            Scroll horizontally on smaller screens to view the full table.
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="min-w-[1320px] p-3 sm:p-4">
                            <table class="w-full border-separate border-spacing-0 overflow-hidden rounded-2xl">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="bg-white px-4 py-3"></th>
                                        <th colspan="8"
                                            class="rounded-tl-2xl rounded-tr-2xl bg-sky-500 px-4 py-4 text-center text-base font-semibold text-white">
                                            VaporCommander<span class="align-super text-[10px]">™</span> Model
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="border-b border-slate-200 bg-white px-4 py-3"></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VCx1020</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VCx1035<span class="align-super text-[10px]">3</span></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VCx2535<span class="align-super text-[10px]">3</span></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VCx5035<span class="align-super text-[10px]">3</span></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VC1245<span class="align-super text-[10px]">3</span></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VC1645</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VC2245</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            VC2270</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th
                                            class="w-[250px] border-r border-b border-slate-200 bg-sky-500 px-4 py-5 text-center align-middle text-[15px] font-semibold leading-7 text-white">
                                            Max Gas Rate<span class="align-super text-[10px]">1,2</span><br>
                                            @ Inlet Pressure<br>
                                            (e3m3/day) [mcf/day]
                                        </th>
                                        <th
                                            class="w-[170px] border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-center text-[15px] font-semibold text-white">
                                            0 psi [ 0 kPa]
                                        </th>
                                        <td class="table-data">1.5 [53]</td>
                                        <td class="table-data">2.4 [85]</td>
                                        <td class="table-data">2.4 [85]</td>
                                        <td class="table-data">2.4 [81]</td>
                                        <td class="table-data">2.4 [81]</td>
                                        <td class="table-data">4.2 [145]</td>
                                        <td class="table-data">8.0 [279]</td>
                                        <td class="table-data last-col">8.0 [279]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            Max Pressure Differential<span class="align-super text-[10px]">2</span> (kPag)
                                            [psig]
                                        </th>
                                        <td class="table-data">1138 [165]</td>
                                        <td class="table-data">1138 [165]</td>
                                        <td class="table-data">1138 [165]</td>
                                        <td class="table-data">1379 [200]</td>
                                        <td class="table-data">2413 [350]</td>
                                        <td class="table-data">1379 [200]</td>
                                        <td class="table-data">689 [100]</td>
                                        <td class="table-data last-col">1896 [275]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            Motor Size (HP)
                                        </th>
                                        <td class="table-data">10</td>
                                        <td class="table-data">10</td>
                                        <td class="table-data">25</td>
                                        <td class="table-data">50</td>
                                        <td class="table-data">50</td>
                                        <td class="table-data">100</td>
                                        <td class="table-data">100</td>
                                        <td class="table-data last-col">150</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            H2S Handling
                                        </th>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check last-col">✓</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            3-Stage Cold Weather Startup
                                        </th>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check last-col">✓</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            Autonomous Controller
                                        </th>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check">✓</td>
                                        <td class="table-data check last-col">✓</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white rounded-bl-2xl">
                                            Color Touchscreen &amp; Remote Control
                                        </th>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check no-bottom">✓</td>
                                        <td class="table-data check last-col no-bottom rounded-br-2xl">✓</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="border-t border-slate-200 bg-slate-50/70 px-5 py-6 sm:px-8 sm:py-8">
                        <div class="space-y-4 text-sm leading-7 text-slate-600 sm:text-base">
                            <p>
                                <span class="align-super text-[10px]">1</span>
                                Flow conditions calculated at 15°C [59°F] inlet pressure and with various components
                                operating at 100% efficiency.
                                Flow rates may vary based on inlet pressures, gas content, and other factors. Max gas rates
                                will be reduced by amount of liquids in total fluid.
                                Ask Fluidstream for max gas flow rates based on specific liquid rates and other varying
                                conditions.
                            </p>

                            <p>
                                <span class="align-super text-[10px]">2</span>
                                Max gas rates and max pressure differentials can be increased by configuring additional
                                unit(s) in parallel or in series.
                            </p>

                            <p>
                                <span class="align-super text-[10px]">3</span>
                                Higher horsepower units will yield much higher fluid flow rates at various pressure
                                differentials. Please request pump curves to see flow rates at various pressure
                                differentials.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="rounded-[32px] border border-slate-200 bg-slate-50 px-8 py-12 sm:px-10 lg:px-14 lg:py-16">
                <div class="grid gap-8 lg:grid-cols-[1.2fr_auto] lg:items-center">
                    <div>
                        <span
                            class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                            Get in Touch
                        </span>

                        <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl">
                            Let’s discuss your vapor recovery requirements
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                            Connect with us to explore how VaporCommander<span class="align-super text-xs">™</span> can
                            support low-cost recovery, autonomous operation, and better overall project economics.
                        </p>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row lg:flex-col">
                        <a href="{{ url('/contact') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-slate-800">
                            Contact Us
                        </a>

                        <a href="{{ url('/multiphase-compression') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-800 transition duration-300 hover:bg-slate-100">
                            View Other Solutions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .table-data {
            border-right: 1px solid rgb(226 232 240);
            border-bottom: 1px solid rgb(226 232 240);
            padding: 14px 16px;
            text-align: center;
            font-size: 15px;
            line-height: 1.5;
            font-weight: 500;
            color: rgb(30 41 59);
            background: #ffffff;
            white-space: nowrap;
        }

        .table-data.last-col {
            border-right: 0;
        }

        .table-data.no-bottom {
            border-bottom: 0;
        }

        .table-data.check {
            color: #22c55e;
            font-size: 20px;
            font-weight: 700;
        }

        .overview-reveal,
        .economics-reveal,
        .benefits-reveal,
        .table-reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.85s ease, transform 0.85s ease;
            will-change: opacity, transform;
        }

        .overview-reveal.is-visible,
        .economics-reveal.is-visible,
        .benefits-reveal.is-visible,
        .table-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 640px) {
            .table-data {
                padding: 12px 14px;
                font-size: 15px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .overview-reveal,
            .economics-reveal,
            .benefits-reveal,
            .table-reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const video = document.getElementById('vaporHeroVideo');
            if (video) {
                const sources = video.querySelectorAll('source[data-src]');

                const loadVideo = () => {
                    sources.forEach((source) => {
                        source.src = source.dataset.src;
                    });

                    video.load();

                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise.catch(() => { });
                    }
                };

                if ('requestIdleCallback' in window) {
                    requestIdleCallback(loadVideo, {
                        timeout: 1200
                    });
                } else {
                    setTimeout(loadVideo, 500);
                }
            }

            const blocks = document.querySelectorAll('.overview-reveal, .economics-reveal, .benefits-reveal, .table-reveal');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.12
            });

            blocks.forEach((block) => observer.observe(block));
        });
    </script>
@endsection