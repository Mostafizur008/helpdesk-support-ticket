<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Reply</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .ticket-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
        }
        .ticket-details p {
            margin: 5px 0;
        }
        .comments-section {
            margin-top: 20px;
        }
        .comment-item {
            background-color: #f0f0f0;
            padding: 10px;
            margin: 5px 0;
            border-left: 4px solid #007bff;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ticket Reply</h1>

        <div class="ticket-details">
            <p><strong>Ticket ID:</strong> {{ $editData->ticket_id }}</p>
            <p><strong>Status:</strong> {{ $editData->status == 1 ? 'Open' : 'Closed' }}</p>
        </div>

        <div class="comments-section">
            <h2>Comments:</h2>
            @if($editData->comments->isEmpty())
                <p>No comments available for this ticket.</p>
            @else
                @foreach($editData->comments as $comment)
                    <div class="comment-item">
                        {{ $comment->comment }}
                    </div>
                @endforeach
            @endif
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
