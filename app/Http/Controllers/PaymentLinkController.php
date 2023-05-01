<?php

namespace App\Http\Controllers;

use App\Service\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PaymentService $paymentService)
    {
        $price = $request->input('price');
        $currency = $request->input('currency');
        $paymentLink = $paymentService->getPaymentLink($price, $currency);
        return [
            'status' => 200,
            'message' => 'success',
            'data' => [
                'url' => $paymentLink
            ]
        ];
    }
}
