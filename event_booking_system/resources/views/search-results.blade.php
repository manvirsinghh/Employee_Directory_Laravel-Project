@extends('layout.app')

@section('title', 'Search Results')

@section('content')
    <div class="max-w-4xl mx-auto mt-6">
        <h2 class="text-xl font-bold mb-4">Search Results for "{{ $search }}"</h2>

        @if ($events->count())
            <ul>
                @foreach ($events as $event)
                    <li class="mb-4 p-4 border rounded">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <p>{{ $event->description }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Category:</strong> {{ $event->category->name }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No events found matching your search.</p>
        @endif
    </div>
@endsection
