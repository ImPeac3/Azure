<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vesselname');
            $table->string('vesselnumber');
            $table->date('departuredate');
            $table->date('arrivaldate');
            $table->string('vesselcapacity');
            $table->string('departurelocation');
            $table->string('arrivallocation');
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
        Schema::dropIfExists('schedule');
    }
}
