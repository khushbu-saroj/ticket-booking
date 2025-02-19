


        

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
   <!-- Wrap Form in a Div with Adjusted Margin -->
<div class="flex items-start justify-right min-h-screen bg-gray-100 pt-10">

<div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700">Create Movie</h2>
        @if (session('success'))
    <div class="p-4 mb-4 text-green-700 bg-green-100 border border-red-400 rounded">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ url('/movie_save') }}" method="POST" class="space-y-4">
        @csrf
      
        <div>
            <label for="movie" class="block text-sm font-medium text-gray-600">Movie Name</label>
            <input type="text" id="email" name="movie_name" required
                class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <input type="text" id="description" name="description" required
                class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit"
            class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600">
            Save
        </button>
    </form>
</div>
</div>
    </main>

</body>
</html>
