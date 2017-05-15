<?php
	session_start();
	if(!isset($_SESSION['userID'])){
    	header("Location: https://dog4dog-mjkoogle.c9users.io/about.php");
    	die("redirected");
	}
?>

<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
  
<head>
  <?php include('../header.php');  ?>  
  <!--
  /*<style type="text/css">*/
  /*#matches {*/
  /*  position: absolute;*/
  /*  width: 300px;*/
  /*  height: 200px;*/
  /*  z-index: 15;*/
  /*  top: 20%;*/
  /*  left: 50%;*/
  /*  margin: -100px 0 0 -150px;*/
  /*}*/
  
  /*#matches > :first-child, #matches > :last-child { border: 1px solid black }*/
  
  /*</style>*/
  -->
</head>



<body style="background-color: #e6e6ff;">

<?php
//session_start();

include('../sharedPHP/connect.php');


if(isset($_SESSION['userID'])){
    echo '<p> SESSION ' . $_SESSION['userID'] . '</p>';
    $currentUserID = $_SESSION['userID'];
} else {
  die('NOT LOGGED IN');
}

//$currentUserID = "test";


$result = mysqli_query($db, "select Matched from Users where userID='$currentUserID' ") or die(mysqli_error($db));

$row = mysqli_fetch_array($result);

$matches = $row['Matched'];

//echo "YOUR MATCHES: " . $matches;
// echo "<div id=\"matches\">";

//echo "select username,name,Picture from Users where userID in ('" . implode("','", explode(",", $matches)) . "')";
$result = mysqli_query($db, "select username,name,Picture,Description from Users where userID in ('" . implode("','", explode(",", $matches)) . "')") or die(mysqli_error($db));

// $row = mysqli_fetch_array($result);

// echo "ROW: " . print_r($row);

// $usernames = $row['username'];
// echo "USERNAMES: " . $usernames;

echo '<div class="w3-row-padding">';
  //   <div class="w3-third w3-container w3-margin-bottom">
  //     <img src="/w3images/mountains.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
  //     <div class="w3-container w3-white">
  //       <p><b>Lorem Ipsum</b></p>
  //       <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
  //     </div>
  //   </div>
  //   <div class="w3-third w3-container w3-margin-bottom">
  //     <img src="/w3images/lights.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
  //     <div class="w3-container w3-white">
  //       <p><b>Lorem Ipsum</b></p>
  //       <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
  //     </div>
  //   </div>
  //   <div class="w3-third w3-container">
  //     <img src="/w3images/nature.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
  //     <div class="w3-container w3-white">
  //       <p><b>Lorem Ipsum</b></p>
  //       <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
  //     </div>
  //   </div>
  // </div>


if ($result) {
  while($row = mysqli_fetch_array($result)) {
    $username = $row["username"];
    $name = $row["name"];
    $pic = $row["Picture"];
    $desc = $row["Description"];
    
    echo '<div class="w3-third w3-container w3-margin-bottom">
      <img src="/../' . $pic . '" style="max-width:100%; height: 300px; width: 350px; display: block; margin: 0 auto; border: 3px solid #FFA500; border-radius: 5px;" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>' . $name . '</b></p>
        <p>' . $desc . '</p>
        <p><button class="m-button muut-messaging-button" data-recipients=" ' . $name . ' <' . $username . '>" data-forumname="dogfordog">Message ' . $name . 
     '</button><script src="//cdn.muut.com/1/moot.min.js"></script></p>
      </div>
    </div>';
    
    
//       echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\"dog <sadieb1>\" data-forumname=\"dogfordog\">Message dog</button>
// <script src=\"//cdn.muut.com/1/moot.min.js\"></script>";
    
    // echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\"dog <sadieb1>\" data-forumname=\"dog4dog\">Message " . $name . 
    // "</button><script src=\"//cdn.muut.com/1/moot.min.js\"></script>";
    
    // echo "<div>";
    // echo $name;
    // echo '<img src="/../' . $pic . '" style="width:304px;height:228px;">';
    // echo $desc;
    // echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\" " . $name . " <" . $username . ">\" data-forumname=\"dogfordog\">Message " . $name . 
    // "</button><script src=\"//cdn.muut.com/1/moot.min.js\"></script><br><br>";
    // echo "</div>";
  }

}
else {
  echo mysql_error();
}


//foreach (explode(",", $matches) as $match) {
  
  //echo "\r\nMatch: " . $match;
//  echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\"dog <sadieb1>\" data-forumname=\"dog4dog\">Message dog</button>
//<script src=\"//cdn.muut.com/1/moot.min.js\"></script>";
//}




//echo "</div>";

?>
<!--
  echo "<br><button class=\"m-button muut-messaging-button\" data-recipients=\"Display Name <jrust>; Another name <sadieb1>\" data-forumname=\"dog4dog\">Message username and username2</button> 
<script src=\"//cdn.muut.com/1/moot.min.js\"></script>"; -->
<!--<iframe src="muut.htm" height="400" width="600">
</iframe> -->

</body>
</html>
