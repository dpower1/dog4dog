<?php
	session_start();
?>

<head>
	
</head>
<body>

<form method="POST" name="post" action="new_userinfo.php" enctype="multipart/form-data"> 
	<textarea name="body" placeholder="Enter your user profile here" ></textarea><br />
	Select Image to upload<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Submit" />
	<input type="reset" value="Reset" />
</form>

</body>
