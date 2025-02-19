<?php
namespace App\Http\Controllers; 
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
 use app\Http\Middleware\Authenticated;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('registration',[RegistrationController::class,'registration']);
Route::post('/save_user_detail',[RegistrationController::class,'save']);
Route::post('/login',[RegistrationController::class,'login']);
Route::middleware(['authenticated'])->group(function () {

// Route::get('registration',function(){
//     return view('registration');
// });

Route::get('login',[RegistrationController::class,'dashboard']);
Route::get('movie/{id}',[MovieController::class,'findmovie']);
Route::post('/book_ticket',[MovieController::class,'book_ticket'])->name('book_ticket');;
//booking
Route::get('booking_detail',[MovieController::class,'booking_detail']);
Route::get('show_detail/{id}',[MovieController::class,'show_detail']);
});

Route::get('logout',[RegistrationController::class,'logout']);

//admin
Route::get('movie',[MovieController::class,'movie']);
Route::post('movie_save',[MovieController::class,'movie_save']);
Route::get('theater',[MovieController::class,'theater']);
Route::post('theater_store',[MovieController::class,'theater_store']);
Route::get('seat',[MovieController::class,'seat']);
Route::post('seat_save',[MovieController::class,'seat_save']);
Route::get('show',[MovieController::class,'show']);
Route::post('show_save',[MovieController::class,'show_save']);