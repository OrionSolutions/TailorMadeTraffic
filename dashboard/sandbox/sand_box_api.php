<?php
try{
session_start();
include ('../class/clsConnection.php');
$daily = $_GET["dailybudget"];
$payment_direct = $_GET["payment_direct"];
$payment_direct = ($payment_direct)*100;
$_SESSION['payment-direct'] = $payment_direct;
$daily = ($daily *  30) * 100;
//$email = $_GET["emails"];
$con = new mycon();
$con->getconnect();
$useremail = $_COOKIE["useremail"];
$token =  $_COOKIE["access_token"];
$_SESSION['u_email'] = $useremail; 
$_SESSION['u_access_token'] = $token;
$id =  $_SESSION['u_email'];
$sqlaccount = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
$getaccount = $con->getrecords($sqlaccount);
$rs = $con->getresult($getaccount);
$id=$googlemail;
$accid = $rs["AccountID"];
$firstname = $rs["Firstname"];
$lastname = $rs["Lastname"];
$googlemail = $rs["GoogleEmail"];
$address = $rs["Addressline"];
$city = $rs["City"];
$postalcode = $rs["PostalCode"];
$number_camp = $_GET["numcampaigns"];
$sub_amount = $_GET["subamount"];
$web_link = $_GET["campaignlink"];
$_SESSION['payment-plan'] = $_GET["selectplan"];
$_SESSION['payment-platform'] = $_GET["selectplatform"];
$_SESSION['payment-campaign'] = $_GET["selectcampaign"];
$sub_amount = ($sub_amount * 100);
if ($_SESSION['payment-plan']=="Monthly") {$daily=$_GET["dailybudget"];$daily = ($daily) * 100;}
$_SESSION['redirect_url']=null;
$_SESSION['subscription-type'] = "Basic";
$_SESSION['payment-daily']=$_GET["dailybudget"];
$_SESSION['payment-monthly']=$_GET["subamount"];
$_SESSION['payment'] = $daily + $sub_amount; 
$_SESSION['given_name']=$firstname;
$_SESSION['family_name']=$lastname;
$_SESSION['email']= $googlemail ;
$_SESSION['address_line1']=$address;
$_SESSION['city']=$city;
$_SESSION['postal_code']=$postalcode;
$_SESSION['website-link']=$web_link;
$_SESSION['contact-num'] = "01243 884333";

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
        "success_redirect_url" => "https://tailormadetraffic.com/dashboard/sandbox/debit_success.php",
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
//echo $sub_amount;
$_SESSION['redirect_url'] = $redirectFlow->id;
echo "<script>window.location.replace('".$redirectFlow->redirect_url."');</script>";
}catch(Exception $error){
    $_SESSION['error_handler'] = $error->getMessage();
   //echo $error;
    echo "<script>window.location.replace('error.php');</script>";
}finally{
    //echo "<script>window.location.replace('error.php');</script>";
}
?>
