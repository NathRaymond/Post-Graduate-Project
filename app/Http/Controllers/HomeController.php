<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Applicant;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboard()
    {
        $data['users'] = User::where('user_type', "admin")->take(10)->get();
        return view('admin.dashboard', $data);
    }

    public function studentDashboard()
    {
        $data['applicant'] = Applicant::where('id', Auth::user()->applicant_id)->first();
        $data['stdcourses'] = StudentCourse::where('applicant_id', Auth::user()->applicant_id)->first();
         
        return view('student.dashboard', $data);
    }
}
