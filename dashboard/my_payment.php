<?php
try{

    include_once('class/clsConnection.php');
    include('includes/variable.php');
    include('session.php');
    include('sessionuser.php');

    
    include ('class/clsConnection.php');
    require 'gateway/vendor/autoload.php';
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

    $user_name = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
    $getUser = $con->getrecords($user_name);
    $rsUser = $con->getresult($getUser);
    $user = $rsUser["Firstname"] ." ". $rsUser["Lastname"];

    $sqlexist = "SELECT COUNT(`tblaccount`.`GoogleEmail`) AS Existing,`tblaccount`.`AccountID` FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
    $getexist = $con->getrecords($sqlexist);
    $rs = $con->getresult($getexist);
    $exist = $rs["Existing"];
    $accid = $rs["AccountID"];
    $sqlsiteid = "SELECT * FROM `tblwebdetails` WHERE `tblwebdetails`.`AccountID`='" . $accid . "';";
    $getsiteid = $con->getrecords($sqlsiteid);
    $rssite = $con->getresult($getsiteid);
    $siteid = $rssite["SiteID"];
    
    $sqlsubscription = "SELECT * FROM `tblsubscription` WHERE AccountID = '".$accid."' AND `PaymentType` = 'Direct_Payment'";
    $idCheck = "SELECT * FROM `tblsubscription` WHERE AccountID = '".$accid."' AND `PaymentType` = 'Direct_Payment'";
    $getsubscription = $con->getrecords($sqlsubscription);
    $mobile_subscription = $con->getrecords($sqlsubscription);
    //$idRecord = $con->getrecords($idCheck);
   
}catch(Exception $error){
    echo $error;
}
?>
<html>

<head>
    <title>Payment - Tailor Made Traffic</title>

    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google-signin-scope" content="https://www.googleapis.com/auth/analytics.readonly">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/font-awsome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/login.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="js/fancy-custom.js"></script>
    <script src="js/firebase-config.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/google.js"></script>
    <script src="js/responsive-side.js"></script>
    <script>
        (function(w, d, s, g, js, fs) {
            g = w.gapi || (w.gapi = {});
            g.analytics = {
                q: [],
                ready: function(f) {
                    this.q.push(f);
                }
            };
            js = d.createElement(s);
            fs = d.getElementsByTagName(s)[0];
            js.src = 'https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js, fs);
            js.onload = function() {
                g.load('analytics');
            };
        }(window, document, 'script'));
    </script>
</head>

