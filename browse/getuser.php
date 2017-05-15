<?php
header("Content-Type: application/json", true);
ini_set('display_errors', 1);

// get the q parameter from URL
//$uID = $_REQUEST["q"];


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
    //echo "wtf";
    die("Connection failed: " . $conn->connect_error);
    
} 
//echo "Connected successfully";

//new
/*
$sql = "SELECT * FROM dogfordog.Users";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result)
*/
//echo $result;

$currentUserID = "test";
//$result = mysqli_query($con, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($con));
//$result = mysqli_query($conn, "select Description from Users where userID='$currentUserID' ") or die(mysqli_error($conn));
//$result = mysqli_query($conn, "select userID from Users") or die(mysqli_error($conn));
$result = mysqli_query($conn, "select * from Users") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

//$matches = $row['Matched'];
//echo "YOUR MATCHES: " . $matches;

//$Description = $row['Description'];
//echo $Description;

//$allUsers = $row['userID'];
//echo $allUsers;

//can't call fetch or whatever twice or it skips the first row fix this somehow
//echo "userID: " . $row["userID"] . "<br>";

//this worked



if (!isset($myObj)) 
    $myObj = new stdClass();


//$myObj->image = array();
//$myObj->name = array();
//$myObj->image = "http://ec2-54-211-83-199.compute-1.amazonaws.com/dog4dog/" . $row["Picture"];
$myObj->image = "https://dog4dog-mjkoogle.c9users.io/" . $row["Picture"];
//changed name to userID but didnt change the object name
$myObj->userID = $row["userID"];
$myObj->name = $row["name"];
//array_push($myObj->image,"http://ec2-54-211-83-199.compute-1.amazonaws.com/dog4dog/" . $row["Picture"]);
//array_push($myObj->name,"Name: " . $row["name"]);
//array_push($myObj->name,$row["name"]);

$users = array();
array_push($users, $myObj);
//echo ($users);


/*
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";
*/

//$myJSON = json_encode($myObj);
//$myJSON = json_encode($users);

//echo $myJSON;

//this worked
/*
$cars = array();
array_push($cars,"Picture: " . $row["Picture"]);
echo json_encode($cars);
*/

//this worked
/*
$myArr = array("John", "Mary", "Peter", "Sally");

$myJSON = json_encode($myArr);

echo $myJSON;
*/

//$outp = "userID: " . $row["userID"] . "<br>";
//echo json_encode($outp);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "userID: " . $row["userID"] . "<br>";
		
		$myObj = new stdClass();
		
		$myObj->image = "https://dog4dog-mjkoogle.c9users.io/" . $row["Picture"];
		$myObj->userID = $row["userID"];
		$myObj->name = $row["name"];
		array_push($users, $myObj);
		
		


    }

}
$myJSON = json_encode($users);

		echo $myJSON;
?>