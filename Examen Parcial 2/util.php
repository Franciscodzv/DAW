<?php
//QDAQURUoP$M55GMAHJY5

//db password:
//xQw/WA!NFn0}&L[f

function connectDb()
{
    $servername = "localhost"; 
    $username = "id15254911_a01204695";
    $password = 'Dwm}RzM3fA$r1YI}';
    $dbname = 'id15254911_db';

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

function sqlqry($qry)
{
    $conn = connectDb(); 
    if(!$conn)
    {
        return false; 
    }
    $result = mysqli_query($conn, $qry); 
    closeDb($conn); 
    return $result; 
}

function addZombie($idZombie, $nombreZombie)
{
    $conn = connectDb(); 

    $sql = "INSERT INTO Zombies (name, units, quantity, price, country) VALUES (\"". $idZombie . "\",\"" . $nombreZombie . "\")";
    //$sql = "CALL `AddZombie`('$idZombie', '$nombreZombie')";

    if(mysqli_query($conn, $sql))
    {
        echo "New zombie added successfully"; 
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
        $sql = "SELECT IdZombie, NombreZombie, EstadoDelZombie FROM EstadoDelZombie";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);

        return $result;
    }




?>