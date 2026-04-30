<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>New Renovation Inquiry — Built By Arrow</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style type="text/css">
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; outline: none; text-decoration: none; }
        body { margin: 0 !important; padding: 0 !important; background-color: #f5f4f2; }
        a { color: #c8922a; }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f5f4f2;">

<table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f5f4f2;">
    <tr>
        <td align="center" style="padding:40px 16px;">

            <!-- Wrapper -->
            <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="max-width:600px;width:100%;background-color:#ffffff;">

                <!-- ── Header ── -->
                <tr>
                    <td align="center" style="background-color:#0c0a09;padding:36px 40px 28px;border-bottom:2px solid #c8922a;">
                        <!-- Logo mark -->
                        <table role="presentation" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="middle" style="padding-right:8px;">
                                    <img src="{{ asset('UPDATE.png') }}" alt="Built By Arrow" width="32" height="32" style="display:block;width:32px;height:32px;object-fit:contain;" />
                                </td>
                                <td valign="middle">
                                    <span style="font-family:Georgia,'Times New Roman',serif;font-size:22px;font-weight:600;color:#ffffff;letter-spacing:1px;">Built By Arrow</span>
                                </td>
                            </tr>
                        </table>


                        <p style="margin:8px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:3px;text-transform:uppercase;color:#c8922a;">Luxury Renovations &amp; Custom Remodeling</p>
                    </td>
                </tr>

                <!-- ── Alert bar ── -->
                <tr>
                    <td align="center" style="background-color:#c8922a;padding:14px 40px;">
                        <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:3px;text-transform:uppercase;color:#ffffff;font-weight:700;">New Project Inquiry Received</p>
                    </td>
                </tr>

                <!-- ── Gold rule ── -->
                <tr>
                    <td style="background-color:#c8922a;height:1px;line-height:1px;font-size:1px;">&nbsp;</td>
                </tr>

                <!-- ── Intro ── -->
                <tr>
                    <td style="padding:36px 40px 24px;">
                        <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:1.7;color:#44403c;">
                            You have a new renovation inquiry from <strong style="color:#1c1917;">{{ $data['first_name'] }} {{ $data['last_name'] }}</strong>. Reply directly to this email to reach them.
                        </p>
                    </td>
                </tr>

                <!-- ── Detail rows ── -->
                <tr>
                    <td style="padding:0 40px 8px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-top:1px solid #e7e5e4;">

                            <tr>
                                <td style="padding:12px 0;border-bottom:1px solid #e7e5e4;vertical-align:top;width:38%;">
                                    <span style="font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#a8a29e;font-weight:700;">Name</span>
                                </td>
                                <td style="padding:12px 0 12px 16px;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#1c1917;font-weight:600;">{{ $data['first_name'] }} {{ $data['last_name'] }}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px 0;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <span style="font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#a8a29e;font-weight:700;">Phone</span>
                                </td>
                                <td style="padding:12px 0 12px 16px;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <a href="tel:{{ $data['phone'] }}" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#c8922a;text-decoration:none;font-weight:600;">{{ $data['phone'] }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px 0;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <span style="font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#a8a29e;font-weight:700;">Email</span>
                                </td>
                                <td style="padding:12px 0 12px 16px;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <a href="mailto:{{ $data['email'] }}" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#c8922a;text-decoration:none;font-weight:600;">{{ $data['email'] }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px 0;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <span style="font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#a8a29e;font-weight:700;">Project Type</span>
                                </td>
                                <td style="padding:12px 0 12px 16px;border-bottom:1px solid #e7e5e4;vertical-align:top;">
                                    <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#1c1917;font-weight:600;">{{ $data['project_type'] }}</span>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>

                @if($data['description'])
                <!-- ── Description ── -->
                <tr>
                    <td style="padding:8px 40px 24px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="border-left:3px solid #c8922a;background-color:#f5f4f2;padding:16px 20px;">
                                    <p style="margin:0 0 8px;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#a8a29e;font-weight:700;">Project Description</p>
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:1.7;color:#44403c;">{{ $data['description'] }}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif

                <!-- ── CTA button ── -->
                <tr>
                    <td align="center" style="padding:8px 40px 32px;">
                        <table role="presentation" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" style="background-color:#0c0a09;">
                                    <a href="mailto:{{ $data['email'] }}" style="display:inline-block;background-color:#0c0a09;color:#ffffff;text-decoration:none;font-family:Arial,Helvetica,sans-serif;font-size:11px;letter-spacing:3px;text-transform:uppercase;font-weight:700;padding:14px 32px;">Reply to {{ $data['first_name'] }} &rarr;</a>
                                </td>
                            </tr>
                        </table>
                        <p style="margin:18px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#a8a29e;line-height:1.6;text-align:center;">
                            Sent via the contact form at builtbyarrow.com.<br />
                            Reply to this email to respond directly to {{ $data['first_name'] }}.
                        </p>
                    </td>
                </tr>

                <!-- ── Gold rule ── -->
                <tr>
                    <td style="background-color:#c8922a;height:1px;line-height:1px;font-size:1px;">&nbsp;</td>
                </tr>

                <!-- ── Footer ── -->
                <tr>
                    <td align="center" style="background-color:#0c0a09;padding:28px 40px;">
                        <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#78716c;">
                            <a href="tel:+12088608898" style="color:#c8922a;text-decoration:none;">(208) 860-8898</a>
                            &nbsp;&middot;&nbsp;
                            <a href="mailto:renny@builtbyarrow.com" style="color:#c8922a;text-decoration:none;">renny@builtbyarrow.com</a>
                        </p>
                        <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#57534e;">SLC &middot; Sugar  &middot; Eagle &middot; Nampa &middot; Star &middot; Kuna</p>
                        <p style="margin:12px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#44403c;">SLC</p>
                    </td>
                </tr>

            </table>
            <!-- /Wrapper -->

        </td>
    </tr>
</table>

</body>
</html>
