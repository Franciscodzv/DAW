<?php

    function connectDb()
    {
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "dbname"; 

        $con = mysqli_connect($servername, $username, $password, $dbname);
        
        //Check connection

        if(!$con)
        {
            die("Connection failed: " . mysqli_connect_error()); 
        }

        return $con; 
    }

    //La variable $mysql es una conexion establecida previamente
    
    function closeDb($mysql)
    {
        mysqli_close($mysql); 
    }

    function getFruits()
    {
        $conn =  connectDb(); 

        $sql = "SELECT name, units, quantity, price, country, FROM Fruit"; 

        $result = mysqli_query($conn,$sql); 

        closeDb($conn); 

        return $result; 


    }

    //Funcion que regresa los datos de una fruta que tenga en su nombre el parametro
    //Si pones manzana, puede regresar manzana roja, etc. 
    function getFruitsByName($fruit_name)
    {
        $conn = connectDb(); 

        $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE name LIKE '%" . $fruit_name."%'"; 

        $result = mysqli_query($conn, $sql); 

        closeDb($conn); 

        return $result; 
    }

    function getCheapestFruits($cheap_price)
    {
       $conn = connectDb(); 
       
       $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE price <= '".$cheap_price."'"; 

       $result = mysql_query($conn, $sql); 

       closeDb($conn); 

       return $result; 
    }

?>