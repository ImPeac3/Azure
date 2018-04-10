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
        $schedule->departuredate = '2018/04/13';
        $schedule->arrivaldate = '2018/04/20';
        $schedule->vesselcapacity = '100';
        $schedule->departurelocation= 'Lahad Datu Port (Sabah)';
        $schedule->arrivallocation= 'Johor Port (Johor)';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Victoria Secret';
        $schedule->vesselnumber = '1234';
        $schedule->departuredate = '2018/04/13';
        $schedule->arrivaldate = '2018/04/20';
        $schedule->vesselcapacity = '100';
        $schedule->departurelocation= 'Kemaman Port (Terengganu)';
        $schedule->arrivallocation= 'Peneng Port (Peneng)';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Tide Waves';
        $schedule->vesselnumber = '5678';
        $schedule->departuredate = '2018/04/20';
        $schedule->arrivaldate = '2018/04/25';
        $schedule->vesselcapacity = '200';
        $schedule->departurelocation= 'Kemaman Port (Terengganu)';
        $schedule->arrivallocation= 'Peneng Port (Peneng)';
        $schedule->save();

        $schedule = new Schedule;
        $schedule->vesselname = 'Kunkka Sail';
        $schedule->vesselnumber = '8888';
        $schedule->departuredate = '2018/05/09';
        $schedule->arrivaldate = '2018/05/13';
        $schedule->vesselcapacity = '0';
        $schedule->departurelocation= 'Rajang (Johor)';
        $schedule->arrivallocation= 'Tawau Port (Sabah)';
        $schedule->save();
    }
}
