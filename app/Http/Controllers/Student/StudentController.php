<?php

namespace App\Http\Controllers\Student;

use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LGA;
use App\Models\State;
use App\Models\Countries;
use App\Models\Department;
use App\Models\Programmes;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\StudentAppointment;
use App\Models\StudentReferee;
use App\Models\StudentOLevel;
use App\Models\Subject;
use App\Models\Prize;
use App\Models\Publication;
use App\Models\StudentCertificate;
use App\Models\Student;
use App\Models\StudentContact;
use App\Models\StudentHomeAdd;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function studentindex(){
        return view('student.dashboard');
    }

    public function studentregistration(){
        $data['programmes'] = Programmes::all();
        $data['departments'] = Department::all();
        $data['countries'] = Countries::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        $data['courses'] = Course::all();
        $data['subjects'] = Subject::all();
        $data['referees'] = StudentReferee::where('student_id', Auth::user()->student_id)->get();
        $data['publications'] = Publication::where('student_id', Auth::user()->student_id)->get();
        $data['stdcourses'] = StudentCourse::where('student_id', Auth::user()->student_id)->first();
        $data['appointments'] = StudentAppointment::where('student_id', Auth::user()->student_id)->get();
        $data['certificates'] = StudentCertificate::where('student_id', Auth::user()->student_id)->first();
        $data['olevels'] = StudentOLevel::where('student_id', Auth::user()->student_id)->get();
        $data['homeaddress'] = StudentHomeAdd::where('student_id', Auth::user()->student_id)->first();
        $data['studcontacts'] = StudentContact::where('student_id', Auth::user()->student_id)->first();
        $data['prizes'] = Prize::where('student_id', Auth::user()->student_id)->get();
        $data['biodatas'] = Student::where('id', Auth::user()->student_id)->first();
        // dd($data);
        return view('student.registration', $data);
    }
    public function studentpayment(){
        return view('student.payment');
    }

    public function registerstudent(Request $request){
        // dd($request->all());
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $student = Student::find(Auth::user()->student_id);
        if ($student) {
            $this->validate($request, [
                'surname'=> 'required',
                'firstname'=> 'required',
                'middlename'=> 'required',
                'sex'=> 'required',
                'marital_status'=> 'required',
                'state_of_origin'=> 'required',
                'dob'=> 'required',
                'nationality'=> 'required',
                'religion'=> 'required',
                'phone_number'=> 'required',
                'alt_phone_number'=> 'required',
                'email'=> 'required',
                'alt_email'=> 'required',
            ]);

            $student->update($input);
        }

        $studinput = $request->all();
        $studentconatact = StudentContact::where('student_id', Auth::user()->student_id)->first();
        if ($studentconatact) {
            $this->validate($request, [
                'cont_email'=> 'required',
                'cont_country_id'=> 'required',	
                'cont_state'=> 'required',
                'cont_city'	=> 'required',
                'cont_c_o'=> 'required',
            ]);
            // $studentconatact->student_id = $student->id;
            $studentconatact->update($studinput);
        }else{
            StudentContact::create($input);
        }
        
        $homeinput = $request->all();
        $studenthomeaddress = StudentHomeAdd::where('student_id', Auth::user()->student_id)->first();
        if ($studenthomeaddress) {
            $this->validate($request, [
                'hom_state'=> 'required',
                'hom_country_id'=> 'required',	
                'hom_town'=> 'required',
                'hom_street'=> 'required',
            ]);

            $studenthomeaddress->update = ($homeinput);
        }else{
            StudentHomeAdd::create($input);
        }

        
        return redirect()->back()->with('message', 'Biodata updated successfully');
    }

    public function create_coursereg(Request $request){
        $studinput = $request->all();
        $studentcourse = StudentCourse::where('student_id', Auth::user()->student_id)->first();
        if ($studentcourse) {
            $this->validate($request, [
                'dept_id'=> 'required',	
                'prog_id'=> 'required',	
                'course_id'=> 'required',	
                'mode_of_study'=> 'required',
            ]);
            $studentcourse->update($studinput);
        }else{
            StudentCourse::create($studinput);
        }
        return redirect()->back()->with('message', 'Course updated successfully');
    }

    public function create_appointmentreg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $user = StudentAppointment::create($input);
        return redirect()->back()->with('message', 'Appointment updated successfully');
    }

    public function create_refreereg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $user = StudentReferee::create($input);
        return redirect()->back()->with('message', 'Refree updated successfully');
    }

    public function create_olevelreg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $user = StudentOLevel::create($input);
        return redirect()->back()->with('message', 'Olevel updated successfully');
    }

    public function create_prizereg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $user = Prize::create($input);
        return redirect()->back()->with('message', 'Prize updated successfully');
    }

    public function create_publicationreg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $user = Publication::create($input);
        return redirect()->back()->with('message', 'Publication updated successfully');
    }

    public function create_certificatereg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->student_id;
        $user = StudentCertificate::create($input);
        return redirect()->back()->with('message', 'Certificate updated successfully');
    }
}
