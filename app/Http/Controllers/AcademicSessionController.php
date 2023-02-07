<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use Illuminate\Support\Facades\File;
use App\Models\AcademicSession;

class AcademicSessionController extends Controller
{
    public function index()
    {
        $data['academic_sessions'] = AcademicSession::orderBy('description','DESC')->get();
       return view('admin.academic_session', $data);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        //validate session whether it exist
        $existingData = AcademicSession::where('description', $request->description)->first();

        if($existingData){
            return redirect()->back()->withErrors("Session already exist.");
        }

        if ($request->has('calendar')) {
            $input['calendar'] = $fileName = time() . '.' . $request->calendar->extension();
            $request->calendar->move(public_path('calendar'), $fileName);

        }

        // dd($input);
        $createSession = AcademicSession::create($input);

        return redirect()->back()->with('message', 'New session added successfully!');
    }

    public function edit(Request $request)
    {$id= $request->id;
        // dd($id);
        $prog = AcademicSession::where('id', $id)->first();
        return response()->json($prog);
    }


    public function update(Request $request)
    {
        try{

            $input = $request->all();
            $id = $request->id;
            // dd($input);
            $available = AcademicSession::where('description', $request->description)->where('id','!=',$id)
            ->first();

            if($available){
                return redirect()->back()->withErrors("There is another session with this name!");

            }

            $program = AcademicSession::find($id);

            // dd($request->all());

        if ($request->has('calendar')) {
            $input['calendar'] = $fileName = time() . '.' . $request->calendar->extension();
            $request->calendar->move(public_path('calendar'), $fileName);
            // dd($input);
            $filename = public_path() . '/calendar/' . $program->photo;

            if (File::exists($filename)) {

                File::delete($filename);
            }

        }


        // dd($input);
        $updateSession= $program->update($input);

        return redirect()->back()->with('message', 'Session updated successfully!');
        }
        catch(\Exception $exception){
            return redirect()->back()->withErrors(["exception" => $exception->getMessage()]);

        }
    }
}
