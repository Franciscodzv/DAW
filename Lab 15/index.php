<?php

    //llamada a la librearia de la base de datos
    require_once "util.php"; 
    include("main.html");
    
    $fruitNameError=""; 
    $name = "";
    $units = ""; 
    $quantity = ""; 
    $price = ""; 
    $country = ""; 
    $result = getFruits(); 

    function clean($entrada)
    {
        return $entrada = htmlspecialchars($entrada); 
    }

    function cleanArr($entradas)
    {
        foreach($entradas as &$variable)
        {
            $variable = clean($variable); 
        }
        return $entradas; 
    }

    $_POST = cleanArr($_POST); 

    if(mysqli_num_rows($result) > 0)
    {
        echo "<div class='alert-success'>"; 
        echo "<table class='table'>"; 
        echo "<thead class='thead-dark'";
        echo "<tr>"; 
        echo "<th scope='col'>Fruit</th>";
        echo "<th scope='col'>Units</th>"; 
        echo "<th scope='col'>Quantity</th>"; 
        echo "<th scope='col'>Price</th>"; 
        echo "<th scope='col'>Country</th>"; 
        echo "</tr>"; 
        echo "</thead>"; 
        echo "<tbody>"; 

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>"; 
            echo "<td>" . $row["Name"] . "</td>"; 
            echo "<td>" . $row["Units"] . "</td>"; 
            echo "<td>" . $row["Quantity"] . "</td>"; 
            echo "<td>" . "$" . $row["Price"] . "</td>"; 
            echo "<td>" . $row["Country"] . "</td>"; 
            echo "</tr>"; 
        }
        
        echo  "</tbody>"; 
        echo "</table>"; 
        echo "</div>"; 
        echo "</div>"; 


    }

        //funcion para insertar frutas 
        function insert_fruit()
        {
            $name = $_POST['fruitName']; 
            $units = $_POST['fruitUnits']; 
            $quantity = $_POST['fruitQuantity']; 
            $price = $_POST['fruitPrice']; 
            $country = $_POST['fruitCountry'];

            //validacion de datos validos del lado de servidores
            if(strlen($name) > 0 && strlen($units) > 0 && strlen($quantity) > 0 && strlen($price) > 0 && strlen($country) > 0)
            {
                if(is_numeric($quantity) && is_numeric($price))
                {
                    if(insertFruit($name, $units, $quantity, $price, $country))
                    {
                        
                    }
                    else
                    {
                        echo "\nERROR: Your fruit .'$name'. could not be inserted!"; 
                    }
                }
            }
         
        }

        

        /*if(delete_by_name($name))
        {
            echo "The fruit " . $name . " has been successfully deleted"; 
        }
        else{
            echo "ERROR: The fruit ". $name . "could not be deleted!"; 
        }*/

        if(isset($_POST["deleteFruit"]) && !empty($_POST["deleteFruit"]))
        {
            $name = $_POST["fruitName"]; 
            delete_by_name($name); 
            header('Location: '.$_SERVER['REQUEST_URI']);
            
        }

        if(isset($_POST["updateFruit"]) && !empty($_POST["updateFruit"]))
        {
            $name = $_POST['fruitName'];
            $country = $_POST['fruitCountry']; 
            $price = $_POST['fruitPrice'];
            $units = $_POST['fruitUnits'];  
            $quantity = $_POST['fruitQuantity']; 

            update_by_name($name, $units, $quantity, $price, $country); 
            header('Location: '.$_SERVER['REQUEST_URI']);
        }

        
        
        if(isset($_POST["fruitName"]) && !empty($_POST["fruitName"]) && isset($_POST["fruitUnits"]) && !empty($_POST["fruitUnits"]) && isset($_POST["fruitQuantity"]) && !empty($_POST["fruitQuantity"]) 
        && isset($_POST["fruitPrice"]) && !empty($_POST["fruitPrice"]) && isset($_POST["fruitCountry"]) && !empty($_POST["fruitCountry"]) && isset($_POST["insertFruit"]) && !empty($_POST["insertFruit"]))
        {
            $name = $_POST['fruitName'];
            $country = $_POST['fruitCountry']; 

    
            $price = $_POST['fruitPrice'];
            $units = $_POST['fruitUnits'];  
            $quantity = $_POST['fruitQuantity']; 

            if(ctype_alpha($name) && ctype_alpha($country) && is_numeric($quantity) && is_numeric($price) && is_numeric($units))
            {
                insertFruit($name, $units, $quantity, $price, $country); 
            }
            
            $fruitNameError = "";
            header('Location: '.$_SERVER['REQUEST_URI']);
            
        }
        


        

         

?>