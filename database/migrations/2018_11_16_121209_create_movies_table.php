<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movie_name')->nullable();
            $table->date('release_date')->nullable();
            $table->string('time')->nullable();
            $table->integer('available_seat')->nullable();
            $table->integer('price')->nullable();
            $table->string('language')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('category_id')->nullable();
            $table->string('is_featured')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
