<?php

include_once ("util.php"); 

$idZombie = htmlspecialchars($_POST["IdZombie"]); 
$nombreZombie = htmlspecialchars($_POST["nombreZombie"]); 

if(sqlqry("INSERT INTO Zombies (IdZombie, NombreZombie) VALUES (\"". $idZombie . "\",\"" . $nombreZombie . "\")"))
{
    echo "Zombie added!"; 
}
else
{
    echo "Error zombie not created"; 
}

?>