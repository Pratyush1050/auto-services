<?php

namespace App\Mail;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerMessageReceived extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $contactUs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contactUs)
    {
        $this->contactUs = $contactUs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.customerMessageReceived');
    }
}
