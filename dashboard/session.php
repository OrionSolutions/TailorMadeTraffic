<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['USER_NAME'] = NULL;
  $_SESSION['USER_ID'] = NULL;
  //$_SESSION["USER_TYPE"] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['IPOSTED']=FALSE;
  $_SESSION['POSTED']=FALSE;
  $_SESSION['PrevUrl'] = NULL;
  $_SESSION['LoginFailed']="";
  $_SESSION[customerid]=NULL;
  unset($_SESSION['USER_NAME']);
  unset($_SESSION['USER_ID']);  
  unset($_SESSION["USER_TYPE"]);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  unset($_SESSION['LoginFailed']);
  $logoutGoTo = $pathdomain."login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>