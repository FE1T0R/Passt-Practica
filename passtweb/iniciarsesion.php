<?php include('db.php') ?>
<?php include('includes/header.php') ?>
<div class='container'>
    <div class='row'>
        <div class='col-md-4 mx-auto'>
            <div class='card card-body'>
                <form action="registrar.php" method="POST">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="UsuarioIs" class="form-control"
                        placeholder="Ingresa tu nombre de usuario" autofocus><br>
                    </div>
    
                    <div class="form-group">
                        <label>Clave Maestra</label>
                        <input type="password" name="ClaveMaestra" class="form-control" placeholder="Ingresa tu Clave Maestra definida" autofocus>
                    </div class="col-md-4 mx-auto">
                        <br>
                        <button type="button" class="center btn btn-warning"><a href="sitio.php" class="navbar-brand">ACCEDER</a></button>
                </form>
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