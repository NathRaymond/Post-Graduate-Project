<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferenceMail;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Models\AcademicSession;
use App\Models\Programmes;
use App\Models\Application;
use App\Models\ProgrammeCategory;
use App\Models\FeeCategory;
use App\Models\TemporalRegistration;
use App\Models\RegistrationFile;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class RegistrationController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(){
        $data['programmes'] = Programmes::all();
        $data['programmeCategory'] = ProgrammeCategory::all();
        $data['categories'] = FeeCategory::all();
        return view('auth.register', $data);
    }

    public function getProgrammeList(Request $request)
    {
        $id= $request->id;
        // dd($id);
        $prog['data'] = Programmes::where('cat_id', $id)->get();
        return response()->json($prog);
    }

    public function getFee(Request $request)
    {
        $programme = $request->programme;
        $type = $request->type;
        $fee = Fee::where('description', "like" , "%registration%")->where('programme', $programme)->where('type', $type)->first();
        return response()->json($fee);
    }

    public function tempRegistration(Request $request)
    {
        try{
            DB::beginTransaction();
            $input = $request->all();
            $now = now()->format('Y-m-d');
            $month = now()->format('m');
            $session = AcademicSession::orderBy('description')->first();
            //dd($session);
            $regRef = substr($session->description,0 , 4).substr($session->description, -2);
            $countApplicant = TemporalRegistration::where('session', $session->description)->count();
            $figure = $countApplicant +1;
            $length = strlen($figure);
            if($length ==1){
                $code = "000" . $figure;
            }
            if($length ==2){
                $code = "00" . $figure;
            }
            if($length ==3){
                $code = "0" . $figure;
            }
            if($length >= 4){
                $code =  $figure;
            }
            $input['applicantRefNo'] = "PG/APP" .'/'. $regRef .'/3'. '/'.  $code;
            $input['teller_no'] = "PG/FEE" .'/'. $regRef .'/3'. '/'.  $code;
            $user = User::where('email', $request->email)->where('user_type', 'admin')->first();
            if($user){
                return api_request_response(
                    "error",
                    "Email is invalid!",
                    bad_response_status_code()
                );
            }
            if($session){
                $input['session'] = $session->id;
            }else{
                return api_request_response(
                    "error",
                    "Pls Check Back Later",
                    bad_response_status_code()
                );
            }
            $fee = Fee::where('programme', $request->programme)->where('type', $request->type)->first();
            if($fee->status == 1){
                $realAmount = $fee->late_fee;
                $input['is_late'] = $fee->status;
            }else{
                $realAmount = $fee->amount;
                $input['is_late'] = $fee->status;
            }
            if($fee){
                $input['amount'] = $realAmount;
            }else{
                return api_request_response(
                    "error",
                    "Pls Check Back Later",
                    bad_response_status_code()
                );
            }
            $available = TemporalRegistration::where('email', $request->email)->first();
            if($available){
                if($available->status == 0){
                    return api_request_response(
                        "error",
                        "You have pending application! Pls make payment of $available->amount to designated bank",
                        bad_response_status_code()
                    );
                }
                if ($available->status == 1) {
                    return api_request_response(
                        "error",
                        "You already have an application! Check your mail for login details ",
                        bad_response_status_code()
                    );
                }
                if ($available->status == 2) {
                    return api_request_response(
                        "error",
                        "You already have an application! Kindly reupload your payment receipt or contact the admin",
                        bad_response_status_code()
                    );
                }
            }
            $input['name'] = $request->first_name .' '. $request->last_name ;
            $input['semester'] = 1;
            $input['session_id'] = $session->id;
            $input['program_id'] = $request->programme;
            $input['applicant_email'] = $request->email;
               $input['firstname'] = $request->first_name;
            $input['surname'] = $request->last_name;

            $input['applicationRefNo'] = $input['applicantRefNo'];
            $program = TemporalRegistration::create($input);
            $input['applicant_id'] = $program->id;
            $application = Application::create($input);
            $this->name = $input['name'];
            $this->email = $input['email'];
            $this->reference = $input['applicantRefNo'];
            $this->teller = $input['teller_no'];
            DB::commit();
            Mail::to($this->email)->send(new ReferenceMail(
                $this->name,
                $this->email,
                $this->reference,
                $this->teller
            ));
            return api_request_response(
                "ok",
                "Application Succesfully!",
                success_status_code(),
                $program
            );
        }
        catch(\Exception $exception){
            DB::rollback();
            return api_request_response(
                "error",
                $exception->getMessage(),
                bad_response_status_code()
            );
        }
    }

    public function uploadReceipt(){
        return view('auth.upload');
    }

    public function saveReceipt(Request $request){
        try {
            // dd($request->all());
            $input = $request->all();
            $checkEmail = Application::where('teller_no', $input['application_id'])->first();
            if(!$checkEmail){
                return api_request_response(
                    'error',
                    "Invalid transaction ID",
                    bad_response_status_code()
                );
            }
            $input['application_id'] = $checkEmail->id;
            $input['teller_no'] = $request->application_id;
            if ($request->has('file')) {
                $input['file'] = $fileName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('receipts'), $fileName);
            }
            $saveFile = RegistrationFile::create($input);
            return api_request_response(
                "ok",
                "Search Complete!",
                success_status_code(),
                []
            );
        } catch (\Exception $exception) {
            $errorCode = $exception->errorInfo[1] ?? $exception;
            if (is_int($errorCode)) {
                return api_request_response(
                    'error',
                    $exception->errorInfo[2],
                    bad_response_status_code()
                );
            } else {
                return api_request_response(
                    'error',
                    $exception->getMessage(),
                    bad_response_status_code()
                );
                // dd($exception);
            }
        }
    }

}
