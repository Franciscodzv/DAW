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
        $conn = connectDb();
        $sql = "SELECT Name,Units,Quantity, Price, Country FROM Fruit";
        $result = mysqli_query($conn, $sql);

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

       $result = mysqli_query($conn, $sql); 

       closeDb($conn); 

       return $result; 
    }

    function insertFruit($name, $units, $quantity, $price, $country)
    {
        
        $conn = connectDb(); 

        $sql = "INSERT INTO Fruit (name, units, quantity, price, country) VALUES (\"". $name . "\",\"" . $units . "\",\"" . $quantity . "\",\"" . $price . "\",\"" . $country . "\")";

        if(mysqli_query($conn, $sql))
        {
            echo "New record created successfully";
            refresh();  
            closeDb($conn);
            return true; 

        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
            closeDb($conn); 
            return false; 
        }

        closeDb($conn); 
    }

    function delete_by_name($name)
        {
            $conn = connectDb(); 

            $sql = "DELETE FROM Fruit WHERE name = '".$name."'"; 

            $result = mysqli_query($conn, $sql); 

            closeDb($conn); 

            return $result;
        }

     function update_by_name($name, $units, $quantity, $price, $country)
     {
        $conn = connectDb(); 

        $sql = "UPDATE Fruit SET name='$name', units='$units', quantity='$quantity', price='$price', country='$country' WHERE name = '$name'"; 

        $result = mysqli_query($conn, $sql); 

        closeDb($conn); 

        return $result; 
     }

     function refresh()
     {
        $result = getFruits(); 
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
     }





?>