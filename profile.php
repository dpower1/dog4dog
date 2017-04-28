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

	$er = mysql_select_db("dogfordog");
	if(!$er){
		exit("Error - could not select database");
	}

	$userID = $_SESSION["userID"];
	$sql_query_userDescription = "SELECT * FROM `Users` WHERE userID='$userID'";

	$userDescriptionResult = mysql_query($sql_query_userDescription);
	$row_array = mysql_fetch_array($userDescriptionResult);
	$userDescription = $row_array["Description"];
	$userLocation = $row_array["Location"];
	$userImageLocation = $row_array["Image"];
?>

	<div class = "user_info"> 	
		<!-- beautiful display of USERINFO!!! -->
		<table>
			<tr>
			<td class = "user_info">
			<?php echo '<img src=images/'$userImageLocation' )./>'; ?> <br />
			<?php echo($userinfo); ?> <br />
			<a class = "edit" href="edit.php">Edit userinfo here </a>
			</td>
			</tr>
		</table>
	</div>


</body>
</html>