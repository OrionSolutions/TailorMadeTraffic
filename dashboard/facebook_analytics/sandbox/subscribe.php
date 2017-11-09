<?php 
try{
    session_start();

    session_start();
    if(isset( $_SESSION['mandate_id']) && !empty( $_SESSION['mandate_id'])) {
        $daily = $_GET["dailybudget"];
        //$email = $_GET["emails"];

        $_SESSION['redirect_url']=null;
        $_SESSION['payment-daily']=50;
        $_SESSION['payment-monthly']=50; 
        $_SESSION['given_name']="Tim";
        $_SESSION['family_name']="Rogers";
        $_SESSION['email']= "tim@gocardless.com" ;
        $_SESSION['address_line1']="338-346 Goswell Road";
        $_SESSION['city']= "London";
        $_SESSION['postal_code']="EC1V 7LQ";
     }else{
        header('Location:index.php');;
     }
    
    require 'vendor/autoload.php';
    $unique_key = md5( $_SESSION['mandate_id'].date("M:d:Y h:i A ") ) ;
    $client = new \GoCardlessPro\Client([
        'access_token' =>'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',
        'environment' => \GoCardlessPro\Environment::SANDBOX
    ]);
    
    $subscription = $client->subscriptions()->create([
      "params" => [
          "amount" => $_SESSION['payment'] , // 15 GBP in pence
          "currency" => "GBP",
          "interval_unit" => "monthly",
          "day_of_month" => "5",
          "company_name"=> "Tailor Made Traffic LTD",
          "links" => [
              "mandate" =>  $_SESSION['mandate_id']
                           // Mandate ID from the last section
          ],
          "metadata" => [
              "subscription_number" => "ABC1234"
          ]
      ],
      "headers" => [
          "Idempotency-Key" => $unique_key
      ]
    ]);
    
    // Keep hold of this subscription ID - we'll use it in a minute.
    // It should look a bit like "SB00003GKMHFFY"
    //print("ID: " . $subscription->id);
    
    $subscription = $client->subscriptions()->get($subscription->id);
                                            // Subscription ID from above.
    //echo $payment->id;
    //print("Status: " . $subscription->status . "<br />");
    $_SESSION['subscription_id'] = $subscription->id;
    echo "<script>window.location.replace('success.php');</script>";
    
}catch(Exception $e){
    echo $e;
}
   
?>