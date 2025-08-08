<nav class="bg-gray-300 shadow-md">
    <div class="container mx-auto px-4 py-3 flex flex-wrap items-center justify-between">

        {{-- Logo --}}
        <a href="/" class="text-xl font-bold text-gray-800 mb-2 md:mb-0">
            EventBook
        </a>

        {{-- Search Bar --}}
        <form action="{{ route('events.search') }}" method="GET"
              class="w-full md:w-auto flex flex-col md:flex-row items-stretch md:items-center gap-2 md:gap-2 mb-3 md:mb-0 bg-gray-100 p-2 rounded-md shadow-sm">
            <input type="text" name="search"
                   placeholder="Search by event, location, or category..."
                   class="flex-grow px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Search
            </button>
        </form>

        {{-- Navigation Links --}}
        <div class="w-full md:w-auto flex flex-col md:flex-row items-start md:items-center gap-2 md:gap-4 text-gray-800">
            <a href="{{ route('events.index') }}" class="hover:underline">Events</a>

            @auth
                <a href="#" class="hover:underline">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </div>
    </div>
</nav>
