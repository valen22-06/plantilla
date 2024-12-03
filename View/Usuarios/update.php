<div class="mt 3">
    <h3 class ="display-4">Editar perfil</h3>
</div>
<?php
    foreach($usuarios as $usu){

?>
<?php
        if(isset($_SESSION['errores'])){
            echo "<div class = 'alert alert-danger' role='alert'>";
            foreach ($_SESSION['errores'] as $error) {
                echo $error;
                echo "<br>";
            }
            echo "</div>";
            unset($_SESSION['errores']);
        }
?>

    <form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">
    <div class ="col-md-4">
        <label for="usuarioNombre1">Primer Nombre</label>
            <input type="text" name="usuarioNombre1" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['name'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioNombre2">Segundo Nombre</label>
            <input type="text" name="usuarioNombre2" id="" class="form-control" placeholder="Segundo Nombre" value="<?php echo $usu['secondName'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioApellido1">Primer Apellido</label>
            <input type="text" name="usuarioApellido1" id="" class="form-control" placeholder="Primer Apellido" value="<?php echo $usu['apellido'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioApellido2">Segundo Apellido</label>
            <input type="text" name="usuarioApellido2" id="" class="form-control" placeholder="Segundo Apellido" value="<?php echo $usu['segundoApellido'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="usuarioEmail" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['email'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioTelefono">Telefono</label>
            <input type="text" name="usuarioTelefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioDireccion">Direccion</label>
            <input type="text" name="usuarioDireccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion'] ?>">
        </div>

        <br><br><br><br><br>

        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="usuarioClave" id="" class="form-control" placeholder="Clave" value="<?php echo $tar['Rptpwd'] ?>">
        </div>

        </div>
        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    
    </form>

<?php
    }

?>