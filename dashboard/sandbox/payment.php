<?php
try{
    session_start();
    
    $subscriptionTitle = $_SESSION["SubscriptionTitle"];
    include ('../class/clsConnection.php');
    $con = new mycon();
    $con->getconnect();
    $card_payment = $_SESSION['payment-direct'];
    $d_payment =  ($card_payment)/100;
    $useremail = $_COOKIE["useremail"];
    $token =  $_COOKIE["access_token"];
    $id =  $_SESSION['u_email'];
    $sqlaccount = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
    $getaccount = $con->getrecords($sqlaccount);
    $rs = $con->getresult($getaccount);
    $id=$googlemail;
    $dailypayment = $_SESSION['payment-daily'];
    $monthlypayment = $_SESSION['payment-monthly'];
    $mandateID= $_SESSION['mandate_id'];
    $accid = $rs["AccountID"];
    $website_link = $_SESSION['website-link'];
    $subscriptionDate =date('Y-m-d');//$subscription->start_date;
    $subscriptionType =$_SESSION['subscription-type'];
    $payment_plan =$_SESSION['payment-plan'];
    $payment_platform = $_SESSION['payment-platform'];
    $payment_campaign = $_SESSION['payment-campaign'];
    $payment_type = $_SESSION['payment-type'];
    $customerID = $_SESSION['customer_id'];
    $SQLInsert ="INSERT INTO `tblsubscription`(`MandateID`,`AccountID`,`SubscriptionTypeID`,`SubscriptionAmount`,`DailyBudget`,`websitelink`,`StartDate`,`PaymentCampaign`,`PaymentPlan`,`PaymentPlatform`,`CustomerID`,`PaymentType`,`SubscriptionTitle`)";
    $SQLInsert = $SQLInsert." VALUES('".$mandateID."',";
    $SQLInsert = $SQLInsert."'".$accid."',";
    $SQLInsert = $SQLInsert."'1',";
    $SQLInsert = $SQLInsert."'".$d_payment."',";
    $SQLInsert = $SQLInsert."'".$dailypayment."',";
    $SQLInsert = $SQLInsert."'".$website_link."',";
    $SQLInsert = $SQLInsert."'".$subscriptionDate."',";
    $SQLInsert = $SQLInsert."'".$payment_campaign."',";
    $SQLInsert = $SQLInsert."'".$payment_plan."',";
    $SQLInsert = $SQLInsert."'".$payment_platform."',";
    $SQLInsert = $SQLInsert."'".$customerID."',";
    $SQLInsert = $SQLInsert."'".$payment_type."',";
    $SQLInsert = $SQLInsert."'".$subscriptionTitle."');";
    $RSInsert=$con->getrecords($SQLInsert);
    $sqlinvoice = "SELECT LPAD( MAX(`tblsubscription`.`SubscriptionID`), 11, '0') AS MAX
    FROM `tblsubscription`";
    $getinvoicenumber = $con->getrecords($sqlinvoice);
    $rsinvoice = $con->getresult($getinvoicenumber);

    $invoiceid = $rsinvoice["MAX"];

    $star_date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));  




    echo $_SESSION['mandate_id'] . "\n";
    $unique_key = md5( $_SESSION['mandate_id'].date("M:d:Y h:i A ") ) ;
    require 'vendor/autoload.php';
    
    $client = new \GoCardlessPro\Client([
        'access_token' => 'sandbox_wfsxbTJt7uLZhnXSbrt-zetpIKiN8CM6ntls0dxI',
        'environment' => \GoCardlessPro\Environment::SANDBOX
    ]);
    
    $payment = $client->payments()->create([
      "params" => [
          "amount" => $card_payment, // 10 GBP in pence
          "currency" => "GBP",
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
     //$payments = $client->payments()->get($payment->id);
                                  // Payment ID from above
    echo "<script>window.location.replace('https://tailormadetraffic.com/dashboard/sandbox/payment-stat.php');</script>";
    //$payment = $client->payments()->cancel("PM000260X9VKF4");
    $_SESSION['payment-id'] = $payment->id;
}catch(Exception $e){
    echo $e;
}
?>
