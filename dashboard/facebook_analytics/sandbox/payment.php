<?php
try{
    session_start();
    echo $_SESSION['mandate_id'] . "\n";
    $unique_key = md5( $_SESSION['mandate_id'].date("M:d:Y h:i A ") ) ;
    require 'vendor/autoload.php';
    
    $client = new \GoCardlessPro\Client([
        'access_token' => 'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',
        'environment' => \GoCardlessPro\Environment::SANDBOX
    ]);
    
    $payment = $client->payments()->create([
      "params" => [
          "amount" => 10000, // 10 GBP in pence
          "currency" => "GBP",
          "count" => 12,
          "links" => [
              "mandate" =>  $_SESSION['mandate_id']
                           // The mandate ID from last section
          ],
          // Almost all resources in the API let you store custom metadata,
          // which you can retrieve later
          "metadata" => [
              "invoice_number" => "001"
          ]
      ],
      "headers" => [
          "Idempotency-Key" => $unique_key,
      ]
    ]);
    
    // Keep hold of this payment ID - we'll use it in a minute
    // It should look like "PM000260X9VKF4"
    //print("ID: " . $payment->id);
    echo $payment->id;
    // $payments = $client->payments()->get($payment->id);
                                  // Payment ID from above
    
    print("Status: " . $payments->status . "<br />");
    
    //$payment = $client->payments()->cancel("PM000260X9VKF4");
    //print("Status: " . $payment->status);
}catch(Exception $e){
    echo $e;
}
?>
