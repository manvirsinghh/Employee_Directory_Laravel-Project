@extends('layouts.app')

@section('title', 'Edit Blog')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Edit Blog</h2>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2">Title</label>
        <input type="text" name="title" value="{{ $blog->title }}" class="w-full border px-3 py-2 mb-4" required>
<div class="mb-4">
    <label class="block font-semibold mb-1">Blog Image</label>
    <input type="file" name="image" class="border p-2 w-full rounded" accept="image/*">
</div>

@if(isset($blog) && $blog->image)
    <div class="mb-4">
        <img src="{{ asset('storage/' . $blog->image) }}" class="w-40 h-24 object-cover rounded">
    </div>
@endif

        <label class="block mb-2">Content</label>
        <textarea name="content" rows="5" class="w-full border px-3 py-2 mb-4" required>{{ $blog->content }}</textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
