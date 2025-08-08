@extends('layout.app')

@section('title', 'Edit Event')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded">
    <h2 class="text-xl font-bold mb-4">Edit Event</h2>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" onsubmit="return  confirmUpdate();">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" value="{{ $event->title }}" class="w-full border p-2 mb-4">

        <label>Description</label>
        <textarea name="description" class="w-full border p-2 mb-4">{{ $event->description }}</textarea>

        <label>Date & Time</label>
        <input type="datetime-local" name="date_time" value="{{ \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i') }}" class="w-full border p-2 mb-4">

        <label>Location</label>
        <input type="text" name="location" value="{{ $event->location }}" class="w-full border p-2 mb-4">

      
        <label>Price</label>
        <input type="number" name="price" value="{{ $event->price }}" step="0.01" class="w-full border p-2 mb-4">

        <label>Status</label>
        <select name="status" class="w-full border p-2 mb-4">
            <option value="published" {{ $event->status === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ $event->status === 'draft' ? 'selected' : '' }}>Draft</option>
        </select>

        <label>Image</label>
        <input type="file" name="image" class="w-full border p-2 mb-4">

        @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" class="w-40 h-24 mb-4 object-cover rounded">
        @endif

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Event</button>
    </form>
</div>


@endsection

<script>
    function confirmUpdate() {
    return confirm("Are you sure you want to update this event?");
}

</script>
