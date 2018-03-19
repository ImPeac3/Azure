<?php

namespace App\Http\Controllers;

use App\Notifications\NewPost;
use Illuminate\Http\Request;
use App\Post;
use Notification;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        //Save Request to Database
        $post = new Post();
        $post->title = "Final Year Project Request";
        $name = Auth::user()->name;
        $post->name = Auth::user()->name;
        $post->user_id = Auth::user()->id;
        $post->project_id = $request->input('id');
        $title = $request->input('title');
        $post->contents = "Student $name Would like to work on your Project-$title.";
        $post->save();

        //Change the category of the project to request.
        $project = $request->input('id');
        $update = Project::find($project);
        $update->category = 'Request';
        $update->save();

        //Send email to receipient from Noreply
        $fmarker = User::where('id', $request->input('fmarker'))->first();
        $mail = $fmarker->email;
        Notification::route('mail',$mail)->notify(new NewPost()); //Send the formatted email function.
        session()->flash('notif','Request Sent! Please check your email for approval');
        return back();
    }
}
