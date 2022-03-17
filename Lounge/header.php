<?php
require_once 'cookies/usernameCookie.php';
require_once 'sessions/userSession.php';
echo '
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/dark-mode.css"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-light navbar-light justify-content-center">
            <!--Main Header-->
            <ul id="header" class="navbar-nav">
                <li class="navbar-brand"><h2 id="boardTitle">Lounge</h2></li>
                <!--Navigation Bar-->
                <li class="nav-item" id="index"><a class="nav-link" href="index.php">Posts</a></li>
                <li class="nav-item" id="guidelines"><a class="nav-link" href="guidelines.php">Community Guidelines</a></li>
                <li class="nav-item" id="login"><a class="nav-link" href="loginPage.php">Login</a></li>
                <li class="nav-item" id="register"><a class="nav-link" href="registerPage.php">Register</a></li>
                <li class="nav-item" id="settings"><a class="nav-link" href="settings.php">Settings</a></li>
                <li class="nav-item" id="profile"><a class="nav-link" href="profile.php" id="profilePage">Profile</a></li>
                <li class="nav-item dropdown" id="admin">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Admin
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="adminPosts.php">Posts</a>
                        <a class="dropdown-item" href="adminUsers.php">Users</a>
                    </div>
                </li>';
                
                if($showName == true){
                    echo '<li class="nav-item"><p class="navbar-text" id="lblUser">'.$username.'</p></li>';
                }

                echo '
                <li class="nav-item"><div class="navbar-text pl-1" id="lblTime"></div></li>
                <li>    <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="darkSwitch" />
                <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
              </div>
              <script src="js/dark-mode-switch.min.js"></script></li>
            </ul>
        </nav>
        <script>
            $("#profile").hide();
            $("#admin").hide();
        </script>
    </body>
';

if($loggedIn == true){
    echo '
    <script>
        $("#login").hide();
        $("#register").hide();
        $("#profile").show();
    </script>';
}

elseif($adminLoggedIn){
    echo '
    <script>
        $("#login").hide();
        $("#register").hide();
        $("#admin").show();
    </script>';
}
?>