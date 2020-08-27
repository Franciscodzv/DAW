
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

}) 

submit.addEventListener("click",function(){

	pass = password.value; 
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

/***************************************************************************************************/

let submitInfo = document.getElementById("submitInfo"); 

let fname = document.getElementById("fname"); 
let firstName = null; 
let spanNameC = document.getElementById("nameC"); 
let spanNameE = document.getElementById("nameE"); 

let lname = document.getElementById("lname"); 
let lastName = null; 
let spanLNameC = document.getElementById("lnameC"); 
let spanLNameE = document.getElementById("lnameE"); 

let fnumber = document.getElementById("phone"); 
let spanPhoneC = document.getElementById("spanPhoneC"); 
let spanPhoneE = document.getElementById("spanPhoneE"); 
let number = null; 

let fzip = document.getElementById("zip"); 
let zip = null; 
let spanZipC = document.getElementById("zipC"); 
let spanZipE = document.getElementById("zipE"); 

let fmale = document.getElementById("male"); 
let ffemale = document.getElementById("female"); 
let fgender = document.getElementById("otherg"); 
let spanGenderE = document.getElementById("genderE"); 
let spanGenderC = document.getElementById("genderC"); 

let fcountry = document.getElementById("country"); 
let spanCountryC = document.getElementById("countryC"); 
let spanCountryE = document.getElementById("countryE"); 
let country = null; 


function validName(name)
{
	let fnums = /[0-9]/,
		fsymbols = /[!-/:-@[-`{-~]/,
		lnums = /[0-9]/,
		lsymbols = /[!-/:-@[-`{-~]/; 
		

	if(fnums.test(name))
	{
		throw "Your name cannot contain numbers!"
	}
	if(fsymbols.test(name))
	{
		throw "Your name cannot contain symbols!"
	}
	if(name.length <= 0)
	{
		throw "Please enter your first name!"
	}

	return true; 
}

function validLastName(name2)
{
	let lnums = /[0-9]/,
		lsymbols = /[!-/:-@[-`{-~]/; 

	if(lnums.test(name2))
	{
		throw "Your last name cannot contain numbers!"
	}

	if(lsymbols.test(name2))
	{
		throw "Your last name cannot contain symbols!"
	}

	if(name2.length <= 0)
	{
		throw "Please enter your last name!"
	}

	return true; 

}

function validNumber(num)
{
	if(isNaN(num))
	{
		throw "Your phone number cannot contain letters or symbols!"
	}
	if(num.length <= 0)
	{
		throw "Please enter your phone number!"
	}
	if(num.length < 10)
	{
		throw "Please enter a valid phone number!"
	}
	return true; 
}

function validZip(z)
{
	if(isNaN(z))
	{
		throw "Your zip code cannot contain letters or symbols!"
	}
	if(z.length != 5 && z.length > 0)
	{
		throw "Please enter a valid zip code!"
	}
	if(z.length <= 0)
	{
		throw "Please enter your zip code!" 
	}
	return true; 

}

function genders (fmale,ffemale,fgender)
{
	if(fmale.checked==true && ffemale.checked==true || fmale.checked==true && fgender.checked==true || ffemale.checked==true && fgender.checked==true)
	{
		throw "Please only select one gender!"
	}
	if(fmale.checked==false && ffemale.checked==false && fgender.checked==false)
	{
		throw "Please select your gender!"
	}
	return true; 
}

function countries (c)
{
	if(c.length == 0)
	{
		throw "Please select your country of residence!"
	}
}

function checarCampos()
{
	firstName = fname.value; 
	lastName = lname.value; 
	number = fnumber.value; 
	zip = fzip.value; 
	country = fcountry.value; 


	try
	{
		validName(firstName); 
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
		validLastName(lastName); 
		spanLNameC.innerText = "✔"; 
		spanLNameE.innerText = ""; 
	}
	catch(e)
	{
		spanLNameE.innerText = "❌ " + e; 
		spanLNameC.innerText = ""; 
	}

	try
	{
		validNumber(number); 
		spanPhoneC.innerText = "✔"
		spanPhoneE.innerText = ""; 
	}
	catch(e)
	{
		spanPhoneE.innerText = "❌ " + e; 
		spanPhoneC.innerText = "";  
	}

	try
	{
		validZip(zip);   
		spanZipC.innerText = "✔"; 
		spanZipE.innerText = ""; 
	}
	catch(e)
	{
		spanZipE.innerText = "❌ " + e; 
		spanZipC.innerText = ""; 
	}

	try
	{
		genders(fmale,ffemale,fgender); 
		spanGenderE.innerText = ""
		spanGenderC.innerText = "✔"
	}
	catch(e)
	{
		spanGenderE.innerText = "❌ " + e
		spanGenderC.innerText = ""; 
	}

	try
	{
		countries(country); 
		spanCountryC.innerText = "✔"; 
		spanCountryE.innerText = ""; 

	}
	catch(e)
	{
		spanCountryE.innerText = "❌ " + e; 
		spanCountryC.innerText = ""; 
	}


}

submitInfo.addEventListener("click",checarCampos); //submit button action





