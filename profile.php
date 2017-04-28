<html><body>
<?php
	session_start();
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

	$userID = $_SESSION["userID"];
	$sql_query_userDescription = "SELECT `Description` FROM `Users` WHERE userID='$userID'";

	$userDescriptionResult = mysql_query($sql_query_userDescription);
	$row_array = mysql_fetch_array($userDescriptionResult);
	$userinfo = $row_array[body];

	$sql_query_picture = "SELECT * FROM Users WHERE userID = $userID";
	$userPictureResult = mysql_query($sql_query_picture);
	$picture_row_array = mysql_fetch_array($userPictureResult);
?>

	<div class = "user_info"> 	
		<!-- beautiful display of USERINFO!!! -->
		<table>
			<tr>
			<td class = "user_info">
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $picture_row_array['Picture'] ).'"/>'; ?> <br />
			<?php echo($userinfo); ?> <br />
			<a class = "edit" href="edit.php">Edit userinfo here </a>
			</td>
			</tr>
		</table>
	</div>


</body>
</html>