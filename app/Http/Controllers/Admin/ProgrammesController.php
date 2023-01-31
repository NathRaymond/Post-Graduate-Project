<?php

namespace App\Http\Controllers\Admin;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Models\Programmes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['programmes'] = Programmes::all();
        return view('admin.programmes.index', $data);
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
            $available = Programmes::where('description', $request->description)->first();
            if($available){
                return api_request_response(
                    "error",
                    "Programme already created ",
                    bad_response_status_code()
                );
            }
            $program = Programmes::create($input);
            $programmes = Programmes::all();
            return api_request_response(
                "ok",
                "Programme  Created Succesfully!",
                success_status_code(),
                $programmes
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
