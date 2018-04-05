<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use App\User;
use App\Role;

class RegisterController extends Controller
{
    public function addagentform()
    {
        return view('addagent');
    }

    public function addcustomerform()
    {
        return view('addcustomer');
    }

    public function addagent(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);

        $role_agent = Role::where('name','Agent')->first();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $user->attachRole($role_agent);
        session()->flash('notif','Agent Registered Successfully!');
        return back();
    }

    public function addcustomer(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);

        $role_customer = Role::where('name','Customer')->first();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $user->attachRole($role_customer);
        session()->flash('notif','Customer Registered Successfully!');
        return back();
    }
}

