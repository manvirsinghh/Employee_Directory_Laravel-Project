@component('mail::message')
# Booking Confirmed

Thank you for booking **{{ $event->title }}**.

Event Date: {{ $event->date_time->format('M d, Y h:i A') }}

@component('mail::button', ['url' => route('home')])
View More Events
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
