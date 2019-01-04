<?php //session_start();
include_once("connection.php");
$id =$_POST["id"];
$pid =$_POST["pid"];
$fid =$_POST["fid"];//"1kg";
//$id=$_POST["id"];
$query = "insert into requests (id,pid,fid) values (:id,:pid,:fid)";
$stmt = $con->prepare($query);
$stmt->bindParam(":pid",$pid);
$stmt->bindParam(":fid",$fid);
$stmt->bindParam(":id",$id);
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