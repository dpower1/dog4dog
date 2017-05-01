<!DOCTYPE html>
<html>
<head>
  <?php include('../header.php');  ?>  
  
  <style type="text/css">
  #matches {
    position: absolute;
    width: 300px;
    height: 200px;
    z-index: 15;
    top: 50%;
    left: 50%;
    margin: -100px 0 0 -150px;
  }
  </style>

</head>



<body>

<?php
include('../sharedPHP/dbconnection.php');
$currentUserID = "test";

$result = mysqli_query($con, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($con));

$row = mysqli_fetch_array($result);

$matches = $row['Matched'];

//echo "YOUR MATCHES: " . $matches;
echo "<div id=\"matches\">";
foreach (explode(",", $matches) as $match) {
  echo "\r\nMatch: " . $match;
  echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\"dog <sadieb1>\" data-forumname=\"dog4dog\">Message dog</button>
<script src=\"//cdn.muut.com/1/moot.min.js\"></script>";
}
echo "</div>";
?>
<!--
  echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\"Display Name <jrust>; Another name <sadieb1>\" data-forumname=\"dog4dog\">Message username and username2</button> 
<script src=\"//cdn.muut.com/1/moot.min.js\"></script>"; -->
<!--<iframe src="muut.htm" height="400" width="600">
</iframe> -->

</body>
</html>
