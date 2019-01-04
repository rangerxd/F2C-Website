<?php //session_start();
include_once("connection.php");
$id=$_POST["id"];
$query = "select rid,rname,rquan,'true' as status from requirement where id=:id";
$stmt = $con->prepare($query);
$stmt->bindParam(":id",$id);
if($stmt->execute())
{
	while($result=$stmt->fetch(PDO::FETCH_ASSOC))
	{
	 $json[]=$result;
	}
	echo json_encode($json);
}
else
{
	$result=array("status"=>"false");
	echo json_encode($result);
}
?>