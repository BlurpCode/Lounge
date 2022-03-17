<?php
require_once 'header.php';
require_once 'connection.php';
$currentUser = $_POST['user'];
echo <<<CREATE
<html>
<head>
    <title>Update Post</title>
    <script></script>
</head>
</html>
CREATE;
if(isset($currentUser)){
    //Displays the post to be updated
    $query = "SELECT * FROM users WHERE uid=$currentUser";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    echo <<<CREATE
    <br/>
    <div class="container">
        <div class="alert alert-info" role="alert">You are updating information for the user {$row['username']}</div>

        <form method="POST" action="#" id="post">
            <h3>Update User</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                </div>
                <input type="input" class="form-control" name="username" value="{$row['username']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                </div>
                <input type="password" class="form-control" name="password" value="{$row['password']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">First Name</span>
                </div>
                <input type="input" class="form-control" name="firstName" value="{$row['firstname']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Last Name</span>
                </div>
                <input type="input" class="form-control" name="lastName" value="{$row['lastname']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Age</span>
                </div>
                <input type="input" class="form-control" name="age" value="{$row['age']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Phone Number</span>
                </div>
                <input type="input" class="form-control" name="number" value="{$row['phone']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                <input type="input" class="form-control" name="email" value="{$row['email']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Country</span>
                </div>
                <input type="input" class="form-control" name="country" value="{$row['country']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">County</span>
                </div>
                <input type="input" class="form-control" name="county" value="{$row['county']}"/>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">City</span>
                </div>
                <input type="input" class="form-control" name="city" value="{$row['city']}"/>
            </div>
            <input type="submit" class="btn btn-primary" name="user" value="{$row['uid']}">Submit</button>
        </form>
    </div>
    </body>
    CREATE;
}
else{
    echo "No user data was received. Go back to try again.";
}

if(isset($_POST['username'])){
    //update post
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

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $updateQuery = "UPDATE users SET username='$username', password='$hashedPassword',  firstname ='$firstName', lastname='$lastName', email='$email', age='$age', city='$city', county='$county', country='$country', phone='$phone' WHERE uid = $currentUser";
    if(mysqli_query($connection,$updateQuery)){
        echo '<div class="alert alert-success" role="alert">User updated Successfully</div> '; 
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Something went wrong! Please try again later!</div> ';
    }
}
?>