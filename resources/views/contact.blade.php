@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="relative h-[62vh] min-h-[480px] w-full overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="{{ asset('/img/banner-contact-01.jpg') }}" alt="Contact Us"
                class="h-full w-full object-cover object-center">
        </div>

        <div class="relative z-10 flex h-full items-center">
            <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-5xl pt-16">
                    <span
                        class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-sky-200 backdrop-blur-sm">
                        Contact Us
                    </span>

                    <h1
                        class="mt-6 text-4xl font-extrabold leading-tight tracking-[-0.03em] text-white sm:text-5xl lg:text-7xl">
                        Let’s start a conversation
                    </h1>

                    <p class="mt-6 max-w-4xl text-lg leading-8 text-slate-200 sm:text-xl">
                        If you’d like to become a distributor or want to talk to us about a project, or anything else, we’d
                        love to hear from you.
                    </p>
                </div>
            </div>
        </div>

    </section>

    <!-- Contact Section -->
    <section class="relative overflow-hidden bg-white py-16 sm:py-20">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-40 w-40 rounded-full bg-slate-100/80 blur-3xl"></div>
            <div class="absolute right-0 bottom-0 h-52 w-52 rounded-full bg-slate-100/70 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    class="mb-8 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700 shadow-sm">
                    <div class="font-semibold">Please fix the following:</div>
                    <ul class="mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:gap-12">
                <!-- Form Card -->
                <div
                    class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-[0_20px_60px_rgba(15,23,42,0.05)] sm:p-8 lg:p-10">
                    <div class="max-w-3xl">
                        <span
                            class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                            Send a Message
                        </span>

                        <h2 class="mt-5 text-3xl font-semibold tracking-[-0.03em] text-slate-900 sm:text-4xl">
                            Tell us about your project
                        </h2>

                        <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
                            Please use the following form to send us a message. Any information you provide here will be
                            used only for the purposes of responding to your request.
                        </p>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST"
                        class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2">
                        @csrf

                        <div>
                            <label for="first_name" class="mb-2 block text-sm font-semibold text-slate-700">First
                                Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="First Name">
                        </div>

                        <div>
                            <label for="last_name" class="mb-2 block text-sm font-semibold text-slate-700">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="Last Name">
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="Email Address">
                        </div>

                        <div>
                            <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="Phone Number">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="company" class="mb-2 block text-sm font-semibold text-slate-700">Company</label>
                            <input type="text" id="company" name="company" value="{{ old('company') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="Company">
                        </div>

                        <div>
                            <label for="city" class="mb-2 block text-sm font-semibold text-slate-700">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="City">
                        </div>

                        <div>
                            <label for="country" class="mb-2 block text-sm font-semibold text-slate-700">Country</label>
                            <input type="text" id="country" name="country" value="{{ old('country') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="Country">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="mb-2 block text-sm font-semibold text-slate-700">Comment or
                                Message</label>
                            <textarea id="message" name="message" rows="7"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-900 outline-none transition focus:border-sky-400 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                placeholder="Comment or Message">{{ old('message') }}</textarea>
                        </div>

                        <div class="sm:col-span-2 flex flex-col gap-4 pt-2 sm:flex-row sm:items-center sm:justify-between">
                            <p class="text-sm leading-6 text-slate-500">
                                We typically respond as soon as possible during business hours.
                            </p>

                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-7 py-3.5 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-slate-800">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right Side -->
                <div class="space-y-8">
                    <div
                        class="rounded-[32px] border border-slate-200 bg-slate-50/70 p-6 shadow-[0_20px_60px_rgba(15,23,42,0.04)] sm:p-8">
                        <span
                            class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                            Office
                        </span>

                        <h3 class="mt-5 text-4xl font-semibold tracking-[-0.03em] text-slate-900">
                            Fluidstream Inc.
                        </h3>

                        <div class="mt-5 h-px w-20 bg-slate-300"></div>

                        <div class="mt-6 space-y-4 text-lg leading-8 text-slate-600">
                            <p>4416 5 St NE, Unit 1A</p>
                            <p>Calgary, AB T2E 7C3, Canada</p>
                        </div>

                        <div class="mt-8 grid gap-4">
                            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4">
                                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Email</div>
                                <div class="mt-2 text-base font-medium text-slate-800">info@fluidstream.co</div>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4">
                                <div class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Business</div>
                                <div class="mt-2 text-base font-medium text-slate-800">Project inquiries and distribution
                                    opportunities</div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-[0_20px_60px_rgba(15,23,42,0.05)]">
                        <div class="border-b border-slate-200 px-6 py-5">
                            <span
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">
                                Location Map
                            </span>
                        </div>

                        <div class="aspect-[4/3] w-full">
                            <iframe title="Fluidstream Map"
                                src="https://www.google.com/maps?q=4416%205%20St%20NE,%20Unit%201A,%20Calgary,%20AB%20T2E%207C3,%20Canada&output=embed"
                                width="100%" height="100%" style="border:0;" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Extra Section -->
    <section class="bg-slate-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.04)]">
                    <div class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Fast Response</div>
                    <h3 class="mt-4 text-2xl font-semibold text-slate-900">Professional communication</h3>
                    <p class="mt-4 text-base leading-8 text-slate-600">
                        Reach out for product discussions, business opportunities, and technical conversations.
                    </p>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.04)]">
                    <div class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Partnerships</div>
                    <h3 class="mt-4 text-2xl font-semibold text-slate-900">Distributor opportunities</h3>
                    <p class="mt-4 text-base leading-8 text-slate-600">
                        We welcome conversations around distribution, expansion, and long-term collaboration.
                    </p>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.04)]">
                    <div class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500">Support</div>
                    <h3 class="mt-4 text-2xl font-semibold text-slate-900">Project-focused help</h3>
                    <p class="mt-4 text-base leading-8 text-slate-600">
                        Share your requirements and we will help point you toward the right next step.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection