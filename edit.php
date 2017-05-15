<?php
	session_start();
	if(!isset($_SESSION['userID'])){
    	header("Location: https://dog4dog-mjkoogle.c9users.io/about.php");
    	die("redirected");
	}

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
?>
<head class="w3-center w3-top">
  <?php include('header.php');  ?>
</head>
<br /> <br /> <br />
<body>

<div style='margin: auto; width: 60%; border: 3px solid #FFA500; border-radius: 5px; background-color: #f2f2f2; padding: 15px;'>
<form method="POST" name="post" action="new_userinfo.php" enctype="multipart/form-data">
	<h2 class="w3-text-orange w3-center w3-font-size:large" style="text-decoration: underline; max-width:100%;"> Edit Your Profile Information </h2> 
    <label for="name" style='font-weight: bold;'>Name</label><br/>
		<input type="text" name="name" required placeholder=<?php echo($userName); ?> style='padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid; border-radius: 4px; box-sizing: border-box;'/><br />
	<label for="MUUT" style='font-weight: bold;'>MUUT Username</label><br />
		<input type="text" name="MUUT" required placeholder="Your MUUT Username" style='padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid; border-radius: 4px; box-sizing: border-box;'/> (Don't have one yet? Click <a href='https://muut.com/account/' target="_blank">here</a> to get started!)<br />
    <label for="body" style='font-weight: bold;'>User Bio</label><br />
		<textarea name="body" placeholder=<?php echo($userDescription); ?> style='padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid; border-radius: 4px; box-sizing: border-box;'></textarea><br />
	<label for="location" style='font-weight: bold;'>Location</label><br/>
		<input type="text" name="location" required placeholder=<?php echo($userLocation); ?> style='padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid; border-radius: 4px; box-sizing: border-box;'/><br />
    <label for="fileToUpload">Select a profile picture to upload.</label>
		<input type="file" name="fileToUpload" id="fileToUpload" required/><br />
	<input type="submit" value="Submit" style='background-color: #FFA500; border: 1px solid; color: #000000; padding: 8px 16px; text-decoration: underline; margin: 4px 2px; cursor: pointer;'/>
	<input type="reset" value="Clear Form" style='background-color: #FFA500; border: 1px solid; color: #000000; padding: 8px 16px; text-decoration: underline; margin: 4px 2px; cursor: pointer;'/>
	<a class = "delete" href="delete.php" style='background-color: #FF6347; border: 1px solid; color: #000000; padding: 8px 16px; text-decoration: none; margin: 4px 2px; cursor: pointer; float:right;'>
		<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;<u>Delete My Account</u></a>
</form>
</div>
</body>
