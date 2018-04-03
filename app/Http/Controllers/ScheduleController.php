<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('createschedule');
    }

    public function createschedule(Request $request)
    {
        $request->validate([
            'vesselname' => 'string',
            'vesselnumber' => 'string',
            'departuredate' => 'string',
            'arrivaldate' => 'string',
            'vesselcapacity' => 'string',
            'departurelocation' => 'string',
            'arrivallocation' => 'string',
        ]);

        $schedule = new Schedule;
        $schedule->vesselname = $request->input('vesselname'); //must unique?
        $schedule->vesselnumber = $request->input('vesselnumber');
        $schedule->departuredate = $request->input('from');
        $schedule->arrivaldate = $request->input('to');
        $schedule->vesselcapacity = $request->input('vesselcapacity');
        $schedule->departurelocation= $request->input('departurelocation');
        $schedule->arrivallocation= $request->input('arrivallocation');
        $schedule->save();
        session()->flash('notif','Schedule Created Successfully!');
        return back();
    }
}
