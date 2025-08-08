@extends('layout.app')

@section('title', 'User Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Welcome, {{ auth()->user()->name }} 👋</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('events.index') }}" class="bg-white p-4 rounded shadow hover:bg-blue-50">Browse Events</a>

        <a href="{{ route('bookings.my') }}" class="bg-white p-4 rounded shadow hover:bg-blue-50">My Bookings</a>
    </div>
@endsection
