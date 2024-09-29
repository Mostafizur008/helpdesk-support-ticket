<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Email Reply</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        table {
            border-spacing: 0;
            width: 100%;
        }
        table td {
            padding: 0;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px 40px;
        }
        .content h2 {
            font-size: 20px;
            color: #333;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }
        .content .details {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #888;
            border-top: 1px solid #eeeeee;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#f4f4f4">
        <tr>
            <td>
                <table class="email-wrapper" role="presentation" cellspacing="0" cellpadding="0" border="0">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <h1>Support Ticket Reply</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="content">
                            <h2>Hello {{ $name }},</h2>
                            <p>
                                We've received your message and are reviewing it. One of our support team members will get back to you soon.
                            </p>
                            <p>Here is the message you submitted:</p>
                            <div class="details">
                                {{-- <strong>Email:</strong> {{ $email }} <br> --}}
                                <strong>{{ $comment }}
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            <p>Need assistance? Contact us anytime.</p>
                            <p>&copy; 2024 Your MRSBD. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
