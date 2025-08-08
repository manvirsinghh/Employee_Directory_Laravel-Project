@extends('layout.app')

@section('title', 'Manage Events')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Manage Events</h1>

    @foreach ($events as $event)
        <div class="border p-4 mb-4 rounded">
            <h3 class="text-xl font-semibold">{{ $event->title }}</h3>
            <p>{{ $event->description }}</p>


             <p><strong>Date:</strong> {{ $event->date_time }}</p>

            <div class="mt-3 flex gap-4">
                <a href="{{ route('admin.events.edit', $event) }}" class="text-blue-600 hover:underline">✏️ Edit</a>

                <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this event?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline">🗑️ Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
