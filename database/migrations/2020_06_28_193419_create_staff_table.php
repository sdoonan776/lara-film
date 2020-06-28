<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('staff_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('address_id');
            $table->binary('picture')->nullable();
            $table->string('email')->nullable();
            $table->integer('store_id');
            $table->boolean('active')->default(true);
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('staff');
    }
}
