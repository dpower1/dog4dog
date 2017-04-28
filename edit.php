<?php
	session_start();
?>

<head>
	
</head>
<body>

<form method="POST" name="post" action="new_userinfo.php" enctype="multipart/form-data"> 
	Name<input type="text" name="name" /><br />
	<textarea name="body" placeholder="Enter your user description here" ></textarea><br />
	Location<input type="text" name="location" /><br />
	Select Image to upload<input type="file" name="fileToUpload" id="fileToUpload"><br />
	<input type="submit" value="Submit" />
	<input type="reset" value="Reset" />
</form>

</body>
