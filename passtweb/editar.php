<?php
    include("db.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query="SELECT id_sitio, nombre_s, usuario_s, email_s, password_s, fechacreado FROM Sitios WHERE id_sitio=$id;";
        //$query="CALL busqueda('$id');";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==1) {  
            $row = mysqli_fetch_array($result);
            $nombre_s = $row['nombre_s'];
            $usuario_s = $row['usuario_s'];
            $email_s = $row['email_s'];
            $contrasena_s= $row['password_s'];
        }
    }
    if (isset($_POST['cancelar'])) {
        header("Location: sitio.php");        
    }
    if (isset($_POST['editar123'])) {
        header("Location: sitio.php");
        $id = $_GET['id'];
        $nombre = $_POST['NombreSitio'];
        $usuario = $_POST['UsuarioSitio'];
        $email = $_POST['EmailSitio'];
        $contrasena = $_POST['ContrasenaSitio'];


        /*$query="UPDATE `sitios` SET `nombre_s` = '$nombre', `usuario_s` = '$usuario', `email_s` = '$email', `password_s` =  '$contrasena' WHERE `sitio`.`id_sitio` = $id;";*/
        $query="call editar('$nombre','$usuario','$email','$contrasena','$id');";
        /*$query="call editar('Aula USB','Paquito','sucorreo@sucorreo.com','password',5);";*/
        mysqli_query($conn,$query); 

        $_SESSION['mensaje1'] = "Sitio Actualizado Correctamente";
        $_SESSION['tipo_mensaje1'] = "primary";  
        header("Location: sitio.php");    
    }
?>
<?php include("includes/header.php")?>
 <div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">

                    <div class="form-group">
                        <label>Nombre del Sitio</label>
                        <input type="text" name="NombreSitio" class="form-control"
                         autofocus value=<?php echo $nombre_s?>><br>
                    </div>
                    <div class="form-group">
                        <label>Usuario Registrado</label>
                        <input type="text" name="UsuarioSitio" class="form-control"
                         autofocus value=<?php echo $usuario_s?>><br>
                    </div>
                    <div class="form-group">
                        <label>E-mail Registrado</label>
                        <input type="text" name="EmailSitio" class="form-control"
                         autofocus value=<?php echo $email_s?>><br>
                    </div>
                    <div class="form-group">
                        <label>Contraseña del sitio</label>
                        <input type="text" name="ContrasenaSitio" class="form-control"
                         autofocus value="<?php echo $contrasena_s;?>"><!-- echo $contrasena_s;-->
                         
                    </div>
                        <input type="submit" name="editar123" value="Editar" class="btn btn-success btn-block">
                        <input type="submit" name="cancelar" value="Cancelar" class="btn btn-danger btn-block"><br>       
                </form>
            </div>
        </div>
    </div>
 </div>
<?php include("includes/footer.php")?>
