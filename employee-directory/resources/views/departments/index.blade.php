@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Departments</h1>
        <a class="btn btn-success text-center" href="{{ route('departments.create') }}">Add Department</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Sr No.</th><th>Name</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @forelse ($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('departments.edit', $department->id) }}">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3" class="text-center">No departments found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
