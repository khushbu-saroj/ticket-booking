<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('show_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('show_id')->references('id')->on('shows'); 
            $table->string('members');
            $table->string('booked_seat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
