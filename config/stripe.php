<?php

return [
    'endpoint' => env('STRIPE_API_ENDPOINT', 'https://api.stripe.com/v1'),
    'key' => env('STRIPE_SECRET_KEY', ''),
];
