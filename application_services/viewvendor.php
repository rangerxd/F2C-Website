<?php //session_start();
include_once("connection.php");
$usertype ="vendor";
$query = "select id,name,address,mobno,email,'true' as status from login where usertype=:usertype";
$stmt = $con->prepare($query);
$stmt->bindParam(":usertype",$usertype);
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