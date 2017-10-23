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
/*
$sqlexist = "SELECT COUNT(`tblaccount`.`GoogleEmail`) AS Existing,`tblaccount`.`AccountID` FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='" . $id . "';";
$getexist = $con->getrecords($sqlexist);
$rs = $con->getresult($getexist);
$exist = $rs["Existing"];
$accid = $rs["AccountID"];
$sqlsiteid = "SELECT * FROM `tblwebdetails` WHERE `tblwebdetails`.`AccountID`='" . $accid . "';";
$getsiteid = $con->getrecords($sqlsiteid);
$rssite = $con->getresult($getsiteid);
*/

$tbl_account= "SELECT * FROM `tblaccount`;";
$getCustomer = $con->getrecords($tbl_account);

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
    <!-- Top Menu -->
    <div class="header-top">
        <h1><i class="fa fa-user-secret"></i> Panel</h1>   
    </div>
    <!-- Top Menu -->
   
    <!-- Middle Menu -->
    <div class="admin-header">
        <div class="container">
            <div class="full-width">
                <ul>
                    <li class="current"><a href="#">Customers</a></li>
                    <li><a href="subscriptions-all.php">Subscriptions</a></li>
                    <li><a href="my_payment.php">Payments</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Middle Menu -->
    <div class="body-wrapper">
        <div class="body-head">
            <img src="images/tailor_made_traffic.png">
            <div class="search">
                <i class="fa fa-search"></i><input type="text" placeholder="Search"><a href="#" class="button yellow">Search</a>
            </div>
        </div>
        <div class="full-width">
            <div class="body-content">
                <div class="admin-title">
                    <div class="one-fifth first"><h1>Customer Name</h1></div>
                    <div class="one-fifth"><h1>Google Email</h1></div>
                    <div class="one-fifth"><h1>Alternate Email</h1></div>
                    <div class="one-fifth"><h1>Phone</h1></div>
                    <div class="one-fifth last"><h1>Company</h1></div>
                    <div class="clear"></div>
                </div>

                <?php 
                    while($customer = mysqli_fetch_assoc($getCustomer)){
                        
                ?>

                <div class="admin-items">
                    <div class="one-fifth first"><h1><?php echo $customer["Firstname"] ." ". $customer["Lastname"] ?></h1></div>
                    <div class="one-fifth"><h1><?php echo $customer["GoogleEmail"];?></h1></div>
                    <div class="one-fifth"><h1><?php echo $customer["AlternateEmail"];?></h1></div>
                    <div class="one-fifth"><h1><?php echo $customer["Phone"];?></h1></div>
                    <div class="one-fifth last"><h1><?php echo $customer["Company"];?></h1></div>
                    <div class="clear"></div>
                </div>

                <?php }?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- Dashboard -->
 
   
</body>
<script src="js/geturi.js" type="text/javascript"></script>
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/view-selector2.js"></script>
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/date-range-selector.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
 <script type="text/javascript" src="js/chart-functions.js"></script>
<script type="text/javascript" src="js/avatar.js"></script>
</html>