<?php
require_once 'header.php';
require_once 'logout.php';
echo <<<CREATE
<html>
    <head>
        <title>Posts</title>
        <script></script>
    </head>
    <body>
    </body>
</html>
CREATE;


require_once 'connection.php';
$query = "SELECT * FROM users WHERE uid = '$uid'";
$result = mysqli_query($connection, $query);
$n = mysqli_num_rows($result);
echo '<div class="container"><br/>';
for($i=0;$i<$n;$i++){
    $row = mysqli_fetch_assoc($result);
    echo <<<CREATE
    <div id="userProfile" class="row bg-light">
        <div class="col-sm-1.5">
            <img src="img/user.png" class="mr-3 mt-3 rounded-circle" style="width:100px;"/>
        </div>
        <div class="col-sm-10.5">
            <br>
            {$row['username']}<br>
            {$row['email']}<br>
            {$row['phone']}<br>
        </div>
    </div>
    <form><button name="logout" class="btn-primary float-right">Log Out</button></form>
    <br>
    <div class="card-columns">
    CREATE;
    

}

$postsQuery = "SELECT * FROM posts INNER JOIN users ON posts.uid = users.uid WHERE posts.uid = $uid";
$postsResult = mysqli_query($connection,$postsQuery);
$postsCount = mysqli_num_rows($postsResult);
if($postsCount>0){
    for($i=0;$i<$postsCount;$i++){
        $row = mysqli_fetch_assoc($postsResult);
        echo <<<CREATE
        <div id="post" class="card" style="width:20rem;">
            <img class="card-img-top img-fluid" src="{$row['image']}"/> <br>
            <div class="card-body">
                <h3 class="card-title">{$row['title']}</h3>
                <p class="card-subtitle">{$row['created']}<br></p>
                <p class="card-text">{$row['content']}<br>
                <div class="btn-group">
                    <form method="POST" action="updatePost.php"><button type=submit name="post" value="'{$row['postid']}'" class="btn btn-primary">Update</button></form>
                    <form method="POST" action="deletePost.php"><button type=submit name="post" value="'{$row['postid']}'" class="btn btn-danger">Delete</button></form>           
                </div>
            </div>
        </div>
        <br>
        CREATE;
    }
    echo '</div></div>';
}
else{
    echo 'No Posts Created Yet';
}
require_once 'footer.php';
?>