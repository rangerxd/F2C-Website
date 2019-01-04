<?php include_once("connection.php");
$query="select pid,id,pname,pdescription,pquantity,'true' as status from product";
$sample=$con->prepare($query);
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