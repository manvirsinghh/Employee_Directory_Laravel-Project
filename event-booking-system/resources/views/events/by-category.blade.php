@extends('layout.app')

@section('title', 'Events in ' . $category->name)

@section('content')
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Events in "{{ $category->name }}"</h2>

        @if($events->isEmpty())
            <p class="text-gray-600">No events found in this category.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="text-lg font-semibold mb-1">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $event->date_time->format('M d, Y h:i A') }}</p>
                        <p class="text-gray-700">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('events.show',$event->id) }}" class="text-blue-600 hover:underline text-sm">View Details</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
