@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-3xl font-bold text-indigo-700 mb-4">{{ $blog->title }}</h1>

    @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" class="mb-4 rounded shadow w-full max-h-96 object-cover">
    @endif

    <p class="mb-6 text-gray-700">{{ $blog->content }}</p>

    <hr class="my-6">

    <h2 class="text-xl font-semibold mb-4">Comments</h2>

    {{-- List Comments --}}
    @forelse($comments as $comment)
        <div class="mb-4 border-l-4 border-blue-500 pl-4">
            <p class="text-sm text-gray-600"><strong>{{ $comment->user->name }}</strong> said:</p>
            <p class="text-gray-800">{{ $comment->content }}</p>
        </div>
    @empty
        <p class="text-gray-500">No comments yet.</p>
    @endforelse

    <hr class="my-6">

    {{-- Comment Form --}}
    @auth
        <form method="POST" action="{{ route('comments.store', $blog->id) }}">
            @csrf
            <textarea name="content" rows="4" class="w-full border p-3 rounded mb-3" placeholder="Write your comment..." required></textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Post Comment</button>
        </form>
    @else
        <p class="text-gray-600">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a> to comment.
        </p>
    @endauth
</div>
@endsection
