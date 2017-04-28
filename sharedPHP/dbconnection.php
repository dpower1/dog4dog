<html>
<?php
$servername = "dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "dogfordog";
$dbname ="dogfordog";
$port = "3306";

$con = @new mysqli($servername, $username, $password, $dbname) or
	die("Could not connect to database" . $con->connect_error);
?>
