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
        <div id="container">
            <div id="userDetails">
                <!--Profile Picture-->
                <img src="img/user.png"/>
                <!--Username-->

                <!--Email and Number-->
            </div>
        </div>

    </body>
</html>
CREATE;

require_once 'connection.php';
$query = "SELECT* FROM posts INNER JOIN users WHERE uid=?";
$stmt = mysqli_prepare($connection,$query);
mysqli_stmt_bind_parem($stmt, 's', $_GET['userId']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$n = mysqli_num_rows($result);

for($i=0;$i<$n;$i++){
    $row = mysqli_fetch_assoc($result);
    echo <<<CREATE
    <div id="post">
    <p id="postTitle">{$row['title']}</p><br>
    {$row['created']}<br>
    {$row['content']}<br>
    <img src="{$row['image']}"/>
    </div>
    <br>
    CREATE;

}
require_once 'footer.php';
?>