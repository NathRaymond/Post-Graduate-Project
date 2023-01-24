<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Models\AcademicSession;
use App\Models\Programmes;
use App\Models\FeeCategory;
use App\Models\TemporalRegistration;
use App\Models\RegistrationFile;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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
        $data['categories'] = FeeCategory::all();
        return view('auth.register', $data);
    }

    public function getFee(Request $request)
    {
        $programme = $request->programme;
        $type = $request->type;
        $fee = Fee::where('programme', $programme)->where('type', $type)->first();
        return response()->json( $fee ); 
    }

    public function tempRegistration(Request $request)
    {
        try{
            $input = $request->all();
            $now = now()->format('Y-m-d');
            $session = AcademicSession::where('start_date', '<=', $now)->where('end_date', '>=', $now)->first();
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
            if($fee){
                $input['amount'] = $fee->amount;
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
            $program = TemporalRegistration::create($input);
            return api_request_response(
                "ok",
                "Application Succesfully!",
                success_status_code(),
                $program
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

    public function uploadReceipt(){
        return view('auth.upload');
    }

    public function saveReceipt(Request $request){
        try {
            // dd($request->all());
            $input = $request->all();
            $checkEmail = TemporalRegistration::where('email', $input['email'])->first();
            if(!$checkEmail){
                return api_request_response(
                    'error',
                    "Invalid Email Address",
                    bad_response_status_code()
                );
            }
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
