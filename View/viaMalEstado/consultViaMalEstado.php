<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php
include_once '../Lib/helpers.php'; 

?>

<div class="mt-3">
    <h3 class ="display-4">Consultar PQRS</h3>
</div>

<div class="row">
        <div class="col-md-3 mt-4">
            <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("pqrs","pqrs","buscar",false,"ajax");?>'>
        </div>

    <table class="table table-hover table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripcion</th>
                <th>Daño</th>
                <th>Direccion</th>
                <th>Usuario</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($via_mal_estado as $via){
                    $clase="";
                    $texto="";
                    echo "<tr>";
                        echo "<td>".$via['id_via_mal_estado']."</td>";
                        echo "<td>".$via['descripcion']."</td>";
                        echo "<td>".$via['id_danio']."</td>";
                        echo "<td>".$via['direccion']."</td>";
                        echo "<td>".$via['id_usuario']."</td>";
                    

                        if($via['estado_pqrs']==4){
                            $clase="btn btn-danger";
                            $texto="Pendiente";
                        }else if($p['estado_pqrs']==3){
                            $clase="btn btn-success";
                            $texto="Revisada";
                        }
                         
                        echo "<td>";
                            if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                            data-url='" .getUrl("pqrs", "pqrs", "postUpdateStatus", false, "ajax"). "' 
                            data-id='" .$p['estado_pqrs'] ."' 
                            data-user='" .$p['id_pqrs'] ."'>$texto</button>"
                            ."</td>";
                        
                            echo "<td>";
                            echo "<a href='" . getUrl("pqrs", "pqrs", "getUpdate", array("id_usuario" => $p['id_pqrs'])) . "'>";
                            echo "<button class='btn btn-primary'>Editar</button>";
                            echo "</a>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href='" . getUrl("pqrs", "pqrs", "getDelete", array("id_usuario" => $p['id_pqrs'])) . "'>";
                            echo "<button class='btn btn-danger'>Eliminar</button>";
                            echo "</a>";
                            echo "</td>";
                        
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>