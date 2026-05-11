<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $payload['is_technical_review'] ? 'Technical Review Request' : 'Contact Inquiry' }}</title>
</head>

<body style="margin:0; padding:0; background:#eef2f7; font-family:Arial, Helvetica, sans-serif; color:#07111f;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#eef2f7; padding:28px 12px;">
        <tr>
            <td align="center">

                <table width="720" cellpadding="0" cellspacing="0"
                    style="max-width:720px; width:100%; background:#ffffff; border-radius:18px; overflow:hidden; border:1px solid #dfe5ef;">

                    {{-- Header --}}
                    <tr>
                        <td style="background:#0018dc; padding:30px 32px;">
                            <p style="margin:0 0 8px; color:#15d1ff; font-size:12px; font-weight:800; letter-spacing:.14em; text-transform:uppercase;">
                                Fluidstream
                            </p>

                            <h1 style="margin:0; color:#ffffff; font-size:28px; line-height:1.2; font-weight:800;">
                                {{ $payload['is_technical_review'] ? 'New Technical Review Request' : 'New Contact Inquiry' }}
                            </h1>

                            <p style="margin:12px 0 0; color:#dbeafe; font-size:15px; line-height:1.6;">
                                A new submission has been received from the Fluidstream website.
                            </p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:30px 32px;">

                            {{-- Submitted Time --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                                <tr>
                                    <td style="background:#f7f9ff; border-left:4px solid #0018dc; border-radius:12px; padding:16px 18px;">
                                        <p style="margin:0; color:#64748b; font-size:13px; font-weight:700;">
                                            Submitted At
                                        </p>
                                        <p style="margin:6px 0 0; color:#07111f; font-size:16px; font-weight:800;">
                                            {{ $payload['submitted_at'] }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Contact Information --}}
                            <h2 style="margin:0 0 14px; color:#07111f; font-size:20px; line-height:1.3;">
                                Contact Information
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="border-collapse:separate; border-spacing:0; margin-bottom:26px; border:1px solid #e5eaf2; border-radius:14px; overflow:hidden;">

                                <tr>
                                    <td style="width:34%; padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                        Name
                                    </td>
                                    <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                        {{ data_get($payload, 'contact.name') ?: 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                        Company
                                    </td>
                                    <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                        {{ data_get($payload, 'contact.company') ?: 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                        Email
                                    </td>
                                    <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2;">
                                        <a href="mailto:{{ data_get($payload, 'contact.email') }}" style="color:#0018dc; font-weight:800; text-decoration:none;">
                                            {{ data_get($payload, 'contact.email') ?: 'Not provided' }}
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                        Phone
                                    </td>
                                    <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                        {{ data_get($payload, 'contact.phone') ?: 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                        City
                                    </td>
                                    <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                        {{ data_get($payload, 'contact.city') ?: 'Not provided' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:13px 15px; background:#f8fafc; font-weight:800; color:#334155;">
                                        Country / Region
                                    </td>
                                    <td style="padding:13px 15px; color:#07111f;">
                                        {{ data_get($payload, 'contact.country') ?: 'Not provided' }}
                                    </td>
                                </tr>
                            </table>

                            {{-- Inquiry Information --}}
                            <h2 style="margin:0 0 14px; color:#07111f; font-size:20px; line-height:1.3;">
                                Inquiry Information
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="border-collapse:separate; border-spacing:0; margin-bottom:26px; border:1px solid #e5eaf2; border-radius:14px; overflow:hidden;">
                                <tr>
                                    <td style="width:34%; padding:13px 15px; background:#f8fafc; font-weight:800; color:#334155;">
                                        Inquiry Type
                                    </td>
                                    <td style="padding:13px 15px; color:#07111f;">
                                        {{ data_get($payload, 'inquiry.type') ?: 'Not provided' }}
                                    </td>
                                </tr>
                            </table>

                            {{-- General Contact Message --}}
                            @if(!$payload['is_technical_review'])
                                <h2 style="margin:0 0 14px; color:#07111f; font-size:20px; line-height:1.3;">
                                    Message
                                </h2>

                                <div style="border:1px solid #e5eaf2; background:#f8fafc; border-radius:14px; padding:18px 20px; margin-bottom:6px;">
                                    <p style="margin:0; color:#334155; font-size:15px; line-height:1.75; white-space:pre-line;">
                                        {{ data_get($payload, 'inquiry.message') ?: 'Not provided' }}
                                    </p>
                                </div>
                            @endif

                            {{-- Technical Review Information --}}
                            @if($payload['is_technical_review'])
                                <h2 style="margin:0 0 14px; color:#07111f; font-size:20px; line-height:1.3;">
                                    Technical Application Data
                                </h2>

                                <table width="100%" cellpadding="0" cellspacing="0"
                                    style="border-collapse:separate; border-spacing:0; margin-bottom:26px; border:1px solid #e5eaf2; border-radius:14px; overflow:hidden;">

                                    <tr>
                                        <td style="width:40%; padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Application Type
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.application_type') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Suction Pressure
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.suction_pressure') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Discharge Pressure
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.discharge_pressure') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Estimated Gas Rate
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.gas_rate') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Estimated Total Liquid Rate
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.liquid_rate') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            H₂S Content
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.h2s_content') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Sand or Solids Present
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.sand_or_solids') ?: 'No' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; border-bottom:1px solid #e5eaf2; font-weight:800; color:#334155;">
                                            Operating Temperature
                                        </td>
                                        <td style="padding:13px 15px; border-bottom:1px solid #e5eaf2; color:#07111f;">
                                            {{ data_get($payload, 'technical.temperature') ?: 'Not provided' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:13px 15px; background:#f8fafc; font-weight:800; color:#334155;">
                                            Existing Equipment
                                        </td>
                                        <td style="padding:13px 15px; color:#07111f;">
                                            {{ data_get($payload, 'technical.equipment') ?: 'Not provided' }}
                                        </td>
                                    </tr>
                                </table>

                                <h2 style="margin:0 0 14px; color:#07111f; font-size:20px; line-height:1.3;">
                                    Application / Problem Description
                                </h2>

                                <div style="border:1px solid #e5eaf2; background:#f8fafc; border-radius:14px; padding:18px 20px; margin-bottom:6px;">
                                    <p style="margin:0; color:#334155; font-size:15px; line-height:1.75; white-space:pre-line;">
                                        {{ data_get($payload, 'technical.notes') ?: 'Not provided' }}
                                    </p>
                                </div>
                            @endif

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background:#071327; padding:18px 32px; text-align:center;">
                            <p style="margin:0; color:#cbd5e1; font-size:13px; line-height:1.6;">
                                This email was generated from the Fluidstream website contact form.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
</body>
</html>