<?php session_start();
include_once("connection.php");
//include_once("functions.php");
//session_regenerate_id(true);
$username=$_POST["username"];
$password=$_POST["password"];
$status=0;
$query="select id,mobno,usertype from login where mobno=:username and password=:password and status=:status";
$stmt=$con->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->bindParam(":password",$password);
$stmt->bindParam(":status",$status);
$stmt->execute();
if($stmt -> rowCount()>0)
{
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($row["usertype"]=="admin")
	{
	$_SESSION["ID"] = $row["id"];
//	$_SESSION['loggedin_time'] = time();  
	$_SESSION["UNAME"] = $row["mobno"];
	$_SESSION["UTYPE"]=$row["usertype"];
	header("Location:adminhome.php");
	}
}
else
{
	$_SESSION["MSG"] = "Invalid Username or Password";
	header("Location:index.php");
}
?>