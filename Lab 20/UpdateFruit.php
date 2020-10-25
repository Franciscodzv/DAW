<?php

    require_once  "util.php"; 

    $_POST["fruitName"] = htmlspecialchars($_POST["fruitName"]); 

    $_POST["fruitUnits"] = htmlspecialchars($_POST["fruitUnits"]); 

    $_POST["fruitQuantity"] = htmlspecialchars($_POST["fruitQuantity"]); 

    $_POST["fruitPrice"] = htmlspecialchars($_POST["fruitPrice"]); 

    $_POST["fruitCountry"] = htmlspecialchars($_POST["fruitCountry"]); 

    $name = $_POST["fruitName"]; 
    $units = $_POST["fruitUnits"]; 
    $quantity = $_POST["fruitQuantity"]; 
    $price = $_POST["fruitPrice"]; 
    $country = $_POST["fruitCountry"];

    if(isset($_POST["fruitName"]) && !empty($_POST["fruitName"]) && isset($_POST["fruitQuantity"]) && !empty($_POST["fruitQuantity"]) && isset($_POST["fruitPrice"]) && !empty($_POST["fruitPrice"]) && isset($_POST["fruitCountry"]) && !empty($_POST["fruitCountry"]) && ctype_alpha($name) && ctype_alpha($country) && is_numeric($units) && is_numeric($price) && is_numeric($quantity))
    {
       
        update_by_name($name, $units, $quantity, $price, $country); 
        refresh(); 

    } 
    else{
        echo '<script>alert("Please fill out all fields!");</script>';
    }


    


?>