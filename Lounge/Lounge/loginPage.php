<?php
require_once 'header.php';
echo <<<CREATE
    <head>
        <title>Login</title>
        <script>
        $(document).ready(function(){
            $("#submit").click(function(){
                var username = $("#tbUsername").val();
                var password = $("#tbPassword").val();

                if(username!="" && password!=""){
                    $.ajax({
                        url:'loginSuccess.php',
                        type:'post',
                        data:{
                            username:username,
                            password:password
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                }
            })
        });
    </script>
    </head>
    <body class="container">
        <!--Login Form-->
        <form class="container" action="loginSuccess.php" method="post">
            <h2>Login to your account</h2>
            <input type="text" id="tbUsername" name="username" class="form-control" placeholder="Username" required/>
            <br/>
            <input type="password" id="tbPassword" name="password" class="form-control" placeholder="Password" required/>
            <br/>
            <input type="submit" id="form-submit-button" id="submit" class="btn btn-primary float-right"/>
        </form>
        <div id="errorMessage"></div>
    </body>
</html>
CREATE;
require_once 'footer.php';
?>