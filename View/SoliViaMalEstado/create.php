<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<div class="mt-5">
    <h3 class ="display-4">Registrar Usuario</h3>
</div>
<div class="mt-5">
    <div class='alert alert-danger d-none' role='alert' id='error'>

    </div>

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
        
<form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate"); ?> " method="post" id="form">
    <div class="row mt-5">
        

        <div class ="col-md-4">
        <label for="usuarioNombre">Nombre</label>
            <input type="text" name="usuarioNombre" id="nombre" class="form-control" placeholder="Nombre">
        </div>

        <div class ="col-md-4">
        <label for="usuarioApellido">Apellido</label>
            <input type="text" name="usuarioApellido" id="apellido" class="form-control" placeholder="Apellido">
        </div>

        <div class ="col-md-4">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="usuarioEmail" id="correo" class="form-control" placeholder="example@gmail.com">
        </div>

        <br><br><br><br>

        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="usuarioClave" id="clave" class="form-control" placeholder="Clave">
        </div>

        <div class ="col-md-4">
            <label for="rolId">Rol</label>
    
                <select name="rolId" id="rol" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php
                        foreach($roles as $rol){
                            echo "<option value='".$rol['id']."'>".$rol['descripcion']."</option>";
                        }
                    ?>
                </select>
         
        </div>

        
    </div>
        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
         
</form>