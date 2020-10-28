<?php 

    require_once ('util.php'); 

    $_POST["idZombie"] = htmlspecialchars($_POST["idZombie"]); 

    $_POST["nombre"] = htmlspecialchars($_POST["nombre"]); 

    $idZombie = $_POST["idZombie"]; 
    $nombreZombie = $_POST["nombre"]; 


    

    if(isset($_POST["idZombie"]) && !empty($_POST["idZombie"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"]))
    {
       
        addZombie($idZombie,$nombreZombie);

    }    
     else
     {
        echo '<script>alert("Please fill out all fields!");</script>';
        //refresh(); 
     }

?>