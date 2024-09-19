
<?php 
require_once "./app/config/dependencias.php";
require_once "./app/controller/registro.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS.'b5.css'?>">
    <script src="<?=JS."b5.js"?>"></script>
    <title>SUITS</title>
</head>
<body>
    <form class="container mt-5" action="vistaDatos.php" method="POST">
        <div class="row justify-content-center">
            <div class="col-5">
            <p><?=$nombre?></p>
            <p><?=$apellido?></p>
            <p><?=$telefono?></p>
            <a class="btn btn-success w-100" href= "index.php">Regresar</a>
            </div>
        </div>
    </form>  
</body>
</html>
