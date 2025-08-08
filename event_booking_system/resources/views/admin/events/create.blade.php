@extends('layout.app')

@section('title', 'Create Event')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow p-6 rounded-lg">
        <h2 class="text-xl font-bold mb-4">Create New Event</h2>

        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Event Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded" placeholder="Enter Event Title"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border p-2 rounded" placeholder="Enter Event Description"
                    required></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Date & Time</label>
                <input type="datetime-local" name="date_time" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Location</label>
                <input type="text" name="location" class="w-full border p-2 rounded" placeholder="Enter Event Location"
                    required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Category</label>
                <select name="category_id" class="w-full border rounded p-2">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label class="block font-semibold mb-1">Price (₹)</label>
                <input type="number" name="price" class="w-full border p-2 rounded" placeholder="Enter Event Price"
                    step="0.01" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Event Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Create Event
            </button>
        </form>
    </div>
@endsection
