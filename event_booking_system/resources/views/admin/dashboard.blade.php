@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-8 text-center">👨‍💼 Admin Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.events.create') }}" class="flex items-center justify-center bg-blue-100 text-blue-700 p-6 rounded-lg shadow hover:bg-blue-600 hover:text-white transition text-lg font-medium">
            ➕ Create New Event
        </a>

        <a href="{{ route('admin.events.index') }}" class="flex items-center justify-center bg-blue-100 text-blue-700 p-6 rounded-lg shadow hover:bg-blue-600 hover:text-white transition text-lg font-medium">
            📋 Manage Events
        </a>

        <a href="{{ route('admin.bookings.index') }}" class="flex items-center justify-center bg-blue-100 text-blue-700 p-6 rounded-lg shadow hover:bg-blue-600 hover:text-white transition text-lg font-medium">
            📦 View Bookings
        </a>

        <a href="{{ route('admin.users') }}" class="flex items-center justify-center bg-blue-100 text-blue-700 p-6 rounded-lg shadow hover:bg-blue-600 hover:text-white transition text-lg font-medium">
            👥 User Management
        </a>
    </div>
@endsection
