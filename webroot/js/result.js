$(document).ready(function() {


var statusNumber = document.getElementById("orderStatus").innerHTML;

if(statusNumber != undefined && statusNumber != "")
{
    if(statusNumber == "0")
    {
        document.getElementById("status").innerHTML = "Approved";
    }
    if(statusNumber == "1")
    {
        document.getElementById("status").innerHTML = "Completed";
    }
}
})