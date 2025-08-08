<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Event Booking System')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    @include('layout.navbar')

    <main class="container mx-aauto py-6 px-4">
        @yield('content')
    </main>
    @include('layout.footer')
    @yield('scripts')
</body>

</html>
