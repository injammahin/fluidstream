<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Request</title>
</head>

<body style="margin:0; padding:30px; background:#f8fafc; font-family:Arial, Helvetica, sans-serif; color:#0f172a;">
    <div
        style="max-width:720px; margin:0 auto; background:#ffffff; border:1px solid #e2e8f0; border-radius:18px; overflow:hidden;">
        <div style="background:#0f172a; color:#ffffff; padding:24px 30px;">
            <h1 style="margin:0; font-size:26px; line-height:1.3;">New Contact Request</h1>
            <p style="margin:8px 0 0; color:#cbd5e1; font-size:14px;">Submitted from your website contact form</p>
        </div>

        <div style="padding:30px;">
            <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                    <td style="font-weight:bold; width:180px; color:#334155;">Name</td>
                    <td>{{ trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? '')) ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold; color:#334155;">Email</td>
                    <td>{{ $data['email'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold; color:#334155;">Phone</td>
                    <td>{{ $data['phone'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold; color:#334155;">Company</td>
                    <td>{{ $data['company'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold; color:#334155;">City</td>
                    <td>{{ $data['city'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold; color:#334155;">Country</td>
                    <td>{{ $data['country'] ?? 'N/A' }}</td>
                </tr>
            </table>

            <div style="margin-top:24px;">
                <h2 style="font-size:18px; margin:0 0 12px; color:#0f172a;">Message</h2>
                <div
                    style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; padding:18px; line-height:1.7; color:#334155;">
                    {{ $data['message'] ?? '' }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>