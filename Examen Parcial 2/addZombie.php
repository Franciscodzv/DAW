<?php 

    require_once ('util.php'); 


    $_POST["nombre"] = htmlspecialchars($_POST["nombre"]); 
    $nombreZombie = $_POST["nombre"]; 


    

    if(isset($_POST["nombre"]) && !empty($_POST["nombre"]))
    {
       
        addZombie($nombreZombie);

    }    
     else
     {
        echo '<script>alert("Please fill out all fields!");</script>';
        //refresh(); 
     }

?>