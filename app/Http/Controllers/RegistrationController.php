<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Show;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function registration(){
        return view('registration');
    }
    public function save(Request $request){
                // // ✅ Validate Form Data
                // $request->validate([
                //     'name' => 'required|string|max:255',
                //     'email' => 'required|email|unique:users,email',
                //     'password' => 'required|min:6',
                // ])
                // ✅ Save Data into the Users Table
              
                User::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'password' => $request->password, // Encrypt password
              ]);
        
                // ✅ Redirect with Success Message
                return redirect()->back()->with('success', 'User registered successfully!');
    }

    public function login(Request $request){
      
      $data = User::where('email',$request->email)->where('password',$request->password)->first();
      if($data){
        Auth::login($data);
        if($data->status == '0'){
          $shows = Show::with('movie')->whereDate('showtime',Carbon::now()->format('Y-m-d'))->get();
          return view('dashboard',compact('shows'));
        }
    
        if($data->status == '1'){
            return view('admin.admin_dashboard');
          
        }
       
      }else{
        return redirect()->back()->with('success', 'Invali Credential!');
      }
    }

    public function dashboard(){
      $shows = Show::with('movie')->whereDate('showtime',Carbon::now()->format('Y-m-d'))->get();
      return view('dashboard',compact('shows'));
    }

    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/')->with('success','you have been logged out');
    }

}
