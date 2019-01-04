<?php //session_start();
include_once("connection.php");
$mobno =$_POST["username"];
$password =$_POST["password"];
$name =$_POST["name"];
$usertype =$_POST["usertype"];
$address =$_POST["address"];
$email =$_POST["email"];
$status = 0;
$query = "insert into login (name,mobno,password,usertype,address,email) values (:name,:mobno,:password,:usertype,:address,:email)";
$stmt = $con->prepare($query);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":mobno",$mobno);
$stmt->bindParam(":password",$password);
//$stmt -> bindParam(":status",$status);
$stmt->bindParam(":usertype",$usertype);
$stmt->bindParam(":address",$address);
$stmt->bindParam(":email",$email);
if($stmt->execute())
{
	$result=array("status"=>"true");
	echo json_encode($result);
}
else
{
	$result=array("status"=>"false");
	echo json_encode($result);
}
?>