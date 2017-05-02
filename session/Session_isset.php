<?php
// Used to test session variables

session_start();
echo 'Welcome to page #2<br />';
if(isset($_SESSION['userID'])){
    echo '<p>' . $_SESSION['userID'] . '</p>';
}
else {
    echo '<p> llama </p>';
}
?>