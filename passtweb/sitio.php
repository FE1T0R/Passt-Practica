<?php include('db.php') ?>
<?php include('datos.php') ?>
<?php include('includes/header.php') ?>

<div class=" container-fluid col-md-10 mx-auto">
    <img class="position-relative"   src="multimedia/animacion.gif" alt="Passt Banner">
    
</div>
<div class="box"></div>
<div class="col-md-10 mx-auto">
        <form action="sitio.php" method="POST">
            <br>
                <div class="input-group mb-3">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar Sitios" aria-label="buscar sitio" aria-describedby="button-addon2">
                    <button type="submit" name="buscar" value="buscar" class="btn btn-success btn-block start">Buscar</button>
                    <button type="submit" name="cerrar" value="Cerrar" class="btn btn-danger btn-block reset">Cerrar</button>
                </div>
                
        </form>
        <form action="guardar.php">
            <br>
                <div class="input-group mb-3">
                    <button type="submit" name="nuevo" value="Nuevo" class="btn btn-danger btn-block reset">Nuevo Sitio</button>
                </div> 
        </form>
        <?php
         if (isset($_SESSION['mensaje1'])) {?>
            <div class="alert alert-<?= $_SESSION['tipo_mensaje1']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje1']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset(); }?>
    <table class="table table-bordered"> <!--//// TABLA QUE MUESTRA LOS SITIOS //// -->
        <thead>
            <tr>
                <th>Sitio</th>
                <th>Usuario</th>
                <th>E-mail</th>
                <th>Contraseña</th>
                <th>Fecha Registro</th>
                <th>Administrar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_POST['codificar'])) {
                    $busqueda = $_POST['busqueda'];
                    $query = "CALL encriptado('$busqueda');";
                    $result = mysqli_query($conn,$query);
                    echo datos($result);
                }
                if (isset($_POST['buscar'])) {
                    $busqueda = $_POST['busqueda'];
                    $query = "CALL busqueda('$busqueda');";
                    $result = mysqli_query($conn,$query);
                    echo datos($result);
                }else {
                    
                        /*$query = "SELECT id_sitio, nombre_s, usuario_s, email_s, 'password_s', fechacreado from Sitios;";*/
                        $query = "CALL consultarGeneral()";
                        $result = mysqli_query($conn,$query);
                        echo datos($result);
                    }
            ?>
        </tbody>
    </table> 


</div>


<?php include('includes/footer.php') ?>

