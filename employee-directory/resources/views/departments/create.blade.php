@extends('layouts.app')
@section('content')
    <h1>Add Department</h1>
    @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div class="mb-3">
            <label>Department Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
