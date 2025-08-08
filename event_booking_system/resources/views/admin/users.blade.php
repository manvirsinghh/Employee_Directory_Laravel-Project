@extends('layout.app')

@section('title', 'Manage Users')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">👥 All Users</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm text-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="p-3 border text-left">Name</th>
                    <th class="p-3 border text-left">Email</th>
                    <th class="p-3 border text-center">Registered At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border">{{ $user->name }}</td>
                        <td class="p-3 border">{{ $user->email }}</td>
                        <td class="p-3 border text-center">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
