<?php
//Shows the username in the header
session_start();
$uid="";
$loggedIn = false;
$adminLoggedIn = false;
//checks if a uid session has been returned from the client machine
if(isset($_SESSION['loggedIn'])){
    $uid = $_SESSION['uid'];
    $loggedIn = $_SESSION['loggedIn'];
}
if(isset($_SESSION['adminLoggedIn'])){
    $adminLoggedIn = $_SESSION['adminLoggedIn'];
}
?>