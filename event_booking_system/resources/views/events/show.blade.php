@extends('layout.app')

@section('title', $event->title)

@section('content')
    <div class="max-w-3xl mx-auto p-4 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-4">{{ $event->title }}</h2>
        <p class="text-gray-500 mb-2"><strong>Category:</strong> {{ $event->category->name }}</p>
        <p class="text-gray-500 mb-2"><strong>Date:</strong> {{ $event->date_time->format('M d, Y h:i A') }}</p>
        <p class="mb-4">{{ $event->description }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Price:</strong> ₹{{ $event->price }}</p>
        <p class="text-gray-700 mb-4">Available Seats: <strong>{{ $event->remainingSeats() }}</strong></p>

        @auth
            @if ($event->remainingSeats() > 0)
                @if ($event->price > 0)
                    {{-- Stripe payment form --}}
                    <form action="{{ route('stripe.checkout', $event->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="quantity" class="block font-medium">Tickets</label>
                            <input type="number" name="quantity" min="1" max="{{ $event->remainingSeats() }}" required
                                   class="w-full border p-2 rounded">
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Pay with Stripe
                        </button>
                    </form>
                @else
                    {{-- Free booking form --}}
                    <form action="{{ route('bookings.store', $event->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="quantity" class="block font-medium">Tickets</label>
                            <input type="number" name="quantity" min="1" max="{{ $event->remainingSeats() }}" required
                                   class="w-full border p-2 rounded">
                        </div>

                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Book Now (Free)
                        </button>
                    </form>
                @endif
            @else
                <p class="text-red-600 font-semibold">Sorry, this event is fully booked.</p>
            @endif
        @else
            <p class="text-blue-600">
                <a href="{{ route('login') }}"
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Login</a> to book
                tickets.
            </p>
        @endauth
    </div>
@endsection
