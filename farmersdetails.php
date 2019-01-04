<?php session_start(); 
if((isset($_SESSION["ID"])&&isset($_SESSION["UTYPE"]))&&$_SESSION["UTYPE"]=="admin")
{
include_once("connection.php");
include_once("adminheader.php");
	 ?>
<html>
<head>
	<title>Users</title>
</head>
<body>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Farmers Data</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="card m-b-30">
<?php 	
$query2='select * from login where usertype="farmer"';
$stmt2=$con->prepare($query2);
$stmt2->execute();
?>
<div class="table-responsive">
<table class="table table-hover mb-0" style="width:100%;text-align:center" >
<thead><tr> <th>ID</th><th>Name</th><th>Mobno</th><th>Address</th><th>E-mail</th><th>Usertype</th><th>Status</th><th align="center">products</th></tr></thead>

<tbody><?php
while($row=$stmt2->fetch(PDO::FETCH_ASSOC))
{
?>
<tr>
<td><?php echo $row["id"] ?> </td>
<td><?php echo $row["name"] ?></td>
<td><?php echo $row["mobno"]?></td>
<td><?php echo $row["address"]?></td>
<td><?php echo $row["email"]?></td>
<td><?php echo $row["usertype"]?></td>
<td><?php if($row["status"]==0){?><a href="changestatus.php?id=<?php echo $row["id"]; ?>&usertype=<?php echo $row["usertype"];?>&operaions=deactivate"><span class="badge badge-info">Deactive</span></a> <?php ; }else {?> <a href="changestatus.php?id=<?php echo $row["id"]; ?>&usertype=<?php echo $row["usertype"];?>&operaions=activate"><span class="badge badge-default">Active</span></a><?php ; }  ?></td>
<td><a href="productdetails.php?id=<?php echo $row["id"];?>" target="_blank">Click Here</a></td>


<?php
}
?>

<tbody>
</table>
</div>
</div>
</div>

</body>
</html>
<?php	
}
else
{
	$_SESSION["MSG"]="Invalid Access";
	header("Location:index.php");
}?>

