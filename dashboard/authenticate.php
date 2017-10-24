<?php
include_once('class/clsConnection.php'); 
?>
<?php
//include('class/clsConnection.php');
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['txtusername'])) {
  $loginUsername=$_POST['txtusername'];
  $password=$_POST['txtpassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "dashboard.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  $con = new mycon;
  $con->getconnect();
	$LoginRS__query="SELECT `AccountID`,`GoogleEmail`,`Username`,`Passwords` FROM `tblaccount` WHERE `Username`='".$loginUsername."' AND `Passwords`=MD5('".$password."')";
  $LoginRS = $con->getrecords($LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  $rowEdit = $con->getresult($LoginRS);
  if ($loginFoundUser) {
  $loginStrGroup = "";
	$rowEdit = $con->getresult($LoginRS);
	$_SESSION["USER_ID"] = $rowEdit["AccountID"];
	//$_SESSION["USER_TYPE"] = $rowEdit["UserType"];
	$_SESSION['USER_NAME'] = $loginUsername;
  $_SESSION['MM_UserGroup'] = $loginStrGroup;
 if (isset($_SESSION['PrevUrl']) && false) {
  $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
  }
  $_SESSION['LoginFailed']="Success";
  header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
  $_SESSION['LoginFailed']="Failed";
  header("Location: ". $MM_redirectLoginFailed );

  }
}
?>


