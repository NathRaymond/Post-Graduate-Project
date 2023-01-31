<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use function App\Helpers\api_request_response;
use function App\Helpers\generate_random_password;
use function App\Helpers\generate_uuid;
use function App\Helpers\unauthorized_status_code;
use function App\Helpers\success_status_code;
use function App\Helpers\bad_response_status_code;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



  public function updated_account(Request $request)
  {

      try{
          $input = $request->all();
    // dd('here');
          $password = Hash::make($request->confirm_password);
          if (!(Hash::check($request->current_password,Auth::User()->password))) {
              throw new \Exception("Password does not match existing password!");
          }

          if($request->new_password != $request->confirm_password){
               throw new \Exception("Password Confirmation does not match!");
          }

          if (Hash::check($request->new_password,Auth::User()->password)) {
              throw new \Exception("You can't change to current password!");
          }

          $user = User::where('id', Auth::user()->id)->first();
          // dd($user);
          $user->update(['password' => $password, 'is_first_time' => 0]);
            return api_request_response(
                'ok',
                'Password updated successfully!',
                success_status_code(),
                $user
            );


      } catch (\Exception $e) {


          // dd($e->getMessage());
              return api_request_response(
              'error',
              $e->getMessage(),
              bad_response_status_code()
          );
      }
  }

}
