<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('release_year')->nullable();

            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onUpdate('cascade');

            $table->integer('rental_price');
            $table->integer('length');
            $table->integer('replacement_cost');
            $table->enum('rating', ['easy']);

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
        Schema::dropIfExists('films');
    }
}
