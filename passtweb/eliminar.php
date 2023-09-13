<?php 
    include('db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        /*$query = "DELETE FROM sitio WHERE id=$id";*/
        $query = "CALL eliminar ('$id');";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Fail");
        }
        
        $_SESSION['mensaje1']='Sitio Removido Exitosamente';
        $_SESSION['tipo_mensaje1']='danger';

        header("Location: sitio.php");
    }
?>