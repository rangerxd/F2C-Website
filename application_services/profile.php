<?php //session_start();
include_once("connection.php");
$id = $_POST["id"];
/*$password =$_POST["password"];
$name =$_POST["name"];
$usertype =$_POST["usertype"];
$address =$_POST["address"];
$email =$_POST["email"];
$status = 0;*/
$query = "select id,name,address,email,mobno, 'true' as status from login where id=:id";
$stmt = $con->prepare($query);
//$stmt->bindParam(":name",$name);
$stmt->bindParam(":id",$id);
if($stmt->execute())
{
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	echo json_encode($row);	
}
else
{
	$result=array("status"=>"false");
	echo json_encode($result);
}
?>