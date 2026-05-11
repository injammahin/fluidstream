<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Technical Review Request</title>
</head>

<body style="margin:0; padding:0; background:#f4f6f9; font-family:Arial, Helvetica, sans-serif; color:#07111f;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9; padding:30px 12px;">
        <tr>
            <td align="center">
                <table width="760" cellpadding="0" cellspacing="0"
                    style="max-width:760px; width:100%; background:#ffffff; border-radius:18px; overflow:hidden; border:1px solid #dfe5ef; box-shadow:0 18px 45px rgba(7,17,31,.10);">
                    <tr>
                        <td style="background:#0018dc; padding:32px 34px;">
                            <p
                                style="margin:0 0 8px; color:#15d1ff; font-size:12px; font-weight:800; letter-spacing:.14em; text-transform:uppercase;">
                                Fluidstream Technical Review
                            </p>

                            <h1
                                style="margin:0; color:#ffffff; font-size:30px; line-height:1.15; letter-spacing:-.03em;">
                                New Technical Review Request
                            </h1>

                            <p style="margin:12px 0 0; color:#d9e5ff; font-size:15px; line-height:1.6;">
                                A visitor submitted operating data for technical application review.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 34px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                                <tr>
                                    <td
                                        style="background:#f7f9ff; border:1px solid #cbd7ff; border-radius:16px; padding:18px 20px;">
                                        <p
                                            style="margin:0; color:#0018dc; font-size:12px; font-weight:900; text-transform:uppercase; letter-spacing:.12em;">
                                            Submitted At
                                        </p>
                                        <p style="margin:8px 0 0; color:#07111f; font-size:16px; font-weight:800;">
                                            {{ $payload['submitted_at'] }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <h2 style="margin:0 0 14px; color:#07111f; font-size:22px;">Contact Information</h2>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="border-collapse:collapse; margin-bottom:28px;">
                                <tr>
                                    <td
                                        style="width:35%; padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Name</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['contact']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Company</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['contact']['company'] ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Email</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        <a href="mailto:{{ $payload['contact']['email'] }}"
                                            style="color:#0018dc; font-weight:800;">
                                            {{ $payload['contact']['email'] }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Phone</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['contact']['phone'] ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Country / Region</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['contact']['country'] ?: 'Not provided' }}</td>
                                </tr>
                            </table>

                            <h2 style="margin:0 0 14px; color:#07111f; font-size:22px;">Technical Application Data</h2>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="border-collapse:collapse; margin-bottom:28px;">
                                <tr>
                                    <td
                                        style="width:35%; padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Application Type</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['type'] ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Suction Pressure</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['suction_pressure'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Discharge Pressure</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['discharge_pressure'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Estimated Gas Rate</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['gas_rate'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Estimated Total Liquid Rate</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['liquid_rate'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        H₂S Content</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['h2s_content'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Sand or Solids Present</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['sand_or_solids'] }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Operating Temperature / Winter Conditions</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['temperature'] ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        Existing Equipment</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['application']['equipment'] ?: 'Not provided' }}</td>
                                </tr>
                            </table>

                            <h2 style="margin:0 0 14px; color:#07111f; font-size:22px;">Application / Problem
                                Description</h2>

                            <div
                                style="border:1px solid #dfe5ef; background:#f8fafc; border-radius:16px; padding:18px 20px; margin-bottom:26px;">
                                <p
                                    style="margin:0; color:#344154; font-size:15px; line-height:1.75; white-space:pre-line;">
                                    {{ $payload['application']['notes'] ?: 'Not provided' }}</p>
                            </div>

                            <h2 style="margin:0 0 14px; color:#07111f; font-size:22px;">Acknowledgement</h2>

                            <div
                                style="border:1px solid #cbd7ff; background:#f7f9ff; border-radius:16px; padding:18px 20px; margin-bottom:26px;">
                                <p style="margin:0 0 8px; color:#0018dc; font-size:15px; font-weight:900;">
                                    {{ $payload['acknowledgement']['accepted'] }}
                                </p>
                                <p style="margin:0; color:#344154; font-size:14px; line-height:1.7;">
                                    {{ $payload['acknowledgement']['statement'] }}
                                </p>
                            </div>

                            <h2 style="margin:0 0 14px; color:#07111f; font-size:22px;">Submission Metadata</h2>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td
                                        style="width:35%; padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        IP Address</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2;">
                                        {{ $payload['ip_address'] ?: 'Not available' }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding:13px 14px; background:#f8fafc; border:1px solid #e5eaf2; font-weight:800;">
                                        User Agent</td>
                                    <td style="padding:13px 14px; border:1px solid #e5eaf2; word-break:break-word;">
                                        {{ $payload['user_agent'] ?: 'Not available' }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="background:#071327; padding:18px 34px;">
                            <p style="margin:0; color:#cbd5e1; font-size:13px; line-height:1.6;">
                                This email was generated from the Fluidstream Technical Review form.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>