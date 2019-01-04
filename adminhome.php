<?php session_start(); 
include_once("connection.php");
//include("functions.php");
 if((isset($_SESSION["ID"])&&isset($_SESSION["UTYPE"]))&&$_SESSION["UTYPE"]=="admin")
{
	/*if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	header("Refresh:0");
	}
	else
	{*/
	include_once("adminheader.php");
	$query2="select COUNT(id) as 'count' from login";
$stmt2=$con->prepare($query2);
$stmt2->execute();
$row= $stmt2->fetch(PDO::FETCH_ASSOC);
$count=$row["count"];
$query1="select COUNT(id) as 'count' from login where status=0";
$stmt1=$con->prepare($query1);
$stmt1->execute();
$row= $stmt1->fetch(PDO::FETCH_ASSOC);
$count1=$row["count"];
	 ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php echo $count?>
								</div>
                                    <div>Total Users!</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count1 ?></div>
                                    <div>Active Users!</div>
                                </div>
                            </div>
                        </div>
                 </div>
                
                   
                        
                        
    <!-- /#wrapper -->

  <!--
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
   <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
 -->
    <!-- Metis Menu Plugin JavaScript -->
   <!-- <script src="vendor/metisMenu/metisMenu.min.js"></script> -->
     <!-- Custom Theme JavaScript -->
   <!-- <script src="dist/js/sb-admin-2.js"></script>
 -->
</body>
</html>
 <?php	
}
else
{
	$_SESSION["MSG"]="Invalid Access";
	header("Location:index.php");
}?>
