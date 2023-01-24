<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegistrationDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $password;

    public $companyName;

    /**
     * sendRegistrationDetails constructor.
     * @param User $user
     * @param String $companyName
     * @param String $password
     */
    public function __construct(
        User $user,
        String $companyName,
        String $password )
    {
        $this->user = $user;

        $this->password = $password;

        $this->companyName = $companyName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this
            ->subject('Account Registration')
            ->view('email.registration_details');
    }
}
