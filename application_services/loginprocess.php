<?php include_once("connection.php");
$username = $_POST["username"];
$password =$_POST["password"];
$status = 0;
$query = "select id,mobno,usertype,'true' as status from login where mobno=:username and password=:password and status=:status ";
$stmt = $con->prepare($query);
$stmt->bindParam(":username",$username);
$stmt->bindParam(":password",$password);
//$stmt -> bindParam(":usertype",$usertype);
$stmt->bindParam(":status",$status);
$stmt->execute();
if($stmt->rowCount()>0)
{
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	print_r(json_encode($row));
}
else
{
	$result=array("status"=>"false");
	print_r(json_encode($result));
}
?>