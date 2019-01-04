<?php session_start();
unset($_SESSION["ID"]);
unset($_SESSION["UTYPE"]);
unset($_SESSION["UNAME"]);
/*if(isset($_GET["session_expired"])) {
	//$_SESSION["MSG"]= "Login Session is Expired. Please Login Again";
}else
{*/
$_SESSION["MSG"]="Logout Successfull";
header("Location:index.php");
?>