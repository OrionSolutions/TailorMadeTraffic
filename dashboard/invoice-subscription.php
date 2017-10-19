<?php 
    $subscriptionID = $_GET["subscription_id"];
    $accid = $_GET["accid"];
    include ('class/clsConnection.php');
    $con = new mycon();
    $con->getconnect();
    $sqldata = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`AccountID`='" . $accid . "';";
    $getdata = $con->getrecords($sqldata);
    $rs = $con->getresult($getdata);
    $AccountID = $rs["AccountID"];
    $Firstname = $rs["Firstname"];
    $Lastname = $rs["Lastname"];
    $Industry = $rs["Industry"];
    $Addressline = $rs["Addressline"];
    $City = $rs["City"];
    $PostalCode = $rs["PostalCode"];
    $GoogleEmail = $rs["GoogleEmail"];
    $Phone = $rs["Phone"];

    $sqlsubscription = "SELECT * FROM `tblsubscription` WHERE AccountID = '".$accid."' AND `PaymentType`= 'Subscribe_Payment'";

    $getsubscription = $con->getrecords($sqlsubscription);
    $data_rs = $con->getresult($getsubscription);
    //$idRecord = $con->getrecords($idCheck);
    $subscription_type = $data_rs["SubscriptionTitle"];



    try{
        require 'gateway/vendor/autoload.php';
    
        $client = new \GoCardlessPro\Client([
            'access_token' =>'live_gZJP-n7WoRErIDs5disNaRxe14bj8oNdYgogu0BQ',
            'environment' => \GoCardlessPro\Environment::LIVE
        ]);
          
          $subscription = $client->subscriptions()->get($subscriptionID);
          $subscription_number = $subscription->metadata->subscription_number;
          //$subscription_type = $subscription->name;
          $subscription_date = $subscription->created_at;
          $invoice_date = $subscription->start_date;


          $subscription_name = $subscription->name;
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
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
       <!-- <script src="js/google.js?nocache=1"></script> -->
    </head>
    <body>
        
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
                            <h1>18 Russell Road, West Wittering, Chichester, United Kingdom,</h1>
                            <h1>PO20 8EF</h1>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="invoice-body">
                        <div class="invoice-details">
                        <div class="one-half first">
                            <div class="details-1">
                                <ul class="invoice-payment-details">
                                    <li>Invoice Number:</li>
                                    <li>Subscription Type:</li>
                                    <li>Subscription Date:</li>
                                    <li>Invoice To:</li>
                                    <li>Invoice Date:</li>
                                </ul>
                            </div>
                        </div>
                        <div class="one-half last">
                            <div class="details">
                                    <ul class="invoice-payment-fields">
                                    <li><?php echo $subscription_number; ?></li>
                                    <li><?php echo $subscription_type; ?></li>
                                    <li><?php echo $subscription_date; ?></li>
                                    <li><?php echo $Firstname." ".$Lastname?></li>
                                    <li><?php echo $invoice_date; ?></li>
                                    </ul>
                                </div>
                        </div>
                        <div class="clear"></div>
                        </div>
                        <div class="one-half first address">
                            <h1>Billing Address</h1>
                            <ul class="billing-address-details">
                                <li><h2><?php echo $Firstname." ".$Lastname; ?></h2></li>
                                <li><h2><?php echo $Addressline; ?></h2></li>
                                <li><h2><?php echo $City; ?></h2></li>
                                <li><h2><?php echo $PostalCode; ?></h2></li>
                                <li><h2><?php echo $GoogleEmail; ?></h2></li>
                                <li><h2><?php echo $Phone; ?></h2></li>
                            </ul>
                        </div>
                        <div class="one-half last address">
                                <h1>Company Address</h1>
                                <ul class="billing-address-details">
                                <li><h2><?php echo $Firstname." ".$Lastname; ?></h2></li>
                                <li><h2><?php echo $Addressline; ?></h2></li>
                                <li><h2><?php echo $City; ?></h2></li>
                                <li><h2><?php echo $PostalCode; ?></h2></li>
                                <li><h2><?php echo $GoogleEmail; ?></h2></li>
                                <li><h2><?php echo $Phone; ?></h2></li>
                                </ul>
                        </div>
                        <div class="clear"></div>

                        <div class="invoice-subscription">
                            <h1>Subscription Details</h1>
                            <div class="one-third first subscription-thead"><h2>Subscription Type</h2></div>
                            <div class="one-third subscription-thead"><h2>Monthly Fee</h2></div>
                            <div class="one-third last subscription-thead"><h2>Total</h2></div>
                            <div class="clear"></div>

                            <div class="one-third first subscription-items"><h2><?php echo $subscription_type; ?></h2></div>
                            <div class="one-third subscription-items"><h2>£ <?php echo $amount; ?></h2></div>
                            <div class="one-third last subscription-items"><h2>£ <?php echo $amount; ?></h2></div>
                            <div class="clear"></div>

                            <div class="sub-total">
                                <h1>Sub Total</h1>
                                <h2><i class="fa fa-gbp"></i> <?php echo $amount; ?></h2>
                            </div>
                            <div class="clear"></div>   
                        </div>
                        
                    </div>
               </div>
            </div>
           
        </div>
    </div>
    <a  href="#" id="print" class="btn-print"><i class="fa fa-print"> </i>Print</a>

        <script>
            var originalContents = document.body;
            $('#print').click(function(){
              
                /*var printContents = document.getElementById('print-area').innerHTML;   
               // var printContents = document.getElementById(print-area');  
                document.body.innerHTML = printContents;
                window.print();*/
               
               // document.body.innerHTML = printContents;
               // window.print();
                var childWindow = window.open("print.php?subscription_id=<?php echo $subscriptionID."&&accid="; ?><?php echo $accid; ?>", '_blank');
                    //childWindow = document.getElementById("print-area");
                    childWindow.print(); 
            });
          
        </script> 
    </body>
</html>