<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($verimail)
    {
        $this->verimail = $verimail;
    }

    public function build()
    {
        $verimail = $this->verimail;

        return $this->view('bo.page.mail.mail')
                    ->with('verimail', $verimail)
                    ->subject('Verify Mail');
    }
}
