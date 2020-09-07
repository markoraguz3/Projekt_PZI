<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flight";

$conn = mysqli_connect($servername,$username, $password, $dbname);
 if (!$conn){
	die(mysqli_connect_error());		 
 }

?>
