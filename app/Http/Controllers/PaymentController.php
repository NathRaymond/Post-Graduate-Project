<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;// Paystack package
use Illuminate\Support\Facades\Auth;
use App\Student; // Student Model
use App\Payment; // Payment Model
use App\User; // User model
class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
     
       public function paystackIndex()
    {
        return view('paystack_payment_page');
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
