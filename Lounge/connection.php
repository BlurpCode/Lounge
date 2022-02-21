<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'noticeboard';

$connection = mysqli_connect($host,$user,$password,$dbName);

if(!$connection){
    die("Connection Failed");
}
?>