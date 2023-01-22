<?php

namespace App\Http\Controllers;

use App\SystemAuditting;
use Illuminate\Http\Request;
use Datatables;

class SystemAuditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['view_details']]);
    }

    public function index1()
    {
        $data['audits'] = SystemAuditting::orderBy('id', 'DESC')->paginate(100);
        return view('audit.index', $data);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SystemAuditting::orderBy('id', 'ASC')->where('created_at', '!=', null);
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                
                ->addColumn('username', function ($data) {
                    $btn = $data->users->name;

                    return $btn;
                })
                ->rawColumns(['username'])
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.audit.index');
    }

    public function view_details(Request $request)
    {
        $id = $request->id;
        $data['audit_details'] = $audit = SystemAuditting::where('id', $id)->first();
        $new_val = $audit->new_values;
        $data['newvalArray'] = $new = json_decode($new_val, true);
        $data['oldvalArray'] = $new = json_decode($audit->old_values, true);

        // dd($newvalArray);
        return view('audit.view_details', $data);
    }
}
