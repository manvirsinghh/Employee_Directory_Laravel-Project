@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Edit Employee</div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}" required>
            </div>
            <div class="mb-3">
                <label>Department</label>
                <select name="department_id" class="form-select" required>
                    @foreach ($departments as $dept)
                        <option value="{{ $dept->id }}" {{ $dept->id == $employee->department_id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
