
function displayTime(){
    var today = new Date();
    var newToday = today.toUTCString();
    document.getElementById('lblTime').innerHTML = newToday;
    setTimeout(displayTime,1000);
}

setTimeout(displayTime,1000);