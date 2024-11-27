<div class="mt 3">
    <h3 class ="display-4">Consultar Usuarios</h3>
</div>

<div class="row">
        <div class="col-md-3 mt-4">
<input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("Usuarios","Usuarios","buscar",false,"ajax");?>'>

        </div>

    <table class="table table-hover table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de documento</th>
                <th>Numero de docuento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Rol</th>
            
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($usuarios as $usu){
                    $clase="";
                    $texto="";
                    echo "<tr>";
                        echo "<td>".$usu['id_usuario']."</td>";
                        echo "<td>".$usu['id_tipo_documento']."</td>";
                        echo "<td>".$usu['numero_documento']."</td>";
                        echo "<td>".$usu['primer_nombre']."</td>";
                        echo "<td>".$usu['segundo_nombre']."</td>";
                        echo "<td>".$usu['primer_apellido']."</td>";
                        echo "<td>".$usu['segundo_apellido']."</td>";
                        echo "<td>".$usu['telefono']."</td>";
                        echo "<td>".$usu['correo']."</td>";
                        echo "<td>".$usu['direcion_residencia']."</td>";
                        echo "<td>".$usu['fecha_nacimiento']."</td>";

                        if($usu['id_estado']==1){
                            $clase="btn btn-danger";
                            $texto="Inhabilitar";
                        }else if($usu['id_estado']==2){
                            $clase="btn btn-success";
                            $texto="Habilitar";
                        }
                         
                        echo "<td>";
                            if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                            data-url='" .getUrl("Usuarios", "Usuarios", "postUpdateStatus", false, "ajax"). "' 
                            data-id='" .$usu['id_estado'] ."' 
                            data-user='" .$usu['id_usuario'] ."'>$texto</button>"
                            ."</td>";
                        
                            echo "<td>";
                            echo "<a href='" . getUrl("Usuarios", "Usuarios", "getUpdate", array("id_usuario" => $usu['id_usuario'])) . "'>";
                            echo "<button class='btn btn-primary'>Editar</button>";
                            echo "</a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href='" . getUrl("Usuarios", "Usuarios", "getDelete", array("id_usuario" => $usu['id_usuario'])) . "'>";
                            echo "<button class='btn btn-danger'>Eliminar</button>";
                            echo "</a>";
                            echo "</td>";
                        
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>