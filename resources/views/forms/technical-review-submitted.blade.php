@extends('layouts.app')

@section('content')
<section class="fs-review-submitted-page">
    <style>
        .fs-review-submitted-page {
            min-height: 72vh;
            padding: 96px 0;

        }

        .fs-review-submitted-wrap {
            width: min(900px, calc(100% - 40px));
            margin: 0 auto;
        }

        .fs-review-submitted-card {
            position: relative;
            overflow: hidden;
            border: 1px solid #d9e6ff;
            border-radius: 10px;
            background: #ffffff;
            padding: 48px;
            box-shadow: 0 18px 45px rgba(16, 42, 67, .08);
        }

        .fs-review-submitted-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: #0018dc;
        }

        .fs-review-submitted-icon {
            width: 64px;
            height: 64px;
            margin-bottom: 24px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf3ff;
            color: #0018dc;
            font-size: 34px;
            font-weight: 900;
            border: 1px solid #cfdcff;
        }

        .fs-review-submitted-kicker {
            display: inline-flex;
            margin-bottom: 16px;
            padding: 8px 12px;
            border-radius: 999px;
            background: #edf3ff;
            border: 1px solid #d3e1ff;
            color: #0018dc;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .fs-review-submitted-card h1 {
            margin: 0;
            max-width: 760px;
            color: #102a43;
            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.04;
            letter-spacing: -.045em;
            font-weight: 900;
        }

        .fs-review-submitted-lead {
            margin: 20px 0 0;
            max-width: 760px;
            color: #52667a;
            font-size: 18px;
            line-height: 1.7;
            font-weight: 500;
        }

        .fs-review-submitted-note {
            margin-top: 28px;
            padding: 20px 22px;
            border: 1px solid #d9e6ff;
            border-radius: 8px;
            background: #f8fbff;
        }

        .fs-review-submitted-note strong {
            display: block;
            margin-bottom: 6px;
            color: #102a43;
            font-size: 16px;
            font-weight: 800;
        }

        .fs-review-submitted-note p {
            margin: 0;
            color: #52667a;
            font-size: 15px;
            line-height: 1.65;
        }

        .fs-review-submitted-steps {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: 28px;
        }

        .fs-review-submitted-step {
            border: 1px solid #d9e2ec;
            border-radius: 8px;
            background: #ffffff;
            padding: 18px;
        }

        .fs-review-submitted-step span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            margin-bottom: 12px;
            border-radius: 999px;
            background: #edf3ff;
            color: #0018dc;
            font-size: 13px;
            font-weight: 900;
        }

        .fs-review-submitted-step h3 {
            margin: 0 0 8px;
            color: #102a43;
            font-size: 17px;
            line-height: 1.2;
            font-weight: 900;
        }

        .fs-review-submitted-step p {
            margin: 0;
            color: #52667a;
            font-size: 14px;
            line-height: 1.55;
        }

        .fs-review-submitted-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 32px;
        }

        .fs-review-submitted-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 22px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 900;
            text-decoration: none;
            transition: transform .25s ease, border-color .25s ease, background .25s ease, color .25s ease;
        }

        .fs-review-submitted-btn:hover {
            transform: translateY(-2px);
            text-decoration: none;
        }

        .fs-review-submitted-btn-primary {
            background: #0018dc;
            color: #ffffff;
            border: 1px solid #0018dc;
        }

        .fs-review-submitted-btn-primary:hover {
            background: #1433ff;
            border-color: #1433ff;
            color: #ffffff;
        }

        .fs-review-submitted-btn-secondary {
            background: #ffffff;
            color: #0018dc;
            border: 1px solid #cbd7ee;
        }

        .fs-review-submitted-btn-secondary:hover {
            border-color: #0018dc;
            color: #0018dc;
        }

        @media (max-width: 760px) {
            .fs-review-submitted-steps {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .fs-review-submitted-page {
                padding: 64px 0;
            }

            .fs-review-submitted-wrap {
                width: min(100%, calc(100% - 28px));
            }

            .fs-review-submitted-card {
                padding: 32px 24px;
            }

            .fs-review-submitted-actions {
                flex-direction: column;
            }

            .fs-review-submitted-btn {
                width: 100%;
            }
        }
    </style>

    <div class="fs-review-submitted-wrap">
        <div class="fs-review-submitted-card">
            <div class="fs-review-submitted-icon">✓</div>

            <div class="fs-review-submitted-kicker">
                Technical review submitted
            </div>

            <h1>Your application details have been submitted.</h1>

            <p class="fs-review-submitted-lead">
                Fluidstream has received your technical review request. Our team will review the submitted operating information and respond through the contact details you provided.
            </p>

            <div class="fs-review-submitted-note">
                <strong>What happens next?</strong>
                <p>
                    Fluidstream will review the submitted conditions and may contact you if additional field details are needed. A response is typically provided within 1 to 2 business days.
                </p>
            </div>

            <div class="fs-review-submitted-steps">
                <article class="fs-review-submitted-step">
                    <span>01</span>
                    <h3>Application review</h3>
                    <p>
                        Your submitted operating conditions are reviewed for technical fit.
                    </p>
                </article>

                <article class="fs-review-submitted-step">
                    <span>02</span>
                    <h3>Technical follow-up</h3>
                    <p>
                        The team may request more details if clarification is needed.
                    </p>
                </article>

                <article class="fs-review-submitted-step">
                    <span>03</span>
                    <h3>Fit assessment</h3>
                    <p>
                        You receive guidance on whether the application is suitable for deeper review.
                    </p>
                </article>
            </div>

            <div class="fs-review-submitted-actions">
                <a href="{{ url('/') }}" class="fs-review-submitted-btn fs-review-submitted-btn-primary">
                    Go to Homepage
                </a>

                <a href="{{ url('/case-studies') }}" class="fs-review-submitted-btn fs-review-submitted-btn-secondary">
                    View Case Studies
                </a>

                <a href="{{ url('/technical-review') }}" class="fs-review-submitted-btn fs-review-submitted-btn-secondary">
                    Back to Technical Review
                </a>
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