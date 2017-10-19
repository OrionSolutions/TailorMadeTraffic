<?php 
try{
    session_start();
    $subscriptionTitle = $_SESSION["SubscriptionTitle"];
    include ('../class/clsConnection.php');
    $con = new mycon();
    $con->getconnect();
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
    $SQLInsert = $SQLInsert."'".$monthlypayment."',";
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

    if(isset( $_SESSION['mandate_id']) && !empty( $_SESSION['mandate_id'])) {
        $daily = $_GET["dailybudget"];
        //$email = $_GET["emails"];
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
          "start_date" => $star_date,
          "name" => $_SESSION['subscription-type'],
          "links" => [
              "mandate" =>  $_SESSION['mandate_id']
                           // Mandate ID from the last section
          ],
          "metadata" => [
              "subscription_number" => $invoiceid,
              "customer_id" => $_SESSION['customer_id']
          ]
      ],
      "headers" => [
          "Idempotency-Key" => $unique_key
      ]
    ]);
    
    // Keep hold of this subscription ID - we'll use it in a minute.
    // It should look a bit like "SB00003GKMHFFY"
    //print("ID: " . $subscription->id);
   // echo $subscription;
    //$subscriptions = $client->subscriptions()->get($subscription->id);

    /*$payment_status =$client->payments()->list();
    $payment_status = $client->payments()->list([
        "params" => ["customer" => $_SESSION['customer_id']]
      ]);
    foreach ($payment_status->records as $payment) {
       // echo $payment->id. "\n";
       // echo $payment->status. "\n";
        $_SESSION['payment-id'] = $payment->id;
        $_SESSION['payment-id'] = $payment->status;
      }*/
    
    $_SESSION['subscription_id'] = $subscription->id;

        $updateSQL = "UPDATE tblsubscription SET UniqueID='".$_SESSION['subscription_id']."'";
        $updateSQL = $updateSQL." WHERE SubscriptionID='".$invoiceid."'";
        $RSUpdate = $con->getrecords($updateSQL);

    echo "<script>window.location.replace('success.php');</script>";
    
}catch(Exception $error){
    $_SESSION['error_handler'] = $error->getMessage();
    echo "<script>window.location.replace('error.php');</script>";
}
   
?>