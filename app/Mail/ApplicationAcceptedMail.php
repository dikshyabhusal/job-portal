<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    // Inject the application in the constructor
    public function __construct($application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Interview Invitation')
                    ->view('emails.accepted')
                    ->with(['application' => $this->application]);
    }

}
