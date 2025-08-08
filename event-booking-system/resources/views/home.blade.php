@extends('layout.app')

@section('title', 'Welcome to EventBook')

@section('content')

    {{-- 🌟 Hero Section --}}
    <div class="bg-orange-600 hover:bg-yellow-400 text-white text-center py-20 px-5 rounded-lg mb-10 transition">
        <h1 class="text-4xl sm:text-5xl font-bold mb-4">Book Your Next Experience</h1>
        <p class="text-lg sm:text-xl mb-6">Find events happening around you and book with ease</p>
        <a href="{{ route('events.index') }}"
           class="inline-block bg-white text-orange-600 font-semibold px-6 py-2 rounded shadow hover:bg-gray-100 transition">
            Browse Events
        </a>
    </div>

    {{-- 🎯 Categories --}}
    <h2 class="text-2xl font-semibold mb-4 px-2">Popular Categories</h2>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-10 px-2">
        @forelse ($categories as $category)
            <li>
                <a href="{{ route('events.byCategory', $category->id) }}"
                   class="block text-center px-4 py-2 bg-purple-600 text-white rounded-md shadow hover:bg-purple-700 transition duration-300 ease-in-out">
                    {{ $category->name }}
                </a>
            </li>
        @empty
            <p class="text-gray-500">No categories available at the moment.</p>
        @endforelse
    </ul>

    {{-- 🌟 Featured Events --}}

<h2 class="text-2xl font-semibold mb-4 px-2">Featured Events</h2>

@if($events->isEmpty())
    <p class="text-gray-500 px-2">No featured events available at the moment.</p>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-2">
        @foreach ($events as $event)
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
                <p class="text-sm text-gray-500 mb-1">
                    Category: {{ $event->category->name }}
                </p>
                <p class="text-gray-700 mb-2">
                    {{ \Illuminate\Support\Str::limit($event->description, 100) }}
                </p>
                <p class="text-sm text-gray-500 mb-4">
                    {{ $event->date_time->format('M d, Y h:i A') }}
                </p>
                <a href="{{ route('events.show', $event->id) }}"
                   class="inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    View Details
                </a>
            </div>
        @endforeach
    </div>
@endif

@endsection
