<?php
session_start();
ini_set('display_errors', 1);
//$userID = $_SESSION["userID"];
$userID = "bill";
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]) . $userID;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


$servername = "dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "dogfordog";
$dbname ="dogfordog";
$port = "3306";
$body = $_POST["body"];
$newLocation = $_POST["location"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

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
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
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
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql_query_userDescription ="UPDATE `Users` SET `Description`='$body', 'location'='$newLocation', 'Picture'='$target_file' WHERE 'userID'='$userID'";
        $result = mysql_query($sql_query_userDescription);
    
        if(! $result){
            print("Error - query could not be executed");
            $error = mysql_error();
            print "<p> . $error . </p>";
        }   

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("Location: http://ec2-54-211-83-199.compute-1.amazonaws.com/dog4dog/home.html");
die();
?>