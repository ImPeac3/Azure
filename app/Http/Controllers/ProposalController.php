<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use APP\User;
use App\Project;

class ProposalController extends Controller
{
    //Lecturer's Proposal Controler

    public function index()
    {
        //Select Lecturer Id and Name
        $markers = DB::table('users')->where('intake','=',null)->select('id','name')->get();
        return view('createproposal',['markers'=>$markers]);
    }

    public function edit(Request $request)
    {
        $input = $request->input('search');
        $markers = DB::table('users')->where('intake','=',null)->select('id','name')->get();
        $projects = DB::table('projects')->where([['title','like','%'.$input.'%'],
                                                    ['owner','not like','TP']])->get();
        return view('editproposal',['projects' => $projects],['markers'=>$markers]); //get all data to the view
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|string',
            'programme' => 'required|string',
        ]);
        //Store into Database

            $project = new Project;
            $project->title = $request->input('title'); //must unique?
            $project->programme = $request->input('programme');
            $project->owner ="";
            $filename = $request->file->getClientOriginalName(); //Get the File name
            $request->file->storeAs('public/upload',$filename); //Store the filename on the path (storage/app/public/upload)
            $project->info = $filename; //Store the file name to database
            $project->difficulty = $request->input('difficulty');
            $project->status = $request->input('status');
            $project->category="";
            $project->fmarker_id= $request->input('fmarker');
            $project->smarker_id= $request->input('smarker');
            $project->save();
            session()->flash('notif','Proposal Saved Successfully!');
            return back();

    }

    public function update(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'string',
            'programme' => 'string',
        ]);

        //Update into Database
        $projectid = $request->input('id');
        $update = Project::find($projectid);
        $update->title = $request->input('title');
        $update->programme = $request->input('programme');
        if ($request->hasFile('file')) //Validation for File
        {
                //Remove old file
/*               $oldfile = $request->input('oldfile');
                unlink(storage_path('app/public/upload/' . $oldfile));*/
                //Save new file
                $filename = $request->file->getClientOriginalName(); //Get the File name
                $request->file->storeAs('public/upload', $filename); //Store the new file into path
                $update->info = $filename; //Store the file name to database
        }
        $update->difficulty = $request->input('difficulty');
        $update->status = $request->input('status');
        $update->category="";
        $update->save();
        session()->flash('notif','Proposal Updated Successfully!');
        return back();
        }

        public function search(Request $request)
        {
            $input = $request->input('search');

            $projects = DB::table('projects')->where([['title','like',$input.'%'],
                ['status','=','Available']])->get();
            return view('deleteproposal',['projects' => $projects]); //get all data to the view
        }

        public function delete(Request $request)
        {
            $projectid = $request->input('id');
            DB::table('projects')->where('id', '=', $projectid)->delete();
            $file = $request->input('oldfile');
            unlink(storage_path('app/public/upload/' . $file));
            session()->flash('notif','Proposal Deleted!');
            return back();
        }

    public function Superviseelist()
    {
        $projects = Project::all();
        $fmarkers = Project::with('user')->where('fmarker_id','=',Auth::user()->id)->get();
        $smarkers = Project::with('user')->where('smarker_id','=',Auth::user()->id)->get();
        return view('superviseelist',['fmarkers' => $fmarkers],['smarkers'=>$smarkers]); //get all data to the view
    }
        //Lectuere Proposal Controller Ended Here

        //############################################################################################

        //Student Proposal Controller Starts Here
        public function stdindex()
        {
            return view('studentcreateproposal');
        }

        public function searchproposal(Request $request)
        { //Bug fixed
            $input = $request->input('search');
            $proposals = DB::table('projects')->where([['title','like','%'.$input.'%'],
                                                        ['difficulty','<>','']])
                                              ->orwhere([['programme', 'like', '%'.$input.'%'],
                                                        ['difficulty','<>','']])->get();
            return view('selectproposal',['proposals' => $proposals]); //get all data to the view
        }

    public function studentstore(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'string',
            'programme' => 'string',
        ]);
        //Store into Database
        $project = new Project;
        $project->title = $request->input('title'); //must unique?
        $project->programme = Auth::user()->course;
        $project->owner = Auth::user()->name;
        $filename = $request->file->getClientOriginalName(); //Get the File name
        $request->file->storeAs('public/upload',$filename); //Store the filename on the path (storage/app/public/upload)
        $project->info = $filename; //Store the file name to database
        $project->difficulty = "";
        $project->user_id = Auth::user()->id;
        $project->status = "Pending";
        $project->category = "Pending";
        $project->save();
        session()->flash('notif','Proposal Uploaded Successfully!');
        return back();

    }

    public function studentupdateproposal(Request $request) //Progress stop here
    {
        $projects = Project::all();
        $projects = Project::with('user')->where('user_id','=',Auth::user()->id)->get();
        return view('stdupdateproposal',['projects' => $projects]); //get all data to the view
    }

    public function stdeditproposal(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'string',
            'programme' => 'string',
        ]);
        //Update into Database
        $projectid = $request->input('id');
        $update = Project::find($projectid);
        $update->title = $request->input('title');
        if ($request->hasFile('file')) //Validation for File
        {
            //Remove old file
/*            $oldfile = $request->input('oldfile');
            unlink(storage_path('app/public/upload/' . $oldfile));*/
            //Save new file
            $filename = $request->file->getClientOriginalName(); //Get the File name
            $request->file->storeAs('public/upload', $filename); //Store the new file into path
            $update->info = $filename; //Store the file name to database
        }
        $update->save();
        session()->flash('notif','Proposal Updated Successfully!');
        return back();
    }
}
