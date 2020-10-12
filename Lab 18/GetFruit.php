<?php

require_once ('util.php'); 
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
?>