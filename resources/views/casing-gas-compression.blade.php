@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="relative h-screen overflow-hidden bg-slate-950">
        <div class="absolute inset-0 h-screen">
            <img src="/img/casing-gas-image-01.jpg" alt="page-2.jpg" class="h-full w-full object-cover object-center">
        </div>
        <div class="relative z-10 flex min-h-screen items-center">
            <div class="mx-auto w-full max-w-7xl px-5 sm:px-6 lg:px-8">
                <div class="max-w-4xl pt-24 sm:pt-28 lg:pt-20">
                    <span
                        class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200 backdrop-blur-sm">
                        Casing Gas Compression
                    </span>

                    <h1
                        class="mt-6 max-w-4xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-white sm:text-5xl md:text-6xl lg:text-[50px]">
                        CompressionCommander<span class="align-super text-lg sm:text-2xl">™</span>
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
    <section id="overview" class="relative overflow-hidden bg-white py-16 sm:py-18 lg:py-20">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class=" justify-center items-center overview-reveal grid gap-10 lg:grid-cols-[1.05fr_1fr] lg:gap-16">
                <div>
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Casing Gas Technology
                    </span>

                    <h2
                        class="mt-6 text-3xl font-semibold leading-tight tracking-[-0.04em] text-slate-900 sm:text-3xl lg:text-3xl">
                        Low-Cost, Low-Maintenance, Multiphase Casing Gas Compressor Technology
                    </h2>

                    <div class="mt-6 h-px w-24 bg-slate-300"></div>
                </div>

                <div
                    class="rounded-[30px] border border-slate-200 bg-slate-50/70 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.04)] sm:p-10">
                    <div class="space-y-6 text-lg leading-9 text-slate-600">
                        <p>
                            Fluidstream offers a low-cost and low-maintenance multiphase casing gas compressor technology.
                        </p>

                        <p>
                            Never worry about liquids in your casing gas applications because our technology can handle from
                            0% to 100% liquids in solution.
                        </p>

                        <p>
                            Built with sturdy high-quality components and advance sealing systems, our multiphase casing gas
                            technology has low maintenance and service cycles.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="relative overflow-hidden bg-slate-50 py-16 sm:py-18 lg:py-20">
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

                <div class="mt-12 grid gap-6 lg:grid-cols-2">
                    <div class="space-y-6">
                        <div
                            class="rounded-[28px] border border-slate-200 bg-white p-7 transition duration-500 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Low Cost and Quicker Payout
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                CompressionCommander<span class="align-super text-xs">™</span> low cost provides a maximum
                                rate of return and reduces the total ownership cost.
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
                                controls to configure for any complex or upset condition. Very well suited for wet casing
                                gas applications, including applications with varying flow and line pressures.
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

    <!-- Specifications Table -->
    <section class="relative overflow-hidden bg-white py-14 sm:py-16 lg:py-18">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-32 w-32 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-44 w-44 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="table-reveal">
                <div class="mx-auto max-w-4xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[10px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Operating Specifications
                    </span>

                    <h2 class="mt-5 text-2xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-3xl lg:text-4xl">
                        CompressionCommander<span class="align-super text-base">™</span> Operating Specifications
                    </h2>

                    <div class="mx-auto mt-4 h-px w-20 bg-slate-300"></div>
                </div>

                <div class="mt-10 rounded-[24px] border border-slate-200 bg-white shadow-[0_16px_40px_rgba(15,23,42,0.05)]">
                    <div class="border-b border-slate-200 px-4 py-3 sm:px-5">
                        <p class="text-xs font-medium text-slate-500">
                            Scroll horizontally on smaller screens to view the full table.
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="min-w-[1250px] p-2.5 sm:p-3">
                            <table class="w-full border-separate border-spacing-0 overflow-hidden rounded-xl">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="bg-white px-3 py-2"></th>
                                        <th colspan="8"
                                            class="rounded-tl-xl rounded-tr-xl bg-sky-500 px-3 py-3 text-center text-sm font-semibold text-white">
                                            CompressionCommander<span class="align-super text-[9px]">™</span> Model
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="border-b border-slate-200 bg-white px-3 py-2"></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CCx1020
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CCx1035<span class="align-super text-[9px]">3</span>
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CCx2535<span class="align-super text-[9px]">3</span>
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CCx5035<span class="align-super text-[9px]">3</span>
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CC1245
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CC1645
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CC2245
                                        </th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-3 py-2.5 text-center text-sm font-semibold text-white">
                                            CC2270
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th rowspan="5"
                                            class="w-[220px] border-r border-b border-slate-200 bg-sky-500 px-3 py-4 text-center align-middle text-[14px] font-semibold leading-6 text-white">
                                            Max Gas Rate<span class="align-super text-[9px]">1,2</span><br>
                                            @ Inlet Pressure<br>
                                            (e3m3/day)<br>[mcf/day]
                                        </th>
                                        <th
                                            class="w-[160px] border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-center text-[14px] font-semibold text-white">
                                            5 psi [34 kPa]
                                        </th>
                                        <td class="table-data-sm">2.0 [71]</td>
                                        <td class="table-data-sm">3.2 [113]</td>
                                        <td class="table-data-sm">3.2 [113]</td>
                                        <td class="table-data-sm">3.2 [113]</td>
                                        <td class="table-data-sm">3.2 [113]</td>
                                        <td class="table-data-sm">5.7 [201]</td>
                                        <td class="table-data-sm">10.7 [378]</td>
                                        <td class="table-data-sm last-col">10.3 [378]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-center text-[14px] font-semibold text-white">
                                            10 psi [69 kPa]
                                        </th>
                                        <td class="table-data-sm">2.5 [88]</td>
                                        <td class="table-data-sm">4.0 [141]</td>
                                        <td class="table-data-sm">4.0 [141]</td>
                                        <td class="table-data-sm">4.0 [141]</td>
                                        <td class="table-data-sm">3.9 [138]</td>
                                        <td class="table-data-sm">7.1 [251]</td>
                                        <td class="table-data-sm">13.5 [477]</td>
                                        <td class="table-data-sm last-col">13.0 [459]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-center text-[14px] font-semibold text-white">
                                            20 psi [138 kPa]
                                        </th>
                                        <td class="table-data-sm">3.6 [127]</td>
                                        <td class="table-data-sm">5.6 [198]</td>
                                        <td class="table-data-sm">5.6 [198]</td>
                                        <td class="table-data-sm">5.6 [198]</td>
                                        <td class="table-data-sm">5.5 [194]</td>
                                        <td class="table-data-sm">9.9 [350]</td>
                                        <td class="table-data-sm">18.9 [667]</td>
                                        <td class="table-data-sm last-col">18.2 [643]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-center text-[14px] font-semibold text-white">
                                            30 psi [207 kPa]
                                        </th>
                                        <td class="table-data-sm">4.6 [162]</td>
                                        <td class="table-data-sm">7.2 [254]</td>
                                        <td class="table-data-sm">7.2 [254]</td>
                                        <td class="table-data-sm">7.2 [254]</td>
                                        <td class="table-data-sm">7.1 [251]</td>
                                        <td class="table-data-sm">12.8 [452]</td>
                                        <td class="table-data-sm">24.4 [862]</td>
                                        <td class="table-data-sm last-col">23.4 [826]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-center text-[14px] font-semibold text-white">
                                            50 psi [345kPa]
                                        </th>
                                        <td class="table-data-sm">6.6 [233]</td>
                                        <td class="table-data-sm">10.4 [367]</td>
                                        <td class="table-data-sm">10.4 [367]</td>
                                        <td class="table-data-sm">10.4 [367]</td>
                                        <td class="table-data-sm">10.3 [364]</td>
                                        <td class="table-data-sm">18.5 [653]</td>
                                        <td class="table-data-sm">35.3 [1,247]</td>
                                        <td class="table-data-sm last-col">33.9 [1,197]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-left text-[14px] font-semibold text-white">
                                            Max Pressure Differential<span class="align-super text-[9px]">2</span> (kPag)
                                            [psig]
                                        </th>
                                        <td class="table-data-sm">1138 [165]</td>
                                        <td class="table-data-sm">1138 [165]</td>
                                        <td class="table-data-sm">1138 [165]</td>
                                        <td class="table-data-sm">1138 [165]</td>
                                        <td class="table-data-sm">2413 [350]</td>
                                        <td class="table-data-sm">1379 [200]</td>
                                        <td class="table-data-sm">689 [100]</td>
                                        <td class="table-data-sm last-col">1896 [275]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-left text-[14px] font-semibold text-white">
                                            Motor Size (HP)
                                        </th>
                                        <td class="table-data-sm">10</td>
                                        <td class="table-data-sm">10</td>
                                        <td class="table-data-sm">25</td>
                                        <td class="table-data-sm">50</td>
                                        <td class="table-data-sm">50</td>
                                        <td class="table-data-sm">100</td>
                                        <td class="table-data-sm">100</td>
                                        <td class="table-data-sm last-col">150</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-left text-[14px] font-semibold text-white">
                                            H2S Handling
                                        </th>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check last-col">✓</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-left text-[14px] font-semibold text-white">
                                            3-Stage Cold Weather Startup
                                        </th>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check last-col">✓</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-3 py-3 text-left text-[14px] font-semibold text-white">
                                            Autonomous Controller
                                        </th>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check">✓</td>
                                        <td class="table-data-sm check last-col">✓</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-slate-200 bg-sky-500 px-3 py-3 text-left text-[14px] font-semibold text-white rounded-bl-xl">
                                            Color Touchscreen &amp; Remote Control
                                        </th>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check no-bottom">✓</td>
                                        <td class="table-data-sm check last-col no-bottom rounded-br-xl">✓</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="border-t border-slate-200 bg-slate-50/70 px-4 py-5 sm:px-6 sm:py-6">
                        <div class="space-y-3 text-xs leading-6 text-slate-600 sm:text-sm">
                            <p>
                                <span class="align-super text-[9px]">1</span>
                                Flow conditions calculated at 15°C [59°F] inlet pressure and with various components
                                operating at 100% efficiency.
                                Flow rates may vary based on inlet pressures, gas content, and other factors. Max gas rates
                                will be reduced by amount of liquids in total fluid.
                                Ask Fluidstream for max gas flow rates based on specific liquid rates and other varying
                                conditions.
                            </p>

                            <p>
                                <span class="align-super text-[9px]">2</span>
                                Max gas rates and max pressure differentials can be increased by configuring additional
                                unit(s) in parallel or in series.
                            </p>

                            <p>
                                <span class="align-super text-[9px]">3</span>
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

    <style>
        .table-data-sm {
            border-right: 1px solid rgb(226 232 240);
            border-bottom: 1px solid rgb(226 232 240);
            padding: 10px 12px;
            text-align: center;
            font-size: 14px;
            line-height: 1.45;
            font-weight: 500;
            color: rgb(30 41 59);
            background: #ffffff;
            white-space: nowrap;
        }

        .table-data-sm.last-col {
            border-right: 0;
        }

        .table-data-sm.no-bottom {
            border-bottom: 0;
        }

        .table-data-sm.check {
            color: #22c55e;
            font-size: 18px;
            font-weight: 700;
        }
    </style>

    <!-- CTA -->
    <section class="bg-white py-16 sm:py-18">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="rounded-[32px] border border-slate-200 bg-slate-50 px-8 py-12 sm:px-10 lg:px-14 lg:py-16">
                <div class="grid gap-8 lg:grid-cols-[1.2fr_auto] lg:items-center">
                    <div>
                        <span
                            class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                            Get in Touch
                        </span>

                        <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl">
                            Let’s discuss your casing gas compression requirements
                        </h2>

                        <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                            Connect with us to explore how CompressionCommander<span class="align-super text-xs">™</span>
                            can support low-cost operation, autonomous control, and better overall project economics.
                        </p>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row lg:flex-col">
                        <a href="{{ url('/contact') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-slate-800">
                            Contact Us
                        </a>

                        <a href="{{ url('/vapor-recovery') }}"
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
        .benefits-reveal,
        .table-reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.85s ease, transform 0.85s ease;
            will-change: opacity, transform;
        }

        .overview-reveal.is-visible,
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
            const blocks = document.querySelectorAll('.overview-reveal, .benefits-reveal, .table-reveal');

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