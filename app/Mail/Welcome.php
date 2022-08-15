<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // return $this->from('info@groundupmediainc.com')
        //     ->subject('Finco Request for Funding')
        //     ->view('emails.fund_request_email', ["fundingRequest" => $this->fundingRequest]);
        return $this->from("paul4nank@gmail.com")->subject('This is new')->view('mails.welcome-message', ["fundingRequest" => ["newhouse" => "lsdkfjlskdjflsjd"]]);;
    }
}
