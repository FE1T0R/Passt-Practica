<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="multimedia/Icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <title>PROYECTO - PASST</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
        
        <?php
        require_once('db.php');
        if (isset($_POST['cerrarsesion'])) {
            session_destroy();
            header("Location: sitio.php");        
        }

        session_start();
        if(isset($_SESSION['id_usuario'])){
            ?><a href="sitio.php" class="navbar-brand">MIS SITIOS</a>
            <form action="index.php" method="POST"><a href="index.php" name="cerrarsesion" class="navbar-brand">CERRAR SESIÓN</a></form><?php
        }else{
            ?><a href="index.php" class="navbar-brand">PASST</a>
            <a href="iniciarsesion.php" class="navbar-brand">INICIAR SESIÓN</a><?php
        }
        ?>

        </div>
    </nav>

    