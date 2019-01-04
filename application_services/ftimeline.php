<?php include_once("connection.php");
$id=$_POST["id"];
//echo $id;
$query="select pid,id,pname,pdescription,pquantity,'true' as status from product where id=:id";
$sample=$con->prepare($query);
$sample->bindParam(":id",$id);
$sample->execute();
if($sample->rowCount()>0)
{
    while($row=$sample->fetch(PDO::FETCH_ASSOC))
    {
        $json[]=$row;
    }
    echo json_encode($json);
}
else{
    $result=array("status"=>"false");
    echo json_encode($result);
}
?>