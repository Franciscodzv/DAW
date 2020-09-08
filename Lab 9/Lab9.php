

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
	

	return $tabla; 

} 

?>

<div class="alert alert-primary"><?= lista($numeros) ?></div>

<div  class="table table-borderless table-dark"><?= tabla($numeros) ?></div>



<?php include("_footer.html"); ?>

