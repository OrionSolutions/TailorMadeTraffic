<?php 
//initialize the session
error_reporting(0);
  session_start();
  $useremail = $_COOKIE["useremail"];
  $token =  $_COOKIE["access_token"];
  $_SESSION['u_email'] = $useremail; 
  $_SESSION['u_access_token'] = $token;
  $id = $_COOKIE["useremail"];
  $ref = $_GET["ref"];
  $_SESSION['reference'] = $ref;

  include ('class/clsConnection.php');
  
  $con = new mycon();
  $con->getconnect();
  $sqlaccount = "SELECT * FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
  $getaccount = $con->getrecords($sqlaccount);
  $rs = $con->getresult($getaccount);

  if($rs){
    
  }else{echo "<script>window.location.replace('register.php');</script>";
  }

$SubscriptionTypeID = $_GET["SubscriptionTypeID"];
if ($SubscriptionTypeID=="") { 
    $SubscriptionTypeID=1;
}
$_SESSION["SubscriptionTypeID"] = $SubscriptionTypeID;

switch ($SubscriptionTypeID) {
    case 1:
        $_SESSION["PricingSession"] = 29;
        $_SESSION["Campaign"]=1;
        $_SESSION["SubscriptionTitle"] = "Basic Advertising";
        break;
    case 2:
        $_SESSION["PricingSession"] = 59;
        $_SESSION["Campaign"]=5;
        $_SESSION["SubscriptionTitle"] = "Advanced Advertising";
        break;
    case 3:
        $_SESSION["PricingSession"] = 99;
        $_SESSION["Campaign"]=10;
        $_SESSION["SubscriptionTitle"] = "Package Advertising";
        break;
    case 4:
        $_SESSION["PricingSession"] = 0;
        $_SESSION["Campaign"]=15;
        $_SESSION["SubscriptionTitle"] = "Custom Budget";
        break;

}

?>
<!doctype html>
<html>
    <head>
        <title>Subscription Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
        <script src="js/firebase-config.js?nocache=1"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       <!-- <script src="js/google.js?nocache=1"></script> -->
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
         <div class="preload"><img src="images/loading.gif"></div>
            <div class="container registration">
                <div class="full-width">
                    <div class="form-container-register">
                        <h1>Sign-In to continue for Subscription <span> Nice to see you back!</span></h1>
                        <div class="padded">
                            <a id="login_google" class="login-google"><i class="fa fa-google" aria-hidden="true"></i>Sign-in with Google</a>
                            <div class="separator"></div>  
                        </div>
                    </div>
                </div>
            </div>    
         <!--===========FORM CONTAINER==============-->
    </body>
     <script type="text/javascript" src="js/subscription-login.js"></script> 





</html>
<?php
setcookie("useremail", "", time()-3600);
setcookie("access_token", "", time()-3600);
?>