<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\LGA;
use App\Imports\UploadApplicant;
use App\Imports\UploadStudent;
use App\Imports\UploadApplication;
use App\Models\State;
use App\Models\Applicant;
use App\Models\StudentOLevel;
use App\Models\Application;
use App\Models\Programmes;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\StudentPublication;
use App\Models\StudentPrize;
use App\Models\StudentReferee;
use App\Models\StudentRefereeQuestion;
use App\Mail\SendApplicationApproval;

use App\Models\StudentAppointment;
use App\Models\RefereeQuestion;
use App\Models\Countries;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{

    public function __construct()
    {
      $this->session = AcademicSession::latest()->first();
      Session::put('currentSession', $this->session);
    //   dd($this->session );
    }

    public function index()
    {
        $data['students']= Student::all();

        return view('admin.student.index',$data);
    }

    public function applicants()
    {
        $getsession = session()->get('currentSession');

        // dd($getsession->id);
        $data['students']= Applicant::where('session', $getsession->id)->get();

            return view('admin.student.applicants', $data);
    }

    public function applications()
    {
        $getsession = session()->get('currentSession');

        //only paid applications will be valid for checking and approval
        $data['applications']= Application::where('session_id', $getsession->id)->where('payment_status', 1)->get();

            return view('admin.student.applications', $data);
    }

    public function registered()
    {
        $getsession = session()->get('currentSession');
        $data['students']= Student::all();
        // dd($data);
        return view('admin.student.registered',$data);
    }
    public function viewDetails(Request $request)
    {
        $id = $request->id;
        $data['student'] =$student= Student::find($id);
        $data['countries'] = Countries::all();
        $data['application']= $application = Application::where('applicant_id', $student->id)->first();
        $data['studentOlevels'] = StudentOLevel::where('appRefNo', $student->applicantRefNo)->get();
        $data['publications'] = StudentPublication::where('appRefNo', $student->applicantRefNo)->get();
        $data['appointments'] = StudentAppointment::where('appRefNo', $student->applicantRefNo)->get();
        $data['prizes'] = StudentPrize::where('appRefNo', $student->applicantRefNo)->get();
        $data['referee'] = StudentReferee::where('appRefNo', $student->applicantRefNo)->get();
        $data['refereeresponse'] = StudentRefereeQuestion::where('appRefNo', $student->applicantRefNo)->get();
        $data['programmes'] = Programmes::all();
        $data['courses'] = Course::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        $data['recordType'] = 'student';
        return view('admin.student.details', $data);
    }
    public function applicantDetail(Request $request)
    {
        $id = $request->id;
        $data['student'] =$student= Applicant::find($id);
        $data['countries'] = Countries::all();
        $data['application']= $application = Application::where('applicant_id', $student->id)->first();
        $data['studentOlevels'] = StudentOLevel::where('appRefNo', $student->applicantRefNo)->get();
        $data['publications'] = StudentPublication::where('appRefNo', $student->applicantRefNo)->get();
        $data['appointments'] = StudentAppointment::where('appRefNo', $student->applicantRefNo)->get();
        $data['prizes'] = StudentPrize::where('appRefNo', $student->applicantRefNo)->get();
        $data['referee'] = StudentReferee::where('appRefNo', $student->applicantRefNo)->get();
        $data['refereeresponse'] = StudentRefereeQuestion::where('appRefNo', $student->applicantRefNo)->get();
        $data['programmes'] = Programmes::all();
        $data['courses'] = Course::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        $data['recordType'] = 'applicant';
        return view('admin.student.details', $data);
    }

    public function applicationDetails(Request $request)
    {
        $id = $request->id;
        $data['application']= $application = Application::find($id);
        $data['student'] =$student= Applicant::find($application->applicant_id);

        $data['countries'] = Countries::all();
        $data['studentOlevels'] = StudentOLevel::where('appRefNo', $student->applicantRefNo)->get();
        $data['publications'] = StudentPublication::where('appRefNo', $student->applicantRefNo)->get();
        $data['appointments'] = StudentAppointment::where('appRefNo', $student->applicantRefNo)->get();
        $data['prizes'] = StudentPrize::where('appRefNo', $student->applicantRefNo)->get();
        $data['referee'] = StudentReferee::where('appRefNo', $student->applicantRefNo)->get();
        $data['refereeresponse'] = StudentRefereeQuestion::where('appRefNo', $student->applicantRefNo)->get();
        $data['programmes'] = Programmes::all();
        $data['courses'] = Course::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        $data['recordType'] = 'applicant';
        return view('admin.student.details', $data);
    }


    public function refereeQuestions(Request $request)
    {
        $data['questions'] = RefereeQuestion::where('deleted', 0)->get();

        return view('admin.referee_questions', $data);
    }



    public function storeRefereeQuestion(Request $request)
    {
        $input= $request->all();
        $input['added_by'] = auth()->user()->id;
        $input['deleted'] = 0;
        $saveRecord = RefereeQuestion::create($input);
        return  redirect()->back()->with("message", "Question added successfully!");

    }
    public function deleteRefereeQuestion(Request $request)
    {

        $question = RefereeQuestion::find($request->id);
        $deleteRecord = $question->update(['deleted'=>1]);
        return  redirect()->back()->with("message", "Question deleted successfully!");

    }


    public function editQuestion(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $question = RefereeQuestion::where('id', $id)->first();
        return response()->json($question);
        # code...
    }
    public function updateQuestion(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $question = RefereeQuestion::where('id', $id)->first();
        //check duplicate records
        $duplicate = RefereeQuestion::where('question',$request->question)->where('id','!=', $id)->first();
        if($duplicate){
            return redirect()->back()->withErrors("Question already exist.");
        }
        $updateQuestion =$question->update(['question'=>$request->question]);
        return  redirect()->back()->with("message", "Question updated successfully!");

        # code...
    }


    public function approve_Application(Request $request)
    {
        $applicationID = $request->id;
        try{
        $application = Application::find($applicationID);
        $applicant = Applicant::where('applicantRefNo', $application->applicantRefNo)->first();
        // logics and algorithm used
        //check if the applicant is a registered student of the school
        //if yes, only update the application table
        //if no, register him as a new student
        //set approval status to "approved"
        //mail the student that he has been admitted
        //give a success message
        //try catch the process to catch any error and message the user

        $existingRecord = Student::where('applicantRefNo', $applicant->applicantRefNo)->first();
        if($existingRecord){
            //record exist
            $approveApplication = $application->update([
                'status'=> 'approved',
                'approved_by'=> auth()->user()->id,
                'approved_on'=> now()
            ]);
        }else{
            //create new student
            $newStudent = new Student();
            $newStudent->applicantRefNo = $applicant->applicantRefNo;
            $newStudent->surname = $applicant->surname;
            $newStudent->firstname = $applicant->firstname;
            $newStudent->middlename = $applicant->middlename;
            $newStudent->dob = $applicant->dob;
            $newStudent->sex = $applicant->sex;
            $newStudent->state_of_origin = $applicant->state_of_origin;
            $newStudent->nationality = $applicant->nationality;
            $newStudent->phone_number = $applicant->phone_number;
            $newStudent->alt_phone_number = $applicant->alt_phone_number;
            $newStudent->email = $applicant->email;
            $newStudent->alt_email = $applicant->alt_email;
            $newStudent->applicant_id = $applicant->id;
            $newStudent->photo = $applicant->photo;
            $newStudent->approved_on = now();
            $newStudent->approved_by = auth()->user()->id;
            $saveStudent = $newStudent->save();

            $approveApplication = $application->update([
                'status'=> 'approved',
                'approved_by'=> auth()->user()->id,
                'approved_on'=> now()
            ]);

        }

        $this->studentName = $applicant->surname .' '.$applicant->firstname;

        $this->applicationprogramme = $application->programme->description;
        $this->appsession = $application->appsession->description;

        Mail::to($applicant->email)->send(new SendApplicationApproval(
            $this->studentName,
            $this->applicationprogramme,
            $this->appsession
        ));
        return api_request_response(
            "ok",
            "Course Created Succesfully!",
            success_status_code(),
            $Courses
        );
    }
    catch(\Exception $exception){

        return api_request_response(
            "error",
            $exception->getMessage(),
            bad_response_status_code()
        );
    }


    }


    public function upload_applicants(Request $request) {


    // try {
        $import = new UploadStudent();
        // dd($request->file);
        $data = \Excel::import($import, request()->file('file'));

        return redirect()->back()->with('success',"Record successfully uploaded !.");
    // } catch (\Exception $exception) {
    //     return redirect()->back()->withErrors($exception->getMessage());
    // }

    }
}
