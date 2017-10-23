<?php
session_start();
include ('class/clsConnection.php');
require '../gateway/vendor/autoload.php';
$client = new \GoCardlessPro\Client([
    'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
    'environment' => \GoCardlessPro\Environment::LIVE
]);
$useremail = $_COOKIE["useremail"];
$token =  $_COOKIE["access_token"];
$_SESSION['u_email'] = $useremail; 
$_SESSION['u_access_token'] = $token;
$con = new mycon();
$con->getconnect();
$id = $_COOKIE["useremail"];
/*
$sqlexist = "SELECT COUNT(`tblaccount`.`GoogleEmail`) AS Existing,`tblaccount`.`AccountID` FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
$getexist = $con->getrecords($sqlexist);
$rs = $con->getresult($getexist);
$exist = $rs["Existing"];
$accid = $rs["AccountID"];
$sqlsiteid = "SELECT * FROM `tblwebdetails` WHERE `tblwebdetails`.`AccountID`='" . $accid . "';";
$getsiteid = $con->getrecords($sqlsiteid);
$rssite = $con->getresult($getsiteid);
*/
$tbl_account= "SELECT * FROM `tblsubscription`,`tblaccount` WHERE `tblaccount`.`AccountID` = `tblsubscription`.`AccountID`  ;";
$getSubscription = $con->getrecords($tbl_account);

?>
<html>
<head>
    <title>Dashboard - Tailor Made Traffic</title>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google-signin-scope" content="https://www.googleapis.com/auth/analytics.readonly">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/font-awsome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script type="text/javascript" src="js/slicknav.js"></script>
    <script type="text/javascript" src="js/slicknav-init.js"></script>
</head>

<body>
    <!-- Top Menu -->
    <div class="header-top">
        <h1><i class="fa fa-user-secret"></i> Panel</h1>   
    </div>
    <!-- Top Menu -->
   
    <!-- Middle Menu -->
    <div class="admin-header">
        <div class="container">
            <div class="full-width">
                <ul>
                    <li><a href="index.php">Customers</a></li>
                    <li><a href="subscriptions-all.php">Subscriptions</a></li>
                    <li class="current"><a href="payments.php">Payments</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Middle Menu -->
    <div class="body-wrapper">
        <div class="body-head">
            <img src="images/tailor_made_traffic.png">
            <div class="search">
                <i class="fa fa-search"></i><input type="text" placeholder="Search"><a href="#" class="button yellow">Search</a>
            </div>
        </div>
        <div class="full-width">
            <div class="body-content">
                <div class="admin-title">
                    <div class="one-sixth first"><h1>Subscription Name</h1></div>
                    <div class="one-sixth"><h1>Subscription Number</h1></div>
                    <div class="one-sixth"><h1>Customer</h1></div>
                    <div class="one-sixth"><h1>Payment Type</h1></div>
                    <div class="one-sixth"><h1>Start Date</h1></div>
                    <div class="one-sixth last"><h1>Payment Status</h1></div>
                    <div class="clear"></div>
                </div>

                <?php 
                    while($subscription = mysqli_fetch_assoc($getSubscription)){
                        $s_type = $subscription["PaymentType"];
                ?>  
                <?php 
                
                if($s_type=="Subscribe_Payment"){
                    $subscribe = $client->subscriptions()->get($subscription["UniqueID"]);
                    $customer_ID = $subscribe->metadata->customer_id;
                    $start_date = $subscribe->start_date;
                    $payment_status =$client->payments()->list();
                    $payment_status = $client->payments()->list([
                    "params" => ["customer" => $customer_ID]
                    ]);
                    foreach ($payment_status->records as $payment) {
                    $payment_ID = $payment->id;
                    $payment_status = $payment->status;
                    $subscription_amount = ($payment->amount)/100;
                    
                    }
                    $payment_start = $client->payments()->get($payment_ID);
                    $payment_charge = $payment_start->charge_date;
                }else if($s_type == "Direct_Payment"){
                       //echo $rsdata["PaymentID"];
                    $payment = $client->payments()->get($subscription["PaymentID"]);
                    // $customer_ID = $subscription->metadata->customer_id;
                    $payment_status = $payment->status;
                    $payment_ID = $payment->id;
                    $subscription_amount = ($payment->amount)/100;
                    $charge_date = $payment->charge_date;
                }
                
                ?>

                <div class="admin-items">
                    <div class="one-sixth first"><h1><?php echo $subscription["SubscriptionTitle"]?></h1></div>
                    <div class="one-sixth"><h1><?php echo $subscription["SubscriptionID"];?></h1></div>
                    <div class="one-sixth"><h1><?php echo $subscription["Firstname"]." ".$subscription["Lastname"];?></h1></div>
                    <div class="one-sixth"><h1><?php echo$subscription["PaymentType"];?></h1></div>
                    <div class="one-sixth"><h1><?php echo $subscription["StartDate"];?></h1></div>
                    <div class="one-sixth last"><h1><?php echo $payment_status;?></h1></div>
                    <div class="clear"></div>
                </div>

                <?php }?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- Dashboard -->
 
   
</body>
</html>