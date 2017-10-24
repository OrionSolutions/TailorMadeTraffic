<!doctype html>
<html>
    <head>
        <title>Login Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
        <script src="js/firebase-config.js?nocache=1"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       <!-- <script src="js/google.js?nocache=1"></script> -->
    </head>
    <body class="register">
        
        <!--===========NAVIGATION CONTAINER==============
        <div class="nav-container"> 
            <div class="container">
                <div class="full-width">
                    <div class="one-half first">
                        <img src="images/logo.png">
                    </div>
                    <div class="one-half last">
                        <div class="home-button">
                            <span><a href="https://tailormadetraffic.com/"id="back"><i class="fa fa-home" aria-hidden="true"></i></a></span>
                        <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div> 
            </div>    
        </div>      
            ===========NAVIGATION CONTAINER==============-->
        
         <!--===========FORM CONTAINER==============-->
         <div class="preload"><img src="images/loading.gif"></div>
            <div class="container registration">
                <div class="full-width">
                    <div class="form-container-register">
                        <img src="images/tailor_made_traffic.png">
                        <h1>Sign-In<span>Nice to see you back!</span></h1>

                        <div class="padded">
                            <div class="form-user-login">
                                <form>
                    
                                    <ul class="fields-user-login">
                                        <li><input type="text" name="username" id="username" class="user-login" placeholder="Username"><i class="fa fa-user"></i></li>
                                        <li><input type="password" name="password" id="password" class="user-login" placeholder="Password"><i class="fa fa-lock"></i></li>
                                    </ul>
                                </form>
                                <a class="button" href="#">Login</a>
                            </div>
                            <div class="separator"></div>

                            <p><a  id="register_google" class="reg-link">Don't have an account? Get one for free!</a></p>
    
                        </div>
                    </div>
                </div>
            </div>    
         <!--===========FORM CONTAINER==============-->
        <script type="text/javascript" src="js/login.js"></script>
    </body>
</html>
<?php   
  setcookie("useremail", "", time()-3600);
  setcookie("access_token", "", time()-3600);
?>