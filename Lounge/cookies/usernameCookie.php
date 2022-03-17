<?php
//Shows the username in the header
$showName = true;
$username="";
//checks if a username cookie has been returned from the client machine
if(isset($_COOKIE["username"])){
    $username = $_COOKIE["username"];
}
//The user is visiting the site for the first time
else{
    $username = "anonymous";
}
?>