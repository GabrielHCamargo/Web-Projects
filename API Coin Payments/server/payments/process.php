<?php

    header('Access-Control-Allow-Origin: *');

    require "init.php";

    $amount = $_REQUEST['amount'];
    $email = $_REQUEST['email'];
    $rcurrency = $_REQUEST['rcurrency'];
    $access_key = $_REQUEST['access_key'];

    if ($access_key == $key) {

        $scurrency = "USD";
        
        $request = [
            'amount' => $amount,
            'currency1' => $scurrency,
            'currency2' => $rcurrency,
            'buyer_email' => $email,
            'item' => "ITEM",
            'address' => "",
            'ipn_url' => "https://api.seusite.com/paycrypto/webhook.php",
        ];

        $result = $coin->CreateTransaction($request);

        if ($result['error'] == "ok") {
            
            $payment = new Payment;
            $payment->email = $email;
            $payment->entered_amount = $amount;
            $payment->amount = $result['result']['amount'];
            $payment->from_currency = $scurrency;
            $payment->to_currency = $rcurrency;
            $payment->status = "initialized";
            $payment->gateway_id = $result['result']['txn_id'];
            $payment->gateway_url = $result['result']['status_url'];
            $payment->save();
            
            echo json_encode($result['result']['status_url']);

        } else {
            print 'Error: ' . $result['error'] . "\n";
            die();
        }

    } else {

        header("HTTP/1.0 404 Not Found");

    }

?>