<?php 
session_start();
if(isset( $_SESSION['subscription_id']) && !empty( $_SESSION['subscription_id'])) {
   $subscriptionID=  $_SESSION['subscription_id'];
 }else{
    header('Location:index.php');;
 }
?>
<!doctype html>
<html>
    <head>
        <title>Invoice Tailor Made Traffic</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="style.css?ver=2" rel="stylesheet" type="text/css">
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
                            <span><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Back to Home</a></span>
                        <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div> 
            </div>    
        </div>   
        <!-- ===========NAVIGATION CONTAINER============== -->
        

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
                            <h1>Tailor Made Traffic Inc</h1>
                            <h1>34 Hendford Hill</h1>
                            <h1>MOYLES COURT BH24 8HU</h1>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="invoice-body">
                        <div class="one-half first">
                            <div class="details">
                                <ul class="invoice-payment-details">
                                    <li><h1>Invoice Number: </h1></li>
                                    <li><h1>Subscription Type:</h1></li>
                                    <li><h1>Subscription Date:</h1></li>
                                    <li><h1>Invoice To: </h1></li>
                                    <li><h1>Invoice Date: </h1></li>
                                </ul>
                            </div>
                            <div class="details">
                                    <ul class="invoice-payment-fields">
                                        <li><h1><?php echo $subscriptionID; ?></h1></li>
                                        <li><h1>Basic</h1></li>
                                        <li><h1>2017-10-8</h1></li>
                                        <li><h1>John Darling</h1></li>
                                        <li><h1>2017-10-8</h1></li>
                                    </ul>
                                </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="one-half first address">
                            <h1>Billing Address</h1>
                            <ul class="billing-address-details">
                                <li><h2>John Darling</h2></li>
                                <li><h2>34 Hendford Hill</h2></li>
                                <li><h2>MOYLES COURT</h2></li>
                                <li><h2>BH24 8HU</h2></li>
                                <li><h2>enquires@tailormadetraffic.com</h2></li>
                                <li><h2>01243 884333</h2></li>
                            </ul>
                        </div>
                        <div class="one-half last address">
                                <h1>Company Address</h1>
                                <ul class="billing-address-details">
                                    <li><h2>John Darling</h2></li>
                                    <li><h2>34 Hendford Hill</h2></li>
                                    <li><h2>MOYLES COURT</h2></li>
                                    <li><h2>BH24 8HU</h2></li>
                                    <li><h2>enquires@tailormadetraffic.com</h2></li>
                                </ul>
                        </div>
                        <div class="clear"></div>

                        <div class="invoice-subscription">
                            <h1>Subscription Details</h1>
                            <div class="one-third first subscription-thead"><h2>Subscription Type</h2></div>
                            <div class="one-third subscription-thead"><h2>Monthly Fee</h2></div>
                            <div class="one-third last subscription-thead"><h2>Total</h2></div>
                            <div class="clear"></div>

                            <div class="one-third first subscription-items"><h2>Basic</h2></div>
                            <div class="one-third subscription-items"><h2>1,200 <i class="fa fa-gbp"></i></h2></div>
                            <div class="one-third last subscription-items"><h2>1,200 <i class="fa fa-gbp"></i></h2></div>
                            <div class="clear"></div>

                            
                            <div class="one-third first subscription-items"><h2>Premium</h2></div>
                            <div class="one-third subscription-items"><h2>2,200 <i class="fa fa-gbp"></i></h2></div>
                            <div class="one-third last subscription-items"><h2>2,200 <i class="fa fa-gbp"></i></h2></div>
                            <div class="clear"></div>

                            <div class="sub-total">
                                <h1>Sub Total</h1>
                                <h2>3,400 <i class="fa fa-gbp"></i></h2>
                            </div>
                            <div class="clear"></div>   
                        </div>
                    </div>
               </div>
            </div>
           
        </div>
        <?php session_destroy(); ?>
    </body>
</html>