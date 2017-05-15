<?php
    session_start();
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

	$userID = $_SESSION["userID"];
	$sql_query_userDescription = "SELECT * FROM `Users` WHERE userID='$userID'";

	$userDescriptionResult = mysqli_query($conn, $sql_query_userDescription);
	$row_array = mysqli_fetch_array($userDescriptionResult);
	
	if($row_array == NULL){
		$sql_default = "INSERT INTO  `Users` (  `userID` ,  `Liked` ,  `name` ,  `location` ,  `Description` ,  `Picture` ,  `Matched` ,  `username` ) VALUES ('$userID',  '',  'default',  'Default Location',  'Default Description',  'images/dog1.jpeg',  '',  'username')";
		mysqli_query($conn, $sql_default);
// 		header("Location: https://dog4dog-mjkoogle.c9users.io/profile.php");
        echo 'No';
        $_SESSION["Default"] = true;
	}
	else{
	    echo 'Yes';
	}
?>