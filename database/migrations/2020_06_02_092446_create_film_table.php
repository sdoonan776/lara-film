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
            $table->string('title');
            $table->text('description')->nullable();
            $table->year('release_year')->nullable();
            $table->integer('language_id');
            $table->integer('original_language_id')->nullable();
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
     * film_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT DEFAULT NULL,
  release_year YEAR DEFAULT NULL,
  language_id TINYINT UNSIGNED NOT NULL,
  original_language_id TINYINT UNSIGNED DEFAULT NULL,
  rental_duration TINYINT UNSIGNED NOT NULL DEFAULT 3,
  rental_rate DECIMAL(4,2) NOT NULL DEFAULT 4.99,
  length SMALLINT UNSIGNED DEFAULT NULL,
  replacement_cost DECIMAL(5,2) NOT NULL DEFAULT 19.99,
  rating ENUM('G','PG','PG-13','R','NC-17') DEFAULT 'G',
  special_features SET('Trailers','Commentaries','Deleted Scenes','Behind the Scenes') DEFAULT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     *
     * @return void
     */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film');
    }
}
