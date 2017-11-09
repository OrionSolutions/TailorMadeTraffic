<?php 
try{
    session_start();
    echo  $_SESSION['given_name'] ;
    require 'vendor/autoload.php';

    $client = new \GoCardlessPro\Client([
        'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
        'environment' => \GoCardlessPro\Environment::LIVE
    ]);
      
      $subscription = $client->subscriptions()->get("SB000091717TR5");
      
      echo $subscription->id . "\n";
      echo $subscription->amount ."\n";
      echo $subscription->name ."\n";
      echo $subscription->metadata->subscription_number ."\n";
      echo date("Y-m-d") ."\n";
      echo $val = ($subscription->amount / 100.0);
      echo  $_SESSION['given_name'] ;
      echo "bols";

}catch(Exception $subscription_error){
    echo $subscription_error;
}

?>