<body>
    <!-- Top Menu -->
    <!-- Top Menu -->
    <!-- Middle Menu -->
    <?php include('sidebar.php') ?>>
    <!-- Middle Menu -->
    <!-- Dashboard -->

    
        <div class="dashboard-wrapper">
        <?php if(mysqli_num_rows($getsubscription)){ ?>

            <div class="top-header">
                <div class="full-width">
                    <ul class="tab-menu">
                        <li><h1><i class="fa fa-line-chart"></i> Dashboard</h1></li>
                        <li><a href="https://tailormadetraffic.com/dashboard/order-plan.php" class="menu-button">New Development Service Payment  <i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="user-info">
                        <img src="images/avatar.jpg" id="myavatar" class="avatar">
                        <div class="user-options">
                            <a href="#" id="logout">Logout</a>
                        </div>
                        <div>
                            <p><?php echo $user; ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>  
            </div>
    
            <div class="desktop">
   
            
                <div class="full-width">
                    <div class="subscriptions-holder">
                        <h1>Current Development Payment</h1>
                        <div class="subscription-details">
                            <div class="one-fourth first items">
                                <h2>Service Type</h2>
                            </div>
                            <div class="one-fourth items">
                                <h2>Amount</h2>
                            </div>
                            <div class="one-fourth items">
                                <h2>Charge Date</h2>
                            </div>
                            <div class="one-fourth last items">
                                <h2>Status</h2>
                            </div>


                            <div class="clear"></div>

                <?php
                $x=0;
                while($rsdata =mysqli_fetch_assoc($getsubscription)) { 
                $paymentvalue=0;
                    if($rsdata["PaymentPlan"]=="Monthly") {$paymentvalue=$rsdata["DailyBudget"];}else{$paymentvalue= ($rsdata["DailyBudget"] * 30);}
                    $subscription_amount =  $rsdata["SubscriptionAmount"] + $paymentvalue;
                    $subscription_amount = number_format($subscription_amount, 2, '.','');

                    if($rsdata["PaymentID"]!=null){
                        try{
                            //$ids = $rsdata["UniqueID"];
                            //echo $rsdata["PaymentID"];
                            $payment = $client->payments()->get($rsdata["PaymentID"]);
                            //$customer_ID = $payment->metadata->customer_id;
                            $payment_status = $payment->status;
                            $subscription_amount = ($payment->amount)/100;
                            $charge_date = $payment->charge_date;
                            $paymentID = $payment->id;
                        }catch(Exception $error){
                            $_SESSION['error_handler'] = $error->getMessage();
                        echo "<script>window.location.replace('gateway/error.php');</script>";
                        // echo $start_date. "<br/>";
                        //echo $customer_ID. "<br/>";
                        }
                ?>
                            <div class="subscriptions">
                                <div class="s-items">
                                    <div class="one-fourth first items">
                                        <h3><?php echo $rsdata["SubscriptionTitle"];?></h3>
                                        <h4>(<?php echo $rsdata["PaymentCampaignTitle"];?>)</h4>
                                    </div>
                                    <div class="one-fourth items">
                                        <h3>£ <?php echo $subscription_amount ?></h3>
                                    </div>
                                    <div class="one-fourth items">
                                        <h3><?php echo $charge_date;?></h3>
                                    </div>
                                    <div class="one-fourth last items">
                <?php 
                    switch($payment_status) {
                        case "pending_submission": $var="Payment pending";$color="orange";break;
                        case "submitted": $var="Payment Submitted";$color="orange";break;
                        case "paid_out": $var="Active";$color="green";break;
                        case "cancelled": $var="Cancelled";$color="red";break;
                    }
                ?>
                                        <h3 style="color:<?php echo $color;?>;">
                                        <?php echo $var; ?></h3>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="controls">
                                    <a href="payment-invoice.php?payment_id=<?php echo $paymentID;?>&&accid=<?php echo $accid; ?>" data-id="<?php echo $rsdata["PaymentID"];?>" class="various fancybox.ajax button">View Invoice</a>
                                    <?php if($payment_status!="cancelled"){ ?>

                                    <?php } ?>
                                    <div class="clear"></div>
                                </div>

                            </div>
        <?php } }?>
                        </div>
                    </div>
                </div>
            

        <?php 
        }else{
        ?>
            <div class="container">
                <div class="full-width">
                    <div class="account-status">
                        <i class="fa fa-exclamation-circle"></i>
                        <p>No current web service at this time.</p>
                        <a href="https://tailormadetraffic.com/dashboard/order-plan.php" class="button blue">New web service <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
</div>
<!-- ========================================= Responsive ================================== -->
      
    
<div class="container mobile">
 <?php if(mysqli_num_rows($mobile_subscription)){ ?>

    <div class="full-width">
        <h1 class="content-title">Current Development Payment</h1>    
   
    <?php
    
        while($rs =mysqli_fetch_assoc($mobile_subscription)) { 
            $paymentvalue=0;
            if($rsdata["PaymentPlan"]=="Monthly") {$paymentvalue=$rsdata["DailyBudget"];}else{$paymentvalue= ($rsdata["DailyBudget"] * 30);}
            $subscription_amount =  $rsdata["SubscriptionAmount"] + $paymentvalue;
            $subscription_amount = number_format($subscription_amount, 2, '.','');


            if($rs["PaymentID"]!=null){
                try{
                    //$ids = $rsdata["UniqueID"];
                    //echo $rsdata["PaymentID"];
                    $payment = $client->payments()->get($rs["PaymentID"]);
                   // $customer_ID = $subscription->metadata->customer_id;
                    $payment_status = $payment->status;
                    $subscription_amount = ($payment->amount)/100;
                    $charge_date = $payment->charge_date;
                    $paymentID = $payment->id;
                }catch(Exception $error){
                    $_SESSION['error_handler'] = $error->getMessage();
                   echo "<script>window.location.replace('gateway/error.php');</script>";
                  // echo $start_date. "<br/>";
                   //echo $customer_ID. "<br/>";
                }
            ?>
        <div class="sub-content">
            <div class="sub-center-left">

          
                <div class="sub-column">
                    <h2>Subscription Type: <span><?php echo $rs["SubscriptionTitle"];?></span></h2>
                </div>

                <div class="sub-column">
                    <h2>Subscription Amount: <span><strong>£</strong><?php echo $subscription_amount ?></span></h2>

                </div>

                <div class="sub-column">
                    <h2>Start Date: <span><?php echo $charge_date;?></span></h2>
                </div>

                <div class="sub-column">
                    <h2>Status: <span class="status">
                    <?php 
                     switch($payment_status) {
                        case "pending_submission": $var="Payment pending";$color="orange";break;
                        case "submitted": $var="Payment Submitted";$color="orange";break;
                        case "paid_out": $var="Active";$color="green";break;
                        case "cancelled": $var="Cancelled";$color="red";break;
                    }
                ?>
                                        <?php echo $var; ?>
                </h2>
                </div>
            </div>   
            
            <div class="controls">
                <a href="payment-invoice.php?payment_id=<?php echo $paymentID;?>&&accid=<?php echo $accid; ?>" data-id="<?php echo $rsdata["PaymentID"];?>" class="various fancybox.ajax button">View Invoice</a>
            </div>
            
        </div>
        
            <div class="clear"></div>
            
    <?php 
    }}
    ?>
        
        </div>
    </div>
    <?php 
}else{
?>
    <div class="container">
        <div class="full-width">
            <div class="account-status">
                <i class="fa fa-exclamation-circle"></i>
                <p>No current web service at this time.</p>
                <a href="https://tailormadetraffic.com/dashboard/web-offers.php" class="button blue">New web service <i class="fa fa-plus"></i></a>
            </div>
        </div>
<?php } ?>
</div>
</body>


<script src="js/geturi.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/avatar.js"></script>
</html>