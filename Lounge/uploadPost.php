<?php
require_once 'connection.php';
require_once 'header.php';
$title = mysqli_real_escape_string($connection,$_POST["title"]);
$content = mysqli_real_escape_string($connection,$_POST["content"]);
$date = date('Y-m-d H:i:s');
$imageName = "NULL";
$imageFile = $_FILES["imageFile"];
if($imageFile["name"]!=NULL){
    uploadImage($imageFile);
    $imageName = "img/".$imageFile["name"];
}

$query = "INSERT INTO posts(title,content,image,created) VALUES('$title','$content','$imageName','$date')";

if(mysqli_query($connection, $query)){
    echo 'Post Successfully Uploaded!';
    header("refresh:3;url=index.php");
}
else{
    echo 'Could not upload post. Please try again later.';
    header("refresh:3;url=index.php");
}

//checks that the file that the user uploaded is an image file
function uploadImage($imageFile){
    $targetFolder = "img/";
    $targetFile = $targetFolder.basename($imageFile["name"]);
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    else{
        move_uploaded_file($imageFile["tmp_name"], $targetFile);
    }
    mysqli_close($connection);
}
?>