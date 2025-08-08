<!DOCTYPE html>
<html>
<head>
    <title>Event Ticket</title>
    <style>
        body { font-family: sans-serif; }
        .box { border: 1px solid #ddd; padding: 20px; }
    </style>
</head>
<body>
    <h2>🎟️ Event Ticket</h2>

    <div class="box">
        <p><strong>Event:</strong> {{ $booking->event->title }}</p>
        <p><strong>Date:</strong> {{ $booking->event->date_time }}</p>
        <p><strong>Venue:</strong> {{ $booking->event->location }}</p>
        <p><strong>Booked by:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Quantity:</strong> {{ $booking->quantity }}</p>
        <p><strong>Status:</strong> {{ $booking->paid ? 'Paid' : 'Unpaid' }}</p>
        <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
    </div>
</body>
</html>
