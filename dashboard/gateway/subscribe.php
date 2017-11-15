<?php 
    require 'vendor/autoload.php';
        $client = new \GoCardlessPro\Client([
        'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
        'environment' => \GoCardlessPro\Environment::LIVE
    ]);
try{
    session_start();
     if(isset( $_SESSION['redirect_url']) && !empty( $_SESSION['redirect_url'])) {
        //echo $_SESSION['redirect_url'];
        $channel = $_SESSION['channel'];
        $subscriptionTitle = $_SESSION["SubscriptionTitle"];
        include ('../class/clsConnection.php');
        $con = new mycon();
        $con->getconnect();
        $useremail = $_COOKIE["useremail"];
        $token =  $_COOKIE["access_token"];
        $id =  $_SESSION['USER_EMAIL'];
        $sqlaccount = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
        $getaccount = $con->getrecords($sqlaccount);
        $rs = $con->getresult($getaccount);
        $id=$googlemail;
        $dailypayment = $_SESSION['payment-daily'];
        $monthlypayment = $_SESSION['payment-monthly'];
        $campaign_title = $_SESSION['campaign-title'];
        $mandateID= $_SESSION['mandate_id'];
        $accid = $rs["AccountID"];
        $_SESSION['account-id'] = $accid;
        $website_link = $_SESSION['website-link'];
        $subscriptionDate =date('Y-m-d');//$subscription->start_date;
        $subscriptionType =$_SESSION['subscription-type'];
        $payment_plan =$_SESSION['payment-plan'];
        $payment_platform = $_SESSION['payment-platform'];
        $payment_campaign = $_SESSION['payment-campaign'];
        $payment_type = $_SESSION['payment-type'];
        $customerID = $_SESSION['customer_id'];



        $SQLInsert ="INSERT INTO `tblsubscription`(`MandateID`,`AccountID`,`SubscriptionTypeID`,`SubscriptionAmount`,`DailyBudget`,`websitelink`,`StartDate`,`PaymentCampaign`,`PaymentPlan`,`PaymentPlatform`,`CustomerID`,`PaymentType`,`SubscriptionTitle`,`Channel`,`PaymentCampaignTitle`)";
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
        $SQLInsert = $SQLInsert."'".$subscriptionTitle."',";
        $SQLInsert = $SQLInsert."'".$channel."',";
        $SQLInsert = $SQLInsert."'".$campaign_title."');";
        $RSInsert=$con->getrecords($SQLInsert);
       
    
        //$star_date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));
    
        //$daily = $_GET["dailybudget"];
            //$email = $_GET["emails"];
        
        /*$client = new \GoCardlessPro\Client([
            'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
            'environment' => \GoCardlessPro\Environment::LIVE
        ]);*/
        
        // Keep hold of this subscription ID - we'll use it in a minute.
        // It should look a bit like "SB00003GKMHFFY"
        //print("ID: " . $subscription->id);
        
        //$subscriptions = $client->subscriptions()->get($subscription->id);
        
        $sqlinvoice = "SELECT LPAD( MAX(`tblsubscription`.`SubscriptionID`), 11, '0') AS MAX
        FROM `tblsubscription`";
        $getinvoicenumber = $con->getrecords($sqlinvoice);
        $rsinvoice = $con->getresult($getinvoicenumber);
        $invoiceid = $rsinvoice["MAX"];

        $unique_key = md5( $_SESSION['mandate_id'].date("M:d:Y h:i A ") ) ;
        $subscription = $client->subscriptions()->create([
            "params" => [
                "amount" => $_SESSION['payment'] , // 15 GBP in pence
                "currency" => "GBP",
                "interval_unit" => "monthly",
                "name" => $subscriptionTitle,
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

        $_SESSION['subscription_id'] = $subscription->id;

        $payment_status =$client->payments()->list(); //list of 
        $payment_status = $client->payments()->list([
        "params" => ["customer" => $customerID] 
        ]);
        foreach ($payment_status->records as $payment) {
        $payment_ID = $payment->id; 
        $status = $payment->status;
        }
        switch($status){
            case "pending_customer_approval": $gc_status=1; break;
            case "pending_submission": $gc_status=2; break;
            case "submitted": $gc_status=3; break;
            case "confirmed": $gc_status=4; break;
            case "paid_out": $gc_status=5; break;
            case "cancelled": $gc_status=6; break;
            case "customer_approval_denied": $gc_status=7; break;
            case "failed": $gc_status=8; break;
            case "charged_back": $gc_status=9; break;
        }
    
        $UpdateSQL="UPDATE tblsubscription SET";
        $UpdateSQL=$UpdateSQL."`PaymentID`='".$payment_ID."',";
        $UpdateSQL=$UpdateSQL."`Status`='".$gc_status."',";
        $UpdateSQL=$UpdateSQL."`UniqueID`='".$subscription->id."'";
        $UpdateSQL=$UpdateSQL." WHERE `SubscriptionID`='".$invoiceid."';";
        $RSUpdate = $con->getrecords($UpdateSQL);
        //echo $UpdateSQL; 
        /*$updateSQL = "UPDATE tblsubscription SET UniqueID='".$_SESSION['subscription_id']."'";
        $updateSQL = $updateSQL." WHERE SubscriptionID='".$invoiceid."'";
        $RSUpdate = $con->getrecords($updateSQL);*/
        //echo 
        echo "<script>window.location.replace('success.php');</script>";
            

     }else{
    // echo "<script>window.location.replace('https://tailormadetraffic.com/pricing');</script>";
    //echo "<script>alert('BOLS');</script>";
     }

    
}catch(Exception $error){
    $_SESSION['error_handler'] = $error->getMessage() . " on subscribe";
    echo "<script>window.location.replace('error.php');</script>";
    session_unset();
    session_destroy();
}
   
?>