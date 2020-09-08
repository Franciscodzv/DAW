

<?php

include("_header.html");


	
function promedio(array $nums)
{
	
	$sum = array_sum($nums); 
	$count = count($nums);

	return round($sum/$count,4);
}

$maxValues = rand(10,20); 

$numeros = array($maxValues);

for($i=0; $i<$maxValues; $i++)
{
	$numeros[$i] = rand(1,50);
}



	
function mediana(array $nums)
{
	sort($nums);
	$j=count($nums);

	if($j%2 == 0)
	{
		return ($nums[$j/2] + $nums[$j/2 - 1])/2;
	}
	else
	{
		return ($nums[floor($j/2)]);
	}

}

function lista(array $nums)
{
	//.= es para concatenar strings

	$lista = "Arreglo: ".implode(", ",$nums);
	$lista.= "<ul>";
	$lista.= "<br><li>Promedio: ".promedio($nums)."</li>"; 
	$lista.= "<br><li>Mediana: ".mediana($nums)."</li>";
	sort($nums); 
	$lista.= "<br><li>Menor a mayor: ".implode(", ",$nums)."</li>";
	rsort($nums); 
	$lista.= "<br><li>Mayor a menor: ".implode(", ",$nums)."</li>";
	$lista.="</ul>";

	return $lista;

}

function cuadrados(array $nums)
{
	$cuadradosTabla = "";
	sort($nums);  
	$maxValues = count($nums); 

	$cuadradosTabla.="<table>";
	for($i=0; $i<$maxValues; $i++)
	{
		 $cuadradosTabla.="<tr>";
		 $cuadradosTabla.="<td>";
		 $cuadradosTabla.=pow($nums[$i], 2);
		 $cuadradosTabla.="<td>";
		 $cuadradosTabla.="</tr>"; 
		
	}
	$cuadradosTabla.="</table>"; 

	return $cuadradosTabla;
	

}

function cubos(array $nums)
{
	$cubosTabla = ""; 
	sort($nums); 
	$maxValues = count($nums); 
	$cubosTabla .= "<table>"; 
	for($i=0; $i<$maxValues; $i++)
	{	

		$cubosTabla.= "<tr>"; 
		$cubosTabla.="<td>";
		$cubosTabla.=pow($nums[$i],3);
		$cubosTabla.="</td>";
		$cubosTabla.="</tr>"; 
	}
	$cubosTabla .= "</table>"; 

	return $cubosTabla; 
}


function tabla(array $nums)
{
	sort($nums); 
	$tabla = "Números: ".implode(", ",$nums); 
	$tabla.= "<table>";

	$tabla.= "<thead>";
	$tabla.= "<tr>";
	$tabla.= "<th>Cuadrados:</th>";
	$tabla.= "<th>Cubos: </th>"; 
	$tabla.= "</tr>";
	$tabla.= "</thead>";

	$tabla.= "<tbody>";
	$tabla.= "<tr>"; 
	$tabla.= "<td> ".cuadrados($nums)."</td>"; 
	$tabla.= "<td>".cubos($nums)."</td>"; 
	$tabla.= "</tr>"; 
	$tabla.="</table>";

	return $tabla; 

} 

function invert($num,$name)
{
	$reverseNumber = strrev($num);
	$reverseName = strrev($name); 

	$reversedItems = [$reverseNumber, $reverseName];

	$tabla =""; 
	$tabla.= "<table>";
	for($i=0; $i<2; $i++)
	{
		$tabla.="<tr>"; 
		$tabla.="<td>".$reversedItems[$i]."<td>"; 
	}
	$tabla.="</table>"; 

	return $tabla; 


	
	
	
}

?>

<div class="alert alert-primary"><?= lista($numeros) ?></div>

<div class="alert alert-success" ><?= tabla($numeros) ?></div>

<div class="alert alert-danger">
	<h2>Ejercicio Personal</h2>
	<form class="form-group" action="lab9.php" method="post" >
		Número que quieres invertir: <input type="text" name="num" placeholder="0">
		Palabra que quieres invertir: <input type="text" name="nombre" placeholder="...">
		<input class="btn btn-success" type="submit">
	</form>
	
	<?php 
	
		$num = null; 
		$name = null;
		 
		if(isset($_POST["num"]) && isset($_POST["nombre"]))
		{
			if(is_numeric($_POST["num"]) && ctype_alpha($_POST["nombre"]))
			{
				$num=($_POST["num"]); 
				$name=($_POST["nombre"]); 
			}
			else if(empty($_POST["num"]) || empty($_POST["nombre"]))
			{
				echo "Porfavor llena ambos campos.";
			}
			else if(!is_numeric($_POST["num"]) || !ctype_alpha($_POST["nombre"]))
			{
				echo "En el campo de la izquiera solo acepta números!", "<br>"; 
				echo "El campo de la derecha solo acepta letras!"; 
				
			}
					
		}
		
		else
		{
			$num = null; 
			$name =null; 
		}


	?>

	<?=invert($num,$name); ?>
</div>


<?php include("_footer.html"); ?>

