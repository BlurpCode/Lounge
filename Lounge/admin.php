<?php
require_once 'header.php';
echo <<<CREATE
<html>
    <head>
        <title>Posts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/navbar.css"/>
    </head>
    <body>
        <div id="adminContainer">
            <!--Shows options that are only accessible to the admin-->
            <!--Posts-->
            <!--Users-->
            <!--Nationalize-->
            <div id="adminNavBar">
            </div>
            <div id="content">
            </div>
        </div>
    </body>
</html>
CREATE;
require_once 'footer.php';
?>