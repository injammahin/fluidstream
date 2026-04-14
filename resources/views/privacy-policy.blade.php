@extends('layouts.app')

@section('content')
    <style>
        :root {
            --fspv-blue: #1028ea;
            --fspv-blue-dark: #0b1fb8;
            --fspv-navy: #1a2332;
            --fspv-navy-dark: #111827;
            --fspv-white: #ffffff;
            --fspv-body-bg: #ffffff;
            --fspv-section-bg: #f8faff;
            --fspv-border: #dbe4ff;
            --fspv-text-dark: #1a2332;
            --fspv-text-body: #3d4f63;
            --fspv-text-muted: #6b7f96;
            --fspv-font: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .fspv-privacy-page,
        .fspv-privacy-page * {
            box-sizing: border-box;
        }

        .fspv-privacy-page {
            background: var(--fspv-body-bg);
            font-family: var(--fspv-font);
            color: var(--fspv-text-body);
        }

        .fspv-privacy-page a {
            color: var(--fspv-blue);
            text-decoration: none;
        }

        .fspv-privacy-page a:hover {
            color: var(--fspv-blue-dark);
            text-decoration: underline;
        }

        .fspv-logo-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .fspv-logo-icon {
            width: 36px;
            height: 36px;
            background: var(--fspv-blue);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            color: var(--fspv-white);
            flex-shrink: 0;
        }

        .fspv-logo-name {
            font-size: 17px;
            font-weight: 700;
            color: var(--fspv-white);
            letter-spacing: -0.01em;
        }

        .fspv-nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .fspv-nav-links a {
            color: rgba(255, 255, 255, 0.72);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.18s;
        }

        .fspv-nav-links a:hover {
            color: var(--fspv-white);
        }

        .fspv-nav-links a.fspv-here {
            color: var(--fspv-blue);
        }

        /* HERO */
        .fspv-hero {
            background: #1029ea;
            padding: 64px 56px 56px;
            position: relative;
            overflow: hidden;
        }

        .fspv-hero-inner {
            max-width: 880px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .fspv-badges {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .fspv-tag-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgb(187 187 187 / 12%);
            border: 1px solid rgba(16, 40, 234, 0.35);
            color: #ebebeb;
            padding: 4px 14px 4px 10px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .fspv-tag-pill span {
            width: 6px;
            height: 6px;
            background: var(--fspv-blue);
            border-radius: 50%;
            display: inline-block;
        }

        .fspv-badge-compliant {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: var(--fspv-white);
            padding: 4px 14px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .fspv-badge-compliant::before {
            content: '✓';
        }

        .fspv-hero-title {
            font-size: clamp(30px, 4.5vw, 50px);
            font-weight: 700;
            color: var(--fspv-white);
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin: 0 0 16px;
        }

        .fspv-hero-sub {
            color: rgba(255, 255, 255, 0.58);
            font-size: 15px;
            max-width: 540px;
            line-height: 1.7;
            margin: 0 0 36px;
        }

        .fspv-meta-strip {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            padding-top: 28px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .fspv-meta-item {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .fspv-meta-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #fdfdfd;
        }

        .fspv-meta-value {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.62);
            font-weight: 500;
        }

        /* BREADCRUMB */
        .fspv-breadcrumb {
            background: var(--fspv-section-bg);
            border-bottom: 1px solid var(--fspv-border);
            padding: 12px 56px;
        }

        .fspv-breadcrumb-inner {
            max-width: 880px;
            margin: 0 auto;
            font-size: 13px;
            color: var(--fspv-text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .fspv-breadcrumb-inner a {
            color: var(--fspv-text-muted);
            text-decoration: none;
        }

        .fspv-breadcrumb-inner a:hover {
            color: var(--fspv-blue);
        }

        .fspv-breadcrumb-sep {
            color: var(--fspv-border);
        }

        .fspv-breadcrumb-current {
            color: var(--fspv-text-dark);
            font-weight: 500;
        }

        /* MAIN */
        .fspv-page-wrap {
            max-width: 880px;
            margin: 0 auto;
            padding: 60px 56px 96px;
        }

        .fspv-section {
            margin-bottom: 48px;
            padding-bottom: 48px;
            border-bottom: 1px solid var(--fspv-border);
        }

        .fspv-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .fspv-sec-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--fspv-blue);
            display: block;
            margin-bottom: 8px;
        }

        .fspv-section-title {
            font-size: 21px;
            font-weight: 700;
            color: var(--fspv-text-dark);
            letter-spacing: -0.02em;
            line-height: 1.25;
            margin: 0 0 18px;
        }

        .fspv-text {
            color: var(--fspv-text-body);
            margin: 0 0 14px;
            font-size: 15px;
            line-height: 1.8;
        }

        .fspv-text:last-child {
            margin-bottom: 0;
        }

        .fspv-list {
            list-style: none;
            padding: 0;
            margin: 16px 0;
            border: 1px solid var(--fspv-border);
            border-radius: 8px;
            overflow: hidden;
        }

        .fspv-list-item {
            display: block;
            position: relative;
            padding: 12px 16px 12px 32px;
            font-size: 14.5px;
            color: var(--fspv-text-body);
            line-height: 1.7;
            border-bottom: 1px solid var(--fspv-border);
            background: var(--fspv-white);
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .fspv-list-item:last-child {
            border-bottom: none;
        }

        .fspv-list-item:nth-child(even) {
            background: var(--fspv-section-bg);
        }

        .fspv-list-item::before {
            content: '';
            position: absolute;
            left: 14px;
            top: 20px;
            width: 7px;
            height: 7px;
            background: var(--fspv-blue);
            border-radius: 50%;
        }

        .fspv-list-item a {
            display: inline;
        }

        /* TABLE */
        .fspv-tbl-wrap {
            overflow-x: auto;
            margin: 20px 0;
            border-radius: 8px;
            border: 1px solid var(--fspv-border);
        }

        .fspv-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            min-width: 640px;
        }

        .fspv-table-head-row {
            background: #ffffff;
        }

        .fspv-table th {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--fspv-blue);
            padding: 13px 16px;
            text-align: left;
        }

        .fspv-table td {
            padding: 12px 16px;
            border-top: 1px solid var(--fspv-border);
            color: var(--fspv-text-body);
            vertical-align: top;
            line-height: 1.65;
            background: var(--fspv-white);
        }

        .fspv-table tbody tr:nth-child(even) td {
            background: var(--fspv-section-bg);
        }

        /* BOXES */
        .fspv-box {
            background: var(--fspv-section-bg);
            border: 1px solid var(--fspv-border);
            border-left: 4px solid var(--fspv-blue);
            border-radius: 6px;
            padding: 16px 20px;
            margin: 20px 0;
            font-size: 14px;
            color: var(--fspv-text-body);
            line-height: 1.75;
        }

        .fspv-box-info {
            background: rgb(138 140 154 / 8%);
            border-color: rgba(16, 40, 234, 0.14);
            border-left-color: #1029ea;
            color: var(--fspv-text-body);
            font-size: 14px;
        }

        .fspv-box-emphasis {
            background: rgba(17, 24, 39, 0.03);
            border-color: rgba(17, 24, 39, 0.1);
            border-left-color: var(--fspv-navy-dark);
            color: var(--fspv-text-dark);
            font-weight: 600;
            font-size: 13px;
        }

        .fspv-strong {
            color: var(--fspv-text-dark);
            font-weight: 600;
        }

        .fspv-em {
            color: var(--fspv-text-muted);
            font-style: italic;
        }

        /* FOOTER */
        .fspv-footer {
            background: var(--fspv-navy);
        }

        .fspv-footer-top {
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

        .fspv-footer-brand-text {
            color: rgba(255, 255, 255, 0.44);
            font-size: 13px;
            margin-top: 10px;
            max-width: 240px;
            line-height: 1.6;
        }

        .fspv-footer-links {
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }

        .fspv-footer-links a {
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: color 0.18s;
        }

        .fspv-footer-links a:hover {
            color: var(--fspv-blue);
        }

        .fspv-footer-bottom {
            max-width: 880px;
            margin: 0 auto;
            padding: 20px 56px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .fspv-footer-bottom span {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.32);
        }

        /* RESPONSIVE */
        @media (max-width: 680px) {

            .fspv-topbar,
            .fspv-breadcrumb,
            .fspv-hero {
                padding-left: 24px;
                padding-right: 24px;
            }

            .fspv-page-wrap {
                padding: 40px 24px 72px;
            }

            .fspv-footer-top,
            .fspv-footer-bottom {
                padding-left: 24px;
                padding-right: 24px;
            }

            .fspv-nav-links {
                display: none;
            }

            .fspv-meta-strip {
                gap: 24px;
            }

            .fspv-footer-top {
                flex-direction: column;
            }
        }
    </style>

    <div class="fspv-privacy-page">
        <!-- HERO -->
        <div class="fspv-hero">
            <div class="fspv-hero-inner">
                <div class="fspv-badges">
                    <div class="fspv-tag-pill"><span></span>Legal Document</div>
                    <div class="fspv-badge-compliant">PIPEDA &amp; Alberta PIPA Compliant</div>
                </div>

                <h1 class="fspv-hero-title">Privacy Policy</h1>

                <p class="fspv-hero-sub">
                    How Fluidstream Inc. collects, uses, and protects personal information and client
                    technical data submitted through this website.
                </p>

                <div class="fspv-meta-strip">
                    <div class="fspv-meta-item">
                        <span class="fspv-meta-label">Effective Date</span>
                        <span class="fspv-meta-value">January 1, 2026</span>
                    </div>
                    <div class="fspv-meta-item">
                        <span class="fspv-meta-label">Legislation</span>
                        <span class="fspv-meta-value">PIPEDA &amp; Alberta PIPA</span>
                    </div>
                    <div class="fspv-meta-item">
                        <span class="fspv-meta-label">Jurisdiction</span>
                        <span class="fspv-meta-value">Calgary, Alberta, Canada</span>
                    </div>
                    <div class="fspv-meta-item">
                        <span class="fspv-meta-label">Website</span>
                        <span class="fspv-meta-value">www.fluidstream.co</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="fspv-page-wrap">

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 01</span>
                <h2 class="fspv-section-title">Introduction</h2>
                <p class="fspv-text">
                    <span class="fspv-strong">Fluidstream Inc.</span>
                    (<span class="fspv-strong">"Fluidstream"</span>, <span class="fspv-strong">"we"</span>,
                    <span class="fspv-strong">"us"</span>) is a corporation incorporated under the laws of Alberta,
                    Canada. This Privacy Policy (<span class="fspv-strong">"Policy"</span>) explains how we collect,
                    use, disclose, and protect personal information and client technical data in connection with this
                    Website at <span class="fspv-strong">www.fluidstream.co</span>
                    (the <span class="fspv-strong">"Website"</span>).
                </p>
                <p class="fspv-text">
                    We are committed to compliance with the
                    <span class="fspv-em">Personal Information Protection and Electronic Documents Act</span> (PIPEDA)
                    and the Alberta <span class="fspv-em">Personal Information Protection Act</span> (PIPA), and to
                    handling all information entrusted to us with care and transparency.
                </p>
                <div class="fspv-box fspv-box-info">
                    By using this Website or submitting any information to Fluidstream through it, you consent to the
                    collection, use, and disclosure of your information as described in this Policy. If you do not
                    agree, please discontinue use of the Website immediately.
                </div>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 02</span>
                <h2 class="fspv-section-title">Information We Collect</h2>
                <p class="fspv-text"><span class="fspv-strong">A. Personal Information</span></p>
                <p class="fspv-text">Personal information collected when you interact with this Website may include:</p>

                <ul class="fspv-list">
                    <li class="fspv-list-item">Your name and business email address, submitted voluntarily through contact
                        or inquiry forms</li>
                    <li class="fspv-list-item">Your company name, job title, and general geographic location</li>
                    <li class="fspv-list-item">Communications and correspondence sent to us through the Website</li>
                    <li class="fspv-list-item">Technical data automatically collected by the Website (see Section 03 —
                        Cookies)</li>
                </ul>

                <p class="fspv-text" style="margin-top:20px;"><span class="fspv-strong">B. Client Technical Data</span></p>
                <p class="fspv-text">
                    As part of Fluidstream's service delivery, clients and prospective clients may voluntarily submit
                    technical and operational data (<span class="fspv-strong">"Client Technical Data"</span>) through
                    this Website or through channels linked to it, for the purpose of receiving analysis, evaluation,
                    or solutions. Client Technical Data may include operational parameters, process data, system
                    specifications, equipment configurations, performance metrics, and any other technical information
                    submitted to Fluidstream for analysis purposes.
                </p>
                <div class="fspv-box fspv-box-info">
                    Client Technical Data is treated as confidential business information. It will be used exclusively
                    for the purpose of providing the analysis, evaluation, or solution you have requested. It will not
                    be sold, rented, or disclosed to any third party for commercial purposes.
                </div>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 03</span>
                <h2 class="fspv-section-title">Cookies &amp; Tracking Technologies</h2>
                <p class="fspv-text">
                    This Website uses cookies and similar technologies to operate properly and to understand how
                    visitors use our site. Cookies are small text files stored on your device by your browser when you
                    visit a website.
                </p>

                <div class="fspv-tbl-wrap">
                    <table class="fspv-table">
                        <thead>
                            <tr class="fspv-table-head-row">
                                <th>Cookie Type</th>
                                <th>Purpose</th>
                                <th>Can Be Disabled?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="fspv-strong">Strictly Necessary</span></td>
                                <td>Required for the Website to function. No personal data collected beyond what is
                                    technically necessary.</td>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td><span class="fspv-strong">Analytics</span></td>
                                <td>Tracks aggregate visitor behaviour to help us improve the site. Data is anonymized where
                                    possible.</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td><span class="fspv-strong">Functional</span></td>
                                <td>Remembers preferences to improve your experience on return visits.</td>
                                <td>Yes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="fspv-text">
                    We may use Google Analytics or similar third-party analytics tools subject to their own privacy
                    policies. You can opt out of Google Analytics at
                    <span class="fspv-strong">tools.google.com/dlpage/gaoptout</span>.
                </p>
                <p class="fspv-text">
                    You may manage or disable non-essential cookies through your browser settings at any time.
                    Fluidstream is not responsible for any reduced functionality resulting from your choice to restrict
                    cookies.
                </p>
                <div class="fspv-box fspv-box-info">
                    By continuing to use this Website, you consent to the use of cookies as described above.
                </div>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 04</span>
                <h2 class="fspv-section-title">How We Use Information</h2>
                <p class="fspv-text">Fluidstream uses personal information and Client Technical Data for the following
                    purposes only:</p>

                <ul class="fspv-list">
                    <li class="fspv-list-item"><span class="fspv-strong">To respond to inquiries</span> — to reply to
                        questions, requests for information, or service inquiries submitted through the Website</li>
                    <li class="fspv-list-item"><span class="fspv-strong">To provide analysis and solutions</span> — to
                        perform technical analysis, evaluation, and recommendations based on Client Technical Data you
                        submit, solely for the purpose of delivering the service or solution requested</li>
                    <li class="fspv-list-item"><span class="fspv-strong">To operate and improve the Website</span> — using
                        aggregated, anonymized analytics data to understand site usage and make improvements</li>
                    <li class="fspv-list-item"><span class="fspv-strong">To communicate with you</span> — where you have
                        consented, to send relevant updates or service information in compliance with Canada's Anti-Spam
                        Legislation (CASL)</li>
                    <li class="fspv-list-item"><span class="fspv-strong">To comply with legal obligations</span> — where
                        required by applicable Canadian law or regulatory authority</li>
                </ul>

                <div class="fspv-box fspv-box-emphasis">
                    Any analysis, recommendation, or technical output produced by Fluidstream from Client Technical Data
                    is provided as guidance only. Fluidstream is not responsible for any operational, engineering,
                    financial, regulatory, or business decision made by any party in reliance on any such analysis or
                    output. See our <a href="/terms">Terms of Use</a> for the full disclaimer.
                </div>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 05</span>
                <h2 class="fspv-section-title">Disclosure of Information</h2>
                <p class="fspv-text">
                    <span class="fspv-strong">Fluidstream does not sell, rent, or trade your personal information or Client
                        Technical Data to any third party.</span>
                    Disclosure occurs only in the following limited circumstances:
                </p>

                <ul class="fspv-list">
                    <li class="fspv-list-item"><span class="fspv-strong">Service providers</span> — trusted third parties
                        who assist us in operating the Website or delivering our services (such as IT hosting or analytics
                        providers), who are contractually bound to handle information only as directed by Fluidstream and in
                        compliance with applicable privacy law</li>
                    <li class="fspv-list-item"><span class="fspv-strong">Legal obligations</span> — where required by
                        applicable law, court order, or government or regulatory authority</li>
                    <li class="fspv-list-item"><span class="fspv-strong">Business transactions</span> — in connection with a
                        sale, merger, or restructuring of Fluidstream's business, subject to confidentiality obligations
                    </li>
                    <li class="fspv-list-item"><span class="fspv-strong">Protection of rights</span> — where necessary to
                        protect the rights, property, or safety of Fluidstream, its clients, or others</li>
                </ul>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 06</span>
                <h2 class="fspv-section-title">Confidentiality of Client Technical Data</h2>
                <p class="fspv-text">
                    Fluidstream recognizes that Client Technical Data submitted for analysis may be commercially
                    sensitive and proprietary. We treat all Client Technical Data as confidential business information
                    and implement appropriate measures to protect it from unauthorized access, disclosure, or misuse.
                </p>
                <p class="fspv-text">
                    Fluidstream personnel who access Client Technical Data are bound by confidentiality obligations.
                    Client Technical Data will not be used for any purpose beyond the analysis or service for which it
                    was submitted.
                </p>
                <p class="fspv-text">
                    Clients with heightened confidentiality requirements are encouraged to execute a formal
                    non-disclosure agreement with Fluidstream prior to submitting sensitive data.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 07</span>
                <h2 class="fspv-section-title">Data Security &amp; Protection</h2>
                <p class="fspv-text">
                    Fluidstream implements appropriate technical and organizational security measures to protect
                    personal information and Client Technical Data against unauthorized access, loss, disclosure, or
                    misuse. These measures include encryption of data in transit, restricted access controls, and
                    periodic security reviews.
                </p>
                <p class="fspv-text">
                    We also deploy technical protections on this Website to prevent unauthorized copying, scraping, or
                    reverse engineering of our Content and data. Circumvention of these measures is strictly prohibited
                    under Canadian law.
                </p>
                <div class="fspv-box fspv-box-emphasis">
                    While we apply commercially reasonable security measures, no internet transmission or electronic
                    storage system is completely secure. Information you submit through this Website is transmitted at
                    your own risk.
                </div>
                <p class="fspv-text">
                    In the event of a privacy breach creating a real risk of significant harm, Fluidstream will notify
                    affected individuals and report to the Office of the Privacy Commissioner of Canada where required
                    under PIPEDA mandatory breach reporting requirements.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 08</span>
                <h2 class="fspv-section-title">Data Retention</h2>
                <p class="fspv-text">
                    We retain personal information and Client Technical Data only as long as necessary to fulfill the
                    purposes for which it was collected, or as required by applicable law. When information is no
                    longer needed, it is securely destroyed or anonymized. Client Technical Data submitted for a
                    specific project will not be retained beyond the completion of that engagement unless otherwise
                    agreed in writing.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 09</span>
                <h2 class="fspv-section-title">Your Privacy Rights</h2>
                <p class="fspv-text">
                    Subject to applicable legal exceptions, you have the right to request access to personal
                    information we hold about you, request correction of inaccurate or incomplete information, withdraw
                    consent to certain uses of your personal information at any time, and opt out of marketing
                    communications at any time.
                </p>
                <p class="fspv-text">
                    To exercise any of these rights, please visit our <a href="/contact">Contact Us</a> page. We will
                    respond to requests within <span class="fspv-strong">30 days</span> as required under PIPEDA.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 10</span>
                <h2 class="fspv-section-title">International Users</h2>
                <p class="fspv-text">
                    This Website is operated from Calgary, Alberta, Canada. Information you submit may be stored and
                    processed in Canada and is subject to Canadian privacy law. If you access this Website from
                    outside Canada, you consent to the application of Canadian law and, to the extent permitted by
                    applicable law, waive any rights under the privacy laws of your home jurisdiction.
                </p>
                <p class="fspv-text">
                    Some of our third-party service providers may process data outside of Canada. Where this occurs, we
                    take steps to ensure appropriate contractual safeguards are in place consistent with Canadian
                    privacy requirements.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 11</span>
                <h2 class="fspv-section-title">Minors</h2>
                <p class="fspv-text">
                    This Website is intended for business and professional use by individuals 18 years of age or older.
                    We do not knowingly collect personal information from minors. If you believe a minor has submitted
                    information to us, please contact us via our <a href="/contact">Contact Us</a> page and we will
                    promptly delete it.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 12</span>
                <h2 class="fspv-section-title">Changes to This Policy</h2>
                <p class="fspv-text">
                    Fluidstream reserves the right to update this Privacy Policy at any time. Updates are effective
                    immediately upon posting. Continued use of the Website after any update constitutes acceptance of
                    the revised Policy.
                </p>
            </div>

            <div class="fspv-section">
                <span class="fspv-sec-label">Section 13</span>
                <h2 class="fspv-section-title">Contact</h2>
                <p class="fspv-text">
                    For any privacy-related questions, access requests, or concerns, please contact us through our
                    <a href="/contact">Contact Us</a> page. For legal matters relating to your use of this Website,
                    please refer to our <a href="/terms">Terms of Use</a>.
                </p>
            </div>

        </div>
    </div>
@endsection