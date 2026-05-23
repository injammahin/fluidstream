@extends('layouts.app')

@section('content')
<section class="fs-thankyou-page fs-thankyou-contact">
    <style>
        .fs-thankyou-page {
            position: relative;
            overflow: hidden;
            min-height: 78vh;
            padding: 96px 0;
            background:
                radial-gradient(circle at 12% 12%, rgba(21, 209, 255, .14), transparent 26%),
                radial-gradient(circle at 86% 18%, rgba(0, 24, 220, .11), transparent 24%),
                linear-gradient(180deg, #f7f9fc 0%, #ffffff 100%);
        }

        .fs-thankyou-page::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .42;
            background-image:
                linear-gradient(rgba(0, 24, 220, .08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 24, 220, .08) 1px, transparent 1px);
            background-size: 44px 44px;
            pointer-events: none;
        }

        .fs-thankyou-wrap {
            position: relative;
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
        }

        .fs-thankyou-shell {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(217, 230, 255, .95);
            border-radius: 18px;
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 34px 100px rgba(16, 42, 67, .14);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .fs-thankyou-shell::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #0018dc, #15d1ff);
        }

        .fs-thankyou-inner {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 0;
            align-items: stretch;
        }

        .fs-thankyou-visual {
            position: relative;
            min-height: 520px;
            padding: 44px;
            background:
                radial-gradient(circle at 70% 22%, rgba(21, 209, 255, .20), transparent 30%),
                linear-gradient(145deg, #0018dc 0%, #00118f 100%);
            color: #ffffff;
            overflow: hidden;
        }

        .fs-thankyou-visual::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .26;
            background-image:
                linear-gradient(rgba(255, 255, 255, .14) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .12) 1px, transparent 1px);
            background-size: 42px 42px;
        }

        .fs-thankyou-visual-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .fs-thankyou-status {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            width: fit-content;
            min-height: 38px;
            padding: 0 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .22);
            color: rgba(255, 255, 255, .92);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .fs-thankyou-status-dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: #15d1ff;
            box-shadow: 0 0 18px rgba(21, 209, 255, .9);
        }

        .fs-thankyou-check-wrap {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 230px;
            height: 230px;
            margin: 54px auto;
            border-radius: 999px;
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .20);
        }

        .fs-thankyou-check-wrap::before,
        .fs-thankyou-check-wrap::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, .18);
        }

        .fs-thankyou-check-wrap::before {
            inset: -26px;
        }

        .fs-thankyou-check-wrap::after {
            inset: 28px;
        }

        .fs-thankyou-check {
            position: relative;
            z-index: 3;
            width: 104px;
            height: 104px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            color: #0018dc;
            font-size: 54px;
            font-weight: 1000;
            box-shadow: 0 22px 52px rgba(0, 0, 0, .20);
        }

        .fs-thankyou-mini-grid {
            display: grid;
            gap: 12px;
        }

        .fs-thankyou-mini-card {
            border: 1px solid rgba(255, 255, 255, .18);
            background: rgba(255, 255, 255, .10);
            border-radius: 12px;
            padding: 16px;
        }

        .fs-thankyou-mini-card strong {
            display: block;
            color: #ffffff;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .fs-thankyou-mini-card span {
            display: block;
            color: rgba(255, 255, 255, .78);
            font-size: 13px;
            line-height: 1.55;
        }

        .fs-thankyou-content {
            padding: 54px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .fs-thankyou-kicker {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding: 9px 13px;
            border-radius: 999px;
            background: #edf3ff;
            border: 1px solid #d3e1ff;
            color: #0018dc;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .fs-thankyou-content h1 {
            margin: 0;
            color: #102a43;
            font-size: clamp(38px, 5vw, 66px) !important;
            line-height: .98;
            letter-spacing: -.065em;
            font-weight: 900 !important;
        }

        .fs-thankyou-lead {
            margin: 24px 0 0;
            max-width: 720px;
            color: #52667a;
            font-size: 18px;
            line-height: 1.75;
            font-weight: 500;
        }

        .fs-thankyou-response-box {
            margin-top: 28px;
            border: 1px solid #d9e6ff;
            border-radius: 14px;
            background: #f8fbff;
            padding: 22px;
        }

        .fs-thankyou-response-box strong {
            display: block;
            color: #102a43;
            font-size: 17px;
            margin-bottom: 8px;
        }

        .fs-thankyou-response-box p {
            margin: 0;
            color: #52667a;
            font-size: 15px;
            line-height: 1.65;
        }

        .fs-thankyou-actions {
            margin-top: 34px;
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .fs-thankyou-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 0 22px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 900;
            text-decoration: none;
            transition: transform .25s ease, box-shadow .25s ease, background .25s ease, border-color .25s ease;
        }

        .fs-thankyou-btn:hover {
            transform: translateY(-2px);
        }

        .fs-thankyou-btn-primary {
            background: #0018dc;
            color: #ffffff;
            box-shadow: 0 14px 32px rgba(0, 24, 220, .18);
        }

        .fs-thankyou-btn-primary:hover {
            background: #1433ff;
            color: #ffffff;
        }

        .fs-thankyou-btn-secondary {
            background: #ffffff;
            color: #102a43;
            border: 1px solid #d9e2ec;
        }

        .fs-thankyou-btn-secondary:hover {
            border-color: #0018dc;
            color: #0018dc;
        }

        @media (max-width: 980px) {
            .fs-thankyou-inner {
                grid-template-columns: 1fr;
            }

            .fs-thankyou-visual {
                min-height: auto;
            }

            .fs-thankyou-check-wrap {
                margin: 42px auto;
            }
        }

        @media (max-width: 640px) {
            .fs-thankyou-page {
                padding: 64px 0;
            }

            .fs-thankyou-wrap {
                width: min(100%, calc(100% - 28px));
            }

            .fs-thankyou-visual,
            .fs-thankyou-content {
                padding: 28px;
            }

            .fs-thankyou-check-wrap {
                width: 190px;
                height: 190px;
            }

            .fs-thankyou-actions {
                flex-direction: column;
            }

            .fs-thankyou-btn {
                width: 100%;
            }
        }
    </style>

    <div class="fs-thankyou-wrap">
        <div class="fs-thankyou-shell">
            <div class="fs-thankyou-inner">
                <aside class="fs-thankyou-visual" aria-hidden="true">
                    <div class="fs-thankyou-visual-content">
                        <div class="fs-thankyou-status">
                            <span class="fs-thankyou-status-dot"></span>
                            Submission confirmed
                        </div>

                        <div class="fs-thankyou-check-wrap">
                            <div class="fs-thankyou-check">✓</div>
                        </div>

                        <div class="fs-thankyou-mini-grid">
                            <div class="fs-thankyou-mini-card">
                                <strong>Message received</strong>
                                <span>Your inquiry has reached Fluidstream’s contact channel.</span>
                            </div>

                            <div class="fs-thankyou-mini-card">
                                <strong>Response expected</strong>
                                <span>Our team typically responds within 1–2 business days.</span>
                            </div>
                        </div>
                    </div>
                </aside>

                <div class="fs-thankyou-content">
                    <div class="fs-thankyou-kicker">
                        Contact confirmation
                    </div>

                    <h1>Thank you for contacting Fluidstream.</h1>

                    <p class="fs-thankyou-lead">
                        Your message has been received. A Fluidstream team member will review your inquiry and follow up
                        through the contact details you provided.
                    </p>

                    <div class="fs-thankyou-response-box">
                        <strong>What happens next?</strong>
                        <p>
                            For product questions, technical inquiries, or general business communication, Fluidstream
                            typically responds within 1–2 business days.
                        </p>
                    </div>

                    <div class="fs-thankyou-actions">
                        <a href="{{ url('/') }}" class="fs-thankyou-btn fs-thankyou-btn-primary">
                            Go to Homepage
                        </a>

                        <a href="{{ url('/case-studies') }}" class="fs-thankyou-btn fs-thankyou-btn-secondary">
                            View Case Studies
                        </a>

                        <a href="{{ url('/insights') }}" class="fs-thankyou-btn fs-thankyou-btn-secondary">
                            Read Insights
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'form_submit_success',
        form_name: 'contact_form',
        page_path: window.location.pathname
    });
</script>
@endpush