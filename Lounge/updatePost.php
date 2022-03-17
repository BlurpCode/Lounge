<?php
require_once 'header.php';
require_once 'connection.php';
$currentPost = $_POST['post'];
echo <<<CREATE
<html>
<head>
    <title>Update Post</title>
    <script></script>
</head>
</html>
<body class="container">
CREATE;
if(isset($currentPost)){
    //Displays the post to be updated
    echo '<div class="alert alert-info" role="alert">You are updating this post! Please note that you can only change the title and content of your post!</div> <div class="row">';
    $postsQuery = "SELECT * FROM posts WHERE postid=$currentPost";
    $postsResult = mysqli_query($connection,$postsQuery);
    $postsCount = mysqli_num_rows($postsResult);
    for($i=0;$i<$postsCount;$i++){
        $row = mysqli_fetch_assoc($postsResult);
        echo <<<CREATE
        <div id="post" class="card col img-fluid" style="width:20rem;">
            <img class="card-img-top" src="{$row['image']}"/> <br>
            <div class="card-body">
                <h3 class="card-title">{$row['title']}</h3>
                <p class="card-subtitle">{$row['created']}</p><br>
                <p class="card-text">{$row['content']}</p><br> 
            </div>   
        </div>
        <br>
        CREATE;
    }
    echo <<<CREATE
        <form method="POST" class="container bg-light col" action="#">
        <h2>Update Post</h2>
        <input type="text" class="form-control" placeholder="Title" class="tbForm" name="newTitle" id="title" required/>
        <br/>
        <textarea id="taPost" class="form-control" class="tbForm" placeholder="Edit Text" name="newContent" id="content" required></textarea>
        <br/>
        <button type="submit" class="btn btn-primary float-right" id="submit" name="post" value="$currentPost">Submit</button>
        </form> 
    </div>
    </body>
    CREATE;
}
else{
    echo "No user data was received. Go back to try again.";
}

if(isset($_POST["newTitle"])){
    //update post
    $newTitle = mysqli_real_escape_string($connection,$_POST["newTitle"]);
    $newContent = mysqli_real_escape_string($connection,$_POST["newContent"]);

    $updateQuery = "UPDATE posts SET title='$newTitle', content='$newContent' WHERE postid = $currentPost";
    if(mysqli_query($connection,$updateQuery)){
        echo '<div class="alert alert-success" role="alert">Post updated Successfully</div> '; 
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Something went wrong! Please try again later!</div> ';
    }
}
?>