
let password = document.getElementById("psw"); 
let checkPassword = document.getElementById("checkpsw"); 
let submit = document.getElementById("submit"); 
let validar = document.getElementById("valid"); 
let pass = null; 
let errorSpan = document.getElementById("error"); 
let span = document.getElementById("correct"); 
let match = document.getElementById("match"); 
let noMatch = document.getElementById("noMatch"); 


function ValidPassword(p)
{
	let caps = /[A-Z]/,
		nums = /[0-9]/,
		symbols = /[!-/:-@[-`{-~]/,
		reject = /[^!-~]/;

	if(reject.test(p))
	{
		throw "Tu password tiene caracteres no válidos";
	}
	if(p.length < 7 )
	{
		throw "Tu password debe tener almenos 8 caracteres";
	}
	if(!nums.test(p))
	{
		throw "Tu password necesita al menos un número";
	}
	if(!caps.test(p))
	{
		throw "Tu password necesita almenos una mayúscula";
	}
	if(!symbols.test(p))
	{
		throw "Tu password necesita al menos un símbolo";
	}
	return true; 
	

}

validar.addEventListener("click", function(){

	pass = password.value;  

	try
	{
		ValidPassword(pass); 
		span.innerText = "✔" + "\nPassword válido"; 
		errorSpan.innerText = ""; 
		checkPassword.disabled = false; 
		submit.disabled = false; 
	} 
	catch(e)
	{
		checkPassword.disabled = true; 
		span.innerText = ""; 
		errorSpan.innerText = "❌" + "\n" + e; 
		return e; 

	}

}); 

submit.addEventListener("click",function(){

	pass = password.value; 
	console.log("pass: " + pass); 
	if(checkPassword.value == pass)
	{
		match.innerText = "✔" + "\nLos passwords son iguales."
		noMatch.innerText = ""; 
	}
	else
	{
		noMatch.innerText = "❌" + "\nLos passwords NO son iguales"; 
		match.innerText = ""; 

	}


})

/*******************************************************************************************/

let Nswitch = 299; 
let alienware = 1999; 
let PC = 3000; 

let numberSwitch = document.getElementById("switch");
let spanSwitch = document.getElementById("buySwitch"); 

spanSwitch.innerText = "$" + Nswitch; 



