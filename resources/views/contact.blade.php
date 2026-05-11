@extends('layouts.app')

@section('title', 'Contact Fluidstream')
@section('meta_description', 'Contact Fluidstream for general inquiries, sales discussions, partnerships, service support, and technical review requests.')
@section('meta_keywords', 'contact Fluidstream, Fluidstream Calgary, technical review, multiphase compression inquiry, vapor recovery inquiry, casing gas compression inquiry')
@section('canonical', url('/contact'))

@section('content')
    <style>
        .fs-contact-page {
            --blue: #0018dc;
            --cyan: #15d1ff;
            --ink: #07111f;
            --muted: #5f6b7a;
            --line: #dfe5ef;
            --soft: #f4f6f9;
            --dark: #071327;
            --white: #ffffff;
            --shadow: 0 18px 45px rgba(7, 17, 31, .12);
            --soft-shadow: 0 10px 30px rgba(7, 17, 31, .06);
            --radius: 22px;
            color: var(--ink);
            background: #ffffff;
            line-height: 1.55;
        }

        .fs-contact-page,
        .fs-contact-page * {
            box-sizing: border-box;
        }

        .fs-contact-page a {
            color: inherit;
            text-decoration: none;
        }

        .fs-contact-wrap {
            max-width: 1220px;
            margin: 0 auto;
            padding-left: 24px;
            padding-right: 24px;
        }

        .fs-contact-hero {
            position: relative;
            overflow: hidden;
            background: #0018dc;
            color: #ffffff;
        }

        .fs-contact-hero-inner {
            max-width: 1220px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 24px;
            align-items: center;
        }

        .fs-contact-hero-content {
            max-width: 900px;
        }

        .fs-contact-hero h1 {
            font-size: clamp(22px, 3.5vw, 50px);
            line-height: .95;
            margin: 0 0 20px;
            letter-spacing: -.06em;
            color: #ffffff;
            max-width: 850px;
        }

        .fs-contact-hero p {
            font-size: 19px;
            color: #d9e5ff;
            max-width: 690px;
            margin: 0 0 28px;
            line-height: 1.65;
        }

        .fs-contact-hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .fs-contact-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 14px 20px;
            font-weight: 900;
            border: 1px solid transparent;
            transition: .25s ease;
            cursor: pointer;
        }

        .fs-contact-btn-primary {
            background: #ffffff;
            color: #0018dc !important;
        }

        .fs-contact-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(21, 209, 255, .28);
        }

        .fs-contact-btn-secondary {
            border-color: rgba(255, 255, 255, .35);
            color: #ffffff;
            background: transparent;
        }

        .fs-contact-btn-secondary:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, .08);
        }

        .fs-contact-section-head {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 42px;
            align-items: end;
            margin-bottom: 34px;
        }

        .fs-contact-kicker {
            text-transform: uppercase;
            letter-spacing: .12em;
            font-size: 12px;
            font-weight: 900;
            color: var(--blue);
            margin-bottom: 10px;
        }

        .fs-contact-section-head h2 {
            font-size: clamp(30px, 4vw, 40px);
            line-height: 1.02;
            letter-spacing: -.055em;
            margin: 0;
            color: var(--ink);
        }

        .fs-contact-lead {
            color: var(--muted);
            font-size: 18px;
            margin: 0;
            line-height: 1.65;
        }

        .fs-contact-alert {
            margin-bottom: 24px;
            border-radius: 18px;
            padding: 16px 18px;
            font-size: 14px;
            font-weight: 700;
        }

        .fs-contact-alert-success {
            border: 1px solid #a7f3d0;
            background: #ecfdf5;
            color: #047857;
        }

        .fs-contact-alert-error {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #b91c1c;
        }

        .fs-contact-alert-error ul {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .fs-contact-layout {
            display: grid;
            grid-template-columns: .82fr 1.18fr;
            gap: 24px;
            align-items: start;
        }

        .fs-contact-info-card,
        .fs-contact-form-card,
        .fs-contact-tech-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 7px;
            box-shadow: var(--soft-shadow);
            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .fs-contact-info-card::after,
        .fs-contact-form-card::after,
        .fs-contact-tech-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #0018dc;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            z-index: 2;
        }

        .fs-contact-info-card:hover,
        .fs-contact-form-card:hover,
        .fs-contact-tech-card:hover {
            transform: translateY(-3px);
            border-color: #0018dc !important;
            background: #ffffff !important;
            box-shadow: 0 16px 35px rgba(7, 17, 31, .08);
        }

        .fs-contact-info-card:hover::after,
        .fs-contact-form-card:hover::after,
        .fs-contact-tech-card:hover::after {
            transform: scaleX(1);
        }

        .fs-contact-info-card {
            padding: 26px;
            position: sticky;
            top: 120px;
        }

        .fs-contact-info-card h3 {
            font-size: 24px;
            line-height: 1.1;
            letter-spacing: -.04em;
            margin: 0 0 14px;
            color: var(--ink);
        }

        .fs-contact-info-list {
            display: grid;
            gap: 16px;
            margin-top: 20px;
        }

        .fs-contact-info-item {
            border-top: 1px solid var(--line);
            padding-top: 16px;
        }

        .fs-contact-info-item:first-child {
            border-top: 0;
            padding-top: 0;
        }

        .fs-contact-info-item small {
            display: block;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: var(--blue);
            font-weight: 900;
            font-size: 11px;
            margin-bottom: 4px;
        }

        .fs-contact-info-item strong {
            display: block;
            color: var(--ink);
            font-size: 17px;
            line-height: 1.5;
        }

        .fs-contact-info-item span {
            display: block;
            color: var(--muted);
            font-size: 14px;
            margin-top: 2px;
            line-height: 1.6;
        }

        .fs-contact-info-item a {
            color: var(--blue);
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            transition: .2s;
        }

        .fs-contact-info-item a:hover {
            text-decoration: underline;
            opacity: .85;
        }

        .fs-contact-form-card {
            padding: 26px;
        }

        .fs-contact-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            align-items: start;
        }

        .fs-contact-field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .fs-contact-field label {
            font-weight: 850;
            font-size: 14px;
            color: #162238;
        }

        .fs-contact-field input,
        .fs-contact-field select,
        .fs-contact-field textarea {
            width: 100%;
            border: 1px solid #cfd8e6;
            border-radius: 14px;
            padding: 13px 14px;
            font-size: 15px;
            background: #ffffff;
            color: #07111f;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .fs-contact-field input:focus,
        .fs-contact-field select:focus,
        .fs-contact-field textarea:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 4px rgba(0, 24, 220, .09);
        }

        .fs-contact-field textarea {
            min-height: 150px;
            resize: vertical;
        }

        .fs-contact-full {
            grid-column: 1 / -1;
        }

        .fs-contact-field-error {
            color: #dc2626;
            font-size: 13px;
            font-weight: 700;
        }

        .fs-contact-disclaimer-box {
            grid-column: 1 / -1;
            margin-top: 6px;
            border: 1px solid #ffffff;
            background: linear-gradient(135deg, #f8f8f8 0%, #f0f0f0 100%);
            border-radius: 18px;
            padding: 18px 20px;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .fs-contact-disclaimer-box:hover {
            border-color: var(--blue);
            box-shadow: 0 12px 28px rgba(0, 24, 220, .08);
        }

        .fs-contact-disclaimer-box.is-invalid {
            border-color: #dc2626;
            background: #fff7f7;
        }

        .fs-contact-disclaimer-label {
            display: grid;
            grid-template-columns: 22px 1fr;
            gap: 14px;
            align-items: start;
            cursor: pointer;
        }

        .fs-contact-disclaimer-label input {
            width: 20px;
            height: 20px;
            margin-top: 4px;
            accent-color: var(--blue);
            cursor: pointer;
        }

        .fs-contact-disclaimer-text {
            color: #162238;
            font-size: 15px;
            line-height: 1.7;
            font-weight: 600;
        }

        .fs-contact-disclaimer-text a {
            color: var(--blue);
            font-weight: 950;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .fs-contact-submit {
            margin-top: 22px;
            width: 100%;
            border: 0;
            background: var(--blue);
            color: #ffffff;
            border-radius: 999px;
            padding: 16px 20px;
            font-weight: 950;
            font-size: 15px;
            cursor: pointer;
            transition: transform .25s ease, box-shadow .25s ease, background .25s ease;
        }

        .fs-contact-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 34px rgba(0, 24, 220, .22);
            background: #1028ea;
        }

        .fs-contact-submit-note {
            margin: 14px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
            text-align: center;
        }

        .fs-contact-hp-field {
            position: absolute;
            left: -10000px;
            top: auto;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }

        .fs-contact-tech-card {
            padding: 34px;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 24px;
            align-items: center;
            background: linear-gradient(135deg, #ffffff, #f7fbff);
        }

        .fs-contact-tech-card h2 {
            font-size: clamp(28px, 3vw, 42px);
            line-height: 1.06;
            letter-spacing: -.055em;
            margin: 0;
            color: var(--ink);
        }

        .fs-contact-tech-card p {
            color: var(--muted);
            font-size: 17px;
            margin: 12px 0 0;
            max-width: 760px;
            line-height: 1.65;
        }

        .fs-contact-tech-card .fs-contact-btn {
            background: var(--blue);
            color: #ffffff;
            white-space: nowrap;
        }

        @media(max-width: 980px) {

            .fs-contact-section-head,
            .fs-contact-layout,
            .fs-contact-tech-card {
                grid-template-columns: 1fr;
            }

            .fs-contact-info-card {
                position: relative;
                top: auto;
            }
        }

        @media(max-width: 620px) {
            .fs-contact-wrap {
                padding-left: 18px;
                padding-right: 18px;
            }

            .fs-contact-form-grid {
                grid-template-columns: 1fr;
            }

            .fs-contact-tech-card {
                padding: 26px;
            }

            .fs-contact-hero h1 {
                font-size: 42px;
            }

            .fs-contact-disclaimer-label {
                grid-template-columns: 20px 1fr;
                gap: 12px;
            }

            .fs-contact-disclaimer-text {
                font-size: 14px;
            }
        }
    </style>

    <div class="fs-contact-page">
        <section class="fs-contact-hero py-12">
            <div class="fs-contact-hero-inner fs-contact-wrap">
                <div class="fs-contact-hero-content">
                    <h1>Let’s connect the right conversation to the right team.</h1>
                    <p>
                        Contact Fluidstream for general inquiries, sales discussions, partnerships, service support,
                        or questions about multiphase compression applications.
                    </p>

                    <div class="fs-contact-hero-actions">
                        <a class="fs-contact-btn fs-contact-btn-primary" href="#contact-form">
                            Send a Message
                        </a>
                        <a class="fs-contact-btn fs-contact-btn-secondary" href="/technical-review">
                            Request Technical Review
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="fs-contact-section py-12" id="contact-form">
            <div class="fs-contact-wrap">

                @if (session('success'))
                    <div class="fs-contact-alert fs-contact-alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="fs-contact-alert fs-contact-alert-error">
                        <div>Please fix the following:</div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="fs-contact-section-head">
                    <div>
                        <div class="fs-contact-kicker">General Inquiry</div>
                        <h2>Send Fluidstream a message.</h2>
                    </div>

                </div>

                <div class="fs-contact-layout">
                    <aside class="fs-contact-info-card">
                        <h3>Contact information</h3>
                        <p class="fs-contact-lead" style="font-size:15px">
                            Fluidstream is based in Calgary, Alberta, Canada and supports oil and gas operators
                            evaluating production, emissions, and compression challenges.
                        </p>

                        <div class="fs-contact-info-list">
                            <div class="fs-contact-info-item">
                                <small>General Inquiries</small>
                                <p class="fs-contact-lead" style="font-size:15px">Use the inquiry form on this page.</p>
                            </div>

                            <div class="fs-contact-info-item">
                                <small>Head Office</small>
                                <strong>
                                    4416 5 St NE, Unit 1A<br>
                                    Calgary, AB T2E 7C3<br>
                                    Canada
                                </strong>
                                <span>By appointment only</span>
                                <a href="https://www.google.com/maps/search/?api=1&query=4416+5+St+NE+Unit+1A+Calgary+AB+T2E+7C3"
                                    target="_blank" rel="noopener">
                                    View on Google Maps →
                                </a>
                            </div>
                        </div>
                    </aside>

                    <form action="{{ route('contact.submit') }}" method="POST" class="fs-contact-form-card">
                        @csrf

                        <div class="fs-contact-form-grid">
                            <div class="fs-contact-field">
                                <label for="first_name">First Name</label>
                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}"
                                    autocomplete="given-name" placeholder="First name">
                                @error('first_name')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}"
                                    autocomplete="family-name" placeholder="Last name">
                                @error('last_name')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                                    placeholder="Email address">
                                @error('email')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field">
                                <label for="phone">Phone</label>
                                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel"
                                    placeholder="Phone number">
                                @error('phone')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field fs-contact-full">
                                <label for="company">Company</label>
                                <input id="company" name="company" type="text" value="{{ old('company') }}"
                                    autocomplete="organization" placeholder="Company name">
                                @error('company')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field">
                                <label for="city">City</label>
                                <input id="city" name="city" type="text" value="{{ old('city') }}"
                                    autocomplete="address-level2" placeholder="City">
                                @error('city')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field">
                                <label for="country">Country / Region</label>
                                <input id="country" name="country" type="text" value="{{ old('country') }}"
                                    autocomplete="country-name" placeholder="Country or region">
                                @error('country')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field fs-contact-full">
                                <label for="inquiry_type">Inquiry Type</label>
                                <select id="inquiry_type" name="inquiry_type">
                                    <option value="">Select inquiry type</option>
                                    <option value="General Inquiry" @selected(old('inquiry_type') === 'General Inquiry')>
                                        General Inquiry
                                    </option>
                                    <option value="Sales" @selected(old('inquiry_type') === 'Sales')>
                                        Sales
                                    </option>
                                    <option value="Partnership" @selected(old('inquiry_type') === 'Partnership')>
                                        Partnership
                                    </option>
                                    <option value="Service / Support" @selected(old('inquiry_type') === 'Service / Support')>
                                        Service / Support
                                    </option>
                                    <option value="Media / Corporate" @selected(old('inquiry_type') === 'Media / Corporate')>
                                        Media / Corporate
                                    </option>
                                    <option value="Technical Review Request" @selected(old('inquiry_type') === 'Technical Review Request')>
                                        Technical Review Request
                                    </option>
                                </select>
                                @error('inquiry_type')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="fs-contact-field fs-contact-full">
                                <label for="message">Message</label>
                                <textarea id="message" name="message"
                                    placeholder="Tell us how we can help.">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="fs-contact-field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div
                                class="fs-contact-disclaimer-box fs-contact-full @error('terms_acknowledgement') is-invalid @enderror">
                                <label class="fs-contact-disclaimer-label" for="terms_acknowledgement">
                                    <input id="terms_acknowledgement" name="terms_acknowledgement" type="checkbox" value="1"
                                        @checked(old('terms_acknowledgement')) required>

                                    <span class="fs-contact-disclaimer-text">
                                        I acknowledge and agree to Fluidstream’s
                                        <a href="{{ url('/terms') }}" target="_blank" rel="noopener">Terms of Use</a>
                                        and
                                        <a href="{{ url('/privacy-policy') }}" target="_blank" rel="noopener">Privacy
                                            Policy</a>.
                                        I understand that any analysis, recommendation, or information provided by
                                        Fluidstream is for informational purposes only and does not constitute professional
                                        engineering certification, field validation, site-specific design approval,
                                        operational instruction, or regulatory compliance advice.
                                    </span>
                                </label>

                                @error('terms_acknowledgement')
                                    <div class="fs-contact-field-error" style="margin-top:10px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="fs-contact-hp-field" aria-hidden="true">
                            <label for="website">Website</label>
                            <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                        </div>

                        <button class="fs-contact-submit" type="submit">
                            Send Message
                        </button>

                        <p class="fs-contact-submit-note">
                            We typically respond as soon as possible during business hours.
                        </p>
                    </form>
                </div>
            </div>
        </section>

        <section class="fs-contact-section py-12" id="technical-review">
            <div class="fs-contact-wrap">
                <div class="fs-contact-tech-card">
                    <div>
                        <div class="fs-contact-kicker">Technical Fit Analysis</div>
                        <h2>Have operating data ready?</h2>
                        <p>
                            Use the technical review path when your inquiry includes suction pressure, discharge pressure,
                            gas rate, total liquid rate, H₂S content, sand, solids, or application-specific operating
                            details.
                        </p>
                    </div>

                    <a class="fs-contact-btn" href="/technical-review"
                        onclick="document.getElementById('inquiry_type').value='Technical Review Request';">
                        Request Technical Review
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection