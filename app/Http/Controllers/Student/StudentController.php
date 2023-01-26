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
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function studentindex(){
        $data['courses'] = StudentCourse::all();
        return view('student.dashboard', $data);
    }

    public function studentregistration(){
        $data['programmes'] = Programmes::all();
        $data['departments'] = Department::all();
        $data['countries'] = Countries::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        $data['courses'] = Course::all();
        $data['subjects'] = Subject::all();
        $data['referees'] = StudentReferee::all();
        $data['publications'] = Publication::all();
        return view('student.registration', $data);
    }
    public function studentpayment(){
        return view('student.payment');
    }
    
    public function registerstudent(Request $request){
        try {
            $input = $request->all();
            $student = Student::create($request->all());
            $student->save();

            $studentcontact = new StudentContact;
            $studentcontact->student_id = $student->id;
            $studentcontact->email = $student->email;
            $studentcontact->country_id = $studentcontact->country;
            $studentcontact->state = $studentcontact->state;
            $studentcontact->city = $studentcontact->city;
            $studentcontact->c_o = $studentcontact->c_o;		
            $studentcontact->save();

            $studenthomeadd = new StudentHomeAdd;
            $studenthomeadd->student_id = $student->id;
            $studenthomeadd->country_id = $studenthomeadd->country;
            $studenthomeadd->state = $studenthomeadd->state;
            $studenthomeadd->town = $studenthomeadd->town;
            $studenthomeadd->street = $studenthomeadd->street;            				
            $studenthomeadd->save();
            dd($student, $studentcontact, $studenthomeadd);
            return api_request_response(
                'ok',
                'Record saved successfully!',
                success_status_code(),
            );
        } catch (\Exception $exception) {
            return api_request_response(
                'error',
                $exception->getMessage(),
                bad_response_status_code()
            );
        }
    }
    
    public function create_coursereg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->id;
        $user = StudentCourse::create($input);
        return redirect()->back()->with('message', 'Course added successfully');
    }

    public function create_appointmentreg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->id;
        $user = StudentAppointment::create($input);
        return redirect()->back()->with('message', 'Appointment added successfully');
    }

    public function create_refreereg(Request $request){
        $input = $request->all();
        $user = StudentReferee::create($input);
        return redirect()->back()->with('message', 'Refree added successfully');
    }

    public function create_olevelreg(Request $request){
        $input = $request->all();
        $user = StudentOLevel::create($input);
        return redirect()->back()->with('message', 'Olevel added successfully');
    }

    public function create_prizereg(Request $request){
        $input = $request->all();
        $user = Prize::create($input);
        return redirect()->back()->with('message', 'Prize added successfully');
    }

    public function create_publicationreg(Request $request){
        $input = $request->all();
        $input['student_id'] = Auth::user()->id;
        $user = Publication::create($input);
        return redirect()->back()->with('message', 'Publication added successfully');
    }
}
