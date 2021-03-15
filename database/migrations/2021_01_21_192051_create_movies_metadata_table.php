<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_metadata', function (Blueprint $table) {
            $table->integer('id');
            $table->boolean('adult');
            $table->json('belongs_to_collection')->nullable();
            $table->integer('budget');
            $table->set('genres', ['id', 'name']);
            $table->string('homepage')->nullable();
            $table->integer('imdb_id');
            $table->string('original_language')->nullable();
            $table->string('original_title')->nullable();
            $table->longText('overview');
            $table->float('popularity', 8, 6)->nullable();
            $table->string('poster_path')->nullable();
            $table->set('production_companies', ['name', 'id'])->nullable();
            $table->set('production_countries', ['iso_3166_1', 'name'])->nullable();
            $table->date('release_date')->nullable();
            $table->integer('revenue')->nullable();
            $table->integer('runtime');
            $table->set('spoken_languages', ['iso_639_1', 'name'])->nullable();
            $table->string('status');
            $table->string('tagline');
            $table->string('title');
            $table->boolean('video');
            $table->float('vote_average', 2, 1);
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
        Schema::dropIfExists('movies_metadata');
    }
}
