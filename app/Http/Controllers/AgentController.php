<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AgentController extends Controller
{
    public function viewagent()
    {
        $agents = User::whereHas('roles', function($q){
            $q->where('name', '=', 'Agent');
        })->get();
        return view('viewagent',['agents' => $agents]);
    }
}
