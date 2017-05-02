<?php
// Used to handle session variables
session_start();

if( $_REQUEST["userID"] ) {
   $_SESSION['userID'] = $_REQUEST['userID'];
}
if( $_REQUEST['action'] == 'call_this'){
    session_unset(); 
}
?>