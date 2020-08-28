//Laboratorio 6

let input = document.getElementById("question");
let checkHelp = document.getElementById("checkID"); 
let spanHelp = document.getElementById("help"); 

let numeroRandom = Math.floor(Math.random() * 10); 
let submit = document.getElementById("button"); 

let spanCorrect = document.getElementById("spanCorrect"); 
let spanError = document.getElementById("spanError"); 


if(checkHelp.checked == true)
{
	spanHelp.innerText = "El número que estoy pensando es: " + numeroRandom; 
}
else if(checkHelp.checked == false)
{
	spanHelp.innerText = ""; 
}

function checar()
{
	if(input.value == numeroRandom)
		{
			spanCorrect.innerText = "✔";
		}
	if(input.value == numeroRandom)
		{
			spanError.innerText = "❌";
		}
}


button.addEventListener("click",checar);


