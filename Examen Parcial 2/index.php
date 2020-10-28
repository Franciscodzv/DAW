<?php
include 'header.html';
require_once 'util.php';
?>

<body class="alert-primary">
    <br>
    <form class="from-action col-lg-6 offset-lg-3" id="form">
        <div class="form-group">
            <label for="nombre">Nombre del Zombie</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre...">
        </div>

        <div>
            <br>
            <input type="submit" class="btn btn-success" name="addZombie" id="addZombie" value="Agregar Zombie"> &nbsp;
            <br><br>
        </div>

    </form>

    <form class="from-action col-lg-6 offset-lg-3" id="form2">
        <div class="form-group">
            <label for="estado">Consulta en base a Estado</label>
            <?= selection("NombreEstado","Estado")?>
            <br>
            <input type="submit" class="btn btn-warning" name="consulta" id="Consulta" value="Consulta">

        </div>
    </form>

    <div id="table">
        <?php  refresh();    ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="ajax.js"></script>

    <?php include 'footer.html'; ?>