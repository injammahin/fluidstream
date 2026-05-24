@extends('layouts.app')

@section('content')
<section class="fs-contact-submitted-page">
    <style>
        .fs-contact-submitted-page {
            min-height: 72vh;
            padding: 96px 0;

        }

        .fs-contact-submitted-wrap {
            width: min(860px, calc(100% - 40px));
            margin: 0 auto;
        }

        .fs-contact-submitted-card {
            position: relative;
            overflow: hidden;
            border: 1px solid #d9e6ff;
            border-radius: 10px;
            background: #ffffff;
            padding: 48px;
            box-shadow: 0 18px 45px rgba(16, 42, 67, .08);
        }

        .fs-contact-submitted-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 4px;
            background: #0018dc;
        }

        .fs-contact-submitted-icon {
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

        .fs-contact-submitted-kicker {
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

        .fs-contact-submitted-card h1 {
            margin: 0;
            max-width: 720px;
            color: #102a43;
            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.04;
            letter-spacing: -.045em;
            font-weight: 900;
        }

        .fs-contact-submitted-lead {
            margin: 20px 0 0;
            max-width: 720px;
            color: #52667a;
            font-size: 18px;
            line-height: 1.7;
            font-weight: 500;
        }

        .fs-contact-submitted-note {
            margin-top: 28px;
            padding: 20px 22px;
            border: 1px solid #d9e6ff;
            border-radius: 8px;
            background: #f8fbff;
        }

        .fs-contact-submitted-note strong {
            display: block;
            margin-bottom: 6px;
            color: #102a43;
            font-size: 16px;
            font-weight: 800;
        }

        .fs-contact-submitted-note p {
            margin: 0;
            color: #52667a;
            font-size: 15px;
            line-height: 1.65;
        }

        .fs-contact-submitted-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 32px;
        }

        .fs-contact-submitted-btn {
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

        .fs-contact-submitted-btn:hover {
            transform: translateY(-2px);
            text-decoration: none;
        }

        .fs-contact-submitted-btn-primary {
            background: #0018dc;
            color: #ffffff;
            border: 1px solid #0018dc;
        }

        .fs-contact-submitted-btn-primary:hover {
            background: #1433ff;
            border-color: #1433ff;
            color: #ffffff;
        }

        .fs-contact-submitted-btn-secondary {
            background: #ffffff;
            color: #0018dc;
            border: 1px solid #cbd7ee;
        }

        .fs-contact-submitted-btn-secondary:hover {
            border-color: #0018dc;
            color: #0018dc;
        }

        @media (max-width: 640px) {
            .fs-contact-submitted-page {
                padding: 64px 0;
            }

            .fs-contact-submitted-wrap {
                width: min(100%, calc(100% - 28px));
            }

            .fs-contact-submitted-card {
                padding: 32px 24px;
            }

            .fs-contact-submitted-actions {
                flex-direction: column;
            }

            .fs-contact-submitted-btn {
                width: 100%;
            }
        }
    </style>

    <div class="fs-contact-submitted-wrap">
        <div class="fs-contact-submitted-card">
            <div class="fs-contact-submitted-icon">✓</div>

            <div class="fs-contact-submitted-kicker">
                Contact submitted
            </div>

            <h1>Thank you for contacting Fluidstream.</h1>

            <p class="fs-contact-submitted-lead">
                Your message has been received. A Fluidstream team member will review your inquiry and follow up through the contact details you provided.
            </p>

            <div class="fs-contact-submitted-note">
                <strong>What happens next?</strong>
                <p>
                    For product questions, technical inquiries, or general business communication, Fluidstream typically responds within 1 to 2 business days.
                </p>
            </div>

            <div class="fs-contact-submitted-actions">
                <a href="{{ url('/') }}" class="fs-contact-submitted-btn fs-contact-submitted-btn-primary">
                    Go to Homepage
                </a>

                <a href="{{ url('/case-studies') }}" class="fs-contact-submitted-btn fs-contact-submitted-btn-secondary">
                    View Case Studies
                </a>

                <a href="{{ url('/contact') }}" class="fs-contact-submitted-btn fs-contact-submitted-btn-secondary">
                    Back to Contact
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
        form_name: 'contact_form',
        page_path: window.location.pathname
    });
</script>
@endpush