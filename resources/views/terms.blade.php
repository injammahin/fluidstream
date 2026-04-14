@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fstu-blue: #1028ea;
            --fstu-blue-dark: #0b1fb8;
            --fstu-navy: #1a2332;
            --fstu-navy-dark: #111827;
            --fstu-white: #ffffff;
            --fstu-body-bg: #ffffff;
            --fstu-section-bg: #f8f9fb;
            --fstu-border: #e5e9ef;
            --fstu-text-dark: #1a2332;
            --fstu-text-body: #3d4f63;
            --fstu-text-muted: #6b7f96;
            --fstu-blue-soft-bg: rgba(16, 40, 234, 0.06);
            --fstu-blue-soft-border: rgba(16, 40, 234, 0.18);
            --fstu-dark-soft-bg: rgba(17, 24, 39, 0.05);
            --fstu-dark-soft-border: rgba(17, 24, 39, 0.14);
            --fstu-font: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .fstu-page,
        .fstu-page * {
            box-sizing: border-box;
        }

        .fstu-page {
            font-family: var(--fstu-font);
            background: var(--fstu-body-bg);
            color: var(--fstu-text-body);
            font-size: 15px;
            line-height: 1.8;
            -webkit-font-smoothing: antialiased;
        }

        .fstu-page a {
            color: var(--fstu-blue);
            text-decoration: none;
        }

        .fstu-page a:hover {
            text-decoration: underline;
            color: var(--fstu-blue-dark);
        }

        /* NAV */
        .fstu-topbar {
            background: var(--fstu-navy);
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 56px;
            position: sticky;
            top: 0;
            z-index: 200;
        }

        .fstu-logo-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .fstu-logo-icon {
            width: 36px;
            height: 36px;
            background: var(--fstu-blue);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            color: var(--fstu-white);
            letter-spacing: -0.02em;
            flex-shrink: 0;
        }

        .fstu-logo-name {
            font-size: 17px;
            font-weight: 700;
            color: var(--fstu-white);
            letter-spacing: -0.01em;
        }

        .fstu-nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .fstu-nav-links a {
            color: rgba(255, 255, 255, 0.72);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.18s;
        }

        .fstu-nav-links a:hover {
            color: var(--fstu-white);
        }

        .fstu-nav-links a.fstu-here {
            color: var(--fstu-blue);
        }

        /* HERO */
        .fstu-hero {
            background: #1029ea;
            padding: 64px 56px 56px;
            position: relative;
            overflow: hidden;
        }

        .fstu-hero-inner {
            max-width: 880px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .fstu-tag-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgb(161 164 194 / 12%);
            border: 1px solid rgb(158 159 166 / 35%);
            color: #c2c3d1;
            padding: 4px 14px 4px 10px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .fstu-tag-pill span {
            width: 6px;
            height: 6px;
            background: var(--fstu-blue);
            border-radius: 50%;
            display: inline-block;
        }

        .fstu-hero-title {
            font-size: clamp(30px, 4.5vw, 50px);
            font-weight: 700;
            color: var(--fstu-white);
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 16px;
        }

        .fstu-hero-sub {
            color: rgba(255, 255, 255, 0.58);
            font-size: 15px;
            max-width: 540px;
            line-height: 1.7;
            margin-bottom: 36px;
        }

        .fstu-meta-strip {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            padding-top: 28px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .fstu-meta-item {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .fstu-meta-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #afafb2;
        }

        .fstu-meta-value {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.62);
            font-weight: 500;
        }

        /* BREADCRUMB */
        .fstu-breadcrumb {
            background: var(--fstu-section-bg);
            border-bottom: 1px solid var(--fstu-border);
            padding: 12px 56px;
        }

        .fstu-breadcrumb-inner {
            max-width: 880px;
            margin: 0 auto;
            font-size: 13px;
            color: var(--fstu-text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .fstu-breadcrumb-inner a {
            color: var(--fstu-text-muted);
            text-decoration: none;
        }

        .fstu-breadcrumb-inner a:hover {
            color: var(--fstu-blue);
        }

        .fstu-breadcrumb-sep {
            color: var(--fstu-border);
        }

        .fstu-breadcrumb-current {
            color: var(--fstu-text-dark);
            font-weight: 500;
        }

        /* CONTENT */
        .fstu-page-wrap {
            max-width: 880px;
            margin: 0 auto;
            padding: 60px 56px 96px;
        }

        .fstu-alert-bar {
            background: #f0f0f0;
            border: 1px solid rgb(115 115 115 / 18%);
            border-left: 4px solid #001ae891;
            border-radius: 6px;
            padding: 15px 20px;
            margin-bottom: 52px;
            font-size: 13px;
            font-weight: 600;
            color: #525257;
            line-height: 1.6;
        }

        .fstu-section {
            margin-bottom: 48px;
            padding-bottom: 48px;
            border-bottom: 1px solid var(--fstu-border);
        }

        .fstu-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .fstu-sec-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--fstu-blue);
            display: block;
            margin-bottom: 8px;
        }

        .fstu-section-title {
            font-size: 21px;
            font-weight: 700;
            color: var(--fstu-text-dark);
            letter-spacing: -0.02em;
            line-height: 1.25;
            margin-bottom: 18px;
        }

        .fstu-text {
            color: var(--fstu-text-body);
            margin-bottom: 14px;
            font-size: 15px;
            line-height: 1.8;
        }

        .fstu-text:last-child {
            margin-bottom: 0;
        }

        .fstu-list {
            list-style: none;
            padding: 0;
            margin: 16px 0;
            border: 1px solid var(--fstu-border);
            border-radius: 8px;
            overflow: hidden;
        }

        .fstu-list-item {
            display: block;
            position: relative;
            padding: 12px 16px 12px 32px;
            font-size: 14.5px;
            color: var(--fstu-text-body);
            line-height: 1.7;
            border-bottom: 1px solid var(--fstu-border);
            background: var(--fstu-white);
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .fstu-list-item:last-child {
            border-bottom: none;
        }

        .fstu-list-item:nth-child(even) {
            background: var(--fstu-section-bg);
        }

        .fstu-list-item::before {
            content: '';
            position: absolute;
            left: 14px;
            top: 20px;
            width: 7px;
            height: 7px;
            background: var(--fstu-blue);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .fstu-list-item a {
            display: inline;
        }

        .fstu-box {
            background: var(--fstu-section-bg);
            border: 1px solid var(--fstu-border);
            border-left: 4px solid var(--fstu-blue);
            border-radius: 6px;
            padding: 16px 20px;
            margin: 20px 0;
            font-size: 14px;
            color: var(--fstu-text-body);
            line-height: 1.75;
        }

        .fstu-box-dark {
            background: var(--fstu-dark-soft-bg);
            border-color: var(--fstu-dark-soft-border);
            border-left-color: var(--fstu-navy-dark);
            color: var(--fstu-text-dark);
            font-weight: 600;
            font-size: 13px;
        }

        .fstu-box-blue {
            background: var(--fstu-blue-soft-bg);
            border-color: var(--fstu-blue-soft-border);
            border-left-color: var(--fstu-blue);
            color: var(--fstu-text-dark);
            font-weight: 500;
            font-size: 14px;
        }

        .fstu-page strong {
            color: var(--fstu-text-dark);
            font-weight: 600;
        }

        .fstu-page em {
            color: var(--fstu-text-muted);
            font-style: italic;
        }

        /* FOOTER */
        .fstu-footer {
            background: var(--fstu-navy);
        }

        .fstu-footer-top {
            max-width: 880px;
            margin: 0 auto;
            padding: 44px 56px 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 28px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .fstu-footer-brand .fstu-logo-name {
            font-size: 16px;
        }

        .fstu-footer-brand-text {
            color: rgba(255, 255, 255, 0.44);
            font-size: 13px;
            margin-top: 10px;
            max-width: 240px;
            line-height: 1.6;
        }

        .fstu-footer-links {
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }

        .fstu-footer-links a {
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: color 0.18s;
        }

        .fstu-footer-links a:hover {
            color: var(--fstu-blue);
        }

        .fstu-footer-bottom {
            max-width: 880px;
            margin: 0 auto;
            padding: 20px 56px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .fstu-footer-bottom span {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.32);
        }

        @media (max-width: 680px) {

            .fstu-topbar,
            .fstu-breadcrumb,
            .fstu-hero {
                padding-left: 24px;
                padding-right: 24px;
            }

            .fstu-page-wrap {
                padding: 40px 24px 72px;
            }

            .fstu-footer-top,
            .fstu-footer-bottom {
                padding-left: 24px;
                padding-right: 24px;
            }

            .fstu-nav-links {
                display: none;
            }

            .fstu-meta-strip {
                gap: 24px;
            }
        }
    </style>

    <div class="fstu-page">

        <!-- HERO -->
        <div class="fstu-hero">
            <div class="fstu-hero-inner">
                <div class="fstu-tag-pill"><span></span>Legal Document</div>

                <h1 class="fstu-hero-title">Terms of Use</h1>

                <p class="fstu-hero-sub">
                    Governing your access to and use of this website and any data, analysis,
                    or content made available through it.
                </p>

                <div class="fstu-meta-strip">
                    <div class="fstu-meta-item">
                        <span class="fstu-meta-label">Effective Date</span>
                        <span class="fstu-meta-value">January 1, 2026</span>
                    </div>
                    <div class="fstu-meta-item">
                        <span class="fstu-meta-label">Governing Law</span>
                        <span class="fstu-meta-value">Province of Alberta, Canada</span>
                    </div>
                    <div class="fstu-meta-item">
                        <span class="fstu-meta-label">Jurisdiction</span>
                        <span class="fstu-meta-value">Calgary, Alberta</span>
                    </div>
                    <div class="fstu-meta-item">
                        <span class="fstu-meta-label">Website</span>
                        <span class="fstu-meta-value">www.fluidstream.co</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="fstu-page-wrap">

            <div class="fstu-alert-bar">
                &#9888;&nbsp; IF YOU DO NOT AGREE TO THESE TERMS IN THEIR ENTIRETY, YOU MUST
                IMMEDIATELY CEASE USE OF THIS WEBSITE. YOUR CONTINUED USE CONSTITUTES FULL
                ACCEPTANCE OF THESE TERMS.
            </div>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 01</span>
                <h2 class="fstu-section-title">Acceptance of Terms</h2>
                <p class="fstu-text">
                    <strong>Fluidstream Inc.</strong> (<strong>"Fluidstream"</strong>, <strong>"we"</strong>,
                    <strong>"us"</strong>) is a corporation incorporated under the laws of Alberta, Canada.
                    This website located at <strong>www.fluidstream.co</strong> (the <strong>"Website"</strong>)
                    is operated for informational and client-service purposes.
                </p>
                <p class="fstu-text">
                    By accessing or using this Website, you (<strong>"User"</strong>, <strong>"you"</strong>)
                    agree to be legally bound by these Terms of Use (<strong>"Terms"</strong>) and all policies
                    incorporated herein by reference. We reserve the right to update these Terms at any time
                    without prior notice. Your continued use of the Website after any update constitutes your
                    acceptance of the revised Terms.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 02</span>
                <h2 class="fstu-section-title">Intellectual Property, Trademarks &amp; Content Protection</h2>
                <p class="fstu-text">
                    All content on this Website — including text, technical descriptions, product data, graphics,
                    images, logos, software, design, and the overall compilation of materials
                    (collectively, <strong>"Content"</strong>) — is the exclusive property of Fluidstream Inc.
                    and is protected under the <em>Copyright Act</em> (R.S.C., 1985, c. C-42) and applicable
                    Canadian and international intellectual property law.
                </p>
                <p class="fstu-text">
                    The <strong>Fluidstream</strong> name, logo, <strong>MultiphaseCommander</strong>, and all
                    associated product names, marks, and trade dress are trademarks of Fluidstream Inc.
                    Nothing on this Website grants any licence or right to use any Fluidstream trademark
                    without our express prior written consent. Unauthorized use of Fluidstream's trademarks
                    is strictly prohibited and may result in legal action.
                </p>

                <div class="fstu-box fstu-box-dark">
                    You are expressly prohibited from copying, reproducing, reverse engineering,
                    decompiling, disassembling, scraping, or creating derivative works from any Content,
                    technical data, product information, or any element of this Website without
                    Fluidstream's prior written authorization.
                </div>

                <p class="fstu-text">The following acts are specifically and strictly prohibited:</p>

                <ul class="fstu-list">
                    <li class="fstu-list-item">Using bots, crawlers, scrapers, or automated tools to extract any Content or
                        data from this Website</li>
                    <li class="fstu-list-item">Reverse engineering, decompiling, or attempting to derive underlying
                        technology, algorithms, methodologies, or source code from any part of this Website or its systems
                    </li>
                    <li class="fstu-list-item">Copying or replicating this Website's design, layout, technical content, or
                        product descriptions for any competitive or commercial purpose</li>
                    <li class="fstu-list-item">Circumventing any technical protection measures deployed on this Website</li>
                    <li class="fstu-list-item">Using any Content — including technical papers, product specifications, case
                        studies, or analysis outputs — to train artificial intelligence or machine learning models without
                        express written consent</li>
                    <li class="fstu-list-item">Reproducing, republishing, or redistributing any Fluidstream technical data,
                        methodology, or product information without express written authorization</li>
                </ul>

                <p class="fstu-text">
                    Fluidstream grants you a limited, revocable, non-exclusive, non-transferable licence
                    to access and view this Website solely for your own personal or internal business
                    informational purposes. Any unauthorized use immediately and automatically terminates
                    this licence.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 03</span>
                <h2 class="fstu-section-title">No Responsibility for Decisions Based on Website Data</h2>

                <div class="fstu-box fstu-box-dark">
                    ALL CONTENT, TECHNICAL DATA, ANALYSIS, PRODUCT INFORMATION, CASE STUDIES, AND ANY
                    OTHER MATERIALS PUBLISHED ON THIS WEBSITE ARE PROVIDED FOR GENERAL INFORMATIONAL
                    PURPOSES ONLY. FLUIDSTREAM INC. IS NOT RESPONSIBLE — AND EXPRESSLY DISCLAIMS ALL
                    LIABILITY — FOR ANY OPERATIONAL, ENGINEERING, FINANCIAL, REGULATORY, OR ANY OTHER
                    DECISION MADE BY ANY USER IN RELIANCE ON ANY DATA, CONTENT, OR INFORMATION FOUND
                    ON THIS WEBSITE.
                </div>

                <p class="fstu-text">
                    Nothing on this Website constitutes or should be construed as professional advice of
                    any kind. Website Content is illustrative and general in nature and does not account
                    for the specific conditions, parameters, regulatory environment, or risk profile of
                    any individual project, application, or use case.
                </p>

                <ul class="fstu-list">
                    <li class="fstu-list-item">Any technical data, performance figures, or case study results published on
                        this Website reflect specific historical conditions and are not a guarantee of future performance in
                        any other application</li>
                    <li class="fstu-list-item">Any reference to estimated performance improvements, operational gains, or
                        cost savings is illustrative only and does not represent a warranty or commitment of any kind</li>
                    <li class="fstu-list-item">You are solely responsible for independently verifying all information
                        obtained from this Website before making any operational, engineering, commercial, or regulatory
                        decision</li>
                    <li class="fstu-list-item">Fluidstream strongly recommends that users engage qualified professionals
                        before implementing any solution or making any decision based on information found on this Website
                    </li>
                </ul>

                <p class="fstu-text">
                    No professional relationship of any kind is created by your use of this Website or any
                    communication through it.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 04</span>
                <h2 class="fstu-section-title">Technical Data Submitted by Users</h2>
                <p class="fstu-text">
                    Fluidstream's services may involve clients voluntarily submitting technical data —
                    including but not limited to operational data, process parameters, equipment
                    specifications, fluid or system characteristics, and related project information
                    (<strong>"Client Technical Data"</strong>) — through this Website or associated
                    communication channels, for the purpose of receiving analysis, recommendations, or
                    solutions from Fluidstream.
                </p>
                <p class="fstu-text">By submitting Client Technical Data, you acknowledge and agree that:</p>

                <ul class="fstu-list">
                    <li class="fstu-list-item">You have the authority and all necessary rights to disclose the Client
                        Technical Data to Fluidstream</li>
                    <li class="fstu-list-item">Fluidstream may use Client Technical Data solely for the purpose of providing
                        the requested analysis, evaluation, or solution to you</li>
                    <li class="fstu-list-item">Fluidstream will handle Client Technical Data in accordance with our <a
                            href="/privacy-policy">Privacy Policy</a> and applicable confidentiality obligations</li>
                    <li class="fstu-list-item">Fluidstream is not liable for any decisions made based on any analysis,
                        recommendation, or output produced from Client Technical Data — all such outputs are provided as
                        guidance only</li>
                    <li class="fstu-list-item">The accuracy of any analysis is entirely dependent on the accuracy and
                        completeness of the data provided; Fluidstream disclaims all liability for results based on
                        incomplete, inaccurate, or erroneous data submitted by the client</li>
                    <li class="fstu-list-item">Fluidstream does not guarantee any specific outcome or result from any
                        analysis or recommendation provided</li>
                </ul>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 05</span>
                <h2 class="fstu-section-title">Disclaimer of Warranties</h2>
                <p class="fstu-text">
                    This Website and all Content are provided on an <strong>"as is"</strong> and
                    <strong>"as available"</strong> basis, without warranties of any kind, express or implied,
                    including but not limited to warranties of merchantability, fitness for a particular
                    purpose, accuracy, completeness, reliability, or non-infringement. Fluidstream does not
                    warrant that the Website will be available at all times, error-free, or free of harmful
                    components.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 06</span>
                <h2 class="fstu-section-title">Limitation of Liability</h2>
                <p class="fstu-text">
                    To the maximum extent permitted by Alberta and Canadian law, Fluidstream Inc. and its
                    directors, officers, employees, contractors, and agents shall not be liable for any
                    direct, indirect, incidental, special, consequential, or punitive damages arising out of
                    or in connection with:
                </p>

                <ul class="fstu-list">
                    <li class="fstu-list-item">Your access to or use of this Website or any Content</li>
                    <li class="fstu-list-item">Any decision made in reliance on any data, analysis, or content found on this
                        Website</li>
                    <li class="fstu-list-item">Any analysis or recommendation produced from Client Technical Data submitted
                        through this Website</li>
                    <li class="fstu-list-item">Any errors, omissions, or inaccuracies in any Content or analysis output</li>
                    <li class="fstu-list-item">Any interruption, unavailability, or security breach affecting this Website
                    </li>
                </ul>

                <div class="fstu-box fstu-box-blue">
                    Where liability cannot be fully excluded by law, Fluidstream's total aggregate liability
                    shall not exceed <strong>CAD $100.00</strong>.
                </div>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 07</span>
                <h2 class="fstu-section-title">Indemnification</h2>
                <p class="fstu-text">
                    You agree to indemnify, defend, and hold harmless Fluidstream Inc. and its directors,
                    officers, employees, contractors, and agents from and against any and all claims,
                    liabilities, damages, losses, and expenses (including reasonable legal fees) arising out
                    of or related to: your use of this Website; any decision made based on Content or
                    analysis found hereon; your violation of these Terms; or your violation of any
                    applicable law or third-party right.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 08</span>
                <h2 class="fstu-section-title">Prohibited Uses</h2>
                <p class="fstu-text">
                    You agree not to use this Website for any unlawful purpose; to transmit malicious code
                    or harmful content; to attempt unauthorized access to any Fluidstream system or database;
                    to collect personal information of other users; to impersonate Fluidstream or its
                    personnel; or to use any Content for competitive intelligence or unauthorized commercial
                    purposes.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 09</span>
                <h2 class="fstu-section-title">Third-Party Links</h2>
                <p class="fstu-text">
                    This Website may contain links to third-party websites for convenience only. Fluidstream
                    has no control over and accepts no responsibility for the content or practices of any
                    third-party site. Inclusion of any link does not constitute endorsement by Fluidstream.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 10</span>
                <h2 class="fstu-section-title">International Users</h2>
                <p class="fstu-text">
                    This Website is operated from Calgary, Alberta, Canada. If you access it from outside
                    Canada, you do so at your own risk and are solely responsible for compliance with all
                    local laws applicable in your jurisdiction. By accessing this Website from outside
                    Canada, you expressly consent to the exclusive application of the laws of Alberta and
                    Canada, and irrevocably submit to the exclusive jurisdiction of the courts of Alberta.
                    Any claim arising from your use of this Website must be brought within
                    <strong>one (1) year</strong> of the relevant event, or be forever barred.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 11</span>
                <h2 class="fstu-section-title">Governing Law</h2>
                <p class="fstu-text">
                    These Terms are governed exclusively by the laws of the Province of
                    <strong>Alberta</strong> and the federal laws of <strong>Canada</strong> applicable
                    therein. Any dispute shall be resolved exclusively in the courts of Alberta, Canada.
                </p>
            </section>

            <section class="fstu-section">
                <span class="fstu-sec-label">Section 12</span>
                <h2 class="fstu-section-title">Contact</h2>
                <p class="fstu-text">
                    For questions regarding these Terms, please visit our <a href="/contact">Contact Us</a>
                    page. For privacy matters, see our <a href="/privacy-policy">Privacy Policy</a>.
                </p>
            </section>

        </div>

    </div>
@endsection