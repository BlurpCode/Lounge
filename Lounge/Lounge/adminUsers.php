<?php
require_once 'header.php';
require_once 'logout.php';
echo <<<CREATE
<html>
    <head>
        <title>Admin - Users</title>
    </head>
    <body>
        <form><button name="logout"> Log Out</button></form>
CREATE;

require_once 'connection.php';
$query = "SELECT * FROM users ORDER BY uid ASC";
$result = mysqli_query($connection,$query);
$n = mysqli_num_rows($result);
echo '<table class="table-bordered"><thead><tr><th>User ID</th><th>username</th><th>Name</th><th>email</th><th>phone</th><th>Admin Controls</th></tr></thead><tbody>';
for($i=0;$i<$n;$i++){
    $row = mysqli_fetch_assoc($result);
    echo <<<CREATE
        <tr>
            <td>{$row["uid"]}</td>
            <td>{$row["username"]}</td>
            <td>{$row["firstname"]}{$row["lastname"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["phone"]}</td>
            <td><div class="btn-group">
            <form method="POST" action="updateUser.php"><button type=submit name="user" value="'{$row['uid']}'" class="btn btn-primary">Update</button>
            </form>
            <form method="POST" action="deleteUser.php"><button type=submit name="user" value="'{$row['uid']}'" class="btn btn-danger">Delete</button></form>
            <form method="POST" action="nationalize.php"><button type=submit name="user" value="'{$row['uid']}'" class="btn btn-info">Nationalise</button></form>           
        </div></td>
        </tr>
    CREATE;
}
echo '</tbody></table></body></html>';
require_once 'footer.php';
?>