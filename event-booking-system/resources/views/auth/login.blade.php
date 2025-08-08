<!-- login.blade.php -->
@extends('layout.app')
@section('content')
   <form method="POST" action="/login" class="max-w-md w-full mx-auto mt-16 p-6 bg-white rounded-lg shadow-md">
    @csrf

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login to Your Account</h2>

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input name="email" type="email" id="email" placeholder="you@example.com"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required>
    </div>

    <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input name="password" type="password" id="password" placeholder="••••••••"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required>
    </div>

    <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition duration-300">
        Login
    </button>
</form>

@endsection
