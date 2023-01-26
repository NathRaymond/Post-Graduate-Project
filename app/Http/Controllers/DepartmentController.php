<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{

    public function index()
    {
        $data['departments'] = Department::all();
        $data['users'] = User::where('user_type', 'admin')->get();
        return view('admin.department', $data);
    }


    public function createDepartment (Request $request)
    {
        $input = $request->all();
        //validate session whether it exist
        $existingData = Department::where('name', $request->name)->first();

        if($existingData){
            return redirect()->back()->withErrors("Department already exist.");
        }

        if ($request->has('image')) {
            $input['image'] = $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('department_images'), $fileName);
            // dd($input);

        }

        $createSession = Department::create($input);

        return redirect()->back()->with('message', 'New department added successfully!');
    }

}
