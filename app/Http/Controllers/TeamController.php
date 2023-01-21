<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teamindex()
    {
        return view('team');
    }
    public function agent_details()
    {
        return view('agent-details');
    }
}
