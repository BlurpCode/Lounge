function validate(){
    //gather variables
    let pass = document.getElementById("password").value;
    let confirmPass = document.getElementById("confirmPassword").value;
    let email = document.getElementById("email").value;
    let confirmEmail = document.getElementById("confirmEmail").value;

    //call functions
    const validatePass = comparePassword(pass,confirmPass);
    const validateEmail = compareEmail(email,confirmEmail);

    if((validatePass == true)&&(validateEmail==true)){
        return true;
    }
    else{
        displayError(validatePass, validateEmail);
        return false;
    }
}

//checks if the password and confirm password fields match
function comparePassword(pass,cPass){
    if(pass==cPass){
        return true;
    }
    else{
        return false;
    }
}

//checks if the email and confirm email fields match
function compareEmail(email, cEmail){
    if(email==cEmail){
        return true;
    }
    else{
        return false;
    }
}

//displays the error to the user
function displayError(password,email){
    if(password==false){
        alert("Passwords do not match");
    }
    if(email==false){
        alert("emails do not match");
    }
}