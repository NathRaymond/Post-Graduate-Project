<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationEmail;
use App\Http\Requests;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;// Paystack package
use Illuminate\Support\Facades\Auth;
use App\Models\Student; // Student Model
use App\Models\Payment; // Payment Model
use App\Models\Fee; // Payment Model
use App\Models\User; // User model
use App\Models\TemporalRegistration; 
use App\Models\FeeCategory; 
use App\Models\RegistrationFile; 
use App\Models\Application; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PaymentController extends Controller
{

  public function awaitingConfirmation(){
    $applicant = TemporalRegistration::all();
    $files = RegistrationFile::all();
    $file = RegistrationFile::where('validated', 0)->pluck('teller_no')->toArray();
    $pending =  Application::wherein('teller_no', $file)->get();
    $pending->map(function ($transaction) use ($files, $applicant) {
          $value = $files->where('teller_no', $transaction->teller_no)->first();
          $details = $applicant->where('teller_no', $transaction->teller_no)->first();
          $transaction->first_name = $details->first_name;
          $transaction->last_name = $details->last_name;
          $transaction->file = $value->file;
  
    });
    // dd($pending);
    $data['pending']  = $pending;
    return view('admin.payments.pending', $data);
  }
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
     
     public function save(Request $request)
    {
        try{
          DB::beginTransaction();
            $input = $request->all();
            $transact = Payment::where('transaction_id',  $input['transaction_id'])->first();
            if($transact){
                return api_request_response(
                    "error",
                    "Transaction ID has already been used for another student!",
                    bad_response_status_code()
                ); 
            }
            $checkReg = Application::where('id', $input['id'])->first();
            if($checkReg->teller_no != $input['transaction_id']){
              return api_request_response(
                "error",
                "Invalid credentials!",
                bad_response_status_code()
              ); 
            }
            if(!$checkReg){
              return api_request_response(
                "error",
                "Pls check back later!",
                bad_response_status_code()
              ); 
            }
            if($checkReg->status == 1){
              return api_request_response(
                "error",
                "Pls check back later!",
                bad_response_status_code()
              ); 
            }
            $programme = $checkReg->program_id;
            $type = $checkReg->type;
            $fee = Fee::where('description', "like" , "%registration%")->where('programme', $programme)->where('type', $type)->first();
            if(!$fee){
              return api_request_response(
                "error",
                "Pls check back later!",
                bad_response_status_code()
              ); 
            }
            $email = Student::where('applicationRefNo', $checkReg->applicationRefNo)->first();
            if($email){
                return api_request_response(
                  "error",
                  "Email already exists!",
                  bad_response_status_code()
                ); 
            }
            $file = RegistrationFile::where('teller_no', $checkReg->teller_no)->first();
            if(!$file){
              return api_request_response(
                "error",
                "How did you get here!",
                bad_response_status_code()
              ); 
            }
            if($file->validated == 1){
              return api_request_response(
                "error",
                "We already worked on this application!",
                bad_response_status_code()
              ); 
            }
            $applicant = TemporalRegistration::where('applicantRefNo', $checkReg->applicationRefNo)->first();
            $password = Str::random(10);
            $insertPassword = bcrypt($password);
            $input['approved_by'] = Auth::user()->id;
            $input['amount'] = $input['amount'];
            $input['fee_amount'] = $checkReg->amount;
            $input['fee_id'] = $fee->id;
            $input['approved_date'] = now();
            $input['payer_name'] = $applicant->first_name .' '. $applicant->last_name ;
            $input['name'] = $applicant->first_name .' '. $applicant->last_name ;
            $input['password'] = $insertPassword ;
            $input['surname'] = $applicant->last_name ;
            $input['file'] = $file->file ;
            $input['user_type'] = "student" ;
            $input['firstname'] = $applicant->first_name  ;
            $input['is_first_time'] = 1  ;
            $input['email'] = $checkReg->applicant_email  ;
            $input['payer_id'] = $applicant->id;
            $input['approval_status'] = 1;
            $input['applicationRefNo'] = $checkReg->applicationRefNo;
            $input['teller_no'] = $checkReg->teller_no;
            $input['applicant_id'] = $checkReg->applicant_id;
            $input['approved_date'] = now();
            $user = User::create($input);
            $program = Payment::create($input);
            $checkReg->update(['payment_status' => 1]);
            RegistrationFile::where('teller_no', $checkReg->teller_no)->update(['validated' => 1]);
            $this->name = $input['name'];
            $this->email = $input['email'];
            $this->password = $password;
               DB::commit();
            Mail::to($this->email)->send(new PaymentConfirmationEmail(
                $this->name,
                $this->password,
                $this->email
            ));
            
            return api_request_response(
                "ok",
                "Payment succesful $password!",
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
    
  public function welcome()
  {
    return view('welcome3');
  }
    public function redirectToGateway(Request $request)
    {
        $input = $request->all();
        // dd("here");
      // $paystack = new Paystack();
      if(empty($request->email)){
         $input["email"] = "persieworm@gmail.com";  
      }
     
      //dd($input["email"]);
        try{
            $donorSubscription = Payment::create([
              // $request->reference = $paystack->genTranxRef();
             // "reference" => $paystack->genTranxRef(),
                "name" => $input["name"],
                // "amount" => $input["amount"],
                "email" => $input["email"] ,
                "uuid" => $input["reference"],
            ]);
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return redirect()->back()->withErrors(['exception' => $e->getMessage()]);
            // return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        $paymentDetails = Paystack::getPaymentData(); //this comes with all the data needed to process the transaction
        // dd($paymentDetails);
        // Getting the value via an array method
        // $inv_id = $paymentDetails['data']['metadata']['reference'];// Getting InvoiceId I passed from the form
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        // $amount = $paymentDetails['data']['amount']; //Getting the Amount
        // $number = $randnum = rand(1111111111,9999999999);// this one is specific to application
        // $number = 'year'.$number;
        // dd($status);
        if($status == "success"){ //Checking to Ensure the transaction was succesful
          
           // Payment::where('uuid', $paymentDetails['data']['reference'])->update(['payment_status' => 1]);
            Payment::where('uuid', $paymentDetails['data']['reference'])->update(['payment_status' => 1, 'amount' => $paymentDetails['data']['amount'] ]);
            return view('welcome3')->with("message", "You have successfully donated");
            // redirect()->route('welcome')->with("message", "You have successfully donated");
            // redirect()->route('welcome')->with("message", "You have successfully donated");
        }
      
        // Now you have the payment details,
        // you can store the authorization_code in your DB to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
    
    public function index(){
       $data['payments'] = Payment::orderBy('created_at', 'desc')->get();
    //    dd($data);
       return view('admin.payments', $data);
    }
}
