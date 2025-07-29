<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">



    <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Register</h1>
        {{-- ✅ Success Message --}}
        @if (session('success'))
            <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" placeholder="Enter your name" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" placeholder="Enter your email" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" placeholder="Enter password" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Register</button>
             <div class="btm">
               <span>Already have an Account?</span> <a href="{{route('login.submit') }}" class="text-lime-900 font-bold ">Login here</a>
             </div>
        </form>
    </div>

</body>

</html>
<script>
    setTimeout(() => {
   const alertbox=document.getElementById('success-alert');
    if (alertbox) {
            alertbox.style.display = 'none';
        }
    }, 4000);
</script>
