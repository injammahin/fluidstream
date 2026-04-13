@extends('layouts.app')

@section('content')
    <section class="relative min-h-screen overflow-hidden">
        <!-- Background Video -->
        <video autoplay muted loop playsinline class="absolute inset-0 h-full w-full object-cover">
            <source src="{{ asset('/video/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-slate-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/70 via-slate-950/35 to-slate-950/20"></div>

        <!-- Hero Content -->
        <div class="relative z-10 flex min-h-screen items-center">
            <div class="mx-auto w-full max-w-7xl px-5 sm:px-6 lg:px-8">
                <div
                    class="grid min-h-screen items-center gap-10 py-28 lg:grid-cols-[minmax(0,1.2fr)_minmax(340px,0.8fr)] lg:gap-14">

                    <!-- Left Content -->
                    <div class="max-w-3xl">
                        <h1
                            class="max-w-3xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-white sm:text-5xl md:text-6xl lg:text-[54px]">
                            Reduce Methane Emissions and Increase Oil Production
                        </h1>

                        <div class="mt-5 h-1 w-20 rounded-full bg-sky-400"></div>

                        <p class="mt-7 max-w-2xl text-base font-medium leading-7 text-slate-200 sm:text-lg sm:leading-8">
                            Fluidstream provides reliable, low-maintenance, fully autonomous multiphase compression
                            technology to lower methane emissions and improve production efficiency.
                        </p>

                        <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                            <a href="{{ url('/multiphase-compression') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-sky-500 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-sky-600">
                                Explore Multiphase Compression
                            </a>

                            <a href="{{ url('/contact') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition duration-300 hover:bg-white/10">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    <!-- Right Quote Card -->
                    <div class="lg:justify-self-end">
                        <div
                            class="max-w-md rounded-[28px] border border-white/15 bg-white/10 p-6 shadow-[0_20px_60px_rgba(15,23,42,0.25)] backdrop-blur-xl sm:p-8">
                            <span
                                class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200">
                                Customer Quote
                            </span>

                            <blockquote
                                class="mt-5 text-lg font-semibold leading-8 text-white sm:text-[1.35rem] sm:leading-9">
                                “Fluidstream’s unit has operated consistently and eliminated gas venting. Since installation
                                15 months ago, the unit has provided 100% uptime and has not required any maintenance.”
                            </blockquote>

                            <div class="mt-6">
                                <p class="text-sm font-semibold text-white">
                                    VP Production, Allied Energy II Corp.
                                </p>
                            </div>

                            <div class="mt-7">
                                <a href="{{ url('/case-study') }}"
                                    class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition duration-300 hover:bg-slate-100">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Intro + Cards Section -->
    <section class="bg-[#ffffff] py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Heading Area -->
            <div class="max-w-3xl">
                <span
                    class="section-label">
                    Compression Technology
                </span>

                <h2
                    class="mt-6 text-4xl font-semibold leading-[1.02] tracking-[-0.045em] text-slate-900 sm:text-5xl lg:text-[58px]">
                    Multiphase Compression
                </h2>

                <p class="mt-8 max-w-2xl text-lg leading-8 text-slate-700 sm:text-[22px] sm:leading-9">
                    Fluidstream multiphase compression technology is proven to add immense value in oilfield
                    compression applications.
                </p>
            </div>

            <!-- Cards Row -->
            <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                <!-- Card 1 -->
                <a href="{{ url('/multiphase-compression') }}" class="row-hover-card group">
                    <div class="row-hover-card__base">
                        <h3 class="row-hover-card__title ">
                            Multiphase Compression
                        </h3>

                        <div class="row-hover-card__explore">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>

                    <div class="row-hover-card__panel">
                        <div>
                            <h3 class="row-hover-card__panel-title">
                                Multiphase Compression
                            </h3>

                            <p class="row-hover-card__panel-text">
                                Improve oil production with advanced multiphase compression systems engineered for
                                efficiency and
                                reliability. </p>
                        </div>

                        <div class="row-hover-card__panel-explore">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="{{ url('/vapor-recovery') }}" class="row-hover-card group">
                    <div class="row-hover-card__base">
                        <h3 class="row-hover-card__title">
                            Vapor Recovery
                        </h3>

                        <div class="row-hover-card__explore">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>

                    <div class="row-hover-card__panel">
                        <div>
                            <h3 class="row-hover-card__panel-title">
                                Vapor Recovery
                            </h3>

                            <p class="row-hover-card__panel-text">
                                Recover valuable vapors, reduce waste, and improve site efficiency with reliable vapor
                                recovery
                                solutions.
                            </p>
                        </div>

                        <div class="row-hover-card__panel-explore">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="{{ url('/casing-gas-compression') }}" class="row-hover-card group md:col-span-2 xl:col-span-1">
                    <div class="row-hover-card__base">
                        <h3 class="row-hover-card__title">
                            Casing Gas Compression
                        </h3>

                        <div class="row-hover-card__explore">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>

                    <div class="row-hover-card__panel">
                        <div>
                            <h3 class="row-hover-card__panel-title">
                                Casing Gas Compression
                            </h3>

                            <p class="row-hover-card__panel-text">
                                Capture and compress casing gas efficiently to support cleaner and more productive field
                                operations.
                            </p>
                        </div>

                        <div class="row-hover-card__panel-explore">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <style>
        .row-hover-card {
            position: relative;
            display: block;
            min-height: 300px;
            overflow: hidden;
            border: 1px solid #ddddda;
            background: #ffffff;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
            transition: transform 0.45s ease, box-shadow 0.45s ease;
        }

        .row-hover-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.10);
        }

        .row-hover-card__base {
            display: flex;
            height: 100%;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem 1.8rem 1.6rem;
        }

        .row-hover-card__title {
            max-width: 220px;
            font-size: 2rem;
            line-height: 1.08;
            letter-spacing: -0.045em;
            font-weight: 400;
            color: #050816;
        }

        .row-hover-card__explore {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 1rem;
            font-weight: 600;
            color: #1238ff;
        }

        .row-hover-card__panel {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem 1.8rem 1.6rem;
            background: #1238ff;
            color: #ffffff;
            transform: translateY(100%);
            transition: transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform;
        }

        .row-hover-card:hover .row-hover-card__panel {
            transform: translateY(0);
        }

        .row-hover-card__panel-title {
            max-width: 220px;
            font-size: 1.9rem;
            line-height: 1.08;
            letter-spacing: -0.045em;
            font-weight: 400;
            color: #ffffff;
        }

        .row-hover-card__panel-text {
            margin-top: 1.4rem;
            max-width: 290px;
            font-size: 1rem;
            line-height: 1.75;
            color: rgba(255, 255, 255, 0.92);
        }

        .row-hover-card__panel-explore {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 1rem;
            font-weight: 500;
            color: #ffffff;
        }

        @media (max-width: 1279px) {
            .row-hover-card {
                min-height: 280px;
            }

            .row-hover-card__title,
            .row-hover-card__panel-title {
                font-size: 1.75rem;
                max-width: 200px;
            }

            .row-hover-card__panel-text {
                max-width: 290px;
                font-size: 0.95rem;
                line-height: 1.65;
            }
        }

        @media (max-width: 767px) {
            .row-hover-card {
                min-height: 240px;
            }

            .row-hover-card__base,
            .row-hover-card__panel {
                padding: 1.5rem 1.3rem 1.25rem;
            }

            .row-hover-card__title,
            .row-hover-card__panel-title {
                font-size: 1.5rem;
                max-width: 180px;
            }

            .row-hover-card__explore,
            .row-hover-card__panel-explore {
                font-size: 0.95rem;
            }

            .row-hover-card__panel-text {
                margin-top: 1rem;
                max-width: 280px;
                font-size: 0.9rem;
                line-height: 1.55;
            }
        }
    </style>
    <section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-[1.02fr_0.98fr] lg:gap-16">

                <!-- Left Content -->
                <div class="relative max-w-xl">
                    <div class="mb-7 inline-flex items-center gap-3">
                        <span class="section-label">
                            Technology Leadership
                        </span>
                    </div>

                    <div class="relative">
                        <div class="absolute -left-5 top-2 hidden h-16 w-16 rounded-full border border-slate-200/70 lg:block"></div>

                        <h2 class="relative text-[24px] font-normal leading-[1.22] tracking-[-0.04em] text-slate-900 sm:text-[30px] lg:text-[40px]">
                            Designed and built for reliability, cost efficiencies,
                            comprehensive and autonomous control, and broad applicability
                        </h2>
                    </div>

                    <p class="mt-7 max-w-lg text-base leading-8 text-slate-600 sm:text-lg">
                        Engineered for dependable field performance with lower maintenance,
                        broader operating flexibility, and strong economic value.
                    </p>
                </div>

                <!-- Right Cards -->
                <div class="relative">
                    <div class="grid auto-rows-fr grid-cols-1 gap-5 sm:grid-cols-2 lg:gap-6">

                        <!-- Card 1 -->
                        <div class="group h-full rounded-[5px] border border-[#e7e7e3] bg-white p-7 shadow-[0_12px_35px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_22px_55px_rgba(15,23,42,0.09)]">
                            <div class="flex h-full flex-col items-center text-center">
                                <h3 class="text-[13px] font-semibold uppercase tracking-[0.28em] text-slate-900">
                                    Unmatched Value <br>&amp; Return on Investment
                                </h3>

                                <div class="my-7 h-px w-14 bg-slate-200"></div>

                                <p class="max-w-[250px] text-[17px] leading-8 text-slate-600">
                                    Less cost and maintenance, and more features and benefits.
                                </p>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="group h-full rounded-[5px] border border-[#e7e7e3] bg-white p-7 shadow-[0_12px_35px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_22px_55px_rgba(15,23,42,0.09)]">
                            <div class="flex h-full flex-col items-center text-center">
                                 <h3 class="text-[13px] font-semibold uppercase tracking-[0.28em] text-slate-900">
                                    Multiphase <br>Compression
                                </h3>

                                <div class="my-7 h-px w-14 bg-slate-200"></div>

                                <p class="max-w-[250px] text-[17px] leading-8 text-slate-600">
                                    Easily handles full range (0 to 100%) gas volume fractions (GVF).
                                </p>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="group h-full rounded-[5px] border border-[#e7e7e3] bg-white p-7 shadow-[0_12px_35px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_22px_55px_rgba(15,23,42,0.09)]">
                            <div class="flex h-full flex-col items-center text-center">
                                <h3 class="text-[13px] font-semibold uppercase tracking-[0.28em] text-slate-900">
                                    Fully Autonomous
                                </h3>

                                <div class="my-7 h-px w-14 bg-slate-200"></div>

                                <p class="max-w-[250px] text-[17px] leading-8 text-slate-600">
                                    Works to meet multiple operator-defined targets.
                                </p>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="group h-full rounded-[5px] border border-[#e7e7e3] bg-white p-7 shadow-[0_12px_35px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_22px_55px_rgba(15,23,42,0.09)]">
                            <div class="flex h-full flex-col items-center text-center">
                                 <h3 class="text-[13px] font-semibold uppercase tracking-[0.28em] text-slate-900">
                                    Broad Operating <br>Range
                                </h3>

                                <div class="my-7 h-px w-14 bg-slate-200"></div>

                                <p class="max-w-[250px] text-[17px] leading-8 text-slate-600">
                                    100% functional range for flow, inlet and discharge pressure, and motor load.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-white py-12 sm:py-12 lg:py-16">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100 blur-3xl opacity-70"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100 blur-3xl opacity-60"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="patent-reveal grid items-start gap-12 lg:grid-cols-[1.05fr_1fr] lg:gap-20">
                <!-- Left -->
                <div class="lg:sticky lg:top-28">
                    <span
                        class="section-label">
                        Innovation
                    </span>

                    <h2 class="mt-6 text-4xl font-semibold tracking-[-0.04em] text-slate-900 sm:text-5xl lg:text-6xl">
                        Patented
                        <span class="block text-slate-700">Technology</span>
                    </h2>

                    <div class="mt-6 h-px w-24 bg-slate-300"></div>

                    <p class="mt-8 max-w-xl text-lg leading-8 text-slate-600">
                        Designed to improve control, efficiency, and reliability through a cleaner and more intelligent
                        compression process.
                    </p>
                </div>

                <!-- Right -->
                <div class="space-y-6">
                    <div
                        class="rounded-[30px] border border-slate-200 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.05)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_24px_70px_rgba(15,23,42,0.08)] sm:p-10">
                        <div class="flex items-start gap-5">
                          

                            <div>
                                <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                    Multiphase Operations
                                </h3>

                                <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                    A safe, efficient, reliable, and optimal approach for handling incompressible liquids
                                    within a compression chamber.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="rounded-[30px] border border-slate-200 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.05)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_24px_70px_rgba(15,23,42,0.08)] sm:p-10">
                        <div class="flex items-start gap-5">
                           

                            <div>
                                <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                    Power Efficiency
                                </h3>

                                <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                    Minimizes power demand by slowing compressor stroke during the final stage of
                                    compression and redistributing speed earlier in the cycle where lower power is required.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="rounded-[30px] border border-slate-200 bg-white p-8 shadow-[0_20px_60px_rgba(15,23,42,0.05)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_24px_70px_rgba(15,23,42,0.08)] sm:p-10">
                        <div class="flex items-start gap-5">
                            

                            <div>
                                <h3 class="text-2xl font-semibold tracking-[-0.02em] text-slate-900">
                                    Sealing (patent pending)
                                </h3>

                                <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                                    Advanced sealing to ensure multiphase fluid does migrate into power cylinder. Auto
                                    detection of gland seal wear, providing operator advance warning of seal wear.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .patent-reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.85s ease, transform 0.85s ease;
            will-change: opacity, transform;
        }

        .patent-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .patent-reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const blocks = document.querySelectorAll('.patent-reveal');

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

@endsection