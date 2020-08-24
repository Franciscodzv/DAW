function cuadrados()
{
	let entrada1 = prompt("Ingresa un número","0"); 

	while(isNaN(entrada1))
	{
	entrada1 = prompt("Solo se aceptan números"); 
	}

	let table = ""; 
	table = table.concat("<table>");

	for(let i = 1; i<=entrada1; i++)
	{
		table = table.concat("<tr>");
		table = table.concat("<td>"+i+"</td>");
		table = table.concat("<td>"+i**2+"</td>");
		table = table.concat("<td>"+i**3+"</td>");
		table = table.concat("</tr>"); 
	} 
	table = table.concat("</table>");
	document.getElementById("ejercicio1").innerHTML = table; 
}

function suma()
{
	let valorMaximo = 100; 
	let numerosRandom = [Math.floor(Math.random() * valorMaximo), Math.floor(Math.random() * valorMaximo)]; 
	let startTime = new Date(); 
	let entrada2 = null; 
	entrada2 = prompt("Ingresa el resultado de la suma de los siguientes numeros: " + numerosRandom[0] + " + " + numerosRandom[1]); 
	let resultado = numerosRandom[0] + numerosRandom[1]; 



	while((isNaN(entrada2) || entrada2 != resultado) && entrada2 != null)
	{
	
		let error = ""; 

		if(isNaN(entrada2))
		{	
			error = "Porfavor Ingresa un valor numérico";
		}
		else
		{
			error = "Resultado incorrecto, intenta otra vez"; 
		}

		entrada2 = prompt(error + "\nIngresa el resultado de la suma de los siguientes numeros: " + numerosRandom[0] + " + " + numerosRandom[1]); 


	}

	if(entrada2 == resultado)
	{
		let tiempoFinal = (new Date() - startTime)/1000; //Esta en milisegundos entonces /1000

		alert("FELICIDADES sabes matemáticas básicas!! " + numerosRandom[0] + " + " + numerosRandom[1] + " = " + resultado + "\n Tardaste: " + tiempoFinal + " segundos"); 
	
	}
}

function contador()
{
	let size = 100; 
	let numerosContador = [size]; 
	let table2 = "";
	table2 = table2.concat("<table>");  

	for(let i=0; i<size; i++)
	{
		numerosContador[i] = Math.floor(Math.random() * 100) - Math.floor(Math.random() * 100); 
	}

	for(let i=0; i<size; i+=10)
	{
		table2 = table2.concat("<tr>"); 
		table2 = table2.concat("<td>" + numerosContador[i]   + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+1] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+2] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+3] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+4] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+5] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+6] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+7] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+8] + "</td>");
		table2 = table2.concat("<td>" + numerosContador[i+9] + "</td>");
		table2 = table2.concat("</tr>"); 

	}
	table2 = table2.concat("</table>"); 
	
	let contador0 = 0; 
	let contadorP = 0; 
	let contadorN = 0; 

	for(let i=0; i<100; i++)
	{
		if(numerosContador[i] > 0)
		{
			contadorP++; 
		}
		else if(numerosContador[i] < 0 )
		{
			contadorN++; 
		}
		else if(numerosContador[i] == 0)
		{
			contador0++; 
		}
	}

	document.getElementById("ejercicio3").innerHTML = table2.concat(" # de 0s en el arreglo: " + contador0 + " # de números positivos en el arreglo: " + contadorP + " # de números negativos en el arreglo: " + contadorN); 

}

function promedios()
{
	let sizeM = 5; 
	let matriz = [sizeM];
	let table3 = ""; 
	let promedioR = 0; 
	let resultado = 0; 

	table3 = table3.concat("<table>");  

	for(let i=0; i<sizeM; i++)
	{
		matriz[i] = new Array(sizeM); //se agrega la segunda dimension de la matriz
	}

	
	for(let i=0; i<sizeM; i++)
	{
		promedioR=0;  

		table3 = table3.concat("<tr>"); 
		for(let j=0; j<sizeM; j++)
		{

			matriz[i][j] = Math.floor(Math.random() * 100); 
			table3 = table3.concat("<td>" + matriz[i][j] + "</td>");
			promedioR += matriz[i][j]; 
			
		}
		

		resultado = promedioR/sizeM; 
		table3 = table3.concat("<td>" + "Promedio: "+ resultado + "</td>");
		table3 = table3.concat("</tr>"); 
	}

	table3 = table3.concat("</table>"); 



	document.getElementById("ejercicio4").innerHTML = table3.concat(); 

}

function inverso()
{
	let numInv = 0; 
	let num = null; 
	num = prompt("Ingresa un número para obtener su orden inverso:"); //se guarda el input 
	let table4 = ""; 

	while (isNaN(num))
	{
		num = prompt("Solo se aceptan números!!\n"); 
	}

	table4 = table4.concat("<table>"); 
	
	while(num > 0)
	{
		numInv = numInv*10 + num%10; //num%10 te da el ultimo digito de la secuencia.
		num = Math.floor(num/10); //quitas el utlimo numero que ya esta en el numero invertido. Tienes que hacer floor para que no se haga infinito.
	}
	table4 = table4.concat("</table4>"); 
	 

	let resultado = numInv; 
	document.getElementById("ejercicio5").innerHTML = table4.concat("Tu número invertido es: " + numInv);  
}

class Cajero
{
	constructor(saldoInicial)
	{
		this.saldo = saldoInicial;   //hace referencia al objeto actual
		this.decision = null; 
		this.decision2 = null; 
		this.nuevoSaldo = 0; 
	}

	retirar = function(retiro)
	{
		this.saldo -= retiro; 
		return this.saldo;

	}

	depositar = function(deposito)
	{
		this.saldo += parseInt(deposito); 
		return this.saldo; 
	}


}

atm = new Cajero(10000); 

function cajero()
{
	
 
	decision = prompt("Actualmente tienes $" + atm.saldo + " pesos.\nRetirar = 1 \nDepositar = 2\nSalir = 0"); 

	table5 = ""; 

	while(isNaN(decision) || decision != 1 && decision!= 0 && decision!=2)
	{
		decision = prompt("Porfavor utiliza las opciones en pantalla.\nRetirar = 1 \nDepositar = 2\nSalir = 0"); 
	}

	while(decision == 1)
	{
		decision2 = prompt("Cuanto dinero deseas retirar? Saldo: $" + atm.saldo); 

		while(isNaN(decision2))
		{
			decision2 = prompt("Porfavor introduce una cantidad válida."); 
		}

		while(decision2 > atm.saldo)
		{
			decision2 = prompt("No cuentas con suficiente saldo.\n Cuanto dinero deseas retirar? Saldo: $" + atm.saldo); 
		}

		atm.retirar(decision2);  

		decision = prompt("Deseas hacer otra transacción?\nRetirar = 1 \nDepositar = 2\nSalir = 0"); 
	}

	while(decision == 2)
	{
		decision2 = prompt("Cuanto dinero deseas depositar? Saldo: $" + atm.saldo); 

		while(isNaN(decision2))
		{
			decision2 = prompt("Porfavor introduce una cantidad válida."); 
		}

		atm.depositar(decision2); 
		decision = prompt("Deseas hacer otra transacción?\nRetirar = 1 \nDepositar = 2\nSalir = 0");
	}

	if (decision == 0)
	{
		document.getElementById("ejercicio6").innerHTML = table5.concat("Gracias por utilizar cajeros FADV!! Saldo restante: $" + atm.saldo); 
	}

}






















