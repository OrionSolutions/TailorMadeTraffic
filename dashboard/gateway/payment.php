<?php
try{
    session_start();
    $project_title = $_SESSION['project-name'];
    $card_payment = $_SESSION['payment-direct'];
    $subscription_type = $_SESSION['platform-sub'];;
    $d_payment =  ($card_payment)/100;
    include ('../class/clsConnection.php');
    $con = new mycon();
    $con->getconnect();

    $sqlinvoice = "SELECT LPAD( MAX(`tblsubscription`.`SubscriptionID`)+1, 11, '0') AS MAX
    FROM `tblsubscription`";
    $getinvoicenumber = $con->getrecords($sqlinvoice);
    $rsinvoice = $con->getresult($getinvoicenumber);
    $invoiceid = $rsinvoice["MAX"];
    if($invoiceid == ""){
        $invoiceid = "00000000001";
    }else{
        $invoiceid = $rsinvoice["MAX"];
    }
    $_SESSION['invoice-id'] = $invoiceid;
    $star_date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));
    $unique_key = md5( $_SESSION['mandate_id'].date("M:d:Y h:i A ") ) ;
    require 'vendor/autoload.php';
    $client = new \GoCardlessPro\Client([
       'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
       'environment' => \GoCardlessPro\Environment::LIVE
    ]);
    $payment = $client->payments()->create([
      "params" => [
          "amount" =>  $card_payment, // 10 GBP in pence
          "currency" => "GBP",
          "description" => $subscription_type,
          "links" => [
              "mandate" =>  $_SESSION['mandate_id']
                           // The mandate ID from last section
          ],
          "metadata" => [
              "invoice_number" => $invoiceid,
              "payment_created" => date("Y-m-d"),
          ]
      ],
      "headers" => [
          "Idempotency-Key" => $unique_key,
      ]
    ]);
    $paymentID = $payment->id;

    $_SESSION['payment-id'] = $paymentID;
    $subscriptionTitle = $_SESSION["SubscriptionTitle"];

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
    $order_instructions = $_SESSION['order-instructions'];
    $order_instructions = addslashes($order_instructions);
    $SQLInsert ="INSERT INTO `tblsubscription`(`MandateID`,`AccountID`,`SubscriptionTypeID`,`SubscriptionAmount`,`DailyBudget`,`websitelink`,`StartDate`,`PaymentCampaign`,`PaymentPlan`,`PaymentPlatform`,`CustomerID`,`PaymentType`,`PaymentID`,`SubscriptionTitle`,`PaymentCampaignTitle`,`OrderInstructions`)";
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
    $SQLInsert = $SQLInsert."'".$paymentID."',";
    $SQLInsert = $SQLInsert."'".$subscription_type."',";
    $SQLInsert = $SQLInsert."'".$project_title."',";
    $SQLInsert = $SQLInsert."'".$order_instructions."');";
    $RSInsert=$con->getrecords($SQLInsert);
    echo "<script>window.location.replace('https://tailormadetraffic.com/dashboard/gateway/payment-stat.php');</script>"; 
}catch(Exception $e){
    echo $e;
}
?>
