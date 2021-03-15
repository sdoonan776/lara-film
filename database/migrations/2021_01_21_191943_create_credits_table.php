<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->integer('id');
            $table->set('cast', ['cast_id', 'character', 'credit_id', 'gender', 'id', 'name', 'order', 'profile_path']);
            $table->set('crew', ['credit_id', 'department', 'gender', 'id', 'job', 'name', 'profile_path']);
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
        Schema::dropIfExists('credits');
    }
}
