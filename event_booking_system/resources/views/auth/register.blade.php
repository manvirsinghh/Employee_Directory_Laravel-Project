<!-- register.blade.php -->
@extends('layout.app')

@section('content')
  <form method="POST" action="/register" class="max-w-md w-full mx-auto mt-16 p-6 bg-white rounded-lg shadow-md">
    @csrf

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create an Account</h2>

    {{-- Name --}}
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input name="name" type="text" id="name" placeholder="Your full name"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
               required>
    </div>

    {{-- Email --}}
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input name="email" type="email" id="email" placeholder="you@example.com"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
               required>
    </div>

    {{-- Password --}}
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input name="password" type="password" id="password" placeholder="••••••••"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
               required>
    </div>

    {{-- Confirm Password --}}
    <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
        <input name="password_confirmation" type="password" id="password_confirmation" placeholder="••••••••"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
               required>
    </div>

    {{-- Submit Button --}}
    <button type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md transition duration-300">
        Register
    </button>
</form>

@endsection
