<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Lab 18</title>
</head>

<body class="alert-primary">
    <br>
    <form class="from-action col-lg-6 offset-lg-3" id="form">
        <div class="form-group">
            <label for="idZombie">Id Zombie</label>
            <input type="text" name="idZombie" id="idZombie" placeholder="ID Zombie..." class="form-control centered">
        </div>

        <div class="form-group">
            <label for="nombre">Nombre del Zombie</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre...">
        </div>

        <div>
            <br>
            <input type="submit" class="btn btn-success" name="addZombie" id="addZombie" value="Add Zombie"> &nbsp;
            <br><br>
        </div>

    </form>

    <form class="from-action col-lg-6 offset-lg-3" id="form2">
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" placeholder="Estado.." class="form-control centered">
            <br>
            <input type="submit" name="estado" value="Agregar Estado" class="btn btn-warning">
        </div>
    </form>

    <div id="table">

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="Ajax.js"></script>

</body>

</html>