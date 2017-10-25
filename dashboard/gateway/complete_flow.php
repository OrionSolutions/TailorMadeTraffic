<?php
try{
    session_start();
    if(isset( $_SESSION['payment-type']) && !empty( $_SESSION['payment-type'])) {
      
     }else{
        //header('Location:index.php');
        $_SESSION['payment-type'];
     }
require 'vendor/autoload.php';
$id = $_GET['redirect_flow_id'];
$url = $_SESSION['redirect_url'];
    $client = new \GoCardlessPro\Client([
        // We recommend storing your access token in an environment variable for security, but you could include it as a string directly in your code
        'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
        // Change me to LIVE when you're ready to go live
        'environment' => \GoCardlessPro\Environment::LIVE
    ]);
    
    
    $redirectFlow = $client->redirectFlows()->complete(
        $url, //The redirect flow ID from above.
        ["params" => ["session_token" => "dummy_session_token"]]
    );
    
    //print("Mandate: " . $redirectFlow->links->mandate . "<br />");
    // Save this mandate ID for the next section.
    //print("Customer: " . $redirectFlow->links->customer . "<br />");
     $_SESSION['mandate_id'] = $redirectFlow->links->mandate;
     $_SESSION['customer_id'] = $redirectFlow->links->customer;
    // Display a confirmation page to the customer, telling them their Direct Debit has been
    // set up. You could build your own, or use ours, which shows all the relevant
    // information and is translated into all the languages we support.
    //print("Confirmation URL: " . $redirectFlow->confirmation_url . "<br />");
    if($_SESSION['payment-type']=="Direct_Payment"){
        echo "<script>window.location.replace('payment.php');</script>";
    }else{
        echo "<script>window.location.replace('subscribe.php');</script>";
    }
}catch(Exception $error){
    $_SESSION['error_handler'] = $error->getMessage() . " on complete_flow";
    echo "<script>window.location.replace('error.php');</script>";
    session_unset();
    session_destroy();
}
//echo $_GET['redirect_flow_id'];
?>