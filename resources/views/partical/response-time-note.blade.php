<div class="fs-response-time-note">
    <style>
        .fs-response-time-note {
            margin-top: 22px;
            position: relative;
            overflow: hidden;
            border: 1px solid #d9e6ff;
            border-radius: 14px;
            /* background:
                radial-gradient(circle at 92% 20%, rgba(21, 209, 255, .12), transparent 26%),
                #f8fbff; */
            padding: 18px 20px;
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 14px;
            align-items: start;
        }

        .fs-response-time-note::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            background: #0018dc;
        }

        .fs-response-time-icon {
            width: 42px;
            height: 42px;
            border-radius: 999px;
            background: #0018dc;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 900;
            box-shadow: 0 12px 26px rgba(0, 24, 220, .18);
        }

        .fs-response-time-copy strong {
            display: block;
            color: #102a43;
            font-size: 16px;
            line-height: 1.3;
            margin-bottom: 5px;
        }

        .fs-response-time-copy p {
            margin: 0;
            color: #52667a;
            font-size: 14px;
            line-height: 1.65;
            font-weight: 600;
        }

        @media (max-width: 560px) {
            .fs-response-time-note {
                grid-template-columns: 1fr;
            }
        }
    </style>

    {{-- <div class="fs-response-time-icon">↗</div> --}}

    <div class="fs-response-time-copy">
        <strong>Response time expectation</strong>
        <p>
            Fluidstream typically responds within 1–2 business days after receiving your submission.
        </p>
    </div>
</div>