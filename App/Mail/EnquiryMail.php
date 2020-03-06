<?php

namespace App\Mail;

use App\Model\Enq;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enq $enq)
    {
        $this->enquiry = $enq;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.cratesOnSkates.Mail.enquiryMail');
    }
}
