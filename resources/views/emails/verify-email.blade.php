<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Code OTP</title>
</head>
<body style="margin:0; padding:0; background-color:#e6ecfa; font-family: ui-sans-serif, system-ui, -apple-system;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center" style="padding-bottom:20px;">
                <h1 style="margin:0; font-size:26px; font-weight:700; color:#1077b2;">
                    Flex-<span style="color:#ff9900;">paie</span>
                </h1>
                {{-- <img src="{{ URL::asset('images/logo.png') }}" alt="Power HR Logo" style="width:120px; height:auto;"> --}}
            </td>
        </tr>

        <tr>

            <td align="center">

                <!-- Card -->
                <table width="100%" cellpadding="0" cellspacing="0" style="width: 600px; background:#ffffff; border-radius:12px; padding:32px; box-shadow:0 10px 25px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="padding-bottom:20px;">
                            <h3 style="margin:0; font-size: 20px; color:#111827;">
                                Code de vérification à usage unique
                            </h3>
                        </td>
                    </tr>

                    <!-- Greeting -->
                    <tr>
                        <td align="center" style="font-size:16px; color:#374151; padding-bottom:10px;">
                            Bonjour <span style="font-weight:600;">{{ $user['name'] ?? 'Utilisateur' }}</span>,
                        </td>
                    </tr>

                    <!-- Text -->
                    <tr>
                        <td align="center" style="font-size:14px; color:#6b7280; line-height:1.6;">
                            Pour finaliser la création de votre compte a la plateforme, saisissez le code ci-dessous. <br>
                            <span style="color: #ff2f2f">Ce code est valide pendant 15 minutes.</span>
                        </td>
                    </tr>

                    <!-- OTP -->
                    <tr>
                        <td align="center" style="padding:30px 0;">
                            <div style="
                                display:inline-block;
                                background:#f2f8fd;
                                border:2px dashed #d1d5db;
                                padding:16px 28px;
                                font-size:30px;
                                font-weight:700;
                                letter-spacing:10px;
                                color:#111827;
                                border-radius:10px;
                            ">
                                {{ $otp ?? '000000' }}
                            </div>
                        </td>
                    </tr>

                    <!-- Info -->
                    <tr>
                        <td align="center" style="font-size:13px; color:#9ca3af; line-height:1.5;">
                            Si vous n'êtes pas à l'origine de cette demande, ignorez simplement cet email.
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>
</html>
