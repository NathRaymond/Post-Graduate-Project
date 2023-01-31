<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\LGA;
use App\Models\State;
use App\Models\Programmes;
use App\Models\Course;
use App\Models\Countries;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data['students']= Student::all();

        return view('admin.student.index',$data);
    }

    public function viewDetails (Request $request)
    {
        $id = $request->id;
        $data['student'] = Student::find($id);
        $data['countries'] = Countries::all();
        $data['programmes'] = Programmes::all();
        $data['courses'] = Course::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        return view('admin.student.details', $data);

    }
}
