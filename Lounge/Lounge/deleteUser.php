<?php
require_once 'connection.php';
require_once 'header.php';
$currentUser = $_POST["user"];
$deleteQuery = "DELETE FROM users WHERE uid=$currentUser";
if(mysqli_query($connection,$deleteQuery)){
    echo '<div class="alert alert-success" role="alert">User successfully deleted.</div>';
    header('refresh=2; url=adminUsers.php'); 
}
else{
    echo '<div class="alert alert-danger" role="alert">Something went wrong! Please try again later!</div> ';
    header('refresh=2; url=adminUsers.php'); 
}
?>