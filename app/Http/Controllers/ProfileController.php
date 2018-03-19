<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('editprofile');
    }

    public function updateProfile(Request $request)
    {
        //validation
        $request->validate([
            'contact' => 'string|min:10|max:11',
            'password' => 'string',
            ]);
        //save into database
        $user = User::find(Auth::id());
        $user->contact = $request->input('contact');
        $user->password = bcrypt($request->input('password'));
        $user->interest = $request->input('interest');
        $user->save();
        session()->flash('notif','Profile is successfully Updated!');
        return back();
    }

    public function searchSupervisorProfile(Request $request)
    {
        $input = $request->input('search');
        $supervisors = DB::table('users')->where([['name','like','%'.$input.'%'],
                                                 ['intake','=',null]])
                                                  ->orwhere([['course', 'like', '%'.$input.'%'],
                                                 ['intake','=',null]])
                                                  ->orwhere([['interest', 'like', '%'.$input.'%'],
                                                 ['intake','=',null]])->get();

        return view('supervisorprofile',['supervisors' => $supervisors]); //get all data to the view
    }

}
