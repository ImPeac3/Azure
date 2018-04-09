<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Notifications\BookingInvoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use App\Role;
use App\Schedule;
use App\User;
use Notification;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('createschedule');
    }

    public function viewvessel()
    {
        $schedules = DB::table('schedules')->where('vesselcapacity','<>','0')->get();
        return view('vesselbooking',['schedules' => $schedules]);
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
        $schedule->vesselname = $request->input('vesselname');
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

    public function viewbookings ()
    {
        $bookings = DB::table('bookings')
            ->join('schedules', 'schedules.id', '=', 'bookings.schedule_id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.*', 'schedules.vesselname as vesselname',
                'users.name as username',
                'schedules.vesselcapacity as slot',
                'schedules.departuredate as ddate',
                'schedules.arrivaldate as adate',
                'schedules.departurelocation as dlocation',
                'schedules.arrivallocation as alocation')
            ->get();
        return view('viewbooking',['bookings' => $bookings]); //get all data to the view
    }

    public function viewslots()
    {
        $schedules = Schedule::all();
        return view('vesselslot',['schedules' => $schedules]); //get all data to the view
    }

    public function searchvessel(Request $request)
    {
        $schedules = DB::table('schedules')->where([['departurelocation','like','%'.$request->input('departurelocation').'%'],
                                                    ['arrivallocation','like','%'.$request->input('arrivallocation').'%'],
                                                    ['vesselcapacity','<>','0']])->get();

        return view('vesselbooking',['schedules' => $schedules]);
    }

    public function createbooking(Request $id)
    {
        $customers = Role::where('name','customer')->first()->users()->get();
        $data=Schedule::find($id);
        return view('additem',['data' => $data],['customers' =>$customers]);
    }

    public function savebooking(Request $request)
    {
        $booking = new Booking;
        $booking->containerquantity = $request->input('containerquantity'); //must unique?
        $booking->containersize = $request->input('containersize');
        $booking->containertype = $request->input('containertype');
        $booking->itemtype = $request->input('itemtype');
        $booking->itemquantity = $request->input('itemquantity');
        $booking->itemdescription = $request->input('itemdescription');
        $booking->schedule_id = $request->input('schedule_id');
        $booking->user_id = $request->input('customer_id');
        $booking->save();
        $schedule = Schedule::find($request->input('schedule_id'));
        $schedule->decrement('vesselcapacity',$request->input('containerquantity'));
        $schedule->save();
        $customer = User::find($request->input('customer_id'));
        Notification::route('mail',$customer['email'])->notify(new BookingInvoice());
        session()->flash('notif','Booking Created Successfully!');
        return back();
    }
}
