<?php 
	session_start();
	if(!isset($_SESSION['userID'])){
    	header("Location: https://dog4dog-mjkoogle.c9users.io/about.php");
    	die("redirected");
	}
?>

<head class="w3-center w3-top">
  <?php include('header.php');  ?>
</head>
<br /><br /><br />
<?php
	ini_set('display_errors', 1);
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
    //echo "Connected successfully (".$servername.")";

	//$userID = $_SESSION["userID"];
	$userID = $_SESSION["userID"];
	$sql_query_userDescription = "SELECT * FROM `Users` WHERE userID='$userID'";

	$userDescriptionResult = mysqli_query($conn, $sql_query_userDescription);
	$row_array = mysqli_fetch_array($userDescriptionResult);
	
	$userDescription = $row_array["Description"];
	$userLocation = $row_array["location"];
	$userImageLocation = $row_array["Picture"];
	$userName = $row_array["name"];
?>

	<div class = "user_info" style='margin: auto; width: 30%; border: 3px solid #FFA500; border-radius: 5px; background-color: #f2f2f2; padding: 15px;'> 	
		<!-- beautiful display of USERINFO!!! 
			<td class = "user_info">-->
		<h2 class="w3-text-orange w3-center w3-font-size:large" style="max-width:100%;"><u> Your Profile Information </u></h2> 
		<?php echo '<img src="'.$userImageLocation.'" style="max-width:100%; height: 300px; width: 350px; display: block; margin: 0 auto; border: 3px solid #FFA500; border-radius: 5px;">'; ?><br />
		<p style='font-weight: bold;'>Name: </p>
		<p style="border: 1px solid; border-radius: 4px; padding: 8px 16px;"><?php echo($userName); ?></p>
		<p style='font-weight: bold;'>Description: </p>
		<p style="border: 1px solid; border-radius: 4px; padding: 8px 16px;"><?php echo($userDescription); ?></p>
		<p style='font-weight: bold;'>Location: </p>
		<p style="border: 1px solid; border-radius: 4px; padding: 8px 16px;"><?php echo($userLocation); ?></p>
		<br /> 
		
		<a class = "edit" href="edit.php" style='background-color: #FFA500; border: none; color: #000000; padding: 8px 16px; text-decoration: underline; margin: 4px 2px; cursor: pointer;'>Edit My Profile </a>
	</div>


</body>
</html>