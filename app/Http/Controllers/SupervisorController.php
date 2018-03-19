<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Project;
use App\User;
use App\Notifications\Supervisor;
use Notification;

class SupervisorController extends Controller
{
    public function assign()
    {
        $markers = DB::table('users')->where('intake','=',null)->select('id','name')->get();
        $projects = DB::table('projects')->where([['status','=','Pending'],['category','=','Pending']])->get();
        return view('assignmarker',['projects' => $projects],['markers'=>$markers]); //get all data to the view
    }

    public function store(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->fmarker_id = $request->input('fmarker');
        $project->smarker_id =  $request->input('smarker');
        $project->status = "";
        $project->category = "PPF";
        $project->save();
        $student = User::find($request->input('user_id'));
        Notification::route('mail',$student->email)->notify(new Supervisor()); //Send the formatted email function.
        session()->flash('notif','Markers/Supervisor Assigned Successfully!');
        return back();
    }
}
