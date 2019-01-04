<?php //session_start();
include_once("connection.php");
$id=$_POST["id"];
$requirement=$_POST["rname"];
$quan=$_POST["rquan"];
$query = "insert into requirement (id,rname,rquan) values (:id,:requirement,:rquan)";
$stmt = $con->prepare($query);
$stmt->bindParam(":requirement",$requirement);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":rquan",$quan);
//$stmt -> bindParam(":status",$status);
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