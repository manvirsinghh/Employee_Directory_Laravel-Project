@extends('layouts.app')
@section('content')
    <h1>Edit Department</h1>
    @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form method="POST" action="{{ route('departments.update', $department->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Department Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $department->name) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
