@extends('layouts.app')

@section('content')
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 text-center">
        <p class="text-sm font-bold uppercase tracking-widest text-[#0018dc]">Submission Received</p>

        <h1 class="mt-4 text-4xl font-bold text-slate-900">
            Thank you for your technical review request.
        </h1>

        <p class="mt-6 max-w-2xl mx-auto text-lg text-slate-600">
            Fluidstream has received your information. Our team typically responds within 1–2 business days.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="{{ url('/case-studies') }}" class="px-6 py-3 rounded-full bg-[#0018dc] text-white font-bold">
                Explore Case Studies
            </a>

            <a href="{{ url('/insights') }}" class="px-6 py-3 rounded-full border border-slate-300 text-slate-900 font-bold">
                Read Insights
            </a>
        </div>
    </div>
</section>
@endsection