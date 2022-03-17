<?php
require_once 'header.php';
echo <<<CREATE
<html>
    <head>
        <title>Register</title>
    </head>
    <body class="container">
        <!--Registration Form-->
        <form method="POST" onsubmit="return validate()" action="registerSuccess.php" class="container">
            <h2>Register with us</h2>
            <input type="text" id="firstName" class="form-control" name="firstName" placeholder="First Name" required/>
            <br/>
            <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Last Name" required/>
            <br/>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username" required/> <span></span>
            <br/>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required/>
            <br/>
            <!--Confirm password element must match the password element, otherwise return an error-->
            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required/>
            <br/>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required/>
            <br/>
            <!--Confirm email element must match the email element, otherwise return an error-->
            <input type="email" id="confirmEmail" class="form-control" placeholder="Confirm Email" required/>
            <br/>
            <input type="text" id="number" class="form-control" name="number" placeholder="Phone Number" required/>
            <br/>
            <input type="text" id="age" class="form-control" name="age" placeholder="Age" required/>
            <br/>
            <input type="text" id="country" class="form-control" name="country" placeholder="Country" required/>
            <br/>
            <input type="text" id="county" class="form-control" name="county" placeholder="County" required/>
            <br/>
            <input type="text" id="city" class="form-control" name="city" placeholder="City" required/>
            <br/>
            <input type="submit" class="btn btn-primary float-right" id="submit"/>
        </form>
        <script type="text/javascript" src="js/validateRegister.js"></script>
    </body>
    <script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var username = $("#username").val();
            var password = $("#password").val();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var email = $("#email").val();
            var age = $("#age").val();
            var phone = $("#phone").val();
            var city = $("#city").val();
            var county = $("#county").val();
            var country = $("#country").val();

            $.ajax({
                url:'registerSuccess.php',
                type:'post',
                data:{
                    username:username,
                    password:password,
                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    age: age,
                    phone:phone,
                    city: city,
                    county: county,
                    country: country
                },
                success:function(result){
                    var msg = "";
                    if(result == 1){
                        $("#profile").show();
                        $("#register").hide();
                        $("#login").hide();
                        window.location.replace("profile.php"); 
                    }else{
                        $('#errorMessage').append("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+result+"</div>");
                    }
                }
            });
        })
    });
    </script>
</html>
CREATE;
require_once 'footer.php';
?>