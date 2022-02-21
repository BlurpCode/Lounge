<?php
require_once 'connection.php';
$show_error = false;
//Create a prepared statement
$query = 'SELECT * FROM users WHERE username=? AND password =?';
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ss",$_GET['username'],$_GET['password']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
//Checks if the user logging in is the admin
if(($_GET['username']=='admin')&&($_GET['password'])){
    //Show the admin page
}
if ($row !== null && $row['username'] == $_GET['username'] && $row['password'] == $_GET['password']) {
    //redirect the user to the index page
    //Show the profile page
    //Change site header to welcome user
    session_start();
    $_SESSION["username"] = $_GET['username'];
    $_SESSION["password"] = $_GET['password'];
    $_SESSION['userID'] = $row['uid'];


}
else{
    $show_error = true;
}

?>