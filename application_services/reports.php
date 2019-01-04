<?php //session_start();
include_once("connection.php");
$id =$_POST["id"];
$rdescription =$_POST["rdes"];
$subject =$_POST["rsubject"];//"1kg";
$query = "insert into reports(id,subject,rdescription) values (:id,:subject,:rdescription);";
$stmt = $con->prepare($query);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":subject",$subject);
$stmt->bindParam(":rdescription",$rdescription);
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