<?php session_start(); 
if((isset($_SESSION["ID"])&&isset($_SESSION["UTYPE"]))&&$_SESSION["UTYPE"]=="admin")
{
include_once("connection.php");
include_once("adminheader.php");
	 ?>
<html>
<head>
	<title>Venders</title>
</head>
<body>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users Reviews</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>           

 <?php 	
$query2='select * from reports';
$stmt2=$con->prepare($query2);
$stmt2->execute();
$row_count = 1;
while( $row=$stmt2->fetch(PDO::FETCH_ASSOC))
{
	$id=$row["id"];
	$query="select name from login where id=:id";
	$stmt3=$con->prepare($query);
	$stmt3->bindParam(":id",$id);
	$stmt3->execute();
	$row2=$stmt3->fetch(PDO::FETCH_ASSOC);
?>
<div class="panel-group" id="accordion"> <!-- accordion 1 -->
   <div class="panel panel-primary">
        <div class="panel-heading"> <!-- panel-heading -->
            <h4 class="panel-title"> 
            <!-- title 1 -->
            <a data-toggle="collapse" data-parent="#accordion" href="#accordion<?php echo $row_count; ?>">
             Subject :- <?php echo $row["subject"];?> 															
             <span style="text-align-last:right"> _________________________________________________Comment By :- <?php  echo $row2["name"];?></span>
            </a>
           
           </h4>
           
        </div>
		<!-- panel body -->
        <div id="accordion<?php echo $row_count; ?>" class="panel-collapse collapse in">
          <div class="panel-body">Description :-  
           <?php echo $row["rdescription"];?>
           
          </div>
        </div>
  </div>
  </div>
  <?php 
  $row_count++;}
  //<?php $row["rdescription"];
  //php $row["title"];?>
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