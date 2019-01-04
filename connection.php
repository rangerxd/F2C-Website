<?php
$dbhost = "localhost";
$database = "id5052793_project";
$dbuser = "id5052793_project";
$password = "id5052793_project";
try{
	$con = new PDO("mysql:host=$dbhost;dbname=$database",$dbuser,$password);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>