<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->boolean('adult');
            $table->string('backdrop_path')->nullable();
            $table->json('genres');
            $table->json('belongs_to_collection')->nullable();
            $table->integer('budget');
            $table->string('homepage')->nullable();
            $table->string('imdb_id')->nullable();
            $table->integer('movie_id');
            $table->string('original_language');
            $table->string('original_title');
            $table->text('overview')->nullable();
            $table->integer('popularity');
            $table->string('poster_path')->nullable();
            $table->json('production_companies');
            $table->json('production_countries');
            $table->string('release_date');
            $table->bigInteger('revenue');
            $table->integer('runtime')->nullable();
            $table->json('spoken_languages');
            $table->string('status');
            $table->string('tagline')->nullable();
            $table->string('title');
            $table->boolean('video');
            $table->integer('vote_average');
            $table->integer('vote_count');
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
};
