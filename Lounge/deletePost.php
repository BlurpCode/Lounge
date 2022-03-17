<?php
require_once 'connection.php';
require_once 'header.php';
$currentPost = $_POST["post"];
$deleteQuery = "DELETE FROM posts WHERE postid = $currentPost";
if(mysqli_query($connection,$deleteQuery)){
    echo '<div class="alert alert-success" role="alert">Post successfully deleted.</div>'; 
}
else{
    echo '<div class="alert alert-danger" role="alert">Something went wrong! Please try again later!</div> ';
}
?>