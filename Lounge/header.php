<?php
echo '<!--Main Header-->
<ul id="header">
    <!--Replace with a image-->
    <li><h2 id="boardTitle">Lounge</h2></li>
    <!--Displays the current time; currently contains a placeholder-->
    <li class="headerInfo"><p id="lblTime"></p></li>
    <li class="headerInfo"><p id="lblUser">User</p></li>
</ul>
<!--Navigation Bar-->
<ul>
    <li><a href="index.php">Posts</a></li>
    <li><a href="guidelines.php">Community Guidelines</a></li>
    <li><a href="loginPage.php">Login</a></li>
    <li><a href="registerPage.php">Register</a></li>
    <li><a href="settings.php">Settings</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li hidden><a href="admin.php">Admin</a></li>
</ul> ';
?>