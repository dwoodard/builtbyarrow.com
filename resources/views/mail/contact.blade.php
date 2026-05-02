<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #E6E3DC; color: #434341;">
    <div style="background-color: #E6E3DC; padding: 40px 20px;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #D8C9A8;">
            <!-- Header -->
            <div style="background-color: #2D2D2A; color: #E6E3DC; padding: 40px 30px; border-bottom: 3px solid #D8C9A8;">
                <h1 style="font-size: 28px; font-weight: 600; margin: 0 0 8px 0; font-family: 'Cormorant Garamond', Georgia, serif; letter-spacing: 0.03em;">Arrow</h1>
                <div style="font-size: 12px; letter-spacing: 0.18em; color: #D8C9A8; font-weight: 600;">CONSTRUCTION</div>
            </div>

            <!-- Content -->
            <div style="padding: 40px 30px;">
                <h2 style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 24px; color: #2D2D2A; margin: 0 0 20px 0;">New Consultation Request</h2>

                <p style="font-size: 14px; color: #54504A; margin: 0 0 30px 0; line-height: 1.8;">
                    Thank you for your interest in Arrow Construction. We've received your consultation request and will review your details shortly. Our team will reach out to schedule a call at your preferred time.
                </p>

                <!-- Information Blocks -->
                <div style="background-color: #f9f7f4; border-left: 4px solid #D8C9A8; padding: 20px; margin-bottom: 20px;">
                    <div style="font-size: 11px; letter-spacing: 0.15em; color: #54504A; font-weight: 700; margin-bottom: 6px;">NAME</div>
                    <div style="font-size: 15px; color: #2D2D2A; font-weight: 500;">{{ $data['name'] }}</div>
                </div>

                <div style="background-color: #f9f7f4; border-left: 4px solid #D8C9A8; padding: 20px; margin-bottom: 20px;">
                    <div style="font-size: 11px; letter-spacing: 0.15em; color: #54504A; font-weight: 700; margin-bottom: 6px;">PHONE NUMBER</div>
                    <div style="font-size: 16px; color: #2D2D2A; font-weight: 500;"><a href="tel:{{ preg_replace('/[^0-9+]/', '', $data['phone']) }}" style="color: #2D2D2A; text-decoration: none;">{{ $data['phone'] }}</a></div>
                </div>

                <div style="background-color: #f9f7f4; border-left: 4px solid #D8C9A8; padding: 20px; margin-bottom: 20px;">
                    <div style="font-size: 11px; letter-spacing: 0.15em; color: #54504A; font-weight: 700; margin-bottom: 6px;">PREFERRED DAYS</div>
                    <div style="font-size: 15px; color: #2D2D2A; font-weight: 500;">{{ implode(', ', array_map('ucfirst', $data['preferred_days'] ?? [])) ?: 'Not specified' }}</div>
                </div>

                <div style="background-color: #f9f7f4; border-left: 4px solid #D8C9A8; padding: 20px; margin-bottom: 20px;">
                    <div style="font-size: 11px; letter-spacing: 0.15em; color: #54504A; font-weight: 700; margin-bottom: 6px;">BEST TIME OF DAY</div>
                    <div style="font-size: 15px; color: #2D2D2A; font-weight: 500;">{{ ucfirst($data['best_time'] ?? 'Not specified') }}</div>
                </div>

                @if(!empty($data['details']))
                    <div style="background-color: #f9f7f4; border-left: 4px solid #D8C9A8; padding: 20px; margin-bottom: 20px;">
                        <div style="font-size: 11px; letter-spacing: 0.15em; color: #54504A; font-weight: 700; margin-bottom: 6px;">PROJECT DETAILS</div>
                        <div style="font-size: 15px; color: #2D2D2A; font-weight: 500; word-break: break-word;">{{ $data['details'] }}</div>
                    </div>
                @endif

                <div style="border-bottom: 1px solid #D8C9A8; margin: 30px 0;"></div>
            </div>

            <!-- Footer -->
            <div style="background-color: #2D2D2A; color: #E6E3DC; padding: 30px; text-align: center; border-top: 1px solid #D8C9A8;">
                <div style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 18px; font-weight: 600; letter-spacing: 0.03em; margin-bottom: 8px;">Arrow Construction</div>
                <div style="font-size: 12px; color: #B8B2A5; margin-bottom: 20px; line-height: 1.6;">
                    Fine Homes &amp; Renovations<br>
                    Crafted with meticulous attention to detail
                </div>
                <div style="font-size: 11px; color: #B8B2A5; padding-top: 20px; border-top: 1px solid #54504A;">
                    hello@builtbyarrow.com<br>
                    Utah • Park City • Salt Lake City
                </div>
            </div>
        </div>
    </div>
</body>
</html>