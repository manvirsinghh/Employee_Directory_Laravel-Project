@extends('layout.app')

@section('title', 'All Bookings')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">All Bookings</h1>

    @if ($bookings->count())
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm text-sm">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="p-3 border text-left">User</th>
                        <th class="p-3 border text-left">Event</th>
                        <th class="p-3 border text-center">Quantity</th>
                        <th class="p-3 border text-center">Paid</th>
                        <th class="p-3 border text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border">{{ $booking->user->name }}</td>
                            <td class="p-3 border">{{ $booking->event->title }}</td>
                            <td class="p-3 border text-center">{{ $booking->quantity }}</td>
                            <td class="p-3 border text-center">
                                @if($booking->paid)
                                    <span class="text-green-600 font-medium">Yes</span>
                                @else
                                    <span class="text-red-500 font-medium">No</span>
                                @endif
                            </td>
                            <td class="p-3 border text-center">{{ $booking->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-500">No bookings found.</p>
    @endif
@endsection
