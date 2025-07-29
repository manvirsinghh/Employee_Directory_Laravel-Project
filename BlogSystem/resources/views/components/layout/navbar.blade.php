<nav class="bg-gradient-to-r from-blue-600 to-indigo-700 shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        {{-- Logo or Site Name --}}
        <h1 class="text-white text-2xl font-extrabold tracking-wide">
            🚀 Blog System
        </h1>

        {{-- Navigation Links --}}
        <ul class="hidden md:flex items-center space-x-6 font-medium">
            @auth
                @if (auth()->user()->role === 'admin')
                    <ul class="flex gap-6 text-gray-600 font-medium">
                        <li><a href="{{ url('/admin/dashboard') }}" class=" text-white hover:text-green-300">Dashboard</a>
                        </li>
                        <li><a href="{{ route('blogs.create') }}" class=" text-white hover:text-green-300">Add Blog</a></li>
                        <li><a href="{{ route('blogs.index') }}" class="hover:text-green-300 text-white">All Blogs</a></li>

                    </ul>
                @else
                    <ul class="flex gap-4 text-gray-600 font-medium">
                        <li>
                            <a href="{{ url('/dashboard') }}"
                                class="text-white hover:text-green-300 transition duration-200 ease-in-out">
                                User Dashboard
                            </a>
                        </li>
                        <li><a href="{{ route('register') }}" class=" text-white hover:text-green-300">Register</a></li>
                        <li>
                        <li><a href="{{ route('login') }}" class=" text-white hover:text-green-300">Login</a></li>

                    </ul>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-300 transition duration-200 ease-in-out">
                            Logout
                        </button>
                    </form>
                </li>
            @endauth
        </ul>

        {{-- Mobile menu toggle (optional for future) --}}
        <div class="md:hidden text-white">
            <!-- Add mobile dropdown later -->
            ☰
        </div>
    </div>
</nav>
