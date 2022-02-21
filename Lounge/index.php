<?php
require_once 'header.php';
echo <<<CREATE
<!-- Can be accessed through the following URL: http://localhost/CommunityBoard -->
<html>
    <head>
        <title>Posts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/navbar.css"/>
        <link rel="stylesheet" href="css/form.css"/>
    </head>
    <body>
        <!--Form to post new content-->
        <form id="postForm" action="*">
            <h2>Create Post</h2>
            <input type="text" placeholder="Title" class="tbForm"/>
            <br/>
            <textarea id="taPost" class="tbForm" placeholder="Edit Text"></textarea>
            <br/>
            <!--When button is pressed, a popup is displayed-->
            <input type="button" value="Add Image"/>
            <input type="submit"/>
        </form>
        <!--Posts created using mysql and php go here-->
        <!--Cookie consent-->
        <div id="cookieconsent"></div>       
    </body>
</html>
CREATE;

require_once "connection.php";

$query = "SELECT * FROM posts";
$result = mysqli_query($connection,$query);
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