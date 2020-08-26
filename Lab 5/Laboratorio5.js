
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
let PC = 2999; 

let numberSwitch = document.getElementById("switch");
let spanSwitch = document.getElementById("buySwitch"); 
let switchLimit = document.getElementById("switchLimit"); 

let numberAlien = document.getElementById("alien"); 
let spanAlien = document.getElementById("buyAlien");
let alienLimit = document.getElementById("alienLimit");  


let numberPC = document.getElementById("pc"); 
let spanPC = document.getElementById("buyPC");
let PClimit = document.getElementById("PClimit");  

let buyButton = document.getElementById("buy"); 
let spanFinal = document.getElementById("final"); 

let Sprice = 0; 
let Aprice = 0; 
let Pprice = 0; 
let Fprice = 0; 
let items = 0; 
let tax = 0; 
let total = 0; 



numberSwitch.addEventListener("click",function(){

	Nswitch = 299;

	if(numberSwitch.value < 11)
	{
			Nswitch = Nswitch * numberSwitch.value ;
			spanSwitch.innerText = "$" + Nswitch + " usd"; 
			Sprice = Nswitch; 
			
	}

	if(numberSwitch.value >= 10)
	{
		switchLimit.innerText = "Solo puedes comprar un máximo de 10 Nintendo Switch!";
	}
})

numberAlien.addEventListener("click",function(){

	alienware = 1999; 

	if(numberAlien.value < 6 )
	{
		alienware = alienware * numberAlien.value;
		spanAlien.innerText = "$" + alienware + " usd";
		Aprice = alienware;  
	}

	if(numberAlien.value >= 5)
	{
		alienLimit.innerText = "Solo puedes comprar un máximo de 5 laptops!"; 
	}



})

numberPC.addEventListener("click",function(){

	PC = 2999; 

	if(numberPC.value < 3)
	{
		PC = PC * numberPC.value; 
		spanPC.innerText = "$" + PC + " usd"; 
		Pprice = PC; 
	}

	if(numberPC.value >= 2)
	{
		PClimit.innerText = "Solo puedes comprar un máximo de 2 PCs!"; 
	}
})

buyButton.addEventListener("click", function(){

	Fprice = Sprice + Aprice + Pprice; 
	tax = Fprice * 0.16; 
	items = numberSwitch.value + numberPC.value + numberAlien.value;
	total = Fprice + tax; 


	spanFinal.innerText = "\nTotal items: " + items + "  \nAmount due before taxes: $" + Fprice + "\nTax: $" + tax.toFixed(2) + "\nTOTAL: $" + total.toFixed(2); 

})





