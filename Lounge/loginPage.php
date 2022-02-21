<?php
require_once 'header.php';
echo <<<CREATE
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/navbar.css"/>
        <link rel="stylesheet" href="css/form.css"/>
    </head>
    <body>
        <!--Login Form-->
        <form action="login.php">
            <h2>Login to your account</h2>
            <input type="text" id="tbUsername" name="username" class="tbForm" placeholder="Username"/>
            <br/>
            <input type="text" id="tbPassword" name="password" class="tbForm" placeholder="Password"/>
            <br/>
            <input type="submit" id="form-submit-button" onsubmit="validateForm()"/>
        </form>
    </body>
    <footer>
    <script src="js/validateLogin.js"></script>
    </footer>
</html>
CREATE;
require_once 'footer.php';
?>