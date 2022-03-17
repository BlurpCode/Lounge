<?php
require_once 'header.php';
require_once 'logout.php';
echo <<<CREATE
<html>
    <head>
        <title>Admin - Posts</title>
    </head>
    <body>
        <form><button name="logout"> Log Out</button></form>
    </body>
</html>
CREATE;

require_once 'connection.php';
$query = "SELECT * FROM posts LEFT OUTER JOIN users ON posts.uid = users.uid ORDER BY postid ASC";
$result = mysqli_query($connection,$query);
$n = mysqli_num_rows($result);
echo '<table class="table-bordered"><thead><tr><th>Post ID</th><th>Title</th><th>Content</th><th>Username</th><th>Admin Controls</th></tr></thead><tbody>';
for($i=0;$i<$n;$i++){
    $row = mysqli_fetch_assoc($result);
    echo <<<CREATE
        <tr>
            <td>{$row["postid"]}</td>
            <td>{$row["title"]}</td>
            <td>{$row["content"]}</td>
            <td>{$row["username"]}</td>
            <td><div class="btn-group">
            <form method="POST" action="updatePost.php"><button type=submit name="post" value="'{$row['postid']}'" class="btn btn-primary">Update</button></form>
            <form method="POST" action="deletePost.php"><button type=submit name="post" value="'{$row['postid']}'" class="btn btn-danger">Delete</button></form>           
        </div></td>
        </tr>
    CREATE;
    
}
echo '</tbody></table>';

require_once 'footer.php';
?>