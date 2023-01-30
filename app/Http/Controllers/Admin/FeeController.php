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

    public function feeInfo(Request $request)
    {
        $fee = Fee::where('id', $request->id)->first();
        return response()->json($fee);
    }

    public function updateFeeStatus(Request $request){
        $fee = Fee::where('id', $request->id)->first();
        if($fee->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $fee->update(['status' => $status]);
        return api_request_response(
            "ok",
            "All Fee Data!",
            success_status_code(),
            $fee
        ); 
    }

    public function feesData(){
        $fees = Fee::with(['types','programmes'])->get();
        return api_request_response(
            "ok",
            "All Fee Data!",
            success_status_code(),
            $fees
        ); 
    }

    public function create(Request $request)
    {
        try{
            $input = $request->all();
            // dd($input);
            $available = Fee::where('programme', $request->programme)->where('description', $request->description)->where('type', $request->type)->first();
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
    public function update(Request $request)
    {
        try{
            $input = $request->all();
            // dd($input);
            $reject = Fee::where('id', '!=', $request->id)->where('programme', $request->programme)->where('description', $request->description)->where('type', $request->type)->first();
            if($reject){
                return api_request_response(
                    "error",
                    "Fee already declared ",
                    bad_response_status_code()
                );
            }

            $available = Fee::where('id', $request->id)->first();
            $fee = $available->update($input);
            return api_request_response(
                "ok",
                "Fee  Decclared Succesfully!",
                success_status_code(),
                $fee
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
