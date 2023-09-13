<?php include('db.php') ?>
<?php include('includes/header.php') ?>
<div class='container'>
    <div class='row'>
        <div class='col-md-8 mx-auto'>
            <div class='card card-body'>
                <form action="registrar.php" method="POST">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="NombreUsuario" class="form-control"
                        placeholder="Ingresa tu Nombre" autofocus><br>
                    
                        <label>Apellido</label>
                        <input type="text" name="ApellidoUsuario" class="form-control"
                        placeholder="Ingresa tu Apellido" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="EmailUsuario" class="form-control"
                        placeholder="Ejemplo: micorreo@micorreo.com" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="tel" name="NumeroUsuario" class="form-control"
                        placeholder="Ejemplo: 31315****" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>Nombre de Usuario</label>
                        <input type="text" name="UserUsuario" class="form-control"
                        placeholder="Ingresa tu nombre de Usuario" autofocus><br>
                    </div>
                    <div class="form-group">
                        <label>Pregunta de Seguridad 1</label>
                        <select class="form-select" id="simple" name="simple">
                            <option>Segundo nombre de la Madre</option>
                            <option selected>Materia favorita en el colegio</option>
                            <option>Nombre de la Primera Mascota</option>
                            <option>Comida Favorita</option>
                            <option>Ciudad de Nacimiento del Padre</option>
                        </select>
                        <input type="text" name="Pregunta1" class="form-control"
                        placeholder="Ingresa tu Respuesta" autofocus><br>
                    <div>
                    <div class="form-group">
                        <label>Pregunta de Seguridad 2</label>
                        <select class="form-select" id="simple" name="simple">
                            <option>Segundo nombre de la Madre</option>
                            <option>Materia favorita en el colegio</option>
                            <option>Nombre de la Primera Mascota</option>
                            <option>Comida Favorita</option>
                            <option selected>Ciudad de Nacimiento del Padre</option>
                        </select>
                        <input type="text" name="Pregunta2" class="form-control"
                        placeholder="Ingresa tu Respuesta" autofocus><br>
                    <div>
                    <div class="form-group">
                        <label>Pregunta de Seguridad 3</label>
                        <select class="form-select" id="simple" name="simple">
                            <option selected>Segundo nombre de la Madre</option>
                            <option>Materia favorita en el colegio</option>
                            <option>Nombre de la Primera Mascota</option>
                            <option>Comida Favorita</option>
                            <option>Ciudad de Nacimiento del Padre</option>
                        </select>
                        <input type="text" name="Pregunta3" class="form-control"
                        placeholder="Ingresa tu Respuesta" autofocus><br>
                    <div>
                        <br>
                        <button type="button" class="center btn btn-warning"><a href="generador.php" class="navbar-brand">DEFINIR LLAVE MAESTRA</a></button>
                        
                              
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