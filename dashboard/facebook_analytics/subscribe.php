<?php 
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

error_reporting(0);

$SubscriptionType = $_SESSION["SubscriptionTypeID"];
$Pricing = $_SESSION["PricingSession"];
$NumCampaign = $_SESSION["Campaign"];
?>
<!doctype html>
<html>
    <head>
        <title>Register An Account on Tailormadetraffic</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                            <span><a id="logout"><i class="fa fa-home" aria-hidden="true"></i>Back to Home</a></span>
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
                    <form action="sandbox/sand_box_api.php" method="get">
                    <!-- Left -->

               

                      <label><span><i class="fa fa-chevron-down"></i></span>
                        <select class="selectbox" id="premiumselection">
                            <option value="1">Basic</option>
                            <option value="2">Premium</option>
                            <option value="3">Pro</option>
                            <option value="4">Ultimate</option>
                        </select>
                    </label>

            

                    <div class="one-half first">
 <?php
error_reporting(0);
if (isset($_POST[btnSubscribe])) {
    
}
?>
                        <label><span><i class="fa fa-envelope-o"></i></span>
                            <input type="text" id="emails" name="emails" class="textbox disabled" placeholder="Primary Email" value="<?php
echo $_GET["email"];
?>" disabled>
                        </label>
                        <label><span><i class="fa fa-address-card"></i></span>
                            <input type="text" id="numcampaigns" name="numcampaigns" class="textbox disabled" placeholder="No. of Campaigns" value="<?php
echo $NumCampaign;
?>" required>
                        </label>
                    </div>
                    <!-- Left -->
                    <!-- Right -->
                    <div class="one-half last">

                        <label><span><i class="fa fa-money"></i></span>
                            <input type="number" class="textbox disabled" id="subamount" name="subamount" value=<?php echo $Pricing; ?> placeholder="Subscription Amount">
                        </label>

                        <label><span><i class="fa fa-money"></i></span>
                            <input type="number" class="textbox" id="dailybudget" name="dailybudget" placeholder="Daily Budget" required>
                        </label>

                    </div>
                    <!-- Right -->
                    <div class="clear"></div>


          



          
                 




                    
                 <!--   <div class="section-accordion">
                        <div class="header">
                            <h6>Section 1</h6>
                            <span class="header-accordion"><a id="toggle"><i class="fa fa-chevron-down"></i></a></span>
                            <span class="header-content">
                                <p>afafaa</p>
                            </span>
                        </div>
                    </div>
         `````````-->

<ul class="accordion">
    <div id="section-accordion">

        <li>
            <a class="toggle" href="javascript:void(0);">Campaign 1 <i class="fa fa-angle-down"></i></a>
            <ul class="inner">
            <li>

                <div class="one-half first">
                        <label><span><i class="fa fa-chevron-down"></i></span>
                            <select class="selectbox">
                                <option value="0">[Select Campaign]</option>                        
                                <option value="1">Facebook</option>
                                <option value="2">Email Marketing</option>
                                <option value="3">Web Marketing</option>
                            </select>
                        </label>

                        <label><span><i class="fa fa-chevron-down"></i></span>
                            <select class="selectbox">
                                <option value="0">[Select Campaign Objective]</option>                        
                                <option value="1">Test 1</option>
                                <option value="2">Test 2</option>
                                <option value="3">Test 3</option>
                            </select>
                        </label>
                    </div>

                    <div class="one-half last">
                        <label><span><i class="fa fa-money"></i></span>
                            <input type="text" class="textbox" id="campaigntitle" name="campaigntitle" placeholder="Campaign Title" required>
                        </label>
                
                        <label><span><i class="fa fa-link"></i></span>
                            <input type="url" class="textbox" id="campaignlink" name="campaignlink" placeholder="Website Link" required>
                        </label>            
                    </div>
                    <div class="clear"></div>                      
            </li>
            </ul>
        </li>
        <div class="clear"></div>

    </div>
</ul>

                    <input type="hidden" id="mail" name="mail">
                    <input type="hidden" id="session" name="session">
                    <input type="submit" id="btnSubscribe" name="btnSubscribe" value="Subscribe" class="button">
                    <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
            
        <!--===========FORM CONTAINER==============-->
        
    </body>
  
  <script type="text/javascript" src="js/subscribe.js"></script>
  <script type="text/javascript">
    $('#logout').click(function(){
      window.location.replace('login.php');
      firebase.auth().signOut().then(function() {
      }).catch(function(error) {
          alert("Error");
      });
  });
</script> 
</html>