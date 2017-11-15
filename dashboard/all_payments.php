<?php
try{
    include_once('class/clsConnection.php');
    include('includes/variable.php');
    include('session.php');
    include('sessionuser.php');
    require 'gateway/vendor/autoload.php';
    $client = new \GoCardlessPro\Client([
        'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
        'environment' => \GoCardlessPro\Environment::LIVE
    ]);
    $id = $_SESSION["USER_EMAIL"];//$_COOKIE["useremail"];
    $useremail = $_SESSION["USER_EMAIL"];//$_COOKIE["useremail"];
    $token =  $_COOKIE["access_token"];
    $_SESSION['u_email'] = $useremail; 
    $_SESSION['u_access_token'] = $token;
    $gmail =  $_COOKIE["useremail"];
    $con = new mycon();
    $con->getconnect();
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
    
    $sqlsubscription = "SELECT * FROM `tblsubscription` WHERE `PaymentType` = 'Direct_Payment'";
    $idCheck = "SELECT * FROM `tblsubscription`,`tblsubscriptiontype` WHERE AccountID = '".$accid."' AND `tblsubscription`.`SubscriptionTypeID` = `tblsubscriptiontype`.`SubscriptionTypeID` AND `PaymentType`= `Direct_Payment`";
    $getsubscription = $con->getrecords($sqlsubscription);
    $m_subscription = $con->getrecords($sqlsubscription);
    
    $sqlstatus = "SELECT `subscription_status`.`status_description`,`tblsubscription`.`PaymentID`,`tblsubscription`.`CustomerID`,`tblsubscription`.`SubscriptionID` FROM `subscription_status`,`tblsubscription` WHERE `subscription_status`.`Status` = `tblsubscription`.`Status` AND `tblsubscription`.`Status` != 6 AND `tblsubscription`.`PaymentType`= 'Direct_Payment'";
    $s_status = $con->getrecords($sqlstatus);
    //$idRecord = $con->getrecords($idCheck);
    //$rs_subscription = $con->getresult($getsubscription);
    //$update = "UPDATE table_name SET `Status`=value, column2=value2,... WHERE some_column=some_value ";


    $payment_status =$client->payments()->list(); //list of 
    $payment_status = $client->payments()->list([
    "params" => ["customer" => "CU0007B8MDTVXV"]
    ]);
    foreach ($payment_status->records as $payment) {
    $payment_ID = $payment->id;
    $payment_status = $payment->status;
    }

}catch(Exception $error){
    echo $error;
}
?>
<html>

<head>
    <title>Subscriptions - Tailor Made Traffic</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="js/fancy-custom.js"></script>
    <script src="js/firebase-config.js"></script>
    <script src="js/logout.js"></script>
    <!-- <script src="js/google.js"></script> -->
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
   <?php //include('menu.php'); ?>

    

    <div class="all-subscription">

    <?php
    $validate = mysqli_num_rows($getsubscription); 
    if($validate>0) { ?>

    <div class="top-header">
        <div class="full-width">
            <ul class="tab-menu">
                <li><h1><i class="fa fa-line-chart"></i> Dashboard</h1></li>
                <li><a href="https://tailormadetraffic.com/dashboard/beta-dashboard/subscribe.php" class="menu-button">New Subscription <i class="fa fa-plus"></i></a></li>
            </ul>
            <div class="user-info">
                <img src="images/avatar.jpg" id="myavatar" class="avatar">
                <div class="user-options">
                    <a href="#" id="logout-google">Logout</a>
                </div>
                <div class="gmail">
                    <p><?php echo $gmail; ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>  
    </div>


    
    <div class="desktop">
    <!-- <div class="spacer"> -->
        <div class="full-width">
      
            <div class="subscriptions-holder">
                <h1>Current Subscriptions</h1>
                <div class="subscription-details">
                    <div class="one-fourth first items">
                        <h2>Subscription Type <?php echo $payment_ID; ?></h2>
                    </div>
                    <div class="one-fourth items">
                        <h2>Subscription Amount</h2>
                    </div>
                    <div class="one-fourth items">
                        <h2>Start Date</h2>
                    </div>
                    <div class="one-fourth last items">
                        <h2>Status</h2>
                    </div>


                    <div class="clear"></div>

        <?php
        $x=0;
        while($rsdata =mysqli_fetch_assoc($s_status)) { 
            
            $payment_start = $client->payments()->get($rsdata["PaymentID"]);
            $payment_charge = $payment_start->charge_date;
            $payment_test_s = $payment_start->status;

            switch($payment_test_s){
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
        
            if($rsdata["PaymentID"]!=null){
                //$ids = $rsdata["UniqueID"];
                /* $subscription = $client->subscriptions()->get($rsdata["UniqueID"]);
                $customer_ID = $subscription->metadata->customer_id;
                $start_date = $subscription->start_date;
                $payment_status =$client->payments()->list(); //list of 
                $payment_status = $client->payments()->list([
                "params" => ["customer" => $customer_ID]
                ]);
                foreach ($payment_status->records as $payment) {
                $payment_ID = $payment->id;
                $payment_status = $payment->status;
                }*/
                $x=$x+1;
                $update[$x] = "UPDATE tblsubscription SET Status= '".$gc_status."' WHERE `tblsubscription`.`PaymentID` = '".$rsdata["PaymentID"]."' ";
                $con->getrecords($update[$x]);
        ?>
                    <div class="subscriptions">
                        <div class="s-items">
                            <div class="one-fourth first items">
                                <h3><?php echo $payment_test_s; echo $update[$x]?></h3>
                                <h4>(<?php echo stripslashes($rsdata["PaymentPlatform"]);?>)</h4>
                            </div>
                            <div class="one-fourth items">
                                <h3>£ <?php echo $gc_status ?></h3>
                            </div>
                            <div class="one-fourth items">
                                <h3><?php echo $payment_charge."". $rsdata["CustomerID"];?></h3>
                            </div>
                            <div class="one-fourth last items">
        <?php 
            switch($status) {
                case "pending_submission": $var="Payment pending";$color="orange";break;
                case "submitted": $var="Payment Submitted";$color="orange";break;
                case "paid_out": $var="Active";$color="green";break;
                case "cancelled": $var="Cancelled";$color="red";break;
            }
        ?>
                                  <h3 style="color:<?php echo $color;?>;">
                                  <?php echo $rsdata["status_description"]?></h3>
                             </div>
                            <div class="clear"></div>
                        </div>
                        <div class="controls">
                            <a href="invoice-subscription.php?subscription_id=<?php echo $rsdata["UniqueID"];?>&&accid=<?php echo $accid; ?>" data-id="<?php echo $rsdata["UniqueID"];?>" class="various fancybox.ajax button">View Invoice</a>
                            <?php if($payment_test_s!="cancelled"){ ?>
                            <?php $_SESSION['paymentID'] = $payment_ID; ?>
                            <a href="gateway/cancel_subscription.php?subscription_id=<?php echo $rsdata["UniqueID"];?>&&accid=<?php echo $accid; ?>" class="button cancel">Cancel Subscription</a>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>

                    </div>
<?php } }?>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
<?php 
}else{
?>
    <div class="container">
        <div class="full-width">
            <div class="account-status">
                <i class="fa fa-exclamation-circle"></i>
                <p>No current subscription at this time. <?php echo $validate; ?></p>
                <a href="subscribe.php" class="button green">New Subscription <i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ========================================= Responsive ================================== -->
      
</body>

</html>