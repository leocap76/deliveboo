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

    public function checkout(Request $request) {

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'yhckmnwrjxbmdjht',
            'publicKey' => '35b6x5bmbn9nfm68',
            'privateKey' => '24301cc5242a3d141eafab3722414341'
        ]);

        $amount = $request->amount;
        
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Tony',
                'lastName' => 'Stark',
                'email' => 'tony@avengers.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);
    
            return view('shop.payment.checkout')->with('success_message', 'Il pagamento è stato effettuato. L\'id è:'. $transaction->id);
        } else {
            $errorString = "";
    
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('Il pagamento non è andato a buon fine: '.$result->message);
        }
    }
}