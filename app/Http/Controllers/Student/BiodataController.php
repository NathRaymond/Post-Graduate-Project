<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentCourse;

class BiodataController extends Controller
{
    public function studentbiodata(){
        $data['courses'] = StudentCourse::all();
        return view('student.biodata', $data);
    }
}
