<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendGeneralMessage extends Mailable
{
    use Queueable, SerializesModels;



    public $companyName;
    public $message;


    /**

     * @param String $companyName
     * @param String $password
     */
    public function __construct(

        String $companyName,
        String $message

    ) {


        $this->companyName = $companyName;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this
            ->subject('NOTIFICATION')
            ->view('email.general_email');
    }
}
