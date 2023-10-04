<?php 
include('includes/header.php');
require_once('db.php'); 

$mensajerror='';

if (isset($_POST['cancelariniciosesion'])) {
    header("Location: index.php");
    session_destroy();}



if (isset($_POST['iniciarsesion'])) {
    
    $usuario=$_POST['UsuarioIs'];
    $clavemaestra=$_POST['clavemaestra'];
    $query="call iniciarsesion('$usuario','$clavemaestra');";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)==1) {    
         
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['usuario'] = $row['usuario_u'];
        $_SESSION['id_usuario'] = $row['id_usuario'];
        header("Location: sitio.php");
    }else{

        $mensajerror='Usuario o Contraseña Incorrecto';
    }
}



?>
<div class='container'>
    <div class='row'>
        <div class='col-md-4 mx-auto'>
            <div class='card card-body'>
                <form action="iniciarsesion.php" method="POST">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="UsuarioIs" class="form-control"
                        placeholder="Ingresa tu nombre de usuario" autofocus><br>
                    </div>
    
                    <div class="form-group">
                        <label>Clave Maestra</label>
                        <input type="password" name="clavemaestra" class="form-control" placeholder="Ingresa tu Clave Maestra definida" autofocus>
                    </div class="col-md-4 mx-auto">
                        <br>
                        <button type="submit" name="iniciarsesion" class="center btn btn-warning">ACCEDER</button>
                        <button type="submit" name="cancelariniciosesion" class="center btn btn-warning">CANCELAR</button>
                        
                    </form>
                    <label><?php echo $mensajerror;?></label>
                
    
            </div>
              
        </div> 
    </div>   
</div> 
<?php include('includes/footer.php') ?>