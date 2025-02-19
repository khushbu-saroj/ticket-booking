

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
            <span class="text-2xl font-bold md:block hidden">My App</span>
        </div>

        <!-- Navigation Links -->
        <nav class="mt-10 space-y-4">
            <a href="{{ url('login') }}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">🏠</span>
                <span class="md:block hidden">Dashboard</span>
            </a>
            <a href="{{ url('booking_detail ') }}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Booking Status</span>
            </a>
            <a href="{{ url('logout') }}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
   <!-- Main Content -->
   <main class="flex-1 p-6">
  <?php

use App\Booking;
use App\Movie;
use App\Seat;
use App\Show;
use App\Theater;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$data = Booking::where('user_id', Auth::user()->id)
    ->get();
  

  ?>
  @foreach($data as $daa)
  <div class="flex">
  <div class="w-1/2 p-4 bg-grey-500">
  <p class="px-4 py-2 justify-center font-bold "> Ticket Booking Detail</p> 
  <p class="px-4 py-2 "> Movie Name</p>
  <p class="px-4 py-2 "> Theater</p>
  <p class="px-4 py-2 "> Show Time</p>
  <p class="px-4 py-2 ">Your Seat</p>
  </div>
  <div class="w-1/2 p-4 bg-white-500">
    <?php  
    $show = Show::where('id', $daa->show_id)->first();
    ?> 
    <p class="px-4 py-2 "></p>
    <p class="px-4 py-2 "></p>
    <p class="px-4 py-2 "></p>
    
  <p class="px-4 py-2 "><?php $movie = Movie::where('id',$show->movie_id)->first(); ?>{{$movie->title}}</p>
  <p class="px-4 py-2 "> <?php $theater = Theater::where('id',$show->theater_id)->first(); ?> {{$theater->theatername}}</p>
  <p class="px-4 py-2 "> {{$show->showtime}}</p>
  <p class="px-4 py-2 ">{{$daa->booked_seat}}</p>
  </div>
  </div>
  @endforeach

    </main>

</body>
</html>
