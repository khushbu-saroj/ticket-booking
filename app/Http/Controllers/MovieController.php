<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\Booking;
use App\Movie;
use App\Seat;
use App\Theater;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function findmovie(Request $request){
        $shows = Show::where('movie_id',$request->id)->get();
        return view('show_detail',compact('shows'));
    }

    public function booking_detail(){
        return view('booking_detail');
    }

    public function show_detail(Request $request){
        $show = Show::where('movie_id',$request->id)->whereDate('showtime',Carbon::now()->format('Y-m-d'))->get();
        return view('show_detail',compact('show'));
    }
     public function book_ticket(Request $request){
     
        $seats = $request->booked_seat;
        if(empty($seats)){
            return redirect()->back()->with('success', 'here seat not availabe');
        }
        $seats = is_array($seats) ? $seats : [$seats];
        $seats = implode(",", $seats);
        Booking::create([
            'user_id' => Auth::user()->id,
            'show_id' => $request->show,
            // 'members' => $request->member,
            'members'=>'0',
            'booked_seat'=>$seats
        ]);
        return "book ticket successfully";
     }

     public function movie(){
        return view('admin.movie');
     }
     public function movie_save(Request $request){
        Movie::create([
            'title' =>$request->movie_name,
            'description'=>$request->description
        ]);
        return redirect()->back()->with('success', 'Save Successfully');
        
     }
     public function theater(){
        return view('admin.theater');
     }
     public function theater_store(Request $request){
        Theater::create([
            'theatername'=>$request->theater,
            'address'=>$request->address,
        ]);
        return redirect()->back()->with('success', 'Save Successfully');
     }
public function seat(){
    $theaters = Theater::get();
    return view('admin.seat',compact('theaters'));
}

public function seat_save(Request $request){
    Seat::create([
        'theater_id'=>$request->theater
    ]);
    return redirect()->back()->with('success', 'Save Successfully');
}

public function show(){
    $theaters = Theater::get();
    $movies = Movie::get();
    return view('admin.show',compact('theaters','movies'));
}

public function show_save(Request $request){
    //return $request->all();
    $datetime =Carbon::parse($request->datetime)->format('Y-m-d H:i:s');
    Show::create([
        'theater_id'=>$request->theater,
        'movie_id'=>$request->movie,
        'showtime'=>$datetime
    ]);
    return redirect()->back()->with('success', 'Save Successfully');
}
}

