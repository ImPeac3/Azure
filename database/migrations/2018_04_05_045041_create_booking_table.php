<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargoquantity');
            $table->string('cargosize');
            $table->string('cargotype');
            $table->string('itemtype');
            $table->string('itemquantity');
            $table->string('itemdescription');
            $table->integer('schedule_id')->nullable()->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedule');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
