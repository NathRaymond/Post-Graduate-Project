<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefreeController extends Controller
{
    public function studentrefree(){
        return view('student.refree');
    }
}
