
<div class="mt-5">
    <h3 class="display-4">Registrar Usuario</h3>

</div>

<div class="mt-5">
    <div class='alert alert-danger d-none' role='alert' id='error'>

    </div>
    <?php
    if(isset($_SESSION['errores'])){
        echo "<div class='alert alert-danger' role='alert'>";
        foreach($_SESSION['errores'] as $error){
            echo $error."<br>";
        }
        echo "</div>";
        unset($_SESSION['errores']);
    }
    ?>


    <form action="<?php echo getUrl("Usuarios","Usuario","postCreate");?>" method="post" id='form'>
    <div class="row mt-5">
            <div class="col-md-4">
                <label for="usuarioNombre">Nombre</label>
                <input type="text" name="usuarioNombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-md-4">
                <label for="usuarioApellido">Apelldio</label>
                <input type="text" name="usuarioApellido" id="apellido" class="form-control" placeholder="Apellido">

            </div>

            <div class="col-md-4">
                <label for="usuarioEmail">Email</label>
                <input type="text" name="usuarioEmail" id="email" class="form-control" placeholder="Example@gmail.com">

            </div>
            

            <div class="col-md-4">
                <label for="usuarioClave">Clave</label>
                <input type="password" name="usuarioClave" id="clave" class="form-control" placeholder="Contraseña">
            </div>
            <div class="col-md-4">
                <Label for="rolId">Rol id</Label>
                <select name="rolId" id="" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php
                    foreach($roles as $rol){
                        echo "<option value='".$rol['id']."'>".$rol['descripcion']."</option>";
                    }
                    ?>
                    
                </select>
            </div>

            
    
    <div class="mt-5">
        <input type="submit" value="Registrar" class="btn btn-success">
    </div>
    </div>   
</form>