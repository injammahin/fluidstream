@extends('layouts.app')

@section('title', 'Contact Fluidstream')
@section('meta_description', 'Contact Fluidstream for general inquiries, sales discussions, partnerships, service support, and technical review requests.')
@section('meta_keywords', 'contact Fluidstream, Fluidstream Calgary, technical review, multiphase compression inquiry, vapor recovery inquiry, casing gas compression inquiry')
@section('canonical', url('/contact'))

@section('content')
    <style>
        :root {
            --blue: #0018dc;
            --blue-2: #1029ea;
            --cyan: #15d1ff;
            --ink: #07111f;
            --muted: #5f6b7a;
            --line: #dfe5ef;
            --soft: #f4f6f9;
            --soft-blue: #eef3ff;
            --dark: #071327;
            --white: #ffffff;
            --shadow: 0 18px 45px rgba(7, 17, 31, .12);
            --soft-shadow: 0 10px 30px rgba(7, 17, 31, .06);
            --radius: 22px;
        }

        .technical-review-page,
        .technical-review-page * {
            box-sizing: border-box;
        }

        .technical-review-page {
            color: var(--ink);
            background: #ffffff;
            line-height: 1.55;
            overflow: hidden;
        }

        .technical-review-page a {
            color: inherit;
            text-decoration: none;
        }

        .tr-hero {
            position: relative;
            overflow: hidden;
            background: #0018dc;
            color: #ffffff;
        min-height: 480px;
                display: flex;
                align-items: center;
            }

            .tr-hero::after {
                display: none;
            }

            .tr-hero-inner {
                position: relative;
                z-index: 2;
                width: min(1200px, calc(100% - 80px)) !important;
                max-width: 1200px;
                margin: 0 auto !important;
                padding: 86px 0 82px !important;
                text-align: left !important;
            }

            .tr-eyebrow {
                display: inline-flex;
                align-items: center;
                justify-content: flex-start;
                gap: 0;
                margin: 0 0 24px !important;
                color: #15d1ff;
                font-size: 13px;
                line-height: 1.2;
                font-weight: 900;
                text-transform: uppercase;
                letter-spacing: .16em;
            }

            .tr-eyebrow::before,
            .tr-eyebrow::after {
                display: none !important;
                content: none !important;
            }

            .tr-hero h1 {
                max-width: 920px !important;
                margin: 0 0 26px !important;
                color: #ffffff;
                font-size: clamp(46px, 5.2vw, 76px);
                line-height: .98;
                letter-spacing: -.07em;
                font-weight: 800;
                text-align: left !important;
            }

            .tr-hero p {
                max-width: 780px !important;
                margin: 0 0 34px !important;
                color: rgba(255, 255, 255, .82);
                font-size: clamp(19px, 1.6vw, 25px);
                line-height: 1.55;
                font-weight: 400;
                text-align: left !important;
            }

            .tr-hero-actions {
                display: flex;
                justify-content: flex-start !important;
                align-items: center;
                gap: 16px;
                flex-wrap: wrap;
            }

            .tr-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 58px;
                padding: 0 28px;
                border-radius: 999px;
                font-size: 16px;
                font-weight: 900;
                border: 1px solid transparent;
                transition: transform .25s ease, box-shadow .25s ease, background .25s ease;
                cursor: pointer;
            }

            .tr-btn-primary {
                background: #ffffff;
                color: #0018dc !important;
                border-color: #15d1ff;
            }

            .tr-btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 14px 30px rgba(21, 209, 255, .28);
            }

            .tr-btn-secondary {
                color: #ffffff;
                border-color: rgba(255, 255, 255, .36);
                background: rgba(255, 255, 255, .04);
            }

            .tr-btn-secondary:hover {
                transform: translateY(-2px);
                background: rgba(255, 255, 255, .11);
            }

            .tr-section {
                background: linear-gradient(180deg, #ffffff 0%, #f7f9fc 100%);
            }

            .tr-wrap {
                width: min(1200px, calc(100% - 40px));
                margin: 0 auto;
            }

            .tr-section-head {
                max-width: 620px;
                margin-bottom: 22px;
                text-align: start;
            }

            .tr-kicker {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 12px;
                color: var(--blue);
                font-size: 12px;
                font-weight: 900;
                text-transform: uppercase;
                letter-spacing: .14em;
            }

            .tr-section-head h2 {
                margin: 0;
                color: var(--ink);
                font-size: clamp(30px, 4vw, 40px);
                line-height: 1.02;
                letter-spacing: -.055em;
                /* font-weight: 600; */
            }

            .tr-section-head p {
                max-width: 720px;
                margin: 16px auto 0;
                color: var(--muted);
                font-size: 18px;
                line-height: 1.75;
            }

            .tr-alert {
                max-width: 920px;
                margin: 0 auto 24px;
                border-radius: 18px;
                padding: 16px 18px;
                font-size: 14px;
                font-weight: 700;
            }

            .tr-alert-success {
                border: 1px solid #a7f3d0;
                background: #ecfdf5;
                color: #047857;
            }

            .tr-alert-error {
                border: 1px solid #fecaca;
                background: #fef2f2;
                color: #b91c1c;
            }

            .tr-alert-error ul {
                margin: 8px 0 0;
                padding-left: 18px;
            }

            .form-shell {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                width: 100%;
            }

            .form-card {
                position: relative;
                overflow: hidden;
                isolation: isolate;
                max-width: 1200px;
                padding: 30px;
                background: #ffffff;
                border: 1px solid var(--line);
                border-radius: 7px;
                box-shadow: var(--shadow);
            }

            .form-card::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
                width: 100%;
                height: 4px;
                background: var(--blue);
            }

            .form-card > * {
                position: relative;
                z-index: 2;
            }

            .form-intro {
                display: grid;
                grid-template-columns: 1fr auto;
                gap: 20px;
                align-items: center;
                padding-bottom: 22px;
                margin-bottom: 22px;
                border-bottom: 1px solid var(--line);
            }

            .form-intro h3 {
                margin: 0 0 8px;
                color: var(--ink);
                font-size: 26px;
                line-height: 1.08;
                letter-spacing: -.04em;
            }

            .form-intro p {
                margin: 0;
                color: var(--muted);
                font-size: 15px;
                line-height: 1.65;
            }

            .form-badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 42px;
                padding: 0 14px;
                border-radius: 999px;
                background: var(--soft-blue);
                color: var(--blue);
                font-size: 12px;
                font-weight: 900;
                text-transform: uppercase;
                letter-spacing: .1em;
                white-space: nowrap;
            }

            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 18px;
                align-items: start;
            }

            .field {
                display: flex;
                flex-direction: column;
                gap: 7px;
                height: 100%;
            }

            .field label {
                color: #162238;
                font-size: 14px;
                font-weight: 850;
            }

            .field input,
            .field select,
            .field textarea {
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

            .field input:focus,
            .field select:focus,
            .field textarea:focus {
                border-color: var(--blue);
                box-shadow: 0 0 0 4px rgba(0, 24, 220, .09);
            }

            .field textarea {
                min-height: 150px;
                resize: vertical;
            }

            .unit-row {
                display: grid;
                grid-template-columns: 1fr 132px;
                gap: 10px;
            }

            .full {
                grid-column: 1 / -1;
            }

            .check-option {
                display: flex;
                align-items: flex-start;
                gap: 11px;
                min-height: 48px;
                border: 1px solid #cfd8e6;
                border-radius: 14px;
                padding: 13px 14px;
                background: #ffffff;
                color: #263447;
                font-weight: 650;
            }

            .check-option input {
                width: 18px;
                height: 18px;
                margin: 2px 0 0;
                accent-color: var(--blue);
                flex: 0 0 auto;
            }

            .check-option span {
                font-size: 14px;
                line-height: 1.35;
            }

            .field-error {
                color: #dc2626;
                font-size: 13px;
                font-weight: 700;
            }

            .tr-disclaimer-box {
                grid-column: 1 / -1;
                margin-top: 6px;
                border: 1px solid #cbd7ff;
                background: linear-gradient(135deg, #f1f1f1 0%, #f3f3f3 100%);
                border-radius: 18px;
                padding: 18px 20px;
                transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
            }

            .tr-disclaimer-box:hover {
                border-color: var(--blue);
                box-shadow: 0 12px 28px rgba(0, 24, 220, .08);
            }

            .tr-disclaimer-box.is-invalid {
                border-color: #dc2626;
                background: #fff7f7;
            }

            .tr-disclaimer-label {
                display: grid;
                grid-template-columns: 22px 1fr;
                gap: 14px;
                align-items: start;
                cursor: pointer;
            }

            .tr-disclaimer-label input {
                width: 20px;
                height: 20px;
                margin-top: 4px;
                accent-color: var(--blue);
                cursor: pointer;
            }

            .tr-disclaimer-text {
                color: #162238;
                font-size: 15px;
                line-height: 1.7;
                font-weight: 600;
            }

            .tr-disclaimer-text a {
                color: var(--blue);
                font-weight: 950;
                text-decoration: underline;
                text-underline-offset: 3px;
            }

            .form-note {
                margin-top: 22px;
                border-left: 4px solid #0018dc;
                background: #e9e9e957;
                padding: 15px 16px;
                border-radius: 14px;
                color: #263447;
                font-size: 14px;
                line-height: 1.6;
            }

            .submit {
                margin-top: 22px;
                width: 100%;
                border: 0;
                background: linear-gradient(135deg, var(--blue), #1739ff);
                color: #ffffff;
                border-radius: 999px;
                padding: 16px 20px;
                font-weight: 950;
                font-size: 15px;
                cursor: pointer;
                transition: transform .25s ease, box-shadow .25s ease, background .25s ease;
            }

            .submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 16px 34px rgba(0, 24, 220, .22);
                background: #1028ea;
            }

            .submit-note {
                margin: 14px 0 0;
                color: var(--muted);
                font-size: 13px;
                line-height: 1.6;
                text-align: center;
            }

            .hp-field {
                position: absolute;
                left: -10000px;
                top: auto;
                width: 1px;
                height: 1px;
                overflow: hidden;
            }

            .review-cards-section {
                background: var(--soft);
                padding: 56px 0 72px;
            }

            .review-cards {
                width: min(1200px, calc(100% - 40px));
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 18px;
            }

            .review-card {
                position: relative;
                overflow: hidden;
                isolation: isolate;
                min-height: 190px;
                padding: 22px;
                border: 1px solid var(--line);
                border-radius: 7px;
                background: #ffffff;
                box-shadow: var(--soft-shadow);
                transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
            }

            .review-card::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
                width: 100%;
                height: 4px;
                background: var(--blue);
                transform: scaleX(0);
                transform-origin: left;
                transition: transform .3s ease;
            }

            .review-card::after {
                content: "";
                position: absolute;
                left: -70%;
                top: 0;
                z-index: 0;
                width: 55%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(21, 209, 255, .35), transparent);
                transform: skewX(-18deg);
                transition: left .55s ease;
            }

            .review-card > * {
                position: relative;
                z-index: 2;
            }

            .review-card:hover {
                transform: translateY(-3px);
                border-color: var(--blue);
                box-shadow: 0 16px 35px rgba(7, 17, 31, .08);
            }

            .review-card:hover::before {
                transform: scaleX(1);
            }

            .review-card:hover::after {
                left: 120%;
            }

            .review-card .pill {
                display: inline-flex;
                margin-bottom: 14px;
                padding: 7px 10px;
                border-radius: 999px;
                background: #edf3ff;
                color: var(--blue);
                font-size: 11px;
                font-weight: 950;
                text-transform: uppercase;
                letter-spacing: .08em;
            }

            .review-card h3 {
                margin: 0 0 8px;
                color: var(--ink);
                font-size: 21px;
                line-height: 1.15;
                letter-spacing: -.04em;
            }

            .review-card p {
                margin: 0;
                color: var(--muted);
                font-size: 14px;
                line-height: 1.6;
            }

            @media(max-width: 980px) {
                .review-cards {
                    grid-template-columns: repeat(2, 1fr);
                }

                .form-intro {
                    grid-template-columns: 1fr;
                }
            }

            @media(max-width: 760px) {
                .tr-hero {
                    min-height: auto;
                }

                .tr-hero-inner {
                    width: min(100% - 32px, 1200px) !important;
                    padding: 64px 0 66px !important;
                }

                .tr-hero h1 {
                    font-size: clamp(40px, 13vw, 56px);
                    line-height: 1;
                }

                .tr-hero p {
                    font-size: 18px;
                    line-height: 1.55;
                }

                .tr-hero-actions {
                    display: grid;
                    grid-template-columns: 1fr;
                    width: 100%;
                }

                .tr-btn {
                    width: 100%;
                }
            }

            @media(max-width: 620px) {
                .tr-hero-inner,
                .tr-wrap,
                .review-cards {
                    width: min(100%, calc(100% - 28px));
                }

                .tr-section {
                    padding: 56px 0;
                }

                .tr-section-head {
                    text-align: left;
                }

                .form-card {
                    padding: 22px;
                }

                .form-grid,
                .unit-row,
                .review-cards {
                    grid-template-columns: 1fr;
                }

                .tr-disclaimer-label {
                    grid-template-columns: 20px 1fr;
                    gap: 12px;
                }

                .tr-disclaimer-text {
                    font-size: 14px;
                }
            }
        </style>

        <main class="technical-review-page">
            <section class="tr-hero">
                <div class="tr-hero-inner">
                    <h1>Submit your compression challenge for technical review.</h1>

                    <p>
                        Tell Fluidstream about your gas, liquids, pressures, rates, and site constraints.
                        Fluidstream will review your application and provide guidance on technical fit and next steps.
                    </p>

                    <div class="tr-hero-actions">
                        <a class="tr-btn tr-btn-primary" href="#technical-review">Start Technical Review</a>
                        <a class="tr-btn tr-btn-secondary" href="{{ url('/technology') }}">Review Technology</a>
                    </div>
                </div>
            </section>

            <section class="tr-section py-12" id="technical-review">
                <div class="tr-wrap">
                    @if (session('success'))
                        <div class="tr-alert tr-alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="tr-alert tr-alert-error">
                            <div>Please fix the following:</div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="tr-section-head">
                        <h2>Give us the operating data that determines fit.</h2>
                        <p>
                            This form is structured around the information that matters in vapor recovery, casing gas
                            compression, liquid-loaded wells, and multiphase applications.
                        </p>
                    </div>

                    <div class="form-shell">
                        <form class="form-card" action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <div class="form-intro">
                                <div>
                                    <h3>Technical application details</h3>
                                    <p>
                                        Add the values you already know. If something is unknown, leave it blank and describe
                                        the issue in the application notes.
                                    </p>
                                </div>
                                {{-- <span class="form-badge">Engineering Review</span> --}}
                            </div>

                            <input type="hidden" name="inquiry_type" value="Technical Review Request">
                            <input type="hidden" name="message" id="compiledMessage" value="{{ old('message') }}">
                            <input type="hidden" name="city" value="{{ old('city') }}">
                            <input type="hidden" name="last_name" value="{{ old('last_name') }}">

                            <div class="form-grid">
                                <div class="field">
                                    <label for="first_name">Name</label>
                                    <input id="first_name" name="first_name" type="text" autocomplete="name"
                                        value="{{ old('first_name') }}" placeholder="Your full name">
                                    @error('first_name')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="company">Company</label>
                                    <input id="company" name="company" type="text" autocomplete="organization"
                                        value="{{ old('company') }}" placeholder="Company name">
                                    @error('company')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        value="{{ old('email') }}" placeholder="name@company.com">
                                    @error('email')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="phone">Phone</label>
                                    <input id="phone" name="phone" type="tel" autocomplete="tel"
                                        value="{{ old('phone') }}" placeholder="+1 ...">
                                    @error('phone')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="country">Country / Region</label>
                                    <input id="country" name="country" type="text" value="{{ old('country') }}"
                                        placeholder="Country or region">
                                    @error('country')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="application">Application Type</label>
                                    <select id="application" name="application">
                                        <option value="">Select application</option>
                                        <option @selected(old('application') === 'Vapor Recovery')>Vapor Recovery</option>
                                        <option @selected(old('application') === 'Casing Gas Compression')>Casing Gas Compression</option>
                                        <option @selected(old('application') === 'Loaded Gas Well / Deliquification')>Loaded Gas Well / Deliquification</option>
                                        <option @selected(old('application') === 'Multiphase Compression')>Multiphase Compression</option>
                                        <option @selected(old('application') === 'Flare / Vent Reduction')>Flare / Vent Reduction</option>
                                        <option @selected(old('application') === 'Other')>Other</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label for="suctionPressure">Suction Pressure</label>
                                    <div class="unit-row">
                                        <input id="suctionPressure" name="suctionPressure" class="pressure-input"
                                            data-last-unit="kPa" type="number" step="any"
                                            value="{{ old('suctionPressure') }}" placeholder="Example: 250">
                                        <select id="suctionPressureUnit" name="suctionPressureUnit" class="pressure-unit"
                                            data-target="suctionPressure">
                                            <option value="kPa" @selected(old('suctionPressureUnit', 'kPa') === 'kPa')>kPa</option>
                                            <option value="psi" @selected(old('suctionPressureUnit') === 'psi')>psi</option>
                                            <option value="bar" @selected(old('suctionPressureUnit') === 'bar')>bar</option>
                                            <option value="MPa" @selected(old('suctionPressureUnit') === 'MPa')>MPa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="dischargePressure">Discharge Pressure</label>
                                    <div class="unit-row">
                                        <input id="dischargePressure" name="dischargePressure" class="pressure-input"
                                            data-last-unit="kPa" type="number" step="any"
                                            value="{{ old('dischargePressure') }}" placeholder="Example: 1200">
                                        <select id="dischargePressureUnit" name="dischargePressureUnit" class="pressure-unit"
                                            data-target="dischargePressure">
                                            <option value="kPa" @selected(old('dischargePressureUnit', 'kPa') === 'kPa')>kPa</option>
                                            <option value="psi" @selected(old('dischargePressureUnit') === 'psi')>psi</option>
                                            <option value="bar" @selected(old('dischargePressureUnit') === 'bar')>bar</option>
                                            <option value="MPa" @selected(old('dischargePressureUnit') === 'MPa')>MPa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="gasRate">Estimated Gas Rate</label>
                                    <div class="unit-row">
                                        <input id="gasRate" name="gasRate" class="gas-rate-input" data-last-unit="m3d"
                                            type="number" step="any" value="{{ old('gasRate') }}"
                                            placeholder="Example: 10000">
                                        <select id="gasRateUnit" name="gasRateUnit" class="gas-rate-unit"
                                            data-target="gasRate">
                                            <option value="m3d" @selected(old('gasRateUnit', 'm3d') === 'm3d')>m³/d</option>
                                            <option value="m3h" @selected(old('gasRateUnit') === 'm3h')>m³/h</option>
                                            <option value="nm3d" @selected(old('gasRateUnit') === 'nm3d')>Nm³/d</option>
                                            <option value="nm3h" @selected(old('gasRateUnit') === 'nm3h')>Nm³/h</option>
                                            <option value="sm3d" @selected(old('gasRateUnit') === 'sm3d')>Sm³/d</option>
                                            <option value="sm3h" @selected(old('gasRateUnit') === 'sm3h')>Sm³/h</option>
                                            <option value="e3m3d" @selected(old('gasRateUnit') === 'e3m3d')>10³ m³/d</option>
                                            <option value="e3nm3d" @selected(old('gasRateUnit') === 'e3nm3d')>10³ Nm³/d</option>
                                            <option value="scfd" @selected(old('gasRateUnit') === 'scfd')>scf/d</option>
                                            <option value="mscfd" @selected(old('gasRateUnit') === 'mscfd')>Mscf/d</option>
                                            <option value="mmscfd" @selected(old('gasRateUnit') === 'mmscfd')>MMscf/d</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="liquidRate">Estimated Total Liquid Rate</label>
                                    <div class="unit-row">
                                        <input id="liquidRate" name="liquidRate" class="liquid-rate-input"
                                            data-last-unit="m3d" type="number" step="any"
                                            value="{{ old('liquidRate') }}" placeholder="Example: 5">
                                        <select id="liquidRateUnit" name="liquidRateUnit" class="liquid-rate-unit"
                                            data-target="liquidRate">
                                            <option value="m3d" @selected(old('liquidRateUnit', 'm3d') === 'm3d')>m³/d</option>
                                            <option value="m3h" @selected(old('liquidRateUnit') === 'm3h')>m³/h</option>
                                            <option value="ld" @selected(old('liquidRateUnit') === 'ld')>L/d</option>
                                            <option value="lh" @selected(old('liquidRateUnit') === 'lh')>L/h</option>
                                            <option value="lpm" @selected(old('liquidRateUnit') === 'lpm')>L/min</option>
                                            <option value="ls" @selected(old('liquidRateUnit') === 'ls')>L/s</option>
                                            <option value="bpd" @selected(old('liquidRateUnit') === 'bpd')>bbl/d</option>
                                            <option value="gpm" @selected(old('liquidRateUnit') === 'gpm')>US gal/min</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="h2sContent">H₂S Content</label>
                                    <div class="unit-row">
                                        <input id="h2sContent" name="h2sContent" class="h2s-input" data-last-unit="ppm"
                                            type="number" step="any" value="{{ old('h2sContent') }}"
                                            placeholder="Example: 100">
                                        <select id="h2sUnit" name="h2sUnit" class="h2s-unit" data-target="h2sContent">
                                            <option value="ppm" @selected(old('h2sUnit', 'ppm') === 'ppm')>ppm</option>
                                            <option value="percent" @selected(old('h2sUnit') === 'percent')>%</option>
                                            <option value="molePercent" @selected(old('h2sUnit') === 'molePercent')>mol %</option>
                                            <option value="ppb" @selected(old('h2sUnit') === 'ppb')>ppb</option>
                                            <option value="mgm3" @selected(old('h2sUnit') === 'mgm3')>mg/m³</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Sand or Solids Present</label>
                                    <label class="check-option">
                                        <input id="solidsPresent" name="solidsPresent" type="checkbox" value="Yes"
                                            @checked(old('solidsPresent') === 'Yes')>
                                        <span>Sand or solids present</span>
                                    </label>
                                </div>

                                <div class="field">
                                    <label for="temperature">Operating Temperature / Winter Conditions</label>
                                    <input id="temperature" name="temperature" type="text"
                                        value="{{ old('temperature') }}"
                                        placeholder="Example: -30°C winter operation">
                                </div>

                                <div class="field">
                                    <label for="equipment">Existing Equipment</label>
                                    <input id="equipment" name="equipment" type="text"
                                        value="{{ old('equipment') }}"
                                        placeholder="Example: VRU, compressor, separator">
                                </div>

                                <div class="field full">
                                    <label for="notes">Describe the Application / Problem</label>
                                    <textarea id="notes" name="notes"
                                        placeholder="Describe liquids, slugging, pressure constraints, flaring/venting, production decline, separator issues, freezing, downtime, or current compressor limitations.">{{ old('notes') }}</textarea>
                                </div>

                                <div class="tr-disclaimer-box full @error('terms_acknowledgement') is-invalid @enderror">
                                    <label class="tr-disclaimer-label" for="terms_acknowledgement">
                                        <input id="terms_acknowledgement" name="terms_acknowledgement" type="checkbox"
                                            value="1" @checked(old('terms_acknowledgement')) required>

                                        <span class="tr-disclaimer-text">
                                            I acknowledge and agree to Fluidstream’s
                                            <a href="{{ url('/terms') }}" target="_blank" rel="noopener">Terms of Use</a>
                                            and
                                            <a href="{{ url('/privacy-policy') }}" target="_blank" rel="noopener">Privacy Policy</a>.
                                            I understand that any analysis, recommendation, or information provided by
                                            Fluidstream is for informational purposes only and does not constitute professional
                                            engineering certification, field validation, site-specific design approval,
                                            operational instruction, or regulatory compliance advice.
                                        </span>
                                    </label>

                                    @error('terms_acknowledgement')
                                        <div class="field-error" style="margin-top:10px;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="hp-field" aria-hidden="true">
                                <label for="website">Website</label>
                                <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="form-note">
                                This technical form sends a structured message through the same contact route. The submitted
                                message will include all operating values and notes.
                            </div>

                            <button class="submit" id="technicalSubmit" type="submit">
                                Submit Application for Review
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </main>

        <script>
            const pressureToKpa = {
                kPa: 1,
                psi: 6.8947572932,
                bar: 100,
                MPa: 1000
            };

            const gasRateToM3D = {
                m3d: 1,
                m3h: 24,
                nm3d: 1,
                nm3h: 24,
                sm3d: 1,
                sm3h: 24,
                e3m3d: 1000,
                e3nm3d: 1000,
                scfd: 0.028316846592,
                mscfd: 28.316846592,
                mmscfd: 28316.846592
            };

            const liquidRateToM3D = {
                m3d: 1,
                m3h: 24,
                ld: 0.001,
                lh: 0.024,
                lpm: 1.44,
                ls: 86.4,
                bpd: 0.158987294928,
                gpm: 5.450992992
            };

            const h2sToPpm = {
                ppm: 1,
                ppb: 0.001,
                percent: 10000,
                molePercent: 10000,
                mgm3: 24.45 / 34.08
            };

            function smartRound(value) {
                if (!isFinite(value)) return "";
                if (Math.abs(value) >= 100000) return Number(value.toFixed(0));
                if (Math.abs(value) >= 10000) return Number(value.toFixed(1));
                if (Math.abs(value) >= 1000) return Number(value.toFixed(2));
                if (Math.abs(value) >= 100) return Number(value.toFixed(3));
                if (Math.abs(value) >= 10) return Number(value.toFixed(4));
                return Number(value.toFixed(5));
            }

            function bindDynamicUnitConversion(selector, conversionTable, fallbackUnit) {
                document.querySelectorAll(selector).forEach(select => {
                    select.addEventListener("focus", () => {
                        const input = document.getElementById(select.dataset.target);
                        if (input) {
                            input.dataset.lastUnit = select.value;
                        }
                    });

                    select.addEventListener("change", () => {
                        const input = document.getElementById(select.dataset.target);

                        if (!input) {
                            return;
                        }

                        const oldUnit = input.dataset.lastUnit || fallbackUnit;
                        const newUnit = select.value;
                        const raw = parseFloat(input.value);

                        if (!isNaN(raw) && conversionTable[oldUnit] && conversionTable[newUnit]) {
                            const baseValue = raw * conversionTable[oldUnit];
                            const converted = baseValue / conversionTable[newUnit];
                            input.value = smartRound(converted);
                        }

                        input.dataset.lastUnit = newUnit;
                    });
                });
            }

            bindDynamicUnitConversion(".pressure-unit", pressureToKpa, "kPa");
            bindDynamicUnitConversion(".gas-rate-unit", gasRateToM3D, "m3d");
            bindDynamicUnitConversion(".liquid-rate-unit", liquidRateToM3D, "m3d");
            bindDynamicUnitConversion(".h2s-unit", h2sToPpm, "ppm");

            const technicalForm = document.querySelector(".form-card");
            const honeypot = document.getElementById("website");
            const compiledMessage = document.getElementById("compiledMessage");

            function fieldValue(id) {
                const el = document.getElementById(id);
                return el ? el.value.trim() : "";
            }

            function checkedValue(id) {
                const el = document.getElementById(id);
                return el && el.checked ? "Yes" : "No";
            }

            if (technicalForm) {
                technicalForm.addEventListener("submit", function (event) {
                    if (honeypot && honeypot.value.trim() !== "") {
                        event.preventDefault();
                        return;
                    }

                    if (compiledMessage) {
                        compiledMessage.value =
                            "Technical Review Request\n\n" +
                            "Application Type: " + fieldValue("application") + "\n" +
                            "Suction Pressure: " + fieldValue("suctionPressure") + " " + fieldValue("suctionPressureUnit") + "\n" +
                            "Discharge Pressure: " + fieldValue("dischargePressure") + " " + fieldValue("dischargePressureUnit") + "\n" +
                            "Estimated Gas Rate: " + fieldValue("gasRate") + " " + fieldValue("gasRateUnit") + "\n" +
                            "Estimated Total Liquid Rate: " + fieldValue("liquidRate") + " " + fieldValue("liquidRateUnit") + "\n" +
                            "H₂S Content: " + fieldValue("h2sContent") + " " + fieldValue("h2sUnit") + "\n" +
                            "Sand or Solids Present: " + checkedValue("solidsPresent") + "\n" +
                            "Operating Temperature / Winter Conditions: " + fieldValue("temperature") + "\n" +
                            "Existing Equipment: " + fieldValue("equipment") + "\n\n" +
                            "Acknowledgement: Accepted Terms of Use, Privacy Policy, and technical disclaimer.\n\n" +
                            "Application / Problem:\n" + fieldValue("notes");
                    }
                });
            }
        </script>
@endsection