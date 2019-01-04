<?php session_start();
//include_once("functions.php");

//if(isset($_SESSION["user_id"] ) && isset($_SESSION["UNAME"])) {
//	session_destory();
	
//	}
include_once("loginHeader.php"); ?>

<html>
<title>Admin Site</title>
<style type="text/css">
body{ background-color:#CCC;}
</style>
<body  ><!--style="background:url(images/farm.jpg) no-repeat;max-width: 100%;height: auto;">   -->  
<div class="container " align="center"  style="width:500px;height:300px;margin-top:100">
        <div class="">
        <div class="card" >
        <div class="card-body">
        	<div class=""><img src="images/admin.png" alt="admin" width="200" height="200" >
        	<h3 align="center" style="color:black">ADMINISTRATOR LOGIN</h3><br>
        </div>
       	<?php
			if(isset($_SESSION["MSG"]))
			{
		?>
        	<font color="#FF0000"><?php echo $_SESSION["MSG"];?> </font><br>
         <?php
		 	unset($_SESSION["MSG"]);
			}
		?>
		<br>
        
       
		 <form action="loginProcessing.php" method="post" enctype="application/x-www-form-urlencoded" class="form-horizontal" runat="server">
           <fieldset>
            <div class="form-group">
                <div class="col-sm-10">
                 <input type="text" class="form-control"  autofocus name="username" placeholder="Enter Username" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
            </div>
            <!--<div class="form-group">
            <label>
                 <input name="remember" type="checkbox" value="Remember Me">Remember Me
             </label>
             </div> -->
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                </div>
            </div>
            </fieldset>
</form>
        </div>
        </div>
        
  </div>
	</div>
</body>
</html>