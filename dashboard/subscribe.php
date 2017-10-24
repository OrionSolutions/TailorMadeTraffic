    <?php 
    error_reporting(0);
    include ('class/clsConnection.php');
    session_start();
        if(isset( $_SESSION['SubscriptionTypeID']) && !empty( $_SESSION['SubscriptionTypeID'])) {
            $SubscriptionType = $_SESSION["SubscriptionTypeID"];
            $Pricing = $_SESSION["PricingSession"];
            $NumCampaign = $_SESSION["Campaign"];
        }else{
            //header('Location:subscription-login.php');
            //echo "Session Not Started";
        }


    $useremail = $_COOKIE["useremail"];
    $token =  $_COOKIE["access_token"];
    $_SESSION['u_email'] = $useremail; 
    $_SESSION['u_access_token'] = $token;
    $id = $_COOKIE["useremail"];
    $_SESSION['payment-type']= "Subscribe_Payment";
   

?>
<!doctype html>
<html>
    <head>
        <title>Create Subscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
       <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
        <script src="js/firebase-config.js?nocache=1"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       <!-- <script src="js/google.js?nocache=1"></script> -->
     <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
    </head>
   
    <body class="register">
        
        <!--===========NAVIGATION CONTAINER==============-->
        <div class="nav-container"> 
            <div class="container">
                <div class="full-width">
                    <div class="one-half first">
                        <img src="images/logo.png">
                    </div>
                    <div class="one-half last">
                        <div class="home-button">
                            <span><a href="https://tailormadetraffic.com/dashboard/my_subscriptions.php" id="back" ><i class="fa fa-home" aria-hidden="true"></i><span>Back</span></a></span>
                        <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div> 
            </div>    
        </div>   
        <!--===========NAVIGATION CONTAINER==============-->
        
        <!--===========FORM CONTAINER==============-->
         
        <div class="container registration">
        <div class="full-width">
            <div class="form-container-register">
                <h1>Select A Subscription <span> We'd love to be working with you!</span></h1>
                <form action="gateway/sand_box_api.php" method="get">
                <!-- Left -->
                  <label><span><i class="fa fa-chevron-down"></i></span>
                    <select name="premiumselection" class="selectbox" id="premiumselection">
                        <option value="Basic Advertising">Basic Advertising</option>
                        <option value="Advance Advertising">Advance Advertising</option>
                        <option value="Package Advertising">Package Advertising</option>
                        <option value="Custom Advertising">Custom Budget</option>
                    </select>
                    <script type="text/javascript">
                   // console.log($("#premiumselection").val("1"));
                    $('select[name=premiumselection] option[value=<?php echo $SubscriptionType; ?>]').attr('selected','selected');
                </script>
                </label>

                <!--<label><span><i class="fa fa-envelope-o"></i></span>-->
                    <input type="hidden" id="emails" name="emails" class="textbox disabled" placeholder="Primary Email" value="<?php echo $id; ?>" readonly>
                <!--</label>-->

                <div class="one-half first">

                   <label><span><i class="fa fa-money"></i></span>
                        <input type="hidden" class="textbox disabled" id="subamount" name="subamount" value="<?php echo $Pricing; ?>" placeholder="Subscription Amount" readonly>
                        <input type="text" class="textbox disabled" id="subamount1" name="subamount1" value="<?php echo $Pricing; ?>" placeholder="Subscription Amount" readonly>
                    </label> 
                    
                </div>
                <!-- Left -->

                <!-- Right -->
                <div class="one-half last">
                    <div class="one-half first">
                    <label><span><i class="fa fa-chevron-down"></i></span>
                    <select id="selectplan" name="selectplan" class="selectbox" required>                      
                        <option value="Daily">Daily</option>
                        <option value="Monthly">Monthly</option>
                    </select>
                </label>
                    </div>

                    <div class="one-half last">
                    <label><span><i class="fa fa-money"></i></span>
                        <input type="number" class="textbox" id="dailybudget" name="dailybudget" placeholder="Budget Value" required>
                    </label>
                    </div>
                  
                </div>
                <!-- Right -->
                <div class="clear"></div>

                <div class="one-half first">
                    <label><span><i class="fa fa-chevron-down"></i></span>
                        <select id="selectplatform" name="selectplatform" class="selectbox" required>
                            <option value="">Choose Platform</option>      
                            <option value="Facebook Marketing">Google Marketing</option>                  
                            <option value="Facebook Marketing">Facebook Marketing</option>
                            <option value="Email Marketing">Email Marketing</option>
                            <option value="Web Marketing">Web Marketing</option>
                        </select>
                    </label>
                </div>

                <div class="one-half last">
                    <label><span><i class="fa fa-chevron-down" required></i></span>
                        <select id="selectcampaign" name="selectcampaign" class="selectbox" required>   
                            <option value="">Select Campaign Objective</option>                        
                            <option value="Get More Traffic">Get More Traffic</option>
                            <option value="Get More Calls">Get More Calls</option>
                            <option value="Get more convertions">Get more convertions</option>
                        </select>
                    </label>
                </div>
                    
                <div class="clear"></div> 

                <div class="one-half first">
                    <label><span><i class="fa fa-money"></i></span>
                        <input type="text" class="textbox" id="campaigntitle" name="campaigntitle" placeholder="Campaign Title" required>
                    </label>
                </div>
                
                <div class="one-half last">
                    <label><span><i class="fa fa-link"></i></span>
                        <input type="url" class="textbox" id="campaignlink" name="campaignlink" onblur="checkURL(this)" placeholder="Website Address" required>
                    </label>            
                </div>
                <input type="hidden" id="mail" name="mail">
                <input type="hidden" id="session" name="session">
                <input type="submit" id="btnSubscribe" name="btnSubscribe" value="Subscribe" class="button">
                <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
        
    <!--===========FORM CONTAINER==============-->
        
  <script type="text/javascript" src="js/subscribe.js"></script>
    </body>
</html>