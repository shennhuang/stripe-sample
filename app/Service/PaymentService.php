<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function getPaymentLink()
    {
        $response = Http::get('https://api.stripe.com/v1/checkout/sessions');
        dd($response)
    }
}
