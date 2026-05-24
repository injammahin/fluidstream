@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden bg-[#f7f9fc] py-24">


    {{-- Grid pattern --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.35]"
        >
    </div>

    <div class="container relative mx-auto px-6 py-12">
        <div class="mx-auto max-w-5xl rounded-[12px] border border-white/70 py-24 bg-white/85 p-6 shadow-[0_30px_90px_rgba(16,42,67,.12)] backdrop-blur-xl md:p-10">
            <div class="grid items-center gap-10 lg:grid-cols-[0.9fr_1.1fr]">

                {{-- Left visual --}}
                <div class="relative">
                    <div class="relative mx-auto flex h-72 w-72 items-center justify-center rounded-full bg-[#edf3ff] shadow-inner md:h-96 md:w-96">
                        <div class="absolute inset-6 rounded-full border border-[#0018dc]/10"></div>
                        <div class="absolute inset-12 rounded-full border border-[#15d1ff]/30"></div>

                        <div class="relative text-center">
                            <div class="text-[92px] font-black leading-none tracking-[-0.08em] text-[#0018dc] md:text-[132px]">
                                404
                            </div>
                            <div class="mt-3 inline-flex rounded-full bg-white px-5 py-2 text-xs font-black uppercase tracking-[0.22em] text-[#0018dc] shadow-sm">
                                Not Found
                            </div>
                        </div>
                    </div>

                    <div class="absolute left-4 top-8 hidden rounded-2xl border border-[#d9e6ff] bg-white px-4 py-3 shadow-lg md:block">
                        <p class="text-xs font-black uppercase tracking-widest text-[#0018dc]">Route Check</p>
                        <p class="mt-1 text-sm font-semibold text-slate-600">Page unavailable</p>
                    </div>

                    <div class="absolute bottom-8 right-2 hidden rounded-2xl border border-[#d9e6ff] bg-white px-4 py-3 shadow-lg md:block">
                        <p class="text-xs font-black uppercase tracking-widest text-[#0018dc]">Status</p>
                        <p class="mt-1 text-sm font-semibold text-slate-600">Helpful links ready</p>
                    </div>
                </div>

                {{-- Right content --}}
                <div>
                    <div class="inline-flex items-center gap-3 rounded-full border border-[#d3e1ff] bg-[#edf3ff] px-4 py-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#15d1ff] shadow-[0_0_18px_rgba(21,209,255,.7)]"></span>
                        <span class="text-xs font-black uppercase tracking-[0.18em] text-[#0018dc]">
                            404 Error
                        </span>
                    </div>

                    <h1 class="mt-6 text-4xl font-black leading-[1.02] tracking-[-0.06em] text-slate-950 md:text-6xl">
                        This page has moved or does not exist.
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                        The page you are looking for may have been renamed, removed, or entered incorrectly.
                        Use one of the links below to continue exploring Fluidstream.
                    </p>

                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        <a href="{{ url('/') }}"
                            class="group flex items-center justify-between rounded-2xl border border-[#0018dc] bg-[#0018dc] px-5 py-4 text-white shadow-[0_14px_32px_rgba(0,24,220,.18)] transition hover:-translate-y-1 hover:bg-[#1433ff]">
                            <span class="font-extrabold">Go to Homepage</span>
                            <span class="text-xl transition group-hover:translate-x-1">→</span>
                        </a>

                        <a href="{{ url('/technical-review') }}"
                            class="group flex items-center justify-between rounded-2xl border border-[#d9e6ff] bg-white px-5 py-4 text-slate-900 shadow-sm transition hover:-translate-y-1 hover:border-[#0018dc] hover:text-[#0018dc]">
                            <span class="font-extrabold">Request Technical Review</span>
                            <span class="text-xl transition group-hover:translate-x-1">→</span>
                        </a>

                        <a href="{{ url('/case-studies') }}"
                            class="group flex items-center justify-between rounded-2xl border border-[#d9e6ff] bg-white px-5 py-4 text-slate-900 shadow-sm transition hover:-translate-y-1 hover:border-[#0018dc] hover:text-[#0018dc]">
                            <span class="font-extrabold">View Case Studies</span>
                            <span class="text-xl transition group-hover:translate-x-1">→</span>
                        </a>

                        <a href="{{ url('/insights') }}"
                            class="group flex items-center justify-between rounded-2xl border border-[#d9e6ff] bg-white px-5 py-4 text-slate-900 shadow-sm transition hover:-translate-y-1 hover:border-[#0018dc] hover:text-[#0018dc]">
                            <span class="font-extrabold">Read Insights</span>
                            <span class="text-xl transition group-hover:translate-x-1">→</span>
                        </a>
                    </div>

                    <div class="mt-8 rounded-2xl border border-[#d9e6ff] bg-[#f8fbff] p-5">
                        <p class="text-sm font-bold text-slate-900">
                            Need help finding something specific?
                        </p>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Contact Fluidstream for product information, application review, vapor recovery,
                            casing gas compression, or multiphase compression support.
                        </p>

                        <a href="{{ url('/contact') }}"
                            class="mt-4 inline-flex items-center gap-2 rounded-full bg-white px-5 py-3 text-sm font-black text-[#0018dc] shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            Contact Fluidstream
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection