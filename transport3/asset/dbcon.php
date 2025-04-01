<?php

$username = "root";
$password = "";
$servername = "localhost";

try
{

	$con = new PDO("mysql:host=$servername;dbname=tms",$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo"connected successfully";

}

catch(PDOException $e)
{
	echo"Connection failed:" .$e->getMessage();

}

?>
