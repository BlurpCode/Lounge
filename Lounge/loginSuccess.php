<?php
//connect to database
require_once 'connection.php';
include 'header.php';
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$query = "SELECT uid, password FROM users WHERE username = '$username'";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);
//first checks if the user is the admin
if($username == 'admin'){
    if($password == $row["password"]){
        $_SESSION['adminLoggedIn'] = true;
        setcookie("username","Admin", time() + 60 * 60 * 24 * 30, "/");
        echo "Admin successfully logged in! Redirecting you...";
        header( "refresh:2;url=adminPosts.php" );
    }
}
//checks if the password matches the hashed password found in the database
if(password_verify($password,$row["password"])){
    if(mysqli_num_rows($result)==1){
        //Set cookies and sessions
        $_SESSION['uid'] = $row["uid"];
        $_SESSION['loggedIn'] = true;
        setcookie("username",$_POST["username"], time() + 60 * 60 * 24 * 30, "/");

        //Show Profile page and hide the register and login pages
    
        echo "successfully logged in";
        header( "refresh:2;url=profile.php" );
    }
    else{
        echo "something went wrong!";
        header( "refresh:2;url=loginPage.php" );
    }
}


?>