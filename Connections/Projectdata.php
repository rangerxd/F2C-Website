<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Projectdata = "localhost";
$database_Projectdata = "project";
$username_Projectdata = "root";
$password_Projectdata = "";
$Projectdata = mysql_pconnect($hostname_Projectdata, $username_Projectdata, $password_Projectdata) or trigger_error(mysql_error(),E_USER_ERROR); 
?>