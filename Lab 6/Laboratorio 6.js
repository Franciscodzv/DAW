//Lab6 

let fname = document.getElementById("fname");
let tel = document.getElementById("tel");

let fnameMessage = document.getElementById("fnameMessage"); 
let telMessage =document.getElementById("telMessage");

let spanNameC = document.getElementById("spanNameC"); 
let spanNameE = document.getElementById("spanNameE");

let telC = document.getElementById("telC"); 
let telE = document.getElementById("telE");

let submit = document.getElementById("submit");

fnameMessage.style.display = "none";

fname.onfocus = function(){
	fnameMessage.style.display = "block"; 
}

fname.onblur = function(){
	fnameMessage.style.display = "none";
}

telMessage.style.display = "none";

tel.onfocus = function(){
	telMessage.style.display = "block";
}

tel.onblur = function(){
	telMessage.style.display = "none";
}

let nums = /[0-9]/,
	symbols = /[!-/:-@[-`{-~]/;
	
		
function validName(name)
{
	if(nums.test(name) || symbols.test(name))
	{
		throw "Tu nombre no puede contener números ni símbolos!!"
	}
	if(name.length == 0)
	{
		throw "Porfavor introduce tu nombre!!"
	}
	return true

}

function validNumber(number)
{
	if(isNaN(number))
	{
		throw "Tu número no puede contener letras ni símbolos!!"
	}
	if(number.length == 0)
	{
		throw "Porfavor introduce tu número de teléfono!!"
	}
	if(number.length != 10)
	{
		throw "Porfavor introduce un número de teléfono válido!!"
	}
	
	return true;
}

function checarCampos()
{
	try
	{
		validName(fname.value); 
		spanNameC.innerText = "✔";
		spanNameE.innerText = ""; 

	}
	catch(e)
	{
		spanNameE.innerText = "❌ " + e;
		spanNameC.innerText = ""; 
	}

	try
	{
		validNumber(tel.value); 
		telC.innerText = "✔";
		telE.innerText = ""; 
	}
	catch(e)
	{
		telE.innerText = "❌ " + e;
		telC.innerText = ""; 
	}
}

submit.addEventListener("click",checarCampos); 


/***************************************************************************************************/

let clock = document.getElementById("clock"); 
let min = document.getElementById("min");
let hr = document.getElementById("hr");

let timeClick = document.getElementById("time"); 
let stopTime = document.getElementById("stop");

let secs = 0;
let mins = 0;
let hours = 0;

let timer = setInterval(myTimer, 1000) //setInterval recibe una funcion y un intervalo de tiempo en milisegundos

function myTimer()
{


	
	secs++; 
	

	if(secs == 60)
	{
		mins++;
		secs=0;
	}

	if(mins == 60)
	{
		hours++;
		mins=0;
	}
	clock.innerHTML = "Segundos:  " + secs;
	min.innerHTML = "Minutos: " + mins;
	hr.innerHTML = "Horas: " + hours;

	timeClick.disabled=true



}

function stopTimer()
{
	clearInterval(timer);
}

timeClick.addEventListener("click",myTimer);


stopTime.addEventListener("click",stopTimer);

/*******************************************************************************************/

let wait = document.getElementById("wait");

function waitOnClick()
{
	setTimeout(function(){alert("Invertiste 3 segundos de tu vida solo para ver este mensaje...");},3000);
}

wait.addEventListener("click",waitOnClick);

/***********************************************************************************************************/


function allowDrop(ev)
{
	ev.preventDefault(); 
}

function drag(ev)
{
	ev.dataTransfer.setData("text",ev.target.id);
}

function drop(ev)
{
	ev.preventDefault(); 
	let data = ev.dataTransfer.getData("text"); 
	ev.target.appendChild(document.getElementById(data));
}





