@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">📚 Latest Blogs</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($blogs as $blog)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="h-48 w-full object-cover">
                @endif

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $blog->title }}</h3>
                        <p class="text-gray-500 text-sm mb-2">Posted on {{ $blog->created_at->format('d M Y') }}</p>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($blog->content, 100) }}</p>
                    </div>

                    @auth
                        <a href="{{ route('blogs.show', $blog->id) }}" class="mt-auto text-center inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Read More</a>
                    @else
                        <p class="text-sm text-gray-500 italic">Login to read and comment.</p>
                    @endauth
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center col-span-3">No blogs available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection
