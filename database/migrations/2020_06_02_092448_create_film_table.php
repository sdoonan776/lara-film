<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->increments('film_id');
            $table->boolean('adult');
            $table->set('belongs_to_collection', ['id', 'name', 'poster_path', 'backdrop_path'])->nullable()->default(null);
            $table->integer('budget');
            $table->set('genres', ['id', 'name'])->nullable()->default(null);
            $table->string('homepage')->nullable()->default(null);
            $table->integer('id');
            $table->string('imdb_id');
            $table->string('original_language')->nullable();
            $table->integer('original_title')->nullable();
            $table->longText('overview');
            $table->float('popularity', 9, 3);
            $table->set('production_companies', ['id', 'name'])->nullable()->default(null);
            $table->set('production_countries', ['iso_3166_1', 'name'])->nullable()->default(null);
            $table->date('release_date');
            $table->integer('revenue');
            $table->integer('runtime');
            $table->set('spoken_languages', ['iso_639_1', 'name'])->nullable()->default(null);
            $table->string('status');
            $table->string('tagline');
            $table->string('title');
            $table->float('vote_average', 2, 1);
            $table->integer('vote_count');

            $table->tinyInteger('rental_duration')->default(3);
            $table->integer('rental_rate')->default(499);
            $table->integer('length')->nullable();
            $table->integer('replacement_cost')->default(1999);
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17'])->default('G');
            $table->set('special_features', ['Trailers', 'Commentaries', 'Deleted Scenes', 'Behind the Scenes'])->nullable()->default(null);
            $table->dateTime('last_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_metadata');
    }
}
