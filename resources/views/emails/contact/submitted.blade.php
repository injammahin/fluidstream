<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Request</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f8fafc; padding:30px; color:#0f172a;">
    <div
        style="max-width:700px; margin:0 auto; background:#ffffff; border:1px solid #e2e8f0; border-radius:16px; overflow:hidden;">
        <div style="background:#0f172a; color:#ffffff; padding:24px 30px;">
            <h1 style="margin:0; font-size:24px;">New Contact Request</h1>
        </div>

        <div style="padding:30px;">
            <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                    <td style="font-weight:bold; width:180px;">Name</td>
                    <td>{{ trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? '')) ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Email</td>
                    <td>{{ $data['email'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Phone</td>
                    <td>{{ $data['phone'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Company</td>
                    <td>{{ $data['company'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">City</td>
                    <td>{{ $data['city'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Country</td>
                    <td>{{ $data['country'] ?? 'N/A' }}</td>
                </tr>
            </table>

            <div style="margin-top:24px;">
                <h2 style="font-size:18px; margin-bottom:10px;">Message</h2>
                <div
                    style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:18px; line-height:1.7;">
                    {{ $data['message'] ?? '' }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>