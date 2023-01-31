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
use App\Models\Applicant;
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
        $data['referees'] = StudentReferee::where('applicant_id', Auth::user()->applicant_id)->get();
        $data['publications'] = Publication::where('applicant_id', Auth::user()->applicant_id)->get();
        $data['stdcourses'] = StudentCourse::where('applicant_id', Auth::user()->applicant_id)->first();
        $data['appointments'] = StudentAppointment::where('applicant_id', Auth::user()->applicant_id)->get();
        $data['certificates'] = StudentCertificate::where('applicant_id', Auth::user()->applicant_id)->first();
        $data['olevels'] = StudentOLevel::where('applicant_id', Auth::user()->applicant_id)->get();
        $data['homeaddress'] = StudentHomeAdd::where('applicant_id', Auth::user()->applicant_id)->first();
        $data['studcontacts'] = StudentContact::where('applicant_id', Auth::user()->applicant_id)->first();
        $data['prizes'] = Prize::where('applicant_id', Auth::user()->applicant_id)->get();
        $data['biodatas'] = Applicant::where('id', Auth::user()->applicant_id)->first();
        // dd($data['biodatas']);
        // $data['biodatas'] = Student::where('id', Auth::user()->applicant_id)->first();
        // dd($data);
        return view('student.registration', $data);
    }
    public function studentpayment(){
        return view('student.payment');
    }

    public function registerstudent(Request $request){
        // dd($request->all());
        $input = $request->all();
        $input['is_complete'] = 1;
        $student = Applicant::find(Auth::user()->applicant_id);
        if ($student) {
            $this->validate($request, [
                'surname'=> 'required',
                'firstname'=> 'required',
                'middlename'=> 'required',
                'sex'=> 'required',
                'marital_status'=> 'required',
                'state_of_origin'=> 'required',
                'dob'=> 'required',
                'country'=> 'required',
                'religion'=> 'required',
                'phone_number'=> 'required',
                'alt_phone_number'=> 'required',
                'email'=> 'required',
                'alt_email'=> 'required',
                // 'is_complete'=> [1],
            ]);

            $student->update($input);
        }

        $studinput = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $studentconatact = StudentContact::where('applicant_id', Auth::user()->applicant_id)->first();
        if ($studentconatact) {
            $this->validate($request, [
                'cont_email'=> 'required',
                'cont_country_id'=> 'required',	
                'cont_state'=> 'required',
                'cont_city'	=> 'required',
                'cont_c_o'=> 'required',
            ]);
            // $studentconatact->applicant_id = $student->id;
            $studentconatact->update($studinput);
        }else{
            StudentContact::create($input);
        }
        
        $homeinput = $request->all();
        $studenthomeaddress = StudentHomeAdd::where('applicant_id', Auth::user()->applicant_id)->first();
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
        $studinput['applicant_id'] = Auth::user()->applicant_id;
        $studentcourse = StudentCourse::where('applicant_id', Auth::user()->applicant_id)->first();
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
            $applicinput = $request->all();
            $studentconatact = Applicant::where('id', Auth::user()->applicant_id)->first();
            $studentconatact['is_complete'] = 2;
            $studentconatact->update($applicinput);
        return redirect()->back()->with('message', 'Course updated successfully');
    }

    public function create_appointmentreg(Request $request){
        $input = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $user = StudentAppointment::create($input);
        return redirect()->back()->with('message', 'Appointment updated successfully');
    }

    public function create_refreereg(Request $request){
        $input = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $user = StudentReferee::create($input);
        return redirect()->back()->with('message', 'Refree updated successfully');
    }

    public function create_olevelreg(Request $request){
        $input = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $user = StudentOLevel::create($input);

        $olevelinput = $request->all();
        // $studentolevel = Applicant::where('id', Auth::user()->applicant_id)->first();
        $applicant = Applicant::where('id', $input['applicant_id'])->first();
        $isComplete = $applicant->is_complete;
        $applicant->update(['is_complete' => $isComplete + 1])
dd($isComplete);
        $studentolevel['is_complete'] = count() + 1;
        $studentolevel->update($olevelinput);

        return redirect()->back()->with('message', 'Olevel updated successfully');
    }

    public function create_prizereg(Request $request){
        $input = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $user = Prize::create($input);
        return redirect()->back()->with('message', 'Prize updated successfully');
    }

    public function create_publicationreg(Request $request){
        $input = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $user = Publication::create($input);
        return redirect()->back()->with('message', 'Publication updated successfully');
    }

    public function create_certificatereg(Request $request){
        $studinput = $request->all();
        $input['applicant_id'] = Auth::user()->applicant_id;
        $StudentCertificate = StudentCertificate::where('applicant_id', Auth::user()->applicant_id)->first();
        if ($StudentCertificate) {
            $this->validate($request, [
                'school'=> 'required',
                'matric_number'=> 'required',
                'country'=> 'required',
                'town'=> 'required',
                'year'=> 'required',
                'date_obtained'=> 'required',
                'class_of_degree'=> 'required',
                'certificate'=> 'required',
                'cgpa'=> 'required',
            ]);
            $StudentCertificate->update($studinput);
        }else{
            StudentCertificate::create($studinput);
        }

        $olevelinput = $request->all();
        $studentolevel = Applicant::where('id', Auth::user()->applicant_id)->first();
        $studentolevel['is_complete'] = count() + 1;
        $studentolevel->update($olevelinput);

        return redirect()->back()->with('message', 'Certificate updated successfully');
    }
}
