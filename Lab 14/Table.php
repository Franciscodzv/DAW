<?php

    require_once "util.php"; 

    $result = getFruits(); 

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>"; 
            echo "<td>" . $row["name"] . "<td/>"; 
            echo "<td>" . $row["units"] . "<td/>"; 
            echo "<td>" . $row["quantity"] . "<td/>"; 
            echo "<td>$" . $row["price"] . "<td/>"; 
            echo "<td>" . $row["country"] . "<td/>"; 
            echo "</tr>"; 

        }
    }

?>