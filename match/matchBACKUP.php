<html>
<script src="https://www.w3schools.com/lib/w3data.js"></script>
<div w3-include-html="/dog4dog/home.html"></div>
<script>
w3IncludeHTML();
</script>

<?php

include('/var/www/html/dog4dog/sharedPHP/dbconnection.php');
//global $con;

//echo "in php";
//$servername = "dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com";
//$username = "root";
//$password = "dogfordog";
//$dbname ="dogfordog";
//$port = "3306";

//echo "creating connection";

//$con = @new mysqli($servername, $username, $password, $dbname) or
//	die("Could not connect to database" . $con->connect_error);
//echo "connected to sql";

$currentUserID = "test";

$result = mysqli_query($con, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($con));

$row = mysqli_fetch_array($result);

$matches = $row['Matched'];

echo "YOUR MATCHES: " . $matches;



//$con = @new mysqli("dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com", "root", "dogfordog", "dogfordog");
//echo "connection created";

//if ($con->connect_error) {
//    echo "Error: " . $con->connect_error;
//	exit();
//}
//echo 'Connected to MySQL';

//echo "here we go2";
//$link = mysqli_connect("dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com", "root", "dogfordog", "dogfordog");

//if (!$link) {
//    echo "Error: Unable to connect to MySQL." . PHP_EOL;
//    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//    exit;
//}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);

//$con = mysqli_connect("dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com", "root", "dogfordog", "dogfordog");

//if (!$con) {
  //  echo "Error: " . mysqli_connect_error();
//	exit();
//}
//echo 'Connected to MySQL';

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname, $port);
//echo "here1";
// Check connection
//if (mysqli_connect_error()) {
//    echo "here";
//    die("Connection failed: " . mysqli_connect_error());
//}
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 

//echo "Connected successfully";
?>



<body>
  <a class="muut" href="https://muut.com/i/forum-name">Your Forum Title</a>
  <script src="//cdn.muut.com/1/moot.min.js"></script>
</body>

</html>
