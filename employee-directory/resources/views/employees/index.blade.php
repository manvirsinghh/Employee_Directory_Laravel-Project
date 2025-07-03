@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Employee Directory</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="GET" class="mb-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search employees..." class="form-control" style="width: 300px; display:inline;">
    <button type="submit" class="btn btn-secondary">Search</button>
</form>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Department</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->department->name }}</td>
                <td>
                    <a href="{{ route('employees.edit', $emp) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('employees.destroy', $emp) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this employee?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
</div>
@endsection
