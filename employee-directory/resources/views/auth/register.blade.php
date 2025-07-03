@extends('layouts.app')
@section('content')
    <h1>Register</h1>
    @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="{{ old('name') }}"></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}"></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control"></div>
        <div class="mb-3"><label>Confirm Password</label><input type="password" name="password_confirmation" class="form-control"></div>
        <button type="submit" class="btn btn-success">Register</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </form>
@endsection
