<?php

require_once ('util.php'); 
$result = getZombies(); 

if(mysqli_num_rows($result) > 0)
        {
            echo "<div class='alert-success'>"; 
            echo "<table class='table'>"; 
            echo "<thead class='thead-dark'";
            echo "<tr>"; 
            echo "<th scope='col'>IdZombie</th>";
            echo "<th scope='col'>Nombre del Zombie</th>"; 
            echo "<th scope='col'>Estado</th>"; 
            echo "</tr>"; 
            echo "</thead>"; 
            echo "<tbody>"; 
    
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>"; 
                echo "<td>" . $row["idZombie"] . "</td>"; 
                echo "<td>" . $row["nombre"] . "</td>"; 
                echo "<td>" . $row["estado"] . "</td>"; 
                echo "</tr>"; 
            }
            
            echo  "</tbody>"; 
            echo "</table>"; 
            echo "</div>"; 
            echo "</div>"; 
        }
?>