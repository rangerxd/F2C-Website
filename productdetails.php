<?php session_start(); 
include_once("connection.php");
//include_once("adminheader.php");
	 ?>
<html>
<head>
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Venders</title>
    <style>
	.center	{
		text-align:center;
		}
	</style>
</head>
<body>
<div class="container">
<h1 class="page-header"> PRODUCTS </h1>
<?php 
$id=$_GET["id"];	
$query="select * from product where id=:id";
$stmt=$con->prepare($query);
$stmt->bindParam(":id",$id);
$stmt->execute();
$row_count = 1;
if($stmt->rowCount()>0)
{
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<div class="panel-group" id="accordion"> <!-- accordion 1 -->
   <div class="panel panel-primary">
   
        <div class="panel-heading"> <!-- panel-heading -->
            <h4 class="panel-title"> <!-- title 1 -->
            <a data-toggle="collapse" data-parent="#accordion" href="#accordion<?php echo $row_count; ?>">
            <b>Product Name: - </b> <?php  echo $row["pname"];?>
            </a>
           </h4>
        </div>
		<!-- panel body -->
        <div id="accordion<?php echo $row_count; ?>" class="panel-collapse collapse in">
          <div class="panel-body">
           <b>Description : - </b><?php echo $row["pdescription"];?>
           <div class="card"><div class="card-header"><b> Quantity : </b><?php echo $row["pquantity"];?>
           </div></div>
          </div>
        </div>
  </div>
  </div>
  <?php 
  $row_count++;}
  //<?php $row["rdescription"];
  //php $row["title"];
}
else
{
echo '<div class="alert alert-warning" role="alert">No Products Updated Till...
</div> ';
//header("Location:farmersdetails.php");
	}?>

</div>
</div>

</body>
</html>
