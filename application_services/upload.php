<?php //session_start();
include_once("connection.php");
$pname =$_POST["pname"];
$pdescription =$_POST["pdes"];
$pquantity =$_POST["pquan"];//"1kg";
$id=$_POST["id"];
$query = "insert into product (id,pname,pdescription,pquantity) values (:id,:pname,:pdescription,:pquantity)";
$stmt = $con->prepare($query);
$stmt->bindParam(":pname",$pname);
$stmt->bindParam(":pdescription",$pdescription);
$stmt->bindParam(":pquantity",$pquantity);
$stmt->bindParam(":id",$id);
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