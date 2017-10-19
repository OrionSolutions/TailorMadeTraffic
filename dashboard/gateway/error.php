<?php 
session_start();
if(isset( $_SESSION['error_handler']) && !empty( $_SESSION['error_handler'])) {
  $error = $_SESSION['error_handler'];
 }else{
    //header('Location:index.php');
    echo "no session";
 }
?>
<!doctype html>
<html>
    <head>
        <title>Redirecting</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="style.css?ver=4" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
       <!-- <script src="js/google.js?nocache=1"></script> -->
    </head>
    <body>
        

        <div class="container">
            <div class="full-width">
                <div class="content-error">
                    <div class="error-items">
                        <div class="error-desc">
                            <i class="fa fa-times"></i>

                            <div class="details">
                                <h1>Error Response.</h1>
                                <p>We are sad to know that you have encountered an error.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="code">
                    <p id="error_display"><?php echo $error ?></p>
                    <h1>Help us improve by sending the error description above.</h1>
                    <a href="#" class="button_er">Report</a>
                </div>

                <div class="error-redirect">
                    <h6><span> Click <a href="https://tailormadetraffic.com">here</a> to go back to home.</span></h6>
                </div>
            </div>
           
        </div>
        

    </body>
</html>