<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteDetailsEmail extends Mailable
{
    use SerializesModels;

    public $emailMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailMessage, $subject = null)
    {
        $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( $this->subject ?? 'New Quotation Request')
                    ->html($this->emailMessage);
    }
}
