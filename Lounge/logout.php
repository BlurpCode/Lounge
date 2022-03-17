<?php
//The user logs out
if(isset($_GET['logout'])){
    $username = "anonymous";
    setcookie("username","", time() - 2592000, "/");
    $username = "anonymous";
    $showName = true;
    session_destroy();
    header( "refresh:2;url=index.php" );
}
?>