<?php include('db.php') ?>
<?php include('includes/header.php') ?>
<div class='container p-4'>
    <div class='row'>
        <div class='col-md-12 mx-auto'>
            <div class='card card-body'>


                <h1>Bienvenido a Passt</h1>
                <h2>tu Gestor de Contraseñas</h2>
                <p>Passt es un herramienta que te permitirá hacer un correcta aplicación y administracion de tus contraseñas y demás datos sensibles requeridos para hacer un inicio de sesión en cualquier sistema de información en el cual requieras identificarte.</p>
                <div class='col-md-4 mx-auto'>
                    <button type="button" class="center btn btn-warning"><a href="registro.php" class="navbar-brand">REGISTRARSE</a></button>
                    <button type="button" class="center btn btn-warning"><a href="iniciarsesion.php" class="navbar-brand">INICIAR SESIÓN</a></button>
                </div>

            </div>
            <?php
                if (isset($_SESSION['mensaje'])) {?>
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['mensaje']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); }?>   
        </div> 
    </div>   
</div> 
<?php include('includes/footer.php') ?>