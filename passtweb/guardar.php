<?php
    include("db.php");
    include("datos.php"); 
    if (isset($_POST['guardar'])) {
        $nombre_s = $_POST['NombreSitio'];
        $usuario_s = $_POST['UsuarioSitio'];
        $email_s = $_POST['EmailSitio'];
        $contrasena_s = $_POST['ContrasenaSitio'];

        /*$query = "INSERT INTO `sitio` ( `nombre_s`, `usuario_s`, `email_s`, `password_s`) VALUES ('$nombre_s', '$usuario_s', '$email_s', '$contrasena_s');";*/
        $query = "CALL guardarSitio('$nombre_s', '$usuario_s', '$email_s', '$contrasena_s')";
        $result = mysqli_query($conn,$query);
        if (!$result) {
            die("Query Fail");
            }
        $_SESSION['mensaje']='Sitio Guardado Exitosamente';
        $_SESSION['tipo_mensaje']='success';
    }
?>
<?php include('includes/header.php') ?>
<div class='container p-4'>
    <div class='row'>
        <div class='col-md-4'>
            <div class='card card-body'>
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <label>Nombre del Sitio</label>
                        <input type="text" name="NombreSitio" class="form-control"
                        placeholder="Nombre del Sitio a Registrar" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>Usuario Registrado</label>
                        <input type="text" name="UsuarioSitio" class="form-control"
                        placeholder="Ingresa tu usuario si lo tienes" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>E-mail Registrado</label>
                        <input type="text" name="EmailSitio" class="form-control"
                        placeholder="Ejemplo: micorreo@micorreo.com" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>Contraseña del sitio</label>
                        <input type="password" name="ContrasenaSitio" class="form-control" placeholder="Contraseña del sitio" autofocus>
                    </div>
                        <br>
                        <input type="submit" name="guardar" value="Guardar Sitio" class="btn btn-success btn-block">       
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