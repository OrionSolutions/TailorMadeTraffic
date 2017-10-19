<?php
require 'vendor/autoload.php';
try{
    session_start();
    if(isset( $_SESSION['redirect_url']) && !empty( $_SESSION['redirect_url'])) {
      
     }else{
        header('Location:index.php');
     }
    
$id = $_GET['redirect_flow_id'];
$url = $_SESSION['redirect_url'];
    $client = new \GoCardlessPro\Client([
        // We recommend storing your access token in an environment variable for security, but you could include it as a string directly in your code
        'access_token' =>'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',
        // Change me to LIVE when you're ready to go live
        'environment' => \GoCardlessPro\Environment::SANDBOX
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
    //print("Confirmation URL: " . $redirectFlow->confirmation_url . "<br />"); <?php if($_SESSION['payment-direct']!="Direct_Payment"){

    if($_SESSION['payment-type']=="Direct_Payment"){
        echo "<script>window.location.replace('https://tailormadetraffic.com/dashboard/sandbox/payment.php');</script>";
    }else{
        echo "<script>window.location.replace('https://tailormadetraffic.com/dashboard/sandbox/subscribe.php');</script>";
    }
}catch(Exception $error){
    $_SESSION['error_handler'] = $error->getMessage();
    echo "<script>window.location.replace('error.php');</script>";
}
//echo $_GET['redirect_flow_id'];
?>