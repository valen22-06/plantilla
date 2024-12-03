<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

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

<div class="mt-3">
    <h3 class ="display-4">Editar perfil</h3>
</div>


<?php
include_once '../Lib/helpers.php';
    foreach($usuarios as $usu){
        if ($usu['id_rol']==3) {
    

?>


    <form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">
    <div class="row mt-5">

        <div class ="col-md-4">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['correo'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioTelefono">Telefono</label>
            <input type="text" name="telefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioDireccion">Direccion</label>
            <input type="text" name="direccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion_residencia'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="Rptpwd" id="" class="form-control" placeholder="Clave" value="<?php echo $usu['contrasenia'] ?>">
        </div>

        
        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    
    </form>

    </div>

<?php
        } elseif ($usu['id_rol']==2) {
            
?>

<form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">
    <div class="row mt-5">
        <label for="usuarioNombre1">Primer Nombre</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['primer_nombre'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioNombre2">Segundo Nombre</label>
            <input type="text" name="secondName" id="" class="form-control" placeholder="Segundo Nombre" value="<?php echo $usu['segundo_nombre'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioApellido1">Primer Apellido</label>
            <input type="text" name="qpellido1" id="" class="form-control" placeholder="Primer Apellido" value="<?php echo $usu['primer_apellido'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioApellido2">Segundo Apellido</label>
            <input type="text" name="segundoApellido" id="" class="form-control" placeholder="Segundo Apellido" value="<?php echo $usu['segundo_apellido'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['correo'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioTelefono">Telefono</label>
            <input type="text" name="telefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioDireccion">Direccion</label>
            <input type="text" name="direccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion_residencia'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="Rptpwd" id="" class="form-control" placeholder="Clave" value="<?php echo $usu['contrasenia'] ?>">
        </div>

        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    
    </form>
    </div>

<?php
        } elseif ($usu['id_rol']==1) {
           
?>

<form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="post">
    <div class="row mt-5">
        <div class ="col-md-4">
        <label for="usuarioNombre1">Primer Nombre</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Primer Nombre" value="<?php echo $usu['primer_nombre'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioNombre2">Segundo Nombre</label>
            <input type="text" name="secondName" id="" class="form-control" placeholder="Segundo Nombre" value="<?php echo $usu['segundo_nombre'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioApellido1">Primer Apellido</label>
            <input type="text" name="apellido" id="" class="form-control" placeholder="Primer Apellido" value="<?php echo $usu['primer_apellido'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioApellido2">Segundo Apellido</label>
            <input type="text" name="segundoApellido" id="" class="form-control" placeholder="Segundo Apellido" value="<?php echo $usu['segundo_apellido'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['correo'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioTelefono">Telefono</label>
            <input type="text" name="telefono" id="" class="form-control" placeholder="Telefono" value="<?php echo $usu['telefono'] ?>">
        </div>
        <div class ="col-md-4">
        <label for="usuarioDireccion">Direccion</label>
            <input type="text" name="direccion" id="" class="form-control" placeholder="Direccion" value="<?php echo $usu['direccion_residencia'] ?>">
        </div>


        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="Rptpwd" id="" class="form-control" placeholder="Clave" value="<?php echo $usu['contrasenia'] ?>">
        </div>

        
        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    
    </form>
    </div>

<?php
        }}

?>