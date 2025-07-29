@extends('layouts.app')

@section('title', 'Welcome to Book Blog')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-8">Welcome to Book Blog</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($blogs as $blog)
                <div class="bg-white shadow-md rounded p-4">
                    <h2 class="text-xl font-semibold">{{ $blog->title }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Posted on {{ $blog->created_at->format('d M Y') }}</p>
                    <p class="text-gray-700">{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="text-indigo-600 underline mt-2 inline-block">Read more</a>
                </div>
            @empty
                <p>No blogs available.</p>
            @endforelse
        </div>
    </div>
@endsection
