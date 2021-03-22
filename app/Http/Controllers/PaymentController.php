<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout() {

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'yhckmnwrjxbmdjht',
            'publicKey' => '35b6x5bmbn9nfm68',
            'privateKey' => '24301cc5242a3d141eafab3722414341'
        ]);

        $clientToken = $gateway->clientToken()->generate();
    
        return view('shop.paymentCheckout', compact('clientToken'));

    }  
    
    public function transaction(Request $request) {

    }
}
