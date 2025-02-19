<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>
        @if (session('success'))
    <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        {{ session('success') }}
    </div>
@endif
        <form action="{{ url('/login') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                
                </label>
               
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Login
            </button>
        </form>

        <!-- Signup Link -->
        <p class="text-sm text-center text-gray-600">
            Don't have an account? <a href="registration" class="text-blue-500 hover:underline">Sign up</a>
        </p>
    </div>

</body>
</html>
