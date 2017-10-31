<?php 

session_start();
if(isset( $_SESSION['subscription_id']) && !empty( $_SESSION['subscription_id'])) {
   $subscriptionID =  $_SESSION['subscription_id'];
 }else{
    header('Location:https://tailormadetraffic.com/dashboard/my_subscriptions.php');;
 }
 $accid = $_SESSION['USER_ID'];

try{
    require 'vendor/autoload.php';

    $client = new \GoCardlessPro\Client([
        'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
        'environment' => \GoCardlessPro\Environment::LIVE
    ]);
      
      $subscription = $client->subscriptions()->get($subscriptionID);
      
      //echo $subscription->id . "\n";
      $amount = $subscription->amount;
      $amount = $amount / (float) 100.00;
      $amount = sprintf("%.2f", $amount);
      $subscription_number = $subscription->metadata->subscription_number ."\n";
     // echo $subscription->created_at ."\n";


}catch(Exception $subscription_error){
    echo $subscription_error;
}

?>
<!doctype html>
<html>
    <head>
        <title>Invoice Tailor Made Traffic</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="https://tailormadetraffic.com/dashboard/gateway/style.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
       <!-- <script src="js/google.js?nocache=1"></script> -->
    </head>
    <body>
        
        <!-- ===========NAVIGATION CONTAINER============== -->
        <div class="nav-container"> 
            <div class="container">
                <div class="full-width">
                    <div class="one-half first">
                        <h1>Tailor Made Traffic Dashboard</h1>
                    </div>
                    <div class="one-half last">
                        <div class="home-button">
                            <span><a href="https://tailormadetraffic.com/dashboard/beta-dashboard/my_subscriptions.php"><i class="fa fa-home" aria-hidden="true"></i>Back to Home</a></span>
                        <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div> 
            </div>    
        </div>   
        <!-- ===========NAVIGATION CONTAINER============== -->
        
    <div id="print-area">
        <div class="container">
            <div class="full-width">
               <div class="invoice">
                    <div class="invoice-head">
                        <div class="one-half first items">
                            <div class="logo">
                                <img src="images/tailor_made_traffic.png" alt="tailor_logo">                  
                                </div>
                
                        </div>
                        <div class="one-half last items right">
                            <h1>Tailor Made Traffic Ltd</h1>
                            <h1>18 Russell Road, West Wittering, Chichester, United Kingdom, </h1>
                            <h1>PO20 8EF</h1>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="invoice-body">
                        <div class="one-half first">
                            <div class="details">
                                <ul class="invoice-payment-details">
                                    <li>Invoice Number:</li>
                                    <li>Subscription Type:</li>
                                    <li>Subscription Date:</li>
                                    <li>Invoice To:</li>
                                    <li>Invoice Date:</li>
                                </ul>
                            </div>
                            <div class="details">
                                    <ul class="invoice-payment-fields">
                                    <li><?php echo $subscription_number; ?></li>
                                    <li><?php echo $_SESSION['subscription-type']; ?></li>
                                    <li><?php echo $subscription->created_at ?></li>
                                    <li><?php echo $_SESSION['FIRSTNAME'] ." ". $_SESSION['LASTNAME'];  ?></li>
                                    <li><?php echo date("Y-m-d"); ?></li>
                                    </ul>
                                </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="one-half first address">
                            <h1>Billing Address</h1>
                            <ul class="billing-address-details">
                                <li><h2><?php echo $_SESSION['FIRSTNAME'] ." ". $_SESSION['LASTNAME'];  ?></h2></li>
                                <li><h2><?php echo $_SESSION['ADDRESS']; ?></h2></li>
                                <li><h2><?php echo $_SESSION['CITY']; ?></h2></li>
                                <li><h2><?php echo $_SESSION['POSTAL_CODE'] ?></h2></li>
                                <li><h2><?php echo $_SESSION['USER_EMAIL']; ?></h2></li>
                                <li><h2><?php echo $_SESSION['Phone']; ?></h2></li>
                            </ul>
                        </div>
                        <div class="one-half last address">
                                <h1>Company Address</h1>
                                <ul class="billing-address-details">
                                    <li><h2><?php echo $_SESSION['FIRSTNAME'] ." ". $_SESSION['LASTNAME'];  ?></h2></li>
                                    <li><h2><?php echo $_SESSION['ADDRESS']; ?></h2></li>
                                    <li><h2><?php echo $_SESSION['CITY']; ?></h2></li>
                                    <li><h2><?php echo $_SESSION['POSTAL_CODE'] ?></h2></li>
                                    <li><h2><?php echo $_SESSION['USER_EMAIL']; ?></h2></li>
                                    <li><h2><?php echo $_SESSION['Phone']; ?></h2></li>
                                </ul>
                        </div>
                        <div class="clear"></div>

                        <div class="invoice-subscription">
                            <h1>Subscription Details</h1>
                            <div class="one-third first subscription-thead"><h2>Subscription Type</h2></div>
                            <div class="one-third subscription-thead"><h2>Monthly Fee</h2></div>
                            <div class="one-third last subscription-thead"><h2>Total</h2></div>
                            <div class="clear"></div>

                            <div class="one-third first subscription-items"><h2><?php echo $_SESSION['subscription-type'] ?></h2></div>
                            <div class="one-third subscription-items"><h2><?php echo $amount ?> <i class="fa fa-gbp"></i></h2></div>
                            <div class="one-third last subscription-items"><h2><?php echo $amount ?> <i class="fa fa-gbp"></i></h2></div>
                            <div class="clear"></div>

                            <div class="sub-total">
                                <h1>Sub Total</h1>
                                <h2><?php echo $amount?> <i class="fa fa-gbp"></i></h2>
                            </div>
                            <div class="clear"></div>   
                        </div>
                    </div>
               </div>
            </div>
           
        </div>
    </div>
    <a href="https://tailormadetraffic.com/dashboard/print.php?subscription_id=<?php echo $subscriptionID."&&accid="; ?><?php echo $accid; ?>" target="_blank" id="print" class="btn-print"><i class="fa fa-print"> </i>Print</a>
    <?php
     session_unset();
     session_destroy(); ?>
    </body>
</html>