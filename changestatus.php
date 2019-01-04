<?php session_start();
include_once("connection.php");
$operation=$_GET["operaions"];
switch($operation)
{
	case "deactivate":
		$id=$_GET["id"];
	$usertype=$_GET["usertype"];	
  		$query="update login set status=1 where id=:id";
		$stmt=$con->prepare($query);
		$stmt->bindParam(":id",$id);
		if($stmt->execute())
		{
			if($usertype=="vendor")
			{
				header("Location:vendersdetails.php");
			}
			else
			{
				header("Location:farmersdetails.php");	
			}
			//$_SESSION["MSG"]="Deactivated";
			//header("Location:manageuser.php");
		}
		else
		{
			$_SESSION["MSG"]="Deactivation fail";
			header("Location:adminhome.php");
		}
	break;
	case "activate":
		$id=$_GET["id"];
		$usertype=$_GET["usertype"];
		$query="update login set status=0 where id=:id";
		$stmt=$con->prepare($query);
		$stmt->bindParam(":id",$id);
		if($stmt->execute())
		{
			if($usertype=="vendor")
			{
			//	$_SESSION["MSG"]="activated";
			header("Location:vendersdetails.php");
			}
			else
			{
			//	$_SESSION["MSG"]="activated";
			header("Location:farmersdetails.php");
			}
			//$_SESSION["MSG"]="activated";
			//header("Location:.php");
		}
		else
		{
			$_SESSION["MSG"]="activation fail";
			header("Location:adminhome.php");
		}
	break;
}
?>