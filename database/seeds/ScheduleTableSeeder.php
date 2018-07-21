<?php

use Illuminate\Database\Seeder;
use App\Schedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule = new Schedule;
        $schedule->vesselname = 'Royal Navy';
        $schedule->vesselnumber = '8888';
        $schedule->departuredate = '2018/07/01';
        $schedule->arrivaldate = '2018/07/15';
        $schedule->vesselcapacity = '200';
        $schedule->departurelocation= 'Port A';
        $schedule->arrivallocation= 'Port G';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Salamander';
        $schedule->vesselnumber = '5253';
        $schedule->departuredate = '2018/07/05';
        $schedule->arrivaldate = '2018/07/20';
        $schedule->vesselcapacity = '200';
        $schedule->departurelocation= 'Port H';
        $schedule->arrivallocation= 'Port D';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Flowing Glory';
        $schedule->vesselnumber = '6256';
        $schedule->departuredate = '2018/07/07';
        $schedule->arrivaldate = '2018/07/14';
        $schedule->vesselcapacity = '100';
        $schedule->departurelocation= 'Port G';
        $schedule->arrivallocation= 'Port B';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Majestic V';
        $schedule->vesselnumber = '7875';
        $schedule->departuredate = '2018/07/20';
        $schedule->arrivaldate = '2018/07/30';
        $schedule->vesselcapacity = '100';
        $schedule->departurelocation= 'Port C';
        $schedule->arrivallocation= 'Port F';
        $schedule->save();
    }
}
