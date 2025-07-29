@extends('layouts.app')

@section('title', 'Manage Blogs')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-2xl font-bold mb-6 text-indigo-700">All Blogs</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Created</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $blog->title }}</td>
                    <td class="px-4 py-2">{{ $blog->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2 flex gap-3">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No blogs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
