<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fullname')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('method')->nullable();
            $table->string('token')->nullable();
            $table->string('user_id')->nullable();
            $table->string('paymentstatus')->nullable();
            $table->string('movies')->nullable();
            $table->date('orderdate')->nullable();
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
