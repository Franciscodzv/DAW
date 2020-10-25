<?php 

require_once "util.php"; 

$name = $_POST["fruitName"]; 

if(isset($_POST["fruitName"]) && !empty($_POST["fruitName"]))
{
    
    delete_by_name($name); 
    refresh(); 
    
    
}


?>