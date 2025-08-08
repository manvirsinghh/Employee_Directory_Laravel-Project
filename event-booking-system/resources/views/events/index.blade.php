@extends('layout.app')

@section('title', 'Browse Events')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Upcoming Events</h1>
    {{-- Loop through events --}}
    @foreach ($events as $event)
        <div class="bg-white shadow p-4 mb-4 rounded">
            <h2 class="text-xl font-bold">{{ $event->title }}</h2>
            <p>{{ $event->description }}</p>
            <p><strong>Date:</strong> {{ $event->date_time }}</p>
            <a href="{{ route('events.show', $event->id) }}" class="text-blue-500">View Details</a>
        </div>
    @endforeach
@endsection
