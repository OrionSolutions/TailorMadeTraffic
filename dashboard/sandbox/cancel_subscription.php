<?php 
try{
    session_start();
    $_SESSION['stats'] = 0;
    if($_GET["subscription_id"]) {
        $subscriptionID = $_GET["subscription_id"];
     
     }else{
        header('Location:index.php');;
     }
    
    require 'vendor/autoload.php';
    $client = new \GoCardlessPro\Client(array(
        'access_token' => 'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',
        'environment'  => \GoCardlessPro\Environment::SANDBOX
      ));
    $subscription = $client->subscriptions()->get($subscriptionID);
    $status = $subscription->status;

    if($status=="cancelled"){
        $_SESSION['stats'] = 1;
        echo "<script>window.location.replace('cancelled.php');</script>";
    }else{
        $client->subscriptions()->cancel($subscriptionID);
        $_SESSION['stats'] = 1;
        echo "<script>window.location.replace('cancel_success.php');</script>";
    } 

    
}catch(Exception $error){
    $_SESSION['error_handler'] = $error->getMessage();
     echo "<script>window.location.replace('error.php');</script>";
}
   
?>