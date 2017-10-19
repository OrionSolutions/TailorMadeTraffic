<?php
session_start();
include ('class/clsConnection.php');
$useremail = $_COOKIE["useremail"];
$token =  $_COOKIE["access_token"];
$_SESSION['u_email'] = $useremail; 
$_SESSION['u_access_token'] = $token;
$con = new mycon();
$con->getconnect();
$id = $_COOKIE["useremail"];
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
?>
<html>
<head>
    <title>Dashboard - Tailor Made Trafficsdadada</title>
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
    <script src="js/firebase-config.js"></script>
    <script type="text/javascript" src="js/slicknav.js"></script>
    <script type="text/javascript" src="js/slicknav-init.js"></script>
    <script src="js/google.js"></script>
    <script src="js/logout.js"></script>
    <script type="text/javascript" src="js/dashboard-chart-analytics.js"></script>
</head>

<body>
   <?php

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

?>
    <!-- Top Menu -->
    <?php include('menu.php'); ?>
    <!-- Top Menu -->
    <!-- Middle Menu -->
    <div class="middle-header">
        <div class="container">
            <div class="full-width">
                <ul>
                    <li class="current"><a href="#">Dashboard</a></li>
                    <li><a href="my_subscriptions.php">My Subscriptions</a></li>
                    <li><a href="my_payment.php">Development Service</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Middle Menu -->
    <!-- Dashboard -->
    <?php

if ($siteid != 0)
	{ ?>
    <div class="container">
        <div class="full-width">
        
            <!-- Graph -->
            <div class="clicks chart-title">
                <span>Overview</span>
                <select id="filter" name="filter">
						<option class="filter-item" value="ga:CTR">CTR</option>
						<option class="filter-item" value="ga:adClicks">Clicks</option>
						<option class="filter-item" value="ga:Sessions">Sessions</option>
						<option class="filter-item" value="ga:bounceRate">Bounce Rate</option>
						<option class="filter-item" value="ga:adCost">Total Spend</option>
					</select>
                <div class="clear"></div>
            </div>
            <div class="overview-graph">
                <div id="date-range-selector-overview-container"></div>
                <div id="overview-graph-id"></div>
                <div id="overview-selector"></div>
                <div class="totalView">
                    <p id="overview-total-desc" class="total">Average CTR: <span id="overview">0</span></p> 
                </div>
            </div>
            <!-- Graph -->
            <table class="table-overview">
                <tr class="header">
                    <th colspan="4">Overview Breakdown</th>
                </tr>
                <tr>
                    <th class="big"></th>
                    <th class="small">Monthly</th>
                    <th class="small">Weekly</th>
                    <th class="small">Daily</th>
                </tr>
                <tr>
                    <td class="big">Clicks</th>
                        <td class="small"><span id="clicks-monthly"></span></td>
                        <td class="small"><span id="clicks-weekly"></span></td>
                        <td class="small"><span id="clicks-daily"></span></td>
                </tr>
                <tr>
                    <td class="big">CTR</td>
                    <td class="small"><span id="ctr-monthly"></span></td>
                    <td class="small"><span id="ctr-weekly"></span></td>
                    <td class="small"><span id="ctr-daily"></span></td>
                </tr>
                <tr>
                    <td class="big">Sessions</td>
                    <td class="small"><span id="session-monthly"></span></td>
                    <td class="small"><span id="session-weekly"></span></td>
                    <td class="small"><span id="session-daily"></span></td>
                </tr>
                <tr>
                    <td class="big">Bounce Rate</td>
                    <td class="small"><span id="bounce-monthly"></span></td>
                    <td class="small"><span id="bounce-weekly"></span></td>
                    <td class="small"><span id="bounce-daily"></span></td>
                </tr>
                <tr>
                    <td class="big">Total Spend</td>
                    <td class="small"><span id="session-duration-monthly"></span></td>
                    <td class="small"><span id="session-duration-weekly"></span></td>
                    <td class="small"><span id="session-duration-daily"></span></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Dashboard -->
    <div class="sub-charts">
        <div class="container">
            <div class="full-width">
                <div class="item">
                    <div class="one-half first">
                        <div class="ctr chart-title">Clicks Through Rate</div>
                        <div class="ctr-graph">
                            <div id="date-range-selector-ctr-container"></div>
                            <div id="ctr-graph-id"></div>
                            <div id="ctr-selector"></div>
                            <p class="total">Average CTR: <span id="avg-ctr">0</span></p>
                        </div>
                    </div>
                    <div class="one-half last">
                        <div class="clicks chart-title">Clicks</div>
                        <div class="clicks-graph">
                            <div id="date-range-selector-clicks-container"></div>
                            <div id="clicks-graph-id"></div>
                            <div id="clicks-selector"></div>
                            <p class="total">Total Clicks: <span id="total-clicks">0</span></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="item">
                    <div class="one-half first">
                        <div class="ctr chart-title">Sessions</div>
                        <div class="session-graph">
                            <div id="date-range-selector-session-container"></div>
                            <div id="session-graph-id"></div>
                            <div id="session-selector"></div>
                            <p class="total">Total Sessions: <span id="total-sessions">0</span></p>
                        </div>
                    </div>
                    <div class="one-half last">
                        <div class="clicks chart-title">Bounce Rate</div>
                        <div class="bounce-back-graph">
                            <div id="date-range-selector-bb-container"></div>
                            <div id="bounce-back-graph-id"></div>
                            <div id="bounce-back-selector"></div>
                            <p class="total">Average Bounce Rate: <span id="avg-bounce-rate">0</span></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="item">
                    <div class="one-half first c-last">
                        <div class="ctr chart-title">Total Spend</div>
                        <div class="session-duration-graph">
                            <div id="date-range-selector-duration-container"></div>
                            <div id="session-duration-graph-id"></div>
                            <div id="session-duration-selector"></div>
                            <p class="total">Total Spend: <span id="total-spent">0</span></p>
                            <div class="clear"></div>
                            <div id="embed-api-auth-container"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
  else
	{ ?>
    <div class="container">
        <div class="full-width">
            <div class="account-status">
                <i class="fa fa-exclamation-circle"></i>
                <p>You dont have any active subscription.</p>
                <a href="subscribe.php" class="button red">Create Subscription</a>
            </div>
        </div>
    </div>
    <?php
	}

?>
</body>
<script src="js/geturi.js" type="text/javascript"></script>
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/view-selector2.js"></script>
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/date-range-selector.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
 <script type="text/javascript" src="js/chart-functions.js"></script>
<script type="text/javascript" src="js/avatar.js"></script>
</html>