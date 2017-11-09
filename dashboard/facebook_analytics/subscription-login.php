<?php 
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$SubscriptionTypeID = $_GET["SubscriptionTypeID"];
$_SESSION["SubscriptionTypeID"]=$SubscriptionTypeID;

switch ($SubscriptionTypeID) {
    case 1:
        $_SESSION["PricingSession"] = 29;
        $_SESSION["Campaign"]=1;
        break;
    case 2:
        $_SESSION["PricingSession"] = 2000;
        $_SESSION["Campaign"]=5;
        break;
    case 3:
        $_SESSION["PricingSession"] = 5000;
        $_SESSION["Campaign"]=10;
        break;
    case 4:
        $_SESSION["PricingSession"] = 5000;
        $_SESSION["Campaign"]=15;
        break;
}

?>
<!doctype html>
<html>
    <head>
        <title>Subscription Login</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                            <span><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Back to Home</a></span>
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
                                
                                <script type="text/javascript">
                    
                                   
                                
                                    $('#login_google').click(function(){                 
                                    localStorage["Selection"]=1;                 
                                    var provider = new firebase.auth.GoogleAuthProvider();
                                        provider.setCustomParameters({
                                            prompt: 'select_account'
                                        });
                                    // [END createprovider]
                                    // [START addscopes] 
                                    provider.addScope('https://www.googleapis.com/auth/analytics.readonly');

                                    // [START signin]

                                  firebase.auth().signInWithPopup(provider).then(function(result) {
                                        var token = result.credential.accessToken;
                                        localStorage["token"] = token;
                                        }).catch(function(error) {
                                        var errorCode = error.code;
                                        var errorMessage = error.message;
                                        var email = error.email;
                                        var credential = error.credential;
                                        });
                                
                                    });
                        
                                   </script>
                        
                                <script type="text/javascript">


                                firebase.auth().onAuthStateChanged(function(user) {
                                    if (localStorage["Selection"]==0) {
                                        if (user) {
                                        localStorage["Username"] = user.email;
                                        localStorage["photoURL"] = user.photoURL;   
                                        firebase.auth().currentUser.getToken(/* forceRefresh */ true).then(function(idToken) {
                                        localStorage["session_token"]= idToken;
                                        }).catch(function(error) {
                                        });

                                        $('.preload').addClass("show");
                                        setTimeout(function() {
                                          //  window.location.replace('dashboard.php?id='+ localStorage["Username"] + '&access_token=' + localStorage["token"]);
                                            
                                        }, 2500); 
                                    
                                        }
                                        }else{

                                            if (user) {
                                        localStorage["Username"] = user.email;
                                        localStorage["photoURL"] = user.photoURL;
                                        firebase.auth().currentUser.getToken(/* forceRefresh */ true).then(function(idToken) {
                                        localStorage["session_token"]= idToken;
                                        }).catch(function(error) {
                                        });
                                             $('.preload').addClass("show");
                                        setTimeout(function() {
                                             window.location.replace('subscribe.php?email=' + localStorage["Username"] + '&session=' + localStorage["token"]);
                                        }, 2500);  
                                    
                                            }
                                        }
                                    }); 
                                </script>       
                        </div>
                    </div>
                </div>
            </div>    
         <!--===========FORM CONTAINER==============-->
    </body>
</html>