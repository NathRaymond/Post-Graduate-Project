<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request)
    {
        // dd("here");
        $checkMatricNo = Applicant::where('matricno', $request->email)->first();
        if($checkMatricNo){
            $getEmail = $checkMatricNo->email;       
        }
        $checkAppRefNo = Applicant::where('applicantRefNo', $request->email)->first();
        if($checkAppRefNo){
            $getEmail = $checkAppRefNo->email;       
        }
        $checkUser = User::where('email', $request->email)->first();
        if($checkUser){
            $getEmail = $checkUser->email;       
        }
        // dd($getEmail);
        if (Auth::attempt(['email' => $getEmail, 'password' => $request->password, 'user_type' => 'student'])) {
            // The user is active, not suspended, and exists.
            //    if (Auth::user()->is_first_time == 1) {
            //     return redirect()->intended('/password/change');
            // } else {

                return redirect()->intended('/student');
            // }
            
        } else if (Auth::attempt(['email' => $getEmail, 'password' => $request->password, 'user_type' => 'admin'])) {

            // The user is active, not suspended, and exists.

            //    if (Auth::user()->is_first_time == 1) {
            //     return redirect()->intended('/password/change');
            // } else {
                return redirect()->intended('/admin');
            // }

        } else {
            //  return redirect()->back();
            
            return redirect()->back()->withErrors(["exception" => 'These credentials do not match our records']);

        }
    }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout()
    {
       Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
