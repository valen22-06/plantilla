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
        <label for="usuarioNombre">Nombre</label>
            <input type="text" name="usuarioNombre" id="" class="form-control" placeholder="Nombre" value="<?php echo $usu['usuarioNombre'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioApellido">Apellido</label>
            <input type="text" name="usuarioApellido" id="" class="form-control" placeholder="Apellido" value="<?php echo $usu['usuarioApellido'] ?>">
        </div>

        <div class ="col-md-4">
        <label for="usuarioEmail">Correo</label>
            <input type="email" name="usuarioEmail" id="" class="form-control" placeholder="Correo" value="<?php echo $usu['usuarioEmail'] ?>">
        </div>

        <br><br><br><br><br>

        <div class ="col-md-4">
        <label for="usuarioClave">Clave</label>
            <input type="password" name="usuarioClave" id="" class="form-control" placeholder="Clave" value="<?php echo $tar['usuarioClave'] ?>">
        </div>

    <div class ="col-md-4">
        <label for="rolId">Rol Id</label>
 
            <select name="rolId" id="" class="form-control">
            <option value="">Seleccione...</option>
                 <?php

                    foreach($roles as $rol){
                        if($usu['rolId']==$rol['id']){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
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

<?php
    }

?>