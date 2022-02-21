//Validates the Login form
var username = document.getElementById("tbUsername").value;
var password = document.getElementById("tbPassword").value;

function validateForm(){
    if(username ==null){
        document.getElementById("lblUsernameError").innerHTML = "Username Field Required";


    }
    if(password==null){
        document.getElementById("lblPasswordError").innerHTML = "Password Field Required";
    }
}