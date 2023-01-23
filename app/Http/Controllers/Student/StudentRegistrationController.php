<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function studentregistration(){
        return view('student.registration');
    }
    public function studentpayment(){
        return view('student.payment');
    }
}
