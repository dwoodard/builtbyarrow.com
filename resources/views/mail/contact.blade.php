<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #E6E3DC;
            line-height: 1.6;
            color: #434341;
        }
        .wrapper {
            background-color: #E6E3DC;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #D8C9A8;
        }
        .header {
            background: linear-gradient(135deg, #2D2D2A 0%, #434341 100%);
            color: #E6E3DC;
            padding: 40px 30px;
            border-bottom: 3px solid #D8C9A8;
        }
        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            font-family: 'Cormorant Garamond', Georgia, serif;
            letter-spacing: 0.03em;
        }
        .header-subtitle {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: #D8C9A8;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 24px;
            color: #2D2D2A;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
        }
        .intro-text {
            font-size: 14px;
            color: #54504A;
            margin-bottom: 30px;
            line-height: 1.8;
        }
        .info-block {
            background-color: #f9f7f4;
            border-left: 4px solid #D8C9A8;
            padding: 20px;
            margin-bottom: 20px;
        }
        .info-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #54504A;
            font-weight: 700;
            display: block;
            margin-bottom: 6px;
        }
        .info-value {
            font-size: 15px;
            color: #2D2D2A;
            font-weight: 500;
        }
        .info-value.phone {
            font-size: 16px;
            letter-spacing: 0.02em;
        }
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #D8C9A8, transparent);
            margin: 30px 0;
        }
        .action-section {
            background-color: #f9f7f4;
            padding: 25px 30px;
            text-align: center;
            margin-top: 30px;
        }
        .action-text {
            font-size: 14px;
            color: #54504A;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        .footer {
            background-color: #2D2D2A;
            color: #E6E3DC;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #D8C9A8;
        }
        .footer-brand {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 0.03em;
            margin-bottom: 8px;
        }
        .footer-tagline {
            font-size: 12px;
            color: #B8B2A5;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .footer-contact {
            font-size: 11px;
            color: #B8B2A5;
            padding-top: 20px;
            border-top: 1px solid #54504A;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <!-- Header -->
            <div class="header">
                <h1>Arrow</h1>
                <div class="header-subtitle">Construction</div>
            </div>

            <!-- Content -->
            <div class="content">
                <h2 class="greeting">New Consultation Request</h2>

                <p class="intro-text">
                    Thank you for your interest in Arrow Construction. We've received your consultation request and will review your details shortly. Our team will reach out to schedule a call at your preferred time.
                </p>

                <!-- Information Blocks -->
                <div class="info-block">
                    <span class="info-label">Name</span>
                    <div class="info-value">{{ $data['name'] }}</div>
                </div>

                <div class="info-block">
                    <span class="info-label">Phone Number</span>
                    <div class="info-value phone"><a href="tel:{{ preg_replace('/[^0-9+]/', '', $data['phone']) }}" style="color: #2D2D2A; text-decoration: none;">{{ $data['phone'] }}</a></div>
                </div>

                <div class="info-block">
                    <span class="info-label">Preferred Days</span>
                    <div class="info-value">{{ implode(', ', array_map('ucfirst', $data['preferred_days'] ?? [])) ?: 'Not specified' }}</div>
                </div>

                <div class="info-block">
                    <span class="info-label">Best Time of Day</span>
                    <div class="info-value">{{ ucfirst($data['best_time'] ?? 'Not specified') }}</div>
                </div>

                @if(!empty($data['details']))
                    <div class="info-block">
                        <span class="info-label">Project Details</span>
                        <div class="info-value" style="white-space: pre-wrap; word-wrap: break-word;">{{ $data['details'] }}</div>
                    </div>
                @endif

                <div class="divider"></div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-brand">Arrow Construction</div>
                <div class="footer-tagline">
                    Fine Homes & Renovations<br>
                    Crafted with meticulous attention to detail
                </div>
                <div class="footer-contact">
                    hello@builtbyarrow.com<br>
                    Utah • Park City • Salt Lake City
                </div>
            </div>
        </div>
    </div>
</body>
</html>