<?php
session_start();
$daily = $_GET["dailybudget"];
$daily = ($daily *  30) * 100;
//$email = $_GET["emails"];
$number_camp = $_GET["numcampaigns"];
$sub_amount = $_GET["subamount"];



$_SESSION['redirect_url']=null;
$_SESSION['payment-daily']=50;
$_SESSION['payment-monthly']=50;
$_SESSION['payment'] = $daily + $sub_amount; 
$_SESSION['given_name']="John";
$_SESSION['family_name']="Darling";
$_SESSION['email']= "john@tailormadetraffic.com" ;
$_SESSION['address_line1']="338-346 Goswell Road";
$_SESSION['city']= "London";
$_SESSION['postal_code']="EC1V 7LQ";

require 'vendor/autoload.php';

$client = new \GoCardlessPro\Client([
    // We recommend storing your access token in an
    // environment variable for security, but you could
    // include it as a string directly in your code
    'access_token' => 'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',//getenv('GC_ACCESS_TOKEN'),
    // Change me to LIVE when you're ready to go live
    'environment' => \GoCardlessPro\Environment::SANDBOX
]);

$redirectFlow = $client->redirectFlows()->create([
    "params" => [
        // This will be shown on the payment pages

        "description" => "Premiums",
        // Not the access token
        "session_token" => "dummy_session_token",
        "success_redirect_url" => "https://tailormadetraffic.com/test/sandbox/debit_success.php",
        // Optionally, prefill customer details on the payment page
        "prefilled_customer" => [
          "given_name" => $_SESSION['given_name'] ,
          "family_name" => $_SESSION['family_name'],
          "email" => $_SESSION['email'],
          "address_line1" => $_SESSION['address_line1'],
          "city" => $_SESSION['city'],
          "postal_code" => $_SESSION['postal_code']
        ]
    ]
]);


// Hold on to this ID - you'll need it when you
// "confirm" the redirect flow later
//rint("ID: " . $redirectFlow->id . "<br />");
//print("URL: " . $redirectFlow->redirect_url);
$_SESSION['redirect_url'] = $redirectFlow->id;
echo "<script>window.location.replace('".$redirectFlow->redirect_url."');</script>";
?>
