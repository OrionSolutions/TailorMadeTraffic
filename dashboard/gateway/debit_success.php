<?php 
session_start();
if(isset( $_SESSION['redirect_url']) && !empty( $_SESSION['redirect_url'])) {
 }else{
    //header('Location:error.php');
    $_SESSION['error_handler'] = "Invalid Request on debit_success.php";
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
                <div class="content">
                        <div class="debit-success-items">
                                <div class="item-pricing">
                                    <i class="fa fa-check"></i>
                                    <div class="details">
                                        <h1>Direct Debit set up successfully</h1>
                                        <p>Acme plc will appear on your bank statement when payments are taken againts this Direct Debit.</p>
                                    </div>
                                </div>
                        </div>
                </div>
                <div class="clear"></div>
                <div class="status">
                    <h5>Redirecting...</h5>
                    <h6><span> <a href="complete_flow.php">If the redirection doesn't work, please click here.</a></span></h6>
                    <span>Please wait...</span>
                </div>
            </div>
           
        </div>
        
        <script type="text/javascript">
            setTimeout(function(){ 
              window.location.replace('complete_flow.php');
                }, 3000);
        </script>

    </body>
</html>