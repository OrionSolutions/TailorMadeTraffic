<?php 
  include_once('class/clsConnection.php');
  $con = new mycon();
  $con->getconnect();
?>
<!doctype html>
<html>
    <head>
        <title>Register An Account on Tailormadetraffic</title>
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/grid.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
        <script src="js/firebase-config.js?nocache=1"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
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
                    <h1>Register an Account<span>We'd love to be working with you!</span></h1>
                    <form action="" method="post">
                    <!-- Left -->
                    <div class="one-half first">
 <?php 
                    

                    error_reporting(0);
                    if (isset($_POST["btnRegister"])) {
                    $Mail = $_POST["mail"];
                    $myMail = $_GET["email"];
                    $Session = $_POST["session"];
                    $Company = $_POST["company"];
                    $Email = $_POST["email"];
                    $Firstname = $_POST["firstname"];
                    $Lastname = $_POST["lastname"];
                    $Alternate = $_POST["alternate"];
                    $Phone = $_POST["phone"];
                    $SQLInsert ="INSERT INTO `tblaccount`(`GoogleEmail`,`Firstname`,`Lastname`,`AlternateEmail`,`Phone`,`Company`,`Industry`)";
	                $SQLInsert = $SQLInsert." VALUES('".$myMail."',";
                    $SQLInsert = $SQLInsert."'".$Firstname."',";
                    $SQLInsert = $SQLInsert."'".$Lastname."',";
                    $SQLInsert = $SQLInsert."'".$Alternate."',";
                    $SQLInsert = $SQLInsert."'".$Phone."',";
                    $SQLInsert = $SQLInsert."'".$Company."',";	
                    $SQLInsert = $SQLInsert."'".$Company."');";
                    $RSInsert=$con->getrecords($SQLInsert);
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
                    echo "<script>window.location.replace('dashboard.php?id=' + localStorage['Username'] + '&access_token=' + localStorage['token']);</script>";
                    }
 ?>
                        <label><span><i class="fa fa-envelope-o"></i></span>
                            <input type="text" id="email" name="email" class="textbox disabled" placeholder="Primary Email" value="<?php echo $_GET["email"] ?>" disabled>
                        </label>
                        <label><span><i class="fa fa-user"></i></span>
                            <input type="text" id="firstname" name="firstname" class="textbox" placeholder="Firstname" required>
                        </label>
                        <label><span><i class="fa fa-building-o"></i></span>
                            <input type="text" id="company" name="company" class="textbox" placeholder="Company" required>
                        </label>
                    </div>
                    <!-- Left -->
                    <!-- Right -->
                    <div class="one-half last">

                        <label><span><i class="fa fa-envelope-o"></i></span>
                            <input type="text" class="textbox" id="alternate" name="alternate" placeholder="Alternative Email">
                        </label>

                        <label><span><i class="fa fa-user"></i></span>
                            <input type="text" class="textbox" id="lastname" name="lastname" placeholder="Lastname" required>
                        </label>

                        <label><span><i class="fa fa-phone"></i></span>
                            <input type="text" class="textbox" id="phone" name="phone" placeholder="Phone" required>
                        </label>

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