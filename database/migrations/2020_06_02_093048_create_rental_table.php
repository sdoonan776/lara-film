<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental', function (Blueprint $table) {
            $table->increments('rental_id');
            $table->dateTime('rental_date');
            $table->integer('inventory_id');
            $table->integer('customer_id');
            $table->dateTime('return_date');
            $table->integer('staff_id');
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
        Schema::dropIfExists('rental');
    }
}
