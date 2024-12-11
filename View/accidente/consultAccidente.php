<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php include_once '../Lib/helpers.php'; ?>

<div class="container mt-3">
    <div class="text-center mb-4">
        <h3 class="display-4">Consultar Accidentes</h3>
    </div>

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
                





                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
