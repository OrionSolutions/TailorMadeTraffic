<?php 
include_once('class/clsConnection.php');
$con = new mycon();
$con->getconnect();

/*
$useremail = $_COOKIE["useremail"];
if($useremail=="") {  header('Location:login.php'); }
$token =  $_COOKIE["access_token"];
$_SESSION['u_email'] = $useremail; 
$_SESSION['u_access_token'] = $token;
$id = $_COOKIE["useremail"];
$sqlexist = "SELECT COUNT(`tblaccount`.`GoogleEmail`) AS Existing FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='".$id."';";
$getexist = $con->getrecords($sqlexist);
$rs = $con->getresult($getexist);
$exist = $rs["Existing"];
*/
?>
<!doctype html>
<html>
    <head>
        <title>Register An Account on Tailormadetraffic</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">

        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="images/tailor-favicon.ico"/>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
        <script src="js/firebase-config.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
       <!-- <script src="js/google.js?nocache=1"></script> -->
    </head>
    <body class="register">
           <?php /*
    if($exist!=0) {
        $jscript = "
              swal({
              title: 'Account Exist',
              text: 'Redirecting to login.',
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              buttonsStyling: false
            })";
        echo '<script>'.$jscript."</script>";
        echo "<script>setTimeout(function(){ window.location.replace('dashboard.php'); }, 1500);</script>";
    }
    */
    ?>
        <div class="nav-container"> 
            <div class="container">
                <div class="full-width">
                    <div class="one-half first">
                        <img src="images/tailor_made_traffic.png">
                    </div>
                    <div class="one-half last">
                        <div class="home-button">
                        <span><a href="login.php" id="back"><i class="fa fa-home" aria-hidden="true"></i><span>Back to Login</span></a></span>
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
                    <h1>Register an Account<span>We'd love to be working with you!</span></h1>
                    <form class="subscribe-form" action="" method="post">
                    <!-- Left -->
                    <h6>Login Details</h6>
                    <div class="user-cred">
                        <div class="one-half first user-field">
                            <input type="text" id="txtusername" name="txtusername" class="textbox" placeholder="Username" auto-complete="off" required>
                            <i class="fa fa-user"></i>
                        </div>

                        <div class="one-half last user-field">
                            <input type="password" id="txtpassword" name="txtpassword" class="textbox" placeholder="Password" auto-complete="off" required>
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="clear"></div>
                    </div>
                   
                    <h6>User Details</h6>
                    <div class="one-half first">
 <?php 
                    //error_reporting(0);
                    if (isset($_POST["btnRegister"])) {
                    $Mail = $_POST["mail"];
                    $Maily = $_POST["email"];
                    $myMail = $_POST["email"];
                    $Session = $_POST["session"];
                    $Company = $_POST["company"];
                    $Username = $_POST["txtusername"];
                    $password = $_POST["txtpassword"];
                    $Email = $_POST["email"];
                    $Firstname = $_POST["firstname"];
                    $Lastname = $_POST["lastname"];
                    $Alternate = $_POST["alternate"];
                    $Phone = $_POST["phone"];

                    $userexist = "SELECT (`tblaccount`.`Username`) AS Existing FROM `tblaccount` WHERE `tblaccount`.`Username`='".$Username."';";
                    $getUserexist = $con->getrecords($userexist);
                    $rs = $con->getresult($getUserexist);
                    
                    $emailexist = "SELECT (`tblaccount`.`Username`) AS Existing FROM `tblaccount` WHERE `tblaccount`.`GoogleEmail`='".$Email."';";
                    $getEmailexist = $con->getrecords($emailexist);
                    $rs = $con->getresult($getUserexist);

                    if(mysqli_num_rows($getUserexist) || mysqli_num_rows($getEmailexist)){
                        if(mysqli_num_rows($getEmailexist)){
                            echo '<script> 
                            $(document).ready(function(){ $("#email").css("border","1px solid #e74c3c"); $("#email").attr("value", "Google already taken!"); });
                            </script>'; 
                        }else{
                            echo '<script> $("#txtusername").css("border","1px solid #e74c3c"); $("#txtusername").attr("value", "Username already exist!"); </script>'; 
                        }
                        
                    }else{
                        $SQLInsert ="INSERT INTO `tblaccount`(`GoogleEmail`,`Firstname`,`Lastname`,`AlternateEmail`,`Phone`,`Company`,`Industry`,`Username`,`Passwords`)";
                        $SQLInsert = $SQLInsert." VALUES('".$Maily."',";
                        $SQLInsert = $SQLInsert."'".$Firstname."',";
                        $SQLInsert = $SQLInsert."'".$Lastname."',";
                        $SQLInsert = $SQLInsert."'".$Alternate."',";
                        $SQLInsert = $SQLInsert."'".$Phone."',";
                        $SQLInsert = $SQLInsert."'".$Company."',";	
                        $SQLInsert = $SQLInsert."'".$Company."',";
                        $SQLInsert = $SQLInsert."'".$Username."',";
                        $SQLInsert = $SQLInsert."md5('".$password."'));";
                        $RSInsert=$con->getrecords($SQLInsert);
                        $SQLGetAccountID = "SELECT * from tblaccount WHERE `GoogleEmail`='".$Maily."';";
                        $getAccountID = $con->getrecords($SQLGetAccountID);
                        $RSAccountID = $con->getresult($getAccountID);
                        $RSAccountID["AccountID"];
                        $SQLInsertWebDetails = "INSERT INTO `tblwebdetails`(`AccountID`,`SiteID`)";
                        $SQLInsertWebDetails = $SQLInsertWebDetails." VALUES('".$RSAccountID["AccountID"]."',";
                        $SQLInsertWebDetails = $SQLInsertWebDetails."0);";
                        //echo $SQLInsertWebDetails;
                        $RSExecute=$con->getrecords($SQLInsertWebDetails);
                        setcookie("access_token", "", time()-3600);
                        $ch = curl_init('https://crm.zoho.eu/crm/private/xml/Leads/insertRecords');
                        curl_setopt($ch, CURLOPT_VERBOSE, 1);//standard i/o streams 
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// Turn off the server and peer verification 
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Set to return data to string ($response) 
                        curl_setopt($ch, CURLOPT_POST, 1);//Regular post 
                        $redir = curl_init('https://crm.zoho.eu/crm/private/xml/Leads/insertRecords');
                        $authtoken = "ddbb9983706b0694795323fc05b470ef";
                        $xmlData = "<Leads>
                        <row no='1'>
                        <FL val='Company'>$Company</FL>
                        <FL val='First Name'>$Firstname</FL>
                        <FL val='Last Name'>$Lastname</FL>
                        <FL val='Email'>$Email</FL>
                        <FL val='Lead Source'>Tailor Made Dashboard</FL>
                        <FL val='Description'>New Leads Registered</FL>
                        </row>
                        </Leads>";
                        $query = "newFormat=1&authtoken=".$authtoken."&scope=crmapi&xmlData=".$xmlData; 
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);// Set the request as a POST FIELD for curl. 
                        curl_setopt($redir,CURLOPT_POSTFIELDS,'');
                        $response = curl_exec($ch);  	
                        curl_close($ch); 
                         $jscript = "
                  swal({
                  title: 'Registered',
                  text: 'Successfully Registered.',
                  type: 'error',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  buttonsStyling: false
                })";
            echo '<script>'.$jscript."</script>";
            echo "<script>setTimeout(function(){ window.location.replace('dashboard.php'); }, 1500);</script>";
                    }
                    
                   
                    }
 ?>                     
                        <ul class="register-fields">
                            <li>
                                <input type="text" id="email" name="email" class="textbox" placeholder="Primary Email" required><i class="fa fa-envelope-o"></i>
                            </li>
                            <li>
                                <input type="text" id="firstname" name="firstname" class="textbox" placeholder="Firstname" required><i class="fa fa-user"></i>
                            </li>
                            <li>
                                <input type="text" id="company" name="company" class="textbox" placeholder="Company" required><i class="fa fa-building-o"></i>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- Left -->
                    <!-- Right -->
                    <div class="one-half last">

                        <ul class="register-fields">
                            <li>
                                <input type="text" class="textbox" id="alternate" name="alternate" placeholder="Alternative Email"><i class="fa fa-envelope-o"></i>
                            </li>
                            <li>
                                <input type="text" class="textbox" id="lastname" name="lastname" placeholder="Lastname" required><i class="fa fa-user"></i>
                            </li>
                            <li>
                                <input type="text" class="textbox" id="phone" name="phone" placeholder="Phone" required><i class="fa fa-phone"></i>
                            </li>
                        </ul>

                    </div>
                    <!-- Right -->
                    <div class="clear"></div>
                    <label><span><i class="fa fa-chevron-down"></i></span>
                        <select class="selectbox">
                            <option>Industry</option>
                            <option value="Communications">-Communications</option>
                            <option value="Technology">-Technology</option>
                            <option value="Government/Military">-Government/Military</option>
                            <option value="Manufacturing">-Manufacturing</option>
                            <option value="Financial Services">-Financial Services</option>
                            <option value="IT Services">-IT Services</option>
                            <option value="Education">-Education</option>
                            <option value="Pharma">-Pharma</option>
                            <option value="Real Estate">-Real Estate</option>
                            <option value="Consulting">-Consulting</option>
                            <option value="Health Care">-Health Care</option>
                            <option value="Health Care">-Other</option>
                        </select>
                    </label>
                    <input type="hidden" id="mail" name="mail">
                    <input type="hidden" id="session" name="session">
                    <input type="submit" id="btnRegister" name="btnRegister" value="Register" class="button">
                    <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
            
        <!--===========FORM CONTAINER==============-->
    
    </body>
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

<?php /*
 setcookie("useremail", "", time()-3600);
 setcookie("access_token", "", time()-3600);
//setcookie("useremail", "", time()-3600); */?>