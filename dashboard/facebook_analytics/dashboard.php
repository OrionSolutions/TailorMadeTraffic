<?php
error_reporting(0);
session_start();
require 'src/Facebook/autoload.php';
require 'facebook_sdk/vendor/autoload.php';

use FacebookAds\Object\Campaign;
use FacebookAds\Object\Fields\CampaignFields;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdsInsights;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = $_SESSION['fb_access_token'];
$ad_account_id = 'act_15686630';
$app_secret = '8c135ba81b086443c41ee685ff2756f6';
$app_id = '1702836673094421';

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();

$api = Api::init($app_id, $app_secret, $access_token);


$fb = new Facebook\Facebook([
'app_id' => '1702836673094421', // Replace {app-id} with your app id
'app_secret' => '8c135ba81b086443c41ee685ff2756f6',
'default_graph_version' => 'v2.10',
]);
/*
include ('class/clsConnection.php');
$fb_token = 'EAAYMuI8CoxUBAFcCHcsOkdiqIGJfLT75IEjEZCSGdBJY0FiLihrmsshrFCAs1ZCO5XO5H8pumtBTscJlGJBrt8QlP2oEfEic37WZAsdpMqvw8f4KCPPhJSIUm0ZB2ph3P1gLuIRCGJrSo6SmbJT8vywALZBEy5JZCTAmX8TbSaOPbeZAKjIPSX5gXlSZCHwyHClYIbkh5EOjsQZDZD';
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
setcookie("siteID",$siteid);
*/
include ('fb-get-data.php');

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script type="text/javascript" src="js/slicknav.js"></script>
    <script type="text/javascript" src="js/slicknav-init.js"></script>
    <script src="js/responsive-side.js"></script>
</head>

<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1702836673094421',
      xfbml      : true,
      version    : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


   <?php
/*
if ($exist == 0)
	{
	$jscript = "
              swal({
              title: 'Account Invalid',
              text: 'Register using your Google account.',
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              buttonsStyling: false
            })";
	echo '<script>' . $jscript . "</script>";
	echo "<script>setTimeout(function(){ window.location.replace('register.php'); }, 1500);</script>";
	}
*/
?>
    <!-- Middle Menu -->
    <?php include('sidebar.php'); ?>
    <!-- Middle Menu -->

   

   
    <!-- Dashboard -->
    <div class="dashboard-wrapper">
        <!-- <div class="container"> -->
        <?php include('menu.php'); ?>
        <!-- <div class="spacer"> -->
            <div class="full-width">  
                <div class="auth-banner hide" ><a href="#" id="fb-auth">Authenticate with Facebook</a></div>
                <?php 
                 

                    $helper = $fb->getRedirectLoginHelper();
                    $permissions = ['email']; // Optional permissions
                    $loginUrl = $helper->getLoginUrl('https://tailormadetraffic.com/dashboard/beta-dashboard/facebook_analytics/callback/fb-callback.php', $permissions);
                    //$next = "http://localhost/OrionShare/TailorMadeTraffic/dashboard/facebook_analytics/dashboard.php?status=logout";
                    $next = "https://tailormadetraffic.com/dashboard/beta-dashboard/facebook_analytics/dashboard.php?status=logout";
                    if($_GET['status']=="logout" || empty($_SESSION['fb_access_token'])){
                        $_SESSION['fb_access_token'] = "";
                        echo '<a class="fb-login" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
                    }else{
                        echo '<a class="fb-logout" href="' . $helper->getLogoutUrl($_SESSION['fb_access_token'], $next, $separator = '&') . '">Logout</a>';
                    

                ?>
                <div class="campaign">
                    
                <h1>Managed Campaigns</h1>
                
                <?php 
                $data_week = getCampaigns();
                    foreach ($data_week as $i){        
                      $id = $i['id'];
                      $name = $i['name'];
                    
                ?>
               
                       <div class="campaign-items">
                       <a href="page-details.php?id=<?php echo $id; ?>" target="_blank" class="campaign-btn">View Ads</a>
                            <div class="one-half first campaign-title">
                                <h2>Campaign ID</h2>
                                <h3><?php echo $id;?> </h3>
                            </div>

                            <div class="one-half last page-i-total">
                                <h2> Campaign Name </h2>
                                <h3> <?php echo $name; ?> </h3>
                            </div>

                            <div class="clear"></div> 
                        </div>
                <?php
                }
                ?>
                        


                </div>
            </div>
        <!-- </div> -->
        </div>
    </div>
    <div class="clear"></div>

            <?php } ?>
    <!--<div class="container">
        <div class="full-width">
            <div class="account-status">
                <i class="fa fa-exclamation-circle"></i>
                <p>You dont have any active subscription.</p>
                <a href="subscribe.php" class="button red">Create Subscription</a>
            </div>
        </div>
    </div> -->
    
</body>
<script src="js/facebook-login.js" type="text/javascript"></script>
<script src="js/geturi.js" type="text/javascript"></script>
<script type="text/javascript" src="js/avatar.js"></script>
</html>