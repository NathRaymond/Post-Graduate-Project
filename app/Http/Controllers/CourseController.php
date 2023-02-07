<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Programmes;
use function App\Helpers\api_request_response;
use function App\Helpers\generate_random_password;
use function App\Helpers\generate_uuid;
use function App\Helpers\unauthorized_status_code;
use function App\Helpers\success_status_code;
use function App\Helpers\bad_response_status_code;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
        public function __construct()
    {

        $this->middleware('permission:view-courses', ['only' => ['index']]);
         
         $this->middleware('permission:add-course', ['only' => ['create']]);
    }
    
    public function index(Request $request)
    {
        $data['courses'] = Course::where('deleted', 0)->get();
        $data['programmes'] = Programmes::get();

        return view('admin.course', $data);
    }

    public function create(Request $request)
    {
        try{
            $input = $request->all();
            $available = Course::where('description', $request->description)->where('program_id', $request->program_id)->first();
            // dd($input);
            if($available){
                return api_request_response(
                    "error",
                    "Course already already available for this programme!",
                    bad_response_status_code()
                );
            }
            $course = Course::create($input);
            $Courses = Course::all();
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
    public function deleteCourse(Request $request)
    {

        $question = Course::find($request->id);
        $deleteRecord = $question->update(['deleted'=>1]);
        return  redirect()->back()->with("message", "Question deleted successfully!");

    }


    public function editQuestion(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $question = Course::where('id', $id)->first();
        return response()->json($question);
        # code...
    }
    public function updateQuestion(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $question = Course::where('id', $id)->first();
        //check duplicate records
        $duplicate = Course::where('question',$request->question)->where('id','!=', $id)->first();
        if($duplicate){
            return redirect()->back()->withErrors("Question already exist.");
        }
        $updateQuestion =$question->update(['question'=>$request->question]);
        return  redirect()->back()->with("message", "Question updated successfully!");

        # code...
    }
}
