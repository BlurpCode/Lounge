<?php
require_once 'header.php';
echo <<<CREATE
<html>
    <head>
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/navbar.css"/>
        <link rel="stylesheet" href="css/form.css"/>
    </head>
    <body>
        <!--Registration Form-->
        <form action="register.php">
            <h2>Register with us</h2>
            <input type="text" id="firstName" class="tbForm" name="firstName" placeholder="First Name"/>
            <br/>
            <input type="text" id="lastname" class="tbForm" name="lastName" placeholder="Last Name"/>
            <br/>
            <input type="text" id="username" class="tbForm" name="username" placeholder="Username"/>
            <br/>
            <input type="password" id="password" class="tbForm" name="password" placeholder="Password"/>
            <br/>
            <!--Confirm password element must match the password element, otherwise return an error-->
            <input type="password" id="confirmPassword" class="tbForm" placeholder="Confirm Password"/>
            <br/>
            <input type="text" id="email" class="tbForm" name="email" placeholder="Email"/>
            <br/>
            <!--Confirm email element must match the email element, otherwise return an error-->
            <input type="text" id="confirmEmail" class="tbForm" placeholder="Confirm Email"/>
            <br/>
            <input type="text" id="number" class="tbForm" name="number" placeholder="Phone Number"/>
            <br/>
            <input type="text" id="age" class="tbForm" name="age" placeholder="Age"/>
            <br/>
            <input type="text" id="country" class="tbForm" name="country" placeholder="Country"/>
            <br/>
            <input type="text" id="county" class="tbForm" name="county" placeholder="County"/>
            <br/>
            <input type="text" id="city" class="tbForm" name="city" placeholder="City"/>
            <br/>
            <input id="form-submit-button" type="submit"/>
        </form>
    </body>
</html>
CREATE;
require_once 'footer.php';
?>