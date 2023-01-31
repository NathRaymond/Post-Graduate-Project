<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicSession;

class AcademicSessionController extends Controller
{
    public function index()
    {
        $data['academic_sessions'] = AcademicSession::orderBy('id','DESC')->get();
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
            // dd($input);

        }

        $createSession = AcademicSession::create($input);

        return redirect()->back()->with('message', 'New session added successfully!');
    }
}
