<?php

use App\Booking;
use App\Movie;
use App\Seat;
use App\Theater;
use Carbon\Carbon;
?>

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
       
        <div class="flex items-center space-x-2">
            <span class="text-2xl font-bold md:block hidden">My App</span>
        </div>

      
        <nav class="mt-10 space-y-4">
            <a href="{{url('login')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">🏠</span>
                <span class="md:block hidden">Dashboard</span>
            </a>
            <a href="{{url('booking_detail')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">booking status</span>
            </a>
            <a href="{{url('logout')}}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700">
                <span class="text-lg">📁</span>
                <span class="md:block hidden">Logout</span>
            </a>
        </nav>
    </aside>


     <!-- Main Content -->
     <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold">Welcome to the Dashboard</h1>
        @if (session('success'))
    <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
        {{ session('success') }}
    </div>
@endif
        <form action="{{ route('book_ticket') }}" method="POST">
            @csrf
<div class="container mx-auto p-4">
    <!-- Parent flex container for horizontal layout -->
    <div class="flex space-x-8">
        <!-- Left Div: Headers -->
        <div class="w-1/3  p-4 space-y-2">
            <p class="px-4 py-2 border font-bold">Movie Name</p>
            <p class="px-4 py-2 border font-bold">Theater Name</p>
            <p class="px-4 py-2 border font-bold">Show DateTime</p>
            <!-- <p class="px-4 py-2 border font-bold">Members</p> -->
            <p class="px-4 py-2 border font-bold">Seats</p>
        </div>

        <!-- Right Div: Dynamic Data -->
       
        <div class="w-1/3 p-4">
            @foreach($show as $show_detail)
                
       
                <div class="flex flex-col space-y-2">
                    <p class="px-4 py-2 border"> <?php
                    $movie_name = Movie::where('id',$show_detail->movie_id)->first()
                    ?>  {{$movie_name->title}}</p>
                      <input type="hidden" name="movie" value="{{$movie_name->id}}"
                      class="w-16 text-center border border-gray-300 rounded-md">

                    <p class="px-4 py-2 border">  <?php 
                    $theater_name = Theater::where('id',$show_detail->theater_id)->first();
                    ?>
                {{$theater_name->theatername}}</p>
                <input type="hidden" name="theater" value="{{$theater_name->id}}"
                class="w-16 text-center border border-gray-300 rounded-md">

                    <p class="px-4 py-2 border">{{ $show_detail->showtime }}</p>
                    <input type="hidden" name="show" value="{{$show_detail->id}}"
                    class="w-16 text-center border border-gray-300 rounded-md" >
                    <div class="flex items-center space-x-4">
    <!-- Decrement Button /Increment Button-->
    <!-- <button onclick="decreaseValue()" class="bg-red-500 text-white px-3 py-1 rounded">
        -
    </button>
    <input type="number" id="quantity" value="1" min="1" name="member"
        class="w-16 text-center border border-gray-300 rounded-md">
    <button onclick="increaseValue()" class="bg-green-500 text-white px-3 py-1 rounded">
        +
    </button> -->
</div>
<div class="bg-white p-6 rounded-lg  w-auto flex items-center   bg-gray-100">
    <?php
    $bookings = Booking::select('booked_seat')->whereDate('created_at',Carbon::now()->format('Y-m-d')
    )->get();
    $bookedSeats=[];
    foreach($bookings as $booking){
        // $newArr[]=[
        //         explode(',',$booking->booked_seat)
        // ];
        $seats = explode(',', $booking->booked_seat); // Convert CSV string to array
        $bookedSeats = array_merge($bookedSeats, $seats);
    }

    $seats = Seat::where('theater_id',$show_detail->theater_id)->get();
    $availableSeats = $seats->reject(function ($seat) use ($bookedSeats) {
        return in_array($seat->id, $bookedSeats); // Remove booked seats
    });
    // dd([
    //     'booked_seats' => $bookedSeats,   // All booked seat IDs
    //     'available_seats' => $availableSeats->pluck('id'), // Available seat IDs
    // ]);
  
    ?>

                 @foreach( $availableSeats as $seat )
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="booked_seat[]" value="{{$seat->id}}" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <span class="text-gray-700 ml-2">{{$seat->id}}</span>
            </label>
            @endforeach
            @if ($availableSeats->isEmpty())
    <p class="text-red-500">Seats not available</p>
@endif
    </div>
                </div>
            @endforeach
        </div>
</div>
  

<button type="submit"
                class=" px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600">
                book
            </button>
           
</form>

    </main>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    function increaseValue() {
        let value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 1 : value + 1;
        document.getElementById('quantity').value = value;
    }

    function decreaseValue() {
        let value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 1 : value - 1;
        if (value < 1) value = 1; // Prevent negative values
        document.getElementById('quantity').value = value;
    }
</script>
