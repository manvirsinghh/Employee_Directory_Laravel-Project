@extends('layout.app')

@section('title', 'My Bookings')

@section('content')
    <h1 class="text-2xl font-bold mb-6">My Bookings</h1>

    @forelse ($bookings as $booking)
        <div class="bg-white p-4 shadow rounded mb-4">
            <h2 class="text-xl font-semibold">{{ $booking->event->title }}</h2>
            <p>Booked Quantity: {{ $booking->quantity }}</p>
            <p>Status: {{ $booking->paid ? 'Paid' : 'Unpaid' }}</p>
            {{-- <a href="{{ route('events.show', $booking->event->id) }}" class="text-blue-500 hover:underline">View Event</a> --}}
     {{-- Add Download Ticket button --> --}}
            <a href="{{ route('bookings.download', $booking->id) }}" class="text-green-600 hover:underline">
                Download Ticket (PDF)
            </a>
        </div>
    @empty
        <p class="text-gray-600">You have not booked any events yet.</p>
    @endforelse
@endsection
