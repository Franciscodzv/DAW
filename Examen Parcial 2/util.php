<?php
//QDAQURUoP$M55GMAHJY5

//db password:

function connectDb()
{
    $servername = "localhost"; 
    $username = "id15254911_a01204695";
    $password = 'm&ttWR^Py39}tH07';
    $dbname = 'id15254911_zombies';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error()); 
    }
    

    return $conn; 
}

function closeDb($mysql)
{
    mysqli_close($mysql); 
}



function addZombie($nombreZombie)
{
    $conn = connectDb(); 

    $sql = "INSERT INTO Zombies (NombreZombie) VALUES ('$nombreZombie')";
    //$sql = "CALL `AddZombie`('$idZombie', '$nombreZombie')";

    if(mysqli_query($conn, $sql))
    {
        echo "New zombie added successfully"; 
        refresh(); 
        closeDb($conn); 
        return true; 
    }
    else{
        echo "ERROR: " . $sql . "<br>" . mysqli_error($conn); 
        closeDb($conn); 
        return false; 
    }
    closeDb($conn); 
}

function getZombies()
    {
        $conn = connectDb();
        $sql = "CALL GetZombie();";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);

        return $result;
    }

function getEstados()
{
    $conn = connectDb(); 
    $sql = "CALL GetEstado();"; 
    $result = mysqli_query($conn,$sql); 

    closeDb($conn);

    return $result; 
}

function consultar($estado)
{
    $conn = connectDb(); 

    $sql = "CALL ConsultarZombie($estado);"; 

    $result = mysqli_query($conn, $sql); 

    closeDb($conn); 

    return $result; 
}

function selection($nombre,$tabla,$id="Estado") {
    
    $resultado = '<select id="'.$nombre.'"  name="'.$nombre.'" class="form-control">';
    $resultado .= '<option value="" disabled selected>Selecciona un '.$tabla.'</option>';
    $conexion_bd = connectDB();

    $consulta = 'SELECT '.$id.', '.$nombre.' FROM '.$tabla.' ORDER BY '.$nombre.' ASC';
    $resultados_consulta = $conexion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados_consulta, MYSQLI_BOTH)) {

        $resultado .= '<option value="'.$row[$id].'">'.$row[$nombre].'</option>';
    }

    mysqli_free_result($resultados_consulta); //Liberar la memoria

    $resultado .= '</select>';

    closeDB($conexion_bd);
    return $resultado;
}

    


function refresh()
{
    
    
    $result = getZombies(); 
     
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
}




?>