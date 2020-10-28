<?php

    require_once 'util.php'; 
    $result = getEstados(); 

    if(mysqli_num_rows($result) > 0)
    {
            echo "<div class='alert-success'>"; 
            echo "<table class='table'>"; 
            echo "<thead class='thead-dark'";
            echo "<tr>"; 
            echo "<th scope='col'>Nombre</th>"; 
            echo "<th scope='col'>Estado</th>"; 
            echo "<th scope='col'>Fecha</th>"; 
            echo "</tr>"; 
            echo "</thead>"; 
            echo "<tbody>"; 
    
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>"; 
                echo "<td>" . $row["NombreZombie"] . "</td>"; 
                echo "<td>" . $row["NombreEstado"] . "</td>"; 
                echo "<td>" . $row["Fecha"] . "</td>"; 
                echo "</tr>"; 
            }
            
            echo  "</tbody>"; 
            echo "</table>"; 
            echo "</div>"; 
            echo "</div>"; 
        }

?>