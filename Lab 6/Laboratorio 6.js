//Laboratorio 6

let input = document.getElementById("docum");

// When the user clicks on the password field, show the message box
input.onfocus = function() 
{
    document.getElementById("help").style.display = "block";
}


// When the user clicks outside of the password field, hide the message box
input.onblur = function()
{
    document.getElementById("help").style.display = "none";
}

