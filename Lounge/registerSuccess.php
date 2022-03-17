<?php
require_once "connection.php";
include 'header.php';
//Gather and sanatises data
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$firstName = mysqli_real_escape_string($connection, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($connection, $_POST["lastName"]);
$email = mysqli_real_escape_string($connection, $_POST["email"]);
$age = mysqli_real_escape_string($connection, $_POST["age"]);
$city = mysqli_real_escape_string($connection, $_POST["city"]);
$county = mysqli_real_escape_string($connection, $_POST["county"]);
$country = mysqli_real_escape_string($connection, $_POST["country"]);
$phone = mysqli_real_escape_string($connection, $_POST["number"]);

//encrypts the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//Checks if the username exists within the database
$select = "SELECT *FROM users WHERE username='$username'";
$result = mysqli_query($connection,$select);
//If the query returns any row, that means that the username already exists within the database
if(mysqli_num_rows($result)>0) {
    echo "Username already exists, please choose another one";
}
else{
    //Checks that the form is valid
    $valid = validateForm($email,$phone,$age);
    if($valid==true){
        //insert new account
        $query = "INSERT INTO users(username, password, firstname, lastname, email, age, city, county, country, phone) VALUES ('$username', '$hashedPassword', '$firstName', '$lastName', '$email', '$age', '$city', '$county', '$country', '$phone')";
        if(mysqli_query($connection, $query)){
            $statement = "SELECT uid FROM users WHERE username = '$username'";
            $result = mysqli_query($connection,$statement);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['uid'] = $row["uid"];
            setcookie("username",$_POST["username"], time() + 60 * 60 * 24 * 30, "/");
            echo 1;
        }
        else{
            echo "Something went wrong! Please try again later!";
        }
    }
    else{
        echo "Invalid form fields! Please check your details!";
    }
}

//revalidates the form on the server-side
function validateForm($email,$phone,$age){
    //email is in correct format
    //phone only consists of numbers
    //age only consists of numbers
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($phone,FILTER_VALIDATE_INT) && filter_var($age,FILTER_VALIDATE_INT)) {
        return true;
      } else {
        return false;
      }
}
?>