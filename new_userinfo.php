<?php
session_start();
ini_set('display_errors', 1);
	if(!isset($_SESSION['userID'])){
    	header("Location: https://dog4dog-mjkoogle.c9users.io/home.php");
    	die("redirected");
	}

$userID = $_SESSION["userID"];
$target_dir = "images/Profiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$path = $target_dir .$userID. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


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
    $body = $_POST["body"];
    $newLocation = $_POST["location"];
    $newUsername = $_POST["name"];
    $newMUUTUsername = $_POST["MUUT"];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql_query_userDescription ="UPDATE `Users` SET Description='$body', location='$newLocation', Picture='$target_file', name='$newUsername', username='$newMUUTUsername' WHERE userID='$userID'";
        $result = mysqli_query($conn, $sql_query_userDescription);
    
        if(! $result){
            print("Error - query could not be executed");
            $error = mysqli_error($conn);
            print "<p> . $error . </p>";
        }  
        $_SESSION["Default"] = false;

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("Location: https://dog4dog-mjkoogle.c9users.io/profile.php");
die();
?>