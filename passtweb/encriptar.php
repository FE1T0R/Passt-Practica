<?php 
    include('db.php');
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $query="SELECT id, nombre_s, usuario_s, email_s, password_s, fechacreado from sitio WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $_SESSION['mensaje1']='Clave desencriptada Exitosamente';
        $_SESSION['tipo_mensaje1']='light';
        $_SESSION['numero']='1';
        header("Location: sitio.php");
        return $result;
    }
    
    
?>