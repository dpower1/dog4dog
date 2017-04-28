<?php 
	session_start();
	ini_set('display_errors', 1);
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

	//$userID = $_SESSION["userID"];
	$userID = "bill";
	$sql_query_userDescription = "SELECT * FROM `Users` WHERE userID='$userID'";

	$userDescriptionResult = mysqli_query($conn, $sql_query_userDescription);
	$row_array = mysqli_fetch_array($userDescriptionResult);
	$userDescription = $row_array["Description"];
	$userLocation = $row_array["location"];
	$userImageLocation = $row_array["Picture"];
?>

	<div class = "user_info"> 	
		<!-- beautiful display of USERINFO!!! -->
		<table>
			<tr>
			<td class = "user_info">
			<?php echo '<img src="'.$userImageLocation.'">'; ?><br />
			<p><?php echo($userDescription); ?></p> <br />
			<p><?php echo($userLocation); ?></p> <br />
			<a class = "edit" href="edit.php">Edit userinfo here </a>
			</td>
			</tr>
		</table>
	</div>


</body>
</html>