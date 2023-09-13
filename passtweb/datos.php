<?php
    function datos($result){
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $row['nombre_s']?></td>
                <td><?php echo $row['usuario_s']?></td>
                <td><?php echo $row['email_s']?></td>
                <td><?php echo "*****"?></td>
                <td><?php echo $row['fechacreado']?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id_sitio']?>"><input type="submit" name="editar" value="Editar" class="btn  btn-outline-warning"></a>
                    <a href="encriptar.php?id=<?php echo $row['password_s']?>"><input type="submit" name="codificar" value="Codificar" class="btn  btn-outline-warning"></a>
                    <a href="eliminar.php?id=<?php echo $row['id_sitio']?>"><input type="submit" name="eliminar" value="Eliminar" class="btn btn-outline-warning"></a>
                </td>
            </tr>
    <?php }
}
?>

