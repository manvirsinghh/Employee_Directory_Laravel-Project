<h2>Event Booking Confirmation</h2>
<p>Event: {{ $event->title }}</p>
<p>Booked by: {{ $booking->user->name }}</p>
<p>Tickets: {{ $booking->quantity }}</p>
<p>Status: {{ ucfirst($booking->payment_status) }}</p>
<img src="{{ storage_path('app/public/' . $booking->qr_code_path) }}" width="150">
