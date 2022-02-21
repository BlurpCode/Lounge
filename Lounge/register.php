<?php
require_once 'connection.php';
//Checks if the username exists
if ($stmt = $connection->prepare('SELECT uid, password FROM users WHERE username = ?')) {
	// Bind parameters
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new account
        if ($stmt = $connection->prepare('INSERT INTO users (username, password, firstname, lastname, email, age, city, county, country, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
            $stmt->bind_param('ssssssssss', $_POST['username'], $_POST['password'], $_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['age'],$_POST['city'],$_POST['county'],$_POST['country'],$_POST['number']);
            $stmt->execute();
            echo 'You have successfully registered, you can now login!';
        }
        else{
            echo 'Registeration unsuccessful, please try again later.';
        } 
	}
	$stmt->close();
    $connection->close();
}
?>