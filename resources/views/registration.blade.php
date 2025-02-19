<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700">Create an Account</h2>
        @if (session('success'))
    <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
        {{ session('success') }}
    </div>
@endif
        <form action="save_user_detail" method="POST" class="space-y-4">
            @csrf
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
 
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>


            <!-- Register Button -->
            <button type="submit"
                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Register
            </button>
        </form>

        <!-- Login Link -->
        <p class="text-sm text-center text-gray-600">
            Already have an account? <a href="/" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>

</body>
</html>
