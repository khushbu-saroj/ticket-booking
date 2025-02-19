

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
                <span class="md:block hidden">Dashboard</span>
            </a>
            <a href="booking_detail" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Booking Status</span>
            </a>
            <a href="{{url('logout')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">logout</span>
            </a>
          
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold">Welcome to the Dashboard</h1>
  

        <?php
        use App\Movie;
        use App\Seat;
use App\Show;
use Carbon\Carbon;

 
        ?>
        <div style="display: flex; gap: 20px;">
        @if(isset($shows) && $shows->isNotEmpty())
        
        <table class="min-w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
        <th class="py-2 px-4 border-b text-left">Sr.NO.</th>
            <th class="py-2 px-4 border-b text-left">Movie Name</th>
            <th class="py-2 px-4 border-b text-left">Name</th>
            <th class="py-2 px-4 border-b text-left">Email</th>
        </tr>
    </thead>
    <tbody>
        @php 
        $i =1;
        @endphp
    @foreach($shows as $show)
        <tr class="bg-gray-100">
        <td class="py-2 px-4 border-b">{{$i++}}</td>
        <?php ?>
            <td class="py-2 px-4 border-b">{{$show->movie->title ?? ''}}</td>
            <td class="py-2 px-4 border-b">{{$show->movie->description ??''}}</td>
            <td class="py-2 px-4 border-b"> <a href="{{ url('/show_detail/' . $show->movie->id) }}">
    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-2 rounded">Book now
</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>

        <!-- <p></p>
        <p></p>
       
        
              
        -->
@else
            <p>No movies available.</p>
        @endif


</div>
    </main>

</body>
</html>
