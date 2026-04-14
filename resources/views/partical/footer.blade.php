{{-- resources/views/partials/footer.blade.php --}}

<style>
    .fsf-footer-wrap {
        background: #1029ea;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: #dbe4ff;
        width: 100%;
    }

    .fsf-footer-wrap * {
        box-sizing: border-box;
    }

    .fsf-footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 40px 30px;
    }

    .fsf-footer-cta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 30px;
        margin-bottom: 40px;
    }

    .fsf-footer-cta-content {
        max-width: 780px;
    }

    .fsf-footer-cta-title {
        font-size: 26px;
        line-height: 1.3;
        margin: 0;
        color: #ffffff;
        font-weight: 700;
    }

    .fsf-footer-cta-text {
        margin: 8px 0 0;
        color: #9fb0d8;
        font-size: 15px;
        line-height: 1.7;
    }

    .fsf-footer-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0018dc, #15d1ff);
        color: #ffffff;
        padding: 14px 22px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 700;
        white-space: nowrap;
        transition: 0.25s ease;
    }

    .fsf-footer-cta-btn:hover {
        opacity: 0.92;
        transform: translateY(-1px);
    }

    .fsf-footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr 1.2fr;
        gap: 30px;
    }

    .fsf-footer-brand-title,
    .fsf-footer-col-title,
    .fsf-footer-contact-title {
        font-size: 13px;
        line-height: 1.4;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #ffffff;
        margin: 0 0 18px;
        font-weight: 700;
    }

    .fsf-footer-brand-text {
        margin: 0;
        color: #c2c8d5;
        line-height: 1.8;
        font-size: 15px;
    }

    .fsf-footer-address {
        margin-top: 20px;
        font-size: 14px;
        line-height: 1.8;
        color: #9fb0d8;
    }

    .fsf-footer-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .fsf-footer-list-item {
        margin-bottom: 10px;
    }

    .fsf-footer-link {
        color: #9fb0d8;
        text-decoration: none;
        line-height: 1.7;
        transition: 0.25s ease;
    }

    .fsf-footer-link:hover {
        color: #ffffff;
    }

    .fsf-footer-contact-box {
        background: rgba(255, 255, 255, 0.03);
        padding: 15px;
        border-radius: 10px;
    }

    .fsf-footer-contact-text {
        margin: 0 0 10px;
        color: #ffffff;
        line-height: 1.7;
        font-size: 15px;
    }

    .fsf-footer-contact-box .fsf-footer-link {
        display: inline-block;
        margin-bottom: 6px;
    }

    .fsf-footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 40px;
        padding-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        font-size: 13px;
    }

    .fsf-footer-copy {
        color: #ffffff;
    }

    .fsf-footer-bottom-links {
        color: #9fb0d8;
    }

    .fsf-footer-bottom-links .fsf-footer-link {
        color: #9fb0d8;
    }

    .fsf-footer-bottom-links .fsf-footer-link:hover {
        color: #ffffff;
    }

    @media (max-width: 1199px) {
        .fsf-footer-grid {
            grid-template-columns: 1.6fr 1fr 1fr 1fr;
        }

        .fsf-footer-contact-col {
            grid-column: span 2;
        }
    }

    @media (max-width: 991px) {
        .fsf-footer-container {
            padding: 50px 24px 28px;
        }

        .fsf-footer-cta {
            flex-direction: column;
            align-items: flex-start;
        }

        .fsf-footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 28px 24px;
        }

        .fsf-footer-brand-col,
        .fsf-footer-contact-col {
            grid-column: span 2;
        }
    }

    @media (max-width: 575px) {
        .fsf-footer-container {
            padding: 42px 18px 24px;
        }

        .fsf-footer-cta {
            margin-bottom: 32px;
            padding-bottom: 24px;
        }

        .fsf-footer-cta-title {
            font-size: 22px;
        }

        .fsf-footer-cta-text,
        .fsf-footer-brand-text,
        .fsf-footer-contact-text,
        .fsf-footer-link,
        .fsf-footer-address {
            font-size: 14px;
        }

        .fsf-footer-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .fsf-footer-brand-col,
        .fsf-footer-contact-col {
            grid-column: span 1;
        }

        .fsf-footer-bottom {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<footer class="fsf-footer-wrap">
    <div class="fsf-footer-container">

        {{-- CTA --}}
        <div class="fsf-footer-cta">
            <div class="fsf-footer-cta-content">
                <h2 class="fsf-footer-cta-title">
                    Evaluate whether Fluidstream can simplify your production system
                </h2>
                <p class="fsf-footer-cta-text">
                    Designed for engineers and decision-makers evaluating multiphase compression systems
                </p>
            </div>

            {{-- Uncomment if needed --}}
            {{--
            <a href="/contact" class="fsf-footer-cta-btn">
                Request Application Review
            </a>
            --}}
        </div>

        {{-- GRID --}}
        <div class="fsf-footer-grid">

            {{-- BRAND --}}
            <div class="fsf-footer-brand-col">
                <h3 class="fsf-footer-brand-title">Fluidstream</h3>
                <p class="fsf-footer-brand-text">
                    Fluidstream delivers advanced multiphase compression systems that eliminate separation, handle
                    liquids and gas together, reduce downtime, lower emissions, and improve production across vapor
                    recovery, casing gas, and multiphase operations.
                </p>

                <div class="fsf-footer-address">
                    4416 5 St NE, Unit 1A<br>
                    Calgary, AB T2E 7C3<br>
                    Canada
                </div>
            </div>

            {{-- SOLUTIONS --}}
            <div class="fsf-footer-col">
                <h3 class="fsf-footer-col-title">Solutions</h3>
                <ul class="fsf-footer-list">
                    <li class="fsf-footer-list-item">
                        <a href="/multiphase-compression" class="fsf-footer-link">Multiphase Compression</a>
                    </li>
                    <li class="fsf-footer-list-item">
                        <a href="/vapor-recovery" class="fsf-footer-link">Vapor Recovery</a>
                    </li>
                    <li class="fsf-footer-list-item">
                        <a href="/casing-gas-compression" class="fsf-footer-link">Casing Gas Compression</a>
                    </li>
                </ul>
            </div>

            {{-- TECHNOLOGY --}}
            <div class="fsf-footer-col">
                <h3 class="fsf-footer-col-title">Technology</h3>
                <ul class="fsf-footer-list">
                    <li class="fsf-footer-list-item">
                        <a href="/technology" class="fsf-footer-link">Technology Overview</a>
                    </li>
                    <li class="fsf-footer-list-item">
                        <a href="/multiphase-compression-technology" class="fsf-footer-link">
                            Multiphase Compression Technology
                        </a>
                    </li>
                    <li class="fsf-footer-list-item">
                        <a href="/technology#features" class="fsf-footer-link">Key Features</a>
                    </li>
                </ul>
            </div>

            {{-- RESOURCES --}}
            <div class="fsf-footer-col">
                <h3 class="fsf-footer-col-title">Resources</h3>
                <ul class="fsf-footer-list">
                    <li class="fsf-footer-list-item">
                        <a href="/case-studies" class="fsf-footer-link">Case Studies</a>
                    </li>
                    <li class="fsf-footer-list-item">
                        <a href="/insights" class="fsf-footer-link">Insights</a>
                    </li>
                    {{--
                    <li class="fsf-footer-list-item">
                        <a href="/insights#articles" class="fsf-footer-link">Technical Articles</a>
                    </li>
                    --}}
                </ul>
            </div>

            {{-- CONTACT --}}
            <div class="fsf-footer-contact-col">
                <h3 class="fsf-footer-contact-title">Talk to Fluidstream</h3>
                <div class="fsf-footer-contact-box">
                    <p class="fsf-footer-contact-text">
                        Discuss your application and system requirements
                    </p>
                    <a href="/contact" class="fsf-footer-link">Contact Us</a><br>
                    <a href="/contact" class="fsf-footer-link">Request Technical Review</a><br>
                    <a href="/multiphase-compression" class="fsf-footer-link">Review Specifications</a>
                </div>
            </div>

        </div>

        {{-- BOTTOM --}}
        <div class="fsf-footer-bottom">
            <div class="fsf-footer-copy">© 2026 Fluidstream Inc.</div>
            <div class="fsf-footer-bottom-links">
                <a href="/privacy-policy" class="fsf-footer-link">Privacy Policy</a> |
                <a href="/terms" class="fsf-footer-link">Terms of Use</a>
                {{--
                | <a href="#" class="fsf-footer-link">Sitemap</a>
                --}}
            </div>
        </div>

    </div>
</footer>