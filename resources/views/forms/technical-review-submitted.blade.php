@extends('layouts.app')

@section('content')
<section class="fs-review-thankyou-page">
    <style>
        .fs-review-thankyou-page {
            position: relative;
            overflow: hidden;
            min-height: 82vh;
            padding: 96px 0;
        }

        .fs-review-thankyou-page::before {
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

        .fs-review-wrap {
            position: relative;
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        .fs-review-shell {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(217, 230, 255, .95);
            border-radius: 18px;
            background: rgba(255, 255, 255, .94);
            box-shadow: 0 34px 100px rgba(16, 42, 67, .14);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .fs-review-shell::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #0018dc, #15d1ff);
            z-index: 3;
        }

        .fs-review-hero {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 430px;
            gap: 0;
        }

        .fs-review-main {
            padding: 56px;
        }

        .fs-review-kicker {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
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

        .fs-review-kicker-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #15d1ff;
            box-shadow: 0 0 18px rgba(21, 209, 255, .8);
        }

        .fs-review-main h1 {
            margin: 0;
            max-width: 760px;
            color: #102a43;
            font-size: clamp(38px, 5vw, 68px) !important;
            line-height: .98;
            letter-spacing: -.065em;
            font-weight: 900 !important;
        }

        .fs-review-main-lead {
            margin: 24px 0 0;
            max-width: 740px;
            color: #52667a;
            font-size: 18px;
            line-height: 1.75;
            font-weight: 500;
        }

        .fs-review-confirm-box {
            margin-top: 30px;
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 18px;
            align-items: start;
            border: 1px solid #d9e6ff;
            border-radius: 14px;
            background: #f8fbff;
            padding: 22px;
        }

        .fs-review-confirm-icon {
            width: 52px;
            height: 52px;
            border-radius: 999px;
            background: #0018dc;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 1000;
            box-shadow: 0 14px 32px rgba(0, 24, 220, .18);
        }

        .fs-review-confirm-box strong {
            display: block;
            color: #102a43;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .fs-review-confirm-box p {
            margin: 0;
            color: #52667a;
            font-size: 15px;
            line-height: 1.65;
        }

        .fs-review-side {
            position: relative;
            padding: 42px;
            color: #ffffff;
            background:
                radial-gradient(circle at 70% 16%, rgba(21, 209, 255, .22), transparent 32%),
                linear-gradient(145deg, #0018dc 0%, #00118f 100%);
            overflow: hidden;
        }

        .fs-review-side::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .25;
            background-image:
                linear-gradient(rgba(255, 255, 255, .14) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .12) 1px, transparent 1px);
            background-size: 42px 42px;
        }

        .fs-review-side-content {
            position: relative;
            z-index: 2;
        }

        .fs-review-check-large {
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
            margin-bottom: 32px;
        }

        .fs-review-side h2 {
            margin: 0;
            color: #ffffff;
            font-size: 30px;
            line-height: 1.1;
            letter-spacing: -.045em;
            font-weight: 900;
        }

        .fs-review-side p {
            margin: 14px 0 0;
            color: rgba(255, 255, 255, .82);
            font-size: 15px;
            line-height: 1.7;
        }

        .fs-review-steps {
            padding: 0 56px 56px;
        }

        .fs-review-steps-grid {
            padding: 28px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .fs-review-step {
            position: relative;
            overflow: hidden;
            border: 1px solid #d9e2ec;
            border-radius: 14px;
            background: #ffffff;
            padding: 24px;
            box-shadow: 0 16px 38px rgba(16, 42, 67, .07);
            transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
        }

        .fs-review-step:hover {
            transform: translateY(-3px);
            border-color: #0018dc;
            box-shadow: 0 22px 46px rgba(16, 42, 67, .11);
        }

        .fs-review-step::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: #0018dc;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s ease;
        }

        .fs-review-step:hover::before {
            transform: scaleX(1);
        }

        .fs-review-step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 999px;
            background: #edf3ff;
            color: #0018dc;
            font-size: 14px;
            font-weight: 1000;
            margin-bottom: 18px;
        }

        .fs-review-step h3 {
            margin: 0 0 10px;
            color: #102a43;
            font-size: 20px;
            line-height: 1.15;
            letter-spacing: -.035em;
            font-weight: 900;
        }

        .fs-review-step p {
            margin: 0;
            color: #52667a;
            font-size: 15px;
            line-height: 1.65;
        }

        .fs-review-actions {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .fs-review-btn {
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

        .fs-review-btn:hover {
            transform: translateY(-2px);
        }

        .fs-review-btn-primary {
            background: #0018dc;
            color: #ffffff;
            box-shadow: 0 14px 32px rgba(0, 24, 220, .18);
        }

        .fs-review-btn-primary:hover {
            background: #1433ff;
            color: #ffffff;
        }

        .fs-review-btn-secondary {
            background: #ffffff;
            color: #102a43;
            border: 1px solid #d9e2ec;
        }

        .fs-review-btn-secondary:hover {
            border-color: #0018dc;
            color: #0018dc;
        }

        @media (max-width: 1040px) {
            .fs-review-hero {
                grid-template-columns: 1fr;
            }

            .fs-review-steps-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .fs-review-thankyou-page {
                padding: 64px 0;
            }

            .fs-review-wrap {
                width: min(100%, calc(100% - 28px));
            }

            .fs-review-main,
            .fs-review-side,
            .fs-review-steps {
                padding: 28px;
            }

            .fs-review-confirm-box {
                grid-template-columns: 1fr;
            }

            .fs-review-actions {
                flex-direction: column;
            }

            .fs-review-btn {
                width: 100%;
            }
        }
    </style>

    <div class="fs-review-wrap">
        <div class="fs-review-shell">
            <div class="fs-review-hero">
                <div class="fs-review-main">
                    <div class="fs-review-kicker">
                        <span class="fs-review-kicker-dot"></span>
                        Technical review request received
                    </div>

                    <h1>Your application details have been submitted.</h1>

                    <p class="fs-review-main-lead">
                        Fluidstream has received your technical review request. Our team will review the submitted
                        operating information and respond within 1–2 business days.
                    </p>

                    <div class="fs-review-confirm-box">
                        <div class="fs-review-confirm-icon">✓</div>

                        <div>
                            <strong>Submission confirmed</strong>
                            <p>
                                Your information is now ready for Fluidstream’s initial application review process.
                                If additional field details are required, our team may contact you for clarification.
                            </p>
                        </div>
                    </div>

                    <div class="fs-review-actions">
                        <a href="{{ url('/case-studies') }}" class="fs-review-btn fs-review-btn-primary">
                            View Case Studies
                        </a>

                        <a href="{{ url('/insights') }}" class="fs-review-btn fs-review-btn-secondary">
                            Read Insights
                        </a>

                        <a href="{{ url('/') }}" class="fs-review-btn fs-review-btn-secondary">
                            Go to Homepage
                        </a>
                    </div>
                </div>

                <aside class="fs-review-side">
                    <div class="fs-review-side-content">
                        <div class="fs-review-check-large">✓</div>

                        <h2>What Fluidstream reviews next</h2>

                        <p>
                            Your submitted conditions can help determine whether vapor recovery, casing gas compression,
                            or multiphase compression may be technically suitable for further discussion.
                        </p>
                    </div>
                </aside>
            </div>

            <div class="fs-review-steps">
                <div class="fs-review-steps-grid">
                    <article class="fs-review-step">
                        <div class="fs-review-step-number">01</div>
                        <h3>Application review</h3>
                        <p>
                            Submitted conditions are reviewed against vapor recovery, casing gas compression,
                            or multiphase compression fit.
                        </p>
                    </article>

                    <article class="fs-review-step">
                        <div class="fs-review-step-number">02</div>
                        <h3>Technical follow-up</h3>
                        <p>
                            Fluidstream may request additional operating details if more context is needed
                            for the application.
                        </p>
                    </article>

                    <article class="fs-review-step">
                        <div class="fs-review-step-number">03</div>
                        <h3>Fit assessment</h3>
                        <p>
                            You receive guidance on whether the application appears suitable for deeper
                            technical or commercial review.
                        </p>
                    </article>
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
        form_name: 'technical_review_form',
        page_path: window.location.pathname
    });
</script>
@endpush