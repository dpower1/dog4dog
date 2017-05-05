<?php
session_start();
//$response = $_SESSION["userID"];

//$response = 55;

if(isset($_SESSION['userID'])){
    echo $_SESSION['userID'];
}
else {
    echo '<p> llama </p>';
}


//echo $response;

?>