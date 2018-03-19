<?php

namespace App\Http\Controllers;

use App\Notifications\Accept;
use App\Notifications\IR;
use App\Notifications\PPF;
use App\Notifications\PSF;
use App\Notifications\PPFDecline;
use App\Notifications\PSFDecline;
use App\Notifications\Decline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Project;
use App\User;
use Notification;

class ApprovalController extends Controller
{
    public function approval()
    {
        $projectrequest = DB::table('posts')->get();
        return view('projectrequest',['projectrequests' => $projectrequest]);
    }

    public function acceptdecline (Request $request)
    {
        if ($request->input('accept') =='accept')
        {
            //action for accept
            $project = Project::find($request->input('project_id'));
            $project->owner = $request->input('name');
            $project->category = "PPF";
            $project->user_id =  $request->input('user_id');
            $project->status = "Not Available";
            $project->save();
            //remove post
            DB::table('posts')->where('id', '=', $request->input('id'))->delete();
            //Find user email and send
            //Approved email to student.
            $student = User::find($request->input('user_id'));
            Notification::route('mail',$student->email)->notify(new Accept()); //Send the formatted email function.
            session()->flash('notif','Request Accepted!');
            return back();
        }
        if ($request->input('decline')=='decline')
        {
            //action for decline
            $project = Project::find($request->input('project_id'));
            $project->category = ""; //Back to default
            $project->save();

            DB::table('posts')->where('id', '=', $request->input('id'))->delete();
            //Rejected email for student.
            $student = User::find($request->input('user_id'));
            Notification::route('mail',$student->email)->notify(new Decline()); //Send the formatted email function.
            session()->flash('notif2','Request Declined!');
            return back();
        }
    }

    public function ppf(Request $request)
    {
        $input = $request->input('search');
        $ppfs = DB::table('projects')->where([['info','like','%'.$input.'%'],
                                             ['category','=','PPF']])
                                     ->orwhere([['title', 'like', '%'.$input.'%'],
                                             ['category','=','PPF']])
                                     ->orwhere([['owner', 'like', '%'.$input.'%'],
                                                ['category','=','PPF']])->get();
        return view('ppfapproval',['ppfs' => $ppfs]); //get all data to the view
    }
    //PPF Accept Decline
    public function ppfacceptdecline (Request $request)
    {
        if ($request->input('accept') =='accept')
        {
            //action for accept
            $project = Project::find($request->input('id'));
            $project->category = "PSF";
            $project->save();
            //Find user email and send
            //Approved email to student.
            $student = User::find($request->input('user_id'));
            Notification::route('mail',$student->email)->notify(new PPF()); //Send the formatted email function.
            session()->flash('notif','Request Accepted!');
            return back();
        }
        if ($request->input('decline')=='decline')
        {
            //action for decline
            //Rejected email for student.
            $student = User::find($request->input('user_id'));
            Notification::route('mail',$student->email)->notify(new PPFDecline()); //Send the formatted email function.
            session()->flash('notif2','Request Declined!');
            return back();
        }
    }

    public function psf(Request $request)
    {
        $input = $request->input('search');
        $psfs = DB::table('projects')->where([['info','like','%'.$input.'%'],
            ['category','=','PSF']])
            ->orwhere([['title', 'like', '%'.$input.'%'],
                ['category','=','PSF']])
            ->orwhere([['owner', 'like', '%'.$input.'%'],
                ['category','=','PSF']])->get();
        return view('psfapproval',['psfs' => $psfs]); //get all data to the view
    }
    //PSF Accept Decline
    public function psfacceptdecline (Request $request)
    {
        if ($request->input('accept') =='accept')
        {
            //action for accept
            $project = Project::find($request->input('id'));
            $project->category = "IR";
            $project->save();
            //Find user email and send
            //Approved email to student.
            $student = User::find($request->input('user_id'));
            Notification::route('mail',$student->email)->notify(new PSF()); //Send the formatted email function.
            session()->flash('notif','Request Accepted!');
            return back();
        }
        if ($request->input('decline')=='decline')
        {
            //action for decline
            //Rejected email for student.
            $student = User::find($request->input('user_id'));
            Notification::route('mail',$student->email)->notify(new PSFDecline()); //Send the formatted email function.
            session()->flash('notif2','Request Declined!');
            return back();
        }
    }

    public function ir(Request $request)
    {
        $input = $request->input('search');
        $ir = DB::table('projects')->where([['info','like','%'.$input.'%'],
            ['category','=','IR']])
            ->orwhere([['title', 'like', '%'.$input.'%'],
                ['category','=','IR']])
            ->orwhere([['owner', 'like', '%'.$input.'%'],
                ['category','=','IR']])->get();
        return view('irapproval',['irs' => $ir]); //get all data to the view
    }
    //PSF Accept Decline
    public function iracceptdecline (Request $request)
    {
        if ($request->input('accept') =='accept')
        {
            //action for accept
            //Find user email and send
            //Approved email to student.
            $student = User::find($request->input('user_id'));
            $project = Project::find($request->input('id'));
            $project->category = "";
            $project->owner="";
            $project->status = "Available";
            $project->user_id = null;
            $project->save();
            Notification::route('mail',$student->email)->notify(new IR()); //Send the formatted email function.
            session()->flash('notif','Request Accepted!');
            return back();
        }
    }
}
