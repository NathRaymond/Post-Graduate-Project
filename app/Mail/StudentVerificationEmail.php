<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $name;
    public $email;
     public $password;
     public $matric;
    public function __construct(String $name,String $email, String $password, String $matric)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->matric = $matric;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Verification & Password Notification')
        ->view('email.verification');
    }
}
