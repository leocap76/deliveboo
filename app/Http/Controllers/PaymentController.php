<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'yhckmnwrjxbmdjht',
            'publicKey' => '35b6x5bmbn9nfm68',
            'privateKey' => '24301cc5242a3d141eafab3722414341'
        ]);

        $token = $gateway->clientToken()->generate(); //genero il token del cliente senza id
    
        return view('shop.payment.index', compact('token'));

    }  

    public function checkout() {


        return view('shop.payment.checkout');
    }
}