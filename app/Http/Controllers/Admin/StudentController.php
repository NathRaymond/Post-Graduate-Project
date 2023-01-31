<?php

namespace App\Http\Controllers\Admin;
use App\Models\Student;
use App\Models\LGA;
use App\Models\State;
use App\Models\Programmes;
use App\Models\Course;
use App\Models\RefereeQuestion;
use App\Models\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data['students']= Student::all();

        return view('admin.student.index',$data);
    }

    public function viewDetails(Request $request)
    {
        $id = $request->id;
        $data['student'] = Student::find($id);
        $data['studentContact'] = studentContact::where('student_id', $id)->first();
        $data['student'] = Student::find($id);
        $data['countries'] = Countries::all();
        $data['programmes'] = Programmes::all();
        $data['courses'] = Course::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
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
}
