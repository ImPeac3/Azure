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
        $schedule->vesselname = 'Pearl Point';
        $schedule->vesselnumber = '1234';
        $schedule->departuredate = '4/13/2018';
        $schedule->arrivaldate = '4/20/2018';
        $schedule->vesselcapacity = '100';
        $schedule->departurelocation= 'Lahad Datu Port (Sabah)';
        $schedule->arrivallocation= 'Johor Port (Johor)';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Victoria Secret';
        $schedule->vesselnumber = '1234';
        $schedule->departuredate = '4/13/2018';
        $schedule->arrivaldate = '4/20/2018';
        $schedule->vesselcapacity = '100';
        $schedule->departurelocation= 'Kemaman Port (Terengganu)';
        $schedule->arrivallocation= 'Peneng Port (Peneng)';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Tide Waves';
        $schedule->vesselnumber = '5678';
        $schedule->departuredate = '4/21/2018';
        $schedule->arrivaldate = '4/25/2018';
        $schedule->vesselcapacity = '200';
        $schedule->departurelocation= 'Kemaman Port (Terengganu)';
        $schedule->arrivallocation= 'Peneng Port (Peneng)';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Kunkka Sail';
        $schedule->vesselnumber = '8888';
        $schedule->departuredate = '5/09/2018';
        $schedule->arrivaldate = '5/11/2018';
        $schedule->vesselcapacity = '0';
        $schedule->departurelocation= 'Rajang (Johor)';
        $schedule->arrivallocation= 'Tawau Port (Sabah)';
        $schedule->save();
    }
}
