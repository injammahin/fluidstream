@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="relative min-h-screen overflow-hidden bg-slate-950">
        <!-- Poster first, video loads after -->
        <div class="absolute inset-0">
            <video id="multiphaseHeroVideo" class="h-full w-full object-cover" muted loop playsinline autoplay
                preload="none" poster="{{ asset('img/multiphase-hero-poster.jpg') }}">
                <source data-src="{{ asset('/video/video2.mp4') }}" type="video/webm">
                <source data-src="{{ asset('/video/video2.mp4') }}" type="video/mp4">

            </video>
        </div>

        <!-- Overlays -->
        <div class="absolute inset-0 bg-black/45"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/35 to-black/25"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20"></div>

        <!-- Content -->
        <div class="relative z-10 flex min-h-screen items-center">
            <div class="mx-auto w-full max-w-7xl px-5 sm:px-6 lg:px-8">
                <div class="max-w-4xl pt-24 sm:pt-28 lg:pt-20">
                    <span
                        class="inline-flex items-center rounded-full border border-white/15 bg-white/8 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200 backdrop-blur-sm sm:text-xs">
                        Multiphase Compression
                    </span>

                    <h1
                        class="mt-6 max-w-xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-white sm:text-5xl md:text-6xl lg:text-[50px]">
                        Production Optimization Through Multiphase Compression
                    </h1>

                    <div class="mt-5 h-1 w-20 rounded-full bg-sky-400 sm:w-24"></div>

                    <p
                        class="mt-7 max-w-3xl text-base font-medium leading-7 text-slate-200 sm:text-lg sm:leading-8 lg:text-[22px] lg:leading-9">
                        Most cost-effective, fully autonomous multiphase technology available in the industry.
                    </p>

                    {{-- <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#technology-overview"
                            class="inline-flex items-center justify-center rounded-xl bg-sky-500 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-sky-600">
                            Explore Technology
                        </a>

                        <a href="{{ url('/contact') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition duration-300 hover:bg-white/15">
                            Contact Us
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const video = document.getElementById('multiphaseHeroVideo');
            if (!video) return;

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
                requestIdleCallback(loadVideo, { timeout: 1200 });
            } else {
                setTimeout(loadVideo, 500);
            }
        });
    </script>
    <section class="relative overflow-hidden bg-white py-4 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-10 top-10 h-40 w-40 rounded-full bg-slate-100 blur-3xl opacity-70"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100 blur-3xl opacity-60"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="patented-reveal grid items-start gap-12 lg:grid-cols-[1.05fr_1fr] lg:gap-20">
                <div>
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Core Technology
                    </span>

                    <h2
                        class="mt-6 text-4xl font-semibold leading-tight tracking-[-0.04em] text-slate-900 sm:text-5xl lg:text-6xl">
                        Patented Multiphase
                        <span class="block text-slate-700">Technology</span>
                    </h2>

                    <div class="mt-6 h-px w-24 bg-slate-300"></div>
                </div>

                <div
                    class="rounded-[32px] border border-slate-200 bg-slate-50/70 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.04)] sm:p-10">
                    <div class="space-y-6 text-lg leading-9 text-slate-600">
                        <p>
                            Fluidstream has developed a leading robust, cost-efficient, fully autonomous multiphase
                            compression
                            technology that can be used for various oilfield applications.
                        </p>

                        <p>
                            Built with sturdy, high-quality components and advanced proprietary programming to optimize
                            operation and functionality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-white py-4 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div
                class="economics-white-reveal rounded-[36px] border border-slate-200 bg-white px-8 py-12 shadow-[0_20px_60px_rgba(15,23,42,0.05)] sm:px-10 sm:py-14 lg:px-14 lg:py-16">
                <div class="mx-auto max-w-4xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Project Economics
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Designed to maximize project economics
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>

                    <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                        Built to improve value across the project lifecycle through stronger production performance, lower
                        ownership burden, and reduced operating demand.
                    </p>
                </div>

                <div class="mt-14 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-700 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0-5 5m5-5 5 5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Return on Investment
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            Stronger project value through improved production performance and operational efficiency.
                        </p>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-700 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Total Cost of Ownership
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            Lower lifecycle burden through durable systems, efficient control, and less maintenance.
                        </p>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-700 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Initial Purchase Cost
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            A more practical capital profile that supports stronger economics from the beginning.
                        </p>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-slate-50/60 p-8 text-center transition duration-500 hover:-translate-y-1 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-700 transition duration-500 group-hover:scale-105">
                            <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
                            </svg>
                        </div>

                        <h3 class="mt-6 text-xl font-semibold text-slate-900">
                            Operating Costs
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            Reduced operating demand through dependable autonomous functionality and lower service needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .economics-white-reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.85s ease, transform 0.85s ease;
            will-change: opacity, transform;
        }

        .economics-white-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .economics-white-reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const blocks = document.querySelectorAll('.economics-white-reveal');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.15
            });

            blocks.forEach((block) => observer.observe(block));
        });
    </script>
    <section class="relative overflow-hidden bg-white py-4 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 top-10 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="benefits-reveal">
                <div class="mx-auto max-w-3xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Key Advantages
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Technology Driven Benefits
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>
                </div>

                <div class="mt-16 grid gap-6 lg:grid-cols-2">
                    <div class="space-y-6">
                        <div
                            class="rounded-[28px] border border-slate-200 bg-slate-50/60 p-7 transition duration-500 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Low Cost and Quicker Payout
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                Most cost-competitive multiphase technology available that provides maximum return on
                                investment while reducing total cost of ownership.
                            </p>
                        </div>

                        <div
                            class="rounded-[28px] border border-slate-200 bg-slate-50/60 p-7 transition duration-500 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Handles up to 100% Liquids
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                Patented multiphase operation can handle up to 100% liquids or any combination of liquids
                                and gas. No scrubber required. Gas volume fractions (GVF) between 0 and 100%.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div
                            class="rounded-[28px] border border-slate-200 bg-slate-50/60 p-7 transition duration-500 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Fully Autonomous with Comprehensive Controls
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                Works autonomously to achieve operator-defined operational targets. Features comprehensive
                                controls to configure for any complex or upset condition.
                            </p>
                        </div>

                        <div
                            class="rounded-[28px] border border-slate-200 bg-slate-50/60 p-7 transition duration-500 hover:bg-white hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-8">
                            <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                Low Maintenance
                            </h3>
                            <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                The simple and robust design and comprehensive controls ensure significantly reduced
                                maintenance cycles.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-white py-4 sm:py-12 lg:py-12">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 bottom-0 h-48 w-48 rounded-full bg-white/70 blur-3xl"></div>
            <div class="absolute right-0 top-0 h-52 w-52 rounded-full bg-white/60 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="patent-clean-reveal grid items-center gap-12 lg:grid-cols-[1fr_1fr] lg:gap-20">
                <div>
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Patent
                    </span>

                    <h2 class="mt-6 text-4xl font-semibold tracking-[-0.04em] text-slate-900 sm:text-5xl lg:text-6xl">
                        Multiphase Patent
                    </h2>

                    <div class="mt-6 h-px w-24 bg-slate-300"></div>
                </div>

                <div
                    class="rounded-[30px] border border-slate-200 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.05)] sm:p-10">
                    <p class="text-lg leading-9 text-slate-600 sm:text-xl">
                        Fluidstream has developed and secured a multiphase patent that provides the only safe, efficient,
                        reliable, and optimal way to handle incompressible liquids in a compression chamber.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-white py-20 sm:py-24 lg:py-28">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="model-table-reveal">
                <div class="mx-auto max-w-4xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Model Selection
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Select Your BoosterCommander<span class="align-super text-lg">™</span> Model
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>

                    <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                        Compare available BoosterCommander<span class="align-super text-xs">™</span> models by gas rate,
                        liquid rate, pressure differential, and motor size.
                    </p>
                </div>

                <div class="mt-14 rounded-[28px] border border-slate-200 bg-white shadow-[0_20px_60px_rgba(15,23,42,0.05)]">
                    <div class="border-b border-slate-200 px-5 py-4 sm:px-6">
                        <p class="text-sm font-medium text-slate-500">
                            Scroll horizontally on smaller screens to view the full table.
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="min-w-[1120px] p-3 sm:p-4">
                            <table class="w-full border-separate border-spacing-0 overflow-hidden rounded-2xl">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="bg-white px-4 py-3"></th>
                                        <th colspan="5"
                                            class="rounded-tl-2xl rounded-tr-2xl bg-sky-500 px-4 py-4 text-center text-base font-semibold text-white">
                                            MultiphaseCommander<span class="align-super text-[10px]">™</span> Model
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="border-b border-slate-200 bg-white px-4 py-3"></th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            MC1235</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            MC1245</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            MC1645</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            MC2245</th>
                                        <th
                                            class="border-l border-b border-slate-200 bg-sky-500 px-4 py-3 text-center text-base font-semibold text-white">
                                            MC2270-124</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th rowspan="5"
                                            class="w-[240px] border-r border-b border-slate-200 bg-sky-500 px-4 py-5 text-center align-middle text-[15px] font-semibold leading-7 text-white">
                                            Max Gas Rate<span class="align-super text-[10px]">1,2</span><br>
                                            @ Inlet Pressure<br>
                                            (e3m3/day) [mcf/day]
                                        </th>
                                        <th
                                            class="w-[180px] border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-center text-[15px] font-semibold text-white">
                                            5 psi [34 kPa]
                                        </th>
                                        <td class="table-data">3.2 [113]</td>
                                        <td class="table-data">3.2 [113]</td>
                                        <td class="table-data">5.7 [201]</td>
                                        <td class="table-data">10.7 [378]</td>
                                        <td class="table-data last-col">10.1 [357]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-center text-[15px] font-semibold text-white">
                                            50 psi [345 kPa]
                                        </th>
                                        <td class="table-data">10.4 [367]</td>
                                        <td class="table-data">10.4 [367]</td>
                                        <td class="table-data">18.5 [653]</td>
                                        <td class="table-data">35.3 [1,247]</td>
                                        <td class="table-data last-col">33.1 [1,169]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-center text-[15px] font-semibold text-white">
                                            100 psi [690 kPa]
                                        </th>
                                        <td class="table-data">18.5 [653]</td>
                                        <td class="table-data">18.3 [646]</td>
                                        <td class="table-data">32.9 [1,162]</td>
                                        <td class="table-data">62.5 [2,207]</td>
                                        <td class="table-data last-col">58.8 [2,077]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-center text-[15px] font-semibold text-white">
                                            150 psi [1034 kPa]
                                        </th>
                                        <td class="table-data">26.5 [936]</td>
                                        <td class="table-data">26.3 [929]</td>
                                        <td class="table-data">47.2 [1,667]</td>
                                        <td class="table-data">89.7 [3,168]</td>
                                        <td class="table-data last-col">84.4 [2981]</td>
                                    </tr>

                                    <tr>
                                        <th
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-center text-[15px] font-semibold text-white">
                                            200 psi [1379 kPa]
                                        </th>
                                        <td class="table-data">34.5 [1,218]</td>
                                        <td class="table-data">34.3 [1,211]</td>
                                        <td class="table-data">61.5 [2,172]</td>
                                        <td class="table-data">117 [4,132]</td>
                                        <td class="table-data last-col">110.0 [3885]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            Max Liquids Rate (m3/d) [bbl/d]
                                        </th>
                                        <td class="table-data">2,360 [14,800]</td>
                                        <td class="table-data">2,340 [14,700]</td>
                                        <td class="table-data">4,200 [26,400]</td>
                                        <td class="table-data">8,000 [50,300]</td>
                                        <td class="table-data last-col">7,500 [47,100]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-b border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white">
                                            Max Pressure Differential<span class="align-super text-[10px]">2</span> (kPag)
                                            [psig]
                                        </th>
                                        <td class="table-data">1379 [200]</td>
                                        <td class="table-data">2413 [350]</td>
                                        <td class="table-data">1379 [200]</td>
                                        <td class="table-data">689 [100]</td>
                                        <td class="table-data last-col">1896 [275]</td>
                                    </tr>

                                    <tr>
                                        <th colspan="2"
                                            class="border-r border-slate-200 bg-sky-500 px-4 py-4 text-left text-[15px] font-semibold text-white rounded-bl-2xl">
                                            Motor Size (HP)
                                        </th>
                                        <td class="table-data no-bottom">50</td>
                                        <td class="table-data no-bottom">50</td>
                                        <td class="table-data no-bottom">100</td>
                                        <td class="table-data no-bottom">100</td>
                                        <td class="table-data last-col no-bottom rounded-br-2xl">150</td>
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
                        </div>
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

        .model-table-reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.85s ease, transform 0.85s ease;
            will-change: opacity, transform;
        }

        .model-table-reveal.is-visible {
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
            .model-table-reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const blocks = document.querySelectorAll('.model-table-reveal');

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