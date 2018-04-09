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
    public function searchprofile()
    {
        return view('editprofile');
    }

    public function updateProfile(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'string',
            'contact' => 'string|min:10|max:11',
            'email' => 'string',
            'password' => 'string',
            ]);
        //save into database
        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->contact = $request->input('contact');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->save();
        session()->flash('notif','Profile is successfully Updated!');
        return back();
    }

}
