<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferenceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
     public $email;
     public $reference;
     public $teller;
    public function __construct(String $name,String $email,String $reference,String $teller)
    {
        $this->name = $name;
         $this->email = $email;
         $this->reference = $reference;
         $this->teller = $teller;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Application Notification')
        ->view('email.reference');
    }
}
