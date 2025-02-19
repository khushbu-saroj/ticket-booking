

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex">

    <!-- Sidebar -->
    <aside class="h-screen w-16 md:w-64 bg-gray-900 text-white flex flex-col p-4 transition-all duration-300">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <span class="text-2xl font-bold md:block hidden">{{Auth::user()->name}}</span>
        </div>

        <!-- Navigation Links -->
        <nav class="mt-10 space-y-4">
            <a href="login" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">🏠</span>
                <span class="md:block hidden">Admin Dashboard</span>
            </a>
            <a href="{{url('theater')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Theater</span>
            </a>
            <a href="{{url('seat')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Seat</span>
            </a>
          
            <a href="{{url('movie')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Movie</span>
            </a>
            <a href="{{url('show')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Show</span>
            </a>
            <a href="{{url('logout')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">logout</span>
            </a>
          
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
       
    </main>

</body>
</html>
