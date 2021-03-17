<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_metadata', function (Blueprint $table) {
            $table->boolean('adult');
            $table->text('belongs_to_collection')->nullable();
            $table->integer('budget');
            $table->text('genres');
            $table->string('homepage')->nullable();
            $table->integer('id');
            $table->string('imdb_id');
            $table->string('original_language')->nullable();
            $table->string('original_title')->nullable();
            $table->longText('overview');
            $table->float('popularity', 8, 6)->nullable();
            $table->string('poster_path')->nullable();
            $table->text('production_companies')->nullable();
            $table->text('production_countries')->nullable();
            $table->date('release_date')->nullable();
            $table->integer('revenue')->nullable();
            $table->integer('runtime');
            $table->text('spoken_languages')->nullable();
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
        Schema::dropIfExists('movie_metadata');
    }
}
