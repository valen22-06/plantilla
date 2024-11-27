<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php
include_once '../../Lib/helpers.php';

?>
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
                        echo "<td>".$usu['usuarioId']."</td>";
                        echo "<td>".$usu['usuarioNombre']."</td>";
                        echo "<td>".$usu['usuarioApellido']."</td>";
                        echo "<td>".$usu['usuarioEmail']."</td>";
                        echo "<td>".$usu['Rdescripcion']."</td>";
                       
                      
                        // if($usu['estadoId']==1){
                        //     $clase="btn btn-danger";
                        //     $texto="Inhabilitar";
                        // }else if($usu['estadoId']==2){
                        //     $clase="btn btn-success";
                        //     $texto="Habilitar";
                        // }
                         
                        // echo "<td>";
                        //     if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                        //     data-url='" .getUrl("Usuarios", "Usuarios", "postUpdateStatus", false, "ajax"). "' 
                        //     data-id='" .$usu['estadoId'] ."' 
                        //     data-user='" .$usu['usuarioId'] ."'>$texto</button>"
                        //     ."</td>";
                        
                        //     echo "<td>";
                        //     echo "<a href='" . getUrl("Usuarios", "Usuarios", "getUpdate", array("usuarioId" => $usu['usuarioId'])) . "'>";
                        //     echo "<button class='btn btn-primary'>Editar</button>";
                        //     echo "</a>";
                        //     echo "</td>";

                        //     echo "<td>";
                        //     echo "<a href='" . getUrl("Usuarios", "Usuarios", "getDelete", array("usuarioId" => $usu['usuarioId'])) . "'>";
                        //     echo "<button class='btn btn-danger'>Eliminar</button>";
                        //     echo "</a>";
                        //     echo "</td>";
                        
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>