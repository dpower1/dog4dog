<?php
ini_set('display_errors', 1);
//header("Content-Type: application/json", true);
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$servername = "dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "dogfordog";
$dbname ="dogfordog";
$port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	
}

// get the q parameter from URL
//$q = $_REQUEST["q"];

//$currentUserID = "test";
//$result = mysqli_query($conn, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($con));

$result = mysqli_query($conn, "select * from Users where userID='$obj->uName' ") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

$likedArray = array();

$likedP = $row['Liked'];

$likedArray = explode(",", $likedP);

$alreadyLiked = 0;

//already in liked
$likedLen = count($likedArray);
for($i = 0; $i < $likedLen; $i++)
{
	if($obj->liked == $likedArray[$i])
	{
		//echo "you already like them";
		$alreadyLiked = 1;	
	}
}

//matching

$result2 = mysqli_query($conn, "select * from Users where userID='$obj->liked' ") or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);


$matchedLiked =  $row2['Liked'];
$matchedLikedArray = explode(",", $matchedLiked);

$matchLen = count($matchedLikedArray);

if($likedP == "")
{
	$likedP = $obj->liked;
	echo "in here";
	echo "<br />\n";
	
	//matching
	
	for($i = 0; $i < $matchLen; $i++)
	{
	if($obj->uName == $matchedLikedArray[$i])
	{
		echo " match: " . $obj->uName . " " . $obj->liked;
		//echo "match: ";
		//$alreadyLiked = 1;	
	}
	}
	
}
else if ($obj->liked == $obj->uName)
{
	//do nothing
	echo "you can't like yourself loser";
	echo "<br />\n";
}
else if($alreadyLiked == 1)
{
	echo "you already like them";
	echo "<br />\n";
}
else
{
	$likedP = $likedP . ',' .$obj->liked;
	echo "liking new person";
	echo "<br />\n";
	
	//matching
	for($i = 0; $i < $matchLen; $i++)
{
	if($obj->uName == $matchedLikedArray[$i])
	{
		echo " match: " . $obj->uName . " " . $obj->liked;
		//echo "match: ";
		//$alreadyLiked = 1;	
	}
}
	
}
//echo $likedP;

//echo json_encode($likedArray);

//echo $obj->liked;
//echo $obj->uName;

$sql = "UPDATE Users SET Liked='$likedP' WHERE userID ='$obj->uName' ";

if ($conn->query($sql) === TRUE) {
   // echo "\n" . "Record updated successfully";
	//echo "<br />\n";
} else {
    echo "Error updating record: " . $conn->error;
}

//matching
/*
$result2 = mysqli_query($conn, "select * from Users where userID='$obj->liked' ") or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);


$matchedLiked =  $row2['Liked'];
$matchedLikedArray = explode(",", $matchedLiked);

$matchLen = count($matchedLikedArray);


for($i = 0; $i < $matchLen; $i++)
{
	if($obj->uName == $matchedLikedArray[$i])
	{
		echo " match: " . $obj->uName . " " . $obj->liked;
		//echo "match: ";
		//$alreadyLiked = 1;	
	}
}
*/

//$echo json_encode($likedP);

//$matches = $row['Matched'];
//echo "YOUR MATCHES: " . $matches;

//$outp = array();
//array_push($outp, $obj->uName, $obj->liked);

//echo json_encode($outp);

//echo $q;
?>