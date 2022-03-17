<?php
require_once 'header.php';
echo <<<CREATE
<!-- Can be accessed through the following URL: http://localhost/Lounge/index.php -->
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
    <br/>
        <!--Form to post new content-->
        <form id="postForm" method="post" enctype="multipart/form-data" class="container bg-light" action="uploadPost.php">
            <h2>Create Post</h2>
            <input type="text" class="form-control" placeholder="Title" class="tbForm" name="title" id="title" required/>
            <br/>
            <textarea id="taPost" class="form-control" class="tbForm" placeholder="Edit Text" name="content" id="content" required></textarea>
            <br/>
            <input type="file" name="imageFile" id="imageFile" class="form-control-file">
            <input type="submit" class="btn btn-primary" id="submit"/>
        </form>
        <br/>
        <div class="container" action="#">
        <form method="post">
            <select id="viewPosts" name="viewPosts">
                <option>Most recent</option>
                <option>Least recent</option>
            </select>
            <input type="submit"/>
        </form>
        <br/>       
    </body>
</html>
CREATE;

require_once "connection.php";
$order = "DESC";
//get value of viewPosts
if(isset($_POST['viewPosts'])){
    $view = $_POST["viewPosts"];
    //if viewPosts = Most recent, order = "DESC"
    if($view=="Most recent"){
        $order = "DESC";
    }
    elseif($view=="Least recent"){
        $order="ASC";
    }
}
//if viewPosts = Least recent, order="ASC"
$query = "SELECT * FROM posts LEFT OUTER JOIN users ON posts.uid = users.uid ORDER BY created $order";
$result = mysqli_query($connection,$query);
$n = mysqli_num_rows($result);

//Show all posts
for($i=0;$i<$n;$i++){
    $row = mysqli_fetch_assoc($result);
    echo "<div id=\"post\" class=\"card img-fluid\">";

    if(isset($row['image']) and $row['image']!="NULL"){
        echo "<img src=\"{$row['image']}\" class=\"card-img-top\"/>";
    }
    echo "
            <div class=\"card-body\">
            <h3>{$row['title']}</h3>
        ";

    if($row["uid"]!=NULL){
        echo "{$row['firstname']} {$row['lastname']}<br>";
    }
    else{
        echo 'Anonymous <br>';
    }
    echo "
        {$row['created']}<br>
        {$row['content']}<br>
    </div>
    </div>
    <br>";
}
echo'</div>';
require_once 'footer.php';
?>