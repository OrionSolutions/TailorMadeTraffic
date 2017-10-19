<?php 

  
    require 'vendor/autoload.php';
    $unique_key = md5( $_SESSION['mandate_id'].date("M:d:Y h:i A ") ) ;
    $client = new \GoCardlessPro\Client([
        'access_token' =>'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',
        'environment' => \GoCardlessPro\Environment::SANDBOX
    ]);

    $payment_status = $client->payments()->list();
    
    $payment_status = $client->payments()->list([
      "params" => [
          "customer" => "CU0002KA3WSWA1",
          "limit" => 5
          ]
    ]);

    /*foreach ($payments->records as $payment) {
        echo $payment->id;
      }*/
    foreach ($payment_status->records as $payment) {
        echo $payment->id. "\n";
        echo $payment->status. "\n";
      }
    //print("Data: " . $payment_status);

  ?>