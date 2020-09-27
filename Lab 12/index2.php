<?php

    session_start(); 
    include("main2.html"); 

    if(isset($_SESSION["fname"]) && isset($_SESSION["lname"]))
    {
        echo "<h3> Tu nombre es: ".$_SESSION['fname']." ".$_SESSION['lname']."<h3>"."<br/>"; 
    }
    else{
        
        echo "<h3>"."Please enter your information so it can be displayed"."<h3/>"; 
         
    }

    

    if(isset($_SESSION["img"]))
    {
        echo "The image you uploaded:"."<br/>"; 
        echo '<br><img class="img-thumbnail" src="'.$_SESSION["img"].'">'; 
        

    }
    else{
        echo "<br/>"."<br/>"."No image to display"; 
    }
   

    session_unset(); 
    session_destroy(); 


?>