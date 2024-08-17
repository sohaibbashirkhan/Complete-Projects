<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentLink;
    public $order;

    public function __construct($paymentLink, $order)
    {
        $this->paymentLink = $paymentLink;
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('emails.payment-link')
                    ->with([
                        'paymentLink' => $this->paymentLink,
                        'order' => $this->order,
                    ]);
    }
}
