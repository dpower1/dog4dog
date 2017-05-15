<?php
	session_start();
	ini_set('display_errors', 1);
	if(!isset($_SESSION['userID'])){
    	header("Location: https://dog4dog-mjkoogle.c9users.io/home.php");
    	die("redirected");
	}

	$userID = $_SESSION["userID"];

	$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "dogfordog";
    $dbport = 3306;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql_query_userDescription ="DELETE FROM `Users` WHERE userID='$userID'";
    $result = mysqli_query($conn, $sql_query_userDescription);
    
    if(! $result){
        print("Error - query could not be executed");
        $error = mysqli_error($conn);
        print "<p> . $error . </p>";
    }
    
header("Location: https://dog4dog-mjkoogle.c9users.io/home.php");
die();

?>