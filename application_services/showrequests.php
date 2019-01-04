<?php //session_start();
include_once("connection.php");
$fid =$_POST["fid"];
$query = "select reid,id,pid from requests where fid=:fid";
$stmt = $con->prepare($query);
$stmt->bindParam(":fid",$fid);
//$stmt->bindParam(":pdescription",$pdescription);
//$stmt->bindParam(":pquantity",$pquantity);
//$stmt->bindParam(":id",$id);
//$stmt -> bindParam(":status",$status);
if($stmt->execute())
{   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	 $reid=$row["reid"];
	 $id=$row["id"];
	 $pid=$row["pid"];
 	 //$result=array("status"=>"true");
	  $query2="SELECT login.name,login.mobno,login.address,login.email,requests.reid,product.pname, 'true' as status from login,requests,product where login.id=:id and product.pid=:pid and requests.reid=:reid";
	  $stmt2=$con->prepare($query2);
	  $stmt2->bindParam(":id",$id); 
	  $stmt2->bindParam(":pid",$pid);
	   $stmt2->bindParam(":reid",$reid);	  
	   if($stmt2->execute())
	   {
		   while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
		   {
			  $json[]=$row2; 
		   }
		   
	   }
	   else
	   {
		    $result=array("status"=>"false2");
	        echo json_encode($result);
	   }
}
 echo json_encode($json);
}
else
{
	$result=array("status"=>"false");
	echo json_encode($result);
}
?>