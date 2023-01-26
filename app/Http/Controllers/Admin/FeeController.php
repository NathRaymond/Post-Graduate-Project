<?php

namespace App\Http\Controllers\Admin;
use App\Models\Fee;
use App\Models\FeeCategory;
use App\Models\Programmes;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $data['fees'] = Fee::all();
        $data['types'] = FeeCategory::all();
        $data['programmes'] = Programmes::all();
        return view('admin.fees.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $input = $request->all();
            // dd($input);
            $available = Fee::where('programme', $request->programme)->where('type', $request->type)->first();
            if($available){
                return api_request_response(
                    "error",
                    "Fee already declared ",
                    bad_response_status_code()
                );
            }
            $fee = Fee::create($input);
            $fees = Fee::with(['types','programmes'])->get();
            return api_request_response(
                "ok",
                "Fee  Decclared Succesfully!",
                success_status_code(),
                $fees
            );
        }
        catch(\Exception $exception){

            return api_request_response(
                "error",
                $exception->getMessage(),
                bad_response_status_code()
            );
            // return Redirect::back()->withErrors(["exception" => $exception->getMessage()])->withInput($request->all());
        }
    }

}
