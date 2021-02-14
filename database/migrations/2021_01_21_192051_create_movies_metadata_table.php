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
            $table->enum('belongs_to_collection', ['id', 'name', 'poster_path', 'backdrop_path', ])->nullable();
            $table->integer('budget');
            $table->set('genres', ['id', 'name']);
            $table->string('homepage')->nullable();
            $table->integer('imdb_id');
            $table->string('original_language')->nullable();
            $table->string('original_title')->nullable();
            $table->string('overview');
            $table->float('popularity', 1, 7)->nullable();
            $table->string('poster_path')->nullable();
            $table->set('production_companies', [''])->nullable();
            $table->set('production_countries', [''])->nullable();
            $table->date('release_date')->nullable();
            $table->float('revenue', 2, 4)->nullable();
            $table->integer('runtime');
            $table->integer('spoken_languages');
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
