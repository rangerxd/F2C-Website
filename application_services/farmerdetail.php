<?php //session_start();
include_once("connection.php");
$id =$_POST["id"];
$query = "select id,name,address,mobno,email,'true' as status from login where id=:id";
$stmt = $con->prepare($query);
$stmt->bindParam(":id",$id);
if($stmt->execute())
{
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	echo json_encode($result);
}
else
{
	$result=array("status"=>"false");
	echo json_encode($result);
}
?>