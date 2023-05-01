<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function getPaymentLink(int $price, string $currency)
    {
        $response = Http::asForm()
            ->withToken(config('stripe.key'))
            ->post(
                config('stripe.endpoint') . '/checkout/sessions',
                [
                    'success_url' => 'https://example.com/success',
                    'mode' => 'setup',
                    'payment_method_types' =>  ['card'],
                    'setup_intent_data' => [
                        'metadata' => [
                            'price' => $price,
                            'currency' => $currency
                        ]
                    ]
                ]
            );

        $response = json_decode($response, true);
        return $response['url'];
    }
}
