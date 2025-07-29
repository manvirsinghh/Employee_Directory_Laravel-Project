<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Shared Navbar --}}
    @include('components.layout.navbar')

    {{-- Page Content --}}
    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- Shared Footer --}}
    @include('components.layout.footer')

</body>
</html>
