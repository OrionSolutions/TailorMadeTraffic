<?php 
    error_reporting(0);
    include_once('class/clsConnection.php');
    include('includes/variable.php');
    include('session.php');
    include('sessionuser.php');
    session_start();
        if(isset( $_SESSION['SubscriptionTypeID']) && !empty( $_SESSION['SubscriptionTypeID'])) {
            $SubscriptionType = $_SESSION["SubscriptionTypeID"];
            $Pricing = $_SESSION["PricingSession"];
            $NumCampaign = $_SESSION["Campaign"];
        }else{
            //echo "<script>window.location.replace('subscription-login.php');</script>";
        }  
    
    $useremail = $_COOKIE["useremail"];
    $token =  $_COOKIE["access_token"];
    $_SESSION['u_email'] = $useremail; 
    $_SESSION['u_access_token'] = $token;
    $id = $_COOKIE["useremail"];
    $SubscriptionType = 2;
    $_SESSION['payment-type']= "Direct_Payment";

?>
<!doctype html>
<html>
    <head>
        <title>Order Plan</title>
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
        <!-- <script src="js/order-plan.js"></script> -->
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
                        <img src="images/tailor_made_traffic.png">
                    </div>
                    <div class="one-half last">
                        <div class="home-button">
                        <span><a href="my_payment.php" id="back"><i class="fa fa-home" aria-hidden="true"></i><span>Back to dashboard</span></a></span>
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
                <h1>Select A Payment <span> We'd love to be working with you!</span></h1>
                <form class="form-order-plan" action="gateway/sand_box_api.php" method="get">
                <!-- Left -->
                <input id="projectName" name="projectName" class="textbox enabled" placeholder="Project Name" required>
                <label><span><i class="fa fa-chevron-down"></i></span>
                    <select name="platform-selection" class="selectbox" id="platform-selection">
                        <option value="Web Development" class="opt">Web Development</option>
                        <option value="Mobile Development" class="opt">Mobile Development</option>
                    </select>
                    <script type="text/javascript">
                    $('select[name=platform-selection] option[value=<?php echo $SubscriptionType; ?>]').attr('selected','selected');
                    </script>
                </label>
                <label><span><i class="fa fa-chevron-down"></i></span>
                    <select name="platform-selected" class="selectbox" id="platform-selected">
                        <option value="b-development" class="opt">Basic Web Development</option>
                        <option value="c-development" class="opt">Complete Web Development</option>
                        <option value="a-development" class="opt">Advance Web Development</option>
                    </select>
                    <script type="text/javascript"> 
                    </script>
                </label>

                <!--<label><span><i class="fa fa-envelope-o"></i></span>-->
                <!--</label>-->
                        <ul class="order-items">
                            <li>
                                <input type="hidden" id="emails" name="emails" class="textbox disabled" placeholder="Primary Email" value="<?php echo $id; ?>" readonly>                            
                            </li>
                            <li>
                                <input type="text" class="textbox disabled" id="payment_direct1" name="payment_direct1" value="<?php echo $Pricing; ?>" placeholder="Subscription Amount" readonly>                                
                                <i class="fa fa-money"></i>
                            </li>
                            <li>
                                <textarea id="instructions" name="instructions" class="instructions-field" placeholder="Set Instructions here.." required></textarea>                                
                            </li>
                        </ul>
                        
            
                    

                <!-- Left -->

                <div class="clear"></div>
                <input type="hidden" id="payment_direct" name="payment_direct" value="<?php echo $Pricing; ?>" placeholder="Subscription Amount" readonly> 
                <input type="hidden" id="mail" name="mail">
                <input type="hidden" id="session" name="session">
                <input type="submit" id="btnSubscribe" name="btnSubscribe" value="Pay Now" class="button">
                <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
        
    <!--===========FORM CONTAINER==============-->
        
    </body>
  
  <script type="text/javascript" src="js/web-offers.js"></script>
  <script type="text/javascript">

    $('#logout').click(function(){
      window.location.replace('https://tailormadetraffic.com/dashboard/subscription-login.php');
      firebase.auth().signOut().then(function() {
      }).catch(function(error) {
          alert("Error: "+ error);
      });
  });

</script> 
</html>