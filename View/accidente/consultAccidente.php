<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php include_once '../Lib/helpers.php'; ?>

<div class="card shadow-lg mt-5" id="card_red_man">
    <div class="card-header bg-secondary text-white text-center">
        <h3 class="display-6 mb-0">Consultar accidentes</h3>
    </div>

    <div class="card-body">

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por nombre o correo" 
                data-url='<?php echo getUrl("Accidente", "Accidente", "buscar", false, "ajax"); ?>'>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Lesionados</th>
                    <th>Observacion</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Tipo de vehiculos</th>
                    <th>Tipo choque</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($accidente as $acc){
                $clase="";
                $texto="";
                echo "<tr>";
                echo "<td>".$acc['id_registro_accidente']."</td>";
                echo "<td>".$acc['fecha_accidente']."</td>";
                echo "<td>".$acc['lesionados']."</td>";
                echo "<td>".$acc['observacion']."</td>";
                echo "<td>".$acc['direccion']."</td>";
                echo "<td>";
                echo"<form action='getUrl('Accidente', 'Accidente', 'postUpdateStatus');' method='post' class='mt-4'>";
                echo "<select class='form-select' name='cat_accidente' id='cat_accidente'>";
                echo "<option disabled selected>".($acc['Edescripcion'])."</option>";
                foreach ($estado as $est) {
                echo "<option value='".($est['id_estado'])."'>".($est['nombre_estado'])."</option>";
                }
                echo "</select>";
                echo "<button type='submit' class='btn btn-dark'>Enviar</button>";
                echo "</form>";
                echo "</td>";
                echo"<td>".$acc['id_tipo_vehiculo']."</td>";
                echo"<td>".$acc['id_tipo_choque']."</td>";


                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
