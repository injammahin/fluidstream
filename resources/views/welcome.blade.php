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
            <div class="grid min-h-screen items-center gap-10 py-28 lg:grid-cols-[minmax(0,1.2fr)_minmax(340px,0.8fr)] lg:gap-14">

                <!-- Left Content -->
                <div class="max-w-3xl">
                    <h1 class="max-w-3xl text-3xl font-extrabold leading-[1.08] tracking-[-0.03em] text-white sm:text-5xl md:text-6xl lg:text-[54px]">
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
                    <div class="max-w-md rounded-[28px] border border-white/15 bg-white/10 p-6 shadow-[0_20px_60px_rgba(15,23,42,0.25)] backdrop-blur-xl sm:p-8">
                        <span class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200">
                            Customer Quote
                        </span>

                        <blockquote class="mt-5 text-lg font-semibold leading-8 text-white sm:text-[1.35rem] sm:leading-9">
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
    <!-- Intro Section -->
<!-- Intro + Cards Section -->
<section class="bg-[#efefed] py-16 sm:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- Heading Area -->
        <div class="max-w-3xl">
            <span
                class="inline-flex items-center rounded-full border border-sky-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-700 shadow-sm">
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
                    <h3 class="row-hover-card__title">
                        Efficient Recovery
                    </h3>

                    <div class="row-hover-card__explore">
                        <span>Explore</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>

                <div class="row-hover-card__panel">
                    <div>
                        <h3 class="row-hover-card__panel-title">
                            Efficient Recovery
                        </h3>

                        <p class="row-hover-card__panel-text">
                            Capture more value from existing operations with efficient recovery-focused systems.
                        </p>
                    </div>

                    <div class="row-hover-card__panel-explore">
                        <span>Explore</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </a>

            <!-- Card 2 -->
            <a href="{{ url('/vapor-recovery') }}" class="row-hover-card group">
                <div class="row-hover-card__base">
                    <h3 class="row-hover-card__title">
                        Field Proven
                    </h3>

                    <div class="row-hover-card__explore">
                        <span>Explore</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>

                <div class="row-hover-card__panel">
                    <div>
                        <h3 class="row-hover-card__panel-title">
                            Field Proven
                        </h3>

                        <p class="row-hover-card__panel-text">
                            Designed for dependable performance in challenging and remote operating environments.
                        </p>
                    </div>

                    <div class="row-hover-card__panel-explore">
                        <span>Explore</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </a>

            <!-- Card 3 -->
            <a href="{{ url('/casing-gas-compression') }}" class="row-hover-card group md:col-span-2 xl:col-span-1">
                <div class="row-hover-card__base">
                    <h3 class="row-hover-card__title">
                        Autonomous Operation
                    </h3>

                    <div class="row-hover-card__explore">
                        <span>Explore</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>

                <div class="row-hover-card__panel">
                    <div>
                        <h3 class="row-hover-card__panel-title">
                            Autonomous Operation
                        </h3>

                        <p class="row-hover-card__panel-text">
                            Reduce maintenance demand with systems engineered for autonomous continuous operation.
                        </p>
                    </div>

                    <div class="row-hover-card__panel-explore">
                        <span>Explore</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
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
        background: #f7f7f5;
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
        max-width: 240px;
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
            max-width: 220px;
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
            max-width: 190px;
            font-size: 0.9rem;
            line-height: 1.55;
        }
    }
