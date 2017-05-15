<?php
ini_set('display_errors', 1);
//header("Content-Type: application/json", true);
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

/*
$servername = "dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "dogfordog";
$dbname ="dogfordog";
$port = "3306";
*/

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

// get the q parameter from URL
//$q = $_REQUEST["q"];

//$currentUserID = "test";
//$result = mysqli_query($conn, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($con));

$result = mysqli_query($conn, "select * from Users where userID='$obj->uName' ") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

//declare name of user
$nameOfUser = $row['name'];

$likedArray = array();

$likedP = $row['Liked'];

$likedArray = explode(",", $likedP);

$alreadyLiked = 0;

//already in liked
$likedLen = count($likedArray);
for($i = 0; $i < $likedLen; $i++)
{
	if($obj->likedUID == $likedArray[$i])
	{
		//echo "you already like them";
		$alreadyLiked = 1;
		//echo $obj->liked;
		//echo $obj->uName;
	}
}

//matching

$result2 = mysqli_query($conn, "select * from Users where userID='$obj->likedUID' ") or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);


$matchedLiked =  $row2['Liked'];
$matchedLikedArray = explode(",", $matchedLiked);

$matchLen = count($matchedLikedArray);

if ($obj->likedUID == $obj->uName)
{
	//do nothing
	echo "Your Profile!";
	echo "<br />\n";
}

else if($likedP == "")
{
	//change to likedUID
	$likedP = $obj->likedUID;
	//echo "in here";
	echo "<br />\n";
	
	//matching
	//echo " match: " . $nameOfUser . " " . $obj->liked;
	
	for($i = 0; $i < $matchLen; $i++)
	{
	// "poop" . $matchedLikedArray[$i] . "shit";
	//echo "poop";
	if($obj->uName == $matchedLikedArray[$i])
	//if($nameOfUser == $matchedLikedArray[$i])
	{
		//echo " match: " . $nameOfUser . " " . $obj->liked;
		echo "You matched with " . $obj->liked . "!";
		//echo "match: ";
		//$alreadyLiked = 1;
		
				//update matches
		
		$matchesUser = $row['Matched'];
		$matchesUserArray = explode(",", $matchesUser);
		
		//$likedP = $likedP . ',' .$obj->liked;
		if($matchesUser == "")
		{
			$matchesUser = $obj->likedUID;	
		}
		else
		{
			$matchesUser = $matchesUser . ',' .$obj->likedUID;
		}
		
		$matchesUserLiked = $row2['Matched'];
		if($matchesUserLiked == "")
		{
			$matchesUserLiked = $obj->uName;
		}
		else
		{
			$matchesUserLiked = $matchesUserLiked . ',' . $obj->uName;
		}
		

		$sql = "UPDATE Users SET Matched='$matchesUser' WHERE userID ='$obj->uName' ";
		$conn->query($sql);
		$sql2 = "UPDATE Users SET Matched='$matchesUserLiked' WHERE userID ='$obj->likedUID' ";
		$conn->query($sql2);
	}
	}
	
}
/*
else if ($obj->likedUID == $obj->uName)
{
	//do nothing
	echo "This is your profile";
	echo "<br />\n";
}
*/
else if($alreadyLiked == 1)
{
	echo "Already liked!";
	echo "<br />\n";
}
else
{
	//changed to likedUID
	$likedP = $likedP . ',' .$obj->likedUID;
	echo "liking new person";
	echo "<br />\n";
	//echo $obj->liked;
	//echo $obj->uName;
	//matching
	for($i = 0; $i < $matchLen; $i++)
{
	//change it from $nameOfUser to $obj->uName
	if($obj->uName == $matchedLikedArray[$i])
	{
		//echo " match: " . $nameOfUser . " " . $obj->liked;
		echo "You matched with " . $obj->liked . "!";
		//echo "match: ";
		//$alreadyLiked = 1;	
		
		//update matches
		
		$matchesUser = $row['Matched'];
		$matchesUserArray = explode(",", $matchesUser);
		
		//$likedP = $likedP . ',' .$obj->liked;
		if($matchesUser == "")
		{
			$matchesUser = $obj->likedUID;	
		}
		else
		{
			$matchesUser = $matchesUser . ',' .$obj->likedUID;
		}
		
		$matchesUserLiked = $row2['Matched'];
		if($matchesUserLiked == "")
		{
			$matchesUserLiked = $obj->uName;
		}
		else
		{
			$matchesUserLiked = $matchesUserLiked . ',' . $obj->uName;
		}
		

		$sql = "UPDATE Users SET Matched='$matchesUser' WHERE userID ='$obj->uName' ";
		$conn->query($sql);
		$sql2 = "UPDATE Users SET Matched='$matchesUserLiked' WHERE userID ='$obj->likedUID' ";
		$conn->query($sql2);
		//$userMatchedTable 
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
    //echo "Error updating record: " . $conn->error;
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