<!DOCTYPE html>
<html>

<script src="https://www.w3schools.com/lib/w3data.js"></script>
<div w3-include-html="/dog4dog/header.html"></div>
<script>
w3IncludeHTML();
</script>




<body>

<?php
include('/var/www/html/dog4dog/sharedPHP/dbconnection.php');
$currentUserID = "test";

$result = mysqli_query($con, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($con));

$row = mysqli_fetch_array($result);

$matches = $row['Matched'];

//echo "YOUR MATCHES: " . $matches;

foreach (explode(",", $matches) as $match) {
  echo "\r\nMatch: " . $match;
  echo "<button class=\"m-button muut-messaging-button\" data-recipients=\"Display Name <jrust>; Another name <sadieb1>\" data-forumname=\"dog4dog\">Message username and username2</button>
<script src=\"//cdn.muut.com/1/moot.min.js\"></script>";
}

?>

<iframe src="muut.htm" height="400" width="600">
</iframe>

</body>
</html>