</style>
    <section class="relative bg-white py-12 sm:py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
            <div class="tech-clean-reveal">
                <div class="mx-auto max-w-3xl text-center">
                    <span
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                        Technology Leadership
                    </span>

                    <h2 class="mt-6 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl lg:text-5xl">
                        Built for performance, efficiency, and control
                    </h2>

                    <div class="mx-auto mt-5 h-px w-24 bg-slate-300"></div>

                    <p class="mx-auto mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                        Our technology is designed to reduce operating burden, improve flexibility, and deliver dependable
                        results across a broad range of applications.
                    </p>
                </div>

                <div class="mt-16 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <div
                        class="group rounded-[28px] border border-slate-200 bg-white p-8 transition duration-500 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 8.25V6.75A2.25 2.25 0 0 0 14.25 4.5h-4.5A2.25 2.25 0 0 0 7.5 6.75v10.5A2.25 2.25 0 0 0 9.75 19.5h4.5A2.25 2.25 0 0 0 16.5 17.25v-1.5M12 8.25v7.5M9.75 10.5h4.5M18.75 15.75l1.5-1.5m0 0-1.5-1.5m1.5 1.5h-6" />
                            </svg>
                        </div>

                        <h3 class="mt-8 text-xl font-semibold leading-snug text-slate-900">
                            Unmatched Value &amp; Return on Investment
                        </h3>

                        <p class="mt-4 text-base leading-8 text-slate-600">
                            Less cost and maintenance, with more practical benefits and stronger long-term value.
                        </p>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-white p-8 transition duration-500 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0Zm-4.5 0h1.5m15 0H21M12 3v1.5M12 19.5V21M5.636 5.636l1.06 1.06m10.608 10.608 1.06 1.06m0-12.728-1.06 1.06M6.696 17.304l-1.06 1.06" />
                            </svg>
                        </div>

                        <h3 class="mt-8 text-xl font-semibold leading-snug text-slate-900">
                            Fully Autonomous
                        </h3>

                        <p class="mt-4 text-base leading-8 text-slate-600">
                            Works to meet multiple operator-defined targets with dependable autonomous operation.
                        </p>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-white p-8 transition duration-500 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12h18M12 3v18M5.25 5.25l13.5 13.5M18.75 5.25 5.25 18.75" />
                            </svg>
                        </div>

                        <h3 class="mt-8 text-xl font-semibold leading-snug text-slate-900">
                            Broad Operating Range
                        </h3>

                        <p class="mt-4 text-base leading-8 text-slate-600">
                            100% functional range for flow, inlet and discharge pressure, and motor load.
                        </p>
                    </div>

                    <div
                        class="group rounded-[28px] border border-slate-200 bg-white p-8 transition duration-500 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.06)]">
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <circle cx="8" cy="12" r="3.5"></circle>
                                <circle cx="15.5" cy="8" r="2.5"></circle>
                                <circle cx="16.5" cy="15.5" r="3"></circle>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.8 10.3 13.1 8.9M10.9 13.5l2.7 1.3" />
                            </svg>
                        </div>

                        <h3 class="mt-8 text-xl font-semibold leading-snug text-slate-900">
                            Multiphase Compression
                        </h3>

                        <p class="mt-4 text-base leading-8 text-slate-600">
                            Easily handles the full range of gas volume fractions from 0 to 100% GVF.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .tech-clean-reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.8s ease, transform 0.8s ease;
            will-change: opacity, transform;
        }

        .tech-clean-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .tech-clean-reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const blocks = document.querySelectorAll('.tech-clean-reveal');

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
                        class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
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
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 15A2.25 2.25 0 0 1 6 12.75h12A2.25 2.25 0 0 1 20.25 15v.75A2.25 2.25 0 0 1 18 18H6a2.25 2.25 0 0 1-2.25-2.25V15ZM7.5 12.75V9a4.5 4.5 0 1 1 9 0v3.75" />
                                </svg>
                            </div>

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
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-slate-700">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v8.25m0 0 3-3m-3 3-3-3M4.5 14.25h15M6.75 18h10.5" />
                                </svg>
                            </div>

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
    <!-- Solutions Section -->
    <section class="bg-slate-50 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <span class="inline-flex rounded-full bg-sky-100 px-4 py-2 text-sm font-semibold text-sky-700">
                    Our Core Solutions
                </span>

                <h2 class="mt-6 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Built around performance, recovery, and operational value
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Explore our specialized compression technologies designed to increase production and support cleaner
                    operations.
                </p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <a href="{{ url('/multiphase-compression') }}"
                    class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <h3 class="text-2xl font-semibold text-slate-900 transition group-hover:text-sky-700">
                        Multiphase Compression
                    </h3>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        Improve oil production with advanced multiphase compression systems engineered for efficiency and
                        reliability.
                    </p>
                    <div class="mt-6 text-sm font-semibold text-sky-700">
                        Learn more →
                    </div>
                </a>

                <a href="{{ url('/vapor-recovery') }}"
                    class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <h3 class="text-2xl font-semibold text-slate-900 transition group-hover:text-sky-700">
                        Vapor Recovery
                    </h3>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        Recover valuable vapors, reduce waste, and improve site efficiency with reliable vapor recovery
                        solutions.
                    </p>
                    <div class="mt-6 text-sm font-semibold text-sky-700">
                        Learn more →
                    </div>
                </a>

                <a href="{{ url('/casing-gas-compression') }}"
                    class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl md:col-span-2 xl:col-span-1">
                    <h3 class="text-2xl font-semibold text-slate-900 transition group-hover:text-sky-700">
                        Casing Gas Compression
                    </h3>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        Capture and compress casing gas efficiently to support cleaner and more productive field operations.
                    </p>
                    <div class="mt-6 text-sm font-semibold text-sky-700">
                        Learn more →
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection